<?php

declare(strict_types=1);

namespace Annam\Install;

use Annam\Install\Controller\Index;

class Router implements \Annam\Framework\Http\RouterInterface
{
    private \Annam\Framework\Http\Request $request;

    /**
     * @param \Annam\Framework\Http\Request $request
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
        if ($this->request->getRequestUrl() === 'install') {
            return Index::class;
        }
        return '';
    }
}
