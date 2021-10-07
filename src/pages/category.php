<section title="Posts">
    <h1><?= $data['title'] ?></h1>
    <div class="ost-list">
        <?php foreach (blogGetCategoryPost($data['category_id']) as $data) : ?>
            <div class="post">
                <a href="/<?= $data['url'] ?>" title="<?= $data['title'] ?>">
                    <img src="/post-placeholder.png" alt="<?= $data['title'] ?>" width="200"/><br>
                </a>
                <a href="/<?= $data['url'] ?>" title="<?= $data['title'] ?>"><?= $data['title'] ?></a>
                <div>Author: <a href="/<?= $data['author'] ?>" title="<?= $data['author'] ?>"><?= $data['author'] ?></a></div>
                <span>Publishing Date: <?= date($data['publishing_date']) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>