-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 01:38 PM
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
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `career_name` enum('Electrician','Plumber','Painter','Plasterer','Metalworker','Carpenters','Roof-technician','Electronic-technician') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `email`, `career_name`) VALUES
(78, 'test2@mail.com', 'Electrician'),
(79, 'test4@mail.com', 'Electrician'),
(81, 'test5@mail.com', 'Electrician'),
(94, 'test1@mail.com', 'Electrician'),
(107, 'test8@mail.com', 'Carpenters'),
(108, 'test8@mail.com', 'Roof-technician'),
(109, 'test8@mail.com', 'Electronic-technician'),
(110, 'test9@mail.com', 'Electrician');

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
(10, '', 'test1@mail.com', 'uploads/2/test1@mail.com/certificate/not.jpg'),
(11, '', 'test1@mail.com', 'uploads/2/test1@mail.com/certificate/pass.jpg'),
(12, '', 'test1@mail.com', 'uploads/2/test1@mail.com/certificate/user.jpg'),
(13, '', 'test1@mail.com', 'uploads/2/test1@mail.com/certificate/wait.jpg'),
(14, '', 'test1@mail.com', 'uploads/2/test1@mail.com/certificate/wait-2.jpg'),
(15, '', 'test2@mail.com', 'uploads/2/test2@mail.com/certificate/wait.jpg'),
(16, '', 'test2@mail.com', 'uploads/2/test2@mail.com/certificate/wait-2.jpg'),
(17, '', 'test2@mail.com', 'uploads/2/test2@mail.com/certificate/'),
(23, '', 'test8@mail.com', 'uploads/100/test8@mail.com/certificate/3.png');

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
(19, 92, 92, 'Hi', '2020-04-26 23:18:03'),
(20, 92, 92, 'เสร็จแล้ว โว้ยยยยยยย !!!', '2020-04-26 23:21:59'),
(21, 92, 92, 'Hi', '2020-04-26 23:23:01'),
(22, 92, 92, 'test', '2020-04-26 23:23:07'),
(23, 92, 92, 'b450', '2020-04-26 23:34:00'),
(24, 92, 92, 'GGGGG', '2020-04-26 23:34:18'),
(25, 92, 99, 'Test', '2020-04-27 07:17:39'),
(26, 92, 99, 'Hi', '2020-04-27 07:17:44'),
(27, 92, 99, 'เวลาล่าสุด', '2020-04-27 07:30:01'),
(28, 92, 99, 'ฟดฟดฟ', '2020-04-27 07:30:13'),
(29, 92, 99, 'ฟหด', '2020-04-27 07:30:15'),
(30, 92, 99, 'ฟดฟ', '2020-04-27 07:30:17'),
(31, 92, 99, 'เเเ', '2020-04-27 07:30:18'),
(32, 92, 99, 'เฟเฟ', '2020-04-27 07:30:19'),
(33, 92, 99, 'ฟเฟเ', '2020-04-27 07:30:21'),
(34, 92, 99, 'afafafsf', '2020-04-27 07:38:19'),
(35, 92, 99, '', '2020-04-27 09:08:36'),
(36, 92, 99, '', '2020-04-27 09:08:39'),
(37, 92, 99, '', '2020-04-27 09:09:08'),
(38, 92, 99, 'sdasd', '2020-04-27 09:14:13'),
(39, 92, 100, 'รรรรฟหดฟหดส', '2020-04-27 09:25:55'),
(40, 92, 100, 'ฟหดฟหดฟหเเฟเฟหเ', '2020-04-27 09:25:59'),
(41, 92, 100, 'เ่หเ่ก้เ่', '2020-04-27 09:26:02'),
(42, 92, 100, 'ปแอิปแอิ', '2020-04-27 09:26:04'),
(43, 92, 100, 'ก่ดเ่กดเ่', '2020-04-27 09:26:05'),
(44, 92, 100, 'ฟหเฟหเฟหเ', '2020-04-27 09:26:18'),
(45, 92, 100, 'ฟด้หกด้หด', '2020-04-27 09:26:20'),
(46, 92, 100, '', '2020-04-27 09:26:21'),
(47, 92, 100, 'หกด้หกด้', '2020-04-27 09:26:22'),
(48, 92, 100, '', '2020-04-27 09:26:23'),
(49, 92, 100, '', '2020-04-27 09:26:23'),
(50, 92, 100, '', '2020-04-27 09:26:23'),
(51, 92, 100, '', '2020-04-27 09:26:24'),
(52, 92, 100, '', '2020-04-27 09:26:24'),
(53, 92, 100, 'ฟฆฌโฤฆฌฤฏฌ', '2020-04-27 09:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `amount` int(11) NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `user_id`, `item`, `price`, `amount`, `total_price`) VALUES
(7, 99, 'test1', 100, 1, 100),
(8, 99, 'test1', 100, 1, 100),
(9, 99, 'test1', 100, 1, 100),
(10, 99, 'test1', 100, 1, 100),
(11, 99, 'test1', 100, 1, 100),
(12, 99, 'test1', 100, 1, 100),
(13, 99, 'test1', 100, 1, 100),
(14, 99, 'test1', 100, 1, 100),
(15, 99, 'test1', 100, 1, 100),
(16, 99, 'test1', 100, 1, 100),
(17, 99, 'test1', 100, 1, 100),
(18, 99, 'test1', 100, 1, 100),
(19, 99, 'test1', 100, 1, 100),
(20, 99, 'test1', 100, 1, 100),
(21, 99, 'test1', 100, 1, 100),
(22, 99, 'test1', 100, 1, 100),
(23, 99, 'test1', 100, 1, 100),
(24, 99, 'test1', 100, 1, 100),
(25, 99, 'test1', 100, 1, 100),
(26, 99, 'test1', 100, 1, 100),
(27, 99, 'test1', 100, 1, 100),
(28, 99, 'test1', 100, 1, 100),
(29, 99, 'test1', 100, 1, 100),
(30, 99, 'test1', 100, 1, 100),
(31, 99, 'test1', 100, 1, 100),
(32, 99, 'test1', 100, 1, 100),
(33, 99, 'test1', 100, 1, 100),
(34, 99, 'test1', 100, 1, 100),
(35, 99, 'test1', 100, 1, 100),
(36, 99, 'test1', 100, 1, 100),
(37, 99, 'test1', 100, 1, 100),
(38, 99, 'test1', 100, 1, 100);

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
(153, 'test2@mail.com', 'uploads/2/test2@mail.com/exprience/1.png'),
(154, 'test2@mail.com', 'uploads/2/test2@mail.com/exprience/2.jpg'),
(155, 'test2@mail.com', 'uploads/2/test2@mail.com/exprience/3.png'),
(156, 'test4@mail.com', 'uploads/2/test4@mail.com/exprience/'),
(165, 'test1@mail.com', 'uploads/2/test1@mail.com/exprience/3.png'),
(166, 'test1@mail.com', 'uploads/2/test1@mail.com/exprience/4.png'),
(167, 'test1@mail.com', 'uploads/2/test1@mail.com/exprience/5.png'),
(168, 'test1@mail.com', 'uploads/2/test1@mail.com/exprience/6.jpg'),
(182, 'test8@mail.com', 'uploads/100/test8@mail.com/exprience/2.jpg');

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
(52, 99, 92, 3),
(53, 100, 92, 4);

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
(92, 'test1@mail.com', '$2y$10$zZKOseXKHMh5qs0GcvT5XOTLHvsvM7aVAgcrimxmAydiI98KWeJLG', 'test1@mail.com', 'test1@mail.com', 'male', 'test1@mail.com', 'test1@mail.com', 'test1@mail.com', 'technician', 'uploads/2/test1@mail.com/avatar/4.png', NULL, 3.5),
(93, 'test2@mail.com', '$2y$10$qZ0UZnPakOhm3Yo7Nv6ryOsnydKm04ThaJP0czneCtQo7ixV0Dc3G', 'test2@mail.com', 'test2@mail.com', 'male', 'test2@mail.com', 'test2@mail.com', 'test2@mail.com', 'technician', 'uploads/2/test2@mail.com/avatar/2.jpg', NULL, 0),
(94, 'test3@mail.com', '$2y$10$AZgzqMBBQp5b649nxI6N2eHP5YOBBSU.5cIyrRSW0ZVQkqjJZMYby', 'test2@mail.com', 'test2@mail.com', 'male', 'test2@mail.com', 'test2@mail.com', 'test2@mail.com', 'technician', 'uploads/2/test3@mail.com/avatar/2.jpg', NULL, 0),
(95, 'test4@mail.com', '$2y$10$ShsojVjUHxNtWlULcflzquL96KIeA/Gx9NVqSsElMCf8VNCtOV3.e', 'test4@mail.com', 'test4@mail.com', 'male', 'test4@mail.com', 'test4@mail.com', 'test4@mail.com', 'technician', 'uploads/2/test4@mail.com/avatar/3.png', NULL, 0),
(96, 'test5@mail.com', '$2y$10$gb9XuXALNvjd0hxHSTSnyenl68.GNCPXUo88yHmK/YRIiKKyH/dQW', 'test5@mail.com', 'test5@mail.com', 'male', 'test5@mail.com', 'test5@mail.com', 'test5@mail.com', 'technician', 'uploads/2/test5@mail.com/avatar/2.jpg', NULL, 0),
(97, 'test6@mail.com', '$2y$10$xlrAEN6dcMIVGX7jRzIcJ.EzubL/Du43tqHcV0fpfZwCuY2vV/Neq', 'test6@mail.com', 'test6@mail.com', 'male', 'test6@mail.com', 'test6@mail.com', 'test6@mail.com', 'technician', 'uploads/2/test6@mail.com/avatar/5.png', NULL, 0),
(98, 'beam@mail.com', '$2y$10$la4V590RCwo6ye0xzIqCRuIlv9SQt0x9wVDrawSLPxNqm9M99L9G2', 'admin', 'admin', 'male', '1234', '0123456789', '12123132', 'admin', 'uploads/2/beam@mail.com/avatar/logo.png', NULL, 0),
(99, 'user1@mail.com', '$2y$10$oklx3iV0rPR4UUsyTsXQneMwEPGh2er5KZLiUJ3pYm4Q91..ZQY8u', 'user1', 'user1', 'male', 'user1', '0123456789', NULL, 'user', 'uploads/1/user1@mail.com/avatar/3.png', NULL, 0),
(100, 'test8@mail.com', '$2y$10$TyApOnjibusPvq1EAIXgYejvD.8muFgKgH89vEx0N.m/s2JBaSqYu', 'test8', 'test8', 'male', 'test8', 'test8', 'test8', 'technician', 'uploads/2/test8@mail.com/avatar/2.jpg', NULL, 0),
(101, 'tafafafaest8@mail.com', '$2y$10$/WB2BiZYKMZR.sbBW5aehuU9c339Zt6tLTodjt2EnRvEjNsHevB72', 'afafaf', 'afafaf', 'male', 'afafaafa', '0123456789', NULL, 'user', 'uploads/1/tafafafaest8@mail.com/avatar/', NULL, 0),
(102, 'tafafafaadadest8@mail.com', '$2y$10$rQZjkvkmo6jOW/CuHtLeqefUp8JbljqIZD1qq30FqAR0lNuV/qY/C', 'afafaf', 'afafaf', 'male', 'afafaafa', '0123456789', NULL, 'user', 'uploads/1/tafafafaadadest8@mail.com/avatar/', NULL, 0),
(103, 'user8@mail.com', '$2y$10$6BQMPgrVUo10UXDtMwCU.ur6/gjyyGaLXIeqw0XtqabPkhPNB/RDa', 'afafaf', 'afafaf', 'male', 'afafaafa', '0123456789', NULL, 'user', 'uploads/1/user8@mail.com/avatar/', NULL, 0),
(104, 'user9@mail.com', '$2y$10$k.T1oTZ6tkvkOTBCwdumoOr01vWPLq.IOS9f9hvlMTDr5q1d3uQym', 'asdas', 'afafafs', 'male', 'fasf', '0123456789', NULL, 'user', 'uploads/1/user9@mail.com/avatar/', NULL, 0),
(105, 'user10@mail.com', '$2y$10$9H8IoFW9AC//ZGzuHrdQJ.wYpp6l40.iFQ7GjnqMAXyuviKQ6tfI2', 'asda', 'fafa', 'male', 'afafa', '0123456789', NULL, 'user', 'uploads/1/user10@mail.com/avatar/', NULL, 0),
(106, 'user11@mail.com', '$2y$10$.FInnm8GLeU7HUyKogWCA.eRxbGwOxeWbiSetT1pEeAwli8sr7rZq', 'asdas', 'afafafs', 'male', 'fasf', '0123456789', NULL, 'user', 'img/1.png', NULL, 0),
(107, 'user12@mail.com', '$2y$10$B.5WVX7ZqE2JK1rnP8QLMu4UgveQUZ72Ixc1PoisecrCNncK9DbES', 'asdas', 'afafafs', 'male', 'fasf', '0123456789', NULL, 'user', 'uploads/1/user12@mail.com/avatar/3.png', NULL, 0),
(108, 'test9@mail.com', '$2y$10$KtFLAk3C6YhMDJp4.c1H4ek5d24A9c3ho5TTFg0Nw.iFa2HtiBPFW', 'afaf', 'affafa', 'male', 'afafafaf', 'afafafaf', 'afafsfasfs', 'wait', '', NULL, 0),
(109, 'test10@mail.com', '$2y$10$gE0LRm2vTS5AjLVwgvRS..jeLVI1/DSdZ8kQqVsx6gaElriQ9lFa2', 'asfa', 'sfasf', 'male', 'asfasf', 'fasfasf', 'fasfs', 'wait', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(10) NOT NULL,
  `work_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `technicain_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
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
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `exprience`
--
ALTER TABLE `exprience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `star`
--
ALTER TABLE `star`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
