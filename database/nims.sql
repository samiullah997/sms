-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 08:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nims`
--

-- --------------------------------------------------------

--
-- Table structure for table `dmc_records`
--

CREATE TABLE `dmc_records` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `admission_no` int(11) NOT NULL,
  `subject_name` text NOT NULL,
  `total_marks` int(11) NOT NULL,
  `obtained_marks` int(11) NOT NULL,
  `date` date NOT NULL,
  `class` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dmc_records`
--

INSERT INTO `dmc_records` (`id`, `s_id`, `name`, `admission_no`, `subject_name`, `total_marks`, `obtained_marks`, `date`, `class`) VALUES
(5, 16, 'Hamza Khan', 16, 'English', 100, 90, '2021-09-04', 'Nursery'),
(6, 16, 'Hamza Khan', 16, 'Urdu', 100, 80, '2021-09-04', 'Nursery'),
(7, 16, 'Hamza Khan', 16, 'Islamiyat', 100, 98, '2021-09-09', 'Nursery'),
(8, 16, 'Hamza Khan', 16, 'Pak Study', 100, 89, '2021-09-04', 'Nursery'),
(9, 16, 'Hamza Khan', 16, 'Mathamathic', 100, 95, '2021-09-04', 'Nursery'),
(10, 12, 'Sami Ullah', 12, 'English', 100, 95, '2021-09-04', 'One'),
(11, 12, 'Sami Ullah', 12, 'Urdu', 100, 85, '2021-09-04', 'One'),
(12, 12, 'Sami Ullah', 12, 'Islamiyat', 100, 98, '2021-09-04', 'One'),
(13, 12, 'Sami Ullah', 12, 'Pak Study', 100, 85, '2021-09-04', 'One'),
(14, 12, 'Sami Ullah', 12, 'Mathamathic', 100, 89, '2021-09-04', 'One'),
(15, 16, 'Hamza Khan', 16, 'Biology', 100, 98, '2021-09-06', 'Nursery'),
(16, 22, 'Raza  khan', 22, 'Computer Science', 100, 45, '2021-09-07', 'Nursery'),
(17, 22, 'Raza  khan', 22, 'Pak Study', 100, 73, '2021-09-07', 'Nursery'),
(18, 22, 'Raza  khan', 22, 'Chemistry', 100, 76, '2021-09-03', 'Nursery'),
(19, 22, 'Raza  khan', 22, 'Chemistry', 100, 76, '2021-09-03', 'Nursery'),
(20, 22, 'Raza  khan', 22, 'Pashto', 100, 82, '2021-09-07', 'Nursery');

-- --------------------------------------------------------

--
-- Table structure for table `driver_details`
--

CREATE TABLE `driver_details` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `Address` text NOT NULL,
  `contact` text NOT NULL,
  `date` date NOT NULL,
  `v_id` int(11) NOT NULL,
  `v_name` text NOT NULL,
  `check_out_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver_details`
--

INSERT INTO `driver_details` (`id`, `name`, `Address`, `contact`, `date`, `v_id`, `v_name`, `check_out_date`) VALUES
(7, 'M. Hamza Khan', 'Urmar Miana Peshawar', '03189077734', '2021-08-03', 13, 'Honda Bus', '0000-00-00'),
(8, 'M. Hamza Khan', 'Urmar Miana Peshawar', '923118165094', '2021-08-31', 16, 'Yamaha Bus', '2021-08-31'),
(9, 'M. Hamza Khan', 'Urmar Miana', '03189593318', '2021-09-04', 15, 'Niazi Bus', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneous`
--

CREATE TABLE `miscellaneous` (
  `id` int(11) NOT NULL,
  `student_id` text NOT NULL,
  `type` text NOT NULL,
  `detailed` text NOT NULL,
  `date` date NOT NULL,
  `total_amount` text NOT NULL,
  `name` text NOT NULL,
  `submit_amount` text NOT NULL,
  `admission_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `miscellaneous`
--

INSERT INTO `miscellaneous` (`id`, `student_id`, `type`, `detailed`, `date`, `total_amount`, `name`, `submit_amount`, `admission_no`) VALUES
(14, '16', 'Books', 'English 300Rs', '2021-08-31', '300', 'Hamza Khan', '200', 16),
(15, '16', 'Clothes & Uniform', 'Uniform: 3000\r\nBooks: 2200', '2021-08-30', '5200', 'Hamza Khan', '5000', 16),
(16, '', 'Teacher Party', 'Tea Party = 200Rs', '2021-09-08', '200', '', '', 0),
(17, '', 'Sports', 'sports 300', '2021-09-09', '300', '', '', 0),
(18, '', 'cup of tea', '2 cup of tea for melma', '2021-09-09', '200', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seat_issued`
--

CREATE TABLE `seat_issued` (
  `id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `v_name` text NOT NULL,
  `s_id` int(11) NOT NULL,
  `seat_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `s_name` text NOT NULL,
  `admission_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat_issued`
--

INSERT INTO `seat_issued` (`id`, `v_id`, `v_name`, `s_id`, `seat_no`, `date`, `check_out_date`, `s_name`, `admission_no`) VALUES
(12, 13, 'Honda Bus', 10, 1, '2021-08-28', '2021-08-31', 'Naeem Ullah', 1),
(13, 16, 'Yamaha Bus', 10, 1, '2021-08-31', '0000-00-00', 'Naeem Ullah', 1),
(14, 15, 'Niazi Bus', 13, 1, '2021-09-21', '0000-00-00', 'M Hamza Khan', 13),
(15, 15, 'Niazi Bus', 15, 2, '2021-09-20', '0000-00-00', 'Rashid Menhas', 15),
(16, 15, 'Niazi Bus', 15, 2, '2021-09-20', '0000-00-00', 'Rashid Menhas', 15);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `father_name` text NOT NULL,
  `p_address` text NOT NULL,
  `m_address` text NOT NULL,
  `phone` text NOT NULL,
  `date_of_submission` date NOT NULL,
  `roll_no` text NOT NULL,
  `cnic` text NOT NULL,
  `class` text NOT NULL,
  `serial_no` text NOT NULL,
  `class_from_withdrawn` text NOT NULL,
  `date_of_withdrawn` date NOT NULL,
  `remarks` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `father_occupation` text NOT NULL,
  `father_qualification` text NOT NULL,
  `mother_occupation` text NOT NULL,
  `mother_qualification` text NOT NULL,
  `religion` text NOT NULL,
  `caste` text NOT NULL,
  `hobbies` text NOT NULL,
  `sibling` text NOT NULL,
  `test_report` text NOT NULL,
  `admission_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `image`, `first_name`, `last_name`, `father_name`, `p_address`, `m_address`, `phone`, `date_of_submission`, `roll_no`, `cnic`, `class`, `serial_no`, `class_from_withdrawn`, `date_of_withdrawn`, `remarks`, `date_of_birth`, `father_occupation`, `father_qualification`, `mother_occupation`, `mother_qualification`, `religion`, `caste`, `hobbies`, `sibling`, `test_report`, `admission_no`) VALUES
(10, '2108268082450student photos.jpg', 'Naeem', 'Ullah', 'Tehseen Ullah', 'Akbar Pura Nowshera', 'Akbar Pura Nowshera', '923185003501', '2005-05-11', '', '1720123046613', 'Nursery', '324', 'Eight', '2021-08-31', 'Promoted to High School', '2000-07-26', 'Farmer', 'Matric', 'Housewife', 'Middle', 'Islam', 'Sunni', 'Gardening', '3', '83', '1'),
(11, '210826808295561db5216be04f85ce131c92fff3becc8.jpg', 'Hamza', 'Khan', 'Imtiaz Khan', 'Pabbi Nowshera', 'Pabbi Nowshera', '923166381300', '2003-05-04', '', '1720154520211', 'Prep', '341', 'One', '2021-08-30', 'Good', '1999-01-12', 'Transporter', 'Middle', 'Housewife', 'Middle', 'Islam', 'Sunni', 'Online Gaming', '2', '67', '11'),
(12, '21082680842581096.jpg', 'Sami', 'Ullah', 'Shah Jehan', 'Chamrang Garhi Kapura Mardan', 'Chamrang Garhi Kapura Mardan', '923118165094', '2013-10-08', '', '16101-9593258-3', 'One', '412', '', '0000-00-00', 'Promoted to High School', '2006-10-11', 'Teacher', 'Matric', 'House Wife', 'Middle', 'Islam', 'Sunni', 'Cricket', '1', '91', '12'),
(13, '2108269092202images.jpg', 'M Hamza', 'Khan', 'Gulab Khan', 'Urmar Miana Peshawar', 'Urmar Miana Peshawar', '923189077734', '2016-05-03', '', '1730120367153', 'Two', '123', '', '0000-00-00', 'Rejected', '2009-02-14', 'Doctor', 'Master', 'Doctor', 'Master', 'Islam', 'Sunni', 'Designing', '3', '40', '13'),
(14, '2108269094407images (1).jpg', 'Hasnain', 'Shah', 'Mumtaz Ali Shah', 'Chowki Drab Pabbi Nowshera', 'Chowki Drab Pabbi Nowshera', '923171990198', '2013-10-30', '', '1720160305375', 'Two', '398', '', '0000-00-00', '', '2004-12-13', 'Army', 'Matric', 'House Wife', 'Middle', 'Islam', 'Sunni', 'Cricket', '1', '52', '14'),
(15, '2108279091755user.png', 'Rashid', 'Menhas', 'Ataullah', 'Urmar Miana Peshawar', 'Urmar Miana Peshawar', '923109491095', '2021-08-27', '', '16101-9593258-3', 'Fifth', '1432', '', '0000-00-00', '', '2000-01-02', 'Farmer', 'Matric', 'House Wife', 'matric', 'Islam', 'Muslim', 'Cricket', '2', '80', '15'),
(16, '2108318081804images (1).jpg', 'Hamza', 'Khan', 'Gulab Khan', 'peshawar', 'peshawar', '923118165094', '2021-08-31', '', '17101-3536643-3', 'Prep', '143', '', '0000-00-00', '', '2017-01-01', 'Doctor', 'MBBS', 'Doctor', 'MBBS', 'Islam', 'Barki', 'Fishing', '2', '94', '16'),
(17, '21090712120804images (11).jpg', 'ali', 'khan', 'Jamal khan', 'pabbi', 'pabbi', '923103131215', '2021-09-06', '', '345678634232', 'One', '123', '', '0000-00-00', '', '2019-06-06', 'Army', 'BCS', 'House Wife', 'matric', 'Islam', 'Muslim', 'Cricket', '3', '80', '17'),
(18, '2109071015438images (12).jpg', 'Furqan ', 'ali', 'Tasleemullah', 'urmar', 'urmar', '923187773456', '2021-09-13', '', '16101-9593258-3', 'One', '412', '', '0000-00-00', '', '2017-06-06', 'Doctor', 'BCS', 'House Wife', 'Middle', 'Islam', 'Muslim', 'Internet Surfing', '2', '67', '18'),
(19, '2109071013642images (11).jpg', 'asma', 'khan', 'jahan khan', 'urmar ', 'urmar', '92345949106', '2021-09-06', '', '345678634232', 'Two', '412', '', '0000-00-00', '', '2021-09-06', 'Teacher', 'BCS', 'Housewife', 'Middle', 'Islam', 'Sunni', 'Gardening', '0', '83', '19'),
(20, '2109071010846images (8).jpg', 'jamal', 'khan', 'shah jehan', 'camp korona', 'Chamrang Garhi Kapura Mardan', '923104449406', '2021-09-06', '', '345678634232', 'Two', '324', '', '0000-00-00', '', '2004-02-06', 'Farmer', 'Master', 'Housewife', 'matric', 'Islam', 'Sunni', 'Gardening', '1', '91', '20'),
(21, '2109071014849images (9).jpg', 'ali', 'raza', 'raza khan', 'zakhel', 'zakhel', '923114445440', '2021-09-06', '', '345678634232', 'Three', '34', '', '0000-00-00', '', '2012-02-07', 'Teacher', 'Matric', 'House Wife', 'matric', 'Islam', 'Muslim', 'Designing', '', '91', '21'),
(22, '2109071013453images (7).jpg', 'Raza', ' khan', 'Fuji Mama', 'pabbi', 'pabbi', '923129994456', '2021-09-06', '', '345678634232', 'Prep', '45', '', '0000-00-00', '', '2017-07-06', 'Doctor', 'Master', 'Doctor', 'Master', 'Islam', 'Muslim', 'Gardening', '1', '83', '22'),
(23, '2109071013156images (6).jpg', 'amir', 'azmat', 'azmat', 'urmar', 'urmar', '923146667778', '2021-09-06', '', '16101-9593258-3', 'Prep', '12', '', '0000-00-00', '', '2016-06-06', 'Farmer', 'BCS', 'House Wife', 'Middle', 'Islam', 'Sunni', 'Designing', '1', '100', '23'),
(24, '2109071014659images (5).jpg', 'mansoor', 'khan', 'shah jehan', 'mardan', 'mardan', '92316920456', '2021-09-06', '', '345678634567', 'Nursery', '388', '', '0000-00-00', '', '2011-06-06', 'Teacher', 'Matric', 'Housewife', 'matric', 'Islam', 'Syed', 'Cricket', '1', '67', '24'),
(25, '2109072022405images (2).jpg', 'ganjy', 'gameryani', 'Tasleemullah', 'camp korona', 'camp', '923189077734', '2021-09-06', '', '16101-9593258-3', 'Three', '32', '', '0000-00-00', '', '2010-01-06', 'family business', 'Matric', 'House Wife', 'matric', 'Islam', 'Muslim', 'Gardening', '2', '91', '25'),
(26, '2109072023512images (4).jpg', 'atif', 'aslam', 'ali aslam', 'Pabbi Nowshera', 'Pabbi Nowshera', '923457778987', '2021-09-06', '', '16101-9593258-3', 'Four', '30', '', '0000-00-00', '', '2014-03-06', 'family business', 'BCS', 'Housewife', 'Middle', 'Islam', 'Sunni', 'Online Gaming', '1', '67', '26'),
(27, '2109073032450images (2).jpg', 'shah', 'jehan', 'jehangahr', 'aligar', 'aligahr', '923358976534', '2021-09-06', '', '345678634567', 'Four', '333', '', '0000-00-00', '', '2012-02-06', 'Teacher', 'Master', 'House Wife', 'matric', 'Islam', 'Sunni', 'Cricket', '1', '83', '27'),
(28, '2109073033557images (1).jpg', 'azhar', 'shahkheal', 'Ataullah', 'chiratt', 'chiratt', '923115678956', '2021-09-06', '', '16101-9593258-3', 'Prep', '444', '', '0000-00-00', '', '2017-01-06', 'Teacher', 'Master', 'Housewife', 'Middle', 'Islam', 'Muslim', 'Gardening', '', '83', '28'),
(29, '2109074042301download (5).jpg', 'asma', 'ikhlas', 'ikhlas khan', 'dogbsood', 'dagbsood', '923467778889', '2021-09-06', '', '16101-9593258-3', 'Prep', '222', '', '0000-00-00', '', '2014-01-06', 'Teacher', 'Matric', 'House Wife', 'Master', 'Islam', 'Syed', 'Internet Surfing', '', '39', '29'),
(30, '2109074045004download (1).jpg', 'uzair', 'khan', 'khan zada', 'choukidarab', 'choukidarab', '923460003330', '2021-09-06', '', '345678634567', 'Fifth', '23', '', '0000-00-00', '', '2011-12-07', 'family business', 'Master', 'House Wife', 'matric', 'Islam', 'Muslim', 'Designing', '2', '91', '30'),
(31, '2109074043107images (2).jpg', 'Sami', 'Ullah', 'Imtiaz Khan', 'Chamrang Garhi Kapura Mardan', 'Chamrang Garhi Kapura Mardan', '92336789687', '2021-09-06', '', '5623829322', 'Fifth', '332', '', '0000-00-00', '', '2008-02-06', 'Teacher', 'BCS', 'House Wife', 'matric', 'Islam', 'Muslim', 'Online Gaming', '', '45', '31'),
(32, '2109074040216download (1).jpg', 'Usman', 'khan', 'zaman khan', 'dargay', 'dargay', '92347779304', '2021-09-06', '', '345678634567', 'Sixth', '321', '', '0000-00-00', '', '2008-07-06', 'family business', 'Matric', 'House Wife', 'matric', 'Islam', 'Muslim', 'Online Gaming', '1', '67', '32'),
(33, '2109074040121images (5).jpg', 'marwa', 'khan', 'Fuji Mama', 'gari aadarkheal', 'gari aadarkheal', '92345790676', '2021-09-06', '', '16101-9593258-3', 'Sixth', '321', '', '0000-00-00', '', '2006-12-06', 'Doctor', 'BCS', 'House Wife', 'matric', 'Islam', 'Muslim', 'Cricket', '2', '91', '33'),
(34, '2109074045424download (4).jpg', 'amir', 'khan', 'Ataullah', 'azaan kheal', 'azaan kheal', '923109997866', '2021-09-06', '', '16101-9593258-3', 'Seventh', '322', '', '0000-00-00', '', '2006-01-06', 'Transporter', 'Matric', 'Doctor', 'MBBS', 'Islam', 'Muslim', 'Internet Surfing', '2', '100', '34'),
(35, '2109074044027images (3).jpg', 'imaran ', 'khan', 'Fuji Mama', 'mardan', 'mardan', '92310889034', '2021-09-06', '', '16101-9593258-3', 'Seventh', '12', '', '0000-00-00', '', '2008-04-06', 'Army', 'BCS', 'House Wife', 'matric', 'Islam', 'Muslim', 'Cricket', '2', '83', '35'),
(36, '2109074043631download (2).jpg', 'hamza', 'khan', 'Tasleemullah', 'pabbi', 'pabbi', '92333556782', '2021-09-06', '', '16101-9593258-3', 'Eight', '111', '', '0000-00-00', '', '2007-03-06', 'Teacher', 'BCS', 'House Wife', 'matric', 'Islam', 'Muslim', 'Gardening', '2', '67', '36'),
(37, '2109074042236download (2).jpg', 'amin', 'khan', 'Imtiaz Khan', 'urmar', 'urmar', '923118885678', '2021-09-06', '', '16101-9593258-3', 'Eight', '112', '', '0000-00-00', '', '2021-09-06', 'Farmer', 'BCS', 'Doctor', 'MBBS', 'Islam', 'Muslim', 'Cricket', '1', '80', '37');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

CREATE TABLE `student_fee` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `total_fee` text NOT NULL,
  `submit_fee` text NOT NULL,
  `fee_type` text NOT NULL,
  `date` date NOT NULL,
  `student_id` text NOT NULL,
  `class` text NOT NULL,
  `admission_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`id`, `Name`, `total_fee`, `submit_fee`, `fee_type`, `date`, `student_id`, `class`, `admission_no`) VALUES
(26, 'Hamza Khan', '3000', '3000', 'Monthly Fee', '2021-08-27', '11', 'Two', 11),
(27, 'Naeem Ullah', '500', '500', 'Transport Fee', '2021-08-28', '10', '', 1),
(28, 'Naeem Ullah', '2500', '2500', 'Monthly Fee', '2021-08-30', '10', 'Four', 1),
(29, 'Hamza Khan', '3000', '3000', 'Registration Fee', '2021-08-31', '16', 'Nursery', 16),
(30, 'Naeem Ullah', '3000', '3000', 'Transport Fee', '2021-08-31', '10', '', 1),
(31, 'Raza  khan', '2300', '2300', 'Monthly Fee', '2021-09-07', '22', 'Third', 22),
(32, 'amir azmat', '2000', '2000', 'Monthly Fee', '2021-09-07', '23', 'Fourth', 23),
(33, 'Hamza Khan', '4000', '3000', 'Registration Fee', '2021-09-09', '16', 'Prep', 16),
(34, 'Hamza Khan', '3000', '2300', '', '2021-09-08', '16', 'Nursery', 16),
(35, 'Hamza Khan', '3000', '2000', 'Monthly Fee', '2021-09-29', '16', 'Choose...', 16),
(36, 'Hamza Khan', '5000', '2000', '', '2021-09-07', '16', 'Nursery', 16),
(37, 'Hamza Khan', '3000', '2000', '', '2021-09-07', '16', 'Nursery', 16),
(38, 'Hamza Khan', '3000', '2000', '', '2021-09-07', '16', 'Nursery', 16),
(39, 'Hamza Khan', '2300', '2000', '', '2021-09-22', '16', 'Nursery', 16),
(40, 'azhar shahkheal', '2000', '1500', 'Monthly Fee', '2021-09-15', '28', 'Prep', 28),
(41, 'azhar shahkheal', '2000', '1500', 'Monthly Fee', '2021-09-15', '28', 'Prep', 28),
(42, 'asma ikhlas', '4000', '3000', 'Registration Fee', '2021-09-27', '29', 'Prep', 29),
(43, 'M Hamza Khan', '2300', '2000', 'Transport Fee', '2021-09-21', '13', '', 13),
(44, 'Rashid Menhas', '2000', '2000', 'Transport Fee', '2021-09-20', '15', '', 15),
(45, 'Rashid Menhas', '2000', '2000', 'Transport Fee', '2021-09-20', '15', '', 15),
(46, 'amir azmat', '2000', '2000', 'Monthly Fee', '2021-09-09', '23', 'Nursery', 23);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `qualification` text NOT NULL,
  `status` text NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  `salary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `address`, `phone`, `qualification`, `status`, `date`, `image`, `salary`) VALUES
(9, 'Hasnain Shah', 'Chowki Drab', '03171990198', 'BS Computer Science', '', '2021-08-02', '2108269090149images (2).jpg', '45000'),
(10, 'Rashid Menhas', 'Urmar Miana', '03109491095', 'Bs Mathematics', '', '2021-08-17', '2108269095749student photos.jpg', '55000'),
(11, 'Naeem Ullah', 'Akbar Pura', '03185003501', 'Bs English', '', '2016-07-15', '21082690959501096.jpg', '35000'),
(12, 'Hamza Khan', 'Pabbi Nowhsera', '03166381300', 'BS Chemistry', '', '2021-08-24', '2108269095851images (1).jpg', '60000'),
(13, 'Samiullah', 'Mardan', '03118165094', 'BS Islamiate', '', '2021-08-07', '2108269091053images.jpg', '20000'),
(14, 'Asim Khan', 'Swabi', '923221914030', 'BA', '', '2021-08-16', '2108309094725student photos.jpg', '30000'),
(15, 'Naeem Ullah', 'Peshawar', '923118165094', 'BS Computer Science', '', '2021-08-31', '2108318084310images.jpg', '30000'),
(16, 'Samiullah', 'Mardan', '03118165094', 'BS Computer Science', '', '2021-09-07', '', '3000'),
(17, 'Samiullah', 'Mardan', '03118165094', 'BS Islamiate', '', '2021-09-30', '', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_salary`
--

CREATE TABLE `teachers_salary` (
  `id` int(11) NOT NULL,
  `teacher_id` text NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `total_salary` text NOT NULL,
  `date` date NOT NULL,
  `submit_salary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers_salary`
--

INSERT INTO `teachers_salary` (`id`, `teacher_id`, `name`, `type`, `total_salary`, `date`, `submit_salary`) VALUES
(14, '13', 'Samiullah', '', '20000', '2021-08-28', '22000'),
(15, '12', 'Hamza Khan', '', '60000', '2021-08-28', '-60000'),
(16, '15', 'Naeem Ullah', '', '30000', '2021-08-31', '30000'),
(17, '14', 'Asim Khan', '', '30000', '2021-09-01', '30000'),
(18, '14', 'Asim Khan', '', '30000', '2021-10-01', '30000'),
(19, '14', 'Asim Khan', '', '30000', '2021-09-06', '30000'),
(20, '15', 'Naeem Ullah', '', '30000', '2021-09-07', '30000'),
(21, '16', 'Samiullah', '', '3000', '2021-09-09', '3000'),
(22, '15', 'Naeem Ullah', '', '30000', '2021-09-08', '30000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'Samiullah', 'samiullahk997', 'Sami', 'Khan'),
(5, 'Hasnain Shah', 'hasshah', 'Hasnain', 'Shah');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `model_no` text NOT NULL,
  `total_seats` text NOT NULL,
  `reg_date` date NOT NULL,
  `image` text NOT NULL,
  `status` text NOT NULL,
  `seat_issued` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `model_no`, `total_seats`, `reg_date`, `image`, `status`, `seat_issued`) VALUES
(13, 'Honda Bus', 's/3422', '45', '2021-08-05', '21082610104005school-bus-seatbelts.jpg', 'Assigned', 0),
(14, 'Suzuki  Bus', 'Bus-6534', '40', '2021-08-06', '21082610103206d0b63c88-feaa-451b-b198-f9ca4ecbd090-large16x9_6PWEBUSDRIVERSHORTAGEPKG.transfer_frame_3668.png', '', 0),
(15, 'Niazi Bus', '5643', '50', '2021-08-04', '', 'Assigned', 2),
(16, 'Yamaha Bus', 'Bus-34124', '15', '2021-08-31', '2108318085211MIJ-L-BUSES-0902-04-1.jpg', 'Not Assign', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dmc_records`
--
ALTER TABLE `dmc_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_details`
--
ALTER TABLE `driver_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellaneous`
--
ALTER TABLE `miscellaneous`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat_issued`
--
ALTER TABLE `seat_issued`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_salary`
--
ALTER TABLE `teachers_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dmc_records`
--
ALTER TABLE `dmc_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `miscellaneous`
--
ALTER TABLE `miscellaneous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `seat_issued`
--
ALTER TABLE `seat_issued`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `teachers_salary`
--
ALTER TABLE `teachers_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
