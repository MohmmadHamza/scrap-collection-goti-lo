<?php

namespace App\Traits;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
trait ApiErrorResponse
{
    public function failedValidation(Validator $validator)
    {
        // Check if the request is an API request (usually accepts 'application/json')
        if ($this->expectsJson()) {
            $errors = collect($validator->errors()->all());
            // Return JSON response for API requests
            throw new HttpResponseException(response()->json([
                'status' => false,
                'response_code' => 422,
                'message' => $errors->values()->toArray(),
                'data' => $validator->errors(),
            ], 422));
        }

        // For web requests, redirect back with validation errors
        throw new ValidationException($validator, redirect()->back()->withErrors($validator->errors())->withInput());


    }
}
