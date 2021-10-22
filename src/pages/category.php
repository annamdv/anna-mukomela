<?php
/** * @var \Annam\Catalog\Model\Category\Entity $category */
?>
<section title="Posts">
    <h1><?= $category->getTitle() ?></h1>
    <div class="post-list">
        <?php foreach (blogGetCategoryPost($category->getCategoryId) as $post) : ?>
            <div class="post">
                <a href="/<?= $post['url'] ?>" title="<?= $post['title'] ?>">
                    <img src="/post-placeholder.png" alt="<?= $post['title'] ?>" width="200"/><br>
                </a>
                <a href="/<?= $post['url'] ?>" title="<?= $post['title'] ?>"><?= $post['title'] ?></a>
                <div>Author: <a href="/<?= $post['author'] ?>" title="<?= $post['author'] ?>"><?= $post['author'] ?></a></div>
                <span>Publishing Date: <?= date($post['publishing_date']) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>