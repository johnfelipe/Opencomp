#App sql generated on: 2011-07-03 23:22:39 : 1309728159

DROP TABLE IF EXISTS `academies`;
DROP TABLE IF EXISTS `classroom_pupils`;
DROP TABLE IF EXISTS `classroom_users`;
DROP TABLE IF EXISTS `classrooms`;
DROP TABLE IF EXISTS `competence_users`;
DROP TABLE IF EXISTS `competences`;
DROP TABLE IF EXISTS `cycles`;
DROP TABLE IF EXISTS `establishment_users`;
DROP TABLE IF EXISTS `establishments`;
DROP TABLE IF EXISTS `evaluation_items`;
DROP TABLE IF EXISTS `evaluations`;
DROP TABLE IF EXISTS `item_levels`;
DROP TABLE IF EXISTS `items`;
DROP TABLE IF EXISTS `levels`;
DROP TABLE IF EXISTS `periods`;
DROP TABLE IF EXISTS `pupils`;
DROP TABLE IF EXISTS `results`;
DROP TABLE IF EXISTS `tutors`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `years`;


CREATE TABLE `academies` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`type` tinyint(1) NOT NULL COMMENT 'Academie-Sous rectorat',	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `classroom_pupils` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`classroom_id` int(10) NOT NULL,
	`pupil_id` int(10) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `classroom_users` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`user_id` int(10) NOT NULL,
	`classroom_id` int(10) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `classrooms` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`user_id` int(10) NOT NULL,
	`year_id` int(10) NOT NULL,
	`establishment_id` int(10) NOT NULL,
	`created` date NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `competence_users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`competence_id` int(11) NOT NULL,
	`user_id` int(11) NOT NULL,
	`classroom_id` int(11) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `competences` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`parent_id` int(10) DEFAULT NULL,
	`lft` int(10) NOT NULL,
	`rght` int(10) NOT NULL,
	`title` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `cycles` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `establishment_users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`user_id` int(11) NOT NULL,
	`establishment_id` int(11) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=latin1,
	COLLATE=latin1_swedish_ci,
	ENGINE=InnoDB;

CREATE TABLE `establishments` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`postcode` int(5) NOT NULL,
	`town` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`user_id` int(10) NOT NULL,
	`academie_id` int(10) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `evaluation_items` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`evaluation_id` int(10) NOT NULL,
	`item_id` int(10) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `evaluations` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`classroom_id` int(10) NOT NULL,
	`user_id` int(10) NOT NULL,
	`period_id` int(10) NOT NULL,
	`created` date NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `item_levels` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`item_id` int(10) NOT NULL,
	`level_id` int(10) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `items` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`title` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`competence_id` int(10) NOT NULL,
	`place` int(10) NOT NULL,
	`type` tinyint(1) NOT NULL,
	`user_id` int(10) NOT NULL,
	`classroom_id` int(10) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `levels` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`title` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`cycle_id` int(10) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `periods` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`begin` date NOT NULL,
	`end` date NOT NULL,
	`year_id` int(10) NOT NULL,
	`establishment_id` int(10) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `pupils` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`sex` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`birthday` date NOT NULL,
	`state` tinyint(1) NOT NULL,
	`tutor_id` int(10) NOT NULL,
	`level_id` int(10) NOT NULL,
	`created` date NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `results` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`evaluation_id` int(10) NOT NULL,
	`pupil_id` int(10) NOT NULL,
	`item_id` int(10) NOT NULL,
	`result` tinyint(1) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `tutors` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`postcode` int(5) NOT NULL,
	`town` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`tel` int(10) DEFAULT NULL,
	`tel2` int(10) DEFAULT NULL,
	`email` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`notes` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`updated` date NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `users` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`email` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`role` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created` datetime NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;

CREATE TABLE `years` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`year` text(4) NOT NULL,	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=MyISAM;
