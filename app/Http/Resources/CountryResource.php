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
        return  [
            "id" => $this->id,
            "name" => $this->name,
            "short_name" => $this->short_name,
            "phone_prefix" => $this->phone_prefix,
            "is_active" => $this->is_active,
            "language" => new LanguageResource($this->language)
        ];
    }
}
