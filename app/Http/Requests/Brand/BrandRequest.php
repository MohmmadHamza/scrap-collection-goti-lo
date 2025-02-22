<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
             'description' => 'nullable|string',
             'image_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             'sort_order'=> 'nullable',
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
             'name' => "Brand",
         ];
     }
}
