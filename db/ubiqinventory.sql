-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2016 at 12:38 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ubiqinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
`accountid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `accountname` varchar(250) NOT NULL,
  `accountdescription` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `badgeinv`
--

CREATE TABLE IF NOT EXISTS `badgeinv` (
`badgeinvid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  `badgeserial` varchar(250) NOT NULL,
  `badgestatusid` int(11) NOT NULL,
  `dateupdated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `badgeinv`
--

INSERT INTO `badgeinv` (`badgeinvid`, `userid`, `dateadded`, `badgeserial`, `badgestatusid`, `dateupdated`) VALUES
(21, 1, '2016-07-22 06:16:59', '13644', 4, '2016-07-22 06:17:03'),
(22, 1, '2016-07-22 06:17:17', '13644', 4, '2016-07-22 06:38:47'),
(24, 1, '2016-07-22 06:38:57', '13644', 1, '2016-08-05 15:52:50'),
(25, 1, '2016-07-22 06:38:57', '47706', 1, '2016-08-05 15:53:13'),
(26, 1, '2016-07-22 07:29:20', '123456', 1, '2016-08-05 15:53:16'),
(27, 1, '2016-07-22 07:29:20', '61123', 1, '2016-08-05 15:53:23'),
(28, 1, '2016-07-22 07:29:20', '23452345', 2, '2016-08-05 15:53:20'),
(29, 1, '2016-07-22 07:29:20', '1134554568', 1, '2016-08-05 15:53:25'),
(30, 1, '2016-08-05 15:52:46', 'F102312983', 1, '2016-08-05 15:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `badgestatus`
--

CREATE TABLE IF NOT EXISTS `badgestatus` (
`badgestatusid` int(11) NOT NULL,
  `badgestatusname` varchar(250) NOT NULL,
  `badgestatusdesc` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `badgestatus`
--

INSERT INTO `badgestatus` (`badgestatusid`, `badgestatusname`, `badgestatusdesc`) VALUES
(1, 'Available', 'If badge access is currently not in use'),
(2, 'Active', 'if badge access is being used by agent'),
(3, 'Lost', 'if the agent lost the badge'),
(4, 'Deleted', 'if the badge access have been deleted from system'),
(5, 'Disabled', 'if the badge access have been disabled temporarily');

-- --------------------------------------------------------

--
-- Table structure for table `headsetsinv`
--

CREATE TABLE IF NOT EXISTS `headsetsinv` (
`headsetid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  `headsetserial` varchar(250) NOT NULL,
  `headsetstatusid` int(11) NOT NULL,
  `dateupdated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `headsetsinv`
--

INSERT INTO `headsetsinv` (`headsetid`, `userid`, `dateadded`, `headsetserial`, `headsetstatusid`, `dateupdated`) VALUES
(1, 1, '2016-08-05 16:17:50', '12357', 1, '2016-08-05 16:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `headsetstatus`
--

CREATE TABLE IF NOT EXISTS `headsetstatus` (
`headsetstatusid` int(11) NOT NULL,
  `headsetstatusvalue` varchar(250) NOT NULL,
  `headsetstatusdescription` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `headsetstatus`
--

INSERT INTO `headsetstatus` (`headsetstatusid`, `headsetstatusvalue`, `headsetstatusdescription`) VALUES
(1, 'Available', 'if the headset is currently available'),
(2, 'Active', 'if the headset is being used by the agent'),
(3, 'Lost', 'if the agent lost the headset');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE IF NOT EXISTS `userprofile` (
`profileid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`profileid`, `userid`, `accountid`, `firstname`, `middlename`, `lastname`) VALUES
(1, 1, 0, 'Richard', 'Lucanas', 'Real');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`) VALUES
(1, 'richard.real', 'Nemodark09!!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
 ADD PRIMARY KEY (`accountid`), ADD KEY `userid` (`userid`);

--
-- Indexes for table `badgeinv`
--
ALTER TABLE `badgeinv`
 ADD PRIMARY KEY (`badgeinvid`), ADD KEY `userid` (`userid`), ADD KEY `badgestatusid` (`badgestatusid`);

--
-- Indexes for table `badgestatus`
--
ALTER TABLE `badgestatus`
 ADD PRIMARY KEY (`badgestatusid`);

--
-- Indexes for table `headsetsinv`
--
ALTER TABLE `headsetsinv`
 ADD PRIMARY KEY (`headsetid`), ADD KEY `userid` (`userid`), ADD KEY `headsetstatusid` (`headsetstatusid`);

--
-- Indexes for table `headsetstatus`
--
ALTER TABLE `headsetstatus`
 ADD PRIMARY KEY (`headsetstatusid`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
 ADD PRIMARY KEY (`profileid`), ADD KEY `userid` (`userid`), ADD KEY `accountid` (`accountid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
MODIFY `accountid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `badgeinv`
--
ALTER TABLE `badgeinv`
MODIFY `badgeinvid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `badgestatus`
--
ALTER TABLE `badgestatus`
MODIFY `badgestatusid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `headsetsinv`
--
ALTER TABLE `headsetsinv`
MODIFY `headsetid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `headsetstatus`
--
ALTER TABLE `headsetstatus`
MODIFY `headsetstatusid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
MODIFY `profileid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `badgeinv`
--
ALTER TABLE `badgeinv`
ADD CONSTRAINT `badgeinv_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
ADD CONSTRAINT `badgeinv_ibfk_2` FOREIGN KEY (`badgestatusid`) REFERENCES `badgestatus` (`badgestatusid`);

--
-- Constraints for table `headsetsinv`
--
ALTER TABLE `headsetsinv`
ADD CONSTRAINT `headsetsinv_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
ADD CONSTRAINT `headsetsinv_ibfk_2` FOREIGN KEY (`headsetstatusid`) REFERENCES `headsetstatus` (`headsetstatusid`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
ADD CONSTRAINT `userprofile_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
