-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 28 avr. 2020 à 16:17
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `coophelha`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `reference` varchar(6) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `prixunit` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `codeTVA` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`reference`, `categorie`, `libelle`, `prixunit`, `photo`, `description`, `codeTVA`) VALUES
('CALC01', 'Calculatrice', 'CASIO FX_92', 27, 'img\\cal1.jpg', 'Calculatrice casio fx92BJJDHF scientifique', 1),
('CALC02', 'Calculatrice', 'Lexibook E413SW', 8, 'img\\cal2.jpg', 'Calculatrice Lexibook de poche', 1),
('CALC03', 'Calculatrice', 'Casio Graph 25+', 60, 'img\\cal3.jpg', 'Calculatrice Casio 25+', 1),
('CALC04', 'Calculatrice', 'ACROPAQ AC2236', 12, 'img\\cal4.jpg', 'Calculatrice Acropaq', 1),
('CALC05', 'Calculatrice', 'Texas Instrument 30', 25, 'img\\cal5.jpg', 'Calculatrice Texas Instrument TI-30', 1),
('CAR01', 'Cartouche', 'Cartouche Brother LC123', 23, 'img\\car1.jpg', 'Cartouche Brother LC123 encre noire pour imprimante jet encre', 2),
('CAR02', 'Cartouche', 'Cartouche HP302XL', 30, 'img\\car2.jpg', 'Cartouche HP 302XL haute capacité noire pour imprimante jet encre', 2),
('CAR03', 'Cartouche', 'Cartouche Canon 545XL', 23, 'img\\car3.jpg', 'Cartouche Canon PG-545XL BK haute capacité noire pour imprimante jet encre', 2),
('CAR04', 'Cartouche', 'Cartouche HP301XL', 35, 'img\\car4.jpg', 'Cartouche HP 301XL 3 couleurs pour imprimante jet encre', 2),
('CAR05', 'Cartouche', 'Cartouche HP953XL', 35, 'img\\car5.jpg', 'HP 953XL cartouche couleurs haute capacité pour imprimante jet encre', 2),
('CAR06', 'Cartouche', 'Cartouche Canon 541XL', 20, 'img\\car6.jpg', 'Canon 541XL pour imprimante jet encre', 2),
('CIMP01', 'Imprimante', 'Canon TS5150', 59, 'img\\imp1.jpg', 'imprimante multifonction Pixma Noir', 3),
('CIMP02', 'Imprimante', 'Canon MB2150', 164, 'img\\imp2.jpg', 'imprimante multifonction Maxify', 3),
('CIMP03', 'Imprimante', 'HP6230', 100, 'img\\imp3.jpg', 'imprimante multifonction Envy Photo', 3),
('CIMP04', 'Imprimante', 'Brother MFC 9570', 1379, 'img\\imp4.jpg', 'imprimante multifonction MFC-L9570CDW', 3),
('CIMP05', 'Imprimante', 'EPSON ET-4700', 249, 'img\\imp5.jpg', 'imprimante multifonction EcoTank', 3),
('CIMP06', 'Imprimante', 'Canon MP-42000', 85, 'img\\imp6.jpg', 'imprimante multifonction Canon', 3),
('GSM01', 'Smartphone', 'Huawei P20 PRO', 257, 'img\\sma1.jpg', 'Huawei P20 PRO', 3),
('GSM02', 'Smartphone', 'Samsung S20', 809, 'img\\sma2.jpg', 'Samsung Galaxy S20', 3),
('GSM03', 'Smartphone', 'Huawei P30 PRO', 720, 'img\\sma3.jpg', 'Huawei P30 PRO', 3),
('GSM04', 'Smartphone', 'Samsung A80', 350, 'img\\sma4.jpg', 'Samsung Galaxy A80', 3),
('GSM05', 'Smartphone', 'Iphone 11', 839, 'img\\sma5.jpg', 'Apple Iphone 11 Noir', 3),
('GSM06', 'Smartphone', 'iPhone SE', 489, 'img\\sma6.jpg', 'iPhone SE(2020) 64 Go', 3),
('GSM07', 'Smartphone', 'Samsung A40', 250, 'img\\sma7.jpg', 'Samsung Galaxy A40', 3),
('GSM08', 'Smartphone', 'iPhone Xr', 729, 'img\\sma8.jpg', 'iPhone Xr 64 Go', 3),
('PAP01', 'Papier', 'Ramette Clairefontaine', 3, 'img\\pap1.jpg', 'Ramette papier Clairefontaine A4 80 g - blanc', 1),
('PAP02', 'Papier', 'Ramette Navigator', 3, 'img\\pap2.jpg', 'Papier A4 blanc 80 g Navigator Universal', 1),
('PAP03', 'Papier', 'Ramette Double A', 5, 'img\\pap3.jpg', 'Papier A4 blanc 80g Double A', 1),
('PAP04', 'Papier', 'Ramette REY', 5, 'img\\pap4.jpg', 'Papier A4 blanc 80g Rey Office', 1),
('PAP05', 'Papier', 'Ramette Bruneau', 13, 'img\\pap5.jpg', 'Papier A3 blanc 80g Bruneau Reprospeed', 1),
('TELE01', 'Television', 'Samsung TV UE43RU7020W', 399, 'img\\tel1.jpg', 'TV Samsung 4K avec 43 pouces', 2),
('TELE02', 'Television', 'Brandt B3234', 159, 'img\\tel2.jpg', 'TV Brandt HD avec écran Led', 2),
('TELE03', 'Television', 'LG 55UM7100PLB', 499, 'img\\tel3.jpg', 'TV LG direct Led, UHD 4K, 55 pouces', 2),
('TELE04', 'Television', 'Brandt B5504', 349, 'img\\tel4.jpg', 'TV Brandt Edge Led, UHD 4K, 55 pouces', 2),
('TELE05', 'Television', 'Phillips 43PUS6754/12', 449, 'img\\tel5.jpg', 'TV Phillips Direct Led, UHD 4K HDR, 43 pouces', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tva`
--

CREATE TABLE `tva` (
  `codeTVA` int(1) NOT NULL,
  `tauxTVA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tva`
--

INSERT INTO `tva` (`codeTVA`, `tauxTVA`) VALUES
(1, 6),
(2, 12),
(3, 21);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`reference`),
  ADD KEY `categorie` (`categorie`),
  ADD KEY `codeTVA` (`codeTVA`);

--
-- Index pour la table `tva`
--
ALTER TABLE `tva`
  ADD PRIMARY KEY (`codeTVA`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `code_tva_cle_etrangere` FOREIGN KEY (`codeTVA`) REFERENCES `tva` (`codeTVA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
