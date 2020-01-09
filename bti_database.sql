-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2018 at 03:03 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mygoldcoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `pm_admin_tbl`
--

CREATE TABLE `pm_admin_tbl` (
  `pm_admin_id` int(11) NOT NULL,
  `pm_admin_username` varchar(20) NOT NULL,
  `pm_admin_password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm_admin_tbl`
--

INSERT INTO `pm_admin_tbl` (`pm_admin_id`, `pm_admin_username`, `pm_admin_password`) VALUES
(6, 'suraj', 'e807f1fcf82d132f9bb018ca6738a19f');

-- --------------------------------------------------------

--
-- Table structure for table `tp_credited`
--

CREATE TABLE `tp_credited` (
  `tp_credited_id` int(11) NOT NULL,
  `tp_user_unique_id` int(10) NOT NULL,
  `tp_username` varchar(100) NOT NULL,
  `tp_user_mobile_number` varchar(100) NOT NULL,
  `tp_mobile_money_name` varchar(100) NOT NULL,
  `tp_amount_cedis` int(10) NOT NULL,
  `tp_amount_coin` float NOT NULL,
  `tp_user_contact` varchar(100) NOT NULL,
  `tp_credited_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tp_paid` int(1) NOT NULL DEFAULT '0',
  `tp_payment_method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tp_debtors`
--

CREATE TABLE `tp_debtors` (
  `tp_deptors_id` int(11) NOT NULL,
  `tp_deptor_unique_id` int(100) NOT NULL,
  `tp_username` varchar(100) NOT NULL,
  `tp_amount` int(10) NOT NULL,
  `tp_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tp_mobile_money_name` varchar(100) NOT NULL,
  `tp_deptor_contact` varchar(100) NOT NULL,
  `tp_deptor_mobile_money_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tp_matured`
--

CREATE TABLE `tp_matured` (
  `tp_matured_id` int(11) NOT NULL,
  `tp_matured_user_unique_id` int(100) NOT NULL,
  `tp_matured_username` varchar(100) NOT NULL,
  `tp_matured_momo_number` varchar(100) NOT NULL,
  `tp_matured_momo_name` varchar(100) NOT NULL,
  `tp_matured_amount_cedis` int(11) NOT NULL,
  `tp_received_amount` int(11) NOT NULL,
  `tp_matured_amount_coin` float NOT NULL,
  `tp_matured_user_contact` varchar(100) NOT NULL,
  `tp_matured_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tp_ref_no` int(11) NOT NULL,
  `tp_matured_paid` int(1) NOT NULL DEFAULT '0',
  `tp_payment_method` varchar(100) NOT NULL,
  `tp_wallet_address` varchar(300) NOT NULL DEFAULT 'no wallet address'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tp_merchant`
--

CREATE TABLE `tp_merchant` (
  `tp_merchant_id` int(11) NOT NULL,
  `tp_merchant_name` varchar(100) NOT NULL,
  `tp_merchant_code` int(11) NOT NULL,
  `tp_activate` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tp_merchant`
--

INSERT INTO `tp_merchant` (`tp_merchant_id`, `tp_merchant_name`, `tp_merchant_code`, `tp_activate`) VALUES
(1, 'Monday', 9091, 0),
(2, 'Tuesday', 9092, 0),
(3, 'Wednesday', 9093, 0),
(4, 'Thursday', 9094, 0),
(5, 'Friday', 9095, 0),
(6, 'Saturday', 9096, 1),
(7, 'Sunday', 9097, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tp_paid_orders`
--

CREATE TABLE `tp_paid_orders` (
  `tp_paid_order_id` int(11) NOT NULL,
  `tp_paid_order_unique_id` int(100) NOT NULL,
  `tp_paid_order_username` varchar(100) NOT NULL,
  `tp_paid_order_momo_number` varchar(100) NOT NULL,
  `tp_paid_order_momo_name` varchar(100) NOT NULL,
  `tp_paid_order_amount_cedis` int(11) NOT NULL,
  `tp_amount_paid` int(11) NOT NULL,
  `tp_paid_order_amount_coin` float NOT NULL,
  `tp_paid_order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tp_paid_order_ref_no` int(11) NOT NULL,
  `tp_paid_order_contact` varchar(100) NOT NULL,
  `tp_payment_method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tp_pledges`
--

CREATE TABLE `tp_pledges` (
  `tp_pledge_id` int(11) NOT NULL,
  `tp_user_unique_id` int(100) NOT NULL,
  `tp_transaction_id` int(100) NOT NULL,
  `tp_amount_cedis` int(10) NOT NULL,
  `tp_amount_coin` float NOT NULL,
  `tp_order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tp_transaction_checked` int(1) NOT NULL DEFAULT '0',
  `tp_matched` int(1) NOT NULL DEFAULT '0',
  `tp_username` varchar(100) NOT NULL,
  `tp_mobile_money_name` varchar(100) NOT NULL,
  `tp_user_mobile_number` varchar(100) NOT NULL,
  `tp_user_contact` varchar(100) NOT NULL,
  `tp_paid` int(1) NOT NULL DEFAULT '0',
  `payment_code` int(11) NOT NULL DEFAULT '0',
  `tp_package` varchar(100) NOT NULL,
  `tp_payment_method` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tp_referrer`
--

CREATE TABLE `tp_referrer` (
  `tp_referrer_id` int(11) NOT NULL,
  `tp_username` varchar(100) NOT NULL,
  `tp_number_of_referrers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tp_second_credited`
--

CREATE TABLE `tp_second_credited` (
  `tp_credited_id` int(11) NOT NULL,
  `tp_user_unique_id` int(11) NOT NULL,
  `tp_username` varchar(30) NOT NULL,
  `tp_user_mobile_number` varchar(100) NOT NULL,
  `tp_mobile_money_name` varchar(100) NOT NULL,
  `tp_amount_cedis` int(11) NOT NULL,
  `tp_user_contact` varchar(100) NOT NULL,
  `tp_credited_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tp_paid` int(1) NOT NULL DEFAULT '1',
  `tp_order_ref_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tp_second_credited`
--

INSERT INTO `tp_second_credited` (`tp_credited_id`, `tp_user_unique_id`, `tp_username`, `tp_user_mobile_number`, `tp_mobile_money_name`, `tp_amount_cedis`, `tp_user_contact`, `tp_credited_time`, `tp_paid`, `tp_order_ref_no`) VALUES
(19, 296285, ' testone ', '  0544646116  ', '   Test One', 120, ' 0544646116 ', '2018-08-04 02:43:18', 1, 26),
(20, 296285, ' testone ', '  0544646116  ', '   Test One', 300, ' 0544646116 ', '2018-08-04 02:43:26', 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tp_second_matured`
--

CREATE TABLE `tp_second_matured` (
  `tp_s_matured_id` int(11) NOT NULL,
  `tp_s_matured_user_unique_id` int(11) NOT NULL,
  `tp_s_matured_username` varchar(100) NOT NULL,
  `tp_s_matured_momo_number` varchar(100) NOT NULL,
  `tp_s_matured_momo_name` varchar(100) NOT NULL,
  `tp_s_matured_amount_cedis` int(11) NOT NULL,
  `tp_s_received_amount` int(11) NOT NULL,
  `tp_s_matured_user_contact` varchar(100) NOT NULL,
  `tp_s_matured_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tp_ref_no` int(11) NOT NULL,
  `tp_s_matured_paid` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tp_second_paid_orders`
--

CREATE TABLE `tp_second_paid_orders` (
  `tp_s_paid_order_id` int(11) NOT NULL,
  `tp_s_paid_order_unique_id` int(11) NOT NULL,
  `tp_s_paid_order_username` varchar(100) NOT NULL,
  `tp_s_paid_order_momo_number` varchar(100) NOT NULL,
  `tp_s_paid_order_momo_name` varchar(100) NOT NULL,
  `tp_s_paid_order_amount_cedis` int(11) NOT NULL,
  `tp_s_amount_paid` int(11) NOT NULL,
  `tp_s_paid_order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tp_s_paid_order_ref_no` int(11) NOT NULL,
  `tp_s_paid_order_contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tp_third_credited`
--

CREATE TABLE `tp_third_credited` (
  `tp_th_credited_id` int(11) NOT NULL,
  `tp_th_user_unique_id` int(11) NOT NULL,
  `tp_th_username` varchar(100) NOT NULL,
  `tp_th_user_mobile_number` varchar(100) NOT NULL,
  `tp_th_mobile_money_name` varchar(100) NOT NULL,
  `tp_th_amount_cedis` int(11) NOT NULL,
  `tp_th_user_contact` varchar(100) NOT NULL,
  `tp_th_credited_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tp_th_paid` int(1) NOT NULL DEFAULT '1',
  `tp_th_order_ref_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tp_third_matured`
--

CREATE TABLE `tp_third_matured` (
  `tp_th_matured_id` int(11) NOT NULL,
  `tp_th_matured_user_unique_id` int(11) NOT NULL,
  `tp_th_matured_username` varchar(100) NOT NULL,
  `tp_th_matured_momo_number` varchar(100) NOT NULL,
  `tp_th_matured_momo_name` varchar(100) NOT NULL,
  `tp_th_matured_amount_cedis` int(11) NOT NULL,
  `tp_th_received_amount` int(11) NOT NULL,
  `tp_th_matured_user_contact` varchar(100) NOT NULL,
  `tp_th_matured_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tp_th_ref_no` int(11) NOT NULL DEFAULT '0',
  `tp_th_matured_paid` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tp_third_paid_orders`
--

CREATE TABLE `tp_third_paid_orders` (
  `tp_th_paid_order_id` int(11) NOT NULL,
  `tp_th_paid_order_unique_id` int(11) NOT NULL,
  `tp_th_paid_order_username` varchar(100) NOT NULL,
  `tp_th_paid_order_momo_number` varchar(100) NOT NULL,
  `tp_th_paid_order_momo_name` varchar(100) NOT NULL,
  `tp_th_paid_order_amount_cedis` int(11) NOT NULL,
  `tp_th_amount_paid` int(11) NOT NULL,
  `tp_th_paid_order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tp_th_paid_order_ref_no` int(11) NOT NULL,
  `tp_th_paid_order_contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tp_users`
--

CREATE TABLE `tp_users` (
  `tp_user_id` int(11) NOT NULL,
  `tp_user_unique_id` varchar(100) NOT NULL,
  `tp_username` varchar(100) NOT NULL,
  `tp_user_email` varchar(100) NOT NULL,
  `tp_user_password` varchar(150) NOT NULL,
  `tp_user_momo_name` varchar(100) NOT NULL,
  `tp_user_momo_number` varchar(10) NOT NULL,
  `tp_user_contact_number` varchar(10) NOT NULL,
  `tp_date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tp_activated` int(1) NOT NULL DEFAULT '0',
  `tp_secret_word` varchar(30) NOT NULL,
  `tp_payment_method` int(10) NOT NULL DEFAULT '1',
  `tp_referral_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pm_admin_tbl`
--
ALTER TABLE `pm_admin_tbl`
  ADD PRIMARY KEY (`pm_admin_id`);

--
-- Indexes for table `tp_credited`
--
ALTER TABLE `tp_credited`
  ADD PRIMARY KEY (`tp_credited_id`);

--
-- Indexes for table `tp_debtors`
--
ALTER TABLE `tp_debtors`
  ADD PRIMARY KEY (`tp_deptors_id`);

--
-- Indexes for table `tp_matured`
--
ALTER TABLE `tp_matured`
  ADD PRIMARY KEY (`tp_matured_id`);

--
-- Indexes for table `tp_merchant`
--
ALTER TABLE `tp_merchant`
  ADD PRIMARY KEY (`tp_merchant_id`);

--
-- Indexes for table `tp_paid_orders`
--
ALTER TABLE `tp_paid_orders`
  ADD PRIMARY KEY (`tp_paid_order_id`);

--
-- Indexes for table `tp_pledges`
--
ALTER TABLE `tp_pledges`
  ADD PRIMARY KEY (`tp_pledge_id`);

--
-- Indexes for table `tp_referrer`
--
ALTER TABLE `tp_referrer`
  ADD PRIMARY KEY (`tp_referrer_id`);

--
-- Indexes for table `tp_second_credited`
--
ALTER TABLE `tp_second_credited`
  ADD PRIMARY KEY (`tp_credited_id`);

--
-- Indexes for table `tp_second_matured`
--
ALTER TABLE `tp_second_matured`
  ADD PRIMARY KEY (`tp_s_matured_id`);

--
-- Indexes for table `tp_second_paid_orders`
--
ALTER TABLE `tp_second_paid_orders`
  ADD PRIMARY KEY (`tp_s_paid_order_id`);

--
-- Indexes for table `tp_third_credited`
--
ALTER TABLE `tp_third_credited`
  ADD PRIMARY KEY (`tp_th_credited_id`);

--
-- Indexes for table `tp_third_matured`
--
ALTER TABLE `tp_third_matured`
  ADD PRIMARY KEY (`tp_th_matured_id`);

--
-- Indexes for table `tp_third_paid_orders`
--
ALTER TABLE `tp_third_paid_orders`
  ADD PRIMARY KEY (`tp_th_paid_order_id`);

--
-- Indexes for table `tp_users`
--
ALTER TABLE `tp_users`
  ADD PRIMARY KEY (`tp_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pm_admin_tbl`
--
ALTER TABLE `pm_admin_tbl`
  MODIFY `pm_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tp_credited`
--
ALTER TABLE `tp_credited`
  MODIFY `tp_credited_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tp_debtors`
--
ALTER TABLE `tp_debtors`
  MODIFY `tp_deptors_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tp_matured`
--
ALTER TABLE `tp_matured`
  MODIFY `tp_matured_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tp_merchant`
--
ALTER TABLE `tp_merchant`
  MODIFY `tp_merchant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tp_paid_orders`
--
ALTER TABLE `tp_paid_orders`
  MODIFY `tp_paid_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tp_pledges`
--
ALTER TABLE `tp_pledges`
  MODIFY `tp_pledge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tp_referrer`
--
ALTER TABLE `tp_referrer`
  MODIFY `tp_referrer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tp_second_credited`
--
ALTER TABLE `tp_second_credited`
  MODIFY `tp_credited_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tp_second_matured`
--
ALTER TABLE `tp_second_matured`
  MODIFY `tp_s_matured_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tp_second_paid_orders`
--
ALTER TABLE `tp_second_paid_orders`
  MODIFY `tp_s_paid_order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tp_third_credited`
--
ALTER TABLE `tp_third_credited`
  MODIFY `tp_th_credited_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tp_third_matured`
--
ALTER TABLE `tp_third_matured`
  MODIFY `tp_th_matured_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tp_third_paid_orders`
--
ALTER TABLE `tp_third_paid_orders`
  MODIFY `tp_th_paid_order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tp_users`
--
ALTER TABLE `tp_users`
  MODIFY `tp_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
