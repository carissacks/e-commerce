-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 11:23 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eyecandy`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id_item` varchar(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_desc` text NOT NULL,
  `weight` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `buying_price` int(11) NOT NULL,
  `care_ins` text NOT NULL,
  `id_type` int(3) NOT NULL,
  `disc` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id_item`, `item_name`, `item_desc`, `weight`, `selling_price`, `buying_price`, `care_ins`, `id_type`, `disc`) VALUES
('T001', 'Lyocell-blend Flounced Dress', 'Short, off-the-shoulder flounced dress woven in a textured Tencel® lyocell blend with narrow adjustable shoulder straps and short sleeves with elastication at the top. Lined.', 200, 799900, 500000, 'Machine wash at 30°', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_colored`
--

CREATE TABLE `item_colored` (
  `id_item_colored` int(11) NOT NULL,
  `id_item` varchar(10) NOT NULL,
  `item_color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_colored`
--

INSERT INTO `item_colored` (`id_item_colored`, `id_item`, `item_color`) VALUES
(1, 'T001', 'Yellow'),
(2, 'T001', 'Lemon');

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

CREATE TABLE `item_stock` (
  `id_item_colored` int(11) NOT NULL,
  `item_size` varchar(5) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_stock`
--

INSERT INTO `item_stock` (`id_item_colored`, `item_size`, `stock`) VALUES
(1, 'L', 10),
(1, 'M', 10),
(1, 'S', 10),
(1, 'XL', 10),
(2, 'L', 10),
(2, 'M', 10),
(2, 'S', 10),
(2, 'XL', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ms_users`
--

CREATE TABLE `ms_users` (
  `email_user` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `salt` varchar(10) NOT NULL,
  `priv` int(2) NOT NULL,
  `prof_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `item_photo` varchar(100) NOT NULL,
  `id_item_colored` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id_item_colored` int(11) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `star` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id_item_colored` int(11) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_size` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_trans` varchar(10) NOT NULL,
  `id_item_colored` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_size` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id_trans` varchar(10) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `stats` varchar(10) NOT NULL,
  `trans_date` date NOT NULL,
  `totalpayment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(3) NOT NULL,
  `type_desc` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `type_desc`) VALUES
(1, 'Dress'),
(2, 'Jumpsuit'),
(3, 'Blouse'),
(4, 'Shirt'),
(5, 'Tees'),
(6, 'Skirt'),
(7, 'Jeans'),
(8, 'Shorts');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_item_colored` varchar(10) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `item_size` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `IDTYPE_FOREIGNKEY` (`id_type`);

--
-- Indexes for table `item_colored`
--
ALTER TABLE `item_colored`
  ADD PRIMARY KEY (`id_item_colored`),
  ADD KEY `item_colored_ibfk_1` (`id_item`);

--
-- Indexes for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD PRIMARY KEY (`id_item_colored`,`item_size`),
  ADD KEY `item_stock_ibfk_1` (`id_item_colored`);

--
-- Indexes for table `ms_users`
--
ALTER TABLE `ms_users`
  ADD PRIMARY KEY (`email_user`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`item_photo`,`id_item_colored`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_item_colored`,`email_user`),
  ADD KEY `reviews_ibfk_1` (`email_user`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id_item_colored`,`email_user`,`item_size`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_trans`,`id_item_colored`,`item_size`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id_trans`,`email_user`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_item_colored`,`email_user`,`item_size`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_colored`
--
ALTER TABLE `item_colored`
  MODIFY `id_item_colored` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `IDTYPE_FOREIGNKEY` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_colored`
--
ALTER TABLE `item_colored`
  ADD CONSTRAINT `item_colored_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `items` (`id_item`);

--
-- Constraints for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD CONSTRAINT `item_stock_ibfk_1` FOREIGN KEY (`id_item_colored`) REFERENCES `item_colored` (`id_item_colored`);

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`id_item_colored`) REFERENCES `item_colored` (`id_item_colored`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`email_user`) REFERENCES `ms_users` (`email_user`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`id_item_colored`) REFERENCES `item_colored` (`id_item_colored`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
