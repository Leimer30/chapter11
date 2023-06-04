-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 06:13 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `may_mid`
--

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE IF NOT EXISTS `storage` (
`store_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `file_type` varchar(20) NOT NULL,
  `date_uploaded` varchar(100) NOT NULL,
  `stud_no` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`store_id`, `filename`, `file_type`, `date_uploaded`, `stud_no`) VALUES
(3, 'WWW.YTS.AG.jpg', 'image/jpeg', '2019-01-30, 12:27 AM', 14523),
(4, 'WWW.YTS.AG.jpg', 'image/jpeg', '2019-01-30, 12:34 AM', 14531),
(5, 'sample-front-passport.png', 'image/png', '2019-01-31, 11:53 PM', 1353),
(6, 'db_sfms.sql', 'application/octet-st', '2020-12-16, 01:05 PM', 1353),
(8, 'beach-exotic-holiday-248797.jpg', 'image/jpeg', '2020-12-16, 01:13 PM', 2019),
(9, 'simp.png', 'image/png', '2020-12-16, 10:20 PM', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`stud_id` int(11) NOT NULL,
  `stud_no` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `course` varchar(250) NOT NULL,
  `yr&sec` varchar(5) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gmath` int(250) NOT NULL,
  `gsci` int(250) NOT NULL,
  `gfil` int(250) NOT NULL,
  `ghis` int(250) NOT NULL,
  `geng` int(250) NOT NULL,
  `gpe` int(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_no`, `firstname`, `lastname`, `gender`, `age`, `address`, `course`, `yr&sec`, `password`, `gmath`, `gsci`, `gfil`, `ghis`, `geng`, `gpe`) VALUES
(25, 2030, 'Rodi', 'Duterte', 'Male', 12, 'Julita', 'BSIT', '1A', '2d579dc29360d8bbfbb4aa541de5afa9', 1, 2, 3, 4, 5, 6),
(26, 2040, 'MatMat', 'Teston', 'Male', 4, 'Brgy. Del Pilar, Dulag, Leyte', 'BSIT', '3B', '4c144c47ecba6f8318128703ca9e2601', 1, 2, 3, 4, 5, 6),
(27, 2222, 'Ian Carl', 'Teston', 'Male', 20, 'Brgy. Rizal, Dulag, Leyte', 'BSIT', '3B', '934b535800b1cba8f96a5d72f72f1611', 1, 2, 3, 4, 5, 6),
(28, 2020, 'meloy', 'banate', 'Male', 22, 'mayorga', 'bsit', '3B', '42b3b87a1bef38b89caf642a3f0b6e32', 100, 100, 100, 100, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `password`, `status`) VALUES
(1, 'Admin/Teacher', ' ', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
(2, 'Ian', 'Teston', 'ian', 'a71a448d3d8474653e831749b8e71fcc', 'Instructor/Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
 ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
