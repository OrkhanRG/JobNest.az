<?php

namespace App\Observers;

use App\Models\JobCategory;
use Illuminate\Support\Facades\Cache;

class JobCategoryObserver
{
    /**
     * Handle the JobCategory "created" event.
     */
    public function created(JobCategory $jobCategory): void
    {
        Cache::forget('job_categories');
    }

    /**
     * Handle the JobCategory "updated" event.
     */
    public function updated(JobCategory $jobCategory): void
    {
        Cache::forget('job_categories');
    }

    /**
     * Handle the JobCategory "deleted" event.
     */
    public function deleted(JobCategory $jobCategory): void
    {
        Cache::forget('job_categories');
    }

    /**
     * Handle the JobCategory "restored" event.
     */
    public function restored(JobCategory $jobCategory): void
    {
        Cache::forget('job_categories');
    }

    /**
     * Handle the JobCategory "force deleted" event.
     */
    public function forceDeleted(JobCategory $jobCategory): void
    {
        Cache::forget('job_categories');
    }
}
