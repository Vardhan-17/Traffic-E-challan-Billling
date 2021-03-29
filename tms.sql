-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 03:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `amount` (IN `fine` INT, IN `id` INT)  NO SQL
BEGIN
SELECT (vehitype-1)*fine FROM `vehidetails` WHERE `vehiid`=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `history` (IN `id` INT(8))  NO SQL
SELECT chno,psgid,vehiid,status FROM `log` WHERE staffid=id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `logid` int(8) NOT NULL,
  `chno` int(8) NOT NULL,
  `staffid` int(8) NOT NULL,
  `psgid` int(15) NOT NULL,
  `vehiid` int(8) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`logid`, `chno`, `staffid`, `psgid`, `vehiid`, `status`) VALUES
(5, 4, 121, 12356567, 1234, 'Payment Successful'),
(10, 9, 121, 123, 1235, 'Payment Successful'),
(13, 12, 12345, 1234, 1234, 'Payment Successful'),
(15, 14, 121, 1235656, 12323123, 'Payment Successful'),
(16, 15, 121, 123456, 123509, 'Payment Successful'),
(17, 16, 121, 12378, 12457, 'Payment pending'),
(18, 17, 121, 1235659, 231321, 'Payment Successful'),
(19, 18, 121, 123, 123, 'Payment Successful'),
(20, 19, 123, 123, 123, 'Payment pending'),
(21, 20, 121, 1234, 1234, 'Payment Successful'),
(22, 21, 121, 1230, 1230, 'Payment Successful'),
(23, 22, 121, 1234, 121, 'Payment Successful'),
(24, 23, 121, 12341, 1231, 'Payment pending'),
(25, 24, 121, 12340, 12230, 'Payment pending'),
(26, 25, 121, 121, 2311, 'Payment pending'),
(27, 26, 121, 1239, 321, 'Payment pending'),
(28, 27, 9483, 12450, 2123, 'Payment Successful');

-- --------------------------------------------------------

--
-- Table structure for table `psgdetails`
--

CREATE TABLE `psgdetails` (
  `psgid` int(8) NOT NULL,
  `psgname` varchar(20) NOT NULL,
  `psggender` varchar(15) NOT NULL,
  `psgage` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psgdetails`
--

INSERT INTO `psgdetails` (`psgid`, `psgname`, `psggender`, `psgage`) VALUES
(121, 'fh xax', 'Male', 21),
(123, 'vishnu vardhan', 'Male', 98),
(1239, 'vishnu vardhan', 'Male', 56),
(12340, 'vishnu vardhan', 'Male', 23),
(12341, 'vishnu vardhan', 'Male', 21);

--
-- Triggers `psgdetails`
--
DELIMITER $$
CREATE TRIGGER `delete_vehidetails` AFTER DELETE ON `psgdetails` FOR EACH ROW DELETE FROM `vehidetails` WHERE `vehidetails`.`psgid` =old.psgid
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_viodetails` AFTER DELETE ON `psgdetails` FOR EACH ROW DELETE FROM `viodetails` WHERE `viodetails`.`psgid` =old.psgid
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log-2` AFTER DELETE ON `psgdetails` FOR EACH ROW UPDATE `log` SET `status` = 'Payment Successful' WHERE `log`.`psgid` = old.psgid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(8) NOT NULL,
  `staffname` varchar(20) NOT NULL,
  `staffdesg` varchar(30) NOT NULL,
  `staffpsw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `staffname`, `staffdesg`, `staffpsw`) VALUES
(121, 'Vishnu', 'SubInspector', '$2y$10$hZHgs0S9fX8DSyv3rIIDP.vS.PBbRBz1HJ.gpn7rHm88pwsHj0z7u'),
(122, 'vardhan', 'Inspector', '$2y$10$8kOPDb8fEUAPc5T1Ud5YQu3H6WBRHeCXYBp3XO8ewJ6E5HdBEBF8u'),
(123, 'vishnu', 'SubInspector', '$2y$10$03jV8SSggyaQbsMsVMw4zuQTZKKACoMhvKL4TJPfwQKw78WJWyzgC'),
(9483, 'PavanShetty', 'Inspector', '$2y$10$/9X406hMsSzppCKglEnIJOUWJuiUF9GydH4wqSem5rbl.REL/KBoW');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(8) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `upsw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `upsw`) VALUES
(123, 'vishnu', '$2y$10$CF2ln701muSyneMyFI3/desf4wpTYfMr9uMlG9Cp3qRr.sptER2PG'),
(1230, 'Khizar', '$2y$10$9rslhYn0z4fAqeNlyT.m6.z7zTz01yPdZDsp8B69M5LObdKUsnQBS'),
(1234, 'vishnu', '$2y$10$/QjmliG/8Zq4eGaFzAbv2edVe/Y8uPLtNtfZZdMObl7IMnwDQtjk.'),
(12340, 'vardhan', '$2y$10$yq9z.dlP8RwCTJChBsZrxuGZBEfQ3gSbiOeztJtYrPEMuANrajIIS'),
(12450, 'Vishnu', '$2y$10$1/kehGeAeIGE6THFBx66Qu01ImxZevI2w55KWE7AOLmlb2ztrLg8S');

-- --------------------------------------------------------

--
-- Table structure for table `vehidetails`
--

CREATE TABLE `vehidetails` (
  `psgid` int(8) NOT NULL,
  `vehiid` int(15) NOT NULL,
  `vehitype` varchar(15) NOT NULL,
  `vehicolour` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehidetails`
--

INSERT INTO `vehidetails` (`psgid`, `vehiid`, `vehitype`, `vehicolour`) VALUES
(123, 123, '4', 'Red'),
(1239, 321, '4', 'blue'),
(12341, 1231, '4', 'blue'),
(121, 2311, '4', 'blue'),
(12340, 12230, '4', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `viodetails`
--

CREATE TABLE `viodetails` (
  `staffid` int(8) NOT NULL,
  `psgid` int(8) NOT NULL,
  `vehiid` int(8) NOT NULL,
  `chno` int(15) NOT NULL,
  `violations` varchar(255) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viodetails`
--

INSERT INTO `viodetails` (`staffid`, `psgid`, `vehiid`, `chno`, `violations`, `date`) VALUES
(123, 123, 123, 19, 'No Helemet\nNo parking\nTriple seat\nRacing\n', '2021-01-07 08:30:46'),
(121, 12341, 1231, 23, 'No Helemet\nNo parking\nNo License\n', '2021-01-07 11:19:20'),
(121, 12340, 12230, 24, 'No Helemet\nRules of road violation\nTriple seat\n', '2021-01-07 11:38:21'),
(121, 121, 2311, 25, 'No License\nTriple seat\nRacing\n', '2021-01-07 11:49:51'),
(121, 1239, 321, 26, 'No parking\nNo License\nTriple seat\n', '2021-01-08 08:00:08');

--
-- Triggers `viodetails`
--
DELIMITER $$
CREATE TRIGGER `log_1` AFTER INSERT ON `viodetails` FOR EACH ROW INSERT INTO `log` (`logid`, `chno`,`staffid`, `psgid`,  `vehiid`,`status`) VALUES (NULL, new.chno,new.staffid, new.psgid,new.vehiid, 'Payment pending')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `psgdetails`
--
ALTER TABLE `psgdetails`
  ADD PRIMARY KEY (`psgid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `vehidetails`
--
ALTER TABLE `vehidetails`
  ADD PRIMARY KEY (`vehiid`);

--
-- Indexes for table `viodetails`
--
ALTER TABLE `viodetails`
  ADD PRIMARY KEY (`chno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `logid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `psgdetails`
--
ALTER TABLE `psgdetails`
  MODIFY `psgid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12356568;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT for table `vehidetails`
--
ALTER TABLE `vehidetails`
  MODIFY `vehiid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12323124;

--
-- AUTO_INCREMENT for table `viodetails`
--
ALTER TABLE `viodetails`
  MODIFY `chno` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
