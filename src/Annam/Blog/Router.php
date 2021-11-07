<?php

declare(strict_types=1);

namespace Annam\Blog;

use Annam\Blog\Controller\Category;
use Annam\Blog\Controller\Post;
use Annam\Blog\Controller\Author;

class Router implements \Annam\Framework\Http\RouterInterface
{
    private \Annam\Framework\Http\Request $request;

    private \Annam\Blog\Model\Category\Repository $categoryRepository;

    private \Annam\Blog\Model\Post\Repository $postRepository;

    private \Annam\Blog\Model\Author\Repository $authorRepository;

    /**
     * @param \Annam\Framework\Http\Request $request
     * @param \Annam\Blog\Model\Category\Repository $categoryRepository
     * @param \Annam\Blog\Model\Post\Repository $postRepository
     * @param \Annam\Blog\Model\Author\Repository $authorRepository
     */
    public function __construct(
        \Annam\Framework\Http\Request $request,
        \Annam\Blog\Model\Category\Repository $categoryRepository,
        \Annam\Blog\Model\Post\Repository $postRepository,
        \Annam\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @inheritdoc
     */
    public function match(string $requestUrl): string
    {
        if ($category = $this->categoryRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('category', $category);
            $this->request->setParameter('posts', $this->postRepository->getByIds($category->getPostIds()));
            return Category::class;
        }

        if ($post = $this->postRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('post', $post);
            return Post::class;
        }

        if ($author = $this->authorRepository->getByUrl($requestUrl)) {
            $this->request->setParameter('author', $author);
            return Author::class;
        }

        return '';
    }
}
