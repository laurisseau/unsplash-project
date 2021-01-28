-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 12:03 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addpro`
--

CREATE TABLE `tbl_addpro` (
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_addpro`
--

INSERT INTO `tbl_addpro` (`productid`, `productname`, `catid`, `proid`, `body`, `price`, `image`, `type`) VALUES
(82, 'Cooking', 29, 12, 'black women cooking in her kitchen', 25.00, 'uploads/d1d45f994e.jpg', 1),
(83, 'Family Eating', 29, 12, 'Black family in there house eating together. ', 25.00, 'uploads/b064b858fc.jpg', 1),
(84, 'Healthy food', 28, 12, 'healthy food ', 25.00, 'uploads/774c4aa0db.jpg', 1),
(86, 'flashy heart', 26, 12, 'a sparkling heart', 45.00, 'uploads/064b90850c.jpg', 1),
(87, 'man Standing', 29, 12, 'a man standing with a building behind him.', 35.00, 'uploads/2ea3fd4953.jpg', 0),
(88, 'mother and son', 29, 12, 'a mother and son standing about to cook.', 50.00, 'uploads/6602f069a8.jpg', 1),
(89, 'chilling', 29, 12, 'a man and women drinking coffee and watching tv.', 25.00, 'uploads/2aba6bd368.jpg', 1),
(90, 'man and dog', 29, 12, 'a dogs head sitting on a mans lap.', 15.00, 'uploads/cbf2c5f299.jpg', 1),
(91, 'photoshoot', 29, 12, 'a women leaning on a mans back for a photoshoot.', 75.00, 'uploads/2ca6d0d0ad.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `adminuser` varchar(225) NOT NULL,
  `adminpass` varchar(225) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `adminuser`, `adminpass`, `email`) VALUES
(1, 'lo', 'reso', '202cb962ac59075b964b07152d234b70', 'reso0208@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartid` int(11) NOT NULL,
  `sid` int(225) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(225) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

CREATE TABLE `tbl_cat` (
  `catid` int(11) NOT NULL,
  `catname` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`catid`, `catname`) VALUES
(26, 'Valentines Day'),
(27, 'At Home Exercise'),
(28, 'Healthy Eating'),
(29, 'Life At Home');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `username`, `name`, `email`, `pass`) VALUES
(3, 'laurisseau', 'lo', 'reso0208@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pro`
--

CREATE TABLE `tbl_pro` (
  `proid` int(11) NOT NULL,
  `proname` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pro`
--

INSERT INTO `tbl_pro` (`proid`, `proname`) VALUES
(12, 'Photos'),
(13, 'Videos'),
(14, 'Music');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addpro`
--
ALTER TABLE `tbl_addpro`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pro`
--
ALTER TABLE `tbl_pro`
  ADD PRIMARY KEY (`proid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_addpro`
--
ALTER TABLE `tbl_addpro`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pro`
--
ALTER TABLE `tbl_pro`
  MODIFY `proid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
