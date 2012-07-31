-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 31 Juillet 2012 à 23:10
-- Version du serveur: 5.5.25
-- Version de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `opencomp`
--

--
-- Contenu de la table `cycles`
--

INSERT INTO `cycles` (`id`, `title`) VALUES
(1, 'Cycle 1'),
(2, 'Cycle 2'),
(4, 'Cycle 3');

--
-- Contenu de la table `levels`
--

INSERT INTO `levels` (`id`, `title`, `cycle_id`) VALUES
(2, 'CP', 2),
(3, 'CE1', 2),
(4, 'CE2', 4),
(5, 'CM1', 4),
(6, 'CM2', 4),
(7, 'CLIS', 0),
(8, 'CLIN', 0);