-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 06:23 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodranger`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `name_event` varchar(255) NOT NULL,
  `description_event` varchar(255) NOT NULL,
  `open_start` varchar(255) NOT NULL,
  `open_end` varchar(255) NOT NULL,
  `date_event` varchar(255) NOT NULL,
  `end_event` varchar(255) NOT NULL,
  `time_start` varchar(255) NOT NULL,
  `time_end` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `name_event`, `description_event`, `open_start`, `open_end`, `date_event`, `end_event`, `time_start`, `time_end`, `pic`, `user_id`, `phone`) VALUES
(1, 'Sejuta Berkat Lewat Nasi', 'Event yang bertujuan untuk memberikan bantuan berupa nasi bungkus kepada orang yang tidak mampu.', '2019-11-29', '2019-12-10', '2019-12-01', '2019-12-25', '07:30:00', '13:00:00', 'Sania', 1, '08115566888'),
(3, 'Rescue the Food', 'Event yang bertujuan untuk memberikan bantuan berupa nasi bungkus kepada orang yang tidak mampu.', '2019-11-27', '2019-12-15', '2019-12-20', '2019-12-25', '07:00:00', '16:00:00', 'Harry', 1, '0815556644'),
(4, 'Nasi Bungkus Penyambung Hidup', 'Membagikan nasi bungkus untuk tukang becak dan supir angkot', '2019-11-27', '2019-11-30', '2019-11-29', '2019-12-21', '09:00:00', '13:00:00', 'Hendrawan', 2, '085555111111'),
(5, 'Sejuta Nasi Untuk Bersama', 'Sejuta nasi untuk membantu saudara kita yang memerlukan', '2019-11-28', '2019-11-29', '2019-11-28', '2019-11-30', '07:00:00', '14:00:00', 'Hendrik Wijaya', 2, '0815698753222');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `url`) VALUES
(1, 'Register', 'Register');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'Donatur'),
(2, 'Recipient'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type`) VALUES
(1, 'Organization'),
(2, 'Individual'),
(3, 'Goverment');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `motto` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `city`, `address`, `email`, `password`, `role_id`, `type_id`, `active`, `motto`, `picture`) VALUES
(1, '_evandruce', 'PT. Maju Maju Aja', 'Palembang', 'Jl. Keloma V', 'vand.filbert@gmail.com', '$2y$10$Jc58KxzWwntSGuDFRAK5xu1WGo5ZGUd1W.irFJ5Fdso6JZgaP4R5q', 2, 1, 1, 'Hidup ini harus jadi berkat bagi sesama !', 'library.png'),
(2, 'cobacoba', 'PT. Coba Coba', 'Magelang', 'Jl. Sesama', 'coba@coba.com', '$2y$10$Jc58KxzWwntSGuDFRAK5xu1WGo5ZGUd1W.irFJ5Fdso6JZgaP4R5q', 1, 2, 1, 'Hidup adalah berkat !', 'defaultProf.png');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `motivation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id`, `name`, `gender`, `city`, `address`, `phone`, `email`, `motivation`) VALUES
(1, 'sdad', 'Male', 'dasdsasadsad', 'dsdad', '', '', 'dasdasda'),
(2, 'dsda', 'Female', 'sdasdda', 'dsdasdasdasd', '', '', 'sdasdas'),
(3, 'gggg', 'Female', 'sdsa', 'sssss', '', '', 'sdsadasd'),
(4, 'Hendra Winata', 'Male', 'Surabaya', 'Pakuwon', '0855662', 'hendra@mail.com', 'Ingin selesai techno'),
(5, 'Evand', 'Male', 'Surabaya', 'Anything', '564564564', 'vand@mail.com', 'hjkshjkds'),
(9, 'Vand', 'Female', 'dawdwdaw', 'Kaping Air', '5566565', 'coba@mail.com', 'wdawd'),
(10, 'Vand', 'Female', 'Surabaya', 'Kaping Air', '5566565', 'coba2@mail.com', 'dasdasd'),
(11, 'Hendra', 'Male', 'Magelang', 'Jl. Panca Indra', '0855555', 'hendra2@mail.com', 'ingin membantu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
