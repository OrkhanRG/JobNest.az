<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(){
        return view("front.candidate.list");
    }

    public function getBySlug(){
        return view("front.candidate.detail");
    }

    public function dashboard(){
        return view("front.candidate.dashboard");
    }

    public function profile(){
        return view("front.candidate.profile");
    }

    public function appliedJobs(){
        return view("front.candidate.applied-jobs");
    }

    public function myResume(){
        return view("front.candidate.my-resume");
    }

    public function savedJobs(){
        return view("front.candidate.saved-jobs");
    }

    public function cvManager(){
        return view("front.candidate.cv-manager");
    }

    public function jobAlerts(){
        return view("front.candidate.job-alerts");
    }

    public function changePassword(){
        return view("front.candidate.change-password");
    }

    public function chat(){
        return view("front.candidate.chat");
    }
}
