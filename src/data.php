<?php

declare(strict_types=1);

function blogGetPost(): array
{
    return [
        1 => [
            'post_id'               => 1,
            'title'                 => 'Post 1',
            'url'                   => 'post-1',
            'author'                => 'Corey Dulimba',
            'publishing_date'       => '06.10.2021'
        ],
        2 => [
            'post_id'               => 2,
            'title'                 => 'Post 2',
            'url'                   => 'post-2',
            'author'                => 'Peter Sheldon',
            'publishing_date'       => '15.08.2021'
        ],
        3 => [
            'post_id'               => 3,
            'title'                 => 'Post 3',
            'url'                   => 'post-3',
            'author'                => 'Corey Gelato',
            'publishing_date'       => '08.04.2021'
        ],
        4 => [
            'post_id'               => 4,
            'title'                 => 'Post 4',
            'url'                   => 'post-4',
            'author'                => 'Corey Dulimba',
            'publishing_date'       => '25.12.2020'
        ],
        5 => [
            'post_id'               => 5,
            'title'                 => 'Post 5',
            'url'                   => 'post-5',
            'author'                => 'Peter Sheldon',
            'publishing_date'       => '18.04.2021'
        ],
        6 => [
            'post_id'               => 6,
            'title'                 => 'Post 6',
            'url'                   => 'post-6',
            'author'                => 'Corey Gelato',
            'publishing_date'       => '28.01.2021'
        ]
    ];
}

function blogGetCategoryPost(int $categoryId): array
{
    $categories = blogGetCategory();

    if (!isset($categories[$categoryId])) {
        throw new InvalidArgumentException("Category with ID $categoryId does not exist");
    }

    $postsForCategory = [];
    $posts = blogGetPost();

    foreach ($categories[$categoryId]['posts'] as $postId) {
        if (!isset($posts[$postId])) {
            throw new InvalidArgumentException("Post with ID $postId from category $categoryId does not exist");
        }

        $postsForCategory[] = $posts[$postId];
    }

    return $postsForCategory;
}

function blogGetPostByUrl(string $url): ?array
{
    $data = array_filter(
        blogGetPost(),
        static function ($post) use ($url) {
            return $post['url'] === $url;
        }
    );

    return array_pop($data);
}
function blogGetNewPosts(): ?array
{
    $postsGetNewPost = [];
    $posts = blogGetPost();

    usort($posts, function ($a, $b) {
        return (strtotime($a['publishing_date']) - strtotime($b['publishing_date']));
    });

    $postsSlice = array_slice($posts, 0, 3);

    foreach ($postsSlice as $postsNew) {
        $postsGetNewPost[] = $postsNew;
    }

    return $postsGetNewPost;
}
