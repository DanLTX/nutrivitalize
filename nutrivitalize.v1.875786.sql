-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 09:37 PM
-- Server version: 8.0.35
-- PHP Version: 8.0.6

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
  `emailID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass_word` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`emailID`, `pass_word`) VALUES
('admin', '8989'),
('admin2', '0191'),
('admin3', '0669');

-- --------------------------------------------------------

--
-- Table structure for table `bmi`
--

CREATE TABLE `bmi` (
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `suggestID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `bmi_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmi`
--

INSERT INTO `bmi` (`email`, `suggestID`, `date`, `bmi_value`) VALUES
('2022895442@student.uitm.edu.my', '4', '2024-07-01', 15.2),
('2022895442@student.uitm.edu.my', '4', '2024-05-01', 15.7),
('2022895442@student.uitm.edu.my', '4', '2024-04-01', 15.1),
('2022895442@student.uitm.edu.my', '4', '2024-03-01', 15.6),
('2022895442@student.uitm.edu.my', '3', '2024-02-01', 41.3),
('2022895442@student.uitm.edu.my', '2', '2024-01-01', 26.9);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodID` int NOT NULL,
  `foodName` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foodCalories` int NOT NULL,
  `foodCategory` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foodImage` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `emailID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodID`, `foodName`, `foodCalories`, `foodCategory`, `foodImage`, `emailID`) VALUES
(1, 'Fried Chicken', 246, 'Meat', 'https://www.browneyedbaker.com/wp-content/uploads/2020/12/buttermilk-fried-chicken-12-square.jpg', NULL),
(2, 'Fried Egg', 90, 'Dairy', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTh-gJUA9ce161gdq6cTaDaWXyIrQ9NWDgLdg&s', NULL),
(3, 'White Bread', 79, 'Bread', 'https://upload.wikimedia.org/wikipedia/commons/3/3b/White_bread.jpg', NULL),
(4, 'Chocolate Cake', 371, 'Dessert', 'https://upload.wikimedia.org/wikipedia/commons/6/66/Chocolate_cake.jpg', NULL),
(5, 'Sushi', 200, 'Japanese', 'https://upload.wikimedia.org/wikipedia/commons/6/60/Sushi_platter.jpg', NULL),
(6, 'Tacos', 226, 'Mexican', 'https://upload.wikimedia.org/wikipedia/commons/3/3a/Tacos_de_carnitas.jpg', NULL),
(7, 'Croissant', 231, 'Pastry', 'https://upload.wikimedia.org/wikipedia/commons/f/f8/2019-06-26_09_53_27_Croissant_and_cappuccino_at_the_Starbucks_in_Dulles_International_Airport.jpg', NULL),
(8, 'Pizza', 285, 'Italian', 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Eq_it-na_pizza-margherita_sep2005_sml.jpg', NULL),
(9, 'Pad Thai', 357, 'Thai', 'https://upload.wikimedia.org/wikipedia/commons/4/45/Pad_Thai_Noodles_Raan_Jay_Fai.jpg', NULL),
(10, 'Poutine', 740, 'Canadian', 'https://upload.wikimedia.org/wikipedia/commons/0/02/Montreal_Poutine.jpg', NULL),
(11, 'Hamburger', 354, 'American', 'https://upload.wikimedia.org/wikipedia/commons/4/4e/Hamburger.jpg', NULL),
(12, 'Falafel', 333, 'Middle Eastern', 'https://upload.wikimedia.org/wikipedia/commons/6/6d/Falafelballen.jpg', NULL),
(13, 'Currywurst', 445, 'German', 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Currywurst.jpg', NULL),
(14, 'Kimchi', 23, 'Korean', 'https://upload.wikimedia.org/wikipedia/commons/5/5b/Kimchi_jeon.jpg', NULL),
(15, 'Butter Chicken', 438, 'Indian', 'https://upload.wikimedia.org/wikipedia/commons/3/35/Chicken_makhani.jpg', NULL),
(17, 'Nasi Lemak', 230, 'Rice', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/Nasi_lemak_kerang_at_Seksyen_6_Kota_Damansara_20240220_080151.jpg/260px-Nasi_lemak_kerang_at_Seksyen_6_Kota_Damansara_20240220_080151.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `suggestID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateSuggest` date DEFAULT NULL,
  `suggestType` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `suggestText` varchar(350) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emailID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`suggestID`, `dateSuggest`, `suggestType`, `suggestText`, `emailID`) VALUES
('1', '2024-01-01', 'normal', 'Maintain Healthy Habits: Keep a balanced diet and stay active. Aim for 150 minutes of exercise per week.', 'admin'),
('2', '2024-01-01', 'overweight', 'Reduce Calories, Increase Activity: Eat smaller portions, choose healthy foods, and exercise for 30-60 minutes most days.', 'admin'),
('3', '2024-01-01', 'obesity', 'Significant Lifestyle Changes: Follow a low-calorie diet and gradually increase exercise to 150 minutes per week. Seek support from healthcare professionals.', 'admin'),
('4', '2024-01-01', 'underweight', 'Healthy Weight Gain: Eat more nutrient-dense foods, have healthy snacks, and do strength training exercises. Consult a dietitian for a personalized plan.', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass_word` int NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `height` int NOT NULL,
  `weight` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `username`, `pass_word`, `age`, `gender`, `height`, `weight`) VALUES
('2022895442@student.uitm.edu.my', 'meod', 1234, 20, 'Male', 168, 43),
('ashleyJohn@gmail.com', 'Ashley', 5544, 34, 'Female', 156, 54),
('daniallhafizz@gmail.com', 'daniallhafizz', 1234, 20, 'Male', 173, 68),
('jakenbake@gmail.com', 'Jaken', 4444, 33, 'Male', 187, 77),
('JMusi@gmail.com', 'Jamal Musiala', 4421, 23, 'Male', 182, 66),
('meorafif04@gmail.com', 'meodds', 1234, 20, 'Male', 170, 43);

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
  ADD KEY `email` (`email`),
  ADD KEY `suggestID` (`suggestID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`),
  ADD KEY `emailID` (`emailID`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`suggestID`),
  ADD KEY `emailID` (`emailID`);

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
  MODIFY `foodID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bmi`
--
ALTER TABLE `bmi`
  ADD CONSTRAINT `bmi_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `bmi_ibfk_2` FOREIGN KEY (`suggestID`) REFERENCES `suggestion` (`suggestID`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`emailID`) REFERENCES `admin` (`emailID`);

--
-- Constraints for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`emailID`) REFERENCES `admin` (`emailID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
