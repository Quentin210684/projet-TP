-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `gamescreening` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `gamescreening`;

CREATE TABLE `wc5m2_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(150) NOT NULL,
  `goodAnswer` tinyint(1) NOT NULL,
  `id_questions` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_questions_FK` (`id_questions`),
  CONSTRAINT `answers_questions_FK` FOREIGN KEY (`id_questions`) REFERENCES `wc5m2_questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `publicationDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `publicationDate` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_articles` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_users_FK` (`id_users`),
  KEY `comments_articles_FK` (`id_articles`),
  CONSTRAINT `comments_articles_FK` FOREIGN KEY (`id_articles`) REFERENCES `wc5m2_articles` (`id`),
  CONSTRAINT `comments_users_FK` FOREIGN KEY (`id_users`) REFERENCES `wc5m2_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_developpers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_evaluations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_mods` int(11) DEFAULT NULL,
  `id_games` int(11) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluations_mods_FK` (`id_mods`),
  KEY `evaluations_games_FK` (`id_games`),
  KEY `evaluations_users_FK` (`id_users`),
  CONSTRAINT `evaluations_games_FK` FOREIGN KEY (`id_games`) REFERENCES `wc5m2_games` (`id`),
  CONSTRAINT `evaluations_mods_FK` FOREIGN KEY (`id_mods`) REFERENCES `wc5m2_mods` (`id`),
  CONSTRAINT `evaluations_users_FK` FOREIGN KEY (`id_users`) REFERENCES `wc5m2_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `releaseDate` date NOT NULL,
  `earlyExitDate` date NOT NULL,
  `summary` text NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `id_graphisms` int(11) NOT NULL,
  `id_types` int(11) NOT NULL,
  `id_platforms` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `games_graphisms_FK` (`id_graphisms`),
  KEY `games_types_FK` (`id_types`),
  KEY `games_platforms_FK` (`id_platforms`),
  CONSTRAINT `games_graphisms_FK` FOREIGN KEY (`id_graphisms`) REFERENCES `wc5m2_graphisms` (`id`),
  CONSTRAINT `games_platforms_FK` FOREIGN KEY (`id_platforms`) REFERENCES `wc5m2_platforms` (`id`),
  CONSTRAINT `games_types_FK` FOREIGN KEY (`id_types`) REFERENCES `wc5m2_types` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_games` (`id`, `title`, `releaseDate`, `earlyExitDate`, `summary`, `trailer`, `picture`, `id_graphisms`, `id_types`, `id_platforms`) VALUES
(5,	'Titre',	'2022-01-27',	'2022-01-27',	'Treeeeeeeee',	'a découvrir 4.jpg',	'a découvrir 4.jpg',	1,	1,	1),
(6,	'TestId',	'2022-01-05',	'2021-12-28',	'Jkjljlkjljlk',	'Action carroussel maquette 2.jpg',	'a découvrir 3.jpg',	2,	1,	1);

CREATE TABLE `wc5m2_gamesdevelopers` (
  `id_developers` int(11) NOT NULL,
  `id_games` int(11) NOT NULL,
  PRIMARY KEY (`id_developers`,`id_games`),
  KEY `gamesDevelopers_games_FK` (`id_games`),
  CONSTRAINT `gamesDevelopers_developpers_FK` FOREIGN KEY (`id_developers`) REFERENCES `wc5m2_developpers` (`id`),
  CONSTRAINT `gamesDevelopers_games_FK` FOREIGN KEY (`id_games`) REFERENCES `wc5m2_games` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_graphisms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_graphisms` (`id`, `name`) VALUES
(1,	'2D'),
(2,	'3D'),
(3,	'Pixel Art');

CREATE TABLE `wc5m2_mods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `releaseDate` date NOT NULL,
  `summary` text NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `userValidatedOwner` tinyint(1) NOT NULL,
  `file` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_games` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mods_users_FK` (`id_users`),
  KEY `mods_games_FK` (`id_games`),
  CONSTRAINT `mods_games_FK` FOREIGN KEY (`id_games`) REFERENCES `wc5m2_games` (`id`),
  CONSTRAINT `mods_users_FK` FOREIGN KEY (`id_users`) REFERENCES `wc5m2_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_platforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_platforms` (`id`, `name`) VALUES
(1,	'pc');

CREATE TABLE `wc5m2_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(150) NOT NULL,
  `order` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_quiz_FK` (`id_quiz`),
  CONSTRAINT `questions_quiz_FK` FOREIGN KEY (`id_quiz`) REFERENCES `wc5m2_quiz` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `explanations` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_evaluations` int(11) DEFAULT NULL,
  `id_mods` int(11) DEFAULT NULL,
  `id_comments` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_users_FK` (`id_users`),
  KEY `reports_evaluations_FK` (`id_evaluations`),
  KEY `reports_mods_FK` (`id_mods`),
  KEY `reports_comments_FK` (`id_comments`),
  CONSTRAINT `reports_comments_FK` FOREIGN KEY (`id_comments`) REFERENCES `wc5m2_comments` (`id`),
  CONSTRAINT `reports_evaluations_FK` FOREIGN KEY (`id_evaluations`) REFERENCES `wc5m2_evaluations` (`id`),
  CONSTRAINT `reports_mods_FK` FOREIGN KEY (`id_mods`) REFERENCES `wc5m2_mods` (`id`),
  CONSTRAINT `reports_users_FK` FOREIGN KEY (`id_users`) REFERENCES `wc5m2_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_roles` (`id`, `name`) VALUES
(1,	'administrateur'),
(2,	'utilisateur');

CREATE TABLE `wc5m2_scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `scores_users_FK` (`id_users`),
  KEY `scores_quiz_FK` (`id_quiz`),
  CONSTRAINT `scores_quiz_FK` FOREIGN KEY (`id_quiz`) REFERENCES `wc5m2_quiz` (`id`),
  CONSTRAINT `scores_users_FK` FOREIGN KEY (`id_users`) REFERENCES `wc5m2_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `wc5m2_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_types` (`id`, `name`) VALUES
(1,	'aventure');

CREATE TABLE `wc5m2_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `starred` tinyint(1) NOT NULL,
  `blocked` tinyint(1) NOT NULL,
  `id_roles` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_roles_FK` (`id_roles`),
  CONSTRAINT `users_roles_FK` FOREIGN KEY (`id_roles`) REFERENCES `wc5m2_roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wc5m2_users` (`id`, `name`, `email`, `password`, `starred`, `blocked`, `id_roles`) VALUES
(1,	'Quentin',	'quentintirmant@gmail.com',	'crocdur',	0,	0,	1),
(19,	' Tom',	'sdgfsdfg@gmail.com',	'$2y$10$ahwQ4.T/hkfr2FgGEnPlRu7p5qTirUTWYLJue.6xLGVA0C.X3jpcu',	0,	0,	2),
(21,	'Test',	'test@yahoo.fr',	'pass2516',	0,	0,	2),
(22,	'Test3',	'tes3t@yahoo.fr',	'pass25163',	0,	0,	2),
(26,	'Test3',	'tes3t@yahoo.fr',	'pass25163',	0,	0,	2);

-- 2022-01-28 09:35:44