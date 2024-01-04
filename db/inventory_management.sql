-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 04, 2024 at 05:40 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `First` varchar(255) DEFAULT NULL,
  `Middle` varchar(255) DEFAULT NULL,
  `Last` varchar(255) DEFAULT NULL,
  `ProductId` int(11) UNSIGNED NOT NULL,
  `NumberShipped` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `Title`, `First`, `Middle`, `Last`, `ProductId`, `NumberShipped`, `OrderDate`) VALUES
(1, '', 'Suzy', '', 'Customer', 3, 10, '2014-04-01'),
(2, '', 'Suzy', '', 'Customer', 3, 20, '2014-04-22'),
(3, '', 'Ben', '', 'Thomas', 1, 5, '2014-04-11'),
(4, '', 'Johnny', '', 'Test', 3, 10, '2014-04-02'),
(5, '', 'Steve', '', 'Smith', 1, 20, '2014-04-15'),
(6, '', 'Steve', '', 'Palmer', 3, 3, '2014-02-22'),
(7, '', 'Tim', '', 'Scott', 3, 5, '2014-03-22'),
(8, '', 'Dave', '', 'Boyd', 3, 10, '2014-01-22'),
(9, '', 'Suzy', '', 'Customer', 2, 30, '2014-01-21'),
(10, '', 'Dylan', '', 'Test', 3, 5, '2014-04-23'),
(11, '', 'Betty', '', 'Fryar', 3, 12, '2014-04-22'),
(12, '', 'Jerry', '', 'Sellers', 2, 124, '2014-04-22'),
(13, '', 'BOB', '', 'SMITH', 2, 500, '2014-05-11'),
(14, '', 'Suzy', '', 'Customer', 5, 5, '2015-04-07'),
(15, '', 'Suzy', '', 'Customer', 9, 50, '2015-04-07'),
(16, '', 'Suzy', '', 'Customer', 3, 1, '2015-04-07'),
(17, '', 'Suzy', '', 'Customer', 10, 5, '2015-09-09'),
(18, '', 'john', '', 'lemeasure', 10, 12, '2016-02-05'),
(19, '', 'Suzy', '', 'Customer', 9, 2, '2017-02-25'),
(20, '', '', '', '', 9, 1, '2017-01-15'),
(21, '', 'llkjh', '', 'kjlkh', 11, 250, '2017-02-15'),
(22, '', 'Suzy', '', 'Customer', 16, 14, '2017-04-05'),
(23, '', 'Suzy', '', 'Customer', 11, 50, '2017-06-05'),
(24, '', 'Suzy', '', 'Customer', 9, 200, '2017-06-05'),
(25, '', 'Test', '', 'Cowley', 14, 12, '2017-11-05'),
(26, '', 'Elvis', '', 'P', 17, 900, '2017-04-05'),
(27, '', 'Elvis', '', 'P', 18, 9000, '2017-06-05'),
(28, '', '', '', '', 4, 0, '2017-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `PartNumber` varchar(255) DEFAULT NULL,
  `ProductLabel` varchar(255) DEFAULT NULL,
  `StartingInventory` int(11) DEFAULT NULL,
  `InventoryReceived` int(11) DEFAULT NULL,
  `InventoryShipped` int(11) DEFAULT NULL,
  `InventoryOnHand` int(11) DEFAULT NULL,
  `MinimumRequired` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ProductName`, `PartNumber`, `ProductLabel`, `StartingInventory`, `InventoryReceived`, `InventoryShipped`, `InventoryOnHand`, `MinimumRequired`) VALUES
(1, 'Dell Server', 'XP 2000', 'Dell Server- XP 2000', 100007, 35, 25, 100017, 15),
(2, 'Google Chromebooks', '1', 'Google Chromebooks- 1.0', 100, 75, 654, -479, 20),
(3, 'Cisco Router', '10X', 'Cisco Router- 10X', 45, 143, 76, 86, 88),
(4, 'sadasd', '21', 'sadasd- 21', 25, 0, 0, 25, 10),
(5, 'Semih', '37', 'Semih- 37', 1, 12, 5, 8, 5),
(6, 'crazy horse router', '123DF5', 'crazy horse router- 123DF5', 5, 23, 0, 28, 1),
(7, 'Monitors', '', 'Monitors - 999', 0, 0, 0, 0, 0),
(8, 'TEST', '123', 'TEST- 123', 10, 0, 0, 10, 10),
(9, 'bob', 'bob-1', 'bob- bob-1', 500, 412, 267, 6450, 400),
(10, 'Multimeter', 'c345', 'Multimeter- c345', 3, 28, 29, 2, 4),
(11, 'dfgdf', '54334', 'dfgdf- 54334', 0, 0, 300, -300, 0),
(12, 'UniBox', '1', 'UniBox- 1', 200, 0, 0, 200, 300),
(13, 'Test 1', '123456', 'Test 1- 123456', 50, 1234, 0, 1284, 10),
(14, 'Toby', '57456', 'Toby- 57456', 567, 22, 12, 577, 56467),
(15, 'sdsad', 'sdsdsad', 'sdsad- sdsdsad', 12, 0, 0, 12, 12),
(16, 'test', '55555', 'test- 55555', 500, 12, 0, 512, 25),
(17, 'Firewalls', '362436', 'Firewalls- 362436', 5, 33, 900, -862, 10),
(18, 'Cables', '7734', 'Cables- 7734', 9, 475, 9000, 16, 100),
(19, 'Test', '1', 'Test- 001', 25, 0, 0, 25, 222);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) UNSIGNED NOT NULL,
  `SupplierId` int(11) UNSIGNED NOT NULL,
  `ProductId` int(11) UNSIGNED NOT NULL,
  `NumberReceived` int(11) NOT NULL,
  `PurchaseDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `SupplierId`, `ProductId`, `NumberReceived`, `PurchaseDate`) VALUES
(1, 2, 2, 50, '2014-11-02'),
(2, 2, 1, 15, '2014-09-02'),
(3, 3, 3, 10, '2014-11-12'),
(4, 2, 2, 25, '2014-01-02'),
(5, 2, 3, 20, '2014-02-22'),
(6, 1, 1, 5, '2015-11-02'),
(7, 3, 3, 3, '2014-01-02'),
(8, 1, 3, 20, '2015-11-11'),
(9, 2, 1, 0, '2014-11-02'),
(10, 1, 1, 5, '2016-11-02'),
(11, 2, 5, 12, '2016-11-02'),
(12, 2, 3, 90, '2016-11-02'),
(13, 1, 6, 23, '2016-08-02'),
(14, 2, 10, 25, '2017-11-02'),
(15, 2, 10, 3, '2017-11-02'),
(16, 1, 10, 0, '2017-01-02'),
(17, 1, 2, 0, '2017-02-22'),
(18, 2, 1, 10, '2017-03-02'),
(19, 2, 9, 12, '2017-03-03'),
(20, 2, 13, 1234, '2017-05-12'),
(21, 1, 12, 0, '2017-05-22'),
(22, 1, 13, 0, '2017-06-12'),
(23, 2, 3, 0, '2017-08-02'),
(24, 3, 9, 400, '2017-10-02'),
(25, 1, 14, 0, '2017-11-02'),
(26, 2, 16, 12, '2017-11-30'),
(27, 1, 3, 0, '2017-07-02'),
(28, 3, 17, 33, '2017-07-12'),
(29, 1, 18, 453, '2017-07-23'),
(30, 2, 18, 22, '2017-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) UNSIGNED NOT NULL,
  `supplier` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier`) VALUES
(1, 'ShockWave Tech'),
(2, 'CDW'),
(3, 'ACME Tech Supplies');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_fk` (`ProductId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_product_fk` (`ProductId`),
  ADD KEY `purchase_supplier_fk` (`SupplierId`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_product_fk` FOREIGN KEY (`ProductId`) REFERENCES `products` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchase_product_fk` FOREIGN KEY (`ProductId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `purchase_supplier_fk` FOREIGN KEY (`SupplierId`) REFERENCES `suppliers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
