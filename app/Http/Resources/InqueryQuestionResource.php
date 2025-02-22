<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InqueryQuestionResource extends JsonResource
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
            'question_text' => $this->question_text,
            'question_type' => $this->question_type,
            'subcategory Name'=>$this->subcategory->name,
            'sort_order' => $this->sort_order,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
