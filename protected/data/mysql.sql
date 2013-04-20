DROP TABLE if exists user_tag;
DROP TABLE if exists article_tag;
DROP TABLE if exists article_history;
DROP TABLE if exists article;
DROP TABLE if exists user;
DROP TABLE if exists status;
DROP TABLE if exists tag;

CREATE TABLE user (
  id_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20) NOT NULL UNIQUE,
  password VARCHAR(50) NOT NULL,
  firstname VARCHAR(20) NOT NULL,
  lastname VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  register_date DATE
);

CREATE TABLE article (
  id_article INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  author INT NOT NULL,
  title VARCHAR(50),
  content LONGBLOB NOT NULL,
  create_date DATE
);

ALTER TABLE article
ADD CONSTRAINT FK_article
FOREIGN KEY (author) REFERENCES user(id_user)
ON UPDATE CASCADE
ON DELETE CASCADE;

CREATE TABLE status (
  id_status INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(20) NOT NULL UNIQUE  
);

CREATE TABLE article_history (
  id_history INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  article INT NOT NULL,
  status INT NOT NULL,
  date DATE NOT NULL,
  isenabled TINYINT(1) NOT NULL
);

ALTER TABLE article_history
ADD CONSTRAINT FK_article_status_article
FOREIGN KEY (article) REFERENCES article(id_article)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE article_history
ADD CONSTRAINT FK_article_status_status
FOREIGN KEY (status) REFERENCES status(id_status)
ON UPDATE CASCADE
ON DELETE CASCADE;

CREATE TABLE tag (
  id_tag INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(20)
);

CREATE TABLE article_tag (
  article INT NOT NULL,
  tag INT NOT NULL
);

ALTER TABLE article_tag
ADD CONSTRAINT FK_article_tag_article
FOREIGN KEY (article) REFERENCES article(id_article)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE article_tag
ADD CONSTRAINT FK_article_tag_tag
FOREIGN KEY (tag) REFERENCES tag(id_tag)
ON UPDATE CASCADE
ON DELETE CASCADE;

CREATE TABLE user_tag (
  user INT NOT NULL,
  tag INT NOT NULL
);

ALTER TABLE user_tag
ADD CONSTRAINT FK_user_tag_article
FOREIGN KEY (user) REFERENCES user(id_user)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE user_tag
ADD CONSTRAINT FK_user_tag_tag
FOREIGN KEY (tag) REFERENCES tag(id_tag)
ON UPDATE CASCADE
ON DELETE CASCADE;
