<?php

namespace App\Http\Controllers\Front;

use App\Constants\Status;
use App\Enums\ApplicationMethod;
use App\Enums\EducationLevel;
use App\Enums\ExperienceLevel;
use App\Http\Controllers\Controller;
use App\Http\Services\CityService;
use App\Http\Services\CountryService;
use App\Http\Services\CurrencyService;
use App\Http\Services\JobCategoryService;
use App\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VacancyController extends Controller
{
    use Loggable;

    public function __construct(
        readonly JobCategoryService $jobCategoryService,
        readonly CountryService $countryService,
        readonly CurrencyService $currencyService
    ){}

    public function index(){
        return view("front.vacancy.list");
    }

    public function getBySlug(string $slug){
        return view("front.vacancy.detail");
    }

    public function create()
    {
        $job_categories = $this->jobCategoryService->getAll([
            "is_active" => Status::ACTIVE,
            "order_by" => "name_asc",
        ], "children");
        $countries = $this->countryService->getAll([
            "is_active" => Status::ACTIVE,
            "lang_id" => langConvert(app()->getLocale()),
        ]);
        $company_forms = [];
        $currencies = $this->currencyService->getAll(["is_active" => Status::ACTIVE]);
        $experience_levels = ExperienceLevel::options();
        $education_levels = EducationLevel::options();
        $application_methods = ApplicationMethod::options();

        return view("front.company.post-job", compact(
            "job_categories",
            "experience_levels",
            "education_levels",
            "countries",
            "application_methods",
            "company_forms",
            "currencies"
        ));
    }

    public function store(Request $request)
    {
        $user = Auth::user()->load("company");

        try {
            $data = $request->only([

            ]);

            dd($request->all());

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
}
