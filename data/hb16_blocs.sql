-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mar 12 Juillet 2016 à 14:27
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hb2016`
--

-- --------------------------------------------------------

--
-- Structure de la table `hb16_blocs`
--

CREATE TABLE `hb16_blocs` (
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
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hb16_blocs`
--

INSERT INTO `hb16_blocs` (`name`, `max`, `max_org`, `places`, `places_org`, `zone`, `price`, `price_half`, `price_abn`, `price_abn_half`, `color`, `id`) VALUES
('BLOC A', 249, 0, 249, 0, 'Zone bleue', 25, 0, 0, 0, 'primary', 1),
('BLOC A SUP', 103, 0, 103, 0, 'Zone bleue sup', 20, 0, 0, 0, 'primary', 2),
('BLOC B', 121, 0, 121, 0, 'Zone bleue', 25, 0, 0, 0, 'primary', 3),
('BLOC B SUP', 141, 0, 141, 0, 'Zone bleue sup', 20, 0, 0, 0, 'primary', 4),
('BLOC C', 127, 0, 127, 0, 'Zone bleue', 25, 0, 0, 0, 'primary', 5),
('BLOC C SUP', 179, 0, 179, 0, 'Zone bleue sup', 20, 0, 0, 0, 'primary', 6),
('BLOC D', 256, 0, 256, 0, 'Zone bleue', 25, 0, 0, 0, 'primary', 7),
('BLOC D SUP', 121, 0, 121, 0, 'Zone bleue sup', 20, 0, 0, 0, 'primary', 8),
('BLOC E', 78, 0, 78, 0, 'Zone bleue', 0, 0, 0, 0, 'primary', 9),
('BLOC E0', 102, 0, 102, 0, 'Zone Bleue', 0, 0, 0, 0, 'primary', 10),
('BLOC E SUP', 0, 0, 0, 0, 'Zone bleue sup', 20, 0, 0, 0, 'primary', 11),
('BLOC F', 102, 0, 102, 0, 'Zone bleue', 0, 0, 0, 0, 'primary', 12),
('BLOC F0', 78, 0, 78, 0, 'Zone bleue', 0, 0, 0, 0, 'primary', 13),
('BLOC G', 117, 0, 117, 0, 'Zone rouge', 15, 0, 0, 0, 'danger', 14),
('BLOC G SUP', 160, 0, 160, 0, 'Zone rouge sup', 10, 0, 0, 0, 'danger', 15),
('BLOC H', 130, 0, 130, 0, 'Zone rouge', 15, 0, 0, 0, 'danger', 16),
('BLOC H SUP', 122, 0, 122, 0, 'Zone rouge sup', 10, 0, 0, 0, 'danger', 17),
('BLOC I', 48, 0, 48, 0, 'Zone rouge', 15, 0, 0, 0, 'danger', 18),
('BLOC I SUP', 178, 0, 178, 0, 'Zone rouge sup', 10, 0, 0, 0, 'danger', 19),
('BLOC J', 130, 0, 130, 0, 'Zone rouge', 15, 0, 0, 0, 'danger', 20),
('BLOC J SUP', 114, 0, 114, 0, 'Zone rouge sup', 10, 0, 0, 0, 'danger', 21),
('BLOC K', 116, 0, 116, 0, 'Zone rouge', 15, 0, 0, 0, 'danger', 22),
('BLOC K SUP', 123, 0, 123, 0, 'Zone rouge sup', 10, 0, 0, 0, 'danger', 23),
('BLOC L', 115, 0, 114, 0, 'Zone jaune', 25, 0, 0, 0, 'warning', 24),
('BLOC L SUP', 122, 0, 122, 0, 'Zone jaune sup', 20, 0, 0, 0, 'warning', 25),
('BLOC M', 0, 120, -50, 70, 'Zone jaune', 25, 0, 0, 0, 'warning', 26),
('BLOC M SUP', 119, 0, 119, 0, 'Zone jaune sup', 20, 0, 0, 0, 'warning', 27),
('BLOC N', 0, 109, -21, 89, 'Zone jaune', 25, 0, 0, 0, 'warning', 28),
('BLOC N SUP', 179, 0, 179, 0, 'Zone jaune sup', 20, 0, 0, 0, 'warning', 29),
('BLOC O', 0, 121, -20, 101, 'Zone jaune', 25, 0, 0, 0, 'warning', 30),
('BLOC O SUP', 142, 0, 142, 0, 'Zone jaune sup', 20, 0, 0, 0, 'warning', 31),
('BLOC P', 116, 0, 116, 0, 'Zone jaune', 25, 0, 0, 0, 'warning', 32),
('BLOC P SUP', 0, 0, 0, 0, 'Zone jaune sup', 20, 0, 0, 0, 'warning', 33),
('BLOC Q', 146, 0, 146, 0, 'Zone jaune', 0, 0, 0, 0, 'warning', 34),
('BLOC R', 146, 0, 146, 0, 'Zone jaune', 0, 0, 0, 0, 'warning', 35),
('BLOC S', 76, 0, 76, 0, 'Zone noire', 10, 0, 0, 0, 'default', 36),
('BLOC T', 93, 0, 93, 0, 'Zone noire', 25, 0, 0, 0, 'default', 37),
('BLOC U', 200, 0, 200, 0, 'Zone noire', 25, 0, 0, 0, 'default', 38),
('BLOC V', 92, 0, 92, 0, 'Zone noire', 25, 0, 0, 0, 'default', 39),
('BLOC X', 75, 0, 75, 0, 'Zone noire', 10, 0, 0, 0, 'default', 40),
('BLOC Z', 46, 0, 46, 0, 'Zone rouge', 0, 0, 0, 0, 'danger', 41),
('BLOC Z0', 46, 0, 46, 0, 'Zone rouge', 0, 0, 0, 0, 'danger', 42);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `hb16_blocs`
--
ALTER TABLE `hb16_blocs`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `hb16_blocs`
--
ALTER TABLE `hb16_blocs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
