-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 08:27 AM
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
  `doctorStatus` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_tbl`
--

INSERT INTO `appointment_tbl` (`pid`, `ID`, `fname`, `lname`, `gender`, `email`, `contact`, `doctor`, `docFees`, `appdate`, `apptime`, `userStatus`, `doctorStatus`) VALUES
(4, 1, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 550, '2020-02-14', '10:00:00', 1, 0),
(4, 2, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 700, '2020-02-28', '10:00:00', 0, 1),
(4, 3, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Amit', 1000, '2020-02-19', '03:00:00', 0, 1),
(11, 4, 'Shraddha', 'Kapoor', 'Female', 'shraddha@gmail.com', '9768946252', 'ashok', 500, '2020-02-29', '20:00:00', 1, 1),
(4, 5, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 700, '2020-02-28', '12:00:00', 1, 1),
(4, 6, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 550, '2020-02-26', '15:00:00', 0, 1),
(2, 8, 'Alia', 'Bhatt', 'Female', 'alia@gmail.com', '8976897689', 'Ganesh', 550, '2020-03-21', '10:00:00', 1, 1),
(5, 9, 'Gautam', 'Shankararam', 'Male', 'gautam@gmail.com', '9070897653', 'Ganesh', 550, '2020-03-19', '20:00:00', 1, 0),
(4, 10, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 550, '0000-00-00', '14:00:00', 1, 0),
(4, 11, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 700, '2020-03-27', '15:00:00', 1, 1),
(9, 12, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'Kumar', 800, '2020-03-26', '12:00:00', 1, 1),
(9, 13, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'Tiwary', 450, '2020-03-26', '14:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chatroomMsg_tbl`
--

CREATE TABLE `chatroomMsg_tbl` (
  `chatid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `chat_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chatroomMsg_tbl` (`chatid`, `userid`, `chatroomid`, `message`, `chat_date`) VALUES
(1, 3, 2, 'How are you doing', '0000-00-00 00:00:00'),
(2, 3, 2, 'KJNJKJBBN', '0000-00-00 00:00:00'),
(3, 3, 2, 'rtg', '0000-00-00 00:00:00'),
(4, 1, 2, 'Hello People', '2017-10-02 17:15:26'),
(5, 1, 2, 'Hello People', '2017-10-02 17:15:29'),
(6, 4, 2, 'Hello admin', '2017-10-02 17:17:16'),
(7, 1, 1, 'Warning', '2017-10-02 17:18:33'),
(8, 4, 1, 'I know', '2017-10-02 17:19:04'),
(28, 2, 1, 'kjnhb', '0000-00-00 00:00:00'),
(29, 2, 2, 'sdfgb', '0000-00-00 00:00:00'),
(30, 2, 2, 'How are you doing', '0000-00-00 00:00:00'),
(31, 2, 2, 'qwsd', '0000-00-00 00:00:00'),
(54, 7, 1, 'hh', '0000-00-00 00:00:00'),
(55, 7, 5, 'Five', '0000-00-00 00:00:00'),
(56, 7, 4, 'four', '0000-00-00 00:00:00'),
(57, 7, 2, 'Two', '0000-00-00 00:00:00'),
(58, 7, 1, 'One', '0000-00-00 00:00:00'),
(59, 7, 1, 'One', '0000-00-00 00:00:00'),
(60, 4, 5, 'ijjn', '0000-00-00 00:00:00'),
(61, 4, 5, '', '0000-00-00 00:00:00'),
(62, 4, 18, 'kjhgcv', '0000-00-00 00:00:00'),
(63, 4, 18, '', '0000-00-00 00:00:00'),
(64, 0, 18, 'ijooin', '0000-00-00 00:00:00'),
(65, 0, 18, '', '0000-00-00 00:00:00'),
(66, 4, 18, 'kim', '0000-00-00 00:00:00'),
(67, 4, 18, '', '0000-00-00 00:00:00'),
(68, 0, 18, 'dsfgn', '0000-00-00 00:00:00'),
(69, 0, 18, 'fgh', '0000-00-00 00:00:00'),
(70, 4, 18, 'Morning everyone', '0000-00-00 00:00:00'),
(71, 4, 18, '', '0000-00-00 00:00:00'),
(72, 4, 18, 'Ihope you woke up well', '0000-00-00 00:00:00'),
(73, 4, 18, '', '0000-00-00 00:00:00'),
(74, 4, 18, 'How are you doing', '0000-00-00 00:00:00'),
(75, 4, 18, 'How are you doing', '0000-00-00 00:00:00'),
(76, 4, 18, 'All right', '0000-00-00 00:00:00'),
(77, 4, 18, 'All right', '0000-00-00 00:00:00'),
(78, 4, 16, 'knjbhjn', '0000-00-00 00:00:00'),
(79, 4, 16, 'knjbhjn', '0000-00-00 00:00:00'),
(80, 4, 16, 'Hi there', '0000-00-00 00:00:00'),
(81, 4, 16, 'Hi there', '0000-00-00 00:00:00'),
(82, 4, 16, '4t v', '0000-00-00 00:00:00'),
(83, 4, 16, '4t v', '0000-00-00 00:00:00'),
(84, 4, 16, '4t v', '0000-00-00 00:00:00'),
(85, 4, 16, '4t v', '0000-00-00 00:00:00'),
(86, 4, 16, '4t v', '0000-00-00 00:00:00'),
(87, 4, 16, 'How are you doing', '0000-00-00 00:00:00'),
(88, 4, 16, 'How are you doing', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chatroomName_tbl`
--

CREATE TABLE `chatroomName_tbl` (
  `chatroomid` int(11) NOT NULL,
  `chat_name` varchar(60) NOT NULL,
  `date_created` datetime NOT NULL,
  `chat_password` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroomName_tbl` (`chatroomid`, `chat_name`, `date_created`, `chat_password`, `userid`) VALUES
(1, 'Chatroom Password', '2017-09-11 13:20:18', 'leeann', 2),
(2, 'Free EntranceE', '2017-09-11 13:20:51', '123', 4),
(4, 'new', '2021-10-09 12:35:21', '123', 3),
(5, 'qee', '2021-10-22 12:22:33', '123', 1),
(6, 'mikechatroom', '2021-11-07 08:12:38', '123', 6),
(8, 'mikechatr', '2021-11-07 08:21:25', '1112', 6),
(9, 'mikechatr', '2021-11-07 08:23:54', '1112', 6),
(10, 'nepok', '2021-11-07 08:24:11', '1112', 6),
(11, 'nepok', '2021-11-07 08:25:55', '1112', 1),
(12, 'mikechatroomded', '2021-11-07 08:26:12', '444', 1),
(13, 'ddff', '2021-11-07 08:26:51', '1112', 1),
(14, 'ddff', '2021-11-07 08:28:22', '1112', 1),
(15, 'ddff', '2021-11-07 08:29:05', '1112', 1),
(16, 'ddff', '2021-11-07 08:29:31', '1112', 1),
(17, 'ddff', '2021-11-07 08:29:58', '1112', 1),
(18, 'ddff', '2021-11-07 08:35:39', '1112', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chatroomMembet_tbl`
--

CREATE TABLE `chatroomMember_tbl` (
  `chat_memberid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatroomMember_tbl`
--

INSERT INTO `chatroomMember_tbl` (`chat_memberid`, `chatroomid`, `userid`) VALUES
(1, 2, 2),
(2, 2, 2),
(6, 2, 5),
(7, 1, 5),
(8, 4, 4),
(9, 4, 4),
(10, 5, 1),
(11, 0, 6),
(12, 9, 6),
(13, 10, 6),
(14, 11, 1),
(15, 12, 1),
(16, 13, 1),
(17, 14, 1),
(18, 15, 1),
(19, 16, 1),
(20, 17, 1),
(21, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `childInfo_tbl`
--

CREATE TABLE `childInfo_tbl` (
  `child_id` int(11) NOT NULL,
  `mother_id` int(11) NOT NULL,
  `child_fname` varchar(255) NOT NULL,
  `child_lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `childInfo_tbl`
--

INSERT INTO `childInfo_tbl` (`child_id`, `mother_id`, `child_fname`, `child_lname`, `gender`, `date_of_birth`) VALUES
(1, 7, 'kelly', 'dakii', 'female', '2021-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `contactMsg_tbl`
--

CREATE TABLE `contactMsg_tbl` (
  `name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `contact` varchar(10) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactMsg_tbl`
--

INSERT INTO `contactMsg_tbl` (`name`, `email`, `contact`, `message`) VALUES
('Anu', 'anu@gmail.com', '7896677554', 'Hey Admin'),
(' Viki', 'viki@gmail.com', '9899778865', 'Good Job, Pal'),
('Ananya', 'ananya@gmail.com', '9997888879', 'How can I reach you?'),
('Aakash', 'aakash@gmail.com', '8788979967', 'Love your site'),
('Mani', 'mani@gmail.com', '8977768978', 'Want some coffee?'),
('Karthick', 'karthi@gmail.com', '9898989898', 'Good service'),
('Abbis', 'abbis@gmail.com', '8979776868', 'Love your service'),
('Asiq', 'asiq@gmail.com', '9087897564', 'Love your service. Thank you!'),
('Jane', 'jane@gmail.com', '7869869757', 'I love your service!');

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
-- Table structure for table `immunization_tbl`
--

CREATE TABLE `immunization_tbl` (
  `id` int(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `antigen` varchar(255) NOT NULL,
  `disease_prevented` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `immunization_tbl`
--

INSERT INTO `immunization_tbl` (`id`, `age`, `antigen`, `disease_prevented`) VALUES
(1, 'Birth', 'BCG, Oral Polio Vaccine, Hepatitis B', 'Tuberculosis,Polio, Hepatitis B'),
(2, 'Six Weeks', 'DPT,HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine,\r\nRotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneuomonia, Rotavirus'),
(4, 'Ten Weeks', 'DPT, HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine, Rotavirus', 'Diptheria, Pertussis, Tetanus, Haemophilus Influenza – Type B,\r\nHepatitis B, Polio, Pneumonia, Rotavirus'),
(5, 'Fourteen Weeks', 'DPT, HIB, Hepatitis B, Oral Polio Vaccine, Pneumococcal Vaccine, \r\nRotavirus', 'Diptheria, Pertussis, tetanus, Haemophilus Influenza – Type B, \r\nHepatitis B, Polio, Pneumonia, Rotavirus'),
(6, 'Six Months', 'Vitamin A', 'Vitamin A Deficiency'),
(7, 'Nine Months', 'Measles, Yellow Fever', 'Measles,Yellow Fever');

-- --------------------------------------------------------

--
-- Table structure for table `messageInbox_tbl`
--

CREATE TABLE `messageInbox_tbl` (
  `sender` varchar(200) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messageInbox_tbl`
--

INSERT INTO `messageInbox_tbl` (`sender`, `receiver`, `msg`, `timestamp`) VALUES
('Kishan Lal', 'Ganesh', 'niaje', '2021-10-24 07:16:04'),
('Kishan Lal', 'Dinesh', 'sasa', '2021-10-24 07:16:07'),
('Kishan Lal', 'arun', 'hello', '2021-10-24 07:16:10'),
('Kishan Lal', 'ashok', 'hi', '2021-10-24 07:16:13'),
('Kishan Lal', 'Dinesh', 'Hello friend', '2021-10-24 08:14:31'),
('Kishan Lal', 'Dinesh', 'Okay', '2021-10-24 08:16:08'),
('Kishan Lal', 'Dinesh', 'Please work this time round', '2021-10-24 08:26:03'),
('Kishan Lal', 'Dinesh', 'Please work this time round', '2021-10-24 08:27:23'),
('Kishan Lal', 'Dinesh', 'Please work this time round', '2021-10-24 08:28:01'),
('Kishan', 'Dinesh', 'work please!', '2021-10-24 08:29:37'),
('Kishan', 'Dinesh', 'Thanks for working', '2021-10-24 08:30:33'),
('Nancy', 'Dinesh', 'Hello doc', '2021-10-24 08:39:25'),
('Nancy', 'Dinesh', 'test2', '2021-10-24 08:41:31'),
('', '', 'ssss', '2021-10-24 08:59:51'),
('', '', 'oooo', '2021-10-24 09:01:20'),
('', '', 'dddd', '2021-10-24 09:01:57'),
('', '', ' vfe', '2021-10-24 09:02:34'),
('', '', ' vfe', '2021-10-24 09:02:46'),
('', '', 'vfe', '2021-10-24 09:02:50'),
('Kishan', 'ashok', 'fff', '2021-10-24 09:21:29'),
('Kishan', 'Kumar', 'edfv', '2021-10-24 09:22:07'),
('', 'Nancy', 'tututut', '2021-10-24 09:33:16'),
('', 'Nancy', 'tututut', '2021-10-24 09:33:28'),
('', 'Nancy', 'gtgtgtg', '2021-10-24 09:33:33'),
('Dinesh', 'Nancy', 'gtgtgtg', '2021-10-24 09:35:06'),
('Dinesh', 'Nancy', 'vghvghbvgh', '2021-10-24 09:35:12'),
('Dinesh', 'Nancy', 'vghvghbvgh', '2021-10-24 09:35:37'),
('Dinesh', 'Nancy', 'vghvghbvgh', '2021-10-24 09:35:54'),
('Dinesh', 'Nancy', 'fwedvc', '2021-10-24 09:35:58'),
('', '', 'kimkm', '2021-10-24 10:21:39'),
('', 'Dinesh', 'edfv', '2021-10-24 10:22:45'),
('', 'Dinesh', 'edfv dweds', '2021-10-24 10:26:28'),
('Nancy', 'Dinesh', 'edfv dweds', '2021-10-24 10:27:20'),
('Nancy', 'Dinesh', 'gfvb kmkmk kmk,', '2021-10-24 10:27:27'),
('Nancy', 'Dinesh', 'Nancy here', '2021-10-24 10:27:55'),
('Nancy', 'Ganesh', 'Hello  ganesh', '2021-10-24 10:28:49'),
('Ganesh', 'Nancy', 'Hi too nancy', '2021-10-24 10:29:43'),
('Kishan', 'ashok', 'Friday Morninng ', '2021-11-12 03:06:43'),
('Kishan', 'Dinesh', 'hello doc dinesh. Ho are you doing this evening', '2021-11-13 04:44:00'),
('Dinesh', 'Kishan', 'I Am doing  fine kishan how can I hel you?', '2021-11-13 04:45:04'),
('Kishan', 'Dinesh', 'When is my next appointment doc??', '2021-11-13 04:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `midwife_tbl`
--

CREATE TABLE `midwife_tbl` (
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

INSERT INTO `midwife_tbl` (`username`, `gender`, `password`, `email`, `spec`, `docFees`, `lat`, `lng`, `docContact`, `docAddress`) VALUES
('ashok', 'Male', 'ashok123', 'ashok@gmail.com', 'General', 500, 15.5645, 120.423, 9123456789, 'Manila'),
('arun', 'Male', 'arun123', 'arun@gmail.com', 'Cardiologist', 600, 13.9833, 120.857, 8123456789, 'Tondo'),
('Dinesh', 'Male', 'dinesh123', 'dinesh@gmail.com', 'General', 700, 14.6012, 121.011, 2882223223, 'Zambales'),
('Ganesh', 'Male', 'ganesh123', 'ganesh@gmail.com', 'Pediatrician', 550, 14.3601, 120.961, 7123456789, 'Clark'),
('Kumar', 'Male', 'kumar123', 'kumar@gmail.com', 'Pediatrician', 800, 14.9323, 120.107, 19123456789, 'Pampanga'),
('Amit', 'Female', 'amit123', 'amit@gmail.com', 'Cardiologist', 1000, 14.0516, 121.514, 39123456789, 'Clark City'),
('Abbis', 'Female', 'abbis123', 'abbis@gmail.com', 'Neurologist', 1500, 14.6249, 120.541, 19123456789, 'Clark Avenue'),
('Tiwary', 'Female', 'tiwary123', 'tiwary@gmail.com', 'Pediatrician', 450, 13.135, 123.668, 33123456789, 'Clark New York');

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
  `patAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_tbl`
--

INSERT INTO `patient_tbl` (`pid`, `fname`, `lname`, `gender`, `email`, `contact`, `password`, `cpassword`, `lat`, `lng`, `patAddress`) VALUES
(1, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'ram123', 'ram123', 14.0008, 120.857, 'Germany'),
(2, 'Alia', 'Bhatt', 'Female', 'alia@gmail.com', '8976897689', 'alia123', 'alia123', 14.0886, 121.148, 'Germany'),
(3, 'Shahrukh', 'khan', 'Male', 'shahrukh@gmail.com', '8976898463', 'shahrukh123', 'shahrukh123', 14.232, 120.769, 'Germany'),
(4, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'kishan123', 'kishan123', 14.2872, 120.978, 'Germany'),
(5, 'Gautam', 'Shankararam', 'Male', 'gautam@gmail.com', '9070897653', 'gautam123', 'gautam123', 14.0831, 121.651, 'Germany'),
(6, 'Sushant', 'Singh', 'Male', 'sushant@gmail.com', '9059986865', 'sushant123', 'sushant123', 14.4668, 120.543, 'Germany'),
(7, 'Nancy', 'Deborah', 'Female', 'nancy@gmail.com', '9128972454', 'nancy123', 'nancy123', 14.7659, 121.013, 'Germany'),
(8, 'Kenny', 'Sebastian', 'Male', 'kenny@gmail.com', '9809879868', 'kenny123', 'kenny123', 14.5173, 121.252, 'Germany'),
(9, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'william123', 'william123', 14.8513, 120.361, 'Germany'),
(10, 'Peter', 'Norvig', 'Male', 'peter@gmail.com', '9609362815', 'peter123', 'peter123', 14.0333, 120.889, 'Germany'),
(11, 'Shraddha', 'Kapoor', 'Female', 'shraddha@gmail.com', '9768946252', 'shraddha123', 'shraddha123', 15.4185, 120.579, 'Germany');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_tbl`
--

CREATE TABLE `prescription_tbl` (
  `doctor` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `disease` varchar(250) NOT NULL,
  `allergy` varchar(250) NOT NULL,
  `prescription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_tbl`
--

INSERT INTO `prescription_tbl` (`doctor`, `pid`, `ID`, `fname`, `lname`, `appdate`, `apptime`, `disease`, `allergy`, `prescription`) VALUES
('Dinesh', 4, 11, 'Kishan', 'Lal', '2020-03-27', '15:00:00', 'Cough', 'Nothing', 'Just take a teaspoon of Benadryl every night'),
('Ganesh', 2, 8, 'Alia', 'Bhatt', '2020-03-21', '10:00:00', 'Severe Fever', 'Nothing', 'Take bed rest'),
('Kumar', 9, 12, 'William', 'Blake', '2020-03-26', '12:00:00', 'Sever fever', 'nothing', 'Paracetamol -> 1 every morning and night'),
('Tiwary', 9, 13, 'William', 'Blake', '2020-03-26', '14:00:00', 'Cough', 'Skin dryness', 'Intake fruits with more water content');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`chatroomid`);

--
-- Indexes for table `chat_member`
--
ALTER TABLE `chat_member`
  ADD PRIMARY KEY (`chat_memberid`);

--
-- Indexes for table `child_tbl`
--
ALTER TABLE `child_tbl`
  ADD PRIMARY KEY (`child_id`);

--
-- Indexes for table `contenttb`
--
ALTER TABLE `contenttb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `immunizationtb`
--
ALTER TABLE `immunizationtb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_tbl`
--
ALTER TABLE `patient_tbl`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `chatroomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chat_member`
--
ALTER TABLE `chat_member`
  MODIFY `chat_memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `child_tbl`
--
ALTER TABLE `child_tbl`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contenttb`
--
ALTER TABLE `contenttb`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `immunizationtb`
--
ALTER TABLE `immunizationtb`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient_tbl`
--
ALTER TABLE `patient_tbl`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
