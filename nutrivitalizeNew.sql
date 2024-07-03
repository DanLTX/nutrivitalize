-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 03, 2024 at 08:08 PM
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
  `pass_word` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`emailID`, `pass_word`) VALUES
('admin', '$2y$10$XGznTiwfi4zlhQOxjLSFrOvCRmR036WW.E931P1vXq0z5Ncxyx68K'),
('admin2', '$2y$10$EBtTAtOieIPXkaK2GxnwVe615eLI.OfqZyX8vqTK9fQntMgiHKZOu'),
('admin3', '$2y$10$d7b8JoW6V47HcyP71WuLkOb70pLKcGrvjSQuZKv30g5m2zHjqoLyK');

-- --------------------------------------------------------

--
-- Table structure for table `bmi`
--

CREATE TABLE `bmi` (
  `email` varchar(30) NOT NULL,
  `suggestID` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `bmi_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmi`
--

INSERT INTO `bmi` (`email`, `suggestID`, `date`, `bmi_value`) VALUES
('meor@gmail.com', '4', '2024-07-04', 17),
('hanz@gmail.com', '1', '2024-07-04', 21.8),
('naqeeb@gmail.com', '1', '2024-07-04', 24),
('daniallhafizz@gmail.com', '1', '2024-07-04', 22.7),
('daniallhafizz@gmail.com', '1', '2024-06-25', 23.9),
('daniallhafizz@gmail.com', '1', '2024-05-05', 22.4),
('daniallhafizz@gmail.com', '1', '2024-04-22', 23.2),
('meor@gmail.com', '4', '2024-06-18', 17.8),
('meor@gmail.com', '4', '2024-05-20', 18),
('meor@gmail.com', '4', '2024-04-29', 17.5),
('hanz@gmail.com', '1', '2024-06-23', 22.2),
('hanz@gmail.com', '1', '2024-05-06', 22.8),
('hanz@gmail.com', '1', '2024-04-01', 23),
('naqeeb@gmail.com', '1', '2024-06-17', 23.2),
('naqeeb@gmail.com', '1', '2024-05-21', 23.4),
('naqeeb@gmail.com', '1', '2024-04-19', 22.9);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(40) NOT NULL,
  `foodCalories` int(11) NOT NULL,
  `foodCategory` varchar(25) NOT NULL,
  `foodImage` mediumtext NOT NULL,
  `emailID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodID`, `foodName`, `foodCalories`, `foodCategory`, `foodImage`, `emailID`) VALUES
(1, 'Fried Chicken', 246, 'Meat', 'https://www.browneyedbaker.com/wp-content/uploads/2020/12/buttermilk-fried-chicken-12-square.jpg', 'admin2'),
(2, 'Fried Egg', 92, 'Dairy', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTh-gJUA9ce161gdq6cTaDaWXyIrQ9NWDgLdg&s', 'admin2'),
(3, 'White Bread', 79, 'Bread', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7cHmvuA2c1sJmpQQ8y1XCE_1BjAxtZrBvog&s', 'admin'),
(5, 'Sushi', 200, 'Japanese', 'https://upload.wikimedia.org/wikipedia/commons/6/60/Sushi_platter.jpg', 'admin'),
(6, 'Tacos', 226, 'Mexican', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuMd2FuzynkuxpIO6vyhskSlbgX1CVKnE6YQ&s', 'admin'),
(7, 'Croissant', 231, 'Pastry', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoPD4zUoTBei_LVLmT5uIoM4gXcYoz135AGw&s', 'admin'),
(8, 'Pizza', 285, 'Italian', 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Eq_it-na_pizza-margherita_sep2005_sml.jpg', 'admin'),
(9, 'Pad Thai', 357, 'Thai', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvvnHh_LTnQFZIil8QjwC7dYCSDiHXiV3Z7g&s', 'admin'),
(10, 'Poutine', 740, 'Canadian', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzyWYnXP3RtIGVI4XXyoQPjXKbwk-_m2DUWA&s', 'admin'),
(11, 'Cheeseburger', 354, 'American', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHp7lAIkzHD5Rot3YyeF3vIyMOurMoJim9Ew&s', 'admin'),
(12, 'Falafel', 333, 'Middle Eastern', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Falafels_2.jpg/250px-Falafels_2.jpg', 'admin2'),
(13, 'Currywurst', 445, 'German', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJfu2EWlqBxMmjhkPCRxDv4IQlB85jtvc2EA&s', 'admin'),
(14, 'Kimchi', 23, 'Korean', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMXdGYvAz47HDYmPwqHLB6FRoMCvfHnn_jRg&s', 'admin'),
(15, 'Butter Chicken', 438, 'Indian', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Chicken_makhani.jpg/220px-Chicken_makhani.jpg', 'admin'),
(18, 'Nasi Lemak', 232, 'Rice', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMXmWHSCjp66gqveWoJSRFfdPTJnCKvdigbw&s', 'admin'),
(19, 'Ice Cream', 207, 'Dessert', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-ylLnxUA2MPLbV7caBoSu95iivHOPZtDdRw&s', 'admin'),
(20, 'Laksa', 613, 'Malay', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Nyonya_Laksa.jpg/330px-Nyonya_Laksa.jpg', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `suggestID` varchar(10) NOT NULL,
  `dateSuggest` date DEFAULT NULL,
  `suggestType` varchar(25) DEFAULT NULL,
  `suggestText` varchar(350) DEFAULT NULL,
  `emailID` varchar(10) NOT NULL
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
  `email` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pass_word` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `username`, `pass_word`, `age`, `gender`, `height`, `weight`) VALUES
('daniallhafizz@gmail.com', 'daniallhafizz', '$2y$10$S/VsygSveoNpsOsYi9Zbeu6/2fIkx3qHG6tZmh6QlIYUMcHultiFi', 20, 'Male', 173, 68),
('hanz@gmail.com', 'Hanz', '$2y$10$UMd2LVEgGbeC/nbvOplFDOjXa5FG71k57ohqdlkx4sygjYKVOgID.', 20, 'Male', 170, 63),
('meor@gmail.com', 'Meod', '$2y$10$tFw/0a/ByGUBITxin.tsduGhdvn5hY6dUDMoLpoUGXh/OQY0lXPsq', 20, 'Male', 168, 48),
('naqeeb@gmail.com', 'Naqeeb', '$2y$10$2kdV10HcTYWo7AHbijKHTuUIT2bAjNFcRKnwebAvdpKGaJObt7z3S', 20, 'Male', 172, 71);

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
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
