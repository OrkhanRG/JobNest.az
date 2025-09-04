<?php

namespace App\Providers;

use App\Events\PasswordReset;
use App\Events\UserRegistered;
use App\Listeners\SendPasswordResetEmail;
use App\Listeners\SendVerifyEmail;
use App\Models\ContentTranslation;
use App\Models\JobCategory;
use App\Models\Language;
use App\Observers\ContentTranslationObserver;
use App\Observers\JobCategoryObserver;
use App\Observers\LanguageObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //event
        Event::listen([
            UserRegistered::class => SendVerifyEmail::class,
            PasswordReset::class => SendPasswordResetEmail::class
        ]);

        //observer
        JobCategory::observe(JobCategoryObserver::class);
        ContentTranslation::observe(ContentTranslationObserver::class);
        Language::observe(LanguageObserver::class);
    }
}
