-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 18 Juillet 2016 à 08:54
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hb2016`
--

-- --------------------------------------------------------

--
-- Structure de la table `hb16_blocs`
--

DROP TABLE IF EXISTS `hb16_blocs`;
CREATE TABLE IF NOT EXISTS `hb16_blocs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `max` int(11) NOT NULL DEFAULT '0',
  `max_org` int(11) NOT NULL DEFAULT '0',
  `places` int(11) NOT NULL,
  `places_org` int(11) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `price_half` int(11) NOT NULL,
  `price_abn` int(11) NOT NULL,
  `price_abn_half` int(11) NOT NULL,
  `color` varchar(25) NOT NULL,
  `color_price` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hb16_blocs`
--

INSERT INTO `hb16_blocs` (`id`, `name`, `max`, `max_org`, `places`, `places_org`, `zone`, `price`, `price_half`, `price_abn`, `price_abn_half`, `color`, `color_price`) VALUES
(1, 'BLOC A', 249, 0, 249, 0, 'Zone bleue', 25, 0, 0, 0, 'primary', 'danger'),
(2, 'BLOC A SUP', 103, 0, 103, 0, 'Zone bleue sup', 20, 0, 0, 0, 'primary', 'primary'),
(3, 'BLOC B', 121, 0, 121, 0, 'Zone bleue', 25, 0, 0, 0, 'primary', 'danger'),
(4, 'BLOC B SUP', 141, 0, 141, 0, 'Zone bleue sup', 20, 0, 0, 0, 'primary', 'primary'),
(5, 'BLOC C', 127, 0, 127, 0, 'Zone bleue', 25, 0, 0, 0, 'primary', 'danger'),
(6, 'BLOC C SUP', 179, 0, 179, 0, 'Zone bleue sup', 20, 0, 0, 0, 'primary', 'primary'),
(7, 'BLOC D', 256, 0, 256, 0, 'Zone bleue', 25, 0, 0, 0, 'primary', 'danger'),
(8, 'BLOC D SUP', 121, 0, 121, 0, 'Zone bleue sup', 20, 0, 0, 0, 'primary', 'primary'),
(9, 'BLOC E', 78, 0, 78, 0, 'Zone bleue', 0, 0, 0, 0, 'primary', 'default'),
(10, 'BLOC E0', 102, 0, 102, 0, 'Zone Bleue', 0, 0, 0, 0, 'primary', 'default'),
(11, 'BLOC E SUP', 0, 0, 0, 0, 'Zone bleue sup', 20, 0, 0, 0, 'primary', 'primary'),
(12, 'BLOC F', 102, 0, 102, 0, 'Zone bleue', 0, 0, 0, 0, 'primary', 'default'),
(13, 'BLOC F0', 78, 0, 78, 0, 'Zone bleue', 0, 0, 0, 0, 'primary', 'default'),
(14, 'BLOC G', 117, 0, 117, 0, 'Zone rouge', 15, 0, 0, 0, 'danger', 'warning'),
(15, 'BLOC G SUP', 160, 0, 160, 0, 'Zone rouge sup', 10, 0, 0, 0, 'danger', 'default'),
(16, 'BLOC H', 130, 0, 130, 0, 'Zone rouge', 15, 0, 0, 0, 'danger', 'warning'),
(17, 'BLOC H SUP', 122, 0, 122, 0, 'Zone rouge sup', 10, 0, 0, 0, 'danger', 'default'),
(18, 'BLOC I', 48, 0, 47, 0, 'Zone rouge', 15, 0, 0, 0, 'danger', 'warning'),
(19, 'BLOC I SUP', 178, 0, 178, 0, 'Zone rouge sup', 10, 0, 0, 0, 'danger', 'default'),
(20, 'BLOC J', 130, 0, 130, 0, 'Zone rouge', 15, 0, 0, 0, 'danger', 'warning'),
(21, 'BLOC J SUP', 114, 0, 114, 0, 'Zone rouge sup', 10, 0, 0, 0, 'danger', 'default'),
(22, 'BLOC K', 116, 0, 116, 0, 'Zone rouge', 15, 0, 0, 0, 'danger', 'warning'),
(23, 'BLOC K SUP', 123, 0, 123, 0, 'Zone rouge sup', 10, 0, 0, 0, 'danger', 'default'),
(24, 'BLOC L', 115, 0, 111, 0, 'Zone jaune', 25, 0, 0, 0, 'warning', 'danger'),
(25, 'BLOC L SUP', 122, 0, 122, 0, 'Zone jaune sup', 20, 0, 0, 0, 'warning', 'primary'),
(26, 'BLOC M', 0, 120, -35, 110, 'Zone jaune', 25, 0, 0, 0, 'warning', 'danger'),
(27, 'BLOC M SUP', 119, 0, 118, 0, 'Zone jaune sup', 20, 0, 0, 0, 'warning', 'primary'),
(28, 'BLOC N', 0, 109, -11, 99, 'Zone jaune', 25, 0, 0, 0, 'warning', 'danger'),
(29, 'BLOC N SUP', 179, 0, 179, 0, 'Zone jaune sup', 20, 0, 0, 0, 'warning', 'primary'),
(30, 'BLOC O', 0, 121, 0, 121, 'Zone jaune', 25, 0, 0, 0, 'warning', 'danger'),
(31, 'BLOC O SUP', 142, 0, 142, 0, 'Zone jaune sup', 20, 0, 0, 0, 'warning', 'primary'),
(32, 'BLOC P', 116, 0, 116, 0, 'Zone jaune', 25, 0, 0, 0, 'warning', 'danger'),
(33, 'BLOC P SUP', 0, 0, 0, 0, 'Zone jaune sup', 20, 0, 0, 0, 'warning', 'primary'),
(34, 'BLOC Q', 146, 0, 146, 0, 'Zone jaune', 0, 0, 0, 0, 'warning', 'default'),
(35, 'BLOC R', 146, 0, 146, 0, 'Zone jaune', 0, 0, 0, 0, 'warning', 'default'),
(36, 'BLOC S', 76, 0, 76, 0, 'Zone noire', 10, 0, 0, 0, 'default', 'default'),
(37, 'BLOC T', 93, 0, 93, 0, 'Zone noire', 25, 0, 0, 0, 'default', 'danger'),
(38, 'BLOC U', 200, 0, 200, 0, 'Zone noire', 25, 0, 0, 0, 'default', 'danger'),
(39, 'BLOC V', 92, 0, 92, 0, 'Zone noire', 25, 0, 0, 0, 'default', 'danger'),
(40, 'BLOC X', 75, 0, 75, 0, 'Zone noire', 10, 0, 0, 0, 'default', 'default'),
(41, 'BLOC Z', 46, 0, 46, 0, 'Zone rouge', 0, 0, 0, 0, 'danger', 'default'),
(42, 'BLOC Z0', 46, 0, 46, 0, 'Zone rouge', 0, 0, 0, 0, 'danger', 'default');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
