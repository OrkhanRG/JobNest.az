<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "slug" => $this->slug,
            "description" => $this->description,
            "icon" => $this->icon,
            "children" => self::collection($this->whenLoaded('children')),
            "is_active" => $this->is_active,
            "parent_id" => $this->parent_id
        ];
    }
}
