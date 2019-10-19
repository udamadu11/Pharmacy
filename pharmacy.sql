-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2019 at 04:49 PM
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
  `supplier_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `broughtin`
--

CREATE TABLE `broughtin` (
  `invoice_no` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `supplier_id` varchar(11) NOT NULL,
  `invoice_value` int(10) NOT NULL,
  `credit_period` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('011', 'Paracitamol', 'Pain killer', 100, '1', 100, 'Alkem');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` varchar(4) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tp` int(10) NOT NULL,
  `nic` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `f_name`, `l_name`, `u_name`, `email`, `tp`, `nic`, `password`, `type`) VALUES
('1', 'udara', 'madumalka', 'Trojan', 'madu12dara@gmail.com', 773527343, '962100686v', '1234', 1),
('2', 'udara', 'madumalka', 'Gridian', 'madu12dara@gmail.com', 773527343, '962100686v', '1234', 2),
('3', 'udara', 'madumalka', 'Warlock', 'madu12dara@gmail.com', 773527343, '962100686v', '1234', 3),
('4', 'udara', 'madumalka', 'Admin', 'madu12dara@gmail.com', 773527343, '962100686v', '1234', 4);

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
  `credit_period_allowed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `location`, `email`, `contact_no`, `credit_period_allowed`) VALUES
('1', 'Emerchie NB', 'Colombo 10', 'info@emerchie.lk', 112675005, '2019-05-29 23:30:00'),
('2', 'Emerchie', 'Maligawaththa', 'au@gmail.com', 112675004, '2020-01-31 18:30:00');

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
