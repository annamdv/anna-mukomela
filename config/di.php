<?php

declare(strict_types=1);

return [
    \Annam\Framework\Http\RequestDispatcher::class => \DI\autowire()->constructorParameter(
         'routers',
        [
            \DI\get(\Annam\Cms\Router::class),
            \DI\get(\Annam\Blog\Router::class),
            \DI\get(\Annam\ContactUs\Router::class),
        ]
    )
];
