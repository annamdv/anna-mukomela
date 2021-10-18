<?php

declare(strict_types=1);

namespace Annam\Blog\Controller;

class Post implements \Annam\Framework\Http\ControllerInterface
{
    private \Annam\Framework\Http\Request $request;
    public function __construct(
        \Annam\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    public function execute(): string
    {
        $data = $this->request->getParameter('post');
        $page = 'post.php';

        ob_start();
        require_once "../src/page.php";
        return ob_get_clean();
    }
}