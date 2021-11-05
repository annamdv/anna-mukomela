<?php

declare(strict_types=1);

namespace Annam\Blog;

use Annam\Blog\Controller\Category;
use Annam\Blog\Controller\Post;

class Router implements \Annam\Framework\Http\RouterInterface
{
    private \Annam\Framework\Http\Request $request;

    private Model\Category\Repository $categoryRepository;

    /**
     * @param \Annam\Framework\Http\Request $request
     * @param Model\Category\Repository $categoryRepository
     * @param Model\Post\Repository $postRepository
     */
    public function __construct(
        \Annam\Framework\Http\Request $request,
        \Annam\Blog\Model\Category\Repository $categoryRepository,
        \Annam\Blog\Model\Post\Repository $postRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * @inheritdoc
     */
    public function match(string $requestUrl): string
    {
        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category', $category);
            return Category::class;
        }

        if ($post = $this->postRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('post', $post);
            return Post::class;
        }

        return '';
    }
}
