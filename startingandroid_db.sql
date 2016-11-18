-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 10:26 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `startingandroid_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `counter_start`
--

CREATE TABLE `counter_start` (
  `id` int(11) NOT NULL,
  `start` date NOT NULL DEFAULT '2016-11-11'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter_start`
--

INSERT INTO `counter_start` (`id`, `start`) VALUES
(1, '2016-11-19'),
(2, '2016-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `sust_student`
--

CREATE TABLE `sust_student` (
  `user_id1` int(11) NOT NULL,
  `date` date NOT NULL,
  `event` varchar(200) NOT NULL,
  `category1` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sust_student`
--

INSERT INTO `sust_student` (`user_id1`, `date`, `event`, `category1`) VALUES
(1325, '2016-01-22', 'Fateha-yeazdaham', '1'),
(1326, '2016-02-13', 'Swaraswati Puja', '1'),
(1327, '2016-02-21', 'Amar Ekushe-International mother Language Day', '1'),
(1328, '2016-03-17', 'Father of the Nation Bangabandhu''s Birthday', '1'),
(1329, '2016-03-26', 'Independence and National day', '1'),
(1330, '2016-04-14', 'Bangla Naba Barsha', '1'),
(1331, '2016-05-01', 'May day', '1'),
(1332, '2016-05-05', 'Shab-e-Merraz', '1'),
(1333, '2016-05-21', 'Buddha Purnima', '1'),
(1334, '2016-05-23', 'Shab-e-Barat', '1'),
(1335, '2016-06-12', 'Summer Vacation', '1'),
(1336, '2016-06-13', 'Summer Vacation', '1'),
(1337, '2016-06-14', 'Summer Vacation', '1'),
(1338, '2016-06-15', 'Summer Vacation', '1'),
(1339, '2016-06-16', 'Summer Vacation', '1'),
(1340, '2016-06-17', 'Summer Vacation', '1'),
(1341, '2016-06-18', 'Summer Vacation', '1'),
(1342, '2016-06-19', 'Summer Vacation', '1'),
(1343, '2016-06-20', 'Summer Vacation', '1'),
(1344, '2016-06-21', 'Summer Vacation', '1'),
(1345, '2016-06-22', 'Summer Vacation', '1'),
(1346, '2016-06-23', 'Summer Vacation', '1'),
(1347, '2016-06-24', 'Summer Vacation', '1'),
(1348, '2016-06-25', 'Summer Vacation', '1'),
(1349, '2016-06-26', 'Summer Vacation', '1'),
(1350, '2016-06-27', 'Summer Vacation', '1'),
(1351, '2016-06-28', 'Summer Vacation', '1'),
(1352, '2016-06-29', 'Summer Vacation', '1'),
(1353, '2016-06-30', 'Summer Vacation', '1'),
(1354, '2016-07-03', 'Eid-ul-Fitr & Shab-e-Qadar', '1'),
(1355, '2016-07-04', 'Eid-ul-Fitr & Shab-e-Qadar', '1'),
(1356, '2016-07-05', 'Eid-ul-Fitr & Shab-e-Qadar', '1'),
(1357, '2016-07-06', 'Eid-ul-Fitr & Shab-e-Qadar', '1'),
(1358, '2016-07-07', 'Eid-ul-Fitr & Shab-e-Qadar', '1'),
(1359, '2016-07-08', 'Eid-ul-Fitr & Shab-e-Qadar', '1'),
(1360, '2016-07-09', 'Eid-ul-Fitr & Shab-e-Qadar', '1'),
(1361, '2016-07-10', 'Eid-ul-Fitr & Shab-e-Qadar', '1'),
(1362, '2016-07-11', 'Eid-ul-Fitr & Shab-e-Qadar', '1'),
(1363, '2016-07-12', 'Eid-ul-Fitr & Shab-e-Qadar', '1'),
(1364, '2016-07-13', 'Eid-ul-Fitr & Shab-e-Qadar', '1'),
(1365, '2016-07-14', 'Eid-ul-Fitr & Shab-e-Qadar', '1'),
(1366, '2016-08-15', 'National Mourning Day', '1'),
(1367, '2016-08-25', 'Janmastami', '1'),
(1368, '2016-09-05', 'Shahjalal(R.) Offat day', '1'),
(1369, '2016-09-04', 'Eid-ul-Azha', '1'),
(1370, '2016-09-06', 'Eid-ul-Azha', '1'),
(1371, '2016-09-07', 'Eid-ul-Azha', '1'),
(1372, '2016-09-08', 'Eid-ul-Azha', '1'),
(1373, '2016-09-09', 'Eid-ul-Azha', '1'),
(1374, '2016-09-10', 'Eid-ul-Azha', '1'),
(1375, '2016-09-11', 'Eid-ul-Azha', '1'),
(1376, '2016-09-12', 'Eid-ul-Azha', '1'),
(1377, '2016-09-13', 'Eid-ul-Azha', '1'),
(1378, '2016-09-14', 'Eid-ul-Azha', '1'),
(1379, '2016-09-15', 'Eid-ul-Azha', '1'),
(1380, '2016-10-06', 'Durga Puja & lokki Puja', '1'),
(1381, '2016-10-07', 'Durga Puja & lokki Puja', '1'),
(1382, '2016-10-08', 'Durga Puja & lokki Puja', '1'),
(1383, '2016-10-09', 'Durga Puja & lokki Puja', '1'),
(1384, '2016-10-10', 'Durga Puja & lokki Puja', '1'),
(1385, '2016-10-11', 'Durga Puja & lokki Puja', '1'),
(1386, '2016-10-12', 'Muharram(Ashura)', '1'),
(1387, '2016-10-13', 'Durga Puja & lokki Puja', '1'),
(1388, '2016-10-14', 'Durga Puja & lokki Puja', '1'),
(1389, '2016-10-15', 'Durga Puja & lokki Puja', '1'),
(1390, '2016-11-30', 'Akheri Chahar-Shomba', '1'),
(1391, '2016-12-12', 'Eid-E-Miladun Nabi', '1'),
(1392, '2016-12-14', 'Shaheed Intellectuals day', '1'),
(1393, '2016-12-16', 'Victory day', '1'),
(1394, '2016-12-25', 'Christmas day', '1'),
(1395, '2016-11-17', 'test', ''),
(1396, '2016-11-18', 'test', ''),
(1397, '2016-11-19', 'test', ''),
(1402, '2016-11-19', 'test', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'noman', 'noman61@gmail.com', '414ed451e78fc703cec23fade62187bfcadb099409c6d50a06eb1b969a8e9a5b'),
(3, 'Spectator Pioneer', 'spectatorpioneer@gmail.com', '6e117a29a19671194bda4604fde2d7175ffaff4712da82f986e796b3c3ea7462'),
(4, 'minhaz', 'minhaz61@gmail.com', '3229a71e1765c46525f5bcd26689635f7346cefbcddbfa092bf1c2379f51e81f'),
(5, 'test', 'test@gmail.com', '414ed451e78fc703cec23fade62187bfcadb099409c6d50a06eb1b969a8e9a5b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counter_start`
--
ALTER TABLE `counter_start`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sust_student`
--
ALTER TABLE `sust_student`
  ADD PRIMARY KEY (`user_id1`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counter_start`
--
ALTER TABLE `counter_start`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sust_student`
--
ALTER TABLE `sust_student`
  MODIFY `user_id1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1403;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
