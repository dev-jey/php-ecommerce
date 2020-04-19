-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2020 at 07:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stones`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminUsername` varchar(15) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminUsername`, `Fname`, `Lname`, `Password`) VALUES
('jey', 'jey', 'sav', 'admin'),
('Nuha1', 'Nuha', 'Ali', '1234n'),
('Rakan1', 'Rakan', 'Omer', '1234r');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_id` int(11) NOT NULL,
  `Item_category` enum('Rings','Bracelet','Necklace','Earring') NOT NULL,
  `Item_price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Description` longtext NOT NULL,
  `Material` varchar(255) NOT NULL,
  `warranty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_id`, `Item_category`, `Item_price`, `image`, `Description`, `Material`, `warranty`) VALUES
(2902254, 'Rings', 1700, 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587032489/storo/ring.png', 'Shining, smooth stainless steel ring     Embellished with crystals         Comes packed in a branded box', 'Metal', 2),
(5464833, 'Earring', 1000, 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587032497/storo/earrings.jpg', 'This pair of pierced earrings by crystal features a charming floral design. Each piece is highlighted by a pink stone, which is beautifully complemented by a rose-gold tone plated setting and clear crystal pave.', 'Metal', 1),
(5498966, 'Necklace', 800, 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587032511/storo/necklace.png', 'Smooth, rosegold-plated metal bracelet Floral charms with embellished crystals Open ends for adjustable fit Comes packed in a branded box', 'Metal', 2),
(23052434, 'Bracelet', 1200, 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587032523/storo/Bracelet.jpg', 'Quality bracelets for you', 'Metal', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Item_data`
--

CREATE TABLE `Item_data` (
  `id` int(11) NOT NULL,
  `Item_id` int(11) NOT NULL,
  `Color` varchar(30) NOT NULL,
  `Size` varchar(30) NOT NULL,
  `type` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Item_data`
--

INSERT INTO `Item_data` (`id`, `Item_id`, `Color`, `Size`, `type`, `Quantity`) VALUES
(5, 2902254, 'Gold', 'XS', 1, 2),
(6, 5498966, 'Gold', 'L', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `username` varchar(20) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `Item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `address` text NOT NULL,
  `payment_method` enum('PayPal','VISA') NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Item_category` varchar(255) NOT NULL,
  `Item_size` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`username`, `Order_id`, `Item_id`, `quantity`, `total`, `address`, `payment_method`, `firstname`, `lastname`, `email`, `Item_category`, `Item_size`, `country`, `phone`) VALUES
('bb', 30, 23052438, 1, 2000, '32211', 'VISA', 'bb', 'bb', 'h@hotmail.com', 'Bracelet', 'S', 'KSA', '678-789-8977'),
('fahad123', 46, 2902254, 3, 37000, '2222222', 'VISA', 'fahad', 'saleh', 'f@hotmail.com', 'Earring', 'M', 'KSA', '777-777-8888'),
('fahad123', 47, 2902254, 20, 37000, '2222222', 'VISA', 'fahad', 'saleh', 'f@hotmail.com', 'Rings', 'M', 'KSA', '777-777-8888'),
('fahad123', 48, 2902254, 1, 1700, '222', 'VISA', 'fahad', 'saleh', 'f@hotmail.com', 'Rings', 'M', 'KSA', '777-777-8888'),
('razan333', 49, 23052434, 2, 2400, '67', 'VISA', 'rrrr', 'ddddd', 'mimi@gmail.com', 'Bracelet', 'M', 'KSA', '999-999-0000'),
('razan123', 50, 23052438, 1, 2000, '123', 'PayPal', 'razan', 'alii', 'mimi@gmail.com', 'Bracelet', 'S', 'KSA', '222-222-2222'),
('razan123', 51, 2902254, 1, 1700, '123', 'PayPal', 'razan', 'alii', 'mimi@gmail.com', 'Rings', 'M', 'KSA', '444-444-4443'),
('smith9', 52, 2902254, 2, 3400, '234', 'PayPal', 'Jey', 'Key', 'asep@gmail.com', 'Rings', 'M', 'KSA', '234-212-4122'),
('smith9', 53, 23052438, 1, 2800, '2342', 'PayPal', 'Ken', 'Mijungu', 'min@gmail.com', 'Necklace', 'M', 'KSA', '234-123-2445'),
('smith9', 54, 23052438, 1, 2800, '2342', 'PayPal', 'Ken', 'Mijungu', 'min@gmail.com', 'Bracelet', 'S', 'KSA', '234-123-2445'),
('smith9', 55, 2902254, 2, 3400, '23423', 'VISA', 'Jey', 'r', 'as@sa.dsa', 'Rings', 'XS', 'KSA', '234-212-1424'),
('smith9', 56, 2902254, 4, 6800, 'wer', 'VISA', 'dsf', 'sdf', 'sd@wer.ewr', 'Rings', 'XS', 'KSA', '234-234-2523'),
('smith9', 57, 2902254, 2, 3400, 'sdfsd', 'PayPal', 'sdf', 'dsf', 'sd@sdf.sfd', 'Rings', 'XS', 'KSA', '324-235-2342'),
('smith9', 58, 2902254, 2, 3400, 'sdfsd', 'PayPal', 'sdf', 'dsf', 'sd@sdf.sfd', 'Rings', 'XS', 'KSA', '324-235-2342'),
('smith9', 59, 2902254, 2, 3400, 'sdfsd', 'PayPal', 'sdf', 'dsf', 'sd@sdf.sfd', 'Rings', 'XS', 'KSA', '324-235-2342'),
('smith9', 60, 2902254, 2, 3400, 'sdfsd', 'PayPal', 'sdf', 'dsf', 'sd@sdf.sfd', 'Rings', 'XS', 'KSA', '324-235-2342'),
('smith9', 61, 2902254, 2, 3400, 'sdfsd', 'PayPal', 'sdf', 'dsf', 'sd@sdf.sfd', 'Rings', 'XS', 'KSA', '324-235-2342'),
('smith9', 62, 2902254, 2, 3400, 'sdfsd', 'PayPal', 'sdf', 'dsf', 'sd@sdf.sfd', 'Rings', 'XS', 'KSA', '324-235-2342');

-- --------------------------------------------------------

--
-- Table structure for table `stone_type`
--

CREATE TABLE `stone_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stone_type`
--

INSERT INTO `stone_type` (`id`, `name`, `image`, `description`) VALUES
(1, 'Sapphire blue', 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587033390/storo/blue.png', 'sapphire refers to the different types of gemstones of corundum metal, sapphire is usually worn as a jewelry, because it is a gem. Sapphire can be found in nature.'),
(2, 'Black diamond', 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587033390/storo/black_spinel.png', 'From time to time we present on our site black diamonds (which are issued as a result of radiation). The most famous black stone is the tourmaline stone. Black star sapphires can be found only in the Chanthaburi region of Thailand, which are also famous stones.'),
(3, 'Emerald', 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587033390/storo/green_beryl.png', 'Emerald is a type of beryl metal made of beryllium silicate and aluminum, found in mines between hard and rock rocks unlike most gemstones, its color is deep dark green'),
(4, 'Transparent gemstones', 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587033391/storo/white.png', '(transparent gemstones)Diamonds have been known since ancient times as one of the stones of commercial value.  The popularity of diamonds increased in the nineteenth century with the increase in global production.'),
(5, 'Tourmaline and spinel stones', 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587033390/storo/pink.png', 'The most famous are tourmaline and spinel stones, the list of pink stones is very short due to the list of other stones.'),
(6, 'Amber (kahraman)', 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587033390/storo/orange.png', 'Amber (kahraman)is fossilized from coniferous trees transported in some forest areas, and it is also fragile and emits the smell of coniferous trees when rubbed by hand.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `firstname` varchar(10) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `gender` enum('F','M') NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `country` enum('KSA','USA','UK','BH','UAE','KWT') NOT NULL,
  `password` longtext NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `firstname`, `lastname`, `gender`, `phone`, `email`, `country`, `password`, `role`) VALUES
('fahad123', 'fahad', 'saleh', 'M', '777-777-8888', 'f@hotmail.com', 'KSA', '$2y$10$dbldx/msox33rX8mUu8aT.fceXLSBrWHT7Nvhk1.2lFkfwLE.vfW2', 0),
('maram123', 'maram333', 'saleh', 'M', '000-444-4444', 'maram@hotmail.com', 'KSA', '$2y$10$3ZkYPf0jvEOSoRFZyRAQheApZMlFVEa/Z5hQqNs.bAW1aLLXdftzC', 0),
('razan333', 'razan', 'alii', 'F', '555-656-4325', 'mimi@gmail.com', 'KSA', '$2y$10$lP4LintdZOVS2iCq/NlTzekHokBJo9dHjoxPwbEK8ucYoWB4jrswG', 0),
('NajlaAbdullah', 'Naijla', 'Abdullah', 'F', '888-987-9998', 'NajlaAbdullah@hotmail.com', 'KSA', '$2y$10$.U8GplCQNqZ3AJ5ZYNv8QOFvY19tUMEmZomECtucBHjpGHqFAOBga', 0),
('smith9', 'smith', 'tomey', 'M', '234-234-2342', 'sav@gmail.com', 'USA', '$2y$10$UhPk5JBNQiUKntbFDcmrIOHiA5HjQvNpPZ12qs8i.uT8dtoEnGeGy', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminUsername`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_id`);

--
-- Indexes for table `Item_data`
--
ALTER TABLE `Item_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `Item_id` (`Item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `Username` (`username`),
  ADD KEY `Item_id` (`Item_id`);

--
-- Indexes for table `stone_type`
--
ALTER TABLE `stone_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23052440;

--
-- AUTO_INCREMENT for table `Item_data`
--
ALTER TABLE `Item_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `stone_type`
--
ALTER TABLE `stone_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Item_data`
--
ALTER TABLE `Item_data`
  ADD CONSTRAINT `Item_data_ibfk_1` FOREIGN KEY (`type`) REFERENCES `stone_type` (`id`),
  ADD CONSTRAINT `Item_data_ibfk_2` FOREIGN KEY (`Item_id`) REFERENCES `item` (`Item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
