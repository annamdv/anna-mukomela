# get categories with posts
SELECT DISTINCT `category`.* FROM `category` JOIN `category_post` USING(`category_id`);
# get authors with posts
SELECT DISTINCT `author`.* FROM `author` JOIN `post` USING(`author_id`);
# get Category/Post/Author by ID
SELECT * FROM `category` WHERE `category_id` = 10;
SELECT * FROM `post` WHERE `post_id` = 7;
SELECT * FROM `author` WHERE `author_id` = 20;
# get Category/Post/Author by URL
SELECT * FROM `category` WHERE `url` = 'events';
SELECT * FROM `post` WHERE `url` = 'post_7';
SELECT * FROM `author` WHERE `url` = 'julian_mad';
# get Posts by Category
SELECT `post`.* FROM `post` JOIN `category_post` USING(`post_id`)
WHERE `category_post`.`category_id` = 10;
# authors sorted by number of posts (highest to lowest)
SELECT `author`.*, COUNT(*) as `number_of_posts` FROM `author` JOIN `post` USING(`author_id`)
GROUP BY `author`.`author_id`
ORDER BY `number_of_posts` DESC;
# categories with the highest number of authors;
SELECT `category`.*, COUNT(DISTINCT `post`.`author_id`) as `number_of_authors` FROM `category_post` JOIN `post` USING(`post_id`) JOIN `category` USING(`category_id`)
GROUP BY `category_post`.`category_id`
ORDER BY `number_of_authors` DESC;
# get authors without namesakes
SELECT `name` FROM `author`
WHERE `name` NOT IN
      (
          SELECT `name` FROM `author`
          GROUP BY `name`
          HAVING COUNT(`name`) > 1
      );
