-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 12:40 AM
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

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `cer_id`, `email`, `path_certificate`) VALUES
(7, '', 'test11@mail.com', 'uploads/2/test11@mail.com/certificate/user.jpg'),
(8, '', 'test11@mail.com', 'uploads/2/test11@mail.com/certificate/wait.jpg'),
(9, '', 'test11@mail.com', 'uploads/2/test11@mail.com/certificate/wait-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `text` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `technician_id`, `user_id`, `text`, `date`) VALUES
(4, 88, 86, 'Hello !!', '2020-04-26 20:50:19'),
(5, 88, 87, 'Hi, How are you ?', '2020-04-26 20:50:22'),
(6, 88, 86, 'I\'m OK, Thank and you ?', '2020-04-26 20:50:23'),
(7, 88, 87, 'I\'m OK, Thank.', '2020-04-26 20:50:25'),
(8, 88, 86, 'เสร็จแล้ว โว้ยยยยยยย !!!', '2020-04-26 21:52:17');

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
(131, 'electrician3@mail.com', 'uploads/2/electrician3@mail.com/exprience/logo.png'),
(144, 'technician1@mail.com', 'uploads/2/technician1@mail.com/exprience/1.png'),
(145, 'technician1@mail.com', 'uploads/2/technician1@mail.com/exprience/2.jpg'),
(146, 'test11@mail.com', 'uploads/2/test11@mail.com/exprience/1.png'),
(147, 'test11@mail.com', 'uploads/2/test11@mail.com/exprience/2.jpg'),
(148, 'test11@mail.com', 'uploads/2/test11@mail.com/exprience/3.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `email`, `text`, `time`) VALUES
(3, '88', 'technician1@mail.com', 'เปลี่ยน', '2020-04-26 16:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `star`
--

CREATE TABLE `star` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `technician_id` int(10) NOT NULL,
  `point` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `star`
--

INSERT INTO `star` (`id`, `user_id`, `technician_id`, `point`) VALUES
(3, 1, 88, 1),
(4, 2, 88, 2),
(5, 3, 88, 3),
(6, 4, 88, 4),
(51, 86, 88, 5);

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
  `status` enum('user','admin','technician','wait','wait-fix','fixed') NOT NULL,
  `avatar_path` varchar(1000) DEFAULT NULL,
  `certificate_id` varchar(100) DEFAULT NULL,
  `star` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `sex`, `address`, `contact`, `detail`, `status`, `avatar_path`, `certificate_id`, `star`) VALUES
(2, 'beam@mail.com', '$2y$10$VxxGNqTfDHc9SikyiX1Kg.lWEPS.XpGl3H/1VtJdeIkDlr7wjE0lK', 'beam', 'beam', 'male', '', '0123456789', '', 'admin', 'uploads/img/Avatar/1/beam@mail.com/3.png', NULL, 0),
(86, 'user1@mail.com', '$2y$10$5xjRkB55P2dmbEKb9w4qkuUBXjYVh5ku/1wb.3J5drXw77q6HTSru', 'user1', 'user1', 'male', 'user1', '0123456789', NULL, 'user', 'uploads/1/user1@mail.com/avatar/5.png', NULL, 0),
(87, 'user2@mail.com', '$2y$10$.8VAJSQ9hg0GgwqQSSWkSea/Pzj8yErXHOnGbh3eMBuh7FVhheSC.', 'user2', 'user2', 'male', 'user2', '0123456789', NULL, 'user', 'uploads/1/user2@mail.com/avatar/4.png', NULL, 0),
(88, 'technician1@mail.com', '$2y$10$MMoXMfsyof8JCbypXFOI0u.ltaom/o.C74SO0h/tKb68fMtfZaD1W', 'technician1', 'technician1', 'male', 'technician1', '0802812563', 'technician1', 'technician', 'uploads/2/technician1@mail.com/avatar/2.jpg', NULL, 3),
(89, 'technician2@mail.com', '$2y$10$nrHEm9l54lLEe2NvMf1yF.oyQqsb3PXDUofEAIQztzK2htZbEVPIS', 'technician2', 'technician2', 'male', 'technician2', 'technician2', 'technician2', 'technician', 'uploads/2/technician2@mail.com/avatar/1.png', NULL, 0),
(90, 'technician3@mail.com', '$2y$10$VbLNXtkfMtB2M.6bXRqyeeDxk9mhOHLCgTSzSV4Ov/ujo2Jr9GWou', 'technician3', 'technician3', 'male', 'technician3', 'technician3', 'technician3', 'technician', '', NULL, 0),
(91, 'test11@mail.com', '$2y$10$pHSuYYmYQHYWc8CDLP4oL.lzSl/G1TFMmOzY.NB8Utjr9ZiNspjdS', 'Test11', 'test11', 'male', '321321', '3213213', '3213132', 'technician', 'uploads/2/test11@mail.com/avatar/2.jpg', NULL, 0);

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
(72, 'technician1@mail.com', 'Electrician'),
(73, 'technician2@mail.com', 'Electrician'),
(74, 'technician3@mail.com', 'Electrician'),
(75, 'test11@mail.com', 'Electrician');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exprience`
--
ALTER TABLE `exprience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `star`
--
ALTER TABLE `star`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exprience`
--
ALTER TABLE `exprience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `star`
--
ALTER TABLE `star`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
