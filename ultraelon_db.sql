-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 05:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ultraelon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts_tb`
--

CREATE TABLE `contacts_tb` (
  `contact_id` int(11) NOT NULL,
  `contact_slug` varchar(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `investments_tb`
--

CREATE TABLE `investments_tb` (
  `invest_id` int(11) NOT NULL,
  `invest_slug` varchar(255) NOT NULL,
  `invest_user_id` int(11) NOT NULL,
  `invest_depositor_address` varchar(255) NOT NULL,
  `invest_amount` int(11) NOT NULL,
  `invest_plan` varchar(255) NOT NULL,
  `invest_status` tinyint(4) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `referrals_tb`
--

CREATE TABLE `referrals_tb` (
  `referral_id` int(11) NOT NULL,
  `referral_user_id` int(11) NOT NULL,
  `referral_referredby` int(11) NOT NULL,
  `referral_status` tinyint(4) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `referral_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `user_id` int(11) NOT NULL,
  `user_slug` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_bitcoin` varchar(255) DEFAULT NULL,
  `user_eth` varchar(255) DEFAULT NULL,
  `user_bnb` varchar(255) DEFAULT NULL,
  `user_usdt` varchar(255) DEFAULT NULL,
  `user_ultra` varchar(255) DEFAULT NULL,
  `user_password` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wallets_tb`
--

CREATE TABLE `wallets_tb` (
  `wallet_id` int(11) NOT NULL,
  `wallet_slug` varchar(255) NOT NULL,
  `wallet_user_id` int(11) NOT NULL,
  `wallet_invest` int(11) NOT NULL DEFAULT 0,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `wallet_ultra` int(11) NOT NULL DEFAULT 0,
  `wallet_referral` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws_tb`
--

CREATE TABLE `withdraws_tb` (
  `withdraw_id` int(11) NOT NULL,
  `withdraw_slug` varchar(255) NOT NULL,
  `withdraw_user_id` int(11) NOT NULL,
  `withdraw_amount` int(11) NOT NULL,
  `withdraw_address` text NOT NULL,
  `withdraw_account_type` varchar(255) NOT NULL,
  `withdraw_from` varchar(25) NOT NULL,
  `withdraw_status` tinyint(4) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts_tb`
--
ALTER TABLE `contacts_tb`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `investments_tb`
--
ALTER TABLE `investments_tb`
  ADD PRIMARY KEY (`invest_id`),
  ADD KEY `invest_user_id` (`invest_user_id`);

--
-- Indexes for table `referrals_tb`
--
ALTER TABLE `referrals_tb`
  ADD PRIMARY KEY (`referral_id`),
  ADD KEY `referrals_tb_ibfk_1` (`referral_user_id`),
  ADD KEY `referral_referredby` (`referral_referredby`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wallets_tb`
--
ALTER TABLE `wallets_tb`
  ADD PRIMARY KEY (`wallet_id`);

--
-- Indexes for table `withdraws_tb`
--
ALTER TABLE `withdraws_tb`
  ADD PRIMARY KEY (`withdraw_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts_tb`
--
ALTER TABLE `contacts_tb`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investments_tb`
--
ALTER TABLE `investments_tb`
  MODIFY `invest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referrals_tb`
--
ALTER TABLE `referrals_tb`
  MODIFY `referral_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallets_tb`
--
ALTER TABLE `wallets_tb`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraws_tb`
--
ALTER TABLE `withdraws_tb`
  MODIFY `withdraw_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `investments_tb`
--
ALTER TABLE `investments_tb`
  ADD CONSTRAINT `investments_tb_ibfk_1` FOREIGN KEY (`invest_user_id`) REFERENCES `users_tb` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `referrals_tb`
--
ALTER TABLE `referrals_tb`
  ADD CONSTRAINT `referrals_tb_ibfk_1` FOREIGN KEY (`referral_user_id`) REFERENCES `users_tb` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `referrals_tb_ibfk_2` FOREIGN KEY (`referral_referredby`) REFERENCES `users_tb` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
