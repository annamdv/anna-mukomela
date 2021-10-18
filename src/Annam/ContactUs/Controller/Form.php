<?php

declare(strict_types=1);

namespace Annam\ContactUs\Controller;

class Form implements \Annam\Framework\Http\ControllerInterface
{
    public function execute(): string
    {
        $page = 'contact-us.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}