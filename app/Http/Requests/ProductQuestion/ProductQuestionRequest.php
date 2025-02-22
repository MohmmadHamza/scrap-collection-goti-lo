<?php

namespace App\Http\Requests\ProductQuestion;

use Illuminate\Foundation\Http\FormRequest;

class ProductQuestionRequest extends FormRequest
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
            'subcategory_id' => 'required|exists:sub_categories,id',
            'question_text'  => 'required|string|max:255',
            'sort_order'=> 'nullable',
            'question_type'  => 'required|in:mcq,brand,text,image,video,document,long_text,select,numeric',
            'options'        => 'nullable|array|required_if:question_type,mcq,select',
            'status'         => 'nullable|in:active,inactive',
        ];
    }
}
