<?php

return [
    "modules" => ["admin", "front"],

    //defaults
    "default_user_type" =>  "candidate",
    "default_user_name" =>  "User",
    "default_user_avatar" => "assets/admin/custom/images/default/user.png",

    "user_types" => ["candidate", "company"],

    "caches" => [
        "job_categories" => [
            "key" => "job_categories",
            "time" => 60*60*24
        ]
    ],
];
