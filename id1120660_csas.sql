-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2017 at 07:48 AM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1120660_csas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `allotment`
--

CREATE TABLE `allotment` (
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `round_number` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `choicefilling`
--

CREATE TABLE `choicefilling` (
  `rollno` varchar(10) NOT NULL,
  `firstchoice` varchar(100) DEFAULT NULL,
  `secondchoice` varchar(100) DEFAULT NULL,
  `thirdchoice` varchar(100) DEFAULT NULL,
  `fourthchoice` varchar(100) DEFAULT NULL,
  `fifthchoice` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choicefilling`
--

INSERT INTO `choicefilling` (`rollno`, `firstchoice`, `secondchoice`, `thirdchoice`, `fourthchoice`, `fifthchoice`) VALUES
('100', 'Durgapur', NULL, NULL, NULL, NULL),
('101', 'Tiruchirappali\r\n', NULL, NULL, NULL, NULL),
('103', 'Durgapur', NULL, NULL, NULL, NULL),
('104', 'Raipur', 'Bhopal', 'Calicut', 'Tiruchirappali', 'Agartala');

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `name` varchar(300) NOT NULL,
  `total_seat` int(3) NOT NULL,
  `vacant_seat` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`name`, `total_seat`, `vacant_seat`) VALUES
('Agartala', 1, 1),
('Allahabad', 2, 1),
('Bhopal', 1, 0),
('Calicut', 1, 0),
('Durgapur', 2, 0),
('Jamshedpur', 2, 2),
('Kurukshetra', 1, 1),
('Raipur', 1, 0),
('Surathkal', 2, 2),
('Tiruchirappali', 1, 1),
('Warangal', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `institute_name` varchar(300) NOT NULL,
  `student_rollno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(100) NOT NULL,
  `rollno` int(10) NOT NULL,
  `rank` int(3) NOT NULL,
  `address` varchar(500) NOT NULL,
  `choice_status` varchar(10) DEFAULT NULL,
  `admission_status` varchar(50) DEFAULT NULL,
  `allotment_status` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `rollno`, `rank`, `address`, `choice_status`, `admission_status`, `allotment_status`, `email`) VALUES
('Mushahid Khan', 100, 1, 'Uttar Pradesh', NULL, NULL, NULL, 'alikhanchd786@gmail.com'),
('Fahad', 101, 2, 'Bihar', 'lock', NULL, NULL, 'xyan4321@gmail.com'),
('SHIVAM AGARWAL', 102, 135, 'UP', NULL, NULL, NULL, 'shivam00123@gmail.com'),
('Ajay', 103, 3, 'haryana', NULL, NULL, NULL, 'mynitdata@gmail.com'),
('L.M.T', 104, 4, 'Allahabad', NULL, NULL, NULL, 'lmtnitc@gmail.com'),
('Sunny', 105, 5, 'Punjab', NULL, NULL, NULL, 'kingmadeforu@gmail.com'),
('Aniket', 106, 6, 'Rajisthan', NULL, NULL, NULL, ''),
('Sarvesh', 107, 7, 'Allahabad', NULL, NULL, NULL, ''),
('Apoorva', 108, 8, 'Allahabad', NULL, NULL, NULL, 'brijesh.s@gmail.com'),
('Namita', 109, 9, 'Allahabad', NULL, NULL, NULL, ''),
('Jyoti', 110, 10, 'Allahabad', NULL, NULL, NULL, ''),
('Arsh', 111, 11, 'Allahabad', NULL, NULL, NULL, ''),
('Avnish', 112, 12, 'Allahabad', NULL, NULL, NULL, ''),
('Yogendra', 113, 13, 'Allahabad', NULL, NULL, NULL, ''),
('Amit Soni', 114, 14, 'Chattishgarh', NULL, NULL, NULL, 'amitamora@gmail.com'),
('Pankaj', 115, 15, 'Bihar', NULL, NULL, NULL, 'kumarpankajraj01@gmail.com'),
('Amit ', 116, 16, 'Bihar', NULL, NULL, NULL, ''),
('Manisha', 117, 17, 'Vanaras', NULL, NULL, NULL, ''),
('Rahul', 118, 18, 'Bihar', NULL, NULL, NULL, 'rjrahulabc30@gmail.com'),
('Raushan', 119, 19, 'Bihar', NULL, NULL, NULL, ''),
('Akshita', 122, 22, 'Uttrakhand', NULL, NULL, NULL, ''),
('Alka', 123, 23, 'Bihar', NULL, NULL, NULL, ''),
('Vaibhav', 124, 24, 'Delhi', NULL, NULL, NULL, ''),
('Diwakar', 125, 25, 'Kanpur', NULL, NULL, NULL, ''),
('Priyanka', 129, 29, 'Jharkhand', NULL, NULL, NULL, ''),
('Vikash', 130, 30, 'Bihar', NULL, NULL, NULL, ''),
('Ashutosh', 131, 31, 'Bihar', NULL, NULL, NULL, ''),
('AMBRISH', 132, 32, 'Allahabad', NULL, NULL, NULL, ''),
('PRATYUSH AGARWAL', 138, 38, 'Kerala', NULL, NULL, NULL, 'pratyushagarwal3@gmail.com'),
('BHASKAR', 139, 39, 'Kanpur', NULL, NULL, NULL, ''),
('BIJITH', 140, 40, 'Ajmer', NULL, NULL, NULL, ''),
('SAURABH CHHABRA', 141, 41, 'UP', NULL, NULL, NULL, 'saurabhchhabra994@gmail.com'),
('EKTA', 142, 42, 'Rajasthan', NULL, NULL, NULL, ''),
('FATHIMA', 143, 43, 'Calicut', NULL, NULL, NULL, ''),
('Soorya', 144, 44, 'Calicut', NULL, NULL, NULL, ''),
('HEMAKSHI', 145, 45, 'Allahabad', NULL, NULL, NULL, ''),
('KUMAR', 146, 46, 'Bareilly', NULL, NULL, NULL, ''),
('KUNEEKA', 147, 47, 'Goa', NULL, NULL, NULL, ''),
('LOVE', 148, 48, 'Lucknow', NULL, NULL, NULL, ''),
('MANISH', 149, 49, 'Gwalior', NULL, NULL, NULL, ''),
('MANISH', 150, 50, 'Noida', NULL, NULL, NULL, ''),
('NAUSHIN', 151, 51, 'Jharkhand', NULL, NULL, NULL, ''),
('Akaas', 152, 52, 'Bihar', NULL, NULL, NULL, ''),
('NAUSHIN FATMA', 153, 53, 'Allahabad', NULL, NULL, NULL, ''),
('Ravi', 154, 54, 'Kanpur', NULL, NULL, NULL, ''),
(' 	POLASHI BORDOLOI', 155, 55, 'Allahabad', NULL, NULL, NULL, ''),
('NIRANJAN K', 156, 56, 'Bihar', NULL, NULL, NULL, ''),
('NAVIN KUMAR', 157, 57, 'Bihar', NULL, NULL, NULL, ''),
('RAHUL KUMAR', 158, 58, 'Allahabad', NULL, NULL, NULL, ''),
('RISHABH PRAKASH', 159, 59, 'Delhi', NULL, NULL, NULL, ''),
('RISHIKESH GUPTA', 160, 60, 'Delhi', NULL, NULL, NULL, ''),
('ROOMA KHAN', 161, 61, 'Gwalior', NULL, NULL, NULL, ''),
('SHIVANI GUPTA', 162, 62, 'Bhopal', NULL, NULL, NULL, ''),
('SONALI BADAL', 163, 63, 'Delhi', NULL, NULL, NULL, ''),
('SURABHI KUSHWAHA', 164, 64, 'Noida', NULL, NULL, NULL, ''),
('SWAMI ANIL SARASWATI', 165, 65, 'Ajmer', NULL, NULL, NULL, ''),
('V.PAVITHRA', 166, 66, 'Vanaras', NULL, NULL, NULL, ''),
('VIJAY KUMAR MISHRA', 167, 67, 'Goa', NULL, NULL, NULL, ''),
('VIKASH KUMAR', 168, 68, 'Goa', NULL, NULL, NULL, ''),
(' 	PARVEJ ALAM', 169, 69, 'Bihar', NULL, NULL, NULL, ''),
('DEEPAK SINGH', 170, 70, 'Delhi', NULL, NULL, NULL, ''),
('CHINNATHAMBI S', 171, 71, 'Calicut', NULL, NULL, NULL, ''),
(' 	SNEHA BANERJEE', 172, 72, 'Bihar', NULL, NULL, NULL, ''),
(' 	AJAY RAM', 173, 73, 'Rajasthan', NULL, NULL, NULL, ''),
('ABHISHEK KUMAR', 174, 74, 'Ranchi', NULL, NULL, NULL, 'sumeettoppo95@gmail.com'),
('VIKAS SINGH', 175, 75, 'Bihar', NULL, NULL, NULL, ''),
('MAYANK', 176, 76, 'Delhi', NULL, NULL, NULL, 'mayank1158336@gmail.com'),
(' 	PRABHAT ALOK', 177, 77, 'Delhi', NULL, NULL, NULL, ''),
('YASH MOGRAI', 178, 78, 'Noida', NULL, NULL, NULL, ''),
(' 	SANDEEP KUMAR', 179, 79, 'Uttrakhand', NULL, NULL, NULL, ''),
(' 	NITESH KUMAR', 180, 80, 'Delhi', NULL, NULL, NULL, ''),
(' ASHUTOSH KUMAR', 181, 81, 'Bihar', NULL, NULL, NULL, ''),
(' 	UTTAM ANAND', 182, 82, 'Bihar', NULL, NULL, NULL, ''),
('ABIN BHATTACHARYA', 183, 83, 'Delhi', NULL, NULL, NULL, ''),
('MEDHA AGRAWAL', 184, 84, 'Ajmer', NULL, NULL, NULL, ''),
(' 	DILRAJ SINGH SANDHU', 185, 85, 'Bhopal', NULL, NULL, NULL, ''),
(' 	PAWAN KUMAR SINGH', 186, 86, 'Bhopal', NULL, NULL, NULL, ''),
('ARVIND KUMAR MAURYA', 187, 87, 'Jharkhand', NULL, NULL, NULL, ''),
('PRAVESH KUMAR SINGH', 188, 88, 'Bihar', NULL, NULL, NULL, ''),
('SANGITA KUMARI', 189, 89, 'Calicut', NULL, NULL, NULL, ''),
(' 	RAPHEL TUDU', 190, 90, 'Calicut', NULL, NULL, NULL, ''),
(' 	ANSHUL DABAS', 191, 91, 'Goa', NULL, NULL, NULL, ''),
(' 	PREETI', 192, 92, 'Rajasthan', NULL, NULL, NULL, ''),
(' 	ASHAR SULTANA', 193, 93, 'Bihar', NULL, NULL, NULL, ''),
(' 	ANURAG PAL', 194, 94, 'Bareilly', NULL, NULL, NULL, ''),
(' 	JAIGISH', 195, 95, 'Bihar', NULL, NULL, NULL, ''),
('Ravish', 196, 96, 'Delhi', NULL, NULL, NULL, ''),
('Raju', 197, 97, 'Delhi', NULL, NULL, NULL, ''),
('Rajesh', 198, 98, 'Delhi', NULL, NULL, NULL, ''),
('Amrish', 199, 99, 'Goa', NULL, NULL, NULL, ''),
('Rohit', 200, 100, 'Ajmer', NULL, NULL, NULL, ''),
(' 	LOVELY KUMARI', 201, 101, 'Gwalior', NULL, NULL, NULL, ''),
(' 	PRAGYA BHADAURIA', 202, 102, 'Shajapur', NULL, NULL, NULL, ''),
(' 	VIVEK P', 203, 103, 'Amroha', NULL, NULL, NULL, ''),
(' 	SAKSHI ROHILLA', 204, 104, 'Bihar', NULL, NULL, NULL, ''),
(' 	LIYA K. MOHIUDDIN', 205, 105, 'Delhi', NULL, NULL, NULL, ''),
(' 	PRASHANT KUMAR SHARMA', 206, 106, 'Bhopal', NULL, NULL, NULL, ''),
(' 	ASHUTOSH KUMAR SINGH', 207, 107, 'Noida', NULL, NULL, NULL, ''),
(' 	RAPHEL TUDU', 208, 108, 'Ajmer', NULL, NULL, NULL, ''),
(' 	ANSHUL DABAS', 209, 109, 'Bihar', NULL, NULL, NULL, ''),
(' 	PREETI', 210, 110, 'Goa', NULL, NULL, NULL, ''),
(' 	ASHAR SULTANA', 211, 111, 'Kesarpur', NULL, NULL, NULL, ''),
(' 	ANURAG PAL', 212, 112, 'Islamnagar', NULL, NULL, NULL, ''),
(' 	JAIGISH', 213, 113, 'Rajasthan', NULL, NULL, NULL, ''),
(' 	LOVELY KUMARI', 214, 114, 'Amroha', NULL, NULL, NULL, ''),
(' 	PRAGYA BHADAURIA', 215, 115, 'Lucknow', NULL, NULL, NULL, ''),
(' 	VIVEK P', 216, 116, 'Allahabad', NULL, NULL, NULL, ''),
('SAKSHI ROHILLA', 217, 117, 'Ajmer', NULL, NULL, NULL, ''),
(' 	LIYA K. MOHIUDDIN', 218, 118, 'Moradabad', NULL, NULL, NULL, ''),
(' 	PRASHANT KUMAR SHARMA', 219, 119, 'Moradabade', NULL, NULL, NULL, ''),
('ASHUTOSH KUMAR SINGH', 220, 120, 'Bihar', NULL, NULL, NULL, ''),
('AMAN KUMAR', 221, 121, 'Ajmer', NULL, NULL, NULL, ''),
(' 	AKANKSHA SINGH', 222, 122, 'Punjab', NULL, NULL, NULL, ''),
(' 	ASHOK KUMAR SHARMA', 223, 123, 'Jharkhand', NULL, NULL, NULL, ''),
('Surbhi', 224, 124, 'Jaipur', NULL, NULL, NULL, ''),
('Suman', 225, 125, 'Kanpur', NULL, NULL, NULL, ''),
('Kumar Pratap', 226, 126, 'Kanpur', NULL, NULL, NULL, ''),
('Kesav', 227, 127, 'Gorakhpur', NULL, NULL, NULL, ''),
('Mukesh', 228, 128, 'Hardaspur', NULL, NULL, NULL, ''),
('Munender', 229, 129, 'Bareilly', NULL, NULL, NULL, ''),
('Mustfa Alam', 230, 130, 'Kesarpur', NULL, NULL, NULL, ''),
('Mohmed Khan', 231, 131, 'Ajmer', NULL, NULL, NULL, ''),
('Momina', 232, 132, 'Delhi', NULL, NULL, NULL, ''),
('Khan', 233, 133, 'Rampur', NULL, NULL, NULL, ''),
('Khurshid', 234, 134, 'Bareilly', NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(2, 'google', '106877509101373778199', 'AJAY', 'YADAV', 'ajayadav1895@gmail.com', '', 'en-GB', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', '2017-03-09 18:56:17', '2017-03-21 04:27:40'),
(3, 'google', '115903042140221031367', 'mushahid', 'khan', 'alikhanchd786@gmail.com', 'male', 'en', 'https://lh3.googleusercontent.com/-Q5JXLz2OimQ/AAAAAAAAAAI/AAAAAAAAAB8/992EG5HOKVE/photo.jpg', 'https://plus.google.com/115903042140221031367', '2017-03-10 06:35:49', '2017-03-23 01:13:40'),
(5, 'google', '105730922841771256462', 'Xyan', 'Rock', 'xyan4321@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/105730922841771256462', '2017-03-19 16:45:10', '2017-03-22 23:12:54'),
(6, 'google', '100499380507965937511', 'Lavkush', 'Tiwari', 'lmtnitc@gmail.com', 'male', 'en', 'https://lh5.googleusercontent.com/-X6PUUL3r3iQ/AAAAAAAAAAI/AAAAAAAAACs/-8at2aOOKFg/photo.jpg', 'https://plus.google.com/100499380507965937511', '2017-03-19 17:03:32', '2017-03-22 18:48:31'),
(7, 'google', '101106605776880403915', 'FAHAD', '', 'kingmadeforu@gmail.com', '', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/101106605776880403915', '2017-03-19 17:08:30', '2017-03-19 20:51:51'),
(8, 'google', '103845691284819729982', 'Pratyush', 'Agarwal', 'pratyushagarwal3@gmail.com', '', 'en', 'https://lh4.googleusercontent.com/-5iUZD3c7UdY/AAAAAAAAAAI/AAAAAAAAArs/Aqodl9avrJk/photo.jpg', 'https://plus.google.com/103845691284819729982', '2017-03-19 17:14:35', '2017-03-19 17:14:37'),
(9, 'google', '112271961573727566292', 'Saurabh', 'Chhabra', 'saurabhchhabra994@gmail.com', 'male', 'en', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/112271961573727566292', '2017-03-19 17:15:11', '2017-03-19 17:20:06'),
(10, 'google', '104259148824240844594', 'Amit', 'kumar', 'amitamora@gmail.com', 'male', 'en', 'https://lh5.googleusercontent.com/-vm_66c6hPcw/AAAAAAAAAAI/AAAAAAAAAq0/lt4f-O8Uhf4/photo.jpg', 'https://plus.google.com/104259148824240844594', '2017-03-20 16:31:49', '2017-03-20 16:31:51'),
(11, 'google', '117385395409440279158', 'AJAY', 'YADAV', 'mynitdata@gmail.com', '', 'en-GB', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', '2017-03-21 10:39:29', '2017-03-22 17:29:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allotment`
--
ALTER TABLE `allotment`
  ADD PRIMARY KEY (`round_number`);

--
-- Indexes for table `choicefilling`
--
ALTER TABLE `choicefilling`
  ADD PRIMARY KEY (`rollno`),
  ADD KEY `rollno` (`rollno`),
  ADD KEY `rollno_2` (`rollno`),
  ADD KEY `rollno_3` (`rollno`),
  ADD KEY `rollno_4` (`rollno`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`student_rollno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollno`,`rank`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
