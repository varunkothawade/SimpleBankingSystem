-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 03:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spark_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `srno` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `r_email` varchar(50) NOT NULL,
  `amount` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`srno`, `date_time`, `sender`, `receiver`, `r_email`, `amount`) VALUES
(1, '2022-02-15 04:57:11', 'Tina', 'Jay', 'jay3000@gmail.com', 1000.00),
(2, '2022-02-15 04:57:34', 'Jay', 'Hannah', 'hann55@gmail.com', 5000.00),
(3, '2022-02-15 04:58:03', 'Hank', 'Tina', 'tina669@gmail.com', 500.00),
(4, '2022-02-15 04:58:46', 'Hank', 'Ajay', 'ajay100@gmail.com', 500.00),
(5, '2022-02-15 04:59:23', 'Hank', 'Jay', 'jay3000@gmail.com', 500.00),
(6, '2022-02-15 04:59:42', 'Luther', 'Hannah', 'hann55@gmail.com', 600.00),
(7, '2022-02-15 04:59:58', 'Jay', 'Kylie', 'kylie@gmail.com', 15000.00),
(8, '2022-02-15 05:00:22', 'Reacher', 'Neha', 'nah11@gmail.com', 6008.00),
(9, '2022-02-15 05:01:39', 'Kylie', 'Spencer', 'spencer777@gmail.com', 50000.00),
(10, '2022-02-15 05:02:26', 'Neha', 'Luther', 'luther@gmail.com', 50000.00),
(11, '2022-02-15 05:03:06', 'Ajay', 'Reacher', 'reacher@gmail.com', 1000.00),
(12, '2022-02-15 05:03:46', 'Hannah', 'Jay', 'jay3000@gmail.com', 20.00),
(13, '2022-02-15 05:15:30', 'Tina', 'Jay', 'jay3000@gmail.com', 155.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `accno` bigint(10) NOT NULL,
  `current_balance` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `accno`, `current_balance`) VALUES
(1, 'Tina', 'tina669@gmail.com', 9999999999, 7774449996, 803414.00),
(2, 'Ajay', 'ajay100@gmail.com', 7777777777, 6776663331, 294500.00),
(3, 'Jay', 'jay3000@gmail.com', 8989898989, 9999988888, 3986606.00),
(4, 'Neha', 'nah11@gmail.com', 4585253612, 8888984444, 3958008.00),
(5, 'Hannah', 'hann55@gmail.com', 7458523695, 9526486230, 65500.00),
(6, 'Kylie', 'kylie@gmail.com', 1523649352, 7025614856, 665562.00),
(7, 'Reacher', 'reacher@gmail.com', 3333666644, 8025984635, 75144.00),
(8, 'Spencer', 'spencer777@gmail.com', 1111222255, 9486251302, 4036431.00),
(9, 'Luther', 'luther@gmail.com', 4774444321, 9541259637, 99400.00),
(10, 'Hank', 'hank@gmail.com', 1514785632, 9620314777, 4101098.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
