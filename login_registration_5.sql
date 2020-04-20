-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 03:52 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `likestable`
--

CREATE TABLE `likestable` (
  `id` int(11) NOT NULL,
  `cat1` int(11) NOT NULL,
  `cat2` int(11) NOT NULL,
  `likes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matchestable`
--

CREATE TABLE `matchestable` (
  `id` int(11) NOT NULL,
  `likeID1` int(11) NOT NULL,
  `likeID2` int(11) NOT NULL,
  `matched` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `picture` blob NOT NULL,
  `name` text NOT NULL,
  `gender` text NOT NULL,
  `playful` int(11) NOT NULL,
  `angry` int(11) NOT NULL,
  `somber` int(11) NOT NULL,
  `independent` int(11) NOT NULL,
  `cuddly` int(11) NOT NULL,
  `likes` text NOT NULL,
  `dislikes` text NOT NULL,
  `location` text NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `picture`, `name`, `gender`, `playful`, `angry`, `somber`, `independent`, `cuddly`, `likes`, `dislikes`, `location`, `userid`) VALUES
(13, 0x636174372e6a7067, 'bobby', 'Male', 15, 24, 31, 36, 19, 'dogs', 'cats', 'melbourne', 18),
(14, 0x636174352e6a7067, 'Sam', 'Male', 29, 37, 34, 52, 28, 'food', 'dogs', 'vietnam', 19),
(15, 0x636174312e6a7067, 'Rust', 'Male', 20, 28, 24, 39, 28, 'food', 'angry', 'Darwin', 20),
(16, 0x636174342e6a7067, 'Tingle', 'Female', 22, 31, 21, 31, 19, 'food', 'dogs', 'melbourne', 21),
(17, 0x636174332e6a7067, 'lightning', 'Male', 20, 29, 25, 38, 28, 'food', 'sand', 'hurstbridge', 22),
(18, 0x636174362e6a7067, 'sting', 'Male', 62, 29, 73, 21, 55, 'pats', 'grass', 'wattleglen', 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `salt` text CHARACTER SET utf8 NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `salt`, `active`) VALUES
(18, 'qwerty', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(19, 'pboy', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(20, 'patrick', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(21, 'smith', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(22, 'jackson', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(23, 'testuser1', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likestable`
--
ALTER TABLE `likestable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat1` (`cat1`);

--
-- Indexes for table `matchestable`
--
ALTER TABLE `matchestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likestable`
--
ALTER TABLE `likestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `matchestable`
--
ALTER TABLE `matchestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likestable`
--
ALTER TABLE `likestable`
  ADD CONSTRAINT `likestable_ibfk_1` FOREIGN KEY (`cat1`) REFERENCES `profile` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
