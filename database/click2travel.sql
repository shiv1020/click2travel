-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2026 at 12:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `click2travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `guests` int(11) DEFAULT 1,
  `arrival_date` date DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `total_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `package_id`, `guests`, `arrival_date`, `status`, `total_amount`, `created_at`) VALUES
(1, 1, 3, 2, '2026-02-24', 'confirmed', 39998.00, '2026-02-22 08:04:52'),
(2, 1, 2, 2, '2026-02-24', 'pending', 11998.00, '2026-02-22 08:16:36'),
(3, 1, 3, 2, '2026-02-24', 'confirmed', 39998.00, '2026-02-22 08:20:48'),
(4, 1, 1, 2, '2026-02-24', 'confirmed', 19998.00, '2026-02-22 09:06:48'),
(5, 1, 1, 2, '2026-02-24', 'confirmed', 19998.00, '2026-02-22 10:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 'Shivprasad', 'Gupta', 'user@gmail.com', '08850217911', 'abcdefg', '2026-02-22 04:08:46'),
(2, 'Shivprasad', 'Gupta', 'shivprasadgt102@gmail.com', '08850217911', 'sdasdasdasdasdasd', '2026-02-22 04:09:12'),
(3, 'hello', 'h', 'user@gmail.com', '09029921174', 'sdadasdsdasdasdasdsddadasdasdasdasdasdsadsddasdasdasdasdasdasdddasdfbhrtyrytytghghhdzddfgfthdfghjty', '2026-02-22 04:12:20'),
(4, 'Shivprasad', 'Gupta', 'shivprasadgt102@gmail.com', '08850217911', 'sscfsf', '2026-02-22 04:15:03'),
(5, 'Shivprasad', 'Gupta', 'shivprasadgt102@gmail.com', '08850217911', 'sscfsf', '2026-02-22 04:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `package_type` varchar(100) DEFAULT NULL,
  `travel_mode` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `price`, `duration`, `image`, `package_type`, `travel_mode`, `created_at`) VALUES
(1, 'Beauty of Bali', 'Enjoy beautiful beaches', 9999.00, '5 Days / 4 Nights', 'bali.jpg', 'foreign', 'Flight', '2026-02-21 10:37:01'),
(2, 'Hills of Himalaya', 'Adventure trekking tour', 5999.00, '7 Days / 6 Nights', 'himalaya.jpg', 'adventurous', 'Bus', '2026-02-21 10:37:01'),
(3, 'Dubai Explorer', 'Luxury desert experience', 19999.00, '6 Days / 5 Nights', 'dubai.jpg', 'foreign', 'Flight', '2026-02-21 10:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `receipt_no` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_status` enum('requested','paid','failed') DEFAULT 'requested',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `receipt_no`, `amount`, `payment_status`, `created_at`) VALUES
(1, 1, 'RCPT1771747508', 39998.00, 'paid', '2026-02-22 08:05:08'),
(2, 1, 'RCPT1771747648', 39998.00, 'paid', '2026-02-22 08:07:28'),
(3, 1, 'RCPT1771747670', 39998.00, 'paid', '2026-02-22 08:07:50'),
(4, 3, 'RCPT1771748932', 39998.00, 'paid', '2026-02-22 08:28:52'),
(5, 3, 'RCPT1771748941', 39998.00, 'paid', '2026-02-22 08:29:01'),
(6, 3, 'RCPT1771749111', 39998.00, 'paid', '2026-02-22 08:31:51'),
(7, 4, 'RCPT1771751214', 19998.00, 'paid', '2026-02-22 09:06:54'),
(8, 5, 'RCPT1771757354', 19998.00, 'paid', '2026-02-22 10:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `saved_payments`
--

CREATE TABLE `saved_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `card_holder` varchar(100) DEFAULT NULL,
  `last_four` varchar(4) DEFAULT NULL,
  `card_type` varchar(50) DEFAULT NULL,
  `expiry_month` varchar(2) DEFAULT NULL,
  `expiry_year` varchar(4) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved_payments`
--

INSERT INTO `saved_payments` (`id`, `user_id`, `card_holder`, `last_four`, `card_type`, `expiry_month`, `expiry_year`, `created_at`) VALUES
(1, 1, 'shivprasad gupta', '1801', 'Visa', '5', '2027', '2026-02-22 13:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `created_at`) VALUES
(1, 'Shivprasad Gupta', 'shivprasadgt102@gmail.com', '$2y$10$DLh2ww2bd2DK00HadK945OZM/OdEtIB7tJkC81UgTTqJ3s3dRsjki', NULL, 'user', '2026-02-21 10:35:20'),
(2, 'shiv', 'krishnagta01@gmail.com', '$2y$10$kaHxv0NziOJTEbr5E9sE9OMNEgL8onDCjAyuMRNmxy/ZpJCgDczcq', NULL, 'user', '2026-02-21 10:50:40'),
(3, 'admin', 'admin@example.com', '$2y$10$z2SsWW39s601F89uJJUi1ewbGm9VWh4i2UmtIt44hIzFVKQmmUhqe', NULL, 'admin', '2026-02-21 10:57:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `receipt_no` (`receipt_no`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `saved_payments`
--
ALTER TABLE `saved_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `saved_payments`
--
ALTER TABLE `saved_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
