-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2023 at 01:54 PM
-- Server version: 8.0.27
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lpggas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `regid` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `consumer` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `bookingdate` date NOT NULL,
  `quantity` tinyint NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'not delivered',
  `deliverdate` date DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `handlingcharge` varchar(50) DEFAULT NULL,
  `amount` varchar(100) NOT NULL,
  `cardtype` varchar(100) NOT NULL DEFAULT 'Not Known',
  `paystatus` varchar(100) DEFAULT 'PENDING',
  `paydate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `regid`, `name`, `username`, `consumer`, `mob`, `address`, `bookingdate`, `quantity`, `status`, `deliverdate`, `price`, `handlingcharge`, `amount`, `cardtype`, `paystatus`, `paydate`) VALUES
(1, 1, 'test', 'test', '123456', '9858254854', 'Test address', '2023-05-29', 1, 'delivered', '2023-05-29', '1110', '25', '1135', 'UPI', 'paid', '2023-05-29'),
(2, 1, 'test', 'test', '123456', '9858254854', 'Test address', '2023-05-29', 1, 'delivered', '2023-05-29', '1110', '25', '1135', 'Not Available', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `id` int NOT NULL,
  `regid` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `consumer` varchar(30) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `proof` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'not approved',
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`id`, `regid`, `name`, `username`, `consumer`, `adress`, `mob`, `proof`, `status`, `date`) VALUES
(1, 1, 'test', 'test', '123456', 'Test address', '9858254854', 'DSC_1346.JPG', 'approved', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `sub` varchar(200) NOT NULL,
  `msg` varchar(250) NOT NULL,
  `reply` varchar(250) DEFAULT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issuer`
--

CREATE TABLE `issuer` (
  `id` int NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuer`
--

INSERT INTO `issuer` (`id`, `email`, `password`) VALUES
(1, 'issue', 'issue');

-- --------------------------------------------------------

--
-- Table structure for table `lpg`
--

CREATE TABLE `lpg` (
  `id` int NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `subsidy` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpg`
--

INSERT INTO `lpg` (`id`, `date`, `price`, `subsidy`) VALUES
(1, '29-May-2023', '1110', '25');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `mob` varchar(10) NOT NULL,
  `consumer` varchar(25) NOT NULL,
  `adress` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int NOT NULL,
  `message` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `username`, `mob`, `consumer`, `adress`, `photo`, `password`, `status`, `message`, `date`) VALUES
(1, 'test', 'test', '9858254854', '123456', 'Test address', 'DSC_1422.JPG', '$2y$10$aMteYevHA1LIsAaowfHZa.eJbB3xZC60o2vKeu9T1NXLHMBJatmoe', 1, NULL, '2023-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int NOT NULL,
  `message` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `message`) VALUES
(1, 'Gas will be issued on Wednesday and Saturday ');

-- --------------------------------------------------------

--
-- Table structure for table `sectionone`
--

CREATE TABLE `sectionone` (
  `id` int NOT NULL,
  `issuedby` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `receivedby` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `issuedate` date DEFAULT NULL,
  `quantity` tinyint NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectionone`
--

INSERT INTO `sectionone` (`id`, `issuedby`, `receivedby`, `issuedate`, `quantity`) VALUES
(1, 'Sunil', 'Sunil', '2023-05-29', 20),
(2, 's', 's', '2023-05-29', 10),
(3, 'd', 'd', '2023-05-29', 2),
(4, 'check one', 'check one', '2023-05-29', 12),
(5, 'test', 'test', '2023-05-29', 12);

-- --------------------------------------------------------

--
-- Table structure for table `sectiontwo`
--

CREATE TABLE `sectiontwo` (
  `id` int NOT NULL,
  `issuedby` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `receivedby` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `issuedate` date NOT NULL,
  `quantity` tinyint NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectiontwo`
--

INSERT INTO `sectiontwo` (`id`, `issuedby`, `receivedby`, `issuedate`, `quantity`) VALUES
(1, 'praveen', 'praveen', '2023-05-29', 15),
(2, 'k', 'k', '2023-05-29', 15),
(3, 'check two ', 'check two', '2023-05-29', 23),
(4, 'test two', 'test two', '2023-05-29', 12);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `stock` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `date`, `stock`) VALUES
(1, '29-May-2023', '200'),
(2, '29-May-2023', '200'),
(3, '2023-05-29', '180'),
(4, '2023-05-29', '165'),
(5, '2023-05-29', '155'),
(6, '2023-05-29', '140'),
(7, '2023-05-29', '138'),
(8, '29-May-2023', '137'),
(9, '2023-05-29', '125'),
(10, '2023-05-29', '102'),
(11, '2023-05-29', '90'),
(12, '2023-05-29', '78'),
(13, '29-May-2023', '77');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuer`
--
ALTER TABLE `issuer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lpg`
--
ALTER TABLE `lpg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectionone`
--
ALTER TABLE `sectionone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectiontwo`
--
ALTER TABLE `sectiontwo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `connection`
--
ALTER TABLE `connection`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issuer`
--
ALTER TABLE `issuer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lpg`
--
ALTER TABLE `lpg`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sectionone`
--
ALTER TABLE `sectionone`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sectiontwo`
--
ALTER TABLE `sectiontwo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
