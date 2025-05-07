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
    function slugify(string $text, string $model): string {
        $slug = Str::slug($text);
        $original = $slug;
        $i = 1;

        while ($model::query()->where("slug", $slug)->exists()) {
            $slug = $original."-".$i++;
        }

        return $slug;
    }
}
