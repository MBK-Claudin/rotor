-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 19 juin 2024 à 11:32
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rotor`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_cli` int(11) NOT NULL,
  `nom_cli` varchar(50) DEFAULT NULL,
  `prenom_cli` varchar(50) DEFAULT NULL,
  `adresse_cli` varchar(50) DEFAULT NULL,
  `telephone_cli` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_cli`, `nom_cli`, `prenom_cli`, `adresse_cli`, `telephone_cli`) VALUES
(3, 'azerty', 'azert', 'qsdfghjk', '12345678');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_com` int(11) NOT NULL,
  `date_com` date DEFAULT NULL,
  `quantite_com` int(11) DEFAULT NULL,
  `montant_com` int(11) DEFAULT NULL,
  `four_id` int(11) DEFAULT NULL,
  `voiture_id` int(11) DEFAULT NULL,
  `employe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_com`, `date_com`, `quantite_com`, `montant_com`, `four_id`, `voiture_id`, `employe_id`) VALUES
(1, '2024-06-07', 1122, 10000000, 3, 3, 5),
(2, '2024-06-02', 12, 9999998, 2, 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id_emp` int(11) NOT NULL,
  `nom_emp` varchar(50) DEFAULT NULL,
  `prenom_emp` varchar(50) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `date_emb` date DEFAULT NULL,
  `poste` varchar(50) DEFAULT NULL,
  `salaire` varchar(50) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id_emp`, `nom_emp`, `prenom_emp`, `mdp`, `sexe`, `adresse`, `telephone`, `date_naiss`, `date_emb`, `poste`, `salaire`, `photo`) VALUES
(5, 'admin', 'admin', '$2y$10$EBd7jwAxqMpfDB1bQAdz5O6hPXLh7crTVG4l/nQkTZtClm0j7FBq2', 'femme', 'azerty', '1234567890', '2024-06-28', '2024-06-21', 'Responsable', '12000000', '../../assets/images/faces/golden-hour-dream-3840x2160-14484.jpg'),
(7, 'user', 'user', '$2y$10$m.NB3arCgMwObSRUvugrOezLroxH1SE95OrfQgoymXgKM4F04bFhO', 'homme', 'azertyui', '1234567890', '2024-06-27', '2024-06-28', 'Responsable', '12345678', '../../assets/images/faces/golden-hour-dream-3840x2160-14484.jpg'),
(8, 'user1', 'hgjh', '$2y$10$x5vy/Ck/z5F9ktFkKfhDyuOPAiYB63VJtNtttOBweE627EAmccyMG', 'homme', 'dfhgjkj', '123456789', '2024-06-07', '2024-06-14', 'Responsable', '1234567', '../../assets/images/faces/golden-hour-dream-3840x2160-14484.jpg'),
(9, 'john', 'Doe', '$2y$10$q3cyqkLmtGkbzl44b4F39uVZyZyHFVUCFeepMzn4f9Iaxmwgy1XBy', 'homme', 'dfghgjh', '0987', '2024-07-05', '2024-05-31', 'Vendeur', '10000', '../../assets/images/faces/asuna-sword-art-3840x2160-10486.png');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id_fournisseur` int(11) NOT NULL,
  `nom_four` varchar(50) DEFAULT NULL,
  `adresse_four` varchar(50) DEFAULT NULL,
  `telephone_four` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_fournisseur`, `nom_four`, `adresse_four`, `telephone_four`) VALUES
(2, 'four', 'adressezertyuio', '123456456789'),
(3, 'four', 'azertyui', '123456789');

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

CREATE TABLE `ventes` (
  `id_vente` int(11) NOT NULL,
  `date_vente` date DEFAULT NULL,
  `quantite_vente` int(11) DEFAULT NULL,
  `montant_vente` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `voiture_id` int(11) DEFAULT NULL,
  `employe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`id_vente`, `date_vente`, `quantite_vente`, `montant_vente`, `client_id`, `voiture_id`, `employe_id`) VALUES
(1, '2024-06-12', 1, 120001, 3, 3, 5),
(2, '2024-05-30', 2, 120000, 3, 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

CREATE TABLE `voitures` (
  `id_voiture` int(11) NOT NULL,
  `marque` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `annee_fab` int(11) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `type_carburant` varchar(50) DEFAULT NULL,
  `type_transmission` varchar(50) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `nbr_place` varchar(50) DEFAULT NULL,
  `quantite_stock` int(11) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voitures`
--

INSERT INTO `voitures` (`id_voiture`, `marque`, `model`, `annee_fab`, `prix`, `type_carburant`, `type_transmission`, `couleur`, `nbr_place`, `quantite_stock`, `photo`) VALUES
(3, 'azdezr', 'efszert', 2000, 1234, 'ZFREGTH', 'RGTHY', 'RDTFYJ', '1234', 12, '../../assets/images/voitures/golden-hour-dream-3840x2160-14484.jpg'),
(4, 'xnbnvxcvn', 'efs', 2000, 1234, 'ZFREGTH', 'RGTHY', 'RDTFYJ', '1234', 12345, '../../assets/images/voitures/golden-hour-dream-3840x2160-14484.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_cli`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `four_id` (`four_id`),
  ADD KEY `voiture_id` (`voiture_id`),
  ADD KEY `employe_id` (`employe_id`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id_emp`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`id_vente`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `voiture_id` (`voiture_id`),
  ADD KEY `employe_id` (`employe_id`);

--
-- Index pour la table `voitures`
--
ALTER TABLE `voitures`
  ADD PRIMARY KEY (`id_voiture`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id_vente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `id_voiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`four_id`) REFERENCES `fournisseurs` (`id_fournisseur`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`voiture_id`) REFERENCES `voitures` (`id_voiture`),
  ADD CONSTRAINT `commandes_ibfk_3` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id_emp`);

--
-- Contraintes pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD CONSTRAINT `ventes_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id_cli`),
  ADD CONSTRAINT `ventes_ibfk_2` FOREIGN KEY (`voiture_id`) REFERENCES `voitures` (`id_voiture`),
  ADD CONSTRAINT `ventes_ibfk_3` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id_emp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
