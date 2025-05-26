<?php

return [
    "modules" => ["admin", "front"],

    "default_user_type" =>  "candidate",
    "default_user_name" =>  "User",

    "user_types" => ["candidate", "company"],

    "caches" => [
        "job_categories" => [
            "key" => "job_categories",
            "time" => 60*60*24
        ]
    ]
];
