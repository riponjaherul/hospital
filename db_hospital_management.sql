-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2015 at 11:30 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_hospital_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`admin_id` int(2) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email_address` varchar(50) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_image` varchar(100) NOT NULL,
  `access_level` tinyint(1) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email_address`, `admin_password`, `admin_image`, `access_level`, `publication_status`, `deletion_status`) VALUES
(1, 'Jaherul Ripon', 'ripon@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin_image/ripon1.jpg', 1, 1, 0),
(2, 'Touhidul Islam', 'touhid@gmail.com', 'c33367701511b4f6020ec61ded352059', 'admin_image/touhid.jpg', 2, 1, 0),
(3, 'Jaherul Ripon', 'riponjaherul@gmail.com', '2bbb64bd2fb52e28b9ffbb1636f656e4', 'admin_image/ripon1.jpg', 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE IF NOT EXISTS `tbl_appointment` (
`appointment_id` int(5) NOT NULL,
  `doctor_id` int(5) NOT NULL,
  `patient_reg_id` varchar(8) NOT NULL,
  `appointment_date` date NOT NULL,
  `shift_id` tinyint(1) NOT NULL,
  `time_slot_id` int(3) NOT NULL,
  `appointment_current_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `appointment_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Satus =2 : pending, Satus =1 : Yes,Satus =0 : No,',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`appointment_id`, `doctor_id`, `patient_reg_id`, `appointment_date`, `shift_id`, `time_slot_id`, `appointment_current_time`, `appointment_status`, `deletion_status`) VALUES
(32, 3, 'R0179001', '2015-09-03', 2, 6, '2015-09-03 17:49:15', 0, 0),
(33, 3, 'R0179000', '2015-09-03', 1, 13, '2015-09-03 17:49:17', 0, 0),
(34, 3, 'R0179001', '2015-09-03', 2, 6, '2015-09-03 17:49:19', 0, 0),
(35, 2, 'R0179000', '2015-09-04', 1, 15, '2015-09-03 18:58:26', 2, 0),
(36, 2, 'R0179001', '2015-09-05', 1, 18, '2015-09-03 18:58:38', 2, 0),
(37, 2, 'R0179000', '2015-09-03', 1, 13, '2015-09-03 19:28:21', 0, 0),
(38, 2, 'R0179001', '2015-09-03', 1, 17, '2015-09-03 19:28:32', 0, 0),
(39, 2, 'R0179002', '2015-09-03', 1, 15, '2015-09-03 21:06:35', 0, 0),
(40, 2, 'R0179000', '2015-09-03', 1, 20, '2015-09-03 21:27:48', 0, 0),
(41, 2, 'R0179001', '2015-09-03', 1, 14, '2015-09-03 21:28:28', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment_temp`
--

CREATE TABLE IF NOT EXISTS `tbl_appointment_temp` (
`appointment_temp_id` int(5) NOT NULL,
  `doctor_id` int(3) NOT NULL,
  `time_slot_id` int(3) NOT NULL,
  `appointment_date` date NOT NULL,
  `shift_id` tinyint(1) NOT NULL,
  `patient_reg_id` tinyint(1) DEFAULT '0',
  `patient_name` varchar(30) NOT NULL,
  `patient_phone_number` varchar(15) NOT NULL,
  `appointment_current_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `appointment_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Status=2:pending,Status=1:Yes,Status=0:No',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_appointment_temp`
--

INSERT INTO `tbl_appointment_temp` (`appointment_temp_id`, `doctor_id`, `time_slot_id`, `appointment_date`, `shift_id`, `patient_reg_id`, `patient_name`, `patient_phone_number`, `appointment_current_time`, `appointment_status`, `deletion_status`) VALUES
(19, 2, 15, '2015-09-03', 1, 0, 'Ripon', '01912794195', '2015-09-03 21:27:29', 0, 1),
(20, 2, 20, '2015-09-03', 1, 0, 'Touhid', '0191123232', '2015-09-03 21:27:43', 0, 1),
(22, 2, 21, '2015-09-03', 1, 0, 'Rasel Khan', '019127876', '2015-09-03 17:48:46', 0, 0),
(23, 2, 4, '2015-09-03', 2, 0, 'Touhid', '017657232366', '2015-09-03 17:48:48', 0, 0),
(24, 2, 8, '2015-09-03', 2, 0, 'Kafi', '64564564', '2015-09-03 21:17:35', 0, 1),
(25, 2, 18, '2015-09-03', 1, 0, 'Rasel Khan', '0197868195', '2015-09-03 18:13:36', 0, 0),
(26, 2, 22, '2015-09-03', 1, 0, 'Ripon', '8687', '2015-09-03 18:13:55', 0, 0),
(27, 2, 14, '2015-09-03', 1, 0, 'Kafi', '6757567', '2015-09-03 21:28:20', 0, 1),
(28, 2, 7, '2015-09-03', 2, 0, 'Kafi', '4646656', '2015-09-03 18:14:36', 0, 0),
(29, 2, 1, '2015-09-03', 2, 0, 'Kafi', '6576576', '2015-09-03 18:15:04', 0, 0),
(30, 2, 12, '2015-09-03', 2, 0, 'Ripon', '4575767', '2015-09-03 18:15:18', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE IF NOT EXISTS `tbl_department` (
`department_id` int(3) NOT NULL,
  `department_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`) VALUES
(1, 'Anaesthetics'),
(2, 'Cardiology'),
(3, 'Ear nose and throat (ENT)'),
(4, 'Gastroenterology'),
(5, 'Gynaecology'),
(6, 'Haematology'),
(7, 'Nephrology'),
(8, 'Neurology'),
(9, 'Oncology'),
(10, 'Radiotherapy'),
(11, 'Urology');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE IF NOT EXISTS `tbl_doctor` (
`doctor_id` int(5) NOT NULL,
  `department_id` tinyint(2) NOT NULL,
  `doctor_type_id` tinyint(2) NOT NULL,
  `doctor_title` varchar(10) NOT NULL DEFAULT 'Dr.',
  `doctor_first_name` varchar(20) NOT NULL,
  `doctor_last_name` varchar(20) NOT NULL,
  `doctor_qualification` varchar(100) NOT NULL,
  `doctor_gender` varchar(10) NOT NULL,
  `doctor_general_description` text NOT NULL,
  `doctor_address` text NOT NULL,
  `doctor_email_address` varchar(50) NOT NULL,
  `doctor_password` varchar(32) NOT NULL,
  `doctor_phone_number` varchar(15) NOT NULL,
  `doctor_image` varchar(50) NOT NULL,
  `doctor_stauts` tinyint(1) NOT NULL DEFAULT '0',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctor_id`, `department_id`, `doctor_type_id`, `doctor_title`, `doctor_first_name`, `doctor_last_name`, `doctor_qualification`, `doctor_gender`, `doctor_general_description`, `doctor_address`, `doctor_email_address`, `doctor_password`, `doctor_phone_number`, `doctor_image`, `doctor_stauts`, `deletion_status`) VALUES
(2, 1, 1, 'Dr.', 'Ali', 'Ahamed', 'MBBS, FCPS', 'Male', '<p align="justify">Prof. Dr. Md. Ali Ahamed graduated from Chittagong Medical College, under the University of Chittagong in 1982. After his internship year he worked as Medical Officer at Rural Health Centers of Bangladesh. In the year 1985 he joined as Resident Anesthesiologist at Dhaka Medical College Hospital (DMCH). He obtained his fellowship FCPS (Anesthesiology) from the Bangladesh College of Physicians and surgeons (BCPS) in 1989. After his fellowship he then worked as Registrar, Consultant, Assistant Professor, & Associate Professor of Cardiac Anesthesiology at NICVD till 2003. In the year 2004 he joined as Associate Professor of Cardiac Anesthesia at Bangabandhu Sheikh Mujib Medical University (BSMMU) and appointed as Professor of Anesthesiology at BSMMU in 2006 & working there just before joining at present position. Prof. Habib participated in some advanced training program in Cardiac Anesthesia & Intensive Care in National Cardio-Vascular Centre of Osaka, (JAPAN), WHO Fellowship program in Cardiac Anesthesia (USA), WHO Fellowship program in Cardiac Anesthesia (SWEDEN)).</p>', 'Mirpur', 'ali@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01912795196', 'doctor_image/doctor1.jpg', 0, 0),
(3, 1, 1, 'Dr.', 'Kaiser', 'Mahamud', 'MBBS, FCPS', 'Male', '<p align="justify">Dr. Md. Kaiser Mahamud graduated from Chittagong Medical College, under the University of Chittagong in 1982. After his internship year he worked as Medical Officer at Rural Health Centers of Bangladesh. In the year 1985 he joined as Resident Anesthesiologist at Dhaka Medical College Hospital (DMCH). He obtained his fellowship FCPS (Anesthesiology) from the Bangladesh College of Physicians and surgeons (BCPS) in 1989. After his fellowship he then worked as Registrar, Consultant, Assistant Professor, & Associate Professor of Cardiac Anesthesiology at NICVD till 2003. In the year 2004 he joined as Associate Professor of Cardiac Anesthesia at Bangabandhu Sheikh Mujib Medical University (BSMMU) and appointed as Professor of Anesthesiology at BSMMU in 2006 & working there just before joining at present position. Prof. Habib participated in some advanced training program in Cardiac Anesthesia & Intensive Care in National Cardio-Vascular Centre of Osaka, (JAPAN), WHO Fellowship program in Cardiac Anesthesia (USA), WHO Fellowship program in Cardiac Anesthesia (SWEDEN)).</p>', 'Shantinagar', 'kaiser@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0191374844', 'doctor_image/doctor2.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_type`
--

CREATE TABLE IF NOT EXISTS `tbl_doctor_type` (
`doctor_type_id` int(11) NOT NULL,
  `doctor_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_doctor_type`
--

INSERT INTO `tbl_doctor_type` (`doctor_type_id`, `doctor_type_name`) VALUES
(1, 'Consultant'),
(2, 'Assistant Consultant'),
(3, 'Emergency'),
(4, 'Duty Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE IF NOT EXISTS `tbl_patient` (
`patient_id` int(5) NOT NULL,
  `patient_reg_id` varchar(10) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `patient_gender` varchar(10) NOT NULL,
  `patient_address` text NOT NULL,
  `patient_type` varchar(15) NOT NULL,
  `patient_ref_doctor` varchar(30) NOT NULL,
  `patient_phone_number` varchar(15) NOT NULL,
  `patient_email_address` varchar(50) NOT NULL,
  `patient_password` varchar(32) NOT NULL,
  `patient_attendance_name` varchar(20) NOT NULL,
  `patient_attendance_p_number` varchar(15) NOT NULL,
  `patient_attendance_relation` varchar(15) NOT NULL,
  `patient_image` varchar(100) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `patient_reg_id`, `patient_name`, `patient_gender`, `patient_address`, `patient_type`, `patient_ref_doctor`, `patient_phone_number`, `patient_email_address`, `patient_password`, `patient_attendance_name`, `patient_attendance_p_number`, `patient_attendance_relation`, `patient_image`, `deletion_status`) VALUES
(1, 'R0179000', 'Nabid Ahamed', 'Male', '118/1, Shantinagar, Dhaka', 'Neprology', 'Dr. Syed Mukarram Ali', '01912795194', 'nabid@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Kaiser Ahamed', '01912799877', 'Father', 'patient_image/patient1.jpg', 0),
(2, 'R0179001', 'Dilrose Ara Islam', 'Female', '118/1, Shantinagar', 'Neprology', 'Dr. Musaddake Ahamed', '01912799799', 'islam@gmail.com', '123456', 'Zahid Uzzal', '0171944444', 'Nephew', 'patient_image/patient2.jpg', 0),
(3, 'R0179002', 'Habib Ahamed', 'Male', 'Nobinnagor', 'Neprology', 'Dr. Musaddake Ahamed', '0191221412', 'habib@gmail.com', '123456', 'Kayes Arman', '019231133', 'Son', 'patient_image/patient2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription`
--

CREATE TABLE IF NOT EXISTS `tbl_prescription` (
`prescription_id` int(5) NOT NULL,
  `prescription_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `patient_id` int(5) NOT NULL,
  `patient_histroy` text NOT NULL,
  `patient_blood_pressure` varchar(10) NOT NULL,
  `patient_tempetature` varchar(3) NOT NULL,
  `patient_weight` varchar(3) NOT NULL,
  `patient_drug_name` varchar(20) NOT NULL,
  `patient_drug_unit` varchar(20) NOT NULL,
  `patient_drug_dosage` varchar(20) NOT NULL,
  `patient_drug_time` varchar(20) NOT NULL,
  `patient_drug_expire_days` varchar(10) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prescription`
--

INSERT INTO `tbl_prescription` (`prescription_id`, `prescription_date`, `patient_id`, `patient_histroy`, `patient_blood_pressure`, `patient_tempetature`, `patient_weight`, `patient_drug_name`, `patient_drug_unit`, `patient_drug_dosage`, `patient_drug_time`, `patient_drug_expire_days`, `deletion_status`) VALUES
(1, '2015-08-10 20:47:14', 2, 'H2', '130/90', '100', '56', 'a:2:{i:0;s:4:"Napa";', 'a:2:{i:0;s:3:"tab";i', 'a:2:{i:0;s:5:"1+0+0"', 'a:2:{i:0;s:10:"After', 'a:2:{i:0;s', 0),
(2, '2015-08-10 20:49:53', 1, 'hgfhg', '150/140', '99', '54', 'a:3:{i:0;s:11:"Parac', 'a:3:{i:0;s:3:"tab";i', 'a:3:{i:0;s:5:"1+1+1"', 'a:3:{i:0;s:10:"After', 'a:3:{i:0;s', 0),
(3, '2015-08-10 20:51:39', 2, 'fdfd', '150/140', '99', '56', 'a:2:{i:0;s:11:"Parac', 'a:2:{i:0;s:3:"tab";i', 'a:2:{i:0;s:5:"1+0+0"', 'a:2:{i:0;s:11:"Befor', 'a:2:{i:0;s', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription_test`
--

CREATE TABLE IF NOT EXISTS `tbl_prescription_test` (
`prescription_test_id` int(5) NOT NULL,
  `patient_id` int(5) NOT NULL,
  `test_id` varchar(100) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reg_manager`
--

CREATE TABLE IF NOT EXISTS `tbl_reg_manager` (
`reg_manager_id` tinyint(2) NOT NULL,
  `reg_manager_name` varchar(30) NOT NULL,
  `reg_manager_phone_number` varchar(15) NOT NULL,
  `reg_manager_email_address` varchar(50) NOT NULL,
  `reg_manager_password` varchar(32) NOT NULL,
  `reg_manager_image` varchar(100) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_reg_manager`
--

INSERT INTO `tbl_reg_manager` (`reg_manager_id`, `reg_manager_name`, `reg_manager_phone_number`, `reg_manager_email_address`, `reg_manager_password`, `reg_manager_image`, `deletion_status`) VALUES
(1, 'Registration Manager', '0191111111', 'registration@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'reg_manager_image/reg_manager2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report_manager`
--

CREATE TABLE IF NOT EXISTS `tbl_report_manager` (
`r_manager_id` int(3) NOT NULL,
  `r_manager_name` varchar(25) NOT NULL,
  `r_manager_phone_number` varchar(15) NOT NULL,
  `r_manager_email_address` varchar(50) NOT NULL,
  `r_manager_password` varchar(32) NOT NULL,
  `r_manager_image` varchar(100) NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_report_manager`
--

INSERT INTO `tbl_report_manager` (`r_manager_id`, `r_manager_name`, `r_manager_phone_number`, `r_manager_email_address`, `r_manager_password`, `r_manager_image`, `deletion_status`) VALUES
(1, 'Habib Akondo', '0191818181', 'habib@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'r_manager_image/r_manager1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shift`
--

CREATE TABLE IF NOT EXISTS `tbl_shift` (
`shift_id` tinyint(1) NOT NULL,
  `shift_name` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shift`
--

INSERT INTO `tbl_shift` (`shift_id`, `shift_name`) VALUES
(1, 'Morning'),
(2, 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE IF NOT EXISTS `tbl_test` (
`test_id` int(5) NOT NULL,
  `test_category_id` int(5) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`test_id`, `test_category_id`, `test_name`, `deletion_status`) VALUES
(1, 1, 'test1', 0),
(2, 1, 'test2', 0),
(3, 1, 'test4', 0),
(4, 1, 'test5', 0),
(5, 1, 'test7', 0),
(6, 1, 'test8', 0),
(7, 1, 'test9', 0),
(8, 1, 'test10', 0),
(9, 2, 'test1', 0),
(10, 2, 'test2', 0),
(11, 2, 'test3', 0),
(12, 2, 'test4', 0),
(13, 2, 'test5', 0),
(14, 2, 'test6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_category`
--

CREATE TABLE IF NOT EXISTS `tbl_test_category` (
`test_category_id` int(5) NOT NULL,
  `test_category_name` varchar(20) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_test_category`
--

INSERT INTO `tbl_test_category` (`test_category_id`, `test_category_name`, `deletion_status`) VALUES
(1, 'test_category_1', 0),
(2, 'test_category_2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_slot`
--

CREATE TABLE IF NOT EXISTS `tbl_time_slot` (
`time_slot_id` tinyint(3) NOT NULL,
  `shift_id` tinyint(1) NOT NULL,
  `time_slot_time` varchar(10) NOT NULL,
  `time_slot_serial` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_time_slot`
--

INSERT INTO `tbl_time_slot` (`time_slot_id`, `shift_id`, `time_slot_time`, `time_slot_serial`) VALUES
(1, 2, '4:00 PM', 1),
(2, 2, '4:20 PM', 2),
(3, 2, '4:40 PM', 3),
(4, 2, '5:00 PM', 4),
(5, 2, '5:20 PM', 5),
(6, 2, '5:40 PM', 6),
(7, 2, '6:00 PM', 7),
(8, 2, '6:20 PM', 8),
(9, 2, '6:40 PM', 9),
(10, 2, '7:00 PM', 10),
(11, 2, '7:20 PM', 11),
(12, 2, '7:40 PM', 12),
(13, 1, '10:00 AM', 1),
(14, 1, '10:20 AM', 2),
(15, 1, '10:40 AM', 3),
(16, 1, '11:00 AM', 4),
(17, 1, '11:20 AM', 5),
(18, 1, '11:40 AM', 6),
(19, 1, '12:00 PM', 7),
(20, 1, '12:20 PM', 8),
(21, 1, '12:40 PM', 9),
(22, 1, '1:00 PM', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
 ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `tbl_appointment_temp`
--
ALTER TABLE `tbl_appointment_temp`
 ADD PRIMARY KEY (`appointment_temp_id`), ADD UNIQUE KEY `appointment_current_time` (`appointment_current_time`), ADD UNIQUE KEY `patient_phone_number` (`patient_phone_number`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
 ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
 ADD PRIMARY KEY (`doctor_id`), ADD UNIQUE KEY `doctor_email_address` (`doctor_email_address`);

--
-- Indexes for table `tbl_doctor_type`
--
ALTER TABLE `tbl_doctor_type`
 ADD PRIMARY KEY (`doctor_type_id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
 ADD PRIMARY KEY (`patient_id`), ADD UNIQUE KEY `patient_ref_id` (`patient_reg_id`), ADD UNIQUE KEY `patient_email_address` (`patient_email_address`);

--
-- Indexes for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
 ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `tbl_prescription_test`
--
ALTER TABLE `tbl_prescription_test`
 ADD PRIMARY KEY (`prescription_test_id`);

--
-- Indexes for table `tbl_reg_manager`
--
ALTER TABLE `tbl_reg_manager`
 ADD PRIMARY KEY (`reg_manager_id`);

--
-- Indexes for table `tbl_report_manager`
--
ALTER TABLE `tbl_report_manager`
 ADD PRIMARY KEY (`r_manager_id`);

--
-- Indexes for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
 ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
 ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `tbl_test_category`
--
ALTER TABLE `tbl_test_category`
 ADD PRIMARY KEY (`test_category_id`);

--
-- Indexes for table `tbl_time_slot`
--
ALTER TABLE `tbl_time_slot`
 ADD PRIMARY KEY (`time_slot_id`), ADD UNIQUE KEY `time_slot_time` (`time_slot_time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
MODIFY `appointment_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_appointment_temp`
--
ALTER TABLE `tbl_appointment_temp`
MODIFY `appointment_temp_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
MODIFY `department_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
MODIFY `doctor_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_doctor_type`
--
ALTER TABLE `tbl_doctor_type`
MODIFY `doctor_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
MODIFY `patient_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
MODIFY `prescription_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_prescription_test`
--
ALTER TABLE `tbl_prescription_test`
MODIFY `prescription_test_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_reg_manager`
--
ALTER TABLE `tbl_reg_manager`
MODIFY `reg_manager_id` tinyint(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_report_manager`
--
ALTER TABLE `tbl_report_manager`
MODIFY `r_manager_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
MODIFY `shift_id` tinyint(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_test_category`
--
ALTER TABLE `tbl_test_category`
MODIFY `test_category_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_time_slot`
--
ALTER TABLE `tbl_time_slot`
MODIFY `time_slot_id` tinyint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
