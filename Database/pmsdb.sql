-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 09:32 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_tbl`
--

CREATE TABLE `appointment_tbl` (
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `docFees` int(5) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `userStatus` int(5) NOT NULL,
  `doctorStatus` int(5) NOT NULL,
  `immunization_day` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_tbl`
--

INSERT INTO `appointment_tbl` (`pid`, `ID`, `fname`, `lname`, `gender`, `email`, `contact`, `doctor`, `docFees`, `appdate`, `apptime`, `userStatus`, `doctorStatus`, `immunization_day`) VALUES
(18, 1, 'mercy', 'mercy', '', 'mercy@gmail.com', '0798827450', 'maya', 0, '2021-12-18', '08:00:00', 1, 1, NULL),
(18, 2, 'mercy', 'mercy', '', 'mercy@gmail.com', '0798827450', 'pennihan', 0, '2021-12-18', '12:00:00', 1, 1, NULL),
(1, 3, 'Patient ', 'One', '', 'patientone@gmail.com', '0798827450', 'Midwife one', 0, '2022-01-01', '08:00:00', 1, 1, NULL),
(1, 4, 'Patient ', 'One', '', 'sue@gmail.com', '0798827450', 'Sue', 0, '2022-01-03', '08:00:00', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_tbl`
--

CREATE TABLE `blog_tbl` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_tbl`
--

INSERT INTO `blog_tbl` (`id`, `title`, `body`, `category`) VALUES
(1, 'The Impact Of Fiction In Our Evolution', 'Scientific data proves that people who read more fiction are more likely to be fast learners and have high adaptability to real-life situations.\r\n\r\nCommunication, usage of tools, and various other actions that were believed to differentiate between humans', 'Birth'),
(2, 'two', '6 weeks', 'Six Weeks'),
(3, 'three', '10 weeks', 'Ten Weeks'),
(5, 'five', '6 months', 'Six Months');

-- --------------------------------------------------------

--
-- Table structure for table `chatroommember_tbl`
--

CREATE TABLE `chatroommember_tbl` (
  `chat_memberid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chatroommsg_tbl`
--

CREATE TABLE `chatroommsg_tbl` (
  `chatid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `chat_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatroommsg_tbl`
--

INSERT INTO `chatroommsg_tbl` (`chatid`, `userid`, `chatroomid`, `message`, `chat_date`) VALUES
(1, 2, 5, 'kmkj', '0000-00-00 00:00:00'),
(2, 2, 7, 'admin here', '0000-00-00 00:00:00'),
(3, 2, 7, 'admin here', '0000-00-00 00:00:00'),
(4, 7, 7, 'hi there', '0000-00-00 00:00:00'),
(5, 7, 7, 'hi there', '0000-00-00 00:00:00'),
(6, 2, 1, 'Hello every body', '0000-00-00 00:00:00'),
(7, 2, 1, 'Hello every body', '0000-00-00 00:00:00'),
(8, 2, 2, 'Hi ', '0000-00-00 00:00:00'),
(9, 2, 2, 'How is every one', '0000-00-00 00:00:00'),
(10, 2, 2, 'How is every one', '0000-00-00 00:00:00'),
(11, 2, 3, 'Okay', '0000-00-00 00:00:00'),
(12, 2, 3, 'Okay', '0000-00-00 00:00:00'),
(13, 10, 1, 'Hello everyone', '0000-00-00 00:00:00'),
(14, 10, 1, 'Hello everyone', '0000-00-00 00:00:00'),
(15, 10, 1, 'I am new Here', '0000-00-00 00:00:00'),
(16, 10, 1, 'I am new Here', '0000-00-00 00:00:00'),
(17, 11, 6, 'Hello everyone', '0000-00-00 00:00:00'),
(18, 11, 6, 'Hello everyone', '0000-00-00 00:00:00'),
(19, 11, 6, 'I am new Here', '0000-00-00 00:00:00'),
(20, 11, 6, 'I am new Here', '0000-00-00 00:00:00'),
(21, 11, 1, 'Hi every one I am faith', '0000-00-00 00:00:00'),
(22, 11, 1, 'Hi every one I am faith', '0000-00-00 00:00:00'),
(23, 16, 1, 'Hello there', '0000-00-00 00:00:00'),
(24, 0, 8, 'hi', '0000-00-00 00:00:00'),
(25, 0, 8, 'hi', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chatroomname_tbl`
--

CREATE TABLE `chatroomname_tbl` (
  `chatroomid` int(11) NOT NULL,
  `chat_name` varchar(60) NOT NULL,
  `date_created` datetime NOT NULL,
  `chat_password` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatroomname_tbl`
--

INSERT INTO `chatroomname_tbl` (`chatroomid`, `chat_name`, `date_created`, `chat_password`, `userid`) VALUES
(1, 'At Birth chatroom', '2021-12-15 16:27:41', '123', 1),
(2, 'Six Week Chatroom', '2021-12-15 16:28:14', '123', 1),
(3, 'Ten Weeks', '2021-12-15 16:28:32', '123', 1),
(4, 'Fourteen Weeks', '2021-12-15 16:29:03', '123', 1),
(5, 'Six Months', '2021-12-15 16:29:18', '123', 1),
(6, 'Nine Months', '2021-12-15 16:29:31', '123', 1),
(8, 'new chatroom', '2021-12-17 21:07:09', '444', 1),
(9, 'Jan chatroom', '2021-12-31 11:50:36', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactmsg_tbl`
--

CREATE TABLE `contactmsg_tbl` (
  `name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `contact` varchar(10) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `immunization_tbl`
--

CREATE TABLE `immunization_tbl` (
  `id` int(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `antigen` varchar(255) NOT NULL,
  `disease_prevented` varchar(255) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `immunization_tbl`
--

INSERT INTO `immunization_tbl` (`id`, `age`, `antigen`, `disease_prevented`, `date`) VALUES
(1, 'Birth', 'BCG, Oral Polio Vaccine, Hepatitis B', 'Tuberculosis,Polio, Hepatitis B', NULL),
(2, 'Six Weeks', 'DPT,HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine,\r\nRotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneuomonia, Rotavirus', NULL),
(4, 'Ten Weeks', 'DPT, HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine, Rotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneumonia, Rotavirus', NULL),
(5, 'Fourteen Weeks', 'DPT, HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine, \r\nRotavirus', 'Diptheria, Pertussis, tetanus, Haemophilus Influenza – Type B, \r\nHepatitis B, Polio, Pneumonia, Rotavirus', NULL),
(6, 'Six Months', 'Vitamin A', 'Vitamin A Deficiency', NULL),
(7, 'Nine Months', 'Measles, Yellow Fever', 'Measles,Yellow Fever', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messageinbox_tbl`
--

CREATE TABLE `messageinbox_tbl` (
  `sender` varchar(200) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messageinbox_tbl`
--

INSERT INTO `messageinbox_tbl` (`sender`, `receiver`, `msg`, `timestamp`) VALUES
('suzz', 'maya', 'Hello maya\r\nI am feeling this and that.\r\nWhat will you recommend', '2021-12-15 17:38:06'),
('faith', 'maya', 'Hello maya', '2021-12-16 02:07:12'),
('maya', 'faith', 'Hello too faith', '2021-12-16 03:50:23'),
('maya', 'suzz', 'Hello too suzz', '2021-12-16 03:50:33'),
('ann', 'maya', 'Hello Maya', '2021-12-16 04:04:49'),
('ann', 'Easther', 'Hello easther', '2021-12-16 04:04:58'),
('ann', 'maria', 'Hello Maria', '2021-12-16 04:05:10'),
('hilda', 'maya', 'Hello maya', '2021-12-16 04:22:44'),
('hilda', 'Easther', 'Hello easther', '2021-12-16 04:22:56'),
('hilda', 'maria', 'Hello Maria', '2021-12-16 04:23:08'),
('maria', 'hilda', 'Hello too hilder', '2021-12-16 04:25:55'),
('maria', 'ann', 'Hello too ann', '2021-12-16 04:26:04'),
('jane', 'amina', 'Helo ', '2021-12-16 07:44:37'),
('amina', 'jane', 'he there', '2021-12-16 07:45:03'),
('mercy', 'pennihan', 'Hello pennihah', '2021-12-18 04:02:35'),
('pennihan', 'mercy', 'Hello too mercy', '2021-12-18 04:03:22'),
('mercy', 'pennihan', 'Hello pennihah', '2021-12-18 04:03:29'),
('Patient ', 'Sue', 'Hello', '2021-12-31 08:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `midwife_tbl`
--

CREATE TABLE `midwife_tbl` (
  `midwife_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `docFees` bigint(10) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `docContact` bigint(20) NOT NULL,
  `docAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `midwife_tbl`
--

INSERT INTO `midwife_tbl` (`midwife_id`, `username`, `gender`, `password`, `email`, `spec`, `docFees`, `lat`, `lng`, `docContact`, `docAddress`) VALUES
(1, 'maya', '', 'maya123', 'maya@gmail.com', '', 0, 0, 0, 788899996, ''),
(3, 'Easther', '', 'easther123', 'easther@gmail.com', '', 0, 0, 0, 798827450, ''),
(9, 'maria', '', 'maria123', 'maria@gmail.com', '', 0, 0, 0, 5555555555, ''),
(10, 'amina', '', '123', 'amina@gmail.com', '', 0, 0, 0, 798827450, ''),
(11, 'pennihan', '', '123', 'penninah17@gmail.com', '', 0, 0, 0, 798827450, ''),
(12, 'Midwife one', '', '123', 'midwifeone@gmail.com', '', 0, 0, 0, 798827450, ''),
(13, 'Sue', '', '123', 'sue@gmail.com', '', 0, 0, 0, 798827450, '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_tbl`
--

CREATE TABLE `patient_tbl` (
  `pid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `patAddress` varchar(100) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `child_birth` date DEFAULT NULL,
  `WISH_YEAR` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_tbl`
--

INSERT INTO `patient_tbl` (`pid`, `fname`, `lname`, `gender`, `email`, `contact`, `password`, `cpassword`, `lat`, `lng`, `patAddress`, `date`, `child_birth`, `WISH_YEAR`) VALUES
(1, 'Patient ', 'One', '', 'patientone@gmail.com', '0798827450', '123', '123', 0, 0, '', '2021-12-31', '2000-09-12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prescription_tbl`
--

CREATE TABLE `prescription_tbl` (
  `prescription_id` int(255) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `disease` varchar(250) NOT NULL,
  `allergy` varchar(250) NOT NULL,
  `prescription` varchar(1000) NOT NULL,
  `age` varchar(255) NOT NULL,
  `antigen` varchar(255) NOT NULL,
  `disease_prevented` varchar(255) NOT NULL,
  `next_visit_date` date DEFAULT NULL,
  `reminder` varchar(50) DEFAULT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_tbl`
--

INSERT INTO `prescription_tbl` (`prescription_id`, `doctor`, `pid`, `ID`, `fname`, `lname`, `appdate`, `apptime`, `disease`, `allergy`, `prescription`, `age`, `antigen`, `disease_prevented`, `next_visit_date`, `reminder`, `status`) VALUES
(1, 'maya', 7, 1, 'kelly', 'kelly', '2021-12-17', '10:00:00', '', '', '', 'Six Weeks', 'DPT,HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine,\r\nRotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneuomonia, Rotavirus', '2021-12-17', NULL, 1),
(2, 'maya', 2, 2, 'Paula', 'Paula', '2021-12-17', '12:00:00', '', '', '', 'Six Weeks', 'BCG, Oral Polio Vaccine, Hepatitis B', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneuomonia, Rotavirus', '2021-12-17', NULL, 0),
(3, 'maya', 7, 1, 'kelly', 'kelly', '2021-12-17', '10:00:00', '', '', '', 'Six Weeks', 'BCG, Oral Polio Vaccine, Hepatitis B', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneuomonia, Rotavirus', '2021-12-17', NULL, 0),
(4, 'maya', 10, 4, 'suzz', 'suzz', '2021-12-20', '16:00:00', '', '', '', 'Six Weeks', 'DPT,HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine,\r\nRotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneuomonia, Rotavirus', '2021-12-20', NULL, 1),
(5, 'maya', 11, 5, 'faith', 'faith', '2021-12-16', '10:00:00', '', '', '', 'Six Weeks', 'DPT,HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine,\r\nRotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneuomonia, Rotavirus', '2021-12-16', NULL, 0),
(6, 'maya', 3, 6, 'pauline', 'pauline', '2021-12-21', '12:00:00', '', '', '', 'Fourteen Weeks', 'DPT,HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine,\r\nRotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneumonia, Rotavirus', '2021-12-21', NULL, 1),
(7, 'maya', 1, 7, 'patracia', 'patracia', '2021-12-23', '12:00:00', '', '', '', 'Birth', 'DPT, HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine, Rotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneumonia, Rotavirus', '2021-12-23', NULL, 1),
(8, 'maria', 12, 8, 'ann', 'ann', '2021-12-17', '08:00:00', '', '', '', 'Birth', 'BCG, Oral Polio Vaccine, Hepatitis B', 'Tuberculosis,Polio, Hepatitis B', '2021-12-17', NULL, 1),
(9, 'maria', 13, 10, 'hilda', 'hilda', '2021-12-17', '12:00:00', '', '', '', 'Birth', 'BCG, Oral Polio Vaccine, Hepatitis B', 'Tuberculosis,Polio, Hepatitis B', '2021-12-17', NULL, 1),
(10, 'maria', 13, 11, 'hilda', 'hilda', '2021-12-21', '12:00:00', '', '', '', 'Six Weeks', 'DPT,HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine,\r\nRotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneuomonia, Rotavirus', '2021-12-21', NULL, 0),
(11, 'maria', 14, 12, 'jeniffer', 'jeniffer', '2021-12-17', '16:00:00', '', '', '', 'Birth', 'BCG, Oral Polio Vaccine, Hepatitis B', 'Tuberculosis,Polio, Hepatitis B', '2021-12-17', NULL, 0),
(12, 'maria', 15, 13, 'purie', 'purie', '2021-12-18', '12:00:00', '', '', '', 'Six Weeks', 'DPT,HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine,\r\nRotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneuomonia, Rotavirus', '2021-12-18', NULL, 1),
(13, 'maria', 15, 14, 'purie', 'purie', '2021-12-29', '12:00:00', '', '', '', 'Ten Weeks', 'DPT, HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine, Rotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneumonia, Rotavirus', '2021-12-29', NULL, 0),
(14, 'amina', 16, 15, 'jane', 'Doe', '2021-12-17', '08:00:00', '', '', '', 'Birth', 'BCG, Oral Polio Vaccine, Hepatitis B', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneuomonia, Rotavirus', '2021-12-17', NULL, 0),
(15, 'pennihan', 18, 2, 'mercy', 'mercy', '2021-12-18', '12:00:00', '', '', '', 'Birth', 'DPT,HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine,\r\nRotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneuomonia, Rotavirus', '2021-12-18', NULL, 0),
(16, 'Sue', 1, 4, 'Patient ', 'One', '2022-01-03', '08:00:00', '', '', '', 'Birth', 'DPT,HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine,\r\nRotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneuomonia, Rotavirus', '2022-01-03', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blog_tbl`
--
ALTER TABLE `blog_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatroommsg_tbl`
--
ALTER TABLE `chatroommsg_tbl`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `chatroomname_tbl`
--
ALTER TABLE `chatroomname_tbl`
  ADD PRIMARY KEY (`chatroomid`);

--
-- Indexes for table `midwife_tbl`
--
ALTER TABLE `midwife_tbl`
  ADD PRIMARY KEY (`midwife_id`);

--
-- Indexes for table `patient_tbl`
--
ALTER TABLE `patient_tbl`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `prescription_tbl`
--
ALTER TABLE `prescription_tbl`
  ADD PRIMARY KEY (`prescription_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_tbl`
--
ALTER TABLE `blog_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chatroommsg_tbl`
--
ALTER TABLE `chatroommsg_tbl`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `chatroomname_tbl`
--
ALTER TABLE `chatroomname_tbl`
  MODIFY `chatroomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `midwife_tbl`
--
ALTER TABLE `midwife_tbl`
  MODIFY `midwife_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patient_tbl`
--
ALTER TABLE `patient_tbl`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prescription_tbl`
--
ALTER TABLE `prescription_tbl`
  MODIFY `prescription_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
