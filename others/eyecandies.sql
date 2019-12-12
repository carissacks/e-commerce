-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 08:42 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
('T011', 'Cotton Boiler Suit', 'Ankle-length boiler suit in an airy cotton weave with a resort collar, chest pockets and an elasticated waist. Buttons down the front and half-length sleeves with sewn-in turn ups.', 600, 499900, 200000, 'Machine wash at 40°', 2, 0),
('T012', 'Trousers Skinny Fit', '5-pocket trousers in washed, superstretch twill with a regular waist, zip fly and button and skinny legs.', 200, 349900, 200000, 'Machine wash at 30°', 7, 0),
('T013', 'Slim Ankle Jeans', '5-pocket, ankle-length jeans in washed slightly stretch denim with a high waist, zip fly and button and tapered legs.', 300, 599900, 300000, 'Machine wash at 30°', 7, 0),
('T014', 'Mom High Ankle Jeans', '5-pocket, ankle-length jeans in washed denim decorated with sparkly stones at the front. Slightly looser fit with an extra-high waist, button fly and raw-edge hems.', 200, 599900, 599900, 'Machine wash at 40°', 7, 0),
('T015', 'Straight High Waist Jeans', '5-pocket jeans in washed cotton denim with a high waist, zip fly and button and straight legs.', 200, 599900, 350000, 'Machine wash at 30°', 7, 0),
('T016', 'Slim Mom Jeans Trashed', '5-pocket, ankle-length jeans in washed denim with hard-worn details, a high waist and gently tapered legs with raw-edge hems.', 200, 449900, 250000, 'Machine wash at 40°', 7, 0),
('T017', 'Break Up T-shirt', 'Fitted T-shirt in printed jersey made from a cotton blend.', 30, 199900, 50000, 'Machine wash at 40°', 5, 0),
('T018', 'Friends T-shirt', 'Fitted T-shirt in printed jersey made from a cotton blend.', 20, 199900, 60000, 'Machine wash at 40°', 5, 0),
('T019', 'Ribbed Top', 'Short, fitted top in ribbed cotton jersey with short sleeves.', 20, 100000, 30000, 'Machine wash at 40°', 5, 0),
('T020', 'Blouse With A Stand-up Collar', 'Blouse in a crêpe weave with a pleated stand-up collar that has a decorative knot detail at the front, an opening at the top and a concealed zip at the back. Long sleeves with covered buttons at the cuffs.', 100, 399900, 150000, 'Machine wash at 30°', 3, 0),
('T021', 'Airy Blouse', 'Blouse in an airy, patterned weave with a V-neck, collar, and buttons down the front. Yoke at the back, long sleeves with buttoned cuffs, and a rounded hem.', 100, 249900, 100000, 'Machine wash at 30°', 3, 0),
('T022', 'Blouse With Broderie Anglaise', 'Straight-cut blouse in a cotton weave with broderie anglaise. High collar with a frill trim and an opening with covered buttons at the back of the neck. Long, wide raglan sleeves and close-fitting, frilled cuffs with covered buttons. Partly lined.', 249, 799900, 500000, 'Machine wash at 30°', 3, 0),
('T023', 'V-neck Shirt', 'Straight-cut shirt in an airy viscose weave with a collar, V-neck opening and buttons down the front. Flap chest pockets, 3/4-length, cuffed sleeves and short slits in the sides.', 150, 249900, 100000, 'Machine wash at 30°', 4, 0),
('T024', 'Long-sleeved Blouse', 'Blouse in woven fabric with a collar, buttons down the front, gathers at the shoulders, long sleeves with buttoned cuffs, and a rounded hem. Slightly longer at the back.', 160, 249900, 200000, 'Machine wash at 40°', 3, 0),
('T025', 'Cotton Shirt', 'Shirt in airy cotton with a collar, buttons down the front, long sleeves with buttoned cuffs, and a rounded hem.', 150, 149900, 100000, 'Machine wash at 40°', 4, 0),
('T026', 'Circular Skirt', 'Calf-length circular skirt in woven fabric with a high waist and a concealed button and zip at one side. Unlined.', 100, 399900, 150000, 'Machine wash at 30°', 6, 0),
('T027', 'A-line Skirt', 'Short, A-line skirt with a high waist and buttons down the front.', 150, 349900, 200000, 'Machine wash at 30°', 6, 0),
('T028', 'Denim Shorts High Waist', '5-pocket shorts in washed, stretch cotton denim with a high waist and a zip fly and button.', 150, 449900, 300000, 'Machine wash at 30°', 8, 0),
('T029', 'Short Denim Shorts', '5-pocket shorts in washed, stretch denim with a regular waist, zip fly and sewn-in turn-ups at the hems.', 150, 249900, 200000, 'Machine wash at 30°', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_colored`
--

CREATE TABLE `item_colored` (
  `id_item_colored` int(11) NOT NULL,
  `id_item` varchar(10) NOT NULL,
  `item_color` varchar(20) NOT NULL,
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
(21, 'T011', 'Blue', 1),
(25, 'T012', 'white', 1),
(26, 'T012', 'Black', 1),
(27, 'T012', 'Denim Blue', 1),
(28, 'T013', 'Light Denim Blue', 1),
(29, 'T013', 'Grey', 1),
(30, 'T014', 'Denim-Blue', 1),
(31, 'T015', 'Light-Blue', 1),
(32, 'T015', 'Batik-Pattern', 1),
(33, 'T015', 'Cream', 1),
(35, 'T016', 'Light-Blue', 1),
(36, 'T016', 'Blue', 1),
(37, 'T016', 'Black', 1),
(38, 'T017', 'Pink', 1),
(40, 'T018', 'White', 1),
(41, 'T019', 'Black', 1),
(42, 'T019', 'White', 1),
(43, 'T019', 'Red', 1),
(44, 'T019', 'Grey', 1),
(45, 'T019', 'Red-Striped', 1),
(46, 'T019', 'Greige', 1),
(47, 'T019', 'Multicolored Stripes', 1),
(48, 'T020', 'Green', 1),
(49, 'T020', 'White', 1),
(50, 'T020', 'Snake-Skin', 1),
(51, 'T021', 'BlackPink-Patterned', 1),
(52, 'T022', 'Cream', 1),
(53, 'T022', 'Black', 1),
(54, 'T023', 'Khaki', 1),
(55, 'T023', 'Yellow', 1),
(56, 'T023', 'Black', 1),
(57, 'T023', 'White-Leopard', 1),
(58, 'T024', 'Black', 1),
(59, 'T024', 'Floral', 1),
(60, 'T024', 'Checked', 1),
(61, 'T024', 'White', 1),
(62, 'T024', 'Snake-Skin', 1),
(63, 'T024', 'Zebra-Printed', 1),
(64, 'T024', 'Red', 1),
(82, 'T025', 'Dusky-Pink', 1),
(83, 'T025', 'Khaki', 1),
(84, 'T025', 'White', 1),
(85, 'T025', 'Black', 1),
(86, 'T025', 'White-Yellow-Striped', 1),
(87, 'T025', 'White-Green-Striped', 1),
(88, 'T025', 'Light-Blue', 1),
(89, 'T025', 'White-Black', 1),
(90, 'T026', 'Black-Marl', 1),
(91, 'T026', 'Green-Snakeskin', 1),
(92, 'T026', 'Floral', 1),
(93, 'T026', 'Black-White', 1),
(94, 'T026', 'Brown-White', 1),
(95, 'T027', 'Denim-Blue', 1),
(96, 'T027', 'Black', 1),
(97, 'T027', 'Khaki', 1),
(98, 'T027', 'Black-White', 1),
(99, 'T027', 'Black-Twill', 1),
(100, 'T027', 'Pigeon-Blue', 1),
(101, 'T027', 'Old-Rose', 1),
(102, 'T028', 'Denim-Blue', 1),
(103, 'T028', 'White', 1),
(104, 'T029', 'Grey', 1),
(105, 'T029', 'Blue', 1),
(106, 'T029', 'Black', 1),
(107, 'T029', 'Light-Blue', 1);

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
(2, 'XL', 10),
(3, 'L', 10),
(3, 'M', 10),
(3, 'S', 10),
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
(12, '34', 10),
(12, '36', 10),
(12, '38', 10),
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
(18, 'L', 10),
(18, 'M', 10),
(18, 'S', 10),
(18, 'XL', 10),
(19, 'L', 10),
(19, 'M', 10),
(19, 'S', 9),
(19, 'XL', 10),
(20, 'L', 10),
(20, 'M', 10),
(20, 'S', 10),
(20, 'XL', 10),
(21, 'L', 10),
(21, 'M', 10),
(21, 'S', 10),
(21, 'XL', 10),
(25, '32', 10),
(25, '34', 10),
(25, '36', 10),
(25, '38', 10),
(26, '32', 10),
(26, '34', 10),
(26, '36', 10),
(26, '38', 10),
(27, '32', 10),
(27, '34', 10),
(27, '36', 10),
(27, '38', 10),
(28, '32', 10),
(28, '34', 10),
(28, '36', 10),
(28, '38', 10),
(29, '32', 10),
(29, '34', 10),
(29, '36', 10),
(29, '38', 10),
(30, '32', 10),
(30, '34', 10),
(30, '36', 10),
(30, '38', 10),
(31, '32', 10),
(31, '34', 10),
(31, '36', 10),
(31, '38', 10),
(32, '32', 10),
(32, '34', 10),
(32, '36', 10),
(32, '38', 10),
(33, '32', 10),
(33, '34', 10),
(33, '36', 10),
(33, '38', 10),
(35, '32', 10),
(35, '34', 10),
(35, '36', 10),
(35, '38', 10),
(36, '32', 10),
(36, '34', 10),
(36, '36', 10),
(36, '38', 10),
(37, '32', 10),
(37, '34', 10),
(37, '36', 10),
(37, '38', 10),
(38, 'L', 10),
(38, 'M', 10),
(38, 'S', 10),
(38, 'XL', 10),
(40, 'L', 10),
(40, 'M', 10),
(40, 'S', 10),
(40, 'XL', 10),
(41, 'L', 10),
(41, 'M', 10),
(41, 'S', 10),
(41, 'XL', 10),
(42, 'L', 10),
(42, 'M', 10),
(42, 'S', 10),
(42, 'XL', 10),
(43, 'L', 10),
(43, 'M', 10),
(43, 'S', 10),
(43, 'XL', 10),
(44, 'L', 10),
(44, 'M', 10),
(44, 'S', 10),
(44, 'XL', 10),
(45, 'L', 10),
(45, 'M', 10),
(45, 'S', 10),
(45, 'XL', 10),
(46, 'L', 10),
(46, 'M', 10),
(46, 'S', 10),
(46, 'XL', 10),
(47, 'L', 10),
(47, 'M', 10),
(47, 'S', 10),
(47, 'XL', 10),
(48, 'L', 10),
(48, 'M', 10),
(48, 'S', 10),
(48, 'XL', 10),
(49, 'L', 10),
(49, 'M', 10),
(49, 'S', 10),
(49, 'XL', 10),
(50, 'L', 10),
(50, 'M', 10),
(50, 'S', 10),
(50, 'XL', 10),
(51, 'L', 10),
(51, 'M', 10),
(51, 'S', 10),
(51, 'XL', 10),
(52, 'L', 10),
(52, 'M', 10),
(52, 'S', 10),
(52, 'XL', 10),
(53, 'L', 10),
(53, 'M', 10),
(53, 'S', 10),
(53, 'XL', 10),
(54, 'L', 10),
(54, 'M', 10),
(54, 'S', 10),
(54, 'XL', 10),
(55, 'L', 10),
(55, 'M', 10),
(55, 'S', 10),
(55, 'XL', 10),
(56, 'L', 10),
(56, 'M', 10),
(56, 'S', 10),
(56, 'XL', 10),
(57, 'L', 10),
(57, 'M', 10),
(57, 'S', 10),
(57, 'XL', 10),
(58, 'L', 10),
(58, 'M', 10),
(58, 'S', 10),
(58, 'XL', 10),
(59, 'L', 10),
(59, 'M', 10),
(59, 'S', 10),
(59, 'XL', 10),
(60, 'L', 10),
(60, 'M', 10),
(60, 'S', 10),
(60, 'XL', 10),
(61, 'L', 10),
(61, 'M', 10),
(61, 'S', 10),
(61, 'XL', 10),
(62, 'L', 10),
(62, 'M', 10),
(62, 'S', 10),
(62, 'XL', 10),
(63, 'L', 10),
(63, 'M', 10),
(63, 'S', 10),
(63, 'XL', 10),
(64, 'L', 10),
(64, 'M', 10),
(64, 'S', 10),
(64, 'XL', 10),
(82, 'L', 10),
(82, 'M', 10),
(82, 'S', 10),
(82, 'XL', 10),
(83, 'L', 10),
(83, 'M', 10),
(83, 'S', 10),
(83, 'XL', 10),
(84, 'L', 10),
(84, 'M', 10),
(84, 'S', 10),
(84, 'XL', 10),
(85, 'L', 10),
(85, 'M', 10),
(85, 'S', 10),
(85, 'XL', 10),
(86, 'L', 10),
(86, 'M', 10),
(86, 'S', 10),
(86, 'XL', 10),
(87, 'L', 10),
(87, 'M', 10),
(87, 'S', 10),
(87, 'XL', 10),
(88, 'L', 10),
(88, 'M', 10),
(88, 'S', 10),
(88, 'XL', 10),
(89, 'L', 10),
(89, 'M', 10),
(89, 'S', 10),
(89, 'XL', 10),
(90, 'L', 10),
(90, 'M', 10),
(90, 'S', 10),
(90, 'XL', 10),
(91, 'L', 10),
(91, 'M', 10),
(91, 'S', 10),
(91, 'XL', 10),
(92, 'L', 10),
(92, 'M', 10),
(92, 'S', 10),
(92, 'XL', 10),
(93, 'L', 10),
(93, 'M', 10),
(93, 'S', 10),
(93, 'XL', 10),
(94, 'L', 10),
(94, 'M', 10),
(94, 'S', 10),
(94, 'XL', 10),
(95, 'L', 10),
(95, 'M', 10),
(95, 'S', 10),
(95, 'XL', 10),
(96, 'L', 10),
(96, 'M', 10),
(96, 'S', 10),
(96, 'XL', 10),
(97, 'L', 10),
(97, 'M', 10),
(97, 'S', 10),
(97, 'XL', 10),
(98, 'L', 10),
(98, 'M', 10),
(98, 'S', 10),
(98, 'XL', 10),
(99, 'L', 10),
(99, 'M', 10),
(99, 'S', 10),
(99, 'XL', 10),
(100, 'L', 10),
(100, 'M', 10),
(100, 'S', 10),
(100, 'XL', 10),
(101, 'L', 10),
(101, 'M', 10),
(101, 'S', 10),
(101, 'XL', 10),
(102, '32', 9),
(102, '34', 10),
(102, '36', 10),
(102, '38', 10),
(103, '32', 10),
(103, '34', 10),
(103, '36', 10),
(103, '38', 10),
(104, '32', 10),
(104, '34', 10),
(104, '36', 10),
(104, '38', 10),
(105, '32', 10),
(105, '34', 10),
(105, '36', 10),
(105, '38', 10),
(106, '32', 10),
(106, '34', 9),
(106, '36', 10),
(106, '38', 10),
(107, '32', 9),
(107, '34', 10),
(107, '36', 10),
(107, '38', 10);

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
('T001-Yellow-1.jpg', 1),
('T001-Yellow-2.jpg', 1),
('T001-Yellow-3.jpg', 1),
('T001-Yellow-4.jpg', 1),
('T001-Lemon-1.jpg', 2),
('T001-Lemon-2.jpg', 2),
('T001-Lemon-3.jpg', 2),
('T001-Lemon-4.jpg', 2),
('T002-Turquoise-1.jpg', 3),
('T002-Turquoise-2.jpg', 3),
('T002-Turquoise-3.jpg', 3),
('T002-Turquoise-4.jpg', 3),
('T002-Rose-1.jpg', 4),
('T002-Rose-2.jpg', 4),
('T002-Rose-3.jpg', 4),
('T002-Rose-4.jpg', 4),
('T003-Black-1.jpg', 5),
('T003-Black-2.jpg', 5),
('T003-Black-3.jpg', 5),
('T003-White-Blue-1.jpg', 6),
('T003-White-Blue-2.jpg', 6),
('T003-White-Blue-3.jpg', 6),
('T003-Red-1.jpg', 7),
('T003-Red-2.jpg', 7),
('T003-Red-3.jpg', 7),
('T003-Floral-1.jpg', 8),
('T003-Floral-2.jpg', 8),
('T003-Floral-3.jpg', 8),
('T004-Brown-1.jpg', 9),
('T004-Brown-2.jpg', 9),
('T004-Brown-3.jpg', 9),
('T004-Brown-4.jpg', 9),
('T004-Patterned-1.jpg', 10),
('T004-Patterned-2.jpg', 10),
('T004-Patterned-3.jpg', 10),
('T004-Patterned-4.jpg', 10),
('T004-Green-1.jpg', 11),
('T004-Green-2.jpg', 11),
('T004-Green-3.jpg', 11),
('T004-Green-4.jpg', 11),
('T004-Floral-1.jpg', 12),
('T004-Floral-2.jpg', 12),
('T004-Floral-3.jpg', 12),
('T004-Floral-4.jpg', 12),
('T005-Black-1.jpg', 13),
('T005-Black-2.jpg', 13),
('T005-Black-3.jpg', 13),
('T005-Black-4.jpg', 13),
('T006-Red-1.jpg', 14),
('T006-Red-2.jpg', 14),
('T006-Red-3.jpg', 14),
('T006-Red-4.jpg', 14),
('T007-Black-1.jpg', 15),
('T007-Black-2.jpg', 15),
('T007-Black-3.jpg', 15),
('T007-Black-4.jpg', 15),
('T007-Beige-1.jpg', 16),
('T007-Beige-2.jpg', 16),
('T007-Beige-3.jpg', 16),
('T007-Beige-4.jpg', 16),
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
('T011-Brown-4.jpg', 20),
('T012-Black-1.jpg', 26),
('T012-Black-2.jpg', 26),
('T012-Black-3.jpg', 26),
('T012-Denim Blue-1.jpg', 27),
('T012-Denim Blue-2.jpg', 27),
('T012-Denim Blue-3.jpg', 27),
('T012-white-1.jpg', 25),
('T012-white-2.jpg', 25),
('T012-white-3.jpg', 25),
('T013-Grey-1.jpg', 29),
('T013-Grey-2.jpg', 29),
('T013-Grey-3.jpg', 29),
('T013-Light Denim Blue-1.jpg', 28),
('T013-Light Denim Blue-2.jpg', 28),
('T013-Light Denim Blue-3.jpg', 28),
('T014-Denim-Blue-1.jpg', 30),
('T014-Denim-Blue-2.jpg', 30),
('T014-Denim-Blue-3.jpg', 30),
('T015-Batik-Pattern-1.jpg', 32),
('T015-Batik-Pattern-2.jpg', 32),
('T015-Batik-Pattern-3.jpg', 32),
('T015-Batik-Pattern-792.jpg', 32),
('T015-Cream-1.jpg', 33),
('T015-Cream-2.jpg', 33),
('T015-Light-Blue-1.jpg', 31),
('T015-Light-Blue-2.jpg', 31),
('T015-Light-Blue-3.jpg', 31),
('T016-Black-1.jpg', 37),
('T016-Black-2.jpg', 37),
('T016-Black-3.jpg', 37),
('T016-Blue-1.jpg', 36),
('T016-Blue-2.jpg', 36),
('T016-Blue-3.jpg', 36),
('T016-Light-Blue-1.jpg', 35),
('T016-Light-Blue-2.jpg', 35),
('T016-Light-Blue-3.jpg', 35),
('T017-Pink-1.jpg', 38),
('T017-Pink-2.jpg', 38),
('T017-Pink-3.jpg', 38),
('T018-White-1.jpg', 40),
('T018-White-2.jpg', 40),
('T018-White-3.jpg', 40),
('T019-Black-1.jpg', 41),
('T019-Black-2.jpg', 41),
('T019-Black-3jpg', 41),
('T019-Greige-1.jpg', 46),
('T019-Greige-2.jpg', 46),
('T019-Greige-3.jpg', 46),
('T019-Grey-1.jpg', 44),
('T019-Grey-2.jpg', 44),
('T019-Grey-3.jpg', 44),
('T019-Multicolored-Stripes-1.jpg', 47),
('T019-Multicolored-Stripes-2.jpg', 47),
('T019-Multicolored-Stripes-3.jpg', 47),
('T019-Red-1.jpg', 43),
('T019-Red-2.jpg', 43),
('T019-Red-3.jpg', 43),
('T019-Red-Striped-1.jpg', 45),
('T019-Red-Striped-2.jpg', 45),
('T019-Red-Striped-3.jpg', 45),
('T019-White-1.jpg', 42),
('T019-White-2.jpg', 42),
('T019-White-3.jpg', 42),
('T019-White-4.jpg', 42),
('T020-Green-1.jpg', 48),
('T020-Green-2.jpg', 48),
('T020-Green-3.jpg', 48),
('T020-Green-4.jpg', 48),
('T020-White-1.jpg', 49),
('T020-White-2.jpg', 49),
('T020-White-3.jpg', 49),
('T020-White-4.jpg', 49),
('T020-Snake-Skin-1.jpg', 50),
('T020-Snake-Skin-2.jpg', 50),
('T020-Snake-Skin-3.jpg', 50),
('T021-BlackPink-Patterned-1.jpg', 51),
('T021-BlackPink-Patterned-2.jpg', 51),
('T021-BlackPink-Patterned-3.jpg', 51),
('T021-BlackPink-Patterned-4.jpg', 51),
('T022-Cream-1.jpg', 52),
('T022-Cream-2.jpg', 52),
('T022-Cream-3.jpg', 52),
('T022-Cream-4.jpg', 52),
('T022-Black-1.jpg', 52),
('T022-Black-2.jpg', 52),
('T022-Black-3.jpg', 52),
('T022-Black-4.jpg', 52),
('T023-Black-1.jpg', 56),
('T023-Black-2.jpg', 56),
('T023-Black-3.jpg', 56),
('T023-Khaki-1.jpg', 54),
('T023-Khaki-2.jpg', 54),
('T023-Khaki-3.jpg', 54),
('T023-White-Leopard-1.jpg', 57),
('T023-White-Leopard-2.jpg', 57),
('T023-White-Leopard-3.jpg', 57),
('T023-Yellow-1.jpg', 55),
('T023-Yellow-2.jpg', 55),
('T023-Yellow-3.jpg', 55),
('T024-Black-1.jpg', 58),
('T024-Black-2.jpg', 58),
('T024-Black-3.jpg', 58),
('T024-Checked-1.jpg', 60),
('T024-Checked-2.jpg', 60),
('T024-Floral-1.jpg', 59),
('T024-Floral-2.jpg', 59),
('T024-Floral-3.jpg', 59),
('T024-Red-1.jpg', 64),
('T024-Red-2.jpg', 64),
('T024-Red-3.jpg', 64),
('T024-Snake-Skin-1.jpg', 62),
('T024-Snake-Skin-2.jpg', 62),
('T024-Snake-Skin-3.jpg', 62),
('T024-White-1.jpg', 61),
('T024-Zebra-Printed-1.jpg', 63),
('T024-Zebra-Printed-2.jpg', 63),
('T024-Zebra-Printed-3.jpg', 63),
('T025-Black-1.jpg', 85),
('T025-Black-2.jpg', 85),
('T025-Black-3.jpg', 85),
('T025-Dusky-Pink-1.jpg', 82),
('T025-Dusky-Pink-2.jpg', 82),
('T025-Dusky-Pink-3.jpg', 82),
('T025-Khaki-1.jpg', 83),
('T025-Light-Blue-1.jpg', 88),
('T025-Light-Blue-2.jpg', 88),
('T025-Light-Blue-3.jpg', 88),
('T025-White-1.jpg', 84),
('T025-White-2.jpg', 84),
('T025-White-3.jpg', 84),
('T025-White-Black-1.jpg', 89),
('T025-White-Black-2.jpg', 89),
('T025-White-Black-3.jpg', 89),
('T025-White-Green-Striped-1.jpg', 87),
('T025-White-Green-Striped-2.jpg', 87),
('T025-White-Green-Striped-3.jpg', 87),
('T025-White-Yellow-Striped-1.jpg', 86),
('T025-White-Yellow-Striped-2.jpg', 86),
('T025-White-Yellow-Striped-3.jpg', 86),
('T026-Black-Marl-1.jpg', 90),
('T026-Black-Marl-2.jpg', 90),
('T026-Black-White-1.jpg', 93),
('T026-Black-White-2.jpg', 93),
('T026-Black-White-3.jpg', 93),
('T026-Brown-White-1.jpg', 94),
('T026-Brown-White-2.jpg', 94),
('T026-Brown-White-3.jpg', 94),
('T026-Brown-White-4.jpg', 94),
('T026-Floral-1.jpg', 92),
('T026-Floral-2.jpg', 92),
('T026-Floral-3.jpg', 92),
('T026-Green-Snakeskin-1.jpg', 91),
('T026-Green-Snakeskin-2.jpg', 91),
('T026-Green-Snakeskin-3.jpg', 91),
('T027-Black-1.jpg', 96),
('T027-Black-Twill-1.jpg', 99),
('T027-Black-Twill-2.jpg', 99),
('T027-Black-Twill-3.jpg', 99),
('T027-Black-White-1.jpg', 98),
('T027-Black-White-2.jpg', 98),
('T027-Black-White-3.jpg', 98),
('T027-Denim-Blue-1.jpg', 95),
('T027-Denim-Blue-2.jpg', 95),
('T027-Denim-Blue-3.jpg', 95),
('T027-Khaki-1.jpg', 97),
('T027-Khaki-2.jpg', 97),
('T027-Khaki-3.jpg', 97),
('T027-Old-Rose-1.jpg', 101),
('T027-Old-Rose-2.jpg', 101),
('T027-Pigeon-Blue-1.jpg', 100),
('T027-Pigeon-Blue-2.jpg', 100),
('T027-Pigeon-Blue-3.jpg', 100),
('T028-Denim-Blue-1.jpg', 102),
('T028-Denim-Blue-2.jpg', 102),
('T028-Denim-Blue-3.jpg', 102),
('T028-White-1.jpg', 103),
('T028-White-2.jpg', 103),
('T028-White-3.jpg', 103),
('T029-Black-1.jpg', 106),
('T029-Black-2.jpg', 106),
('T029-Black-3.jpg', 106),
('T029-Blue-1.jpg', 105),
('T029-Blue-2.jpg', 105),
('T029-Blue-3.jpg', 105),
('T029-Grey-1.jpg', 104),
('T029-Grey-2.jpg', 104),
('T029-Grey-3.jpg', 104),
('T029-Light-Blue-1.jpg', 107),
('T029-Light-Blue-2.jpg', 107),
('T029-Light-Blue-3.jpg', 107);

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

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id_item_colored`, `email_user`, `quantity`, `item_size`) VALUES
(3, 'andre@gmail.com', 1, 'L');

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
(5, 'Received'),
(6, 'Cancelled');

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
('2', 14, 1, 599900, 'M'),
('2', 15, 2, 399900, 'S'),
('2', 19, 1, 799900, 'M'),
('3', 6, 1, 149900, 'M'),
('3', 8, 1, 149900, 'S'),
('4', 5, 1, 149900, 'XL'),
('5', 21, 1, 499900, 'M'),
('6', 10, 1, 449900, 'L'),
('6', 11, 1, 449900, 'L'),
('6', 17, 1, 499900, 'M'),
('7', 12, 1, 449900, 'S'),
('7', 13, 1, 399900, 'S'),
('8', 14, 1, 599900, 'XL'),
('8', 19, 1, 799900, 'S'),
('9', 3, 1, 899900, 'S'),
('10', 12, 1, 449900, 'L'),
('11', 19, 1, 799900, 'S'),
('11', 106, 1, 249900, '34'),
('12', 107, 1, 249900, '32');

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
(2, 'linata@gmail.com', '6', '2019-10-17', 0),
(3, 'caca@gmail.com', '2', '2019-10-30', 10000),
(4, 'andre@gmail.com', '4', '2019-10-31', 10000),
(5, 'aldo@gmail.com', '5', '2019-09-20', 10000),
(6, 'billy@gmail.com', '6', '2019-09-01', 0),
(7, 'wahyudi@gmail.com', '2', '2019-11-03', 0),
(8, 'linata@gmail.com', '5', '2019-11-11', 0),
(9, 'andre@gmail.com', '5', '2019-11-06', 0),
(10, 'ariel@gmail.com', '6', '2019-11-03', 10000),
(11, 'andre@gmail.com', '1', '2019-11-26', 0),
(12, 'agus@gmail.com', '5', '2019-12-06', 10000);

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
  `item_size` varchar(10) NOT NULL
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
  ADD PRIMARY KEY (`id_item_colored`,`email_user`),
  ADD KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_colored`
--
ALTER TABLE `item_colored`
  MODIFY `id_item_colored` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
