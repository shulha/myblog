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
    "logout" => [
        "pattern" => "/logout",
        "method" => "GET",
        "action" => "Shulha\\Framework\\Controller\\AuthController@logout"
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
//-------------------------------------------------------------------------------

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
    "products_of_category" => [
        "pattern" => "/product/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@index"
    ],
    "product" => [
        "pattern" => "/product/show/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@show"
    ],
    "create_product" => [
        "pattern" => "/adminzone/products/create",
        "method" => "GET",
        "action" => "Mystore\\Controller\\ProductController@create"
    ],
    "last_product" => [
        "pattern" => "/adminzone/products",
        "method" => "GET",
        "action" => "Mystore\\Controller\\ProductController@last"
    ],
    "store_product" => [
        "pattern" => "/adminzone/products",
        "method" => "POST",
        "action" => "Mystore\\Controller\\ProductController@store"
    ],
    "all_parameters" => [
        "pattern" => "/adminzone/products/parameters",
        "method" => "GET",
        "action" => "Mystore\\Controller\\ParametersController@show"
    ],
    "save_parameters" => [
        "pattern" => "/adminzone/products/parameters",
        "method" => "POST",
        "action" => "Mystore\\Controller\\ParametersController@save"
    ],
    "edit_product" => [
        "pattern" => "/adminzone/products/edit/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@edit"
    ],
    "update_product" => [
        "pattern" => "/adminzone/products/edit/{id}",
        "method" => "POST",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@update"
    ],
    "del_image" => [
        "pattern" => "/adminzone/products/del_image",
        "method" => "POST",
        "action" => "Mystore\\Controller\\ProductController@del_image"
    ],
    "destroy_product" => [
        "pattern" => "/adminzone/products/{id}",
        "method" => "DELETE",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@destroy"
    ],
//-------------------------------------------------------------------------------
    "basket" => [
        "pattern" => "/basket",
        "method" => "GET",
        "action" => "Mystore\\Controller\\BasketController@show"
    ],
    "checkout" => [
        "pattern" => "/checkout",
        "method" => "POST",
        "action" => "Mystore\\Controller\\BasketController@checkout"
    ],
    "all_orders" => [
        "pattern" => "/adminzone/orders",
        "method" => "GET",
        "action" => "Mystore\\Controller\\OrderController@orders"
    ],
    "show_order" => [
        "pattern" => "/adminzone/orders/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\OrderController@show"
    ],
//-------------------------------------------------------------------------------
    "add_to_cart" => [
        "pattern" => "/cart-product/{id}",
        "method" => "GET",
        "variables" => [
            "id" => "\d+"
        ],
        "action" => "Mystore\\Controller\\ProductController@cart"
    ],

];
