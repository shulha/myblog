<?php

return [
    "root" => [
        "pattern" => "/",
        "method" => "GET",
        "action" => "Mystore\\Controller\\IndexController@index",
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
    "admin" => [
        "pattern" => "/adminzone",
        "method" => "GET",
        "action" => "Mystore\\Controller\\AdminController@index"
//        "middlewares" => ['admin', 'age']
    ],

    "blog" => [
        "pattern" => "/blog",
        "method" => "GET",
        "action" => "Mystore\\Controller\\BlogController@index"
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
//-------------------------------------------------------------------------------
    "catalog" => [
        "pattern" => "/category",
        "method" => "GET",
        "action" => "Mystore\\Controller\\CategoriesController@index"
    ],
    "category" => [
        "pattern" => "/category/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\CategoriesController@menu"
    ],
    "all_categories" => [
        "pattern" => "/adminzone/categories",
        "method" => "GET",
        "action" => "Mystore\\Controller\\CategoriesController@allmenu"
    ],
    "store_category" => [
        "pattern" => "/adminzone/categories",
        "method" => "POST",
        "action" => "Mystore\\Controller\\CategoriesController@store"
    ],
    "create_category" => [
        "pattern" => "/adminzone/categories/create",
        "method" => "GET",
        "action" => "Mystore\\Controller\\CategoriesController@create"
    ],
    "destroy_category" => [
        "pattern" => "/adminzone/categories/{id}",
        "method" => "DELETE",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\CategoriesController@destroy"
    ],
    "edit_category" => [
        "pattern" => "/adminzone/categories/edit/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\CategoriesController@edit"
    ],
    "update_category" => [
        "pattern" => "/adminzone/categories/edit/{id}",
        "method" => "POST",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\CategoriesController@update"
    ],
//-------------------------------------------------------------------------------
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
