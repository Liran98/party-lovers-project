-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 10, 2024 at 08:08 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `package_selected_id` int(11) NOT NULL,
  `cart_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `theme_type` varchar(255) NOT NULL,
  `event_image` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `theme_type`, `event_image`, `title`, `description`, `package_id`) VALUES
(3, 'super heros', 'https://images.squarespace-cdn.com/content/v1/57f7ea3d03596eb277b15ac1/55e341c2-9c14-41e8-83cf-547c7b82c273/avengersballoons.jpg', 'avengers', 'one of our best themes so far', 2),
(4, 'adventure', 'https://karaspartyideas.com/wp-content/uploads/2014/02/minecraft1.jpg', 'minecraft', 'Join us for an unforgettable adventure at our Minecraft IRL Party, where the pixelated wonders of your favorite game come to life!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_image` text NOT NULL,
  `package_items` varchar(5000) NOT NULL,
  `package_theme` varchar(255) NOT NULL,
  `package_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_name`, `package_image`, `package_items`, `package_theme`, `package_price`) VALUES
(1, 'Adventure', 'https://jennifermaker.com/wp-content/uploads/minecraft-party-food.jpg', 'Decorations\r\nMinecraft Banners: Use printable banners with Minecraft designs or create your own with Creeper, Enderman, and other characters.\r\nPixelated Decorations: Include pixelated tablecloths, plates, cups, and napkins.\r\nMinecraft Posters: Hang posters or wall decals of Minecraft scenes or characters.\r\nBlocks: Create or buy cardboard boxes decorated like Minecraft blocks (grass, stone, TNT).\r\nBalloon Bouquets: Use green, brown, and blue balloons to represent the Minecraft color palette. Add Creeper faces to green balloons.\r\nFood and Drink\r\nMinecraft Cake: Make or order a cake decorated like a Minecraft block or character.\r\nPixelated Cookies: Decorate square cookies with Minecraft-themed designs.\r\n\"Creeper Juice\": Serve green punch or soda with a Creeper face on the dispenser.\r\n\"Golden Apples\": Use gold-wrapped chocolate or real apples with gold edible spray.\r\n\"Dirt Blocks\": Make brownies or rice crispy treats with cocoa powder to look like dirt blocks.\r\n\"Melon Slices\": Use watermelon slices for a refreshing treat.', 'Minecraft', '30,000'),
(2, 'super heros', 'https://i0.wp.com/www.partylikeacherry.com/wp-content/uploads/2022/08/marvel-party-decorations.jpg?fit=2048%2C1536&ssl=1', 'Trivia Challenge: Host an Avengers trivia game with questions about the movies, comics, and characters. Award prizes to the winners.\r\nInfinity Gauntlet Scavenger Hunt: Create a scavenger hunt to find the Infinity Stones hidden around the party area. Provide clues and puzzles related to each stone.\r\nHammer Lift Challenge: Have a contest to see who can \"lift\" Thor’s hammer (a prop or toy version) using clever tricks or teamwork.\r\nFood and Drinks\r\nSuperhero Snacks:\r\nHulk Smash Guacamole: Serve guacamole with chips labeled as “Hulk Smash.”\r\nThor’s Hammer Treats: Use pretzel sticks and cheese cubes or marshmallows to create mini Mjolnir hammers.\r\nThemed Cupcakes and Cake:\r\nAvengers Cupcakes: Decorate cupcakes with the symbols of the Avengers, using colored icing and toppers.\r\nInfinity Gauntlet Cake: Create a cake shaped like the Infinity Gauntlet, complete with colorful “stones” made of candy or fondant.\r\nHeroic Beverages:\r\nTony Stark’s Mocktails: Serve fancy mocktails inspired by Tony Stark, like “Stark Industries Sparkler” with sparkling water and fruit juice.\r\nWakandan Punch: Make a purple punch inspired by Black Panther, using grape juice, soda, and fruit slices.', 'Avengers', '120,000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
