<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
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
        return view("front.company.profile");
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
