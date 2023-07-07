-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 29, 2023 at 02:40 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asv`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(30) NOT NULL,
  `coursetype` varchar(20) NOT NULL,
  `coursename` varchar(30) NOT NULL,
  `longsummary` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `image`, `coursetype`, `coursename`, `longsummary`) VALUES
(3, '5.jpg', 'JAVA', 'JAVA Pro', '<p>this is php programing</p>\r\n'),
(12, '8.jpg', 'JAVA', 'JAVA Basics', '<p>this is Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus reiciendis dolor doloremque neque vel debitis excepturi illo accusantium quidem ipsum minima eveniet, veniam repellat autem numquam sed voluptatem harum placeat expedita quas facilis perferendis iure culpa quia! Quae quidem saepe facilis expedita necessitatibus quibusdam minima libero ad nisi, velit voluptas nesciunt est ipsa nulla ipsum qui tempore corporis. Nostrum labore laborum perferendis nobis reprehenderit repellendus eos quia fuga expedita sed sit quae error, iste ullam est non pariatur quod earum tempore amet ex. Esse ea vel totam odio veniam, natus beatae, inventore vero earum quasi blanditiis soluta libero sed facere tenetur tempore voluptatibus ut. Eligendi molestiae hic quam ut nostrum mollitia eaque possimus consequatur. Ullam, itaque nisi voluptate libero modi sit voluptas culpa corrupti inventore nemo ut corporis reprehenderit aut repellat consequuntur molestiae sequi fugit vero qui? Eum accusamus dolorem voluptatem dolores placeat. Tenetur dolorum, minima quae quisquam, facere alias obcaecati vel corporis autem laudantium aliquid cum nobis explicabo accusantium eveniet architecto. Modi sed fuga dignissimos amet eius soluta quod consequatur. Non rerum minus quis vitae veniam dolore, vero repellendus fuga voluptatum repellat recusandae iste voluptas doloremque quod quo assumenda est totam vel possimus ut harum sequi maiores nemo consequuntur? Consequuntur molestiae eveniet deserunt! Animi quasi eius mollitia placeat enim rerum tenetur temporibus dolorem? Eius a minus totam est, incidunt tempora necessitatibus!\n java basic programming</p>\n'),
(15, '7.jpg', 'C', 'C Basics', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` bigint NOT NULL,
  `feedback` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `feedback`) VALUES
(1, 'sonani jemish', 'sonanijemish1709@gmail.com', 8238933359, 'hi this is very good website'),
(7, 'Sonani Jemiosh', 'sonani2002@gmail.com', 1236547890, 'thius is hood');

-- --------------------------------------------------------

--
-- Table structure for table `videolink`
--

DROP TABLE IF EXISTS `videolink`;
CREATE TABLE IF NOT EXISTS `videolink` (
  `id` int NOT NULL AUTO_INCREMENT,
  `coursetype` varchar(20) NOT NULL,
  `coursename` varchar(30) NOT NULL,
  `videolinks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `videotitle` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `videolink`
--

INSERT INTO `videolink` (`id`, `coursetype`, `coursename`, `videolinks`, `videotitle`) VALUES
(26, 'JAVA', 'JAVA Basics', 'https://www.youtube.com/watch?v=0gfEFcyD0vg', 'jemish 2'),
(28, 'JAVA', 'JAVA Basics', 'https://www.youtube.com/watch?v=zYlvTKJLvCo', 'Raam Siya Raam');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
