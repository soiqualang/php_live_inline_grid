-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(8) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `post_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `posts` (`id`, `post_title`, `description`, `post_at`) VALUES
(0,	't1',	't2222222233',	NULL),
(0,	't2',	't2222222233',	NULL),
(0,	't3',	't2222222233',	NULL);

DROP TABLE IF EXISTS `sample_data`;
CREATE TABLE `sample_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sample_data` (`id`, `first_name`, `last_name`, `age`, `gender`) VALUES
(3,	'Tiny',	'Marry',	19,	'female'),
(4,	'Dolores',	'Brooks',	29,	'female'),
(5,	'Cindy',	'Dahl',	24,	'female'),
(6,	'George',	'Fagan',	30,	'male'),
(7,	'Chelsea',	'Mendoza',	18,	'female'),
(8,	'Wayne',	'Hodges',	27,	'male'),
(10,	'Eric',	'Smith',	31,	'male'),
(11,	'Robert',	'Owens',	42,	'male'),
(12,	'Candace',	'Hand',	27,	'female'),
(14,	'William',	'Sosa',	36,	'male'),
(15,	'Patricia',	'Davis',	23,	'female'),
(17,	'Nancy1122',	'Sedlacek',	21,	'female'),
(18,	't1',	't1',	22,	'male'),
(19,	't2',	't2',	21,	'female'),
(20,	't3',	't3',	24,	'female');

-- 2019-02-12 09:44:11
