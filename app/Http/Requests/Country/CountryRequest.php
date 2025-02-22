<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
          
            'name' => 'required|string',
            'iso_alpha_3'=>'required|string',
            'numeric_code'=>'required|string',
            'currency_code'=> 'required|string',
            'currency_name'=> 'required|string',
            'phone_code'=> 'required',
            'region'=> 'required',
            'status' => 'nullable|in:active,inactive',
            'created_by' => 'nullable|integer',
            'updated_by' => 'nullable|integer',
            'deleted_by' => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return [
            'name' => "Country",
        ];
    }
}
