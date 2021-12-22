-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 03:57 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercecp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(999) NOT NULL,
  `description` longtext NOT NULL,
  `top_menu` varchar(99) NOT NULL,
  `homepage_featured` varchar(99) NOT NULL,
  `sort` varchar(255) DEFAULT NULL,
  `status` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `top_menu`, `homepage_featured`, `sort`, `status`) VALUES
(6, 'Golden Jewellery', '', '1', '1', 'Popularity', '1'),
(7, 'Jewellery', '', '1', '1', 'Popularity', '1'),
(8, 'Silver Jewellery', '', '1', '1', 'Popularity', '0'),
(9, 'Diamond Jewelry', '', '1', '1', 'Popularity', '1'),
(10, 'Platinum Jewelry', '<p>This is the description of platinum category</p>', '1', '1', 'Newest First', '1');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `min_amt` varchar(255) NOT NULL,
  `max_amt` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `percent` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `type`, `category`, `min_amt`, `max_amt`, `amount`, `percent`, `code`, `status`) VALUES
(2, 'Testy', 'FLAT', 'All Categories', '100', '100000', '', '', 'test', '1');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(255) NOT NULL,
  `name` varchar(999) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `description`, `status`) VALUES
(2, 'Senco Gold', '', '1'),
(3, 'Bose', '', '1'),
(4, 'Sony', '', '1'),
(5, 'Organic', '', '1'),
(6, 'Cooking', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subcategory` varchar(999) NOT NULL,
  `category` varchar(999) NOT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `short_description` longtext NOT NULL,
  `description` longtext NOT NULL,
  `mrp` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `delivery_charge` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `commission` varchar(255) NOT NULL,
  `total_earning` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `available` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `attributes` longtext NOT NULL,
  `featured_photo` varchar(999) NOT NULL,
  `photos` longtext NOT NULL,
  `date` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `subcategory`, `category`, `manufacturer`, `short_description`, `description`, `mrp`, `selling_price`, `discount`, `gst`, `delivery_charge`, `product_price`, `commission`, `total_earning`, `stock`, `available`, `status`, `attributes`, `featured_photo`, `photos`, `date`) VALUES
(5, 'Senco Gold 22k (916) Yellow Gold Ring', 'Ring', 'Jewellery', 'Senco Gold', 'All gold and diamond jewellery from Senco Gold are BIS hallmarked for gold, certified for diamonds and have a 30 day return policy', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \"Amazon Ember\", Arial, sans-serif; font-size: 14px;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">This ring is made from 22k gold</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">This product is set in 22k gold certified by BIS hallmark</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">The item will be delivered to you in a tamperproof package. Please inspect the package for any tampering before accepting the delivery</span></li></ul>', '712480', '60380.00', '6%', '18', '300', '64380', '₹ NaN0', '₹ NaN', '10', 'on', 'on', '[{\"Weight\":\"10.53 Grams\"},{\"Country of Origin\":\"India\"}]', 'uploads/a.jpg', '[\"uploads/1.jpg\",\"uploads/2.jpg\"]', '2021-11-18'),
(6, 'Candere Jewellers Yellow Gold Ring for Women', 'Ring', 'Jewellery', 'Senco Gold', 'This ring is made of 18k (750) yellow gold\r\n', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">This ring is made of 18k (750) yellow gold</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">BIS hallmarked</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">The product is 16.5 mm in length and 16.5 mm in width</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">This product can be returned in 30 days</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">Buyback: Product have 90% buyback</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">Closure type is exactly what is shown in the picture</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">BIS Hallmark is NOT a separate certificate, it is an inscription made on the product</span></li></ul>', '16230', '11915', '27%', '18', '300', '14059', '₹ NaN', '₹ NaN', '10', 'on', 'on', '[{\"Weight\":\"2.12 Grams\"},{\"Country of Origin\":\"India\"}]', 'uploads/a.jpg', '[\"uploads/11.jpg\",\"uploads/3.jpg\"]', '2021-11-18'),
(7, 'Malabar Gold & Diamonds 18k (750) Yellow Gold and Diamond Ring for Women', 'Ring', 'Jewellery', 'Senco Gold', 'This ring is made of 18k (750) yellow gold\r\n', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">This ring is made of 18k (750) yellow gold</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">BIS hallmarked</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">Adorned with real diamond</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">The diamond is certified and has a IGI certificate</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">The product is 50 mm in length and 15.9 mm in width</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">This product can be returned in 30 days</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">Buyback: As per Malabar Gold and Diamonds store policy.</span></li></ul>', '37990', '35990', '5%', '18', '300', '42468', '₹ NaN', '₹ NaN', '10', 'on', 'on', '[{\"Weight\":\"2.06 Grams\"},{\"Country of Origin\":\"India\"}]', 'uploads/b.jpg', '[\"uploads/3.jpg\",\"uploads/4.jpg\"]', '2021-11-18'),
(8, 'Malabar Gold and Diamonds 22KT Yellow Gold Ring for Women', 'Ring', 'Jewellery', 'Senco Gold', 'Malabar Gold and Diamonds 22KT Yellow Gold Ring for Women', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">Malabar Gold and Diamonds 22KT Yellow Gold Ring for Women</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">This Ring is made from 22 KT yellow gold</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">BIS hallmarked</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">The product is 51.8 mm in length and 16.5 mm in width</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">The product comes with seller warranty</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">Product images shown are enhanced for illustration purpose, and actual product may vary</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"overflow-wrap: break-word; display: block;\">This is made to order jewellery and it usually requires 8-10 workings days for manufacturing</span></li></ul>', '33500', '32010', '4%', '18', '300', '37771', 'NaN', 'NaN', '10', 'on', 'on', '[{\"Weight\":\"3.06 Grams\"},{\"Country of Origin\":\"India\"}]', 'uploads/c.jpg', '[\"uploads/7.jpg\",\"uploads/6.jpg\",\"uploads/5.jpg\"]', '2021-11-18'),
(10, '	 Gold Ring 22Kt Purity from Diamond Collection', 'Headphones', 'Electronics', 'Bose', 'Soft touch headband for optimum comfort and weight distribution\r\n', '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \"Amazon Ember\", Arial, sans-serif; font-size: 14px;\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Soft touch headband for optimum comfort and weight distribution</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Closed circum-aural headphones</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Exclusive diaphragm technology offering amazing sound quality</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Mobile, light, comfortable and high isolation headphones</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Compatible with all smartphones</span></li></ul>', '14990', '12990', '13%', '18', '50', '153280', 'NaN0', 'NaN', '10', 'on', 'on', '[{\"Color\":\"Blue\"}]', 'uploads/d.jpg', '[\"uploads/10.jpg\",\"uploads/9.jpg\",\"uploads/8.jpg\"]', '2021-11-27'),
(11, 'Dimond and gold ring', 'Headphones', 'Electronics', 'Sony', 'Sony Noise Cancelling Headphones WHCH700N: Wireless Bluetooth Over the Ear Headset with Mic for phone-call and Alexa voice control - Blue', '<p><font color=\"#111111\" face=\"verdana, arial, helvetica, sans-serif\"><span style=\"font-size: 17px;\">Sony Noise Cancelling Headphones WHCH700N: Wireless Bluetooth Over the Ear Headset with Mic for phone-call and Alexa voice control - Blue</span></font><br></p>', '12999', '9999', '23%', '18', '300', '1179800', 'NaN00', 'NaN', '10', 'on', 'on', '[{\"Color\":\"Blue\"}]', 'uploads/e.jpg', '[\"uploads/a4.jpg\",\"uploads/a3.jpg\",\"uploads/a2.jpg\",\"uploads/a1.jpg\"]', '2021-11-27'),
(13, '	 Gold Rings 22 Karat - Floral Textured Finger Ring ', 'Honey', 'Cooking', 'Organic', 'Happilo 100% Natural Premium Californian Almonds,Dried,200g', '<p><span style=\"color: rgb(17, 17, 17); font-family: verdana, arial, helvetica, sans-serif; font-size: 17px;\">Happilo 100% Natural Premium Californian Almonds,Dried,200g</span><br></p>', '399', '349', '13%', '12', '0', '39000', 'NaN00', 'NaN', '10', 'on', 'on', '[]', 'uploads/g.jpg', '[\"uploads/l.jpg\",\"uploads/k.jpg\",\"uploads/c3.jpg\"]', '2021-11-27'),
(14, 'Diamond 18k Ring', 'Ring', 'Diamond Jewelry', 'Senco Gold', '18k Diamond ring', 'this is description', '5000', '4491', '10%', '5', '500', '4715', '0', '4715', '25', 'on', 'on', '[{\"weight\":\"5.0 gm \"}]', 'uploads/1638136114_dm3.jpg', '[\"uploads/1638136121_dm2.jpg\",\"uploads/1638136128_dm1.jpg\"]', '2021-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `category` varchar(255) NOT NULL,
  `attributes` longtext NOT NULL,
  `commision` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `description`, `category`, `attributes`, `commision`, `status`) VALUES
(13, 'Ring', '', 'Diamond Jewelry', 'Weight,Country of Origin', NULL, '1'),
(14, 'Necklaces', '', 'Golden Jewellery', 'Color', NULL, '1'),
(15, 'bracelet', '', 'Platinum Jewelry', '', NULL, '1'),
(16, 'chains', '', 'Golden Jewellery', '', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(999) NOT NULL,
  `name` varchar(999) NOT NULL,
  `password` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`) VALUES
(1, 'soumani', 'Soumani', '123456'),
(2, 'soumani', 'Soumani', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `proprietor_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(99) NOT NULL,
  `gst` varchar(99) NOT NULL,
  `license_no` varchar(99) NOT NULL,
  `description` longtext NOT NULL,
  `house` text NOT NULL,
  `area` text NOT NULL,
  `landmark` text NOT NULL,
  `city` text NOT NULL,
  `pin` varchar(99) NOT NULL,
  `state` varchar(99) NOT NULL,
  `username` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `login` varchar(99) NOT NULL,
  `status` varchar(99) NOT NULL,
  `photo` text NOT NULL,
  `reg_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
