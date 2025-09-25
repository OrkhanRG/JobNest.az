<?php

namespace App\Http\Controllers\Front;

use App\Enums\CompanyIndustry;
use App\Enums\CompanySize;
use App\Enums\CompanyType;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyProfileUpdateRequest;
use App\Http\Services\CompanyService;
use App\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    use Loggable;

    public function __construct(readonly CompanyService $companyService){}

    public function index(){
        return view("front.company.list");
    }

    public function list(Request $request)
    {
        $params = $request->only('page', "limit", "keyword", "order");
        $data = $this->companyService->getAll($params);
        return $data["list"]->isEmpty() ? json_response(__("app.no_content"), Response::HTTP_NO_CONTENT) : json_response(__("app.success"), Response::HTTP_OK, $data);
    }

    public function getBySlug(string $slug){
        $company = $this->companyService->getBySlug($slug, ["socialLinks", "city", "country", "user"]);
        $social_links = $company["socialLinks"]?->pluck("url", "platform")->toArray() ?? [];

        return view("front.company.detail", compact("company", "social_links"));
    }

    public function dashboard()
    {
        return view("front.company.dashboard");
    }

    public function profile()
    {
        $user = Auth::user()->load("company.socialLinks");
        $companySizes = CompanySize::options();
        $companyIndustries = CompanyIndustry::options();
        $companyTypes = CompanyType::options();
        $socialLinks = $user?->company?->socialLinks
            ? $user->company->socialLinks->pluck("url", "platform")->toArray()
            : [];
        $imagesData = [
            'logo' => [
                'path' => $user?->company->logo,
                'url' => $user?->company->logo ? asset($user?->company->logo) : null,
                'name' => $user?->company->logo ? basename($user?->company->logo) : null,
                'size' => $user?->company->logo ? getFileSize($user?->company->logo) : null
            ],
            'background' => [
                'path' => $user?->company->background_image,
                'url' => $user?->company->background_image ? asset($user?->company->background_image) : null,
                'name' => $user?->company->background_image ? basename($user?->company->background_image) : null,
                'size' => $user?->company->background_image ? getFileSize($user?->company->background_image) : null
            ]
        ];

        return view("front.company.profile", compact(
            "user",
            "companySizes",
            "companyIndustries",
            "companyTypes",
            "imagesData",
            "socialLinks"
        ));
    }

    public function resume()
    {
        return view("front.company.resume");
    }

    public function manageJobs()
    {
        return view("front.company.manage-jobs");
    }

    public function transaction()
    {
        return view("front.company.transaction");
    }

    public function changePassword()
    {
        return view("front.company.change-password");
    }
}
