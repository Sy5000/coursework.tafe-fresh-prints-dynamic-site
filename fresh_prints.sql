-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 24, 2022 at 07:04 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fresh_prints`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `catDescription` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `catName`, `catDescription`) VALUES
(1, 'Mens Tees', 'A range of styles, materials and sizes to suit men'),
(2, 'Womens Tees', 'A range of styles, materials and sizes to suit women'),
(3, 'Kids', 'A range of clothes for the little ones'),
(4, 'Hoodies', 'Hooded tops in a range of sizes and colours'),
(5, 'Flyers / Posters', 'From business cards to art prints, view our more traditional print options'),
(6, 'Promotional', 'Get your name out there with our selection of promo items');

-- --------------------------------------------------------

--
-- Table structure for table `colour`
--

CREATE TABLE `colour` (
  `colourID` int(11) NOT NULL,
  `colour` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colour`
--

INSERT INTO `colour` (`colourID`, `colour`) VALUES
(1, 'black'),
(2, 'white');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `roleID` int(11) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `authorisation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`roleID`, `role`, `authorisation`) VALUES
(1, 'admin', 'ALL'),
(2, 'guest', 'read_only');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productTitle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `qty` int(5) NOT NULL,
  `colourID` int(11) NOT NULL,
  `sizeID` int(11) NOT NULL,
  `catID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productTitle`, `description`, `price`, `qty`, `colourID`, `sizeID`, `catID`) VALUES
(1, 'Crew T-shirt', 'Cotton crew neck T-shirt', '21.00', 100, 1, 1, 1),
(2, 'Crew T-shirt', 'Cotton crew neck T-shirt', '22.00', 100, 1, 2, 1),
(3, 'Crew T-shirt', 'Cotton crew neck T-shirt', '23.00', 100, 1, 3, 1),
(4, 'Crew T-shirt', 'Cotton crew neck T-shirt', '24.00', 100, 1, 4, 1),
(5, 'Crew T-shirt', 'Cotton crew neck T-shirt', '25.00', 100, 1, 5, 1),
(6, 'Crew T-shirt', 'Cotton crew neck T-shirt', '21.00', 100, 2, 1, 1),
(7, 'Crew T-shirt', 'Cotton crew neck T-shirt', '22.00', 100, 2, 2, 1),
(8, 'Crew T-shirt', 'Cotton crew neck T-shirt', '23.00', 100, 2, 3, 1),
(9, 'Crew T-shirt', 'Cotton crew neck T-shirt', '24.00', 100, 2, 4, 1),
(10, 'Crew T-shirt', 'Cotton crew neck T-shirt', '25.00', 100, 2, 5, 1),
(11, 'V-neck T-shirt', 'Cotton V-neck T-shirt', '18.00', 750, 2, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `productionOrder`
--

CREATE TABLE `productionOrder` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `artUpload` varchar(100) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `orderQty` int(5) DEFAULT NULL,
  `orderPrice` decimal(6,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productionOrder`
--

INSERT INTO `productionOrder` (`orderID`, `userID`, `artUpload`, `productID`, `orderQty`, `orderPrice`, `date`) VALUES
(1, 2, 'exampleupload.jpg', NULL, NULL, '0.00', '2022-02-19 10:06:36'),
(2, 1, 'baketest.jpg', NULL, NULL, '0.00', '2022-02-19 12:16:56'),
(3, 2, 'anotherexample.ai', 3, 3, '69.00', '2022-02-19 22:18:02'),
(4, 2, 'andanotherexample.jpg', 11, 5, '90.00', '2022-02-19 22:19:28'),
(5, 1, 'baketest002.jpg', 10, 5, '100.00', '2022-02-20 09:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `sizeID` int(11) NOT NULL,
  `sizes` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`sizeID`, `sizes`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` binary(64) DEFAULT NULL,
  `firstName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleID` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `salt`, `firstName`, `lastName`, `phone`, `roleID`) VALUES
(1, 'admin@freshprints.com', '$2y$10$goyyLZquTQnttqZvZupnuOKtg.wWvYXN6SO0hARp5KjMSnr3YLwo2', NULL, 'admin', 'account', '123321', 1),
(2, 'guest@test', '$2y$10$MG0hKfGrPib9SOiGApS2N.AnCSXRxMOjcWPjN0q/MHllbY1puHCVG', NULL, 'guest', 'account', '123456', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `colour`
--
ALTER TABLE `colour`
  ADD PRIMARY KEY (`colourID`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `productColour` (`colourID`),
  ADD KEY `productSize` (`sizeID`),
  ADD KEY `productCat` (`catID`);

--
-- Indexes for table `productionOrder`
--
ALTER TABLE `productionOrder`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `orderArtwork` (`artUpload`),
  ADD KEY `orderUser` (`userID`),
  ADD KEY `orderProduct` (`productID`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sizeID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userPermission` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colour`
--
ALTER TABLE `colour`
  MODIFY `colourID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productionOrder`
--
ALTER TABLE `productionOrder`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `sizeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `productCat` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`),
  ADD CONSTRAINT `productColour` FOREIGN KEY (`colourID`) REFERENCES `colour` (`colourID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productSize` FOREIGN KEY (`sizeID`) REFERENCES `size` (`sizeID`) ON UPDATE CASCADE;

--
-- Constraints for table `productionOrder`
--
ALTER TABLE `productionOrder`
  ADD CONSTRAINT `orderProduct` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `orderUser` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `userPermission` FOREIGN KEY (`roleID`) REFERENCES `permission` (`roleID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
