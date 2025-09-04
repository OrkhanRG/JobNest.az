<?php

use App\Constants\Status;
use App\Http\Services\LanguageService;
use App\Models\ContentTranslation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

if (!function_exists("json_response")) {
    function json_response($message, $code = 200, $data = null)
    {
        $response = [
            "code" => $code,
            "message" => $message
        ];

        if (!is_null($data)) {
            $response["data"] = $data;
        }

        return response()->json($response);
    }
}

if (!function_exists("slugify")) {
    function slugify(string $text, string $model, ?int $ignored_id = null, $unique_key = "slug", $separator = "-"): string {
        $slug = Str::slug($text, $separator);
        $original = $slug;
        $i = 1;

        while (
            $model::query()
                ->where($unique_key, $slug)
                ->when($ignored_id, function ($query) use ($ignored_id) {
                    return $query->where("id", "!=", $ignored_id);
                })
                ->exists()
        ) {
            $slug = $original.$separator.$i++;
        }

        return $slug;
    }
}

if (!function_exists("switchKeyToBlob")) {
    function switchKeyToBlob(string $key, bool $reverse = false, $searched_value = "key") {
        $config_prefix = "blob";

        if (!$reverse) {
            $segments = explode(".", $key);
            $last_key = array_pop($segments);
            $path = implode(".", $segments);
            $blobs = config("$config_prefix.$path");

            if (is_array($blobs)) {
                foreach ($blobs as $blob => $item) {
                    if (isset($item["key"]) && $item["key"] === $last_key) {
                        return $blob;
                    }
                }
            }

            return null;
        }

        $item = config("$config_prefix.$key");
        return $item[$searched_value] ?? null;
    }
}

if (!function_exists("lang")) {
    function lang(string $key, string $group, string $default = "no_locale") {
        $key = Str::slug($key, "_");
        $group = switchKeyToBlob("content_translations.group.$group");
        $lang = app()->getLocale() ?? "en";
        $default = "$default.$lang.$key";

        $cacheKey = "lang.{$lang}.{$group}.{$key}";

        return Cache::rememberForever($cacheKey, function () use ($lang, $group, $key, $default) {
            $lang_id = (new LanguageService())->getByCode($lang)?->id;
            if (!$lang_id) return $default;

            return ContentTranslation::query()
                ->where("is_active", Status::ACTIVE)
                ->where("lang_id", $lang_id)
                ->where("group", $group)
                ->where("key", $key)
                ->value("value") ?? $default;
        });
    }
}

if (!function_exists("langConvert")) {
    function langConvert(string|int|null $key = null) {
        $key = $key ?? app()->getLocale();

        return Cache::remember(str_replace("key", $key, config("jobnest.caches.lang_convert")["key"]), config("jobnest.caches.lang_convert")["time"], function () use ($key) {
            $langService = new LanguageService();

            if (is_numeric($key)) {
                return $langService->getById($key)?->code;
            }
            return $langService->getByCode($key)?->id;
        });

    }
}

if (!function_exists("getFileSize")) {
    function getFileSize(string $filePath): ?string
    {
        if (file_exists(public_path($filePath))) {
            $bytes = filesize($filePath);
            $units = ['B', 'KB', 'MB', 'GB'];
            for ($i = 0; $bytes > 1024; $i++) {
                $bytes /= 1024;
            }
            return round($bytes, 2) . ' ' . $units[$i];
        }
        return null;
    }
}
