<?php

declare(strict_types=1);

namespace Annam\Blog;

use DVCampus\Blog\Controller\Category;
use DVCampus\Blog\Controller\Post;

class Router implements \Annam\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($data = blogGetCategoryByUrl($requestUrl)) {
            return Category::class;
        }

        if ($data = blogGetPostByUrl($requestUrl)) {
            return Post::class;
        }

        return '';
    }
}
