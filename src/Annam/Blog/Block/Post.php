<?php

declare(strict_types=1);

namespace Annam\Blog\Block;

use Annam\Blog\Model\Post\Entity as PostEntity;
use Annam\Blog\Model\Author\Entity as AuthorEntity;

class Post extends \Annam\Framework\View\Block
{
    private \Annam\Framework\Http\Request $request;

    private \Annam\Blog\Model\Author\Repository $authorRepository;

    protected string $template = '../src/Annam/Blog/view/post.php';

    /**
     * @param \Annam\Framework\Http\Request $request
     * @param \Annam\Blog\Model\Author\Repository $authorRepository
     */
    public function __construct(
        \Annam\Framework\Http\Request $request,
        \Annam\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @return PostEntity
     */
    public function getPost(): PostEntity
    {
        return $this->request->getParameter('post');
    }

    /**
     * @return AuthorEntity|null
     */
    public function getAuthor(): ?AuthorEntity
    {
        return $this->authorRepository->getById($this->getPost()->getAuthorId());
    }
}
