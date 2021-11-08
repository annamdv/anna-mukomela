<?php

/** @var \Annam\Blog\Block\Post $block */

$post = $block->getPost();
$author = $block->getAuthor();

?>

<div class="post-page">
    <img src="/post-placeholder.png" alt="<?= $post->getTitle() ?>" width="300"/>
    <h1><?= $post->getTitle() ?></h1>
    <?php if ($author) : ?>
        <a href="<?= $author->getUrl() ?>" class="author-name">Author: <?= $author->getName() ?></a>
    <?php else : ?>
        <span>No Author</span>
    <?php endif ?>
    <span>Publishing date: <?= $post->getPublishingDate() ?></span>
</div>