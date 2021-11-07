<?php

declare(strict_types=1);

namespace Annam\Cms\Controller;

use Annam\Framework\Http\Response\Raw;
use Annam\Framework\View\Block;

class Page implements \Annam\Framework\Http\ControllerInterface
{
    private \Annam\Framework\Http\Request $request;

    private \Annam\Framework\View\PageResponse $pageResponse;

    /**
     * @param \Annam\Framework\Http\Request $request
     * @param \Annam\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \Annam\Framework\Http\Request $request,
        \Annam\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
        $this->request = $request;
    }

    /**
     * @return Raw
     */

    public function execute(): Raw
    {
        return $this->pageResponse->setBody(
            Block::class,
            '../src/Annam/Cms/view/' . $this->request->getParameter('page') . '.php'
        );
    }
}
