-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 06:14 PM
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
-- Database: `s9cuski8d4sc8xhe`
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

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `me_id` int(11) NOT NULL,
  `you_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `me_id`, `you_id`, `message`, `date`) VALUES
(1, 99, 92, 'สวัสดี 99-92', '2020-04-29 05:42:05'),
(2, 92, 99, 'สวัสดี มีอะไรให่ช่วยครับ 92-99', '2020-04-29 05:42:40'),
(3, 99, 92, 'สอบถาม เรื่องไฟฟ้า ครับ 99-92', '2020-04-29 05:43:05'),
(4, 92, 99, 'ไฟฟ้ามีปัญหา อะไรหรอครับ 92-99', '2020-04-29 05:43:34'),
(5, 92, 99, 'ลองเล่าปัญหา เดียวผม จะลอง ดูว่า น่าจะเกิดจากสาเหตุใดนะครับ 92-99', '2020-04-29 05:44:11'),
(6, 99, 92, '99 คุย 92', '2020-04-29 05:44:26'),
(7, 92, 97, '92 คุย 97', '2020-04-29 14:04:00'),
(8, 97, 92, '97 คุย 92', '2020-04-29 14:04:30'),
(9, 99, 96, '99 คุย 96', '2020-04-29 14:04:45'),
(10, 99, 92, '99 คุย 92 ต่อ', '2020-04-29 16:06:41'),
(11, 99, 92, '99 คุย 92 ต่อ ต่อ', '2020-04-29 16:08:04'),
(12, 99, 92, '99 คุย 92 ต่อ ต่อ ต่อ', '2020-04-29 16:10:06');

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
(54, 92, 99, 'Hi', '2020-04-29 04:09:08'),
(55, 92, 99, 'test', '2020-04-29 04:09:12'),
(56, 92, 99, 'b450', '2020-04-29 04:09:14'),
(57, 92, 99, 'เสร็จแล้ว โว้ยยยยยยย !!!', '2020-04-29 04:09:16'),
(58, 92, 99, 'Hi', '2020-04-29 04:09:18'),
(59, 92, 99, 'test', '2020-04-29 04:09:20'),
(60, 92, 99, 'asdasdasd', '2020-04-29 04:15:00'),
(61, 92, 99, 'afafa', '2020-04-29 04:15:25'),
(62, 92, 99, 'adad', '2020-04-29 04:17:20'),
(63, 92, 99, 'gggg', '2020-04-29 04:17:23'),
(64, 92, 99, 'เสร็จแล้ว โว้ยยยยยยย !!!', '2020-04-29 04:23:10'),
(65, 92, 99, 'เสร็จแล้ว โว้ยยยยยยย !!!', '2020-04-29 04:24:30'),
(66, 92, 99, 'GGGGG', '2020-04-29 04:24:45'),
(67, 92, 99, 'aaaa', '2020-04-29 04:24:49'),
(68, 92, 99, 'afafaf', '2020-04-29 04:32:24'),
(69, 92, 99, 'ฟฟฟฟ', '2020-04-29 04:54:18'),
(70, 92, 99, 'adadaadad', '2020-04-29 04:57:30'),
(71, 92, 99, 'afafaf', '2020-04-29 04:57:40'),
(72, 92, 99, 'ddhdh', '2020-04-29 04:57:54'),
(73, 92, 99, 'fafafa', '2020-04-29 04:58:35'),
(74, 92, 99, 'afafa', '2020-04-29 04:58:44'),
(75, 92, 99, 'afafa', '2020-04-29 04:59:02'),
(76, 92, 99, 'afafaafaf', '2020-04-29 04:59:13'),
(77, 92, 99, 'afafaafaf', '2020-04-29 04:59:31'),
(78, 92, 99, 'afafaf', '2020-04-29 04:59:40'),
(79, 92, 99, 'afafaf', '2020-04-29 05:00:23'),
(80, 92, 99, 'afafafagag', '2020-04-29 05:01:11'),
(81, 92, 99, 'สวัสดี', '2020-04-29 16:08:18');

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
(1, 'test1@mail.com', '$2y$10$zZKOseXKHMh5qs0GcvT5XOTLHvsvM7aVAgcrimxmAydiI98KWeJLG', 'test1@mail.com', 'test1@mail.com', 'male', 'test1@mail.com', 'test1@mail.com', 'test1@mail.com', 'technician', 'uploads/2/test1@mail.com/avatar/4.png', NULL, 3.5),
(2, 'test2@mail.com', '$2y$10$qZ0UZnPakOhm3Yo7Nv6ryOsnydKm04ThaJP0czneCtQo7ixV0Dc3G', 'test2@mail.com', 'test2@mail.com', 'male', 'test2@mail.com', 'test2@mail.com', 'test2@mail.com', 'technician', 'uploads/2/test2@mail.com/avatar/2.jpg', NULL, 0),
(3, 'beam@mail.com', '$2y$10$la4V590RCwo6ye0xzIqCRuIlv9SQt0x9wVDrawSLPxNqm9M99L9G2', 'admin', 'admin', 'male', '1234', '0123456789', '12123132', 'admin', 'uploads/2/beam@mail.com/avatar/logo.png', NULL, 0);


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
-- Indexes for table `chat`
--
ALTER TABLE `chat`
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
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
