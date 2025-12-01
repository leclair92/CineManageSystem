-- ===========================================================
-- Script SQL - Base de données du système existant CinéManage
-- Version : Système initial (avant refonte)
-- Base de données : cinemanage_db
-- Auteur : Équipe de développement initiale
-- ===========================================================

-- 1️⃣ Création de la base de données
CREATE DATABASE IF NOT EXISTS cinemanage_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE cinemanage_db;

-- 2️⃣ Table : administrateurs
CREATE TABLE IF NOT EXISTS administrateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(50) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL
);

-- Insérer un administrateur de test
INSERT INTO administrateurs (nom_utilisateur, mot_de_passe)
VALUES ('admin', 'admin123'); -- ⚠️ mot de passe en clair (non sécurisé)

-- 3️⃣ Table : films
CREATE TABLE IF NOT EXISTS films (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    realisateur VARCHAR(100),
    genre VARCHAR(50),
    annee_sortie INT,
    description TEXT
);

-- Insérer quelques films de démonstration
INSERT INTO films (titre, realisateur, genre, annee_sortie, description)
VALUES 
('Inception', 'Christopher Nolan', 'Science-Fiction', 2010, 'Un voleur qui infiltre les rêves des autres pour voler leurs secrets doit accomplir une mission presque impossible.'),
('The Godfather', 'Francis Ford Coppola', 'Drame', 1972, 'L’histoire épique d’une famille mafieuse italienne à New York.'),
('Interstellar', 'Christopher Nolan', 'Science-Fiction', 2014, 'Une équipe d’explorateurs voyage à travers un trou de ver à la recherche d’un nouveau monde habitable.'),
('Parasite', 'Bong Joon-ho', 'Thriller', 2019, 'Une satire sociale racontant la rencontre entre deux familles issues de milieux opposés.');

-- 4️⃣ Index et contraintes
-- (aucune clé étrangère dans le système existant)
-- (aucune normalisation appliquée)

-- 5️⃣ Droits d’accès
-- (aucune gestion d’utilisateurs SQL spécifique dans le système existant)

-- ===========================================================
-- Fin du script
-- ===========================================================
--db après Modif initial Amal(ajout table genre ajout colonne affiche_film)

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 01 déc. 2025 à 23:48
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinemanage_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id` int(11) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `nom_utilisateur`, `mot_de_passe`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `realisateur` varchar(100) DEFAULT NULL,
  `genre` int(11) NOT NULL,
  `annee_sortie` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `affiche_film` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `titre`, `realisateur`, `genre`, `annee_sortie`, `description`, `affiche_film`) VALUES
(3, 'Interstellar', 'Christopher Nolan', 4, 2014, 'Une équipe d’explorateurs voyage à travers un trou de ver à la recherche d’un nouveau monde habitable.', ''),
(4, 'Parasite', 'Bong Joon-ho', 1, 2021, 'Une satire sociale racontant la rencontre entre deux familles issues de milieux opposés.', '');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `nom`) VALUES
(1, 'Action'),
(2, 'Drame'),
(3, 'Thriller'),
(4, 'Science-Fiction');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_films_genre` (`genre`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `fk_films_genre` FOREIGN KEY (`genre`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

