-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2019 at 12:54 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_no` varchar(10) NOT NULL,
  `drug_name` varchar(50) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `quantity_box` int(4) NOT NULL,
  `no_of_boxes` int(4) NOT NULL,
  `manu_date` date NOT NULL,
  `ex_date` date NOT NULL,
  `sales_value` int(4) NOT NULL,
  `supplier_id` varchar(11) NOT NULL,
  `available_quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_no`, `drug_name`, `brand`, `quantity_box`, `no_of_boxes`, `manu_date`, `ex_date`, `sales_value`, `supplier_id`, `available_quantity`) VALUES
('', 'ds', 'ds', 12, 12, '2019-09-10', '2019-09-30', 12, '1', 0),
('2', 'Paracitamol', 'Alkem', 10, 10, '2019-06-22', '2019-07-24', 100, '001', 0),
('4', 'asd', 'ad', 12, 12, '2019-09-02', '2019-09-21', 12, '1', 0),
('5', 'Panadol 35mg', 'Alkem', 10, 10, '2019-08-10', '2020-11-11', 10, '1', 100),
('6', '66', 'ere', 12, 12, '2019-09-04', '2019-09-21', 12, '2', 0),
('8', 'Paracitamol 35mg', 'Alkem', 10, 100, '2019-09-10', '2020-09-10', 12, '1', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `broughtin`
--

CREATE TABLE `broughtin` (
  `invoice_no` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `supplier_id` varchar(11) NOT NULL,
  `invoice_value` int(10) NOT NULL,
  `credit_period` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `broughtin`
--

INSERT INTO `broughtin` (`invoice_no`, `date`, `supplier_id`, `invoice_value`, `credit_period`) VALUES
('13', '2019-09-07', '1', 1234, '2019-09-30'),
('14', '2019-09-07', '1', 24141, '2019-09-30'),
('15', '2019-09-07', '1', 1234, '2019-09-30'),
('17', '2019-09-07', '1', 1111, '2019-09-30'),
('18', '2019-09-01', '1', 111111, '2019-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_id` varchar(10) NOT NULL,
  `drug_name` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `reorder_level` int(20) NOT NULL,
  `supplier_id` varchar(11) NOT NULL,
  `price` int(10) NOT NULL,
  `brand` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_id`, `drug_name`, `category`, `reorder_level`, `supplier_id`, `price`, `brand`) VALUES
('010', 'panadol', 'Pain killer', 100, '1', 100, 'Alkem'),
('012', 'Panadol 35mg', 'Pain killer', 100, '1', 100, 'Alkem'),
('013', 'Paracitamol 35mg', 'Pain killer', 100, '2', 100, 'Alkem');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(4) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(10) NOT NULL,
  `nic` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `f_name`, `l_name`, `u_name`, `email`, `telephone`, `nic`, `password`, `type`) VALUES
(1, 'udara', 'madumalka', 'Admin', 'admin@gmail.com', 773527343, '962100686v', '1234', 4),
(8, 'udara', 'madumlka', 'Warlock', 'warlock@gmail.com', 772527343, '23890239v', '1234', 3),
(9, 'udara', 'madumlka', 'Gridian', 'gri@gmail.com', 527389, '23456789v', '1234', 2),
(10, 'udara', 'madumlka', 'Trojan', '123@gmail.com', 748923, '93508534v', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `order_no` varchar(10) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `quantity` int(4) NOT NULL,
  `date` date NOT NULL,
  `supplier_id` varchar(11) NOT NULL,
  `value` int(4) NOT NULL,
  `drug_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` varchar(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `credit_period_allowed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `location`, `email`, `contact_no`, `credit_period_allowed`) VALUES
('1', 'Emerchie NB', 'Colombo 10', 'udaramadumalka3@gmail.com', 112675005, '2019-09-05'),
('12', 'rt', 'vr', 'madu12dara@gmail.com', 12445677, '2000-01-01'),
('2', 'Emerchie', 'Maligawaththa', 'au@gmail.com', 112675004, '2020-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `tem`
--

CREATE TABLE `tem` (
  `supplier_id` varchar(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `credit_period_allowed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verify` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tem`
--

INSERT INTO `tem` (`supplier_id`, `supplier_name`, `location`, `email`, `contact_no`, `credit_period_allowed`, `verify`) VALUES
('a', 'aaa', 'aaa', 'madu12dara@gmail.com', 1123232, '1999-12-31 18:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tem2`
--

CREATE TABLE `tem2` (
  `supplier_id` varchar(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `credit_period_allowed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_no`);

--
-- Indexes for table `broughtin`
--
ALTER TABLE `broughtin`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`drug_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tem`
--
ALTER TABLE `tem`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tem2`
--
ALTER TABLE `tem2`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drug`
--
ALTER TABLE `drug`
  ADD CONSTRAINT `drug_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
