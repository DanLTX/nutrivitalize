-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 22, 2024 at 03:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutrivitalize`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `emailID` varchar(10) NOT NULL,
  `pass_word` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`emailID`, `pass_word`) VALUES
('admin', '8989');

-- --------------------------------------------------------

--
-- Table structure for table `bmi`
--

CREATE TABLE `bmi` (
  `email` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `bmi_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmi`
--

INSERT INTO `bmi` (`email`, `date`, `bmi_value`) VALUES
('daniallhafizz@gmail.com', '2024-01-03', 25.3),
('daniallhafizz@gmail.com', '2024-02-16', 23.8),
('daniallhafizz@gmail.com', '2024-03-22', 24.5),
('daniallhafizz@gmail.com', '2024-04-09', 22.3),
('daniallhafizz@gmail.com', '2024-05-13', 23.9);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(40) NOT NULL,
  `foodCalories` int(11) NOT NULL,
  `foodCategory` varchar(25) NOT NULL,
  `foodImage` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodID`, `foodName`, `foodCalories`, `foodCategory`, `foodImage`) VALUES
(1, 'Fried Chicken', 246, 'Meat', 'https://www.browneyedbaker.com/wp-content/uploads/2020/12/buttermilk-fried-chicken-12-square.jpg'),
(2, 'Fried Egg', 90, 'Dairy', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTh-gJUA9ce161gdq6cTaDaWXyIrQ9NWDgLdg&s'),
(3, 'White Bread', 79, 'Bread', 'https://upload.wikimedia.org/wikipedia/commons/3/3b/White_bread.jpg'),
(4, 'Chocolate Cake', 371, 'Dessert', 'https://upload.wikimedia.org/wikipedia/commons/6/66/Chocolate_cake.jpg'),
(5, 'Sushi', 200, 'Japanese', 'https://upload.wikimedia.org/wikipedia/commons/6/60/Sushi_platter.jpg'),
(6, 'Tacos', 226, 'Mexican', 'https://upload.wikimedia.org/wikipedia/commons/3/3a/Tacos_de_carnitas.jpg'),
(7, 'Croissant', 231, 'Pastry', 'https://upload.wikimedia.org/wikipedia/commons/f/f8/2019-06-26_09_53_27_Croissant_and_cappuccino_at_the_Starbucks_in_Dulles_International_Airport.jpg'),
(8, 'Pizza', 285, 'Italian', 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Eq_it-na_pizza-margherita_sep2005_sml.jpg'),
(9, 'Pad Thai', 357, 'Thai', 'https://upload.wikimedia.org/wikipedia/commons/4/45/Pad_Thai_Noodles_Raan_Jay_Fai.jpg'),
(10, 'Poutine', 740, 'Canadian', 'https://upload.wikimedia.org/wikipedia/commons/0/02/Montreal_Poutine.jpg'),
(11, 'Hamburger', 354, 'American', 'https://upload.wikimedia.org/wikipedia/commons/4/4e/Hamburger.jpg'),
(12, 'Falafel', 333, 'Middle Eastern', 'https://upload.wikimedia.org/wikipedia/commons/6/6d/Falafelballen.jpg'),
(13, 'Currywurst', 445, 'German', 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Currywurst.jpg'),
(14, 'Kimchi', 23, 'Korean', 'https://upload.wikimedia.org/wikipedia/commons/5/5b/Kimchi_jeon.jpg'),
(15, 'Butter Chicken', 438, 'Indian', 'https://upload.wikimedia.org/wikipedia/commons/3/35/Chicken_makhani.jpg'),
(16, 'Borscht', 75, 'Russian', 'https://upload.wikimedia.org/wikipedia/commons/d/d7/Borscht_served.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pass_word` int(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `username`, `pass_word`, `age`, `gender`, `height`, `weight`) VALUES
('2022895442@student.uitm.edu.my', 'meod', 1234, 20, 'Male', 168, 75),
('ashleyJohn@gmail.com', 'Ashley', 5544, 34, 'Female', 156, 54),
('daniallhafizz@gmail.com', 'daniallhafizz', 1234, 20, 'Male', 173, 68),
('jakenbake@gmail.com', 'Jaken', 4444, 33, 'Male', 187, 77),
('JMusi@gmail.com', 'Jamal Musiala', 4421, 23, 'Male', 182, 66),
('test@gmail.com', 'testname', 1234, 20, 'Male', 175, 69);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`emailID`);

--
-- Indexes for table `bmi`
--
ALTER TABLE `bmi`
  ADD KEY `email_fk` (`email`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
