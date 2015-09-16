-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2015 at 06:14 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

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
(41, 2, 'R0179001', '2015-09-03', 1, 14, '2015-09-03 21:28:28', 0, 0),
(42, 2, 'R0179006', '2015-09-03', 1, 18, '2015-09-04 18:22:27', 0, 0),
(43, 2, 'R0179000', '2015-09-07', 1, 13, '2015-09-07 11:41:50', 1, 0),
(44, 2, 'R0179001', '2015-09-07', 1, 17, '2015-09-07 13:15:37', 1, 0),
(46, 2, 'R0179002', '2015-09-07', 1, 16, '2015-09-07 14:33:28', 1, 0),
(47, 2, 'R0179003', '2015-09-07', 1, 19, '2015-09-07 14:33:12', 1, 0),
(48, 2, 'R0179004', '2015-09-07', 1, 15, '2015-09-08 08:27:16', 1, 0),
(49, 2, 'R0179005', '2015-09-07', 1, 22, '2015-09-07 17:42:16', 1, 0),
(50, 2, 'R0179000', '2015-09-16', 1, 15, '2015-09-15 18:00:55', 1, 0),
(51, 2, 'R0179001', '2015-09-16', 1, 17, '2015-09-15 18:01:08', 1, 0),
(52, 2, 'R0179002', '2015-09-16', 1, 13, '2015-09-15 18:00:30', 1, 0),
(53, 2, 'R0179003', '2015-09-16', 1, 22, '2015-09-15 18:01:30', 1, 0),
(54, 2, 'R0179004', '2015-09-16', 1, 14, '2015-09-15 18:00:43', 1, 0),
(55, 2, 'R0179005', '2015-09-16', 1, 18, '2015-09-15 18:01:18', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment_bill`
--

CREATE TABLE IF NOT EXISTS `tbl_appointment_bill` (
`appointment_bill_id` int(10) NOT NULL,
  `doctor_id` int(5) NOT NULL,
  `patient_id` int(5) NOT NULL,
  `discount_status` tinyint(1) NOT NULL,
  `appointment_bill_amount` int(10) NOT NULL,
  `appointment_date` varchar(15) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_appointment_bill`
--

INSERT INTO `tbl_appointment_bill` (`appointment_bill_id`, `doctor_id`, `patient_id`, `discount_status`, `appointment_bill_amount`, `appointment_date`, `deletion_status`) VALUES
(1, 2, 1, 1, 500, '2015-09-07', 0),
(2, 2, 2, 1, 500, '2015-09-07', 0),
(3, 2, 6, 0, 1000, '2015-09-07', 0),
(4, 2, 5, 1, 500, '2015-09-09', 0),
(5, 2, 3, 1, 500, '2015-09-16', 0),
(6, 2, 5, 1, 500, '2015-09-16', 0),
(7, 2, 1, 1, 500, '2015-09-16', 0),
(8, 2, 2, 1, 500, '2015-09-16', 0),
(9, 2, 6, 1, 500, '2015-09-16', 0),
(10, 2, 4, 1, 500, '2015-09-16', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_appointment_temp`
--

INSERT INTO `tbl_appointment_temp` (`appointment_temp_id`, `doctor_id`, `time_slot_id`, `appointment_date`, `shift_id`, `patient_reg_id`, `patient_name`, `patient_phone_number`, `appointment_current_time`, `appointment_status`, `deletion_status`) VALUES
(19, 2, 15, '2015-09-03', 1, 0, 'Ripon', '01912794195', '2015-09-07 11:20:39', 1, 1),
(20, 2, 20, '2015-09-03', 1, 0, 'Touhid', '0191123232', '2015-09-03 21:27:43', 0, 1),
(22, 2, 21, '2015-09-03', 1, 0, 'Rasel Khan', '019127876', '2015-09-04 18:24:10', 0, 1),
(23, 2, 4, '2015-09-03', 2, 0, 'Touhid', '017657232366', '2015-09-03 17:48:48', 0, 0),
(24, 2, 8, '2015-09-03', 2, 0, 'Kafi', '64564564', '2015-09-03 21:17:35', 0, 1),
(25, 2, 18, '2015-09-03', 1, 0, 'Rasel Khan', '0197868195', '2015-09-04 18:22:16', 0, 1),
(26, 2, 22, '2015-09-03', 1, 0, 'Ripon', '8687', '2015-09-03 18:13:55', 0, 0),
(27, 2, 14, '2015-09-03', 1, 0, 'Kafi', '6757567', '2015-09-03 21:28:20', 0, 1),
(28, 2, 7, '2015-09-03', 2, 0, 'Kafi', '4646656', '2015-09-03 18:14:36', 0, 0),
(29, 2, 1, '2015-09-03', 2, 0, 'Kafi', '6576576', '2015-09-03 18:15:04', 0, 0),
(30, 2, 12, '2015-09-03', 2, 0, 'Ripon', '4575767', '2015-09-03 18:15:18', 0, 0),
(32, 2, 21, '2015-09-07', 1, 0, 'Ripon', '56464', '2015-09-06 18:26:41', 0, 1),
(33, 2, 18, '2015-09-07', 1, 0, 'Kafi', '56464646', '2015-09-06 19:08:34', 0, 1),
(34, 2, 14, '2015-09-07', 1, 0, 'Ripon', '0191279545', '2015-09-07 17:33:01', 1, 1),
(35, 2, 15, '2015-09-07', 1, 0, 'Rasel Khan', '01912794584', '2015-09-07 17:28:41', 1, 1),
(36, 2, 22, '2015-09-07', 1, 0, 'Touhid', '019127953', '2015-09-07 17:42:04', 1, 1);

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
  `doctor_signature` varchar(100) NOT NULL,
  `doctor_stauts` tinyint(1) NOT NULL DEFAULT '0',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctor_id`, `department_id`, `doctor_type_id`, `doctor_title`, `doctor_first_name`, `doctor_last_name`, `doctor_qualification`, `doctor_gender`, `doctor_general_description`, `doctor_address`, `doctor_email_address`, `doctor_password`, `doctor_phone_number`, `doctor_image`, `doctor_signature`, `doctor_stauts`, `deletion_status`) VALUES
(2, 1, 1, 'Dr.', 'Ali', 'Ahamed', 'MBBS, FCPS', 'Male', '<p align="justify">Prof. Dr. Md. Ali Ahamed graduated from Chittagong Medical College, under the University of Chittagong in 1982. After his internship year he worked as Medical Officer at Rural Health Centers of Bangladesh. In the year 1985 he joined as Resident Anesthesiologist at Dhaka Medical College Hospital (DMCH). He obtained his fellowship FCPS (Anesthesiology) from the Bangladesh College of Physicians and surgeons (BCPS) in 1989. After his fellowship he then worked as Registrar, Consultant, Assistant Professor, & Associate Professor of Cardiac Anesthesiology at NICVD till 2003. In the year 2004 he joined as Associate Professor of Cardiac Anesthesia at Bangabandhu Sheikh Mujib Medical University (BSMMU) and appointed as Professor of Anesthesiology at BSMMU in 2006 & working there just before joining at present position. Prof. Habib participated in some advanced training program in Cardiac Anesthesia & Intensive Care in National Cardio-Vascular Centre of Osaka, (JAPAN), WHO Fellowship program in Cardiac Anesthesia (USA), WHO Fellowship program in Cardiac Anesthesia (SWEDEN)).</p>', 'Mirpur', 'ali@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01912795196', 'doctor_image/doctor1.jpg', 'doctor_signature/1.jpg', 0, 0),
(3, 1, 1, 'Dr.', 'Kaiser', 'Mahamud', 'MBBS, FCPS', 'Male', '<p align="justify">Dr. Md. Kaiser Mahamud graduated from Chittagong Medical College, under the University of Chittagong in 1982. After his internship year he worked as Medical Officer at Rural Health Centers of Bangladesh. In the year 1985 he joined as Resident Anesthesiologist at Dhaka Medical College Hospital (DMCH). He obtained his fellowship FCPS (Anesthesiology) from the Bangladesh College of Physicians and surgeons (BCPS) in 1989. After his fellowship he then worked as Registrar, Consultant, Assistant Professor, & Associate Professor of Cardiac Anesthesiology at NICVD till 2003. In the year 2004 he joined as Associate Professor of Cardiac Anesthesia at Bangabandhu Sheikh Mujib Medical University (BSMMU) and appointed as Professor of Anesthesiology at BSMMU in 2006 & working there just before joining at present position. Prof. Habib participated in some advanced training program in Cardiac Anesthesia & Intensive Care in National Cardio-Vascular Centre of Osaka, (JAPAN), WHO Fellowship program in Cardiac Anesthesia (USA), WHO Fellowship program in Cardiac Anesthesia (SWEDEN)).</p>', 'Shantinagar', 'kaiser@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0191374844', 'doctor_image/doctor2.jpg', 'doctor_signature/1.jpg', 0, 0);

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
-- Table structure for table `tbl_medicine_time`
--

CREATE TABLE IF NOT EXISTS `tbl_medicine_time` (
`medicine_time_id` tinyint(1) NOT NULL,
  `medicine_time_name` varchar(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_medicine_time`
--

INSERT INTO `tbl_medicine_time` (`medicine_time_id`, `medicine_time_name`) VALUES
(1, 'After Meal'),
(2, 'Before Meal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nurse`
--

CREATE TABLE IF NOT EXISTS `tbl_nurse` (
`nurse_id` int(5) NOT NULL,
  `nurse_name` varchar(25) NOT NULL,
  `nurse_email_address` varchar(50) NOT NULL,
  `nurse_password` varchar(32) NOT NULL,
  `nurse_image` varchar(100) NOT NULL,
  `nurse_status` tinyint(1) NOT NULL DEFAULT '0',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_nurse`
--

INSERT INTO `tbl_nurse` (`nurse_id`, `nurse_name`, `nurse_email_address`, `nurse_password`, `nurse_image`, `nurse_status`, `deletion_status`) VALUES
(2, 'Nurse 1', 'nurse1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nurse_image/nurse1.jpg', 0, 0),
(3, 'Nurse 2', 'nurse2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nurse_image/nurse1.jpg', 0, 0),
(4, 'Nurse 3', 'nurse3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nurse_image/nurse1.jpg', 0, 0),
(5, 'Nurse 4', 'nurse4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nurse_image/nurse1.jpg', 0, 0),
(6, 'Nurse 5', 'nurse5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nurse_image/nurse1.jpg', 0, 0),
(7, 'Nurse 6', 'nurse6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nurse_image/nurse1.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nurse_manager`
--

CREATE TABLE IF NOT EXISTS `tbl_nurse_manager` (
`nurse_manager_id` int(5) NOT NULL,
  `department_id` tinyint(2) NOT NULL,
  `nurse_id` tinyint(3) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_nurse_manager`
--

INSERT INTO `tbl_nurse_manager` (`nurse_manager_id`, `department_id`, `nurse_id`, `deletion_status`) VALUES
(1, 1, 2, 0),
(2, 2, 3, 0),
(3, 3, 4, 0),
(4, 7, 5, 0),
(5, 8, 6, 0),
(6, 9, 2, 0),
(7, 11, 7, 0),
(8, 2, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE IF NOT EXISTS `tbl_patient` (
`patient_id` int(5) NOT NULL,
  `department_id` tinyint(2) NOT NULL,
  `doctor_id` tinyint(3) NOT NULL,
  `patient_reg_id` varchar(10) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `patient_gender` varchar(10) NOT NULL,
  `patient_address` text NOT NULL,
  `patient_phone_number` varchar(15) NOT NULL,
  `patient_email_address` varchar(50) NOT NULL,
  `patient_password` varchar(32) NOT NULL,
  `patient_dob` varchar(10) NOT NULL,
  `patient_image` varchar(100) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `department_id`, `doctor_id`, `patient_reg_id`, `patient_name`, `patient_gender`, `patient_address`, `patient_phone_number`, `patient_email_address`, `patient_password`, `patient_dob`, `patient_image`, `deletion_status`) VALUES
(1, 1, 2, 'R0179000', 'Nabid Ahamed', 'Male', '118/1, Shantinagar, Dhaka', '01912795194', 'patient1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1975-12-19', 'patient_image/patient1.jpg', 0),
(2, 1, 2, 'R0179001', 'Dilrose Ara Islam', 'Female', '118/1, Shantinagar', '01912799799', 'patient2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1977-03-08', 'patient_image/patient2.jpg', 0),
(3, 1, 2, 'R0179002', 'Habib Ahamed', 'Male', 'Nobinnagor', '0191221412', 'patient3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1982-11-15', 'patient_image/patient2.jpg', 0),
(4, 1, 2, 'R0179003', 'Kayes Khan', 'Male', 'Paltan', '019182211', 'patient4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1991-01-15', '', 0),
(5, 1, 2, 'R0179004', 'Shila Ahamed', 'Female', 'Paltan', '01312312', 'patient5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1984-07-07', '', 0),
(6, 1, 2, 'R0179005', 'Nasir Ahamed', 'Male', 'Mirpur', '01312312', 'patient6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1968-03-26', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription_doctor`
--

CREATE TABLE IF NOT EXISTS `tbl_prescription_doctor` (
`prescription_doctor_id` int(5) NOT NULL,
  `prescription_nurse_id` int(5) NOT NULL,
  `patient_history` text NOT NULL,
  `drug_name` varchar(100) NOT NULL,
  `drug_unit` varchar(100) NOT NULL,
  `drug_dosage` varchar(100) NOT NULL,
  `drug_time` varchar(100) NOT NULL,
  `drug_expire` varchar(100) NOT NULL,
  `diet_request` varchar(100) NOT NULL,
  `doctor_comments` varchar(100) NOT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'status 1 : read prescription , 0:unread Prescritpion',
  `test_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prescription_doctor`
--

INSERT INTO `tbl_prescription_doctor` (`prescription_doctor_id`, `prescription_nurse_id`, `patient_history`, `drug_name`, `drug_unit`, `drug_dosage`, `drug_time`, `drug_expire`, `diet_request`, `doctor_comments`, `read_status`, `test_status`, `deletion_status`) VALUES
(18, 10, 'DM 34', 'a:2:{i:0;s:9:"Electro K";i:1;s:4:"Napa";}', 'a:2:{i:0;s:5:"syrup";i:1;s:6:"tablet";}', 'a:2:{i:0;s:5:"1+0+1";i:1;s:5:"1+0+1";}', 'a:2:{i:0;s:1:"2";i:1;s:1:"2";}', 'a:2:{i:0;s:2:"10";i:1;s:2:"10";}', '1000 ML Water', 'Follow up after 3 months', 0, 1, 0),
(19, 1, 'D6 36', 'a:2:{i:0;s:11:"Paracitamol";i:1;s:4:"Napa";}', 'a:2:{i:0;s:6:"Tablet";i:1;s:6:"Tablet";}', 'a:2:{i:0;s:5:"1+1+1";i:1;s:5:"1+1+1";}', 'a:2:{i:0;s:1:"1";i:1;s:1:"1";}', 'a:2:{i:0;s:2:"10";i:1;s:1:"5";}', '2 times eat rice', 'Follow Up within 3 month', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription_doctor_test`
--

CREATE TABLE IF NOT EXISTS `tbl_prescription_doctor_test` (
`prescription_doctor_test_id` int(5) NOT NULL,
  `prescription_nurse_id` int(5) NOT NULL,
  `test_id` int(3) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prescription_doctor_test`
--

INSERT INTO `tbl_prescription_doctor_test` (`prescription_doctor_test_id`, `prescription_nurse_id`, `test_id`, `deletion_status`) VALUES
(25, 9, 2, 0),
(26, 9, 5, 0),
(27, 9, 35, 0),
(28, 10, 1, 0),
(29, 10, 11, 0),
(30, 10, 42, 0),
(31, 1, 19, 0),
(32, 1, 16, 0),
(33, 1, 17, 0),
(34, 1, 38, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription_nurse`
--

CREATE TABLE IF NOT EXISTS `tbl_prescription_nurse` (
`prescription_nurse_id` int(5) NOT NULL,
  `patient_suger` decimal(5,2) NOT NULL,
  `doctor_id` int(2) NOT NULL,
  `patient_id` int(2) NOT NULL,
  `nurse_id` int(2) NOT NULL,
  `appointment_date` varchar(15) NOT NULL,
  `patient_blood_pressure` varchar(10) NOT NULL,
  `patient_tempetature` decimal(5,2) NOT NULL,
  `patient_weight` decimal(5,2) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prescription_nurse`
--

INSERT INTO `tbl_prescription_nurse` (`prescription_nurse_id`, `patient_suger`, `doctor_id`, `patient_id`, `nurse_id`, `appointment_date`, `patient_blood_pressure`, `patient_tempetature`, `patient_weight`, `deletion_status`) VALUES
(1, '5.60', 2, 2, 2, '2015-09-07', '100/80', '9.99', '9.99', 0),
(4, '9.90', 2, 4, 2, '2015-09-07', '100/70', '9.99', '9.99', 0),
(9, '11.40', 2, 1, 2, '2015-09-07', '120/80', '100.20', '68.92', 0),
(10, '11.40', 2, 5, 2, '2015-09-07', '120/80', '100.20', '68.92', 0);

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
(1, 'Appointment Manager', '0191111111', 'appointment@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'app_manager_image/app_manager2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE IF NOT EXISTS `tbl_report` (
`report_id` int(4) NOT NULL,
  `prescription_nurse_id` int(4) NOT NULL,
  `test_id` int(4) NOT NULL,
  `test_image` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`report_id`, `prescription_nurse_id`, `test_id`, `test_image`) VALUES
(1, 9, 2, 'uploads/test_images/1.jpg'),
(2, 9, 5, 'uploads/test_images/4.jpg'),
(3, 9, 35, 'uploads/test_images/a4tech keyboard a45.jpg'),
(4, 10, 1, 'uploads/test_images/4.jpg'),
(5, 10, 11, 'uploads/test_images/bamboo-Shoot.jpg'),
(6, 10, 42, 'uploads/test_images/cable_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report_department`
--

CREATE TABLE IF NOT EXISTS `tbl_report_department` (
`test_category_id` int(5) NOT NULL,
  `test_category_name` varchar(20) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_report_department`
--

INSERT INTO `tbl_report_department` (`test_category_id`, `test_category_name`, `deletion_status`) VALUES
(1, 'Head and Neck', 0),
(2, 'Spine', 0),
(3, 'Abdomen', 0),
(4, 'Upper  Extremity', 0),
(5, 'Lower Extremity', 0),
(6, 'Special X-ray', 0),
(7, 'Ultrasound', 0),
(8, 'MRI, MRA & MRS', 0),
(9, 'CT-SCAN', 0);

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
(1, 'Report Manager', '0191818181', 'report@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'r_manager_image/r_manager1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report_request`
--

CREATE TABLE IF NOT EXISTS `tbl_report_request` (
`test_id` int(5) NOT NULL,
  `test_category_id` int(5) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_report_request`
--

INSERT INTO `tbl_report_request` (`test_id`, `test_category_id`, `test_name`, `deletion_status`) VALUES
(1, 1, 'Skull', 0),
(2, 1, 'Facial Bones', 0),
(3, 1, 'Orbits (Both View)', 0),
(4, 1, 'Sella Turcica', 0),
(5, 1, 'TM Joints Rt/Lt', 0),
(6, 2, 'L-Spine [AP,LAT]', 0),
(7, 2, 'L-S Spine Standing', 0),
(8, 2, 'L-I Joints (3View)', 0),
(9, 2, 'L-Spine [AP,LAT]', 0),
(10, 3, 'Abdomen LAT', 0),
(11, 3, 'K.U.B.', 0),
(12, 3, 'Pelvis AP/LAT', 0),
(13, 4, 'Clavicle Rt./Lt.', 0),
(14, 4, 'Acromio-Clavicular Joint (Rt/Lt)', 0),
(15, 5, 'Both Hips [AP]/Leteral View', 0),
(16, 5, 'Knee Series [AP,LAT,Skylines]', 0),
(17, 6, 'Barium enema/D/C or Plain', 0),
(18, 6, 'Ba - Meal S/D', 0),
(19, 3, 'Upper Abdomen (Ultrasound)', 0),
(20, 3, 'Lower Abdomen (Ultrasound)', 0),
(21, 3, 'Whole Abdomen (Ultrasound)', 0),
(22, 3, 'Kidneys (Ultrasound)', 0),
(23, 7, 'Whole Body', 0),
(24, 7, 'Lumber Spine', 0),
(25, 7, 'Brain', 0),
(26, 7, 'Thyroid', 0),
(27, 7, 'Parotid Glant', 0),
(28, 7, 'Soft Tissue', 0),
(29, 8, 'Brain & PNS', 0),
(30, 8, 'Brain & Orbits', 0),
(31, 8, 'Chest', 0),
(32, 8, 'Whole Abdomen', 0),
(33, 8, 'Liver', 0),
(34, 8, 'Kidneys', 0),
(35, 8, 'MRCP', 0),
(36, 8, 'Neck+Face', 0),
(37, 8, 'Lumber with Dorsal Screening', 0),
(38, 8, 'Whole Spine', 0),
(39, 8, 'Brain MRI with MRS', 0),
(40, 8, 'Neck MRA &  MRI', 0),
(41, 9, 'Brain & Orbits', 0),
(42, 9, 'Brain with 3D bone', 0),
(43, 9, 'Chest & Upper Abdomen', 0),
(44, 9, 'Whole Abdomen (2 Phases)', 0),
(45, 9, 'Lower Abodomen', 0),
(46, 9, 'HBS', 0);

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
-- Indexes for table `tbl_appointment_bill`
--
ALTER TABLE `tbl_appointment_bill`
 ADD PRIMARY KEY (`appointment_bill_id`);

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
-- Indexes for table `tbl_medicine_time`
--
ALTER TABLE `tbl_medicine_time`
 ADD PRIMARY KEY (`medicine_time_id`);

--
-- Indexes for table `tbl_nurse`
--
ALTER TABLE `tbl_nurse`
 ADD PRIMARY KEY (`nurse_id`);

--
-- Indexes for table `tbl_nurse_manager`
--
ALTER TABLE `tbl_nurse_manager`
 ADD PRIMARY KEY (`nurse_manager_id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
 ADD PRIMARY KEY (`patient_id`), ADD UNIQUE KEY `patient_ref_id` (`patient_reg_id`), ADD UNIQUE KEY `patient_email_address` (`patient_email_address`);

--
-- Indexes for table `tbl_prescription_doctor`
--
ALTER TABLE `tbl_prescription_doctor`
 ADD PRIMARY KEY (`prescription_doctor_id`);

--
-- Indexes for table `tbl_prescription_doctor_test`
--
ALTER TABLE `tbl_prescription_doctor_test`
 ADD PRIMARY KEY (`prescription_doctor_test_id`);

--
-- Indexes for table `tbl_prescription_nurse`
--
ALTER TABLE `tbl_prescription_nurse`
 ADD PRIMARY KEY (`prescription_nurse_id`);

--
-- Indexes for table `tbl_reg_manager`
--
ALTER TABLE `tbl_reg_manager`
 ADD PRIMARY KEY (`reg_manager_id`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
 ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_report_department`
--
ALTER TABLE `tbl_report_department`
 ADD PRIMARY KEY (`test_category_id`);

--
-- Indexes for table `tbl_report_manager`
--
ALTER TABLE `tbl_report_manager`
 ADD PRIMARY KEY (`r_manager_id`);

--
-- Indexes for table `tbl_report_request`
--
ALTER TABLE `tbl_report_request`
 ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
 ADD PRIMARY KEY (`shift_id`);

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
MODIFY `appointment_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tbl_appointment_bill`
--
ALTER TABLE `tbl_appointment_bill`
MODIFY `appointment_bill_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_appointment_temp`
--
ALTER TABLE `tbl_appointment_temp`
MODIFY `appointment_temp_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
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
-- AUTO_INCREMENT for table `tbl_medicine_time`
--
ALTER TABLE `tbl_medicine_time`
MODIFY `medicine_time_id` tinyint(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_nurse`
--
ALTER TABLE `tbl_nurse`
MODIFY `nurse_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_nurse_manager`
--
ALTER TABLE `tbl_nurse_manager`
MODIFY `nurse_manager_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
MODIFY `patient_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_prescription_doctor`
--
ALTER TABLE `tbl_prescription_doctor`
MODIFY `prescription_doctor_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_prescription_doctor_test`
--
ALTER TABLE `tbl_prescription_doctor_test`
MODIFY `prescription_doctor_test_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_prescription_nurse`
--
ALTER TABLE `tbl_prescription_nurse`
MODIFY `prescription_nurse_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_reg_manager`
--
ALTER TABLE `tbl_reg_manager`
MODIFY `reg_manager_id` tinyint(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
MODIFY `report_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_report_department`
--
ALTER TABLE `tbl_report_department`
MODIFY `test_category_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_report_manager`
--
ALTER TABLE `tbl_report_manager`
MODIFY `r_manager_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_report_request`
--
ALTER TABLE `tbl_report_request`
MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tbl_shift`
--
ALTER TABLE `tbl_shift`
MODIFY `shift_id` tinyint(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_time_slot`
--
ALTER TABLE `tbl_time_slot`
MODIFY `time_slot_id` tinyint(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
