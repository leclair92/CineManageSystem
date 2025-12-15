-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 14 déc. 2025 à 08:37
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
-- Base de données : cinemanage_db
--

DROP DATABASE IF EXISTS cinemanage_db;

CREATE DATABASE cinemanage_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE cinemanage_db;


--
-- Structure de la table films
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `realisateur` varchar(100) DEFAULT NULL,
  `genre_id` int(11) NOT NULL,
  `annee_sortie` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `affiche_film` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- données de la table films
--

INSERT INTO `films` (`id`, `titre`, `realisateur`, `genre_id`, `annee_sortie`, `description`, `affiche_film`, `created_by`) VALUES
(2, 'The Godfather', 'Francis Ford Coppola', 2, 1972, 'L’histoire épique d’une famille mafieuse italienne à New York.', '1765661892_film-the-godfather.jpg', 5),
(3, 'Interstellar', 'Christopher Nolan', 4, 2014, 'Une équipe d’explorateurs voyage à travers un trou de ver à la recherche d’un nouveau monde habitable.', '1765661914_film-interstellar.jpg', 5),
(8, 'Parasite', 'Bong Joon-ho', 3, 2019, 'Une satire sociale racontant la rencontre entre deux familles issues de milieux opposés.', '1765695315_1765661673_parasite.jpg', 5),
(9, 'Inception', 'hristopher Nolan', 4, 2010, 'Un voleur qui infiltre les rêves des autres pour voler leurs secrets doit accomplir une mission presque impossible.', 'film-inception.jpg', 5);


--
-- Structure de la table genres
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table genres
--

INSERT INTO `genres` (`id`, `nom`) VALUES
(1, 'Action'),
(2, 'Drame'),
(3, 'Thriller'),
(4, 'Science-Fiction');



--
-- Structure de la table migrations
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `executed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Structure de la table salles
--

CREATE TABLE `salles` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `capacite` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- données de la table salles
--

INSERT INTO `salles` (`id`, `nom`, `capacite`, `type`, `created_by`) VALUES
(4, 'Salle 2', 300, 'imax', 5),
(7, 'Salle 3', 200, '3d_dbox', 5),
(8, 'Salle 1', 150, 'classique', 5);


--
-- Structure de la table seances
--

CREATE TABLE `seances` (
  `id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `salle_id` int(11) NOT NULL,
  `date_heure` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- données de la table seances
--

INSERT INTO `seances` (`id`, `film_id`, `salle_id`, `date_heure`, `created_by`) VALUES
(7, 2, 4, '2025-12-14 22:59:00', NULL),
(9, 8, 7, '2025-12-14 10:10:00', NULL),
(10, 2, 7, '2025-12-31 13:09:00', NULL),
(11, 3, 7, '2025-12-26 21:05:00', NULL),
(12, 2, 7, '2025-12-18 05:35:00', NULL),
(13, 9, 4, '2025-12-18 20:07:00', NULL);


--
-- Structure de la table users
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- données de la table users
--

INSERT INTO `users` (`id`, `nom`, `courriel`, `password`, `role`, `created_at`) VALUES
(5, 'admin', 'admin@cinegest.ca', '$2y$10$z92QfgxqgGesv/DfGrwVqO6R1uG7vkzjm9Wpk8SqhJLyrhfpsuwr2', 'admin', '2025-12-14 01:30:01'),
(6, 'user', 'user@cinegest.ca', '$2y$10$N/yyHgBoDTnm2ryUTVhGTepkcSZvbrzja8APSw1gQ3Ljdc6mzF.ha', 'user', '2025-12-14 01:30:24');


--
-- Index pour la table films
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_films_genre` (`genre_id`),
  ADD KEY `fk_films_created_by` (`created_by`);

--
-- Index pour la table genres
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table migrations
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table salles
--
ALTER TABLE `salles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_salles_created_by` (`created_by`);

--
-- Index pour la table seances
--
ALTER TABLE `seances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seances_film` (`film_id`),
  ADD KEY `fk_seances_salle` (`salle_id`),
  ADD KEY `fk_seances_created_by` (`created_by`);

--
-- Index pour la table users
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour la table films
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table genres
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table migrations
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table salles
--
ALTER TABLE `salles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table seances
--
ALTER TABLE `seances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table users
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour la table films
--
ALTER TABLE `films`
  ADD CONSTRAINT `fk_films_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_films_genre` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Contraintes pour la table salles
--
ALTER TABLE `salles`
  ADD CONSTRAINT `fk_salles_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table seances
--
ALTER TABLE `seances`
  ADD CONSTRAINT `fk_seances_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_seances_film` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_seances_salle` FOREIGN KEY (`salle_id`) REFERENCES `salles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
