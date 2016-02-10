-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2015 at 11:50 PM
-- Server version: 5.6.21-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cepedd-itws2110-f15-quiz2`
--

-- --------------------------------------------------------

--
-- Table structure for table `song_list`
--

CREATE TABLE IF NOT EXISTS `song_list` (
  `title` text NOT NULL,
  `artist` text NOT NULL,
  `album` text NOT NULL,
  `release` text NOT NULL,
  `genre` text NOT NULL,
  `website` text NOT NULL,
  `cover` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_auth`
--

CREATE TABLE IF NOT EXISTS `users_auth` (
`uid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_auth`
--

INSERT INTO `users_auth` (`uid`, `username`, `salt`, `pass`, `is_admin`) VALUES
(8, 'user', 'ea5d01c8535dd0ec6bf3b1d9a2d099ac0e1492d66016d8fb7ad4d56cbb585985', 'e9d1122a4ca1e8320d606e6f5b9dab8dbdd7d90d248727f6847c12be75a3573f', 0),
(9, 'reg', 'baf09c824c4197cb585ec4c54b063b6d61dc242a844af712302d92c26b2602c9', 'f760020f9834f75e59154c64e9dd1077d93a5ca9fdbabfea71e47aaed4887f28', 1),
(10, 'quiz', 'a8aaad0b074c4a5dd408c320ff941245dbd281ce792ff2791799b76d9bdca331', 'da7e4e609e45a2ea8df62199081ceaf330f4f004ac73be5f35a0d3d1d6eb4f66', 1),
(11, 'admin', '38e8ad45fb599a9b15376874dcda46e0f10d664362584783bdfe15e03d193579', '7d0a5b35ad58196d8b5c817a357371a8ba1709055d0ff8d508de7cce595c8612', 1),
(12, 'user', 'f58fc1aafb32861b3f0387b541c6c037a3b5cc3079a0a93fdd9299abf0cc0417', '7358e014b0ca9d288c98a2c47f31a884d20f999e70e4e752de0efec184d48323', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_auth`
--
ALTER TABLE `users_auth`
 ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_auth`
--
ALTER TABLE `users_auth`
MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
