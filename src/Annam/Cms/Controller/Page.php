<?php

declare(strict_types=1);

namespace Annam\Cms\Controller;

class Page implements \Annam\Framework\Http\ControllerInterface
{
    private \Annam\Framework\Http\Request  $request;

    /**
     * @param \DVCampus\Framework\Http\Request $request
     */
    public function  __construct(
        \Annam\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    public function execute(): string
    {
        $page = $this->request->getParameter('page') . '.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}
