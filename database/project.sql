-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 05:19 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-11-03 05:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `code`, `DepartmentShortName`, `CreationDate`) VALUES
(2, 'Information Technologies', '6789', 'ICT', '2017-11-01 07:19:37'),
(3, 'Library', '7894', 'LIb', '2021-05-21 08:27:45'),
(4, 'Computer science ', '123', 'Cs', '2024-03-20 17:23:17'),
(5, 'Mechanical', '7734', 'ME', '2024-04-04 14:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `emp_id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Av_leave` varchar(150) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `emp` int(255) NOT NULL,
  `aadhar` int(15) NOT NULL,
  `pan` varchar(250) NOT NULL,
  `caste` varchar(250) NOT NULL,
  `subcaste` varchar(250) NOT NULL,
  `ssc` varchar(255) NOT NULL,
  `hsc` varchar(255) NOT NULL,
  `be` varchar(255) NOT NULL,
  `pg` varchar(255) NOT NULL,
  `phd` varchar(255) NOT NULL,
  `publication` varchar(255) NOT NULL,
  `journal` varchar(255) NOT NULL,
  `patent` varchar(255) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL,
  `aadhar_pdf` varchar(255) NOT NULL,
  `pan_pdf` varchar(255) NOT NULL,
  `ssc_pdf` varchar(255) NOT NULL,
  `hsc_pdf` varchar(255) NOT NULL,
  `be_pdf` varchar(255) NOT NULL,
  `pg_pdf` varchar(255) NOT NULL,
  `phd_pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`emp_id`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Department`, `Address`, `Av_leave`, `Phonenumber`, `emp`, `aadhar`, `pan`, `caste`, `subcaste`, `ssc`, `hsc`, `be`, `pg`, `phd`, `publication`, `journal`, `patent`, `Status`, `RegDate`, `role`, `location`, `aadhar_pdf`, `pan_pdf`, `ssc_pdf`, `hsc_pdf`, `be_pdf`, `pg_pdf`, `phd_pdf`) VALUES
(0, 'Edemy', 'Mcwilliams', 'james@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male', '3 February, 1990', 'Cs', 'N NEPO', '30', '8587944255', 2130190, 2147483647, 'opi789yuo', 'hindu', 'hindu', '78', '78', '89', '81', '76', 'abc', 'abc', 'abc', 1, '2017-11-10 13:40:02', 'Admin', 'OIP.jpg', '', '', '', '', '', '', ''),
(4, 'Nathaniel', 'Nkrumah', 'nat@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Male', '3 February, 1990', 'ICT', 'N NEPO', '30', '587944255', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 1, '2017-11-10 13:40:02', 'Admin', 'NO-IMAGE-AVAILABLE.jpg', '', '', '', '', '', '', ''),
(5, 'Gideon', 'Annan', 'gideon@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Male', '3 February, 1990', 'ICT', 'N NEPO', '30', '587944255', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 1, '2017-11-10 13:40:02', 'HOD', 'photo5.jpg', '', '', '', '', '', '', ''),
(7, 'Bridget', 'Gafa', 'bridget@gmail.com', '202cb962ac59075b964b07152d234b70', 'Female', '3 February, 1990', 'ICT', 'N NEPO', '-4', '0596667981', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 1, '2017-11-10 13:40:02', 'Staff', '1920_File_logo4.png', '', '', '', '', '', '', ''),
(8, 'Anna', 'Mensah', 'an@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Female', '3 February, 1990', 'LIb', 'N NEPO', '30', '587944255', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 1, '2017-11-10 13:40:02', 'HOD', 'NO-IMAGE-AVAILABLE.jpg', '', '', '', '', '', '', ''),
(10, 'prem', 'shinde', 'prem@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '11 October 2023', 'ICT', 'jdli', '9', '07499034380', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 1, '2023-10-07 08:30:58', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '', '', '', '', '', '', ''),
(11, 'aakash', 'Kolhapure', 'aakash@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '08/03/2007', 'ICT', 'satara', '21', '07499034380', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 1, '2024-03-19 15:04:11', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '', '', '', '', '', '', ''),
(12, 'ron', 'sharma', 'ron@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', '07 March 2024', 'ICT', 'pune', '20', '08983081348', 894, 78944646, 'fsd45524dsds', 'sd', 'sdf', '4565', '55', '54', '54', '45', 'sd', 'df', 'df', 1, '2024-03-19 16:43:14', 'Principal', 'OIP.jpg', '', '', '', '', '', '', ''),
(123, 'Aaditya', 'kolhapure', 'aadityakolhapure28@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '29 March 2024', 'Cs', 'st colony satara', '8', '8983081348', 123, 41456, '2242', 'asd', 'fdsf', '89', '89', '89', '48', '78', '44', 'dsjk', 'asknda', 1, '2024-03-20 10:27:59', 'Staff', 'OIP.jpg', 'asd2.pdf', '10th result.pdf', 'dataBase.pdf', 'DigitalLogic_FlipFlops.pdf', 'exp 5 se.pdf', 'php.pdf', 'unit 1.pdf'),
(12334, 'pranav', 'kadam', 'pravan@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '07 March 2024', 'Cs', 'satara', '30', '123465432', 12334, 5464646, 'sffsaf545ef', 'asd', 'dasd', '78', '45', '45', '54', '45', 'adas', 'ds', 'as', 1, '2024-03-20 16:11:33', 'HOD', 'Screenshot (140).png', '', '', '', '', '', '', ''),
(123456793, 'Rushikesh', 'mote', 'rushi@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '20 April 2003', 'ME', 'satara', '30', '1234567890', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 1, '2024-04-04 14:37:39', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '', '', '', '', '', '', ''),
(123456794, 'amit', 'Patil', 'amit@gmail.com', '202cb962ac59075b964b07152d234b70', 'male', '04 April 2003', 'Cs', 'pune', '30', '123465432', 0, 0, '', '', '', '', '', '', '', '', '', '', '', 1, '2024-04-11 08:15:19', 'Staff', 'NO-IMAGE-AVAILABLE.jpg', '', '', '', '', '', '', '');

--
-- Triggers `tblemployees`
--
DELIMITER $$
CREATE TRIGGER `before_employee_delete` BEFORE DELETE ON `tblemployees` FOR EACH ROW BEGIN
  -- Trigger logic goes here
  -- Example: Insert record into audit table
  INSERT INTO employee_audit (emp_id, action_taken, action_date)
  VALUES (OLD.emp_id, 'DELETE', NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(110) NOT NULL,
  `ToDate` varchar(120) NOT NULL,
  `FromDate` varchar(120) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` date NOT NULL,
  `AdminRemark` mediumtext DEFAULT NULL,
  `registra_remarks` mediumtext NOT NULL,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT 0,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `num_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `LeaveType`, `ToDate`, `FromDate`, `Description`, `PostingDate`, `AdminRemark`, `registra_remarks`, `AdminRemarkDate`, `Status`, `admin_status`, `IsRead`, `empid`, `num_days`) VALUES
(13, 'Casual Leave', '2021-05-02', '2021-05-12', 'I want to take a leave.', '2021-05-20', 'Ok', 'ok', '2021-05-24 20:26:19 ', 1, 1, 1, 7, 3),
(14, 'Medical Leave', '08-05-2021', '11-05-2021', 'Noted', '0000-00-00', 'Not this time', '', '2021-05-21 0:31:10 ', 0, 0, 1, 6, 4),
(16, 'Casual Leave', '02-05-2021', '05-05-2021', 'Nice Leave', '2021-05-20', 'Ok', 'Noted', '2021-05-24 20:42:18 ', 1, 1, 1, 7, 4),
(17, 'Casual Leave', '11-05-2021', '15-05-2021', 'Just', '2021-05-21', 'Leave Approved', 'Noted', '2021-05-24 19:56:45 ', 1, 1, 1, 7, 5),
(18, 'Casual Leave', '10-10-2023', '14-10-2023', 'abc', '2023-10-06', 'xyz', 'abc', '2023-10-07 13:50:15 ', 1, 1, 1, 7, 5),
(19, 'Medical Leave', '13-10-2023', '15-10-2023', 'xyz', '2023-10-07', 'mibn', 'vv', '2023-10-07 14:07:34 ', 1, 1, 1, 10, 3),
(20, 'Casual Leave', '08-03-2024', '16-03-2024', 'xyz', '2024-03-19', 'xyz\r\n', 'abc\r\n', '2024-03-19 20:41:20 ', 1, 1, 1, 11, 9),
(21, 'Casual Leave', '20-03-2024', '21-03-2024', 'abc\r\n', '2024-03-19', 'dfg', 'Leave was Rejected. Registra/Registry will not see it', '2024-04-04 19:46:11 ', 2, 2, 1, 11, 2),
(22, 'Casual Leave', '22-03-2024', '23-03-2024', 'xyz', '2024-03-21', 'abc', 'abc\r\n', '2024-03-21 10:48:09 ', 1, 1, 1, 12345, 2),
(24, 'Medical Leave', '30-03-2024', '31-03-2024', '123', '2024-03-29', 'zxcv', '', '2024-03-29 21:04:17 ', 1, 0, 1, 12345, 2),
(25, 'family Leave', '05-04-2024', '06-04-2024', 'abc', '2024-04-04', 'asd', 'Leave was Rejected. Registra/Registry will not see it', '2024-04-04 19:45:22 ', 1, 2, 1, 12345, 2),
(30, 'Other', '13-04-2024', '14-04-2024', 'qwe', '2024-04-06', 'wer', 'Leave was Rejected. Registra/Registry will not see it', '2024-04-06 21:05:32 ', 2, 2, 1, 123456, 2),
(31, 'Medical Leave', '12-04-2024', '12-04-2024', 'qwe', '2024-04-11', NULL, '', NULL, 0, 0, 1, 123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(200) DEFAULT NULL,
  `date_from` varchar(200) NOT NULL,
  `date_to` varchar(200) NOT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `LeaveType`, `date_from`, `date_to`, `Description`, `CreationDate`) VALUES
(5, 'Casual Leave', '', '', 'Casual Leave', '2021-05-19 14:32:03'),
(6, 'Medical Leave', '', '', 'Medical Leave', '2021-05-19 15:29:05'),
(8, 'Other', '', '', 'Leave all staff', '2021-05-20 17:17:43'),
(9, 'family Leave', '', '', 'xyz', '2024-04-04 14:04:16'),
(10, 'Emergency ', '', '', 'qwe', '2024-04-04 14:09:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indexes for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456795;

--
-- AUTO_INCREMENT for table `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
