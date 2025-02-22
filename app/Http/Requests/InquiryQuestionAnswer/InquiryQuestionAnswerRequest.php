<?php

namespace App\Http\Requests\InquiryQuestionAnswer;

use Illuminate\Foundation\Http\FormRequest;

class InquiryQuestionAnswerRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'answer_text' => 'array',
           
        ];
    }
    
    
}
