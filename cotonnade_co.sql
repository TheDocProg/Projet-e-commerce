-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 26 juin 2021 à 19:51
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cotonnade_co`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `more_about` text COLLATE utf8mb4_unicode_ci,
  `price` int(11) NOT NULL,
  `lots` int(11) DEFAULT NULL,
  `alt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `picture`, `description`, `created_at`, `more_about`, `price`, `lots`, `alt`, `category_id`, `stock`) VALUES
(11, 'Hello world', 'img/articles/60258b6906ec5.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc commodo aliquet sapien eget pulvinar. Vestibulum rutrum eros vitae orci congue auctor. Aenean eleifend, metus non cursus lobortis, dolor lorem ornare neque, vel egestas nisl augue sit amet urna. Curabitur vitae pharetra enim, eget feugiat dui. Mauris ac lorem placerat, varius lacus id, lobortis augue. Sed nibh orci, fermentum eget tortor sit amet, dapibus feugiat lorem. Vivamus suscipit dictum eros, consequat tempor justo. Pellentesque sed fringilla turpis, eu fermentum turpis. Sed rhoncus semper dui id bibendum. Duis vitae molestie ante. Donec ac ex placerat ante luctus commodo eu eu quam. Nam nec tempor nunc. Nullam convallis risus et dui posuere, sit amet sodales odio gravida. Ut cursus, eros sed ultrices vehicula, lacus mauris imperdiet mi, vel finibus ante lorem semper nisl. Donec consequat ipsum in placerat tempor.\r\n\r\nNullam tincidunt mi sit amet aliquet egestas. Praesent vitae arcu sed nunc posuere tristique. Vivamus fringilla magna sed aliquam imperdiet. Curabitur non felis elementum, congue mauris eu, consectetur elit. In in orci in sapien venenatis pretium. Aenean turpis dui, ornare ut sagittis et, aliquam ac leo. Aenean efficitur, mi ut vehicula tempor, velit nisl iaculis libero, vitae placerat odio neque ut arcu. Cras tristique nisi eget diam convallis imperdiet. Curabitur venenatis dui at cursus aliquam. Donec ut tellus eu nisi tristique rutrum ut et augue. Ut sit amet laoreet orci. Suspendisse est nulla, rutrum molestie purus vel, aliquam consectetur purus. Donec urna nunc, auctor vitae nisi nec, pellentesque facilisis dolor.', '2021-02-11 20:54:17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc commodo aliquet sapien eget pulvinar. Vestibulum rutrum eros vitae orci congue auctor. Aenean eleifend, metus non cursus lobortis, dolor lorem ornare neque, vel egestas nisl augue sit amet urna. Curabitur vitae pharetra enim, eget feugiat dui. Mauris ac lorem placerat, varius lacus id, lobortis augue. Sed nibh orci, fermentum eget tortor sit amet, dapibus feugiat lorem. Vivamus suscipit dictum eros, consequat tempor justo. Pellentesque sed fringilla turpis, eu fermentum turpis. Sed rhoncus semper dui id bibendum. Duis vitae molestie ante. Donec ac ex placerat ante luctus commodo eu eu quam. Nam nec tempor nunc. Nullam convallis risus et dui posuere, sit amet sodales odio gravida. Ut cursus, eros sed ultrices vehicula, lacus mauris imperdiet mi, vel finibus ante lorem semper nisl. Donec consequat ipsum in placerat tempor.\r\n\r\nNullam tincidunt mi sit amet aliquet egestas. Praesent vitae arcu sed nunc posuere tristique. Vivamus fringilla magna sed aliquam imperdiet. Curabitur non felis elementum, congue mauris eu, consectetur elit. In in orci in sapien venenatis pretium. Aenean turpis dui, ornare ut sagittis et, aliquam ac leo. Aenean efficitur, mi ut vehicula tempor, velit nisl iaculis libero, vitae placerat odio neque ut arcu. Cras tristique nisi eget diam convallis imperdiet. Curabitur venenatis dui at cursus aliquam. Donec ut tellus eu nisi tristique rutrum ut et augue. Ut sit amet laoreet orci. Suspendisse est nulla, rutrum molestie purus vel, aliquam consectetur purus. Donec urna nunc, auctor vitae nisi nec, pellentesque facilisis dolor.', 15, 3, 'eponges', 3, 13),
(12, 'Image', 'img/articles/60258b8659d98.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc commodo aliquet sapien eget pulvinar. Vestibulum rutrum eros vitae orci congue auctor. Aenean eleifend, metus non cursus lobortis, dolor lorem ornare neque, vel egestas nisl augue sit amet urna. Curabitur vitae pharetra enim, eget feugiat dui. Mauris ac lorem placerat, varius lacus id, lobortis augue. Sed nibh orci, fermentum eget tortor sit amet, dapibus feugiat lorem. Vivamus suscipit dictum eros, consequat tempor justo. Pellentesque sed fringilla turpis, eu fermentum turpis. Sed rhoncus semper dui id bibendum. Duis vitae molestie ante. Donec ac ex placerat ante luctus commodo eu eu quam. Nam nec tempor nunc. Nullam convallis risus et dui posuere, sit amet sodales odio gravida. Ut cursus, eros sed ultrices vehicula, lacus mauris imperdiet mi, vel finibus ante lorem semper nisl. Donec consequat ipsum in placerat tempor.\r\n\r\nNullam tincidunt mi sit amet aliquet egestas. Praesent vitae arcu sed nunc posuere tristique. Vivamus fringilla magna sed aliquam imperdiet. Curabitur non felis elementum, congue mauris eu, consectetur elit. In in orci in sapien venenatis pretium. Aenean turpis dui, ornare ut sagittis et, aliquam ac leo. Aenean efficitur, mi ut vehicula tempor, velit nisl iaculis libero, vitae placerat odio neque ut arcu. Cras tristique nisi eget diam convallis imperdiet. Curabitur venenatis dui at cursus aliquam. Donec ut tellus eu nisi tristique rutrum ut et augue. Ut sit amet laoreet orci. Suspendisse est nulla, rutrum molestie purus vel, aliquam consectetur purus. Donec urna nunc, auctor vitae nisi nec, pellentesque facilisis dolor.', '2021-02-11 20:54:46', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc commodo aliquet sapien eget pulvinar. Vestibulum rutrum eros vitae orci congue auctor. Aenean eleifend, metus non cursus lobortis, dolor lorem ornare neque, vel egestas nisl augue sit amet urna. Curabitur vitae pharetra enim, eget feugiat dui. Mauris ac lorem placerat, varius lacus id, lobortis augue. Sed nibh orci, fermentum eget tortor sit amet, dapibus feugiat lorem. Vivamus suscipit dictum eros, consequat tempor justo. Pellentesque sed fringilla turpis, eu fermentum turpis. Sed rhoncus semper dui id bibendum. Duis vitae molestie ante. Donec ac ex placerat ante luctus commodo eu eu quam. Nam nec tempor nunc. Nullam convallis risus et dui posuere, sit amet sodales odio gravida. Ut cursus, eros sed ultrices vehicula, lacus mauris imperdiet mi, vel finibus ante lorem semper nisl. Donec consequat ipsum in placerat tempor.\r\n\r\nNullam tincidunt mi sit amet aliquet egestas. Praesent vitae arcu sed nunc posuere tristique. Vivamus fringilla magna sed aliquam imperdiet. Curabitur non felis elementum, congue mauris eu, consectetur elit. In in orci in sapien venenatis pretium. Aenean turpis dui, ornare ut sagittis et, aliquam ac leo. Aenean efficitur, mi ut vehicula tempor, velit nisl iaculis libero, vitae placerat odio neque ut arcu. Cras tristique nisi eget diam convallis imperdiet. Curabitur venenatis dui at cursus aliquam. Donec ut tellus eu nisi tristique rutrum ut et augue. Ut sit amet laoreet orci. Suspendisse est nulla, rutrum molestie purus vel, aliquam consectetur purus. Donec urna nunc, auctor vitae nisi nec, pellentesque facilisis dolor.', 20, 2, 'image', 3, 9),
(13, 'Hello world', 'img/articles/60a94a6ce8413.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in suscipit neque, consectetur rutrum arcu. Aliquam consequat nisl facilisis sapien dignissim, nec porttitor dui pharetra. Vestibulum nunc sem, aliquam non aliquet a, convallis nec nisl. Pellentesque imperdiet a nisi a cursus. Maecenas vulputate porta nunc, dignissim luctus lorem volutpat at. Curabitur ut orci ac velit dapibus sagittis. Maecenas non est faucibus, iaculis purus nec, placerat elit.\r\n\r\nPraesent massa lorem, lobortis in tortor id, dictum rutrum neque. Praesent libero quam, bibendum ut est sed, sodales venenatis tellus. Quisque vehicula suscipit posuere. Pellentesque eu sem metus. Vestibulum diam quam, tempor eget est et, varius molestie lorem. Aenean rhoncus vitae dolor id porta. Aliquam neque erat, iaculis vel fermentum eget, volutpat nec mi. Fusce vitae dolor at metus sollicitudin bibendum. Sed vel quam lectus. Aliquam erat volutpat. Aenean dapibus facilisis est nec laoreet. Vestibulum luctus nulla ac porta vestibulum. Phasellus quis semper ante, accumsan pellentesque nulla. Pellentesque euismod orci vitae fringilla suscipit.', '2021-05-22 20:16:12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in suscipit neque, consectetur rutrum arcu. Aliquam consequat nisl facilisis sapien dignissim, nec porttitor dui pharetra. Vestibulum nunc sem, aliquam non aliquet a, convallis nec nisl. Pellentesque imperdiet a nisi a cursus. Maecenas vulputate porta nunc, dignissim luctus lorem volutpat at. Curabitur ut orci ac velit dapibus sagittis. Maecenas non est faucibus, iaculis purus nec, placerat elit.\r\n\r\nPraesent massa lorem, lobortis in tortor id, dictum rutrum neque. Praesent libero quam, bibendum ut est sed, sodales venenatis tellus. Quisque vehicula suscipit posuere. Pellentesque eu sem metus. Vestibulum diam quam, tempor eget est et, varius molestie lorem. Aenean rhoncus vitae dolor id porta. Aliquam neque erat, iaculis vel fermentum eget, volutpat nec mi. Fusce vitae dolor at metus sollicitudin bibendum. Sed vel quam lectus. Aliquam erat volutpat. Aenean dapibus facilisis est nec laoreet. Vestibulum luctus nulla ac porta vestibulum. Phasellus quis semper ante, accumsan pellentesque nulla. Pellentesque euismod orci vitae fringilla suscipit.', 2, 5, 'eponges', 4, 9);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(3, 'Bio'),
(4, 'Oeko tex');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `title`, `content`, `created_at`, `article_id`, `user_id`) VALUES
(1, 'Ceci est un commentaire positif', 'C\'est un article intéressant, mais je ne suis pas convaincu par la taille.\r\nSinon c\'est très bien. ', '2021-06-16 23:51:12', 11, 2),
(2, 'Ceci est un commentaire positif 2', 'C\'est un article intéressant, mais je ne suis pas convaincu par la taille.\r\nSinon c\'est très bien, comme l\'article précédent finalement.', '2021-06-16 23:51:12', 12, 2),
(3, 'C\'est trop cool !', 'C\'est vraiment au top, je recommande vivement à ceux qui cherchent !\r\nMerci à vous.', '2021-06-17 01:17:17', 12, 3),
(6, 'Hello world', 'Test des commentaires 1.\nretour à la ligne.', '2021-06-20 17:43:00', 11, 2);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `articles` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordered_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `articles`, `first_name`, `last_name`, `adress`, `email`, `ordered_at`) VALUES
(2, 2, '12x3', 'John', 'Smith', '8 222 du', 'client@mail.com', '2021-05-13 19:51:11');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(72) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `adress`, `created_at`) VALUES
(1, 'admin@mail.com', '$2y$10$/A/gf5Gad4z8MQ8Ai002fOHu6x1NNgiFE2PcZNK88KIH0eG4fjG7m', '', '', '', '2020-12-09 20:27:15'),
(2, 'client@mail.com', '$2y$10$yzj5rDfLoyL.mQdswpnTVuvttYW1HXHoKsjU6xb0.L.1pafsKV./6', 'John', 'Smith', '8 place du clos/82600/Mas-grenier', '2021-03-04 18:29:01'),
(3, 'client2@mail.com', '$2y$10$HG66X5dXtN.W8wpNfRWXm.Rlv20souOipCrX.W.NgKhNYdT.mB3gG', 'John', 'Smith', '8 place du clos/82600/Mas-grenier', '2021-03-04 18:33:20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`category_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
