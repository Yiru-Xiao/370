-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2020 at 03:56 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idlefish`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `content` text NOT NULL,
  `productId` int(10) NOT NULL,
  `userId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `productId`, `userId`) VALUES
(1, 'cool', 1, 2),
(2, 'perfect', 15, 4),
(3, 'love it', 12, 4),
(4, 'sport car!ðŸ¤”', 30, 5);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) NOT NULL,
  `productId` int(10) NOT NULL,
  `userId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `productId`, `userId`) VALUES
(2, 2, 2),
(3, 5, 2),
(4, 14, 2),
(5, 16, 2),
(6, 30, 3),
(7, 15, 3),
(8, 39, 2);

-- --------------------------------------------------------

--
-- Table structure for table `passwordReset`
--

CREATE TABLE `passwordReset` (
  `id` int(10) NOT NULL,
  `resetEmail` text NOT NULL,
  `resetSelector` text NOT NULL,
  `resetToken` longtext NOT NULL,
  `resetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `price` int(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `image_name` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `phone`, `email`, `address`, `image_name`, `tag`, `userid`) VALUES
(1, 'Car1', 'car1 description test', 21000, 2147483647, 'evan@gmail.com', 'saskatoon', '[\"5e82940fa9c464.00105005.jpg\",\"5e82940fe38132.98146544.jpg\",\"5e8294101f6be4.75539174.jpg\",\"5e8294104a9428.14406629.jpg\",\"5e829410797dc9.53176202.jpg\"]', 'Car', 2),
(2, 'Car2', 'car2 description test', 18000, 2147483647, 'evan@gmail.com', 'REGINA', '[\"5e82947a8684c3.12023076.jpg\",\"5e82947abc76e2.53017642.jpg\",\"5e82947aea7c79.99365675.jpg\",\"5e82947b23ee63.01465114.jpg\",\"5e82947b5130c2.01520551.jpg\"]', 'Car', 2),
(3, 'Car3', 'car3 description test', 32000, 2147483647, 'evan@gmail.com', 'Calgary', '[\"5e8295110e22a4.57072993.jpg\",\"5e8295113e7801.06470730.jpg\",\"5e8295116f5910.94451912.jpg\",\"5e8295119d8397.99878718.jpg\",\"5e829511cd43a5.07170618.jpg\"]', 'Car', 2),
(4, 'Car4', 'car4 description test', 9000, 2147483647, 'evan@gmail.com', 'Vancouver', '[\"5e8295643baec7.55302571.jpg\",\"5e829564693900.67432920.jpg\",\"5e829564974b52.79712991.jpg\",\"5e829564c4fc49.58497582.jpg\",\"5e82956500ab36.30191493.jpg\"]', 'Car', 2),
(5, 'Car5', 'car5 description test', 65000, 2147483647, 'evan@gmail.com', 'SASKATOON', '[\"5e82959977dc89.41611583.jpg\",\"5e829599a7d3f5.97739362.jpg\",\"5e829599d07a38.32382501.jpg\",\"5e82959a0726b1.66678823.jpg\",\"5e82959a2ea197.41681195.jpg\"]', 'Car', 2),
(6, 'Clothes1', 'clothes1 description test', 80, 2147483647, 'evan@gmail.com', 'CALGARY', '[\"5e8295fb82fdd0.80288129.jpg\",\"5e8295fbaf3687.70636863.jpg\"]', 'Clothes', 2),
(7, 'Clothes2', 'clothes2 description test', 20, 2147483647, 'giao@gmail.com', 'SaskatooN', '[\"5e82968d595ed7.69496494.jpg\",\"5e82968d89e1e7.54182303.jpg\"]', 'Clothes', 3),
(8, 'Clothes3', 'Clothes3 description test', 250, 2147483647, 'giao@gmail.com', 'REGINA, SK', '[\"5e8296d3abbe37.59272727.jpg\",\"5e8296d3d96ff4.81007332.jpg\"]', 'Clothes', 3),
(9, 'Clothes4', 'Clothes4 description test', 125, 2147483647, 'giao@gmail.com', 'Saskatoon', '[\"5e8297100e4682.52097409.jpg\",\"5e829710402db7.76211410.jpg\",\"5e829710775c43.01299752.jpg\"]', 'Clothes', 3),
(10, 'Clothes5', 'Clothes5 description test', 85, 2147483647, 'giao@gmail.com', 'Vancouver', '[\"5e82974261dfc1.59320256.jpg\",\"5e8297429054d6.99980937.jpg\",\"5e829742c2e2e8.59620012.jpg\",\"5e829742f1e951.09015478.jpg\"]', 'Clothes', 3),
(11, 'House1', 'House1 description test', 800000, 2147483647, 'giao@gmail.com', 'Calgary', '[\"5e829779a67721.64667249.jpg\",\"5e829779e696b6.09286683.jpg\",\"5e82977a3705c3.93177536.jpg\",\"5e82977a6f88e7.30277897.jpg\",\"5e82977aaa9397.73854985.jpg\"]', 'House', 3),
(12, 'House', 'House2 description test', 450000, 2147483647, 'giao@gmail.com', 'Saskatoon', '[\"5e8297e31edd88.62113404.jpg\",\"5e8297e35662f7.92341952.jpg\",\"5e8297e38cb240.62398188.jpg\",\"5e8297e3bdbcd8.85408865.jpg\",\"5e8297e3ef7284.51937326.jpg\"]', 'House', 3),
(13, 'House3', 'House3 description test', 350000, 2147483647, 'van@gmail.com', 'Regina', '[\"5e829823d1f677.07609001.jpg\",\"5e8298241cd5e4.20429266.jpg\",\"5e8298244a28e5.92860098.jpg\",\"5e8298247ef5a5.73220270.jpg\"]', 'House', 4),
(14, 'House4', 'House4 description test', 1200000, 2147483647, 'van@gmail.com', 'Vancouver', '[\"5e82984ca8b857.99350061.jpg\",\"5e82984cd51c13.29649262.jpg\",\"5e82984d122336.81618750.jpg\",\"5e82984d414a33.74651644.jpg\",\"5e82984d7051b7.71817268.jpg\"]', 'House', 4),
(15, 'House5', 'House5 description test House5 description test House5 description test House5 description test House5 description test House5 description test House5 description test House5 description test House5 description test House5 description test House5 description test House5 description test House5 description test House5 description test House5 description test House5 description test', 3000000, 2147483647, 'van@gmail.com', 'Vancouver', '[\"5e82989cc94b63.28343167.jpg\",\"5e82989d0e0fb3.80835699.jpg\",\"5e82989d39c177.84725095.jpg\",\"5e82989d654b11.63487459.jpg\",\"5e82989d9032c4.16409883.jpg\"]', 'House', 4),
(16, 'Tech1', 'Tech1 description test', 3200, 2147483647, 'van@gmail.com', 'Saskatoon', '[\"5e82994284b982.18982279.jpg\",\"5e829942be1667.84598692.jpg\",\"5e829942f0b3c3.32891892.jpg\"]', 'Technology', 4),
(17, 'Tech2', 'Tech2 description test', 6000, 2147483647, 'evan@gmail.com', 'Regina', '[\"5e829998d7f6e2.30336242.jpg\",\"5e8299991b3213.06846756.jpg\",\"5e8299994ec4f9.33702572.jpg\"]', 'Technology', 2),
(18, 'Tech2', 'Tech3 description test', 3000, 306777888, 'evan@gmail.com', 'Calgary', '[\"5e8299bc1835c8.19909608.jpg\",\"5e8299bc43de79.96453007.jpg\"]', 'Technology', 2),
(19, 'Tech4', 'Tech4 description test', 12000, 2147483647, 'evan@gmail.com', 'Saskatoon', '[\"5e8299ec96d3e9.57222131.jpg\",\"5e8299ecc8d691.97257380.jpg\",\"5e8299ed0429e9.69241195.jpg\"]', 'Technology', 2),
(20, 'Tech5', 'Tech5 description test', 7000, 306777888, 'evan@gmail.com', 'Vancouver', '[\"5e829a1d97d3b6.63639832.jpg\",\"5e829a1dc44012.79377671.jpg\",\"5e829a1deeb7d8.79231999.jpg\"]', 'Technology', 2),
(21, 'Car6', 'Car6 description test', 22000, 2147483647, 'hui@gmail.com', 'Saskatoon', '[\"5e829d7b768fd5.15506843.jpg\",\"5e829d7ba5fcf8.10486655.jpg\",\"5e829d7bd89559.72214032.jpg\"]', 'Car', 5),
(22, 'Car7', 'Car7 description test', 60000, 306777888, 'hui@gmail.com', 'Saskatoon', '[\"5e829deb46abd7.82239329.jpg\",\"5e829deb75d1f9.88486696.jpg\",\"5e829deba32671.17640627.jpg\"]', 'Car', 5),
(23, 'Car8', 'Car8 description test', 90000, 2147483647, 'hui@gmail.com', 'vancouver', '[\"5e829e455aeb89.76903473.jpg\",\"5e829e459beff5.07094272.jpg\",\"5e829e45d07492.04143894.jpg\",\"5e829e460842c0.62982967.jpg\"]', 'Car', 5),
(24, 'Car9', 'Car9 description test', 85000, 306777888, 'hui@gmail.com', 'Calgary', '[\"5e829e6a6f6d61.37923582.jpg\",\"5e829e6a974363.95169520.jpg\",\"5e829e6ac05ef4.65541217.jpg\"]', 'Car', 5),
(25, 'Car10', 'Car10 description test', 120000, 2147483647, 'hui@gmail.com', 'Vancouver', '[\"5e829e95ab5116.56088931.jpg\",\"5e829e95d707b1.53678664.jpg\",\"5e829e960e3fb4.26607538.jpg\",\"5e829e9638ab90.64617176.jpg\"]', 'Car', 5),
(26, 'Car11', 'Car11 description test', 70000, 2147483647, 'hui@gmail.com', 'regina', '[\"5e829ebdceb7a6.83052256.jpg\",\"5e829ebe03d7b1.70853086.jpg\",\"5e829ebe3523c0.55420082.jpg\",\"5e829ebe66cc96.05685776.jpg\",\"5e829ebe975876.23538281.jpg\"]', 'Car', 5),
(27, 'Car12', 'Car12 description test', 65000, 306777888, 'hui@gmail.com', 'Saskatoon', '[\"5e829ee99906a4.65928635.jpg\",\"5e829ee9cdda87.90750000.jpg\",\"5e829eea1007b0.54021963.jpg\"]', 'Car', 5),
(28, 'Car13', 'Car13 description test', 85000, 2147483647, 'hui@gmail.com', 'Saskatoon', '[\"5e829f16241bc5.19288926.jpg\",\"5e829f164f7402.22618772.jpg\",\"5e829f167a08a8.71550500.jpg\"]', 'Car', 5),
(29, 'Car14', 'Car14 description test', 180000, 2147483647, 'hui@gmail.com', 'Vancouver', '[\"5e829f41b90605.67395318.jpg\",\"5e829f41e53125.18265987.jpg\",\"5e829f421d9238.45505865.jpg\",\"5e829f42493c40.33855957.jpg\",\"5e829f42751159.28014818.jpg\"]', 'Car', 5),
(30, 'Car15', 'Car15 description test', 250000, 2147483647, 'hui@gmail.com', 'Calgary', '[\"5e829f671b34c9.79091642.jpg\",\"5e829f674750c4.46005134.jpg\",\"5e829f67743095.85474603.jpg\",\"5e829f679d4fc8.77599262.jpg\",\"5e829f67c36254.56796970.jpg\"]', 'Car', 5),
(31, 'Clothes6', 'Clothes6 description test', 125, 306777888, 'hui@gmail.com', 'Saskatoon', '[\"5e829fccd81e09.89528709.jpg\",\"5e829fcd0c0d94.24561972.jpg\",\"5e829fcd3401d1.36076760.jpg\"]', 'Clothes', 5),
(32, 'Tech6', 'Tech6 description test', 12000, 2147483647, 'hui@gmail.com', 'Regina', '[\"5e82a029d10a42.10905818.jpg\",\"5e82a029eda257.78662975.jpg\",\"5e82a02a20ffd0.19100815.jpg\"]', 'Technology', 5),
(33, 'Tech7', 'Tech7 description test', 1000, 2147483647, 'hui@gmail.com', 'Saskatoon', '[\"5e82a058f377f4.70591144.jpg\",\"5e82a0592d3ee8.99022369.jpg\"]', 'Technology', 5),
(34, 'Tech8', 'Tech8 description test', 1300, 2147483647, 'hui@gmail.com', 'Calgary', '[\"5e82a07be22ac0.08531738.jpg\",\"5e82a07c211253.82696458.jpg\",\"5e82a07c4ef172.34716963.jpg\"]', 'Technology', 5),
(35, 'House6', 'House6 description test', 600000, 306888999, 'giao@gmail.com', 'Saskatoon', '[\"5e82a0c48ed3a2.02824366.jpg\",\"5e82a0c4c5bee8.07338941.jpg\",\"5e82a0c5059d24.00084155.jpg\"]', 'House', 3),
(36, 'House7', 'House7 description test', 900000, 2147483647, 'giao@gmail.com', 'CalgarY', '[\"5e82a0ec3022f5.61091777.jpg\",\"5e82a0ec5b2b70.31228939.jpg\",\"5e82a0ec8d4cb6.30108463.jpg\",\"5e82a0ecbc7af7.48120129.jpg\"]', 'House', 3),
(37, 'House8', 'House8 description test', 550000, 306888999, 'giao@gmail.com', 'Regina', '[\"5e82a1912eb5e2.44035309.jpg\",\"5e82a1915ea725.99116701.jpg\"]', 'House', 3),
(38, 'House9', 'House9 Description test', 700000, 307888999, 'giao@gmail.com', 'Calgary', '[\"5e82a1bcb08ea2.62128292.jpg\",\"5e82a1bce50de1.02702528.jpg\",\"5e82a1bd17fb73.88446025.jpg\"]', 'House', 3),
(39, 'House10', 'House10 Description test', 1100000, 306888999, 'giao@gmail.com', 'Saskatoon', '[\"5e82a1e52e85f7.12271462.jpg\",\"5e82a1e55a68d8.17411248.jpg\",\"5e82a1e5874497.28135093.jpg\",\"5e82a1e5b48795.50017187.jpg\"]', 'House', 3),
(40, 'House11', 'House11 Description test', 2100000, 2147483647, 'giao@gmail.com', 'Vancouver', '[\"5e82a227a24bb3.29388423.jpg\",\"5e82a227e6f393.61669259.jpg\",\"5e82a228210306.82137856.jpg\"]', 'House', 3),
(41, 'House12', 'House12 Description test', 4500000, 2147483647, 'giao@gmail.com', 'Vancouver', '[\"5e82a24aaecde4.79844320.jpg\",\"5e82a24ad8f8d0.81473933.jpg\",\"5e82a24b16fe89.32195303.jpg\"]', 'House', 3);

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profileimg`
--

INSERT INTO `profileimg` (`id`, `name`, `userid`) VALUES
(2, '5e82876ead4b93.88206291.gif', 2),
(3, '5e8287e439b734.06331471.png', 3),
(4, '5e82888b9d55e2.47662410.gif', 4),
(5, 'default.gif', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_first` varchar(100) NOT NULL,
  `user_last` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_uid` varchar(100) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_address` text NOT NULL,
  `user_country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`, `user_address`, `user_country`) VALUES
(2, 'Evan', 'Huang', 'evan@gmail.com', 'Evan', '$2y$10$aXbS/P18K1GHv2jnqvjZouw5dSlh.kQ/7hTkxonD2u7P24UVdOmFe', 'Saskatoon, SK', 'Canada'),
(3, 'Giao', 'G', 'giao@gmail.com', 'Giao', '$2y$10$RsnFSoFM8FUVPNXJb5SGlOMRHmgJg0kmZtaz2CEXhDk.ZcfJ6LZBy', 'giao', 'giao'),
(4, 'Van', 'X', 'van@gmail.com', 'VanX', '$2y$10$yP1DWjWrGYLY4ZpAipu7uuVotk96lVbRJZygi6FEhpFrfaxUGI.R.', 'Van', 'Van'),
(5, 'Hui', 'H', 'mrxiaohui204@gmail.com', 'Hui', '$2y$10$XOmT6/ZtMAIFlcvRbwXpbOtuqHrH3JLa6EMD9IEFW4J3JTC.ktvfq', 'Guangzhou', 'China');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `passwordReset`
--
ALTER TABLE `passwordReset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `passwordReset`
--
ALTER TABLE `passwordReset`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD CONSTRAINT `profileimg_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
