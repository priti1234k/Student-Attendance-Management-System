-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 06:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sams`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `A_id` int(11) NOT NULL,
  `studentname` varchar(50) NOT NULL,
  `coursename` varchar(200) NOT NULL,
  `subjectname` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `attendance` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`A_id`, `studentname`, `coursename`, `subjectname`, `date`, `attendance`) VALUES
(2, 'priti kumari', 'mca', 'web programming', '6/21/2021', 'p'),
(3, 'abc', 'mca', 'web programming', '6/21/2021', 'P'),
(4, 'xyz', 'mca', 'web programming', '6/21/2021', 'A'),
(5, 'priti kumari', 'mca', 'web programming', '6/20/2021', 'A'),
(6, 'priti kumari', 'mca', 'web programming', '', 'P'),
(7, 'priti kumari', 'mca', 'web programming', '6/28/2021', 'P'),
(8, 'priti kumari', 'mca', 'web programming', '7/9/2021', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `course_master`
--

CREATE TABLE `course_master` (
  `Course_id` int(11) NOT NULL,
  `D_id` int(11) NOT NULL,
  `coursename` varchar(200) NOT NULL,
  `yearorsem` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_master`
--

INSERT INTO `course_master` (`Course_id`, `D_id`, `coursename`, `yearorsem`, `year`, `status`) VALUES
(1, 2, 'mca', 'Semester', 1, 'Active'),
(2, 2, 'bca', 'Year', 1, 'Active'),
(3, 1, 'Bcom', 'Year', 1, 'Active'),
(4, 1, 'BBA', 'Year', 1, 'Active'),
(5, 1, 'mcom', 'Semester', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dept_master`
--

CREATE TABLE `dept_master` (
  `D_id` int(20) NOT NULL,
  `DeptName` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_master`
--

INSERT INTO `dept_master` (`D_id`, `DeptName`, `Status`) VALUES
(1, 'Commerce And Management 2', 'active'),
(2, 'It', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_master`
--

CREATE TABLE `faculty_master` (
  `Fac_id` int(20) NOT NULL,
  `facultyname` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Contact` varchar(200) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Password` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_master`
--

INSERT INTO `faculty_master` (`Fac_id`, `facultyname`, `Email`, `Contact`, `gender`, `Username`, `Password`, `status`) VALUES
(1, 'Abc', 'root@gmail.com', '9876543210', 'Male', 'root123@gmail.com', 'ghfjfgiu', 'Deactive'),
(2, 'dkahdk', 'purohitsanjana1994@gmail.com', '65569908776', 'Female', 'pritikkumari3@gmail.com', 'jhbkjhl', 'Deactive'),
(3, 'Priti kumari', 'pritikkumari3@gmail.com', '65569908776', 'Female', 'pritikkumari3@gmail.com', '123456', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sem_master`
--

CREATE TABLE `sem_master` (
  `S_id` int(20) NOT NULL,
  `Sem` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sem_master`
--

INSERT INTO `sem_master` (`S_id`, `Sem`, `status`) VALUES
(1, '1st', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `student_id` int(20) NOT NULL,
  `studentname` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Contact` varchar(200) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Password` varchar(25) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`student_id`, `studentname`, `Email`, `Contact`, `gender`, `Username`, `Password`, `status`) VALUES
(1, 'priti kumari', 'pritikkumari3@gmail.com', '9876543211', 'Female', 'pritikkumari3@gmail.com', 'priti123', 'Active'),
(2, 'abc', 'root@gmail.com', '9876543210', 'Female', 'root@gmail.com', 'jhbkjhl', 'Active'),
(3, 'xyz', 'root1@gmail.com', '9876543211', 'Male', 'root1@gmail.com', 'ghfjfgiu12556', 'Active'),
(4, 'sanjana', 'purohitsanjana1994@gmail.com', '9876543210', 'Female', 'sanjana123@gmail.com', '2226684fhj', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `subject_master`
--

CREATE TABLE `subject_master` (
  `subject_id` int(11) NOT NULL,
  `D_id` int(11) DEFAULT NULL,
  `Course_id` int(11) DEFAULT NULL,
  `subjectname` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_master`
--

INSERT INTO `subject_master` (`subject_id`, `D_id`, `Course_id`, `subjectname`, `status`) VALUES
(1, 2, 1, 'web programming', 'Active'),
(2, 2, 1, 'C programming', 'Active'),
(3, 2, 2, 'C++', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblallotstof`
--

CREATE TABLE `tblallotstof` (
  `stof_id` int(11) NOT NULL,
  `Fac_id` int(11) DEFAULT NULL,
  `D_id` int(11) DEFAULT NULL,
  `Course_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblallotstof`
--

INSERT INTO `tblallotstof` (`stof_id`, `Fac_id`, `D_id`, `Course_id`, `subject_id`, `status`) VALUES
(1, 3, 2, 1, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblallotstos`
--

CREATE TABLE `tblallotstos` (
  `stos_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `D_id` int(11) DEFAULT NULL,
  `Course_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblallotstos`
--

INSERT INTO `tblallotstos` (`stos_id`, `student_id`, `D_id`, `Course_id`, `subject_id`, `status`) VALUES
(NULL, 1, 2, 1, 1, 'Active'),
(NULL, 2, 2, 1, 1, 'Active'),
(NULL, 3, 2, 1, 1, 'Active'),
(NULL, 4, 2, 1, 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `U_id` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`U_id`, `UserName`, `Password`, `status`) VALUES
(27, 'root@gmail.com', 'Qwerty123@', 'Deactive'),
(28, 'Pritikkumari344@gmail.com', 'QWert123@', 'Deactive'),
(29, 'sanjana123@gmail.com', 'SanjanaP1234@23', 'active'),
(30, 'sanjana@gmail.com', 'SanjanaP1234@X', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `year_master`
--

CREATE TABLE `year_master` (
  `Y_id` int(20) NOT NULL,
  `Year` varchar(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year_master`
--

INSERT INTO `year_master` (`Y_id`, `Year`, `status`) VALUES
(1, '1st', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `course_master`
--
ALTER TABLE `course_master`
  ADD PRIMARY KEY (`Course_id`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `dept_master`
--
ALTER TABLE `dept_master`
  ADD PRIMARY KEY (`D_id`);

--
-- Indexes for table `faculty_master`
--
ALTER TABLE `faculty_master`
  ADD PRIMARY KEY (`Fac_id`);

--
-- Indexes for table `sem_master`
--
ALTER TABLE `sem_master`
  ADD PRIMARY KEY (`S_id`);

--
-- Indexes for table `student_master`
--
ALTER TABLE `student_master`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject_master`
--
ALTER TABLE `subject_master`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `D_id` (`D_id`),
  ADD KEY `Course_id` (`Course_id`);

--
-- Indexes for table `tblallotstof`
--
ALTER TABLE `tblallotstof`
  ADD PRIMARY KEY (`stof_id`),
  ADD KEY `Fac_id` (`Fac_id`),
  ADD KEY `D_id` (`D_id`),
  ADD KEY `Course_id` (`Course_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `tblallotstos`
--
ALTER TABLE `tblallotstos`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `D_id` (`D_id`),
  ADD KEY `Course_id` (`Course_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`U_id`);

--
-- Indexes for table `year_master`
--
ALTER TABLE `year_master`
  ADD PRIMARY KEY (`Y_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_master`
--
ALTER TABLE `course_master`
  MODIFY `Course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dept_master`
--
ALTER TABLE `dept_master`
  MODIFY `D_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_master`
--
ALTER TABLE `faculty_master`
  MODIFY `Fac_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sem_master`
--
ALTER TABLE `sem_master`
  MODIFY `S_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_master`
--
ALTER TABLE `student_master`
  MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject_master`
--
ALTER TABLE `subject_master`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblallotstof`
--
ALTER TABLE `tblallotstof`
  MODIFY `stof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `U_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `year_master`
--
ALTER TABLE `year_master`
  MODIFY `Y_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_master`
--
ALTER TABLE `course_master`
  ADD CONSTRAINT `course_master_ibfk_1` FOREIGN KEY (`D_id`) REFERENCES `dept_master` (`D_id`);

--
-- Constraints for table `subject_master`
--
ALTER TABLE `subject_master`
  ADD CONSTRAINT `subject_master_ibfk_1` FOREIGN KEY (`D_id`) REFERENCES `dept_master` (`D_id`),
  ADD CONSTRAINT `subject_master_ibfk_2` FOREIGN KEY (`Course_id`) REFERENCES `course_master` (`Course_id`);

--
-- Constraints for table `tblallotstof`
--
ALTER TABLE `tblallotstof`
  ADD CONSTRAINT `tblallotstof_ibfk_1` FOREIGN KEY (`Fac_id`) REFERENCES `faculty_master` (`Fac_id`),
  ADD CONSTRAINT `tblallotstof_ibfk_2` FOREIGN KEY (`D_id`) REFERENCES `dept_master` (`D_id`),
  ADD CONSTRAINT `tblallotstof_ibfk_3` FOREIGN KEY (`Course_id`) REFERENCES `course_master` (`Course_id`),
  ADD CONSTRAINT `tblallotstof_ibfk_4` FOREIGN KEY (`subject_id`) REFERENCES `subject_master` (`subject_id`);

--
-- Constraints for table `tblallotstos`
--
ALTER TABLE `tblallotstos`
  ADD CONSTRAINT `tblallotstos_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_master` (`student_id`),
  ADD CONSTRAINT `tblallotstos_ibfk_2` FOREIGN KEY (`D_id`) REFERENCES `dept_master` (`D_id`),
  ADD CONSTRAINT `tblallotstos_ibfk_3` FOREIGN KEY (`Course_id`) REFERENCES `course_master` (`Course_id`),
  ADD CONSTRAINT `tblallotstos_ibfk_4` FOREIGN KEY (`subject_id`) REFERENCES `subject_master` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
