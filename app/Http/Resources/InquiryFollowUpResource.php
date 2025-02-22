<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InquiryFollowUpResource extends JsonResource
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
            'inquiry_id' => $this->inquiry_id,
            'inquiry_assigned_id' => $this->inquiry_assigned_id,
            'status'=>$this->status,
            'comment' => $this->comment,
            'created_at' => $this->created_at,
        ];
    }
}
