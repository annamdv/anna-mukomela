<?php
declare(strict_types=1);

namespace Annam\Blog\Model\Category;

class Repository
{
    private \DI\FactoryInterface $factory;

    /**
     * @param \DI\FactoryInterface $factory
     */
    public function __construct(\DI\FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return Entity[]
     */
    public function getList(): array
    {
        return [
            1 => $this->makeEntity()
                ->setCategoryId(1)
                ->setTitle('Best Practices')
                ->setUrl('best-practices')
                ->setPostIds([1, 2, 3]),
            2 => $this->makeEntity()
                ->setCategoryId(1)
                ->setTitle('Customer Stories')
                ->setUrl('customer-stories')
                ->setPostIds([3, 4, 5]),
            3 => $this->makeEntity()
                ->setCategoryId(1)
                ->setTitle('Marketplace')
                ->setUrl('Marketplace')
                ->setPostIds([2, 4, 6]),
        ];
    }

    /**
     * @param string $url
     * @return ?Entity
     */
    public function getByUrl(string $url): ?Entity
    {
        $categories = array_filter(
            $this->getList(),
            static function ($category) use ($url) {
                return $category->getUrl() === $url;
            }
        );

        return array_pop($categories);
    }

    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}
