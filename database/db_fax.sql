-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 10:45 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fax`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `username` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `username`, `email`, `password`, `role`, `status`) VALUES
(1, 'Amit ', 'admin', 'admin@example.com', '$2y$10$ZTsY0GZO8kCBd9vF4xBjA./VlUGZszn/044q4yJvQmbma8WbtuFf6', 'admin', 1),
(2, 'Kalyan', 'kalyan', 'kalyan@yahoo.com', '$2y$10$fwvKtRqDO1vev8RT5/SwkegAHrs/bAJCcF3TGPsfvTvFVuI2cF2Dq', 'member', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fax`
--

CREATE TABLE `tbl_fax` (
  `id` int(11) NOT NULL,
  `receive_date` date NOT NULL,
  `description` text NOT NULL,
  `received_from` varchar(155) NOT NULL,
  `person_id` int(11) NOT NULL,
  `exution_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_fax`
--

INSERT INTO `tbl_fax` (`id`, `receive_date`, `description`, `received_from`, `person_id`, `exution_date`, `status`, `file`) VALUES
(3, '2018-03-31', 'This is demo purpose', 'administration', 2, '2018-04-12', 'finished', 'eb39b15b17.pdf'),
(4, '2018-03-31', 'This is for amit.', 'accounts', 3, '2018-04-11', 'not_finished', '4361dfd1ef.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fax`
--
ALTER TABLE `tbl_fax`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_fax`
--
ALTER TABLE `tbl_fax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
