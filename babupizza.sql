-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 02:52 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babupizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'pizza@admin', '@pizza');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(15, 'Burger'),
(16, 'Meats'),
(19, 'Fries'),
(20, 'Drinks'),
(21, 'Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_phone` varchar(12) NOT NULL,
  `c_city` varchar(50) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_pincode` int(10) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `oder_name` varchar(50) NOT NULL,
  `order_type` varchar(50) NOT NULL,
  `order_cat` varchar(50) NOT NULL,
  `order_qty` int(50) NOT NULL,
  `order_total` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_type` int(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `p_desc` varchar(255) NOT NULL,
  `p_size` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `p_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `cat_id`, `p_name`, `p_type`, `p_price`, `p_desc`, `p_size`, `create_at`, `updated_at`, `p_image`) VALUES
(11, 19, 'Barbeque Chicken Wrap', 8, '149', 'Tender chicken lathered in Barbeque sauce and mint', 'Regular', '2019-11-30 12:56:48', '0000-00-00 00:00:00', 'img11.png'),
(12, 15, ' Rajma Masala Meal', 7, '149', 'Chunks of chicken cooked in reshmi masala and topped', 'Extra Large', '2019-11-30 12:54:49', '0000-00-00 00:00:00', 'p-img2.png'),
(13, 19, 'Chole Kulcha Meal', 8, '199', 'There are meatballs. And there are double cheese meatballs', 'Large', '2019-11-30 12:55:31', '0000-00-00 00:00:00', 'p-img8.png'),
(14, 19, 'Barbeque Chicken Wrap', 11, '99', 'There are meatballs. And there are double cheese meatballs', 'Large', '2019-11-30 12:56:04', '0000-00-00 00:00:00', 'p-img4.png');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slid_id` int(11) NOT NULL,
  `slide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slid_id`, `slide`) VALUES
(1, 'p-img1.png'),
(2, 'p-img2.png'),
(3, 'pz.png'),
(4, 'p-img8.png'),
(5, 'p-img8.png'),
(6, 'sld.png'),
(7, 'pz.png'),
(8, 'p-img6.png'),
(9, 'img11.png');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `s_id` int(11) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `cat_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`s_id`, `sub_category`, `cat_id`) VALUES
(1, 'Veg Pizza', 19),
(2, 'Tomatino pizza', 21),
(3, 'Sezwan Chinees', 20),
(4, 'Crispy', 15),
(5, 'Plain chees pizza', 21),
(6, 'Baby Corn Pizza', 21),
(7, 'Butter cheess Burger', 15),
(8, 'cheese Papad', 19),
(11, 'Allo Paratha', 19),
(12, 'Fried Rice', 19),
(13, 'Egg Fried Rice', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `p_type` (`p_type`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slid_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`p_type`) REFERENCES `subcategory` (`s_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
