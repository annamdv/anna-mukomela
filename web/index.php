<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

$requestDispatcher = new \Annam\Framework\Http\RequestDispatcher([
    new \Annam\Cms\Router(),
    new \Annam\Blog\Router(),
    new \Annam\ContactUs\Router(),
]);
$requestDispatcher->dispatch();

exit;
