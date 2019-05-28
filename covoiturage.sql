-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2019 at 02:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covoiturage`
--

-- --------------------------------------------------------

--
-- Table structure for table `details_reservation`
--

CREATE TABLE `details_reservation` (
  `id` int(11) NOT NULL,
  `trajet` varchar(1000) NOT NULL,
  `nbr_place_reservees` int(11) NOT NULL,
  `prix_total` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `utilisateur` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `pays` varchar(1000) NOT NULL,
  `ville` varchar(1000) NOT NULL,
  `statut` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details_reservation`
--

INSERT INTO `details_reservation` (`id`, `trajet`, `nbr_place_reservees`, `prix_total`, `id_reservation`, `id_utilisateur`, `utilisateur`, `address`, `pays`, `ville`, `statut`) VALUES
(8, 'Agadir -> Marrakech', 1, 130, 18, 16, 'AK Hafdi', 'Casa', 'Moroc', 'Casa', 'ready'),
(12, 'Marrakech -> Rabat', 3, 360, 4, 20, 'XXX YYY', 'ensias', 'Moroc', 'Rabat', 'ready');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_trajet` int(11) DEFAULT NULL,
  `nbr_place_reservees` int(11) DEFAULT NULL,
  `dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statut` varchar(1000) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trajets`
--

CREATE TABLE `trajets` (
  `id` int(11) NOT NULL,
  `trajet` char(25) DEFAULT NULL,
  `nbr_place_dispo` int(11) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `prix` int(11) DEFAULT NULL,
  `id_image` int(11) DEFAULT NULL,
  `nom_image` char(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trajets`
--

INSERT INTO `trajets` (`id`, `trajet`, `nbr_place_dispo`, `description`, `prix`, `id_image`, `nom_image`, `date`) VALUES
(55, 'Rabat -> Tanger', 4, 'delta de + ou - 15mn, indÃ©pendamment des alÃ©as mÃ©tÃ©o ou routiers.<br>\r\n2 max Ã  l\'arriÃ¨re. <br>\r\nFumer n\'est pas autorisÃ© dans la voiture.\r\nPas d\'animaux dans la voiture.', 85, 1, '4.jpg', '2019-06-21 18:00:00'),
(56, 'Mohammadia -> Casa', 5, 'delta de + ou - 15mn, indÃ©pendamment des alÃ©as mÃ©tÃ©o ou routiers.<br>2 max Ã  l\'arriÃ¨re. <br>Fumer n\'est pas autorisÃ© dans la voiture.<br> Pas d\'animaux dans la voiture.', 35, 56, '3.jpg', '2019-02-05 07:00:00'),
(57, 'Marrakech -> Rabat', 6, 'delta de + ou - 15mn, indÃ©pendamment des alÃ©as mÃ©tÃ©o ou routiers. <br>2 max. Ã  l\'arriÃ¨re.<br> Fumer n\'est pas autorisÃ© dans la voiture. <br>Pas d\'animaux dans la voiture.', 120, 57, '1.jpg', '2019-03-02 14:03:00'),
(60, 'Marrakech -> Tanger', 4, 'delta de + ou - 15mn, indÃ©pendamment des alÃ©as mÃ©tÃ©o ou routiers. <br>\r\n2 max Ã  l\'arriÃ¨re. <br>\r\nFumer n\'est pas autorisÃ© dans la voiture. <br>\r\nPas d\'animaux dans la voiture.', 180, 58, '8.png', '2019-02-03 14:01:00'),
(61, 'Agadir -> Marrakech', 4, 'delta de + ou - 15mn, indÃ©pendamment des alÃ©as mÃ©tÃ©o ou routiers. <br>\r\n2 max Ã  l\'arriÃ¨re. <br>Fumer n\'est pas autorisÃ© dans la voiture. <br>\r\nPas d\'animaux dans la voiture.', 130, 61, '10.png', '2019-01-03 13:01:00'),
(70, 'Rabat -> Tanger', 4, 'Test', 90, 70, '8.jpg', '2020-01-01 01:00:00'),
(71, 'DEpart X -> Destination Y', 0, 'Test', 90, 71, '1.jpg', '2019-01-02 02:01:00'),
(72, 'X -> Y', 5, 'Test admin', 55, 72, '1.jpg', '2019-01-01 01:00:00'),
(73, 'X -> Y', 1, 'Test', 95, 73, '1.jpg', '2019-01-01 01:00:00'),
(74, 'Mohammadia -> Casa', 0, 'Test !', 100, 74, '1.jpg', '2019-01-01 01:00:00'),
(75, 'Rabat -> Tanger', 6, 'Teste', 85, 75, '2.jpg', '2019-01-01 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `prenom` char(25) DEFAULT NULL,
  `nom` char(25) DEFAULT NULL,
  `password` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `ville` char(25) DEFAULT NULL,
  `pays` char(25) DEFAULT NULL,
  `role` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `prenom`, `nom`, `password`, `address`, `ville`, `pays`, `role`) VALUES
(13, 'ghazal@gmail.com', 'Abdelkabir', 'Ghazal', '8ca388bc92a4e1f53ad7ba65a4c63b24', 'Madinat Al irfan ', 'Rabat', 'Moroc', 'admin'),
(14, 'yassine@gmail.com', 'Yassine', 'Zerdani', '8ca388bc92a4e1f53ad7ba65a4c63b24', 'Rabat', 'Rabat', 'Moroc', 'admin'),
(19, 'MrX@gmail.com', 'X', 'Y', '8ca388bc92a4e1f53ad7ba65a4c63b24', 'Ensias', 'Rabat', 'Moroc', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details_reservation`
--
ALTER TABLE `details_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trajets`
--
ALTER TABLE `trajets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details_reservation`
--
ALTER TABLE `details_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trajets`
--
ALTER TABLE `trajets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
