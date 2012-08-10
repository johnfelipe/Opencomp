-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 31 Juillet 2012 à 23:07
-- Version du serveur: 5.5.25
-- Version de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `opencomp`
--

--
-- Contenu de la table `competences`
--

INSERT INTO `competences` (`id`, `parent_id`, `lft`, `rght`, `title`) VALUES
(4, NULL, 1, 48, 'Français'),
(5, 4, 2, 9, 'Langage oral'),
(6, 5, 5, 6, 'Raconter, décrire, exposer'),
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