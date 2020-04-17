-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2020 at 11:12 AM
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
  `Item_color` set('Gold','Silver','Rose Gold') NOT NULL,
  `Item_category` enum('Rings','Bracelet','Necklace','Earring') NOT NULL,
  `Item_price` int(11) NOT NULL,
  `Item_size` enum('XS','S','M','L') NOT NULL,
  `Stone_type` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Description` longtext NOT NULL,
  `Material` varchar(255) NOT NULL,
  `warranty` int(11) NOT NULL,
  `In_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_id`, `Item_color`, `Item_category`, `Item_price`, `Item_size`, `Stone_type`, `image`, `Description`, `Material`, `warranty`, `In_stock`) VALUES
(2902254, 'Gold', 'Rings', 1700, 'M', 6, 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587032489/storo/ring.png', 'Shining, smooth stainless steel ring     Embellished with crystals         Comes packed in a branded box', 'Metal', 2, 20),
(5464833, 'Gold', 'Earring', 1000, 'M', 6, 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587032497/storo/earrings.jpg', 'This pair of pierced earrings by crystal features a charming floral design. Each piece is highlighted by a pink stone, which is beautifully complemented by a rose-gold tone plated setting and clear crystal pave.', 'Metal', 1, 3),
(5498966, 'Gold', 'Necklace', 800, 'M', 6, 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587032511/storo/necklace.png', 'Smooth, rosegold-plated metal bracelet Floral charms with embellished crystals Open ends for adjustable fit Comes packed in a branded box', 'Metal', 2, 5),
(23052434, 'Gold', 'Bracelet', 1200, 'M', 6, 'https://res.cloudinary.com/dw675k0f5/image/upload/v1587032523/storo/Bracelet.jpg', 'Quality bracelets for you', 'Metal', 2, 2),
(23052438, 'Silver', 'Bracelet', 2000, 'S', 1, 'https://thumbs.dreamstime.com/b/short-gold-necklace-8350633.jpg', 'Great piece of art', 'Metal', 2, 1);

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
('bb', 30, 23052438, 1, 2000, '32211', 'VISA', 'bb', 'bb', 'h@hotmail.com', 'Bracelet', 'S', 'KSA', '678-789-8977');

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
  ADD PRIMARY KEY (`Item_id`),
  ADD KEY `Stone_type` (`Stone_type`);

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `stone_type`
--
ALTER TABLE `stone_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`Stone_type`) REFERENCES `stone_type` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
