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
