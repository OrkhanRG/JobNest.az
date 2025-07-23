<?php

use Illuminate\Support\Str;

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
