<?php

namespace Annam\Blog\Controller;

class Category implements \Annam\Framework\Http\ControllerInterface
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

    public function execute(): string
    {
        $category = $this->request->getParameter('category');
        $page = 'category.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}
