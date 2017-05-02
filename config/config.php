<?php

return [
    "db" => [
        'driver' => 'pgsql',
        'host'   => 'localhost',
        'database' => 'myapp',
        'username'   => 'postgres',
        'password' => '321',
        'charset'  => 'utf8',
        'schema'   => 'public',
    ],
    "path_to_views" => realpath(dirname(__FILE__) . "/../src/View"),
//    "routes" => include('routes.php'),
    "services" => include('services.php'),
    "router" => [
        'config' => include('routes.php')
    ],
];
