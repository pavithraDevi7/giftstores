-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 03, 2020 at 02:20 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giftstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `crockery`
--

DROP TABLE IF EXISTS `crockery`;
CREATE TABLE IF NOT EXISTS `crockery` (
  `id` int(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `img` varchar(30) DEFAULT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crockery`
--

INSERT INTO `crockery` (`id`, `name`, `img`, `price`, `category`) VALUES
(81, 'kitten mug', 'screenshots/kittenmug.png', 150, 'crockery'),
(82, 'kuksa', 'screenshots/kuksa.png', 250, 'crockery'),
(83, '3D mug', 'screenshots/3dmug.png', 300, 'crockery'),
(85, 'wooden mug', 'screenshots/woodenmug.png', 350, 'crockery'),
(86, 'Flamingo', 'screenshots/flamingo.png', 300, 'crockery'),
(87, 'Dinnerware', 'screenshots/dinnerware.png', 700, 'crockery'),
(88, 'Casserole', 'screenshots/casserole.png', 999, 'crockery'),
(89, 'Glaze', 'screenshots/glaze.png', 1050, 'crockery'),
(90, 'Rubik Mug', 'screenshots/rubikmug.png', 399, 'crockery'),
(91, 'Pottery Mug', 'screenshots/potterymug.png', 300, 'crockery'),
(92, 'Minion mug', 'screenshots/minionmug.png', 450, 'crockery'),
(93, 'Bowl', 'screenshots/bowl.png', 500, 'crockery'),
(94, 'Dish set', 'screenshots/dishset.png', 699, 'crockery'),
(95, 'Asian Bowl', 'screenshots/asianbowl.png', 700, 'crockery'),
(96, 'Indigo Glaze','screenshots/indigoglaze.png', 1500, 'crockery'),
(97, 'Snack Plate', 'screenshots/snackplate.png', 400, 'crockery');

-- --------------------------------------------------------

--
-- Table structure for table `homedecor`
--

DROP TABLE IF EXISTS `homedecor`;
CREATE TABLE IF NOT EXISTS `homedecor` (
  `id` int(3) NOT NULL,
  `name` varchar(15) NOT NULL,
  `img` varchar(30) DEFAULT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homedecor`
--

INSERT INTO `homedecor` (`id`, `name`, `img`, `price`, `category`) VALUES
(1, 'Oval Lamp', 'screenshots/ovallamp.png', 999, 'homedecor'),
(2, 'KeyHolder', 'screenshots/keyholder.png', 699, 'homedecor'),
(3, 'Card', 'screenshots/cards.png', 699, 'homedecor'),
(4, 'Holder', 'screenshots/candleholder.png', 399, 'homedecor'),
(5, 'Flowers', 'screenshots/flower.png', 499, 'homedecor'),
(6, 'Bonsai', 'screenshots/bonsai.png', 899, 'homedecor'),
(7, 'Lamp', 'screenshots/lamp.png', 799, 'homedecor'),
(8, 'Cycle', 'screenshots/cycle.png', 1999, 'homedecor'),
(9, 'ShowPiece', 'screenshots/showpiece.png', 699, 'homedecor'),
(10, 'PortRait', 'screenshots/portrait.png', 599, 'homedecor'),
(11, 'Owl Holder', 'screenshots/owlholder.png', 999, 'homedecor'),
(12, 'DinnerSet', 'screenshots/dinnerset.png', 1499, 'homedecor'),
(13, 'BirdHouse', 'screenshots/birdhouse.png', 499, 'homedecor'),
(14, 'Night Lamp', 'screenshots/nightlamp.png', 399, 'homedecor'),
(15, 'PhotoFrame', 'screenshots/photoframe.png', 499, 'homedecor'),
(16, 'Frame', 'screenshots/frame.png', 699, 'homedecor');

-- --------------------------------------------------------

--
-- Table structure for table `jewellery`
--

DROP TABLE IF EXISTS `jewellery`;
CREATE TABLE IF NOT EXISTS `jewellery` (
  `id` int(3) NOT NULL,
  `name` varchar(40) NOT NULL,
  `img` varchar(40) DEFAULT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jewellery`
--

INSERT INTO `jewellery` (`id`, `name`, `img`, `price`, `category`) VALUES
(53, 'bracelet', 'screenshots/bracelet.png', 200, 'jewellery'),
(54, 'silver pearl earings', 'screenshots/silverpearlearing.png', 559, 'jewellery'),
(55, 'blue woolen earing', 'screenshots/bluewoolenearing.png', 59, 'jewellery'),
(56, 'peacock necklace', 'screenshots/peacocknecklace.png', 499, 'jewellery'),
(57, 'butterfly pendant', 'screenshots/butterflypendant.png', 399, 'jewellery'),
(58, 'nosering', 'screenshots/nosering.png', 99, 'jewellery'),
(59, 'golden bangles', 'screenshots/goldenbangles.png', 1099, 'jewellery'),
(60, 'gold plated bangles', 'screenshots/goldplatedbangles.png', 2099, 'jewellery'),
(61, 'infinity ring', 'screenshots/infinityring.png', 550, 'jewellery'),
(62, 'diamond earing', 'screenshots/diamondearring.png', 3050, 'jewellery'),
(63, 'Infinity earing', 'screenshots/infinityearring.png', 650, 'jewellery'),
(64, 'Pearl ring', 'screenshots/pearlring.png', 999, 'jewellery');

-- --------------------------------------------------------

--
-- Table structure for table `phonecasse`
--

DROP TABLE IF EXISTS `phonecasse`;
CREATE TABLE IF NOT EXISTS `phonecasse` (
  `id` int(3) NOT NULL,
  `name` varchar(15) NOT NULL,
  `img` varchar(15) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phonecasse`
--

INSERT INTO `phonecasse` (`id`, `name`, `img`, `price`, `category`) VALUES
(18, 'phonecase1', 'screenshots/phonecase.png', 499, 'phonecase'),
(19, 'Wooden', 'screenshots/wooden.png', 499, 'phonecase'),
(20, 'Marble ', 'screenshots/marble.png', 599, 'phonecase'),
(21, 'Black', 'screenshots/black.png', 299, 'phonecase'),
(22, 'Pink Case', 'screenshots/pink.png', 555, 'phonecase'),
(23, 'Captain', 'screenshots/captain.png', 599, 'phonecase');

-- --------------------------------------------------------

--
-- Table structure for table `product_kids`
--

DROP TABLE IF EXISTS `product_kids`;
CREATE TABLE IF NOT EXISTS `product_kids` (
  `id` int(3) NOT NULL,
  `name` varchar(15) NOT NULL,
  `img` varchar(15) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_kids`
--

INSERT INTO `product_kids` (`id`, `name`, `img`, `price`, `category`) VALUES
(24, 'kidstable', 'screenshots/kidstable.png', 2000, 'kids'),
(25, 'barbie', 'screenshots/barbie.png', 1500, 'kids'),
(26, 'doctorset', 'screenshots/doctorset.png', 1200, 'kids'),
(27, 'jwellarybox', 'screenshots/jwellarybox.png', 1800, 'kids'),
(28, 'fruit basket', 'screenshots/fruitbasket.png', 800, 'kids'),
(29, 'puzzle', 'screenshots/puzzle.png', 400, 'kids'),
(30, 'spinner', 'screenshots/spinner.png', 350, 'kids'),
(31, 'Toy Car', 'screenshots/toycar.png', 900, 'kids'),
(32, 'Animal Plate', 'screenshots/animalplate.png', 699, 'kids'),
(33, 'White Board', 'screenshots/whiteboard.png', 899, 'kids'),
(34, 'Key Chain', 'screenshots/keychain.png', 449, 'kids'),
(35, 'car', 'screenshots/car.png', 1999, 'kids');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`fname`, `lname`, `phone`, `email`, `username`, `password`) VALUES
('namrata', 'bomble', 1234567890, 'sgg@d.xuch', 'namrata', 'namrata'),
('sayali', 'pawar', 1234567890, 'sayali@gmail.com', 'sayali', 'sayali');

-- --------------------------------------------------------

--
-- Table structure for table `softtoys`
--

DROP TABLE IF EXISTS `softtoys`;
CREATE TABLE IF NOT EXISTS `softtoys` (
  `id` int(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `img` varchar(30) DEFAULT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `softtoys`
--

INSERT INTO `softtoys` (`id`, `name`, `img`, `price`, `category`) VALUES
(64, 'Turtle', 'screenshots/turtle.png', 459, 'softtoys'),
(65, 'Peach plush', 'screenshots/peachplush.png', 200, 'softtoys'),
(66, 'Rainbow cushion', 'screenshots/rainbowcushion.png', 349, 'softtoys'),
(67, 'Pokemon Toy', 'screenshots/pokemontoy.png', 450, 'softtoys'),
(68, 'Cookie plush', 'screenshots/cookietoy.png', 199, 'softtoys'),
(69, 'ladybird pillow', 'screenshots/ladybirdpillow.png', 449, 'softtoys'),
(70, 'Fluffy Cat', 'screenshots/cat.png', 699, 'softtoys'),
(71, 'Dog', 'screenshots/dog.png', 350, 'softtoys'),
(72, 'Elephant Toy','screenshots/elephant.png', 400, 'softtoys'),
(73, 'Red Dragon', 'screenshots/reddragon.png', 250, 'softtoys'),
(74, 'Veggies set', 'screenshots/veggiesset.png', 499, 'softtoys'),
(75, 'Baby sheep', 'screenshots/babysheep.png', 300, 'softtoys'),
(76, 'crocodile toy', 'screenshots/crocodile.png', 250, 'softtoys'),
(77, 'AngryBird', 'screenshots/angrybird.png', 99, 'softtoys'),
(78, 'Keyring', 'screenshots/keyring.png', 109, 'softtoys'),
(80, 'Fox Toy', 'screenshots/fox.png', 89, 'softtoys');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

DROP TABLE IF EXISTS `wallet`;
CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `img` varchar(30) DEFAULT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `name`, `img`, `price`, `category`) VALUES
(98, 'Leather wallet', 'screenshots/leatherwallet.png', 800, 'wallet'),
(99, 'Clutch wallet', 'screenshots/wallet2.png', 600, 'wallet'),
(100, 'Reebok wallet', 'screenshots/wallet3.png', 1200, 'wallet'),
(101, 'Continental wallet', 'screenshots/wallet3.png', 2099, 'wallet'),
(102, 'Bonia wallet', 'screenshots/wallet4.png', 900, 'wallet'),
(103, 'Pallas wallet', 'screenshots/wallet5.png', 750, 'wallet'),
(104, 'Brahmin wallet', 'screenshots/wallet6.png', 500, 'wallet'),
(105, 'Coach wallet', 'screenshots/wallet7.png', 100, 'wallet'),
(106, 'calvin klein', 'screenshots/wallet8.png', 2500, 'wallet'),
(107, 'Monogram wallet', 'screenshots/wallet9.png', 850, 'wallet'),
(108, 'Checks wallet', 'screenshots/wallet10.png', 900, 'wallet'),
(109, 'Louis vuitton', 'screenshots/wallet11.png', 1200, 'wallet'),
(110, 'Red handbag', 'screenshots/redhandbag.png', 600, 'wallet'),
(111, 'Vegan wallet', 'screenshots/wallet12.png', 400, 'wallet'),
(112, 'Leather handbag', 'screenshots/leatherhandbag.png', 550, 'wallet'),
(113, 'Coin purse', 'screenshots/wallet13.png', 100, 'wallet');

-- --------------------------------------------------------

--
-- Table structure for table `watch`
--

DROP TABLE IF EXISTS `watch`;
CREATE TABLE IF NOT EXISTS `watch` (
  `id` int(3) NOT NULL,
  `name` varchar(15) NOT NULL,
  `img` varchar(15) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watch`
--

INSERT INTO `watch` (`id`, `name`, `img`, `price`, `category`) VALUES
(36, 'Watch1', 'screenshots/watch1.png', 10500, 'watches'),
(37, 'watch2', 'screenshots/watch2.png', 8000, 'watches'),
(38, 'Watch3', 'screenshots/watch3.png', 1499, 'watches'),
(39, 'Watch  4', 'screenshots/watch4.png', 1999, 'watches'),
(40, 'Watch 5', 'screenshots/watch5.png', 2499, 'watches'),
(41, 'Watch 6', 'screenshots/watch6.png', 1299, 'watches'),
(42, 'Watch 7', 'screenshots/watch7.png', 6999, 'watches'),
(43, 'Watch 8', 'screenshots/watch8.png', 999, 'watches'),
(44, 'Watch 9', 'screenshots/watch9.png', 2999, 'watches'),
(45, 'Watch 10', 'screenshots/watch10.png', 3599, 'watches'),
(46, 'Watch 11', 'screenshots/watch11.png', 899, 'watches'),
(47, 'Watch 12', 'screenshots/watch12.png', 1899, 'watches'),
(48, 'Watch 13', 'screenshots/watch13.png', 1299, 'watches'),
(49, 'Watch 14', 'screenshots/watch14.png', 1399, 'watches'),
(50, 'Watch 15', 'screenshots/watch15.png', 1649, 'watches'),
(51, 'Watch 16', 'screenshots/watch16.png, 1700, 'watches');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;









------------------------------------------------------------------------------------------------------------------------------------------------------








-- Complete Fixed Database for GiftStore (All images in screenshots/)
DROP DATABASE IF EXISTS `giftstore`;
CREATE DATABASE `giftstore`;
USE `giftstore`;

-- WATCH (category4.php) - Fixed structure + data
DROP TABLE IF EXISTS `watch`;
CREATE TABLE `watch` (
  `id` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `img` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `watch` VALUES
(36, 'Watch1', 'screenshots/watch1.png', 10500, 'watches'),
(37, 'watch2', 'screenshots/watch2.png', 8000, 'watches'),
(38, 'Watch3', 'screenshots/watch3.png', 1499, 'watches'),
(39, 'Watch 4', 'screenshots/watch4.png', 1999, 'watches'),
(40, 'Watch 5', 'screenshots/watch5.png', 2499, 'watches'),
(41, 'Watch 6', 'screenshots/watch6.png', 1299, 'watches'),
(42, 'Watch 7', 'screenshots/watch7.png', 6999, 'watches'),
(43, 'Watch 8', 'screenshots/watch8.png', 999, 'watches'),
(44, 'Watch 9', 'screenshots/watch9.png', 2999, 'watches'),
(45, 'Watch 10', 'screenshots/watch10.png', 3599, 'watches'),
(46, 'Watch 11', 'screenshots/watch11.png', 899, 'watches'),
(47, 'Watch 12', 'screenshots/watch12.png', 1899, 'watches'),
(48, 'Watch 13', 'screenshots/watch13.png', 1299, 'watches'),
(49, 'Watch 14', 'screenshots/watch14.png', 1399, 'watches'),
(50, 'Watch 15', 'screenshots/watch15.png', 1649, 'watches'),
(51, 'Watch 16', 'screenshots/watch16.png', 1700, 'watches');

-- PHONE CASE (category2.php) - Fixed img length
DROP TABLE IF EXISTS `phonecasse`;
CREATE TABLE `phonecasse` (
  `id` int(3) NOT NULL,
  `name` varchar(15) NOT NULL,
  `img` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `phonecasse` VALUES
(18, 'phonecase1', 'screenshots/phonecase1.png', 499, 'phonecase'),
(19, 'Wooden', 'screenshots/wooden.png', 499, 'phonecase'),
(20, 'Marble', 'screenshots/marble.png', 599, 'phonecase'),
(21, 'Black', 'screenshots/black.png', 299, 'phonecase'),
(22, 'Pink Case', 'screenshots/pink.png', 555, 'phonecase'),
(23, 'Captain', 'screenshots/captain.png', 599, 'phonecase');

-- KIDS (category1.php) - Fixed img length
DROP TABLE IF EXISTS `product_kids`;
CREATE TABLE `product_kids` (
  `id` int(3) NOT NULL,
  `name` varchar(15) NOT NULL,
  `img` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `product_kids` VALUES
(24, 'kidstable', 'screenshots/kidstable.png', 2000, 'kids'),
(25, 'barbie', 'screenshots/barbie.png', 1500, 'kids'),
(26, 'doctorset', 'screenshots/doctorset.png', 1200, 'kids'),
(27, 'jwellarybox', 'screenshots/jwellarybox.png', 1800, 'kids'),
(28, 'fruit basket', 'screenshots/fruitbasket.jpg', 800, 'kids'),
(29, 'puzzle', 'screenshots/puzzle.png', 400, 'kids'),
(30, 'spinner', 'screenshots/spinner.png', 350, 'kids'),
(31, 'Toy Car', 'screenshots/toycar.png', 900, 'kids'),
(32, 'Animal Plate', 'screenshots/animalplate.png', 699, 'kids'),
(33, 'White Board', 'screenshots/whiteboard.png', 899, 'kids'),
(34, 'Key Chain', 'screenshots/keychain.png', 449, 'kids'),
(35, 'car', 'screenshots/car.png', 1999, 'kids');

-- HOMDECOR (category3.php)
DROP TABLE IF EXISTS `homedecor`;
CREATE TABLE `homedecor` (
  `id` int(3) NOT NULL,
  `name` varchar(15) NOT NULL,
  `img` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `homedecor` VALUES
(1, 'Oval Lamp', 'screenshots/ovallamp.png', 999, 'homedecor'),
(2, 'KeyHolder', 'screenshots/keyholder.png', 699, 'homedecor'),
(3, 'Card', 'screenshots/card.png', 699, 'homedecor'),
(4, 'Holder', 'screenshots/holder.png', 399, 'homedecor'),
(5, 'Flowers', 'screenshots/flowers.png', 499, 'homedecor'),
(6, 'Bonsai', 'screenshots/bonsai.png', 899, 'homedecor'),
(7, 'Lamp', 'screenshots/lamp.png', 799, 'homedecor'),
(8, 'Cycle', 'screenshots/cycle.png', 1999, 'homedecor'),
(9, 'ShowPiece', 'screenshots/showpiece.png', 699, 'homedecor'),
(10, 'PortRait', 'screenshots/portrait.png', 599, 'homedecor'),
(11, 'Owl Holder', 'screenshots/owlholder.png', 999, 'homedecor'),
(12, 'DinnerSet', 'screenshots/dinnerset.png', 1499, 'homedecor'),
(13, 'BirdHouse', 'screenshots/birdhouse.png', 499, 'homedecor'),
(14, 'Night Lamp', 'screenshots/nightlamp.png', 399, 'homedecor'),
(15, 'PhotoFrame', 'screenshots/photoframe.png', 499, 'homedecor'),
(16, 'Frame', 'screenshots/frame.png', 699, 'homedecor');

-- JEWELLERY (category5.php) - Fixed empty path
DROP TABLE IF EXISTS `jewellery`;
CREATE TABLE `jewellery` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `jewellery` VALUES
(53, 'bracelet', 'screenshots/bracelet.png', 200, 'jewellery'),
(54, 'silver pearl earings', 'screenshots/silverpearlearing.png', 559, 'jewellery'),
(55, 'blue woolen earing', 'screenshots/bluewoolenearing.png', 59, 'jewellery'),
(56, 'peacock necklace', 'screenshots/peacocknecklace.png', 499, 'jewellery'),
(57, 'butterfly pendant', 'screenshots/butterflypendant.png', 399, 'jewellery'),
(58, 'nosering', 'screenshots/nosering.png', 99, 'jewellery'),
(59, 'golden bangles', 'screenshots/goldenbangles.png', 1099, 'jewellery'),
(60, 'gold plated bangles', 'screenshots/goldplatedbangles.png', 2099, 'jewellery'),
(61, 'infinity ring', 'screenshots/infinityring.png', 550, 'jewellery'),
(62, 'diamond earing', 'screenshots/diamondearing.png', 3050, 'jewellery'),
(63, 'Infinity earing', 'screenshots/11.jpg', 650, 'jewellery'),
(64, 'Pearl ring', 'screenshots/pearlring.png', 999, 'jewellery');

-- SOFT TOYS (category6.php) - Fixed missing quote
DROP TABLE IF EXISTS `softtoys`;
CREATE TABLE `softtoys` (
  `id` int(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `img` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `softtoys` VALUES
(64, 'Turtle', 'screenshots/turtle.png', 459, 'softtoys'),
(65, 'Peach plush', 'screenshots/peachplush.png', 200, 'softtoys'),
(66, 'Rainbow cushion', 'screenshots/rainbowcushion.png', 349, 'softtoys'),
(67, 'Pokemon Toy', 'screenshots/pokemontoy.png', 450, 'softtoys'),
(68, 'Cookie plush', 'screenshots/cookieplush.png', 199, 'softtoys'),
(69, 'ladybird pillow', 'screenshots/ladybirdpillow.png', 449, 'softtoys'),
(70, 'Fluffy Cat', 'screenshots/cat.png', 699, 'softtoys'),
(71, 'Dog', 'screenshots/dog.png', 350, 'softtoys'),
(72, 'Elephant Toy', 'screenshots/elephant.png', 400, 'softtoys'),
(73, 'Red Dragon', 'screenshots/reddragon.png', 250, 'softtoys'),
(74, 'Veggies set', 'screenshots/veggiesset.png', 499, 'softtoys'),
(75, 'Baby sheep', 'screenshots/babysheep.png', 300, 'softtoys'),
(76, 'crocodile toy', 'screenshots/crocodile.png', 250, 'softtoys'),
(77, 'AngryBird', 'screenshots/angrybird.png', 99, 'softtoys'),
(78, 'Keyring', 'screenshots/keyring.png', 109, 'softtoys'),
(80, 'Fox Toy', 'screenshots/fox.png', 89, 'softtoys');

-- CROCKERY (category7.php)
DROP TABLE IF EXISTS `crockery`;
CREATE TABLE `crockery` (
  `id` int(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `img` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `crockery` VALUES
(81, 'kitten mug', 'screenshots/kittenmug.png', 150, 'crockery'),
(82, 'kuksa', 'screenshots/kuksa.png', 250, 'crockery'),
(83, '3D mug', 'screenshots/3dmug.png', 300, 'crockery'),
(85, 'wooden mug', 'screenshots/woodenmug.png', 350, 'crockery'),
(86, 'Flamingo', 'screenshots/flamingo.png', 300, 'crockery'),
(87, 'Dinnerware', 'screenshots/dinnerware.png', 700, 'crockery'),
(88, 'Casserole', 'screenshots/casserole.png', 999, 'crockery'),
(89, 'Glaze', 'screenshots/glaze.png', 1050, 'crockery'),
(90, 'Rubik Mug', 'screenshots/rubikmug.png', 399, 'crockery'),
(91, 'Pottery Mug', 'screenshots/pottermug.png', 300, 'crockery'),
(92, 'Minion mug', 'screenshots/minionmug.png', 450, 'crockery'),
(93, 'Bowl', 'screenshots/bowl.png', 500, 'crockery'),
(94, 'Dish set', 'screenshots/dishset.png', 699, 'crockery'),
(95, 'Asian Bowl', 'screenshots/asianbowl.png', 700, 'crockery'),
(96, 'Indigo Glaze', 'screenshots/indigoglaze.png', 1500, 'crockery'),
(97, 'Snack Plate', 'screenshots/snackplate.png', 400, 'crockery');

-- WALLET (category8.php)
DROP TABLE IF EXISTS `wallet`;
CREATE TABLE `wallet` (
  `id` int(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `img` varchar(30) NOT NULL,
  `price` int(5) NOT NULL,
  `category` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `wallet` VALUES
(98, 'Leather wallet', 'screenshots/leatherwallet.png', 800, 'wallet'),
(99, 'Clutch wallet', 'screenshots/wallet2.png', 600, 'wallet'),
(100, 'Reebok wallet', 'screenshots/wallet3.png', 1200, 'wallet'),
(101, 'Continental wallet', 'screenshots/wallet3.png', 2099, 'wallet'),
(102, 'Bonia wallet', 'screenshots/wallet4.png', 900, 'wallet'),
(103, 'Pallas wallet', 'screenshots/wallet5.png', 750, 'wallet'),
(104, 'Brahmin wallet', 'screenshots/wallet6.png', 500, 'wallet'),
(105, 'Coach wallet', 'screenshots/wallet7.png', 100, 'wallet'),
(106, 'calvin klein', 'screenshots/wallet8.png', 2500, 'wallet'),
(107, 'Monogram wallet', 'screenshots/wallet9.png', 850, 'wallet'),
(108, 'Checks wallet', 'screenshots/wallet10.png', 900, 'wallet'),
(109, 'Louis vuitton', 'screenshots/wallet11.png', 1200, 'wallet'),
(110, 'Red handbag', 'screenshots/redhandbag.jpg', 600, 'wallet'),
(111, 'Vegan wallet', 'screenshots/wallet12.png', 400, 'wallet'),
(112, 'Leather handbag', 'screenshots/leatherhandbag.jpg', 550, 'wallet'),
(113, 'Coin purse', 'screenshots/wallet13.png', 100, 'wallet');

-- SIGNUP
DROP TABLE IF EXISTS `signup`;
CREATE TABLE `signup` (
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `signup` VALUES
('namrata', 'bomble', 1234567890, 'sgg@d.xuch', 'namrata', 'namrata'),
('sayali', 'pawar', 1234567890, 'sayali@gmail.com', 'sayali', 'sayali');
