<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        'name' => 'required|string|unique:products,name',

            'description' => 'required|string',
            'category_id' => 'required',
            'subcategory_id'=>'required',
            'brand_id'=> 'required',
            'user_id' => 'required',
            'price'=> 'required',
            'stock_quantity'=> 'required',
            'tags'=>'nullable',
            'voucher_discount'=>'nullable',
            'exchange_discount'=>'nullable',
            'discount'=> 'nullable',
            'status' => 'nullable|in:active,inactive',
            'is_featured' => 'nullable|in:0,1',
            'created_by' => 'nullable|integer',
            'updated_by' => 'nullable|integer',
            'deleted_by' => 'nullable|integer',
        ];
    }
}
