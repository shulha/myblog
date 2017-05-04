<?php

return [
    "root" => [
        "pattern" => "/",
        "method" => "GET",
        "action" => "Myblog\\Controller\\IndexController@index"
    ],
    "blog" => [
        "pattern" => "/blog",
        "method" => "GET",
        "action" => "Myblog\\Controller\\BlogController@index"
    ],
    "blog_article" => [
        "pattern" => "/blog/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Myblog\\Controller\\BlogController@single"
    ],
    "blog_article_edit" => [
        "pattern" => "/blog/edit/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Myblog\\Controller\\BlogController@edit",
        "roles"  => ["ADMIN"]
    ],
    "login" => [
        "pattern" => "/login",
        "method" => "GET",
        "action" => "Shulha\\Framework\\Controller\\AuthController@login"
    ],
    "registration" => [
        "pattern" => "/registration",
        "method" => "GET",
        "action" => "Shulha\\Framework\\Controller\\AuthController@registration"
    ],
    "auth" => [
        "pattern" => "/signin",
        "method" => "POST",
        "action" => "Shulha\\Framework\\Controller\\AuthController@signin"
    ],
    "save_user" => [
        "pattern" => "/submit",
        "method" => "POST",
        "action" => "Shulha\\Framework\\Controller\\AuthController@saveReg"
    ]
];
