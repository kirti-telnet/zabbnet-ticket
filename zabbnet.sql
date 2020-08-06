-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 03:06 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zabbnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE `login_master` (
  `log_id` int(11) NOT NULL,
  `company_email` varchar(40) NOT NULL,
  `empolyee_id` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `update_date` date NOT NULL,
  `update_time` time NOT NULL,
  `logout_date` date NOT NULL,
  `logout_tiem` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `register_id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `company_email` varchar(254) DEFAULT NULL,
  `company_phno` varchar(18) NOT NULL,
  `country` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `password` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`register_id`, `company_name`, `company_email`, `company_phno`, `country`, `state`, `city`, `password`) VALUES
(1, 'kirti', 'kirti@gmail.com', '+919999999999', 'India', 'gujarat', 'ahmedabad', 'Kirti@123'),
(2, 'abc', 'abc@gmail.com', '+919898989780', 'india', 'gujarat', 'surat', 'Abc@1234'),
(21, 'madhav', 'madhav@gmail.com', '+917984645311', 'india', 'Goa', 'Goa', 'Madhav@1234'),
(27, 'bhargav', 'bhargav@gmail.com', '+917600879404', 'india', 'gujarat', 'Gandhinagar', 'Brdave@123'),
(16, 'xyz', 'xyz@gmail.com', '+919797979890', 'India', 'gujarat', 'bhavanagar', 'xYz@1234'),
(25, 'hiren', 'hiren123@gmail.com ', '+917600879414', 'india', 'Rajasthan', 'jaipur', 'Hiren@123'),
(28, 'kirti Telnet Pvt  Ltd', 'bhargav@kirti.co.in', '+919998201495', 'india', 'Gujarat', 'Ahmedabad', '0910#Kspl'),
(19, 'manas', 'manas@gmail.com', '+919913502502', 'india', 'Rajasthan', 'Udeypur', 'Manas@1234'),
(30, 'kirti', 'arjun@gmail.com', '7600879414', 'india', 'Gujarat', 'Ahmedabad', 'Mhv@1234'),
(32, 'kirti', 'sani@gmail.com', '+917600879414', 'india', 'Gujarat', 'Ahmedabad', 'Sani@123'),
(33, 'vrushank', 'vrushank796@gmail.com', '9737001953', 'india', 'gujarat', 'surat', 'Vrushank1920'),
(38, 'mrugesh', 'mrugesh@gmail.com', '7600879404', 'india', 'gujarat', 'ahmedabad', 'xYz@1234'),
(39, 'kirti', 'vishalbhai@gmail.com', '9510147448', 'india', 'Gujarat', 'Ahmedabad', 'Vishal@123');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(2) NOT NULL,
  `role_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Moderator'),
(2, 'Administrator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL,
  `company_email` varchar(40) NOT NULL,
  `employee_id` varchar(20) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `company_email`, `employee_id`, `role_id`, `user_name`, `user_email`, `user_password`) VALUES
(5, 'xyz@gmail.com', 'KTPL01ITMPS', 2, 'Mrugesh Shukla', 'mrugeshshukla124@gmail.com', 'Mrugesh@1234'),
(6, 'xyz@gmail.com', 'dd', 2, 'sdasd', 'dd@gmail.com', 'Dave@1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_master`
--
ALTER TABLE `login_master`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`register_id`),
  ADD UNIQUE KEY `company_email` (`company_email`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_master`
--
ALTER TABLE `login_master`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
