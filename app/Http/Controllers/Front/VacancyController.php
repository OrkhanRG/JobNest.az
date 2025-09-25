<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyProfileUpdateRequest;
use App\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VacancyController extends Controller
{
    use Loggable;
    public function index(){
        return view("front.vacancy.list");
    }

    public function getBySlug(string $slug){
        return view("front.vacancy.detail");
    }

    public function create()
    {
        return view("front.company.post-job");
    }

    public function store(CompanyProfileUpdateRequest $request)
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
}
