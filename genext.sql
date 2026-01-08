-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2023 at 02:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genext`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bid` int(11) NOT NULL,
  `trip_date` text DEFAULT NULL,
  `route` int(11) NOT NULL DEFAULT 0,
  `fullname` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `nok_fullname` text DEFAULT NULL,
  `nok_phone` text DEFAULT NULL,
  `nok_address` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `prefered_time` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `ticket_type` varchar(30) NOT NULL DEFAULT '',
  `trip` int(11) NOT NULL DEFAULT 0,
  `pin` varchar(20) NOT NULL DEFAULT '',
  `ref` varchar(150) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bid`, `trip_date`, `route`, `fullname`, `phone`, `nok_fullname`, `nok_phone`, `nok_address`, `address`, `prefered_time`, `email`, `ticket_type`, `trip`, `pin`, `ref`, `status`) VALUES
(1, '2023-01-01', 2, 'Johnson Lobo', '08067061439', 'niza', '08067061439', '24 axs', '23 dfs', 'Trip official time', 'holygist@gmail.com', 'Single Ticket', 4, '353239b702', '0362558001672489346461773', 1),
(2, '2022-12-31', 2, 'Johnson Lobo', '08067061439', 'niza', '08067061439', '7b ada', '21 ada', '8:00 AM', 'admin@error.com', 'Single Ticket', 0, 'eb25908a4d', '0173184001672489873821757', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `cid` int(11) NOT NULL,
  `origin` text DEFAULT NULL,
  `destination` text DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `current_location` text DEFAULT NULL,
  `client_name` varchar(100) NOT NULL DEFAULT '',
  `client_phone` varchar(20) NOT NULL DEFAULT '',
  `reciepient_name` varchar(100) NOT NULL DEFAULT '',
  `reciepient_phone` varchar(20) NOT NULL DEFAULT '',
  `tracking` varchar(10) NOT NULL DEFAULT '',
  `batch` varchar(10) NOT NULL DEFAULT '',
  `delivered` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mid` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `sender` int(11) NOT NULL DEFAULT 0,
  `reciever` int(11) NOT NULL DEFAULT 0,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `date_created` int(11) NOT NULL DEFAULT 0,
  `zero_type` varchar(150) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `nid` int(11) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT 0,
  `category` varchar(150) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `date_created` int(11) NOT NULL DEFAULT 0,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `link` text NOT NULL,
  `ref` varchar(70) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `rid` int(11) NOT NULL,
  `take_off` text DEFAULT NULL,
  `drop_off` text DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `max_capacity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`rid`, `take_off`, `drop_off`, `price`, `max_capacity`) VALUES
(1, 'Port Harcourt', 'Owerri', 5000, 14),
(2, 'Owerri', 'Port Harcourt', 5000, 14);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `item` varchar(250) NOT NULL DEFAULT '',
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`item`, `value`) VALUES
('site_address', '346 Ikwerre Road Ikwerre Road Port Harcourt Nigeria'),
('site_author', 'Genext Motors'),
('site_description', 'Unique, comfortable and safe transportation system.'),
('site_email', 'info@genextmotors.com'),
('site_facebook', 'https://web.facebook.com/profile.php?id=100064129596595'),
('site_favicon', 'site_files/25d9bdf60837436191b5b4dbfa9923c324dcc4f6genext.png'),
('site_instagram', '#'),
('site_keywords', 'Unique, comfortable and safe transportation system.'),
('site_currency', 'NGN'),
('site_youtube', '#'),
('site_logo', 'site_files/37d2e1f45a0ba65f6887946cbba47870b2dd126fgenext.png'),
('site_name', 'Genext Motors'),
('site_phone_number', '+234 803 708 7606'),
('site_screenshot', 'site_files/0424a42bcbcebc6a677ad5c987e866be951f41d7genext.png'),
('site_twitter', '#'),
('site_url', 'www.genextmotors.com'),
('site_whatsapp', '#'),
('admin_theme', 'default_admin'),
('site_linkedin', '#'),
('landing_theme', 'genext_landing'),
('promo_fee', '500');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `tid` int(11) NOT NULL,
  `route` int(11) NOT NULL DEFAULT 0,
  `trip_time` varchar(20) NOT NULL DEFAULT '',
  `trip_date` varchar(20) NOT NULL DEFAULT '',
  `booked` int(11) NOT NULL DEFAULT 0,
  `driver` int(11) NOT NULL DEFAULT 0,
  `vehicle` int(11) NOT NULL DEFAULT 0,
  `manager` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`tid`, `route`, `trip_time`, `trip_date`, `booked`, `driver`, `vehicle`, `manager`) VALUES
(1, 1, '8:00 AM', '2022-12-26', 0, 6, 1, 1),
(2, 1, '8:00 AM', '2022-12-25', 0, 6, 1, 1),
(3, 2, '9:00 AM', '2023-01-01', 0, 6, 1, 0),
(4, 2, '12:00 PM', '2023-01-01', 0, 7, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(70) NOT NULL DEFAULT '',
  `fullname` varchar(70) NOT NULL DEFAULT '',
  `email` varchar(70) NOT NULL DEFAULT '',
  `token` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(13) NOT NULL DEFAULT '',
  `type` int(1) NOT NULL DEFAULT 0,
  `reset_code` varchar(8) NOT NULL DEFAULT '',
  `date_created` int(25) NOT NULL DEFAULT 0,
  `is_suspended` int(1) NOT NULL DEFAULT 0,
  `check_in` int(25) NOT NULL DEFAULT 0,
  `account_type` varchar(70) NOT NULL DEFAULT 'member',
  `photo` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `banner` text DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `province` varchar(150) NOT NULL DEFAULT '',
  `bio` varchar(500) DEFAULT 'Hello there im using eauston solutions real estate portal',
  `dob` varchar(100) NOT NULL DEFAULT '',
  `marital_status` varchar(100) NOT NULL DEFAULT '',
  `occupation` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `fullname`, `email`, `token`, `password`, `phone`, `type`, `reset_code`, `date_created`, `is_suspended`, `check_in`, `account_type`, `photo`, `address`, `banner`, `is_verified`, `province`, `bio`, `dob`, `marital_status`, `occupation`) VALUES
(1, 'admin', 'admin', 'admin@boiler.com', '4eec04042f03f58261043e62dc6c134a9f9d2dbd', '55c3b5386c486feb662a0785f340938f518d547f', '', 9, '', 1635848056, 0, 1673097131, '', 'assets/uploads/c1be7cd6cc053ad5edbaa281caa4841af2ddc7b3.jpg', NULL, NULL, 1, '', ' Hello there im using eauston solutions real estate portal ', '', '', ''),
(5, 'babaaminu', 'baba', 'baba@gmail.com', 'ff7774f118ea6b4831afc166ca73de7eff1ea3f4', '55c3b5386c486feb662a0785f340938f518d547f', '08099999999', 5, '', 1664633605, 0, 1664635370, 'member', NULL, NULL, NULL, 0, '', 'Hello there im using eauston solutions real estate portal', '', '', ''),
(6, 'driverkpangolo', 'wanbolonbo kpangolo', 'golo@gmail.com', '6f6035c0429462b53099f7869d4e0f4d3fe472d5', '55c3b5386c486feb662a0785f340938f518d547f', '08077777711', 4, '', 1670607529, 0, 0, 'member', NULL, NULL, NULL, 0, '', 'Hello there im using eauston solutions real estate portal', '', '', ''),
(7, 'GodswillAkpabio', 'Godswill Akpabio', 'godswill@gmail.com', 'c2fe0114ca5d0ff31ecc7294d7fa662c2bbc304b', '55c3b5386c486feb662a0785f340938f518d547f', '08033333333', 4, '', 1672219024, 0, 0, 'member', NULL, NULL, NULL, 0, '', 'Hello there im using eauston solutions real estate portal', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vid` int(11) NOT NULL,
  `plate_no` text DEFAULT NULL,
  `model` text DEFAULT NULL,
  `capacity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vid`, `plate_no`, `model`, `capacity`) VALUES
(1, 'UE-345-IKY-Lagos', 'Toyota Sienna', 7),
(2, 'PT-234-IKY-Rivers', 'Toyota Sienna', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`item`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
