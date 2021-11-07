<?php

/** * @var \Annam\Blog\Block\Category $block */

?>

<div title="Posts">
    <h1><?= $block->getCategory()->getTitle() ?></h1>
    <div class="post-list">
        <?php foreach ($block->getCategoryPosts() as $post) : ?>
            <div class="post">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getTitle() ?>">
                    <img src="/post-placeholder.png" alt="<?= $post->getTitle() ?>" width="200"/><br>
                </a>
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getTitle() ?>"><?= $post->getTitle() ?></a>
                <?php $author = $block->getPostAuthor($post);
                if ($author) : ?>
                    <a href="/<?= $author->getUrl() ?>" class="author-name">Author: <?= $author->getName() ?></a>
                <?php else : ?>
                    <span>No author</span>
                <?php endif ?>
                <span>Publishing Date: <?= $post->getPublishingDate() ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>