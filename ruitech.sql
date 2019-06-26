-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2019 at 09:53 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruitech`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` varchar(70) NOT NULL,
  `course_name` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`) VALUES
('JOURNALISM', 'JOURNALISM'),
('LLB', 'LLB'),
('IR', 'IR'),
('EDUCATION', 'EDUCATION'),
('BBA', 'BBA'),
('ETHICAL HACKING', 'ETHICAL HACKING'),
('DBIT', 'DBIT'),
('DCS', 'DCS'),
('DIT', 'DIT'),
('DBA', 'DBA');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `course` varchar(50) DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `interest` varchar(50) DEFAULT NULL,
  `picture` blob,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `username`, `email`, `gender`, `phone`, `password`, `course`, `specialization`, `interest`, `picture`) VALUES
(3, 'Owdenpk', 'owden.kimaro@riarauniversity.ac.ke', 'Male', '254790921553', '0c14cefec9476562948d928ef34b7e5bc72c4a13', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

DROP TABLE IF EXISTS `sex`;
CREATE TABLE IF NOT EXISTS `sex` (
  `sex_id` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  PRIMARY KEY (`sex_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`sex_id`, `gender`) VALUES
('Male', 'Male'),
('Female', 'Female'),
('Transgender', 'Transgender'),
('Others', 'Others');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
