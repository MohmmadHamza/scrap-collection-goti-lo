<?php

namespace App\Http\Requests\Inquiry;

use Illuminate\Foundation\Http\FormRequest;

class InquiryFollowupRequest extends FormRequest
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
          
            'inquiry_id' => 'required',
            'inquiry_assigned_id'=>'required',
            'comment'=> 'nullable',
            'status' => 'nullable',
            'created_by' => 'nullable|integer',
            'updated_by' => 'nullable|integer',
            'deleted_by' => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [];
    }

   
}
