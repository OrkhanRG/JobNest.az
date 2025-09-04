<?php

namespace App\Http\Services;

use App\Constants\App;
use App\Models\Company;
use App\Models\User;
use App\Traits\Loggable;

class CompanyService extends BaseService
{
    use Loggable;

    protected User $user;

    public function __construct(readonly ImageService $imageService){}

    public function setCompany(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function update(array $data): bool
    {
        if (!$this->user) {
            return false;
        }

        $company = $this->user->company;

        $this->user->update([
            "name" => $data["name"] ?? config("jobnest.default_user_name"),
            "email" => $data["email"],
        ]);

        $company_name = $data["name"] ?? config("jobnest.default_company_name");
        $deleted_files = isset($data["deleted_files"]) && !!$data["deleted_files"] ? explode(",", $data["deleted_files"]) : [];

        $logo = in_array("logo", $deleted_files) ? null : $company->logo;
        $background_image = in_array("background_image", $deleted_files) ? null : $company->background_image;

        if (($hasLogo = isset($data["logo"]) && $data["logo"]) || in_array("logo", $deleted_files)) {
            if ($hasLogo) {
                $logo = $this->imageService->sendToFolder(App::FRONT, $data["logo"], "companies", $company_name . "-logo");
            }
            $this->imageService->removeFromFolder($company->logo);
        }

        if (($hasBackgroundImg = isset($data["background_image"]) && $data["background_image"]) || in_array("background_image", $deleted_files)) {
            if ($hasBackgroundImg) {
                $background_image = $this->imageService->sendToFolder(App::FRONT, $data["background_image"], "companies", $company_name . "-background_image");
            }
            $this->imageService->removeFromFolder($company->background_image);
        }

        $company_data = [
            "name" =>  $company_name,
            "slug" =>  slugify($data["name"], Company::class, $company->id),
            "tagline" =>  $data["tagline"] ?? null,
            "phone" =>  $data["phone"] ?? null,
            "website" =>  $data["website"] ?? null,
            "contact_email" =>  $data["contact_email"] ?? null,
            "city_id" =>  $data["city_id"] ?? null,
            "country_id" =>  $data["country_id"] ?? null,
            "address" =>  $data["address"] ?? null,
            "latitude" =>  $data["latitude"] ?? null,
            "longitude" =>  $data["longitude"] ?? null,
            "map_address" =>  $data["map_address"] ?? null,
            "company_size" =>  $data["company_size"] ?? null,
            "industry" =>  $data["industry"] ?? null,
            "company_type" =>  $data["company_type"] ?? null,
            "seo_title" =>  $data["name"] ?? null,
            "seo_description" =>  $data["description"] ?? null,
            "seo_keywords" => $data["seo_keywords"] ??
                implode(', ', array_filter([
                    $data["name"] ?? null,
                    $data["industry"] ?? null,
                    $data["tagline"] ?? null,
                ])),
            "founded_year" => $data["founded_year"] ?? null,
            "description" => $data["description"] ?? null,
            "logo" => $logo,
            "background_image" => $background_image,
        ];

        return $company->update($company_data);
    }
}
