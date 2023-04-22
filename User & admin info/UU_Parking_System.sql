-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 19, 2023 at 09:40 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `UU Parking System`
--

-- --------------------------------------------------------

--
-- Table structure for table `DRIVER`
--

CREATE TABLE `DRIVER` (
  `DRIVER_ID` int(11) NOT NULL,
  `Type` char(3) DEFAULT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DRIVER`
--

INSERT INTO `DRIVER` (`DRIVER_ID`, `Type`, `First_Name`, `Last_Name`, `Address`) VALUES
(1, 'U', 'John', 'Doe', '123 Main St'),
(2, 'U', 'Jane', 'Doe', '456 Main St'),
(3, 'HU', 'Jim', 'Smith', '789 Main St'),
(4, 'CU', 'Anna', 'Johnson', '159 Main St'),
(5, 'U', 'Tom', 'Williams', '753 Main St'),
(6, 'M', 'Maria', 'Brown', '951 Main St'),
(7, 'A', 'James', 'Miller', '482 Main St'),
(8, 'A', 'Richard', 'Garcia', '321 Main St'),
(9, 'U', 'Charles', 'Martinez', '213 Main St'),
(10, 'HCU', 'Joseph', 'Rodriguez', '312 Main St'),
(11, 'U', 'Daniel', 'Wilson', '541 Main St'),
(12, 'CA', 'Matthew', 'Anderson', '412 Main St'),
(13, 'U', 'David', 'Taylor', '246 Main St'),
(14, 'DT', 'Michael', 'Thomas', '864 Main St'),
(15, 'U', 'Sarah', 'Hernandez', '128 Main St'),
(16, 'A', 'Linda', 'Moore', '235 Main St'),
(17, 'U', 'Mark', 'Jackson', '359 Main St'),
(18, 'A', 'Elizabeth', 'White', '987 Main St'),
(19, 'USA', 'Steven', 'Harris', '654 Main St'),
(20, 'A', 'Jennifer', 'Clark', '178 Main St');

-- --------------------------------------------------------

--
-- Table structure for table `PARKING_LOT`
--

CREATE TABLE `PARKING_LOT` (
  `LOT_ID` int(11) NOT NULL,
  `Permit_Type_1` varchar(10) DEFAULT NULL,
  `Permit_Type_2` varchar(10) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PARKING_LOT`
--

INSERT INTO `PARKING_LOT` (`LOT_ID`, `Permit_Type_1`, `Permit_Type_2`, `Address`, `Capacity`) VALUES
(1, 'U', 'A', '123 Main St', 50),
(2, 'U', 'A', '456 1st Ave', 100),
(3, 'A', 'HU', '789 Elm St', 75),
(4, 'A', 'HU', '111 Pine St', 25),
(5, 'U', 'A', '222 Oak St', 30),
(6, 'U', 'A', '333 Maple St', 40),
(7, 'U', 'HU', '444 Cedar St', 60),
(8, 'U', 'HU', '555 Walnut St', 80),
(9, 'A', 'HU', '666 Ash St', 90),
(10, 'A', 'HU', '777 Birch St', 70),
(11, 'U', NULL, '888 2nd Ave', 120),
(12, 'A', NULL, '999 Spruce St', 55),
(13, 'HU', NULL, '1010 Cedar St', 35),
(14, 'CU', NULL, '1111 Oak St', 20),
(15, 'HCU', NULL, '1212 Maple St', 45),
(16, 'M', NULL, '1313 Pine St', 65),
(17, 'CA', NULL, '1414 Walnut St', 85),
(18, 'DT', NULL, '1515 Ash St', 95),
(19, 'USA', NULL, '1616 Birch St', 80),
(20, 'U', NULL, '1717 3rd Ave', 110);

-- --------------------------------------------------------

--
-- Table structure for table `PARKING_SPACE`
--

CREATE TABLE `PARKING_SPACE` (
  `SPACE_ID` int(11) NOT NULL,
  `LOT_ID` int(11) DEFAULT NULL,
  `Field` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PARKING_SPACE`
--

INSERT INTO `PARKING_SPACE` (`SPACE_ID`, `LOT_ID`, `Field`) VALUES
(1, 1, 'North Lot, Section A'),
(2, 1, 'North Lot, Section B'),
(3, 1, 'North Lot, Section C'),
(4, 2, 'East Lot, Section A'),
(5, 2, 'East Lot, Section B'),
(6, 2, 'East Lot, Section C'),
(7, 3, 'South Lot, Section A'),
(8, 3, 'South Lot, Section B'),
(9, 3, 'South Lot, Section C'),
(10, 4, 'West Lot, Section A'),
(11, 4, 'West Lot, Section B'),
(12, 4, 'West Lot, Section C'),
(13, 5, 'North Lot, Section A'),
(14, 5, 'North Lot, Section B'),
(15, 5, 'North Lot, Section C'),
(16, 6, 'East Lot, Section A'),
(17, 6, 'East Lot, Section B'),
(18, 6, 'East Lot, Section C'),
(19, 7, 'South Lot, Section A'),
(20, 7, 'South Lot, Section B');

-- --------------------------------------------------------

--
-- Table structure for table `PAYMENT`
--

CREATE TABLE `PAYMENT` (
  `PAYMENT_ID` int(11) NOT NULL,
  `Credit_Card_No` varchar(255) DEFAULT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Check_No` varchar(255) NOT NULL,
  `Cash` decimal(10,2) DEFAULT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PAYMENT`
--

INSERT INTO `PAYMENT` (`PAYMENT_ID`, `Credit_Card_No`, `Amount`, `Check_No`, `Cash`, `Date`) VALUES
(1, '1234567812345678', '5.00', 'CHK001', NULL, '2023-01-01'),
(2, '2345678923456789', '7.00', 'CHK002', NULL, '2023-01-02'),
(3, NULL, '6.00', 'CHK003', '6.00', '2023-01-03'),
(4, NULL, '5.50', 'CHK004', '5.50', '2023-01-04'),
(5, '3456789034567890', '4.00', 'CHK005', NULL, '2023-01-05'),
(6, '4567890145678901', '6.50', 'CHK006', NULL, '2023-01-06'),
(7, NULL, '4.50', 'CHK007', '4.50', '2023-01-07'),
(8, NULL, '5.00', 'CHK008', '5.00', '2023-01-08'),
(9, '5678901256789012', '5.50', 'CHK009', NULL, '2023-01-09'),
(10, '6789012367890123', '6.00', 'CHK010', NULL, '2023-01-10'),
(11, NULL, '4.50', 'CHK011', '4.50', '2023-01-11'),
(12, NULL, '5.00', 'CHK012', '5.00', '2023-01-12'),
(13, '7890123478901234', '6.50', 'CHK013', NULL, '2023-01-13'),
(14, '8901234589012345', '4.00', 'CHK014', NULL, '2023-01-14'),
(15, NULL, '6.00', 'CHK015', '6.00', '2023-01-15'),
(16, NULL, '5.50', 'CHK016', '5.50', '2023-01-16'),
(17, '9012345690123456', '5.50', 'CHK017', NULL, '2023-01-17'),
(18, '0123456701234567', '6.00', 'CHK018', NULL, '2023-01-18'),
(19, NULL, '4.50', 'CHK019', '4.50', '2023-01-19'),
(20, NULL, '5.00', 'CHK020', '5.00', '2023-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `PERMIT`
--

CREATE TABLE `PERMIT` (
  `PERMIT_ID` int(11) NOT NULL,
  `VEHICLE_ID` int(11) DEFAULT NULL,
  `DRIVER_ID` int(11) DEFAULT NULL,
  `PAYMENT_ID` int(11) DEFAULT NULL,
  `Permit_Type` varchar(10) DEFAULT NULL,
  `Purchase_Date` date DEFAULT NULL,
  `Expire_Date` date DEFAULT NULL,
  `Cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PERMIT`
--

INSERT INTO `PERMIT` (`PERMIT_ID`, `VEHICLE_ID`, `DRIVER_ID`, `PAYMENT_ID`, `Permit_Type`, `Purchase_Date`, `Expire_Date`, `Cost`) VALUES
(1, 1, 1, 1, 'U', '2022-01-01', '2022-12-31', '100.00'),
(2, 2, 2, 2, 'U', '2022-02-01', '2022-12-31', '75.00'),
(3, 3, 3, 3, 'HU', '2022-03-01', '2022-12-31', '50.00'),
(4, 4, 4, 4, 'CU', '2022-04-01', '2022-12-31', '25.00'),
(5, 5, 5, 5, 'U', '2022-05-01', '2022-12-31', '40.00'),
(6, 6, 6, 6, 'M', '2022-06-01', '2022-12-31', '30.00'),
(7, 7, 7, 7, 'A', '2022-07-01', '2022-12-31', '20.00'),
(8, 8, 8, 8, 'A', '2022-08-01', '2022-12-31', '15.00'),
(9, 9, 9, 9, 'U', '2022-09-01', '2022-12-31', '10.00'),
(10, 10, 10, 10, 'HCU', '2022-10-01', '2022-12-31', '100.00'),
(11, 11, 11, 11, 'U', '2022-11-01', '2022-12-31', '75.00'),
(12, 12, 12, 12, 'CA', '2022-12-01', '2022-12-31', '50.00'),
(13, 13, 13, 13, 'U', '2022-01-01', '2022-12-31', '25.00'),
(14, 14, 14, 14, 'DT', '2022-02-01', '2022-12-31', '40.00'),
(15, 15, 15, 15, 'U', '2022-03-01', '2022-12-31', '30.00'),
(16, 16, 16, 16, 'A', '2022-04-01', '2022-12-31', '20.00'),
(17, 17, 17, 17, 'U', '2022-05-01', '2022-12-31', '15.00');

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE`
--

CREATE TABLE `VEHICLE` (
  `VEHICLE_ID` int(11) NOT NULL,
  `DRIVER_ID` int(11) DEFAULT NULL,
  `License_Plate` varchar(255) DEFAULT NULL,
  `Make` varchar(255) DEFAULT NULL,
  `Model` varchar(255) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `VEHICLE`
--

INSERT INTO `VEHICLE` (`VEHICLE_ID`, `DRIVER_ID`, `License_Plate`, `Make`, `Model`, `Color`, `Year`) VALUES
(1, 1, 'ABC123', 'Toyota', 'Camry', 'Blue', 2019),
(2, 2, 'DEF456', 'Honda', 'Civic', 'Red', 2020),
(3, 3, 'GHI789', 'Ford', 'Fusion', 'White', 2018),
(4, 4, 'JKL012', 'Chevrolet', 'Malibu', 'Black', 2021),
(5, 5, 'MNO345', 'Nissan', 'Altima', 'Silver', 2019),
(6, 6, 'PQR678', 'Hyundai', 'Sonata', 'Blue', 2022),
(7, 7, 'STU901', 'Volkswagen', 'Passat', 'Green', 2018),
(8, 8, 'VWX234', 'Subaru', 'Legacy', 'Gray', 2017),
(9, 9, 'YZA567', 'Mazda', 'Mazda6', 'Red', 2016),
(10, 10, 'BCD890', 'Kia', 'Optima', 'White', 2020),
(11, 11, 'EFG123', 'Audi', 'A4', 'Silver', 2021),
(12, 12, 'HIJ456', 'BMW', '3 Series', 'Black', 2019),
(13, 13, 'KLM789', 'Mercedes-Benz', 'C-Class', 'Blue', 2018),
(14, 14, 'NOP012', 'Lexus', 'IS', 'Red', 2022),
(15, 15, 'QRS345', 'Acura', 'TLX', 'White', 2017),
(16, 16, 'TUV678', 'Infiniti', 'Q50', 'Green', 2019),
(17, 17, 'WXY901', 'Jaguar', 'XE', 'Gray', 2020),
(18, 18, 'ZAB234', 'Volvo', 'S60', 'Black', 2021),
(19, 19, 'CDE567', 'Alfa Romeo', 'Giulia', 'Silver', 2018),
(20, 20, 'FGH890', 'Genesis', 'G70', 'Blue', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `VIOLATION`
--

CREATE TABLE `VIOLATION` (
  `VIOLATION_ID` int(11) NOT NULL,
  `PAYMENT_ID` int(11) DEFAULT NULL,
  `Violation_Type` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `VIOLATION`
--

INSERT INTO `VIOLATION` (`VIOLATION_ID`, `PAYMENT_ID`, `Violation_Type`, `Date`) VALUES
(1, 1, 'Meter Violation', '2023-01-01'),
(2, 2, 'Overtime Parking', '2023-01-02'),
(3, 3, 'Regulation Violation', '2023-01-03'),
(4, 4, 'Permit Violation', '2023-01-04'),
(5, 5, 'Multiple Vehicles on Campus', '2023-01-05'),
(6, 6, 'Plate Not Visible', '2023-01-06'),
(7, 7, 'Blocking Traffic', '2023-01-07'),
(8, 8, 'Unauthorized Vehicle on Sidewalk', '2023-01-08'),
(9, 9, 'Disabled Parking', '2023-01-09'),
(10, 10, 'Meter Violation', '2023-01-10'),
(11, 11, 'Overtime Parking', '2023-01-11'),
(12, 12, 'Regulation Violation', '2023-01-12'),
(13, 13, 'Permit Violation', '2023-01-13'),
(14, 14, 'Multiple Vehicles on Campus', '2023-01-14'),
(15, 15, 'Plate Not Visible', '2023-01-15'),
(16, 16, 'Blocking Traffic', '2023-01-16'),
(17, 17, 'Unauthorized Vehicle on Sidewalk', '2023-01-17'),
(18, 18, 'Disabled Parking', '2023-01-18'),
(19, 19, 'Meter Violation', '2023-01-19'),
(20, 20, 'Overtime Parking', '2023-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `VIOLATION_TYPE`
--

CREATE TABLE `VIOLATION_TYPE` (
  `VIOLATION_TYPE_ID` int(11) NOT NULL,
  `Violation_Name` varchar(255) DEFAULT NULL,
  `Amount_Due` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `VIOLATION_TYPE`
--

INSERT INTO `VIOLATION_TYPE` (`VIOLATION_TYPE_ID`, `Violation_Name`, `Amount_Due`) VALUES
(1, 'Meter Violation', '10.00'),
(2, 'Overtime Parking', '15.00'),
(3, 'Regulation Violation', '20.00'),
(4, 'Permit Violation', '25.00'),
(5, 'Multiple Vehicles on Campus', '30.00'),
(6, 'Plate Not Visible', '35.00'),
(7, 'Blocking Traffic', '40.00'),
(8, 'Unauthorized Vehicle on Sidewalk', '45.00'),
(9, 'Disabled Parking', '50.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `DRIVER`
--
ALTER TABLE `DRIVER`
  ADD PRIMARY KEY (`DRIVER_ID`);

--
-- Indexes for table `PARKING_LOT`
--
ALTER TABLE `PARKING_LOT`
  ADD PRIMARY KEY (`LOT_ID`);

--
-- Indexes for table `PARKING_SPACE`
--
ALTER TABLE `PARKING_SPACE`
  ADD PRIMARY KEY (`SPACE_ID`),
  ADD KEY `LOT_ID` (`LOT_ID`);

--
-- Indexes for table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  ADD PRIMARY KEY (`PAYMENT_ID`);

--
-- Indexes for table `PERMIT`
--
ALTER TABLE `PERMIT`
  ADD PRIMARY KEY (`PERMIT_ID`),
  ADD KEY `VEHICLE_ID` (`VEHICLE_ID`),
  ADD KEY `DRIVER_ID` (`DRIVER_ID`),
  ADD KEY `PAYMENT_ID` (`PAYMENT_ID`);

--
-- Indexes for table `VEHICLE`
--
ALTER TABLE `VEHICLE`
  ADD PRIMARY KEY (`VEHICLE_ID`),
  ADD KEY `DRIVER_ID` (`DRIVER_ID`);

--
-- Indexes for table `VIOLATION`
--
ALTER TABLE `VIOLATION`
  ADD PRIMARY KEY (`VIOLATION_ID`),
  ADD KEY `PAYMENT_ID` (`PAYMENT_ID`);

--
-- Indexes for table `VIOLATION_TYPE`
--
ALTER TABLE `VIOLATION_TYPE`
  ADD PRIMARY KEY (`VIOLATION_TYPE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `DRIVER`
--
ALTER TABLE `DRIVER`
  MODIFY `DRIVER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `PARKING_SPACE`
--
ALTER TABLE `PARKING_SPACE`
  MODIFY `SPACE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  MODIFY `PAYMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `PERMIT`
--
ALTER TABLE `PERMIT`
  MODIFY `PERMIT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `VEHICLE`
--
ALTER TABLE `VEHICLE`
  MODIFY `VEHICLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `VIOLATION`
--
ALTER TABLE `VIOLATION`
  MODIFY `VIOLATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `VIOLATION_TYPE`
--
ALTER TABLE `VIOLATION_TYPE`
  MODIFY `VIOLATION_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `PARKING_SPACE`
--
ALTER TABLE `PARKING_SPACE`
  ADD CONSTRAINT `parking_space_ibfk_1` FOREIGN KEY (`LOT_ID`) REFERENCES `PARKING_LOT` (`LOT_ID`);

--
-- Constraints for table `PERMIT`
--
ALTER TABLE `PERMIT`
  ADD CONSTRAINT `permit_ibfk_1` FOREIGN KEY (`VEHICLE_ID`) REFERENCES `VEHICLE` (`VEHICLE_ID`),
  ADD CONSTRAINT `permit_ibfk_2` FOREIGN KEY (`DRIVER_ID`) REFERENCES `DRIVER` (`DRIVER_ID`),
  ADD CONSTRAINT `permit_ibfk_3` FOREIGN KEY (`PAYMENT_ID`) REFERENCES `PAYMENT` (`PAYMENT_ID`);

--
-- Constraints for table `VEHICLE`
--
ALTER TABLE `VEHICLE`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`DRIVER_ID`) REFERENCES `DRIVER` (`DRIVER_ID`);

--
-- Constraints for table `VIOLATION`
--
ALTER TABLE `VIOLATION`
  ADD CONSTRAINT `violation_ibfk_1` FOREIGN KEY (`PAYMENT_ID`) REFERENCES `PAYMENT` (`PAYMENT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
