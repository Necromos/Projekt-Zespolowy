DROP DATABASE if exists informatica;

-- DROP TABLE if exists user_tag;
-- DROP TABLE if exists article_tag;
-- DROP TABLE if exists article_history;
-- DROP TABLE if exists article;
-- DROP TABLE if exists user;
-- DROP TABLE if exists status;
-- DROP TABLE if exists tag;
-- DROP TABLE if exists review;


CREATE DATABASE informatica;

USE informatica;


CREATE TABLE user (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20) NOT NULL UNIQUE,
  password VARCHAR(50) NOT NULL,
  firstname VARCHAR(20) NOT NULL,
  lastname VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  register_date DATE
);

CREATE TABLE article (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  author INT NOT NULL,
  title VARCHAR(50),
  content VARCHAR(100) NOT NULL,
  create_date DATE
);

ALTER TABLE article
ADD CONSTRAINT FK_article
FOREIGN KEY (author) REFERENCES user(id);

CREATE TABLE status (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(20) NOT NULL UNIQUE  
);

CREATE TABLE article_history (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  article INT NOT NULL,
  status INT NOT NULL,
  date DATE NOT NULL,
  isenabled TINYINT(1) NOT NULL
);

ALTER TABLE article_history
ADD CONSTRAINT FK_article_status_article
FOREIGN KEY (article) REFERENCES article(id);

ALTER TABLE article_history
ADD CONSTRAINT FK_article_status_status
FOREIGN KEY (status) REFERENCES status(id);

CREATE TABLE tag (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  UNIQUE INDEX name_UNIQUE (name ASC) 
);

CREATE TABLE article_tag (
  article INT NOT NULL,
  tag INT NOT ALTER
);

NULL TABLE article_tag
ADD CONSTRAINT FK_article_tag_article
FOREIGN KEY (article) REFERENCES article(id);

ALTER TABLE article_tag
ADD CONSTRAINT FK_article_tag_tag
FOREIGN KEY (tag) REFERENCES tag(id);

CREATE TABLE user_tag (
  user INT NOT NULL,
  tag INT NOT NULL
);

ALTER TABLE user_tag
ADD CONSTRAINT FK_user_tag_article
FOREIGN KEY (user) REFERENCES user(id);

ALTER TABLE user_tag
ADD CONSTRAINT FK_user_tag_tag
FOREIGN KEY (tag) REFERENCES tag(id);

CREATE TABLE review (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  reviewer INT NOT NULL,
  article INT NOT NULL,
  create_date DATE,
  content VARCHAR(100)
);

ALTER TABLE review
ADD CONSTRAINT FK_review_reviewer
FOREIGN KEY (reviewer) REFERENCES user(id);

ALTER TABLE review
ADD CONSTRAINT FK_review_article
FOREIGN KEY (article) REFERENCES article(id);