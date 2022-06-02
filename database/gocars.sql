-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 09:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gocars`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookd`
--

CREATE TABLE `bookd` (
  `bookno` int(4) NOT NULL,
  `username` varchar(32) NOT NULL,
  `fromdt` date NOT NULL,
  `till` date NOT NULL,
  `pick` varchar(64) NOT NULL,
  `drop-add` varchar(64) NOT NULL,
  `car-model` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookd`
--

INSERT INTO `bookd` (`bookno`, `username`, `fromdt`, `till`, `pick`, `drop-add`, `car-model`) VALUES
(25, 'jeet1', '2021-05-30', '2021-06-05', 'Mumbai Cental West', 'Dada East', 'verna'),
(26, 'jeet1', '2021-05-30', '2021-05-31', 'Bandra West', 'Bandra West', 'creta'),
(28, 'user1', '2021-05-30', '2021-05-31', 'Mumbai ', 'Mumbai', 'creta'),
(29, 'jeet1', '2021-05-31', '2021-06-01', 'Add 1', 'Add2', 'swift'),
(30, 'jeet1', '2021-05-31', '2021-06-01', 'Add23', 'lsjdfl', 'verna'),
(31, 'jeet1', '2021-05-31', '2021-06-01', 'dsaf', 'sdfsda', 'creta'),
(32, 'jeet1', '2021-05-18', '2021-05-31', 'dfasdf', 'dsrasdfg', 'verna'),
(33, 'jeet1', '2021-05-31', '2021-06-01', 'fdsfs', 'farwef', 'creta'),
(34, 'jeet1', '2021-05-24', '2021-06-05', 'fdsaf', 'rasfsaf', 'swift'),
(37, 'sample1', '2021-05-31', '2021-06-02', 'Bandra ', 'Dadar', 'verna'),
(38, 'sample1', '2021-06-01', '2021-06-05', 'Vasai', 'Virar dlfj', 'verna');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sno` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` int(10) NOT NULL,
  `License` int(10) NOT NULL,
  `name` varchar(34) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sno`, `username`, `password`, `phone`, `License`, `name`, `dt`) VALUES
(1, 'jeet1', 'jeet123', 1234567890, 1821345620, 'Jeet Rane', '2021-05-21 09:03:28'),
(11, 'jeet2', 'jeet2', 1234567890, 1821345621, 'Jeet 2', '2021-05-23 18:53:05'),
(13, 's1', 's1', 2873237, 23872439, 'S1', '2021-05-24 11:50:52'),
(18, 'user1', 'user1', 1234567890, 1234567890, 'User1 Example', '2021-05-29 22:33:42'),
(21, 'sample1', 'sample1', 1234567890, 2147483647, 'Sample 1 Test', '2021-05-31 01:05:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookd`
--
ALTER TABLE `bookd`
  ADD PRIMARY KEY (`bookno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `License` (`License`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookd`
--
ALTER TABLE `bookd`
  MODIFY `bookno` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
