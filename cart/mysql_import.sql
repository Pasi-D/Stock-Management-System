
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_code` (`product_code`)
) AUTO_INCREMENT=1 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `product_price`) VALUES
(1, 'PD1001', 'Shirt choice 1', 'Mens Casual shirt choice 1', 'cl1.jpg', 200.50),
(2, 'PD1002', 'Shirt choice 2', 'Mens Casual shirt choice 2', 'cl2.jpg', 500.85),
(3, 'PD1003', 'Shirt choice 3', 'Mens Casual shirt choice 3', 'cl3.jpg', 100.00),
(4, 'PD1004', 'Shirt choice 4', 'Mens Casual shirt choice 4', 'cl4.jpg', 400.30);
