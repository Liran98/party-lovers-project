-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 09, 2024 at 07:32 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `party_lovers`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `theme_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `package_selection` varchar(255) NOT NULL,
  `event_image` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `theme_type`, `date`, `package_selection`, `event_image`, `title`, `description`) VALUES
(3, 'super heros', '2024-06-05', 'popcorn', 'https://images.squarespace-cdn.com/content/v1/57f7ea3d03596eb277b15ac1/55e341c2-9c14-41e8-83cf-547c7b82c273/avengersballoons.jpg', 'avengers', 'one of our best themes so far'),
(4, 'adventure', '2024-06-26', 'baloons , cotton candy , chocolate fountain', 'https://karaspartyideas.com/wp-content/uploads/2014/02/minecraft1.jpg', 'minecraft', 'Join us for an unforgettable adventure at our Minecraft IRL Party, where the pixelated wonders of your favorite game come to life!'),
(6, 'super heros', '2024-06-05', 'popcorn', 'https://images.squarespace-cdn.com/content/v1/57f7ea3d03596eb277b15ac1/55e341c2-9c14-41e8-83cf-547c7b82c273/avengersballoons.jpg', 'avengers', 'one of our best themes so far'),
(7, 'adventure', '2024-06-26', 'baloons , cotton candy , chocolate fountain', 'https://karaspartyideas.com/wp-content/uploads/2014/02/minecraft1.jpg', 'minecraft', 'Join us for an unforgettable adventure at our Minecraft IRL Party, where the pixelated wonders of your favorite game come to life!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
