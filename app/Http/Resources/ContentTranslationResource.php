<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentTranslationResource extends JsonResource
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
            "group" => switchKeyToBlob("content_translations.group.$this->group", true),
            "key" => $this->key,
            "value" => $this->value,
            "is_active" => $this->is_active,
            "language" => new LanguageResource($this->language)
        ];
    }
}
