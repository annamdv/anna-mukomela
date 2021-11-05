<?php
/** @var \Annam\Blog\Block\Post $block */

$post = $block->getPost();
?>
<div class="post-page">
    <img src="/post-placeholder.png" alt="<?= $post->getTitle() ?>" width="300"/>
    <h1><?= $post->getTitle() ?></h1>
    <p><?= $post->getAuthor() ?></p>
    <span>Publishing date: <?= $post->getPublishingDate() ?></span>
</div>