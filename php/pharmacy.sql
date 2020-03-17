-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 06:09 AM
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
  `batch_no` int(5) NOT NULL,
  `purchase_id` int(5) NOT NULL,
  `drug_id` varchar(10) NOT NULL,
  `drug_name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `no_of_boxes` int(11) NOT NULL,
  `quantity_box` int(11) NOT NULL,
  `ex_date` date NOT NULL,
  `available_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_no`, `purchase_id`, `drug_id`, `drug_name`, `brand`, `no_of_boxes`, `quantity_box`, `ex_date`, `available_quantity`) VALUES
(3, 2, '1002', 'Panadol 35mg', 'Alkem', 10, 23, '2019-10-17', 100),
(4, 3, '1003', 'paracitamol', 'Alkem', 10, 10, '2019-10-17', 80),
(5, 4, '1003', 'paracitamol', 'Alkem', 125, 10, '2019-10-15', 840),
(6, 1, '1001', 'panadol', 'Alkem', 12, 21, '2020-10-15', 90),
(10, 7, '1003', 'paracitamol', 'abc', 10, 10, '2021-11-19', 100),
(12, 1, '1001', 'panadol', 'zxc', 12, 12, '2020-03-04', 144),
(13, 1, '1001', 'panadol', 'zxc', 12, 12, '2020-03-02', 144);

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_id` varchar(10) NOT NULL,
  `drug_name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `supplier_id` int(5) NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_id`, `drug_name`, `brand`, `category`, `supplier_id`, `reorder_level`, `price`) VALUES
('1001', 'panadol', 'Alkem', 'Pain killer', 9, 100, 13),
('1002', 'Panadol 35mg', 'Alkem', 'Pain killer', 9, 100, 10),
('1003', 'paracitamol', 'alkem', 'pain killer', 7, 100, 12);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(10) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(10) NOT NULL,
  `log_in` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `f_name`, `l_name`, `u_name`, `email`, `telephone`, `nic`, `password`, `type`, `log_in`) VALUES
(1, 'Udara', 'madumalka', 'admin', 'madu12dara@gmail.com', 773527433, '962100686v', '1234', 4, ''),
(2, 'Udara', 'Madumalka', 'owner', 'madu12dara@gmail.com', 773, '962100686v', '1234', 1, ''),
(3, 'udara', 'madumalka', 'pharmacist', 'madu12dara@gmail.com', 773527343, '962100686v', '1234', 2, ''),
(4, 'udara', 'madumlka', 'storekeeper', 'madu12dara@gmail.com', 773527343, '962100686v', '1234', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `date`, `total`) VALUES
(10, '2019-09-27 18:30:00', 700),
(11, '2019-09-11 18:30:00', 144),
(12, '2019-09-10 18:30:00', 1256),
(13, '2019-10-14 18:30:00', 300),
(14, '2019-10-14 18:30:00', 104),
(15, '2019-10-16 18:30:00', 100),
(16, '2019-10-16 18:30:00', 126),
(17, '2019-10-18 18:30:00', 130),
(18, '2019-10-18 18:30:00', 326),
(19, '2019-10-18 18:30:00', 350),
(20, '2019-10-18 18:30:00', 1070),
(21, '2019-10-18 18:30:00', 250),
(22, '2019-10-18 18:30:00', 120),
(23, '2019-10-18 18:30:00', 480),
(24, '2019-10-18 18:30:00', 250),
(25, '2019-10-18 18:30:00', 320),
(26, '2019-11-19 18:30:00', 250),
(27, '2019-11-12 18:30:00', 130),
(28, '2019-11-12 18:30:00', 130),
(29, '2019-11-12 18:30:00', 130),
(30, '2019-11-13 18:30:00', 120),
(31, '2019-11-13 18:30:00', 130),
(32, '2019-11-14 18:30:00', 1170),
(33, '2019-11-14 18:30:00', 1300),
(34, '2019-11-16 18:30:00', 120),
(35, '2019-11-18 18:30:00', 130);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `invoice_no` int(5) NOT NULL,
  `drug_id` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`invoice_no`, `drug_id`, `qty`) VALUES
(7, '1001', 12),
(8, '1002', 10),
(9, '1001', 12),
(10, '1001', 10),
(11, '1001', 11),
(12, '1002', 10),
(16, '1001', 12),
(17, '1001', 2),
(28, '', 0),
(29, '1001', 20),
(0, '', 0),
(0, '', 0),
(0, '', 0),
(0, '', 0),
(0, '', 0),
(35, '1002', 10),
(36, '1003', 50),
(37, '1003', 12),
(1, '1002', 20),
(2, '1003', 88),
(2, '1001', 12),
(3, '1003', 12),
(4, '1001', 8),
(3, '1002', 10),
(1, '1001', 2),
(2, '1002', 10),
(2, '1001', 10),
(3, '1001', 10),
(4, '1003', 8),
(5, '1002', 10),
(6, '1001', 10),
(7, '1002', 10),
(8, '1003', 10),
(9, '1001', 10),
(10, '1002', 10),
(11, '1003', 70),
(12, '1001', 10),
(13, '1003', 10),
(2, '1003', 10),
(7, '1001', 10),
(8, '1002', 10),
(9, '1003', 10),
(10, '1001', 10),
(11, '1001', 10),
(12, '1003', 10),
(13, '1002', 20),
(14, '1003', 10),
(1, '1003', 10),
(2, '1001', 10),
(1, '1001', 10),
(3, '1001', 10),
(4, '1001', 10),
(24, '1003', 10),
(25, '1001', 10),
(1, '1001', 90),
(2, '1001', 100),
(1, '1003', 10),
(1, '1001', 10);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_temp`
--

CREATE TABLE `invoice_temp` (
  `id` int(5) NOT NULL,
  `drug_id` varchar(10) NOT NULL,
  `drug_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `batch_no` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(5) NOT NULL,
  `supplier_id` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `invoice` varchar(50) NOT NULL,
  `paid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `supplier_id`, `date`, `invoice`, `paid`) VALUES
(1, 1, '2019-09-26 13:03:56', '1000', 1),
(2, 7, '2019-10-02 13:03:05', '1000', 1),
(3, 9, '2019-10-02 13:02:03', '1000', 1),
(4, 1, '2019-10-02 13:05:42', '1200', 1),
(5, 7, '2019-10-19 16:50:21', '1000', 1),
(6, 8, '2019-09-04 03:01:07', '1999', 0),
(7, 1, '2019-09-04 06:32:32', '1000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pur_tem`
--

CREATE TABLE `pur_tem` (
  `purchase_id` int(5) NOT NULL,
  `supplier_id` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `invoice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pur_tem`
--

INSERT INTO `pur_tem` (`purchase_id`, `supplier_id`, `date`, `invoice`) VALUES
(6, 8, '2019-09-04 03:01:07', '1999'),
(7, 1, '2019-09-04 06:32:32', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `drug_id` varchar(10) NOT NULL,
  `drug_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `current_stock` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`drug_id`, `drug_name`, `price`, `current_stock`, `category`) VALUES
('1001', 'panadol', 13, 378, 'Pain killer'),
('1002', 'Panadol 35mg', 10, 100, 'Pain killer'),
('1003', 'paracitamol', 12, 1020, 'pain killer');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(5) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `credit_period_allowed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `location`, `email`, `contact_no`, `credit_period_allowed`) VALUES
(1, 'Alkem', 'colombo', 'madu12dara@gmail.com', 987654321, 2),
(7, 'Emerchi', 'maligawaththta, colombo 10', 'info@emerchimie.lk', 111126921, 3),
(8, 'NB', 'Borella', 'nb@gmail.com', 1111126787, 3),
(9, 'Ceylone limited', 'maligawatta', 'madu12dara@gmail.com', 112838112, 5),
(10, 'Info', 'colombo 10', 'info@gmail.com', 112325211, 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_drugs`
--

CREATE TABLE `supplier_drugs` (
  `supplier_id` int(5) NOT NULL,
  `drug_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tem`
--

CREATE TABLE `tem` (
  `supplier_id` int(5) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `credit_period_allowed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tem`
--

INSERT INTO `tem` (`supplier_id`, `supplier_name`, `location`, `email`, `contact_no`, `credit_period_allowed`) VALUES
(1, 'abc', 'colombo', 'n@gmail.com', 1234567890, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tem2`
--

CREATE TABLE `tem2` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `credit_period_allowed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tem2`
--

INSERT INTO `tem2` (`supplier_id`, `supplier_name`, `location`, `email`, `contact_no`, `credit_period_allowed`) VALUES
(10, 'Info', 'colombo 10', 'info@gmail.com', 112325211, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tem3`
--

CREATE TABLE `tem3` (
  `drug_id` varchar(10) NOT NULL,
  `drug_name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `supplier_id` int(5) NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tem4`
--

CREATE TABLE `tem4` (
  `drug_id` varchar(10) NOT NULL,
  `drug_name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `supplier_id` int(5) NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_chat`
--

CREATE TABLE `users_chat` (
  `msg_id` int(1) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `msg_content` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `mdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `invoice_temp`
--
ALTER TABLE `invoice_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `pur_tem`
--
ALTER TABLE `pur_tem`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supplier_drugs`
--
ALTER TABLE `supplier_drugs`
  ADD PRIMARY KEY (`drug_id`);

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
-- Indexes for table `tem3`
--
ALTER TABLE `tem3`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `tem4`
--
ALTER TABLE `tem4`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `invoice_temp`
--
ALTER TABLE `invoice_temp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tem`
--
ALTER TABLE `tem`
  MODIFY `supplier_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tem2`
--
ALTER TABLE `tem2`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(1) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
