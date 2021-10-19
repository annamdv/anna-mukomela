<?php

declare(strict_types=1);

namespace Annam\Cms;

use Annam\Cms\Controller\Page;

class Router implements \Annam\Framework\Http\RouterInterface
{
    private \Annam\Framework\Http\Request $request;

    /**
     * @param  \Annam\Framework\Http\Request $request
     */
    public function __construct(
        \Annam\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        $cmsPage = [
            '',
            'test-page',
            'test-page-2'
        ];

        if (in_array($requestUrl, $cmsPage)) {
            $this->request->setParameter('page', $requestUrl ?: 'home');

            return Page::class;
        }

        return '';
    }
}
