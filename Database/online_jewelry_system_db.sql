-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 03:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_jewelry_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `c_id` int(11) NOT NULL,
  `c_code` varchar(10) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_gender` varchar(10) NOT NULL,
  `c_image` varchar(255) DEFAULT NULL,
  `c_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`c_id`, `c_code`, `c_name`, `c_gender`, `c_image`, `c_status`) VALUES
(1, 'CAT01', 'Gold Chain', 'Male', '../images/category_image/c12.jpg', 'Active'),
(2, 'CAT02', 'Gold Chain', 'Female', '../images/category_image/c10.jpg', 'Active'),
(3, 'CAT03', 'Bangles', 'Female', '../images/category_image/c18.jpg', 'Active'),
(4, 'CAT04', 'Ring', 'Male', '../images/category_image/c4.jpg', 'Active'),
(7, 'CAT05', 'Earings', 'Female', '../images/category_image/c8.jpg', 'Active'),
(8, 'CAT06', 'Mangalsutra', 'Female', '../images/category_image/m1.jpg', 'Active');

--
-- Triggers `category_tbl`
--
DELIMITER $$
CREATE TRIGGER `before_insert_category` BEFORE INSERT ON `category_tbl` FOR EACH ROW BEGIN
    DECLARE new_code INT;

    -- Get the highest existing category code number
    SELECT COALESCE(MAX(CAST(SUBSTRING(c_code, 4) AS UNSIGNED)), 0) INTO new_code FROM category_tbl;

    -- Increment the code for new entry
    SET new_code = new_code + 1;

    -- Set the new category code in the format CAT01, CAT02, etc.
    SET NEW.c_code = CONCAT('CAT', LPAD(new_code, 2, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `password_token_tbl`
--

CREATE TABLE `password_token_tbl` (
  `Id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Otp` varchar(100) NOT NULL,
  `Created_at` varchar(100) NOT NULL,
  `Expires_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_token_tbl`
--

INSERT INTO `password_token_tbl` (`Id`, `Email`, `Otp`, `Created_at`, `Expires_at`) VALUES
(2, 'vibhutichavda4@gmail.com', '466070', '2024-10-16 06:30:56', '2024-10-16 06:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `p_id` int(10) NOT NULL,
  `p_code` varchar(10) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_c_code` varchar(10) NOT NULL,
  `p_type` varchar(30) NOT NULL,
  `p_gross_weight` decimal(10,3) NOT NULL,
  `p_diamond_weight` decimal(5,3) NOT NULL,
  `p_diamond_pices` int(5) NOT NULL,
  `p_purity` varchar(50) NOT NULL,
  `p_gold_weight` decimal(5,2) NOT NULL,
  `p_gold_price` decimal(10,2) NOT NULL,
  `p_diamond_price` decimal(10,2) NOT NULL,
  `p_making_charge` decimal(10,2) NOT NULL,
  `p_overhead_charges` decimal(10,2) NOT NULL,
  `p_base_price` decimal(10,2) NOT NULL,
  `p_tax` decimal(10,2) NOT NULL,
  `p_total_price` decimal(10,2) NOT NULL,
  `p_diamond_color` varchar(30) NOT NULL,
  `p_stock` int(5) NOT NULL,
  `p_image` varchar(100) NOT NULL,
  `p_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`p_id`, `p_code`, `p_name`, `p_c_code`, `p_type`, `p_gross_weight`, `p_diamond_weight`, `p_diamond_pices`, `p_purity`, `p_gold_weight`, `p_gold_price`, `p_diamond_price`, `p_making_charge`, `p_overhead_charges`, `p_base_price`, `p_tax`, `p_total_price`, `p_diamond_color`, `p_stock`, `p_image`, `p_status`) VALUES
(1, 'PRO01', 'Cross Chain', 'CAT01', 'Yellow Gold', '25.000', '0.000', 0, '20K', '25.00', '124995.00', '0.00', '12500.00', '2250.00', '139745.00', '4192.35', '143937.35', 'NA ', 3, '../images/product_image/c5.jpg', 'Active'),
(3, 'PRO02', 'Ring', 'CAT04', 'Rose Gold', '2.000', '0.350', 10, '20K', '1.65', '8249.67', '200.00', '1000.00', '1050.00', '10499.67', '314.99', '10814.66', 'White', 6, '../images/product_image/r2.jpg', 'Active'),
(4, 'PRO03', 'Bangles', 'CAT03', 'Yellow Gold', '30.000', '0.000', 0, '22K', '30.00', '165006.00', '0.00', '15000.00', '5420.00', '185426.00', '5562.78', '190988.78', 'NA ', 1, '../images/product_image/c13.jpg', 'Active'),
(5, 'PRO04', 'Earings', 'CAT05', 'Yellow Gold', '5.000', '0.010', 14, '22K', '4.99', '27446.00', '280.00', '2500.00', '2410.00', '32636.00', '979.08', '33615.08', 'Silver', 2, '../images/product_image/c8.jpg', 'Active'),
(6, 'PRO05', 'Gold Plated Mangalsutra', 'CAT06', 'Yellow Gold', '2.000', '0.000', 0, '20K', '2.00', '9999.60', '0.00', '1000.00', '1001.00', '12000.60', '360.02', '12360.62', 'NA', 3, '../images/product_image/m1.jpg', 'Active'),
(7, 'PRO06', 'Infinite Rose Gold Chain', 'CAT02', 'Rose Gold', '7.000', '0.000', 0, '20K', '7.00', '34998.60', '0.00', '3500.00', '1950.00', '40448.60', '1213.46', '41662.06', 'NA', 4, '../images/product_image/rg1.jpg', 'Active');

--
-- Triggers `product_tbl`
--
DELIMITER $$
CREATE TRIGGER `before_insert_product` BEFORE INSERT ON `product_tbl` FOR EACH ROW BEGIN
    DECLARE new_code INT;

    -- Get the highest existing category code number
    SELECT COALESCE(MAX(CAST(SUBSTRING(p_code, 4) AS UNSIGNED)), 0) INTO new_code FROM product_tbl;

    -- Increment the code for new entry
    SET new_code = new_code + 1;

    -- Set the new category code in the format CAT01, CAT02, etc.
    SET NEW.p_code = CONCAT('PRO', LPAD(new_code, 2, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `slider_tbl`
--

CREATE TABLE `slider_tbl` (
  `Id` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider_tbl`
--

INSERT INTO `slider_tbl` (`Id`, `Name`, `Image`) VALUES
(1, 'image7', '1729065243_3x2_one_women_seeing_the_minimal_ros.png'),
(2, 'image7', '1729065256_3x2_one_women_seeing_the_minimal_ros.png'),
(3, 'Image7', '1729065925_carouselImg1.png'),
(4, 'Image7', '1729082612_carouselImg1.png'),
(5, 'Image7', '1729082896_carouselImg1.png'),
(6, 'Image7', '1729083319_carouselImg1.png'),
(7, 'Image7', '1729083334_carouselImg1.png'),
(8, 'Image7', '1729083375_carouselImg1.png'),
(9, 'image7', '1729083711_carouselimg7.png'),
(10, 'image7', '1729083715_carouselimg7.png'),
(11, 'image7', '1729083855_carouselimg7.png'),
(12, 'image7', '1729083857_carouselimg7.png'),
(13, 'image7', '1729083876_carouselimg7.png'),
(14, 'image7', '1729083904_carouselimg7.png'),
(15, 'image7', '1729083926_carouselimg7.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `u_id` int(5) NOT NULL,
  `u_fullname` varchar(100) NOT NULL,
  `u_gender` varchar(10) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_mobile` varchar(10) NOT NULL,
  `u_address` varchar(500) NOT NULL,
  `u_city` varchar(30) NOT NULL,
  `u_state` varchar(30) NOT NULL,
  `u_pincode` varchar(6) NOT NULL,
  `u_password` varchar(12) NOT NULL,
  `u_image` varchar(200) NOT NULL,
  `u_status` varchar(20) NOT NULL,
  `u_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`u_id`, `u_fullname`, `u_gender`, `u_email`, `u_mobile`, `u_address`, `u_city`, `u_state`, `u_pincode`, `u_password`, `u_image`, `u_status`, `u_role`) VALUES
(1, 'Kalindi', 'female', 'kfichadiya849@rku.ac.in', '0940813637', 'Shree radhekrishna park railnager', 'Rajkot', 'Gujarat', '360002', 'Kalindi@12', '../images/profile_image/6708aac8503adbhut.jpg', 'Active', 'User'),
(2, 'Vibhuti Chavda', 'female', 'vibhutichavda4@gmail.com', '8200722807', 'Hudko police choki', 'Rajkot', 'Gujarat', '360002', 'Vibhuti@22', '../images/profile_image/ghost.jpg', 'Active', 'User'),
(3, '', '', '', '', '', '', '', '', '', 'images/profile_image/', 'Inactive', 'User'),
(4, '', '', '', '', '', '', '', '', '', 'images/profile_image/', 'Inactive', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_code` (`c_code`);

--
-- Indexes for table `password_token_tbl`
--
ALTER TABLE `password_token_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `password_token_tbl`
--
ALTER TABLE `password_token_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
