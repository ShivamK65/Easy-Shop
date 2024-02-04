-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 05:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno.` bigint(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`, `email`, `phoneno.`, `password`) VALUES
(1, 'shivam', 'shivam.shivam@gmail.com', 1236547899, 'shivam'),
(3, 'admin', 'admin.admin@gmail.com', 9999999999, 'admin'),
(4, 'sk', 'sk.sk@gmail.com', 1236545647, 'sk1234'),
(5, 'sss', 'shivam.bahubali121@gamil.com', 8699069366, 'iwhvwrgvb'),
(6, 'jjh', 'shivam.bahubali121@gamil.com', 8699069366, 'uoivhow'),
(7, 'hhh', 'hhh@gmail.com', 1236547894, 'hhh741'),
(9, 'nikhil', 'nikhil.nikhil@gmail.com', 123654789, 'hikkedc'),
(10, '', '', 0, ''),
(11, '', '', 0, ''),
(12, 'dhanraj', 'new.new@gmail.com', 7896541239, '1234'),
(13, 'luck', 'luck.luck@gmail.com', 7788994569, 'luck'),
(14, 'anushka', 'new.new@gmail.com', 1234567899, 'anushka'),
(15, 'satyam', 'satyam.new@gmail.com', 1234567890, 'satyam');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(9) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `order_qty` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `item_name`, `order_qty`, `user_id`, `address`) VALUES
(1, 'Cheese Grill Sandwich', 1, 1, 'dfjoi'),
(2, 'Bread Pakoda', 1, 1, 'dfjoi'),
(3, 'Black Forest Cake', 1, 1, 'dfjoi'),
(4, 'Brownie', 1, 1, 'dfjoi'),
(5, 'Strawberry Cake', 1, 1, 'j hostal'),
(6, 'Strawberry Cake', 1, 1, 'j hostal'),
(7, 'Strawberry Cake', 1, 1, 'j hostal'),
(8, 'Butterschotch Pastry', 1, 1, 'qq'),
(9, 'Chole Samosa', 1, 1, 'a block'),
(10, 'Black Forest Cake', 1, 1, 'aa'),
(11, 'Butterschotch Pastry', 1, 1, 'eeee'),
(12, 'Special Thali', 1, 1, 'D hostel'),
(13, 'Strawberry Cake', 1, 1, 'D hostel'),
(14, 'Rajma Rice', 1, 1, 'D hostel'),
(15, 'Paneer Paratha', 1, 1, 'D hostel'),
(16, 'Chole Bhature', 1, 1, 'D hostel'),
(17, 'Masala Maggi', 1, 3, 'h hostel'),
(18, 'Poha', 1, 3, 'h hostel'),
(19, 'Jumbo Thali', 1, 3, 'h hostel'),
(20, 'Cold Drinks', 1, 3, 'h hostel'),
(21, 'French Fries', 2, 1, 'k hostel'),
(22, 'Chilli Paneer Sandwich', 1, 1, 'k hostel'),
(25, 'Chole Samosa', 2, 14, 'h hostel'),
(26, 'Strawberry Cake', 1, 14, 'h hostel'),
(27, 'Masala Maggi', 2, 15, 'b block'),
(28, 'Poha', 1, 15, 'b block'),
(29, 'Stuffed Paratha', 1, 15, 'b block'),
(30, 'Jumbo Thali', 1, 15, 'b block');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
