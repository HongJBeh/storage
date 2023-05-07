-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 03:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cssociety`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `no` int(11) NOT NULL,
  `adminName` varchar(40) NOT NULL,
  `adminID` varchar(30) NOT NULL,
  `adminPassword` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no`, `adminName`, `adminID`, `adminPassword`) VALUES
(1, 'Lee Yi Yue', 'admin101', 'abcd1234');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventID` int(10) NOT NULL,
  `Event` varchar(191) NOT NULL,
  `Venue` varchar(191) NOT NULL,
  `Day` varchar(191) NOT NULL,
  `Time` varchar(191) NOT NULL,
  `Description` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `Event`, `Venue`, `Day`, `Time`, `Description`) VALUES
(27, 'Game Development Training Programme', 'Main Foyer', '4/6/2022 - 8/6/20222', '10.00a.m. - 6.00p.m.', '\"Love games? Why not create your own mobile game?\"\r\nPenang Youth Development Corporation (PYDC) in collaboration with TARUC Penang Branch Computer Science Society, Big Domain, and Magnus Games Studio is organizing a Game Development Training Programme for full-time secondary school and tertiary students all.\r\nThe age requirement to participate in this program is 15 to 25 years of age.\r\nJoin us in this training programme and our experienced trainer will guide you in developing your own mobile game!'),
(28, 'Web Design Competition', 'DK A', '1/5/2022 - 4/5/2022', '1.00p.m. - 5.00p.m.', 'That\'s Right! Penang Young Digital Talent under Penang Youth Development Corporation presents to you, WEB DESIGN COMPETITION 2021 with the theme \"EMPOWERING YOUNG DIGITAL TALENT\"\r\nWondering if you are eligible to take part in this competition? No Worries, Youth aged 17 to 35 who are studying FULL Time in PENANG Colleges/Universities with or without computing background are eligible to join us ‼️'),
(29, 'Software Development Practices In Industry', 'CA', '14/7/2022 - 19/7/2022', '10.30a.m. - 5.30p.m.', '👋👋𝙂𝙧𝙚𝙚𝙩𝙞𝙣𝙜𝙨 𝙖𝙡𝙡 𝙏𝘼𝙍𝙐𝘾𝙞𝙖𝙣𝙨! The Computer Science Society‍ will be organising an industrial talk titled \"👉Software Development Practices In Industry👈\" open to all of the FOCS students🤗. This talk will be about the use of software development in the industry. The speaker also will talk about the introduction to software development tools, services and methodologies used in the industry[LetMeSee][LetMeSee]. If you are interested to learn more about it, REGISTER NOW to join us[Beckon][Beckon]'),
(30, 'Responsive Web Design Workshop', 'M Block', '15/8/2022 - 17/8/2022', '9.00a.m. - 1.00p.m.', 'This workshop will bring you through a hands-on journey on developing a responsive website, meaning that the goal is to make a website as user friendly as possible across devices of various viewports. You will be introduced to the theory needed and common practices when developing a responsive website.'),
(31, 'CSS One Day Camp', 'TARUC Penang Branch Campus', '16/7/2022', '3.00p.m. - 7.00p.m.', '❗❗❗For all FOCS students especially freshmen❗❗❗\r\nGreeting to all TARUCian!!! The Computer Science Society will be organizing a ⭐CSS One Day Camp⭐. This is open to all of the FOCS students only. This event provides a great opportunity for students to develop a wide range of social skills that strengthen established relationships among FOCS students.\r\n*Soft skill point shall be provided.'),
(32, 'Web Development Training Programme', 'DK H', '31/10/2022 - 7/11/2022', '9.00a.m. - 5.00p.m.', 'The Computer Science Society in collaboration with PYDC under Penang Young Digital Talent Programme is organizing the Web Development Training Programme for all the Penang Students from Higher Learning Institutions.\r\nTo join this programme you don\'t necessarily need to be expert in coding! Join us in this training programme and we will guide you on how you can be a web developer without knowing codes! 😎'),
(33, 'Good Framework To Build Good Quality System', 'DK G', '30/7/2022', '5.00p.m. - 6.00p.m.', '𝙂𝙧𝙚𝙚𝙩𝙞𝙣𝙜𝙨 𝙖𝙡𝙡 𝙏𝘼𝙍𝙐𝘾𝙞𝙖𝙣𝙨! The Computer Science Society‍ will be organising an industrial talk titled \"Good Framework To Build Good Quality System\" open to all of the FOCS students. This talk will be about to provide a deeper understanding to students through the file structure. The speaker also will talk about the basics of database design towards student. In addition, the speaker also would like to show the importance of variables to build a good quality system. If you are interested to learn more about it, REGISTER NOW to join us!'),
(34, 'E-waste Recycling Day', 'TARUC Penang Branch Campus', '30/9/2022', '9.00a.m. - 5.00p.m.', 'Hi Everyone, CSS will having an E-Waste Recycling Day during the Home Coming Carnival on 30 March 2019.\r\nDONATE your used Electronic products / devices📱💻🖨📸 to us for Recycle.\r\nLets take the initiative to Protect🛡 the Earth🌏.\r\nSee you there 😁😁');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `No` int(100) NOT NULL,
  `StudentFirstName` char(20) NOT NULL,
  `StudentLastName` char(50) NOT NULL,
  `StudentID` varchar(10) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Address` char(100) NOT NULL,
  `State` char(15) NOT NULL,
  `Postcode` varchar(5) NOT NULL,
  `City` char(20) NOT NULL,
  `PhoneNo` char(11) NOT NULL,
  `EmergencyPhNo` char(11) NOT NULL,
  `Relationship` char(20) NOT NULL,
  `Password` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`No`, `StudentFirstName`, `StudentLastName`, `StudentID`, `Gender`, `Address`, `State`, `Postcode`, `City`, `PhoneNo`, `EmergencyPhNo`, `Relationship`, `Password`) VALUES
(1, 'Tan', 'Ah Kau', '21PMD01221', 'M', '4896, Jalan Mati, Taman Michael Jackson', 'Kedah', '08000', 'Sungai Petani', '0119451236', '044545544', 'Mother', 'tanahkau123'),
(2, 'Lim', 'Ah Lian', '21PMD03122', 'F', '1, Jalan Setia 1, Taman Aman', 'Kedah', '08000', 'Sungai Petani', '0145678976', '045552141', 'Dad', 'Limahlian123'),
(4, 'LEE', 'YUE', '21PMD07333', 'M', '196 JALAN SERULING 2 TAMAN SERULING', '1', '08000', 'SUNGAI PETANI', '0189489233', '0128897883', 'Father', '123@Lee789');

-- --------------------------------------------------------

--
-- Table structure for table `memjoin`
--

CREATE TABLE `memjoin` (
  `no` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `studentID` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `eventID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memjoin`
--

INSERT INTO `memjoin` (`no`, `name`, `studentID`, `email`, `phone`, `eventID`) VALUES
(1, 'Tan Ah Kau', '12PMD12345', 'tanAK@gmail.com', '0123789456', 27),
(2, 'Teng Siew Lan', '12PMD11234', 'tengsl@gmail.com', '0134567895', 34),
(3, 'Lim Hong Jun', '21PMD02311', 'limhj1234@gmail.com', '0124456987', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `memjoin`
--
ALTER TABLE `memjoin`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `No` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `memjoin`
--
ALTER TABLE `memjoin`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
