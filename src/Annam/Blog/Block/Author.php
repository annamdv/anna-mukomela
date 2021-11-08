<?php

declare(strict_types=1);

namespace Annam\Blog\Block;

use Annam\Blog\Model\Author\Entity as AuthorEntity;
use Annam\Blog\Model\Post\Entity as PostEntity;

class Author extends \Annam\Framework\View\Block
{
    private \Annam\Framework\Http\Request $request;

    private \Annam\Blog\Model\Post\Repository $postRepository;

    protected string $template = '../src/Annam/Blog/view/author.php';

    /**
     * @param \Annam\Framework\Http\Request $request
     * @param \Annam\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \Annam\Framework\Http\Request $request,
        \Annam\Blog\Model\Post\Repository $postRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
    }

    /**
     * @return AuthorEntity
     */
    public function getAuthor(): AuthorEntity
    {
        return $this->request->getParameter('author');
    }

    /**
     * @return PostEntity[]
     */
    public function getAuthorPosts(): array
    {
        return $this->postRepository->getByAuthorId($this->getAuthor()->getAuthorId());
    }
}
