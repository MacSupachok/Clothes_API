-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 04:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flutter_clothes_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `amdin_id` int(11) NOT NULL,
  `admin_code` varchar(20) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`amdin_id`, `admin_code`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, '0506202301', 'admin_mac', 'admin@gmail.com', '7b902e6ff1db9f560443f2048974fd7d386975b0');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tb`
--

CREATE TABLE `cart_tb` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart_tb`
--

INSERT INTO `cart_tb` (`cart_id`, `user_id`, `item_id`, `quantity`, `color`, `size`) VALUES
(5, 2, 6, 2, '[White]', 'XXL]'),
(6, 2, 5, 1, '[Gray]', 'L'),
(20, 1, 2, 5, '[Blue]', 'XL]'),
(21, 1, 7, 1, '[Black', '[S');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cart_user_view`
-- (See below for the actual view)
--
CREATE TABLE `cart_user_view` (
`user_id` int(11)
,`cart_id` int(11)
,`item_id` int(11)
,`quantity` int(11)
,`color` varchar(100)
,`size` varchar(100)
,`item_name` varchar(100)
,`item_rating` double
,`item_tags` varchar(255)
,`item_price` double
,`item_size` varchar(100)
,`item_color` varchar(100)
,`item_desc` text
,`item_image` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `favorite_tb`
--

CREATE TABLE `favorite_tb` (
  `favorite_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `favorite_tb`
--

INSERT INTO `favorite_tb` (`favorite_id`, `user_id`, `item_id`) VALUES
(5, 1, 6),
(6, 1, 7),
(8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_tb`
--

CREATE TABLE `items_tb` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_rating` double NOT NULL,
  `item_tags` varchar(255) NOT NULL,
  `item_price` double NOT NULL,
  `item_size` varchar(100) NOT NULL,
  `item_color` varchar(100) NOT NULL,
  `item_desc` text NOT NULL,
  `item_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `items_tb`
--

INSERT INTO `items_tb` (`item_id`, `item_name`, `item_rating`, `item_tags`, `item_price`, `item_size`, `item_color`, `item_desc`, `item_image`) VALUES
(1, 'Chanel short shirt', 4.8, '[chanel, girl, white shirt, office shirt]', 36900, '[S, M, L]', '[White]', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus exercitationem error non fugiat. Officia culpa eaque dignissimos ducimus perferendis deserunt.', 'https://i.imgur.com/HsQZ3c8.jpg'),
(2, 'Blue jean shirt', 4.3, '[men, jean shirt, samart shirt]', 2990, '[S, M, L, XL]', '[Blue]', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus exercitationem error non fugiat. Officia culpa eaque dignissimos ducimus perferendis deserunt.', 'https://i.imgur.com/MdM6kT4.jpg'),
(5, 'Chanel clothes', 4.3, '[chanel,  girl,  clothes girl]', 43500, '[S, M, L, XL]', '[Gray]', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus exercitationem error non fugiat. Officia culpa eaque dignissimos ducimus perferendis deserunt.', 'https://i.imgur.com/EJw1BX0.jpg'),
(6, 'White Tshirt', 3.7, '[men, white, tshirt]', 2990, '[M, L, XL, XXL]', '[White]', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus exercitationem error non fugiat. Officia culpa eaque dignissimos ducimus perferendis deserunt.', 'https://i.imgur.com/HsXirFw.jpg'),
(7, 'Calvin Klein sport bar', 3.5, '[girl, sportbar, blacksportbar]', 2590, '[S, M, L]', '[Black, White]', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus exercitationem error non fugiat. Officia culpa eaque dignissimos ducimus perferendis deserunt.', 'https://i.imgur.com/Ya5LVUI.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Supachok', 'mac_spc@gmail.com', '7b902e6ff1db9f560443f2048974fd7d386975b0'),
(2, 'supakit', 'supakit@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227');

-- --------------------------------------------------------

--
-- Structure for view `cart_user_view`
--
DROP TABLE IF EXISTS `cart_user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart_user_view`  AS SELECT `u`.`user_id` AS `user_id`, `c`.`cart_id` AS `cart_id`, `i`.`item_id` AS `item_id`, `c`.`quantity` AS `quantity`, `c`.`color` AS `color`, `c`.`size` AS `size`, `i`.`item_name` AS `item_name`, `i`.`item_rating` AS `item_rating`, `i`.`item_tags` AS `item_tags`, `i`.`item_price` AS `item_price`, `i`.`item_size` AS `item_size`, `i`.`item_color` AS `item_color`, `i`.`item_desc` AS `item_desc`, `i`.`item_image` AS `item_image` FROM ((`users_tb` `u` join `cart_tb` `c`) join `items_tb` `i`) WHERE `c`.`user_id` = `u`.`user_id` AND `c`.`item_id` = `i`.`item_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`amdin_id`);

--
-- Indexes for table `cart_tb`
--
ALTER TABLE `cart_tb`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `favorite_tb`
--
ALTER TABLE `favorite_tb`
  ADD PRIMARY KEY (`favorite_id`);

--
-- Indexes for table `items_tb`
--
ALTER TABLE `items_tb`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `amdin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_tb`
--
ALTER TABLE `cart_tb`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `favorite_tb`
--
ALTER TABLE `favorite_tb`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items_tb`
--
ALTER TABLE `items_tb`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
