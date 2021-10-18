<?php

declare(strict_types=1);

namespace Annam\Blog;

use Annam\Blog\Controller\Category;
use Annam\Blog\Controller\Post;

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
     * @inheritdoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($data = blogGetCategoryByUrl($requestUrl)) {
            $this->request->setParameter ('category', $data);
            return Category::class;
        }

        if ($data = blogGetPostByUrl($requestUrl)) {
            $this->request->setParameter ('post', $data);
            return Post::class;
        }

        return '';
    }
}
