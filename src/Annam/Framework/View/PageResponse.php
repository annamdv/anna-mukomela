<?php
declare(strict_types=1);

namespace Annam\Framework\View;

use Annam\Framework\Http\Response\Html;

class PageResponse extends Html
{
    private \Annam\Framework\View\Renderer $renderer;

    /**
     * @param \Annam\Framework\View\Renderer $renderer
     */
    public function __construct(
        \Annam\Framework\View\Renderer $renderer
    ) {
        $this->renderer = $renderer;
    }

    /**
     * @param string $contentBlockClass
     * @param string $template
     * @return PageResponse
     */
    public function setBody(string $contentBlockClass, string $template = ''): PageResponse
    {
        return parent::setBody((string) $this->renderer->setContent($contentBlockClass, $template));
    }
}
