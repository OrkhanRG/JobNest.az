<?php

use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
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

//Front
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

    Route::prefix("management")->middleware("custom_auth")->group(function(){
        //Candidate Management
        Route::prefix("candidate")->name("candidate.")->middleware("role:candidate")->group(function(){
            Route::get("/", [CandidateController::class, "dashboard"])->name("dashboard");
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
        Route::prefix("company")->name("company.")->middleware("role:company")->group(function(){
            Route::get("/", [CompanyController::class, "dashboard"])->name("dashboard");
            Route::get("/profile", [CompanyController::class, "profile"])->name("profile");
            Route::get("/resume", [CompanyController::class, "resume"])->name("resume");
            Route::get("/manage-jobs", [CompanyController::class, "manageJobs"])->name("manage-jobs");
            Route::get("/post-job", [CompanyController::class, "postJob"])->name("post-job");
            Route::get("/transaction", [CompanyController::class, "transaction"])->name("transaction");
            Route::get("/change-password", [CompanyController::class, "changePassword"])->name("change-password");
        });
    });
});

//Admin
Route::prefix("admin")->name("admin.")->middleware(["custom_auth", "role:admin,developer,moderator"])->group(function(){
    //Dashboard
    Route::get("/", [DashboardController::class, "index"])->name("dashboard");

    //Job Categories
    Route::prefix("job-categories")->group(function(){
        Route::get("/", [JobCategoryController::class, "index"])->name("job-categories.list");
        Route::get("/create", [JobCategoryController::class, "create"])->name("job-categories.create");
        Route::post("/create", [JobCategoryController::class, "store"]);
        Route::get("/{category}/edit", [JobCategoryController::class, "edit"])->name("job-categories.edit");
        Route::put("/{category}/edit", [JobCategoryController::class, "update"]);
        Route::delete("/{category}/delete", [JobCategoryController::class, "destroy"])->name("job-categories.delete");
        Route::delete("/{category}/change-status", [JobCategoryController::class, "changeStatus"])->name("job-categories.change-status");

        Route::get("/get-parents", [JobCategoryController::class, "getParents"])->name("job-categories.getParents");
    });

    //Users
    Route::prefix("users")->group(function(){
       Route::get("/", [UserController::class, "index"])->name("users.list");
        Route::get("/create", [UserController::class, "create"])->name("users.create");
        Route::post("/create", [UserController::class, "store"]);
        Route::get("/{user}/edit", [UserController::class, "edit"])->name("users.edit");
        Route::put("/{user}/edit", [UserController::class, "update"]);
        Route::put("/{user}/change-status", [UserController::class, "changeStatus"])->name("users.change-status");
        Route::delete("/{user}/delete", [UserController::class, "destroy"])->name("users.delete");
    });

    //Role
    Route::prefix("roles")->name("roles.")->group(function(){
        Route::get("/", [RoleController::class, "index"])->name("list");
        Route::get("/get-all", [RoleController::class, "getAll"])->name("getAll");

        Route::get("/create", [RoleController::class, "create"])->name("create");
        Route::post("/create", [RoleController::class, "store"]);

        Route::get("/{role}/edit", [RoleController::class, "edit"])->name("edit");
        Route::put("/{role}/edit", [RoleController::class, "update"]);
        Route::put("/{role}/change-status", [RoleController::class, "changeStatus"])->name("change-status");
        Route::put("/{role}/give-permissions", [RoleController::class, "givePermissions"])->name("give-permissions");

        Route::delete("/{role}/delete", [RoleController::class, "destroy"])->name("delete");
        Route::delete("/{role}/permission/{permission}", [RoleController::class, "detachPermission"])->name("permission.detach");
    });

    Route::prefix("permissions")->name("permissions.")->group(function(){
        Route::get("/", [PermissionController::class, "index"])->name("list");
        Route::get("/get-all", [PermissionController::class, "getAll"])->name("getAll");
        Route::get("/get-by-role/{role}", [PermissionController::class, "getByRole"])->name("getByRole");

        Route::get("/create", [PermissionController::class, "create"])->name("create");
        Route::post("/create", [PermissionController::class, "store"]);

        Route::get("/{permission}/edit", [PermissionController::class, "edit"])->name("edit");
        Route::put("/{permission}/edit", [PermissionController::class, "update"]);
        Route::put("/{permission}/change-status", [PermissionController::class, "changeStatus"])->name("change-status");

        Route::delete("/{permission}/delete", [PermissionController::class, "destroy"])->name("delete");
    });

    //Language
    Route::prefix("languages")->name("languages.")->group(function(){
        Route::get("/", [LanguageController::class, "index"])->name("list");
        Route::get("/get-all", [LanguageController::class, "getAll"])->name("getAll");

        Route::get("/create", [LanguageController::class, "create"])->name("create");
        Route::post("/create", [LanguageController::class, "store"]);

        Route::get("/{language}/edit", [LanguageController::class, "edit"])->name("edit");
        Route::put("/{language}/edit", [LanguageController::class, "update"]);
        Route::put("/{language}/change-status", [LanguageController::class, "changeStatus"])->name("change-status");

        Route::delete("/{language}/delete", [LanguageController::class, "destroy"])->name("delete");
    });
});

//Login
Route::post("login", [LoginController::class, "index"])->name("login");

//Register
Route::post("register", [RegisterController::class, "index"])->name("register");
Route::get("logout", [RegisterController::class, "logout"])->name("logout");
Route::get("user-verify/{token}", [RegisterController::class, "verify"])->name("user-verify");
Route::get("resend/user-verify", [RegisterController::class, "resendVerify"])->name("resend.user-verify");

//OAuth2
Route::get("auth/{driver}/redirect",[LoginController::class, "redirect"])->name("oauth.redirect");
Route::get("auth/{driver}/callback",[LoginController::class, "callback"])->name("oauth.callback");

//Forgot Password
Route::post("forgot-password", [ForgotPasswordController::class, "forgotPassword"])->name("forgot-password");
Route::get("reset-password", [ForgotPasswordController::class, "resetPasswordForm"])->name("password-reset");
Route::post("reset-password", [ForgotPasswordController::class, "resetPassword"])->name("password-reset");
