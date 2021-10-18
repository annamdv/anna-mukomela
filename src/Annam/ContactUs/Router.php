<?php

declare(strict_types=1);

namespace Annam\ContactUs;

use Annam\ContactUs\Controller\Form;

class Router implements \Annam\Framework\Http\RouterInterface
{
    /**
     * @inheritdoc
     */
    public function match (string $requestUrl): string
    {
        if ($requestUrl === 'contact-us') {
            return Form::class;
        }

        return '';
    }
}