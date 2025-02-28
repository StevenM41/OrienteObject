-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 28 fév. 2025 à 15:06
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `produits`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `stock` int NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `description`, `stock`, `prix`) VALUES
(112, 'Agrafeuse', 'Agrafeuse de bureau, 10 agrafes.', 60, 3.50),
(113, 'Pochette plastique', 'Pochette plastique A4, 50 unités.', 120, 2.00),
(114, 'Équerre', 'Équerre en plastique transparent.', 90, 1.50),
(115, 'Compas', 'Compas métallique avec mine.', 80, 2.50),
(116, 'Rapporteur', 'Rapporteur semi-circulaire, 180°.', 110, 1.75),
(117, 'Crayon de couleur', 'Boîte de 12 crayons de couleur.', 60, 3.00),
(118, 'Marqueur effaçable', 'Marqueur effaçable à sec, pointe fine.', 100, 1.80),
(119, 'Carnet', 'Carnet à spirale, 100 pages.', 130, 2.75),
(120, 'Porte-mine', 'Porte-mine avec gomme, mine 0.5 mm.', 150, 2.00),
(121, 'Mines de rechange', 'Boîte de 10 mines 0.5 mm.', 200, 1.00),
(122, 'Correcteur liquide', 'Correcteur liquide, 10 ml.', 140, 1.50),
(123, 'Perforatrice', 'Perforatrice 2 trous, format A4.', 70, 4.00),
(124, 'Chemise cartonnée', 'Chemise cartonnée A4, couleur bleue.', 90, 1.20),
(125, 'Élastiques', 'Paquet de 100 élastiques.', 180, 1.00),
(126, 'Trombones', 'Boîte de 100 trombones.', 200, 0.80),
(127, 'Ruban adhésif', 'Rouleau de ruban adhésif transparent, 19 mm.', 150, 1.50),
(128, 'Pinceaux', 'Set de 5 pinceaux pour aquarelle.', 60, 4.00),
(129, 'Tubes de gouache', 'Set de 10 tubes de gouache, 12 ml.', 50, 5.00),
(130, 'Feuilles Canson', 'Paquet de 10 feuilles Canson, 24x32 cm.', 80, 3.50),
(132, 'Carnet de croquis', 'Carnet de croquis A5, 80 pages.', 120, 4.00),
(133, 'Stylo plume', 'Stylo plume avec cartouches d\'encre bleue.', 50, 10.00),
(134, 'Cartouches d\'encre', 'Boîte de 5 cartouches d\'encre pour stylo plume.', 80, 3.00),
(135, 'Agenda', 'Agenda annuel, format A5.', 90, 6.00),
(136, 'Calculatrice', 'Calculatrice scientifique.', 60, 8.00),
(137, 'Lampe de bureau', 'Lampe de bureau LED, flexible.', 40, 15.00),
(138, 'Trousse', 'Trousse zippée, 20 cm.', 110, 3.00),
(140, 'Feutre pinceau', 'Feutre à pointe pinceau, encre noire.', 100, 2.00),
(141, 'Papier calque', 'Rame de 50 feuilles de papier calque A4.', 50, 4.00),
(142, 'Crayon feutre', 'Set de 24 crayons feutres, couleurs assorties.', 60, 5.00),
(143, 'Ciseaux cranteurs', 'Ciseaux cranteurs, lame de 19 cm.', 80, 3.00),
(144, 'Pistolet à colle', 'Pistolet à colle chaude avec 10 bâtonnets.', 40, 7.00),
(147, 'Oliver', 'il est beau', 8, 8.00),
(148, 'Oliver', 'il est beau', 8, 8.00),
(149, 'Oliver', 'il est beau', 8, 8.00),
(150, 'vrvrv', 'ss', 8, 8.00),
(151, 'vrvrv', 'ss', 8, 8.00),
(152, 'test', 'une description', 95, 9.55);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
