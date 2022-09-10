-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 12:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(10) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `DATE` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `TITLE`, `DESCRIPTION`, `DATE`) VALUES
(1, 'Web Development', 'Web development is the work involved in developing a Web site for the Internet or an intranet. Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services', '0000-00-00'),
(2, 'PHP', 'PHP is a general-purpose scripting language especially suited to web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group', '2021-06-02'),
(3, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions', '2021-06-05'),
(4, 'C', 'C is a general-purpose, procedural computer programming language supporting structured programming, lexical variable scope, and recursion, with a static type system. By design, C provides constructs that map efficiently to typical machine instructions', '0000-00-00'),
(5, 'C++', 'C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\".', '0000-00-00'),
(6, 'HTML', 'The HyperText Markup Language, or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript. ', '2021-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `commenttablle`
--

CREATE TABLE `commenttablle` (
  `commentId` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `userId` int(50) NOT NULL,
  `queryId` int(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commenttablle`
--

INSERT INTO `commenttablle` (`commentId`, `comment`, `userId`, `queryId`, `date`) VALUES
(4, 'Try to learn html->css->javascript->php->mysql->hosting a website.\r\nI personally have followed this path.', 6, 1, '2021-06-22'),
(5, 'php is easily understandable for a beginner.', 6, 1, '2021-06-22'),
(6, 'calloc and malloc both allocate memory dynamically.\r\nThey only differ in syntax.\r\n', 6, 6, '2021-06-22'),
(7, 'nodejs uses javascript so you need to learn one programming language less(php)', 6, 1, '2021-06-22'),
(8, 'html is used for the structuring of web page\r\n', 6, 8, '2021-06-23'),
(12, 'stdio.h is a library in C, which helps us to use printf() and scanf() functions.\r\n#include() is a method to connect the library to our C file.', 14, 11, '2021-06-23'),
(13, 'i too', 12, 1, '2021-06-25'),
(14, 'idk', 12, 8, '2021-06-25'),
(15, 'idk', 12, 12, '2021-06-25'),
(16, 'iko', 12, 5, '2021-06-25'),
(17, 'to manage database\r\n', 12, 2, '2021-06-25'),
(18, 'idk', 12, 13, '2021-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `forumquery`
--

CREATE TABLE `forumquery` (
  `queryId` int(11) NOT NULL,
  `queryTitle` varchar(500) NOT NULL,
  `queryDescription` varchar(500) NOT NULL,
  `userId` int(50) NOT NULL,
  `categoryId` int(50) NOT NULL,
  `timeStamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forumquery`
--

INSERT INTO `forumquery` (`queryId`, `queryTitle`, `queryDescription`, `userId`, `categoryId`, `timeStamp`) VALUES
(1, 'I am facing some problem in the course of web development.', 'I have completed html, css and javascript basic.\r\nSo what should I learn now?\r\nI am confused between nodejs and php.\r\nPlease help me.', 6, 1, '2021-06-21'),
(2, 'What is the use of phpMyAdmin?', 'I am unable to understand the queries of mysql and the need of phpMyAdmin.\r\nNeed urgent support.\r\nPlease help me.', 7, 2, '2021-06-22'),
(3, '\r\nWhat is the full form of php?', 'Please tell me the full form of php.', 7, 2, '2021-06-22'),
(4, 'what is the difference between java and javascript?', 'Do they follow the same syntax?', 6, 3, '2021-06-22'),
(5, 'Is C++ the better version of C programming?', 'Please explain.', 6, 5, '2021-06-22'),
(6, 'what is the difference calloc and malloc?', 'I am facing problem in understanding the difference the calloc and malloc functions stored in stdlib.h library.\r\nIt would be great if someone explains it to me.', 6, 4, '2021-06-22'),
(7, 'Is C a procedural or an object oriented language?', 'Can C be used as an object oriented language?\r\n', 6, 4, '2021-06-22'),
(8, 'what is the use of html in web development?', '', 6, 6, '2021-06-22'),
(9, 'what is javascript?', '', 12, 3, '2021-06-23'),
(11, 'what is the meaning of #include&lt;stdio.h&gt;', '', 19, 4, '2021-06-23'),
(12, 'what is C++?', '', 12, 5, '2021-06-25'),
(13, 'what is html', '', 12, 6, '2021-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `S.NO` int(10) NOT NULL,
  `USERNAME` varchar(500) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `DATE` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`S.NO`, `USERNAME`, `PASSWORD`, `DATE`) VALUES
(6, 'ankit', '$2y$10$q7YgL1IwHE9xTw/qNpv14ubMzA4uKhLXNrSqwE8cAD/Zag03xb/Wq', '2021-06-18'),
(7, 'rickflare', '$2y$10$gP7.5bMZj7wYWxqrVsKADOJtLeLRD3QyoQlm7OIkiHLR/ES2TAq4K', '2021-06-18'),
(8, 'arko39', '$2y$10$vvOLq5kPr9i1DO7zaojGWuOwut2f5VXoJh1eMr1bQ5itEpTOObCDi', '2021-06-18'),
(9, '134', '$2y$10$beKGW8enhduv0e1SiJwY4.Q6lUKkRluBXtib2CoinSJJ10i5Mwj5G', '2021-06-18'),
(10, 'bt20cse053', '$2y$10$EjxoyyR/N8ftqWz42/c.QezOUO/btxDgqHtyfxFErnezMbxVQhHu.', '2021-06-21'),
(11, 'arko45', '$2y$10$W.Trivn3v.fh3jnCxD/TM.bBHCqNarz/0/FwEobZK8OwBrddav71O', '2021-06-21'),
(12, 'new', '$2y$10$TqOG9B4q9BoS5TJTgK3fz.n9QEemvQ2i50W8zZ7JfzVktjzb1ZYPu', '2021-06-22'),
(13, 'arushi', '$2y$10$nxDxy0wMbB/EeMeLpLyHeOkpmXUiXL1kSG4VU2DUnBK2p8kMu4HVi', '2021-06-22'),
(14, 'alpha', '$2y$10$IKaA3Y/VNFNFOM5hNacZ9ehREJLzjRZ8JnvqxXj4e/QhQ4Zi/Up/W', '2021-06-22'),
(15, 'abhi', '$2y$10$YKOaP8Nxh2KNr/HN3PS38.upG5jFerLreJRc5pQYWylgPyXFA7kmS', '2021-06-23'),
(16, 'new2', '$2y$10$LiYJYlKwzkBF9AT3eyS7bOI0m6Kzr1pi2caE5/5wiIlKJKIQJkiyu', '2021-06-23'),
(17, 'aronblaze', '$2y$10$O8pAA24lFAhT1S4fpGFIs.0tUOPtMSFl7Omr3canjckdmQpY8ydOe', '2021-06-23'),
(18, 'o\'brain', '$2y$10$M/CBksRW2W/9zLjRiXn64uO8VyFWZ72/B8Prx4u7tGbOtSkAxUFem', '2021-06-23'),
(19, 'aron', '$2y$10$9azx99WMgbZoClYd8z2/2uHSjwoHV0thaNppzI0DaNlFHwM3CZlwS', '2021-06-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `commenttablle`
--
ALTER TABLE `commenttablle`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `forumquery`
--
ALTER TABLE `forumquery`
  ADD PRIMARY KEY (`queryId`);
ALTER TABLE `forumquery` ADD FULLTEXT KEY `queryTitle` (`queryTitle`,`queryDescription`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`S.NO`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `commenttablle`
--
ALTER TABLE `commenttablle`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `forumquery`
--
ALTER TABLE `forumquery`
  MODIFY `queryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `S.NO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
