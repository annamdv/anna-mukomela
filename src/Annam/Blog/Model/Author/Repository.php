<?php

declare(strict_types=1);

namespace Annam\Blog\Model\Author;

class Repository
{
    public const TABLE = 'author';

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
            1 => $this->makeEntity()->setAuthorId(1)
                ->setName('Corey Dulimba')
                ->setUrl('corey-dulimba'),
            2 => $this->makeEntity()->setAuthorId(2)
                ->setName('Peter Sheldon')
                ->setUrl('peter-sheldon'),
            3 => $this->makeEntity()->setAuthorId(3)
                ->setName('Corey Gelato')
                ->setUrl('corey-gelato')
        ];
    }

    /**
     * @param string $url
     * @return ?Entity
     */
    public function getByUrl(string $url): ?Entity
    {
        $authors = array_filter(
            $this->getList(),
            static function ($author) use ($url) {
                return $author->getUrl() === $url;
            }
        );

        return array_pop($authors);
    }

    /**
     * @param int $authorId
     * @return ?Entity
     */
    public function getById(int $authorId): ?Entity
    {
        $authors = array_filter(
            $this->getList(),
            static function ($author) use ($authorId) {
                return $author->getAuthorId() === $authorId;
            }
        );

        return array_pop($authors);
    }

    /**
     * @return Entity
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}
