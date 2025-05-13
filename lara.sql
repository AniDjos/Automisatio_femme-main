-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2025 at 11:58 AM
-- Server version: 11.8.1-MariaDB-4
-- PHP Version: 8.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara`
--

-- --------------------------------------------------------

--
-- Table structure for table `activite`
--

CREATE TABLE `activite` (
  `activite_id` int(11) NOT NULL,
  `activite` varchar(100) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `activite`
--

INSERT INTO `activite` (`activite_id`, `activite`, `users_id`) VALUES
(1, 'Transformation de soja en fromage et ses dérivés ', NULL),
(2, 'Transformation de noix de palme en huile rouge', NULL),
(3, 'Fabrication de divers épice de tomates en bouteille et du piment de table', NULL),
(4, 'Transformation du maïs du manioc du Cesam et de l’igname séché', NULL),
(5, 'Maraîchage', NULL),
(6, 'Production de l\'huile rouge', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agrement`
--

CREATE TABLE `agrement` (
  `agrement_id` int(11) NOT NULL,
  `structure` varchar(100) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `date_deliver` date DEFAULT NULL,
  `groupement_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `agrement`
--

INSERT INTO `agrement` (`agrement_id`, `structure`, `reference`, `document`, `date_deliver`, `groupement_id`, `created_at`, `updated_at`, `users_id`) VALUES
(1, '1', 'N°019/DDAEP-COU/MAEP/SSPDA/DSFIG-OPA/SA', NULL, '2020-08-03', 1, '2025-05-11 16:05:58', '2025-05-11 16:05:58', NULL),
(2, '7', '10/04/03/2019/162/Im', NULL, '2019-12-20', 2, '2025-05-11 17:12:56', '2025-05-11 17:25:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appuis`
--

CREATE TABLE `appuis` (
  `appuis_id` int(11) NOT NULL,
  `type_appuis` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_appuis` date DEFAULT NULL,
  `groupement_id` int(11) NOT NULL,
  `structure_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `appui_masm` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appuis`
--

INSERT INTO `appuis` (`appuis_id`, `type_appuis`, `description`, `date_appuis`, `groupement_id`, `structure_id`, `users_id`, `appui_masm`) VALUES
(1, 'materiel', 'PADA Nutrition en 2020, moulin pour écraser le soja, bouteilles, gaz, machine de cuisson de lait, bassines, marmites', '2020-01-01', 1, 1, NULL, NULL),
(2, 'financier', 'Nean', '2025-05-08', 2, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `arrondissement`
--

CREATE TABLE `arrondissement` (
  `arrondissement_id` int(11) NOT NULL,
  `arrondissement_libelle` varchar(100) NOT NULL,
  `commune_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `arrondissement`
--

INSERT INTO `arrondissement` (`arrondissement_id`, `arrondissement_libelle`, `commune_id`) VALUES
(1, 'Madjrè', 1),
(2, '11eme arrondissement ', 2),
(3, 'zoungbomé', 3);

-- --------------------------------------------------------

--
-- Table structure for table `commune`
--

CREATE TABLE `commune` (
  `commune_id` int(11) NOT NULL,
  `commune_libelle` varchar(100) NOT NULL,
  `departement_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commune`
--

INSERT INTO `commune` (`commune_id`, `commune_libelle`, `departement_id`) VALUES
(1, 'Dogbo', 5),
(2, 'Cotonou ', 10),
(3, 'd\'akpro-missérété ', 8);

-- --------------------------------------------------------

--
-- Table structure for table `cps`
--

CREATE TABLE `cps` (
  `cps_id` int(11) NOT NULL,
  `cps_libelle` varchar(100) NOT NULL,
  `departement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `commune_id` bigint(20) UNSIGNED DEFAULT NULL,
  `arrondissement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quartier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `departement_id` int(11) NOT NULL,
  `departement_libelle` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`departement_id`, `departement_libelle`) VALUES
(1, 'ALIBORI'),
(2, 'ATLANTIQUE'),
(3, 'ZOU'),
(4, 'MONO'),
(5, 'COUFFO'),
(6, 'DONGA'),
(7, 'ATACORA'),
(8, 'OUÉMÉ'),
(9, 'PLATEAU'),
(10, 'LITORALE'),
(11, 'BORGOU'),
(12, 'COLLINES');

-- --------------------------------------------------------

--
-- Table structure for table `equipement`
--

CREATE TABLE `equipement` (
  `equipment_id` int(11) NOT NULL,
  `equipment_libelle` varchar(100) NOT NULL,
  `stat_equipement` varchar(50) NOT NULL,
  `description_difficultie` text DEFAULT NULL,
  `description_besoin` text DEFAULT NULL,
  `groupement_id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipement`
--

INSERT INTO `equipement` (`equipment_id`, `equipment_libelle`, `stat_equipement`, `description_difficultie`, `description_besoin`, `groupement_id`, `users_id`) VALUES
(1, 'Null', 'neuf', 'Insuffisance de fonds de roulement', 'Un local, \r\nUn moulin pour écraser le soja\r\nBassines \r\nGrandes marmites\r\nBouteilles \r\nTamis', 1, NULL),
(2, 'Rien', 'use', 'Moyen financier adéquat, absence d\'eau en permanence, nous avons de forage mais le groupe électrogène se gâte trop et nous envisageons de pompage solaire, besoin de formation sur les nouvelles techniques de production,et nous avons de difficulté pour conserver nos produits.', 'Nous avons besoin d\'équipements et de financement', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faire`
--

CREATE TABLE `faire` (
  `utilisateur_id` int(11) NOT NULL,
  `activite_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `filiere_id` int(11) NOT NULL,
  `filiere_nom` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`filiere_id`, `filiere_nom`) VALUES
(1, 'Transformation'),
(2, 'Agricole');

-- --------------------------------------------------------

--
-- Table structure for table `gerer`
--

CREATE TABLE `gerer` (
  `administrateur_id` int(11) NOT NULL,
  `groupement_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groupement`
--

CREATE TABLE `groupement` (
  `groupement_id` int(11) NOT NULL,
  `effectif` int(11) DEFAULT NULL,
  `statut` tinyint(1) NOT NULL,
  `rejet` tinyint(1) NOT NULL DEFAULT 0,
  `nom` varchar(100) DEFAULT NULL,
  `commune` varchar(255) DEFAULT NULL,
  `arrondissement` varchar(255) DEFAULT NULL,
  `quartier` varchar(255) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `revenu_mens` float DEFAULT NULL,
  `benefice_mens` float DEFAULT NULL,
  `source_financement` varchar(100) NOT NULL,
  `depense_mens` float DEFAULT NULL,
  `filiere_id` int(11) DEFAULT NULL,
  `departement_id` int(11) NOT NULL,
  `appuis_principal_id` int(11) DEFAULT NULL,
  `activite_principale_id` int(11) DEFAULT NULL,
  `activite_secondaire_id` int(11) DEFAULT NULL,
  `cps_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `groupement`
--

INSERT INTO `groupement` (`groupement_id`, `effectif`, `statut`, `rejet`, `nom`, `commune`, `arrondissement`, `quartier`, `date_creation`, `revenu_mens`, `benefice_mens`, `source_financement`, `depense_mens`, `filiere_id`, `departement_id`, `appuis_principal_id`, `activite_principale_id`, `activite_secondaire_id`, `cps_id`, `created_at`, `updated_at`, `users_id`) VALUES
(1, 33, 1, 0, 'LONLONGNON', '1', '1', '1', '2022-02-28', 15000, 7000, 'Structure de microfinance, caisse du groupement (cotisation)', 8000, 1, 5, NULL, 1, 2, NULL, NULL, '2025-05-11 17:22:50', NULL),
(2, 15, 0, 0, 'AHINADJE', '3', '3', '3', '2022-03-01', 126000, 44000, 'Cotisation', 82000, 2, 8, NULL, 5, 6, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `membre_id` int(11) NOT NULL,
  `prenom_membre` varchar(50) NOT NULL,
  `nom_membre` varchar(50) NOT NULL,
  `role_stimule` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `groupement_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_04_23_131914_add_auth_columns_to_utilisateur_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quartier`
--

CREATE TABLE `quartier` (
  `quartier_id` int(11) NOT NULL,
  `quartier_libelle` varchar(100) NOT NULL,
  `arrondissement_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quartier`
--

INSERT INTO `quartier` (`quartier_id`, `quartier_libelle`, `arrondissement_id`) VALUES
(1, 'Kénavo, hameau Houagahoué, ', 1),
(2, 'Houeyiho M /DASILVEIRA Désiré ', 2),
(3, 'village koudjannada', 3);

-- --------------------------------------------------------

--
-- Table structure for table `structure`
--

CREATE TABLE `structure` (
  `structure_id` int(11) NOT NULL,
  `structure` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `structure`
--

INSERT INTO `structure` (`structure_id`, `structure`) VALUES
(1, 'Direction Départementale de l\'Agriculture, de l\'Elevage et de la pêche du Couffo'),
(2, 'Structure de microfinance, caisse du groupement (cotisation)'),
(3, 'Bethesda'),
(4, 'MASM'),
(5, 'DDAEP-LIT'),
(6, 'CLCAM'),
(7, 'DDAEP');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `rejet` tinyint(1) NOT NULL DEFAULT 0,
  `role` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `name`, `email`, `statut`, `rejet`, `role`, `profile_photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Djossou', 'Anicet Jason', ' Djossou Anicet', 'anicet@gmail.com', 1, 0, 'admin', '1_1746526653.png', NULL, '$2y$12$AjCqj5YxNiwWZbIj3SlQyuidoC81w0CF7EHhEjuzyGxRVP7TpMUBC', NULL, '2025-05-01 07:50:31', '2025-05-07 11:20:50'),
(3, 'User', 'Test', 'DANGBO Emérode', 'test@example.com', 1, 0, 'gestionnaire du ministere', '3_1746461227.png', '2025-04-29 15:53:08', '$2y$12$AjCqj5YxNiwWZbIj3SlQyuidoC81w0CF7EHhEjuzyGxRVP7TpMUBC', 'urn1ONhdCnDsvzoYSx0trWSqb6WbnaNSTohIZbGpcRMFyrLZ6Y3MEf8agpkS', '2025-04-29 15:53:09', '2025-05-09 06:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateur_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_id`, `nom`, `prenom`, `email`, `mdp`, `role`, `statut`, `created_at`, `updated_at`, `email_verified_at`, `remember_token`) VALUES
(1, 'djossou', 'GRA', 'anicetdjossou1@gmail.com', '12345678', 'admin', 0, NULL, '2025-04-23 14:08:18', NULL, NULL),
(2, 'Féminine', 'GRA', 'admin@admin.com', '$2y$12$2vevvbR2q7d1a2CRDq4pEuFLL4gjhOc8axoi6592qSUjAwo9cKL.6', 'admin', 1, '2025-04-23 10:53:28', '2025-04-23 14:38:44', NULL, 'cJaucCKQ4DtWtWbSoCuzrxfMmSjqni3hHoQm4YKJsWO0fzeNyU1g3hsWuk6s'),
(3, 'DJOSSOU', 'Jason', 'jason@gmail.com', '$2y$12$HxI49gkLsAM6gLuP3YxsS.P.BIYKa5oKCpmsF1df/ZKtjeU.MdS36', 'admin', 1, '2025-04-23 14:18:01', '2025-04-23 14:42:48', NULL, NULL),
(4, 'Féminine', 'GRA', 'gra@admin.com', '$2y$12$KVietM4iZ2MTqy/qqepRfeVVp3J/TjZEuPWLwXyooA5jj9NJLuutK', 'utilisateur', 0, '2025-04-23 14:24:16', '2025-04-24 06:13:41', NULL, NULL),
(5, 'MR', 'John', 'john@admin.com', '$2y$12$jXK2eFQ5KGzbxKKfW5z/l.Pfr4Pz8XLNZWt1gwIFHGWFOzySmCfy.', 'utilisateur', 1, '2025-04-24 06:13:02', '2025-04-24 06:22:51', NULL, NULL),
(6, 'ROSE', 'TH', 'rose@gmail.com', '$2y$12$c6CPK1UjaP9YhwN5Vg08yO5uG9qcmBJfHbatx/gzuPys3LtkVZHti', 'admin', 1, '2025-04-24 07:01:01', '2025-04-24 07:01:01', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`activite_id`),
  ADD KEY `fk_activite_users` (`users_id`);

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Indexes for table `agrement`
--
ALTER TABLE `agrement`
  ADD PRIMARY KEY (`agrement_id`),
  ADD KEY `fk_agrement_groupement` (`groupement_id`),
  ADD KEY `fk_agrement_users` (`users_id`);

--
-- Indexes for table `appuis`
--
ALTER TABLE `appuis`
  ADD PRIMARY KEY (`appuis_id`),
  ADD KEY `groupement_id` (`groupement_id`),
  ADD KEY `structure_id` (`structure_id`),
  ADD KEY `fk_appuis_users` (`users_id`);

--
-- Indexes for table `arrondissement`
--
ALTER TABLE `arrondissement`
  ADD PRIMARY KEY (`arrondissement_id`),
  ADD KEY `commune_id` (`commune_id`);

--
-- Indexes for table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`commune_id`),
  ADD KEY `departement_id` (`departement_id`);

--
-- Indexes for table `cps`
--
ALTER TABLE `cps`
  ADD PRIMARY KEY (`cps_id`),
  ADD KEY `fk_cps_departement` (`departement_id`),
  ADD KEY `fk_cps_commune` (`commune_id`),
  ADD KEY `fk_cps_arrondissement` (`arrondissement_id`),
  ADD KEY `fk_cps_quartier` (`quartier_id`),
  ADD KEY `fk_cps_users` (`users_id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`departement_id`);

--
-- Indexes for table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`equipment_id`),
  ADD KEY `groupement_id` (`groupement_id`),
  ADD KEY `fk_equipement_users` (`users_id`);

--
-- Indexes for table `faire`
--
ALTER TABLE `faire`
  ADD PRIMARY KEY (`utilisateur_id`,`activite_id`),
  ADD KEY `activite_id` (`activite_id`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`filiere_id`);

--
-- Indexes for table `gerer`
--
ALTER TABLE `gerer`
  ADD PRIMARY KEY (`administrateur_id`,`groupement_id`),
  ADD KEY `groupement_id` (`groupement_id`);

--
-- Indexes for table `groupement`
--
ALTER TABLE `groupement`
  ADD PRIMARY KEY (`groupement_id`),
  ADD KEY `filiere_id` (`filiere_id`),
  ADD KEY `departement_id` (`departement_id`),
  ADD KEY `appuis_principal_id` (`appuis_principal_id`),
  ADD KEY `fk_activite_principale` (`activite_principale_id`),
  ADD KEY `fk_activite_secondaire` (`activite_secondaire_id`),
  ADD KEY `fk_groupement_cps` (`cps_id`),
  ADD KEY `fk_groupement_users` (`users_id`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`membre_id`),
  ADD KEY `groupement_id` (`groupement_id`),
  ADD KEY `fk_membre_users` (`users_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quartier`
--
ALTER TABLE `quartier`
  ADD PRIMARY KEY (`quartier_id`),
  ADD KEY `arrondissement_id` (`arrondissement_id`);

--
-- Indexes for table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`structure_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activite`
--
ALTER TABLE `activite`
  MODIFY `activite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agrement`
--
ALTER TABLE `agrement`
  MODIFY `agrement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appuis`
--
ALTER TABLE `appuis`
  MODIFY `appuis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `arrondissement`
--
ALTER TABLE `arrondissement`
  MODIFY `arrondissement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commune`
--
ALTER TABLE `commune`
  MODIFY `commune_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cps`
--
ALTER TABLE `cps`
  MODIFY `cps_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `departement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `equipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `filiere_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groupement`
--
ALTER TABLE `groupement`
  MODIFY `groupement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `membre_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quartier`
--
ALTER TABLE `quartier`
  MODIFY `quartier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `structure`
--
ALTER TABLE `structure`
  MODIFY `structure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
