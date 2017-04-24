<?php

return [
    "db" => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'myapp',
        'user' => 'root',
        'password' => 'masterJedi'
    ],
    "path_to_views" => realpath(dirname(__FILE__) . "/../src/View"),
//    "path_to_views" => dirname(__FILE__, 2) . '/src/View',
//    "routes" => include('routes.php'),
    "services" => include('services.php'),
    "router" => [
        'config' => include('routes.php')
    ],
];