<?php

namespace App\Http\Requests\City;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'country_id' => 'required',
            'state_id' => 'required',
            'latitude'=> 'nullable',
            'longitude'=> 'nullable',
            'timezone'=> 'nullable',
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
            'name' => "City",
        ];
    }
}
