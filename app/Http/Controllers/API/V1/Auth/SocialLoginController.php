<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialLogin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialLoginController extends Controller
{
    // Redirect to provider
    public function redirectToProvider($provider)
    {
        return response()->json([
            'url' => Socialite::driver($provider)->stateless()->redirect()->getTargetUrl()
        ]);
    }

    // Handle provider callback
    public function handleProviderCallback($provider)
    {
        try {
            // Retrieve the social user
            $socialUser = Socialite::driver($provider)->stateless()->user();

            // Find or create the user
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName(),
                    'password' => bcrypt(Str::random(24)), // Random password for social login
                ]
            );

            // Store or update social login information
            SocialLogin::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'provider' => strtoupper($provider),
                ],
                [
                    'provider_user_id' => $socialUser->getId(),
                    'access_token' => $socialUser->token,
                    'refresh_token' => $socialUser->refreshToken,
                    'expires_at' => $socialUser->expiresIn ? now()->addSeconds($socialUser->expiresIn) : null,
                ]
            );

            // Generate token for API usage
            $token = $user->createToken('SocialLoginToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to authenticate user.'], 401);
        }
    }
}