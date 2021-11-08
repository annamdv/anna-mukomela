<?php

declare(strict_types=1);

namespace Annam\Blog\Block;

use Annam\Blog\Model\Category\Entity as CategoryEntity;

class CategoryList extends \Annam\Framework\View\Block
{
    private \Annam\Blog\Model\Category\Repository $categoryRepository;

    protected string $template = '../src/Annam/Blog/view/category_list.php';

    /**
     * @param \Annam\Blog\Model\Category\Repository $categoryRepository
     */
    public function __construct(\Annam\Blog\Model\Category\Repository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return CategoryEntity[]
     */
    public function getCategories(): array
    {
        return $this->categoryRepository->getList();
    }
}