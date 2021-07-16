-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2020 at 01:56 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Admin_Name` varchar(255) NOT NULL,
  `Admin_Email` varchar(255) NOT NULL,
  `Admin_Pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_Name`, `Admin_Email`, `Admin_Pass`) VALUES
(1, 'Samon', 'samon@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Emon', 'emon@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Shiliya', 'shiliya36@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `Brand_ID` int(11) NOT NULL,
  `Brand_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`Brand_ID`, `Brand_Name`) VALUES
(1, 'Dell'),
(2, 'Acer'),
(10, 'Asus'),
(11, 'Apple'),
(12, 'Samsung'),
(13, 'Nokia'),
(14, 'HP'),
(15, 'HTC');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_ID` int(11) NOT NULL,
  `SID` varchar(255) NOT NULL,
  `Pro_ID` int(11) NOT NULL,
  `Pro_Name` varchar(255) NOT NULL,
  `Pro_Img` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Pro_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `SID`, `Pro_ID`, `Pro_Name`, `Pro_Img`, `Quantity`, `Pro_Price`) VALUES
(5, 'uq6j7lmqjhqp4mh3a5lt96aenj', 24, 'HP Laptop ', 'pi.jpg', 2, 0),
(10, 'uq6j7lmqjhqp4mh3a5lt96aenj', 25, 'Samsung A30s', 'st1.jpg', 2, 0),
(11, 'uq6j7lmqjhqp4mh3a5lt96aenj', 13, 'Realme 5 ', 'pic8.jpg', 1, 12000),
(12, 'uq6j7lmqjhqp4mh3a5lt96aenj', 24, 'HP Laptop ', 'pi.jpg', 1, 46000),
(17, 'r61hv8uab3j7g2k9gjh7tj5p2m', 25, 'Samsung A30s', 'st1.jpg', 1, 30000),
(18, 'r61hv8uab3j7g2k9gjh7tj5p2m', 24, 'HP Laptop ', 'pi.jpg', 1, 46000),
(22, 'u2hej2upc05ts5k2hi20jtgoei', 13, 'Realme 5 ', 'pic8.jpg', 3, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_Id` int(11) NOT NULL,
  `Category_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_Id`, `Category_Name`) VALUES
(1, 'Laptop'),
(2, 'Phone'),
(3, 'Earphone '),
(4, 'Specker'),
(5, 'Mouse'),
(6, 'LED'),
(27, 'LLLL');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(12) NOT NULL,
  `Customer_Name` varchar(255) NOT NULL,
  `Customer_Email` varchar(255) NOT NULL,
  `Customer_Phone` int(11) NOT NULL,
  `Customer_Password` varchar(255) NOT NULL,
  `Customer_City` varchar(100) NOT NULL,
  `Customer_Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Customer_Name`, `Customer_Email`, `Customer_Phone`, `Customer_Password`, `Customer_City`, `Customer_Address`) VALUES
(1, 'Samon', 'samon@gmail.com', 1819533402, '290742245fd5af2a92c80a0da0899871', 'Dhaka-1000', 'Rankin street, Wari'),
(2, 'Humayun Badsha', 'emon@gmail.com', 1917031210, 'b8cc4edba5145d41f9da01d85f459aef', 'Dhaka', 'Wari'),
(3, 'Shiliya', 'shiliya@gmail.com', 1817031210, '318fdf2e8629478551220e83d11038fd', 'Dhaka', 'Wari');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Pro_ID` int(11) NOT NULL,
  `Pro_Title` varchar(255) NOT NULL,
  `Pro_Img` varchar(255) NOT NULL,
  `Pro_Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_ID`, `Customer_ID`, `Pro_ID`, `Pro_Title`, `Pro_Img`, `Pro_Price`, `Quantity`, `Status`, `Time`) VALUES
(5, 1, 17, 'Dell Laptop ', 'pic3.jpg', 20000, 1, 1, '2020-03-15 11:54:44'),
(8, 1, 17, 'Dell Laptop ', 'pic3.jpg', 20000, 1, 1, '2020-03-15 11:40:38'),
(9, 1, 13, 'Acer Loptop', 'pic8.jpg', 12000, 1, 0, '2020-03-15 11:34:46'),
(10, 2, 17, 'Dell Laptop ', 'pic3.jpg', 20000, 1, 0, '2020-03-15 11:34:46'),
(11, 2, 13, 'Acer Loptop', 'pic8.jpg', 12000, 1, 0, '2020-03-15 11:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Pro_ID` int(11) NOT NULL,
  `Pro_Title` varchar(255) NOT NULL,
  `Pro_Price` int(11) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  `Brand_Id` int(11) NOT NULL,
  `Pro_Description` text NOT NULL,
  `Pro_Image` varchar(255) NOT NULL,
  `Total_Quantity` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Pro_ID`, `Pro_Title`, `Pro_Price`, `Category_Id`, `Brand_Id`, `Pro_Description`, `Pro_Image`, `Total_Quantity`, `Type`) VALUES
(13, 'Acer Loptop', 12000, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.', 'pic8.jpg', 7, 'Featured'),
(15, 'Acer ', 50000, 10, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.', 'st2.jpg', 5, 'Featured'),
(16, 'Asus Laptop ', 250000, 10, 10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.', 'ap2.png', 2, 'Featured'),
(17, 'Dell Laptop ', 20000, 1, 1, 'Hello world :p                                                                                                          ', '', 3, 'Featured'),
(19, 'Dell Laptop ', 86000, 12, 7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.', 'st2.jpg', 3, 'Featured'),
(21, 'Images Rotating', 1000, 12, 8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.', 'st3.jpg', 2, 'Non Featured'),
(22, 'Realme 5 Pro', 35000, 12, 8, 'sandb dadsbd as', '15.jpg', 3, 'Featured'),
(24, 'HP Laptop ', 46000, 10, 14, 'Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore magna aliqua.', 'pi.jpg', 4, 'Featured'),
(26, 'MSGVN', 1000, 5, 14, 'ads', 'somin-khanna-efwGCPFdIcM-unsplash (1).jpg', 2, 'Non Featured');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`Brand_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Pro_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `Brand_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Pro_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
