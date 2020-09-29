-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 29, 2020 at 10:24 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `path`, `size`, `views`) VALUES
(2, 'Chrysanthemum.jpg', 'img/', 879394, 27),
(3, 'Desert.jpg', 'img/', 845941, 16),
(4, 'Hydrangeas.jpg', 'img/', 595284, 4),
(5, 'Jellyfish.jpg', 'img/', 775702, 4),
(6, 'Koala.jpg', 'img/', 780831, 10),
(7, 'Lighthouse.jpg', 'img/', 561276, 30),
(8, 'Penguins.jpg', 'img/', 777835, 4),
(9, 'Tulips.jpg', 'img/', 620888, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
