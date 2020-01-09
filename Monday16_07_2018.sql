-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 16, 2018 at 10:34 PM
-- Server version: 10.1.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiseixep_zxcvbnm`
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
(6, 'suraj', 'd6980e34ec151796a0749f1b37aa542a'),
(8, 'nelsonbrown', 'a4a9fdf51daeb0e25f30e0e94a251d08');

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
  `tp_paid` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tp_credited`
--

INSERT INTO `tp_credited` (`tp_credited_id`, `tp_user_unique_id`, `tp_username`, `tp_user_mobile_number`, `tp_mobile_money_name`, `tp_amount_cedis`, `tp_amount_coin`, `tp_user_contact`, `tp_credited_time`, `tp_paid`) VALUES
(46, 53895, ' Nuta', ' 0545078251 ', '  Nutakor Nelson', 200, 0, '0545078251 ', '2018-07-16 09:06:37', 0),
(47, 181225, ' Brownie', ' 0551041917 ', '  Kofi Afaritwiako', 1720, 0, '0265140756 ', '2018-07-16 09:12:33', 0),
(48, 119305, ' Sammyone', ' 0549788255 ', '  Martha Bio', 100, 0, '0549788255 ', '2018-07-16 09:21:39', 0),
(49, 122805, ' Achiaa', ' 0546260411 ', '  Juliet Yeboah Antwi', 100, 0, '0546260411 ', '2018-07-16 09:22:59', 0),
(50, 148605, ' suraj', ' 0544646116 ', '  Abdul Suraj', 400, 0, '0544646116 ', '2018-07-16 09:26:08', 0),
(51, 181225, ' Brownie', ' 0551041917 ', '  Kofi Afaritwiako', 100, 0, '0265140756 ', '2018-07-16 09:58:21', 0),
(52, 186805, ' Boatemaah', ' 0549527559 ', '  CHAMAX VENTURES', 100, 0, '0551101485 ', '2018-07-16 10:00:02', 0),
(53, 173675, ' Agede', ' 0240103300 ', '  Agede Peter Kofi', 200, 0, '0240103300 ', '2018-07-16 10:10:41', 0),
(54, 280085, ' Obaapa', ' 0544228774 ', '  Mercy Akwele Odamtten', 500, 0, '0544228774 ', '2018-07-16 10:37:42', 0),
(55, 68155, ' Donpers', ' 0242350190 ', '  Dombul Prosper Yelewawono', 300, 0, '0242350190 ', '2018-07-16 13:01:46', 0),
(56, 199715, ' AADDO', ' 0246947588 ', '  Augustine Addo', 200, 0, '0246947588 ', '2018-07-16 13:04:02', 0),
(57, 92645, ' ransomens', ' 0244879797 ', '  Ransolina Letitia Mensah', 500, 0, '0244879797 ', '2018-07-16 13:42:35', 0),
(58, 42485, ' awewopa', ' 0245802799 ', '  Ayerewora Patrick', 1500, 0, '0245802799 ', '2018-07-16 14:05:24', 0);

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
  `tp_matured_paid` int(1) NOT NULL DEFAULT '0'
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
(6, 'Saturday', 9096, 0),
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
  `tp_paid_order_contact` varchar(100) NOT NULL
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
  `tp_package` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tp_pledges`
--

INSERT INTO `tp_pledges` (`tp_pledge_id`, `tp_user_unique_id`, `tp_transaction_id`, `tp_amount_cedis`, `tp_amount_coin`, `tp_order_time`, `tp_transaction_checked`, `tp_matched`, `tp_username`, `tp_mobile_money_name`, `tp_user_mobile_number`, `tp_user_contact`, `tp_paid`, `payment_code`, `tp_package`) VALUES
(108, 53895, 0, 200, 0, '2018-07-16 08:56:59', 1, 1, 'Nuta', 'Nutakor Nelson', '0545078251', '0545078251', 1, 4515, 'startup'),
(109, 181225, 0, 1720, 0, '2018-07-16 09:04:36', 1, 1, 'Brownie', 'Kofi Afaritwiako', '0551041917', '0265140756', 1, 4735, 'client'),
(110, 119305, 0, 100, 0, '2018-07-16 09:12:57', 1, 1, 'Sammyone', 'Martha Bio', '0549788255', '0549788255', 1, 6085, 'startup'),
(111, 122805, 0, 100, 0, '2018-07-16 09:18:06', 1, 1, 'Achiaa', 'Juliet Yeboah Antwi', '0546260411', '0546260411', 1, 5715, 'startup'),
(112, 148605, 0, 400, 0, '2018-07-16 09:18:39', 1, 1, 'suraj', 'Abdul Suraj', '0544646116', '0544646116', 1, 2675, 'startup'),
(114, 186805, 0, 100, 0, '2018-07-16 09:42:42', 1, 1, 'Boatemaah', 'CHAMAX VENTURES', '0549527559', '0551101485', 1, 5365, 'startup'),
(115, 181225, 0, 100, 0, '2018-07-16 09:49:43', 1, 1, 'Brownie', 'Kofi Afaritwiako', '0551041917', '0265140756', 1, 4735, 'startup'),
(116, 173675, 0, 200, 0, '2018-07-16 09:59:39', 1, 1, 'Agede', 'Agede Peter Kofi', '0240103300', '0240103300', 1, 6425, 'startup'),
(117, 280085, 0, 500, 0, '2018-07-16 10:34:15', 1, 1, 'Obaapa', 'Mercy Akwele Odamtten', '0544228774', '0544228774', 1, 1325, 'premium'),
(121, 68155, 0, 300, 0, '2018-07-16 12:40:43', 1, 1, 'Donpers', 'Dombul Prosper Yelewawono', '0242350190', '0242350190', 1, 1435, 'startup'),
(122, 199715, 0, 200, 0, '2018-07-16 12:58:36', 1, 1, 'AADDO', 'Augustine Addo', '0246947588', '0246947588', 1, 7025, 'startup'),
(124, 92645, 0, 500, 0, '2018-07-16 13:36:30', 1, 1, 'ransomens', 'Ransolina Letitia Mensah', '0244879797', '0244879797', 1, 7635, 'premium'),
(125, 42485, 0, 1500, 0, '2018-07-16 13:58:22', 1, 1, 'awewopa', 'Ayerewora Patrick', '0245802799', '0245802799', 1, 7165, 'premium');

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
-- Dumping data for table `tp_users`
--

INSERT INTO `tp_users` (`tp_user_id`, `tp_user_unique_id`, `tp_username`, `tp_user_email`, `tp_user_password`, `tp_user_momo_name`, `tp_user_momo_number`, `tp_user_contact_number`, `tp_date_joined`, `tp_activated`, `tp_secret_word`, `tp_payment_method`, `tp_referral_id`) VALUES
(23, '148605', 'suraj', 'mendyak99@gmail.com', 'd6980e34ec151796a0749f1b37aa542a', 'Abdul Suraj', '0544646116', '0544646116', '2018-07-14 09:51:22', 0, 'hawa', 1, 'wci14015'),
(29, '53895', 'Nuta', 'nelsonbrownnutakor@gmail.com', '9d21288be87d38cf7d76dd346e676bcf', 'Nutakor Nelson', '0545078251', '0545078251', '2018-07-15 21:32:21', 0, 'Nuta', 1, 'wci13205'),
(30, '181225', 'Brownie', 'cliffordasimeng@gmail.com', '35bb96db9a12ea7362ed02ba680bc1f9', 'Kofi Afaritwiako', '0551041917', '0265140756', '2018-07-15 21:37:16', 0, 'Leticia', 1, 'wci18765'),
(31, '190335', 'osagyefodosu', 'osagyefodosu@gmail.com', '8ea78d501574a7a2be79e73387f08ffb', 'Solomon Dosu', '0546149053', '0262839508', '2018-07-15 21:42:53', 0, 'B$$', 1, 'wci26375'),
(32, '280085', 'Obaapa', 'mercy.odamtten@yahoo.com', '4175d2d6a6a356222bb1ce7fb7eea20d', 'Mercy Akwele Odamtten', '0544228774', '0544228774', '2018-07-15 22:51:47', 0, 'Brother', 1, 'wci18885'),
(33, '112075', 'Nkrumzy', 'yuonayelgodfred94@gmail.com', '7109892b9c825ba9657d345efa5f65c1', 'Yuonayel Godfred', '0553191212', '0553191212', '2018-07-16 08:39:07', 0, 'Nkrumzy', 1, 'wci22635'),
(34, '77175', 'FiawooEdem', 'edemisic@gmail.com', '5e0e84bf005836d8721d68503553afe9', 'Fiawoo Edem Kodzo', '0557071053', '0557071053', '2018-07-16 08:45:25', 0, 'Money', 1, 'wci25825'),
(35, '92645', 'ransomens', 'ransoline@yahoo.com', '803923668bf2a539f73eb8d40666fe20', 'Ransolina Letitia Mensah', '0244879797', '0244879797', '2018-07-16 08:49:12', 0, 'Ranso', 1, 'wci23755'),
(36, '122805', 'Achiaa', 'Akyaaantwi@gmail.com', '36b1d331d156b11dbdc8113c36046b92', 'Juliet Yeboah Antwi', '0546260411', '0546260411', '2018-07-16 08:59:02', 0, '0262573758', 1, 'wci16665'),
(37, '199715', 'AADDO', 'austincuclox@gmail.com', '494d0ddf48918fe99138861d6ddaa024', 'Augustine Addo', '0246947588', '0246947588', '2018-07-16 09:04:02', 0, 'Ivan', 1, 'wci25125'),
(38, '119305', 'Sammyone', 'Sammytwo2222@gmail.com', 'f162ac5ae8ed46494c8102405f3dc315', 'Martha Bio', '0549788255', '0549788255', '2018-07-16 09:05:36', 0, 'Adu', 1, 'wci20735'),
(39, '239545', 'Joelin1', 'Mensahfrank75@gmail.com', 'a0b7d1db143b6e844d8d8307297cd385', 'Frank Mensah', '0241926467', '0241926467', '2018-07-16 09:08:07', 0, 'Joe', 1, 'wci23505'),
(40, '186805', 'Boatemaah', 'abenaboatemaah1485@gmail.com', '88804445bb8a32ea200303e3859226dc', 'CHAMAX VENTURES', '0549527559', '0551101485', '2018-07-16 09:09:14', 0, 'Boatemaah', 1, 'wci27685'),
(41, '275445', 'Juliet', 'Julietdellebille@gmail.com', 'f6b5f8c32c65fee991049a55dc97d1ce', 'Juliet Delle', '0542239902', '0542239902', '2018-07-16 09:16:53', 0, 'Godwin', 1, 'wci29905'),
(42, '173675', 'Agede', 'desizes0000@gmail.com', '3000311ca56a1cb93397bc676c0b7fff', 'Agede Peter Kofi', '0240103300', '0240103300', '2018-07-16 09:54:22', 0, 'Richca', 1, 'wci10755'),
(43, '127305', 'Felimens', 'feliciamensah7576@gmail.com', 'da8c56b091f44a0e36cd67b94e127162', 'Felicia Mensah', '0249757638', '0249757638', '2018-07-16 10:00:03', 0, 'Festus', 1, 'wci27405'),
(44, '68155', 'Donpers', 'donbulprosper@gmail.com', 'dd7b696b96434d2bf07b34f9c125d51d', 'Dombul Prosper Yelewawono', '0242350190', '0242350190', '2018-07-16 10:41:06', 0, 'Table', 1, 'wci27215'),
(45, '132355', 'Pdanikuu', 'Pdanikuu@gmail.com', '63264dc4c2885e48b8f7d6ef7a0c0386', 'Danikuu patience', '0540264400', '0540264400', '2018-07-16 11:01:44', 0, 'Patd', 1, 'wci16195'),
(46, '175135', 'SAVZIPAPA', 'savzi2010@yahoo.com', '9df028c292f380db44f02566ca8d14dd', 'SAVIOUR KUDJOE ZILEVU', '0242561057', '0242561057', '2018-07-16 11:08:47', 0, 'Mabel', 1, 'wci25115'),
(47, '269745', 'enochopoku', 'opokuenoch11@gmail.com', 'e60ba0e48810f50b0583d3cc0b1a69ea', 'Enoch Opoku', '0247717457', '0247717457', '2018-07-16 11:11:18', 0, '1234', 1, 'wci26075'),
(48, '42485', 'awewopa', 'awewopa1992@gmail.com', '59a3adea76fadcb6dd9e54c96fc155d1', 'Ayerewora Patrick', '0245802799', '0245802799', '2018-07-16 11:44:08', 0, 'God', 1, 'wci15595'),
(49, '241825', 'Edmond zong', 'edmondzong@gmail.com', '3cfc547d48c170ee2785b4ecae1fa461', 'zong banegime edmond', '0245835308', '0245835308', '2018-07-16 12:59:19', 0, 'vision55', 1, 'wci25115'),
(50, '249865', 'Popper', 'fofoney83@gmail.com', '893835bcf3c4f5e2dba14b854e73fdad', 'Kudolo Emmanuel', '0540715785', '0540715785', '2018-07-16 15:18:15', 0, 'Fofoney', 1, 'wci24095'),
(51, '260605', 'diana.akos', 'diana.akos@yahoo.com', '0123d11995f4c8d8cc48b8d5c46cc263', 'Diana Sarpong', '0246623852', '0246623852', '2018-07-16 17:43:22', 0, 'what\'s  my name', 1, 'wci29595');

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
  MODIFY `pm_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tp_credited`
--
ALTER TABLE `tp_credited`
  MODIFY `tp_credited_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tp_debtors`
--
ALTER TABLE `tp_debtors`
  MODIFY `tp_deptors_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tp_matured`
--
ALTER TABLE `tp_matured`
  MODIFY `tp_matured_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tp_merchant`
--
ALTER TABLE `tp_merchant`
  MODIFY `tp_merchant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tp_paid_orders`
--
ALTER TABLE `tp_paid_orders`
  MODIFY `tp_paid_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tp_pledges`
--
ALTER TABLE `tp_pledges`
  MODIFY `tp_pledge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `tp_referrer`
--
ALTER TABLE `tp_referrer`
  MODIFY `tp_referrer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tp_second_credited`
--
ALTER TABLE `tp_second_credited`
  MODIFY `tp_credited_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tp_second_matured`
--
ALTER TABLE `tp_second_matured`
  MODIFY `tp_s_matured_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tp_second_paid_orders`
--
ALTER TABLE `tp_second_paid_orders`
  MODIFY `tp_s_paid_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tp_third_credited`
--
ALTER TABLE `tp_third_credited`
  MODIFY `tp_th_credited_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tp_third_matured`
--
ALTER TABLE `tp_third_matured`
  MODIFY `tp_th_matured_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tp_third_paid_orders`
--
ALTER TABLE `tp_third_paid_orders`
  MODIFY `tp_th_paid_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tp_users`
--
ALTER TABLE `tp_users`
  MODIFY `tp_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
