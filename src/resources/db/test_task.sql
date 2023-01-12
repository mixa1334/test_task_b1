-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 12, 2023 at 03:05 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_task`
--
CREATE DATABASE IF NOT EXISTS `test_task` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test_task`;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `xml_id` varchar(20) NOT NULL,
  `parent_xml_id` varchar(20) DEFAULT NULL,
  `name_department` varchar(100) NOT NULL,
  `file` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`xml_id`, `parent_xml_id`, `name_department`, `file`) VALUES
('OU001', NULL, 'Коммерческий департамент', 1),
('OU002', 'OU001', 'Маректинг и реклама', 1),
('OU003', NULL, 'Департамент по работе с персоналом ', 1),
('OU004', NULL, 'Сервисный департамент', 1),
('OU005', 'OU004', 'Техническая поддержка', 1),
('OU006', 'OU005', 'Закупки', 1);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `extention` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `extention`) VALUES
(1, 'import_departments', 'csv'),
(3, 'import_users', 'csv');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `xml_id` varchar(20) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `department` varchar(20) NOT NULL,
  `work_position` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_phone` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `file` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`xml_id`, `last_name`, `name`, `second_name`, `department`, `work_position`, `email`, `mobile_phone`, `phone`, `login`, `password`, `file`) VALUES
('CN001', 'Иванова', 'Ирина', 'Витальевна', 'OU001', 'Руководитель департамента', 'iivanova@company.ru', '+7(496)777-77-77', NULL, 'iivanova', 'iivanova', 3),
('CN002', 'Сергеев', 'Константин', 'Игоревич', 'OU002', 'Маркетолог', 'ksergeev@company.ru', NULL, NULL, 'ksergeev', 'ksergeev', 3),
('CN003', 'Бучельников', 'Николай', 'Иванович', 'OU003', 'Рекрутер', 'nbuchelnikov@company.ru', NULL, '+7996 66666 96', 'nbuchelnikov', 'nbuchelnikov', 3),
('CN004', 'Гулина', 'Алена', 'Евгеньевна', 'OU005', 'Специалист', 'agulina@company.ru', NULL, '+79221110500', 'agulina', 'agulina', 3),
('CN005', 'Калашников', 'Евгений', 'Валентинович', 'OU005', 'Руководитель департамента', 'ekalashnikov@company.ru', '74232497777', '74957556983', 'ekalashnikov', 'ekalashnikov', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`xml_id`),
  ADD UNIQUE KEY `xml_id` (`xml_id`),
  ADD KEY `parent_xml_id` (`parent_xml_id`),
  ADD KEY `file` (`file`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`xml_id`),
  ADD UNIQUE KEY `xml_id` (`xml_id`),
  ADD KEY `department` (`department`),
  ADD KEY `file` (`file`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`parent_xml_id`) REFERENCES `departments` (`xml_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `departments_ibfk_2` FOREIGN KEY (`file`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`xml_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`file`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
