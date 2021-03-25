-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Dec 15, 2020 at 04:03 AM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ja624`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
`id` int(11) unsigned NOT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `college` varchar(20) DEFAULT NULL,
  `major` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `fname`, `lname`, `email`, `password`, `college`, `major`) VALUES
(1, 'Mike', 'Lee', 'mjlee@njit.edu', '1234', 'NJIT', 'CS'),
(2, 'Jane', 'Doe', 'janedoe@njit.edu', '4321', 'NJIT', 'Liberal Arts'),
(3, 'Justin', 'Agustin', 'ja624@njit.edu', 'pass1', 'NJIT', 'IT'),
(4, 'Ibrahim', 'Hamza', 'ih56@njit.edu', 'pass2', 'MSU', 'Architecture'),
(5, 'Jenna', 'Ariza', 'jla39@njit.edu', 'pass3', 'NYU', 'HCI'),
(6, 'Michelle', 'Majano', 'mm275@njit.edu', 'pass4', 'RUNB', 'Business & IS'),
(7, 'John', 'Doe', 'jd123@njit.edu', '1234', 'NJIT', 'Business'),
(22, 'J1', 'A1', 'j1a1@gmail.com', '1234', 'njit', 'none'),
(23, 'just1', 'jlkasd', 'nasd@fsadf.com', 'fasjlk', 'fasjljl', 'fajlka'),
(24, 'just1', 'jlkasd', 'nasd@fsadf.com', 'fasjlk', 'fasjljl', 'fajlka'),
(25, 'Jen', 'Hamza', 'jh123@gmail.com', '54321!', 'Columbia', 'Law'),
(26, 'Justin', 'Agustin', 'ja123@gmail.com', '1234!', 'NJIT', 'COMP E'),
(27, 'Jayjoon', 'Sin', 'js555@rutgers.edu', 'Pass!', 'Rutgers', 'Business Management'),
(28, 'Jayjoon', 'Sin', 'js555@rutgers.edu', 'Pass!', 'Rutgers', 'Business Management'),
(29, 'Jayjoon', 'Sin', 'jaysin@rutgers.edu', '1234!', 'Rutgers', 'sanflknosd'),
(30, 'Justin', 'Agustin', 'justin@agustin.com', 'Hello!', 'NJIT', 'HCI'),
(31, 'Cooper', 'The Dog', 'ctd@pup.com', '1234!', 'Doggo Uni', 'Fetch'),
(32, 'art', 'hamza', 'ih11@njit.edu', 'art!', 'njit', 'hci'),
(33, 'Jamal', 'Hamza', 'jh123@kinz.org', '1234!', 'KU', 'Car Sales');

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
`id` int(11) unsigned NOT NULL,
  `owneremail` varchar(60) DEFAULT NULL,
  `ownerid` int(11) DEFAULT NULL,
  `duedate` datetime DEFAULT NULL,
  `tasktitle` varchar(60) DEFAULT NULL,
  `message` text,
  `isdone` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `owneremail`, `ownerid`, `duedate`, `tasktitle`, `message`, `isdone`) VALUES
(1, 'janedoe@njit.edu', 2, '2017-05-03 00:00:00', NULL, 'This is test #B', 0),
(3, 'janedoe@njit.edu', 2, '2017-05-01 00:00:00', NULL, 'This is test #A', 0),
(6, 'ja624@njit.edu', 3, '0000-00-00 00:00:00', NULL, 'HELLO', 0),
(15, 'mjlee@njit.edu', 1, '2020-11-10 22:11:00', 'oyogoiho', 'lhihoi', 1),
(16, 'mjlee@njit.edu', 1, '2020-12-31 21:09:00', 'test', 'test', 1),
(18, 'mjlee@njit.edu', 1, '2020-12-31 21:11:00', 'asdasd', 'dasdad', 1),
(19, 'mjlee@njit.edu', 1, '2021-01-08 21:15:00', 'TEST', 'TEST', 1),
(20, 'mjlee@njit.edu', 1, '2020-12-12 21:51:00', 'thing ', 'whateva', 1),
(21, 'mjlee@njit.edu', 1, '2020-12-25 06:04:00', 'Coding', 'Practice Python', 1),
(22, 'jaysin@rutgers.edu', 29, '2020-12-10 11:40:00', 'asdas', 'dasdas', 0),
(23, 'jaysin@rutgers.edu', 29, '2020-12-11 11:40:00', 'asdas', 'dasdasd', 1),
(30, 'justin@agustin.com', 30, '2020-12-10 22:37:00', 'test', 'test', 0),
(32, 'jh123@kinz.org', 33, '2020-12-05 22:58:00', 'Sell a car', '2013 Honda Accord', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
