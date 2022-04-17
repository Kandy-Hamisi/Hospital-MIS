-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2022 at 06:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `segaHospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PassCode` varchar(255) NOT NULL,
  `Reg_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `FullName`, `Username`, `Email`, `PassCode`, `Reg_Date`, `Update_Date`) VALUES
(1, '', 'admin1', 'isaaccmaina@gmail.com', '12345', '2021-10-26 18:26:13', '0000-00-00 00:00:00'),
(2, 'Isaac Main', 'admin1', 'isaacmaina@gmail.com', '12345', '2021-10-26 18:27:27', '0000-00-00 00:00:00'),
(3, 'Mwangi Kiunjuri', 'admin2', 'mwangikiu@gmail.com', '12345', '2021-10-26 18:38:18', '0000-00-00 00:00:00'),
(4, 'Julius Njoro', 'admin3', 'julimjoro@gmail.com', 'test@123', '2021-10-26 18:51:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `docspec` varchar(255) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cons_fees` int(11) NOT NULL,
  `appointment_date` varchar(255) NOT NULL,
  `appointment_time` varchar(255) NOT NULL,
  `posting_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_delete` int(11) NOT NULL,
  `doctor_delete` int(11) NOT NULL,
  `updation_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `docspec`, `doc_id`, `user_id`, `cons_fees`, `appointment_date`, `appointment_time`, `posting_Date`, `user_delete`, `doctor_delete`, `updation_date`) VALUES
(1, 'Dermatologist', 1, 1, 1300, '2021-12-03', '10:31', '2021-12-02 04:23:59', 0, 0, '0000-00-00 00:00:00'),
(2, 'Optician', 5, 2, 1000, '2021-12-23', '14:50', '2021-12-15 11:51:07', 1, 0, '2022-01-02 05:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `Beds`
--

CREATE TABLE `Beds` (
  `id` int(11) NOT NULL,
  `RoomId` int(11) NOT NULL,
  `BedName` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Beds`
--

INSERT INTO `Beds` (`id`, `RoomId`, `BedName`, `Status`) VALUES
(1, 1, 'PW-1-Bed1', 'Available'),
(2, 1, 'PW-1-Bed2', 'Occupied');

-- --------------------------------------------------------

--
-- Table structure for table `BedStatus`
--

CREATE TABLE `BedStatus` (
  `id` int(11) NOT NULL,
  `PatientName` varchar(255) NOT NULL,
  `WardName` varchar(255) NOT NULL,
  `RoomName` varchar(255) NOT NULL,
  `BedName` varchar(255) NOT NULL,
  `AllocationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `BedStatus`
--

INSERT INTO `BedStatus` (`id`, `PatientName`, `WardName`, `RoomName`, `BedName`, `AllocationDate`) VALUES
(2, 'Lavender Ochieng', 'Private Ward', 'PW-1', 'PW-1-Bed2', '2021-12-18 06:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specialization_id` int(255) NOT NULL,
  `DocName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Fees` int(11) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PassCode` varchar(255) NOT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specialization_id`, `DocName`, `Address`, `Fees`, `Phone`, `Email`, `PassCode`, `CreateDate`, `UpdationDate`) VALUES
(1, 1, 'Ibrahim Mesiaj', 'Likoni Health Center', 1000, '+254797632897', 'mesiaj345@gmail.com', '12345', '2021-10-29 12:40:06', '2021-12-06 12:48:22'),
(2, 4, 'Kassim Mganga', 'Savannah Medical Center', 500, '+254797892753', 'kassimjomba@gmail.com', '12345', '2021-12-06 09:30:17', '2021-12-06 18:58:57'),
(3, 2, 'Hamisi Kandy', 'Savannah Medical Center', 2000, '+254795924576', 'hkandy2000@gmail.com', '12345', '2021-12-07 17:12:55', '0000-00-00 00:00:00'),
(5, 5, 'Kandy Hamisi Said', 'Thika', 1000, '+254798628375', 'kandy564@gmail.com', '12345', '2021-12-15 11:33:03', '2021-12-15 11:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

CREATE TABLE `medicalhistory` (
  `id` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `BloodPressure` varchar(255) NOT NULL,
  `BloodSugar` varchar(255) NOT NULL,
  `Weight` varchar(255) NOT NULL,
  `Temperature` varchar(255) NOT NULL,
  `Prescription` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicalhistory`
--

INSERT INTO `medicalhistory` (`id`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `Prescription`, `CreationDate`) VALUES
(1, 1, '120/180', '80/120', '56 kg', '36', 'prednisolone 1x3', '2021-12-02 16:11:29'),
(2, 2, '120/180', '80/121', '74', '35', 'betapin 1x3\r\n', '2021-12-06 05:37:37'),
(3, 2, '120/181', '80/120', '75 kg', '36', 'clotrimazole 1x3', '2021-12-06 05:41:30'),
(4, 2, '80/123', '79/119', '75 kg', '36', 'thybodine 1x1', '2021-12-06 07:02:07'),
(5, 2, '129/176', '78/120', '75 kg', '34', 'prednisolone 1x3\r\naquarix 2x2', '2021-12-06 07:01:07'),
(6, 1, '120/81', '80/123', '57 kg', '35', 'flugone 1x3', '2021-12-15 11:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `NurseName` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PassCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `NurseName`, `Department`, `Phone`, `Email`, `PassCode`) VALUES
(1, 'Agness Akinyi', 'Private Wards', '+254798752970', 'aggie234@gmail.com', '12345'),
(3, 'Aisha Hassan', 'Maternity', '0728726501', 'aishahassan@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `Doc_id` int(11) NOT NULL,
  `PatientName` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `Allocation` varchar(255) NOT NULL,
  `Med_history` varchar(255) NOT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `Doc_id`, `PatientName`, `Contact`, `Email`, `Gender`, `Address`, `Age`, `Allocation`, `Med_history`, `CreateDate`, `Update_Date`) VALUES
(1, 1, 'Asia Hamisi', '0798347872', 'asia76@gmail.com', 'Female', 'Mwembengoma', 21, 'Out-Patient', 'Asthmatic', '2021-10-30 10:18:23', '0000-00-00 00:00:00'),
(2, 1, 'Rashid Abdallah', '+254790876754', 'rashobaby@gmail.com', 'Male', 'Likoni-Migombani', 21, 'Out-Patient', 'Migraine headache', '2021-12-02 06:23:41', '2021-12-02 06:26:23'),
(3, 1, 'Elvis', '+254798476834', 'elvis105@gmail.com', 'Male', 'Kiambu', 23, 'Out-Patient', 'diabetic', '2021-12-15 11:44:48', '0000-00-00 00:00:00'),
(4, 1, 'Mwinyi Hamisi', '+254787934681', 'mwinyialo@gmail.com', 'Male', 'Sharks', 25, 'In-Patient', 'diarrhoea', '2021-12-17 17:58:44', '0000-00-00 00:00:00'),
(5, 1, 'Lavender Ochieng', '+254787297641', 'laviee@gmail.com', 'Female', 'shikaadabu', 13, 'In-Patient', 'diabetic', '2021-12-17 18:00:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Rooms`
--

CREATE TABLE `Rooms` (
  `id` int(11) NOT NULL,
  `WardID` int(11) NOT NULL,
  `RoomName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Rooms`
--

INSERT INTO `Rooms` (`id`, `WardID`, `RoomName`) VALUES
(1, 1, 'PW-1'),
(2, 2, 'MW-1');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `id` int(11) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`id`, `specialization`, `creationDate`, `updationDate`) VALUES
(1, 'Dermatologist', '2021-10-26 21:06:24', '0000-00-00 00:00:00'),
(2, 'Psychiatrist', '2021-10-26 21:07:54', '0000-00-00 00:00:00'),
(3, 'Gynecologist', '2021-10-26 21:09:12', '0000-00-00 00:00:00'),
(4, 'Dentist', '2021-12-06 09:28:21', '0000-00-00 00:00:00'),
(5, 'Optician', '2021-12-15 11:31:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `User_address` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PassCode` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fullname`, `User_address`, `City`, `Gender`, `Email`, `PassCode`, `Age`, `RegDate`, `UpdationDate`) VALUES
(1, 'Rashid Abdallah', 'Migombani-Likoni', 'Mombasa', 'Male', 'rashobaby@gmail.com', 'rasho123', 21, '2021-10-26 17:54:59', '0000-00-00 00:00:00'),
(2, 'Asia Hamisi', 'Mwembengoma', 'Mombasa', 'Female', 'asia76@gmail.com', '12345', 21, '2021-12-06 07:10:02', '0000-00-00 00:00:00'),
(3, 'Aisha Hassan', 'likoni', 'mombasa', 'Female', 'aisha@gmail.com', '12345', 24, '2021-12-15 12:07:20', '0000-00-00 00:00:00'),
(9, 'General Fibonacci', '40758', 'Mombasa', 'Male', 'generalfib@gmail.com', '12345', 21, '2022-01-01 18:10:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` int(11) NOT NULL,
  `WardName` varchar(255) NOT NULL,
  `Rooms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `WardName`, `Rooms`) VALUES
(1, 'Private Ward', '10 Rooms'),
(2, 'Maternity Ward', '10 Rooms'),
(3, 'Emergency Ward', '5 Rooms');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_id` (`doc_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Beds`
--
ALTER TABLE `Beds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `BedStatus`
--
ALTER TABLE `BedStatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `specialization_id` (`specialization_id`);

--
-- Indexes for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `Doc_id` (`Doc_id`);

--
-- Indexes for table `Rooms`
--
ALTER TABLE `Rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user-email` (`Email`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Beds`
--
ALTER TABLE `Beds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `BedStatus`
--
ALTER TABLE `BedStatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Rooms`
--
ALTER TABLE `Rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD CONSTRAINT `medicalhistory_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`Doc_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
