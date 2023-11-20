-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 05:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drthon`
--

-- --------------------------------------------------------

--
-- Table structure for table `drugtype`
--

CREATE TABLE `drugtype` (
  `id` int(10) NOT NULL,
  `drugid` int(10) NOT NULL,
  `drugname` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drugtype`
--

INSERT INTO `drugtype` (`id`, `drugid`, `drugname`, `status`) VALUES
(1, 1, 'Furosemide(40mg)', 1),
(2, 2, 'Furosemide(500mg)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `heartrequest`
--

CREATE TABLE `heartrequest` (
  `reid` int(11) NOT NULL,
  `hn` int(50) NOT NULL,
  `weightbf` float NOT NULL,
  `weight` float NOT NULL,
  `weightsum` float NOT NULL,
  `swellid` int(10) NOT NULL,
  `tiredid` int(10) NOT NULL,
  `drugid` int(10) NOT NULL,
  `drug` float NOT NULL,
  `drugsum` float NOT NULL,
  `other` text NOT NULL DEFAULT 'ไม่มี',
  `reqdate` date NOT NULL DEFAULT current_timestamp(),
  `reqdatetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `heartrequest`
--

INSERT INTO `heartrequest` (`reid`, `hn`, `weightbf`, `weight`, `weightsum`, `swellid`, `tiredid`, `drugid`, `drug`, `drugsum`, `other`, `reqdate`, `reqdatetime`, `status`) VALUES
(2, 101123, 75, 73.2, 1.8, 1, 1, 1, 2, 2, '', '2021-10-03', '2021-10-03 20:25:47', 1),
(3, 101123, 75, 73.1, 1.9, 1, 1, 1, 1, 1, '', '2021-10-03', '2021-10-03 20:27:05', 1),
(4, 101123, 75, 73, 2, 1, 1, 1, 1, 0.5, '', '2021-10-03', '2021-10-03 21:08:52', 1),
(5, 1234, 75, 78, 3, 1, 2, 1, 2, 4, '', '2021-10-03', '2021-10-03 21:17:41', 1),
(6, 1234, 75, 75, 0, 3, 2, 1, 4, 8, '', '2021-10-03', '2021-10-03 21:18:47', 1),
(7, 1234, 75, 80, 5, 3, 4, 1, 2, 4, '', '2021-10-04', '2021-10-04 15:02:49', 1),
(8, 101123, 75, 75, 0, 1, 2, 1, 1, 1, '', '2021-10-04', '2021-10-04 22:44:47', 1),
(9, 101123, 75, 77, 2, 1, 2, 1, 1, 2, '', '2021-10-04', '2021-10-04 22:49:16', 1),
(10, 101123, 75, 77, 2, 1, 4, 1, 1, 2, '', '2021-10-04', '2021-10-04 22:55:06', 1),
(11, 101123, 75, 77, 2, 1, 1, 1, 1, 2, '', '2021-10-04', '2021-10-04 22:56:46', 1),
(12, 101123, 75, 77, 2, 1, 4, 1, 1, 2, '', '2021-10-04', '2021-10-04 22:59:41', 1),
(13, 1234, 75, 80, 5, 1, 2, 1, 2, 4, '', '2021-10-05', '2021-10-05 15:24:50', 1),
(14, 101123, 75, 70, 5, 1, 1, 1, 1, 0.5, '', '2021-10-06', '2021-10-06 09:03:24', 1),
(15, 1234, 75, 76, 1, 1, 1, 1, 1, 1, '', '2021-10-06', '2021-10-06 23:02:21', 1),
(16, 1234, 75, 78, 0, 2, 1, 1, 2, 0, '', '2021-10-06', '2021-10-06 23:16:41', 1),
(17, 1234, 75, 78, 3, 2, 1, 1, 2, 4, '', '2021-10-06', '2021-10-06 23:21:07', 1),
(18, 1234, 75, 78, 0, 3, 2, 1, 3, 0, '', '2021-10-06', '2021-10-06 23:34:14', 1),
(19, 1234, 75, 78, 3, 3, 2, 1, 3, 6, 'คิดถึงแฟน', '2021-10-06', '2021-10-06 23:34:53', 1),
(20, 1234, 75, 78, 3, 2, 3, 1, 2, 4, '', '2021-10-06', '2021-10-06 23:36:48', 1),
(21, 1234, 75, 73, 2, 1, 1, 1, 4, 2, '', '2021-10-06', '2021-10-06 23:45:55', 1),
(22, 1245, 66.9, 75, 8.1, 1, 1, 1, 1, 2, '', '2021-10-07', '2021-10-07 10:09:17', 1),
(23, 101123, 75, 80, 5, 1, 1, 1, 1, 2, '', '2021-10-07', '2021-10-07 10:09:17', 1),
(24, 101123, 75, 66.9, 8.1, 1, 2, 1, 1, 2, '', '2021-10-07', '2021-10-07 10:26:41', 1),
(25, 101123, 75, 75, 0, 1, 2, 1, 1, 2, '', '2021-10-07', '2021-10-07 10:52:25', 1),
(26, 1234, 75, 80, 5, 1, 4, 2, 1, 2, '', '2021-10-07', '2021-10-07 10:59:33', 1),
(27, 1234, 75, 78, 3, 2, 2, 1, 1, 2, '', '2021-10-07', '2021-10-07 15:48:58', 1),
(28, 101123, 75, 60, 15, 1, 1, 1, 1, 0.5, '', '2021-10-08', '2021-10-08 00:34:00', 1),
(29, 101123, 75, 66.9, 8.1, 1, 1, 1, 1, 0.5, '', '2021-10-11', '2021-10-11 14:29:09', 1),
(30, 101123, 75, 66.9, 8.1, 1, 1, 1, 1, 0.5, '', '2021-10-11', '2021-10-11 14:29:54', 1),
(31, 101123, 75, 80, 5, 2, 4, 1, 2, 2, '', '2021-10-11', '2021-10-11 20:18:48', 1),
(32, 101123, 75, 75, 0, 1, 1, 1, 1, 1, '', '2021-10-13', '2021-10-13 18:17:48', 1),
(33, 101123, 75, 75, 0, 1, 2, 1, 1, 1, '', '2021-10-13', '2021-10-13 18:18:40', 1),
(34, 101123, 75, 75, 0, 1, 3, 1, 1, 2, '', '2021-10-13', '2021-10-13 18:19:09', 1),
(35, 101123, 75, 75, 0, 1, 4, 1, 1, 2, '', '2021-10-13', '2021-10-13 18:19:31', 1),
(36, 101123, 75, 75, 0, 1, 1, 1, 1, 1, '', '2021-10-13', '2021-10-13 18:20:08', 1),
(37, 101123, 75, 74.1, 0.9, 1, 1, 1, 1, 1, '', '2021-10-13', '2021-10-13 18:20:50', 1),
(38, 101123, 75, 72, 3, 1, 1, 1, 1, 0.5, '', '2021-10-13', '2021-10-13 18:21:17', 1),
(39, 101123, 75, 66.9, 8.1, 1, 1, 1, 1, 0.5, '', '2021-10-22', '2021-10-22 17:22:34', 1),
(40, 1234, 75, 78, 0, 4, 4, 1, 1, 0, '', '2021-10-28', '2021-10-28 11:09:20', 1),
(41, 1234, 75, 75, 0, 1, 4, 1, 1, 2, '', '2021-10-28', '2021-10-28 11:09:48', 1),
(42, 1234, 75, 80, 5, 2, 1, 1, 1, 2, '', '2021-11-05', '2021-11-05 11:59:14', 1),
(43, 1234, 75, 72, 3, 1, 1, 1, 1, 0.5, '', '2021-11-05', '2021-11-05 12:00:06', 1),
(44, 4206, 45, 44, 1, 1, 1, 1, 1, 1, '', '2021-11-08', '2021-11-08 20:00:28', 1),
(45, 1234, 75, 75, 0, 1, 1, 1, 5, 5, '', '2021-11-08', '2021-11-08 20:27:55', 1),
(46, 1234, 75, 75, 0, 1, 4, 1, 75, 0, '', '2021-11-08', '2021-11-08 20:29:19', 1),
(47, 1234, 75, 76, 1, 1, 4, 1, 2, 4, '', '2021-11-08', '2021-11-08 20:38:53', 1),
(48, 123456, 66.9, 63.1, 3.8, 1, 1, 1, 1, 0.5, '', '2021-11-08', '2021-11-08 20:39:17', 1),
(49, 1234, 75, 75, 0, 1, 4, 1, 2, 4, '', '2021-11-08', '2021-11-08 20:39:26', 1),
(50, 1234, 75, 76, 0, 1, 1, 1, 1, 0, '', '2021-11-08', '2021-11-08 20:39:52', 1),
(51, 1234, 75, 75, 0, 1, 4, 1, 76, 152, '', '2021-11-08', '2021-11-08 20:40:17', 1),
(52, 1234, 75, 76, 1, 1, 4, 1, 78, 156, '', '2021-11-08', '2021-11-08 20:40:53', 1),
(53, 101123, 75, 65, 10, 1, 1, 1, 2, 1, '', '2021-11-11', '2021-11-11 13:41:24', 1),
(54, 101123, 75, 65, 10, 1, 1, 1, 2, 1, '', '2021-11-11', '2021-11-11 13:47:13', 1),
(55, 101123, 75, 75, 0, 1, 1, 1, 2, 2, '', '2021-11-12', '2021-11-12 02:16:41', 1),
(56, 101123, 75, 70, 5, 1, 1, 1, 2, 1, '', '2021-11-13', '2021-11-13 21:17:02', 1),
(57, 101123, 75, 75, 0, 1, 1, 1, 2, 2, '', '2021-12-22', '2021-12-22 16:03:45', 1),
(58, 101123, 75, 77, 2, 1, 2, 1, 1, 2, '', '2022-02-11', '2022-02-11 20:35:26', 1),
(59, 101123, 75, 76.9, 1.9, 1, 1, 1, 1, 1, '', '2022-02-11', '2022-02-11 21:38:34', 1),
(60, 101123, 75, 75, 0, 1, 1, 1, 1, 1, '', '2022-02-19', '2022-02-19 20:01:40', 1),
(61, 101123, 75, 75, 0, 1, 1, 1, 1, 1, '', '2022-02-25', '2022-02-25 20:45:14', 1),
(62, 101123, 75, 75, 0, 1, 1, 1, 1, 0, '', '2022-02-25', '2022-02-25 20:58:59', 1),
(63, 101123, 75, 75, 0, 1, 1, 1, 1, 0, '1', '2022-02-25', '2022-02-25 20:59:33', 1),
(64, 101123, 75, 75, 0, 1, 1, 1, 1, 0, '1', '2022-02-25', '2022-02-25 20:59:44', 1),
(65, 101123, 75, 75, 0, 1, 1, 1, 1, 0, '1', '2022-02-25', '2022-02-25 21:00:26', 1),
(66, 101123, 75, 75, 0, 1, 1, 1, 1, 0, '', '2022-02-25', '2022-02-25 21:00:54', 1),
(67, 101123, 75, 75, 0, 1, 1, 1, 1, 0, '', '2022-02-25', '2022-02-25 21:01:14', 1),
(68, 101123, 75, 75, 0, 1, 1, 1, 1, 0, '', '2022-02-25', '2022-02-25 21:01:54', 1),
(69, 101123, 75, 75, 0, 1, 1, 2, 1, 0, '', '2022-02-25', '2022-02-25 21:02:06', 1),
(70, 101123, 75, 75, 0, 1, 1, 1, 10, 0, '', '2022-02-25', '2022-02-25 21:02:43', 1),
(71, 101123, 75, 75, 0, 1, 1, 1, 1, 1, '', '2022-02-25', '2022-02-25 21:03:40', 1),
(72, 101123, 75, 75, 0, 1, 1, 1, 1, 0, '', '2022-02-25', '2022-02-25 21:07:54', 1),
(73, 101123, 75, 75, 0, 1, 1, 1, 2, 0, '', '2022-02-25', '2022-02-25 21:08:45', 1),
(74, 1729944, 59, 43.9, 0.1, 1, 3, 1, 2, 4, '', '2022-07-05', '2022-07-05 02:53:36', 1),
(75, 1729944, 59, 43.9, 0.1, 1, 3, 1, 2, 4, '', '2022-07-05', '2022-07-05 03:01:41', 1),
(76, 101123, 75, 73.8, 1.2, 1, 1, 1, 1, 1, '', '2022-08-16', '2022-08-16 12:19:58', 1),
(77, 101123, 75, 73, 2, 1, 1, 1, 1, 0.5, '', '2022-08-16', '2022-08-16 12:25:15', 1),
(78, 101123, 75, 73.1, 1.9, 1, 1, 1, 1, 1, '', '2022-08-16', '2022-08-16 12:25:45', 1),
(79, 101123, 75, 74.9, 0.1, 1, 1, 1, 1, 1, '', '2022-08-16', '2022-08-16 12:27:12', 1),
(80, 101123, 75, 75.5, 0.5, 1, 1, 1, 1, 1, '', '2022-08-16', '2022-08-16 12:59:03', 1),
(81, 101123, 75, 76, 1, 1, 1, 1, 1, 1, '', '2022-08-16', '2022-08-16 12:59:30', 1),
(82, 101123, 75, 76.5, 1.5, 1, 1, 1, 1, 1, '', '2022-08-16', '2022-08-16 12:59:58', 1),
(83, 101123, 75, 77, 2, 1, 1, 1, 1, 2, '', '2022-08-16', '2022-08-16 13:00:17', 1),
(84, 101123, 75, 75, 0, 1, 1, 1, 1, 1, '', '2022-08-16', '2022-08-16 13:00:39', 1),
(85, 101123, 75, 75.5, 0.5, 1, 1, 1, 1, 1, '', '2022-08-16', '2022-08-16 13:54:08', 1),
(86, 101123, 75, 74.9, 0.1, 1, 1, 1, 1, 1, '', '2022-08-16', '2022-08-16 15:44:42', 1),
(87, 101123, 75, 74.9, 0.1, 2, 2, 1, 1, 2, '', '2022-08-16', '2022-08-16 15:44:57', 1),
(88, 101123, 75, 75, 0, 1, 1, 1, 1, 1, '', '2022-08-16', '2022-08-16 19:18:02', 1),
(89, 417523, 89, 89, 0, 1, 3, 1, 1, 2, '', '2023-05-19', '2023-05-19 10:44:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberid` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `hn` int(50) NOT NULL,
  `prename` varchar(50) NOT NULL,
  `patientname` varchar(100) NOT NULL,
  `patientlname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telnumber` varchar(100) NOT NULL,
  `weight` float NOT NULL,
  `swellid` int(10) NOT NULL,
  `tiredid` int(10) NOT NULL,
  `drugid` int(10) NOT NULL,
  `drug` float NOT NULL,
  `docnote` text NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberid`, `username`, `password`, `hn`, `prename`, `patientname`, `patientlname`, `address`, `telnumber`, `weight`, `swellid`, `tiredid`, `drugid`, `drug`, `docnote`, `regdate`, `status`) VALUES
(1, '0827327428', '81dc9bdb52d04dc20036dbd8313ed055', 101123, 'นาย', 'ภควัต', 'คุ้มสวัสดิ์', '388', '0827327428', 75, 1, 2, 1, 1, 'ปวดไหล่', '2022-01-12 01:09:20', 1),
(2, '0974569356', '81dc9bdb52d04dc20036dbd8313ed055', 1234, 'นาย', 'ธนวิทย์', 'โรจน์ดำรงรัตนา', 'โรงพยาบาลพระมงกุฏเกล้า', '0830354225', 75, 1, 1, 1, 2, '', '2021-10-03 21:16:56', 1),
(3, '0819988387', 'f1920129f9c75b3d604ea4874e120736', 1245, 'นาย', 'กสิเดช', 'สุขใจ', '336/6', '0819988387', 66.9, 1, 1, 1, 1, '', '2021-10-11 11:55:56', 1),
(4, '0814287146', '81dc9bdb52d04dc20036dbd8313ed055', 4206, 'นางสาว', 'อรนิภา', 'นพรัตน์ไพสิฐ', 'Bkk', '0814187146', 45, 1, 1, 1, 1, '', '2021-11-08 19:59:19', 1),
(5, '0872971445', '81dc9bdb52d04dc20036dbd8313ed055', 123456, 'นาย', 'ทองมาก', 'สุขใจ', '388', '0872971445', 66.9, 1, 2, 1, 1, '', '2021-11-08 20:17:54', 1),
(12, '08499888387', '84186c448e32fa2a52a845f4f627b84d', 417523, 'นาย', 'ภควัต', 'คุ้มสวัสดิ์', '39/8', '08499888387', 89, 1, 1, 1, 1, 'ปวดหัวบ่อย', '2023-05-19 10:43:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_content` text NOT NULL,
  `post_image` varchar(100) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_title`, `post_content`, `post_image`, `post_date`, `status`) VALUES
(19, 'ชั่งน้ำหนัก', 'ชั่งน้ำหนักทุกวัน เฝ้าระวังภาวะน้ำคั่ง และอาการบวม', '662698106.jpg', '2021-09-30 18:58:48', 1),
(20, 'หลีกเลี่ยงอาหารที่มีรสชาติเค็ม', 'หลีกเลี่ยงอาหารที่มีรสชาติเค็ม อาหารหมักดอง และอาหารกระป๋อง \r\nรวมทั้งหลีกเลี่ยงการใช้เกลือ น้ำปลา หรือซีอิ้วในการปรุงอาหาร', '1478175092.jpg', '2021-09-30 19:11:02', 1),
(21, 'ยาขับปัสสาวะ', 'ปรับขนาดยาขับปัสสาวะตามน้ำหนักและภาวะน้ำคั่ง', '102561404.jpg', '2021-09-30 19:11:45', 1),
(22, 'ออกกำลังกายสม่ำเสมอ', 'ออกกำลังกายสมำเสมอ เช่น การเดิน ควรเริ่มจากเดินช้าในแนวราบก่อน ประมาณ 5 นาทีต่อวัน ถ้าแข็งแรงดีค่อย ๆ ปรับเป็นเดินเร็วในแนวราบ หรือปรับเพิ่มเดินขึ้นบันไดโดยเริ่มจากน้อยไปหามาก', '82794753.jpg', '2021-09-30 19:12:09', 1),
(23, 'ยาแก้ปวด', 'หลีกเลี่ยงการรับประทานยาแก้ปวด กลุ่ม NSAIDs', '1722639351.jpg', '2021-09-30 19:12:34', 1),
(25, 'อาการบวม และหอบเหนื่อย', 'หากมีอาการบวม หรือหอบเหนื่อย ควรรีบมาพบแพทย์ที่โรงพยาบาล', '1166716288.jpg', '2021-10-01 21:33:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prename`
--

CREATE TABLE `prename` (
  `preid` int(20) NOT NULL,
  `prenameid` int(20) NOT NULL,
  `prename` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prename`
--

INSERT INTO `prename` (`preid`, `prenameid`, `prename`, `status`) VALUES
(1, 1, 'นาย', 1),
(2, 2, 'นาง', 1),
(3, 3, 'นางสาว', 1),
(4, 4, 'เด็กชาย', 1),
(5, 5, 'เด็กหญิง', 1);

-- --------------------------------------------------------

--
-- Table structure for table `swellsymp`
--

CREATE TABLE `swellsymp` (
  `swid` int(11) NOT NULL,
  `swellid` int(10) NOT NULL,
  `swellname` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `swellsymp`
--

INSERT INTO `swellsymp` (`swid`, `swellid`, `swellname`, `status`) VALUES
(1, 1, 'ไม่บวม', 1),
(2, 2, 'ข้อเท้าบวม', 1),
(3, 3, 'หน้าแข้งบวม', 1),
(4, 4, 'หัวเข่าบวม', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiredquestion`
--

CREATE TABLE `tiredquestion` (
  `tdid` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `tiredid` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiredquestion`
--

INSERT INTO `tiredquestion` (`tdid`, `question`, `tiredid`, `status`) VALUES
(1, 'ไม่มีอาการ สามารถออกกำลังกายได้ตามปกติ', 1, 1),
(2, 'มีอาการขณะเดินขึ้นบันไดมากกว่า 1 ชั้นโดยไม่หยุดพัก', 2, 1),
(3, 'มีอาการขณะทำงานบ้าน ได้แก่ กวาดพื้น ถูพื้น เช็ดกระจก ', 2, 1),
(4, 'มีอาการขณะกำลังเดินในบ้านหรือเดินระยะทางสั้นๆ 20-100 เมตร', 3, 1),
(5, 'มีอาการขณะอาบน้ำหรือแต่งตัว', 3, 1),
(6, 'มีอาการขณะพักผ่อน ได้แก่ นั่ง นอน อ่านหนังสือ ดูโทรทัศน์ หรือไม่ได้เคลื่อนไหวใดๆ', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiredsymp`
--

CREATE TABLE `tiredsymp` (
  `tireid` int(10) NOT NULL,
  `tiredname` varchar(100) NOT NULL,
  `tiredid` int(10) NOT NULL,
  `tiredtype` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiredsymp`
--

INSERT INTO `tiredsymp` (`tireid`, `tiredname`, `tiredid`, `tiredtype`, `status`) VALUES
(1, 'ระดับ 1 ไม่มีอาการ ใช้ชีวิตประจำวันได้ปกติ (Class I)', 1, 'เหนื่อยลดลง', 1),
(2, 'ระดับ 2 เหนื่อยสามารถทำกิจกรรมที่ใช้แรงได้ลดลง  (Class II)', 2, 'เหนื่อยเท่าเดิม', 1),
(3, 'ระดับ 3 เหนื่อยสามารถทำกิจกรรมทั่วไปได้ลดลง  (Class III)', 3, 'เหนื่อยมากขึ้น', 1),
(4, 'ระดับ 4 เหนื่อยตลอดแม้ขณะพักอยู่นิ่ง (Class IV)', 4, 'เหนื่อยมากที่สุด', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userreq`
--

CREATE TABLE `userreq` (
  `adid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `regisdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userreq`
--

INSERT INTO `userreq` (`adid`, `username`, `password`, `name`, `lname`, `role`, `regisdate`, `status`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Super', 'UserXx', 'admin', '2021-10-11 03:43:00', 1),
(3, 'standley369', '81dc9bdb52d04dc20036dbd8313ed055', 'TestUserreq', 'TestUserreq', 'userreq', '2021-10-11 04:07:37', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drugtype`
--
ALTER TABLE `drugtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heartrequest`
--
ALTER TABLE `heartrequest`
  ADD PRIMARY KEY (`reid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prename`
--
ALTER TABLE `prename`
  ADD PRIMARY KEY (`preid`);

--
-- Indexes for table `swellsymp`
--
ALTER TABLE `swellsymp`
  ADD PRIMARY KEY (`swid`);

--
-- Indexes for table `tiredquestion`
--
ALTER TABLE `tiredquestion`
  ADD PRIMARY KEY (`tdid`);

--
-- Indexes for table `tiredsymp`
--
ALTER TABLE `tiredsymp`
  ADD PRIMARY KEY (`tireid`);

--
-- Indexes for table `userreq`
--
ALTER TABLE `userreq`
  ADD PRIMARY KEY (`adid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drugtype`
--
ALTER TABLE `drugtype`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `heartrequest`
--
ALTER TABLE `heartrequest`
  MODIFY `reid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `prename`
--
ALTER TABLE `prename`
  MODIFY `preid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `swellsymp`
--
ALTER TABLE `swellsymp`
  MODIFY `swid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tiredquestion`
--
ALTER TABLE `tiredquestion`
  MODIFY `tdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tiredsymp`
--
ALTER TABLE `tiredsymp`
  MODIFY `tireid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userreq`
--
ALTER TABLE `userreq`
  MODIFY `adid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
