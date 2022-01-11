-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 10:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff',
  `branch_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `branch_id`, `date_created`) VALUES
(1, 'Administrator', '', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 1, 0, '2020-11-26 10:57:04'),
(2, 'John', 'Smith', 'jsmith@sample.com', '1254737c076cf867dc53d60a0364f38e', 2, 1, '2020-11-26 11:52:04'),
(3, 'George', 'Wilson', 'gwilson@sample.com', 'd40242fb23c45206fadee4e2418f274f', 2, 4, '2020-11-27 13:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(30) NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `country` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_code`, `street`, `city`, `state`, `zip_code`, `country`, `contact`, `date_created`) VALUES
(1, '67893', 'Sample', 'Accra', 'Sample', '1001', 'Ghana', '+2 123 455 623', '2021-11-22 11:21:41'),
(3, '67894', 'Sample', 'Cape Coast', 'Sample', '6000', 'Ghana', '+1234567489', '2021-11-22 16:45:05'),
(4, '67895', 'Sample', 'Nkawkaw', 'Sample', '123456', 'Ghana', '123456', '2021-11-22 13:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_mail` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `user_mail`, `message`, `date`) VALUES
(1, 'rahat', 'rahatuddin786@gamil.com', 'casdsdada', '2021-11-21 08:04:22'),
(2, 'rahat', 'rahatuddin786@gamil.com', 'casdsdada', '2021-11-21 10:55:35'),
(3, 'boateng', 'boateng@gmail.com', 'hey hey hey', '2021-11-21 23:37:39'),
(4, 'boateng', 'boateng@gmail.com', 'hey hey hey', '2021-11-22 04:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` int(30) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `sfname` text NOT NULL,
  `slname` text NOT NULL,
  `sender_address` text NOT NULL,
  `sender_contact` text NOT NULL,
  `rfname` text NOT NULL,
  `rlname` text NOT NULL,
  `recipient_address` text NOT NULL,
  `recipient_contact` text NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 = Deliver, 2=Pickup',
  `from_branch_id` varchar(30) NOT NULL,
  `to_branch_id` varchar(30) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL,
  `length` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `reference_number`, `sfname`, `slname`, `sender_address`, `sender_contact`, `rfname`, `rlname`, `recipient_address`, `recipient_contact`, `type`, `from_branch_id`, `to_branch_id`, `weight`, `height`, `width`, `length`, `price`, `status`, `date_created`) VALUES
(2, '117967400213', 'John Smith', '0', 'Sample', '+123456', 'Claire Blake', '', 'Sample', 'Sample', 2, '1', '3', '30kg', '12in', '12in', '15in', 2500, 1, '2020-11-26 16:46:03'),
(3, '983186540795', 'John Smith', '0', 'Sample', '+123456', 'Claire Blake', '', 'Sample', 'Sample', 2, '1', '3', '20Kg', '10in', '10in', '10in', 1500, 4, '2020-11-26 16:46:03'),
(4, '514912669061', 'Claire Blake', '0', 'Sample', '+123456', 'John Smith', '', 'Sample Address', '+12345', 2, '4', '1', '23kg', '12in', '12in', '15in', 1900, 1, '2020-11-27 13:52:14'),
(5, '897856905844', 'Claire Blake', '0', 'Sample', '+123456', 'John Smith', '', 'Sample Address', '+12345', 2, '4', '1', '30kg', '10in', '10in', '10in', 1450, 0, '2020-11-27 13:52:14'),
(6, '505604168988', 'John Smith', '0', 'Sample', '+123456', 'Sample', '', 'Sample', '+12345', 1, '1', '0', '23kg', '12in', '12in', '15in', 2500, 1, '2020-11-27 14:06:42'),
(9, '517828268426', 'sourav', '0', 'Noakhali', '123456', 'rabbi', '', 'Noakhali', '3466', 2, '4', '3', '22', '22', '22', '22', 220, 0, '2021-11-21 16:48:55'),
(12, '231462576233', 'Atumpami Abakomi', '0', 'Accra', '+89999', 'Boateng Eric Kwakye', '', 'Cape Coast', '+89000', 2, '1', '3', '22', '5', '10', '6', 234, 0, '2021-11-22 11:06:33'),
(13, '934750380451', 'Alex Ofori', '0', 'Nkhawkaw', '+89999', 'Boateng Eric Kwakye', '', 'Cape Coast', '+8900023', 2, '4', '3', '12', '6', '23', '11', 456, 4, '2021-11-22 11:38:37'),
(14, '505399806465', 'Faysal', 'hosen', 'Noakhali', '123456', 'Shakil', 'Ahmed', 'Noakhali', '5678', 2, '4', '3', '26', '11', '23', '12', 135, 0, '2021-11-27 15:14:43'),
(16, '205788008841', 'imran', 'hosen', 'Noakhali', '1112233', 'Shakil', 'uddin', 'Noakhali', '5678', 2, '1', '3', '10', '2', '3', '33', 55, 2, '2021-11-27 16:23:24'),
(17, '206006998712', 'Rahat', 'Uddin ', 'Noakhali', '123456', 'Shakil', 'Ahmed', 'Noakhali', '+89000', 2, '1', '1', '12', '12', '21', '34', 0, 0, '2021-11-27 16:26:09'),
(18, '576495592308', 'Priyo', 'Sha', 'Ctg', '123456', 'Showkot', 'Khan', 'Noakhali', '+8900023', 2, '4', '1', '5', '23', '12', '12', 30, 0, '2021-11-27 16:28:00'),
(19, '489906293141', 'Priyo', 'Sha', 'Noakhali', '123456', 'Patrick', 'Ahmed', 'Noakhali', '5678', 2, '1', '4', '44', '66', '11', '34', 225, 6, '2021-11-27 18:51:13'),
(20, '363080520419', 'Boateng', 'Boateng', 'Ghana', '+89999', 'Boateng2', 'Boateng2', 'Ghana', '+89000', 2, '1', '3', '5', '66', '11', '11', 35, 2, '2021-11-27 20:51:28'),
(21, '579715996621', 'Asif', 'Akber', 'Ctg', '12456', 'Kamruzzaman', 'Sheikh', 'Noakhali', '3466', 2, '3', '4', '12', '23', '11', '11', 65, 0, '2021-11-27 20:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_requests`
--

CREATE TABLE `parcel_requests` (
  `id` int(30) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `sfname` text NOT NULL,
  `slname` text NOT NULL,
  `sender_address` text NOT NULL,
  `sender_contact` text NOT NULL,
  `rfname` text NOT NULL,
  `rlname` text NOT NULL,
  `recipient_address` text NOT NULL,
  `recipient_contact` text NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 = Deliver, 2=Pickup',
  `from_branch_id` varchar(30) NOT NULL,
  `to_branch_id` varchar(30) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL,
  `length` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcel_requests`
--

INSERT INTO `parcel_requests` (`id`, `reference_number`, `sfname`, `slname`, `sender_address`, `sender_contact`, `rfname`, `rlname`, `recipient_address`, `recipient_contact`, `type`, `from_branch_id`, `to_branch_id`, `weight`, `height`, `width`, `length`, `price`, `payment_mode`, `status`, `user_id`, `date_created`) VALUES
(14, '206006998712', 'Rahat', 'Uddin ', 'Noakhali', '123456', 'Shakil', 'Ahmed', 'Noakhali', '+89000', 2, '1', '1', '12', '12', '21', '34', 0, 0, 10, 0, '2021-11-27 11:16:22'),
(21, '205788008841', 'imran', 'hosen', 'Noakhali', '1112233', 'Shakil', 'uddin', 'Noakhali', '5678', 2, '1', '3', '2', '2', '3', '33', 15, 1, 10, 0, '2021-11-27 13:23:29'),
(22, '576495592308', 'Priyo', 'Sha', 'Ctg', '123456', 'Showkot', 'Khan', 'Noakhali', '+8900023', 2, '4', '1', '5', '23', '12', '12', 30, 1, 10, 10, '2021-11-27 16:27:15'),
(23, '489906293141', 'Priyo', 'Sha', 'Noakhali', '123456', 'Patrick', 'Ahmed', 'Noakhali', '5678', 2, '3', '4', '22', '66', '11', '34', 115, 2, 10, 0, '2021-11-27 18:36:40'),
(24, '363080520419', 'Boateng', 'Boateng', 'Ghana', '+89999', 'Boateng2', 'Boateng2', 'Ghana', '+89000', 2, '1', '3', '5', '66', '11', '11', 30, 1, 10, 11, '2021-11-27 19:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_tracks`
--

CREATE TABLE `parcel_tracks` (
  `id` int(30) NOT NULL,
  `parcel_id` int(30) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcel_tracks`
--

INSERT INTO `parcel_tracks` (`id`, `parcel_id`, `status`, `date_created`) VALUES
(1, 2, 1, '2020-11-27 09:53:27'),
(2, 3, 1, '2020-11-27 09:55:17'),
(3, 1, 1, '2020-11-27 10:28:01'),
(4, 1, 2, '2020-11-27 10:28:10'),
(5, 1, 3, '2020-11-27 10:28:16'),
(6, 1, 4, '2020-11-27 11:05:03'),
(7, 1, 5, '2020-11-27 11:05:17'),
(8, 1, 7, '2020-11-27 11:05:26'),
(9, 3, 2, '2020-11-27 11:05:41'),
(10, 6, 1, '2020-11-27 14:06:57'),
(11, 4, 1, '2021-11-17 18:55:49'),
(12, 13, 1, '2021-11-22 11:39:56'),
(13, 13, 2, '2021-11-22 11:40:44'),
(14, 13, 3, '2021-11-22 11:41:02'),
(15, 3, 4, '2021-11-22 11:41:15'),
(16, 13, 4, '2021-11-22 14:37:59'),
(17, 16, 1, '2021-11-27 16:25:11'),
(18, 16, 2, '2021-11-27 16:25:24'),
(19, 19, 6, '2021-11-27 18:53:22'),
(20, 20, 2, '2021-11-27 20:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lame` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `birth_date` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone_num` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lame`, `gender`, `birth_date`, `username`, `password`, `address`, `phone_num`) VALUES
(4, 'Zaman', 'Himu', '1', '24', 'zaman123@gmail.com', '12345', 'dhaka uttara road 4', '01878517664'),
(6, 'Imran', 'Hossen', '1', '2021-08-05', 'imran45@gmail.com', '1234', 'dhaka uttara road 4', '01878457664'),
(7, 'Kayum', 'Ahmed', '1', '2021-08-26', 'kayum2345@gmai.com', '1234', 'dhaka uttara road 4', '01878517664'),
(8, 'Faysal', 'Ahmed', '1', '2021-08-26', 'faysal12@gmail.com', '4567', 'dhaka uttara road 4', '01878517664'),
(9, 'Pabel', 'Rahman', '1', '8-12.1999', 'pabel@gmail.com', '12345', 'djhgdlgj', '018712345'),
(10, 'Imran', 'Uddin', '2', '2021-09-25', 'rahatuddin786@gmail.com', '1234', 'dhaka uttara road 4', '01878517664'),
(11, 'Boateng', 'Boateng', '1', '2021-11-09', 'boateng@gamil.com', 'boateng', 'Ghana', '124556777');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_requests`
--
ALTER TABLE `parcel_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_tracks`
--
ALTER TABLE `parcel_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `parcel_requests`
--
ALTER TABLE `parcel_requests`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `parcel_tracks`
--
ALTER TABLE `parcel_tracks`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
