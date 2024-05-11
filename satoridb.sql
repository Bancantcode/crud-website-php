-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 08:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satoridb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `address` varchar(50) NOT NULL,
  `mop` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'not approved',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `product_name`, `user_id`, `quantity`, `price`, `total`, `address`, `mop`, `status`, `date`) VALUES
(21081, 93211, 'Brewista Artisan Gooseneck Kettle 1L', 19549, 1, 9232, 9232, 'hau', 'gcash', 'not approved', '2024-04-20 04:45:32'),
(50640, 47809, 'Barista Space Milk Jug 350mL', 19549, 1, 2251, 2251, 'hau', 'gcash', 'not approved', '2024-04-20 04:45:32'),
(55267, 60575, 'Hario V60 Buono Kettle 1.2L', 19549, 1, 3208, 3208, 'hau', 'gcash', 'not approved', '2024-04-20 04:45:32'),
(56867, 12898, 'Hario V60 Metal Dripper', 19549, 1, 2927, 2927, 'hau', 'gcash', 'not approved', '2024-04-20 04:45:32'),
(59623, 55342, 'Colombia Sudan Rume', 19549, 1, 2927, 2927, 'hau', 'gcash', 'not approved', '2024-04-20 04:45:32'),
(61942, 36114, 'Timemore Chesnut C3 black', 19549, 1, 5629, 5629, 'hau', 'gcash', 'not approved', '2024-04-20 04:45:32'),
(68740, 22027, 'Espresso SIDE A & B (single shot) ', 39419, 2, 225, 450, 'Angeles', 'Gcash', 'not approved', '2024-04-20 01:10:35'),
(70957, 81451, 'Hario V60 Range Server 600 Clear', 19549, 1, 1632, 1632, 'hau', 'gcash', 'not approved', '2024-04-20 04:45:32'),
(77998, 39512, 'Americano (Hot / Iced)', 39419, 1, 290, 290, 'Angeles', 'Gcash', 'not approved', '2024-04-20 01:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `stocks` int(11) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `stocks`, `price`, `image`) VALUES
(10782, 'Croissants', 'pastries', 12, 120, 'assets/img/Croissants.jpg'),
(12787, 'Flat White – 6oz', 'milk-based', 6, 245, 'assets/img/FlatWhite.jpg'),
(12898, 'Hario V60 Metal Dripper', 'equipments', 6, 2927, 'assets/img/HarioV60MetalDripper.jpg'),
(22027, 'Espresso SIDE A & B (single shot) ', 'espresso-based', 12, 225, 'assets/img/EspressoSideA&B.jpg'),
(22954, 'Panama - Perci', 'beans', 6, 9232, 'assets/img/PanamaPerci.jpg'),
(23911, 'Tokyo Drip Tonic', 'signature', 23, 245, 'assets/img/TokyoDripTonic.jpg'),
(23977, 'Usucha Matcha – 4oz', 'signature', 8, 205, 'assets/img/UsuchaMatcha.jpg'),
(32989, 'Latte – 7oz (Hot / Iced)', 'milk-based', 16, 245, 'assets/img/Latte.jpg'),
(33619, 'Oat Milk', 'extra', 45, 55, 'assets/img/OatMilk.jpg'),
(36114, 'Timemore Chesnut C3 black', 'equipments', 4, 5629, 'assets/img/TimemoreChestnutC3Black.jpg'),
(39512, 'Americano (Hot / Iced)', 'espresso-based', 12, 290, 'assets/img/EspressoDuet.jpg'),
(40951, 'Peru - Lady Silva Lizana', 'beans', 16, 1238, 'assets/img/PeruLady Silva Lizana.jpg'),
(42046, 'Panama Kambera Geisha', 'beans', 23, 5629, 'assets/img/PanamaKamberaGeisha.jpg'),
(42492, 'Gishiki Matcha – 7oz ', 'signature', 27, 270, 'assets/img/GishikiMatcha.jpg'),
(47101, 'Amai Latte – 7oz ', 'signature', 16, 250, 'assets/img/AmaiLatte.jpg'),
(47809, 'Barista Space Milk Jug 350mL', 'equipments', 8, 2251, 'assets/img/BaristaSpaceMilk JugRainbow350mL.jpg'),
(49124, 'Regular Beans (Frozen Beans)', 'pour-over', 8, 330, 'assets/img/RegularFrozenBeans.jpg'),
(50211, 'Cortado -4oz', 'milk-based', 17, 245, 'assets/img/Cortado.jpg'),
(50498, 'PARAGON SIDE A & B', 'pour-over', 12, 660, 'assets/img/ParagonSideA&B.jpg'),
(55342, 'Colombia Sudan Rume', 'beans', 17, 2927, 'assets/img/Colombia Sudan Rume.jpg'),
(55582, 'Flat Bottom Brewer Ore V3 ', 'pour-over', 15, 400, 'assets/img/FlatBottomBrewer.jpg'),
(57034, 'Hario Range Server 360mL', 'equipments', 4, 1407, 'assets/img/HarioRangeServer360mL.jpg'),
(60575, 'Hario V60 Buono Kettle 1.2L', 'equipments', 12, 3208, 'assets/img/HarioV60BuonoKettle1.2L.jpg'),
(62529, 'Honduras', 'beans', 8, 1407, 'assets/img/Honduras.jpg'),
(63234, 'Conical Brewer Original ', 'pour-over', 13, 400, 'assets/img/ConicalBrewer.jpg'),
(65913, 'Cappuccino – 5oz (Hot / Iced)', 'milk-based', 8, 245, 'assets/img/Cappuccino.jpg'),
(68263, 'Burnt Cheesecake', 'pastries', 23, 250, 'assets/img/BurntCheesecake.jpg'),
(70518, 'Espresso (full shot)', 'espresso-based', 10, 225, 'assets/img/Espresso.jpg'),
(70890, 'Rwanda Gicumbi Anaerobic ', 'beans', 5, 1632, 'assets/img/Rwanda Gicumbi Anaerobic Natural.jpg'),
(71316, 'Colombia - Cascara', 'beans', 14, 3208, 'assets/img/ColombiaCascara.jpg'),
(71962, 'Tokyo Drip', 'signature', 14, 217, 'assets/img/TokyoDrip.jpg'),
(72148, 'Ethiopia Aricha 0005', 'beans', 16, 1407, 'assets/img/Ethiopia Aricha 0005.jpg'),
(72621, 'Exclusive Beans (Competition Beans)', 'pour-over', 7, 497, 'assets/img/ExclusiveBeans.jpg'),
(74680, '*SATORI* 4 set of 3oz Tokyo Drip ', 'signature', 17, 465, 'assets/img/Satori4set.jpg'),
(75025, 'Cookies', 'pastries', 12, 130, 'assets/img/Cookies.jpg'),
(75135, 'Espresso Duet (single shot espresso + 3oz)', 'espresso-based', 14, 390, 'assets/img/EspressoDuet.jpg'),
(77146, 'Immersion Brewer Hario Switch ', 'pour-over', 21, 400, 'assets/img/ImmersionBrewerHario.jpg'),
(77616, 'Cold Brew', 'signature', 18, 217, 'assets/img/ColdBrew.jpg'),
(78045, 'Matcha Cheesecake', 'pastries', 13, 250, 'assets/img/MatchaCheesecake.jpg'),
(80584, 'Barista Space Milk Jug 650mL', 'equipments', 5, 2645, 'assets/img/BaristaSpaceMilkJugRainbow600mL.jpg'),
(81135, 'Dark Brownies', 'pastries', 16, 130, 'assets/img/DarkBrownies.jpg'),
(81451, 'Hario V60 Range Server 600 Clear', 'equipments', 5, 1632, 'assets/img/HarioV60RangeServer600Clear.jpg'),
(81914, 'Barista’s Choice', 'pour-over', 12, 330, 'assets/img/BaristaChoice.jpg'),
(84636, 'Colombia Mandela Anaerobic', 'beans', 13, 9232, 'assets/img/Colombia Mandela Anaerobic.jpg'),
(84836, 'Freezed Distilled Milk', 'extra', 43, 95, 'assets/img/DistilledMilk.jpg'),
(90463, 'Brazil - Fazenda Sertao Natural', 'beans', 16, 2645, 'assets/img/BrazilFazenda Sertao Natural.jpg'),
(91338, 'Expresso Shot (single)', 'extra', 53, 70, 'assets/img/TokyoDrip.jpg'),
(93211, 'Brewista Artisan Gooseneck Kettle 1L', 'equipments', 6, 9232, 'assets/img/BrewistaArtisanGooseneckKettle1L.jpg'),
(95527, 'Colombia Geisha Maximus', 'beans', 12, 2927, 'assets/img/Colombia Geisha Maximus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `userType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `FirstName`, `LastName`, `Email`, `Password`, `Date`, `userType`) VALUES
(19549, 'Andrei', 'Andrei', 'Culaba', 'andrei@gmail.com', 'andrei', '2024-04-19 14:06:52', 'user'),
(39419, 'user', 'updated user', 'user updated', 'userupdated@gmail.com', 'user123', '2024-04-19 13:58:11', 'user'),
(44231, 'Aiks', 'Aiko', 'Ocampo', 'aikoocampo03@gmail.com', 'Foxes17', '2024-04-20 01:02:12', 'admin'),
(52342, 'saixlui', 'Luis Miguel', 'Cayanan', 'sai@gmail.com', 'Sai25..', '2024-04-20 01:09:18', 'admin'),
(66004, 'ban', 'Bryan', 'Santiago', 'santiagobryan831@gmail.com', 'banwagon', '2024-04-19 19:50:21', 'admin'),
(100016, 'kay', 'kay', 'beltran', 'kaybeltran@gmail.com', 'kayyyy', '2024-04-20 00:59:42', 'user'),
(100017, 'luis', 'luis', 'miguel', 'lmcayanan@gmail.com', 'luismiguel', '2024-04-20 01:00:20', 'user'),
(422523, 'airaguiao7', 'Princess Aira', 'Guiao', 'prinayraguiao1179@gmail.com', 'ayra110709', '2024-04-20 01:02:47', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93999;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97606;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422525;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
