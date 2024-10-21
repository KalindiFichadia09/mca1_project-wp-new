-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 06:57 PM
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
(1, '<p><strong>Our Story</strong></p><p>Jaysheree Jewels was born from a passion for timeless elegance and the belief that every piece of jewelry tells a unique story. Our journey began over a decade ago with a vision to create exquisite, handcrafted jewelry that celebrates life’s most cherished moments. Each piece in our collection is meticulously designed and crafted by artisans who pour their heart and soul into every detail, ensuring that every jewel becomes a treasured heirloom.</p><p>&nbsp;</p><p><strong>Why Choose Us</strong></p><p>Choosing Jaysheree Jewels means choosing a partner who understands that jewelry is more than just an accessory—it’s an expression of who you are. Whether you are marking a special occasion or simply indulging in something beautiful, we are here to help you find the perfect piece that speaks to your heart. Our team is dedicated to providing an exceptional customer experience, from personalized consultations to after-sales support, ensuring that your journey with us is as memorable as the jewelry you wear.</p><p>&nbsp;</p><p><strong>Our Craftsmanship</strong></p><p>At Jaysheree Jewels, craftsmanship is at the heart of everything we do. Our skilled artisans combine traditional techniques with modern innovation to create jewelry that is both timeless and contemporary. From selecting the finest gemstones to shaping precious metals with precision, every step in our process reflects our commitment to quality and excellence. We believe that true beauty lies in the details, and it is this dedication to perfection that sets us apart.</p><p>&nbsp;</p><p><strong>Our Collections</strong></p><p>Our collections range from classic to contemporary, featuring an array of designs that cater to different tastes and occasions. Whether you’re looking for a stunning engagement ring, a pair of elegant earrings, or a statement necklace, you’ll find something that resonates with your style at Jaysheree Jewels. Each collection is inspired by the beauty of the world around us, infused with creativity, and crafted with care.</p>', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_tbl`
--
ALTER TABLE `about_us_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_tbl`
--
ALTER TABLE `about_us_tbl`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
