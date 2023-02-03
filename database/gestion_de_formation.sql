-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 11:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_de_formation`
--

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `Id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `prix` double NOT NULL,
  `objectif` text NOT NULL,
  `plan` text NOT NULL,
  `projet` text NOT NULL,
  `evaluation` text NOT NULL,
  `session` text NOT NULL,
  `image` blob NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT 1,
  `nbreplacestot` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`Id`, `titre`, `prix`, `objectif`, `plan`, `projet`, `evaluation`, `session`, `image`, `statut`, `nbreplacestot`) VALUES
(1, 'Anglais : Niveau B2', 1000, 'Les objectifs de cette formation sont ; Une progression des compétences linguistiques. S’approprier les méthodes de communication efficaces et adaptées à ses besoins. S', 'On élargira le vocabulaire.+On donnera á l', 'aucun', 'examen', 'Automne+Hiver+Printemps+Eté', 0x636f757273655f352e6a7067, 1, 20),
(2, 'Français : Niveau B2', 800, 'Les objectifs de cette formation sont ; Une progression des compétences linguistiques. S’approprier les méthodes de communication efficaces et adaptées à ses besoins. S\'exprimer avec aisance, fluidité et spontanéité à l’oral. Réussir à faire un échange téléphonique en anglais. Réussir à comprendre et répondre aux documents/mails.', 'On élargira le vocabulaire. +On donnera á l\'élève des éléments pour lui permettre de discuter sur une variété de sujets plus en détail, en exprimant son avis et ses sentiments. +Pour cela nous allons travailler sur des thèmes plus abstraits et complexes, toujours intéressants pour l\'élève. ', 'aucun', 'examen', 'Hiver+Printemps+Eté', 0x636f757273655f312e6a7067, 1, 25),
(3, 'Espagnol : Niveau A2', 1000, 'Les objectifs de cette formation sont ; Une progression des compétences linguistiques. S’approprier les méthodes de communication efficaces et adaptées à ses besoins. S\'exprimer avec aisance, fluidité et spontanéité à l’oral. Réussir à faire un échange téléphonique en anglais. Réussir à comprendre et répondre aux documents/mails.', 'Nous allons nous concentrer sur les fondements de la langue.+ Nous allons étudier des sujets agréables et qui vous intéressent, comme la cuisine, l\'histoire, la science, la culture, le voyage, les affaires, la politique, le sport, etc.+Nous allons maîtriser les bases de la grammaire, les différents temps grammaticaux, des phrases utiles ainsi que le vocabulaire de base.', 'aucun', 'examen', 'Hiver+Printemps', 0x636f757273655f392e6a7067, 1, 15),
(4, 'Anglais : Niveau C1', 1500, 'Les objectifs de cette formation sont ; Une progression des compétences linguistiques. S’approprier les méthodes de communication efficaces et adaptées à ses besoins. S\'exprimer avec aisance, fluidité et spontanéité à l’oral. Réussir à faire un échange téléphonique en anglais. Réussir à comprendre et répondre aux documents/mails.', 'L\'étudiant apprendra à parler plus couramment, de manière fluide et naturelle.+Nous allons nous concentrer sur l\'utilisation et la compréhension des expressions et idiomes.+Nous allons travailler aussi les différents degrés et registres de la langue.', 'aucun', 'examen', 'Hiver+Printemps+Eté', 0x636f757273655f322e6a7067, 1, 20),
(5, 'Français : Niveau C1', 1350, 'Les objectifs de cette formation sont ; Une progression des compétences linguistiques. S’approprier les méthodes de communication efficaces et adaptées à ses besoins. S\'exprimer avec aisance, fluidité et spontanéité à l’oral. Réussir à faire un échange téléphonique en anglais. Réussir à comprendre et répondre aux documents/mails.', 'L\'étudiant apprendra à parler plus couramment, de manière fluide et naturelle.+ Nous allons nous concentrer sur l\'utilisation et la compréhension des expressions et idiomes.+Nous allons travailler aussi les différents degrés et registres de la langue. ', 'aucun', 'examen', 'Automne+Hiver+Printemps+Eté', 0x636f757273655f372e6a7067, 1, 25),
(6, 'Anglais : Niveau A2', 850, 'Les objectifs de cette formation sont ; Une progression des compétences linguistiques. S’approprier les méthodes de communication efficaces et adaptées à ses besoins. S', 'Nous allons nous concentrer sur les fondements de la langue.+Nous allons étudier des sujets agréables et qui vous intéressent, comme la cuisine, l', 'aucun', 'examen', 'Hiver+Printemps', 0x636f757273655f31312e6a7067, 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE `inscription` (
  `inscriptionid` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `client` text NOT NULL,
  `idFormation` int(11) NOT NULL,
  `formation` text NOT NULL,
  `session` text NOT NULL,
  `statut` int(5) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`inscriptionid`, `idClient`, `client`, `idFormation`, `formation`, `session`, `statut`) VALUES
(1, 9, 'rhanami', 1, 'Anglais : Niveau B2', 'Eté', 1),
(2, 9, 'rhanami', 5, 'Français : Niveau C1', 'Automne', 1),
(3, 9, 'rhanami', 1, 'Anglais : Niveau B2', 'Hiver', 1),
(4, 9, 'rhanami', 6, 'Anglais : Niveau A2', 'Hiver', 1),
(9, 10, 'Aya', 5, 'Français : Niveau C1', 'Hiver', 1),
(10, 28, 'Chase', 1, 'Anglais : Niveau B2', 'Printemps', 1),
(11, 29, 'Lillian', 4, 'Anglais : Niveau C1', 'Hiver', 1),
(12, 30, 'Dolan', 4, 'Anglais : Niveau C1', 'Hiver', 1),
(13, 31, 'Regina', 4, 'Anglais : Niveau C1', 'Hiver', 1),
(18, 28, 'Chase', 5, 'Français : Niveau C1', 'Hiver', 1),
(19, 27, 'aya', 4, 'Anglais : Niveau C1', 'Hiver', 1),
(20, 10, 'Aya', 2, 'Français : Niveau B2', 'Hiver', 1),
(21, 32, 'Karleigh', 4, 'Anglais : Niveau C1', 'Hiver', 1),
(22, 32, 'Karleigh', 5, 'Français : Niveau C1', 'Hiver', 1),
(23, 10, 'Aya', 3, 'Espagnol : Niveau A2', 'Hiver', 1),
(24, 33, 'chada', 4, 'Anglais : Niveau C1', 'Hiver', 1),
(25, 33, 'chada', 3, 'Espagnol : Niveau A2', 'Hiver', 1),
(26, 34, 'rita', 3, 'Espagnol : Niveau A2', 'Hiver', 1),
(27, 35, 'Cole', 1, 'Anglais : Niveau B2', 'Automne', 1),
(28, 36, 'Samantha', 4, 'Anglais : Niveau C1', 'Hiver', 1),
(29, 37, 'Inez', 4, 'Anglais : Niveau C1', 'Hiver', 1),
(30, 38, 'Zorita', 4, 'Anglais : Niveau C1', 'Hiver', 1),
(31, 39, 'Amelia', 6, 'Anglais : Niveau A2', 'Hiver', 1),
(32, 40, 'Skyler', 4, 'Anglais : Niveau C1', 'Hiver', 1),
(33, 34, 'rita', 4, 'Anglais : Niveau C1', 'Hiver', 1),
(34, 40, 'Skyler', 3, 'Espagnol : Niveau A2', 'Hiver', 1),
(35, 40, 'Skyler', 2, 'Français : Niveau B2', 'Hiver', 1),
(36, 41, 'Tasha', 1, 'Anglais : Niveau B2', 'Hiver', 1),
(37, 41, 'Tasha', 5, 'Français : Niveau C1', 'Hiver', 1),
(38, 42, 'Henry', 4, 'Anglais : Niveau C1', 'Hiver', 1),
(39, 42, 'Henry', 2, 'Français : Niveau B2', 'Hiver', 1),
(40, 10, 'Aya', 3, 'Espagnol : Niveau A2', 'Hiver', 1),
(41, 43, 'Eve', 5, 'Français : Niveau C1', 'Hiver', 1),
(42, 43, 'Eve', 3, 'Espagnol : Niveau A2', 'Hiver', 1),
(43, 44, 'Vielka', 4, 'Anglais : Niveau C1', 'Hiver', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paiement`
--

CREATE TABLE `paiement` (
  `Id` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `nomClient` text NOT NULL,
  `idFormation` int(11) NOT NULL,
  `nomFormation` text NOT NULL,
  `session` text NOT NULL,
  `prixFormation` double NOT NULL,
  `modePaiement` text NOT NULL,
  `numCC` text DEFAULT '0',
  `prixPaye` double NOT NULL DEFAULT 0,
  `codeCC` text NOT NULL DEFAULT '0',
  `datePaiement` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paiement`
--

INSERT INTO `paiement` (`Id`, `idClient`, `nomClient`, `idFormation`, `nomFormation`, `session`, `prixFormation`, `modePaiement`, `numCC`, `prixPaye`, `codeCC`, `datePaiement`, `status`) VALUES
(1, 10, 'Aya Zmizem', 4, 'Anglais : Niveau C1', 'Hiver', 1500, 'CreditCard', 'E52143', 1500, '46516451', '2023-01-24 20:18:05', 2),
(2, 9, 'hafsa rhanami', 5, 'Français : Niveau C1', 'Automne', 1350, 'CreditCard', 'EF2455', 1350, '124578', '2023-01-24 15:17:43', 2),
(3, 9, 'Rhanami hafsa', 6, 'Anglais : Niveau A2', 'Hiver', 850, 'CreditCard', 'EF2455', 850, '4578', '2023-01-24 18:41:27', 2),
(4, 13, 'snowie lw', 2, 'Français : Niveau B2', 'Printemps', 800, 'CreditCard', 'L454356', 550, '45654681', '2023-01-26 16:19:52', 0),
(5, 13, 'Test', 4, 'Anglais : Niveau C1', 'Hiver', 1500, 'CreditCard', 'EL4515612', 1500, '558964852', '2023-01-27 15:28:15', 2),
(6, 22, 'Second Test', 2, 'Français : Niveau B2', 'Printemps', 800, 'CreditCard', 'JK841463', 800, '2351456', '2023-01-27 15:31:25', 2),
(7, 8, 'Third Test', 4, 'Anglais : Niveau C1', 'Printemps', 1500, 'CreditCard', 'LKZSLMSZ554', 1500, '541845184', '2023-01-27 15:40:18', 2),
(8, 28, 'Andrews Chase', 1, 'Anglais : Niveau B2', 'Printemps', 1000, 'Especes', '', 1000, '', '2023-01-31 13:53:13', 2),
(9, 34, 'rita rita', 3, 'Espagnol : Niveau A2', 'Hiver', 1000, 'CreditCard', 'HSJSH4551', 1000, '55124', '2023-02-01 00:42:44', 2),
(10, 36, 'Cash Samantha', 4, 'Anglais : Niveau C1', 'Hiver', 1500, 'CreditCard', 'HSJSH4551', 1500, '4514145212', '2023-02-01 02:21:51', 2),
(11, 37, 'Dennis Inez', 4, 'Anglais : Niveau C1', 'Hiver', 1500, 'CreditCard', 'L841416451', 1500, '565256566566', '2023-02-01 10:23:53', 2),
(12, 38, 'Joyner Zorita', 4, 'Anglais : Niveau C1', 'Hiver', 1500, 'CreditCard', 'L841416451', 1500, '566146145613', '2023-02-01 11:58:58', 2),
(13, 39, 'Olson Amelia', 6, 'Anglais : Niveau A2', 'Hiver', 850, 'CreditCard', 'KL51461364', 850, '56184512', '2023-02-01 13:35:33', 2),
(14, 40, 'Roy Skyler', 4, 'Anglais : Niveau C1', 'Hiver', 1500, 'CreditCard', 'gvhbkjinh', 1500, '84566', '2023-02-01 17:16:33', 2),
(15, 34, 'rita rita', 4, 'Anglais : Niveau C1', 'Hiver', 1500, 'CreditCard', '845168461', 1500, '84587845158', '2023-02-01 17:19:30', 2),
(16, 40, 'Roy Skyler', 3, 'Espagnol : Niveau A2', 'Hiver', 1000, 'CreditCard', 'vgbhjnk', 1000, '78415487', '2023-02-01 17:31:41', 2),
(17, 40, 'Roy Skyler', 2, 'Français : Niveau B2', 'Hiver', 800, 'CreditCard', 'HSJSH4551', 800, '45151487451', '2023-02-01 18:19:42', 2),
(18, 41, 'Reeves Tasha', 1, 'Anglais : Niveau B2', 'Hiver', 1000, 'CreditCard', '512521', 1000, '4515451', '2023-02-01 18:38:12', 2),
(19, 41, 'Reeves Tasha', 5, 'Français : Niveau C1', 'été', 1350, 'CreditCard', 'ghjbkj', 1350, '4512451', '2023-02-01 18:38:29', 2),
(20, 42, 'Velez Henry', 4, 'Anglais : Niveau C1', 'Hiver', 1500, 'CreditCard', 'HSJSH4551', 1500, '956585465', '2023-02-01 20:20:31', 2),
(21, 42, 'Velez Henry', 2, 'Français : Niveau B2', 'Hiver', 800, 'Especes', '', 800, '', '2023-02-01 20:20:47', 2),
(22, 10, 'Zm Aya', 5, 'Français : Niveau C1', 'Hiver', 1350, 'CreditCard', 'HSJSH4551', 1350, '154512546132', '2023-02-01 23:47:57', 2),
(23, 10, 'Zm Aya', 3, 'Espagnol : Niveau A2', 'Hiver', 1000, 'CreditCard', 'HSJSH4551', 1000, '6548751254', '2023-02-01 23:52:25', 2),
(24, 43, 'Hatfield Eve', 5, 'Français : Niveau C1', 'Hiver', 1350, 'CreditCard', '445554', 1350, '598254245', '2023-02-02 09:37:08', 2),
(25, 43, 'Hatfield Eve', 3, 'Espagnol : Niveau A2', 'Hiver', 1000, 'CreditCard', 'HSJSH4551', 1000, '5691646132', '2023-02-02 09:39:44', 2),
(26, 44, 'Sampson Vielka', 4, 'Anglais : Niveau C1', 'Hiver', 1500, 'Especes', '', 1500, '', '2023-02-02 10:29:28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `planification`
--

CREATE TABLE `planification` (
  `id` int(11) NOT NULL,
  `title` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `formateur` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `session` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `planification`
--

INSERT INTO `planification` (`id`, `title`, `formateur`, `description`, `session`, `start_datetime`, `end_datetime`) VALUES
(15, 'Anglais : Niveau B2', 'sara ben', 'hhhh', 'Hiver', '2023-02-07 14:00:00', '2023-02-07 16:00:00'),
(17, 'Espagnol : Niveau A2', 'sara ben', 'Introduction', 'Hiver', '2023-02-06 10:00:00', '2023-02-06 12:00:00'),
(18, 'Anglais : Niveau C1', 'sara ben', 'Introduction', 'Hiver', '2023-02-10 10:00:00', '2023-02-10 12:00:00'),
(19, 'Français : Niveau C1', 'sara ben', 'Introduction', 'Hiver', '2023-02-14 14:00:00', '2023-02-14 14:00:00'),
(20, 'Espagnol : Niveau A2', 'sara ben', 'Introduction', 'Hiver', '2023-02-13 10:00:00', '2023-02-13 12:00:00'),
(21, 'Français : Niveau C1', 'sara ben', 'introd', 'été', '2023-02-24 10:00:00', '2023-02-24 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(20) NOT NULL,
  `status` int(5) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `firstName` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastName` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `profession` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `birthdate` date NOT NULL,
  `telephone` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CIN` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adress` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `status`, `email`, `password`, `firstName`, `lastName`, `profession`, `birthdate`, `telephone`, `CIN`, `adress`) VALUES
(6, 1, 'kkkkk@gmail.com', '2051', 'lllll', 'kkkk', 'Etudiant', '2023-01-08', '060405041', 'K558433', 'kkkkkkkkkkkk'),
(7, 1, 'hafsa@gmail.com', '2051', 'lllll', 'kkkk', 'Etudiant', '2022-12-16', '060405041', 'K558433', 'kkkkkkkkkkkk'),
(8, 1, 'kkkkk@gmail.com', 'test', 'lllll', 'kkkk', 'Etudiant', '2022-12-23', '060405041', 'K558433', 'kkkkkkkkkkkk'),
(9, 1, 'h@gmail.com', '2051', 'rhanami', 'hafsa', 'Etudiant', '2022-12-10', '060405041', 'K558433', 'kkkkkkkkkkkk'),
(10, 1, 'aya@gmail.com', 'password', 'Aya', 'Zm', 'Etudiant', '2001-07-20', '064252157', 'L45412', 'tetouan'),
(11, 1, 'kekymuh@mailinator.c', 'Pa$$w0rd!', 'Omar', 'Randolph', 'Dolore amet iusto s', '2006-12-19', '+1 (221) 135', 'Voluptates', 'Molestias perspiciat'),
(12, 1, 'gazy@mailinator.com', 'Pa$$w0rd!', 'Imelda', 'Mccall', 'Et in est quia quibu', '2020-08-24', '+1 (696) 435', 'Voluptatem', 'Dolor qui ex sed a o'),
(13, 1, 'testt@gmail.com', 'password', 'Duncan', 'Franco', 'Recusandae Iure del', '2000-07-25', '+1 (435) 288', 'Facilis mo', 'Voluptatem maxime do'),
(16, 0, 'receptionniste@gmail', 'receptionniste@unilang.com', 'recep', 'aya', 'Receptionniste', '1992-12-01', '0612522115', 'L454152', 'EHTP'),
(18, 0, 'rf@gmail.com', 'rf@unilang.com', 'rf', 'rf', 'Responsable de formation', '1992-12-01', '06125788', 'M25245', 'EHTP'),
(19, 0, 'admin@gmail.com', 'admin@unilang.com', 'ad', 'ad', 'Admin', '1993-12-05', '06125788', 'J415521', 'EHTP'),
(20, 0, 'fotosisys@mailinator.com', 'Pa$$w0rd!', 'Sawyer', 'Pittman', 'Formateur', '2018-09-10', 'lajehave@mai', 'tobozo@mai', 'kawysez@mailinator.com'),
(21, 0, 'ruzus@mailinator.com', 'Pa$$w0rd!', 'Cathleen', 'Norris', 'Comptable', '1972-10-02', 'jodopys@mail', 'furiviti@m', 'bosibahap@mailinator.com'),
(22, 1, 'bujoj@mailinator.com', 'test', 'Penelope', 'Bauer', 'Aut voluptatibus ut ', '1981-11-16', '+1 (518) 159', 'Consectetu', 'Quibusdam debitis in'),
(24, 1, 'fygu@mailinator.com', 'test', 'Kerry', 'Pugh', 'Harum ipsa deserunt', '1998-09-17', '+1 (996) 438', 'Cum harum ', 'Minim atque perspici'),
(25, 0, 'pusofa@mailinator.com', 'Pa$$w0rd!', 'Adam', 'Winters', 'Formateur', '2017-05-10', 'xavaqylibu@m', 'tasu@maili', 'noziwyn@mailinator.com'),
(26, 0, 'formateur1@gmail.com', 'Formateur', 'sara', 'ben', 'Formateur', '1994-12-14', '21154120', '', ''),
(27, 1, 'ayatest@gmail.com', 'password', 'aya', 'test', 'Etudiant', '2001-01-19', '064251351', 'L74134', 'Adresse'),
(28, 1, 'test@mailinator.com', 'test123', 'Chase', 'Andrews', 'Etudiant', '1973-06-25', '+1 (986) 383', 'K558433', 'Omnis reprehenderit '),
(29, 1, 'nobu@mailinator.com', 'test', 'Lillian', 'Maxwell', 'Etudiant', '2001-12-04', '+1 (569) 624', 'Harum nemo', 'In nostrud mollit se'),
(30, 1, 'loxoq@mailinator.com', 'test', 'Dolan', 'Holmes', 'Etudiant', '2001-07-02', '+1 (195) 207', 'Odio eius ', 'Aperiam totam vero r'),
(31, 1, 'sprint@gmail.com', 'test', 'Regina', 'Giles', 'Etudiant', '2001-03-02', '+1 (403) 417', 'Exercitati', 'Proident qui deseru'),
(32, 1, 'miho@mailinator.com', 'password', 'Karleigh', 'English', 'Etudiant', '2000-06-29', '+1 (546) 144', 'Id ex mole', 'Nulla est quia conse'),
(33, 1, 'chada@gmail.com', 'test', 'chada', 'chada', 'Etudiant', '2000-03-02', '+1 (776) 875', 'Maxime eaq', 'Omnis impedit conse'),
(34, 1, 'rita@gmail.com', 'test', 'rita', 'rita', 'Etudiant', '2001-03-02', '+212 4541154', 'KJDKJ41512', 'Molestiae officia no'),
(35, 1, 'lyhivuhafo@mailinator.com', 'test', 'Cole', 'Mayer', 'Reiciendis quia volu', '2011-03-05', '+1 (539) 127', 'Voluptas f', 'Sed minima animi ac'),
(36, 1, 'zevi@mailinator.com', 'test', 'Samantha', 'Cash', 'Etudiant', '1976-01-30', '+212 4541154', 'Ex veniam ', 'Excepturi saepe beat'),
(37, 1, 'nyser@mailinator.com', 'test', 'Inez', 'Dennis', 'Etudiant', '2016-02-10', '+1 (949) 952', 'Non accusa', 'Quis magni libero co'),
(38, 1, 'xusu@mailinator.com', 'test', 'Zorita', 'Joyner', 'Etudiant', '2007-12-19', '+1 (354) 607', 'Ratione no', 'Aliquip deserunt ex '),
(39, 1, 'vodotony@mailinator.com', 'test', 'Amelia', 'Olson', 'Autem veniam repreh', '1975-04-04', '+1 (295) 824', 'Nam offici', 'Non ipsum id illum'),
(40, 1, 'rykuxytuca@mailinator.com', 'test', 'Skyler', 'Roy', 'Est laboriosam aut ', '1975-04-21', '+1 (203) 177', 'Quo velit ', 'Cillum aut dolor per'),
(41, 1, 'pyhilical@mailinator.com', 'test', 'Tasha', 'Reeves', 'Excepturi cum amet ', '2006-08-14', '+1 (478) 801', 'Laboris il', 'Non molestiae iste q'),
(42, 1, 'cazu@mailinator.com', 'test', 'Henry', 'Velez', 'Nihil excepturi blan', '2005-08-21', '+1 (525) 328', 'Incidunt l', 'Ut harum consectetur'),
(43, 1, 'xulesu@mailinator.com', 'test', 'Eve', 'Hatfield', 'Est ea dolores dolor', '1972-03-10', '+1 (846) 859', 'Totam quia', 'Accusamus quia Nam o'),
(44, 1, 'kumoxaf@mailinator.com', 'test', 'Vielka', 'Sampson', 'Velit repudiandae ex', '2022-04-16', '+1 (175) 738', 'Vel praese', 'Cumque enim commodi ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`inscriptionid`),
  ADD KEY `idFormation` (`idFormation`),
  ADD KEY `idClient` (`idClient`);

--
-- Indexes for table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idFormation` (`idFormation`);

--
-- Indexes for table `planification`
--
ALTER TABLE `planification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `inscriptionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `planification`
--
ALTER TABLE `planification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`Id`);

--
-- Constraints for table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `paiement_ibfk_2` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
