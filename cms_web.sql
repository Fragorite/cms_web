-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 16 jan. 2020 à 11:18
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
-- Structure de la table `frm_answers`
--

CREATE TABLE `frm_answers` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_publication` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `frm_answers`
--

INSERT INTO `frm_answers` (`id`, `content`, `date_publication`, `id_user`, `id_subject`) VALUES
(1, 'zazaazdazd', '16/01/2020 à 10:20', 1, 1),
(2, 'r&quot;rzefzef', '16/01/2020 à 10:22', 1, 1);

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

--
-- Déchargement des données de la table `frm_subjects`
--

INSERT INTO `frm_subjects` (`id`, `title`, `content`, `date_publication`, `id_user`) VALUES
(1, 'Premier pas', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic, nobis tenetur eveniet aspernatur earum culpa fugiat expedita doloribus ipsam, excepturi dolore dolorum itaque, eaque reprehenderit doloremque provident unde adipisci? Minus.Lorem, ipsum dolor ', '01/01/2020 à 00:00', 1);

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
(5, 'zaerarzarrza', ' tgzduybsqidbiuadfnazdazf tgzduybsqidbiuadfnazdazfvtgzduybsqidbiuadfnazdazf tgzduybsqidbiuadfnazdazfv  tgzduybsqidbiuadfnazdazf v v tgzduybsqidbiuadfnazdazf  tgzduybsqidbiuadfnazdazfv v v vv  tgzduybsqidbiuadfnazdazfv vtgzduybsqidbiuadfnazdazf v tgzduybsqidbiuadfnazdazf  v tgzduybsqidbiuadfnazdazf tgzduybsqidbiuadfnazdazfv tgzduybsqidbiuadfnazdazf tgzduybsqidbiuadfnazdazf v  ', '15/01/2020 à 14:50', 1),
(7, 'testtesttesttesttesteeeeee', 'dqsdsqdqsdqsdqdzqd<br />\r\ndq<br />\r\nzd<br />\r\nqzd<br />\r\nqzd<br />\r\nq<br />\r\ndzz<br />\r\n<br />\r\n<br />\r\nfvdfdf<br />\r\n<br />\r\ndq<br />\r\nzd', '15/01/2020 à 15:05', 1),
(8, 'nl2brnl2br', 'nl2brnl2brnl2brnl2br<br />\r\nnl2brnl2br<br />\r\nnl2br<br />\r\nnl2brnl2brnl2brnl2br<br />\r\nnl2brnl2brnl2br<br />\r\nnl2brnl2brnl2br nl2brnl2br<br />\r\nnl2brnl2br<br />\r\nnl2br', '15/01/2020 à 15:08', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `username`, `password`, `admin`) VALUES
(1, 'TEST@TEST.TEST', 'tz', '098f6bcd4621d373cade4e832627b4f6', 1);

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
('TESTTEST', 2, 1);

--
-- Index pour les tables déchargées
--

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
-- AUTO_INCREMENT pour la table `frm_answers`
--
ALTER TABLE `frm_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `frm_subjects`
--
ALTER TABLE `frm_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
