-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2015 at 06:51 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `location_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `bookings_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `place_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `guest_numb` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reserve_date` date NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookings_id`, `user_name`, `contact_info`, `place_id`, `hotel_id`, `trans_id`, `guide_id`, `guest_numb`, `order_date`, `reserve_date`, `package_id`) VALUES
(4, '2', '01676320284', 3, 4, 2, 2, 5, '2015-11-30 19:42:22', '2015-12-17', 2),
(5, 'momin', '0167239021838', 1, 2, 3, 2, 3, '2015-12-01 08:04:13', '2015-12-02', 2),
(6, 'abcd', '2184723847', 3, 4, 1, 1, 10, '2015-12-01 08:42:47', '2015-12-15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(256) NOT NULL,
  `division_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `division_id`) VALUES
(1, 'Dhaka', 1),
(2, 'Gazipur', 1),
(3, 'Tangail', 1),
(4, 'Faridpur', 1),
(5, 'Brahmanbaria', 2),
(6, 'Comilla', 2),
(7, 'Cox''s Bazaar', 2),
(8, 'Noakhali', 2),
(9, 'Chittagong', 2),
(10, 'Noakhali', 2),
(11, 'Rajshahi', 3),
(12, 'Joypurhat', 3),
(13, 'Shirajganj', 3),
(14, 'Pabna', 3),
(15, 'Sylhet', 4),
(16, 'Habiganj', 4),
(17, 'Barisal', 5),
(18, 'Pirojpur', 5);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `division_id` int(11) NOT NULL,
  `division_name` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong'),
(3, 'Rajshahi'),
(4, 'Sylhet'),
(5, 'Barisal');

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE IF NOT EXISTS `guide` (
  `guide_id` int(11) NOT NULL,
  `guide_name` varchar(256) NOT NULL,
  `division_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`guide_id`, `guide_name`, `division_id`) VALUES
(1, 'Tanvir Hasan', 1),
(2, 'Fuad Hasan', 1),
(3, 'Irteza Chowdhury', 2),
(4, 'S.M. Belal Bin Bari', 2),
(5, 'Sourav Saha', 3),
(6, 'Sakibul Hasan', 3),
(7, 'Fahmida Sultana', 4),
(8, 'Tahmina Chowdhury', 4),
(9, 'Sandipon Paul', 5),
(10, 'Rafiduzzaman Sonnet', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(256) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `city_id`) VALUES
(1, 'Cox Palace', 7),
(2, 'Sea Gaal', 7),
(3, 'Pennisula', 9),
(4, 'Pan Pacific Sonargaon', 1),
(5, 'Hotel Sheraton', 1),
(6, 'Ishakha', 2),
(7, 'Rajmoni', 2),
(8, 'Balaka', 3),
(9, 'Chitra', 3),
(10, 'Boishakhi', 4),
(11, 'Shourovi', 4),
(12, 'BrahmanBaria Hotel', 5),
(13, 'Comilla INN', 6);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_name`) VALUES
(1, 'Ordinary'),
(2, 'Special'),
(3, 'Luxury');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(256) NOT NULL,
  `division_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `place_info` varchar(256) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `guide_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `img_file` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_id`, `place_name`, `division_id`, `city_id`, `place_info`, `hotel_id`, `guide_id`, `trans_id`, `package_id`, `img_file`) VALUES
(2, 'Sea Beach', 2, 7, 'The Longest Sea Beach of the World!!!', 1, 4, 9, 3, 'photo1.jpg'),
(3, 'Ahsan Manjil', 1, 1, 'One of the Most Royal Place of OLD Dacca!!!', 4, 1, 1, 3, 'pic3.jpg'),
(5, 'ndasodnsnadan', 1, 2, 'sdnalnddnaldndasn', 2, 1, 2, 2, 'pic3.jpg'),
(6, 'addasd', 1, 1, 'dasdada', 3, 1, 1, 1, 'photo.jpg'),
(7, 'dansdnasd', 2, 7, 'dasdaasdda', 2, 3, 9, 3, 'photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
  `trans_id` int(11) NOT NULL,
  `trans_name` varchar(256) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`trans_id`, `trans_name`, `city_id`) VALUES
(1, 'Shohagh Paribahan', 1),
(2, 'Skyline', 1),
(3, 'Royal', 2),
(4, 'Gazipur Express', 2),
(5, 'Tangail Express', 3),
(6, 'Faridpur Express', 4),
(7, 'BrahmanBaria Express', 5),
(8, 'Comilla Express', 6),
(9, 'Volvo', 7),
(10, 'Marcedez Benz', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'Mohammad Amzad Hossain', 'amzad.ethan', 'amzad.ethan@gmail.com', 'chronoss'),
(2, 'Mahdia Mahtarin Chowdhury', 'mahdia', 'mahdia@gmail.com', 'c3c6c05c44631b164376b5f9f8c13dea'),
(3, 'sakibul hasan', 'jitu', 'jitu@gmail.com', '01dab6a26b7db2bedc3d6ab33ad8d626'),
(4, 'Iffat Emmy', 'emmy', 'emmy@gmail.com', '8a74cdd9f34548a005a6952504f991ad'),
(5, 'Taposhi Rabeya Trisha', 'trisha', 'trisha@gmail.com', '5af7a513a7c48f6cc97253254b29509b'),
(6, 'Momin Shohag', 'momin', 'momin@gmail.com', 'a437c07f621651d0fb6f2197082d7273'),
(8, 'jdoasjdosajodsjd', 'dbasdbdbn', 'ndjsn@gmail.com', 'aab4e7677c26a339175c7191e1db74c8'),
(9, 'abcd', 'abcdfgh', 'abcdfg', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookings_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`), ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`guide_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookings_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `guide`
--
ALTER TABLE `guide`
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `division` (`division_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
