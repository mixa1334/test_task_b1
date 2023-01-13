-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 13, 2023 at 01:48 PM
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
  `name_department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`xml_id`, `parent_xml_id`, `name_department`) VALUES
('OU001', NULL, 'Коммерческий департамент'),
('OU002', 'OU001', 'Маректинг и реклама'),
('OU003', NULL, 'Департамент по работе с персоналом '),
('OU004', NULL, 'Сервисный департамент'),
('OU005', 'OU004', 'Техническая поддержка'),
('OU006', 'OU005', 'Закупки');

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
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`xml_id`, `last_name`, `name`, `second_name`, `department`, `work_position`, `email`, `mobile_phone`, `phone`, `login`, `password`) VALUES
('CN001', 'Иванова', 'Ирина', 'Витальевна', 'OU001', 'Руководитель департамента', 'iivanova@company.ru', '+7(496)777-77-77', NULL, 'iivanova', 'iivanova'),
('CN002', 'Сергеев', 'Константин', 'Игоревич', 'OU002', 'Маркетолог', 'ksergeev@company.ru', NULL, NULL, 'ksergeev', 'ksergeev'),
('CN003', 'Бучельников', 'Николай', 'Иванович', 'OU003', 'Рекрутер', 'nbuchelnikov@company.ru', NULL, '+7996 66666 96', 'nbuchelnikov', 'nbuchelnikov'),
('CN004', 'Гулина', 'Алена', 'Евгеньевна', 'OU005', 'Специалист', 'agulina@company.ru', NULL, '+79221110500', 'agulina', 'agulina'),
('CN005', 'Калашников', 'Евгений', 'Валентинович', 'OU005', 'Руководитель департамента', 'ekalashnikov@company.ru', '74232497777', '74957556983', 'ekalashnikov', 'ekalashnikov');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`xml_id`),
  ADD UNIQUE KEY `xml_id` (`xml_id`),
  ADD KEY `parent_xml_id` (`parent_xml_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`xml_id`),
  ADD UNIQUE KEY `xml_id` (`xml_id`),
  ADD KEY `department` (`department`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`parent_xml_id`) REFERENCES `departments` (`xml_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`xml_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
