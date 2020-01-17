-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 17 jan. 2020 à 15:01
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cms_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_publication` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `frm_answers`
--

CREATE TABLE `frm_answers` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_publication` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `frm_subjects`
--

CREATE TABLE `frm_subjects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_publication` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_publication` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date_publication`, `id_user`) VALUES
(9, 'Neque porro quisquam est qui dolorem ipsume', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae maximus nisi. Sed quis tempor mauris. In hac habitasse platea dictumst. Phasellus rhoncus in neque eu cursus. Nam sagittis nulla ut vulputate dapibus. Cras tincidunt, elit non ornare venenatis, justo ante pretium nulla, sit amet sollicitudin augue erat eget ligula. Curabitur pulvinar eleifend cursus. Sed et egestas turpis. Aenean lobortis lacinia dolor, et laoreet lacus lobortis non. Sed vitae finibus magna, at porttitor libero. Nullam et commodo lectus. Donec at nisl id urna mattis facilisis. Maecenas dolor massa, scelerisque et vulputate vel, placerat vitae mi.<br />\r\n<br />\r\nDonec mollis commodo massa nec aliquet. Vivamus convallis lectus mauris, nec malesuada ex euismod vel. Vestibulum congue lacinia libero, at porttitor felis dapibus feugiat. Mauris et felis feugiat, posuere nisl nec, dignissim justo. Nullam posuere viverra cursus. Fusce ullamcorper consectetur tellus vel posuere. Morbi a interdum velit.<br />\r\n<br />\r\nSuspendisse potenti. Vivamus id venenatis felis. Aenean pulvinar urna nec enim tincidunt, quis sagittis ipsum fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam vel felis ullamcorper, hendrerit orci sit amet, viverra magna. In placerat nisl nisi, eu tempus ex porta id. Quisque semper vel turpis vel sagittis. Aenean congue felis libero, in condimentum eros egestas ac. Cras suscipit justo id odio gravida, at pretium magna interdum. Quisque a tempor velit. Donec posuere maximus eros ac condimentum. Quisque elementum quam eget dapibus mattis.<br />\r\n<br />\r\nQuisque sagittis ipsum quis purus gravida blandit. Sed nec mauris ac elit ullamcorper ullamcorper. Ut ac nisl at nisl suscipit efficitur eu ut leo. Cras ut maximus felis, in tristique ipsum. Cras ut tellus vitae leo iaculis sodales. Duis ac est a nunc semper facilisis id nec lorem. Phasellus ultrices fringilla vehicula.<br />\r\n<br />\r\nNullam semper mi eu tincidunt porttitor. Sed non libero nisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris viverra mi non urna lacinia rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum posuere nulla in odio posuere, et bibendum augue vehicula. Cras hendrerit pretium erat sit amet iaculis. Cras in eros volutpat, rutrum nulla id, ultricies dolor. Mauris dignissim rutrum vestibulum. Nam mollis ultricies nisi sed malesuada. Proin velit arcu, vehicula ac arcu eget, eleifend vestibulum ante. Proin a consectetur ante. Sed eleifend luctus condimentum. Proin sit amet bibendum odio, convallis ultrices purus. Ut urna tortor, pharetra eget purus vitae, cursus dapibus mauris. Aliquam interdum feugiat neque vel ultricies.<br />\r\n<br />\r\nFusce placerat sit amet neque sed faucibus. Maecenas vel lectus at lectus posuere rutrum. Vestibulum placerat sed sem sit amet sodales. Fusce varius aliquam mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla nisi ante, lacinia at viverra ac, euismod ultricies justo. Sed facilisis tincidunt ante, nec feugiat nibh mollis eget. Pellentesque felis velit, viverra et congue nec, vestibulum ut augue. Mauris at nisl consectetur urna sodales porta non sit amet magna. Nunc pellentesque hendrerit mi sed pulvinar. Curabitur porttitor, nisi malesuada bibendum tempor, metus dui auctor turpis, vel malesuada orci nulla eget est. Fusce condimentum congue magna, sed finibus mauris mollis non. Mauris arcu metus, elementum eget tincidunt vitae, sagittis fringilla orci. Proin efficitur dapibus nunc at feugiat. Suspendisse blandit, libero a iaculis consectetur, enim enim volutpat libero, non facilisis dolor mauris quis est. Curabitur pretium suscipit iaculis.<br />\r\n<br />\r\nAenean commodo enim et sem finibus, vel elementum enim placerat. Quisque rhoncus tortor at efficitur laoreet. Aliquam leo nisl, egestas in lacinia vel, placerat vel quam. Duis mollis odio quis lorem vestibulum, sit amet ullamcorper arcu laoreet. Integer molestie, justo eget mollis rutrum, tellus enim porttitor nunc, vitae condimentum augue lectus ac lorem. In hac habitasse platea dictumst. Sed sagittis odio sit amet elit lacinia pulvinar. Vestibulum vulputate ornare enim, id semper ligula aliquam non. Ut eu purus fermentum, volutpat libero pellentesque, tristique mauris. Praesent in quam et magna semper molestie. Nunc vel orci finibus, consequat orci placerat, accumsan dolor. Mauris mi felis, venenatis et egestas eget, finibus eu quam. Praesent vitae dignissim est. Suspendisse rhoncus ultrices ipsum at mollis. In suscipit dui non mattis consequat.<br />\r\n<br />\r\nAenean fermentum arcu vitae ipsum ultrices venenatis. Nam vel malesuada felis. Donec vel purus ut tortor molestie malesuada non id augue. Nunc quis blandit elit. Curabitur condimentum lorem et quam vehicula volutpat. Praesent ultricies viverra consequat. Suspendisse potenti. Mauris cursus tortor metus, vel pellentesque neque molestie convallis. Fusce ornare accumsan mattis. Vestibulum ut fringilla ex. Donec lectus quam, maximus id viverra ut, eleifend eget eros.<br />\r\n<br />\r\nDuis fringilla odio nibh. Duis diam arcu, auctor a tristique rhoncus, placerat a eros. Etiam vitae auctor nulla, in condimentum tellus. Curabitur ornare pretium neque convallis mattis. Mauris finibus, leo ac rhoncus feugiat, nisl metus pellentesque sapien, ut viverra risus nunc in lectus. In quis scelerisque orci. Donec vel faucibus sapien, vel pharetra ligula. Vivamus fringilla justo non augue finibus vestibulum. Aenean lacinia velit in elit luctus, placerat gravida velit pulvinar.<br />\r\n<br />\r\nSed elementum ornare urna et ornare. Ut blandit facilisis felis quis hendrerit. Donec scelerisque orci ac justo pulvinar, a malesuada velit hendrerit. Phasellus consectetur malesuada velit vel cursus. Integer a lacinia nibh, ac tincidunt orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur in neque id nibh ornare porttitor. ', '16/01/2020 à 14:52', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `connected` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `username`, `password`, `admin`, `connected`) VALUES
(1, 'Administrateur@cms-web.fr', 'Administrateur', '098f6bcd4621d373cade4e832627b4f6', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `website`
--

CREATE TABLE `website` (
  `websiteName` varchar(255) NOT NULL,
  `template` int(11) NOT NULL,
  `init` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `website`
--

INSERT INTO `website` (`websiteName`, `template`, `init`) VALUES
('NOM DU SITE', 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `frm_answers`
--
ALTER TABLE `frm_answers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `frm_subjects`
--
ALTER TABLE `frm_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `frm_answers`
--
ALTER TABLE `frm_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `frm_subjects`
--
ALTER TABLE `frm_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
