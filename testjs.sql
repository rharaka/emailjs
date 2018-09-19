-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2018 at 10:19 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testjs`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocking`
--

CREATE TABLE `blocking` (
  `id` int(11) NOT NULL,
  `idBlocking` int(11) NOT NULL,
  `idBlocked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `fid`, `tid`, `message`) VALUES
(1, 1, 30, 'salam adam!');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passw` text NOT NULL,
  `intro` text NOT NULL,
  `picture` varchar(250) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `valid` tinyint(1) NOT NULL DEFAULT '0',
  `logged` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `nom`, `email`, `passw`, `intro`, `picture`, `role`, `valid`, `logged`) VALUES
(1, 'Rachid', 'rachid@email.com', 'bbcb9ebd8626a30b0c6d0aab2f6048a4', 'Im a webdeveloper and i love coding!', 'rachid.jpg', 7, 1, 0),
(30, 'Adam', 'adam@email.com', 'bbcb9ebd8626a30b0c6d0aab2f6048a4', 'hfkjqd fgdlkqsjg glfsj', 'adam.jpg', 1, 1, 0),
(54, 'Mehdi', 'mehdi@email.com', 'bbcb9ebd8626a30b0c6d0aab2f6048a4', 'jkjfq fkjqs fkqs fkjsq!', 'mehdi.jpg', 1, 1, 0),
(55, 'Nabil', 'nabil@mail.com', 'bbcb9ebd8626a30b0c6d0aab2f6048a4', 'ljlfqd fqlj fqlj', 'Nabil.jpg', 1, 0, 0),
(56, 'Khalid', 'khalid@email.com', 'bbcb9ebd8626a30b0c6d0aab2f6048a4', 'mgsgl gs gdsl gsd', 'Khalid.jpg', 1, 0, 0),
(57, 'Said', 'said@email.com', 'bbcb9ebd8626a30b0c6d0aab2f6048a4', 'klklkgsd gfjhg gskjdf', 'Said.jpg', 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocking`
--
ALTER TABLE `blocking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocking`
--
ALTER TABLE `blocking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
