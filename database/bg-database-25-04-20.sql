-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 05:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bg-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `cer_id` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `path_certificate` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exprience`
--

CREATE TABLE `exprience` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `path_exprience` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exprience`
--

INSERT INTO `exprience` (`id`, `email`, `path_exprience`) VALUES
(87, 'electrician1@mail.com', 'uploads/2/electrician1@mail.com/exprience/6.jpg'),
(88, 'electrician1@mail.com', 'uploads/2/electrician1@mail.com/exprience/8.jpg'),
(89, 'electrician1@mail.com', 'uploads/2/electrician1@mail.com/exprience/logo.png'),
(90, 'electrician2@mail.com', 'uploads/2/electrician2@mail.com/exprience/6.jpg'),
(91, 'electrician2@mail.com', 'uploads/2/electrician2@mail.com/exprience/8.jpg'),
(92, 'electrician2@mail.com', 'uploads/2/electrician2@mail.com/exprience/logo.png'),
(93, 'plumber@mail.com', 'uploads/2/plumber@mail.com/exprience/6.jpg'),
(94, 'plumber@mail.com', 'uploads/2/plumber@mail.com/exprience/8.jpg'),
(95, 'plumber@mail.com', 'uploads/2/plumber@mail.com/exprience/logo.png'),
(96, 'plumber@mail.com', 'uploads/2/plumber@mail.com/exprience/'),
(97, 'painter@mail.com', 'uploads/2/painter@mail.com/exprience/6.jpg'),
(98, 'painter@mail.com', 'uploads/2/painter@mail.com/exprience/8.jpg'),
(99, 'painter@mail.com', 'uploads/2/painter@mail.com/exprience/logo.png'),
(100, 'painter@mail.com', 'uploads/2/painter@mail.com/exprience/'),
(101, 'plasterer@mail.com', 'uploads/2/plasterer@mail.com/exprience/6.jpg'),
(102, 'plasterer@mail.com', 'uploads/2/plasterer@mail.com/exprience/8.jpg'),
(103, 'plasterer@mail.com', 'uploads/2/plasterer@mail.com/exprience/logo.png'),
(104, 'plasterer@mail.com', 'uploads/2/plasterer@mail.com/exprience/'),
(105, 'metalworker@mail.com', 'uploads/2/metalworker@mail.com/exprience/6.jpg'),
(106, 'metalworker@mail.com', 'uploads/2/metalworker@mail.com/exprience/8.jpg'),
(107, 'metalworker@mail.com', 'uploads/2/metalworker@mail.com/exprience/logo.png'),
(108, 'carpenters@mail.com', 'uploads/2/carpenters@mail.com/exprience/6.jpg'),
(109, 'carpenters@mail.com', 'uploads/2/carpenters@mail.com/exprience/8.jpg'),
(110, 'carpenters@mail.com', 'uploads/2/carpenters@mail.com/exprience/logo.png'),
(111, 'roof-technician@mail.com', 'uploads/2/roof-technician@mail.com/exprience/6.jpg'),
(112, 'roof-technician@mail.com', 'uploads/2/roof-technician@mail.com/exprience/8.jpg'),
(113, 'roof-technician@mail.com', 'uploads/2/roof-technician@mail.com/exprience/logo.png'),
(114, 'electronic-technician@mail.com', 'uploads/2/electronic-technician@mail.com/exprience/6.jpg'),
(115, 'electronic-technician@mail.com', 'uploads/2/electronic-technician@mail.com/exprience/8.jpg'),
(116, 'electronic-technician@mail.com', 'uploads/2/electronic-technician@mail.com/exprience/logo.png'),
(117, 'benz@mail.com', 'uploads/2/benz@mail.com/exprience/3.png'),
(118, 'benz@mail.com', 'uploads/2/benz@mail.com/exprience/4.png'),
(119, 'benz@mail.com', 'uploads/2/benz@mail.com/exprience/5.png'),
(120, 'benz@mail.com', 'uploads/2/benz@mail.com/exprience/6.jpg'),
(121, 'benz@mail.com', 'uploads/2/benz@mail.com/exprience/8.jpg'),
(122, 'benz@mail.com', 'uploads/2/benz@mail.com/exprience/logo.png'),
(123, 'electrician3@mail.com', 'uploads/2/electrician3@mail.com/exprience/6.jpg'),
(124, 'electrician3@mail.com', 'uploads/2/electrician3@mail.com/exprience/8.jpg'),
(125, 'electrician3@mail.com', 'uploads/2/electrician3@mail.com/exprience/logo.png'),
(126, 'electrician3@mail.com', 'uploads/2/electrician3@mail.com/exprience/6.jpg'),
(127, 'electrician3@mail.com', 'uploads/2/electrician3@mail.com/exprience/8.jpg'),
(128, 'electrician3@mail.com', 'uploads/2/electrician3@mail.com/exprience/logo.png'),
(129, 'electrician3@mail.com', 'uploads/2/electrician3@mail.com/exprience/6.jpg'),
(130, 'electrician3@mail.com', 'uploads/2/electrician3@mail.com/exprience/8.jpg'),
(131, 'electrician3@mail.com', 'uploads/2/electrician3@mail.com/exprience/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `detail` varchar(1000) DEFAULT NULL,
  `status` enum('user','admin','technician') NOT NULL,
  `avatar_path` varchar(1000) DEFAULT NULL,
  `certificate_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `sex`, `address`, `contact`, `detail`, `status`, `avatar_path`, `certificate_id`) VALUES
(1, 'Test Email', 'Test Password', 'Test Firstname', 'Test Lastname', 'male', 'Test Address', 'Test Contact', 'Test Detail', 'admin', 'Test Avatar_id', 'Test Certificate_id	'),
(2, 'beam@mail.com', '$2y$10$VxxGNqTfDHc9SikyiX1Kg.lWEPS.XpGl3H/1VtJdeIkDlr7wjE0lK', 'Nantapong', 'Hermhag', 'male', '149 ประชาอุทิศ15 แขวง  ราษฎร์บูรณะเขต ราษฎร์บูรณะ กรุฃเทพมหานคร 10140', '0123456789', '', 'user', 'uploads/img/Avatar/1/beam@mail.com/3.png', NULL),
(3, 'electrician1@mail.com', '$2y$10$ch88d9R84GHGcUiT8zLaf.6ZTzbfCuo0zWXGmx71zFAkD1woei/oi', 'Electrician1', 'Electrician1', 'male', 'Electrician', 'Electrician', 'Electrician', 'technician', 'uploads/2/electrician1@mail.com/avatar/1.png', NULL),
(4, 'electrician2@mail.com', '$2y$10$tFrDjNH2TtW/QOWCTsrhgOwVfy5Eo04si0YlHwyAfgh04EH6qfuI2', 'Electrician2', 'Electrician2', 'male', 'Electrician2', 'Electrician2', 'Electrician', 'technician', 'uploads/2/electrician2@mail.com/avatar/1.png', NULL),
(5, 'electrician3@mail.com', '$2y$10$airy/PWItUSwICISjk4zveBjzryXmm8z8Z5fEb0IyeO5NurD2huDG', 'Electrician3', 'Electrician3', 'male', 'Electrician3', 'Electrician3', 'Electrician3', 'technician', 'uploads/2/electrician3@mail.com/avatar/1.png', NULL),
(6, 'electrician4@mail.com', '$2y$10$pcfqsQl9nX0OIsMPLPem3eaudbOUGs6sm2CNfUViJ7tl7YVcTpjmq', 'Electrician4', 'Electrician4', 'male', 'Electrician4', 'Electrician4', 'Electrician4', 'technician', 'uploads/2/electrician4@mail.com/avatar/1.png', NULL),
(7, 'electrician5@mail.com', '$2y$10$B8JXm56BTFxpOaHjZkj6c.U3Qu3Esz2Ijh0gUc6bfhQAi5uPxQDAK', 'Electrician5', 'Electrician5', 'male', 'Electrician5', 'Electrician5', 'Electrician5', 'technician', 'uploads/2/electrician5@mail.com/avatar/1.png', NULL),
(8, 'electrician6@mail.com', '$2y$10$w2f9sF/O4aYibKrt69H1BuOkCpWK3YI4AlfRZKYSFP4m9HOFNK9Su', 'Electrician6', 'Electrician6', 'male', 'Electrician6', 'Electrician6', 'Electrician6', 'technician', 'uploads/2/electrician6@mail.com/avatar/1.png', NULL),
(9, 'electrician7@mail.com', '$2y$10$uQgl7XilJuzZnaYwtjzIouzvuGiwcHYwnzF2etfvIVDwBJ6VLMFEm', 'Electrician7', 'Electrician7', 'male', 'Electrician7', 'Electrician7', 'Electrician7', 'technician', 'uploads/2/electrician7@mail.com/avatar/1.png', NULL),
(10, 'plumber@mail.com', '$2y$10$pafFiZ3nnncAGXJ/o1o1E.jE5Jzgo95jjl0C8x00AImF11DTO8Jfm', 'Plumber1', 'Plumber1', 'male', 'Plumber1', 'Plumber1', 'Plumber', 'technician', 'uploads/2/plumber@mail.com/avatar/2.jpg', NULL),
(11, 'painter@mail.com', '$2y$10$GwUfhmz9Z01OjH4QOaLf4eNG7BK2xhLfbAl8XfkR8/057XLQCdmx6', 'Painter1', 'Painter1', 'male', 'Painter1', 'Painter1', 'Painter1', 'technician', 'uploads/2/painter@mail.com/avatar/3.png', NULL),
(12, 'plasterer@mail.com', '$2y$10$BAJgHEgXI4TLHMxY6Wuwj.5vW.lnO.Pz43aR3JRI24Gq8HUB9B34W', 'Plasterer1', 'Plasterer1', 'male', 'Plasterer1', 'Plasterer1', 'Plasterer1', 'technician', 'uploads/2/plasterer@mail.com/avatar/3.png', NULL),
(13, 'metalworker@mail.com', '$2y$10$5nGkcMTU3hPAWFM4SQ2g1uJC0oARoQqB3xBk.rlp/Xyj8kB1S.l/W', 'Metalworker1', 'Metalworker1', 'male', 'Metalworker1', 'Metalworker1', 'Metalworker1', 'technician', 'uploads/2/metalworker@mail.com/avatar/5.png', NULL),
(14, 'carpenters@mail.com', '$2y$10$chDRIr7iRBspthKHuYKwsOn8BXdXPauxFJvc5FUvmrn/4w99duM32', 'Carpenters1', 'Carpenters1', 'male', 'Carpenters1', 'Carpenters1', 'Carpenters1', 'technician', 'uploads/2/carpenters@mail.com/avatar/2.jpg', NULL),
(15, 'roof-technician@mail.com', '$2y$10$dmgzYcAu8pt2KdzvPipH2.MIpyijnxlt5kZBzUVDgqREE4hqUE88y', 'Roof-technician1', 'Roof-technician1', 'male', 'Roof-technician1', 'Roof-technician1', 'Roof-technician1', 'technician', 'uploads/2/roof-technician@mail.com/avatar/1.png', NULL),
(16, 'electronic-technician@mail.com', '$2y$10$69Qu3O08QdUQVYHkP5Mj3OwIW0zLLgPCiMSWcia65nqupLnlJI7yO', 'Electronic-technician1', 'Electronic-technician1', 'female', 'Electronic-technician1', 'Electronic-technician1', 'Electronic-technician1', 'technician', 'uploads/2/electronic-technician@mail.com/avatar/4.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `work_name` enum('Electrician','Plumber','Painter','Plasterer','Metalworker','Carpenters','Roof-technician','Electronic-technician') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `email`, `work_name`) VALUES
(12, 'electrician1@mail.com', 'Electrician'),
(13, 'electrician2@mail.com', 'Electrician'),
(14, 'plumber@mail.com', 'Plumber'),
(15, 'painter@mail.com', 'Painter'),
(16, 'plasterer@mail.com', 'Plasterer'),
(17, 'metalworker@mail.com', 'Metalworker'),
(18, 'carpenters@mail.com', 'Carpenters'),
(19, 'roof-technician@mail.com', 'Roof-technician'),
(20, 'electronic-technician@mail.com', 'Electronic-technician'),
(23, 'benz@mail.com', 'Electrician'),
(24, 'benz@mail.com', 'Plumber'),
(25, 'benz@mail.com', 'Painter'),
(26, 'benz@mail.com', 'Metalworker'),
(27, 'benz@mail.com', 'Carpenters'),
(28, 'benz@mail.com', 'Electronic-technician'),
(32, 'electrician3@mail.com', 'Electrician'),
(33, 'electrician4@mail.com', 'Electrician'),
(34, 'electrician5@mail.com', 'Electrician'),
(35, 'electrician6@mail.com', 'Electrician'),
(36, 'electrician7@mail.com', 'Electrician');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exprience`
--
ALTER TABLE `exprience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exprience`
--
ALTER TABLE `exprience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
