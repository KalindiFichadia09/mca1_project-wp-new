-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 06:59 PM
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
(1, '<p><strong>Why Choose Us</strong></p><p>Choosing Jaysheree Jewels means choosing a partner who understands that jewelry is more than just an accessory, it’s an expression of who you are. Whether you are marking a special occasion or simply indulging in something beautiful, we are here to help you find the perfect piece that speaks to your heart. Our team is dedicated to providing an exceptional customer experience, from personalized consultations to after-sales support, ensuring that your journey with us is as memorable as the jewelry you wear.</p><p><strong>Our Collections</strong></p><p>Our collections range from classic to contemporary, featuring an array of designs that cater to different tastes and occasions. Whether you’re looking for a stunning engagement ring, a pair of elegant earrings, or a statement necklace, you’ll find something that resonates with your style at Jayshree Jewels. Each collection is inspired by the beauty of the world around us, infused with creativity, and crafted with care.</p>', 'aboutus4.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `ct_id` int(3) NOT NULL,
  `ct_code` varchar(10) NOT NULL,
  `ct_username` varchar(100) NOT NULL,
  `ct_p_code` varchar(10) NOT NULL,
  `ct_quentity` int(11) NOT NULL,
  `ct_p_tot_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'CAT02', 'Gold Chain', 'Male', '../images/category_image/671e4c1f4761fc1.jpg', 'Deleted'),
(3, 'CAT03', 'Bangles', 'Female', '../images/category_image/67211d6fd2482c7.jpg', 'Active'),
(4, 'CAT04', 'Ring', 'Female', '../images/category_image/671e4c6544b01g_ring_f.jpg', 'Active'),
(7, 'CAT05', 'Earings', 'Female', '../images/category_image/671e77f672fd5c8.jpg', 'Active'),
(8, 'CAT06', 'Mangalsutra', 'Female', '../images/category_image/671e780800ab6m1.jpg', 'Active'),
(9, 'CAT07', 'Anklet', 'Female', '../images/category_image/671e78133cb9cc6.jpg', 'Active'),
(10, 'CAT08', '', '', '../images/category_image/', 'Deleted'),
(11, 'CAT09', '', '', '../images/category_image/', 'Deleted'),
(12, 'CAT10', '', '', '../images/category_image/', 'Deleted');

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
(2, 'Kalindi Fichadia', 'kfichadiya849@rku.ac.in', 'i want to talk with you', 'hello \r\nwhats\' an issue ??\r\nshare with us... \r\nwe will try our best to solve your issue...'),
(3, 'Kalindi Fichadia', 'fichadiyakalindi@gmail.com', 'hello !\r\nI want to talk with your designer for make a customized ring for me.\r\nSo please send me their information as soon as possible', 'Yahh sure...!\r\nWe are glad that you choose us for ring design.\r\nKalindi (9408133376');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `o_id` int(11) NOT NULL,
  `offer_name` varchar(255) NOT NULL,
  `offer_description` text NOT NULL,
  `discount_percentage` int(2) NOT NULL,
  `cart_total` decimal(10,2) NOT NULL,
  `max_discount` decimal(5,2) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`o_id`, `offer_name`, `offer_description`, `discount_percentage`, `cart_total`, `max_discount`, `start_date`, `end_date`, `status`) VALUES
(1, 'BigSale24', 'dkshfwe', 2, 1500.00, 500.00, '2024-12-16 00:00:00', '2024-12-20 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `o_id` int(11) NOT NULL,
  `o_username` varchar(100) NOT NULL,
  `o_order_id` varchar(100) NOT NULL,
  `o_sub_order_id` varchar(100) NOT NULL,
  `o_p_code` varchar(50) NOT NULL,
  `o_total_amount` decimal(10,2) NOT NULL,
  `o_quentity` int(11) NOT NULL,
  `o_address` varchar(500) NOT NULL,
  `o_mobile` varchar(10) NOT NULL,
  `o_city` varchar(50) NOT NULL,
  `o_pincode` varchar(6) NOT NULL,
  `o_state` varchar(50) NOT NULL,
  `o_delivery_status` varchar(50) NOT NULL,
  `o_payment_status` varchar(50) NOT NULL,
  `o_offer_name` varchar(50) NOT NULL,
  `o_payment_mode` varchar(50) NOT NULL,
  `o_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`o_id`, `o_username`, `o_order_id`, `o_sub_order_id`, `o_p_code`, `o_total_amount`, `o_quentity`, `o_address`, `o_mobile`, `o_city`, `o_pincode`, `o_state`, `o_delivery_status`, `o_payment_status`, `o_offer_name`, `o_payment_mode`, `o_date`) VALUES
(1, 'fichadiyakalindi@gmail.com', 'order_PVMgwSob7lJVtF', '6757d7944869b', 'PRO08', 3652.28, 1, 'Shree radhekrishna park railnager', '9408136373', 'Rajkot', '360002', 'Gujarat', 'Delivered', 'Completed', 'BigSale24', 'Online', '2024-12-10 11:24:28'),
(2, 'fichadiyakalindi@gmail.com', 'order_PVMgwSob7lJVtF', '6757d7944869b', 'PRO04', 3652.28, 1, 'Shree radhekrishna park railnager', '9408136373', 'Rajkot', '360002', 'Gujarat', 'Delivered', 'Completed', 'BigSale24', 'Online', '2024-12-10 11:24:28'),
(3, 'fichadiyakalindi@gmail.com', 'order_PVNMgdY41lrAIv', '6757e0c3aaba9', 'PRO10', 2148.01, 1, 'Shree radhekrishna park railnager', '9408136373', 'Rajkot', '360002', 'Gujarat', 'Delivered', 'Completed', 'BigSale24', 'Online', '2024-12-10 12:03:39'),
(4, 'fichadiyakalindi@gmail.com', 'order_PXVvgPvfXuLNqy', '675f0065d6734', 'PRO10', 2148.01, 1, 'Shree radhekrishna park railnager', '9408136373', 'Rajkot', '360002', 'Gujarat', 'Delivered', 'Completed', '', 'Online', '2024-12-15 21:44:29'),
(5, 'fichadiyakalindi@gmail.com', 'order_PXXRrij2IH5AJM', '675f1542c185f', 'PRO03', 6500.72, 1, 'Shree radhekrishna park railnager', '9408136373', 'Rajkot', '360002', 'Gujarat', 'Delivered', 'Completed', 'BigSale24', 'Online', '2024-12-15 23:13:30');

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
  `p_sc_code` varchar(10) NOT NULL,
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
  `p_discount` int(5) NOT NULL,
  `p_discount_price` double(10,2) NOT NULL,
  `p_main_image` varchar(250) NOT NULL,
  `p_other_image` varchar(1000) NOT NULL,
  `p_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`p_id`, `p_code`, `p_name`, `p_sc_code`, `p_type`, `p_gross_weight`, `p_diamond_weight`, `p_diamond_pices`, `p_purity`, `p_gold_weight`, `p_gold_price`, `p_diamond_price`, `p_making_charge`, `p_overhead_charges`, `p_base_price`, `p_tax`, `p_total_price`, `p_diamond_color`, `p_stock`, `p_discount`, `p_discount_price`, `p_main_image`, `p_other_image`, `p_status`) VALUES
(1, 'PRO01', 'Cross Chain', 'none', 'Rose Gold', 25.000, 0.000, 0, '20K', 25.00, 124995.00, 0.00, 12500.00, 2250.00, 139745.00, 4192.35, 143937.35, 'NA ', 3, 5, 136740.48, '../images/product_image/671e7a1782e5ag_chain_m.jpg', '', 'Active'),
(3, 'PRO02', 'Ring', 'SCT01', 'Rose Gold', 2.000, 0.350, 10, '20K', 1.65, 8249.67, 200.00, 1000.00, 1050.00, 10499.67, 314.99, 10814.66, 'White', 4, 2, 10598.37, '../images/product_image/671e7a24f111bg_ring_f.jpg', '', 'Deleted'),
(4, 'PRO03', 'Bangles', 'SCT03', 'Yellow Gold', 0.900, 0.000, 0, '22K', 0.90, 4950.18, 0.00, 450.00, 1040.00, 6440.18, 193.21, 6633.39, 'NA ', 0, 2, 6500.72, '../images/product_image/671e7a2e5b11dc13.jpg', ',,', 'Active'),
(5, 'PRO04', 'Earings', 'SCT02', 'Yellow Gold', 0.500, 0.010, 4, '22K', 0.49, 2695.10, 80.00, 250.00, 241.00, 3266.10, 97.98, 3364.08, 'Silver', 1, 7, 3128.60, '../images/product_image/671e79f03dc46c8.jpg', ',,', 'Active'),
(6, 'PRO05', 'Gold Plated Mangalsutra', 'none', 'Yellow Gold', 2.000, 0.000, 0, '20K', 2.00, 9999.60, 0.00, 1000.00, 1001.00, 12000.60, 360.02, 12360.62, 'NA', 3, 3, 0.00, '../images/product_image/671e7a71160a5m1.jpg', '', 'Active'),
(7, 'PRO06', 'Infinite Rose Gold Chain', 'CAT02', 'Rose Gold', 7.000, 0.000, 9, '20K', 7.00, 34998.60, 180.00, 3500.00, 1950.00, 40628.60, 1218.86, 41847.46, 'NA', 4, 9, 0.00, '../images/product_image/671e7d6a5d007rg1.jpg', '', 'Active'),
(8, 'PRO07', 'Anklet', 'CAT07', 'Rose Gold', 5.000, 0.000, 0, '18K', 5.00, 22500.00, 0.00, 2500.00, 1000.00, 26000.00, 780.00, 26780.00, 'not ', 1, 2, 0.00, '../images/product_image/671e79d50bb9cc6.jpg', '', 'Active'),
(9, 'PRO08', 'Gold Ring', 'SCT01', 'Rose Gold', 0.100, 0.000, 0, '18K', 0.10, 450.00, 0.00, 50.00, 105.00, 605.00, 18.15, 623.15, 'NA ', 4, 4, 598.22, '../images/product_image/Leonardo_Phoenix_A_warm_golden_light_illuminates_a_beautifully_3.jpg', '673f6b1d1e2aeLeonardo_Phoenix_A_warm_golden_light_illuminates_a_beautifully_0.jpg,673f6b1d1e2b6Leonardo_Phoenix_A_warm_golden_light_illuminates_a_beautifully_1.jpg,673f6b1d1e2b8Leonardo_Phoenix_A_warm_golden_light_illuminates_a_beautifully_2.jpg', 'Active'),
(10, 'PRO09', 'Bangles', 'SCT03', 'Yellow Gold', 25.000, 0.000, 0, '16K', 25.00, 100005.00, 0.00, 12500.00, 5500.00, 118005.00, 3540.15, 121545.15, 'NA ', 2, 2, 119114.25, '../images/product_image/673f6e406544fg_bangle.jpg', '../images/product_image/673f6e406545bg_bangle.jpg,../images/product_image/673f6e406545ep_bangle1.jpg,../images/product_image/673f6e4065460p_bangle2.jpg', 'Deleted'),
(11, 'PRO10', 'Bangles', 'SCT03', 'Rose Gold', 0.300, 0.000, 0, '20K', 0.30, 1499.94, 0.00, 150.00, 500.00, 2149.94, 64.50, 2214.44, 'NA ', 0, 3, 2148.01, '../images/product_image/673f733494aec673f6e406544fg_bangle.jpg', '../images/product_image/67401a31a03da_671e7a2e5b11dc13.jpg,../images/product_image/67401a6643015_674017bd7073f_p_bangle2.jpg,../images/product_image/67401a9207410_p_bangle1.jpg', 'Active');

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
-- Table structure for table `review_tbl`
--

CREATE TABLE `review_tbl` (
  `r_id` int(11) NOT NULL,
  `r_username` varchar(100) NOT NULL,
  `r_email` varchar(250) NOT NULL,
  `r_p_code` varchar(15) NOT NULL,
  `r_rating` int(11) NOT NULL,
  `r_review` varchar(500) NOT NULL,
  `r_date` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_tbl`
--

INSERT INTO `review_tbl` (`r_id`, `r_username`, `r_email`, `r_p_code`, `r_rating`, `r_review`, `r_date`) VALUES
(2, 'gtfrddrrdde', 'fichadiyakalindi@gmail.com', 'PRO04', 5, 'poiuytfgjklg', '2024-12-10 12:01:09'),
(3, 'kalllu', 'fichadiyakalindi@gmail.com', 'PRO10', 4, 'niceeeeeeeeeeeeee !!!!!!!!!!!!!!', '2024-12-10 12:04:16'),
(4, 'Kalindi', 'fichadiyakalindi@gmail.com', 'PRO03', 4, 'This Product is very nice 👌!!', '2024-12-15 23:15:06');

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
-- Table structure for table `sub_category_tbl`
--

CREATE TABLE `sub_category_tbl` (
  `sc_id` int(5) NOT NULL,
  `sc_code` varchar(10) NOT NULL,
  `sc_name` varchar(100) NOT NULL,
  `c_code` varchar(15) NOT NULL,
  `sc_image` varchar(255) NOT NULL,
  `sc_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category_tbl`
--

INSERT INTO `sub_category_tbl` (`sc_id`, `sc_code`, `sc_name`, `c_code`, `sc_image`, `sc_status`) VALUES
(1, 'SCT01', 'Diamond Ring', 'CAT04', '../images/subcategory_image/673b863e8a45b671e4c6544b01g_ring_f.jpg', 'Active'),
(2, 'SCT02', 'Diamond Earring', 'CAT04', '../images/subcategory_image/671e77f672fd5c8.jpg', 'Active'),
(3, 'SCT03', 'Gold Bangle', 'CAT03', '../images/subcategory_image/671e78133cb9cc6.jpg', 'Active');

--
-- Triggers `sub_category_tbl`
--
DELIMITER $$
CREATE TRIGGER `before_insert_sub_category` BEFORE INSERT ON `sub_category_tbl` FOR EACH ROW BEGIN
    DECLARE new_code INT;

    -- Get the highest existing category code number
    SELECT COALESCE(MAX(CAST(SUBSTRING(sc_code, 4) AS UNSIGNED)), 0) INTO new_code FROM sub_category_tbl;

    -- Increment the code for new entry
    SET new_code = new_code + 1;

    -- Set the new category code in the format CAT01, CAT02, etc.
    SET NEW.sc_code = CONCAT('SCT', LPAD(new_code, 2, '0'));
END
$$
DELIMITER ;

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
(1, 'USR01', 'Jayshree', 'female', 'veloraa1920@gmail.com', '9408136373', 'sadhuvasvani kunj road railnager', 'Rajkot', 'Gujarat', '360002', 'Jayshree@12', '../images/profile_image/admin/673e21f9545183x2_one_women_seeing_the_minimal_gol (2).png', 'Active', 'Admin'),
(2, 'USR02', 'Kalindi Fichadia', 'female', 'fichadiyakalindi@gmail.com', '9408136373', 'Shree radhekrishna park railnager', 'Rajkot', 'Gujarat', '360002', 'Kalindi@12', '../images/profile_image/673ea0b4452f45453-dragon-age-inquisition.jpg', 'Active', 'User');

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
(1, 'WISH01', 'fichadiyakalindi@gmail.com', 'PRO03', 190988.78),
(4, 'WISH04', 'fichadiyakalindi@gmail.com', 'PRO10', 175608.82),
(5, 'WISH05', 'fichadiyakalindi@gmail.com', 'PRO08', 623.15);

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
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`o_id`);

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
-- Indexes for table `review_tbl`
--
ALTER TABLE `review_tbl`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sub_category_tbl`
--
ALTER TABLE `sub_category_tbl`
  ADD PRIMARY KEY (`sc_id`);

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
  MODIFY `ct_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_us_tbl`
--
ALTER TABLE `contact_us_tbl`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_token_tbl`
--
ALTER TABLE `password_token_tbl`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `review_tbl`
--
ALTER TABLE `review_tbl`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_category_tbl`
--
ALTER TABLE `sub_category_tbl`
  MODIFY `sc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `u_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist_tbl`
--
ALTER TABLE `wishlist_tbl`
  MODIFY `w_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
