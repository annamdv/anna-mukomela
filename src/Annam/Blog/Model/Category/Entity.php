<?php
declare(strict_types=1);

namespace Annam\Blog\Model\Category;

class Entity
{
    private int $categoryId;

    private string $title;

    private string $url;

    private array $posts;

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;

    }

    /**
     * @param int $categoryId
     * @return $this
     */
    public function setCategoryId(int $categoryId): Entity
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): Entity
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): Entity
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return array
     */
    public function getPostIds(): array
    {
        return $this->posts;
    }

    /**
     * @param array $posts
     * @return $this
     */
    public function setPostIds(array $posts): Entity
    {
        $this->posts = $posts;

        return $this;
    }
}
