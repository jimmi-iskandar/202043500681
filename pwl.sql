-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 04:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabelfilm`
--

CREATE TABLE `tabelfilm` (
  `id` int(10) NOT NULL,
  `cover` varchar(50) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `spoiler` text DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabelfilm`
--

INSERT INTO `tabelfilm` (`id`, `cover`, `judul`, `spoiler`, `harga`) VALUES
(37, '64d39189e8107.jpg', 'transformers rise of the beasts', 'When a new threat capable of destroying the entire planet emerges, Optimus Prime and the Autobots must team up with a powerful faction known as the Maximals', '200000'),
(38, '64d39226c6578.jpg', 'The Flash (2023)', 'On June 16, worlds collide. Watch the official trailer now for The Flash – only in theaters. #TheFlashMovie Warner Bros. Pictures presents “The Flash,” directed by Andy Muschietti (the “IT” films, “Mama”).', '20000'),
(39, '64d392ae394ea.jpg', 'Past Lives (2023)', 'Nora and Hae Sung, two deeply connected childhood friends, are wrest apart after Nora’s family emigrates from South Korea.', '20000'),
(40, '64d3931c515f1.jpg', 'The Super Mario Bros. Movie (2023)', 'While working underground to fix a water main, Brooklyn plumbers—and brothers—Mario and Luigi are transported down a mysterious pipe and wander into a magical new world', '20000'),
(41, '64d3936f40624.jpg', 'M3gan (2022)', 'A brilliant toy company roboticist uses artificial intelligence to develop M3GAN, a life-like doll programmed to emotionally bond with her newly orphaned niece', '20000'),
(44, '64d39673a810c.jpg', 'Jurassic World Dominion', 'l over the world. This fragile balance will reshape the future and determine, once and for all, whether human beings are to remain the apex predators on a planet they now share with history’s most fearsome creatures.', '2000'),
(45, '64d396cc2cdb6.jpg', 'The Last Warrior: Root of Evil', 'Kedamaian dan ketenangan telah hadir di Belogorie. Kejahatan dikalahkan dan Ivan sekarang menikmati ketenarannya yang memang layak', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `status`) VALUES
(27, 'iskandar2', 'jim.iskandar20@gmail.com', '$2y$10$3.13ChQdbUqAZ4DsDhsHDeN2.fVYRr6fELERuMWV/3aUH6GIGWYnK', 'user'),
(28, 'faiz', 'iskjik2@gmail.com', '$2y$10$72A72o3uYqd/1R.oBos.cuA6e.Z1q9D3poEf0RBh9Dymd0HZ683TG', 'Admin'),
(29, 'iskandar2@gmail.com', 'iskandar2@gmail.com', '$2y$10$boExRvXxyQPhxMEmWiHkyuUnq9VR0GLhk92xsGivKztwRcHM5DAfe', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabelfilm`
--
ALTER TABLE `tabelfilm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabelfilm`
--
ALTER TABLE `tabelfilm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
