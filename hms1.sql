-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2019 at 07:03 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`password`) VALUES
('ruet_admin');

-- --------------------------------------------------------

--
-- Table structure for table `allot_info`
--

CREATE TABLE `allot_info` (
  `id` int(11) NOT NULL,
  `allot_name` varchar(200) NOT NULL,
  `apply_start` varchar(200) NOT NULL,
  `apply_end` varchar(200) NOT NULL,
  `allot_date` varchar(200) NOT NULL DEFAULT 'N/A',
  `no_of_seat` varchar(200) NOT NULL,
  `alloted_seat` varchar(200) NOT NULL DEFAULT 'N/A',
  `hall_name` varchar(200) NOT NULL,
  `access` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allot_info`
--

INSERT INTO `allot_info` (`id`, `allot_name`, `apply_start`, `apply_end`, `allot_date`, `no_of_seat`, `alloted_seat`, `hall_name`, `access`) VALUES
(1, 'Allotment for 2015 series 2019', '2019-05-05', '2019-06-05', 'N/A', '120', 'N/A', 'Shahid President Ziaur Rahman Hall', 1);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `roll` varchar(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `dept` varchar(500) NOT NULL,
  `rg_no` varchar(500) NOT NULL,
  `ac_year` varchar(500) NOT NULL,
  `present_ac_y` varchar(200) NOT NULL,
  `cgpa` varchar(100) NOT NULL,
  `recit_no` varchar(500) NOT NULL,
  `pay_date` varchar(500) NOT NULL,
  `p_hall` varchar(200) NOT NULL DEFAULT 'N/A',
  `p_room_no` varchar(200) NOT NULL DEFAULT 'N/A',
  `alotment_id` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`roll`, `name`, `dept`, `rg_no`, `ac_year`, `present_ac_y`, `cgpa`, `recit_no`, `pay_date`, `p_hall`, `p_room_no`, `alotment_id`) VALUES
('MTUwMDAyNg==', 'TWQuTW9tdGF6dXIgUmFobWFu', 'Q0U=', 'MDI2', 'MjAxNQ==', 'NA==', 'My4yNg==', '', '', 'U2hhaGlkIEx0LiBTZWxpbSBIYWxs', 'MTI5', '1'),
('MTUwMzA5NA==', 'TUQuIElzbWFpbA==', 'Q1NF', 'NDQ5', 'MjAxNQ==', 'NA==', 'My40OQ==', '', '', 'Ti9B', 'Ti9B', '1');

-- --------------------------------------------------------

--
-- Table structure for table `attachment_info`
--

CREATE TABLE `attachment_info` (
  `st_id` varchar(200) NOT NULL DEFAULT 'N/A',
  `picture` varchar(200) NOT NULL DEFAULT 'N/A',
  `b_cirtificate` varchar(200) NOT NULL DEFAULT 'N/A',
  `sid` varchar(200) NOT NULL DEFAULT 'N/A',
  `clearance` varchar(200) NOT NULL DEFAULT 'N/A',
  `alotment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachment_info`
--

INSERT INTO `attachment_info` (`st_id`, `picture`, `b_cirtificate`, `sid`, `clearance`, `alotment_id`) VALUES
('MTUwMDAyNg==', 'picture/main_page.PNG', 'birth_certificate/result_general_roll.pdf', 'sid/sector_of_Bangladesh.jpg', 'clearance/35143713_1409687502464122_8857342137772015616_n.jpg', 1),
('MTUwMzA5NA==', 'picture/main_page.PNG', 'birth_certificate/27496446_1978595975800484_1664283273_n.jpg', 'sid/sector_of_Bangladesh.jpg', 'N/A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hall_capacity`
--

CREATE TABLE `hall_capacity` (
  `hall_name` varchar(500) NOT NULL,
  `capacity` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall_capacity`
--

INSERT INTO `hall_capacity` (`hall_name`, `capacity`) VALUES
(' Shahid Abdul Hamid Hall', '225'),
(' Shahid Lt. Selim Hall', '350'),
('Bangabandhu Sheikh Mujibur Rahman Hall', '250'),
('Deshratna Sheikh Hasina Hall', '120'),
('Shahid President Ziaur Rahman Hall', '480'),
('Shahid Shahidul Islam Hall', '225'),
('Tin Shed Hall (Extension)', '100');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notice_heading` varchar(1000) NOT NULL,
  `notice_file` varchar(1000) NOT NULL,
  `hall_name` varchar(300) NOT NULL,
  `author` varchar(200) NOT NULL,
  `access` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `notice_heading`, `notice_file`, `hall_name`, `author`, `access`) VALUES
(12, 'Hall fest 2019', 'notice/cache_mapping.pdf', 'Shahid President Ziaur Rahman Hall', 'MD. Ismail', 1),
(13, 'Allotment 2019 for 2015 series', 'notice/_Routine_03.20.18.pdf', 'Shahid President Ziaur Rahman Hall', 'MD. Ismail', 0);

-- --------------------------------------------------------

--
-- Table structure for table `p_info`
--

CREATE TABLE `p_info` (
  `st_id` varchar(200) NOT NULL,
  `b_date` varchar(200) NOT NULL,
  `religion` varchar(500) NOT NULL,
  `nationality` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `phone_no` varchar(500) NOT NULL,
  `f_name` varchar(500) NOT NULL,
  `f_occupation` varchar(500) NOT NULL,
  `f_income` varchar(500) NOT NULL,
  `g_name` varchar(500) NOT NULL,
  `g_s_relation` varchar(500) NOT NULL,
  `g_occupation` varchar(500) NOT NULL,
  `p_address` varchar(500) NOT NULL,
  `local_name` varchar(200) NOT NULL DEFAULT 'N/A',
  `local_relation` varchar(200) NOT NULL DEFAULT 'N/A',
  `local_address` varchar(200) DEFAULT 'N/A',
  `alotment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_info`
--

INSERT INTO `p_info` (`st_id`, `b_date`, `religion`, `nationality`, `gender`, `phone_no`, `f_name`, `f_occupation`, `f_income`, `g_name`, `g_s_relation`, `g_occupation`, `p_address`, `local_name`, `local_relation`, `local_address`, `alotment_id`) VALUES
('MTUwMDAyNg==', 'MTk5Ny0wMS0wMQ==', 'SXNsYW0=', 'QmFuZ2xhZGVzaHk=', 'VFdGc1pRPT0=', 'MDE3MjUxMjk4NzU=', 'TWQuIE1vemFtbWVsIEhhcXVl', 'VGVhY2hlcg==', 'MTIwMDA=', 'TWQuTW96YW1tZWwgaGFxdWU=', 'RmF0aGVy', 'VGVhY2hlcg==', 'RnVsdG9sYSxEYWtvcCxraHVsbmE=', 'TWQuIFphc2hpbSBVZGRpbg==', 'QnJvdGhlcg==', 'a2Fzc2hhdCAsUmFqc2hhaGkNCjAxNjc3MTQyMTg0', 1),
('MTUwMzA5NA==', 'MTk5Ni0wNy0xMg==', 'SXNsYW0=', 'QmFuZ2xhZGVzaHk=', 'VFdGc1pRPT0=', 'MDE3NTIzNDYwNTI=', 'TWQuIEVsaWFz', 'VGVhY2hlcg==', 'MjAwMDA=', 'TWQgLiBFbGlhcw==', 'RmF0aGVy', 'VGVhY2hlcg==', 'RGlzdHJpY3Q6IEJob2xhIDsgVGhhbmEgOiBMYWxtb2hvbiA7IFZpbGxhZ2UgOiBSb21hZ29uaiA7IFBvc3QgOiBLb3J0aGFyaGF0IDsgUG9zdCBjb2RlIDogODMwMg==', 'Ti9B', 'Ti9B', 'Ti9B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `hall_name` varchar(200) NOT NULL,
  `access` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `designation`, `password`, `email`, `hall_name`, `access`) VALUES
(8, 'TUQuIElzbWFpbA==', 'T2ZmaWNlIHN0dWZm', '$2y$10$zI6Yz1aNGHF.Z3N6WCnjAeW/ZH1DCKsqtjq6y8U2Kx7ibH5/ejaC2', 'bWRpaHIxNUBnbWFpbC5jb20=', 'U2hhaGlkIFByZXNpZGVudCBaaWF1ciBSYWhtYW4gSGFsbA==', 1),
(9, 'TWQuIFJhaGF0IEhhc25h', 'QXNzaXN0ZW50IHByb2Zlc3Nvcg==', '$2y$10$VRe5MQqFVhlVCkOJ3C3FW.5D4fd3dNe5OFe9DIk2XT58NfIHU9cb.', 'bWFyY2hhcmlAZ21haWwuY29t', 'U2hhaGlkIFByZXNpZGVudCBaaWF1ciBSYWhtYW4gSGFsbA==', 1),
(10, 'UmFzZWw=', 'QXNzaXN0ZW50IHByb2Zlc3Nvcg==', '$2y$10$fOWuH3b/xERKK1ebz4s5o.i3cxD.Onzvbquwa7PzYTd7jXv1Ewcb2', 'cmFzZWxAZ21haWwuY29t', 'U2hhaGlkIFByZXNpZGVudCBaaWF1ciBSYWhtYW4gSGFsbA==', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roommate_list`
--

CREATE TABLE `roommate_list` (
  `st_id` varchar(200) NOT NULL,
  `rm_name1` varchar(500) NOT NULL,
  `rm_name2` varchar(500) NOT NULL,
  `rm_name3` varchar(500) NOT NULL,
  `rm_roll1` varchar(500) NOT NULL,
  `rm_roll2` varchar(500) NOT NULL,
  `rm_roll3` varchar(500) NOT NULL,
  `rm_dept1` varchar(500) NOT NULL,
  `rm_dept2` varchar(500) NOT NULL,
  `rm_dept3` varchar(500) NOT NULL,
  `rm_year1` varchar(500) NOT NULL,
  `rm_year2` varchar(500) NOT NULL,
  `rm_year3` varchar(500) NOT NULL,
  `alotment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roommate_list`
--

INSERT INTO `roommate_list` (`st_id`, `rm_name1`, `rm_name2`, `rm_name3`, `rm_roll1`, `rm_roll2`, `rm_roll3`, `rm_dept1`, `rm_dept2`, `rm_dept3`, `rm_year1`, `rm_year2`, `rm_year3`, `alotment_id`) VALUES
('MTUwMDAyNg==', 'TnVyZSBBbGFtIFNpZGRpaw==', 'TWQuUmFzZWw=', 'TWQuIFJhanU=', 'MTUwMDAwMw==', 'MTUwMzA4Mg==', 'MTUwMzAzNQ==', 'Q0U=', 'Q1NF', 'Q1NF', 'NA==', 'NA==', 'NA==', 1),
('MTUwMzA5NA==', 'U2hhaGVk', 'U2hhZGF0IEhvc3NhaW4gTWFuaWs=', 'TWQgLiBIYXpyYXQgQWxp', 'MTUwMDAzMQ==', 'MTQwMzExOA==', 'MTUwMzEyMA==', 'Q0U=', 'Q1NF', 'Q1NF', 'NA==', 'NA==', 'NA==', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`password`);

--
-- Indexes for table `allot_info`
--
ALTER TABLE `allot_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `attachment_info`
--
ALTER TABLE `attachment_info`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `hall_capacity`
--
ALTER TABLE `hall_capacity`
  ADD PRIMARY KEY (`hall_name`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_info`
--
ALTER TABLE `p_info`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roommate_list`
--
ALTER TABLE `roommate_list`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allot_info`
--
ALTER TABLE `allot_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
