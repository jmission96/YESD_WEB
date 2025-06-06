-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2025 at 03:33 PM
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
-- Database: `yesddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `link_to_fb` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `fullname`, `program`, `username`, `password`, `role`, `link_to_fb`, `image`) VALUES
(1, 'jose rebosquilio', 'BSCS 4B', 'jose', 'asd1234', 'Member', 'https://www.facebook.com/mission.joseph.espina', '495270102_703292198919863_4855056627368521343_n.jpg'),
(2, 'jose Rebosquilio', 'BSCS4B', 'joseadmin', 'asd123', 'admin', 'https://www.facebook.com/mission.joseph.espina', 'mission barong.jpg'),
(3, 'Joseph Espina Mission', 'BSCS', 'jose_user1', 'asd123', 'Member', 'https://www.facebook.com/mission.joseph.espina', 'mission toga no cap.jpg'),
(5, 'Buknoy Espina', 'BSCS', 'buknoy', 'asd123', 'Member', 'https://www.facebook.com/mission.joseph.espina', '486755014_669225168977807_2310352717415853649_n.jpg'),
(6, 'Joseph Espina Mission', 'BSCS', 'jose_admin1', 'asd123', 'Admin', 'https://www.facebook.com/mission.joseph.espina', '494859941_716163540993217_3418572299479879845_n.jpg'),
(11, 'Grace Salaum', 'BSA', 'grace123', 'asd123', 'Member', 'https://www.facebook.com/profile.php?id=100078656053299', '494867781_1732286370992521_68460861661792342_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `act_name` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `act_image` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `location` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `act_name`, `date`, `facebook`, `act_image`, `description`, `location`) VALUES
(1, 'tree planting', '2025-06-01', 'https://www.facebook.com/permalink.php?story_fbid=pfbid02PLMzkRwNoJDAwr2orHaS9AJK4SZiBsqRNZfGQxwdZC3PAFjRWFioar2HfWCPVPKel&id=61550744041535&rdid=de2WBN3LgkX57bRX#', 'recent_activity.jpg', 'Tree planting helps restore natural ecosystems, reduce carbon dioxide, and combat climate change. It also provides shade, improves air quality, and supports biodiversity in urban and rural areas.', 'Bohol Island State University'),
(2, 'mangroove planting', '2025-05-22', 'https://www.facebook.com/permalink.php?story_fbid=pfbid0UpwDx8MY37T15NxKiRDyJRj495puh3JTRSLchhBJMnzdoUs1VUurnjHUMTvBX82Al&id=61550744041535', 'mangrove-restoration.jpg', 'Mangrove planting protects coastal areas from erosion and storm surges while serving as a vital habitat for marine life.\r\nIt also improves water quality and helps capture carbon, contributing to climate change mitigation.\r\n', 'BISU Bilar Campus'),
(3, 'Reforestation', '2025-04-29', 'https://www.facebook.com/maylyn.torrejos.gamil/posts/pfbid02mvTExvhDGsENP3om2HMFGYWyobBAGt6Mi4b4JcDweFgL6Xe7NpdfLmmjVCwGmbLnl', 'reforestacion.jpg', 'Reforestation is the process of restoring forested areas that have been destroyed or degraded through replanting trees and encouraging natural regeneration. It\'s a crucial strategy for addressing deforestation, combating dese', 'Riverside, Bilar, Bohol'),
(4, 'Campus CleanUp', '2025-06-06', 'https://www.facebook.com/media/set/?set=a.114716526615801&type=3', 'bisu_bilar.jpg', 'A campus cleanup involves organizing and participating in activities to remove litter, clutter, and debris from a campus environment. These events can be organized by various groups, such as student organizations, faculty, or', 'BISU Bilar Campus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
