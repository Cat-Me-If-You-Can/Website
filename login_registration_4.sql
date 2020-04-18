-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 03:20 PM
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

--
-- Dumping data for table `likestable`
--

INSERT INTO `likestable` (`id`, `cat1`, `cat2`, `likes`) VALUES
(76, 10, 7, 'yes'),
(77, 10, 4, 'yes'),
(78, 10, 11, 'yes'),
(79, 7, 10, 'yes'),
(80, 7, 11, 'yes');

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

--
-- Dumping data for table `matchestable`
--

INSERT INTO `matchestable` (`id`, `likeID1`, `likeID2`, `matched`) VALUES
(11, 7, 10, 'yes');

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
(4, 0x534f54472057454253495445204c4f474f2e706e67, 'dog', 'Male', 24, 70, 31, 63, 63, 'food', 'dogs', 'vietnam', 10),
(5, 0x3138303078313230305f636174735f616e645f6578636573736976655f6d656f77696e675f7265665f67756964652e6a7067, 'mew mew III', 'Male', 89, 45, 12, 67, 12, 'Sleeping', 'Walks', 'Sydney', 12),
(6, 0x747369636f6e732e636f6d2d596173616f2e706e67, 'cat1', 'Male', 34, 12, 61, 85, 55, 'Sleeping', 'Walks', 'Darwin', 13),
(7, 0x494d475f303030392e4a5047, 'notacat', 'Male', 24, 62, 38, 50, 22, 'food', 'Walks', 'st andrews', 14),
(10, 0x44534330353739302e4a5047, 'jack', 'Male', 20, 74, 30, 57, 36, 'food', 'dogs', 'kinglake', 16),
(11, 0x494d475f343738342e4a5047, 'cat123', 'Male', 18, 38, 32, 60, 42, 'food', 'cats', '123', 15);

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
(1, 'patrick', '617ff25363a32730686c66341ad3b1cdf1927c12a04dc9d13220408b1a47aef1', 'kˆèn¬óê@/çÎzb•Z%Áp÷¬<ÅN.úÑ™', 0),
(2, 'test', '0067e783c4e6518e06db3f74939b66ffef2ede0e5e5c30fd36559666c2f10a0b', '.êŸ&ÈÉºô¤Þcºtd]‘jUÕTæ3E«•f', 0),
(3, 'sam', 'a48423e932268ca856dc73cc115ba4658468a30e21845b4e900c32f2df0af329', '$O.v‰æ[z>0/Èl.ç¡4Ö›„é~µþ[aë·¸', 0),
(4, 'hello', '61f701b2e7129ba53af1c08da618234395e2364bed8b13d43f7ec240c0a4d97a', 'bØ±æ¤¸ýÏCöÁãÕŒYs&\r3T	ychPv¤', 0),
(5, 'dad', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(6, 'check', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(7, 'user1', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(8, 'dog', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(9, 'cat', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(10, 'patrickcat', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(11, '1', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(12, 'patrick!', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(13, 'patrickcatdemo', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(14, 'catmatch', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(15, '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0),
(16, 'cattest', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `matchestable`
--
ALTER TABLE `matchestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
