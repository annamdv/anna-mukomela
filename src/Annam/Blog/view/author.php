<?php

/** @var \Annam\Blog\Block\Author $block */

$author = $block->getAuthor();

?>

<section title="author-page">
    <h1><?= $author->getName() ?></h1>
    <div class="post-list">
        <?php foreach ($block->getAuthorPosts() as $post) : ?>
            <div class="post">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getTitle() ?>">
                    <img src="/post-placeholder.png" alt="<?= $post->getTitle() ?>" width="200"/>
                </a>
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getTitle() ?>"><?= $post->getTitle() ?></a>
                <span class="author-name">Author: <?= $post->getAuthorId() ?></span>
                <span><?= $post->getPublishingDate() ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>
