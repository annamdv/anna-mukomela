<?php
/** @var \Annam\Blog\Block\CategoryList $block */
?>
<ul>
    <?php foreach ($block->getCategories() as $category) : ?>
        <li>
            <a href="/<?= $category->getUrl() ?>"><?= $category->getTitle() ?></a>
        </li>
    <?php endforeach; ?>
</ul>
