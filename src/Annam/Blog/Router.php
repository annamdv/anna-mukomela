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
     */
    public function __construct(
        \Annam\Framework\Http\Request $request,
        \Annam\Blog\Model\Category\Repository $categoryRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @inheritdoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category', $category);
            return Category::class;
        }

        if ($data = blogGetPostByUrl($requestUrl)) {
            $this->request->setParameter('post', $data);
            return Post::class;
        }

        return '';
    }
}
