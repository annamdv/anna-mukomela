<?php

declare(strict_types=1);

namespace Annam\Blog\Block;

use Annam\Blog\Model\Post\Entity as PostEntity;

class Post extends \Annam\Framework\View\Block
{
    private \Annam\Framework\Http\Request $request;

    protected string $template = '../src/Annam/Blog/view/post.php';

    /**
     * @param \Annam\Framework\Http\Request $request
     */
    public function __construct(
        \Annam\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    /**
     * @return PostEntity
     */
    public function getPost(): PostEntity
    {
        return $this->request->getParameter('post');
    }
}