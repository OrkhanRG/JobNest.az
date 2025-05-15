<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function index()
    {
        return view('admin.job_category.list');
    }

    public function create()
    {

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
