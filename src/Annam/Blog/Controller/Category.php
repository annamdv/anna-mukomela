<?php

declare(strict_types=1);

namespace Annam\Blog\Controller;

use Annam\Framework\Http\ControllerInterface;
use Annam\Framework\Http\Response\Raw;

class Category implements \Annam\Framework\Http\ControllerInterface
{
    private \Annam\Framework\View\PageResponse $pageResponse;

    /**
     * @param \Annam\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \Annam\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
    }

    /**
     * @return Raw
     */

    public function execute(): Raw
    {
        return $this->pageResponse->setBody(\Annam\Blog\Block\Category::class);
    }
}
