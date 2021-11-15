-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 06:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cen4010_fa21_g06`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `follower_id`, `following_id`, `time`) VALUES
(15, 40, 2, '2021-04-19 18:30:06'),
(16, 33, 2, '2021-04-19 18:30:56'),
(41, 37, 2, '2021-04-20 20:19:49'),
(43, 5, 2, '2021-04-20 20:20:32'),
(44, 27, 2, '2021-04-20 20:21:18'),
(45, 34, 2, '2021-04-20 20:22:07'),
(90, 41, 2, '2021-04-25 18:20:22'),
(94, 25, 27, '2021-04-27 07:07:27'),
(98, 42, 2, '2021-04-29 06:30:41'),
(99, 43, 2, '2021-04-29 06:32:50'),
(100, 44, 2, '2021-04-29 18:17:25'),
(101, 2, 25, '2021-04-30 02:16:24'),
(102, 25, 2, '2021-04-30 22:56:21'),
(120, 54, 2, '2021-05-01 06:57:13'),
(121, 55, 2, '2021-05-12 16:18:45'),
(126, 56, 2, '2021-05-12 16:35:31'),
(128, 57, 2, '2021-05-12 18:23:30'),
(129, 58, 2, '2021-05-13 14:52:58'),
(136, 59, 2, '2021-11-09 21:44:30'),
(137, 59, 42, '2021-11-09 22:28:31'),
(138, 60, 2, '2021-11-10 01:42:38'),
(153, 60, 5, '2021-11-12 05:44:20'),
(154, 61, 2, '2021-11-14 02:57:11'),
(163, 59, 60, '2021-11-13 22:28:23'),
(164, 62, 2, '2021-11-14 00:14:30'),
(165, 63, 2, '2021-11-14 00:19:29'),
(166, 64, 2, '2021-11-14 23:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(192, 2, 362),
(209, 25, 573),
(211, 2, 573),
(214, 2, 574),
(224, 25, 635),
(225, 25, 712),
(227, 2, 711),
(299, 60, 746),
(306, 61, 797),
(320, 59, 824),
(321, 59, 825),
(324, 59, 794),
(325, 59, 797),
(326, 59, 826),
(327, 59, 827),
(328, 59, 830),
(332, 62, 712);

-- --------------------------------------------------------

--
-- Table structure for table `postdata`
--

CREATE TABLE `postdata` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `postdata`
--

INSERT INTO `postdata` (`id`, `user_id`, `post_on`) VALUES
(362, 2, '2021-02-06 08:31:07'),
(573, 2, '2021-04-02 03:03:39'),
(574, 2, '2021-04-02 03:04:53'),
(635, 2, '2021-04-15 09:03:32'),
(654, 2, '2021-04-25 02:19:45'),
(711, 25, '2021-04-29 18:29:24'),
(712, 2, '2021-04-29 18:29:55'),
(726, 59, '2021-11-09 22:45:18'),
(727, 59, '2021-11-09 22:47:52'),
(728, 59, '2021-11-09 22:48:21'),
(729, 60, '2021-11-10 04:00:55'),
(730, 60, '2021-11-10 05:15:12'),
(732, 60, '2021-11-10 07:20:50'),
(733, 60, '2021-11-10 07:36:37'),
(734, 60, '2021-11-10 07:41:47'),
(735, 60, '2021-11-10 07:51:03'),
(736, 60, '2021-11-11 22:19:00'),
(737, 60, '2021-11-11 22:20:58'),
(738, 60, '2021-11-11 22:40:03'),
(739, 60, '2021-11-11 22:40:16'),
(740, 60, '2021-11-11 22:55:40'),
(741, 60, '2021-11-12 03:28:16'),
(742, 60, '2021-11-12 03:31:20'),
(743, 60, '2021-11-12 03:34:11'),
(744, 60, '2021-11-12 04:17:02'),
(745, 60, '2021-11-12 04:17:10'),
(746, 60, '2021-11-12 04:39:21'),
(747, 60, '2021-11-12 06:20:14'),
(748, 60, '2021-11-12 07:38:11'),
(749, 59, '2021-11-12 07:38:50'),
(750, 60, '2021-11-12 07:51:50'),
(751, 60, '2021-11-12 07:53:35'),
(752, 60, '2021-11-12 07:53:43'),
(753, 60, '2021-11-12 07:54:58'),
(754, 60, '2021-11-12 07:57:00'),
(755, 60, '2021-11-12 07:57:22'),
(756, 60, '2021-11-12 08:00:09'),
(757, 60, '2021-11-12 08:00:31'),
(758, 60, '2021-11-12 08:00:56'),
(759, 60, '2021-11-12 08:01:17'),
(760, 60, '2021-11-12 08:01:33'),
(761, 60, '2021-11-12 08:02:24'),
(762, 60, '2021-11-12 08:02:40'),
(763, 60, '2021-11-12 08:02:51'),
(764, 60, '2021-11-12 08:02:58'),
(765, 60, '2021-11-12 08:03:35'),
(766, 60, '2021-11-12 08:04:08'),
(767, 60, '2021-11-12 08:04:25'),
(768, 60, '2021-11-12 08:05:43'),
(769, 60, '2021-11-13 22:33:28'),
(770, 60, '2021-11-13 22:36:56'),
(771, 60, '2021-11-13 22:40:31'),
(772, 60, '2021-11-13 23:04:23'),
(773, 60, '2021-11-13 23:04:45'),
(774, 60, '2021-11-13 23:05:30'),
(775, 60, '2021-11-13 23:05:58'),
(776, 60, '2021-11-13 23:06:19'),
(777, 60, '2021-11-13 23:06:59'),
(778, 60, '2021-11-13 23:07:22'),
(779, 60, '2021-11-13 23:09:44'),
(780, 60, '2021-11-13 23:10:30'),
(781, 60, '2021-11-13 23:10:51'),
(782, 60, '2021-11-13 23:10:59'),
(783, 60, '2021-11-13 23:14:28'),
(784, 60, '2021-11-13 23:24:40'),
(785, 60, '2021-11-13 23:27:04'),
(786, 60, '2021-11-13 23:27:42'),
(787, 60, '2021-11-13 23:28:14'),
(788, 60, '2021-11-13 23:28:30'),
(789, 60, '2021-11-13 23:28:41'),
(790, 60, '2021-11-13 23:29:51'),
(791, 60, '2021-11-13 23:30:01'),
(792, 60, '2021-11-13 23:30:32'),
(793, 60, '2021-11-13 23:31:58'),
(794, 60, '2021-11-13 23:32:18'),
(795, 60, '2021-11-13 16:34:43'),
(796, 60, '2021-11-13 16:34:59'),
(797, 60, '2021-11-13 23:35:15'),
(798, 60, '2021-11-13 16:41:46'),
(799, 60, '2021-11-13 16:44:33'),
(800, 60, '2021-11-13 16:44:48'),
(801, 60, '2021-11-13 16:47:09'),
(802, 60, '2021-11-13 17:34:53'),
(803, 60, '2021-11-13 17:35:12'),
(804, 60, '2021-11-13 19:21:50'),
(805, 61, '2021-11-13 19:57:56'),
(806, 61, '2021-11-13 19:58:01'),
(807, 61, '2021-11-13 20:54:45'),
(808, 61, '2021-11-13 20:55:08'),
(809, 61, '2021-11-13 20:55:15'),
(810, 61, '2021-11-13 20:56:06'),
(811, 61, '2021-11-13 21:00:09'),
(812, 61, '2021-11-13 21:04:47'),
(813, 61, '2021-11-13 21:05:11'),
(814, 61, '2021-11-13 21:06:13'),
(815, 61, '2021-11-13 21:14:44'),
(816, 61, '2021-11-13 21:14:50'),
(817, 61, '2021-11-13 21:20:05'),
(818, 61, '2021-11-13 21:26:27'),
(819, 61, '2021-11-13 21:26:45'),
(820, 59, '2021-11-13 21:30:33'),
(821, 59, '2021-11-13 21:45:45'),
(822, 59, '2021-11-13 21:45:52'),
(823, 59, '2021-11-13 22:01:08'),
(824, 59, '2021-11-13 22:14:18'),
(825, 59, '2021-11-13 22:23:41'),
(826, 59, '2021-11-13 22:27:11'),
(827, 59, '2021-11-13 23:06:06'),
(828, 59, '2021-11-13 23:06:13'),
(829, 59, '2021-11-13 23:36:48'),
(830, 59, '2021-11-13 23:36:56'),
(831, 59, '2021-11-13 23:46:34'),
(832, 59, '2021-11-14 00:13:33'),
(833, 59, '2021-11-14 00:14:06'),
(834, 62, '2021-11-14 00:16:54'),
(835, 59, '2021-11-15 00:20:37'),
(836, 59, '2021-11-15 00:20:43'),
(837, 59, '2021-11-15 00:23:12'),
(838, 59, '2021-11-15 00:23:18'),
(839, 59, '2021-11-15 00:40:00'),
(840, 59, '2021-11-15 00:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `status` varchar(140) COLLATE utf16_unicode_ci DEFAULT NULL,
  `img` text COLLATE utf16_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `status`, `img`) VALUES
(362, '@amin hello it\'s amin here!', NULL),
(573, 'one day!', 'tweet-60666d6b426a1.jpg'),
(574, '#php is fun', NULL),
(635, '', 'tweet-6077e54477f73.jpeg'),
(654, 'it\'s all about big dreams!', NULL),
(726, 'fsdfs', NULL),
(727, 'edsf', NULL),
(728, 'gfdsgsd', NULL),
(729, 'blabla', NULL),
(730, 'testest', NULL),
(732, 'asdhsa bh', NULL),
(733, '', 'tweet-618b5a65eaaab.jpg'),
(734, '', 'tweet-618b5b9b0a7b7.jpg'),
(735, 'testest', NULL),
(736, 'trst', NULL),
(737, 'test2', NULL),
(738, 'test', NULL),
(739, 'test', 'tweet-618d7fb0c0ed6.jpg'),
(740, 'fesr', NULL),
(741, '#sdad', NULL),
(742, 'rersr', NULL),
(743, 'dfsfdsfs', NULL),
(744, 'resr', NULL),
(745, 'ersr', 'tweet-618dcea621a0f.jpg'),
(746, 'rewrewrwrw', 'tweet-618dd3d99157d.jpg'),
(747, 'fdegfefefed', NULL),
(748, 'fsdfsfs', NULL),
(749, 'ersers', NULL),
(750, 'rewrewrw', 'tweet-618e00f6330d7.jpg'),
(751, 'sadasdasd', 'tweet-618e015facbe7.jpg'),
(752, 'test123', NULL),
(753, 'sdfs', NULL),
(754, 'resas', NULL),
(755, 'fdsfsf', NULL),
(756, 'sada', NULL),
(757, 'sadasa', NULL),
(758, 'sadasa', NULL),
(759, 'dads', NULL),
(760, 'dadssada', NULL),
(761, 'dadssadaasd', NULL),
(762, 'dadssadaasd', NULL),
(763, 'dadssadaasd', NULL),
(764, 'asdas', NULL),
(765, 'sadad', NULL),
(766, 'asdsa', NULL),
(767, 'sda', NULL),
(768, 'sda', NULL),
(769, 'sda', NULL),
(770, 'sda', NULL),
(771, 'dfs', NULL),
(772, 'dfsfs', NULL),
(773, 'sdada', NULL),
(774, 'dsfsdf', NULL),
(775, 'dsfsf', NULL),
(776, 'fssdfs', NULL),
(777, 'dsfsd', NULL),
(778, 'dssa', NULL),
(779, 'test12341', NULL),
(780, 'q414134', NULL),
(781, 'dsfdsf', NULL),
(782, 'asdfasda', NULL),
(783, 'sdcs', 'tweet-61902ab432f5b.jpg'),
(784, NULL, NULL),
(785, NULL, NULL),
(786, NULL, NULL),
(787, 'asdsa', NULL),
(788, '', 'tweet-61902dfe4d86f.jpg'),
(789, 'sadsadsadas', 'tweet-61902e09e3f4e.jpg'),
(790, 'Post', NULL),
(791, 'Post', NULL),
(792, 'sada', NULL),
(793, 'dsfdasa', NULL),
(794, 'asdasd', NULL),
(795, 'dsadasd', NULL),
(796, 'this is a test', NULL),
(797, 'tthis is a test', NULL),
(798, 'sad', NULL),
(799, 'test', NULL),
(800, 'poster1', NULL),
(801, 'eretstr', NULL),
(802, 'post test 1', NULL),
(803, 'post test 1', 'tweet-61903da073dcd.jpg'),
(804, 'post test 56', NULL),
(805, 'testest', NULL),
(806, '', 'tweet-61905f1997f97.jpg'),
(807, 'test1', NULL),
(808, 'test2', 'tweet-61906c7cb3d52.jpg'),
(809, 'test', 'tweet-61906c83ec034.jpg'),
(810, 'fsefs', NULL),
(811, 'qwerty', NULL),
(812, 'rwerw', NULL),
(813, '', 'tweet-61906ed7b984b.jpg'),
(814, '', 'tweet-61906f1592ac2.jpg'),
(815, 'testest', NULL),
(816, 'srtrsefs', 'tweet-6190711a7e65a.jpg'),
(817, 'rewrwr', NULL),
(818, 'fsdfsd', NULL),
(819, '', 'tweet-619073e54b516.jpg'),
(820, 'efsfs', NULL),
(821, 'esfesfwf', NULL),
(822, '', 'tweet-619078602826e.jpg'),
(823, 'dsfdsfasf', NULL),
(824, '', 'tweet-61907f0a36631.png'),
(825, '', 'tweet-6190813d83502.jpg'),
(826, 'dsfasf', NULL),
(827, 'gtvyt', NULL),
(828, '', 'tweet-61908b350182f.jpg'),
(829, 'fsdfsf', 'post-6190926086182.jpg'),
(830, '', 'post-619092680e226.jpg'),
(831, '', 'post-619094aa0297e.png'),
(832, 'rersfsr', NULL),
(833, '', 'post-61909b1e2d1e6.jpg'),
(834, '#test', NULL),
(835, 'fdsfds', NULL),
(836, '', 'post-6191ee2b3d277.jpg'),
(837, 'esewsfw', NULL),
(838, 'resf', 'post-6191eec60977b.jpg'),
(839, 'dsfdsf', NULL),
(840, 'dfdsaf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf16_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf16_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf16_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `imgCover` varchar(255) COLLATE utf16_unicode_ci NOT NULL DEFAULT 'cover.png',
  `bio` varchar(140) COLLATE utf16_unicode_ci NOT NULL DEFAULT '',
  `location` varchar(255) COLLATE utf16_unicode_ci NOT NULL DEFAULT '',
  `website` varchar(255) COLLATE utf16_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `img`, `imgCover`, `bio`, `location`, `website`) VALUES
(2, 'amin', 'amin@twitter.com', '8e4e9b7ac6fc0df9e06f57f1c366cf8a', 'Amin.', 'user-608b4b4187b5c.JPG', 'user-607ef530bdeab.jpg', 'Undergraduate Software Engineer.', 'Alexandria,Egypt', 'https://github.com/aminyasser'),
(5, 'bodatolba', 'tolba@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tolba', 'default.jpg', 'cover.png', '', '', ''),
(25, '7oda', '7oda@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', '7oda', 'default.jpg', 'cover.png', '', '', ''),
(27, 'hasona', 'hasona@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'hassan', 'default.jpg', 'cover.png', '', '', ''),
(33, '7odawael', 'wael@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'Mahmoud', 'default.jpg', 'cover.png', '', '', ''),
(34, 'haidy', 'haidy@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'haidy', 'default.jpg', 'cover.png', '', '', ''),
(37, 'aminn', 'amin1@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'Amin Yasser', 'default.jpg', 'cover.png', '', '', ''),
(40, 'mohanadyasser', 'mohanad@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'Mohanad', 'default.jpg', 'cover.png', '', '', ''),
(41, 'khaled0', 'khaled@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'Khalid', 'default.jpg', 'cover.png', '', '', ''),
(42, 'ahmed0', 'ahmed@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'Ahmed', 'default.jpg', 'user-609be2968c0b9.png', '', '', ''),
(43, 'samy', 'samy@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'Samy', 'default.jpg', 'cover.png', '', '', ''),
(44, 'remo', 'remo@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'Ramez', 'default.jpg', 'cover.png', '', '', ''),
(54, 'aminyasser', 'amino@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'Amin Yasser', 'default.jpg', 'cover.png', '', '', ''),
(55, 'sasaa', 'aminsss@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'Amin Yasser', 'user-609be3deec8e5.jpg', 'cover.png', '', '', ''),
(56, 'nbnbkj', 'nn@twittt.com', 'e10adc3949ba59abbe56e057f20f883e', 'Markting', 'default.jpg', 'cover.png', '', '', ''),
(57, 'sas', 'amin@ydar.com', 'e10adc3949ba59abbe56e057f20f883e', 'Amin Yasser', 'default.jpg', 'cover.png', '', '', ''),
(58, '201', 'amin111@twitter.com', 'e10adc3949ba59abbe56e057f20f883e', 'Amin1', 'default.jpg', 'cover.png', 'Hey', '', ''),
(59, 'test', 'test@gmail.com', 'f5d1278e8109edd94e1e4197e04873b9', 'test342dsa', 'user-6191f2c33bd5d.jpg', 'cover.png', 'saaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasaaaaaaaaaaaaaa', 'af', 'sfd'),
(60, 'test2', 'test2@gmail.com', '2e9fcf8e3df4d415c96bcf288d5ca4ba', 'test2', 'user-6190482ae6c61.png', 'user-618de31d90cf1.', 'this is a bio test 2', '', ''),
(61, 'test32', 'test3@gmail.com', '76b89697edc9a8af68b34b65abf5f731', 'test332', 'user-619073dec696a.png', 'user-6190688ff0ccb.', 'hsdbgfhjewncxzcs', '', ''),
(62, 'test4', 'test4@gmail.com', '86985e105f79b95d6bc918fb45ec7727', 'test4', 'default.jpg', 'cover.png', '', '', ''),
(63, 'test5', 'test5@gmail.com', 'e3d704f3542b44a621ebed70dc0efe13', 'test5', 'default.jpg', 'cover.png', '', '', ''),
(64, 'test6', 'test6@gmail.com', '79053bc1647369450dbe6787bd74afa7', 'test6', 'default.jpg', 'cover.png', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follower_id` (`follower_id`),
  ADD KEY `following_id` (`following_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `likes_ibfk_2` (`post_id`);

--
-- Indexes for table `postdata`
--
ALTER TABLE `postdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT for table `postdata`
--
ALTER TABLE `postdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=841;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`following_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `postdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `postdata`
--
ALTER TABLE `postdata`
  ADD CONSTRAINT `postdata_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `postdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
