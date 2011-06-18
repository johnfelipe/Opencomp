-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 18 Juin 2011 à 23:01
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `opencomp`
--

-- --------------------------------------------------------

--
-- Structure de la table `academies`
--

CREATE TABLE IF NOT EXISTS `academies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL COMMENT 'Academie-Sous rectorat',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `academies`
--

INSERT INTO `academies` (`id`, `name`, `type`) VALUES
(1, 'Aix-Marseille', 0),
(2, 'Amiens', 0),
(3, 'Besançon', 0),
(4, 'Bordeaux', 0),
(5, 'Caen', 0),
(6, 'Clermont-Ferrand', 0),
(7, 'Corse', 0),
(8, 'Créteil', 0),
(9, 'Dijon', 0),
(10, 'Grenoble', 0),
(11, 'Guadeloupe', 0),
(12, 'Guyanne', 0),
(13, 'Lille', 0),
(14, 'Limoges', 0),
(15, 'Lyon', 0),
(16, 'Martinique', 0),
(17, 'Montpellier', 0),
(18, 'Nancy-Metz', 0),
(19, 'Nantes', 0),
(20, 'Nice', 0),
(21, 'Orléans-Tours', 0),
(22, 'Paris', 0),
(23, 'Poitiers', 0),
(24, 'Reims', 0),
(25, 'Rennes', 0),
(26, 'La Réunion', 0),
(27, 'Rouen', 0),
(28, 'Strasbourg', 0),
(29, 'Toulouse', 0),
(30, 'Mayotte', 1),
(31, 'Nouvelle-Calédonie', 1),
(32, 'Polynésie française', 1),
(33, 'Wallis-et-Futuna', 1),
(34, 'Saint-Pierre-et-Miquelon', 2);

-- --------------------------------------------------------

--
-- Structure de la table `academies_users`
--

CREATE TABLE IF NOT EXISTS `academies_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `academie_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Contenu de la table `academies_users`
--


-- --------------------------------------------------------

--
-- Structure de la table `classrooms`
--

CREATE TABLE IF NOT EXISTS `classrooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `year_id` int(10) unsigned NOT NULL,
  `establishment_id` int(10) unsigned NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `classrooms`
--


-- --------------------------------------------------------

--
-- Structure de la table `classrooms_pupils`
--

CREATE TABLE IF NOT EXISTS `classrooms_pupils` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classroom_id` int(10) unsigned NOT NULL,
  `pupil_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `classrooms_pupils`
--


-- --------------------------------------------------------

--
-- Structure de la table `classrooms_users`
--

CREATE TABLE IF NOT EXISTS `classrooms_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `classroom_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `classrooms_users`
--


-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE IF NOT EXISTS `competences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rght` int(10) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`id`, `parent_id`, `lft`, `rght`, `title`) VALUES
(6, 5, 5, 6, 'Raconter, décrire, exposer'),
(4, NULL, 1, 48, 'Français'),
(5, 4, 2, 9, 'Langage oral'),
(7, 5, 3, 4, 'Échanger, débattre'),
(8, 5, 7, 8, 'Réciter'),
(9, 4, 10, 11, 'Lecture'),
(10, 4, 12, 13, 'Littérature'),
(11, 4, 14, 15, 'Écriture'),
(12, 4, 16, 17, 'Rédaction'),
(13, 4, 18, 27, 'Vocabulaire'),
(14, 13, 19, 20, 'Acquisition du vocabulaire'),
(15, 13, 21, 22, 'Maîtrise du sens des mots'),
(16, 13, 23, 24, 'Les familles de mots'),
(17, 13, 25, 26, 'Utilisation du dictionnaire'),
(18, 4, 28, 39, 'Grammaire'),
(19, 18, 29, 30, 'La phrase'),
(20, 18, 31, 32, 'Les classes de mots'),
(21, 18, 33, 34, 'Les fonctions'),
(22, 18, 35, 36, 'Le verbe'),
(23, 18, 37, 38, 'Les accords'),
(24, 4, 40, 47, 'Orthographe'),
(25, 24, 41, 42, 'Compétences grapho-phonétiques'),
(26, 24, 43, 44, 'Orthographe grammaticale'),
(27, 24, 45, 46, 'Orthographe lexicale'),
(28, NULL, 49, 86, 'Mathématiques'),
(29, 28, 50, 67, 'Nombres et calcul'),
(30, 29, 51, 52, 'Les nombres entiers jusqu''au million'),
(31, 29, 53, 54, 'Les nombres entiers jusqu''au milliard'),
(32, 29, 55, 56, 'Fractions'),
(33, 29, 57, 58, 'Nombres décimaux'),
(34, 29, 59, 66, 'Calcul sur des nombres entiers'),
(35, 34, 60, 61, 'Calculer mentalement'),
(36, 34, 62, 63, 'Effectuer un calcul posé'),
(37, 34, 64, 65, 'Problèmes'),
(38, 28, 68, 75, 'Géométrie'),
(39, 38, 69, 70, 'Dans le plan'),
(40, 38, 71, 72, 'Dans l''espace'),
(41, 38, 73, 74, 'Problèmes de reproduction, de construction'),
(42, 28, 76, 83, 'Grandeurs et mesures'),
(43, 42, 77, 78, 'Aires'),
(44, 42, 79, 80, 'Angles'),
(45, 42, 81, 82, 'Problèmes'),
(46, 28, 84, 85, 'Organisation et gestion de données'),
(47, NULL, 87, 96, 'Éducation Physique et Sportive'),
(48, 47, 88, 89, 'Réaliser une performance mesurée (distance, temps)'),
(49, 47, 90, 91, 'Adapter ses déplacements à différents types d''environnements'),
(50, 47, 92, 93, 'Coopérer et s''opposer individuellement et collectivement'),
(51, 47, 94, 95, 'Concevoir et réaliser des actions à visées expressive, artistique, esthétique'),
(52, NULL, 97, 98, 'Langue vivante'),
(53, NULL, 99, 116, 'Sciences expérimentales et technologie'),
(54, 53, 100, 101, 'Le ciel et la terre'),
(55, 53, 102, 103, 'La matière'),
(56, 53, 104, 105, 'L''énergie'),
(57, 53, 106, 107, 'L''unité et la diversité du vivant'),
(58, 53, 108, 109, 'Le fonctionnement du vivant'),
(59, 53, 110, 111, 'Le fonctionnement du corps humain et la santé'),
(60, 53, 112, 113, 'Les êtres vivants dans leur environnement'),
(61, 53, 114, 115, 'Les objets techniques'),
(62, NULL, 117, 164, 'Culture humaniste'),
(63, 62, 118, 131, 'Histoire'),
(64, 63, 119, 120, 'La Préhistoire'),
(65, 63, 121, 122, 'L''Antiquité'),
(66, 63, 123, 124, 'Le Moyen Âge'),
(67, 63, 125, 126, 'Les temps modernes'),
(68, 63, 127, 128, 'La Révolution française et le XIXème siècle'),
(69, 63, 129, 130, 'Le XXème siècle et notre époque'),
(70, 62, 132, 145, 'Géographie'),
(72, 70, 133, 134, 'Des réalités géographiques locales à la région où vivent les élèves'),
(73, 70, 135, 136, 'Le territoire français dans l''Union Européenne'),
(74, 70, 137, 138, 'Les français dans le contexte européen'),
(75, 70, 139, 140, 'Se déplacer en France et en Europe'),
(76, 70, 141, 142, 'Produire en France'),
(77, 70, 143, 144, 'La France dans le monde'),
(78, 62, 146, 151, 'Pratiques artistiques'),
(79, 78, 147, 148, 'Arts visuels'),
(80, 78, 149, 150, 'Éducation musicale'),
(81, 62, 152, 163, 'Histoire de l''art'),
(82, 81, 153, 154, 'La Préhistoire et l''Antiquité Gallo-Romaine'),
(83, 81, 155, 156, 'Le Moyen Âge'),
(84, 81, 157, 158, 'Les temps modernes'),
(85, 81, 159, 160, 'Le XIXème siècle'),
(86, 81, 161, 162, 'Le XXème siècle et notre époque'),
(87, NULL, 165, 166, 'Techniques Usuelles de l''Information et de la Communication'),
(88, NULL, 167, 168, 'Instruction civique et morale');

-- --------------------------------------------------------

--
-- Structure de la table `cycles`
--

CREATE TABLE IF NOT EXISTS `cycles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `cycles`
--


-- --------------------------------------------------------

--
-- Structure de la table `establishments`
--

CREATE TABLE IF NOT EXISTS `establishments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `postcode` int(5) unsigned NOT NULL,
  `town` varchar(45) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `academie_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `establishments`
--


-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE IF NOT EXISTS `evaluations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classroom_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `period_id` int(10) unsigned NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `evaluations`
--


-- --------------------------------------------------------

--
-- Structure de la table `evaluations_items`
--

CREATE TABLE IF NOT EXISTS `evaluations_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evaluation_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `evaluations_items`
--


-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `competence_id` int(10) unsigned NOT NULL,
  `place` int(10) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `classroom_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `items`
--

INSERT INTO `items` (`id`, `title`, `competence_id`, `place`, `type`, `user_id`, `classroom_id`) VALUES
(1, 'Faire un récit structuré et compréhensible pour un tiers ignorant des faits rapportés ou de l''histoire racontée', 6, 1, 1, 0, 0),
(2, 'Décrire une image', 6, 0, 1, 0, 0),
(3, 'Écouter et prendre en compte ce qui a été dit.', 9, 0, 3, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `items_levels`
--

CREATE TABLE IF NOT EXISTS `items_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(10) unsigned NOT NULL,
  `level_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `items_levels`
--


-- --------------------------------------------------------

--
-- Structure de la table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(15) NOT NULL,
  `cycle_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `levels`
--


-- --------------------------------------------------------

--
-- Structure de la table `periods`
--

CREATE TABLE IF NOT EXISTS `periods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `begin` date NOT NULL,
  `end` date NOT NULL,
  `year_id` int(10) unsigned NOT NULL,
  `establishment_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `periods`
--


-- --------------------------------------------------------

--
-- Structure de la table `pupils`
--

CREATE TABLE IF NOT EXISTS `pupils` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `birthday` date NOT NULL,
  `state` tinyint(1) unsigned NOT NULL,
  `tutor_id` int(10) unsigned NOT NULL,
  `level_id` int(10) unsigned NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `pupils`
--


-- --------------------------------------------------------

--
-- Structure de la table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evaluation_id` int(10) unsigned NOT NULL,
  `pupil_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `result` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `results`
--


-- --------------------------------------------------------

--
-- Structure de la table `tutors`
--

CREATE TABLE IF NOT EXISTS `tutors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `postcode` int(5) unsigned NOT NULL,
  `town` varchar(50) NOT NULL,
  `tel` int(10) unsigned DEFAULT NULL,
  `tel2` int(10) unsigned DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `notes` text,
  `updated` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tutors`
--


-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `name`, `email`, `role`, `created`) VALUES
(13, 'admin', '70454af0546c3c5390733ee0030c0812fe61f61b', 'Administrateur', 'de test', 'admin@test.me', 'enseignant', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `years`
--

