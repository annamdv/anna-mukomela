<?php

declare(strict_types=1);

namespace Annam\Cms;

use Annam\Cms\Controller\Page;

class Router implements \Annam\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($requestUrl === '') {
            return Page::class;
        }

        return '';
    }
}
