-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 03:21 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tournament_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `Match_ID` int(11) NOT NULL,
  `Tournament_ID` int(11) DEFAULT NULL,
  `Team1_ID` int(11) DEFAULT NULL,
  `Team2_ID` int(11) DEFAULT NULL,
  `Scheduled_Date` datetime DEFAULT NULL,
  `Map_Played_On` varchar(255) DEFAULT NULL,
  `Winner_Team_ID` int(11) DEFAULT NULL,
  `Loser_Team_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `Team_ID` int(11) NOT NULL,
  `Team_Name` varchar(255) DEFAULT NULL,
  `Captain_name` varchar(20) DEFAULT NULL,
  `tournamentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`Team_ID`, `Team_Name`, `Captain_name`, `tournamentid`) VALUES
(2, '0', '', 2),
(3, '0', '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `Tournament_ID` int(11) NOT NULL,
  `Tournament_Name` varchar(255) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL,
  `organizer` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`Tournament_ID`, `Tournament_Name`, `Start_Date`, `End_Date`, `organizer`) VALUES
(2, 'adcczc', '2024-02-11', '2024-02-21', 'aczx'),
(3, 'Dev clash', '2024-02-11', '2024-02-17', 'DYPCOE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`Match_ID`),
  ADD KEY `FK_Tournament_Match` (`Tournament_ID`),
  ADD KEY `FK_Team1_Match` (`Team1_ID`),
  ADD KEY `FK_Team2_Match` (`Team2_ID`),
  ADD KEY `FK_Winner_Match` (`Winner_Team_ID`),
  ADD KEY `FK_Loser_Match` (`Loser_Team_ID`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`Team_ID`),
  ADD KEY `Captain_ID` (`Captain_name`),
  ADD KEY `tournamet_id` (`tournamentid`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`Tournament_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `Match_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `Team_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `Tournament_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `FK_Loser_Match` FOREIGN KEY (`Loser_Team_ID`) REFERENCES `teams` (`Team_ID`),
  ADD CONSTRAINT `FK_Team1_Match` FOREIGN KEY (`Team1_ID`) REFERENCES `teams` (`Team_ID`),
  ADD CONSTRAINT `FK_Team2_Match` FOREIGN KEY (`Team2_ID`) REFERENCES `teams` (`Team_ID`),
  ADD CONSTRAINT `FK_Tournament_Match` FOREIGN KEY (`Tournament_ID`) REFERENCES `tournaments` (`Tournament_ID`),
  ADD CONSTRAINT `FK_Winner_Match` FOREIGN KEY (`Winner_Team_ID`) REFERENCES `teams` (`Team_ID`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `tournamet_id` FOREIGN KEY (`tournamentid`) REFERENCES `tournaments` (`Tournament_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
