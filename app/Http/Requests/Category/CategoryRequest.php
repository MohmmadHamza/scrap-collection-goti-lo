<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiErrorResponse;
class CategoryRequest extends FormRequest
{
    use ApiErrorResponse;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'nullable|string',
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
            'name' => "Category",
        ];
    }

}
