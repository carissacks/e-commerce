-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 10:47 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eyecandies`
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
('T001', 'Lyocell-blend Flounced Dress', 'Short, off-the-shoulder flounced dress woven in a textured Tencel® lyocell blend with narrow adjustable shoulder straps and short sleeves with elastication at the top. Lined.', 200, 799900, 500000, 'Machine wash at 30°', 1, 0),
('T002', 'Pleated Maxi Dress', 'Maxi dress in soft jersey with a V-neck at the front and low-cut neckline at the back. Wide shoulder straps that cross at the back, an elasticated seam at the waist and a long, pleated, heavily draping skirt. Lined.', 500, 899900, 600000, 'Machine wash at 40°', 1, 0),
('T003', 'Sleeveless Jersey Dress', 'Short, sleeveless dress in sturdy jersey with a low-cut back, seam at the waist and flared skirt. The polyester content of the dress is partly recycled.', 200, 149900, 50000, 'Machine wash at 30°\r\n', 1, 0),
('T004', 'Tie-belt Dress', 'Straight-cut, calf-length dress in woven fabric with a grandad collar and covered buttons at the top. Detachable tie belt at the waist and long, slightly wider sleeves with covered buttons at the narrow cuffs. Unlined.', 400, 449900, 300000, 'Machine wash at 30°', 1, 0),
('T005', 'Fine-knit Dress', 'Calf-length dress in a soft, fine-knit viscose blend a round neckline, short sleeves and flared skirt. Unlined.', 100, 399900, 150000, 'Machine wash at 30°', 1, 0),
('T006', 'Patterned Long Dress', 'Long, sleeveless dress in patterned satin with a gathered, elasticated neckline, short, double shoulder straps and a seam at the waist with a detachable tie belt. Lined.', 300, 599900, 302000, 'Machine wash at 30°', 1, 0),
('T007', 'V-neck Jersey Dress', 'Short dress in patterned jersey with a draped V-neck and sewn-in wrapover at the top. Long sleeves, cuffs with metal buttons, an elasticated seam at the waist and a gently flared skirt. Unlined.', 250, 399900, 20000, 'Machine wash at 40°', 1, 0),
('T008', 'Cotton Twill Boiler Suit', 'Long-sleeved boiler suit in cotton twill with notch lapels, a V-neck and buttons down the front. Flap chest pockets, patch front pockets, a detachable tie belt at the waist and straight, ankle-length legs with elasticated hems.', 500, 499900, 350000, 'Machine wash at 40°', 2, 0),
('T009', 'Sleeveless Jumpsuit', 'Sleeveless jumpsuit in woven fabric with notch lapels and a wrapover front with a concealed button. Seam and detachable tie belt at the waist, side pockets, fake back pockets, and tapered, ankle-length leg with slits at the hems.', 400, 799900, 400000, 'Machine wash at 40°', 2, 0),
('T010', 'Ankle-length Lyocell Jumpsuit', 'Ankle-length jumpsuit woven in a Tencel® lyocell blend with a V-neck at the back, and twisted rope shoulder straps that cross and tie at the back. Seam at the waist with covered elastication at the back, a low crotch and side pockets. Pleats at the waist and straight, softly draping legs. Lined.', 400, 799900, 590000, 'Machine wash at 30°', 2, 0),
('T011', 'Cotton Boiler Suit', 'Ankle-length boiler suit in an airy cotton weave with a resort collar, chest pockets and an elasticated waist. Buttons down the front and half-length sleeves with sewn-in turn ups.', 600, 499900, 200000, 'Machine wash at 40°', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_colored`
--

CREATE TABLE `item_colored` (
  `id_item_colored` int(11) NOT NULL,
  `id_item` varchar(10) NOT NULL,
  `item_color` varchar(15) NOT NULL,
  `show` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_colored`
--

INSERT INTO `item_colored` (`id_item_colored`, `id_item`, `item_color`, `show`) VALUES
(1, 'T001', 'Yellow', 1),
(2, 'T001', 'Lemon', 1),
(3, 'T002', 'Turquoise', 1),
(4, 'T002', 'Rose', 1),
(5, 'T003', 'Black', 1),
(6, 'T003', 'White-Blue', 1),
(7, 'T003', 'Red', 1),
(8, 'T003', 'Floral', 1),
(9, 'T004', 'Brown', 1),
(10, 'T004', 'Patterned', 1),
(11, 'T004', 'Green', 1),
(12, 'T004', 'Floral', 1),
(13, 'T005', 'Black', 1),
(14, 'T006', 'Red', 1),
(15, 'T007', 'Black', 1),
(16, 'T007', 'Beige', 1),
(17, 'T008', 'Khaki', 1),
(18, 'T009', 'Black', 1),
(19, 'T010', 'Cream', 1),
(20, 'T011', 'Brown', 1),
(21, 'T011', 'Blue', 1);

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
(1, 'L', 0),
(1, 'M', 0),
(1, 'S', 10),
(1, 'XL', 10),
(2, 'L', 10),
(2, 'M', 10),
(2, 'S', 10),
(2, 'XL', 10),
(3, 'L', 10),
(3, 'M', 10),
(3, 'S', 9),
(3, 'XL', 10),
(4, 'L', 10),
(4, 'M', 10),
(4, 'S', 10),
(4, 'XL', 10),
(5, 'L', 10),
(5, 'M', 10),
(5, 'S', 10),
(5, 'XL', 10),
(6, 'L', 10),
(6, 'M', 10),
(6, 'S', 10),
(6, 'XL', 10),
(7, 'L', 10),
(7, 'M', 10),
(7, 'S', 10),
(7, 'XL', 10),
(8, 'L', 10),
(8, 'M', 10),
(8, 'S', 10),
(8, 'XL', 10),
(9, 'L', 10),
(9, 'M', 10),
(9, 'S', 10),
(9, 'XL', 10),
(10, 'L', 10),
(10, 'M', 10),
(10, 'S', 10),
(10, 'XL', 10),
(11, 'L', 10),
(11, 'M', 10),
(11, 'S', 10),
(11, 'XL', 10),
(12, 'L', 10),
(12, 'M', 10),
(12, 'S', 10),
(12, 'XL', 10),
(13, 'L', 10),
(13, 'M', 10),
(13, 'S', 10),
(13, 'XL', 10),
(14, 'L', 10),
(14, 'M', 10),
(14, 'S', 10),
(14, 'XL', 10),
(15, 'L', 10),
(15, 'M', 10),
(15, 'S', 10),
(15, 'XL', 10),
(16, 'L', 10),
(16, 'M', 10),
(16, 'S', 10),
(16, 'XL', 10),
(17, 'L', 10),
(17, 'M', 10),
(17, 'S', 10),
(17, 'XL', 10),
(18, 'L', 1),
(18, 'M', 0),
(18, 'S', 10),
(18, 'XL', 10),
(19, 'L', 0),
(19, 'M', 0),
(19, 'S', 2),
(19, 'XL', 9),
(20, 'L', 10),
(20, 'M', 10),
(20, 'S', 9),
(20, 'XL', 10),
(21, 'L', 10),
(21, 'M', 10),
(21, 'S', 10),
(21, 'XL', 10);

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

--
-- Dumping data for table `ms_users`
--

INSERT INTO `ms_users` (`email_user`, `pass`, `name`, `address`, `salt`, `priv`, `prof_pic`) VALUES
('admin@admin.com', '109ff28a4a4515cc0499d422fad85592', 'Admin nih', '-', 'hai', 1, 'foto.png'),
('agus@gmail.com', 'cdabf9e991c78c26319afb97eedda64e', 'Agus Tinus', 'Jalan Newton Barat No. 2', 'poikm', 0, 'foto.png'),
('aldo@gmail.com', '220e2f1d9d5bb386228de89bc7cb63fe', 'Aldo Sando', 'Jalan Newton Barat No. 15', 'ygnoh', 0, 'foto.png'),
('andre@gmail.com', '32efce30737997814efbd51c1a0a1551', 'Andre Andri', 'Jalan Newton Utara No. 7', 'juhbu', 0, 'foto.png'),
('andy@gmail.com', 'c68fce4c2f71538bb2501c2e85981792', 'Andy Winata', 'Jalan Newton Timur No. 5', 'xhitf', 1, 'foto.png'),
('ariel@gmail.com', '508a7d0022875cbd62eb2c9984e47946', 'Ariel Tanoto', 'Jalan Newton Pusat No. 23', 'uikmb', 0, 'foto.png'),
('billy@gmail.com', '97b6b3c62adad6dd7f7bf622f552db4a', 'Billy Bernardus', 'Jalan Newton Utara No. 2', 'dtyui', 1, 'foto.png'),
('caca@gmail.com', '77a8baab0003b64386efbbe8e09f262a', 'Caca Marica', 'Jalan Newton Selatan No. 3', 'rtygh', 0, 'foto.png'),
('linata@gmail.com', '2e166a1e60e6d9de36ad29f5875ac6e8', 'Linata Lia', 'Jalan Newton Utara No. 9', 'iuhgm', 0, 'foto.png'),
('sumianto.sumarti@gmail.com', 'eab00e556541e7b1c43712dbcdbbae49', 'Sumianto Sumarti', 'Jalan Newton Timur No. 35', 'mituj', 0, 'foto.png'),
('wahyudi@gmail.com', 'df6ae04f74d55886cbf2269f47a3fe21', 'Wahyudi Agus', 'Jalan Newton Timur No. 18', 'oiujh', 0, 'foto.png');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `item_photo` varchar(100) NOT NULL,
  `id_item_colored` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`item_photo`, `id_item_colored`) VALUES
('T001-Lemon-1.jpg', 2),
('T001-Lemon-2.jpg', 2),
('T001-Lemon-3.jpg', 2),
('T001-Lemon-4.jpg', 2),
('T001-Yellow-1.jpg', 1),
('T001-Yellow-2.jpg', 1),
('T001-Yellow-3.jpg', 1),
('T001-Yellow-4.jpg', 1),
('T002-Rose-1.jpg', 4),
('T002-Rose-2.jpg', 4),
('T002-Rose-3.jpg', 4),
('T002-Rose-4.jpg', 4),
('T002-Turquoise-1.jpg', 3),
('T002-Turquoise-2.jpg', 3),
('T002-Turquoise-3.jpg', 3),
('T002-Turquoise-4.jpg', 3),
('T003-Black-1.jpg', 5),
('T003-Black-2.jpg', 5),
('T003-Black-3.jpg', 5),
('T003-Floral-1.jpg', 8),
('T003-Floral-2.jpg', 8),
('T003-Floral-3.jpg', 8),
('T003-Red-1.jpg', 7),
('T003-Red-2.jpg', 7),
('T003-Red-3.jpg', 7),
('T003-White-Blue-1.jpg', 6),
('T003-White-Blue-2.jpg', 6),
('T003-White-Blue-3.jpg', 6),
('T004-Brown-1.jpg', 9),
('T004-Brown-2.jpg', 9),
('T004-Brown-3.jpg', 9),
('T004-Brown-4.jpg', 9),
('T004-Floral-1.jpg', 12),
('T004-Floral-2.jpg', 12),
('T004-Floral-3.jpg', 12),
('T004-Floral-4.jpg', 12),
('T004-Green-1.jpg', 11),
('T004-Green-2.jpg', 11),
('T004-Green-3.jpg', 11),
('T004-Green-4.jpg', 11),
('T004-Patterned-1.jpg', 10),
('T004-Patterned-2.jpg', 10),
('T004-Patterned-3.jpg', 10),
('T004-Patterned-4.jpg', 10),
('T005-Black-1.jpg', 13),
('T005-Black-2.jpg', 13),
('T005-Black-3.jpg', 13),
('T005-Black-4.jpg', 13),
('T006-Red-1.jpg', 14),
('T006-Red-2.jpg', 14),
('T006-Red-3.jpg', 14),
('T006-Red-4.jpg', 14),
('T007-Beige-1.jpg', 16),
('T007-Beige-2.jpg', 16),
('T007-Beige-3.jpg', 16),
('T007-Beige-4.jpg', 16),
('T007-Black-1.jpg', 15),
('T007-Black-2.jpg', 15),
('T007-Black-3.jpg', 15),
('T007-Black-4.jpg', 15),
('T008-Khaki-1.jpg', 17),
('T008-Khaki-2.jpg', 17),
('T008-Khaki-3.jpg', 17),
('T008-Khaki-4.jpg', 17),
('T009-Black-1.jpg', 18),
('T009-Black-2.jpg', 18),
('T009-Black-3.jpg', 18),
('T009-Black-4.jpg', 18),
('T010-Cream-1.jpg', 19),
('T010-Cream-2.jpg', 19),
('T010-Cream-3.jpg', 19),
('T010-Cream-4.jpg', 19),
('T011-Blue-1.jpg', 21),
('T011-Blue-2.jpg', 21),
('T011-Blue-3.jpg', 21),
('T011-Blue-4.jpg', 21),
('T011-Brown-1.jpg', 20),
('T011-Brown-2.jpg', 20),
('T011-Brown-3.jpg', 20),
('T011-Brown-4.jpg', 20);

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

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id_item_colored`, `email_user`, `star`, `description`) VALUES
(1, 'agus@gmail.com', 4, 'Dress sangat nyaman digunakan dan cocok untuk digunakan dalam berbagai acara');

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
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(3) NOT NULL,
  `status_desc` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status_desc`) VALUES
(1, 'Waiting for payment'),
(2, 'Processing order'),
(3, 'Ready to send'),
(4, 'Shipping'),
(5, 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_trans` varchar(10) NOT NULL,
  `id_item_colored` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `UnitPrice` int(11) NOT NULL,
  `item_size` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_trans`, `id_item_colored`, `quantity`, `UnitPrice`, `item_size`) VALUES
('1', 1, 1, 799900, 'S'),
('1', 8, 1, 149900, 'S'),
('1', 13, 1, 399900, 'S'),
('10', 12, 1, 449900, 'L'),
('11', 3, 1, 899900, 'S'),
('12', 19, 1, 799900, 'XL'),
('13', 19, 1, 799900, 'M'),
('14', 19, 1, 799900, 'M'),
('15', 18, 10, 799900, 'M'),
('16', 1, 4, 799900, 'M'),
('17', 1, 4, 799900, 'M'),
('18', 1, 4, 799900, 'M'),
('19', 1, 4, 799900, 'M'),
('2', 14, 1, 599900, 'M'),
('2', 15, 2, 399900, 'S'),
('2', 19, 1, 799900, 'M'),
('20', 1, 4, 799900, 'M'),
('21', 1, 4, 799900, 'M'),
('22', 1, 4, 799900, 'M'),
('23', 1, 4, 799900, 'M'),
('24', 1, 2, 799900, 'M'),
('25', 19, 3, 799900, 'M'),
('26', 19, 5, 799900, 'L'),
('27', 18, 9, 799900, 'L'),
('27', 19, 5, 799900, 'L'),
('3', 6, 1, 149900, 'M'),
('3', 8, 1, 149900, 'S'),
('32', 20, 1, 499900, 'S'),
('4', 5, 10, 149900, 'XL'),
('5', 21, 1, 499900, 'M'),
('6', 10, 1, 449900, 'L'),
('6', 11, 1, 449900, 'L'),
('6', 17, 1, 499900, 'M'),
('7', 12, 1, 449900, 'S'),
('7', 13, 1, 399900, 'S'),
('8', 14, 1, 599900, 'XL'),
('8', 19, 1, 799900, 'S'),
('9', 3, 1, 899900, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id_trans` int(11) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `stats` varchar(10) NOT NULL,
  `trans_date` date NOT NULL,
  `shipping_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`id_trans`, `email_user`, `stats`, `trans_date`, `shipping_fee`) VALUES
(1, 'andre@gmail.com', '2', '2019-11-01', 0),
(2, 'linata@gmail.com', '3', '2019-10-17', 0),
(3, 'caca@gmail.com', '2', '2019-10-30', 10000),
(4, 'andre@gmail.com', '4', '2019-10-31', 10000),
(5, 'aldo@gmail.com', '5', '2019-09-20', 0),
(6, 'billy@gmail.com', '6', '2019-09-01', 0),
(7, 'wahyudi@gmail.com', '2', '2019-11-03', 0),
(8, 'linata@gmail.com', '2', '2019-11-11', 0),
(9, 'andy@gmail.com', '5', '2019-11-06', 0),
(10, 'ariel@gmail.com', '6', '2019-11-03', 0),
(11, 'andre@gmail.com', '2', '2019-11-28', 0),
(12, 'andre@gmail.com', '2', '2019-11-29', 0),
(13, 'andre@gmail.com', '2', '2019-11-29', 0),
(14, 'andre@gmail.com', '2', '2019-11-29', 0),

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
  `item_size` varchar(3) NOT NULL
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
  ADD PRIMARY KEY (`item_photo`,`id_item_colored`),
  ADD KEY `photos_ibfk_1` (`id_item_colored`);

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
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_trans`,`id_item_colored`,`item_size`),
  ADD KEY `id_item_colored` (`id_item_colored`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id_trans`,`email_user`),
  ADD KEY `email_user` (`email_user`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_item_colored`,`email_user`,`item_size`),
  ADD KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_colored`
--
ALTER TABLE `item_colored`
  MODIFY `id_item_colored` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`id_item_colored`) REFERENCES `item_colored` (`id_item_colored`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_item_colored`) REFERENCES `item_colored` (`id_item_colored`);

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`email_user`) REFERENCES `ms_users` (`email_user`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`email_user`) REFERENCES `ms_users` (`email_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
