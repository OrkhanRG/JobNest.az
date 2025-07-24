<?php

namespace App\Observers;

use App\Http\Services\CacheService;
use App\Models\ContentTranslation;

class ContentTranslationObserver
{
    /**
     * Handle the ContentTranslation "created" event.
     */
    public function created(ContentTranslation $contentTranslation): void
    {
        app(CacheService::class)->clearContentTranslationCache($contentTranslation->key, $contentTranslation->group, $contentTranslation->lang_id);
    }

    /**
     * Handle the ContentTranslation "updated" event.
     */
    public function updated(ContentTranslation $contentTranslation): void
    {
        app(CacheService::class)->clearContentTranslationCache($contentTranslation->key, $contentTranslation->group, $contentTranslation->lang_id);
    }

    /**
     * Handle the ContentTranslation "deleted" event.
     */
    public function deleted(ContentTranslation $contentTranslation): void
    {
        app(CacheService::class)->clearContentTranslationCache($contentTranslation->key, $contentTranslation->group, $contentTranslation->lang_id);
    }

    /**
     * Handle the ContentTranslation "restored" event.
     */
    public function restored(ContentTranslation $contentTranslation): void
    {
        app(CacheService::class)->clearContentTranslationCache($contentTranslation->key, $contentTranslation->group, $contentTranslation->lang_id);
    }

    /**
     * Handle the ContentTranslation "force deleted" event.
     */
    public function forceDeleted(ContentTranslation $contentTranslation): void
    {
        app(CacheService::class)->clearContentTranslationCache($contentTranslation->key, $contentTranslation->group, $contentTranslation->lang_id);
    }
}
