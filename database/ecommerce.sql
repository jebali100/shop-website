-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 nov. 2023 à 00:47
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `icone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `description`, `date_creation`, `icone`) VALUES
(12, 'Fruits', 'La catégories des fruits', '2023-10-29 19:30:41', 'fa-solid fa-apple-whole'),
(13, 'Télévision', 'La categories des télévision', '2023-10-29 19:32:43', 'fa-solid fa-tv'),
(14, 'Produits Laitiers', 'La catégories des produits laitiers ', '2023-10-29 19:34:16', 'fa-solid fa-cow'),
(15, 'Produits Cosmetiques', 'La catégorie des produits cosmétiques', '2023-11-06 00:19:39', 'fa-solid fa-venus');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `valide` int(11) NOT NULL DEFAULT 0,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `total`, `valide`, `date_creation`) VALUES
(33, 8, '150', 1, '2023-10-27 17:28:18'),
(34, 16, '2', 1, '2023-10-27 19:19:10'),
(35, 18, '1425', 1, '2023-10-28 00:18:05'),
(36, 16, '6', 1, '2023-10-29 17:23:15'),
(37, 19, '30', 0, '2023-10-31 17:15:28');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `discount` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `discount`, `id_categorie`, `date_creation`, `description`, `image`) VALUES
(17, 'Pommes rouges', '9', 0, 12, '2023-11-02 00:00:00', 'Pommes rouges frais du sbiba', '65482780b9a01pommes.jpg'),
(18, 'Rouge a lèvress', '16', 10, 15, '2023-11-02 00:00:00', 'Ces nouveaux rouges à lèvres mats glissent facilement sur les lèvres .\r\navec une couleur magnifique et à fort impact. \r\nLa texture crémeuse vous donne un fini mat durable sans dessécher les lèvres.\r\ndlc 12 mois', '6548257ba1770rouge.jpg'),
(19, 'Samsung Téléviseur crystal UHD 65 pouces -TU7000 - Garantie 2 ans', '3800', 20, 13, '2023-11-02 00:00:00', 'Crystal UHD 65 pouces TU7000 \r\n\r\n Garantie 2 ans\r\n\r\n \r\nCrystal DisplayPlongez-vous dans l\'image avec un spectre de couleurs plus large. Crystal Display propose des nuances réalistes qui permettent de distinguer même les plus petits détails.Crystal Process', '65482755d5194samsung.jpg'),
(20, 'Yaouert aromatisé fraise', '2', 0, 14, '2023-11-06 00:00:00', 'INFORMATION NUTRITIONNELLE POUR 1OOG*\r\nÉLÉMENTS NUTRITIFS	UNITÉ	QUANTITÉ\r\nVALEUR ÉNERGÉTIQUE	KJ	405,46\r\nPROTÉINES	G	3,2\r\nGLUCIDES	G	14,6\r\nMATIÈRES GRASSES	G	2,9\r\nSUCRE AJOUTÉ	G	10,2\r\nConseils de conservation\r\nConserver au réfrigérateur entre 4 et 6°C.\r\n\r\n', '6548286d83ef2yaouert.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_creation` date NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `date_creation`, `nom`, `prenom`) VALUES
(1, 'admin', 'admin', '2023-10-25', '', ''),
(14, 'iheb', 'iheb', '2023-10-27', 'Iheb', 'el Euch'),
(16, 'aziz', 'aziz', '2023-10-27', 'aziz', 'sghairi'),
(17, 'ahmed', 'ahmed', '2023-10-27', 'ahmed', 'drissi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `ligne_commande_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ligne_commande_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
