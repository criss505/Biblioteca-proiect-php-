-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 09:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bib`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Titlu` varchar(100) NOT NULL,
  `Autor` varchar(100) NOT NULL,
  `Editura` varchar(100) NOT NULL,
  `Anul` int(4) NOT NULL,
  `Pagini` int(4) NOT NULL,
  `ISBN` int(10) NOT NULL,
  `Cod` int(10) NOT NULL,
  `Cantitate` int(3) NOT NULL,
  `Imprumutate` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Titlu`, `Autor`, `Editura`, `Anul`, `Pagini`, `ISBN`, `Cod`, `Cantitate`, `Imprumutate`) VALUES
('info', 'ion', 'edi', 2022, 34, 2345678, 23, 9, 0),
('einfo', 'ron', 'tiri', 2000, 245, 1234567, 45, 2, 0),
('mimi', 'meme', 'mama', 2019, 51, 3456, 112, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE `confirm` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `First name` varchar(100) NOT NULL,
  `Last name` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Student ID` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`First name`, `Last name`, `Username`, `Password`, `Student ID`, `Email`, `Phone`) VALUES
('popescu', 'alex', 'alex1', 'test', 1032021, 'alex@gmail.com', 0),
('ami', 'ami', 'ami', 'ami', 12020, 'ami@gmail.com', 876),
('ami', 'ami', 'ami1', 'ami', 12020, 'ami@gmail.com', 876),
('Mere', 'Ana', 'anaare', 'mere', 2222020, 'ana.are@mere.ro', 722446688),
('ana', 'anana', 'anana', 'ana', 22020, 'anana@gmail.com', 987654321),
('eliza', 'pop', 'eliza', 'pop', 1112022, 'eliza@gmail.com', 987654321);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `First name` varchar(100) NOT NULL,
  `Last name` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`First name`, `Last name`, `Username`, `Password`, `Phone`, `Email`, `Subject`) VALUES
('popa', 'maria', 'mariap', 'profesor', 123456, 'maria.popa@prof.unibuc.ro', 'statistica');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `Username` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
