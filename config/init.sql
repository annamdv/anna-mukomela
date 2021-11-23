DROP DATABASE IF EXISTS annam_blog;

DROP USER IF EXISTS 'dv_campus_blog_annam'@'%';

CREATE DATABASE annam_blog;

CREATE USER 'dv_campus_blog_annam'@'%' IDENTIFIED BY 'Tv]2{!.u8d{K7F}~';

GRANT ALL ON annam_blog.* TO 'dv_campus_blog_annam'@'%';
