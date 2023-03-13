-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 10:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `username` varchar(200) NOT NULL,
  `title` varchar(300) NOT NULL,
  `photo_id` varchar(300) NOT NULL,
  `blog` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`username`, `title`, `photo_id`, `blog`) VALUES
('Sardar Piash', 'Watch', 'IMG-640e46bfecc081.71427940.jpeg', 'Watch'),
('Sardar Piash', 'Watch', 'IMG-640e46da24be89.66269495.jpg', 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `username` varchar(200) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`username`, `text`) VALUES
('piash', 'Hi'),
('abdul kalam', 'Hi'),
('piash2', 'hi'),
('Sardar Piash', 'Hlw');

-- --------------------------------------------------------

--
-- Table structure for table `newproduct`
--

CREATE TABLE `newproduct` (
  `name` varchar(300) NOT NULL,
  `price` int(11) NOT NULL,
  `details` text NOT NULL,
  `photo_id` varchar(300) NOT NULL,
  `username` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newproduct`
--

INSERT INTO `newproduct` (`name`, `price`, `details`, `photo_id`, `username`, `id`) VALUES
('Watch', 100, 'Watch', 'IMG-640e3ed2b27e96.86733618.jpg', 'edwd', 1),
('Laptop', 40000, 'Lenevo', 'IMG-640e3eed484484.30898320.jpeg', 'edwd', 2),
('Watch', 599, 'Watch', 'IMG-640e3f4f95acd8.40709976.jpg', 'edwd', 3),
('Watch', 300, 'Watch', 'IMG-640e3fed6e5d69.99699424.jpg', 'edwd', 4),
('T-shirt', 200, 'T-shirt', 'IMG-640e4018dca6a0.12361879.jpeg', 'edwd', 5),
('Watch', 120, 'Men watch', 'IMG-640eb24e320022.21857388.jpg', 'Sardar Piash', 6),
('Laptop', 40000, 'Lenovo', 'IMG-640eb2968cd6c2.85522885.jpeg', 'Sardar Piash', 7),
('Laptop', 50000, 'HP', 'IMG-640eb2af5d4742.56606555.jpeg', 'Sardar Piash', 8),
('Watch', 300, 'watch', 'IMG-640ec2e2e7d513.21817489.jpg', 'Sardar Piash', 9);

-- --------------------------------------------------------

--
-- Table structure for table `ordermanage`
--

CREATE TABLE `ordermanage` (
  `username` varchar(200) NOT NULL,
  `photo_id` varchar(300) NOT NULL,
  `price` int(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordermanage`
--

INSERT INTO `ordermanage` (`username`, `photo_id`, `price`, `status`, `id`, `product_name`) VALUES
('Sardar Piash', 'IMG-640e3ed2b27e96.86733618.jpg', 1000, 'Approved', 9, 'Watch'),
('Sardar Piash', 'IMG-640e3ed2b27e96.86733618.jpg', 800, 'Rejected', 10, 'Watch'),
('Sardar Piash', 'IMG-640e3ed2b27e96.86733618.jpg', 800, 'Rejected', 11, 'Watch'),
('Sardar Piash', 'IMG-640e3ed2b27e96.86733618.jpg', 1000, 'Rejected', 12, 'Watch'),
('Sardar Piash', 'IMG-640e3ed2b27e96.86733618.jpg', 400, 'Rejected', 13, 'Watch'),
('Sardar Piash', 'IMG-640e3ed2b27e96.86733618.jpg', 400, 'Approved', 14, 'Watch'),
('Sardar Piash', 'IMG-640e3fed6e5d69.99699424.jpg', 130, 'Rejected', 15, 'Watch'),
('Sardar Piash', 'IMG-640e3fed6e5d69.99699424.jpg', 130, 'Rejected', 16, 'Watch'),
('Kaium', 'IMG-640e3fed6e5d69.99699424.jpg', 120, 'Approved', 17, 'Watch'),
('Kaium', 'IMG-640e3fed6e5d69.99699424.jpg', 120, 'Approved', 18, 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `bloodgroup` varchar(50) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `type` varchar(40) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `username`, `password`, `email`, `phone`, `gender`, `bloodgroup`, `dob`, `type`, `address`) VALUES
(12, 'Md. Piash', 'Sardar Piash', '123456', 'piashm@gmail.com', '01772762450', 'Male', 'A-', '2014-01-07', 'seller', 'Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newproduct`
--
ALTER TABLE `newproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordermanage`
--
ALTER TABLE `ordermanage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newproduct`
--
ALTER TABLE `newproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ordermanage`
--
ALTER TABLE `ordermanage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
