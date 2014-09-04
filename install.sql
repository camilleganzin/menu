-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 02 Septembre 2014 à 16:54
-- Version du serveur: 5.5.37-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `menu`
--

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

CREATE TABLE IF NOT EXISTS `repas` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  `type` varchar(80) NOT NULL,
  `image` tinytext NOT NULL,
  `temps_preparation` tinytext NOT NULL,
  `lien` tinytext NOT NULL,
  `credit_photo` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `repas`
--

INSERT INTO `repas` (`id`, `nom`, `type`, `image`, `temps_preparation`, `lien`, `credit_photo`) VALUES
(10, 'Salade au camembert rôti', 'Plat', 'salade_camembert.jpg', 'Préparation: 30 minutes', 'http://nowimacook.com/day/2014/08/13', 'Source : Now I''m a Cook / Photo : Jonathan Fourt'),
(11, 'Salade Caesar au saumon', 'Plat', 'salade_ceasar_saumon.jpg', 'Préparation: 10 minutes', 'http://nowimacook.com/day/2013/06/27', 'Source : Now I''m a Cook / Photo : Jonathan Fourt'),
(12, 'Sandwich Pesto et avocat ', 'Plat', 'salade_pesto_avocat.jpg', 'Préparation: 5 minutes', 'http://nowimacook.com/day/2013/04/22', 'Source : Now I''m a Cook / Photo : Jonathan Fourt'),
(13, 'Salade de tomates', 'Plat', 'salade_tomate.jpg', 'Préparation: 15 minutes', 'http://nowimacook.com/day/2014/04/05', 'Source : Now I''m a Cook / Photo : Jonathan Fourt'),
(14, 'Spaghetti aux asperges', 'Plat', 'spaghetti_asperges.jpg', 'Préparation: 20 minutes - Cuisson: 20 minutes', 'http://nowimacook.com/post/50192494609/pates-asperges-saumon', 'Source : Now I''m a Cook / Photo : Jonathan Fourt'),
(15, 'Steak tartare et frites de patates douces', 'Plat', 'steack_tartare_frites_patates_douces.jpg', 'Préparation: 15 minutes', 'http://nowimacook.com/day/2013/03/26', 'Source : Now I''m a Cook / Photo : Jonathan Fourt'),
(16, 'Sushis Mango Sticky Rice', 'Plat', 'sushi.jpg', 'Préparation: 30 minutes - Cuisson: 1 heure - Repos: 6 heures à 1 nuit', 'http://nowimacook.com/day/2013/10/13', 'Source : Now I''m a Cook / Photo : Jonathan Fourt'),
(17, 'Tartare saumon et crevettes', 'Plat', 'tartare_saumon_crevettes.jpg', 'Préparation: 15 minutes - Repos: 1 heure', 'http://nowimacook.com/day/2013/01/26', 'Source : Now I''m a Cook / Photo : Jonathan Fourt'),
(18, 'Tartare de thon et gelée de pomme Granny', 'Plat', 'tartare_thon.jpg', 'Préparation: 10 minutes - Cuisson: 3 minutes ', 'http://nowimacook.com/day/2014/03/07', 'Source : Now I''m a Cook / Photo : Jonathan Fourt'),
(19, 'Tartelettes framboises  / chocolat blanc', 'Dessert', 'tartelette_framboise.jpg', 'Préparation: 15 minutes - Cuisson: 20 minutes - Repos: 30 minutes', 'http://nowimacook.com/day/2014/06/24', 'Source : Now I''m a Cook / Photo : Jonathan Fourt'),
(29, 'poney', 'poney', 'poney', 'poney', 'poney', 'vide.jpg'),
(32, 'Tarte revisitée à la framboise', 'Dessert', 'Now I''m a Cook', 'Préparation : 15 minutes', 'http://nowimacook.com/day/2014/08/27', 'vide.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
