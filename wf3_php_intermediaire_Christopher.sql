-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 04 fév. 2022 à 15:22
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wf3_php_intermediaire_prenom`
--

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `postal_code` int(5) NOT NULL,
  `city` varchar(70) NOT NULL,
  `type` enum('Location','Achat','Vente') NOT NULL,
  `price` int(11) NOT NULL,
  `reservation_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`id`, `title`, `description`, `postal_code`, `city`, `type`, `price`, `reservation_message`) VALUES
(1, '1001vies', 'Appartement F4, 70m2, deux chambres', 93400, 'Villetaneuse', 'Location', 450, ''),
(2, 'wrgtrgtghsr', 'Appart de 25m2, comportant une salle a manger et salle de bain', 93200, 'Saint-Denis', 'Location', 300, ''),
(3, 'thdrth', 'Appart de 60m2 comportant une chambre et une salle a manger', 95200, 'Sarcelles', 'Location', 500, ''),
(4, 'fyhjtyh', 'Appart de 75m2 comportant deux chambres , salle à manger, un placard.', 95330, 'Domont', 'Vente', 550, ''),
(5, 'xcyfjdtyjfyu', 'Appart de 100 m2 comportant deux chambres, une grande salle à manger, un grand placard et salle de bain.', 95400, 'Villiers le bel', 'Location', 550, ''),
(6, 'pmpjo', 'Appart de 120m2 comportant trois chambres, une grande salle à manger et cuisine.', 93800, 'Epinay-sur-Seine', 'Location', 500, ''),
(7, 'iiyuiguu', 'Appartement étudiant de 70m2 comportant une grande chambre !', 92400, 'La défense', 'Location', 600, 'Je m\'appelle Sacha Ketchum , je viens du Bourg-Palette et je souhaiterais louer cet appartement. Voici mes coordonnées : 01-96-85-42-37\r\nMail : ashKet@mail.com'),
(8, 'olhlkguik', 'Appartement de 65m2 avec environnement spatieux et grand calme.', 75010, 'Paris', 'Achat', 8000, ''),
(9, 'ukujtj', 'Appart de 50m2 avec vue sur Paris plage !', 75020, 'Paris', 'Achat', 6000, ''),
(10, 'srthshjty', 'ergsrtghshstrhsrth', 95600, 'Eaubonne', 'Location', 2000, 'Bonjour, je réserve cet appartement ! Si vous souhaitez me contacter pour infos ou d\'autres pièces administratives, voici mon numéro :\r\n05-63-58-74-98.'),
(11, 'zrerrgergr', 'wrhlmgkopgo,togkl', 56231, 'Poseidon', 'Achat', 8500, ''),
(12, 'uluiliului', 'omifldpkôgjkerùop', 54237, 'NullePart', 'Achat', 52300, ''),
(13, 'sdgrerg', 'efzefthhegtrazeerafsrfer 500m2', 75015, 'Paris', 'Achat', 10000, ''),
(14, 'azerty', 'Maison du futur', 69002, 'Lyon', 'Vente', 50000, ''),
(15, 'dtjyuj', 'Maison de l\'avenir 8000 m2', 13005, 'Marseille', 'Location', 100000, ''),
(16, 'Neuf Vies', 'Maison ressemblant à un château de 500m2 possédant trois chambres et deux salles à manger !', 95340, 'Persan', 'Vente', 60000, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
