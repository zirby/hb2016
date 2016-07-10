-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 10 Juillet 2016 à 13:47
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hb16_blocs`
--

INSERT INTO `hb16_blocs` (`name`, `max`, `max_org`, `places`, `places_org`, `zone`, `price`, `price_half`, `price_abn`, `price_abn_half`, `color`, `id`) VALUES
('BLOC A', 249, 0, 249, 0, 'Zone bleue', 42, 22, 92, 47, 'danger', 1),
('BLOC A SUP', 103, 0, 103, 0, 'Zone bleue sup', 42, 22, 92, 47, 'warning', 2),
('BLOC B', 121, 0, 121, 0, 'Zone bleue', 42, 22, 92, 47, 'danger', 3),
('BLOC B SUP', 141, 0, 141, 0, 'Zone bleue sup', 42, 22, 92, 47, 'warning', 4),
('BLOC C', 127, 0, 127, 0, 'Zone bleue', 42, 22, 92, 47, 'danger', 5),
('BLOC C SUP', 179, 0, 179, 0, 'Zone bleue sup', 42, 22, 92, 47, 'warning', 6),
('BLOC D', 256, 0, 256, 0, 'Zone bleue', 42, 22, 92, 47, 'danger', 7),
('BLOC D SUP', 121, 0, 121, 0, 'Zone bleue sup', 42, 22, 92, 47, 'warning', 8),
('BLOC E', 78, 0, 78, 0, 'Zone bleue', 42, 22, 92, 47, 'primary', 9),
('BLOC E0', 102, 0, 102, 0, 'Zone Bleue', 42, 22, 92, 47, 'primary', 10),
('BLOC E SUP', 0, 0, 0, 0, 'Zone bleue sup', 42, 22, 92, 47, 'warning', 11),
('BLOC F', 102, 0, 102, 0, 'Zone bleue', 42, 22, 92, 47, 'primary', 12),
('BLOC F0', 78, 0, 78, 0, 'Zone bleue', 42, 22, 92, 47, 'primary', 13),
('BLOC G', 117, 0, 117, 0, 'Zone rouge', 42, 22, 92, 47, 'warning', 14),
('BLOC G SUP', 160, 0, 160, 0, 'Zone rouge sup', 42, 22, 92, 47, 'default', 15),
('BLOC H', 130, 0, 130, 0, 'Zone rouge', 42, 22, 92, 47, 'warning', 16),
('BLOC H SUP', 122, 0, 122, 0, 'Zone rouge sup', 42, 22, 92, 47, 'default', 17),
('BLOC I', 48, 0, 47, 0, 'Zone rouge', 42, 22, 92, 47, 'warning', 18),
('BLOC I SUP', 178, 0, 178, 0, 'Zone rouge sup', 42, 22, 92, 47, 'default', 19),
('BLOC J', 130, 0, 130, 0, 'Zone rouge', 42, 22, 92, 47, 'warning', 20),
('BLOC J SUP', 114, 0, 114, 0, 'Zone rouge sup', 42, 22, 92, 47, 'default', 21),
('BLOC K', 116, 0, 116, 0, 'Zone rouge', 42, 22, 92, 47, 'warning', 22),
('BLOC K SUP', 123, 0, 123, 0, 'Zone rouge sup', 42, 22, 92, 47, 'default', 23),
('BLOC L', 115, 0, 111, 0, 'Zone jaune', 42, 22, 92, 47, 'danger', 24),
('BLOC L SUP', 122, 0, 122, 0, 'Zone jaune sup', 42, 22, 92, 47, 'warning', 25),
('BLOC M', 120, 0, 120, 0, 'Zone jaune', 42, 22, 92, 47, 'danger', 26),
('BLOC M SUP', 119, 0, 119, 0, 'Zone jaune sup', 42, 22, 92, 47, 'warning', 27),
('BLOC N', 109, 0, 108, 0, 'Zone jaune', 42, 22, 92, 47, 'danger', 28),
('BLOC N SUP', 179, 0, 179, 0, 'Zone jaune sup', 42, 22, 92, 47, 'warning', 29),
('BLOC O', 121, 0, 121, 0, 'Zone jaune', 42, 22, 92, 47, 'danger', 30),
('BLOC O SUP', 142, 0, 142, 0, 'Zone jaune sup', 42, 22, 92, 47, 'warning', 31),
('BLOC P', 116, 0, 116, 0, 'Zone jaune', 42, 22, 92, 47, 'danger', 32),
('BLOC P SUP', 0, 0, 0, 0, 'Zone jaune sup', 42, 22, 92, 47, 'warning', 33),
('BLOC Q', 146, 0, 146, 0, 'Zone jaune', 42, 22, 92, 47, 'warning', 34),
('BLOC R', 146, 0, 146, 0, 'Zone jaune', 42, 22, 92, 47, 'warning', 35),
('BLOC S', 76, 0, 76, 0, 'Zone noire', 42, 22, 92, 47, 'default', 36),
('BLOC T', 93, 0, 93, 0, 'Zone noire', 42, 22, 92, 47, 'danger', 37),
('BLOC U', 200, 0, 200, 0, 'Zone noire', 42, 22, 92, 47, 'danger', 38),
('BLOC V', 92, 0, 92, 0, 'Zone noire', 42, 22, 92, 47, 'danger', 39),
('BLOC X', 75, 0, 75, 0, 'Zone noire', 42, 22, 92, 47, 'default', 40),
('BLOC Z', 46, 0, 46, 0, 'Zone rouge', 42, 22, 92, 47, 'danger', 41),
('BLOC Z0', 46, 0, 46, 0, 'Zone rouge', 42, 22, 92, 47, 'danger', 42);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
