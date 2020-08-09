-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 10 août 2020 à 00:21
-- Version du serveur :  10.1.34-MariaDB
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `myblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `authorId` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `postid`, `message`, `authorId`, `createdAt`, `status`) VALUES
(1, 1, 'Tr?s bon article qui m\'a appris beaucoup de chose', 1, '2020-05-27 12:25:32', 'publi?'),
(2, 1, 'Post int?rressant pour d?buter', 1, '2020-05-27 12:28:34', 'attente'),
(3, 1, 'PHP est super int?rressant ', 2, '2020-05-27 12:28:35', 'attente'),
(4, 3, 'J\'ai hâte découvrir Symfony après cette brève introduction. Merci ? l\'auteur', 1, '2020-05-27 12:28:35', 'attente'),
(5, 4, 'Ca ne me plait pas du tout', 2, '2020-05-27 12:28:35', 'attente'),
(6, 2, 'On aimerai voir la suite de cet article plus d?taill?e', 2, '2020-05-27 12:41:28', 'publi?'),
(7, 2, 'Bravo travail bie accompli', 2, '2020-05-27 12:42:18', 'attente'),
(8, 4, 'Bravo travail bie accompli', 2, '2020-05-27 12:43:54', 'attente'),
(9, 4, 'Courage pour travail accompli m?me si on aimerait que ?a soit plus technique', 2, '2020-05-27 12:43:54', 'attente'),
(10, 4, 'Commentaire post? par Paul', 2, '2020-06-16 01:28:49', 'attente'),
(11, 2, 'test comment', 2, '2020-07-16 12:15:12', 'attente');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chapo` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `authorId` int(11) NOT NULL,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postImage` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category`, `chapo`, `content`, `authorId`, `updatedAt`, `postImage`, `status`) VALUES
(1, 'PHP, langage du Web.', 'PHP', 'PHP est le langage le plus utilis? pour le d?veloppement Web.', 'PHP est le langage le plus utilis? pour le d?veloppement Web. Incontestablement le gagnant en termes de popularit?. Si vous pr?voyez de vous lancer dans la cr?ation de sites Web modernes, choisissez PHP sans m?me y penser une seconde.\r\n\r\nC&amp;#39;est le langage de programmation num?ro un en mati?re de d?veloppement Web et il y a des raisons ? cela. Je vais les d?tailler dans cet article et vous donner une introduction ? PHP.', 1, '2020-05-27 10:59:58', 'public/visitor/img/blogposts/blog-small-01.jpg', 'publi?'),
(2, 'Boot camps have its supporters andit sdetractors.', 'Symfony', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.', 1, '2020-05-27 11:00:31', 'public/visitor/img/blogposts/blog-small-02.jpg', 'publi?'),
(3, 'Boot camps have its supporters andit sdetractors.', 'Twig', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.', 2, '2020-05-27 11:01:03', 'public/visitor/img/blogposts/blog-small-03.jpg', 'attente'),
(4, 'Boot camps have its supporters andit sdetractors.', 'C#/.Net', 'Lorem ipsum dolor sit amet', 'C&amp;#39;est le langage de programmation phare de Microsoft. Utilis? par un nombre important et grandissant de professionnels, il permet de r?aliser toutes sortes d&amp;#39;applications.\r\nVous apprendrez comment on cr?e des applications informatiques et plus particuli?rement celles utilisant le framework .NET que l&amp;#39;on d?couvrira ensemble ; puis vous vous familiariserez avec la syntaxe de base du C# pour commencer ? cr?er des applications avec Visual Studio.', 1, '2020-05-27 11:02:06', 'public/visitor/img/blogposts/blog-small-04.jpg', 'publi?'),
(5, 'La programmation ? jour', 'PHP', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.', 1, '2020-06-02 00:22:16', 'public/visitor/img/blogposts/blog-small-05.jpg', 'attente'),
(6, 'Post number 555555Fiv', 'C#/.Net', 'mon chapo', 'Blog test pour insertion', 1, '2020-06-03 12:08:01', 'public/visitor/img/blogposts/blog-small-06.jpg', 'publi?');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `profile` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'standard',
  `newpwd` tinyint(1) NOT NULL DEFAULT '0',
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `profile`, `newpwd`, `updatedAt`, `token`) VALUES
(1, 'Francis', 'Nimpagaritse', 'franco@yahoo.fr', '$2y$10$StMowd0/HKBxCFaMgjjPEOUvgho4ugOh39MZDswzEqUKaH96097vG', 'admin', 0, '2020-06-29 10:34:36', ''),
(2, 'Magic', 'Paul', 'mgpaul@gmail.com', '$2y$10$StMowd0/HKBxCFaMgjjPEOUvgho4ugOh39MZDswzEqUKaH96097vG', 'standard', 0, '2020-06-10 13:18:00', '5ee0c1677d4e4'),
(3, 'Nana', 'Kiki', 'nkiki@gmail.com', '$2y$10$N0hy3Ra7p/5rZJqrc4MiSODsL.NH0D5FUdPFxJtBjxL2PByFwp4Hy', 'standard', 0, '2020-06-02 20:12:20', ''),
(4, 'Nana2', 'Kiki2', 'nkiki2@gmail.com', '$2y$10$hXuw6kjyZAKNIEW9pqPYeOKX9NRUy3ZN.nF1RDd5NvX2s887anU6W', 'standard', 0, '2020-06-02 20:16:59', ''),
(5, 'test', 'test', 'test@gmail.com', '$2y$10$XvQ3t2unWd2FJVXfQcoRquZ6KvgDScwHGhCCcjuYybGd6yoVLmvXC', 'standard', 0, '2020-06-03 13:38:56', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articles_index` (`postid`),
  ADD KEY `fk_users_index` (`authorId`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_index` (`authorId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique_index` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Fk_articles_id` FOREIGN KEY (`postid`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`authorId`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `Fk_users_id` FOREIGN KEY (`authorid`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
