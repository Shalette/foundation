-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2018 at 06:27 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paani`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `validate`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `validate` (IN `farmer_contact` BIGINT)  NO SQL
select * from farmer where farmer_contact=@farmer_contact$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `area`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
`village_name` varchar(50)
,`taluka` varchar(50)
,`district` varchar(50)
,`region` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

DROP TABLE IF EXISTS `farmer`;
CREATE TABLE IF NOT EXISTS `farmer` (
  `farmer_id` int(11) NOT NULL AUTO_INCREMENT,
  `farmer_fname` varchar(30) NOT NULL,
  `farmer_lname` varchar(30) NOT NULL,
  `farmer_contact` bigint(20) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `village_no` int(11) NOT NULL,
  PRIMARY KEY (`farmer_id`),
  UNIQUE KEY `farmer_contact` (`farmer_contact`),
  KEY `fk` (`trainer_id`),
  KEY `fk1` (`village_no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`farmer_id`, `farmer_fname`, `farmer_lname`, `farmer_contact`, `trainer_id`, `village_no`) VALUES
(1, 'Raj', 'Shankar', 9786567463, 2, 1),
(2, 'Pallavi', 'Vani', 7656342989, 1, 1),
(3, 'Jass', 'Min', 9786567464, 2, 1),
(4, 'Sanya', 'Rao', 7861856856, 1, 2),
(5, 'Ramesh', 'Raghu', 6754321779, 4, 8),
(6, 'Jason', 'DSouza', 7711224433, 3, 6),
(7, 'Sarah', 'DSouza', 8561524361, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `location_no` int(11) NOT NULL AUTO_INCREMENT,
  `taluka` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `reg_year` int(4) NOT NULL,
  PRIMARY KEY (`location_no`),
  UNIQUE KEY `district` (`district`,`taluka`,`region`) USING BTREE,
  UNIQUE KEY `taluka` (`taluka`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_no`, `taluka`, `district`, `region`, `reg_year`) VALUES
(0, 'None', 'None', 'None', 0),
(1, 'Khultabad', 'Aurangabad', 'Marathwada', 2017),
(2, 'Phulambri', 'Aurangabad', 'Marathwada', 2017),
(3, 'Motala', 'Buldhana', 'Vidarbha', 2018),
(4, 'Akot', 'Akola', 'Vidarbha', 2017),
(5, 'Warud', 'Amravati', 'Vidarbha', 2016),
(6, 'Koregaon', 'Satara', 'Western Maharashtra', 2016),
(7, 'Baramati', 'Pune', 'Western Maharashtra', 2018),
(8, 'Ambajogai', 'Beed', 'Marathwada', 2016);

--
-- Triggers `location`
--
DROP TRIGGER IF EXISTS `trainer_add`;
DELIMITER $$
CREATE TRIGGER `trainer_add` AFTER INSERT ON `location` FOR EACH ROW insert into trainer values(DEFAULT, '', '', new.location_no, FLOOR(RAND() * 500), '123456')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

DROP TABLE IF EXISTS `trainer`;
CREATE TABLE IF NOT EXISTS `trainer` (
  `trainer_id` int(11) NOT NULL AUTO_INCREMENT,
  `trainer_fname` varchar(50) NOT NULL,
  `trainer_lname` varchar(50) NOT NULL,
  `location_no` int(11) NOT NULL,
  `trainer_contact` bigint(20) NOT NULL,
  `trainer_password` varchar(255) NOT NULL DEFAULT '123456',
  PRIMARY KEY (`trainer_id`),
  UNIQUE KEY `trainer_contact` (`trainer_contact`),
  UNIQUE KEY `location_no` (`location_no`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer_fname`, `trainer_lname`, `location_no`, `trainer_contact`, `trainer_password`) VALUES
(0, 'Shalette', 'D\'Souza', 0, 9876514562, '654321'),
(1, 'Ram', 'Pathak', 1, 8876453499, '123456'),
(2, 'Shyamla', 'Das', 2, 9897123456, '123456'),
(3, 'Manvi', 'Patil', 3, 7867453627, '123456'),
(4, 'Kiran', 'Tanvar', 4, 7765488978, '123456'),
(5, 'Rajath', 'Mahesh', 5, 7898678758, '123456'),
(6, 'Karthik', 'Narayan', 6, 8876453497, '123456'),
(7, 'Farhan', 'Kiran', 7, 7543233448, '123456'),
(8, 'Ambika', 'Sharma', 8, 9587909890, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

DROP TABLE IF EXISTS `village`;
CREATE TABLE IF NOT EXISTS `village` (
  `village_no` int(11) NOT NULL AUTO_INCREMENT,
  `village_name` varchar(50) NOT NULL,
  `location_no` int(11) NOT NULL,
  PRIMARY KEY (`village_no`),
  KEY `fk4` (`location_no`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`village_no`, `village_name`, `location_no`) VALUES
(1, 'Abdullapur', 1),
(2, 'Bagkot', 1),
(3, 'Chincholi', 1),
(4, 'Bhalgaon', 2),
(5, 'Bhawadi', 2),
(6, 'Bilda', 3),
(7, 'Bodhegaon Bk', 3),
(8, 'Ambadi', 4),
(9, 'Aloda', 5);

-- --------------------------------------------------------

--
-- Table structure for table `watercup`
--

DROP TABLE IF EXISTS `watercup`;
CREATE TABLE IF NOT EXISTS `watercup` (
  `location_no` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  UNIQUE KEY `rain` (`location_no`,`year`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watercup`
--

INSERT INTO `watercup` (`location_no`, `year`, `amount`) VALUES
(3, 2018, '1269.00'),
(4, 2017, '8261.00'),
(4, 2018, '3000.00'),
(6, 2016, '1200.00'),
(7, 2018, '2269.00'),
(8, 2016, '1368.00');

-- --------------------------------------------------------

--
-- Structure for view `area`
--
DROP TABLE IF EXISTS `area`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `area`  AS  select `village`.`village_name` AS `village_name`,`location`.`taluka` AS `taluka`,`location`.`district` AS `district`,`location`.`region` AS `region` from (`village` join `location` on((`village`.`location_no` = `location`.`location_no`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmer`
--
ALTER TABLE `farmer`
  ADD CONSTRAINT `fk` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`trainer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk1` FOREIGN KEY (`village_no`) REFERENCES `village` (`village_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainer`
--
ALTER TABLE `trainer`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`location_no`) REFERENCES `location` (`location_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `village`
--
ALTER TABLE `village`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`location_no`) REFERENCES `location` (`location_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `watercup`
--
ALTER TABLE `watercup`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`location_no`) REFERENCES `location` (`location_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
