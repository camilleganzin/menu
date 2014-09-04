-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 27 Août 2014 à 10:10
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
  `Difficulté` tinytext NOT NULL,
  `lien` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `repas`
--

INSERT INTO `repas` (`id`, `nom`, `type`, `image`, `Difficulté`, `lien`) VALUES
(1, 'Tiramisu', 'Dessert', 'tiramisu.jpg', 'Facile', 'http://nowimacook.com/day/2014/08/20'),
(2, 'Velouté de patates douces', 'Plat', 'veloute_patates_douces.jpg', 'Facile', 'http://nowimacook.com/day/2013/03/26'),
(3, 'Magret de canard', 'plat', 'magret_canard.jpg', 'Moyenne', 'http://nowimacook.com/day/2013/02/19'),
(4, 'Nems', 'Plat', 'nems.jpg', 'Difficile', 'http://nowimacook.com/day/2013/01/18'),
(5, 'Gratin de poireaux', 'Plat', 'gratin_poireaux.jpg', 'Facile', 'http://nowimacook.com/day/2013/03/09'),
(6, 'Pizza', 'Plat', 'pizza.jpg', 'Facile', 'http://nowimacook.com/day/2013/01/19'),
(7, 'Ravioles de langoustines', 'Plat', 'ravioles_langoustines.jpg', 'Difficile', 'http://nowimacook.com/day/2013/03/15'),
(8, 'Risotto aux champignons', 'Plat', 'risoto_champignon.jpg', 'Difficile', 'http://nowimacook.com/day/2014/04/10'),
(9, 'Salade d''asperges', 'Plat', 'salade_asperges.jpg', 'Facile', 'http://nowimacook.com/day/2013/04/24'),
(10, 'Salade au camembert rôti', 'Plat', 'salade_camembert.jpg', 'Facile', 'http://nowimacook.com/day/2014/08/13'),
(11, 'Salade Caesar au saumon', 'Plat', 'salade_ceasar_saumon.jpg', 'Facile', 'http://nowimacook.com/day/2013/06/27'),
(12, 'Sandwich Pesto et avocat ', 'Plat', 'salade_pesto_avocat.jpg', 'Facile', 'http://nowimacook.com/day/2013/04/22'),
(13, 'Salade de tomates', 'Plat', 'salade_tomate.jpg', 'Facile', 'http://nowimacook.com/day/2014/04/05'),
(14, 'Spaghetti aux asperges', 'Plat', 'spaghetti_asperges.jpg', 'Moyenne', 'http://nowimacook.com/post/50192494609/pates-asperges-saumon'),
(15, 'Steak tartare et frites de patates douces', 'Plat', 'steack_tartare_frites_patates_douces.jpg', 'Facile', 'http://nowimacook.com/day/2013/03/26'),
(16, 'Sushi', 'Plat', 'sushi.jpg', 'Difficile', 'http://nowimacook.com/day/2013/10/13'),
(17, 'Tartare saumon et crevettes', 'Plat', 'tartare_saumon_crevettes.jpg', 'Moyenne', 'http://nowimacook.com/day/2013/01/26'),
(18, 'Tartare de thon', 'Plat', 'tartare_thon.jpg', 'Facile', 'http://nowimacook.com/day/2014/03/07'),
(19, 'Tartelette framboise', 'Dessert', 'tartelette_framboise.jpg', 'Difficile', 'http://nowimacook.com/day/2014/06/24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
