<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index(){
        return view("front.vacancy.list");
    }

    public function getBySlug(string $slug){
        return view("front.vacancy.detail");
    }
}
