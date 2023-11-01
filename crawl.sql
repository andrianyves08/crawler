-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 09:15 AM
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
-- Database: `crawl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crawl`
--

CREATE TABLE `tbl_crawl` (
  `id` int(255) NOT NULL,
  `crawl` longtext NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` mediumint(5) NOT NULL,
  `user_role_id` mediumint(5) DEFAULT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email_address` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `firstname` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lastname` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `activated` tinyint(1) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `varkey` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `property_level_account` tinyint(1) DEFAULT NULL COMMENT '1 = Yes / 0 = No'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_role_id`, `password`, `email_address`, `firstname`, `lastname`, `activated`, `date_updated`, `date_created`, `varkey`, `property_level_account`) VALUES
(4, 1, 'PU4ctMlJ5MhzfVIo6MbYXhu+Bewi9H5cQL7cSqq2+3ZDN/dm', 'admin', 'admin', 'Systems', 1, '2013-02-16 09:18:43', '2013-02-16 09:18:43', 'h2h11v0R0UCh', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_crawl`
--
ALTER TABLE `tbl_crawl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_crawl`
--
ALTER TABLE `tbl_crawl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` mediumint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
