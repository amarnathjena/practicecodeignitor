-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2015 at 06:53 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines_name`
--

CREATE TABLE IF NOT EXISTS `airlines_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airlines` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `airlines_name`
--

INSERT INTO `airlines_name` (`id`, `airlines`) VALUES
(1, 'airlines_1'),
(2, 'airlines_2');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` varchar(15) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `country_code` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_id`, `destination`, `country`, `country_code`) VALUES
(1, '1', 'Aruba', 'Aruba', 'AW'),
(2, '2', 'Jebel Dhanna', 'UNITED ARAB EMIRATES', 'AE'),
(3, '3', 'Malargue', 'Argentina', 'AR'),
(4, '4', 'Four Mile Beach ', 'Australia', 'AU'),
(5, '5', 'Arzl im Piztal', 'Austria', 'AT'),
(6, '6', 'Niemeyer ', 'Brazil', 'BR');

-- --------------------------------------------------------

--
-- Table structure for table `class_type`
--

CREATE TABLE IF NOT EXISTS `class_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `class_type`
--

INSERT INTO `class_type` (`id`, `class_type`) VALUES
(1, 'class_1'),
(2, 'class_2');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_cities`
--

CREATE TABLE IF NOT EXISTS `hotel_cities` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CityId` varchar(15) NOT NULL,
  `Destination` varchar(30) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `CoutryCode` varchar(15) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `hotel_cities`
--

INSERT INTO `hotel_cities` (`ID`, `CityId`, `Destination`, `Country`, `CoutryCode`) VALUES
(1, '1', 'Aruba', 'Aruba', 'AW'),
(2, '2', 'Jebel Dhanna', 'United Arab Emirates', 'AE'),
(3, '3', 'Malargue', 'Argentina', 'AR'),
(4, '4', 'Four Mile Beach ', 'Australia', 'AU'),
(5, '5', 'Roseberth', 'Australia', 'AU'),
(6, '6', 'Isisford', 'Australia', 'AU'),
(7, '7', 'Hawthorn', 'Australia', 'AU'),
(8, '8', 'Pilbara', 'Australia', 'AU'),
(9, '9', 'Hamilton', 'Australia', 'AU'),
(10, '10', 'Angaston', 'Australia', 'AU'),
(11, '11', 'Whitemark', 'Australia', 'AU'),
(12, '12', 'Arzl im Piztal', 'Austria', 'AT'),
(13, '13', 'Stegersbach', 'Austria', 'AT'),
(14, '14', 'Guggenthal', 'Austria', 'AT'),
(15, '15', 'Neustift im Stubaital', 'Austria', 'AT'),
(16, '16', 'Land of Waterloo', 'Belgium', 'BE'),
(17, '17', 'Stevoort', 'Belgium', 'BE'),
(18, '18', 'Sveti Vlas', 'Bulgaria', 'BG'),
(19, '19', 'Port Nelson', 'Bahamas', 'BS'),
(20, '20', 'Niemeyer', 'Brazil', 'BR'),
(21, '21', 'Pouso Alegre', 'Brazil', 'BR'),
(22, '22', 'Bastos', 'Brazil', 'BR'),
(23, '23', 'Dead Mans Flats', 'Canada', 'CA'),
(24, '24', 'Ashcroft', 'Canada', 'CA'),
(25, '25', 'Langley', 'Canada', 'CA'),
(26, '26', 'Trail', 'Canada', 'CA'),
(27, '27', 'Cartwright', 'Canada', 'CA'),
(28, '28', 'Port Williams', 'Canada', 'CA'),
(29, '29', 'Summerside', 'Canada', 'CA'),
(30, '30', 'La Tabatiere', 'Canada', 'CA'),
(31, '31', 'Sainte- Agathe-des-Monts', 'Canada', 'CA'),
(32, '32', 'Rosetown', 'Canada', 'CA'),
(33, '33', 'Martigny', 'Switzerland', 'CH'),
(34, '34', 'Burchen', 'Switzerland', 'CH'),
(35, '35', 'La Chaux-de-Fonds', 'Switzerland', 'CH'),
(36, '36', 'Schonried', 'Switzerland', 'CH'),
(37, '37', 'Faulensee', 'Switzerland', 'CH'),
(38, '38', 'Iquique', 'Chile', 'CL'),
(39, '39', 'Xiaoxintian', 'China', 'CN'),
(40, '40 ', 'Dongshi', 'China', 'CN'),
(41, '41', 'Hailar', 'China', 'CN'),
(42, '42', 'Lanyang', 'China', 'CN'),
(43, '43', 'Caucasia', 'Colombia', 'CO'),
(44, '44', 'San Jose area', 'Costa Rica', 'CR'),
(45, '45', 'Josefov Dul', 'Czech Republic', 'CZ'),
(46, '46', 'Bayreuth', 'Germany', 'DE'),
(47, '47', 'Kernen ', 'Germany', 'DE'),
(48, '48', 'Kinzig', 'Germany', 'DE'),
(49, '49', 'Kirchheim (Hesse) ', 'Germany', 'DE'),
(50, '50', 'Kirchheim by Munich ', 'Germany', 'DE'),
(51, '10391', 'Bangalore', 'India', 'IN'),
(52, '10409', 'Delhi', 'India', 'IN'),
(53, '10438', 'Mumbai', 'India', 'IN'),
(54, '37159', 'Bombay', 'India', 'IN'),
(55, '10427', 'Kochi area', 'India', 'IN'),
(56, '10428', 'Kozhikode area', 'India', 'IN'),
(57, '10652', 'Pune', 'India', 'IN'),
(58, '10693', 'Kolkata', 'India', 'IN');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, 'test first', 'testf', 'this is the testf'),
(2, 'test two', 'test tw', 'this is test two article'),
(3, 'test yahoo', 'test-yahoo', 'this is yahoo test article'),
(4, 'test yahoo', 'test-yahoo', 'this is yahoo test article');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE IF NOT EXISTS `product_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `product_name`, `price`, `discount`) VALUES
(1, 'laptop', '1000.00', 10),
(2, 'mobile', '100.00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE IF NOT EXISTS `purchase_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL,
  `tot_price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `user_id`, `username`, `product_id`, `product_name`, `qty`, `price`, `discount_price`, `tot_price`, `image_name`) VALUES
(2, 1, 'Gandalf', 1, 'laptop', 2, '2.00', '10.00', '2342.00', ''),
(5, 1, 'Gandalf', 2, 'mobile', 4, '21.00', '100.00', '1342.00', ''),
(6, 1, 'Gandalf', 1, 'laptop', 3, '4.00', '11.00', '2342.00', ''),
(8, 1, 'Gandalf', 1, 'laptop', 2, '1000.00', '10.00', '1800.00', ''),
(9, 1, 'Gandalf', 2, 'mobile', 1, '100.00', '10.00', '90.00', ''),
(10, 1, 'Gandalf', 2, 'mobile', 3, '100.00', '10.00', '270.00', ''),
(11, 1, 'Gandalf', 2, 'mobile', 3, '100.00', '10.00', '270.00', ''),
(12, 1, 'Gandalf', 2, 'mobile', 3, '100.00', '10.00', '270.00', ''),
(13, 1, 'Gandalf', 2, 'mobile', 3, '100.00', '10.00', '270.00', ''),
(14, 1, 'Gandalf', 1, 'laptop', 3, '0.00', '0.00', '0.00', 'Screenshot_from_2014-09-02_12:38:18.png'),
(15, 1, 'Gandalf', 1, 'laptop', 0, '5.00', '5.00', '5.00', 'slv_from_2014-09-10_13:12:19.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e6e061838856bf47e1de730719fb2609');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

