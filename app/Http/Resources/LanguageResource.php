<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LanguageResource extends JsonResource
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
            "code" => $this->code,
            "native_name" => $this->native_name,
            "is_active" => $this->is_active,
            "is_default" => $this->is_default,
            "sort_order" => $this->sort_order
        ];
    }
}
