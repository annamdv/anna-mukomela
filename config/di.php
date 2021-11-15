<?php

declare(strict_types=1);

use Annam\Framework\Database\Adapter\MySQL;

return [
    \Annam\Framework\Database\Adapter\AdapterInterface::class => DI\get(
        MySQL::class
    ),
    MySQL::class => DI\autowire()->constructorParameter(
        'connectionParams',
        [
            MySQL::DB_NAME     => 'dv_campus_blog',
            MySQL::DB_USER     => 'dv_campus_blog_annam',
            MySQL::DB_PASSWORD => 'Tv]2{!.u8d{K7F}~',
            MySQL::DB_HOST     => 'mysql',
            MySQL::DB_PORT     => '3306'
        ]
    ),
    \Annam\Framework\Http\RequestDispatcher::class => \DI\autowire()->constructorParameter(
        'routers',
        [
            \DI\get(\Annam\Cms\Router::class),
            \DI\get(\Annam\Blog\Router::class),
            \DI\get(\Annam\ContactUs\Router::class),
            \DI\get(\Annam\Install\Router::class)
        ]
    )
];
