-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 12:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydbweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `buyer_id`, `total_price`, `state`) VALUES
(1, 20, 820, -1),
(8, 21, 773400, -1),
(9, 21, 1400, -1),
(10, 20, 0, 5),
(12, 21, 200, 6),
(13, 21, 270055, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forsell`
--

CREATE TABLE `forsell` (
  `count` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `Items_id` int(11) NOT NULL,
  `Cart_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `AddDate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `forsell`
--

INSERT INTO `forsell` (`count`, `store_id`, `Items_id`, `Cart_id`, `state`, `AddDate`) VALUES
(3, 1, 1, 1, -1, '2024-05-06_21-15-26'),
(7, 1, 1, 8, -1, '2024-05-15_16-25-35'),
(7, 1, 1, 9, -1, '2024-05-16_13-12-08'),
(5, 1, 1, 10, 5, '2024-05-16_13-13-22'),
(1, 1, 1, 12, 6, '2024-05-17_20-13-28'),
(4, 2, 2, 1, -1, '2024-05-06_21-07-38'),
(1, 1, 2, 13, 2, '2024-05-17_20-34-20'),
(4, 1, 3, 8, -1, '2024-05-15_16-25-41'),
(2, 1, 4, 8, -1, '2024-05-15_16-25-50'),
(1, 1, 5, 8, -1, '2024-05-15_16-25-59'),
(1, 1, 6, 13, 1, '2024-05-17_20-34-32');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `state` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `image` varchar(45) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `description`, `price`, `state`, `count`, `image`, `User_id`, `Store_id`) VALUES
(1, 'ball', 200, -1, 0, 'public/img/image_2024-05-06_20-44-29.jpeg', 3, 1),
(2, 'watch', 55, 1, 7, 'public/img/image_2024-05-07_11-38-37.jpeg', 4, 1),
(3, 'screen led', 500, 1, 5, 'public/img/image_2024-05-06_20-44-29.jpeg', 3, 1),
(4, 'car', 250000, -1, 0, 'public/img/image_2024-05-06_19-38-23.jpeg', 4, 1),
(5, 'car PMW', 270000, 1, 1, 'public/img/image_2024-05-06_20-44-29.jpeg', 4, 1),
(6, 'car PMW', 270000, 1, 3, 'public/img/image_2024-05-07_11-40-07.jpeg', 4, 1),
(7, 'car PMW', 270000, 1, 5, 'public/img/image_2024-05-07_11-40-53.jpeg', 4, 1),
(8, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-07-38.jpeg', 4, 1),
(9, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-10-27.jpeg', 4, 1),
(10, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-15-26.jpeg', 4, 1),
(11, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-26-22.jpeg', 4, 1),
(12, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-27-38.jpeg', 4, 1),
(13, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-28-17.jpeg', 4, 1),
(14, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-29-23.jpeg', 4, 1),
(15, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-29-40.jpeg', 4, 1),
(16, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-30-29.jpeg', 4, 1),
(17, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-30-46.jpeg', 4, 1),
(18, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-30-59.jpeg', 4, 2),
(19, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-31-44.jpeg', 4, 1),
(20, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-33-00.jpeg', 4, 1),
(21, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-36-10.jpeg', 4, 1),
(22, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-36-36.jpeg', 4, 1),
(23, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-37-07.jpeg', 4, 1),
(24, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-37-57.jpeg', 4, 1),
(25, 'car PMW', 270000, 1, 2, 'public/img/image_2024-05-06_21-38-54.jpeg', 4, 1),
(26, 'car PMW', 270000, 0, 2, 'public/img/image_2024-05-06_21-39-08.jpeg', 4, 1),
(27, 'car PMW', 270000, 0, 2, 'public/img/image_2024-05-06_21-39-52.jpeg', 4, 1),
(28, 'car PMW', 270000, 0, 2, 'public/img/image_2024-05-06_21-40-10.jpeg', 4, 1),
(29, 'car PMW', 270000, 0, 2, 'public/img/image_2024-05-06_21-41-07.jpeg', 4, 1),
(30, 'audi', 300000, 0, 33, 'public/img/image_2024-05-06_21-50-34.jpeg', 4, 1),
(31, 'pmw m5', 320000, 0, 1, 'public/img/image_2024-05-07_08-10-01.jpeg', 4, 1),
(32, 'car PMW m3', 320000, 0, 2, 'public/img/image_2024-05-07_08-13-10.jpeg', 4, 1),
(33, 'car PMW m3', 320000, 0, 2, 'public/img/image_2024-05-07_08-13-28.jpeg', 4, 1),
(34, 'car PMW m3', 320000, 0, 2, 'public/img/image_2024-05-07_08-18-33.jpeg', 4, 1),
(35, 'car PMW m3', 320000, 0, 2, 'public/img/image_2024-05-07_08-20-28.jpeg', 4, 1),
(36, 'car PMW m3', 320000, 0, 2, 'public/img/image_2024-05-07_08-24-17.jpeg', 4, 1),
(37, 'car PMW m3', 320000, 0, 2, 'public/img/image_2024-05-07_08-24-25.jpeg', 4, 1),
(38, 'car PMW m4', 230000, 0, 3, 'public/img/image_2024-05-07_08-25-17.jpeg', 4, 1),
(39, 'car PMW m4', 230000, 0, 3, 'public/img/image_2024-05-07_08-27-18.jpeg', 4, 1),
(40, 'car PMW m3', 3333, 0, 2, 'public/img/image_2024-05-07_08-27-38.jpeg', 4, 1),
(41, 'car PMW m3', 3333, 0, 2, 'public/img/image_2024-05-07_08-29-05.jpeg', 4, 1),
(42, 'Kia', 25000, 0, 1, 'public/img/image_2024-05-07_15-55-37.jpeg', 4, 1),
(43, 'Kia', 25000, 0, 1, 'public/img/image_2024-05-07_15-58-53.jpeg', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `delivary_user_id` int(11) DEFAULT NULL,
  `Cart_id` int(11) NOT NULL,
  `buyer_address` varchar(100) DEFAULT NULL,
  `buyer_number` double DEFAULT NULL,
  `Buyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `state`, `price`, `delivary_user_id`, `Cart_id`, `buyer_address`, `buyer_number`, `Buyer_id`) VALUES
(1, -1, 820, 14, 1, 'egegergggeargaergreag', 2131312313, 20),
(4, -1, 773400, 14, 8, 'damas', 123456789, 21),
(5, -1, 1400, 14, 9, 'damasewew', 12222123, 21),
(6, 5, 0, NULL, 10, 'damastttt', 324234, 20),
(8, 6, 200, 14, 12, 'rgergerg', 45345, 21),
(9, 1, 270055, NULL, 13, 'hhh', 3423423, 21);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `perm` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `perm`) VALUES
(1, 'deleteUser'),
(2, 'updateUser'),
(3, 'prepareTodeleteUser'),
(4, 'adduser'),
(5, 'itemsList'),
(6, 'addstore'),
(7, 'StoreList'),
(8, 'updatestore'),
(9, 'perpareTodeleteStore'),
(10, 'deleteStore'),
(11, 'ordersList'),
(12, 'cartList'),
(13, 'SellersReceivablesList'),
(14, 'StoreListSeller'),
(15, 'PrepareToAddItem'),
(16, 'AddItem'),
(17, 'itemsListSeller'),
(18, 'prepareToDeleteItem'),
(19, 'deleteItem'),
(20, 'prepareToUpdateItem'),
(21, 'updateItem'),
(22, 'SellerReceivablesList'),
(23, 'GetStore'),
(24, 'itemsListWorker'),
(25, 'AcceptItem'),
(26, 'PrepareItemsList'),
(27, 'PrepareItem'),
(28, 'RemoveItemFromCart'),
(29, 'OrderToDeliverList'),
(30, 'AcceptOrder'),
(31, 'MyOrderList'),
(32, 'deliveredMoney'),
(33, 'Idelivered'),
(34, 'itemsListbuyer'),
(35, 'BuyerOrderList'),
(36, 'CreateCart'),
(37, 'DeleteCart'),
(38, 'EditCart'),
(39, 'addProductToCart'),
(40, 'RemoveProductFromCart'),
(41, 'CreateOrder'),
(42, 'orderContains'),
(43, 'orderDetails');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `roleName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `roleName`) VALUES
(1, 'Admin'),
(2, 'Seller'),
(3, 'Buyer'),
(4, 'StoreWorker'),
(5, 'DelivaryWorker');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `Role_id` int(11) NOT NULL,
  `Permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`Role_id`, `Permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(3, 41),
(3, 42),
(3, 43),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(5, 12),
(5, 29),
(5, 30),
(5, 31),
(5, 32),
(5, 33);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `address` varchar(45) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `address`, `User_id`) VALUES
(1, 'Damas', 15),
(2, 'apartment 11', 16);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `midlname` varchar(45) NOT NULL,
  `phonenumber` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `hashedPasswd` varchar(45) NOT NULL,
  `Role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `midlname`, `phonenumber`, `gender`, `hashedPasswd`, `Role_id`) VALUES
(1, 'ayman', 'aa', 'aa@ss.com', 'dd', '3434234', 'Female', 'c20ad4d76fe97759aa27a0c99bff6710', 1),
(3, 'wwwww', 'eeeee', 'grg@df.com', 'rrrrrrr', '546245634', 'Male', '202cb962ac59075b964b07152d234b70', 2),
(4, 'ali', 'ali', 'ayman@gmail.com', 'reg', '3423423', 'Male', '202cb962ac59075b964b07152d234b70', 2),
(5, 'adel', 'ha', 'aymanhh@ss.com', 'ahmad', '995623', 'Male', '202cb962ac59075b964b07152d234b70', 2),
(6, 'tes', 'ts', 'rtgergg@gtg.com', 'ggg', '564554645', 'Male', '202cb962ac59075b964b07152d234b70', 2),
(7, 'tes', 'ts', 'aymatrrrrrryh@n.com', 'ggg', '0564554645', 'Male', '202cb962ac59075b964b07152d234b70', 2),
(8, 'adel', 'ha', 'ayman7j6j777jthh@fg.com', 'ahmad', '995623', 'Male', '202cb962ac59075b964b07152d234b70', 2),
(9, 'ayman', 'maroff', 'aymaer@aefef.com', 'aa', '0992720466', 'Male', '202cb962ac59075b964b07152d234b70', 2),
(10, 'ayman', 'maroff', 'aymanhhhhhh@fff.com', 'aa', '0992720466', 'Male', '202cb962ac59075b964b07152d234b70', 2),
(11, 'adel', 'ha', 'aymanww@egwg.com', 'ahmad', '995623', 'Male', '202cb962ac59075b964b07152d234b70', 2),
(12, 'ayman', 'maroff', 'aymangggg@sff.com', 'aa', '0992720466', 'Male', '202cb962ac59075b964b07152d234b70', 2),
(14, 'hh', 'hh', 'hhhhhh@hh.com', 'hh', '5555', 'Male', 'c20ad4d76fe97759aa27a0c99bff6710', 5),
(15, 'jjj', 'jj', 'ffff@fff.com', 'jj', '546456456', 'Male', '202cb962ac59075b964b07152d234b70', 4),
(16, 'rr', 'yy', 'ay@ddd.com', 'yy', '64747', 'Male', '202cb962ac59075b964b07152d234b70', 4),
(17, 'fgddf', 'dfgdg', 'ay@ddggd.com', 'fgd', '34245', 'Male', '202cb962ac59075b964b07152d234b70', 4),
(18, 'hj', 'gjmghjm', 'aggy@ddd.com', 'mggjm', '57577766756', 'Male', '202cb962ac59075b964b07152d234b70', 1),
(19, 'uu', 'uu', 'rtgergg@gttttg.com', 'uu', '565577', 'Male', '202cb962ac59075b964b07152d234b70', 4),
(20, 'trtr', 'tr', 'aaaa@gmai.com', 'tr', '5645456', 'Male', '202cb962ac59075b964b07152d234b70', 3),
(21, 'jj', 'jjj', 'aafffaa@gmai.com', 'jj', '54647', 'Male', '202cb962ac59075b964b07152d234b70', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forsell`
--
ALTER TABLE `forsell`
  ADD PRIMARY KEY (`Items_id`,`Cart_id`),
  ADD KEY `fk_Forsell_Cart1_idx` (`Cart_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Items_User1_idx` (`User_id`),
  ADD KEY `fk_Items_Store1_idx` (`Store_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Order_Cart1_idx` (`Cart_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`Role_id`,`Permission_id`),
  ADD KEY `fk_role_permission_Permission1_idx` (`Permission_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Store_User1_idx` (`User_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_User_Role_idx` (`Role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forsell`
--
ALTER TABLE `forsell`
  ADD CONSTRAINT `fk_Forsell_Cart1` FOREIGN KEY (`Cart_id`) REFERENCES `cart` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Forsell_Items1` FOREIGN KEY (`Items_id`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_Items_Store1` FOREIGN KEY (`Store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Items_User1` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_Order_Cart1` FOREIGN KEY (`Cart_id`) REFERENCES `cart` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `fk_role_permission_Permission1` FOREIGN KEY (`Permission_id`) REFERENCES `permission` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_role_permission_Role1` FOREIGN KEY (`Role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `fk_Store_User1` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_Role` FOREIGN KEY (`Role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
