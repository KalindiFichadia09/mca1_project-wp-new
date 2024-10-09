-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 05:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jayshree_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `Ct_Id` int(10) NOT NULL,
  `Ct_P_Code` varchar(10) NOT NULL,
  `U_Email_Id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`Ct_Id`, `Ct_P_Code`, `U_Email_Id`) VALUES
(1, 'BAN102', 'vchavda908@rku.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `C_Id` int(10) NOT NULL,
  `C_Code` varchar(10) NOT NULL,
  `C_Name` varchar(50) NOT NULL,
  `C_Type` varchar(15) NOT NULL,
  `C_Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`C_Id`, `C_Code`, `C_Name`, `C_Type`, `C_Image`) VALUES
(1, 'BAN', 'Bangle', 'female', '../img/g_bangle.jpg'),
(2, 'BRF', 'Bracelet', 'female', '../img/g_bracelet_f.jpg'),
(3, 'ARM', 'Armlet', 'female', '../img/g_armlet.jpg'),
(4, 'RGF', 'Female Ring', 'female', '../img/g_ring_f.jpg'),
(5, 'NEC', 'Necklace', 'female', '../img/g_necklace.jpg'),
(6, 'ER', 'Earring', 'female', '../img/g_earring.jpg'),
(7, 'PD', 'Pendant', 'female', '../img/g_pendant.jpg'),
(8, 'RGM', 'Male Ring', 'male', '../img/g_ring_m.jpg'),
(9, 'CHM', 'Male Chain', 'male', '../img/g_chain_m.jpg'),
(10, 'BRM', 'Male Bracelet', 'male', '../img/g_bracelet_m.jpg'),
(11, 'KD', 'Kadu', 'male', '../img/g_kadu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail_tbl`
--

CREATE TABLE `order_detail_tbl` (
  `O_Id` int(10) NOT NULL,
  `O_P_Code` varchar(10) NOT NULL,
  `O_P_Name` varchar(50) NOT NULL,
  `O_Total_Price` decimal(10,2) NOT NULL,
  `O_P_Gross_Weight` decimal(5,3) NOT NULL,
  `O_P_Type` varchar(30) NOT NULL,
  `O_P_Purity` varchar(50) NOT NULL,
  `O_Quentity` int(5) NOT NULL,
  `O_U_Name` varchar(100) NOT NULL,
  `O_U_Email_Id` varchar(100) NOT NULL,
  `O_Phone_no` varchar(10) NOT NULL,
  `O_Shipping_Address` varchar(500) NOT NULL,
  `O_City` varchar(50) NOT NULL,
  `O_Pincode` varchar(50) NOT NULL,
  `O_State` varchar(50) NOT NULL,
  `O_Country` varchar(50) NOT NULL,
  `O_Date` date NOT NULL,
  `O_P_Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail_tbl`
--

INSERT INTO `order_detail_tbl` (`O_Id`, `O_P_Code`, `O_P_Name`, `O_Total_Price`, `O_P_Gross_Weight`, `O_P_Type`, `O_P_Purity`, `O_Quentity`, `O_U_Name`, `O_U_Email_Id`, `O_Phone_no`, `O_Shipping_Address`, `O_City`, `O_Pincode`, `O_State`, `O_Country`, `O_Date`, `O_P_Image`) VALUES
(1, 'BAN102', 'Bangle', 85385.46, 17.750, 'Rose Gold', '20 karat (83.3% Gold)', 1, 'vibhuti chavda', 'vchavda908@rku.ac.in', '9099678895', 'hudko police choki,koharia road', 'Rajkot', '360009', 'Gujrat', 'India', '2023-10-08', '../img/p_bangle2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `P_Id` int(10) NOT NULL,
  `P_Code` varchar(10) NOT NULL,
  `P_Name` varchar(100) NOT NULL,
  `P_C_Code` varchar(10) NOT NULL,
  `P_Type` varchar(30) NOT NULL,
  `P_Gross_Weight` decimal(10,3) NOT NULL,
  `P_Diamond_Weight` decimal(5,3) DEFAULT NULL,
  `P_Diamond_Pices` int(5) NOT NULL,
  `P_Purity` varchar(50) NOT NULL,
  `P_Gold_Weight` decimal(5,2) NOT NULL,
  `P_Gold_Price` decimal(10,2) NOT NULL,
  `P_Diamond_Price` decimal(10,2) DEFAULT NULL,
  `P_Making_Charge` decimal(10,2) NOT NULL,
  `P_Overhead` decimal(10,2) NOT NULL,
  `P_Base_Price` decimal(10,2) NOT NULL,
  `P_Tax` decimal(10,2) NOT NULL,
  `P_Total_Price` decimal(10,2) NOT NULL,
  `P_Diamond_Color` varchar(30) NOT NULL,
  `P_Stock` int(5) NOT NULL,
  `P_Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`P_Id`, `P_Code`, `P_Name`, `P_C_Code`, `P_Type`, `P_Gross_Weight`, `P_Diamond_Weight`, `P_Diamond_Pices`, `P_Purity`, `P_Gold_Weight`, `P_Gold_Price`, `P_Diamond_Price`, `P_Making_Charge`, `P_Overhead`, `P_Base_Price`, `P_Tax`, `P_Total_Price`, `P_Diamond_Color`, `P_Stock`, `P_Image`) VALUES
(1, 'BAN101', 'Bangle', 'BAN', 'Yellow Gold', 15.000, 1.500, 26, '20 karat (83.3% Gold)', 13.50, 67473.00, 520.00, 7500.00, 3500.00, 78993.00, 2369.79, 81362.79, 'white', 10, '../img/p_bangle1.jpg'),
(2, 'BAN102', 'Bangle', 'BAN', 'Rose Gold', 17.750, 4.500, 140, '20 karat (83.3% Gold)', 13.25, 66223.50, 2800.00, 8875.00, 5000.00, 82898.50, 2486.96, 85385.46, 'white', 5, '../img/p_bangle2.jpg'),
(3, 'BRF101', 'Bracelet', 'BRF', 'Rose Gold', 10.100, 1.500, 28, '22 karat (91.67% Gold)', 8.60, 47301.72, 560.00, 5050.00, 2000.00, 54911.72, 1647.35, 56559.07, 'white', 2, '../img/p_bracelet1.jpg'),
(4, 'BRF102', 'Diamond Bracelet', 'BRF', 'Rose Gold', 9.030, 0.000, 14, '18 karat (75% Gold)', 9.03, 40635.00, 280.00, 4515.00, 2000.00, 47430.00, 1422.90, 48852.90, 'white', 2, '../img/p_bracelet2.jpg'),
(5, 'ARM101', 'Yellow gold armlet', 'ARM', 'Yellow Gold', 29.860, 0.550, 3, '22 karat (91.67% Gold)', 29.31, 161210.86, 60.00, 14930.00, 5500.00, 181700.86, 5451.03, 187151.89, 'Maroon', 3, '../img/p_armlet1.jpg'),
(6, 'RGF101', 'Elegant dual flower diamond ring', 'RGF', 'Yellow Gold', 2.346, 0.220, 28, '18 karat (75% Gold)', 2.13, 9567.00, 560.00, 1173.00, 1050.00, 12350.00, 370.50, 12720.50, 'white', 13, '../img/p_ring_f1.png'),
(7, 'NEC101', 'White diamond necklace', 'NEC', 'White Gold', 19.610, 1.710, 368, '18 karat (75% Gold)', 17.90, 80550.00, 7360.00, 9805.00, 10000.00, 107715.00, 3231.45, 110946.45, 'rose white', 1, '../img/p_necklace1.jpg'),
(8, 'RGF102', 'Pristine Flower Diamond Ring', 'RGF', 'White Gold', 3.002, 0.102, 21, '18 karat (75% Gold)', 2.90, 13050.00, 420.00, 1501.00, 10000.00, 24971.00, 749.13, 25720.13, 'pure white', 3, '../img/p_ring_f2.jpg'),
(9, 'ER101', 'Rose shape diamond earring', 'ER', 'Rose Gold', 4.320, 0.780, 264, '20 karat (83.3% Gold)', 3.54, 17692.92, 5280.00, 2160.00, 5000.00, 30132.92, 903.99, 31036.91, 'water white', 7, '../img/p_earring1.jpg'),
(10, 'ER102', 'Mango shape Diamond Earring', 'ER', 'Rose Gold', 4.260, 0.630, 110, '18 karat (75% Gold)', 3.63, 16335.00, 2200.00, 2130.00, 4750.00, 25415.00, 762.45, 26177.45, 'White', 5, '../img/p_earring2.jpg'),
(11, 'PD101', 'Royal Triangle Pendent', 'PD', 'Rose Gold', 5.960, 1.190, 114, '18 karat (75% Gold)', 4.77, 21465.00, 2280.00, 2980.00, 7070.00, 33795.00, 1013.85, 34808.85, 'Blakish white and pure white ', 2, '../img/p_pendent1.jpg'),
(12, 'RGM101', 'White Diamond ring', 'RGM', 'Yellow Gold', 4.402, 0.038, 9, '20 karat (83.3% Gold)', 4.36, 21811.27, 180.00, 2201.00, 2370.00, 26562.27, 796.87, 27359.14, 'white', 11, '../img/p_ring_m1.jpg'),
(13, 'CHM101', 'Dual Tone Carved Gold Chain For Men', 'CHM', 'Yellow Gold', 15.660, 0.000, 0, '20 karat (83.3% Gold)', 15.66, 78268.68, 0.00, 7830.00, 6000.00, 92098.68, 2762.96, 94861.64, '-', 3, '../img/p_chain_m1.jpg'),
(14, 'BRM101', 'Classy Geometric Bracelet for Men', 'BRM', 'Yellow Gold', 15.340, 0.000, 0, '20 karat (83.3% Gold)', 15.34, 76669.32, 0.00, 7670.00, 2760.00, 87099.32, 2612.98, 89712.30, '-', 4, '../img/p_bracelet_m1.jpg'),
(15, 'KD101', 'Radient Gold Plated kadu', 'KD', 'Yellow Gold', 17.750, 0.000, 0, '18 karat (75% Gold)', 17.75, 79875.00, 0.00, 8875.00, 4460.00, 93210.00, 2796.30, 96006.30, '-', 6, '../img/p_kadu1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `U_Id` int(10) NOT NULL,
  `U_Name` varchar(100) NOT NULL DEFAULT 'not null',
  `U_Gender` varchar(10) NOT NULL DEFAULT 'not null',
  `U_Email_Id` varchar(100) NOT NULL DEFAULT 'not null',
  `U_Phone_no` varchar(10) NOT NULL DEFAULT 'not null',
  `U_Address` varchar(250) NOT NULL DEFAULT 'not null',
  `U_City` varchar(50) NOT NULL DEFAULT 'not null',
  `U_State` varchar(50) NOT NULL DEFAULT 'not null',
  `U_Country` varchar(50) NOT NULL DEFAULT 'not null',
  `U_Pincode` int(6) NOT NULL,
  `U_Password` varchar(15) NOT NULL DEFAULT 'not null',
  `U_Category` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`U_Id`, `U_Name`, `U_Gender`, `U_Email_Id`, `U_Phone_no`, `U_Address`, `U_City`, `U_State`, `U_Country`, `U_Pincode`, `U_Password`, `U_Category`) VALUES
(1, 'Kalindi Fichadia', 'male', 'kfichadiya849@rku.ac.in', '8347293958', 'block no 28, radhekrishna park,railnager main road', 'Rajkot', 'Gujrat', 'India', 361013, 'Kalindi@9', 1),
(2, 'vibhuti chavda', 'female', 'vchavda908@rku.ac.in', '9099678895', 'hudko police choki,koharia road', 'Rajkot', 'Gujrat', 'India', 360009, 'Vibhuti@22', 0),
(3, 'ronak kapadia', 'male', 'rkapadia123@gmail.com', '9099678895', 'koda-pitha ,sardhar', 'Amreli', 'Gujrat', 'India', 330099, 'Ronak@29', 0),
(4, 'kevin topiya ', 'male', 'ktopiya123@rku.ac.in', '4567890435', 'street no-2,ranchod nager,santkabir road', 'Rajkot', 'Gujrat', 'India', 360005, 'Kevin@09', 0),
(5, 'Jinal Taraviya', 'female', 'jtaraviya932@gmail.com', '9328344556', 'Street no 2 , Shree Ranchod nager , Sant kabir road', 'Kanpur', 'Madhyapradesh', 'India', 360003, 'Jinal@22', 0),
(9, 'Khushi Maheta', 'female', 'kmaheta123@gmail.com', '9988776655', 'Block no 3, Street no 3, Krishna park, Sadhuvasvani kunj road, Railnager ', 'Rajkot', 'Gujrat', 'India', 360001, 'Khushi@17', 0),
(10, 'Radhika Bhut', 'female', 'rbhut123@rku.ac.in', '4567890435', 'Shree apartment, Behind Ram-Krishna asaram, Dr. yagnik road', 'Rajkot', 'Gujrat', 'India', 360002, 'Radhika@20', 0),
(12, 'Kishan Vekaria ', '', 'kvekaria345@rku.ac.in', '9988776655', 'Kotda-pitha', 'Rajkot', 'Gujrat', 'India', 360021, 'Kishan@17', 0),
(13, 'Khushi Hapaliya', 'female', 'khapaliya123@rku.ac.in', '9944556677', 'Block no - 23, Shree residency,Behind nirmala school,Gondal road', 'Rajkot', 'Gujrat', 'India', 360003, 'Khushi@17', 0),
(14, 'Khushi Hapaliya', 'female', 'khapaliya123@rku.ac.in', '9944556677', 'Block no - 23, Shree residency,Behind nirmala school,Gondal road', 'Rajkot', 'Gujrat', 'India', 360003, 'Khushi@17', 0),
(24, 'Dinesh Fichadiya', 'male', 'dfichadiya15@gmail.com', '9328361442', '\"shree\", Block no-28, Radhe-Krishna park, Near amruthari complex,   Sadhuvasvani kunj road, Railnager ', 'Rajkot', 'Gujrat', 'India', 360001, 'Dinesh@15', 0),
(25, 'Kaushal Fichadiya', 'on', 'kaushalfichadiya09@gmail.com', '', 'Radhekrishna park , railnager', 'Rajkot', 'Gujrat', 'India', 360001, 'Kaushal@09', 0),
(26, 'Kaushal Fichadiya', 'on', 'kaushalfichadiya09@gmail.com', '', 'radhe-krishna park, railnager', 'Rajkot', 'Gujrat', 'India', 360001, 'Kaushal@09', 0),
(27, 'Kaushal fichadiya', 'male', 'kaushalfichadiya@gmail.com', '9977886655', 'Radhe-Krishna Park,Railnager', 'Rajkot', 'Gujrat', 'India', 360001, 'Kaushal@09', 0),
(28, '', '', '', '', '', '', '', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_tbl`
--

CREATE TABLE `wishlist_tbl` (
  `W_Id` int(10) NOT NULL,
  `W_P_Code` varchar(10) NOT NULL,
  `U_Email_Id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist_tbl`
--

INSERT INTO `wishlist_tbl` (`W_Id`, `W_P_Code`, `U_Email_Id`) VALUES
(1, 'BAN101', 'vchavda908@rku.ac.in'),
(43, 'BAN101', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`Ct_Id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`C_Id`),
  ADD UNIQUE KEY `C_Code` (`C_Code`);

--
-- Indexes for table `order_detail_tbl`
--
ALTER TABLE `order_detail_tbl`
  ADD PRIMARY KEY (`O_Id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`P_Id`),
  ADD UNIQUE KEY `P_Code` (`P_Code`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`U_Id`);

--
-- Indexes for table `wishlist_tbl`
--
ALTER TABLE `wishlist_tbl`
  ADD PRIMARY KEY (`W_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `Ct_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `C_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_detail_tbl`
--
ALTER TABLE `order_detail_tbl`
  MODIFY `O_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `P_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `U_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `wishlist_tbl`
--
ALTER TABLE `wishlist_tbl`
  MODIFY `W_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
