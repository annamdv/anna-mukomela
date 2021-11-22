DROP TABLE IF EXISTS `category_post`;
#---
DROP TABLE IF EXISTS `category`;
#---
DROP TABLE IF EXISTS `daily_statistics`;
#---
DROP TABLE IF EXISTS `post`;
#---
DROP TABLE IF EXISTS `author`;
#---
CREATE TABLE `author`
(
    `author_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Author ID',
    `name` varchar(127) NOT NULL COMMENT 'Name',
    `url` varchar(127) NOT NULL COMMENT 'URL',
    PRIMARY KEY (`author_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COMMENT ='Author Entity';
#---
INSERT INTO `author` (`name`, `url`)
VALUES (1, 'Corey Dulimba', 'corey-dulimba'),
       (2, 'Peter Sheldon', 'peter-sheldon'),
       (3, 'Corey Gelato', 'corey-gelato'),
       (4, 'Ken Hicks', 'ken-hicks'),
       (5, 'Nicole Teriaca', 'nicole-teriaca');
#---
CREATE TABLE `post` (
    `post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Post ID',
    `title` varchar(127) NOT NULL COMMENT 'Title',
    `url` varchar(127) NOT NULL COMMENT 'URL',
    `author_id` int unsigned DEFAULT NULL COMMENT 'Author ID',
    PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Post Entity';
#---
ALTER TABLE `post`
    ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        COMMENT 'Created At' AFTER `url`,
    ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
        COMMENT 'Updated At' AFTER `created_at`,
    ADD CONSTRAINT `FK_AUTHOR_ID` FOREIGN KEY (`author_id`)
    REFERENCES `author` (`author_id`) ON DELETE SET NULL;
#---
INSERT INTO `post` (`title`, `url`, `author_id`)
VALUES ('Post 1', 'post-1', 1),
        ('Post 2', 'post-2', 2),
        ('Post 3', 'post-3', 3),
        ('Post 4', 'post-4', 4),
        ('Post 5', 'post-5', 5),
        ('Post 6', 'post-6', 1),
        ('Post 7', 'post-7', 2),
        ('Post 8', 'post-8', 3),
        ('Post 9', 'post-9', 4),
        ('Post 10', 'post-10', 5),
        ('Post 11', 'post-11', 1),
        ('Post 12', 'post-12', 2),
        ('Post 13', 'post-13', 3),
        ('Post 14', 'post-14', 4),
        ('Post 15', 'post-15', 5);
#---
CREATE TABLE `category`
(
    `category_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Category ID',
    `title` varchar(127) NOT NULL COMMENT 'Title',
    `url` varchar(127) NOT NULL COMMENT 'URL',
    PRIMARY KEY (`category_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COMMENT ='Category Entity';
#---
INSERT INTO `category` (`title`, `url`)
VALUES ('Best Practices', 'best-practices'),
       ('Customer Stories', 'customer-stories'),
       ('Marketplace', 'marketplace'),
       ('Events', 'events'),
       ('Technical', 'technical');
#---
CREATE TABLE `category_post`
(
    `category_post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    `category_id` int unsigned NOT NULL COMMENT 'Category ID',
    PRIMARY KEY (`category_post_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COMMENT ='Category post';
#---
ALTER TABLE `category_post`
    ADD CONSTRAINT `FK_CATEGORY_ID` FOREIGN KEY (`category_id`)
        REFERENCES `category` (`category_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `FK_POST_ID` FOREIGN KEY (`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE;
#---
INSERT INTO `category_post` (`category_id`, `post_id`)
VALUES (1, 1), (1, 3), (1, 5), (1, 7),
       (2, 2), (2, 4), (2, 6), (2, 8),
       (3, 4), (3, 6), (3, 9), (3, 13),
       (4, 3), (4, 5), (4, 11), (4, 14),
       (5, 7), (5, 10), (5, 12), (5, 15);
#---
CREATE TABLE `daily_statistics`
(
    `statistics_date_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    `statistics_date` date DEFAULT NULL COMMENT 'statistics date',
    `views` smallint DEFAULT NULL COMMENT 'views',
    PRIMARY KEY (`statistics_date_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COMMENT ='Daily statistics Entity';
#--
ALTER TABLE `daily_statistics`
    ADD CONSTRAINT `FK_DS_POST_ID` FOREIGN KEY (`post_id`)
    REFERENCES `post` (`post_id`) ON DELETE CASCADE;
#---
INSERT INTO `daily_statistics` (`statistics_date`, `post_id`, `views`)
VALUES ('2021-11-13', 1, 1),
       ('2021-11-14', 1, 2),
       ('2021-11-13', 2, 2),
       ('2021-11-14', 2, 3),
       ('2021-11-13', 3, 3),
       ('2021-11-14', 3, 2),
       ('2021-11-13', 4, 1),
       ('2021-11-14', 4, 3),
       ('2021-11-13', 5, 2),
       ('2021-11-14', 5, 5),
       ('2021-11-13', 6, 4),
       ('2021-11-14', 6, 3),
       ('2021-11-13', 7, 5),
       ('2021-11-14', 7, 8),
       ('2021-11-13', 8, 8),
       ('2021-11-14', 8, 2),
       ('2021-11-13', 9, 1),
       ('2021-11-14', 9, 10),
       ('2021-11-13', 10, 6),
       ('2021-11-14', 10, 1),
       ('2021-11-13', 11, 8),
       ('2021-11-14', 11, 2),
       ('2021-11-13', 12, 5),
       ('2021-11-14', 12, 4),
       ('2021-11-13', 13, 2),
       ('2021-11-14', 13, 1),
       ('2021-11-13', 14, 9),
       ('2021-11-14', 14, 4),
       ('2021-11-13', 15, 7),
       ('2021-11-14', 15, 1);