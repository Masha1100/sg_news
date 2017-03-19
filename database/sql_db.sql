CREATE DATABASE sg_course;
use sg_course;

CREATE TABLE sg_news 
(
    id int(10)unsigned NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL, 
    link varchar(255) NOT NULL, 
    description mediumtext NOT NULL, 
    sourse varchar(255) NOT NULL, 
    pub_date datetime NOT NULL, 
    PRIMARY KEY(id), 
    UNIQUE(link)
);

SELECT title, link, sourse, description, pub_date FROM `sg_news` ORDER BY `pub_date` DESC LIMIT $start, $limit;

SELECT *  FROM sg_news;
