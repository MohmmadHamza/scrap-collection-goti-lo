<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
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
            'iso_alpha_3' => $this->description,
            'numeric_code' => $this->status,
            'currency_code' => $this->created_at,
            'currency_name' => $this->currency_name,
            'phone_code' => $this->phone_code,
            'region' => $this->region,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
