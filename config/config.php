<?php

return [
    "db" => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'myapp',
        'user' => 'root',
        'passwd' => '123'
    ],
    "path_to_views" => realpath(dirname(__FILE__) . "/../src/View"),
//    "routes" => include('routes.php'),
    "services" => include('services.php'),
    "router" => [
        'config' => include('routes.php')
    ],
];
