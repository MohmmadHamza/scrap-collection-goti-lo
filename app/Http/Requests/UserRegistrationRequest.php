<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
        // Common rules for both create and update
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . ($this->user ? $this->user->id : 'NULL'),
            'gender' => 'required|string|in:male,female',
            'role_id' => 'required|exists:roles,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'dob' => 'required|date',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // If it's a store (create) request, enforce password rules
        if ($this->isMethod('post')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        } else {
            // For update, password is optional
            $rules['password'] = 'nullable|string|min:8|confirmed';
        }

        return $rules;
    }
}
