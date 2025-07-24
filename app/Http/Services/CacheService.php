<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CacheService
{
    public function __construct(
        readonly LanguageService $languageService
    ) {}

    public function clearContentTranslationCache($key, $group, int|string $lang): void
    {
        if (is_numeric($lang)) {
            $lang = $this->languageService->getById($lang)?->code;
        }

        if (!$lang) {
            return;
        }

        $key = Str::slug($key, "_");
        Cache::forget("lang.{$lang}.{$group}.{$key}");
    }
}
