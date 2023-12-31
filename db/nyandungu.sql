-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2023 at 12:19 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nyandungu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(40) NOT NULL,
  `a_password` varchar(16) NOT NULL,
  `a_email` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_password`, `a_email`, `created_at`) VALUES
(1, 'admin', 'Admin@11', 'admin@gmail.com', '2023-11-24 11:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `a_id` int(11) NOT NULL,
  `a_username` varchar(30) NOT NULL,
  `a_password` varchar(20) NOT NULL,
  `a_status` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`a_id`, `a_username`, `a_password`, `a_status`, `created_at`) VALUES
(1, 'blackjay', 'ssws', 'approved', '2023-12-04 09:21:24'),
(2, 'blackjay', 'fwaeds', 'canceled', '2023-12-04 09:28:51'),
(3, 'blackjay', 'ewd scxzh.kbb', 'pending', '2023-12-04 08:08:42'),
(4, 'sagemargo11@gmail.com', 'mewdsh.czx', 'pending', '2023-12-04 08:13:38'),
(6, 'blackjay', 'erf cxkj.ja', 'pending', '2023-12-04 09:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `c_id` int(11) NOT NULL,
  `c_email` varchar(30) NOT NULL,
  `c_name` varchar(40) NOT NULL,
  `c_subject` varchar(50) NOT NULL,
  `c_message` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `c_email`, `c_name`, `c_subject`, `c_message`, `created_at`) VALUES
(1, 'ihazefarming@gmail.com', 'tugenderwanda', 'asa', 'saxz wsahzx', '2023-12-01 21:37:05'),
(2, 'ihazefarming@gmail.com', 'tugenderwanda', 'asa', 'saxz wsahzx', '2023-12-01 21:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `d_id` int(11) NOT NULL,
  `d_pic` varchar(200) NOT NULL,
  `d_title` varchar(40) NOT NULL,
  `d_desc` varchar(100) NOT NULL,
  `created_by` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`d_id`, `d_pic`, `d_title`, `d_desc`, `created_by`) VALUES
(6, '20565background2.jpg', 'artificial lake  ', 'serge lake  kawubure lAKE', '2023-12-27 17:51:19'),
(7, '57451mtn.png', '2wqewrgf', 'regfsc', '2023-12-31 10:40:01'),
(8, '83461download.jpg', 'wqas', 'adjzxbkj Far far away, behind the word mountains, far from the countries Vokalia..', '2023-12-31 10:40:22'),
(9, '86822bird.jpg', 'sssssssssssssss', 'Far far away, behind the word mountains, far from the countries Vokalia..Far far away, behind the wo', '2023-12-31 10:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `p_amount` int(11) NOT NULL,
  `t_number` varchar(20) DEFAULT NULL,
  `s_number` int(11) DEFAULT NULL,
  `p_method` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `p_amount`, `t_number`, `s_number`, `p_method`, `created_at`) VALUES
(1, 5000, '91833', 0, 'Mtn', '2023-12-01 15:24:46'),
(2, 5000, '91833', 0, 'Mtn', '2023-12-01 15:25:37'),
(3, 5000, '91833', 0, 'Mtn', '2023-12-01 15:25:52'),
(4, 5000, '91833', 0, 'Mtn', '2023-12-01 15:29:07'),
(5, 5000, '91833', 0, 'Mtn', '2023-12-01 15:32:27'),
(6, 5000, '52464', 0, 'Mtn', '2023-12-01 15:50:17'),
(7, 5000, '52464', 0, 'method', '2023-12-01 15:53:18'),
(8, 5000, '52464', 0, 'Mtn', '2023-12-01 15:57:13'),
(9, 5000, '52464', 0, 'Mtn', '2023-12-01 15:58:06'),
(10, 5000, '52464', 0, 'Mtn', '2023-12-01 15:59:06'),
(11, 5000, '52464', 0, 'Mtn', '2023-12-01 16:01:35'),
(12, 15000, NULL, 31359, 'Paypal', '2023-12-03 08:51:30'),
(13, 15000, NULL, 31359, 'Paypal', '2023-12-03 08:52:20'),
(14, 15000, NULL, 31359, 'Paypal', '2023-12-03 08:52:40'),
(15, 15000, NULL, 31359, 'Paypal', '2023-12-03 08:57:52'),
(16, 15000, NULL, 31359, 'Paypal', '2023-12-03 08:58:23'),
(73, 1500, '54490 ', NULL, 'Paypal', '2023-12-03 14:53:08'),
(74, 1500, '54490 ', NULL, 'Paypal', '2023-12-03 14:54:07'),
(75, 1500, '54191 ', NULL, 'Paypal', '2023-12-27 17:00:57'),
(76, 1500, '54191 ', NULL, 'Paypal', '2023-12-27 17:01:43'),
(77, 1500, '54191 ', NULL, 'Paypal', '2023-12-27 17:03:38'),
(78, 1500, '22422', NULL, 'Mtn', '2023-12-27 17:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `s_id` int(11) NOT NULL,
  `s_type` varchar(30) NOT NULL,
  `s_amount` int(11) NOT NULL,
  `s_name` varchar(40) NOT NULL,
  `s_email` varchar(30) NOT NULL,
  `s_phone` int(11) NOT NULL,
  `s_country` varchar(30) NOT NULL,
  `s_passport` varchar(40) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `s_status` int(11) NOT NULL COMMENT '1 for unpaid\r\n2 for paid\r\n3 for expired',
  `s_number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`s_id`, `s_type`, `s_amount`, `s_name`, `s_email`, `s_phone`, `s_country`, `s_passport`, `u_email`, `s_status`, `s_number`, `created_at`) VALUES
(1, 'Ganza', 30000, 'Abayo Margot Sincere', 'sagemargo11@gmail.com', 786729283, 'Rwanda', '65432', 'pitieee@gmail.com', 1, 38462, '2023-12-04 00:46:07'),
(2, 'Ganza', 30000, 'Abayo Margot Sincere', 'sagemargo11@gmail.com', 786729283, 'Rwanda', '65432', 'pitieee@gmail.com', 3, 88897, '2023-12-03 23:31:15'),
(3, 'PLUS', 42500, 'Abayo Margot Sincere', 'sagemargo11@gmail.com', 786729283, 'Rwanda', '65432', 'pitieee@gmail.com', 2, 31359, '2023-12-03 16:10:03'),
(6, 'Ganza', 15000, 'Abayo Margot Sincere', 'sagemargo11@gmail.com', 786729283, 'Rwanda', '6543267890', 'pitieee@gmail.com', 3, 15821, '2023-12-03 16:00:54'),
(7, 'Ganza', 15000, 'ndayishimiye partick', 'ndayishimiyepartick43@gmail.co', 781843563, 'Ireland', '9876543212345678', 'yaremyeserge@gmail.com', 1, 60100, '2023-12-27 17:22:43'),
(8, 'Cyizere', 30000, 'serge dukuziyaremye', 'yaremyeserge@gmail.com', 2147483647, 'Mauritania', '12000 800563476', 'yaremyeserge@gmail.com', 2, 50325, '2023-12-05 08:47:11');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_nationality` varchar(100) NOT NULL,
  `t_country` varchar(100) NOT NULL,
  `t_identity` varchar(100) NOT NULL,
  `t_phone` varchar(100) NOT NULL,
  `t_email` varchar(100) NOT NULL,
  `t_date` date NOT NULL,
  `t_time` time NOT NULL,
  `t_number` varchar(20) NOT NULL,
  `t_status` int(11) NOT NULL COMMENT ' 0-for booked,1-for pending , 2:canceled , 3-for paid, 4-for verified\r\n',
  `u_email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`t_id`, `t_name`, `t_nationality`, `t_country`, `t_identity`, `t_phone`, `t_email`, `t_date`, `t_time`, `t_number`, `t_status`, `u_email`, `created_at`) VALUES
(2, 'ww', 'eastAfrica', 'Burundi', '765432', '43322', 'pitie@gmail.com', '2023-12-28', '15:52:00', '84189', 3, 'pitie@gmail.com', '2023-12-01 14:10:57'),
(3, 'ewd', 'eastAfrica', 'Tanzania', '765432', '5432', 'pitieaime05@gmail.com', '2023-12-07', '16:14:00', '345', 3, 'pitie@gmail.com', '2023-12-01 14:15:17'),
(4, 'ww', 'eastAfrica', 'South Sudan', '654321', '65432', 'pitie@gmail.com', '2023-12-06', '16:21:00', '25368', 0, 'pitie@gmail.com', '2023-12-01 14:16:47'),
(5, 'ewd', 'other', 'Eritrea', '765432', '6543', 'pitieaime05@gmail.com', '2023-12-07', '16:00:00', '91833', 3, 'pitie@gmail.com', '2023-12-01 15:32:27'),
(6, 'ww', 'other', 'Slovakia', '765432', '76543', 'pitieaime05@gmail.com', '2023-12-06', '17:53:00', '52464', 3, 'pitiesaxxdee@gmail.com', '2023-12-01 16:01:35'),
(7, 'zain serge', 'eastAfrica', 'South Sudan', '12000800125106', '0788758655', 'zain@gmail.com', '2023-12-26', '14:46:00', '6939', 0, 'zain@gmail.com', '2023-12-01 20:47:35'),
(8, 'Abayo Margot Sincere', 'eastAfrica', 'Burundi', '1234567890876', '0786729283', 'sagemargo11@gmail.com', '2023-12-01', '16:55:00', '54490', 3, 'pitieee@gmail.com', '2023-12-03 14:54:07'),
(9, 'Abirebeye Abayo Sincere Aime Margot', 'eastAfrica', 'Rwanda', '1234567890876', '0786729283', 'sagemargo11@gmail.com', '2023-12-13', '22:17:00', '45664', 0, 'pitieee@gmail.com', '2023-12-04 20:13:12'),
(10, 'Abirebeye Abayo Sincere Aime Margot', 'eastAfrica', 'Burundi', '1234567890876', '0783876119', 'ndayishimiyepatric43@gmail.com', '2023-12-31', '18:03:00', '54191', 4, 'ndayishimiyepatrick43@gmail.com', '2023-12-31 11:18:12'),
(11, 'yh', 'eastAfrica', 'Burundi', '1234567890876', '0786729283', 'socialafonete@gmail.com', '2023-12-21', '19:33:00', '22422', 4, 'ndayishimiyepatrick43@gmail.com', '2023-12-31 10:47:12'),
(12, 'Abayo Margot Sincere', 'eastAfrica', 'Tanzania', '1234567890876', '0786729283', 'sagemargo11@gmail.com', '2023-12-06', '10:21:00', '85520', 0, 'yaremyeserge@gmail.com', '2023-12-31 08:22:04'),
(13, 'Abayo Margot Sincere', 'other', 'Christmas Island', '1234567890876', '0786729283', 'sagemargo11@gmail.com', '2024-01-06', '10:21:00', '81743', 0, 'yaremyeserge@gmail.com', '2023-12-31 08:24:34'),
(14, 'Abayo Margot Sincere', 'other', 'Denmark', '1234567890876', '0786729283', 'sagemargo11@gmail.com', '2023-10-12', '10:28:00', '12025', 0, 'yaremyeserge@gmail.com', '2023-12-31 08:26:22'),
(15, 'Ishimwe Jean Louis Segoe', 'other', 'American Samoa', '1234567890876', '0786729283', 'sagemargo11@gmail.com', '2023-12-27', '10:29:00', '83874', 0, 'yaremyeserge@gmail.com', '2023-12-31 08:27:16');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ticket_view`
-- (See below for the actual view)
--
CREATE TABLE `ticket_view` (
`t_id` int(11)
,`t_name` varchar(100)
,`t_nationality` varchar(100)
,`t_country` varchar(100)
,`t_identity` varchar(100)
,`t_phone` varchar(100)
,`t_email` varchar(100)
,`t_date` date
,`t_time` time
,`t_number` varchar(20)
,`t_status` int(11)
,`u_email` varchar(100)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_phone` int(200) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `u_password` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_phone`, `u_email`, `u_password`, `created_at`) VALUES
(5, 'ww', 321111, 'pitieee@gmail.com', 'Pitie@11', '2023-12-01 12:50:30'),
(8, '54321', 65432, 'pitie@gmail.com', 'Pitie@11', '2023-12-01 13:40:12'),
(9, 'ewd', 221, 'pitisse@gmail.com', 'Pitie@11', '2023-12-01 15:41:29'),
(10, 'ww', 321, 'pitiesaxxdee@gmail.com', 'Asdfgh11!', '2023-12-01 15:47:35'),
(11, 'serge ', 788758655, 'zain@gmail.com', 'Serge@123', '2023-12-01 20:46:01'),
(12, 'Ishimwe Jean Louis Segoe', 786729283, 'adminadmin@gmail.com', 'Adminadmin11@', '2023-12-27 16:05:14'),
(13, 'ndayishimeye patric', 783876119, 'ndayishimiyepatrick43@gmail.com', 'Patric43@', '2023-12-27 16:53:07'),
(14, 'sergezain', 781843563, 'yaremyeserge@gmail.com', 'Serge!@a123', '2023-12-31 08:29:28');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_view`
-- (See below for the actual view)
--
CREATE TABLE `user_view` (
`u_id` int(11)
,`u_name` varchar(50)
,`u_phone` int(200)
,`u_email` varchar(200)
,`u_password` varchar(20)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `ticket_view`
--
DROP TABLE IF EXISTS `ticket_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ticket_view`  AS SELECT `ticket`.`t_id` AS `t_id`, `ticket`.`t_name` AS `t_name`, `ticket`.`t_nationality` AS `t_nationality`, `ticket`.`t_country` AS `t_country`, `ticket`.`t_identity` AS `t_identity`, `ticket`.`t_phone` AS `t_phone`, `ticket`.`t_email` AS `t_email`, `ticket`.`t_date` AS `t_date`, `ticket`.`t_time` AS `t_time`, `ticket`.`t_number` AS `t_number`, `ticket`.`t_status` AS `t_status`, `ticket`.`u_email` AS `u_email`, `ticket`.`created_at` AS `created_at` FROM `ticket` ;

-- --------------------------------------------------------

--
-- Structure for view `user_view`
--
DROP TABLE IF EXISTS `user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_view`  AS SELECT `user`.`u_id` AS `u_id`, `user`.`u_name` AS `u_name`, `user`.`u_phone` AS `u_phone`, `user`.`u_email` AS `u_email`, `user`.`u_password` AS `u_password`, `user`.`created_at` AS `created_at` FROM `user` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `email` (`a_email`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `t_number` (`t_number`),
  ADD KEY `s_number` (`s_number`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `u_email` (`u_email`),
  ADD KEY `s_number` (`s_number`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `order` (`t_number`),
  ADD KEY `u_email` (`u_email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_email` (`u_email`),
  ADD UNIQUE KEY `u_phone` (`u_phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`t_number`) REFERENCES `ticket` (`t_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`s_number`) REFERENCES `subscription` (`s_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`u_email`) REFERENCES `user` (`u_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`u_email`) REFERENCES `user` (`u_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
