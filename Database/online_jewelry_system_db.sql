-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 07:27 PM
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
-- Database: `online_jewelry_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_tbl`
--

CREATE TABLE `about_us_tbl` (
  `Id` int(10) NOT NULL,
  `Content` varchar(10000) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us_tbl`
--

INSERT INTO `about_us_tbl` (`Id`, `Content`, `image`) VALUES
(1, '<p><strong>Why Choose Us</strong></p><p>Choosing Jaysheree Jewels means choosing a partner who understands that jewelry is more than just an accessory—it’s an expression of who you are. Whether you are marking a special occasion or simply indulging in something beautiful, we are here to help you find the perfect piece that speaks to your heart. Our team is dedicated to providing an exceptional customer experience, from personalized consultations to after-sales support, ensuring that your journey with us is as memorable as the jewelry you wear.</p><p><strong>Our Collections</strong></p><p>Our collections range from classic to contemporary, featuring an array of designs that cater to different tastes and occasions. Whether you’re looking for a stunning engagement ring, a pair of elegant earrings, or a statement necklace, you’ll find something that resonates with your style at Jayshree Jewels. Each collection is inspired by the beauty of the world around us, infused with creativity, and crafted with care.</p>', 'aboutus4.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `ct_id` int(3) NOT NULL,
  `ct_code` varchar(10) NOT NULL,
  `ct_username` varchar(100) NOT NULL,
  `ct_p_code` varchar(10) NOT NULL,
  `ct_p_tot_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`ct_id`, `ct_code`, `ct_username`, `ct_p_code`, `ct_p_tot_price`) VALUES
(2, 'CART02', 'vchavda123@gmail.com', 'PRO02', 10814.66),
(3, 'CART03', 'vchavda123@gmail.com', 'PRO02', 10814.66);

--
-- Triggers `cart_tbl`
--
DELIMITER $$
CREATE TRIGGER `before_insert_product_to_cart` BEFORE INSERT ON `cart_tbl` FOR EACH ROW BEGIN
    DECLARE new_code INT;

    -- Get the highest existing category code number, extracting the numeric part after 'CART'
    SELECT COALESCE(MAX(CAST(SUBSTRING(ct_code, 5) AS UNSIGNED)), 0) INTO new_code FROM cart_tbl;

    -- Increment the code for a new entry
    SET new_code = new_code + 1;

    -- Set the new category code in the format CART01, CART02, etc.
    SET NEW.ct_code = CONCAT('CART', LPAD(new_code, 2, '0'));
END
$$
DELIMITER ;

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
(2, 'CAT02', 'Gold Chain', 'Female', '../images/category_image/671e4c1f4761fc1.jpg', 'Active'),
(3, 'CAT03', 'Bangles', 'Female', '../images/category_image/67211d6fd2482c7.jpg', 'Active'),
(4, 'CAT04', 'Ring', 'Female', '../images/category_image/671e4c6544b01g_ring_f.jpg', 'Active'),
(7, 'CAT05', 'Earings', 'Female', '../images/category_image/671e77f672fd5c8.jpg', 'Active'),
(8, 'CAT06', 'Mangalsutra', 'Female', '../images/category_image/671e780800ab6m1.jpg', 'Inactive'),
(9, 'CAT07', 'Anklet', 'Female', '../images/category_image/671e78133cb9cc6.jpg', 'Active');

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
-- Table structure for table `contact_us_tbl`
--

CREATE TABLE `contact_us_tbl` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_email` varchar(150) NOT NULL,
  `c_msg` varchar(500) NOT NULL,
  `c_reply_msg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us_tbl`
--

INSERT INTO `contact_us_tbl` (`c_id`, `c_name`, `c_email`, `c_msg`, `c_reply_msg`) VALUES
(2, 'Kalindi Fichadia', 'kfichadiya849@rku.ac.in', 'i want to talk with you', 'hello \r\nwhats\' an issue ??\r\nshare with us... \r\nwe will try our best to solve your issue...');

-- --------------------------------------------------------

--
-- Table structure for table `order_items_tbl`
--

CREATE TABLE `order_items_tbl` (
  `order_item_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_code` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `order_items_tbl`
--
DELIMITER $$
CREATE TRIGGER `reduce_stock_on_order` AFTER INSERT ON `order_items_tbl` FOR EACH ROW BEGIN
    -- Update stock in product table
    UPDATE product_tbl
    SET p_stock = p_stock - NEW.quantity
    WHERE p_code = NEW.p_code;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `o_id` int(11) NOT NULL,
  `o_code` varchar(10) NOT NULL,
  `o_username` varchar(100) NOT NULL,
  `o_total_price` decimal(10,2) NOT NULL,
  `o_status` varchar(50) DEFAULT 'Pending',
  `o_date` datetime DEFAULT current_timestamp(),
  `o_delivery_date` datetime DEFAULT NULL,
  `o_shipping_address` text NOT NULL,
  `o_payment_method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `order_tbl`
--
DELIMITER $$
CREATE TRIGGER `before_insert_order` BEFORE INSERT ON `order_tbl` FOR EACH ROW BEGIN
    DECLARE new_code INT;

    -- Get the highest existing order code number
    SELECT COALESCE(MAX(CAST(SUBSTRING(o_code, 4) AS UNSIGNED)), 0) INTO new_code FROM order_tbl;

    -- Increment the code for new entry
    SET new_code = new_code + 1;

    -- Set the new order code in the format ORD01, ORD02, etc.
    SET NEW.o_code = CONCAT('ORD', LPAD(new_code, 2, '0'));
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
(1, 'PRO01', 'Cross Chain', 'none', 'Yellow Gold', 25.000, 0.000, 0, '20K', 25.00, 124995.00, 0.00, 12500.00, 2250.00, 139745.00, 4192.35, 143937.35, 'NA ', 3, '../images/product_image/671e7a1782e5ag_chain_m.jpg', 'Active'),
(3, 'PRO02', 'Ring', 'CAT04', 'Rose Gold', 2.000, 0.350, 10, '20K', 1.65, 8249.67, 200.00, 1000.00, 1050.00, 10499.67, 314.99, 10814.66, 'White', 6, '../images/product_image/671e7a24f111bg_ring_f.jpg', 'Active'),
(4, 'PRO03', 'Bangles', 'CAT03', 'Yellow Gold', 30.000, 0.000, 0, '22K', 30.00, 165006.00, 0.00, 15000.00, 5420.00, 185426.00, 5562.78, 190988.78, 'NA ', 1, '../images/product_image/671e7a2e5b11dc13.jpg', 'Active'),
(5, 'PRO04', 'Earings', 'CAT05', 'Yellow Gold', 5.000, 0.010, 14, '22K', 4.99, 27446.00, 280.00, 2500.00, 2410.00, 32636.00, 979.08, 33615.08, 'Silver', 2, '../images/product_image/671e79f03dc46c8.jpg', 'Active'),
(6, 'PRO05', 'Gold Plated Mangalsutra', 'none', 'Yellow Gold', 2.000, 0.000, 0, '20K', 2.00, 9999.60, 0.00, 1000.00, 1001.00, 12000.60, 360.02, 12360.62, 'NA', 3, '../images/product_image/671e7a71160a5m1.jpg', 'Active'),
(7, 'PRO06', 'Infinite Rose Gold Chain', 'CAT02', 'Rose Gold', 7.000, 0.000, 0, '20K', 7.00, 34998.60, 0.00, 3500.00, 1950.00, 40448.60, 1213.46, 41662.06, 'NA', 4, '../images/product_image/671e7d6a5d007rg1.jpg', 'Active'),
(8, 'PRO07', 'Anklet', 'CAT07', 'Rose Gold', 5.000, 0.000, 0, '18K', 5.00, 22500.00, 0.00, 2500.00, 1000.00, 26000.00, 780.00, 26780.00, 'not ', 1, '../images/product_image/671e79d50bb9cc6.jpg', 'Active');

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
(2, 'Image 1', '1729609145_slider_image1729607199_carouselImg4.png'),
(3, 'Image 2', '1729609162_carouselimg7.png'),
(5, 'Image 3', '1729619598_carouselImg5.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `u_id` int(5) NOT NULL,
  `u_code` varchar(10) NOT NULL,
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

INSERT INTO `user_tbl` (`u_id`, `u_code`, `u_fullname`, `u_gender`, `u_email`, `u_mobile`, `u_address`, `u_city`, `u_state`, `u_pincode`, `u_password`, `u_image`, `u_status`, `u_role`) VALUES
(1, 'USR01', 'Jayshree', 'female', 'veloraa1920@gmail.com', '9408136373', 'sadhuvasvani kunj road railnager', 'Rajkot', 'Gujarat', '360002', 'Jayshree@12', '../images/profile_image/admin/67212323e85625453-dragon-age-inquisition.jpg', 'Active', 'Admin'),
(2, 'USR02', 'Kalindi Fichadia', 'Female', 'fichadiyakalindi@gmail.com', '9408136373', 'Shree radhekrishna park railnager', 'Rajkot', 'Gujarat', '360002', 'Kalindi@12', '../images/profile_image/67212363e16c8117324-aleni.jpg', 'Active', 'User');

--
-- Triggers `user_tbl`
--
DELIMITER $$
CREATE TRIGGER `before_insert_user` BEFORE INSERT ON `user_tbl` FOR EACH ROW BEGIN
    DECLARE new_code INT;

    -- Get the highest existing order code number
    SELECT COALESCE(MAX(CAST(SUBSTRING(u_code, 4) AS UNSIGNED)), 0) INTO new_code FROM user_tbl;

    -- Increment the code for new entry
    SET new_code = new_code + 1;

    -- Set the new order code in the format ORD01, ORD02, etc.
    SET NEW.u_code = CONCAT('USR', LPAD(new_code, 2, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_tbl`
--

CREATE TABLE `wishlist_tbl` (
  `w_id` int(3) NOT NULL,
  `w_code` varchar(10) NOT NULL,
  `w_username` varchar(100) NOT NULL,
  `w_p_code` varchar(10) NOT NULL,
  `w_p_tot_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist_tbl`
--

INSERT INTO `wishlist_tbl` (`w_id`, `w_code`, `w_username`, `w_p_code`, `w_p_tot_price`) VALUES
(2, 'WISH01', 'vchavda123@gmail.com', 'PRO02', 10814.66);

--
-- Triggers `wishlist_tbl`
--
DELIMITER $$
CREATE TRIGGER `before_insert_product_to_wishlist` BEFORE INSERT ON `wishlist_tbl` FOR EACH ROW BEGIN
    DECLARE new_code INT;

    -- Get the highest existing category code number, extracting the numeric part after 'CART'
    SELECT COALESCE(MAX(CAST(SUBSTRING(w_code, 5) AS UNSIGNED)), 0) INTO new_code FROM wishlist_tbl;

    -- Increment the code for a new entry
    SET new_code = new_code + 1;

    -- Set the new category code in the format CART01, CART02, etc.
    SET NEW.w_code = CONCAT('WISH', LPAD(new_code, 2, '0'));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_tbl`
--
ALTER TABLE `about_us_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_code` (`c_code`);

--
-- Indexes for table `contact_us_tbl`
--
ALTER TABLE `contact_us_tbl`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `order_items_tbl`
--
ALTER TABLE `order_items_tbl`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`o_id`),
  ADD UNIQUE KEY `o_code` (`o_code`);

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
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_code` (`u_code`);

--
-- Indexes for table `wishlist_tbl`
--
ALTER TABLE `wishlist_tbl`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_tbl`
--
ALTER TABLE `about_us_tbl`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `ct_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_us_tbl`
--
ALTER TABLE `contact_us_tbl`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items_tbl`
--
ALTER TABLE `order_items_tbl`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_token_tbl`
--
ALTER TABLE `password_token_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist_tbl`
--
ALTER TABLE `wishlist_tbl`
  MODIFY `w_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
