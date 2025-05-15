<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\JobCategoryService;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function __construct(
        readonly JobCategoryService $jobCategoryService
    ) {}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = $this->jobCategoryService->getAll();

            return json_response(__("app.success"), 200, $categories);
        }

        return view('admin.job_category.list');
    }

    public function create()
    {
        //
    }

    public function store()
    {

    }

    public function edit(JobCategory $jobCategory)
    {

    }

    public function update(JobCategory $jobCategory)
    {

    }

    public function destroy(JobCategory $jobCategory)
    {

    }
}
