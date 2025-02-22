<?php

namespace App\Http\Requests\OTP;

use Illuminate\Foundation\Http\FormRequest;

class VerifyOtpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mobile' => 'required|regex:/^[0-9]{10}$/',
            'otp' => 'required|regex:/^[0-9]{6}$/',
        ];
    }

    /**
     * Custom error messages for validation.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'mobile.required' => 'The mobile number is required.',
            'mobile.regex' => 'The mobile number must be 10 digits.',
            'otp.required' => 'The otp number is required.',
            'otp.regex' => 'The otp number must be 6 digits.',
        ];
    }
}
