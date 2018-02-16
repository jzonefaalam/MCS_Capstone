-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2018 at 03:52 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
-- Table structure for table `assignequipment_tbl`
--

CREATE TABLE `assignequipment_tbl` (
  `assignEquipmentID` int(5) NOT NULL,
  `assignEquipmentQty` int(5) NOT NULL,
  `assignReturnQty` int(5) DEFAULT '0',
  `assignEquipmentDate` date NOT NULL,
  `assignEquipmentStatus` int(1) NOT NULL,
  `equipmentID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cartID` int(5) NOT NULL,
  `dishID` int(5) NOT NULL,
  `serviceID` int(5) NOT NULL,
  `employeeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `contactID` int(5) NOT NULL,
  `contactName` varchar(150) NOT NULL,
  `contactNum` varchar(13) NOT NULL,
  `customerID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `customerID` int(5) NOT NULL,
  `fullName` varchar(150) NOT NULL,
  `homeAddress` varchar(150) NOT NULL,
  `billingAddress` varchar(150) NOT NULL,
  `emailAddress` varchar(150) NOT NULL,
  `cellNum` varchar(13) NOT NULL,
  `telNum` varchar(10) DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `customerAvailability` int(1) NOT NULL,
  `customerStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dishadditional_tbl`
--

CREATE TABLE `dishadditional_tbl` (
  `additionalID` int(5) NOT NULL,
  `additionalServing` int(5) NOT NULL,
  `additionalNotes` varchar(250) DEFAULT NULL,
  `reservationID` int(5) NOT NULL,
  `dishID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishadditional_tbl`
--

INSERT INTO `dishadditional_tbl` (`additionalID`, `additionalServing`, `additionalNotes`, `reservationID`, `dishID`) VALUES
(1, 5, NULL, 1, 8),
(2, 6, NULL, 1, 3),
(3, 4, NULL, 11, 10),
(4, 10, NULL, 12, 2),
(5, 4, NULL, 13, 13),
(6, 5, NULL, 14, 7),
(7, 5, NULL, 15, 8),
(8, 12, NULL, 17, 8),
(9, 5, NULL, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `dishavailed_tbl`
--

CREATE TABLE `dishavailed_tbl` (
  `dishAvailedID` int(5) NOT NULL,
  `dishID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishavailed_tbl`
--

INSERT INTO `dishavailed_tbl` (`dishAvailedID`, `dishID`, `reservationID`) VALUES
(1, 11, 1),
(2, 21, 1),
(3, 3, 1),
(4, 17, 1),
(5, 34, 1),
(6, 44, 1),
(7, 47, 1),
(8, 50, 1),
(9, 9, 2),
(10, 21, 2),
(11, 3, 2),
(12, 19, 2),
(13, 37, 2),
(14, 42, 2),
(15, 47, 2),
(16, 52, 2),
(17, 8, 3),
(18, 16, 3),
(19, 33, 3),
(20, 43, 3),
(21, 47, 3),
(22, 50, 3),
(23, 7, 4),
(24, 15, 4),
(25, 34, 4),
(26, 42, 4),
(27, 47, 4),
(28, 50, 4),
(29, 8, 5),
(30, 15, 5),
(31, 33, 5),
(32, 42, 5),
(33, 47, 5),
(34, 50, 5),
(35, 7, 6),
(36, 20, 6),
(37, 15, 6),
(38, 33, 6),
(39, 42, 6),
(40, 47, 6),
(41, 50, 6),
(42, 7, 7),
(43, 15, 7),
(44, 33, 7),
(45, 42, 7),
(46, 47, 7),
(47, 50, 7),
(48, 8, 8),
(49, 20, 8),
(50, 15, 8),
(51, 33, 8),
(52, 42, 8),
(53, 47, 8),
(54, 50, 8),
(55, 9, 9),
(56, 20, 9),
(57, 6, 9),
(58, 15, 9),
(59, 37, 9),
(60, 45, 9),
(61, 48, 9),
(62, 51, 9),
(63, 7, 10),
(64, 18, 10),
(65, 35, 10),
(66, 44, 10),
(67, 48, 10),
(68, 51, 10),
(69, 9, 11),
(70, 17, 11),
(71, 35, 11),
(72, 43, 11),
(73, 48, 11),
(74, 50, 11),
(75, 9, 12),
(76, 18, 12),
(77, 35, 12),
(78, 44, 12),
(79, 47, 12),
(80, 52, 12),
(81, 9, 13),
(82, 18, 13),
(83, 34, 13),
(84, 44, 13),
(85, 48, 13),
(86, 52, 13),
(87, 8, 14),
(88, 20, 14),
(89, 15, 14),
(90, 33, 14),
(91, 42, 14),
(92, 47, 14),
(93, 50, 14),
(94, 7, 15),
(95, 22, 15),
(96, 1, 15),
(97, 15, 15),
(98, 33, 15),
(99, 43, 15),
(100, 47, 15),
(101, 11, 16),
(102, 17, 16),
(103, 34, 16),
(104, 46, 16),
(105, 47, 16),
(106, 50, 16),
(107, 8, 17),
(108, 2, 17),
(109, 18, 17),
(110, 33, 17),
(111, 47, 17),
(112, 50, 17),
(113, 54, 17),
(114, 9, 1),
(115, 4, 1),
(116, 18, 1),
(117, 34, 1),
(118, 47, 1),
(119, 51, 1),
(120, 54, 1),
(121, 8, 2),
(122, 2, 2),
(123, 17, 2),
(124, 33, 2),
(125, 47, 2),
(126, 50, 2),
(127, 54, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dishtype_tbl`
--

CREATE TABLE `dishtype_tbl` (
  `dishTypeID` int(5) NOT NULL,
  `dishTypeName` varchar(150) DEFAULT NULL,
  `dishTypeDescription` varchar(200) DEFAULT NULL,
  `dishTypeStatus` int(1) DEFAULT NULL,
  `dishTypeImage` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishtype_tbl`
--

INSERT INTO `dishtype_tbl` (`dishTypeID`, `dishTypeName`, `dishTypeDescription`, `dishTypeStatus`, `dishTypeImage`) VALUES
(1, 'Chicken', NULL, 1, 'fch.jpg'),
(2, 'Pork', NULL, 1, 'bp.JPG'),
(3, 'Beef', NULL, 1, 'bip.jpg'),
(4, 'Fish', NULL, 1, 'ssf.jpg'),
(5, 'Vegetables', NULL, 1, 'mv.jpg'),
(6, 'Dessert', NULL, 1, 'pastry - Copy.jpg'),
(7, 'Drinks', NULL, 1, 'mju.jpe'),
(8, 'Rice', NULL, 1, 'frice.jpg'),
(9, 'Pasta', '', 1, 'sp.jpg'),
(10, 'Kalabaw', NULL, 0, 'bp.JPG'),
(11, 'kalabaw', NULL, 1, 'bp.JPG'),
(12, 'Lamb', NULL, 1, 'lf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dish_tbl`
--

CREATE TABLE `dish_tbl` (
  `dishID` int(5) NOT NULL,
  `dishName` varchar(100) NOT NULL,
  `dishDescription` varchar(200) NOT NULL,
  `dishCost` decimal(7,2) NOT NULL,
  `dishImage` varchar(100) NOT NULL,
  `dishAvailability` int(1) NOT NULL,
  `dishStatus` int(1) NOT NULL,
  `dishTypeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish_tbl`
--

INSERT INTO `dish_tbl` (`dishID`, `dishName`, `dishDescription`, `dishCost`, `dishImage`, `dishAvailability`, `dishStatus`, `dishTypeID`) VALUES
(1, 'Beef with Mushroom', 'Comfort Food', '70.00', 'bwm.jpg', 1, 1, 3),
(2, 'BEEF KALDERETA W/ POTATOES & CARROTS', 'Crispy', '75.00', 'beef.jpe', 1, 1, 3),
(3, 'BEEF TERIYAKI', 'Masarap', '80.00', 'bt.jpg', 1, 1, 3),
(4, 'KARE-KARE', 'Creamery', '85.00', 'kk.jpg', 1, 1, 3),
(5, 'Beef with Brocoli', 'Appetizing', '55.00', 'bwb.jpg', 1, 1, 3),
(6, 'LENGUA ESTOFADO', 'Candied', '75.00', 'le.jpg', 1, 1, 3),
(7, 'BREADED CHICKEN FILLET', 'Crispy', '50.00', 'cf.jpg', 1, 1, 1),
(8, 'CHICKEN ADOBO', 'Yummy', '55.00', 'cad.jpeg', 0, 1, 1),
(9, 'CHICKEN BARBEQUE', 'Tasty', '60.00', 'cb.jpg', 1, 1, 1),
(10, 'CHICKEN W/ PICKLES', 'Appetizing', '55.00', 'cwp.jpg', 1, 1, 1),
(11, 'CHICKEN TERIYAKI', 'Comfort Food', '60.00', 'cte.jpeg', 1, 1, 1),
(12, 'CORDON BLEU', 'Tasty', '55.00', 'cbl.jpg', 1, 1, 1),
(13, 'FRIED CHICKEN', 'Crispy', '60.00', 'fch.jpg', 1, 1, 1),
(14, 'CHICKEN ALA-ORANGE', 'Dipping', '55.00', 'cao.jpg', 1, 1, 1),
(15, 'FISH FILLET With TARTAR SAUCE', 'Fresh', '40.00', 'ffi.jpe', 1, 1, 4),
(16, 'FILLET', 'Crispy', '50.00', 'ffi.jpg', 1, 0, 4),
(17, 'SHRIMP W/ GARLIC ', 'Fresh', '70.00', 'swg.jpg', 1, 1, 4),
(18, 'SHRIMP TEMPURA', 'Delicious', '75.00', 'st.jpg', 1, 1, 4),
(19, 'SWEET & SOUR FISH FILLET', 'Delectable', '45.00', 'ssf.jpg', 1, 1, 4),
(20, 'BARBEQUE LIEMPO', 'Roasted', '65.00', 'pork.jpg', 1, 1, 2),
(21, 'BREADED PORK', 'Meaty', '55.00', 'bp.jpg', 1, 1, 2),
(22, 'CRISPY PATA', 'Crispy', '60.00', 'cpa.jpeg', 1, 1, 2),
(23, 'HAMONADO', 'Drizzled', '70.00', 'h.jpg', 1, 1, 2),
(24, 'HAWAIIAN PORK', 'Dry-Roasted', '55.00', 'hp.jpg', 1, 1, 2),
(25, 'LECHON KAWALI', 'Meaty', '50.00', 'lk.jpg', 1, 1, 2),
(26, 'MENUDO', 'Fermented', '65.00', 'm.jpg', 1, 1, 2),
(27, 'PORK ASADO', 'Flavorful', '60.00', 'pa.jpg', 1, 1, 2),
(28, 'PORK BARBEQUE', 'Roasted', '65.00', 'pb.jpg', 1, 1, 2),
(29, 'PORK ROLL', 'Flavorsome', '65.00', 'pr.jpg', 1, 0, 2),
(30, 'SWEET AND SOUR PORK', 'Sweet', '60.00', 'ssp.jpg', 1, 1, 2),
(31, 'TOFU CON LECHON', 'Yum', '65.00', 'tcl.jpg', 1, 1, 2),
(32, 'ROAST PORK', 'Garnish', '65.00', 'rp.jpg', 1, 1, 2),
(33, 'BUTTERED CORN & CARROTS', 'Corny', '40.00', 'bcc.jpg', 1, 1, 5),
(34, 'CHOPSUEY', 'Tasty', '30.00', 'ch.jpg', 1, 1, 5),
(35, 'GREENPEAS W/ QUAIL EGGS', 'Healthy', '35.00', 'gqe.jpg', 1, 1, 5),
(36, 'LUMPIA UBOD', 'Yum', '30.00', 'lub.jpe', 1, 1, 5),
(37, 'MIXED VEGETABLES W/ OYSTER SAUCE', 'Healthy', '25.00', 'mv.jpg', 1, 1, 5),
(38, 'BAKED MACARONI', 'Creamy', '110.00', 'bm.jpg', 1, 0, 9),
(39, 'CANTON W/ SOTANGHON', 'Flavorful', '180.00', 'cws.jpg', 1, 1, 9),
(40, 'CARBONARA', 'Creamy', '200.00', 'car.jpe', 1, 1, 9),
(41, 'SPAGHETTI', 'Tasty', '120.00', 'sp.jpg', 1, 1, 9),
(42, 'BUKO PANDAN', 'Sweet', '15.00', 'bpa.jpg', 1, 1, 6),
(43, 'FRUIT SALAD', 'Fruity', '20.00', 'frs.jpg', 1, 1, 6),
(44, 'GELATIN', 'Fluffy', '10.00', 'gel.jpg', 1, 1, 6),
(45, 'PASTRIES', 'Heavenly', '25.00', 'pastry - Copy.jpg', 1, 1, 6),
(46, 'FRESH FRUITS IN SEASON                 ', 'Fresh', '20.00', 'fr.jpg', 1, 1, 6),
(47, 'ICE TEA', 'Refreshing', '10.00', 'ict.jpg', 1, 1, 7),
(48, 'ORANGE JUICE', 'Refreshing', '10.00', 'oju.jpe', 1, 1, 7),
(49, 'SOFTDRINKS', 'Refreshing', '15.00', '1.jpg', 1, 0, 7),
(50, 'JAVA RICE', 'Satisfying', '20.00', 'jrice.jpg', 1, 1, 8),
(51, 'FRIED RICE', 'Edible', '100.00', 'frice.jpg', 1, 1, 8),
(52, 'PLAIN RICE', 'Tasty', '50.00', 'price.jpg', 1, 1, 8),
(53, 'nilagang', 'matigas', '20.00', '5main.jpg', 0, 1, 11),
(54, 'Lamb Chops', 'kambing', '150.00', 'mic.jpg', 1, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `employeeadditional_tbl`
--

CREATE TABLE `employeeadditional_tbl` (
  `employeeAdditionalID` int(5) NOT NULL,
  `employeeAdditionalQty` int(5) NOT NULL,
  `employeeAdditionalNotes` varchar(250) DEFAULT NULL,
  `reservationID` int(5) NOT NULL,
  `employeeTypeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeeadditional_tbl`
--

INSERT INTO `employeeadditional_tbl` (`employeeAdditionalID`, `employeeAdditionalQty`, `employeeAdditionalNotes`, `reservationID`, `employeeTypeID`) VALUES
(1, 1, NULL, 1, 2),
(2, 2, NULL, 3, 2),
(3, 1, NULL, 9, 1),
(4, 4, NULL, 11, 2),
(5, 1, NULL, 14, 2),
(6, 1, 'Galingan mo', 16, 3),
(7, 12, NULL, 17, 2),
(8, 5, NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employeeemployed_tbl`
--

CREATE TABLE `employeeemployed_tbl` (
  `employeeEmployedID` int(5) NOT NULL,
  `employeeTypeID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeemployed_tbl`
--

INSERT INTO `employeeemployed_tbl` (`employeeEmployedID`, `employeeTypeID`, `reservationID`) VALUES
(1, 2, 1),
(2, 6, 1),
(3, 7, 1),
(4, 2, 2),
(5, 6, 2),
(6, 7, 2),
(7, 6, 3),
(8, 7, 3),
(9, 6, 4),
(10, 7, 4),
(11, 6, 5),
(12, 7, 5),
(13, 5, 6),
(14, 7, 6),
(15, 6, 7),
(16, 7, 7),
(17, 5, 8),
(18, 7, 8),
(19, 2, 9),
(20, 6, 9),
(21, 7, 9),
(22, 6, 10),
(23, 7, 10),
(24, 6, 11),
(25, 7, 11),
(26, 6, 12),
(27, 7, 12),
(28, 6, 13),
(29, 7, 13),
(30, 5, 14),
(31, 7, 14),
(32, 2, 15),
(33, 7, 15),
(34, 6, 16),
(35, 7, 16),
(36, 1, 17),
(37, 5, 17),
(38, 1, 1),
(39, 5, 1),
(40, 1, 2),
(41, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employeetype_tbl`
--

CREATE TABLE `employeetype_tbl` (
  `employeeTypeID` int(5) NOT NULL,
  `employeeTypeName` varchar(100) NOT NULL,
  `employeeTypeDescription` varchar(200) NOT NULL,
  `employeeRatePerHour` decimal(7,2) NOT NULL,
  `employeeTypeImage` varchar(100) NOT NULL,
  `employeeTypeStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeetype_tbl`
--

INSERT INTO `employeetype_tbl` (`employeeTypeID`, `employeeTypeName`, `employeeTypeDescription`, `employeeRatePerHour`, `employeeTypeImage`, `employeeTypeStatus`) VALUES
(1, 'Clown', 'None', '400.00', 'clowns.jpg', 1),
(2, 'Skirter', 'None', '300.00', 'skirt.png', 1),
(3, 'MC', 'None', '500.00', 'mc.jpg', 1),
(5, 'Head Chef', 'None', '750.00', 'headchef.jpg', 1),
(6, 'Chef/s', 'None', '500.00', 'chef.jpg', 1),
(7, 'Event Planner', 'None', '600.00', 'eventplanner.jpg', 1),
(8, 'Driver', 'None', '500.00', 'driver.jpg', 1),
(9, 'Waiter', 'None', '300.00', 'waiter.jpg', 1),
(10, 'taga kain', 'None', '200.00', 'No Image', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

CREATE TABLE `employee_tbl` (
  `employeeID` int(5) NOT NULL,
  `employeeName` varchar(100) NOT NULL,
  `employeeImage` varchar(100) NOT NULL,
  `employeeAvailability` int(1) NOT NULL,
  `employeeStatus` int(1) NOT NULL,
  `employeeTypeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipmentadditional_tbl`
--

CREATE TABLE `equipmentadditional_tbl` (
  `equipmentAdditionalID` int(5) NOT NULL,
  `equipmentAdditionalQty` int(5) NOT NULL,
  `equipmentAdditionalDesc` varchar(250) DEFAULT NULL,
  `equipmentAdditionalNotes` varchar(250) DEFAULT NULL,
  `equipmentID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipmentadditional_tbl`
--

INSERT INTO `equipmentadditional_tbl` (`equipmentAdditionalID`, `equipmentAdditionalQty`, `equipmentAdditionalDesc`, `equipmentAdditionalNotes`, `equipmentID`, `reservationID`) VALUES
(1, 3, NULL, NULL, 25, 1),
(2, 2, NULL, NULL, 25, 3),
(3, 5, NULL, NULL, 25, 9),
(4, 20, NULL, NULL, 28, 9),
(5, 3, NULL, NULL, 25, 10),
(6, 4, NULL, NULL, 26, 11),
(7, 10, NULL, NULL, 30, 12),
(8, 2, NULL, NULL, 49, 13),
(9, 4, NULL, NULL, 34, 14),
(10, 12, NULL, NULL, 25, 17),
(11, 5, NULL, NULL, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipmentavailed_tbl`
--

CREATE TABLE `equipmentavailed_tbl` (
  `equipmentAvailedID` int(5) NOT NULL,
  `equipmentID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipmentavailed_tbl`
--

INSERT INTO `equipmentavailed_tbl` (`equipmentAvailedID`, `equipmentID`, `reservationID`) VALUES
(1, 25, 1),
(2, 26, 1),
(3, 27, 1),
(4, 28, 1),
(5, 25, 2),
(6, 26, 2),
(7, 27, 2),
(8, 28, 2),
(9, 25, 3),
(10, 26, 3),
(11, 27, 3),
(12, 25, 4),
(13, 26, 4),
(14, 27, 4),
(15, 25, 5),
(16, 26, 5),
(17, 27, 5),
(18, 25, 6),
(19, 26, 6),
(20, 27, 6),
(21, 28, 6),
(22, 25, 7),
(23, 26, 7),
(24, 27, 7),
(25, 25, 8),
(26, 26, 8),
(27, 27, 8),
(28, 28, 8),
(29, 25, 9),
(30, 26, 9),
(31, 27, 9),
(32, 28, 9),
(33, 25, 10),
(34, 26, 10),
(35, 27, 10),
(36, 25, 11),
(37, 26, 11),
(38, 27, 11),
(39, 25, 12),
(40, 26, 12),
(41, 27, 12),
(42, 25, 13),
(43, 26, 13),
(44, 27, 13),
(45, 25, 14),
(46, 26, 14),
(47, 27, 14),
(48, 28, 14),
(49, 25, 15),
(50, 26, 15),
(51, 27, 15),
(52, 25, 16),
(53, 26, 16),
(54, 27, 16),
(55, 27, 17),
(56, 32, 17),
(57, 33, 17),
(58, 34, 17),
(59, 48, 17),
(60, 27, 1),
(61, 32, 1),
(62, 33, 1),
(63, 34, 1),
(64, 48, 1),
(65, 27, 2),
(66, 32, 2),
(67, 33, 2),
(68, 34, 2),
(69, 48, 2);

-- --------------------------------------------------------

--
-- Table structure for table `equipmentlog_tbl`
--

CREATE TABLE `equipmentlog_tbl` (
  `equipmentLogID` int(5) NOT NULL,
  `equipmentID` int(5) NOT NULL,
  `equipmentQuantityIn` int(8) NOT NULL,
  `equipmentQuantityOut` int(8) NOT NULL,
  `equipmentLogDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipmentlog_tbl`
--

INSERT INTO `equipmentlog_tbl` (`equipmentLogID`, `equipmentID`, `equipmentQuantityIn`, `equipmentQuantityOut`, `equipmentLogDate`) VALUES
(26, 25, 90, 0, '2017-10-16 23:54:02'),
(27, 26, 90, 0, '2017-10-16 23:55:19'),
(28, 27, 30, 0, '2017-10-16 23:56:27'),
(29, 28, 500, 0, '2017-10-16 23:57:31'),
(30, 29, 400, 0, '2017-10-16 23:59:03'),
(31, 30, 300, 0, '2017-10-17 00:00:00'),
(32, 25, 0, 3, '2017-11-04 08:02:09'),
(33, 26, 0, 10, '2017-11-04 08:02:09'),
(34, 27, 0, 20, '2017-11-04 08:02:09'),
(35, 28, 0, 10, '2017-11-04 08:02:09'),
(36, 25, 3, 0, '2017-11-07 00:00:00'),
(37, 26, 4, 0, '2017-11-07 00:00:00'),
(38, 27, 4, 0, '2017-11-07 00:00:00'),
(39, 28, 4, 0, '2017-11-07 00:00:00'),
(40, 25, 0, 4, '2017-11-04 08:39:23'),
(41, 26, 0, 3, '2017-11-04 08:39:23'),
(42, 27, 0, 4, '2017-11-04 08:39:23'),
(43, 25, 1, 0, '2017-11-07 00:00:00'),
(44, 26, 1, 0, '2017-11-07 00:00:00'),
(45, 27, 2, 0, '2017-11-07 00:00:00'),
(46, 25, 0, 4, '2017-11-01 10:25:40'),
(47, 26, 0, 4, '2017-11-01 10:25:40'),
(48, 27, 0, 4, '2017-11-01 10:25:40'),
(49, 25, 0, 4, '2017-11-01 10:25:40'),
(50, 25, 2, 0, '2017-11-04 00:00:00'),
(51, 25, 2, 0, '2017-11-04 00:00:00'),
(52, 26, 2, 0, '2017-11-04 00:00:00'),
(53, 27, 2, 0, '2017-11-04 00:00:00'),
(54, 25, 0, 3, '2017-11-03 12:02:52'),
(55, 26, 0, 2, '2017-11-03 12:02:52'),
(56, 27, 0, 3, '2017-11-03 12:02:52'),
(57, 25, 0, 4, '2017-11-03 12:02:52'),
(58, 25, 2, 0, '2017-11-06 00:00:00'),
(59, 25, 2, 0, '2017-11-06 00:00:00'),
(60, 26, 1, 0, '2017-11-06 00:00:00'),
(61, 27, 3, 0, '2017-11-06 00:00:00'),
(62, 25, 30, 0, '2017-10-17 16:04:08'),
(63, 31, 25, 0, '2017-10-17 16:05:10'),
(64, 25, 0, 6, '2017-11-26 16:23:55'),
(65, 26, 0, 3, '2017-11-26 16:23:55'),
(66, 27, 0, 5, '2017-11-26 16:23:55'),
(67, 28, 0, 6, '2017-11-26 16:23:56'),
(68, 32, 1000, 0, '2017-10-17 16:34:41'),
(69, 33, 1000, 0, '2017-10-17 16:35:20'),
(70, 34, 50, 0, '2017-10-17 16:36:07'),
(71, 35, 70, 0, '2017-10-17 16:37:42'),
(72, 36, 100, 0, '2017-11-19 16:39:22'),
(73, 37, 700, 0, '2017-11-19 16:42:46'),
(74, 38, 150, 0, '2017-11-19 16:44:24'),
(75, 39, 100, 0, '2017-11-19 16:45:09'),
(76, 40, 35, 0, '2017-11-19 16:48:15'),
(77, 41, 30, 0, '2017-11-19 16:49:01'),
(78, 42, 25, 0, '2017-11-19 16:49:52'),
(79, 43, 2, 0, '2017-11-19 16:51:47'),
(80, 44, 2, 0, '2017-11-19 16:52:30'),
(81, 45, 5, 0, '2017-11-19 16:53:07'),
(82, 46, 10, 0, '2017-11-19 16:54:13'),
(83, 47, 100, 0, '2017-11-19 16:55:10'),
(84, 48, 4, 0, '2017-11-19 16:55:52'),
(85, 49, 10, 0, '2017-11-19 16:56:35'),
(86, 50, 1, 0, '2017-10-17 18:19:50'),
(87, 27, 0, 21, '2017-11-06 23:45:12'),
(88, 25, 0, 12, '2017-11-06 23:45:12'),
(89, 26, 0, 43, '2017-11-06 23:45:12'),
(90, 27, 0, 4, '2017-11-06 23:45:12'),
(91, 27, 0, 4, '2017-11-07 00:05:11'),
(92, 25, 0, 3, '2017-11-07 00:05:11'),
(93, 26, 0, 3, '2017-11-07 00:05:11'),
(94, 27, 0, 4, '2017-11-07 00:06:53'),
(95, 25, 0, 3, '2017-11-07 00:06:53'),
(96, 26, 0, 3, '2017-11-07 00:06:53'),
(97, 27, 0, 7, '2017-11-07 00:08:11'),
(98, 25, 0, 32, '2017-11-07 00:08:12'),
(99, 26, 0, 23, '2017-11-07 00:08:12'),
(100, 27, 0, 2, '2017-11-07 00:08:12'),
(101, 27, 9, 0, '2017-11-10 00:00:00'),
(102, 27, 77, 0, '2017-11-10 00:00:00'),
(103, 27, 0, 0, '2017-11-10 00:00:00'),
(104, 27, 0, 0, '2017-11-07 00:54:34'),
(105, 25, 0, 0, '2017-11-07 00:54:34'),
(106, 26, 0, 0, '2017-11-07 00:54:34'),
(107, 27, 0, 2, '2017-11-07 00:54:34'),
(108, 25, 1, 0, '2017-11-10 00:00:00'),
(109, 26, 7, 0, '2017-11-10 00:00:00'),
(110, 27, 20, 0, '2017-11-10 00:00:00'),
(111, 28, 2, 0, '2017-11-10 00:00:00'),
(116, 27, -100, 100, '2017-11-03 04:17:51'),
(117, 28, -100, 100, '2017-11-03 04:17:51'),
(118, 25, -100, 100, '2017-11-03 04:17:51'),
(119, 26, -100, 100, '2017-11-03 04:17:52'),
(120, 27, 99, -99, '2017-11-10 00:00:00'),
(121, 28, 99, -99, '2017-11-10 00:00:00'),
(122, 25, 99, -99, '2017-11-10 00:00:00'),
(123, 26, 99, -99, '2017-11-10 00:00:00'),
(134, 27, -100, 100, '2017-11-21 04:55:06'),
(135, 28, -100, 100, '2017-11-21 04:55:06'),
(136, 25, -100, 100, '2017-11-21 04:55:06'),
(137, 26, -100, 100, '2017-11-21 04:55:07'),
(138, 27, -10, 10, '2017-11-21 04:55:07'),
(139, 27, 100, -100, '2017-11-24 04:56:11'),
(140, 28, 100, -100, '2017-11-24 04:56:11'),
(141, 25, 100, -100, '2017-11-24 04:56:11'),
(142, 26, 100, -100, '2017-11-24 04:56:12'),
(143, 27, 10, -10, '2017-11-24 04:56:12'),
(144, 27, -40, 40, '2017-11-30 07:38:25'),
(145, 25, -20, 20, '2017-11-30 07:38:26'),
(146, 26, -20, 20, '2017-11-30 07:38:26'),
(147, 27, 40, -40, '2017-12-06 00:00:00'),
(148, 25, 20, -20, '2017-12-06 00:00:00'),
(149, 26, 10, -10, '2017-12-06 00:00:00'),
(150, 33, -100, 100, '2018-03-12 15:43:34'),
(151, 34, -50, 50, '2018-03-12 15:43:34'),
(152, 27, -46, 46, '2018-03-12 15:43:34'),
(153, 32, -100, 100, '2018-03-12 15:43:34'),
(154, 48, -2, 2, '2018-03-12 15:43:34'),
(155, 33, -5, 5, '2018-03-12 15:43:34'),
(156, 34, -3, 3, '2018-03-12 15:43:34'),
(157, 33, 90, -90, '2018-03-18 00:00:00'),
(158, 34, 40, -40, '2018-03-18 00:00:00'),
(159, 27, 40, -40, '2018-03-18 00:00:00'),
(160, 32, 90, -90, '2018-03-18 00:00:00'),
(161, 48, 2, -2, '2018-03-18 00:00:00'),
(162, 33, 5, -5, '2018-03-18 00:00:00'),
(163, 34, 3, -3, '2018-03-18 00:00:00'),
(164, 33, -100, 100, '2018-04-01 14:53:53'),
(165, 34, -40, 40, '2018-04-01 14:53:53'),
(166, 27, -140, 140, '2018-04-01 14:53:54'),
(167, 32, -990, 990, '2018-04-01 14:53:54'),
(168, 48, -4, 4, '2018-04-01 14:53:54'),
(169, 33, 100, -100, '2018-04-05 14:57:57'),
(170, 34, 40, -40, '2018-04-05 14:57:57'),
(171, 27, 140, -140, '2018-04-05 14:57:57'),
(172, 32, 990, -990, '2018-04-05 14:57:57'),
(173, 48, 4, -4, '2018-04-05 14:57:57'),
(174, 33, -100, 100, '2018-04-01 15:04:56'),
(175, 34, -20, 20, '2018-04-01 15:04:56'),
(176, 27, -40, 40, '2018-04-01 15:04:56'),
(177, 32, -90, 90, '2018-04-01 15:04:56'),
(178, 48, -4, 4, '2018-04-01 15:04:56'),
(179, 33, 10, -10, '2018-04-09 00:00:00'),
(180, 34, 10, -10, '2018-04-09 00:00:00'),
(181, 27, 10, -10, '2018-04-09 00:00:00'),
(182, 32, 10, -10, '2018-04-09 00:00:00'),
(183, 48, 4, -4, '2018-04-09 00:00:00'),
(184, 33, -100, 100, '2018-04-03 15:09:37'),
(185, 34, -10, 10, '2018-04-03 15:09:37'),
(186, 27, -10, 10, '2018-04-03 15:09:37'),
(187, 32, -10, 10, '2018-04-03 15:09:37'),
(188, 48, -4, 4, '2018-04-03 15:09:37'),
(189, 33, 90, -90, '2018-04-08 00:00:00'),
(190, 34, 0, 0, '2018-04-08 00:00:00'),
(191, 27, 0, 0, '2018-04-08 00:00:00'),
(192, 32, 0, 0, '2018-04-08 00:00:00'),
(193, 48, 4, -4, '2018-04-08 00:00:00'),
(194, 33, -10, 10, '2018-04-01 15:17:20'),
(195, 34, -10, 10, '2018-04-01 15:17:20'),
(196, 27, -10, 10, '2018-04-01 15:17:20'),
(197, 32, -10, 10, '2018-04-01 15:17:20'),
(198, 48, -4, 4, '2018-04-01 15:17:20'),
(199, 33, 10, -10, '2018-04-05 15:18:10'),
(200, 34, 10, -10, '2018-04-05 15:18:10'),
(201, 27, 10, -10, '2018-04-05 15:18:10'),
(202, 32, 10, -10, '2018-04-05 15:18:10'),
(203, 48, 4, -4, '2018-04-05 15:18:11'),
(204, 33, -10, 10, '2018-04-01 15:20:04'),
(205, 34, -10, 10, '2018-04-01 15:20:05'),
(206, 27, -10, 10, '2018-04-01 15:20:05'),
(207, 32, -10, 10, '2018-04-01 15:20:05'),
(208, 48, -4, 4, '2018-04-01 15:20:05'),
(209, 33, 10, -10, '2018-04-08 00:00:00'),
(210, 34, 10, -10, '2018-04-08 00:00:00'),
(211, 27, 10, -10, '2018-04-08 00:00:00'),
(212, 32, 0, 0, '2018-04-08 00:00:00'),
(213, 48, 4, -4, '2018-04-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `equipmenttype_tbl`
--

CREATE TABLE `equipmenttype_tbl` (
  `equipmentTypeID` int(5) NOT NULL,
  `equipmentTypeName` varchar(50) NOT NULL,
  `equipmentTypeStatus` int(11) NOT NULL,
  `equipmentTypeImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipmenttype_tbl`
--

INSERT INTO `equipmenttype_tbl` (`equipmentTypeID`, `equipmentTypeName`, `equipmentTypeStatus`, `equipmentTypeImage`) VALUES
(1, 'Tables', 1, 'No Image'),
(2, 'Chairs', 1, 'No Image'),
(3, 'Plate', 0, 'No Image'),
(4, 'Utensils', 1, 'No Image'),
(5, 'Plate', 1, 'No Image'),
(6, 'Platito', 1, 'No Image'),
(7, 'Chaffing dish', 1, 'No Image'),
(8, 'Lights', 1, 'No Image'),
(9, 'Vases', 1, 'No Image'),
(10, 'Torch', 1, 'No Image'),
(11, 'Fountain', 1, 'No Image'),
(12, 'Sounds', 0, 'No Image'),
(13, 'Sounds', 1, 'No Image'),
(14, 'Transportation', 1, 'No Image'),
(15, 'plangana', 1, 'No Image');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_tbl`
--

CREATE TABLE `equipment_tbl` (
  `equipmentID` int(5) NOT NULL,
  `equipmentName` varchar(100) NOT NULL,
  `equipmentDescription` varchar(200) NOT NULL,
  `equipmentRatePerHour` decimal(7,2) NOT NULL,
  `equipmentImage` varchar(100) NOT NULL,
  `equipmentAvailability` int(1) NOT NULL,
  `equipmentStatus` int(1) NOT NULL,
  `equipmentTypeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_tbl`
--

INSERT INTO `equipment_tbl` (`equipmentID`, `equipmentName`, `equipmentDescription`, `equipmentRatePerHour`, `equipmentImage`, `equipmentAvailability`, `equipmentStatus`, `equipmentTypeID`) VALUES
(25, 'Round table', 'Pabilog', '501.00', 'round table.jpg', 1, 1, 1),
(26, 'Square table', 'Wide', '200.00', 'square table.jpg', 1, 1, 1),
(27, 'Rectangle Table', 'WIde table', '300.00', 'rectangle table.jpg', 1, 1, 1),
(28, 'Round plate', 'For main food', '30.00', 'round palte.jpg', 1, 1, 5),
(29, 'Square Plate', 'pasquare', '30.00', 'square plate.jpg', 1, 1, 14),
(30, 'Dessert plate', 'maliit', '30.00', 'dessert.jpg', 1, 1, 6),
(31, 'Round table', 'PABIBO', '30.00', 'round table.jpg', 1, 1, 5),
(32, 'Spoon', 'kitchen', '30.00', 'spoom.jpg', 1, 1, 4),
(33, 'Fork', 'kitchen', '30.00', 'fork.jpg', 1, 1, 4),
(34, 'Knives', 'sharp', '40.00', 'knife.jpg', 1, 1, 4),
(35, 'Big Bowl', 'for soup', '40.00', 'big bowl.jpg', 1, 1, 5),
(36, 'Big Oval Bowl', 'mas malalim', '55.00', 'oval bowl.jpg', 1, 1, 5),
(37, 'Glass', 'fragile', '15.00', 'glass.jpg', 1, 1, 4),
(38, 'Pitcher', 'Plastic/Stainless', '15.00', 'pitcher.jpg', 1, 1, 4),
(39, 'Chafing Dish', 'for food', '55.00', 'chafing dish.jpg', 1, 1, 4),
(40, 'Square Light', 'dazzling', '50.00', 'light-square.jpg', 1, 1, 8),
(41, 'Rectangle light', 'dazzling', '20.00', 'lights.jpg', 1, 1, 8),
(42, 'Circle lights', 'mailaw', '50.00', 'circle.jpg', 1, 1, 8),
(43, 'Speakers', 'boomboom', '500.00', 'speaker.jpg', 1, 1, 13),
(44, 'Mixers', 'DJ', '300.00', 'mixer.jpg', 1, 1, 13),
(45, 'Bass Subwoofers', 'boom', '400.00', 'bass.jpg', 1, 1, 13),
(46, 'Mic', 'loud', '100.00', 'mic.jpg', 1, 1, 13),
(47, 'LED Full colors', 'maliwanag', '30.00', 'led.jpg', 1, 1, 8),
(48, 'Spotlight', 'stage light', '500.00', 'spotlight.jpg', 1, 1, 8),
(49, 'Laser', 'party lights', '550.00', 'laser.jpg', 1, 1, 8),
(50, 'Van', 'toyota', '1000.00', 'transpo.jpg', 1, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `eventtype_tbl`
--

CREATE TABLE `eventtype_tbl` (
  `eventTypeID` int(5) NOT NULL,
  `eventTypeName` varchar(100) NOT NULL,
  `eventTypeDescription` varchar(200) NOT NULL,
  `eventTypeAvailability` int(1) NOT NULL,
  `eventTypeStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventtype_tbl`
--

INSERT INTO `eventtype_tbl` (`eventTypeID`, `eventTypeName`, `eventTypeDescription`, `eventTypeAvailability`, `eventTypeStatus`) VALUES
(1, 'Birthdays', 'masayang masaya', 1, 0),
(2, 'Wedding', 'Masaya lang', 1, 1),
(3, 'Christening', 'masaya', 1, 1),
(4, 'Birthday', 'Party', 1, 1),
(5, 'Reunion', 'masaya', 1, 1),
(6, 'Debut', 'elegant', 1, 1),
(7, 'Graduation', 'later', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE `event_tbl` (
  `eventID` int(5) NOT NULL,
  `eventName` varchar(100) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `eventLocation` varchar(150) DEFAULT NULL,
  `guestCount` int(5) NOT NULL,
  `eventStatus` int(1) NOT NULL,
  `customerID` int(5) NOT NULL,
  `locationID` int(5) DEFAULT NULL,
  `eventTypeID` int(5) NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_tbl`
--

INSERT INTO `event_tbl` (`eventID`, `eventName`, `eventDate`, `eventTime`, `eventLocation`, `guestCount`, `eventStatus`, `customerID`, `locationID`, `eventTypeID`, `endTime`) VALUES
(9, 'patz kasal', '2017-11-04', '07:00:00', 'sa pup chapel', 200, 2, 9, NULL, 2, '18:00:00'),
(10, 'bernard binyagaan', '2017-11-07', '08:30:00', NULL, 100, 2, 10, 1, 3, '18:15:00'),
(11, 'kasal mo to', '2017-11-07', '07:00:00', NULL, 100, 1, 11, 1, 2, '19:00:00'),
(12, 'ssdfds', '2017-10-31', '12:59:00', 'dsfdf', 100, 2, 12, NULL, 2, '20:59:00'),
(13, 'asdasdas', '2017-11-30', '13:00:00', 'fuck', 100, 1, 13, NULL, 2, '18:00:00'),
(14, 'birthda ni nards', '2017-11-06', '12:00:00', 'fuck', 100, 2, 14, NULL, 2, '17:00:00'),
(15, 'sadasd', '2017-11-30', '12:00:00', 'asasdas', 200, 1, 12, NULL, 2, '17:00:00'),
(16, 'Christening ni POgi', '2017-11-29', '13:00:00', 'asdasdas', 100, 2, 12, NULL, 3, '18:00:00'),
(17, 'birthday ni kumag', '2017-11-15', '07:00:00', 'sa bahay', 100, 1, 15, NULL, 2, '19:00:00'),
(18, 'birthday mo to', '2017-11-03', '14:00:00', NULL, 200, 2, 16, 1, 3, '19:00:00'),
(19, 'binyag ni papa mo', '2017-11-18', '09:30:00', NULL, 130, 1, 17, 1, 2, '18:00:00'),
(20, 'birthday ni mama mo', '2017-11-27', '09:30:00', 'sa bahay namen', 200, 1, 18, NULL, 4, '17:40:00'),
(21, 'debut ni ate mo', '2017-11-17', '09:10:00', 'maui oasis', 205, 1, 19, NULL, 6, '17:00:00'),
(22, 'kita kita', '2017-11-24', '08:30:00', 'sa hotel', 230, 2, 20, NULL, 5, '17:00:00'),
(23, 'birthday ni badong', '2017-12-13', '12:00:00', 'sa maui', 120, 1, 21, NULL, 4, '19:00:00'),
(24, 'Graduation ni Pogi', '2017-12-02', '07:00:00', 'PICC', 400, 2, 22, NULL, 7, '15:00:00'),
(25, 'Sample Event 2018', '2018-03-05', '13:00:00', 'Market Market', 150, 1, 23, NULL, 3, '19:00:00'),
(26, 'Sample Wedding', '2018-03-15', '13:00:00', 'Makati', 100, 2, 24, NULL, 2, '19:00:00'),
(27, 'My Graduation', '2018-04-05', '12:00:00', NULL, 100, 2, 24, 3, 7, '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location_tbl`
--

CREATE TABLE `location_tbl` (
  `locationID` int(5) NOT NULL,
  `locationName` varchar(100) NOT NULL,
  `locationDescription` varchar(200) NOT NULL,
  `locationContactPerson` varchar(100) NOT NULL,
  `locationContactNumber` varchar(13) NOT NULL,
  `locationCapacity` int(7) NOT NULL,
  `locationAddress` varchar(200) NOT NULL,
  `locationImage` varchar(100) NOT NULL,
  `locationAvailability` int(1) NOT NULL,
  `locationStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_tbl`
--

INSERT INTO `location_tbl` (`locationID`, `locationName`, `locationDescription`, `locationContactPerson`, `locationContactNumber`, `locationCapacity`, `locationAddress`, `locationImage`, `locationAvailability`, `locationStatus`) VALUES
(1, 'PUP', 'school', 'bernard malabanan', '09123123124', 300, '123 asfafewas', '3.jpg', 1, 1),
(2, 'hotel', 'asdsa', 'asdsa', '09123123124', 200, 'adsa', '22141252_1673267829374424_8811195352502196101_n.jpg', 1, 0),
(3, 'Manila Hotel', 'can accomodate upto 300 person', 'Bernard Malabanan', '0911223445', 300, 'anonas manila', '5.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `packageavailed_tbl`
--

CREATE TABLE `packageavailed_tbl` (
  `packageAvailedID` int(5) NOT NULL,
  `packageID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `packageinclusion_tbl`
--

CREATE TABLE `packageinclusion_tbl` (
  `packageInclusionID` int(5) NOT NULL,
  `packageID` int(5) NOT NULL,
  `dishTypeID` int(5) DEFAULT NULL,
  `serviceID` int(5) DEFAULT NULL,
  `equipmentID` int(5) DEFAULT NULL,
  `employeeTypeID` int(5) DEFAULT NULL,
  `packageInclusionStatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packageinclusion_tbl`
--

INSERT INTO `packageinclusion_tbl` (`packageInclusionID`, `packageID`, `dishTypeID`, `serviceID`, `equipmentID`, `employeeTypeID`, `packageInclusionStatus`) VALUES
(204, 6, 1, NULL, NULL, NULL, 1),
(205, 6, 2, NULL, NULL, NULL, 1),
(206, 6, 4, NULL, NULL, NULL, 1),
(207, 6, 5, NULL, NULL, NULL, 1),
(208, 6, 6, NULL, NULL, NULL, 1),
(209, 6, 7, NULL, NULL, NULL, 1),
(210, 6, 8, NULL, NULL, NULL, 1),
(211, 6, NULL, NULL, NULL, 5, 1),
(212, 6, NULL, NULL, NULL, 7, 1),
(213, 6, NULL, NULL, 25, NULL, 1),
(214, 6, NULL, NULL, 26, NULL, 1),
(215, 6, NULL, NULL, 27, NULL, 1),
(216, 6, NULL, NULL, 28, NULL, 1),
(217, 6, NULL, 8, NULL, NULL, 1),
(218, 6, NULL, 9, NULL, NULL, 1),
(219, 7, 1, NULL, NULL, NULL, 1),
(220, 7, 4, NULL, NULL, NULL, 1),
(221, 7, 5, NULL, NULL, NULL, 1),
(222, 7, 6, NULL, NULL, NULL, 1),
(223, 7, 7, NULL, NULL, NULL, 1),
(224, 7, 8, NULL, NULL, NULL, 1),
(225, 7, NULL, NULL, NULL, 6, 1),
(226, 7, NULL, NULL, NULL, 7, 1),
(227, 7, NULL, NULL, 25, NULL, 1),
(228, 7, NULL, NULL, 26, NULL, 1),
(229, 7, NULL, NULL, 27, NULL, 1),
(230, 7, NULL, 8, NULL, NULL, 1),
(231, 7, NULL, 9, NULL, NULL, 1),
(246, 5, 1, NULL, NULL, NULL, 1),
(247, 5, 2, NULL, NULL, NULL, 1),
(248, 5, 3, NULL, NULL, NULL, 1),
(249, 5, 4, NULL, NULL, NULL, 1),
(250, 5, 5, NULL, NULL, NULL, 1),
(251, 5, 6, NULL, NULL, NULL, 1),
(252, 5, 7, NULL, NULL, NULL, 1),
(253, 5, NULL, NULL, NULL, 2, 1),
(254, 5, NULL, NULL, NULL, 7, 1),
(255, 5, NULL, NULL, 25, NULL, 1),
(256, 5, NULL, NULL, 26, NULL, 1),
(257, 5, NULL, NULL, 27, NULL, 1),
(258, 5, NULL, 8, NULL, NULL, 1),
(259, 5, NULL, 9, NULL, NULL, 1),
(260, 8, 1, NULL, NULL, NULL, 1),
(261, 8, 3, NULL, NULL, NULL, 1),
(262, 8, 4, NULL, NULL, NULL, 1),
(263, 8, 5, NULL, NULL, NULL, 1),
(264, 8, 7, NULL, NULL, NULL, 1),
(265, 8, 8, NULL, NULL, NULL, 1),
(266, 8, 12, NULL, NULL, NULL, 1),
(267, 8, NULL, NULL, NULL, 1, 1),
(268, 8, NULL, NULL, NULL, 5, 1),
(269, 8, NULL, NULL, 27, NULL, 1),
(270, 8, NULL, NULL, 32, NULL, 1),
(271, 8, NULL, NULL, 33, NULL, 1),
(272, 8, NULL, NULL, 34, NULL, 1),
(273, 8, NULL, NULL, 48, NULL, 1),
(274, 8, NULL, 4, NULL, NULL, 1),
(275, 8, NULL, 11, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_tbl`
--

CREATE TABLE `package_tbl` (
  `packageID` int(5) NOT NULL,
  `packageName` varchar(150) NOT NULL,
  `packageDescription` varchar(200) NOT NULL,
  `packageCost` decimal(7,2) NOT NULL,
  `packageImage` varchar(100) NOT NULL,
  `packageAvailability` int(1) NOT NULL,
  `packageStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_tbl`
--

INSERT INTO `package_tbl` (`packageID`, `packageName`, `packageDescription`, `packageCost`, `packageImage`, `packageAvailability`, `packageStatus`) VALUES
(5, '5 Main Course', 'complete package', '300.00', '5main.jpg', 1, 1),
(6, '4 Main Course', 'PORK, CHICKEN, FISH, VEGETABLES, RICE, DESSERTS, DRINKS', '250.00', '4main.jpg', 1, 1),
(7, '3 Main Course', 'CHICKEN, FISH, VEGETABLES, RICE, DESSERTS, DRINKS', '200.00', '3main.jpg', 1, 1),
(8, 'The Package', 'the package again pak na pak', '400.00', '1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paymentmode_tbl`
--

CREATE TABLE `paymentmode_tbl` (
  `paymentModeID` int(5) NOT NULL,
  `paymentModeName` varchar(50) NOT NULL,
  `paymentModeIco` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentmode_tbl`
--

INSERT INTO `paymentmode_tbl` (`paymentModeID`, `paymentModeName`, `paymentModeIco`) VALUES
(1, 'Cash', 'ti-money'),
(2, 'Deposit', 'ti-credit-card'),
(3, 'Remittance', 'ti-upload');

-- --------------------------------------------------------

--
-- Table structure for table `paymentterm_tbl`
--

CREATE TABLE `paymentterm_tbl` (
  `paymentTermID` int(5) NOT NULL,
  `paymentTermName` varchar(45) NOT NULL,
  `paymentTermIco` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentterm_tbl`
--

INSERT INTO `paymentterm_tbl` (`paymentTermID`, `paymentTermName`, `paymentTermIco`) VALUES
(1, 'Full Payment', 'ti-heart'),
(2, 'Half Payment', 'ti-heart-broken'),
(3, '70% Payment', 'ti-pie-chart');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `paymentID` int(5) NOT NULL,
  `paymentDueDate` date NOT NULL,
  `paymentReceiveDate` date DEFAULT NULL,
  `paymentAmount` int(8) NOT NULL,
  `paymentStatus` int(1) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseordertype_tbl`
--

CREATE TABLE `purchaseordertype_tbl` (
  `poTypeId` int(5) NOT NULL,
  `poTypeName` varchar(100) NOT NULL,
  `poTypeStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseordertype_tbl`
--

INSERT INTO `purchaseordertype_tbl` (`poTypeId`, `poTypeName`, `poTypeStatus`) VALUES
(1, 'Food', 1),
(2, 'Equipment', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder_tbl`
--

CREATE TABLE `purchaseorder_tbl` (
  `poID` int(5) NOT NULL,
  `poItemName` varchar(100) NOT NULL,
  `poDescription` varchar(200) NOT NULL,
  `poDate` date DEFAULT NULL,
  `poQty` float NOT NULL,
  `poPrice` float NOT NULL,
  `poTypeId` int(5) NOT NULL,
  `poStatus` int(1) NOT NULL,
  `uomID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseorder_tbl`
--

INSERT INTO `purchaseorder_tbl` (`poID`, `poItemName`, `poDescription`, `poDate`, `poQty`, `poPrice`, `poTypeId`, `poStatus`, `uomID`) VALUES
(26, 'Round table', 'Pabilog', '2017-10-16', 90, 50, 2, 1, 2),
(27, 'Square table', 'Wide', '2017-10-16', 90, 30, 2, 1, 2),
(28, 'Rectangle Table', 'WIde table', '2017-10-16', 30, 100, 2, 1, 2),
(29, 'Round plate', 'For main food', '2017-10-16', 500, 28, 2, 1, 2),
(30, 'Square Plate', 'pasquare', '2017-10-16', 400, 30, 2, 1, 2),
(31, 'Dessert plate', 'maliit', '2017-10-17', 300, 10, 2, 1, 2),
(32, '25', 'pa bilog', '2017-10-17', 30, 100, 2, 1, 2),
(33, 'Round table', 'PABIBO', '2017-10-17', 25, 20, 2, 1, 2),
(34, 'Spoon', 'kitchen', '2017-10-17', 1000, 10, 2, 1, 2),
(35, 'Fork', 'kitchen', '2017-10-17', 1000, 12, 2, 1, 2),
(36, 'Knives', 'sharp', '2017-10-17', 50, 50, 2, 1, 2),
(37, 'Big Bowl', 'for soup', '2017-10-17', 70, 20, 2, 1, 2),
(38, 'Big Oval Bowl', 'mas malalim', '2017-11-19', 100, 35, 2, 1, 2),
(39, 'Glass', 'fragile', '2017-11-19', 700, 10, 2, 1, 2),
(40, 'Pitcher', 'Plastic/Stainless', '2017-11-19', 150, 20, 2, 1, 2),
(41, 'Chafing Dish', 'for food', '2017-11-19', 100, 150, 2, 1, 2),
(42, 'Square Light', 'dazzling', '2017-11-19', 35, 100, 2, 1, 2),
(43, 'Rectangle light', 'dazzling', '2017-11-19', 30, 55, 2, 1, 2),
(44, 'Circle lights', 'mailaw', '2017-11-19', 25, 30, 2, 1, 2),
(45, 'Speakers', 'boomboom', '2017-11-19', 2, 500, 2, 1, 2),
(46, 'Mixers', 'DJ', '2017-11-19', 2, 1000, 2, 1, 2),
(47, 'Bass Subwoofers', 'boom', '2017-11-19', 5, 500, 2, 1, 2),
(48, 'Mic', 'loud', '2017-11-19', 10, 100, 2, 1, 2),
(49, 'LED Full colors', 'maliwanag', '2017-11-19', 100, 80, 2, 1, 2),
(50, 'Spotlight', 'stage light', '2017-11-19', 4, 1000, 2, 1, 2),
(51, 'Laser', 'party lights', '2017-11-19', 10, 5000, 2, 1, 2),
(52, 'Van', 'toyota', '2017-10-17', 1, 100000, 2, 1, 2),
(53, 'Baboy', 'marami', '2017-10-19', 3, 200, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_tbl`
--

CREATE TABLE `reservation_tbl` (
  `reservationID` int(5) NOT NULL,
  `reservationStatus` int(1) NOT NULL,
  `eventID` int(5) NOT NULL,
  `paymentModeID` int(5) NOT NULL,
  `paymentTermID` int(5) NOT NULL,
  `packageID` int(5) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `serviceadditional_tbl`
--

CREATE TABLE `serviceadditional_tbl` (
  `serviceAdditionalID` int(5) NOT NULL,
  `serviceAdditionalQty` int(5) NOT NULL,
  `serviceAdditionalDesc` varchar(250) DEFAULT NULL,
  `serviceAdditionalNotes` varchar(250) DEFAULT NULL,
  `reservationID` int(5) NOT NULL,
  `serviceID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serviceadditional_tbl`
--

INSERT INTO `serviceadditional_tbl` (`serviceAdditionalID`, `serviceAdditionalQty`, `serviceAdditionalDesc`, `serviceAdditionalNotes`, `reservationID`, `serviceID`) VALUES
(1, 3, NULL, NULL, 12, 6),
(2, 20, NULL, NULL, 12, 5),
(3, 3, NULL, NULL, 12, 14),
(4, 1, NULL, NULL, 13, 10),
(5, 40, 'lagayan mo ng gumamela', NULL, 16, 8),
(6, 12, NULL, NULL, 17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `serviceavailed_tbl`
--

CREATE TABLE `serviceavailed_tbl` (
  `serviceAvailedID` int(5) NOT NULL,
  `serviceID` int(5) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceavailed_tbl`
--

INSERT INTO `serviceavailed_tbl` (`serviceAvailedID`, `serviceID`, `reservationID`) VALUES
(1, 8, 1),
(2, 9, 1),
(3, 8, 2),
(4, 9, 2),
(5, 8, 3),
(6, 9, 3),
(7, 8, 4),
(8, 9, 4),
(9, 8, 5),
(10, 9, 5),
(11, 8, 6),
(12, 9, 6),
(13, 8, 7),
(14, 9, 7),
(15, 8, 8),
(16, 9, 8),
(17, 8, 9),
(18, 9, 9),
(19, 8, 10),
(20, 9, 10),
(21, 8, 11),
(22, 9, 11),
(23, 8, 12),
(24, 9, 12),
(25, 8, 13),
(26, 9, 13),
(27, 8, 14),
(28, 9, 14),
(29, 8, 15),
(30, 9, 15),
(31, 8, 16),
(32, 9, 16),
(33, 4, 17),
(34, 11, 17),
(35, 4, 1),
(36, 11, 1),
(37, 4, 2),
(38, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `servicetype_tbl`
--

CREATE TABLE `servicetype_tbl` (
  `serviceTypeID` int(5) NOT NULL,
  `serviceTypeName` varchar(100) NOT NULL,
  `serviceTypeAvailability` int(1) NOT NULL,
  `serviceTypeStatus` int(1) NOT NULL,
  `serviceTypeImage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicetype_tbl`
--

INSERT INTO `servicetype_tbl` (`serviceTypeID`, `serviceTypeName`, `serviceTypeAvailability`, `serviceTypeStatus`, `serviceTypeImage`) VALUES
(2, 'Flower arrangement', 1, 1, 'flower.jpeg'),
(4, 'Invitation Card', 1, 1, 'inv.jpg'),
(5, 'Envelope', 1, 1, 'enve.jpg'),
(6, 'Souvenir', 1, 1, 'souv.jpg'),
(7, 'Glass ware set up', 1, 0, '4.jpg'),
(8, 'Gift Table skirting', 1, 0, 'wine.jpg'),
(9, 'Infonts', 1, 1, 'tarp.jpg'),
(10, 'Skirting', 1, 1, 'skirting.jpg'),
(11, 'Set up', 1, 1, '3.jpg'),
(12, 'Balloon', 1, 1, 'balloons.png'),
(13, 'tagabuhat', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_tbl`
--

CREATE TABLE `service_tbl` (
  `serviceID` int(5) NOT NULL,
  `serviceName` varchar(100) NOT NULL,
  `serviceDescription` varchar(200) NOT NULL,
  `serviceFee` decimal(7,2) NOT NULL,
  `serviceImage` varchar(100) NOT NULL,
  `serviceAvailability` int(1) NOT NULL,
  `serviceStatus` int(1) NOT NULL,
  `serviceTypeID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_tbl`
--

INSERT INTO `service_tbl` (`serviceID`, `serviceName`, `serviceDescription`, `serviceFee`, `serviceImage`, `serviceAvailability`, `serviceStatus`, `serviceTypeID`) VALUES
(1, 'Flower set a', 'maganda', '200.00', '17909508_1886576888298023_599710447_n.jpg', 1, 0, 2),
(2, 'Flower set b', 'maganda', '154.50', '19578500_1881198848796768_1289490985_n.jpg', 1, 0, 2),
(3, 'inv', 'ggawa', '145.89', '19578500_1881198848796768_1289490985_n.jpg', 1, 0, 4),
(4, 'Picture invitation', '4rs', '15.00', 'inv.jpg', 1, 1, 4),
(5, 'Single Board', 'sakto lang', '10.00', 'enve.jpg', 1, 1, 5),
(6, 'Souvenir', 'Birthday, Baptismal, Simple Occasion / Event', '30.00', 'souve.jpg', 1, 1, 6),
(7, 'Tapaulin', '16Pesos per sqr ft', '150.00', 'tarp.jpg', 1, 1, 9),
(8, 'Guest table arrange', 'set up', '100.00', '4.jpg', 1, 1, 2),
(9, 'Glassware', 'designing', '1000.00', 'zz.jpg', 1, 1, 11),
(10, 'Arch Style Flower', 'elegant', '450.00', 'arch-flower.jpg', 1, 1, 2),
(11, 'Arch Style Ballon', 'elegant', '1000.00', 'arch-ballon.jpg', 1, 1, 12),
(12, 'Center Table Ballons', 'beautiful', '1500.00', 'center-ballon.jpg', 1, 1, 12),
(13, 'Couples Table Flower', 'stunning', '900.00', 'couple-flower.jpg', 1, 1, 2),
(14, 'Center table Flower', 'great', '1500.00', 'center-flower.jpg', 1, 1, 2),
(15, 'Pillar Style Ballon', 'nice', '750.00', 'pilar-balloon.jpg', 1, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tbl`
--

CREATE TABLE `transaction_tbl` (
  `transactionID` int(5) NOT NULL,
  `transactionStatus` int(1) NOT NULL,
  `totalFee` decimal(10,2) NOT NULL,
  `reservationID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unitmeasurement_tbl`
--

CREATE TABLE `unitmeasurement_tbl` (
  `uomID` int(5) NOT NULL,
  `uomName` varchar(45) NOT NULL,
  `uomStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unitmeasurement_tbl`
--

INSERT INTO `unitmeasurement_tbl` (`uomID`, `uomName`, `uomStatus`) VALUES
(1, 'Kilogram', 1),
(2, 'Piece', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignequipment_tbl`
--
ALTER TABLE `assignequipment_tbl`
  ADD PRIMARY KEY (`assignEquipmentID`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `dishID` (`dishID`),
  ADD KEY `employeeID` (`employeeID`),
  ADD KEY `serviceID` (`serviceID`);

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD PRIMARY KEY (`contactID`),
  ADD KEY `contact_tbl_ibfk_1_idx` (`customerID`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `dishadditional_tbl`
--
ALTER TABLE `dishadditional_tbl`
  ADD PRIMARY KEY (`additionalID`),
  ADD KEY `dishID_idx` (`dishID`),
  ADD KEY `dishavailed_tbl_ibfk_1_idx` (`reservationID`),
  ADD KEY `dishadditional_tbl_ibfk_1_idx` (`reservationID`);

--
-- Indexes for table `dishavailed_tbl`
--
ALTER TABLE `dishavailed_tbl`
  ADD PRIMARY KEY (`dishAvailedID`),
  ADD KEY `dishID` (`dishID`),
  ADD KEY `dishavailed_tbl_ibfk_2_idx` (`reservationID`);

--
-- Indexes for table `dishtype_tbl`
--
ALTER TABLE `dishtype_tbl`
  ADD PRIMARY KEY (`dishTypeID`);

--
-- Indexes for table `dish_tbl`
--
ALTER TABLE `dish_tbl`
  ADD PRIMARY KEY (`dishID`),
  ADD KEY `dishTypeID` (`dishTypeID`);

--
-- Indexes for table `employeeadditional_tbl`
--
ALTER TABLE `employeeadditional_tbl`
  ADD PRIMARY KEY (`employeeAdditionalID`),
  ADD KEY `employeeTypeID_ema_idx` (`employeeTypeID`),
  ADD KEY `reservationID_ema_idx` (`reservationID`);

--
-- Indexes for table `employeeemployed_tbl`
--
ALTER TABLE `employeeemployed_tbl`
  ADD PRIMARY KEY (`employeeEmployedID`),
  ADD KEY `employeeID` (`employeeTypeID`),
  ADD KEY `reservationID` (`reservationID`);

--
-- Indexes for table `employeetype_tbl`
--
ALTER TABLE `employeetype_tbl`
  ADD PRIMARY KEY (`employeeTypeID`);

--
-- Indexes for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `employeeTypeID` (`employeeTypeID`);

--
-- Indexes for table `equipmentadditional_tbl`
--
ALTER TABLE `equipmentadditional_tbl`
  ADD PRIMARY KEY (`equipmentAdditionalID`),
  ADD KEY `equipmentID_idx` (`equipmentID`),
  ADD KEY `reservationID_idx` (`reservationID`);

--
-- Indexes for table `equipmentavailed_tbl`
--
ALTER TABLE `equipmentavailed_tbl`
  ADD PRIMARY KEY (`equipmentAvailedID`),
  ADD KEY `equipmentID` (`equipmentID`),
  ADD KEY `reservationID` (`reservationID`);

--
-- Indexes for table `equipmentlog_tbl`
--
ALTER TABLE `equipmentlog_tbl`
  ADD PRIMARY KEY (`equipmentLogID`),
  ADD KEY `equipmentID` (`equipmentID`);

--
-- Indexes for table `equipmenttype_tbl`
--
ALTER TABLE `equipmenttype_tbl`
  ADD PRIMARY KEY (`equipmentTypeID`);

--
-- Indexes for table `equipment_tbl`
--
ALTER TABLE `equipment_tbl`
  ADD PRIMARY KEY (`equipmentID`),
  ADD KEY `equipmentTypeID` (`equipmentTypeID`);

--
-- Indexes for table `eventtype_tbl`
--
ALTER TABLE `eventtype_tbl`
  ADD PRIMARY KEY (`eventTypeID`);

--
-- Indexes for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `eventTypeID` (`eventTypeID`),
  ADD KEY `locationID` (`locationID`),
  ADD KEY `event_tbl_ibfk_1_idx` (`customerID`);

--
-- Indexes for table `location_tbl`
--
ALTER TABLE `location_tbl`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `packageavailed_tbl`
--
ALTER TABLE `packageavailed_tbl`
  ADD PRIMARY KEY (`packageAvailedID`),
  ADD KEY `packageID_idx` (`packageID`);

--
-- Indexes for table `packageinclusion_tbl`
--
ALTER TABLE `packageinclusion_tbl`
  ADD PRIMARY KEY (`packageInclusionID`),
  ADD KEY `dishTypeID` (`dishTypeID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `serviceID` (`serviceID`),
  ADD KEY `packageinclusion_tbl_ibfk_4_idx` (`equipmentID`),
  ADD KEY `packageinclusion_tbl_ibfk_5_idx` (`employeeTypeID`);

--
-- Indexes for table `package_tbl`
--
ALTER TABLE `package_tbl`
  ADD PRIMARY KEY (`packageID`);

--
-- Indexes for table `paymentmode_tbl`
--
ALTER TABLE `paymentmode_tbl`
  ADD PRIMARY KEY (`paymentModeID`);

--
-- Indexes for table `paymentterm_tbl`
--
ALTER TABLE `paymentterm_tbl`
  ADD PRIMARY KEY (`paymentTermID`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `purchaseordertype_tbl`
--
ALTER TABLE `purchaseordertype_tbl`
  ADD PRIMARY KEY (`poTypeId`);

--
-- Indexes for table `purchaseorder_tbl`
--
ALTER TABLE `purchaseorder_tbl`
  ADD PRIMARY KEY (`poID`),
  ADD KEY `poCategoryId` (`poTypeId`),
  ADD KEY `purchaseorder_tbl_ibfk_2_idx` (`uomID`);

--
-- Indexes for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `eventID` (`eventID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `paymentModeID` (`paymentModeID`),
  ADD KEY `paymentTermID` (`paymentTermID`);

--
-- Indexes for table `serviceadditional_tbl`
--
ALTER TABLE `serviceadditional_tbl`
  ADD PRIMARY KEY (`serviceAdditionalID`),
  ADD KEY `serviceID_idx` (`serviceID`),
  ADD KEY `reservationID_idx` (`reservationID`);

--
-- Indexes for table `serviceavailed_tbl`
--
ALTER TABLE `serviceavailed_tbl`
  ADD PRIMARY KEY (`serviceAvailedID`),
  ADD KEY `reservationID` (`reservationID`),
  ADD KEY `serviceID` (`serviceID`);

--
-- Indexes for table `servicetype_tbl`
--
ALTER TABLE `servicetype_tbl`
  ADD PRIMARY KEY (`serviceTypeID`);

--
-- Indexes for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD PRIMARY KEY (`serviceID`),
  ADD KEY `serviceTypeID` (`serviceTypeID`);

--
-- Indexes for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `unitmeasurement_tbl`
--
ALTER TABLE `unitmeasurement_tbl`
  ADD PRIMARY KEY (`uomID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignequipment_tbl`
--
ALTER TABLE `assignequipment_tbl`
  MODIFY `assignEquipmentID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cartID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dishtype_tbl`
--
ALTER TABLE `dishtype_tbl`
  MODIFY `dishTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `dish_tbl`
--
ALTER TABLE `dish_tbl`
  MODIFY `dishID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `employeetype_tbl`
--
ALTER TABLE `employeetype_tbl`
  MODIFY `employeeTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  MODIFY `employeeID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipmentlog_tbl`
--
ALTER TABLE `equipmentlog_tbl`
  MODIFY `equipmentLogID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;
--
-- AUTO_INCREMENT for table `equipmenttype_tbl`
--
ALTER TABLE `equipmenttype_tbl`
  MODIFY `equipmentTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `equipment_tbl`
--
ALTER TABLE `equipment_tbl`
  MODIFY `equipmentID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `eventtype_tbl`
--
ALTER TABLE `eventtype_tbl`
  MODIFY `eventTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `location_tbl`
--
ALTER TABLE `location_tbl`
  MODIFY `locationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `packageinclusion_tbl`
--
ALTER TABLE `packageinclusion_tbl`
  MODIFY `packageInclusionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;
--
-- AUTO_INCREMENT for table `package_tbl`
--
ALTER TABLE `package_tbl`
  MODIFY `packageID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `paymentmode_tbl`
--
ALTER TABLE `paymentmode_tbl`
  MODIFY `paymentModeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `paymentterm_tbl`
--
ALTER TABLE `paymentterm_tbl`
  MODIFY `paymentTermID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `paymentID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `purchaseordertype_tbl`
--
ALTER TABLE `purchaseordertype_tbl`
  MODIFY `poTypeId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchaseorder_tbl`
--
ALTER TABLE `purchaseorder_tbl`
  MODIFY `poID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `servicetype_tbl`
--
ALTER TABLE `servicetype_tbl`
  MODIFY `serviceTypeID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `service_tbl`
--
ALTER TABLE `service_tbl`
  MODIFY `serviceID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  MODIFY `transactionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `unitmeasurement_tbl`
--
ALTER TABLE `unitmeasurement_tbl`
  MODIFY `uomID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD CONSTRAINT `cart_tbl_ibfk_1` FOREIGN KEY (`dishID`) REFERENCES `dish_tbl` (`dishID`),
  ADD CONSTRAINT `cart_tbl_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employee_tbl` (`employeeID`),
  ADD CONSTRAINT `cart_tbl_ibfk_3` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`);

--
-- Constraints for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD CONSTRAINT `contact_tbl_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer_tbl` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dishadditional_tbl`
--
ALTER TABLE `dishadditional_tbl`
  ADD CONSTRAINT `dishID` FOREIGN KEY (`dishID`) REFERENCES `dish_tbl` (`dishID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dishadditional_tbl_ibfk_1` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dishavailed_tbl`
--
ALTER TABLE `dishavailed_tbl`
  ADD CONSTRAINT `dishavailed_tbl_ibfk_1` FOREIGN KEY (`dishID`) REFERENCES `dish_tbl` (`dishID`),
  ADD CONSTRAINT `dishavailed_tbl_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dish_tbl`
--
ALTER TABLE `dish_tbl`
  ADD CONSTRAINT `dish_tbl_ibfk_1` FOREIGN KEY (`dishTypeID`) REFERENCES `dishtype_tbl` (`dishTypeID`);

--
-- Constraints for table `employeeadditional_tbl`
--
ALTER TABLE `employeeadditional_tbl`
  ADD CONSTRAINT `employeeTypeID_ema` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservationID_ema` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employeeemployed_tbl`
--
ALTER TABLE `employeeemployed_tbl`
  ADD CONSTRAINT `employeeemployed_tbl_ibfk_1` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `employeeemployed_tbl_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee_tbl`
--
ALTER TABLE `employee_tbl`
  ADD CONSTRAINT `employee_tbl_ibfk_1` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`);

--
-- Constraints for table `equipmentadditional_tbl`
--
ALTER TABLE `equipmentadditional_tbl`
  ADD CONSTRAINT `equipmentID_ea` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservationID_ea` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipmentavailed_tbl`
--
ALTER TABLE `equipmentavailed_tbl`
  ADD CONSTRAINT `equipmentavailed_tbl_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `equipmentavailed_tbl_ibfk_3` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`);

--
-- Constraints for table `equipmentlog_tbl`
--
ALTER TABLE `equipmentlog_tbl`
  ADD CONSTRAINT `equipmentlog_tbl_ibfk_1` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`);

--
-- Constraints for table `equipment_tbl`
--
ALTER TABLE `equipment_tbl`
  ADD CONSTRAINT `equipment_tbl_ibfk_1` FOREIGN KEY (`equipmentTypeID`) REFERENCES `equipmenttype_tbl` (`equipmentTypeID`);

--
-- Constraints for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD CONSTRAINT `event_tbl_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer_tbl` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `event_tbl_ibfk_2` FOREIGN KEY (`eventTypeID`) REFERENCES `eventtype_tbl` (`eventTypeID`),
  ADD CONSTRAINT `event_tbl_ibfk_3` FOREIGN KEY (`locationID`) REFERENCES `location_tbl` (`locationID`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `packageavailed_tbl`
--
ALTER TABLE `packageavailed_tbl`
  ADD CONSTRAINT `packageID` FOREIGN KEY (`packageID`) REFERENCES `package_tbl` (`packageID`);

--
-- Constraints for table `packageinclusion_tbl`
--
ALTER TABLE `packageinclusion_tbl`
  ADD CONSTRAINT `packageinclusion_tbl_ibfk_1` FOREIGN KEY (`dishTypeID`) REFERENCES `dishtype_tbl` (`dishTypeID`),
  ADD CONSTRAINT `packageinclusion_tbl_ibfk_2` FOREIGN KEY (`packageID`) REFERENCES `package_tbl` (`packageID`),
  ADD CONSTRAINT `packageinclusion_tbl_ibfk_3` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`),
  ADD CONSTRAINT `packageinclusion_tbl_ibfk_5` FOREIGN KEY (`employeeTypeID`) REFERENCES `employeetype_tbl` (`employeeTypeID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `packageinclusion_tbl_ibfk_6` FOREIGN KEY (`equipmentID`) REFERENCES `equipment_tbl` (`equipmentID`);

--
-- Constraints for table `purchaseorder_tbl`
--
ALTER TABLE `purchaseorder_tbl`
  ADD CONSTRAINT `purchaseorder_tbl_ibfk_1` FOREIGN KEY (`poTypeId`) REFERENCES `purchaseordertype_tbl` (`poTypeId`),
  ADD CONSTRAINT `purchaseorder_tbl_ibfk_2` FOREIGN KEY (`uomID`) REFERENCES `unitmeasurement_tbl` (`uomID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
  ADD CONSTRAINT `reservation_tbl_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `event_tbl` (`eventID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_tbl_ibfk_2` FOREIGN KEY (`packageID`) REFERENCES `package_tbl` (`packageID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_tbl_ibfk_3` FOREIGN KEY (`paymentModeID`) REFERENCES `paymentmode_tbl` (`paymentModeID`),
  ADD CONSTRAINT `reservation_tbl_ibfk_4` FOREIGN KEY (`paymentTermID`) REFERENCES `paymentterm_tbl` (`paymentTermID`);

--
-- Constraints for table `serviceadditional_tbl`
--
ALTER TABLE `serviceadditional_tbl`
  ADD CONSTRAINT `reservationID` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `serviceID` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `serviceavailed_tbl`
--
ALTER TABLE `serviceavailed_tbl`
  ADD CONSTRAINT `serviceavailed_tbl_ibfk_1` FOREIGN KEY (`reservationID`) REFERENCES `reservation_tbl` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `serviceavailed_tbl_ibfk_2` FOREIGN KEY (`serviceID`) REFERENCES `service_tbl` (`serviceID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD CONSTRAINT `service_tbl_ibfk_1` FOREIGN KEY (`serviceTypeID`) REFERENCES `servicetype_tbl` (`serviceTypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
