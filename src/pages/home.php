<section title="Recent Posts">
        <h1>Recent Posts</h1>
        <div class="post-list">
            <?php foreach (blogGetNewPosts() as $post) : ?>
                <div class="post">
                    <a href="/<?= $post['url'] ?>" title="<?= $post['title'] ?>"><?= $post['title'] ?></a>
                    <a href="/<?= $post['url'] ?>" title="<?= $post['title'] ?>">
                        <img src="/post-placeholder.png" alt=" <?= $post['title'] ?>" width="200"/>
                    </a>
                    <div>Author: <?= $post['author'] ?></div>
                    <div>Publishing Date: <?= $post['publishing_date'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
</section>