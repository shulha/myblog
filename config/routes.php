<?php

return [
    "root" => [
        "pattern" => "/",
        "method" => "GET",
        "action" => "Mystore\\Controller\\IndexController@index",
//        "middlewares" => ['admin', 'age']
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
    "login" => [
        "pattern" => "/login",
        "method" => "GET",
        "action" => "Shulha\\Framework\\Controller\\AuthController@login"
    ],
    "save_user" => [
        "pattern" => "/submit",
        "method" => "POST",
        "action" => "Shulha\\Framework\\Controller\\AuthController@saveReg"
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

    "catalog" => [
        "pattern" => "/category",
        "method" => "GET",
        "action" => "Mystore\\Controller\\CategoryController@index"
    ],
    "category" => [
        "pattern" => "/category/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\CategoryController@menu"
    ],
    "category_products" => [
        "pattern" => "/product/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@index"
    ],
    "product" => [
        "pattern" => "/show/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@show"
    ],
];
