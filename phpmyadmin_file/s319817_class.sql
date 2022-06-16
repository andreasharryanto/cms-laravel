-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2022 at 09:58 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s319817_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `navBarText` varchar(100) NOT NULL,
  `navBarDisplay` varchar(1) NOT NULL DEFAULT 'n',
  `navBarOrder` int(3) NOT NULL,
  `content` text NOT NULL,
  `includes` varchar(255) NOT NULL,
  `dtg` int(16) NOT NULL,
  `priv` int(1) NOT NULL DEFAULT 0,
  `active` varchar(1) NOT NULL DEFAULT 'n'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `h1`, `link`, `navBarText`, `navBarDisplay`, `navBarOrder`, `content`, `includes`, `dtg`, `priv`, `active`) VALUES
(424, 'About Us', 'About us', 'aboutus', 'About us', 'y', 1, 'About Us, Dave was here', '0', 1639611923, 1, 'y'),
(410, 'Services', 'Services Page', 'services.php', 'Services', 'y', 1, 'This is Services Page', 'file', 0, 0, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `priv` int(1) NOT NULL DEFAULT 0,
  `active` varchar(1) NOT NULL DEFAULT 'n',
  `avatar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pw`, `fname`, `sname`, `priv`, `active`, `avatar`) VALUES
(60, 'abc@gmail.com', '$2y$10$tuEp/mLLHuOzutkf.MBmWup8PWh3hxI2Um1JbpwwwwNPxVx5to63q', 'abc', 'def', 3, 'n', 'logo_abc@gmail.com.png'),
(74, 's319817@students.cdu.edu.au', '$2y$10$D.mFlCalqfcwII2SnVewjO3aLqx4r95s6.7WcTo4DbhAK0iedptUO', 'Mike', 'A', 3, 'y', 'istockphoto-1300845620-612x612_s319817@students.cdu.edu.au.jpg'),
(73, 'kimuser@gmail.com', '$2y$10$K.zcdC9ZV6bvKMkubzGwPePwVluiOpM9N9mKhdgULNQ3vG9c89Q7y', 'Kimmy', 'Mar', 1, 'y', 'EncoN47XMAAhEP2_kimuser@gmail.com.jpg'),
(6, 'a', '6f9b0a55df8ac28564cb9f63a10be8af6ab3f7c2', 'a', 'a', 1, 'y', ''),
(22, 'g', '48e1a46fea43b7d6e21fcd2ac996415053dbb3b2', 'g', 'g', 1, 'y', ''),
(76, 'sandeep@gmail.com', '$2y$10$Gz.pKpYAxn3HgAVQ2F5lD.K4bcUMCJgLkAXnzAToAln/mRFRO5jf6', 'sandeep', 'rasali', 3, 'y', 'istockphoto-1300845620-612x612_sandeep@gmail.com.jpg'),
(70, 'david.auld@cdu.edu.au', '$2y$10$S3wZcYyhU48wjRUUY9oEzu.Y7mHt42ZuDWZm/J1HpaDVnS42Q8wd6', 'David', 'Auld', 3, 'y', '245782125_23848982929920561_7994128167814372159_n.png_david.auld@cdu.edu.au.jpg'),
(75, 'ken.abc@gmail.com', '$2y$10$ECQRyfy4TnhqEZkKLbY7g.qnaMtb2.leT2K4ZBHbS8aa1DrC9h0FW', 'Kenzie', 'C', 2, 'y', 'istockphoto-1300845620-612x612_ken.abc@gmail.com.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
