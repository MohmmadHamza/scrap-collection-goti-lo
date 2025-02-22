<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InquiryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_name' => $this->user->name,
            'sub_category' => $this->subcategory->name,
            'category' => $this->category->name,
            'zolio_status'=>$this->zolio_status,
            'amount'=> $this->amount,
            'cgst'=> $this->cgst,
            'sgst'=>$this->sgst,
            'igst'=>$this->igst,
            'cgst_per'=>$this->cgst_per,
            'sgst_per'=>$this->sgst_per,
            'igst_per'=>$this->igst_per,
            'sub_total'=>$this->sub_total,
            'grand_total'=>$this->grand_total,
            'barcode'=>$this->barcode,
            'payment_type'=>$this->payment_type,
           
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
