<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
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
            'name' => $this->name,
            'code' => $this->code,
            'description'=>$this->description,
            'image_url'=> $this->image_url,
            'sort_order'=> $this->sort_order,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
