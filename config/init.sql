DROP DATABASE IF EXISTS dv_campus_blog;

DROP USER IF EXISTS 'dv_campus_blog_annam'@'%';

CREATE DATABASE dv_campus_blog;

CREATE USER 'dv_campus_blog_annam'@'%' IDENTIFIED BY 'Tv]2{!.u8d{K7F}~';

GRANT ALL ON dv_campus_blog.* TO 'dv_campus_blog_annam'@'%';
