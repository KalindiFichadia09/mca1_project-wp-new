-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 03:33 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
