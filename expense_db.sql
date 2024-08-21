-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 12:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_table`
--

CREATE TABLE `bank_table` (
  `bank_id` int(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_table`
--

INSERT INTO `bank_table` (`bank_id`, `bank_name`) VALUES
(1, 'Federal Bank'),
(3, 'ICICI Bank'),
(5, 'Bank Of Baroda Bank'),
(6, 'Axis Bank'),
(7, 'Bank Of India Bank'),
(8, 'State bank of india'),
(11, 'HDFC Bank');

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `cat_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`cat_id`, `cat_name`) VALUES
(6, 'Travel'),
(7, 'Petrol/Gas'),
(8, 'Milk'),
(9, 'hotel'),
(10, 'Fruits'),
(11, 'income'),
(12, 'Food & Dining'),
(13, 'Entertainment'),
(14, 'Education'),
(15, 'Stationary');

-- --------------------------------------------------------

--
-- Table structure for table `exp_records`
--

CREATE TABLE `exp_records` (
  `exp_id_auto` int(255) NOT NULL,
  `exp_id_user` int(255) NOT NULL,
  `expname` varchar(255) NOT NULL,
  `exptype` varchar(255) NOT NULL,
  `expamount` int(255) NOT NULL,
  `expdate` date NOT NULL,
  `expcategory` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exp_records`
--

INSERT INTO `exp_records` (`exp_id_auto`, `exp_id_user`, `expname`, `exptype`, `expamount`, `expdate`, `expcategory`, `bank`) VALUES
(7, 7, 'Salary', 'Credit', 25000, '2023-04-01', 'Travel', 'State bank of india'),
(8, 7, 'petrol', 'Debit', 250, '2023-04-02', 'Petrol/Gas', 'State bank of india'),
(9, 7, 'mangoes', 'Debit', 500, '2023-04-10', 'Fruits', 'ICICI Bank'),
(11, 7, 'hotel', 'Debit', 1250, '2023-04-17', 'hotel', 'ICICI Bank'),
(12, 8, 'Salary', 'Credit', 30000, '2023-04-01', 'income', 'Federal Bank'),
(13, 8, 'car gas', 'Debit', 1100, '2023-04-03', 'Petrol/Gas', 'Axis Bank'),
(14, 8, 'Travel', 'Debit', 205, '2023-04-05', 'Travel', 'Federal Bank'),
(15, 8, 'mangoes', 'Debit', 880, '2023-04-10', 'Fruits', 'Axis Bank'),
(16, 0, 'Salary', 'Credit', 25000, '2023-04-01', 'income', 'Federal Bank');

-- --------------------------------------------------------

--
-- Table structure for table `exp_users`
--

CREATE TABLE `exp_users` (
  `exp_usr_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exp_users`
--

INSERT INTO `exp_users` (`exp_usr_id`, `username`, `email`, `mobile`, `password`) VALUES
(7, 'mitesh01', 'mitesh01@gmail.com', '9898815479', '$2y$10$Gx5StgzSjDREjY2WSdGKgeaT0lNWj.YYnImJxLcTQSyasGMfiVORu'),
(8, 'jay01', 'jay01@gmail.com', '8140080120', '$2y$10$y7we1bu0VuezxXxd.sydM.EEG8VFe.Wjxc.iE4qm0Cg7ZEOR8UrTG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(31, 'admin01', 'admin01@gmail.com', '$2y$10$9M6ndn/8oTYPmJeo5yTunO63vJxjdjUgTJAPJTMPzMmKDl5QRRkCS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_table`
--
ALTER TABLE `bank_table`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `exp_records`
--
ALTER TABLE `exp_records`
  ADD PRIMARY KEY (`exp_id_auto`);

--
-- Indexes for table `exp_users`
--
ALTER TABLE `exp_users`
  ADD PRIMARY KEY (`exp_usr_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_table`
--
ALTER TABLE `bank_table`
  MODIFY `bank_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `exp_records`
--
ALTER TABLE `exp_records`
  MODIFY `exp_id_auto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `exp_users`
--
ALTER TABLE `exp_users`
  MODIFY `exp_usr_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
