<?php

declare(strict_types=1);

namespace Annam\ContactUs\Controller;

use Annam\Framework\Http\ControllerInterface;
use Annam\Framework\Http\Response\Raw;
use Annam\Framework\View\Block;

class Form implements ControllerInterface
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
        return $this->pageResponse->setBody(
            Block::class,
            '../src/Annam/ContactUs/view/contact-us.php'
        );
    }
}
