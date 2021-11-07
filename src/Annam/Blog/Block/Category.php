<?php

declare(strict_types=1);

namespace Annam\Blog\Block;

use Annam\Blog\Model\Category\Entity as CategoryEntity;
use Annam\Blog\Model\Post\Entity as PostEntity;
use Annam\Blog\Model\Author\Entity as AuthorEntity;

class Category extends \Annam\Framework\View\Block
{
    private \Annam\Framework\Http\Request $request;

    private \Annam\Blog\Model\Post\Repository $postRepository;

    private \Annam\Blog\Model\Author\Repository $authorRepository;

    protected string $template = '../src/Annam/Blog/view/category.php';

    /**
     * @param \Annam\Framework\Http\Request $request
     * @param \Annam\Blog\Model\Post\Repository $postRepository
     * @param \Annam\Blog\Model\Author\Repository $authorRepository
     */
    public function __construct(
        \Annam\Framework\Http\Request $request,
        \Annam\Blog\Model\Post\Repository $postRepository,
        \Annam\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @return CategoryEntity
     */
    public function getCategory(): CategoryEntity
    {
        return $this->request->getParameter('category');
    }

    /**
     * @return PostEntity[]
     */
    public function getCategoryPosts(): array
    {
        return $this->postRepository->getByIds(
            $this->getCategory()->getPostIds()
        );
    }

    /**
     * @param POstEntity $post
     * @return AuthorEntity|null
     */
    public function getPostAuthor(PostEntity $post): ?AuthorEntity
    {
        return $this->authorRepository->getById($post->getAuthorId());
    }
}
