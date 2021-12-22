-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 08:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidtracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--
CREATE DATABASE covidtracker;
DROP DATABASE IF EXISTS covidtracker;
use covidtracker;
CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accountTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `created_at`, `accountTypeId`) VALUES
(11, 'sweetspot', '$2y$10$hEIdxkAJvbSlhtY43UN0puHsfTQVYeE4miBxBajt2zbaAAg/C4fLm', '2021-04-06 02:35:51', 4),
(12, 'puppyrush', '$2y$10$CSu5Bhvt6fusvl2M/Lct7OmjLJ4evhGq7QF6e9kxd18hnXjXoH/w2', '2021-04-06 02:36:50', 4),
(17, 'cookieshop', '$2y$10$grNkNLgajq2k1Rw7Dup7Fenoez2n/.5E3RtItezIFVcaVkzreIYeC', '2021-04-06 02:39:31', 4),
(18, 'petavenue', '$2y$10$MVeKHPBz/KUv/u7oWUkmN.dDH/1S/K8EDiignxjWYdGtkAUfarWpW', '2021-04-06 02:40:41', 4),
(19, 'lovewind', '$2y$10$pCUerMKaaDbXTfuqKa1jx.IjHjYN39K1Uwq1UZzC06eObMcK/sEoy', '2021-04-06 02:41:57', 4),
(20, 'pizzaplace', '$2y$10$Dp5ZBM2BAMm/O5MgAetMq.K7Xwx9ptmzgh9SkHnr9Fc7IlkosSOW6', '2021-04-06 02:43:07', 4),
(21, 'wildflower', '$2y$10$dNsBpdPsK432Y.qK0ZT9BOFIkLqumOHy7LdqUZPvK2H1FIDmAFgia', '2021-04-06 02:43:57', 4),
(22, 'meatcuts', '$2y$10$Pin4wynSt.wSEq9FW8EIMOj26/w4QioE0AJaMM9jUSoBJX5mgMTsK', '2021-04-06 02:44:45', 4),
(23, 'flavortown', '$2y$10$i5GpUYqaI7M4yzBLpFE7neT.iPxUlwldw2U8g1/lENBQuWya1Zyqq', '2021-04-06 02:45:36', 4),
(24, 'trayclub', '$2y$10$2FlnHZnlR6zYLBKqlYmsGuwFjxAGMYkwyrB1qNnVQhs5nknewbe0m', '2021-04-06 02:46:25', 4),
(25, 'vivianniedf', '$2y$10$1HNBQX7C68KwV9Oa75ciM.y/ALJgQC.HhQXbx1kgeksuFHtJTRQiu', '2021-04-06 02:49:32', 2),
(26, 'rafaelr', '$2y$10$OAg9hekQJ.crniISUZaodeQ5jl3Btw1ZYpk1hbWrC8bSU/PqfD2WS', '2021-04-06 02:52:32', 2),
(27, 'ryana', '$2y$10$CY3UXTjdmKyub4R2vfVdredRFS/lRPwi3RjuRum7HBc9CuydrJbhq', '2021-04-06 02:55:21', 2),
(28, 'juans', '$2y$10$eMAOskUG1rl6Vrr.igpG2eeoNHvNeiIGTqgDc02sW68.G3teTux2y', '2021-04-06 02:57:10', 2),
(29, 'cora', '$2y$10$vohcB8GEJ0/vhWgNzEQCaOlhFSwiFvNxbKmd8J1J/bsRHK9DkZCf2', '2021-04-06 02:58:29', 2),
(30, 'cuddles', '$2y$10$AbSDOBbZch5Sw4z8E.DdbOmiw/lBftDW8In.cuVGvEGwTFAWARb.S', '2021-04-06 02:59:43', 2),
(31, 'shadow', '$2y$10$Ab5029bnLmVbPMW2Sb2KqOuPEhhYO.96NvK.54OMRLkNDm4LDwTfO', '2021-04-06 03:01:08', 2),
(32, 'buttercup', '$2y$10$A1tyh.RcZFpQX/25rsA7t.BuEImffhsojqu5wptKsa9EB4MLR5/AK', '2021-04-06 03:02:08', 2),
(33, 'lucie', '$2y$10$PTi/e8W89c60Esr9UEN2I.INIPcfnJq.1kPF8Q407bdqqfsP.yO8O', '2021-04-06 03:03:08', 2),
(34, 'loki', '$2y$10$5zHIiOM2Lh39Wyp9i8B.V.HUGLqNGhhdkgGNVDmKAoOQVxWuQRyCi', '2021-04-06 03:04:13', 2),
(37, 'jdoe', '$2y$10$Oj10Z6qkWFxce.gW6dBqKOHHv5k/7O3V8yfc5GcVun2f5d8KF0vZi', '2021-04-06 04:53:29', 2),
(38, 'mary', '$2y$10$.uzQIk0QRXHTo2O89jgff.G3q5XaMAMo/wDHOa0oVSLEH7b4QrW2y', '2021-04-06 19:50:39', 2),
(39, 'janed', '$2y$10$kA9KftoyKBwISHL/aLYtYuUKhn5ahQHotLrBnN.HFzY8DyQx9SLwu', '2021-04-06 20:05:45', 3);

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `accountTypeId` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`accountTypeId`, `description`) VALUES
(1, 'Administrator'),
(2, 'General User'),
(3, 'Healthcare Professional'),
(4, 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `business_information`
--

CREATE TABLE `business_information` (
  `businessId` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_district` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_information`
--

INSERT INTO `business_information` (`businessId`, `business_name`, `address_street`, `address_district`, `address_city`, `address_number`, `email`) VALUES
(11, 'Sweet Spot', 'Novel Street', 'Orange Walk', 'Belize', '5', 'sweet@spot.com'),
(12, 'Puppy Rush', 'Hill Drive Street', 'Belize', 'Belmpan', '6', 'puppy@rush.com'),
(17, 'Cookie Shop', 'Pond Road', 'Orange Walk', 'Belmopan', '2', 'cookie@shop.com'),
(18, 'Pet Avenue', 'Hollow Road', 'Cayo', 'Belmopan', '09', 'pet@avenue.com'),
(19, 'Love Wind', 'Chapel Street', 'Cayo', 'Belmopan', '5', 'love@wind.com'),
(20, 'Pizza Place', 'Broadway Street', 'Belize', 'Belmopan', '0', 'pizza@place.com'),
(21, 'Wild Flower', 'Forest Drive', 'Belize', 'Belmopan', '0', 'wild@flower.com'),
(22, 'Meat Cuts', 'Clinton Street', 'Cayo', 'Belize', '3', 'meat@cuts.com'),
(23, 'Flavor Town', 'Jody Road', 'Cayo', 'Belmopan', '2', 'flavor@town.com'),
(24, 'Tray Club', 'Robinson Lane', 'Cayo', 'Belmopan', '0', 'tray@club.com');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diagnosisId` int(11) NOT NULL,
  `diagnosis` varchar(50) NOT NULL,
  `dateOfDiagnosis` date NOT NULL,
  `comment` text,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosisId`, `diagnosis`, `dateOfDiagnosis`, `comment`, `id`) VALUES
(1, 'Positive', '2021-05-15', NULL, 25),
(2, 'Positive', '2021-05-15', NULL, 29),
(3, 'Positive', '2021-05-07', NULL, 26);

-- --------------------------------------------------------

--
-- Table structure for table `general_user_information`
--

CREATE TABLE `general_user_information` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_district` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `qrCodeId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_user_information`
--

INSERT INTO `general_user_information` (`id`, `firstName`, `lastName`, `dateOfBirth`, `gender`, `address_street`, `address_district`, `address_city`, `address_number`, `email`, `qrCodeId`) VALUES
(25, 'Viviannie ', 'De La Fuente', '2001-07-29', 'female', 'St. Joseph Street', 'Cayo', 'Belmopan', '6', 'vivianniedlf29@gmail.com', 'Viviannie De La Fuente2001-07-29'),
(26, 'Rafael', 'Ramos', '1997-06-06', 'male', 'Lemon Drive', 'Cayo', 'Belmopan', '0', '2006114843@ub.edu.bz', 'RafaelRamos1997-06-06'),
(27, 'Ryan', 'Armstrong', '1998-04-06', 'male', 'Weekley Street', 'Cayo', 'Belmopan', '4', '2015112274@ub.edu.bz', 'RyanArmstrong1998-04-06'),
(28, 'Juan ', 'Sarabia', '1995-04-15', 'male', 'Zappia Drive', 'Cayo', 'Belmopan', '0', '2005113257@ub.edu.bz', 'Juan Sarabia1995-04-15'),
(29, 'Cora', 'De La Fuente', '2020-07-06', 'female', 'St. Joseph Street', 'Cayo', 'Belmopan', '6', 'cora@wora.com', 'CoraDe La Fuente2020-07-06'),
(30, 'Cuddles', 'De La Fuente', '2020-07-08', 'female', 'St. Joseph Street', 'Cayo', 'Belmopan', '6', 'cuddles@wuddles.com', 'CuddlesDe La Fuente2020-07-08'),
(31, 'Shadow', 'De La Fuente', '2015-02-06', 'male', 'St. Joseph Street', 'Cayo', 'Belmopan', '6', 'viviannie_29@hotmail.com', 'ShadowDe La Fuente2015-02-06'),
(32, 'Buttercup', 'De La Fuente', '2018-07-06', 'female', 'St. Joseph Street', 'Cayo', 'Belmopan', '6', 'viviannie_29@hotmail.com', 'ButtercupDe La Fuente2018-07-06'),
(33, 'Lucie', 'De La Fuente', '2019-02-04', 'female', 'St. Joseph Street', 'Cayo', 'Belmopan', '6', 'viviannie_29@hotmail.com', 'LucieDe La Fuente2019-02-04'),
(34, 'Loki', 'De La Fuente', '2019-01-01', 'male', 'St. Joseph Street', 'Cayo', 'Belmopan', '6', 'viviannie_29@hotmail.com', 'LokiDe La Fuente2019-01-01'),
(39, 'Jane', 'Doe', '2020-06-17', 'female', 'St. Joseph Street', 'Belize', 'Belmopan', '6', 'viviannie@gmail.com', 'JaneDoe2020-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `scan_logs`
--

CREATE TABLE `scan_logs` (
  `logId` int(11) NOT NULL,
  `logTime` time NOT NULL,
  `logDate` date NOT NULL,
  `businessId` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scan_logs`
--

INSERT INTO `scan_logs` (`logId`, `logTime`, `logDate`, `businessId`, `id`) VALUES
(1, '12:00:00', '2021-05-02', 11, 29),
(2, '26:00:00', '2021-05-03', 12, 29),
(3, '43:00:00', '2021-05-04', 17, 29),
(4, '12:00:00', '2021-05-02', 19, 29),
(5, '12:00:00', '2021-05-10', 24, 29),
(6, '12:00:00', '2021-05-13', 19, 29),
(7, '54:20:13', '2021-05-07', 20, 29),
(8, '12:00:00', '2021-05-02', 11, 25),
(9, '53:00:20', '2021-05-02', 11, 26),
(10, '12:00:00', '2021-05-02', 11, 27),
(11, '26:00:00', '2021-05-03', 12, 28),
(60, '12:00:00', '2021-05-02', 11, 28),
(61, '53:00:20', '2021-05-05', 17, 33),
(62, '36:00:00', '2021-05-13', 19, 34),
(63, '26:00:00', '2021-05-10', 24, 32),
(64, '54:20:13', '2021-05-07', 20, 30),
(65, '54:20:13', '2021-05-05', 17, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `accountTypeId` (`accountTypeId`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`accountTypeId`);

--
-- Indexes for table `business_information`
--
ALTER TABLE `business_information`
  ADD PRIMARY KEY (`businessId`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosisId`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `general_user_information`
--
ALTER TABLE `general_user_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scan_logs`
--
ALTER TABLE `scan_logs`
  ADD PRIMARY KEY (`logId`),
  ADD KEY `id` (`id`),
  ADD KEY `businessId` (`businessId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `accountTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diagnosisId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `general_user_information`
--
ALTER TABLE `general_user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `scan_logs`
--
ALTER TABLE `scan_logs`
  MODIFY `logId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`accountTypeId`) REFERENCES `account_type` (`accountTypeId`);

--
-- Constraints for table `business_information`
--
ALTER TABLE `business_information`
  ADD CONSTRAINT `business_information_ibfk_1` FOREIGN KEY (`businessId`) REFERENCES `account` (`id`);

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `diagnosis_ibfk_1` FOREIGN KEY (`id`) REFERENCES `account` (`id`);

--
-- Constraints for table `general_user_information`
--
ALTER TABLE `general_user_information`
  ADD CONSTRAINT `general_user_information_ibfk_1` FOREIGN KEY (`id`) REFERENCES `account` (`id`);

--
-- Constraints for table `scan_logs`
--
ALTER TABLE `scan_logs`
  ADD CONSTRAINT `scan_logs_ibfk_1` FOREIGN KEY (`id`) REFERENCES `general_user_information` (`id`),
  ADD CONSTRAINT `scan_logs_ibfk_2` FOREIGN KEY (`businessId`) REFERENCES `business_information` (`businessId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
