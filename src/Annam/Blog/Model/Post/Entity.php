<?php

declare(strict_types=1);

namespace Annam\Blog\Model\Post;

class Entity
{
    private int $postId;

    private string $title;

    private string $url;

    private string $author;

    private string $publishingDate;

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     * @return $this
     */
    public function setPostId(int $postId): Entity
    {
        $this->postId = $postId;

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
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor(string $author): Entity
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return string
     */
    public function getPublishingDate(): string
    {
        return $this->publishingDate;
    }

    /**
     * @param string $publishingDate
     * @return $this
     */
    public function setPublishingDate(string $publishingDate): Entity
    {
        $this->publishingDate = $publishingDate;

        return $this;
    }
}