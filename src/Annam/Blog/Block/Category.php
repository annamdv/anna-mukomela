<?php
declare(strict_types=1);

namespace Annam\Blog\Block;

use Annam\Blog\Model\Category\Entity as CategoryEntity;
use Annam\Blog\Model\Post\Entity as PostEntity;

class Category extends \Annam\Framework\View\Block
{
    private \Annam\Framework\Http\Request $request;

    private \Annam\Blog\Model\Post\Repository $postRepository;

    protected string $template = '../src/Annam/Blog/view/category.php';

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
}