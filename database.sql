-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 17, 2021 at 03:48 PM
-- Server version: 5.7.30
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `id_quest` int(11) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `id_quest`, `path`) VALUES
(5, 30, 'photos/about_bg.jpg'),
(6, 30, 'photos/bg_circle.jpg'),
(7, 30, 'photos/bg_main.jpg'),
(8, 32, 'photos/about_bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `lovecolor` text NOT NULL,
  `avatar` text NOT NULL,
  `merit` text NOT NULL,
  `options` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `fname`, `lname`, `tname`, `birthday`, `gender`, `lovecolor`, `avatar`, `merit`, `options`) VALUES
(29, 'oleg', 'kvasov', 'vital', '2021-01-12', 'муж', '#000000', 'avatars/', '', ''),
(30, 'oleg', 'kvasov', 'vital', '0000-00-00', '', '#000000', 'avatars/', '', ''),
(32, 'сыс', 'сы', 'сы', '2020-12-30', 'мужской', '#26fda0', 'avatars/about_bg.jpg', 'okeq', 'опрятность,самообучаемость');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
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
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;