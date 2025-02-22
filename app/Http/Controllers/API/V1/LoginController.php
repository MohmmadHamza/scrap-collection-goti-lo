<?php

namespace App\Http\Controllers\API\V1;

use App\Helpers\ApiResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\OTP\SendOtpRequest;
use App\Http\Requests\OTP\VerifyOtpRequest;
use App\Models\User;
use App\Traits\Sms;
use Aws\Exception\AwsException;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    protected $otpCacheTime = 5; // OTP validity in minutes

    protected $smsSenderId = '1407169571806897338'; // Sender ID for SMS

    use Sms;

    public function send_otp(SendOtpRequest $request)
    {
        $mobile = $request->mobile;

        // Rate Limiting - 5 attempts per minute
        if ($this->isRateLimited($mobile)) {
            return ApiResponseHelper::createResponse('Too many attempts, please try again after some time.', false, 429);
        }

        // Generate OTP and cache it to avoid frequent DB hits
        $otp = $this->generateOtp($mobile);

        // Send OTP
        try {
            DB::beginTransaction();

            $user = User::where('mobile_number', $mobile)->first();

            if (!$user) {
                return ApiResponseHelper::createResponse('Mobile number not found.', false, 404);
            }

            $fullName = trim("{$user->name}");

            // Cache OTP for the given mobile number (Avoid storing in the database)
            Cache::put("otp_{$mobile}", $otp, now()->addMinutes($this->otpCacheTime));

            // SMS Sending logic
            $smsMessage = "Dear {$fullName}, BeRef app login OTP is {$otp}. Please do not share this OTP with anyone. Sincerely, B Creative Solutions";
            // $this->sendSms($smsMessage, $mobile, $this->smsSenderId);
            $currentTime = Carbon::now();
            $otp_valid = $currentTime->addMinute();
            $user->update(['otp' => $otp, 'otp_valid' => $otp_valid]);

            DB::commit();

            return ApiResponseHelper::createResponse("We have sent a 6 digit OTP to {$mobile}. Please enter OTP to login.", true, 200);
        } catch (AwsException $e) {
            DB::rollBack();
            Log::error('AWS Error in send_otp:', ['error' => $e->getMessage()]);

            return ApiResponseHelper::createResponse('Failed to send SMS due to AWS service error.', false, 500);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error in send_otp:', ['error' => $e->getMessage()]);

            return ApiResponseHelper::createResponse('An unexpected error occurred.', false, 500);
        }
    }

    /**
     * Generate a secure OTP. You can customize this for better security.
     *
     * @param  string  $mobile
     * @return int
     */
    protected function generateOtp($mobile)
    {
        // Custom OTP for specific mobile number (for testing)
        return 123456;
        if ($mobile == '9876543210') {
            return 123456;
        }

        // Generate OTP (can be customized)
        return rand(100001, 999999);
    }

    /**
     * Check if the user is rate-limited (too many OTP requests).
     *
     * @param  string  $mobile
     * @return bool
     */
    protected function isRateLimited($mobile)
    {

        $key = Str::lower("otp_send_{$mobile}");

        // Max 5 OTP requests per minute per mobile number
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return true;
        }

        // Track the OTP request for rate limiting
        RateLimiter::hit($key, 60); // 60 seconds time window

        return false;
    }

    public function verify_otp(VerifyOtpRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::where('mobile_number', '=', $request->mobile)
                ->where('otp', $request->otp)
                ->first();
            if ($user) {
                $user->update(['otp' => '']);
                Auth::login($user);
                $user_id = Auth::id();
                $user = User::where('id', $user_id)->select(
                    'id',
                    'name',
                    'mobile_number',
                )->first();


                $token = $user->createToken('auth_token')->plainTextToken;
                $user['access_token'] = $token;
                $user['token_type'] = 'Bearer';
                // if (isset($request->device_token)) {
                //     DeviceInfo::where('device_token', $request->device_token)->whereNull('user_id')->update(['user_id' => $user->id]);
                // }
                DB::commit();

                return ApiResponseHelper::createResponse('Login Successfully.', true, 200, $user);
            } else {
                DB::commit();

                return ApiResponseHelper::createResponse('Incorrect OTP', false, 401);
            }
        } catch (Exception $e) {
            DB::rollBack();

            return ApiResponseHelper::createResponse($e->getMessage(), false, 500);
        }
    }
}
