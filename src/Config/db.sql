-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2021 at 03:46 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting`
--

-- Database relations
--    Company --- type
--    Company --- invoice
--    People --- invoice
--    People --- company

-- --------------------------------------------------------

-- Create database
CREATE DATABASE IF NOT EXISTS accounting_cogip
    CHARACTER SET utf8
    COLLATE utf8_general_ci;


use accounting_cogip;

-- Table structure for table `invoice`
CREATE TABLE IF NOT EXISTS `invoice` (
                                          `id` int(11) UNSIGNED NOT NULL,
                                          `number` varchar(11) NOT NULL,
                                          `date` date NOT NULL,
                                          `company_id` int(11) NOT NULL,
                                          `person_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Content of table `invoice`
--
INSERT INTO `invoice` (`id`, `number`, `date`, `company_id`, `person_id`) VALUES
    (1, 'F00001', '2020-08-07', 1, 3),
    (2, 'F00002',  '2020-07-08', 1, 4),
    (3, 'F00003',  '2020-06-10', 1, 5),
    (4, 'F00004',  '2020-04-09', 1, 6),
    (5, 'F00005',  '2020-08-12', 2, 7),
    (6, 'F00006',  '2020-08-14', 2, 8),
    (7, 'F00007',  '2020-08-17', 2, 9),
    (8, 'F00008',  '2020-08-21', 2, 10),
    (9, 'F00009',  '2020-08-29', 2, 11),
    (10, 'F00010',  '2020-08-15', 5, 12),
    (11, 'F00011',  '2020-08-28', 5, 13),
    (12, 'F00012',  '2020-08-29', 5, 14),
    (13, 'F00013',  '2020-08-23', 5, 15),
    (14, 'F00014',  '2020-08-27', 5, 16),
    (15, 'F00015',  '2018-08-08', 6, 17),
    (16, 'F00016',  '2018-08-21', 6, 18),
    (17, 'F00017',  '2018-08-29', 6, 19),
    (18, 'F00018',  '2018-07-01', 6, 20),
    (19, 'F00019',  '2018-05-07', 6, 21),
    (20, 'F00020',  '2018-08-13', 6, 22),
    (21, 'F00021',  '2018-05-16', 7, 23),
    (22, 'F00022',  '2018-03-20', 7, 24),
    (23, 'F00023',  '2017-11-01', 7, 25),
    (24, 'F00024',  '2018-07-06', 7, 26),
    (25, 'F00025',  '2018-06-02', 7, 27),
    (26, 'F00026',  '2017-12-22', 1, 3);
-- --------------------------------------------------------

-- Table structure for table `company`
CREATE TABLE IF NOT EXISTS `company` (
                                           `id` int(11) UNSIGNED NOT NULL,
                                           `name` varchar(45) NOT NULL,
                                           `country` varchar(45) NOT NULL,
                                           `vat` varchar(45) NOT NULL,
                                           `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Content of table `company`
--
INSERT INTO `company` (`id`, `name`, `country`, `vat`, `type_id`) VALUES
    (1, 'Marianne Developer', 'Belgium', '048349728', 1),
    (2, 'Frank Developer', 'Belgium', '347812395', 2),
    (5, 'Giusepe Developer','Belgium', '351745029', 1),
    (6, 'Abdelilah Developer','Belgium', '032478159',2),
    (7, 'WebDesign','Belgium', '325149657',1);
-- --------------------------------------------------------

-- Table structure for table `person`
CREATE TABLE IF NOT EXISTS `person` (
                                         `id` int(11) UNSIGNED NOT NULL,
                                         `firstname` varchar(45) NOT NULL,
                                         `lastname` varchar(45) NOT NULL,
                                         `email` varchar(45) NOT NULL,
                                         `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Content of table `person`
--
INSERT INTO `person` (`id`, `firstname`, `lastname`, `email`, `company_id`) VALUES
    (1, 'Person', 'Person', 'pp@google.com', 1),
    (2, 'Person', 'Another', 'pa@google.com', 1),
    (3, 'Cedric', 'Duchmol', 'cedricduchmol@google.com', 1),
    (4, 'Angel', 'Leroi', 'angelleroi@gmail.com', 1),
    (5, 'Stephane', 'Boulanger','stephaneboulanger@gmail.com', 1),
    (6, 'Paul', 'Van Depute','paulvandepute@gmail.com', 2),
    (7, 'Julie', 'Dupont', 'juliedupont@gmail.com', 1),
    (8, 'Marie', 'Dupont','mariedupont@gmail.com', 1),
    (9, 'John', 'Smith', 'johnsmith@gmail.com', 2),
    (10, 'Henry', 'Salvador','henrysalvador@gmail.com', 2),
    (11, 'Blabla', 'Blabla','blablablabla@gmail.com', 2),
    (12, 'Simon', 'Simon','simonsimon@gmail.com', 2),
    (13, 'Simon', 'Pinnochio', 'simonpinnochio@gmail.com', 5),
    (14, 'Hulk', 'Men', 'hulkmen@gmail.com', 5),
    (15, 'Jules', 'Sesar', 'js@gmail.com', 5),
    (16, 'Thibault', 'Courtois', 'thibaut.courtoisg@gmail.com', 5),
    (17, 'Geraldine', 'Gribouti', 'gg@gmail.com', 5),
    (18, 'David', 'Goojob', 'david.goodjob@gmail.com', 6),
    (19, 'Bob', 'Dylan', 'bd@gmail.com', 6),
    (20, 'Calmos', 'Brutos', 'cb@gmail.com', 6),
    (21, 'Vanessa', 'Paradis', 'whow@gmail.com', 6),
    (22, 'Guillaume', 'Rtbf', 'gr@gmail.com', 6),
    (23, 'Rachid', 'Lamri', 'rachid.lamri@gmail.com', 7),
    (24, 'Emily', 'Tiny', 'et@gmail.com', 7),
    (25, 'Cookie', 'And Session', 'cookie.session@gmail.com', 7),
    (26, 'Salami', 'Miammiam', 'salami.miamiam@gmail.com', 7),
    (27, 'Louis', 'Notre voisin', 'louis@gmail.com', 7),
    (28, 'Robert', 'Deniro', 'robertdeniro@gmail.com', 5),
    (29, 'Php', 'Developer', 'php.developer@gmail.com', 2);
-- --------------------------------------------------------

-- Table structure for table `type`
CREATE TABLE IF NOT EXISTS `type` (
                                       `id` int(11) UNSIGNED NOT NULL,
                                       `type` varchar(45) DEFAULT NULL /*provider or client*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Content of table `type`
--
INSERT INTO `type` (`id`, `type`) VALUES
    (1, 'client'),
    (2, 'provider');
-- --------------------------------------------------------

--
-- Table structure for table `user`
--
CREATE TABLE `user` (
                        `id` int(11) UNSIGNED NOT NULL,
                        `login` varchar(30) NOT NULL,
                        `password` varchar(100) NOT NULL,
                        `email` varchar(30) NOT NULL,
                        `role` varchar(20) NOT NULL COMMENT 'Admin/Moderator/User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Content of table `user`
--
INSERT INTO `user` (`id`, `login`, `password`, `email`, `role`) VALUES
    (1, 'jean-christian', 'ranu', 'jean-christianranu@gmail.com', 'admin'),
    (2, 'muriel', 'moderator', 'murielmoderator@gmail.com', 'moderator'),
    (3, 'simple-user', 'user', 'jean-user@gmail.com', 'user');
-- --------------------------------------------------------


--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
    ADD PRIMARY KEY (`id`),
    ADD KEY `person` (`person_id`),
    ADD KEY `company` (`company_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `company`
    ADD PRIMARY KEY (`id`),
    ADD KEY `type` (`type_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
    ADD PRIMARY KEY (`id`),
    ADD KEY `company` (`company_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`);
-- --------------------------------------------------------------

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
-- ----------------------------------------------------------------------------------

--
-- constraints for table `invoice`
--
ALTER TABLE `invoice`
    ADD CONSTRAINT `fk_invoice_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_invoice_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- constraints for table `company`
--
ALTER TABLE `company`
    ADD CONSTRAINT `fk_company_type` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;



COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;