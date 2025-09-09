<?php

namespace App\Http\Resources;

use App\Enums\CompanyIndustry;
use App\Enums\CompanySize;
use App\Enums\CompanyType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            "user" => new UserResource($this->user),
            "name" => $this->name,
            "slug" => $this->slug,
            "tagline" => $this->tagline,
            "description" => $this->description,
            "logo" => $this->logo,
            "background_image" => $this->background_image,
            "phone" => $this->phone,
            "website" => $this->website,
            "contact_email" => $this->contact_email,
            "city" => new CityResource($this->city),
            "country" => new CountryResource($this->country),
            "address" => $this->address,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "map_address" => $this->map_address,
            "company_size" => $this->company_size ? [
                "value" => $this->company_size,
                "label" => CompanySize::getLabel($this->company_size)
            ] : null,
            "industry" => $this->industry ? [
                "value" => $this->industry,
                "label" => CompanyIndustry::getLabel($this->industry)
            ] : null,
            "founded_year" => $this->founded_year,
            "company_type" => $this->company_type ? [
                "value" => $this->company_type,
                "label" => CompanyType::getLabel($this->company_type)
            ] : null,
            "seo_title" => $this->seo_title,
            "seo_description" => $this->seo_description,
            "seo_keywords" => $this->seo_keywords
        ];
    }
}
