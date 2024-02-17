<?php
include 'dbconfig.php';
$sql = "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = '+05:30';

--
-- Database: `feedback`
--
CREATE DATABASE `feedback`;
-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(100) NOT NULL,
  `name` char(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` tinytext NOT NULL,
  `msg` longtext NOT NULL,
  `social` char(50) NOT NULL,
  `ip` tinytext NOT NULL,
  `user` varchar(500) NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT; ";

if (mysqli_query($conn, $sql)) {
    echo "Database Installed successfully <br> <br><h4>Installation Completed</h4> ";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>