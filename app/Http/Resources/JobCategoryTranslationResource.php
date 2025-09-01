<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobCategoryTranslationResource extends JsonResource
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
            "language" => new LanguageResource($this->language),
            "job_category" => new JobCategoryResource($this->category),
            "name" => $this->name,
            "description" => $this->description,
            "seo_title" => $this->seo_title,
            "seo_description" => $this->seo_description,
            "seo_keywords" => $this->seo_keywords
        ];
    }
}
