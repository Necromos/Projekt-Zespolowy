-- Baza danych: `informatica`
--
DROP DATABASE IF EXISTS informatica;
CREATE DATABASE IF NOT EXISTS informatica;

USE informatica;
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `author` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_article_category` (`category`),
  KEY `FK_article_author` (`author`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `article_history`
--

CREATE TABLE IF NOT EXISTS `article_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `isenabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_article_status_article` (`article`),
  KEY `FK_article_status_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `article_tag`
--

CREATE TABLE IF NOT EXISTS `article_tag` (
  `article` int(11) NOT NULL,
  `tag` int(11) NOT NULL,
  KEY `FK_article_tag_article` (`article`),
  KEY `FK_article_tag_tag` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `article_user`
--

CREATE TABLE IF NOT EXISTS `article_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_article_id` (`article_id`),
  KEY `FK_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Author', 2, 'Every authenticated user is an author', NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('Reviewer', 2, 'A person who reviews the articles.', NULL, 'N;'),
('EditorMain', 2, 'Supervisor of all the editors.', NULL, 'N;'),
('Manage own articles', 1, 'Every author can manage own articles.', NULL, 'N;'),
('Approve/Disapprove article', 1, 'Main editor can approve or disapprove articles.', NULL, 'N;'),
('Article.Admin', 0, NULL, NULL, 'N;'),
('Article.Approvestatus', 0, NULL, NULL, 'N;'),
('Article.Create', 0, NULL, NULL, 'N;'),
('Article.Disapprovestatus', 0, NULL, NULL, 'N;'),
('Article.Index', 0, NULL, NULL, 'N;'),
('Article.Update', 0, NULL, NULL, 'N;'),
('Article.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('EditorMain', 'Approve/Disapprove article'),
('Manage own articles', 'Article.Admin'),
('Approve/Disapprove article', 'Article.Approvestatus'),
('Manage own articles', 'Article.Create'),
('Approve/Disapprove article', 'Article.Disapprovestatus'),
('Manage own articles', 'Article.Index'),
('Manage own articles', 'Article.Update'),
('Manage own articles', 'Article.View'),
('Author', 'Manage own articles');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'other');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reviewer` int(11) NOT NULL,
  `article` int(11) NOT NULL,
  `create_date` date DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_review_reviewer` (`reviewer`),
  KEY `FK_review_article` (`article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'user');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `register_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `register_date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin@admin.com', '2013-05-27');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_tag`
--

CREATE TABLE IF NOT EXISTS `user_tag` (
  `user` int(11) NOT NULL,
  `tag` int(11) NOT NULL,
  KEY `FK_user_tag_article` (`user`),
  KEY `FK_user_tag_tag` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_article_author` FOREIGN KEY (`author`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_article_category` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Ograniczenia dla tabeli `article_history`
--
ALTER TABLE `article_history`
  ADD CONSTRAINT `FK_article_status_article` FOREIGN KEY (`article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `FK_article_status_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Ograniczenia dla tabeli `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `FK_article_tag_article` FOREIGN KEY (`article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `FK_article_tag_tag` FOREIGN KEY (`tag`) REFERENCES `tag` (`id`);

--
-- Ograniczenia dla tabeli `article_user`
--
ALTER TABLE `article_user`
  ADD CONSTRAINT `FK_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ograniczenia dla tabeli `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_review_article` FOREIGN KEY (`article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `FK_review_reviewer` FOREIGN KEY (`reviewer`) REFERENCES `user` (`id`);

--
-- Ograniczenia dla tabeli `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `user_tag`
--
ALTER TABLE `user_tag`
  ADD CONSTRAINT `FK_user_tag_article` FOREIGN KEY (`user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_user_tag_tag` FOREIGN KEY (`tag`) REFERENCES `tag` (`id`);