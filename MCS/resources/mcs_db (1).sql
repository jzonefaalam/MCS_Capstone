-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2017 at 11:12 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursetbl`
--

CREATE TABLE `coursetbl` (
  `dishID` int(2) NOT NULL,
  `dishName` varchar(50) NOT NULL,
  `dishDescription` varchar(250) DEFAULT NULL,
  `dishCost` float NOT NULL,
  `dishTypeID` int(2) NOT NULL,
  `dishAvailability` int(1) NOT NULL,
  `dishStatus` int(1) DEFAULT NULL,
  `imageName` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coursetbl`
--

INSERT INTO `coursetbl` (`dishID`, `dishName`, `dishDescription`, `dishCost`, `dishTypeID`, `dishAvailability`, `dishStatus`, `imageName`, `created_at`, `updated_at`) VALUES
(4, 'qwe', 'qwe', 123, 7, 1, 1, 'No Image', '2017-07-09 02:13:47', '2017-07-09 02:13:47'),
(5, 'asd', 'asd', 123, 8, 1, 1, 'No Image', '2017-07-09 02:13:58', '2017-07-09 02:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `coursetypetbl`
--

CREATE TABLE `coursetypetbl` (
  `dishTypeID` int(2) NOT NULL,
  `dishTypeName` varchar(45) DEFAULT NULL,
  `dishTypeDescription` varchar(250) DEFAULT NULL,
  `dishTypeStatus` int(1) DEFAULT NULL,
  `dishTypeImage` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coursetypetbl`
--

INSERT INTO `coursetypetbl` (`dishTypeID`, `dishTypeName`, `dishTypeDescription`, `dishTypeStatus`, `dishTypeImage`, `created_at`, `updated_at`) VALUES
(6, 'Vegetable', NULL, 1, 'No Image', '2017-07-09 01:55:01', '2017-07-09 01:55:01'),
(7, 'Beef', NULL, 1, 'No Image', '2017-07-09 01:55:12', '2017-07-09 01:55:12'),
(8, 'Seafood', NULL, 1, 'No Image', '2017-07-09 01:55:23', '2017-07-09 01:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `course_package`
--

CREATE TABLE `course_package` (
  `coursetbl_dishID` int(2) NOT NULL,
  `packages_packageID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customertbl`
--

CREATE TABLE `customertbl` (
  `customerID` int(5) NOT NULL,
  `fullName` varchar(80) NOT NULL,
  `homeAddress` varchar(100) NOT NULL,
  `billingAddress` varchar(100) DEFAULT NULL,
  `emailAddress` varchar(50) DEFAULT NULL,
  `contactNum` varchar(45) DEFAULT NULL,
  `customerStatus` int(1) DEFAULT NULL,
  `customerAvail` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customertbl`
--

INSERT INTO `customertbl` (`customerID`, `fullName`, `homeAddress`, `billingAddress`, `emailAddress`, `contactNum`, `customerStatus`, `customerAvail`) VALUES
(1, 'Rozhel Turgo', 'Infanta, Quezon', 'Sampaloc, Manila', 'rturgo@gmail.com', '0912334523', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_course`
--

CREATE TABLE `customer_course` (
  `customertbl_customerID` int(5) NOT NULL,
  `coursetbl_dishID` int(2) NOT NULL,
  `totalCost` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_employee`
--

CREATE TABLE `customer_employee` (
  `employeeTbl_employeeID` int(2) NOT NULL,
  `customertbl_customerID` int(5) NOT NULL,
  `totalCost` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_equipment`
--

CREATE TABLE `customer_equipment` (
  `equipmentTbl_equipmentID` int(5) NOT NULL,
  `customertbl_customerID` int(5) NOT NULL,
  `totalCost` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_service`
--

CREATE TABLE `customer_service` (
  `serviceTbl_serviceID` int(5) NOT NULL,
  `customertbl_customerID` int(5) NOT NULL,
  `totalCost` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employeetbl`
--

CREATE TABLE `employeetbl` (
  `employeeID` int(2) NOT NULL,
  `employeeName` varchar(45) DEFAULT NULL,
  `employeeStatus` int(1) DEFAULT NULL,
  `employeeTypeID` int(2) NOT NULL,
  `employeeAvailability` int(1) NOT NULL,
  `employeeImage` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeetbl`
--

INSERT INTO `employeetbl` (`employeeID`, `employeeName`, `employeeStatus`, `employeeTypeID`, `employeeAvailability`, `employeeImage`, `created_at`, `updated_at`) VALUES
(30, 'Jayson Cruz', 1, 13, 1, 'avatar.png', '2017-07-09 10:47:56', '0000-00-00 00:00:00'),
(33, 'Jayson Lopez', 1, 11, 1, 'avatar04.png', '2017-07-09 10:47:56', '0000-00-00 00:00:00'),
(34, 'Marta Dela Cruz', 1, 17, 1, 'avatar2.png', '2017-07-09 10:47:56', '0000-00-00 00:00:00'),
(35, 'Jayson Faalam', 1, 11, 1, 'No Image', '2017-07-10 01:44:11', '2017-07-10 01:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `employeetypetbl`
--

CREATE TABLE `employeetypetbl` (
  `employeeTypeID` int(2) NOT NULL,
  `employeeTypeName` varchar(45) DEFAULT NULL,
  `employeeTypeDescription` varchar(50) DEFAULT NULL,
  `employeeRatePerHour` float NOT NULL,
  `employeeTypeStatus` int(1) DEFAULT NULL,
  `employeeTypeImage` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeetypetbl`
--

INSERT INTO `employeetypetbl` (`employeeTypeID`, `employeeTypeName`, `employeeTypeDescription`, `employeeRatePerHour`, `employeeTypeStatus`, `employeeTypeImage`, `created_at`, `updated_at`) VALUES
(11, 'Chef', NULL, 599.8, 1, '', '2017-07-09 10:39:54', '0000-00-00 00:00:00'),
(12, 'Waiter', NULL, 600, 1, '', '2017-07-09 10:39:54', '0000-00-00 00:00:00'),
(13, 'Emcee', NULL, 750, 1, '', '2017-07-09 10:39:54', '0000-00-00 00:00:00'),
(14, 'Clown', NULL, 800, 0, '', '2017-07-09 10:39:54', '0000-00-00 00:00:00'),
(15, 'Clowns', NULL, 500, 0, '', '2017-07-09 10:39:54', '0000-00-00 00:00:00'),
(16, 'Clown', NULL, 500, 1, '', '2017-07-09 10:39:54', '0000-00-00 00:00:00'),
(17, 'Waitress', NULL, 350, 1, '', '2017-07-09 10:39:54', '0000-00-00 00:00:00'),
(18, 'ate mo', NULL, 111111, 0, '', '2017-07-09 10:39:54', '0000-00-00 00:00:00'),
(19, 'abc', 'None', 123, 1, 'No Image', '2017-07-09 02:45:49', '2017-07-09 02:45:49'),
(20, '212132', 'None', 123213, 1, 'No Image', '2017-07-09 02:45:57', '2017-07-09 02:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `employee_package`
--

CREATE TABLE `employee_package` (
  `employeeTbl_employeeID` int(2) NOT NULL,
  `packageTbl_packageID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipmenttbl`
--

CREATE TABLE `equipmenttbl` (
  `equipmentID` int(5) NOT NULL,
  `equipmentName` varchar(45) DEFAULT NULL,
  `equipmentDescription` varchar(45) DEFAULT NULL,
  `equipmentRatePerHour` float DEFAULT NULL,
  `equipmentUnit` int(5) NOT NULL,
  `equipmentStatus` int(1) NOT NULL,
  `equipmentAvailability` int(1) NOT NULL,
  `equipmentImage` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipmenttbl`
--

INSERT INTO `equipmenttbl` (`equipmentID`, `equipmentName`, `equipmentDescription`, `equipmentRatePerHour`, `equipmentUnit`, `equipmentStatus`, `equipmentAvailability`, `equipmentImage`, `created_at`, `updated_at`) VALUES
(25, 'Chairs', 'Something about chairs.', 2500, 500, 1, 0, 'chairs.jpg', '2017-07-09 18:50:33', '0000-00-00 00:00:00'),
(26, 'Sound System', 'Full package sound system.', 2700.55, 5, 1, 0, 'sound-edit.jpg', '2017-07-09 18:50:33', '0000-00-00 00:00:00'),
(27, 'sadsadsa', 'dass', 323, 12, 0, 1, 'location.jpg', '2017-07-09 18:50:33', '0000-00-00 00:00:00'),
(28, 'Tables', 'Mesa', 200, 100, 1, 1, 'P1010220 - Copy.JPG', '2017-07-09 18:50:33', '0000-00-00 00:00:00'),
(29, 'Balloons', 'Lobo', 250, 50, 0, 1, 'balloons.jpg', '2017-07-09 18:50:33', '0000-00-00 00:00:00'),
(30, 'Usok', 'asdasd', 111111, 2222, 1, 1, 'download.jpg', '2017-07-09 18:50:33', '0000-00-00 00:00:00'),
(31, 'Betlog', 'asdasd', 123, 123, 1, 1, 'No Image', '2017-07-10 01:58:00', '2017-07-10 01:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `equipmenttypetbl`
--

CREATE TABLE `equipmenttypetbl` (
  `equipmentTypeID` int(2) NOT NULL,
  `equipmentTypeName` varchar(100) NOT NULL,
  `equipmentTypeStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipmenttypetbl`
--

INSERT INTO `equipmenttypetbl` (`equipmentTypeID`, `equipmentTypeName`, `equipmentTypeStatus`) VALUES
(1, 'Sound System', 1),
(2, 'Chairs', 1),
(3, 'Sound System', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eventtbl`
--

CREATE TABLE `eventtbl` (
  `eventID` int(5) NOT NULL,
  `eventName` varchar(45) DEFAULT NULL,
  `eventType` varchar(45) DEFAULT NULL,
  `eventDate` datetime DEFAULT NULL,
  `eventLocation` varchar(45) DEFAULT NULL,
  `guestCount` int(4) DEFAULT NULL,
  `customerID` int(5) NOT NULL,
  `eventStatus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eventtypetbl`
--

CREATE TABLE `eventtypetbl` (
  `eventTypeID` int(5) NOT NULL,
  `eventTypeName` varchar(50) NOT NULL,
  `eventTypeDescription` varchar(100) NOT NULL,
  `eventTypeAvailability` int(1) NOT NULL,
  `eventTypeStatus` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventtypetbl`
--

INSERT INTO `eventtypetbl` (`eventTypeID`, `eventTypeName`, `eventTypeDescription`, `eventTypeAvailability`, `eventTypeStatus`, `created_at`, `updated_at`) VALUES
(17, 'Wedding', 'Something about a wedding.', 1, 0, '2017-07-09 19:08:49', '0000-00-00 00:00:00'),
(18, 'Birthday Party', 'Something about birthday parties.', 1, 1, '2017-07-09 19:08:49', '0000-00-00 00:00:00'),
(19, 'asdasdasdasdasdasd', 'sadadasasdasd', 1, 0, '2017-07-09 19:08:49', '0000-00-00 00:00:00'),
(20, 'Wedding', 'With free wine', 0, 1, '2017-07-09 19:08:49', '0000-00-00 00:00:00'),
(21, 'Karaoke Party', 'Something about karaoke.', 1, 1, '2017-07-09 19:08:49', '0000-00-00 00:00:00'),
(22, 'Debut', '18th Birthday', 0, 1, '2017-07-09 19:08:49', '0000-00-00 00:00:00'),
(23, 'Kasal', 'kasal malamang.', 1, 0, '2017-07-09 19:08:49', '0000-00-00 00:00:00'),
(24, 'abc', 'abccsdas', 1, 1, '2017-07-10 02:18:16', '2017-07-10 02:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `imagetbl`
--

CREATE TABLE `imagetbl` (
  `imageID` int(5) NOT NULL,
  `imageName` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locationtbl`
--

CREATE TABLE `locationtbl` (
  `locationID` int(5) NOT NULL,
  `locationName` varchar(50) NOT NULL,
  `locationContactPerson` varchar(100) NOT NULL,
  `locationContactNumber` varchar(20) NOT NULL,
  `locationDescription` varchar(250) NOT NULL,
  `locationCapacity` int(5) NOT NULL,
  `locationFee` float NOT NULL,
  `locationAddress` varchar(150) NOT NULL,
  `locationAvailability` int(1) NOT NULL,
  `locationStatus` int(1) NOT NULL,
  `locationImage` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locationtbl`
--

INSERT INTO `locationtbl` (`locationID`, `locationName`, `locationContactPerson`, `locationContactNumber`, `locationDescription`, `locationCapacity`, `locationFee`, `locationAddress`, `locationAvailability`, `locationStatus`, `locationImage`, `created_at`, `updated_at`) VALUES
(19, 'Lighthouses', 'Jayson Lopez', '09269541594', 'Something about the lighthouse.', 400, 2000, 'Africa', 1, 1, 'Lighthouse.jpg', '2017-07-09 19:09:31', '0000-00-00 00:00:00'),
(21, 'Penguin Island', 'John Carter', '09123456789', '', 500, 5000, 'Antartica', 1, 1, 'Penguins.jpg', '2017-07-09 19:09:31', '0000-00-00 00:00:00'),
(22, 'Wonderland', 'John Lopez', '09123456789', 'Land', 500, 10000, 'Manila', 0, 1, 'Koala.jpg', '2017-07-09 19:09:31', '0000-00-00 00:00:00'),
(23, 'Cote', 'Mama mo', '09013813241', 'asdasd', 345, 123123, 'Infanta, Quezon', 1, 1, 'location.jpg', '2017-07-09 19:09:31', '0000-00-00 00:00:00'),
(24, 'abbc', 'abc', '123', 'abc', 123, 123, 'abc', 1, 1, 'No Image', '2017-07-10 02:26:20', '2017-07-10 02:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `packagetbl`
--

CREATE TABLE `packagetbl` (
  `packageID` int(1) NOT NULL,
  `packageName` varchar(50) NOT NULL,
  `packageDescription` varchar(200) DEFAULT NULL,
  `packageCost` float DEFAULT NULL,
  `packageInclusion` varchar(1000) NOT NULL,
  `packageStatus` int(1) NOT NULL,
  `packageAvailability` int(1) NOT NULL,
  `packageImage` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packagetbl`
--

INSERT INTO `packagetbl` (`packageID`, `packageName`, `packageDescription`, `packageCost`, `packageInclusion`, `packageStatus`, `packageAvailability`, `packageImage`, `created_at`, `updated_at`) VALUES
(28, '4 Main Course', 'Affordable ', 4600, 'Beef, Pork, Chicken, Vegetable', 1, 1, 'Desert.jpg', '2017-07-09 19:10:23', '0000-00-00 00:00:00'),
(29, '3 Main Course', '', 1000, 'Beef', 0, 1, 'location.jpg', '2017-07-09 19:10:23', '0000-00-00 00:00:00'),
(30, '3 Main Course', 'Something', 5000, 'Pork, Chicken, Veggies', 1, 0, 'Tulips.jpg', '2017-07-09 19:10:23', '0000-00-00 00:00:00'),
(31, '5 main course', 'includes 5 dishes', 15000, 'Beef, Pork, Chicken, Vegetable, Lamb', 1, 0, 'Koala.jpg', '2017-07-09 19:10:23', '0000-00-00 00:00:00'),
(32, 'sas', 'asa', 11, 'Beef, Pork, Chicken', 0, 1, 'logo.png', '2017-07-09 19:10:23', '0000-00-00 00:00:00'),
(33, '2 Main Course', 'cheap', 12000, 'Chicken, Veggies', 0, 1, 'logo.png', '2017-07-09 19:10:23', '0000-00-00 00:00:00'),
(34, '1 Main Course', 'cheapest', 1000, 'Veggies', 0, 0, 'FB_IMG_1448152152595.jpg', '2017-07-09 19:10:23', '0000-00-00 00:00:00'),
(35, 'abc', NULL, 123, 'a:3:{i:0;s:1:\"6\";i:1;s:1:\"7\";i:2;s:1:\"8\";}', 1, 1, 'No Image', '2017-07-10 02:43:03', '2017-07-10 02:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `reservationtbl`
--

CREATE TABLE `reservationtbl` (
  `reservationID` int(5) NOT NULL,
  `reservationName` varchar(45) DEFAULT NULL,
  `reservationStatus` int(1) NOT NULL,
  `customertbl_customerID` int(5) NOT NULL,
  `packages_packageID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `servicetbl`
--

CREATE TABLE `servicetbl` (
  `serviceID` int(5) NOT NULL,
  `serviceName` varchar(45) DEFAULT NULL,
  `serviceDescription` varchar(45) DEFAULT NULL,
  `serviceFee` float NOT NULL,
  `serviceStatus` int(1) NOT NULL,
  `serviceAvailability` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servicetbl`
--

INSERT INTO `servicetbl` (`serviceID`, `serviceName`, `serviceDescription`, `serviceFee`, `serviceStatus`, `serviceAvailability`, `created_at`, `updated_at`) VALUES
(13, 'Flower Entourage', 'Something about flowers.', 2599.9, 1, 1, '2017-07-09 19:11:25', '0000-00-00 00:00:00'),
(14, 'abcde', '213213123', 123123, 0, 0, '2017-07-09 19:11:25', '0000-00-00 00:00:00'),
(15, 'Invitations', 'Something about invitations.', 500, 0, 0, '2017-07-09 19:11:25', '0000-00-00 00:00:00'),
(16, 'Balloons', 'Something about lobo.', 1000, 1, 0, '2017-07-09 19:11:25', '0000-00-00 00:00:00'),
(17, 'Invitation Cards', 'Customize ', 15, 1, 0, '2017-07-09 19:11:25', '0000-00-00 00:00:00'),
(18, 'Footspa', 'sdfsdfsdf', 876711, 0, 0, '2017-07-09 19:11:25', '0000-00-00 00:00:00'),
(19, 'abc', 'ac', 123, 1, 1, '2017-07-10 13:05:50', '2017-07-10 13:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `servicetypetbl`
--

CREATE TABLE `servicetypetbl` (
  `serviceTypeID` int(2) NOT NULL,
  `serviceTypeName` varchar(100) NOT NULL,
  `serviceTypeDescription` varchar(250) NOT NULL,
  `serviceTypeStatus` int(1) NOT NULL,
  `serviceTypeAvailability` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicetypetbl`
--

INSERT INTO `servicetypetbl` (`serviceTypeID`, `serviceTypeName`, `serviceTypeDescription`, `serviceTypeStatus`, `serviceTypeAvailability`) VALUES
(1, 'ABC', 'abc', 0, 0),
(2, 'aaaa', 'asdasdsa', 1, 0),
(3, 'ABc', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactiontbl`
--

CREATE TABLE `transactiontbl` (
  `transactionID` int(5) NOT NULL,
  `transactionStatus` int(1) DEFAULT NULL,
  `reservationtbl_reservationID` int(5) NOT NULL,
  `customertbl_customerID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `created_at`, `updated_at`) VALUES
('admin', 'admin', '0000-00-00', '0000-00-00'),
('jayson', '1234', '2017-07-03', '2017-07-03'),
('lolo', '$2y$10$ZA8EI5JGMXnyogIIkdqJg.r6kIRhe.i0eb9e6c1A/zagPebxRPsw.', '2017-07-03', '2017-07-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursetbl`
--
ALTER TABLE `coursetbl`
  ADD PRIMARY KEY (`dishID`);

--
-- Indexes for table `coursetypetbl`
--
ALTER TABLE `coursetypetbl`
  ADD PRIMARY KEY (`dishTypeID`);

--
-- Indexes for table `course_package`
--
ALTER TABLE `course_package`
  ADD PRIMARY KEY (`coursetbl_dishID`,`packages_packageID`),
  ADD KEY `fk_coursetbl_has_packages_packages1_idx` (`packages_packageID`),
  ADD KEY `fk_coursetbl_has_packages_coursetbl_idx` (`coursetbl_dishID`);

--
-- Indexes for table `customertbl`
--
ALTER TABLE `customertbl`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `customer_course`
--
ALTER TABLE `customer_course`
  ADD PRIMARY KEY (`customertbl_customerID`,`coursetbl_dishID`),
  ADD KEY `fk_customertbl_has_coursetbl_coursetbl1_idx` (`coursetbl_dishID`),
  ADD KEY `fk_customertbl_has_coursetbl_customertbl1_idx` (`customertbl_customerID`);

--
-- Indexes for table `customer_employee`
--
ALTER TABLE `customer_employee`
  ADD PRIMARY KEY (`employeeTbl_employeeID`,`customertbl_customerID`),
  ADD KEY `fk_employeeTbl_has_customertbl_customertbl1_idx` (`customertbl_customerID`),
  ADD KEY `fk_employeeTbl_has_customertbl_employeeTbl1_idx` (`employeeTbl_employeeID`);

--
-- Indexes for table `customer_equipment`
--
ALTER TABLE `customer_equipment`
  ADD PRIMARY KEY (`equipmentTbl_equipmentID`,`customertbl_customerID`),
  ADD KEY `fk_equipmentTbl_has_customertbl_customertbl1_idx` (`customertbl_customerID`),
  ADD KEY `fk_equipmentTbl_has_customertbl_equipmentTbl1_idx` (`equipmentTbl_equipmentID`);

--
-- Indexes for table `customer_service`
--
ALTER TABLE `customer_service`
  ADD PRIMARY KEY (`serviceTbl_serviceID`,`customertbl_customerID`),
  ADD KEY `fk_serviceTbl_has_customertbl_customertbl1_idx` (`customertbl_customerID`),
  ADD KEY `fk_serviceTbl_has_customertbl_serviceTbl1_idx` (`serviceTbl_serviceID`);

--
-- Indexes for table `employeetbl`
--
ALTER TABLE `employeetbl`
  ADD PRIMARY KEY (`employeeID`,`employeeTypeID`),
  ADD KEY `fk_employeeTbl_employeeTypeTbl1_idx` (`employeeTypeID`);

--
-- Indexes for table `employeetypetbl`
--
ALTER TABLE `employeetypetbl`
  ADD PRIMARY KEY (`employeeTypeID`);

--
-- Indexes for table `employee_package`
--
ALTER TABLE `employee_package`
  ADD PRIMARY KEY (`employeeTbl_employeeID`,`packageTbl_packageID`),
  ADD KEY `fk_employeeTbl_has_packageTbl_packageTbl1_idx` (`packageTbl_packageID`),
  ADD KEY `fk_employeeTbl_has_packageTbl_employeeTbl1_idx` (`employeeTbl_employeeID`);

--
-- Indexes for table `equipmenttbl`
--
ALTER TABLE `equipmenttbl`
  ADD PRIMARY KEY (`equipmentID`);

--
-- Indexes for table `equipmenttypetbl`
--
ALTER TABLE `equipmenttypetbl`
  ADD PRIMARY KEY (`equipmentTypeID`);

--
-- Indexes for table `eventtbl`
--
ALTER TABLE `eventtbl`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `customerID_idx` (`customerID`);

--
-- Indexes for table `eventtypetbl`
--
ALTER TABLE `eventtypetbl`
  ADD PRIMARY KEY (`eventTypeID`);

--
-- Indexes for table `imagetbl`
--
ALTER TABLE `imagetbl`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `locationtbl`
--
ALTER TABLE `locationtbl`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `packagetbl`
--
ALTER TABLE `packagetbl`
  ADD PRIMARY KEY (`packageID`);

--
-- Indexes for table `reservationtbl`
--
ALTER TABLE `reservationtbl`
  ADD PRIMARY KEY (`reservationID`,`customertbl_customerID`,`packages_packageID`),
  ADD KEY `fk_reservationtbl_customertbl1_idx` (`customertbl_customerID`),
  ADD KEY `fk_reservationtbl_packages1_idx` (`packages_packageID`);

--
-- Indexes for table `servicetbl`
--
ALTER TABLE `servicetbl`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `servicetypetbl`
--
ALTER TABLE `servicetypetbl`
  ADD PRIMARY KEY (`serviceTypeID`);

--
-- Indexes for table `transactiontbl`
--
ALTER TABLE `transactiontbl`
  ADD PRIMARY KEY (`transactionID`,`reservationtbl_reservationID`,`customertbl_customerID`),
  ADD KEY `fk_transactionTbl_reservationtbl1_idx` (`reservationtbl_reservationID`),
  ADD KEY `fk_transactionTbl_customertbl1_idx` (`customertbl_customerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coursetbl`
--
ALTER TABLE `coursetbl`
  MODIFY `dishID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `coursetypetbl`
--
ALTER TABLE `coursetypetbl`
  MODIFY `dishTypeID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customertbl`
--
ALTER TABLE `customertbl`
  MODIFY `customerID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employeetbl`
--
ALTER TABLE `employeetbl`
  MODIFY `employeeID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `employeetypetbl`
--
ALTER TABLE `employeetypetbl`
  MODIFY `employeeTypeID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `equipmenttbl`
--
ALTER TABLE `equipmenttbl`
  MODIFY `equipmentID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `equipmenttypetbl`
--
ALTER TABLE `equipmenttypetbl`
  MODIFY `equipmentTypeID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `eventtbl`
--
ALTER TABLE `eventtbl`
  MODIFY `eventID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eventtypetbl`
--
ALTER TABLE `eventtypetbl`
  MODIFY `eventTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `imagetbl`
--
ALTER TABLE `imagetbl`
  MODIFY `imageID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locationtbl`
--
ALTER TABLE `locationtbl`
  MODIFY `locationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `packagetbl`
--
ALTER TABLE `packagetbl`
  MODIFY `packageID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `reservationtbl`
--
ALTER TABLE `reservationtbl`
  MODIFY `reservationID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `servicetbl`
--
ALTER TABLE `servicetbl`
  MODIFY `serviceID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `servicetypetbl`
--
ALTER TABLE `servicetypetbl`
  MODIFY `serviceTypeID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_package`
--
ALTER TABLE `course_package`
  ADD CONSTRAINT `course_package_ibfk_1` FOREIGN KEY (`packages_packageID`) REFERENCES `packagetbl` (`packageID`),
  ADD CONSTRAINT `fk_coursetbl_has_packages_coursetbl` FOREIGN KEY (`coursetbl_dishID`) REFERENCES `coursetbl` (`dishID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer_course`
--
ALTER TABLE `customer_course`
  ADD CONSTRAINT `fk_customertbl_has_coursetbl_coursetbl1` FOREIGN KEY (`coursetbl_dishID`) REFERENCES `coursetbl` (`dishID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_customertbl_has_coursetbl_customertbl1` FOREIGN KEY (`customertbl_customerID`) REFERENCES `customertbl` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer_employee`
--
ALTER TABLE `customer_employee`
  ADD CONSTRAINT `customer_employee_ibfk_1` FOREIGN KEY (`employeeTbl_employeeID`) REFERENCES `employeetbl` (`employeeID`),
  ADD CONSTRAINT `fk_employeeTbl_has_customertbl_customertbl1` FOREIGN KEY (`customertbl_customerID`) REFERENCES `customertbl` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer_equipment`
--
ALTER TABLE `customer_equipment`
  ADD CONSTRAINT `fk_equipmentTbl_has_customertbl_customertbl1` FOREIGN KEY (`customertbl_customerID`) REFERENCES `customertbl` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipmentTbl_has_customertbl_equipmentTbl1` FOREIGN KEY (`equipmentTbl_equipmentID`) REFERENCES `equipmenttbl` (`equipmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer_service`
--
ALTER TABLE `customer_service`
  ADD CONSTRAINT `customer_service_ibfk_1` FOREIGN KEY (`serviceTbl_serviceID`) REFERENCES `servicetbl` (`serviceID`),
  ADD CONSTRAINT `fk_serviceTbl_has_customertbl_customertbl1` FOREIGN KEY (`customertbl_customerID`) REFERENCES `customertbl` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
