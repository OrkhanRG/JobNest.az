<?php

namespace App\Observers;

use App\Http\Services\CacheService;
use App\Models\Language;

class LanguageObserver
{
    protected function clearCache(Language $language): void
    {
        $cache = app(CacheService::class);

        $cache->clearLangConvertCache($language->id);
        $cache->clearLangConvertCache($language->code);
    }

    public function created(Language $language): void
    {
        $this->clearCache($language);
    }

    public function updated(Language $language): void
    {
        $this->clearCache($language);
    }

    public function deleted(Language $language): void
    {
        $this->clearCache($language);
    }

    public function restored(Language $language): void
    {
        $this->clearCache($language);
    }

    public function forceDeleted(Language $language): void
    {
        $this->clearCache($language);
    }
}
