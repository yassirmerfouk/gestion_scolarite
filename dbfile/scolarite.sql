-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 24 nov. 2021 à 16:59
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `scolarite`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `IDADMIN` int(11) NOT NULL,
  `EMAIL` char(255) DEFAULT NULL,
  `PASSWORD` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`IDADMIN`, `EMAIL`, `PASSWORD`) VALUES
(1, 'admin@mohmal.in', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441');

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `IDANNONCE` int(11) NOT NULL,
  `ANNONCE` text NOT NULL,
  `DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`IDANNONCE`, `ANNONCE`, `DATE`) VALUES
(39, 'Annonce aux étudiants de 2ème année génie informatique, la date de mise de rapports de PFE est le lundi 14 juin\r\nAnnonce aux étudiants de 2ème année génie informatique, la date de mise de rapports de PFE est le lundi 14 juin\r\nAnnonce aux étudiants de 2ème année génie informatique, la date de mise de rapports de PFE est le lundi 14 juin', '2021-06-19'),
(40, 'Annonce aux étudiant de 2ème année génie informatique 2, la date de mise de rapport est le Mercredi 16 juin.', '2021-06-19');

-- --------------------------------------------------------

--
-- Structure de la table `annonce_classe`
--

CREATE TABLE `annonce_classe` (
  `IDANNONCE` int(11) NOT NULL,
  `IDCLASSE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonce_classe`
--

INSERT INTO `annonce_classe` (`IDANNONCE`, `IDCLASSE`) VALUES
(39, 7),
(40, 7);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `IDCLASSE` int(11) NOT NULL,
  `NOMCLASSE` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`IDCLASSE`, `NOMCLASSE`) VALUES
(6, 'génie informatique 1'),
(7, 'génie informatique 2');

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `IDDEMANDE` int(15) NOT NULL,
  `TYPEDEMANDE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ETATDEMANDE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DATEDEMANDE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDETUDIANT` int(15) NOT NULL,
  `URLDOC` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `IDDOCUMENT` int(15) NOT NULL,
  `NAMEFILE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FILE_URL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDETUDIANT` int(15) NOT NULL,
  `TYPEDOC` enum('attestation','releve','bac','') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `IDETUDIANT` int(11) NOT NULL,
  `IDCLASSE` int(11) NOT NULL,
  `NOM` char(255) DEFAULT NULL,
  `PRENOM` char(255) DEFAULT NULL,
  `CNE` char(255) DEFAULT NULL,
  `CIN` char(255) DEFAULT NULL,
  `EMAIL` char(255) DEFAULT NULL,
  `PASSWORD` char(255) DEFAULT NULL,
  `TELEPHONE` char(255) DEFAULT NULL,
  `IMAGE` char(255) DEFAULT NULL,
  `DATENAISSANCE` date DEFAULT NULL,
  `NOMAR` char(255) DEFAULT NULL,
  `PRENOMAR` char(255) DEFAULT NULL,
  `BACANNEE` int(11) DEFAULT NULL,
  `BACFILIERE` char(255) DEFAULT NULL,
  `BACMENTION` float DEFAULT NULL,
  `VILLEORIGINE` char(255) DEFAULT NULL,
  `VILLEACTUEL` char(255) DEFAULT NULL,
  `ADRESSE` char(255) DEFAULT NULL,
  `COPYBAC` varchar(255) DEFAULT NULL,
  `COPYCIN` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`IDETUDIANT`, `IDCLASSE`, `NOM`, `PRENOM`, `CNE`, `CIN`, `EMAIL`, `PASSWORD`, `TELEPHONE`, `IMAGE`, `DATENAISSANCE`, `NOMAR`, `PRENOMAR`, `BACANNEE`, `BACFILIERE`, `BACMENTION`, `VILLEORIGINE`, `VILLEACTUEL`, `ADRESSE`, `COPYBAC`, `COPYCIN`) VALUES
(23, 7, 'merfouk', 'yassir', 'k142037530', 'HH180380', 'yassirmerfouk@mohmal.in', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '0660423730', 'k142037530.jpg', '1999-11-11', 'ياسر', 'مرفوق', 2021, 'Sciences et Technologies Electriques', 13, 'SAFI', 'SAFI', '203 BLOC 3 RIYAD SAFI', 'k142037530.pdf', 'k142037530.pdf'),
(24, 7, 'khlidi', 'yahya', 'K123456', 'HH123456', 'yahyalekhlidi@mohmal.in', 'ad0eb2bd0c843726ff6985bdbadaa5b34f8e2305', '0666666666', 'K123456.jpg', '2000-01-01', 'يحيا', 'لخليدي', 2021, 'Sciences et Technologies Electriques', 10, 'SAFI', 'SAFI', '100 matar safi', 'K123456.pdf', 'K123456.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `listeetudiant`
--

CREATE TABLE `listeetudiant` (
  `ID` int(11) NOT NULL,
  `CNE` char(255) DEFAULT NULL,
  `NOM` char(255) DEFAULT NULL,
  `PRENOM` char(255) DEFAULT NULL,
  `NOMCLASSE` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `listeetudiant`
--

INSERT INTO `listeetudiant` (`ID`, `CNE`, `NOM`, `PRENOM`, `NOMCLASSE`) VALUES
(19, 'k142037530', 'merfouk', 'yassir', 'génie informatique 2'),
(20, 'K123456', 'khlidi', 'yahya', 'génie informatique 2'),
(21, 'K456789', 'safi', 'mohamed', 'génie informatique 1'),
(22, 'K111111', 'yassir', 'yassir', 'génie informatique 2');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `refusersrc` int(11) NOT NULL,
  `refuserdest` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `refusersrc`, `refuserdest`, `message`, `date`) VALUES
(112, 24, 1, 'bonjour je suis yahya lekhlidi je veux savoir si vous aver recu mon demande d\'attestation', '2021-06-20'),
(113, 23, 1, 'bonjour je suis yassir merfouk je veux savoir si vous aver recu mon demande d\'attestation', '2021-06-20'),
(114, 1, 23, 'bonjour j\'ai vu votre demande on va te repondre dans le plus prochain possible', '2021-06-20'),
(115, 23, 1, 'd\'accord merci monsieur', '2021-06-20');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `IDRECLAMATION` int(11) NOT NULL,
  `IDETUDIANT` int(11) NOT NULL,
  `RECLAMATION` text DEFAULT NULL,
  `DATERECLAMATION` date DEFAULT NULL,
  `ETAT` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`IDRECLAMATION`, `IDETUDIANT`, `RECLAMATION`, `DATERECLAMATION`, `ETAT`) VALUES
(31, 23, 'Bonjour, je suis Yassir Merfouk j\'ai une réclamation', '2021-06-19', 1),
(32, 23, 'Bonjour, je suis Yassir Merfouk, j\'ai une nouvelle réclamation ', '2021-06-19', 0),
(33, 24, 'J\'ai une réclamation sur la note', '2021-06-19', 1),
(34, 24, 'J\'ai une nouvelle réclamation sur la note', '2021-06-19', 0),
(35, 23, 'salam, j\'ai une nouvelle réclamation', '2021-06-19', 0);

-- --------------------------------------------------------

--
-- Structure de la table `typedoc`
--

CREATE TABLE `typedoc` (
  `IDTYPE` int(15) NOT NULL,
  `TYPEDOC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typedoc`
--

INSERT INTO `typedoc` (`IDTYPE`, `TYPEDOC`) VALUES
(1, 'attestation'),
(2, 'releve de note'),
(4, 'bac');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IDADMIN`);

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`IDANNONCE`);

--
-- Index pour la table `annonce_classe`
--
ALTER TABLE `annonce_classe`
  ADD KEY `IDANNONCE` (`IDANNONCE`),
  ADD KEY `IDCLASSE` (`IDCLASSE`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`IDCLASSE`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`IDDEMANDE`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`IDDOCUMENT`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`IDETUDIANT`),
  ADD KEY `FK_ETUDIANT_APPARTIEN_CLASSE` (`IDCLASSE`);

--
-- Index pour la table `listeetudiant`
--
ALTER TABLE `listeetudiant`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `refusersrc` (`refusersrc`),
  ADD KEY `refuserdest` (`refuserdest`),
  ADD KEY `refusersrc_2` (`refusersrc`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`IDRECLAMATION`),
  ADD KEY `FK_RECLAMAT_ENVOYER_ETUDIANT` (`IDETUDIANT`);

--
-- Index pour la table `typedoc`
--
ALTER TABLE `typedoc`
  ADD PRIMARY KEY (`IDTYPE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `IDADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `IDANNONCE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `IDCLASSE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `IDDEMANDE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `IDDOCUMENT` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `IDETUDIANT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `listeetudiant`
--
ALTER TABLE `listeetudiant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `IDRECLAMATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `typedoc`
--
ALTER TABLE `typedoc`
  MODIFY `IDTYPE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce_classe`
--
ALTER TABLE `annonce_classe`
  ADD CONSTRAINT `annonce_classe_ibfk_1` FOREIGN KEY (`IDANNONCE`) REFERENCES `annonce` (`IDANNONCE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `annonce_classe_ibfk_2` FOREIGN KEY (`IDANNONCE`) REFERENCES `annonce` (`IDANNONCE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `annonce_classe_ibfk_3` FOREIGN KEY (`IDCLASSE`) REFERENCES `classe` (`IDCLASSE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_ETUDIANT_APPARTIEN_CLASSE` FOREIGN KEY (`IDCLASSE`) REFERENCES `classe` (`IDCLASSE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `FK_RECLAMAT_ENVOYER_ETUDIANT` FOREIGN KEY (`IDETUDIANT`) REFERENCES `etudiant` (`IDETUDIANT`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
