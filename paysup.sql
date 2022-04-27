-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2022 at 12:12 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eatfood_paysup`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Mobile Phones'),
(3, 'Speakers'),
(4, 'Software');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `identifier`, `value`) VALUES
(1, 'SITE_NAME', 'Paysup'),
(2, 'MAP_URL', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14265.841306389832!2d87.999223!3d26.63374!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7b96b7292121673f!2sKanchanjunga%20English%20Higher%20Secondary%20School!5e0!3m2!1sen!2snp!4v1618144485195!5m2!1sen!2snp'),
(3, 'PHONE', '+9779876543210/9000000000'),
(4, 'EMAIL', 'somthing@paysup.com'),
(5, 'OPENING_TIME', 'Mon – Sat: 9:00 – 18:00'),
(6, 'FACEBOOK_URL', '#'),
(7, 'INSTAGRAM_URL', '#'),
(8, 'MAP_URL', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14265.841306389832!2d87.999223!3d26.63374!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7b96b7292121673f!2sKanchanjunga%20English%20Higher%20Secondary%20School!5e0!3m2!1sen!2snp!4v1618144485195!5m2!1sen!2snp');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `sizes` text NOT NULL,
  `colors` text NOT NULL,
  `materials` text NOT NULL,
  `images` text NOT NULL,
  `is_top` tinyint(4) NOT NULL DEFAULT '0',
  `is_new` tinyint(4) NOT NULL DEFAULT '0',
  `is_exclusive` tinyint(4) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `sizes`, `colors`, `materials`, `images`, `is_top`, `is_new`, `is_exclusive`, `category_id`, `subcategory_id`) VALUES
(1, 'Samsung M62/F62', 49000.00, '<p>Samsung Galaxy M62 smartphone was launched on 24th February 2021. The phone comes with a 6.70-inch touchscreen display with a resolution of 1080x2400 pixels and an aspect ratio of 20:9. Samsung Galaxy M62 is powered by an octa-core Samsung Exynos 9825 processor. It comes with 8GB of RAM. The Samsung Galaxy M62 runs Android 11 and is powered by a 7000mAh battery. The Samsung Galaxy M62 supports proprietary fast charging.</p><p>As far as the cameras are concerned, the Samsung Galaxy M62 on the rear packs a quad camera setup featuring a 64-megapixel primary camera with an f/1.8 aperture; a 12-megapixel camera with an f/2.2 aperture; a 5-megapixel camera with an f/2.4 aperture, and a 5-megapixel camera with an f/2.4 aperture. The rear camera setup has autofocus. It has a single front camera setup for selfies, featuring a 32-megapixel sensor with an f/2.2 aperture.</p><p>The Samsung Galaxy M62 runs One UI 3.1 is based on Android 11 and packs 128GB of inbuilt storage that can be expanded via microSD card (up to 1000GB). The Samsung Galaxy M62 is a dual-SIM (GSM and GSM) smartphone that accepts Nano-SIM and Nano-SIM cards. The Samsung Galaxy M62 measures 163.90 x 76.30 x 9.50mm (height x width x thickness) and weighs 218.00 grams. It was launched in Black, Blue, and Green colours.</p><p>Connectivity options on the Samsung Galaxy M62 include Wi-Fi, GPS, Bluetooth v5.00, NFC, USB Type-C, 3G, and 4G. Sensors on the phone include accelerometer, ambient light sensor, compass/ magnetometer, gyroscope, proximity sensor, and fingerprint sensor.</p>', 'pro, pro max', 'Red, Black, White', 'Matt finish, Plain finish', '119adc8cddb315abb85342603c527537a052faffe1f0077945192a9c28d69e6b.gif,4d2e7e9eec4b43da42c193aedf851ce70182d70f670f150aea899b9479faa490.gif', 1, 1, 0, 2, 2),
(2, 'Oneplus 9', 70000.00, '<p>The OnePlus 9 still feels solidly built and the plastic frame does look like metal, even though it\'s not.&nbsp;The alert slider and buttons have good tactile feedback, similar to the ones on the 9 Pro.&nbsp;The OnePlus 9 has a similar 6.55-inch AMOLED display as the 8T.&nbsp;Software is taken care of by OxygenOS 11, which is based on Android 11.</p><p>Performance has been very solid right from the get go thanks to the Qualcomm Snapdraogn 888.&nbsp;The display is excellent – colours are vibrant, brightness is very good, and viewing angles are more than satisfactory.&nbsp;The OnePlus 9 delivers very good battery life; a bit better than the 9 Pro in fact, in my opinion.&nbsp;</p><p>The cameras on the OnePlus 9 are a big upgrade compared to its predecessor\'s mainly due to better sensors.&nbsp;The selfie camera is the same one used for the OnePlus 9 Pro, and it\'s decent but not great.&nbsp;The OnePlus 9 is a good smartphone in its own right, but hard to recommend when you have the&nbsp;<a href=\"https://gadgets.ndtv.com/samsung-galaxy-s20-fe-5g-price-in-india-97350\">Samsung Galaxy S20 FE 5G</a>&nbsp;and&nbsp;OnePlus 8 Pro&nbsp;selling for around the same price.</p>', 'non pro, pro', 'white, black, red', 'glass', '54218e9e972235700d09efc2dbcea09c5d75ddd79d04177b4512395b63dcdac8.gif,1bdcb564d68288994460ef37078612707a61f2b4e9f72b78b14ef76c088031d5.gif,c3f5b853fcfd5279242f8f2c8a09666c6f10d2845dfed8cec632e96e22bfbc11.gif', 1, 1, 1, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_requests`
--

CREATE TABLE `quotation_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `items` text NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`) VALUES
(2, 'Samsung', 2),
(3, 'Apple', 2),
(4, 'Nokia', 2),
(5, 'JBL', 3),
(6, 'Sony', 3),
(7, 'Avast Antivirus Premium', 4),
(8, 'Original Copy of Windows', 4),
(9, 'One Plus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `uuid`, `product_id`, `description`, `timestamp`) VALUES
(6, 'DBP5fdcb22447a6fe043e81b4858557db43d2c341809946c', 6, '<p><i>2 piece</i></p>', 1608304023),
(7, 'DBP607060508c759c7fdbfb537b600849e3abd328ee75a08', 1, '', 1617979769);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identifier` (`identifier`(191));

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `on_sale` (`is_exclusive`),
  ADD KEY `is_new` (`is_new`),
  ADD KEY `is_top` (`is_top`);

--
-- Indexes for table `quotation_requests`
--
ALTER TABLE `quotation_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uuid` (`uuid`(191)),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `uuid_2` (`uuid`(191)),
  ADD KEY `timestamp` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quotation_requests`
--
ALTER TABLE `quotation_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
