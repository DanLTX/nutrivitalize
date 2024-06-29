-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 10:15 PM
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
('2022895442@student.uitm.edu.my', '4', '2024-05-09', 16.3),
('2022895442@student.uitm.edu.my', '4', '2024-04-10', 15.6),
('2022895442@student.uitm.edu.my', '4', '2024-03-10', 16),
('daniallhafizz@gmail.com', '1', '2024-05-15', 21.8),
('daniallhafizz@gmail.com', '1', '2024-04-11', 23.7),
('daniallhafizz@gmail.com', '1', '2024-03-26', 24.1),
('hanz@gmail.com', '2', '2024-05-09', 25.1),
('hanz@gmail.com', '4', '2024-04-18', 15.6),
('hanz@gmail.com', '1', '2024-03-30', 20.3),
('rapeh@gmail.com', '1', '2024-05-16', 23.4),
('rapeh@gmail.com', '1', '2024-04-30', 24.7),
('rapeh@gmail.com', '2', '2024-03-30', 25.8),
('2022895442@student.uitm.edu.my', '4', '2024-06-30', 15.2);

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
(1, 'Fried Chicken', 246, 'Meat', 'https://www.browneyedbaker.com/wp-content/uploads/2020/12/buttermilk-fried-chicken-12-square.jpg', 'admin2'),
(2, 'Fried Egg', 92, 'Dairy', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTh-gJUA9ce161gdq6cTaDaWXyIrQ9NWDgLdg&s', 'admin2'),
(3, 'White Bread', 79, 'Bread', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Wei%C3%9Fbrot-1.jpg/250px-Wei%C3%9Fbrot-1.jpg', 'admin2'),
(5, 'Sushi', 200, 'Japanese', 'https://upload.wikimedia.org/wikipedia/commons/6/60/Sushi_platter.jpg', 'admin'),
(6, 'Tacos', 226, 'Mexican', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/001_Tacos_de_carnitas%2C_carne_asada_y_al_pastor.jpg/220px-001_Tacos_de_carnitas%2C_carne_asada_y_al_pastor.jpg', 'admin2'),
(7, 'Croissant', 231, 'Pastry', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/2018_01_Croissant_IMG_0685.JPG/270px-2018_01_Croissant_IMG_0685.JPG', 'admin2'),
(8, 'Pizza', 285, 'Italian', 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Eq_it-na_pizza-margherita_sep2005_sml.jpg', 'admin'),
(9, 'Pad Thai', 357, 'Thai', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/Phat_Thai_kung_Chang_Khien_street_stall.jpg/220px-Phat_Thai_kung_Chang_Khien_street_stall.jpg', 'admin'),
(10, 'Poutine', 740, 'Canadian', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/Food_at_WIkimanian_2017_02.jpg/220px-Food_at_WIkimanian_2017_02.jpg', 'admin'),
(11, 'Hamburger', 354, 'American', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d2/Celebration_Burger_%2849116811283%29.jpg/300px-Celebration_Burger_%2849116811283%29.jpg', 'admin'),
(12, 'Falafel', 333, 'Middle Eastern', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Falafels_2.jpg/250px-Falafels_2.jpg', 'admin2'),
(13, 'Currywurst', 445, 'German', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/20220430_currywurst.jpg/220px-20220430_currywurst.jpg', 'admin'),
(14, 'Kimchi', 23, 'Korean', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/70/Korean_stew-Kimchi_jjigae-05.jpg/220px-Korean_stew-Kimchi_jjigae-05.jpg', 'admin'),
(15, 'Butter Chicken', 438, 'Indian', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Chicken_makhani.jpg/220px-Chicken_makhani.jpg', 'admin'),
(18, 'Nasi Lemak', 232, 'Rice', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Nasi_Lemak_dengan_Chili_Nasi_Lemak_dan_Sotong_Pedas%2C_di_Penang_Summer_Restaurant.jpg/250px-Nasi_Lemak_dengan_Chili_Nasi_Lemak_dan_Sotong_Pedas%2C_di_Penang_Summer_Restaurant.jpg', 'admin2'),
(19, 'Ice Cream', 207, 'Dessert', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Ice_cream_with_whipped_cream%2C_chocolate_syrup%2C_and_a_wafer_%28cropped%29.jpg/220px-Ice_cream_with_whipped_cream%2C_chocolate_syrup%2C_and_a_wafer_%28cropped%29.jpg', 'admin2');

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
  `pass_word` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` int NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `height` int NOT NULL,
  `weight` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `username`, `pass_word`, `age`, `gender`, `height`, `weight`) VALUES
('2022895442@student.uitm.edu.my', 'meod', 'abcd', 20, 'Male', 168, 43),
('daniallhafizz@gmail.com', 'daniallhafizz', '1234', 20, 'Male', 172, 68),
('hanz@gmail.com', 'Hanz', '6789', 20, 'Male', 172, 63),
('rapeh@gmail.com', 'rapeh', '7887', 20, 'Male', 174, 71);

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
  MODIFY `foodID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
