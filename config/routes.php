<?php

return [
    "root" => [
        "pattern" => "/",
        "method" => "GET",
        "action" => "Myblog\\Controller\\IndexController@index"
    ],
    "blog" =>
        [
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
    ]
];
