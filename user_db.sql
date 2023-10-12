-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 02:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_table`
--

CREATE TABLE `project_table` (
  `pone` varchar(2083) NOT NULL,
  `ptwo` varchar(2083) NOT NULL,
  `pthree` varchar(2083) NOT NULL,
  `pfour` varchar(2083) NOT NULL,
  `pfive` varchar(2083) NOT NULL,
  `psix` varchar(2083) NOT NULL,
  `user_form_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_table`
--

INSERT INTO `project_table` (`pone`, `ptwo`, `pthree`, `pfour`, `pfive`, `psix`, `user_form_id`) VALUES
('Picsart_23-03-18_21-52-41-591.jpg', 'img15.PNG', 'img14.PNG', '', '', '', 1),
('img11.PNG', 'img20.PNG', 'img12.PNG', 'img20.PNG', 'img18.PNG', 'img10.PNG', 2),
('', '', '', '', '', '', 3),
('', '', '', '', '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `linkedin` varchar(2083) NOT NULL,
  `github` varchar(2083) NOT NULL,
  `twitter` varchar(2083) NOT NULL,
  `instagram` varchar(2083) NOT NULL,
  `about_me` varchar(100) NOT NULL,
  `age` int(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `experience` int(100) NOT NULL,
  `project` int(100) NOT NULL,
  `clients` int(100) NOT NULL,
  `awards` int(100) NOT NULL,
  `year1` varchar(100) NOT NULL,
  `degree1` varchar(100) NOT NULL,
  `year2` varchar(100) NOT NULL,
  `degree2` varchar(100) NOT NULL,
  `year3` varchar(100) NOT NULL,
  `degree3` varchar(100) NOT NULL,
  `year4` varchar(100) NOT NULL,
  `degree4` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `pdf_file` varchar(2083) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `username`, `email`, `password`, `occupation`, `image`, `linkedin`, `github`, `twitter`, `instagram`, `about_me`, `age`, `qualification`, `language`, `experience`, `project`, `clients`, `awards`, `year1`, `degree1`, `year2`, `degree2`, `year3`, `degree3`, `year4`, `degree4`, `location`, `gender`, `pdf_file`) VALUES
(1, 'Neeyati Khandelwal', 'neeyati_24', 'neeyatikhandelwal06@gmail.com', '8c436f5ba6dec8e0e3d4004b2cfee924', 'Artist', 'photo_2023-03-20_12-45-50.jpg', 'https://www.linkedin.com/', 'https://www.github.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', 'I am an artist currently pursuing BCA from Symbiosis', 19, 'Higher School', 'English', 1, 2, 1, 0, '2019', 'Secondary School', '2021', 'Higher School', 'Enter Year', 'Enter Education Qualification', 'Enter Year', 'Enter Education Qualification', 'Jodhpur,Rajasthan', 'Female', 'neeyaticv.pdf'),
(2, 'Tushar Mahajan', 'mahajant99', 'mahajant99@gmail.com', '7ee860b5d3f6a02c19f88df7c9ea0aec', 'Developer', 'img16.PNG', 'https://www.linkedin.com/mahajant99', 'https://www.github.com/mahajant99', 'https://www.twitter.com/mahajant99', 'https://www.instagram.com/mahajant99', 'I am full stack developer, pursuing bachelors degree in Computer Applications (BCA) from SICSR, Pune', 20, 'Higher School', 'English & Hindi', 5, 10, 4, 3, '2018', 'Secondary Schooling', '2021', 'Higher Schooling', '2024', 'BCA (Pursuing)', 'Enter Year', 'Enter Education Qualification', 'New Delhi, India', 'Male', 'empty'),
(3, 'Purvi Gehlot', 'purviii', 'purvi24@gmail.com', '7ee860b5d3f6a02c19f88df7c9ea0aec', 'Artist', 'IMG_8605.JPG', 'https://www.linkedin.com/', 'https://www.github.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', 'I am a Fashion Designing pursuing my bachelors from NID.', 19, 'Higher School', 'English', 0, 0, 0, 0, 'Enter Year', 'Enter Education Qualification', 'Enter Year', 'Enter Education Qualification', 'Enter Year', 'Enter Education Qualification', 'Enter Year', 'Enter Education Qualification', 'Enter Location', 'Female', 'empty'),
(4, 'Shilpi Jain', 'shilpij06', 'shilpij06@gmail.com', '7ee860b5d3f6a02c19f88df7c9ea0aec', 'Artist', 'shilpa.jpg', 'https://www.linkedin.com/', 'https://www.github.com/', 'https://www.twitter.com/', 'https://www.instagram.com/', 'I am an ARTIST!', 25, 'Masters Degree', 'English & Tamil', 7, 15, 20, 3, '2013', 'Secondary School', '2015', 'Higher School', '2018', 'Bachelors Degree', '2020', 'Masters Degree', 'Tamil Nadu, India', 'Female', 'empty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_table`
--
ALTER TABLE `project_table`
  ADD PRIMARY KEY (`user_form_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
