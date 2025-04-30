<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\AboutUsController;
use App\Http\Controllers\Front\CandidateController;
use App\Http\Controllers\Front\CompanyController;
use App\Http\Controllers\Front\ContactUsController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\VacancyController;
use Illuminate\Support\Facades\Route;


Route::name("front.")->group(function(){
    //Home
    Route::get("/", [HomeController::class, "index"])->name("index");

    //About us
    Route::get("/about-us", [AboutUsController::class, "index"])->name("about-us");

    //Contact us
    Route::get("/contact-us", [ContactUsController::class, "index"])->name("contact-us");

    //Contact us
    Route::get("/faq", [FaqController::class, "index"])->name("faq");

    //Job
    Route::get("/vacancies", [VacancyController::class, "index"])->name("vacancies");
    Route::get("/vacancy/{slug}", [VacancyController::class, "getBySlug"])->name("vacancy");

    //Company
    Route::get("/companies", [CompanyController::class, "index"])->name("companies");
    Route::get("/company/{slug}", [CompanyController::class, "getBySlug"])->name("company");

    //Candidate
    Route::get("/candidates", [CandidateController::class, "index"])->name("candidates");
    Route::get("/candidate/{slug}", [CandidateController::class, "getBySlug"])->name("candidate");

    //Blog
    Route::get("/blogs", [BlogController::class, "index"])->name("blogs");
    Route::get("/blog/{slug}", [BlogController::class, "getBySlug"])->name("blog");

    Route::prefix("management")->group(function(){
        //Candidate Management
        Route::prefix("candidate")->name("candidate.")->group(function(){
            Route::get("/dashboard", [CandidateController::class, "dashboard"])->name("dashboard");
            Route::get("/profile", [CandidateController::class, "profile"])->name("profile");
            Route::get("/applied-jobs", [CandidateController::class, "appliedJobs"])->name("applied-jobs");
            Route::get("/my-resume", [CandidateController::class, "myResume"])->name("my-resume");
            Route::get("/saved-jobs", [CandidateController::class, "savedJobs"])->name("saved-jobs");
            Route::get("/cv-manager", [CandidateController::class, "cvManager"])->name("cv-manager");
            Route::get("/job-alerts", [CandidateController::class, "jobAlerts"])->name("job-alerts");
            Route::get("/change-password", [CandidateController::class, "changePassword"])->name("change-password");
            Route::get("/chat", [CandidateController::class, "chat"])->name("chat");
        });

        //Company Management
        Route::prefix("company")->name("company.")->group(function(){
            Route::get("dashboard", [CompanyController::class, "dashboard"])->name("dashboard");
            Route::get("profile", [CompanyController::class, "profile"])->name("profile");
            Route::get("resume", [CompanyController::class, "resume"])->name("resume");
            Route::get("manage-jobs", [CompanyController::class, "manageJobs"])->name("manage-jobs");
            Route::get("post-job", [CompanyController::class, "postJob"])->name("post-job");
            Route::get("transaction", [CompanyController::class, "transaction"])->name("transaction");
            Route::get("change-password", [CompanyController::class, "changePassword"])->name("change-password");
        });
    });
});

//Register
Route::post("register", [RegisterController::class, "index"])->name("register");
