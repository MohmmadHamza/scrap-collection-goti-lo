<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InquiryQuestionAnswerResource extends JsonResource
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
            'inquiry Status'=> $this->inquiry->status,
            'question_id' =>$this->question_id,
            'answer_text'=>$this->answer_text,
            'question_type'=>$this->question_type,
            'created_at' => $this->created_at,
        ];
    }
}
