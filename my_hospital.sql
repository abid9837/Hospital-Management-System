-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 10:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `specialist` varchar(100) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `Expertise` varchar(100) NOT NULL,
  `visiting_hours` varchar(20) NOT NULL,
  `fee` int(11) NOT NULL,
  `about` varchar(5000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `blood_group` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nurse_audit_tasks`
--

CREATE TABLE `nurse_audit_tasks` (
  `id` int(11) NOT NULL,
  `task_full_name` text NOT NULL,
  `task_referring_by` varchar(100) NOT NULL,
  `task_reason` varchar(500) NOT NULL,
  `task_Sex` varchar(10) NOT NULL,
  `task_Blood_Group` varchar(10) NOT NULL,
  `task_Room_Number` varchar(10) NOT NULL,
  `task_date` varchar(10) NOT NULL,
  `task_user_img` varchar(1000) NOT NULL,
  `stauts` varchar(12) NOT NULL,
  `patient_uid` varchar(2000) NOT NULL,
  `medicines` varchar(1000) NOT NULL,
  `complete_task_date` varchar(15) NOT NULL,
  `task_complete_by_nurse_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse_audit_tasks`
--

INSERT INTO `nurse_audit_tasks` (`id`, `task_full_name`, `task_referring_by`, `task_reason`, `task_Sex`, `task_Blood_Group`, `task_Room_Number`, `task_date`, `task_user_img`, `stauts`, `patient_uid`, `medicines`, `complete_task_date`, `task_complete_by_nurse_name`) VALUES
(14, 'Sajjat Hossain', 'abid', 'accidents ', 'male', 'O+', '108', '2023/10/18', '3d-illustration-of-smiling-happy.png', 'complete', '7', '', '2023/10/18', ''),
(15, 'Abidur Rahman', 'tanvir', 'no reason', 'male', 'A+', '201', '2023/10/18', 'abd 33.jpg', 'complete', '2', '', '2023/10/18', ''),
(16, 'Tanvir anzum utsho', 'no refer', 'kidny damage', 'male', 'A-', 'VIP105', '2023/10/18', 'man-is-asking-a-question-9397553.png', 'complete', '9', '', '2023/10/18', ''),
(17, 'Tanvir anzum utsho', 'no refer', 'kidny damage', 'male', 'A-', 'VIP105', '2023/10/18', 'man-is-asking-a-question-9397553.png', 'complete', '9', '', '2023/10/18', ''),
(30, 'Sajjat Hossain', 'abid', 'accidents ', 'male', 'O+', '201', '2023/10/21', '3d-illustration-of-smiling-happy.png', 'active', '7', '', '', ''),
(31, 'Tanvir anzum utsho', 'no refer', 'kidny damage', 'male', 'A-', 'VIP105', '2023/10/21', 'man-is-asking-a-question-9397553.png', 'active', '9', '', '', ''),
(32, 'Sakib Khan', 'Dr.Akhil', 'kidney damage', 'male', 'AB+', 'Medium501', '2023/10/21', 'happy-smiling-young-man-avatar-3.png', 'active', '10', '', '', ''),
(33, 'Prosonjid sorkar', 'no refer', 'brain tumer ', 'female', 'B+', 'Normal102', '2023/10/21', 'young-woman-watering-money-plant.png', 'active', '8', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `dates` varchar(30) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `addresss` varchar(100) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `date_of_birth` varchar(15) NOT NULL,
  `referring_by` varchar(100) NOT NULL,
  `treatment_by_doctor` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `blood_group` varchar(4) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `status_` varchar(10) NOT NULL,
  `release_date` varchar(20) NOT NULL,
  `room_number` varchar(50) NOT NULL,
  `admit_fee` int(100) NOT NULL,
  `OT_fee` int(100) NOT NULL,
  `room_fee` int(100) NOT NULL,
  `medicine_fee` int(100) NOT NULL,
  `extra_services_fee` int(100) NOT NULL,
  `discount_in_fees` varchar(100) NOT NULL,
  `bill_payed` int(11) NOT NULL,
  `bill_paid_date` varchar(25) NOT NULL,
  `final_payment_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `dates`, `full_name`, `phone`, `addresss`, `reason`, `date_of_birth`, `referring_by`, `treatment_by_doctor`, `gender`, `blood_group`, `img`, `status_`, `release_date`, `room_number`, `admit_fee`, `OT_fee`, `room_fee`, `medicine_fee`, `extra_services_fee`, `discount_in_fees`, `bill_payed`, `bill_paid_date`, `final_payment_status`) VALUES
(1, '2023-10-15', 'Abidur Rahman', '01840249837', 'dhaka,Bangladesh', 'accident', '2002-10-15', 'Dr.Tanvir', 'Dr.Akash Khan', 'male', 'O-', 'Abidur Rahman.jpg', 'relesed', '2023/10/20', '', 500, 4000, 1000, 4000, 800, '0', 10300, '', 'complete'),
(2, '2023-10-15', 'Abidur Rahman', '01840249837', 'Galachipa', 'no reason', '2023-10-18', 'tanvir', '', 'male', 'A+', 'abd 33.jpg', 'relesed', '2023/10/20', '', 0, 5000, 1000, 0, 0, '0', 6000, '', 'complete'),
(3, '2023-10-15', 'Abidur Rahman', '01840249837', 'Galachipa', 'no reason', '2023-10-18', 'tanvir', '', 'male', 'A+', 'abd 33.jpg', '', '', '', 500, 10000, 2000, 1000, 4000, '0', 500, '2023/10/20', ''),
(5, '2023-10-15', 'Riajul Islam', '0184201548', 'panthopoth', 'smnasbjbajgvjadgjv', '2023-09-25', 'sdsdsd', '', 'female', 'A+', 'marketing-creative-collage-with-phone.jpg', '', '', '', 0, 0, 0, 0, 0, '', 0, '', ''),
(6, '2023-10-15', 'Abidur Rahman', '01840249837', 'galachipa patuakhali', 'accident', '2002-10-15', 'tanvir', '', 'male', 'B+', 'happy-smiling-young-man-avatar-3.png', '', '', '', 0, 0, 0, 0, 0, '', 0, '', ''),
(7, '2023-10-15', 'Sajjat Hossain', '0156546464', 'dhaka', 'accidents ', '2023-10-03', 'abid', '', 'male', 'O+', '3d-illustration-of-smiling-happy.png', 'relesed', '2023/10/20', '', 1, 0, 1000, 0, 0, '0', 1001, '', 'complete'),
(8, '2023-10-16', 'Prosonjid sorkar', '01842549879', 'barishal', 'brain tumber', '2001-12-26', 'no refer', '', 'female', 'B+', 'young-woman-watering-money-plant.png', '', '', 'Normal102', 0, 0, 0, 0, 0, '', 0, '', ''),
(9, '2023-10-16', 'Tanvir anzum utsho', '01874024587', 'taltola', 'kidny damage', '1997-08-27', 'no refer', '', 'male', 'A-', 'man-is-asking-a-question-9397553.png', 'active', '', 'VIP105', 0, 0, 0, 0, 0, '', 0, '', ''),
(10, '2023-10-20', 'Sakib Khan', '01842457872', 'Patuakhali', 'kidney damage', '2002-08-20', 'Dr.Akhil', '', 'male', 'AB+', 'happy-smiling-young-man-avatar-3.png', 'relesed', '2023/10/20', 'Medium501', 0, 0, 2000, 1500, 500, '0', 4000, '', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `passwords` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(500) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `roles` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `email`, `passwords`, `phone`, `address`, `blood_group`, `img`, `roles`) VALUES
(1, '', 'admin@gmail.com', 'admin1234', '', '', '', '', 'admin'),
(2, 'Maria Sultana', 'nurse@gmail.com', 'nurse1234', '01725483987', 'Khulna', 'AB+', 'nurse.png', 'nurse'),
(3, '', 'doctor@gmail.com', 'doctor1234', '', '', '', '', 'doctor'),
(4, 'Abidur Rahman', 'abidurrahman9837@gmail.com', 'abid1234', '01840249837', 'Dhaka Panthopath', 'A+', 'abid.jpg', 'receptionist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse_audit_tasks`
--
ALTER TABLE `nurse_audit_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nurse_audit_tasks`
--
ALTER TABLE `nurse_audit_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
