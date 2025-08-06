<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            "country_id" => $this->country_id,
            "name" => $this->name,
            "short_name" => $this->short_name,
            "region_code" => $this->region_code,
            "is_active" => $this->is_active,
            "country" => new CountryResource($this->country),
            "language" => new LanguageResource($this->language)
        ];
    }
}
