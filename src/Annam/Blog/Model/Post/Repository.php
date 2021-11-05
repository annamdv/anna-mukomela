<?php

declare(strict_types=1);

namespace Annam\Blog\Model\Post;

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
            1 => $this->makeEntity()->setPostId(1)
                ->setTitle('Post 1')
                ->setUrl('post-1')
                ->setAuthor('Corey Dulimba')
                ->setPublishingDate('2021-10-06'),
            2 => $this->makeEntity()->setPostId(2)
                ->setTitle('Post 2')
                ->setUrl('post-2')
                ->setAuthor('Peter Sheldon')
                ->setPublishingDate('2021-08-15'),
            3 => $this->makeEntity()->setPostId(3)
                ->setTitle('Post 3')
                ->setUrl('post-3')
                ->setAuthor('Corey Gelato')
                ->setPublishingDate('2021-04-08'),
            4 => $this->makeEntity()->setPostId(4)
                ->setTitle('Post 4')
                ->setUrl('post-4')
                ->setAuthor('Corey Dulimba')
                ->setPublishingDate('2020-12-25'),
            5 => $this->makeEntity()->setPostId(5)
                ->setTitle('Post 5')
                ->setUrl('post-5')
                ->setAuthor('Peter Sheldon')
                ->setPublishingDate('2021-04-18'),
            6 => $this->makeEntity()->setPostId(6)
                ->setTitle('Post 6')
                ->setUrl('post-6')
                ->setAuthor('Corey Gelato')
                ->setPublishingDate('2021-01-28')
        ];
    }

    /**
     * @param string $url
     * @return ?Entity
     */
    public function getByUrl(string $url): ?Entity
    {
        $data = array_filter(
            $this->getList(),
            static function ($post) use ($url) {
                return $post->getUrl() === $url;
            }
        );

        return array_pop($data);
    }

    /**
     * @param array $postIds
     * @return Entity[]
     */
    public function getByIds(array $postIds)
    {
        return array_intersect_key(
            $this->getList(),
            array_flip($postIds)
        );
    }

    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}