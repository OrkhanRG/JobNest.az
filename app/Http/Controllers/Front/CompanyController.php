<?php

namespace App\Http\Controllers\Front;

use App\Enums\CompanyIndustry;
use App\Enums\CompanySize;
use App\Enums\CompanyType;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyProfileUpdateRequest;
use App\Http\Services\CompanyService;
use App\Models\SocialLink;
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

    public function getBySlug(string $slug){
        return view("front.company.detail");
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

    public function profileUpdate(CompanyProfileUpdateRequest $request)
    {
        $user = Auth::user()->load("company");

        try {
            $data = $request->only([
                'name',
                'email',
                'phone',
                'contact_email',
                'website',
                'tagline',
                'country_id',
                'city_id',
                'address',
                'latitude',
                'longitude',
                'map_address',
                'industry',
                'company_type',
                'company_size',
                'founded_year',
                'description',
                'deleted_files'
            ]);

            if ($request->hasFile('logo')) {
                $data['logo'] = $request->file('logo');
            }

            if ($request->hasFile('background_image')) {
                $data['background_image'] = $request->file('background_image');
            }

            if (!hasRole("company")) {
                return json_response(__('app.not_have_permission_this_operation'), Response::HTTP_FORBIDDEN);
            }

            $update = $this->companyService->setCompany($user)->update($data);

            if (!$update) {
                return json_response(__('app.error'), Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return json_response(__('app.success'), Response::HTTP_ACCEPTED);

        } catch (\Throwable $exception) {
            $this->logErrorToFile($exception, "CompanyController@profileUpdate");
            return json_response(__("text.unexpected_error_text"), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function resume()
    {
        return view("front.company.resume");
    }

    public function manageJobs()
    {
        return view("front.company.manage-jobs");
    }

    public function postJob()
    {
        return view("front.company.post-job");
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
