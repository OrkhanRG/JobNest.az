<?php

return [
    "modules" => ["admin", "front"],

    //defaults
    "default_user_type" =>  "candidate",
    "default_user_name" =>  "User",
    "default_user_avatar" => "assets/admin/custom/images/default/user.png",
    "default" => [
        "pagination" => [
            "per_page_show_count" => 100
        ]
    ],

    "user_types" => ["candidate", "company"],

    "caches" => [
        "job_categories" => [
            "key" => "job_categories",
            "time" => 60*60*24
        ],
        "lang_convert" => [
            "key" => "lang_convert_key",
            "time" => 60*60*24*7
        ]
    ],

    "currencies" => [
        "USD" => "$",
        "EUR" => "€",
        "GBP" => "£",
        "JPY" => "¥",
        "CNY" => "¥",
        "INR" => "₹",
        "RUB" => "₽",
        "KRW" => "₩",
        "TRY" => "₺",
        "AUD" => "$",
        "CAD" => "$",
        "AZN" => "₼",
        "BDT" => "৳",
        "BHD" => ".د.ب",
        "EGP" => "£",
        "SAR" => "﷼",
        "AED" => "د.إ",
        "NGN" => "₦",
        "BRL" => "R$",
        "ZAR" => "R",
        "ILS" => "₪",
        "ARS" => "$",
        "MXN" => "$",
    ]
];
