<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductQuestionAnswerResource extends JsonResource
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
            'Product Name' => $this->product->name,
            'Question Status'=> $this->question->status,
            'answer_text'=> $this->answer_text,
            'question_type'=>$this->question_type,

        ];
    }
}
