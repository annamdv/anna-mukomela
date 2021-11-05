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
                <div>Author: <a href="/<?= $post->getAuthor() ?>" title="<?= $post->getAuthor() ?>"><?= $post->getAuthor() ?></a></div>
                <span>Publishing Date: <?= date($post->getPublishingDate()) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>