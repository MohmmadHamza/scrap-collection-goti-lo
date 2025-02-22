<?php

namespace App\Http\Requests\InquiryPickup;

use Illuminate\Foundation\Http\FormRequest;

class InquiryPickupRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'inquiry_assigned_id' => 'required|exists:inquiry_assigned,id',
            'schedule_date' => 'required|date|after_or_equal:today',
            'status' => 'required|string|in:Pending,In Process,Completed,Cancelled',
            'amount' => 'nullable|numeric|min:0',
            'description' => 'nullable|string|max:1000',
        ];
    }
}
