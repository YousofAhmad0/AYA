-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 02:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `uid`, `message`) VALUES
(1, 2, 'vbhytreser huytr'),
(2, 2, 'hcfg tbsj');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menuID` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `menuID`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hummus', 50000, NULL, NULL),
(3, 3, 'Hamburger', 60000, NULL, NULL),
(8, 4, 'CeasarSalad', 45000, NULL, NULL),
(9, 1, 'Tabbouleh', 35000, NULL, NULL),
(10, 2, 'CrispyBucket', 65000, NULL, NULL),
(11, 6, 'PeperoniPizza', 73000, NULL, NULL),
(12, 2, 'Steak', 67000, NULL, NULL),
(13, 3, 'CrispyBurger', 75000, NULL, NULL);

--
-- Triggers `food`
--
DELIMITER $$
CREATE TRIGGER `sizeConcat` AFTER INSERT ON `food` FOR EACH ROW UPDATE menu
    SET menu.size = menu.size + 1
    WHERE menu.id IN (NEW.menuID)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `ResID` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `ResID`, `name`, `size`, `created_at`, `updated_at`) VALUES
(1, 1, 'Meza', 3, NULL, NULL),
(2, 2, 'MCDO_MENU', 2, NULL, NULL),
(3, 1, 'Burgers', 5, NULL, NULL),
(4, 5, 'Salad', 1, NULL, NULL),
(6, 8, 'Pizza', 1, NULL, NULL),
(7, 7, 'Chilis_Menu', 0, NULL, NULL),
(8, 7, 'Chilis_Menu', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2022_03_24_122723_create_flights_table', 2),
(26, '2022_03_24_124043_create_resturents_table', 3),
(27, '2022_03_25_151132_create_orders_table', 4),
(28, '2022_03_29_163116_create_flights_table', 5),
(29, '2022_04_22_173701_create_menu_table', 5),
(30, '2022_04_22_175616_create_food_table', 6),
(31, '2022_05_06_162052_create_reservation_table', 7),
(32, '2022_05_06_163555_create_tables_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resID` int(10) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalPrice` double NOT NULL,
  `Desciption` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `resID`, `UserID`, `address`, `totalPrice`, `Desciption`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Chouf', 470000, '{\"Hummus\":\"4\",\"Foul\":\"3\",\"Hamburger\":\"2\"}', NULL, NULL),
(2, 1, 2, 'Chouf, Lebanon', 470000, '{\"Hummus\":\"4\",\"Foul\":\"3\",\"Hamburger\":\"2\"}', NULL, NULL),
(3, 1, 2, 'Lebanon', 650000, '{\"Hummus\":\"3\",\"Foul\":\"4\",\"Hamburger\":\"5\"}', NULL, NULL),
(4, 1, 2, 'Semqanieh', 505000, '{\"Hummus\":\"5\",\"Tabbouleh\":\"3\",\"CrispyBurger\":\"2\"}', NULL, NULL),
(11, 1, 2, 'Chouf', 505000, '{\"Hummus\":\"3\",\"Tabbouleh\":\"5\",\"Hamburger\":\"3\"}', NULL, NULL),
(12, 1, 2, 'Lebanon', 340080, '{\"Hummus\":\"3\",\"Tabbouleh\":\"2\",\"Hamburger\":\"2\"}', NULL, NULL),
(13, 1, 2, 'Chouf', 495000, '{\"Hummus\":\"3\",\"Tabbouleh\":\"3\",\"Hamburger\":\"4\"}', NULL, NULL),
(14, 1, 2, 'Chouf', 545000, '{\"Hummus\":\"4\",\"Tabbouleh\":\"3\",\"Hamburger\":\"4\"}', NULL, NULL),
(15, 1, 2, 'Chouf', 435000, '{\"Hummus\":\"3\",\"Tabbouleh\":\"3\",\"Hamburger\":\"3\"}', NULL, NULL),
(16, 1, 2, 'Ouzaei', 845000, '{\"Tabbouleh\":\"4\",\"Hamburger\":\"3\",\"CrispyBurger\":\"7\"}', NULL, NULL),
(17, 1, 2, 'Semqanieh', 435000, '{\"Hummus\":\"3\",\"Tabbouleh\":\"3\",\"Hamburger\":\"3\"}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tid` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL,
  `RID` int(10) UNSIGNED NOT NULL,
  `nbOfPeople` int(11) NOT NULL,
  `DateTime` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `tid`, `uid`, `RID`, `nbOfPeople`, `DateTime`, `created_at`, `updated_at`) VALUES
(12, 2, 2, 1, 2, '2022-05-14 14:51:00', NULL, NULL),
(16, 1, 2, 1, 2, '2022-05-07 13:00:00', NULL, NULL),
(17, 4, 2, 2, 2, '2022-05-14 13:07:00', NULL, NULL),
(18, 3, 2, 1, 2, '2022-05-18 13:00:00', NULL, NULL),
(19, 6, 2, 1, 3, '2022-05-19 03:50:00', NULL, NULL),
(20, 5, 2, 1, 3, '2022-05-19 00:35:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resturents`
--

CREATE TABLE `resturents` (
  `id` int(10) UNSIGNED NOT NULL,
  `ResName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resturents`
--

INSERT INTO `resturents` (`id`, `ResName`, `Location`, `Rate`) VALUES
(1, 'KFC', 'Ashrafeih', '⭐⭐⭐'),
(2, 'McDonald\'s', 'Jal el Dib', '⭐⭐⭐⭐'),
(3, 'Kababji', 'Khaldieh', '⭐⭐⭐'),
(5, 'BurgerKing', 'Jemaizy', '⭐⭐⭐⭐⭐'),
(7, 'Chilis', 'Chouf', '⭐⭐⭐'),
(8, 'Hardees', 'Saida', '⭐⭐⭐⭐');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `RID` int(10) UNSIGNED NOT NULL,
  `isOut` tinyint(1) NOT NULL,
  `capacity` int(11) NOT NULL,
  `isFree` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `RID`, `isOut`, `capacity`, `isFree`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 0, NULL, NULL),
(2, 1, 0, 4, 0, NULL, NULL),
(3, 1, 0, 8, 0, NULL, NULL),
(4, 2, 0, 5, 0, NULL, NULL),
(5, 1, 0, 4, 0, NULL, NULL),
(6, 1, 1, 3, 0, NULL, NULL),
(7, 1, 0, 4, 1, NULL, NULL),
(8, 1, 0, 6, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `address`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alaa', 'Nasr', 'alaanasr325@gmail.com', NULL, '$2y$10$eg5ssDtif5Fq.xb7kqx4Ouu0QVMhqA5Rfz/bqdFyz7rK79wetF/76', 'Lebanon', '12345', NULL, '2022-03-24 10:26:03', '2022-03-24 10:26:03'),
(2, 'Yousef', 'Ahmad', 'yousef@hotmail.com', NULL, '$2y$10$vJaxD7te4ZOBSlzIn0Eth.qUbOQNDJ05gwF.AlJOwJU87jaWRwRQy', 'Ouzaei', '12345', 'w0exDgAfJQVgbgv6rYrjxAaQyzw1cByW351EYYYNLpkaZ6wi0k68wkoRtndS', '2022-03-24 09:57:08', '2022-03-24 09:57:08'),
(3, 'Amir', 'Halabi', 'amir@gmail.com', NULL, '$2y$10$QFKQCCvEh/TzYSLYCMlIiuQlR/7WBlESNYKjxrq0d9WB.0mZGV5T6', 'Semqanieh', '12345', NULL, '2022-03-25 13:08:14', '2022-03-25 13:08:14'),
(4, 'Hasan', 'Fayad', 'hasan@hotmail.com', NULL, '$2y$10$TeHHDUgx6t1/ZNsbWde4yeHQQ9S9Zs.4qLT6Bxeyi76NGArrksqCG', 'Bati5', '111111111', NULL, '2022-03-29 13:54:29', '2022-03-29 13:54:29'),
(5, 'Alaa', 'Ahmad', 'alaaahmad@hotmail.com', NULL, '$2y$10$q0ILoh1zrowWQPPVGMjiLO1L1wCiHpl9NEGaD93vouUFH3Gz12UvO', 'Chouf, Lebanon', '81857392', NULL, '2022-05-07 09:24:45', '2022-05-07 09:24:45'),
(6, 'Ameer', 'halabi', 'amirh@hotma.com', NULL, '$2y$10$vaJHntdUunSWPAWxOlcAaeQtOOEa8do0rKMGDfAWcrA311a.XqrAa', 'Chouf, Lebanon', '1111', NULL, '2022-05-17 18:41:38', '2022-05-17 18:41:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menuID` (`menuID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ResID` (`ResID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resID` (`resID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tid` (`tid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `RID` (`RID`);

--
-- Indexes for table `resturents`
--
ALTER TABLE `resturents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RID` (`RID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `resturents`
--
ALTER TABLE `resturents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`menuID`) REFERENCES `menu` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`ResID`) REFERENCES `resturents` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`resID`) REFERENCES `resturents` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tables` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`RID`) REFERENCES `resturents` (`id`);

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_ibfk_1` FOREIGN KEY (`RID`) REFERENCES `resturents` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
