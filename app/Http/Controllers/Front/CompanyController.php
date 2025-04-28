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
}
