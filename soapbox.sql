-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2015 at 01:32 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soapbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

DROP TABLE IF EXISTS `activitylog`;
CREATE TABLE IF NOT EXISTS `activitylog` (
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  KEY `uid_al_fk` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`description`, `timestamp`, `type`, `ref`, `uid`) VALUES
('Created a new thread "Do What You Are Meant To Do"', '2015-11-03 10:43:03', 3, 1000, 10000),
('Created a new thread "Dota 2"', '2015-11-03 10:43:10', 3, 1001, 10002),
('Created a new thread "Really simple cake"', '2015-11-03 10:45:46', 3, 1002, 10002),
('Created a new thread "What Should I Do to Become a Writer?"', '2015-11-03 10:46:34', 3, 1003, 10000),
('Created a new thread "The Art of Selling Out How much money can you make from licensing your music?"', '2015-11-03 10:46:52', 3, 1004, 10001),
('Created a new thread "The other side"', '2015-11-03 10:49:06', 3, 1005, 10000),
('Created a new thread "Steve jobs quotes"', '2015-11-03 10:49:19', 3, 1006, 10002),
('Created a new thread "A Click-Bait Experiment, and the Navel-Gazing Problem that Threatens to Ruin Medium"', '2015-11-03 10:50:05', 3, 1007, 10001),
('Created a new thread "The Hackathon Approach to Building Digital Products"', '2015-11-03 10:50:30', 3, 1008, 10000),
('Created a new thread "Search Engine Marketing"', '2015-11-03 10:51:01', 3, 1009, 10002),
('Created a new thread "This Is How You Train Your Brain To Get What You Really Want"', '2015-11-03 10:52:27', 3, 1010, 10001),
('Created a new thread "Native Apps are dying"', '2015-11-03 10:52:33', 3, 1011, 10002),
('Created a new thread "When Simplicity Isn’t the Answer?—?Designing for Vastly Different Audiences"', '2015-11-03 10:52:42', 3, 1012, 10000),
('Created a new thread "What’s new for designers, October 2015"', '2015-11-03 10:55:12', 3, 1013, 10002),
('Created a new thread "7 Important Habits That Will Boost Your Intelligence"', '2015-11-03 10:55:44', 3, 1014, 10001),
('Created a new thread "Force Touch"', '2015-11-03 11:01:53', 3, 1015, 10002),
('Created a new thread "24 tremendous things to do in NYC this week"', '2015-11-03 11:02:00', 3, 1016, 10000),
('Created a new thread "A list of places to find the best free stock photos"', '2015-11-03 11:03:16', 3, 1017, 10001),
('Created a new thread "What you need to know about those "selfie girls""', '2015-11-03 11:05:16', 3, 1018, 10002),
('Created a new thread "Review: Porcupine Tree [Lightbulb Sun]"', '2015-11-03 11:06:48', 3, 1019, 10000),
('Created a new thread "Can anyone tell me where this program is bugging?"', '2015-11-03 11:07:49', 3, 1020, 10001),
('Created a new thread "the making of intersect"', '2015-11-03 11:09:39', 3, 1021, 10001),
('Created a new thread "Speaking for Myself: the end of books and power"', '2015-11-03 11:10:21', 3, 1022, 10002),
('Upvoted 24 tremendous things to do in NYC this week', '2015-11-03 11:11:16', 0, 1, 10001),
('Created a new thread "GRAMMY-winning producer Danger Mouse draws inspiration from the Fab Four"', '2015-11-03 11:14:25', 3, 1023, 10000),
('Created a new thread "Showman"', '2015-11-03 11:14:30', 3, 1024, 10002),
('Created a new thread "Everybody Lies"', '2015-11-03 11:15:23', 3, 1025, 10001),
('Created a new thread "The Psychology of Numbers in Design"', '2015-11-03 11:17:47', 3, 1026, 10002),
('Created a new thread "jQuery Drag-and-Drop Image Upload Functionality"', '2015-11-03 11:17:48', 3, 1027, 10000),
('Created a new thread "The Question That Could Unite Quantum Theory With General Relativity"', '2015-11-03 11:21:09', 3, 1028, 10002),
('Created a new thread "The illusion of duality a rant about life, death, heaven and hell."', '2015-11-03 11:24:21', 3, 1029, 10002),
('Created a new thread "Multiplication of any two numbers, lies between 11 and 19"', '2015-11-03 11:26:03', 3, 1030, 10001),
('Created a new thread "House of Cards Season 3"', '2015-11-03 11:27:06', 3, 1031, 10000),
('Upvoted House of Cards Season 3', '2015-11-03 11:27:57', 0, 2, 10002),
('Upvoted ROT IN HELL', '2015-11-03 11:28:34', 0, 3, 10000),
('Upvoted Multiplication of any two numbers, lies between 11 and 19', '2015-11-03 11:28:44', 0, 4, 10000),
('Upvoted The illusion of duality a rant about life, death, heaven and hell.', '2015-11-03 11:28:49', 0, 5, 10001),
('Left a reply on The illusion of duality a rant about life, death, heaven and hell.', '2015-11-03 11:28:53', 1, 100, 10001),
('Upvoted The Question That Could Unite Quantum Theory With General Relativity', '2015-11-03 11:29:10', 0, 6, 10001),
('Left a reply on Multiplication of any two numbers, lies between 11 and 19', '2015-11-03 11:29:12', 1, 101, 10000),
('Left a reply on The Question That Could Unite Quantum Theory With General Relativity', '2015-11-03 11:29:23', 1, 102, 10001),
('Left a reply on House of Cards Season 3', '2015-11-03 11:29:24', 1, 103, 10002),
('Upvoted jQuery Drag-and-Drop Image Upload Functionality', '2015-11-03 11:29:30', 0, 7, 10001),
('Upvoted a reply to The illusion of duality a rant about life, death, heaven and hell.', '2015-11-03 11:29:40', 4, 1, 10000),
('Upvoted The illusion of duality a rant about life, death, heaven and hell.', '2015-11-03 11:29:41', 0, 8, 10000),
('Left a reply on jQuery Drag-and-Drop Image Upload Functionality', '2015-11-03 11:30:17', 1, 104, 10001),
('Upvoted Everybody Lies', '2015-11-03 11:30:18', 0, 9, 10002),
('Upvoted The Psychology of Numbers in Design', '2015-11-03 11:30:25', 0, 10, 10001),
('Upvoted Showman', '2015-11-03 11:30:29', 0, 11, 10001),
('Left a reply on The Question That Could Unite Quantum Theory With General Relativity', '2015-11-03 11:30:43', 1, 105, 10000),
('Upvoted The Question That Could Unite Quantum Theory With General Relativity', '2015-11-03 11:30:45', 0, 12, 10000),
('Upvoted a reply to The Question That Could Unite Quantum Theory With General Relativity', '2015-11-03 11:30:47', 4, 2, 10000),
('Upvoted GRAMMY-winning producer Danger Mouse draws inspiration from the Fab Four', '2015-11-03 11:30:50', 0, 13, 10002),
('Left a reply on GRAMMY-winning producer Danger Mouse draws inspiration from the Fab Four', '2015-11-03 11:31:06', 1, 106, 10002),
('Left a comment on a reply to The Question That Could Unite Quantum Theory With General Relativity', '2015-11-03 11:31:07', 2, 1, 10000),
('Upvoted a reply to The Question That Could Unite Quantum Theory With General Relativity', '2015-11-03 11:31:22', 4, 3, 10001),
('Left a comment on a reply to The Question That Could Unite Quantum Theory With General Relativity', '2015-11-03 11:31:58', 2, 2, 10001),
('Left a comment on a reply to The Question That Could Unite Quantum Theory With General Relativity', '2015-11-03 11:32:09', 2, 3, 10002),
('Upvoted Speaking for Myself: the end of books and power', '2015-11-03 11:32:09', 0, 14, 10001),
('Upvoted Everybody Lies', '2015-11-03 11:33:20', 0, 15, 10000),
('Upvoted Showman', '2015-11-03 11:33:27', 0, 16, 10000),
('Upvoted the making of intersect', '2015-11-03 11:33:28', 0, 17, 10002),
('Upvoted What you need to know about those "selfie girls"', '2015-11-03 11:33:33', 0, 18, 10001),
('Left a reply on the making of intersect', '2015-11-03 11:33:44', 1, 107, 10002),
('Left a reply on What you need to know about those "selfie girls"', '2015-11-03 11:33:54', 1, 108, 10001),
('Left a reply on Showman', '2015-11-03 11:33:56', 1, 109, 10000),
('Upvoted Force Touch', '2015-11-03 11:34:08', 0, 19, 10001),
('Upvoted a reply to GRAMMY-winning producer Danger Mouse draws inspiration from the Fab Four', '2015-11-03 11:34:24', 4, 4, 10000),
('Left a comment on a reply to GRAMMY-winning producer Danger Mouse draws inspiration from the Fab Four', '2015-11-03 11:34:37', 2, 4, 10000),
('Upvoted What’s new for designers, October 2015', '2015-11-03 11:34:43', 0, 20, 10001),
('Upvoted Search Engine Marketing', '2015-11-03 11:34:47', 0, 21, 10001),
('Upvoted The Hackathon Approach to Building Digital Products', '2015-11-03 11:34:50', 0, 22, 10001),
('Upvoted Steve jobs quotes', '2015-11-03 11:34:54', 0, 23, 10001),
('Upvoted The other side', '2015-11-03 11:34:57', 0, 24, 10001),
('Left a reply on ROT IN HELL', '2015-11-03 11:35:03', 1, 110, 10002),
('Upvoted What Should I Do to Become a Writer?', '2015-11-03 11:35:18', 0, 25, 10001),
('Upvoted a reply to ROT IN HELL', '2015-11-03 11:35:44', 4, 5, 10001),
('Upvoted ROT IN HELL', '2015-11-03 11:36:02', 0, 26, 10002),
('Upvoted Can anyone tell me where this program is bugging?', '2015-11-03 11:36:09', 0, 27, 10000),
('Upvoted a reply to House of Cards Season 3', '2015-11-03 11:38:50', 4, 6, 10001),
('Left a reply on House of Cards Season 3', '2015-11-03 11:39:01', 1, 112, 10001),
('Upvoted a reply to House of Cards Season 3', '2015-11-03 11:39:07', 4, 7, 10000),
('Left a comment on a reply to House of Cards Season 3', '2015-11-03 11:39:22', 2, 5, 10000),
('Upvoted House of Cards Season 3', '2015-11-03 11:39:34', 0, 28, 10000),
('Left a comment on a reply to Multiplication of any two numbers, lies between 11 and 19', '2015-11-03 11:41:18', 2, 6, 10001),
('Left a comment on a reply to Multiplication of any two numbers, lies between 11 and 19', '2015-11-03 11:41:40', 2, 7, 10002),
('Upvoted a reply to Showman', '2015-11-03 11:41:47', 4, 8, 10001),
('Created a new thread "mind unleashed"', '2015-11-03 11:50:54', 3, 1033, 10001),
('Upvoted mind unleashed', '2015-11-03 11:51:23', 0, 29, 10000),
('Left a comment on a reply to House of Cards Season 3', '2015-11-03 16:34:51', 2, 8, 10000),
('Created a new thread "Benefits of prototyping for UX design with Pixate"', '2015-11-03 16:55:35', 3, 1034, 10000),
('Left a comment on a reply to House of Cards Season 3', '2015-11-04 07:23:11', 2, 9, 10002),
('Left a comment on a reply to House of Cards Season 3', '2015-11-04 07:24:39', 2, 10, 10002),
('Created a new thread "Short story"', '2015-11-04 07:30:49', 3, 1035, 10002),
('Created a new thread "What is the best way to conditionally apply a class?"', '2015-11-04 07:31:11', 3, 1036, 10000),
('Left a reply on What is the best way to conditionally apply a class?', '2015-11-04 07:32:42', 1, 113, 10002),
('Left a comment on a reply to What is the best way to conditionally apply a class?', '2015-11-04 07:32:53', 2, 11, 10000),
('Left a comment on a reply to What is the best way to conditionally apply a class?', '2015-11-04 07:33:24', 2, 12, 10002),
('Left a comment on a reply to What is the best way to conditionally apply a class?', '2015-11-04 07:33:35', 2, 13, 10000),
('Upvoted a reply to What is the best way to conditionally apply a class?', '2015-11-04 07:33:43', 4, 9, 10000),
('Left a comment on a reply to What is the best way to conditionally apply a class?', '2015-11-04 07:33:51', 2, 14, 10002),
('Left a comment on a reply to What is the best way to conditionally apply a class?', '2015-11-04 07:35:06', 2, 15, 10001),
('Left a comment on a reply to What is the best way to conditionally apply a class?', '2015-11-04 07:35:12', 2, 16, 10000),
('Upvoted What is the best way to conditionally apply a class?', '2015-11-04 07:37:38', 0, 30, 10002),
('Left a reply on What is the best way to conditionally apply a class?', '2015-11-04 07:42:47', 1, 114, 10001),
('Left a comment on a reply to What is the best way to conditionally apply a class?', '2015-11-04 07:43:07', 2, 17, 10002),
('Left a comment on a reply to What is the best way to conditionally apply a class?', '2015-11-04 07:43:16', 2, 18, 10000),
('Upvoted a reply to What is the best way to conditionally apply a class?', '2015-11-04 07:43:18', 4, 10, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `imagepath` text NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`srno`, `name`, `imagepath`) VALUES
(1, 'Books', 'categories/books.jpg'),
(2, 'Business', 'categories/business.jpg'),
(3, 'Cooking', 'categories/cooking.jpg'),
(4, 'Design', 'categories/design.jpg'),
(5, 'Economics', 'categories/economics.jpg'),
(6, 'Education', 'categories/education.jpg'),
(7, 'Fine Arts', 'categories/finearts.jpg'),
(8, 'Food', 'categories/food.jpg'),
(9, 'Gaming', 'categories/gaming.jpg'),
(10, 'Health & Fitness', 'categories/health.jpg'),
(11, 'History', 'categories/history.jpg'),
(12, 'Life Coaching', 'categories/lifecoach.png'),
(13, 'Mathematics', 'categories/mathematics.jpg'),
(14, 'Movies', 'categories/movies.jpg'),
(15, 'Music', 'categories/music.jpg'),
(16, 'Nature & Wildlife', 'categories/nature.jpg'),
(17, 'Philosophy', 'categories/philosophy.jpg'),
(18, 'Photography', 'categories/photography.jpg'),
(19, 'Politics', 'categories/politics.jpg'),
(20, 'Programming', 'categories/program.jpg'),
(21, 'Psychology', 'categories/psychology.jpg'),
(22, 'Science', 'categories/science.jpg'),
(23, 'Spirituality', 'categories/spirituality.jpg'),
(24, 'Sports', 'categories/sports.jpg'),
(25, 'Technology', 'categories/technology.jpg'),
(26, 'Traveling', 'categories/travel.jpg'),
(27, 'TV Shows', 'categories/tvseries.jpg'),
(28, 'Writing', 'categories/writing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category_user`
--

DROP TABLE IF EXISTS `category_user`;
CREATE TABLE IF NOT EXISTS `category_user` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  KEY `cid_fk` (`cid`),
  KEY `uid_fk_cu` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_user`
--

INSERT INTO `category_user` (`cid`, `uid`) VALUES
(1, 10000),
(2, 10000),
(3, 10000),
(4, 10000),
(5, 10000),
(6, 10000),
(7, 10000),
(8, 10000),
(9, 10000),
(10, 10000),
(11, 10000),
(12, 10000),
(13, 10000),
(14, 10000),
(15, 10000),
(16, 10000),
(17, 10000),
(18, 10000),
(19, 10000),
(20, 10000),
(21, 10000),
(22, 10000),
(23, 10000),
(24, 10000),
(25, 10000),
(26, 10000),
(27, 10000),
(28, 10000),
(1, 10001),
(2, 10001),
(3, 10001),
(4, 10001),
(5, 10001),
(6, 10001),
(7, 10001),
(8, 10001),
(9, 10001),
(10, 10001),
(11, 10001),
(12, 10001),
(13, 10001),
(14, 10001),
(15, 10001),
(16, 10001),
(17, 10001),
(18, 10001),
(19, 10001),
(20, 10001),
(21, 10001),
(22, 10001),
(23, 10001),
(24, 10001),
(25, 10001),
(26, 10001),
(27, 10001),
(28, 10001),
(1, 10002),
(3, 10002),
(4, 10002),
(8, 10002),
(9, 10002),
(15, 10002),
(20, 10002),
(24, 10002),
(23, 10002),
(22, 10002),
(21, 10002),
(28, 10002),
(27, 10002),
(25, 10002),
(12, 10002),
(26, 10002);

-- --------------------------------------------------------

--
-- Table structure for table `extendedinfo`
--

DROP TABLE IF EXISTS `extendedinfo`;
CREATE TABLE IF NOT EXISTS `extendedinfo` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `avatarpath` text,
  `coverpath` text,
  `covercoordinates` varchar(30) DEFAULT NULL,
  `email` varchar(320) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `about` varchar(255) DEFAULT NULL,
  `question` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `hometown` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `profession` varchar(30) DEFAULT NULL,
  `education` varchar(30) DEFAULT NULL,
  `college` varchar(30) DEFAULT NULL,
  `school` varchar(30) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  UNIQUE KEY `email` (`email`),
  KEY `uid_fk` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extendedinfo`
--

INSERT INTO `extendedinfo` (`fname`, `lname`, `avatarpath`, `coverpath`, `covercoordinates`, `email`, `gender`, `about`, `question`, `answer`, `hometown`, `city`, `profession`, `education`, `college`, `school`, `uid`) VALUES
('Chinmay', 'Joshi', '12119025_1201524256527992_2524295334611042498_n.png', '1193961446549813.jpeg', '0px -184px', 'chinmayj93@gmail.com', 'm', 'Music freak. Sleepy head. Sarcastic. Foodie.', 0, 'chinya', 'Dombivali', 'Pune', 'Student', 'Master''s in Computer Science', 'MIT', 'Abhinav Vidyalaya', 10001),
('Atharva', 'Dandekar', 'steve.jpg', '7977011446550731.jpg', '0px -100px', 'dandekar.atharva@gmail.com', 'm', 'Altruistic Punk', 1, 'mumbai', 'Mumbai', 'Pune', 'Programmer', 'Computer Science', 'MIT', 'St Teresa High School', 10002),
('Mihir', 'Karandikar', '38538731.jpg', '432221446550710.JPG', '0px -55px', 'karandikar.mihir@outlook.com', 'm', 'Just another programmer in town!', 1, 'pune', '', '', 'Student', 'Graduate', 'MACS College, Pune', 'MIT School, Pune', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `hidethread`
--

DROP TABLE IF EXISTS `hidethread`;
CREATE TABLE IF NOT EXISTS `hidethread` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`tid`,`uid`),
  KEY `uid_ht_fk` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hidethread`
--

INSERT INTO `hidethread` (`tid`, `uid`) VALUES
(1033, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `description` text NOT NULL,
  `type` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `readflag` int(11) DEFAULT '0',
  `sent` int(11) DEFAULT '0',
  `uid` int(11) NOT NULL,
  KEY `uid_n_fk` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`description`, `type`, `ref`, `timestamp`, `readflag`, `sent`, `uid`) VALUES
('Chinmay Joshi upvoted your thread', 3, 1, '2015-11-03 11:11:16', 1, 1, 10000),
('Atharva Dandekar upvoted your thread', 3, 2, '2015-11-03 11:27:57', 1, 1, 10000),
('Mihir Karandikar upvoted your thread', 3, 3, '2015-11-03 11:28:34', 1, 1, 10001),
('Mihir Karandikar upvoted your thread', 3, 4, '2015-11-03 11:28:44', 1, 1, 10001),
('Chinmay Joshi upvoted your thread', 3, 5, '2015-11-03 11:28:49', 1, 1, 10002),
('Chinmay Joshi left a reply on a thread you are tracking', 1, 100, '2015-11-03 11:28:53', 1, 1, 10002),
('Chinmay Joshi upvoted your thread', 3, 6, '2015-11-03 11:29:10', 1, 1, 10002),
('Mihir Karandikar left a reply on a thread you are tracking', 1, 101, '2015-11-03 11:29:12', 1, 1, 10001),
('Chinmay Joshi left a reply on a thread you are tracking', 1, 102, '2015-11-03 11:29:23', 1, 1, 10002),
('Atharva Dandekar left a reply on a thread you are tracking', 1, 103, '2015-11-03 11:29:24', 1, 1, 10000),
('Chinmay Joshi upvoted your thread', 3, 7, '2015-11-03 11:29:30', 1, 1, 10000),
('Mihir Karandikar upvoted your reply on The illusion of duality a rant about life, death, heaven and hell.', 4, 1, '2015-11-03 11:29:40', 1, 1, 10001),
('Mihir Karandikar upvoted your thread', 3, 8, '2015-11-03 11:29:41', 1, 1, 10002),
('Chinmay Joshi left a reply on a thread you are tracking', 1, 104, '2015-11-03 11:30:17', 1, 1, 10000),
('Chinmay Joshi left a reply on a thread you are tracking', 1, 104, '2015-11-03 11:30:17', 1, 1, 10002),
('Atharva Dandekar upvoted your thread', 3, 9, '2015-11-03 11:30:18', 1, 1, 10001),
('Chinmay Joshi upvoted your thread', 3, 10, '2015-11-03 11:30:25', 1, 1, 10002),
('Chinmay Joshi upvoted your thread', 3, 11, '2015-11-03 11:30:29', 1, 1, 10002),
('Mihir Karandikar left a reply on a thread you are tracking', 1, 105, '2015-11-03 11:30:43', 1, 1, 10002),
('Mihir Karandikar upvoted your thread', 3, 12, '2015-11-03 11:30:45', 1, 1, 10002),
('Mihir Karandikar upvoted your reply on The Question That Could Unite Quantum Theory With General Relativity', 4, 2, '2015-11-03 11:30:47', 1, 1, 10001),
('Atharva Dandekar upvoted your thread', 3, 13, '2015-11-03 11:30:50', 1, 1, 10000),
('Atharva Dandekar left a reply on a thread you are tracking', 1, 106, '2015-11-03 11:31:06', 1, 1, 10000),
('Mihir Karandikar left a comment on your reply.', 2, 1, '2015-11-03 11:31:07', 1, 1, 10001),
('Chinmay Joshi upvoted your reply on The Question That Could Unite Quantum Theory With General Relativity', 4, 3, '2015-11-03 11:31:22', 1, 1, 10000),
('Atharva Dandekar left a comment on your reply.', 2, 3, '2015-11-03 11:32:09', 1, 1, 10001),
('Chinmay Joshi upvoted your thread', 3, 14, '2015-11-03 11:32:09', 1, 1, 10002),
('Mihir Karandikar upvoted your thread', 3, 15, '2015-11-03 11:33:20', 1, 1, 10001),
('Mihir Karandikar upvoted your thread', 3, 16, '2015-11-03 11:33:27', 1, 1, 10002),
('Atharva Dandekar upvoted your thread', 3, 17, '2015-11-03 11:33:28', 1, 1, 10001),
('Chinmay Joshi upvoted your thread', 3, 18, '2015-11-03 11:33:33', 1, 1, 10002),
('Atharva Dandekar left a reply on a thread you are tracking', 1, 107, '2015-11-03 11:33:44', 1, 1, 10001),
('Chinmay Joshi left a reply on a thread you are tracking', 1, 108, '2015-11-03 11:33:54', 1, 1, 10002),
('Mihir Karandikar left a reply on a thread you are tracking', 1, 109, '2015-11-03 11:33:56', 1, 1, 10002),
('Chinmay Joshi upvoted your thread', 3, 19, '2015-11-03 11:34:08', 1, 1, 10002),
('Mihir Karandikar upvoted your reply on GRAMMY-winning producer Danger Mouse draws inspiration from the Fab Four', 4, 4, '2015-11-03 11:34:24', 1, 1, 10002),
('Mihir Karandikar left a comment on your reply.', 2, 4, '2015-11-03 11:34:37', 1, 1, 10002),
('Chinmay Joshi upvoted your thread', 3, 20, '2015-11-03 11:34:43', 1, 1, 10002),
('Chinmay Joshi upvoted your thread', 3, 21, '2015-11-03 11:34:47', 1, 1, 10002),
('Chinmay Joshi upvoted your thread', 3, 22, '2015-11-03 11:34:50', 1, 1, 10000),
('Chinmay Joshi upvoted your thread', 3, 23, '2015-11-03 11:34:54', 1, 1, 10002),
('Chinmay Joshi upvoted your thread', 3, 24, '2015-11-03 11:34:57', 1, 1, 10000),
('Atharva Dandekar left a reply on a thread you are tracking', 1, 110, '2015-11-03 11:35:03', 1, 1, 10001),
('Chinmay Joshi upvoted your thread', 3, 25, '2015-11-03 11:35:18', 1, 1, 10000),
('Chinmay Joshi upvoted your reply on ROT IN HELL', 4, 5, '2015-11-03 11:35:44', 1, 1, 10002),
('Atharva Dandekar upvoted your thread', 3, 26, '2015-11-03 11:36:02', 1, 1, 10001),
('Mihir Karandikar upvoted your thread', 3, 27, '2015-11-03 11:36:09', 1, 1, 10001),
('Chinmay Joshi upvoted your reply on House of Cards Season 3', 4, 6, '2015-11-03 11:38:50', 1, 1, 10002),
('Chinmay Joshi left a reply on a thread you are tracking', 1, 112, '2015-11-03 11:39:01', 1, 1, 10000),
('Chinmay Joshi left a reply on a thread you are tracking', 1, 112, '2015-11-03 11:39:01', 1, 1, 10002),
('Mihir Karandikar upvoted your reply on House of Cards Season 3', 4, 7, '2015-11-03 11:39:07', 1, 1, 10001),
('Mihir Karandikar left a comment on your reply.', 2, 5, '2015-11-03 11:39:22', 1, 1, 10002),
('Chinmay Joshi left a comment on your reply.', 2, 6, '2015-11-03 11:41:18', 1, 1, 10000),
('Atharva Dandekar left a comment on your reply.', 2, 7, '2015-11-03 11:41:40', 1, 1, 10000),
('Chinmay Joshi upvoted your reply on Showman', 4, 8, '2015-11-03 11:41:47', 1, 1, 10000),
('Mihir Karandikar upvoted your thread', 3, 29, '2015-11-03 11:51:23', 1, 1, 10001),
('Mihir Karandikar left a comment on your reply.', 2, 8, '2015-11-03 16:34:51', 1, 1, 10001),
('Atharva Dandekar left a comment on your reply.', 2, 10, '2015-11-04 07:24:39', 1, 1, 10001),
('@desc', 5, 112, '2015-11-04 07:27:02', 1, 0, 10001),
('Atharva Dandekar left a reply on a thread you are tracking', 1, 113, '2015-11-04 07:32:42', 1, 1, 10000),
('Mihir Karandikar left a comment on your reply.', 2, 11, '2015-11-04 07:32:53', 1, 1, 10002),
('@desc', 5, 113, '2015-11-04 07:33:00', 1, 0, 10002),
('Mihir Karandikar left a comment on your reply.', 2, 13, '2015-11-04 07:33:35', 1, 0, 10002),
('Mihir Karandikar upvoted your reply on What is the best way to conditionally apply a class?', 4, 9, '2015-11-04 07:33:43', 1, 0, 10002),
('Chinmay Joshi left a comment on your reply.', 2, 15, '2015-11-04 07:35:06', 1, 0, 10002),
('Mihir Karandikar left a comment on your reply.', 2, 16, '2015-11-04 07:35:12', 1, 0, 10002),
('Atharva Dandekar upvoted your thread', 3, 30, '2015-11-04 07:37:38', 1, 1, 10000),
('Chinmay Joshi left a reply on a thread you are tracking', 1, 114, '2015-11-04 07:42:47', 1, 1, 10000),
('Atharva Dandekar left a comment on your reply.', 2, 17, '2015-11-04 07:43:07', 1, 0, 10001),
('Mihir Karandikar left a comment on your reply.', 2, 18, '2015-11-04 07:43:16', 1, 0, 10001),
('Mihir Karandikar upvoted your reply on What is the best way to conditionally apply a class?', 4, 10, '2015-11-04 07:43:18', 1, 0, 10001);

-- --------------------------------------------------------

--
-- Table structure for table `readinglist`
--

DROP TABLE IF EXISTS `readinglist`;
CREATE TABLE IF NOT EXISTS `readinglist` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tid`,`uid`),
  KEY `uid_rl_fk` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `readinglist`
--

INSERT INTO `readinglist` (`tid`, `uid`, `timestamp`) VALUES
(1016, 10000, '2015-11-03 11:02:08'),
(1019, 10002, '2015-11-03 11:40:34'),
(1027, 10002, '2015-11-03 11:29:49'),
(1029, 10000, '2015-11-03 11:29:47'),
(1034, 10000, '2015-11-04 07:54:06'),
(1036, 10000, '2015-11-04 07:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `replies_to_reply`
--

DROP TABLE IF EXISTS `replies_to_reply`;
CREATE TABLE IF NOT EXISTS `replies_to_reply` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`srno`),
  KEY `rid_rr_fk` (`rid`),
  KEY `uid_rr_fk` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `replies_to_reply`
--

INSERT INTO `replies_to_reply` (`srno`, `description`, `timestamp`, `rid`, `uid`) VALUES
(1, 'I totally agree with you Chonmay', '2015-11-03 11:31:07', 102, 10000),
(2, ':) :)', '2015-11-03 11:31:58', 102, 10001),
(3, 'me too chinamy', '2015-11-03 11:32:09', 102, 10002),
(4, 'However, the thing that really spoke to me was when at the peak of their career?—?with anything and everything a band at that time could have possibly wanted?—?they made a change. In 1966 the Beatles stopped playing live.', '2015-11-03 11:34:37', 106, 10000),
(5, 'He must go through extensive therapy and, of course, deal with horrible pain (which will test his resistance to his chemical dependency).', '2015-11-03 11:39:22', 103, 10000),
(6, 'check out the link. There it is given with examples. :)', '2015-11-03 11:41:18', 101, 10001),
(7, 'wat you u dnt knw math', '2015-11-03 11:41:40', 101, 10002),
(8, 'He is trying to get his entitlement bill to have legs. Claire is proving to be a problem because she want to become the ambassador to the UN. Frank doesn''t say it, but he feels he has enough bad press without showing nepotism to his own wife.', '2015-11-03 16:34:51', 112, 10000),
(9, 'This might alarm a lesser man, but Underwood simply picks up a piece of the statue, and remarks that "I''ve got God''s ear now," as he walks away with the ear piece.', '2015-11-04 07:23:11', 103, 10002),
(10, 'This might alarm a lesser man, but Underwood simply picks up a piece of the statue, and remarks that "I''ve got God''s ear now," as he walks away with the ear piece.', '2015-11-04 07:24:39', 112, 10002),
(11, 'OP, that may be the worse way to express the ternary operator I''ve ever seen. Have you considered ($index==selectedIndex) ? ''selected'' : ''''', '2015-11-04 07:32:53', 113, 10000),
(12, ' ternary operator was not working within angular expressions in v0.9.x . This is more or less a switch.', '2015-11-04 07:33:24', 113, 10002),
(13, 'ng-class (as of 1/19/2012) now supports an expression that must evaluate to either 1) a string of space-delimited class names, or 2) and array of class names, or 3) a map/object of class names to boolean values. So, using 3): ng-class="{selected: $index==selectedIndex}"', '2015-11-04 07:33:35', 113, 10000),
(14, ' now that I have checked I can say that this method is working in v1. It still useful in some cases. Note that object property names(keys) are not necessarily true or false, it can be anything that you might wanna map to a class name.', '2015-11-04 07:33:51', 113, 10002),
(15, 'I realize there may be workarounds for my particular use case (which I am already employing), but I''m interested in a solution for the abstract problem -- or knowing definitively that there isn''t one.', '2015-11-04 07:35:06', 113, 10001),
(16, 'nice logic. Reminds me of a good JavaScript pattern. Thanks!', '2015-11-04 07:35:12', 113, 10000),
(17, 'ng-class="{''selected'': $index==selectedIndex}" works for me', '2015-11-04 07:43:07', 114, 10002),
(18, '+1 for ternary operators (and I need one right now) but 1.1.* is an ''unstable release'' where the API is subject to change without notice - as of time of typing. 1.0.* is stable, so I''d be more comfortable going with that for a project to be rolled out next week for 6 months. ', '2015-11-04 07:43:16', 114, 10000);

--
-- Triggers `replies_to_reply`
--
DROP TRIGGER IF EXISTS `ac_dRReply`;
DELIMITER //
CREATE TRIGGER `ac_dRReply` AFTER DELETE ON `replies_to_reply`
 FOR EACH ROW begin 
set @uid = old.uid; 
set @rrid = old.srno; 
set @rid=old.rid;
set @rowner=(select uid from reply where srno=@rid);
delete from notifications where ref=@rrid and uid=@rowner and type=2;
delete from activitylog where ref=@rrid and uid=@uid and type=2; 

set @threadid=(select tid from reply where srno=@rid);
delete from thread_activity where tid=@threadid and type=2 and ref=@rrid;
set @last_ts = (select timestamp from thread_activity where tid=@threadid order by timestamp desc limit 1);
if(@last_ts IS NULL) then
set @last_ts=(select timestamp from thread where srno=@threadid);
end if;
update weightage set weight=weight-0.02, timestamp=@last_ts where tid=@threadid;

end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_iRReply`;
DELIMITER //
CREATE TRIGGER `ac_iRReply` AFTER INSERT ON `replies_to_reply`
 FOR EACH ROW begin 
set @uid=new.uid; 
set @rrid=new.srno;
set @rid=new.rid; 
set @rowner=(select uid from reply where srno=@rid);
set @tid=(select tid from reply where srno=@rid); 
set @title=(select title from thread where srno=@tid);
set @desc=concat('Left a comment on a reply to ', @title); 
if @uid != @rowner then
set @rrowner=(select concat(fname, ' ', lname) from extendedinfo where uid=@uid);
insert into notifications(description, type, ref, uid) values(concat(@rrowner, ' left a comment on your reply.'), 2, @rrid, @rowner);
end if;
insert into activitylog(description, type, ref, uid) values(@desc, 2, @rrid, @uid);
set @threadid = (select tid from reply where srno=@rid);
set @ts=now();
insert into thread_activity(tid, timestamp, type, ref) values(@threadid, @ts, 2, @rrid);
update weightage set weight=weight+0.02, timestamp=@ts where tid=@threadid;

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE IF NOT EXISTS `reply` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `correct` int(11) DEFAULT '0',
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`srno`),
  KEY `tid_reply_fk` (`tid`),
  KEY `uid_reply_fk` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`srno`, `description`, `timestamp`, `correct`, `tid`, `uid`) VALUES
(100, '<p>I agree that the mystery of death does create a sense of urgency and a sense of duty to humankind. Yet I further comprehend that life and death are not contradictory, but rather complementary parts of a singular concept. There is no night without day, joy without sadness, triumph without regret, pain without pleasure, success without failure. A transcendental understanding occurs when two corresponding halves are appreciated as one whole.</p>', '2015-11-03 11:28:53', 0, 1029, 10001),
(101, '<p>But the really clever trick is explaining to them why these ''tricks'' are maths and not magic. Like all good magicians, you should practise by trying them. Can you explain how they work?</p>', '2015-11-03 11:29:12', 0, 1030, 10000),
(102, '<p>These kinds of infinities are something of an annoyance. Their paradoxical nature makes them hard to deal with mathematically and difficult to reconcile with our knowledge of the universe, which as far as we can tell, avoids this kind of paradoxical behavior. ;</p>', '2015-11-03 11:29:23', 0, 1028, 10001),
(103, '<p>My favorite scene of the entire season was the final one in this chapter, as Frank makes a trip to a local church. Frank spits on a giant crucifix of Jesus, only to be startled as the entire thing falls down on him in response. This might alarm a lesser man, but Underwood simply picks up a piece of the statue, and remarks that "I''ve got God''s ear now," as he walks away with the ear piece.</p>', '2015-11-03 11:29:24', 0, 1031, 10002),
(104, '<p>Thank you so much Mihir. I have been waiting for someone to show me how this really works. :) Appreciate it.</p>', '2015-11-03 11:30:17', 0, 1027, 10001),
(105, '<p>Quantum mechanics was initially developed to provide a better explanation and description of the atom, especially the differences in the spectra of light emitted by different isotopes of the same chemical element, as well as subatomic particles. In short, the quantum-mechanical atomic model has succeeded spectacularly in the realm where classical mechanics and electromagnetism falter.<br></p>', '2015-11-03 11:30:43', 0, 1028, 10000),
(106, '<p><i>I bought the albums, read books and watched any documentaries I could find. What an unreal story. They were immediately a worldwide sensation by their early 20s. They wrote their own material when that was all but unheard of, worked their a**es off touring the world playing hit after hit. Girls and boys alike went crazy for them. Every year, from their first records in 1963, they got bigger and bigger and more influential in both music and popular culture.</i></p>', '2015-11-03 11:31:06', 0, 1023, 10002),
(107, '<p>We created these videos a resource with hopes that you can do something similar in your own community. So gather a few friends, watch the videos, speak openly and honest about your life, and see where God has been waiting to meet you. Or to put it simpler: get it and use it.</p>', '2015-11-03 11:33:44', 0, 1021, 10002),
(108, '<p>selfies addition. XD :D Well described :D ;</p>', '2015-11-03 11:33:54', 0, 1018, 10001),
(109, '<p>It is now only in India that one finds so much handwork involved in the making of musical instruments. In the rest of the world instruments are generally mass produced by machine with hand-crafting of instruments being the very expensive exception. ;</p>', '2015-11-03 11:33:56', 0, 1024, 10000),
(112, '<p>Series 3 of the drama about a ruthless congressman and his equally ambitious wife who navigate the corridors of power in Washington, D.C. It begins with Frank as President of the United States after his recent inauguration and continues with him trying to maintain a hold on his country and those around him trying to run it.</p>', '2015-11-03 11:39:01', 1, 1031, 10001),
(113, '<p>If you don''t want to put CSS class names into Controller like I do, here is an old trick that I use since pre-v1 days. We can write an expression that evaluates directly to a class name selected, no custom directives are necessary:</p><pre>ng:class="{true:''selected'', false:''''}[$index==selectedIndex]"</pre><p>Please note the old syntax with colon.</p><p>There is also a new better way of applying classes conditionally, like:</p><pre>ng-class="{selected: $index==selectedIndex}"</pre><p>Angular now supports expressions that returns an object. Each property (name) of this object is now considered as a class name and is applied depending on its value.</p><p>However these ways are not functionally equal. Here is an example:</p><pre>ng-class="{admin:''enabled'', moderator:''disabled'', '''':''hidden''}[user.role]"</pre><p>We could therefore reuse existing CSS classes by basically mapping a model property to a class name and at the same time kept CSS classes out of Controller code.<br></p>', '2015-11-04 07:32:42', 1, 1036, 10002),
(114, '<p><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;"><b>ng-class</b></span><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;"> supports an expression that must evaluate to either</span><br></p><p><ul><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">a string of space-delimited class names, or</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">an array of class names, or</span><br></li><li><span style="font-size: 11pt; line-height: 1.5; word-spacing: normal;">a map/object of class names to&nbsp;</span>Boolean<span style="font-size: 11pt; line-height: 1.5; word-spacing: normal;">&nbsp;values.</span><br></li></ul></p><p>So, using form third method we can simply write</p><pre>ng-class="{selected: $index==selectedIndex}"</pre><p>See also How do I conditionally apply CSS styles in AngularJS? for a broader answer. <a href="http://stackoverflow.com/questions/13813254/how-do-i-conditionally-apply-css-styles-in-angularjs">Link</a></p>', '2015-11-04 07:42:47', 0, 1036, 10001);

--
-- Triggers `reply`
--
DROP TRIGGER IF EXISTS `ac_dReply`;
DELIMITER //
CREATE TRIGGER `ac_dReply` AFTER DELETE ON `reply`
 FOR EACH ROW begin 
declare done int default 0;
declare i int;
declare j int;
declare cursor1 cursor for select tid, uid from trackthread where tid=old.tid;
declare continue handler for not found set done=1;
open cursor1;
read_loop: loop
fetch cursor1 into i, j;
if done then leave read_loop;
end if;
delete from notifications where ref=old.srno and uid=j and type=1;
end loop;
close cursor1;
set @userid=old.uid;
set @ref=old.srno; 
delete from activitylog where uid=@userid and ref=@ref and type=1; 

set @threadid=old.tid;
delete from thread_activity where tid=@threadid and type=1 and ref=@ref;
set @last_ts = (select timestamp from thread_activity where tid=@threadid order by timestamp desc limit 1);
if(@last_ts IS NULL) then
set @last_ts=(select timestamp from thread where srno=@threadid);
end if;
update weightage set weight=weight-0.08, timestamp=@last_ts where tid=@threadid;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_iCorrect`;
DELIMITER //
CREATE TRIGGER `ac_iCorrect` AFTER UPDATE ON `reply`
 FOR EACH ROW begin
set @flag=(select correct from reply where srno=new.srno);
if @flag=1 then
	set @rid=new.srno; 
	set @tid=(select tid from reply where srno=new.srno); 
	set @tuid=(select uid from thread where srno=@tid); 
	set @twoner=(select concat(fname, ' ', lname) from extendedinfo where uid=@tuid);
	set @desc=concat(@towner, ' marked your reply as correct');
	insert into notifications(description, type, ref, uid) values('@desc', 5, @rid, new.uid);
end if;
if @flag=0 then
	set @rid=new.srno; 
	delete from notifications where type=5 and ref=@rid and uid=new.uid;
end if;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_iReply`;
DELIMITER //
CREATE TRIGGER `ac_iReply` AFTER INSERT ON `reply`
 FOR EACH ROW begin 
declare done int default 0;
declare i int;
declare j int; 
declare cursor1 cursor for select `tid`, `uid` from `trackthread` where tid=new.tid; 
declare continue handler for not found set done=1; 
open cursor1; 
read_loop: loop fetch cursor1 into i, j; 
if done then leave read_loop; end if; 
set @rid=new.srno;
set @uid=new.uid;
if (@uid != j) then
set @name=(select concat(fname, ' ', lname) from extendedinfo where uid=@uid);
insert into notifications(description, type, ref, uid) values(concat(@name, ' left a reply on a thread you are tracking'), 1, @rid, j); 
end if;
end loop; 
close cursor1; 
set @title=(select title from thread where srno=new.tid); 
set @descr=concat('Left a reply on ', @title); 
insert into activitylog(description, type, ref, uid) values(@descr, 1, new.srno, new.uid); 
set @ts=now();
set @threadid = (select tid from reply where srno=@rid);
insert into thread_activity(tid, timestamp, type, ref) values(@threadid, @ts, 1, @rid);
update weightage set weight=weight+0.08, timestamp=@ts where tid=@threadid;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`name`) VALUES
('addiction'),
('android'),
('AngularJS'),
('apple'),
('apps'),
('art'),
('artofbusiness'),
('Beatles'),
('books'),
('business'),
('cake'),
('cats'),
('coffee'),
('consciousness'),
('cooking'),
('cplusplus'),
('css'),
('Design'),
('Designing'),
('dota2'),
('DragNDrop'),
('Dream'),
('DrHouse'),
('duality'),
('education'),
('experiment'),
('feelings'),
('force3dtouch'),
('Freedom'),
('functions'),
('future'),
('gameplay'),
('gaming'),
('genius'),
('girls'),
('god'),
('google'),
('Hackathon'),
('history'),
('Hobby'),
('HOC'),
('house'),
('houseMD'),
('HouseOfCards'),
('HTML5'),
('ideas'),
('ILoveNYC'),
('intelligence'),
('ios'),
('iphone6s'),
('JavaScript'),
('JQuery'),
('kitten'),
('learning'),
('Liberation'),
('Life'),
('lifecoaching'),
('lifelessons'),
('lifequotes'),
('mathematics'),
('maths'),
('mindunleashed'),
('music'),
('Netflix'),
('NewYorkCity'),
('nostalgia'),
('numbertheory'),
('NYC'),
('oldbooks'),
('photos'),
('physics'),
('Pop'),
('PorcupineTree'),
('powerofstory'),
('productivity'),
('Programming'),
('ProgressiveRock'),
('ProgRock'),
('project'),
('psychology'),
('PT'),
('pudge'),
('quantum'),
('quantumtheory'),
('quotes'),
('reforms'),
('Rock'),
('sacasm'),
('searchenginemarkeing'),
('season8'),
('selfies'),
('selfimprovement'),
('selling'),
('shortstories'),
('showman'),
('Shows'),
('simplemaths'),
('spacetime'),
('spirituality'),
('starbucks'),
('Startup'),
('startups'),
('steam'),
('stevejobs'),
('stockitems'),
('stockpics'),
('story'),
('tabla'),
('Tech'),
('TheBeatles'),
('thoughts'),
('tricks'),
('TV'),
('UI'),
('USA'),
('UserExperience'),
('UX'),
('visionary'),
('wallpapers'),
('WebDev'),
('World'),
('Writers');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

DROP TABLE IF EXISTS `thread`;
CREATE TABLE IF NOT EXISTS `thread` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `imagepath` text,
  `coordinates` varchar(30) DEFAULT NULL,
  `edit` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`srno`),
  KEY `uid_thread_fk` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1037 ;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`srno`, `title`, `description`, `imagepath`, `coordinates`, `edit`, `timestamp`, `cid`, `uid`) VALUES
(1000, 'Do What You Are Meant To Do', '<p>Don’t give up on trying to find balance in your life. Stick to your priorities, remember what’s most important to you and do every thing you can to put yourself in a position where you can focus on those priorities, rather than being pulled by the expectations of others.</p><p>It’s easy to get caught up in the expectations of others. To know what to do sometimes you have to distance yourself from others. You need to know how to be alone sometimes in order to know how to be around others.</p><p>The world is mad with a lot of mad people not being themselves and not doing what they are meant to do. But you don’t have to be like everyone else. You don’t have to do what everyone else is doing. You know what you want. You know what’s important to you. You know the life you are supposed to be living. It’s up to you to pursue it. If you are still not sure, then follow the path of peace and love, and you’ll know what you need to be focusing on.</p><p>You have the power to set the tone of your day. Go to bed early, get up early. Pray, meditate, take your time. Focus on the big picture stuff. You don’t need to think about or do as many things as you think you do.</p><p>There never seems to be enough time in the day. But how much of that time do we waste? There’s almost always enough time for the most important things if we can successfully block out or minimize the less important things.</p><p>You can spend your whole life doing what you don’t want to do, and die. Or you can spend your life doing what you do want to do, and die. The end result is the same. The question is whether or not you are going to enjoy yourself in the meantime.</p>', '3349611446547376.jpg', '0px -109px', 0, '2015-11-03 10:43:03', 12, 10000),
(1001, 'Dota 2', '<p>Dota 2 is a free-to-play multiplayer online battle arena video game developed and published by Valve Corporation. Released for Microsoft Windows, OS X, and Linux in July 2013, following a Windows-only public beta testing phase that began in 2011, the game is the stand-alone sequel to Defense of the Ancients (DotA), a mod for Warcraft III: Reign of Chaos and its expansion pack, The Frozen Throne. Dota 2 utilized the original Source engine until it was ported to Source 2 in September 2015, making it the first game to utilize the new engine.</p><p>Dota 2 is played in matches between two five-player teams, each of which occupies a stronghold in a corner of the playing field. A team wins by destroying the other side''s "Ancient" building, located within the opposing stronghold. Each player controls one of 110 playable "Hero" characters that feature unique powers and styles of play. During a match, the player collects gold, items, and experience points for their Hero, while combating Heroes of the opposite team.</p><p>Development of Dota 2 began in 2009 when IceFrog, lead designer of the original DotA mod, was hired by Valve. Dota 2 was praised by critics for its gameplay, production quality, and faithfulness to its predecessor, despite being criticized for its steep learning curve. The game is the most actively played game on Steam, with a peak of over a million concurrent players in February 2015.</p>', '4774161446547363.jpg', '0px -59px', 0, '2015-11-03 10:43:10', 9, 10002),
(1002, 'Really simple cake', '<h4>Ingredients</h4><p><ol><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">200g sugar</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">115g butter</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">2 eggs</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">2 teaspoons vanilla extract</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">200g flour</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">1 3/4 teaspoons baking powder</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">120ml milk</span><br></li></ol></p><h4>Directions</h4><p>Prep 20min Cook 30min Ready in 50min&nbsp;</p><p><ol><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">Preheat the oven to 180 degrees C. Grease and flour a 23cm tin or line a bun tray with paper cases.</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">In a medium bowl, cream together the sugar and butter. Beat in the eggs, one at a time, then stir in the vanilla. Combine flour and baking powder, add to the creamed mixture and mix well. Finally stir in the milk until the mixture is smooth. Pour or spoon mixture into the prepared tin or bun cases.</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">Bake for 30 to 40 minutes in the preheated oven. For fairy cakes, bake 20 to 25 minutes. Cake is done when it springs back to the touch.</span><br></li></ol></p>', '', '', 0, '2015-11-03 10:45:46', 3, 10002),
(1003, 'What Should I Do to Become a Writer?', '<p>If you want to become a writer, you need to start thinking like a writer.</p><p>What’s the easiest way to do that?</p><p>Copy books word for word. It allows you to subconsciously understand the author’s tone of voice and writing style.</p><p>If done enough, you will be able to change writing styles as you please. Personally, I can write in many tones, from legalese, business speak, technical writing, advertising and speech writing. However, I prefer to write in my own personal voice. As time progresses, you will also find your own personal voice.</p><p>Practice. Write your thoughts out for thirty minutes.</p><p>In most cases, what separates great writing from poor writing is editing. Due to this, as a beginning writer, it is in your best interest to write down every thought that comes to mind.</p><p>Does it have grammatical errors? Does the sentence not make sense?</p><p>It’s okay. None of that matters. Just keep writing consistently for as long as you can.</p><p>Then when your thoughts run dry, go back over your content with a fine tooth comb.</p><p>Read what you wrote aloud.</p><p>Does it make sense?</p><p>If not, make edits. If you’re a beginning writer, then most of what you say won’t make sense, so you will have to edit heavily.</p><p>While editing, you want to make your writing as easy as possible to understand. I read two pages of that Game of Thrones book. That was written at a fifth grade level. However it was brilliant enough to be turned into a HBO series. Not everyone who will be reading your writing is college educated. Writing to appeal to the masses so they can understand your message is key.</p><p>If you have an Apple, keep the dictionary open and use a thesaurus on certain words that bring more emphasis. The thesaurus and dictionary will become one of your best friends.</p><p>If you want to improve your writing even further, start to write collateral material, such as sales brochures, trifolds and product descriptions. My job used to be to make all the collateral material for companies, from training manuals to the brochures the end user would read.</p><p>Why are trifolds so important?</p><p>Because it forces you to take a big picture and condense it down to a few paragraphs. It makes you sit there and think of what data is just used as fat, or filler information and what data is actually the meat and bones, or hard data to influence emotions, of your message. This practice will force you to sit in front of your writing and consistently edit away at it until the message is perfect. This is best done in a group environment.</p><p>As time progresses, your writing will get better and better. At some point, your writing will become substantially good. At that point, you will face a hard decision. Do you want to keep your audience engaged or do you want to write to a smaller audience geared more towards novels?</p><p>Either choice is fine. It’s all personal preference. However, some people get too into their writing and carry an aura of authority everywhere they go. I suggest to skip this step. Instead, follow these three steps:</p><p>Stay humble. Stay hungry. Stay honest.</p>', '9883651446547539.jpeg', '0px 0px', 0, '2015-11-03 10:46:34', 28, 10000),
(1004, 'The Art of Selling Out How much money can you make from licensing your music?', '<p><b>P</b><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">ublic Enemy’s biggest hit record came in 2012, decades after what many would consider their prime. Although many hail their 1988 sophomore LP, It Takes a Nation of Millions to Hold Us Back as the greatest hip-hop album of all time, the group never found themselves with a huge crossover smash single that dominated the mainstream charts. This fact and their trademark logo is probably why they cleverly named their 1992 remix album Greatest Misses. That would all change 25 years into their career when their 2007 track “Harder Than You Think” became the band’s biggest hit, reaching #4 on the UK Singles chart and #1 on both the UK R&amp;B and UK Indie charts. Yet this didn’t happen until September of 2012, five years after the song was initially released.</span></p><p>What led to the sudden mainstream interest of a group we’ve been heralding as champions of rap music for over two decades? Pretty simply, the song was licensed for the 2012 Channel 4 Paralympics “Meet The Superhumans” ad campaign. After being heard by UK fans over and over again in the commercial, sales of the track surged, making it the biggest hit of the band’s career. Strangely enough, ask any die-hard P.E. fan what their favorite song is from the band and you’re far more likely to hear “Fight the Power,” “Bring the Noise” or many other late 80s classics named.</p>', '909671446547470.jpeg', '0px -42px', 0, '2015-11-03 10:46:52', 2, 10001),
(1005, 'The other side', '<p>When I worked as a UX Researcher at Google and it was time to communicate things we learned, I found it hard to get time on the calendars of the people with most influence. I believed that they didn’t care enough. And I believed it was my job to make them care more. I was likely wrong on both counts.</p><p>When I joined Facebook the first thing I did was a user research study on our Ad Units. I was working on persuading the Product Manager (person of most influence) that there were four critical things that needed to change. In a funny twist of fate, that PM left and I stepped into their shoes. I was now persuading myself. And I didn’t prioritise any of the four. I was on the other side, and things looked a lot different.</p><p>Now at Intercom I run a team of over 20, including PMs, Designers and Researchers. We’re growing so fast, my calendar is nuts, and I’ve no time to read research reports, never mind watch studies. I care deeply, but I’m on the other side.</p><blockquote>The irony of many UX people (my past self included) is that in fighting the good fight, they lose empathy for their peers. Empathy – the one thing they specialise in.</blockquote><p>So next time, make sure you take a temporary trip to the other side.</p>', '', '', 0, '2015-11-03 10:49:06', 20, 10000),
(1006, 'Steve jobs quotes', '<h4><i>Top 5 Steve Jobs quotes</i></h4><h5>1. One''s who are crazy enough to think that they can change the world are the only one''s who change it.</h5><p><br></p><h5>2. Be a yardstick of quality because some people aren''t used to an environment where excellence is expected.</h5><p><br></p><h5>3. The best and most innovative products don''t always win...(it''s an) aesthetic flaw in how the universe worked.</h5><p><br></p><h5>4. Simple can be harder than complex, you have to work hard to get your thinking clean to make it simple. But its worth it in the end because as you get there you can move mountains.</h5><p><br></p><h5>5. If you want to live your life in a creative way, as an artist, you have to not look back too much. You have to be willing to take whatever you''ve done and whoever you were and throw them away.</h5><p><br></p>', '8978701446547733.jpeg', '0px 0px', 0, '2015-11-03 10:49:19', 12, 10002),
(1007, 'A Click-Bait Experiment, and the Navel-Gazing Problem that Threatens to Ruin Medium', '<p><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">As I write this paragraph, the Top 20 stories on Medium have some common themes. One is about getting dumped, another is about getting hired. Another is about Twitter (of course). Several are headlined with didactic commands of the “Live-this-way-or-your-life-will-be-shit” variety.</span><br></p><p>By my count, 14 out of 20 of them cover the sort of subjects that have come to monopolize the site’s bandwidth recently: ‘TECH’, ‘LIFE-HACKING’ and ‘ENTREPRENEURSHIP’ (this last being a sort of bastard offspring of the previous two)?—?let’s call these themes ‘The Medium Triumvirate’.</p><p>Because for anyone that hasn’t noticed, Medium has been hijacked. Not by terrorists, though that, while unwelcome, would arguably be more interesting. Instead, it’s been hijacked by life-hack gurus, designers and San Francisco people. And we, the people who don’t subscribe to life-hackery, who don’t work in design, and who don’t live in San Francisco, have had enough!</p><p>Back in September, I poked fun at this phenomenon with a post entitled ‘A Cynic’s Guide to Writing the Perfect Medium Post’. The implicit complaint?—?that Medium was becoming a tedious forum for the tech start-up community?—?received a lot of support, ranging from tacit head-nods to exasperated howls of agreement. But in the intervening weeks the scales have tipped yet further; now The Triumvirate seems more dominant than ever before!</p><p>So, in an attempt to demonstrate just how one-dimensional the Medium universe has become, I got all cunning…</p><h4>1. The Experiment</h4><p>This experiment?—?which, before anyone feels compelled to point it out, barely merits the label experiment?—?was born out of frustration.</p><p>In early October, I posted a piece about a charismatic one-legged man I met in Syria before the country descended into civil war. I published it under the headline:</p><p>‘Who Knows What’s Become of Charlie?’</p><p>Charlie was the feature story on The Coffeelicious, a publication with over 40,000 followers, for almost a week. In that time, it garnered a little over 400 views. Around half of those came from my own Facebook friends.</p><p>Perhaps the article was a bit shit— what seemed evocative and poignant about Charlie to me may not have affected others in the same way. The story was niche, certainly, and perhaps a little maudlin. But I believed in it enough to question whether it had found its audience.</p><p>And so I re-posted the piece, but this time I used a completely irrelevant title, parodying the same life-hack puffery, full of the promise of self-improvement and hero-emulation, that seems to be metastasizing across the Medium platform. Chuckling irreverently as I typed the words, I went for:</p><p>‘Elon Musk Just Revealed a Simple Hack that Could Transform Your Life.’</p><p>Then I changed the tags. Gone were ‘Syria’, ‘Travel’ and ‘War’. In came ‘Tech’, ‘Life lessons’ and ‘Entrepreneurship’.</p><p>Now, we all know how click-bait works. Garnish your post with a photo of a cute little kitten and animal-lovers will flock to your button like zombies to a brain smorgasbord.</p><p>It is an act of deception and, as such, was bound to provoke some small hostility (although the guy who replied with: “If I could vote for you to be banned, I would,” was probably taking his chagrin a bit far). But most people didn’t seem too put out by the dissemblance, with several confessing that they wouldn’t have clicked without the tantalising headline, but enjoyed the post all the same.</p><p>Bottom line: the piece got read. Roughly fifteen times as many people read the piece under the Elon Musk title, ten times as many recommended it.</p><p>But what does this result say about The State of Medium? Here, for what it’s worth, is my conclusion.</p><h4>2. Conclusion</h4><p>To state the obvious, good writing (if you’ll allow me to assert that my writing is at least ‘good’) does not presently guarantee an audience on Medium.</p><p>There have been some welcome anomalies recently: ‘How to Lose Weight in Four Easy Steps’ by Aaron Bleyaert, and ‘When I’m Gone’ by Rafael Zoehler to name the two most block-busting examples.</p><p>For the most part, though, The Triumvirate is all-pervasive.</p><p>Tech-illiterate as I am, I have no idea how Medium’s ingenious algorithms endeavor to filter and curate material to position it in front of the right eye-balls. But what I have noticed is that most of the stuff I see on my homepage lands there courtesy of Medium’s most active and powerful users.</p><p>A disproportionate number of these ‘super-users’ are, themselves, ‘tech’ people. Many of them work for Medium, or write for one or other of Medium’s in-house publications. I’m willing to bet a disproportionate number of them live in San Francisco’s tech-start-up bubble.</p><p>Whether or not you follow these super-users (and many of them write beautifully), the stories they recommend are the ones that get circulating. And if most of the super-users are nerds it’s inevitable that articles from the TECH-LIFEHACK-ENTREPRENEURSHIP sphere will be the ones that come to dominate the site.</p><p>Alas, unless something changes it will only get worse.</p><p>The ease with which Triumvirate articles?—?even depressingly hollow ones?—?accrue views and Recommends provides an irresistible incentive for other people to follow the formula. As a result, Medium risks becoming a click-bait factory, a lame production line pumping out articles around the same limited themes.</p><p>Before long, this one-dimensionality will be all the site is known for.</p><p>“You know what I need, Kevin,” you’ll say to your friend Kevin. “I really need a 24-year-old tech start-up CEO living in the Bay area to tell me how to live my life, y’know?”</p><p>And Kevin will say: “Hell, you’d better get yourself over to Medium! They’ve got tons of that condescending shit on there.”</p><p>If Medium is serious about attracting?—?and holding the attention of?—?a truly diverse community, it needs to radically improve the means by which authors of every stripe can find an audience. Because for all the honorable clichés writers like to spout about writing for themselves, writing for the love… that is why we’re on here. To be read.</p><p>Otherwise we’re just pissing words into the wind.</p>', '1279911446547692.jpeg', '0px -197px', 0, '2015-11-03 10:50:05', 12, 10001),
(1008, 'The Hackathon Approach to Building Digital Products', '<p>I love hackathons. I usually don’t win anything, but the feeling of building a product, seeing people try it, and convincing yourself that this is huge and you’re going to work on this further is a great feeling.</p><p>Recently at a hackathon at my company, we got together a group of 9 people who’d mostly never worked together before and formed a team. I’m not going to talk about team dynamics, managing expectations or 21 ways to prepare yourself for a hackathon, but more about how the experience formed an approach to product building that I’m currently experimenting with.</p><p>We decided to build an app that lets you play music and listen to it with a friend real-time. Couple hours into the design and development, we had a working prototype that used the Spotify API and had chat. The experience of using it was phenomenal. After spending about 45 minutes playing music for a friend on the app, I realised what a huge impact prototyping the core experience of the app can have. I could never have anticipated how insanely FUN it would be to feel like a DJ for your friend.</p><p>I could have definitely created a bunch of screens, a marvel prototype, hypotheses on how great something like this could feel etc, but using this buggy, hard coded version that played real music was beautiful. It was validation of this idea beyond my own expectation.</p><p>The next question to me was – how do you simulate a hackathon environment? How do you artificially create constraints to trick your mind into letting it all out? Saying “I’m going to do this task over the next 48h” just doesn’t work, at least for me.</p><p>I’m proposing a prototyping process I call the Weekender (I literally came up with the name while writing this). The Weekender involves picking two days, preferably a weekend, and imposing a deadline that is REAL. One that you can’t take lightly.</p><p>For my first experiment, I decided to apply this to working further on our music app. I flew to Delhi the next weekend on a whim to meet part of the team that was based there (and wanted to work on this project beyond the hackathon) The imposed deadline was that I’d be flying back at the end of this weekend, and we had to achieve all the design work required for the next development cycle, work that needed a high level of collaboration and would be hard to achieve remotely.</p>', '7921701446547802.png', '0px -39px', 0, '2015-11-03 10:50:30', 25, 10000),
(1009, 'Search Engine Marketing', '<p>If you’re one of the teeming millions using the dating app Tinder (Android, iOS), then you’re already intimately familiar with the card-swiping system. Interaction with user profiles is as simple as a swipe right for yes, left for no. Would-be suitors fly off the screen akin to flipping through a stack of Polaroids. According to Tinder co-founder and CEO Sean Rad, inspiration for Tinder’s format did in fact come from piles of photos and playing cards.</p><p>The card-based UI updates the classic way in which we’ve always interacted with physical cards. When you think about it, cards are nothing more than bite-size presentations of concrete information. They’re the natural evolution of the newsfeed, which is useful for reading stories but not for making decisions.</p>', '6140651446547837.jpeg', '0px -21.469px', 0, '2015-11-03 10:51:01', 4, 10002),
(1010, 'This Is How You Train Your Brain To Get What You Really Want', '<p>Approximately six months ago, I got serious about my goal to become a professional writer. I had written an eBook and was anxious to know how to traditionally publish it.</p><p>I decided literary agents would be my best source of advice. After all, they know the publishing industry back-and-forth?—?or so I thought. After talking to 5–10 different agents about their coaching programs, it became apparent my questions would need to be answered elsewhere.</p><p>One particular conversation sticks out.</p><p>In order to even be considered by agents and publishers, writers need to already have a substantial readership (i.e., a platform). I told one of the agents my goal was to have 5,000 blog subscribers by the end of 2015. She responded, “That would not be possible from where you currently are. These things take time. You will not be able to get a publisher for 3–5 years. That’s just the reality.”</p><p>“Reality to who?” I thought as I hung up the phone.</p><p>Never Ask Advice From…</p><p>In his book, The Compound Effect, Darren Hardy said, “Never ask advice of someone with whom you wouldn’t want to trade places.”</p><p>As I pondered this quote, I realized I was asking the wrong types of people for advice. I needed to turn to people who had actually walked where I wanted to walk. Anyone can provide nebulous theory. We spend our entire public education learning theory from people who have rarely “walked the walk.” As Jack Black said in School of Rock, “Those who can’t do, teach.” Similarly, there is an endless supply of content being published everyday by people who rarely practice the virtues they preach.</p><p>Contrary to theory, which cannot get you very far in the end, people who have actually been “there” provide practical steps on what you need to do (e.g., here are the five things you should focus on and forget everything else).</p><p>Why You Need To Know What You Want</p><p>“This is a fundamental irony of most people’s lives. They don’t quite know what they want to do with their lives. Yet they are very active.”?—?Ryan Holiday</p><p>Most kids go to college without a clue why they are there. They are floating along waiting to be told what to do next. They haven’t seen or thought enough to know what their ideal life would look like. So how could they possibly know how to distinguish good advice from bad?</p><p>Conversely, people who know what they want in life see the world differently. All people selectively attend to things that interest or excite them. For example, when you buy a new car, you start to notice the same car everywhere. How does this happen? You didn’t seem to notice that everyone drove Malibus before.</p><p>Our brains are constantly filtering an unfathomable amount of sensory inputs: sounds, smells, visuals, and more. Most of this information goes consciously unrecognized. Our focused attention is on what we care about. Thus, some people only notice the bad while others see the good in everything. Some notice people wearing band shirts, while others notice anything fitness related.</p><p>So, when you decide what you want, it’s like buying a new car. You start seeing it everywhere?—?especially your newsfeeds!</p><p>What are you seeing everywhere? This is perhaps the clearest reflection of your conscious identity.</p><p>The Magical Things That Happen When You Begin Paying Attention</p><blockquote>“How can you achieve your 10 year plan in the next 6 months?”<br>–Peter Thiel</blockquote><p>Wherever it is you want to go, there is a long and conventional path; and there are shorter, less conventional approaches. The conventional path is the outcome of not paying attention. It’s what happens when you let other people dictate your direction and speed in life.</p><p>However, once you know what you want?—?and it intensely arouses your attention?—?you will notice simpler and easier solutions to your questions. What might have taken 10 years in a traditional manner takes only a few months with the right information and relationship.</p><p>“When the student is ready the teacher will appear.”?—?Mabel Collins</p><p>When I decided I was serious about becoming a writer, the advice from the literary agents couldn’t work for me. I was ready for the wisdom of people who were where I wanted to be. My vision was bigger than the advice I was getting.</p><p>Around this same time and out of nowhere, I came across an online course about guest blogging. It must have popped in my newsfeeds because of my previous searching. I paid the $197, went through the course, and within two weeks was getting articles featured on multiple self-help blogs.</p><p>Within two months of taking the course, I wrote a blog post that blew up. Tim Ferriss has said, “One blog post can change your entire life.” This principle holds true of anything you do. One performance, one audition, one interview, one music video, one conversation… Thus, the focus should be on quality rather than quantity.</p><p>Two months after being told it would take 3–5 years to have a substantial following, I was there. When you know what you want, you notice opportunities most people aren’t aware of. You also have the rare courage to seize those opportunities without procrastination.</p><p>Courage doesn’t just involve saying “Yes”?—?it also involves saying, “No.” But how could you possibly say “No” to certain opportunities if you don’t know what you want? You can’t. Like most people, you’ll be seduced by the best thing that comes around.</p><p>But if you know what you want, you’ll be willing to pass up even brilliant opportunities because ultimately they are distractors from your vision. As Jim Collins said in Good to Great, “A ‘once-in-a-lifetime opportunity’ is irrelevant if it is the wrong opportunity.”</p><p>“Once-in-a-lifetime” opportunities (i.e., distractors) pop up everyday. But the right opportunities will only start popping up when you decide what you want and thus, start selectively attending to them. Before you know it, you’ll be surrounded by a network you love and by mentors showing you the fastest path.</p><h3><b>Conclusion</b></h3><p>Ralph Waldo Emerson once said, “Once you make a decision, the universe conspires to make it happen.” This quote is completely true. Once you know what you want, you can stop taking advice from just anyone. You can filter out the endless noise and hone in on your truth.</p><p>Eventually, you can train your conscious mind to only focus on what you really want in life. Everything else gets outsourced and forgotten by your subconscious.</p><p>Decide what you want or someone else will.</p><p>You are the designer of your destiny. What will it be?</p><h3>Connect Deeper</h3><p>If you resonated with this content, and want more, please subscribe to my blog. You’ll get my eBook Slipstream time hacking. This eBook will transform your life.</p>', '8132401446547824.jpeg', '0px -39px', 0, '2015-11-03 10:52:27', 12, 10001),
(1011, 'Native Apps are dying', '<p>If you pay attention what Apple and Google are doing with their OSs, a very similar strategy pattern emerges. Unbundling the app functionalities and shifting users from apps to the OS home screen and Notification center.</p><p>Sure, this will not go easy and fast. Apps will not suddenly disappear. People are very much used to apps and using them for single-purpose tasks. Still there will be beautiful apps for us to explore when we want a detailed rich experience.</p><p>However with every new OS push people will start forgetting about them. Why? Because all the major functionalites will move to the home screen and notification center. Complete with actionable use right from the OS/notification center.</p><p>Just few examples of this trend is the new 3D touch, actionable notification center and Google Now on Tap.</p><p>For now we need the apps to provide the content and the data. But thinking even more in the future, what if apps start living in the “cloud” and the OS just pulls data and content from them?</p><p>I see a future where people will not think what app to download to complete a specific task. Instead they will simply state their intention in somekind of a search box (or Siri/Google Now/Cortana) and immediately get what they are looking for.</p><p>In the background the OS will search and contact all the “cloud apps” that may have what you are looking for and give you the best result.</p><p>So, in a broader sense the “war” isn’t between Apple and Google, it’s between Facebook and the OS’s. For Facebook the app is the platform and they don’t want you to ever leave their “internet”.</p><p>Even today, most of our time we already spend in the notification center. I imagine a new, rich, intelligent AI driven notification center becoming the “hub” for everything.</p>', '6417831446547944.jpeg', '0px 0px', 0, '2015-11-03 10:52:33', 4, 10002),
(1012, 'When Simplicity Isn’t the Answer?—?Designing for Vastly Different Audiences', '<p>Not everything requires high fidelity prototyping, though. For quickly testing user flows, Marvel is our go-to. Coupled with their new user testing feature that lets you record both the screen and the person using the prototype, it’s incredibly valuable for usability tests.</p><p>We require all custom animations to be prototyped and tested thoroughly. They should serve a purpose in informing users of interface transitions and guiding them to achieve the intended outcome. Take for example the animation for our checkout flow. The checkout button would originally invoke a distinctly different screen even though a part of the interface is shared with the previous screen. With the update, the two screens were combined into one continuous screen, animated to explain their connection. The animation also works in tandem with a swipe gesture which quickly activates the checkout process.</p>', '9009901446547937.gif', '0px 0px', 0, '2015-11-03 10:52:42', 4, 10000),
(1013, 'What’s new for designers, October 2015', '<p>In this month’s edition of what’s new for designers and developers, we’ve included lots of startup resources, productivity tools, educational tools, freelancing resources, JavaScript resources, podcasts, inspiration sources, CSS resources, and much more. And as always, we’ve also included some awesome new free fonts!</p><p>Almost everything on the list this month is free, with a few high-value paid apps and tools also included. They’re sure to be useful to designers and developers, from beginners to experts.</p><p>If we’ve missed something that you think should have been on the list, let us know in the comments. And if you know of a new app or resource that should be featured next month, tweet it to <a href="http://twitter.com/cameron_chapman">@cameron_chapman</a> to be considered!</p><p><b>Fizzle</b></p><p>Fizzle offers online business training and a community of entrepreneurs for support. You can get one month for free, with monthly subscriptions for only $35.</p><p><b>Annex</b></p><p>Annex is a simple task tracking and productivity app. It’s not “smart”, doesn’t offer automation, and it doesn’t have AI, so it requires your attention (just like your productivity).</p>', '8111161446548042.jpeg', '0px -43px', 0, '2015-11-03 10:55:12', 4, 10002),
(1014, '7 Important Habits That Will Boost Your Intelligence', '<p>Everyone has different abilities when it comes to solving problems, thinking logically, and acquiring new knowledge.&nbsp;<span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">Your brain needs exercise just like a muscle. If you use it often and in the right ways, you will become a more skilled thinker and increase your ability to focus.&nbsp;</span><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">Changing your daily routine actually enhance your intelligence. These are a few of the many habits that can benefit your brain.</span></p><h5><b>1. Nothing beats a curious mind</b></h5><p>“I have no special talents. I am only passionately curious.” -Albert Einstein</p><p>How curious are you? Don’t take things on face value. Go deeper into how things work. Question most things. Be genuinely interested in new subjects.</p><p>Start the curious habit of questioning everyday things, products or services. Stretch your brains to get answers to questions you mostly ignore.</p><p>Never stop questioning. Curiosity has always been an important trait of a genius. A curious mind can relate and connect ideas better. Maintain an open mind and be willing to learn, unlearn and relearn.</p><h5><b>2. Read outside your scope</b></h5><p>Don’t just read fiction or non-fiction materials. Learn outside your industry. Read a history of human evolution, space travel or on a topic you will not mostly go for. Be curious about other industries. Choose books on different subjects. Read outside your comfort topics.</p><p>Read biographies of great inventors. Get out of your comfort zone once a while. You will not only improve and expand your knowledge, but you will also be a better conversationalist.</p><h5><b>3. Stick to real-world brain exercises</b></h5><p>Activities like testing your recall, figuring out problems without the help of technology, taking up a new hobby have proven to be good for the brain.</p><p>They stimulate and boost your brain. Stick to brain activities that involve real-world activities and are challenging.</p><p>When you are able to master a brain activity, move to another one. Don’t get comfortable. You are not looking for fun. The only way to cognitive improvement is to start doing activities you are worst at. Strive for challenges that will keep you thinking.</p><p>Physical exercise is great for your body. And mental exercise is equally important for your brain health. There are no shortage of brain training apps that offer daily exercises designed to boost your brain power.</p><p>Getting smarter is not an easy process. But in the end, you can improve you memory and problem solving skills.</p><h5><b>4. Getting in shape builds your mind</b></h5><p>Don’t just play brain training games on the couch, get physically active. If you want to improve your brain’s power, commit to a healthy exercise routine. Mental games are helpful, but they need to be done in combination with other activities to boost your brain muscles.</p><p>Physical activity establishes better blood flow to your brain. And it also triggers a surge of proteins that can help stimulate the growth of neural connections in the brain.</p><h5><b>5. Choose to learn something new</b></h5><p>Exercise your creative genius. Anything new to your brain can stimulate it. Different skills, ideas, cultures, and opinions can have a positive effect on your own views about the world.</p><p>Steve Job’s calligraphy course in college helped build the first Mac. In his famous 2005 Commencement speech for Stanford University, Jobs said: “If I had never dropped in on that single calligraphy course in college, the Mac would have never had multiple typefaces or proportionally spaced fonts.”</p><p>You never know what will be useful ahead of time. Try new skills and they will connect with the rest of your skills in the future.</p><h5><b>6. Subscribe to blogs that focus on thought-provoking posts</b></h5><p>Never stop learning. Subscribe to interesting blogs that share insightful posts that stimulates the mind. There are interesting websites that provide answers to questions you weren’t even aware you were asking.</p><p>Focus on posts that cultivate and expand your curiosity. If you don’t want to subscribe to additional newsletters, Pocket is a super quick and simple way to save the best posts on your favourite sites for later reading.</p><h5><b>7. Start reflecting on what you have learned by blogging</b></h5><p>Apart from becoming a better writer, blogging can help you organise your thoughts. Blogging encourages deep thinking. When you begin to share what you know with others, your ability to communicate gets better. Blogging helps your brain to stay active. You will also be able to link ideas and pieces of information better.</p><p>Once you commit to the habit of reading about your industry and sharing what you know with your audience, you will begin to comprehend and process information faster.</p><p>Getting you brain active again requires some amount of effort. Start doing sufficient mental and physical exercises. Plan on getting better sleep. And start eating healthy again.</p><p>It’s a slow process, but once you commit to it, you can significantly improve your brain power. It’s definitely not easy but it’s worth your precious time. Change is hard. But it’s also beneficial for your mind.</p><p>The author is the founder at Alltopstartups (where he shares resources for startups and entrepreneurs) and the curator at Postanly (a free weekly newsletter that delivers the most insightful long-form posts from top publishers).</p>', '4003811446548012.jpeg', '0px -99px', 0, '2015-11-03 10:55:44', 21, 10001),
(1015, 'Force Touch', '<p>iPhone 6s introduces an entirely new way to interact with your phone. For the ?rst time, iPhone senses how much pressure you apply to the display. In addition to familiar Multi?Touch gestures like Tap, Swipe, and Pinch, 3D Touch introduces Peek and Pop. This brings a new dimension of functionality to the iPhone experience. And when you use 3D Touch, your iPhone responds with subtle taps. So not only will you see what a press can do you’ll feel it.</p><h4><b>Quick Actions.<br> A shortcut to the things you do the most.</b></h4><p>Quick Actions let you do the things you do most often faster and in fewer steps. You can start a message to your favorite contacts. Or instantly bring up the camera to snap a selfie. Or immediately get directions home. Many of these actions can even be done with a single press, right from the Home screen.</p><p>Many Quick Actions work right from the Home screen and require only a single press. For example, just press the Phone icon to quickly call one of your favorite contacts.</p>', '3799921446548492.gif', '0px -26px', 0, '2015-11-03 11:01:53', 4, 10002);
INSERT INTO `thread` (`srno`, `title`, `description`, `imagepath`, `coordinates`, `edit`, `timestamp`, `cid`, `uid`) VALUES
(1016, '24 tremendous things to do in NYC this week', '<h5><b>November 2</b></h5><p><b>Aziz Ansari: Master of None talk and screening 92nd Street Y; 7:30pm; $55</b></p><p>The former Mr. Tom Haverford is making his coup on Netflix this month with new series Master of None. Catch the first episode of the Louie-esque show and hear the sharp-tongued comedian talk about romance in NYC at this special preview event. </p><p><b>Spooky Fest 3 Videology, Brooklyn; 8pm; free</b></p><p>Indulge in filthy horror decadence without wasting too many hours at this short film fest, which features more than 25 fun-size slasher movies. A short running time and a high body count does a perfect horror movie make. </p><p><b>Kendrick Lamar Webster Hall; 9pm; $TBA</b></p><p>If you’re still down to party like a lunatic after the costumes are gone and the candy corn has been eaten, head to Webster Hall and get down to hits like “Alright” and “Swimming Pools” at the unstoppable rapper’s live show.</p><h5>November 3 </h5><p><b>Dear White People BAM Rose Cinemas, Brooklyn; 4:30, 7, 9:30pm; $7–$14</b></p><p>BAM’s weeklong “Behind the Mask: Bamboozled in Focus” series introduces you to some of cinema’s most underrated racial and media satires. Catch up on last year’s biting indie Dear White People, about a college radio station that ignites controversy when it takes a radical civil rights stand.</p><p><b>TED Talks Live: War &amp; Peace The Town Hall; November 3 and 4 at 7:30pm; $100</b></p><p>Join Girls’ Adam Driver, glam-rock superstar Rufus Wainwright and many more talented acts as they take on the consequences and possible outcomes of contemporary war through performance, discussion and readings.</p><p><b>JoJo The Marlin Room (at Webster Hall); 8pm; sold out</b></p><p>Nothing says 2004 better than JoJo. Though you may be content to sing along to “Leave” all night, the former teenybopper will prove she has more in her arsenal than the best of her middle school years, with pounding new pop ballads from her upcoming album.</p><p><b>Ra Ra Riot + PWR BTTM Baby’s All Right, Brooklyn; 8pm; $20</b></p><p>Some of Brooklyn’s sharpest pop aficionados will get sweaty in Baby’s All Right’s vibrant back room for this combo show, featuring the upbeat dance grooves of indie darlings Ra Ra Riot and the uproarious, provocative noise of PWR BTTM.</p><p><b>Punderdome 3000 Littlefield, Brooklyn; 8pm; $6, at the door $7</b></p><p>Never ones to abandon a dead horse, ubiquitous comedian Jo Firestone and her dad Fred welcome contestants to the first-ever “Most Puntastic Halloween Costume Compuntition,” which will bury some of this year’s most cringe-inducing sartorial zingers.</p><p><b>Buddies Nowhere; 8pm; free</b></p><p>Some of the city’s bawdiest and most bodacious bears gather on the dance floor with the boys who love them at this weekly shindig. If you’re looking for a chill night out that doesn’t remind you of the previous hot mess of a weekend, you’re guaranteed a fun and responsible party at Nowhere bar.</p><p><b>David Mitchell 92nd Street Y; 8pm; $25</b></p><p>One of the most inventive, genre-busting writers in contemporary fiction sits down to discuss his bizarre narrative technique and read from his creepy new book of mysterious puzzles and soul-sucking vampires, Slade House. </p><h5>November 4</h5><p><b>SciCafe American Museum of Natural History; 7pm; free with R.S.V.P.</b></p><p>Grab a cocktail and learn something new at the most brain-beneficial happy hour in town. This month, neurological researcher Bridget Nugent discusses how sexual identity is determined by the development of the brain. At least you’ll be guaranteed stimulating conversation with whomever you meet at the bar.</p><p><b>Women of Letters Joe’s Pub at the Public Theater; 7pm; $20</b></p><p>Gather with some of the sharpest women in NYC for a night of passionate readings of letters under the prompt “a letter to my could have been.” Join Beasts of the Southern Wild writer Lucy Alibar, the Toast cofounder Mallory Ortberg, rapper Nyemiah Supreme and other prolific women for a unique, one-night-only performance.</p><p><b>Humans of New York: Stories Symphony Space; 7:30pm; $15–$30</b></p><p>Hear readings of some of the captivating on-the-street accounts from the latest Humans of New York collection by actors Jason Biggs, Elizabeth Rodriguez and more.</p><p><b>The Dump! Storytelling Open Mic The Creek and the Cave, Queens; 8pm; free</b></p><p>You better take every chance you can to release your anxieties and traumas before you have to face them at the family dinner table on Thanksgiving. Head to the Creek for this hilarious open mic bonding night, where you’ll have eight minutes to spill your guts in front of sympathetic strangers.</p><p><b>Lea DeLaria: House of David Smoke Jazz &amp; Supper Club; 11:30pm; $12 plus $20 minimum</b></p><p>The ruthless Orange is the New Black star and comedian shows off her prodigious vocal range and creative arrangements at this tribute show to David Bowie. Considering how many lame Ziggy Stardust bands are touring town, why not put your money in someone who really knows her stuff? </p><h5>November 5</h5><p><b>Spectre opens in theaters</b></p><p>Don’t let the Internet ruin 007 for you. Beat your friends to the punch and catch an early showing of Daniel Craig’s final Bond performance, before wanna-be fans storm the theaters (do they even know how to pronounce Léa Seydoux’s name?)</p><p><b>Canstruction Brookfield Place Winter Garden; 10am; free</b></p><p>Watch inventive designers and architects create massive Pop Art installations of Superman, Angry Birds, Slinkies and more out of hundreds of thousands of to-be-donated cans of food. Who knew the dregs of your pantry could be so beautiful?</p><p><b>Print Fair Park Avenue Armory; 12pm; $20</b></p><p>Deck out your apartment with rare finds and bold pieces from an endless range of well-known and on-the-rise artists. If you’re not looking to spend your rent on art, there’s plenty of affordable prints worth scouring the expo for.</p><p><b>Etsy Craft Night Etsy Labs, Brooklyn; 6pm; free with registration</b></p><p>While your friends are still bragging about their Halloween glue-gun exploits, get ahead of the pack and turn out your Christmas game early. Stationary wiz Jessica Marquez will teach you how to make beautiful custom gift tags for all your family members. Don’t you want to be the favorite child at the tree? </p><p><b>Isaac Oliver: Intimacy Idiot Joe’s Pub at the Public Theater; 7pm; $20 plus two-drink minimum</b></p><p>Didn’t find true love or even a one-night stand amid all the Halloween festivities? Commiserate with Oliver, the ultimate outsider anthropologist of single life in NYC. As he regales you with tales of alienation and mortification in social settings, you won’t feel nearly as bad for faking sick on Halloween night so you could watch Ally McBeal on Netflix.</p><p><b>Fluent City Videology, Brooklyn; 7pm; free with R.S.V.P.</b></p><p>Watch the black-and-white French thriller La Haine, featuring Vincent Cassel as a thug caught in an escalating conflict between brutal police and his friends from Paris’s banlieues. If you find yourself catching on to the French language, enter a raffle or book a class for after-work lessons with the Fluent City school. </p><p><b>BK Horror Club: You’re Next Throne Watches, Brooklyn; 9pm; $10</b></p><p>Grab a seat on one of the Throne Watches’ plush leather couches and delight in the bizarre rapture of watching a nice family get terrorized by psycopaths in animal masks. </p><p><b>Hasan Minahj: Homecoming King Cherry Lane Theatre; 9:30pm; $30­–$40</b></p><p>If you have a crush on the charming Daily Show correspondent, we can’t blame you. Head to Cherry Lane to see the sharp-witted comedian take center stage.</p><p><b>Boys’ Night: An All-Male Cirquelesque Revue Slipper Room; 10pm; $15–$25</b></p><p>The Slipper Room has handsome men of all sizes ready to strut, strip, bend, flex and a lot more at this wildly sexy circus night. You won’t believe what aerial and gymnastic feats these boys can pull off in so little clothing.</p>', '8989871446548509.jpg', '0px -185px', 0, '2015-11-03 11:02:00', 26, 10000),
(1017, 'A list of places to find the best free stock photos', '<p>Finding great stock photos is a pain. You’re left with either low-res amateur photos, people wearing cheesy headsets, or photos that are out of budget for the project you’re working on. Below is an ongoing list (so bookmark it) of the best stock photo sites I’ve come across.</p><p><br></p><p><ol><li><a href="http://unsplash.com/" style="font-family: Merriweather; font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">Unsplash</a><br></li><li><a href="http://join.deathtothestockphoto.com/" style="font-family: Merriweather; font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">Death to the Stock Photo</a><br></li><li><a href="http://nos.twnsnd.co/" style="font-family: Merriweather; font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">New Old Stock</a><br></li><li><a href="http://superfamous.com/" style="font-family: Merriweather; font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">Superfamous</a><br></li><li><a href="http://picjumbo.com/" style="font-family: Merriweather; font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">Picjumbo</a><br></li><li><a href="http://thepatternlibrary.com/" style="font-family: Merriweather; font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">The Pattern Library</a><br></li></ol></p><p><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;"><br></span></p><p><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">Know of any other great sites? Leave a note here and I’ll add it to the list.</span><br></p>', '173131446548374.png', '0px -179px', 0, '2015-11-03 11:03:16', 18, 10001),
(1018, 'What you need to know about those "selfie girls"', '<p>There’s this thing we do lately. Parents shame their kids on Facebook or Youtube when they step out of line, people shame moms for nursing their hungry babies in a restaurant, and on and on, and now THIS.</p><p>Maybe you watched this video when it came across your feed. And maybe you rolled your eyes or shook your head at how the girls behaved during the baseball game. Honestly? I did.</p><p>But those “selfie girls” reminded me of something important.</p><p>Here’s what you should know.</p><p><ol><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">The audience at the baseball game was ASKED to tweet selfies as part of a contest.</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">So these girls in the audience…took selfies. In other words, they participated in the event that was designed to engage the crowd.</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">By the looks of it, the girls had fun. They were being silly. Enjoying themselves. For this, the announcers mocked them. Shamed them. Their mockery went viral, and these girls had their faces plastered all over social media.</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">To apologize for the viral shaming incident, Fox Sports and the Arizona Diamondbacks offered free tickets to the girls.</span><br></li><li><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; font-style: normal; font-weight: normal; line-height: 1.5; word-spacing: normal;">The girls declined the free tickets. Instead, they asked Fox and the Diamondbacks to donate the tickets to families at A New Leaf, a non-profit that supports victims of domestic violence. Plus, with October being Domestic Violence Awareness Month, the girls used their newfound SHAME-FAME to encourage people to donate to the cause.</span><br></li></ol></p><p>That sounds like the behavior of a girl I’d be proud to call my daughter.</p><p>Well played, girls. And thank you for reminding me that I don’t always have the full story.</p>', '9382031446548652.jpeg', '0px -20px', 0, '2015-11-03 11:05:16', 21, 10002),
(1019, 'Review: Porcupine Tree [Lightbulb Sun]', '<p>Lightbulb Sun marks the solid continuation of Stupid Dream’s sound remaining very poppy and very accessible. While it may not be anywhere near as consistent as Stupid Dream, the album has its fair share of gems that make up for the album’s shortcomings. Unfortunately, the middle section of the album is extremely boring and it leaves much more to be desired considering the sheer potential of other songs on the record. Despite the blatantly mundane nature of some of the tracks on Lightbulb Sun, it is still another solid entry into the Porcupine Tree discography that will surely impress lovers of the Stupid Dream sound.</p><p>The inconsistencies of the record are crammed into the first half of the album. Thankfully, the album starts off great with Wilson’s brilliantly unusual lyrics and some fantastic guitar work in the title track. Sadly, the album drips in quality after the title track when we come to How Is Your Life Today? How Is Your Life Today is nothing more than a painfully dull piano driven track about a break up. The entire album may be about break ups, but some of the more masterful tracks on here handle the content better than this track. After How Is Your Life Today we come to Four Chords That Made a Million. Wilson repeats the title line over and over again and it is a love or hate song because it is catchy, but some could find the line being repeated extremely tiresome after a while. Thankfully, the quality begins to increase once we get to shesmovedon. It is far from the best track on the album because the first half is quite plain, but the second half redeems the entire song with an incredible guitar solo outro.</p><p>The rest of the album is smooth sailing from here on out. Last Chance to Evacuate Planet Earth before It Is Recycled is the most intriguing song on the album because it features two songs in one. The first part is Wilson recalling a childhood memory of a girl that he once cared about and then it changes into something drastically different. A man begins to preach about how planet earth is dying because of our consumerism and how we have one chance to leave before it is too late. It’s strange how the band chose to not spilt these parts up into two songs because they are totally different, but it surprisingly works seamlessly either way. After this track we begin the get into the more masterful songs on the album beginning with The Rest Will Flow.</p><p>The Rest Will Flow is an infectiously catchy song with beautiful instrumentals that have an amazing radio friendly appeal. After The Rest Will Flow the album begins the get more experimental and progressive with Hatesong. The song is without a doubt one of the most memorable songs on the album due to its memorable guitar work scattered throughout the entire song. The band’s musicianship really shines on this song and the musicianship only gets better as we come to the best three songs on the album.</p>', '5917421446548802.JPG', '0px -93px', 0, '2015-11-03 11:06:48', 15, 10000),
(1020, 'Can anyone tell me where this program is bugging?', '<pre>#include &lt;iostream&gt;<br>using namespace std;<br>/* Function arguments are of different data type */<br>long add(long, long);<br>int add(int, int);<br>int main()<br>{<br>   long a, b, x;<br>   float c, d, y;<br>   cout &lt;&lt; "Enter two integers\\n";<br>   cin &gt;&gt; a &gt;&gt; b;<br>   x = add(a, b);<br>   cout &lt;&lt; "Sum of integers: " &lt;&lt; x &lt;&lt; endl;<br>   cout &lt;&lt; "Enter two floating point numbers\\n";<br>   cin &gt;&gt; c &gt;&gt; d;<br>   y = add(c, d);<br>   cout &lt;&lt; "Sum of floats: " &lt;&lt; y &lt;&lt; endl;<br>   return 0;<br>}<br>long add(long x, long y)<br>{<br>   long sum;<br>   sum = x + y;<br>   return sum;<br>}<br>float add(float x, float y)<br>{<br>   float sum;<br>   sum = x + y;<br>   return sum;<br>}</pre><p> </p><p> </p><p> </p><p> </p><p> </p><p> </p><p> </p><p> </p><p> </p><p> </p><p> </p><p> </p><p> </p><p> </p><p> </p><p> </p><p> </p>', '', '', 0, '2015-11-03 11:07:49', 20, 10001),
(1021, 'the making of intersect', '<p>In a small neighborhood in East London called Wanstead, there is a Starbucks. This Starbucks is just like all others. Same smell, same taste, the same menu that never seems to change no matter where you are in the world. A couple of us on our team used to make this Starbucks an office before we were able to get our own place.</p><p>After months of getting to know the staff, and letting them know we were up to in North East London, we began to develop a friendship with the manager. We learned that he was interested in opening up his Starbucks for events that would benefit both the community and his coffee shop. He made a generous offer for us to use the facility after hours, and our Awaken group jumped on the opportunity to see what could happen.</p><p>This birthed something called the Awaken Gathering. We had a vision for a gathering that would allow us to meet in a third space away from our local church, bless everyone with a free cup of coffee, and host discussion about spiritual things. And we had the perfect resource to pilot with this group.</p><p>Before our first Gathering, Rob Peabody had been working with a very talented designer and videographer, Andrew Shepherd, to create a series of videos that told stories abut life and faith. Over a couple of years, Rob had been meeting interesting people that had one thing in common: their lives were not perfect, but they met a perfect God. Or to put it another way: God had intersected their lives amidst a time of struggle, uncertainty, or pain.</p><p>These videos could probably stand alone as far as story and quality, but our team thought there was more to this project. Another Awaken teammate, Dave, and I were tasked with writing discussion questions for each video that could spur on conversation based on the theme of each video. We created a short list of questions that would lead people through the video and deeper into the themes, all with the hope that men and women could think through how the stories and themes related to their own life. We ask: How does this story intersect with your life today?</p><p>Along with a personal story about themes like disappointment, control, and trust, each video contains a story about God. The Bible is full of stories of real people with real problems. And while each story may be different, we read countless stories of how God comes to meet the characters where they are. This is the God of the Bible: a God who meets humans in their messes and offers love, hope, and redemption. The best news is that God offers the same thing to us here and now.</p><p>Because we believe in this God, we knew that it was worth sharing these videos and prompting spiritual discussions at our Awaken Gatherings. We met once a month on a Thursday evening, encouraged our group to invite friends, watched each video, and discussed each theme in small groups. The result was introspective thinking and conversation about Intersect’s main theme of exploring where our stories and God’s story converge.</p><p>We created these videos a resource with hopes that you can do something similar in your own community. So gather a few friends, watch the videos, speak openly and honest about your life, and see where God has been waiting to meet you. Or to put it simpler: get it and use it.</p>', '5988721446548931.jpg', '0px -124px', 0, '2015-11-03 11:09:39', 8, 10001),
(1022, 'Speaking for Myself: the end of books and power', '<p><i>Going through old books is a lot like time travel. You end up asking yourself this question, “why the hell did I buy this book?” And you try to reconstruct yourself at the moment buying this book, remembering how you wanted this book over another book, and how you had to prioritise and stay within the budget (which you busted anyway), and then deciding that it was this book. Or how you came across this book purely via serendipity, because it looked great, or it appeared to be what you were looking for subconsciously, and you remember how, in previous occasions, those serendipity purchases were such great choices (no they weren’t). And you buy them. But now many years on, you are looking at them again, their page a bit yellowed (because you were on a tight budget (which you busted), and so you always bought the paperback edition), and how the writing is now hopelessly out of date and irrelevant. The topic is obviously no longer the flavour of the day, and the world moves on to other authors and other topics.</i></p><p><span style="color: rgba(0, 0, 0, 0.8); font-size: 11pt; line-height: 1.5; word-spacing: normal; font-weight: normal;"><i>Now I am looking at many titles, bought under a similar set of circumstances, and now with the privilege of hindsight, and beginning to rationalize all those decisions. Not justification, but just rationalizing?—?making sense, putting order to memories and nostalgia.</i></span></p><p><i>I remember that one impulse that led to the purchasing of this small library was indeed the Baconian ideal that knowledge could result in power. The naive 18-year-old younger self, would however, have no clue about the process of translating power from knowledge, only knowing accumulation. And so it goes.</i></p><p><i>Why do I want to keep knowing? Why this obsession? I had made Knowledge as part of my identity. And knowing always means knowing more. And more. Sort of like money, except its curiosity?—?what else is out there, what don’t I know yet, what’s out there for me to discover?—?but in it’s extreme its manifestation is no gentler?—?an obsessiveness that tires and eventually exhausts.</i><br></p>', '4901161446548901.jpg', '0px -50px', 0, '2015-11-03 11:10:21', 1, 10002),
(1023, 'GRAMMY-winning producer Danger Mouse draws inspiration from the Fab Four', '<p>I didn’t grow up on the Beatles. In fact, by the time I got to college I couldn’t have named one Beatles song if you put a gun to my head. Honestly. I listened to 80s pop when I was young, and mostly to hip-hop in middle/high school. My parents were exclusively 60s/70s soul/R&amp;B listeners, so I was oblivious. My tastes expanded a bit when I was in college, but the Beatles were always this huge group that I just thought couldn’t be all that interesting if they were so popular. Any pictures I remembered had them all dressed alike and smiling a lot. I like darker, melancholy music in general, so I was skeptical. However, as I got more into music, and even started making music, I started to hear more and more about how the Beatles had been a huge influence on much of the music I was discovering. I had some research to do. …</p><p>I bought the albums, read books and watched any documentaries I could find. What an unreal story. They were immediately a worldwide sensation by their early 20s. They wrote their own material when that was all but unheard of, worked their a**es off touring the world playing hit after hit. Girls and boys alike went crazy for them. Every year, from their first records in 1963, they got bigger and bigger and more influential in both music and popular culture.</p><p>However, the thing that really spoke to me was when at the peak of their career?—?with anything and everything a band at that time could have possibly wanted?—?they made a change. In 1966 the Beatles stopped playing live. The decision was one that allowed them to make music that wouldn’t have to be replicated at a concert. This would open up all kinds of opportunities for them to try different recording techniques and experiment in the studio in ways no one making popular music had ever really done. They pioneered things like guitar distortion, overdubbing vocals, multitrack recording, tape loops, and countless other recording techniques that are now standards today… even sampling. All of these things had influenced much of the music I’d loved growing up, and now it was making me really look at creating music as an art form.</p><p>In a five-year span the Beatles released Rubber Soul, Revolver, Sgt. Pepper’s Lonely Hearts Club Band,Magical Mystery Tour, The Beatles (the White Album), Abbey Road, and Let It Be?—?arguably the greatest span of consecutive albums put together by anyone to date. They tried to push boundaries musically and challenge what’s accepted of people in their popular position. Here was a band who had achieved the ultimate fame and fortune and instead of basking in more adoration, they veered away from millions of screaming girls to do something more challenging and meaningful to them. Of course, they didn’t really lose much of the fame and fortune after all, but that’s not the point. The point was that sometimes it’s not what you have, but what you choose to do with what you have that can change the world, and inspire other people to do the same.</p>', '1722131446549232.jpeg', '0px -44px', 0, '2015-11-03 11:14:25', 15, 10000),
(1024, 'Showman', '<p>B. N. Chatterjee was a funny looking man. Sitting there on his arm chair, the cane weave on the back creaked slightly as he shifted in his seat, he leaned forward every few minutes to relight the tobacco in his pipe. He dressed in a white kurta pajama and an ivory waistcoat with black piping, a uniform of sorts. A very thin, black-dyed mustache sat near his nose, a distance away from his thin, purplish lips.</p><p>I was eleven and this was my first trip to the school music room. A wonderful little place filled with sitars, mandolins, harmoniums, tablas and other delightful instruments, all begging me to touch them. I couldn’t resist, no one could, a ploink here, a thud there, everyone wanted to give it a go. Till some idiot would drop an instrument and Mr. Chatterjee would growl and in Bengali accented English, ask everyone to get out. But he was so funny looking, with his jet black hair (with some dye staining his scalp), his thick black glasses and his flaming red Bajaj scooter, that no one took him seriously. Much as he probably hated it, he knew the kids made fun of him and was quietly resigned to that fact.</p><p>Founder’s day was upon us. The show went off beautifully. The orchestra played proudly, practiced to perfection. I pretended to play, smiling for the cameras, trying to search for people I knew in the audience and make gleeful eye contact. After the performance we all gathered backstage, congratulating each other. Chatto was there, saying ‘Shabaash’ to his star pupils. Then, just as we were all about to disperse, he grabs my hand and says loudly,<br></p><h5><i><br></i></h5><h5><i>“I love this boy. He doesn’t know T of Tabla but he played like he was Zakir Hussain. Swinging his head and everything.”</i></h5><p><i><br></i></p><p>I didn’t know how to react, mainly because I didn’t know if he was being sarcastic or ridiculing me. But he kept going and there wasn’t any sarcasm in his voice. Mr. Chatterjee found it incredibly endearing that I would pretend-play with flair.<br></p>', '8337611446549252.jpg', '0px -74px', 0, '2015-11-03 11:14:30', 15, 10002),
(1025, 'Everybody Lies', '<p>After last season’s finale, House is now in prison for driving his car into Cuddy’s house and then fleeing the country for three months. In a meeting before the parole board, House is informed that due to prison overcrowding, he is due to be released in five days, as long as he can stay out of trouble. What follows is a week in the life of Gregory House, prisoner.</p><p>As the week start, we see him in line to receive his daily medication. He’s there not only to receive his Vicodin, but also to make sure his sociopathic roommate takes his medications. He also passes one of his painkillers as a “tax” to the head of the jail’s neo-Nazi gang.</p><p>Nick, a fellow prisoner, asks House for some medical advice, but House blows him off. Later in the day, when House is doing his rounds as a janitor, he is in the clinic when the doctors are examining Nick. Noting the joint pain and fever, Dr. Adams is prescribing ceftriaxone for a suspected case of gonorrhea. House jumps in, telling her it isn’t gonorrhea and suggests his thinning eyebrows suggest that Nick has lupus. Dr. Adams points out that he doesn’t have the classic malar rash so it can’t be lupus.</p><p>The next day, House checks out Nick himself and finds a rash (which he never describes, so it could be any kind of rash) on his left thigh, but Dr. Adams is unimpressed. Later that day, being jostled into a wall breaks Nick’s arm. Bones that break so easily don’t fit with lupus, so House realizes that cannot be the right diagnosis. During his janitor rounds, he discussed the case with Dr. Adams again. Viral syndrome and MRSA infection (antibiotic resistant Staph infection) are mentioned but quickly discarded. Knowing that Nick is a smoker, House now suspects that he has metastasic lung cancer (lung cancer which has spread to the bones, and bones with cancer break easier than normal bones), but it will take a couple days until an x-ray is available. This doesn’t sit well with House. Through an exceedingly thoroughly lung exam, including auscultation and percussion, he is able to convince Dr Adams that Nick has some sore of lung mass. She doesn’t have access to any stat labs or x-rays, so she decides to run an old fashioned bleeding time test (patients with cancer have blood that clots too easily, so she suspects his wound will clot sooner than expected), but instead of clotting, Nick bleeds profusely from his wound.</p><p>By the next day, an x-ray has been obtained but it shows a lipoma (a benign fatty lump) rather than a tumor. Dr. Adams suspects a toxin, but she is caught sharing patient information with House and no longer allowed to discuss cases with him. Later in the day, Nick comes to talk to House again. House tries to blow him off, but in the middle of it, Nick collapses in anaphylactic shock. Luckily, House has a convenient ballpoint pen to perform an emergency tracheotomy and save the patient’s life. House’s suspicions are pointing toward some sort of allergy, probably a food allergy, at this point.</p><p>On his final day, House has his Eureka! moment when he sees a prisoner drinking a hot cup of coffee. He realizes that Nick has mastocystosis, which caused an anaphylactic attack when he drank hot coffee. House wants to give some aspirin to Nick in an attempt to induce an anaphylactic attack, which would prove the mastocytosis, but Dr. Adams supervisor won’t allow it. A short while later, House intentionally enrages the neo-Nazis in order to get himself beat up so he would get sent to the clinic (whether the riot that followed was part of his plan or not). Once in the clinic, though he threatened with the loss of his parole, he gets Nick to drink the aspirin. As House is dragged away, despite drinking the aspirin, Nick remains symptom free.</p><p>When last we see House, he is locked up in the solitary wing of the prison. A meal tray arrives, along with a note that says, “You were right.”</p>', '9750581446549197.jpg', '0px -194px', 0, '2015-11-03 11:15:23', 27, 10001),
(1026, 'The Psychology of Numbers in Design', '<h5><i>When it comes to numbers, we’re not as rational as we think we are.</i></h5><p><br></p><p>Traditional economic theory has long assumed that humans are logical, unemotional, and make decisions that are in our own self-interest. In recent years, however, the growing field of behavioral economics has revealed that this assumption is flawed?—?humans are in fact complex beings who often rely on emotion and reflex to make decisions, even if those decisions sometimes defy rationality.</p><p>At Opower, our design team thinks deeply about how to combine useful and delightful user experiences with behavioral science to motivate everyone on earth to save energy. We believe that understanding the psychology and science behind how people interpret information, make decisions, and take action enables us to deliver more effective designs that help us achieve our goal.</p><h5><b>Glass half full or half empty?</b></h5><p>Consider a glass of juice, filled to the midpoint. If asked to describe the contents of the glass, you could respond in a myriad of ways. You could say that the glass is half full, half empty, contains 8 ounces, 110 calories, 20 grams of sugar, or 200% of your daily Vitamin C?—?these all accurately represent the contents of the glass, but our brains don’t necessarily respond to these descriptions in the same way. This phenomenon, known as <b>framing effects</b>, explains how the same information, presented with slight variations, can drastically impact our perceptions and influence our decisions.</p><h4>It’s all relative</h4><p><b><br></b></p>', '', '', 0, '2015-11-03 11:17:47', 21, 10002),
(1027, 'jQuery Drag-and-Drop Image Upload Functionality', '<p>Drag''n''drop requires a HTML5 browser - but that''s pretty much all of them now.</p><p>I''d recommend not starting from scratch as there''s quite a bit of code needed - I quite like this wrapper that implements it as a jQuery plugin.</p><p>After defining an element in the document with class div, you can initialise it to accept dropped files with:<br></p><pre>function fileDocOver(event){<br>    $(''#fileDropTarget'').css(''border'', ''2px dashed #000000'').text("Drop files here");<br>}<br>$(".fileDrop").filedrop({<br>            fallback_id: ''fallbackFileDrop'',<br>            url: ''/api/upload.php'',<br>            //    refresh: 1000,<br>            paramname: ''fileUpload'',<br>            //    maxfiles: 25,           // Ignored if queuefiles is set &gt; 0<br>            maxfilesize: 4,         // MB file size limit<br>            //    queuefiles: 0,          // Max files before queueing (for large volume uploads)<br>            //    queuewait: 200,         // Queue wait time if full<br>            //    data: {},<br>            //    headers: {},<br>            //    drop: empty,<br>            //    dragEnter: empty,<br>            //    dragOver: empty,<br>            //    dragLeave: empty,<br>            //    docEnter: empty,<br>            docOver: fileDocOver,<br>        //  docLeave: fileDocLeave,<br>            //  beforeEach: empty,<br>            //   afterAll: empty,<br>            //  rename: empty,<br>            //  error: function(err, file, i) {<br>            //    alert(err);<br>            //  },<br>            uploadStarted: fileUploadStarted,<br>            uploadFinished: fileUploadFinished,<br>            progressUpdated: fileUploadUpdate,<br>            //     speedUpdated\n});</pre>', '', '', 0, '2015-11-03 11:17:48', 20, 10000),
(1028, 'The Question That Could Unite Quantum Theory With General Relativity', '<h3>Is Spacetime Countable?</h3><h6><i>Current thinking about quantum gravity assumes that spacetime exists in countable lumps, like grains of sand. That can’t be right, can it?</i></h6><p>One of the big problems with quantum gravity is that it generates infinities that have no physical meaning. These come about because quantum mechanics implies that accurate measurements of the universe on the tiniest scales require high-energy. But when the scale becomes very small, the energy density associated with a measurement is so great that it should lead to the formation of a black hole, which would paradoxically ruin the measurement that created it.</p><p>These kinds of infinities are something of an annoyance. Their paradoxical nature makes them hard to deal with mathematically and difficult to reconcile with our knowledge of the universe, which as far as we can tell, avoids this kind of paradoxical behaviour.</p><p>So physicists have invented a way to deal with infinities called renormalisation. In essence, theorists assume that space-time is not infinitely divisible. Instead, there is a minimum scale beyond which nothing can be smaller, the so-called Planck scale. This limit ensures that energy densities never become high enough to create black holes.</p><p>This is also equivalent to saying that space-time is discrete, or as a mathematician might put it, countable. In other words, it is possible to allocate a number to each discrete volume of space-time making it countable, like grains of sand on a beach or atoms in the universe. That means space-time is entirely unlike uncountable things, such as straight lines which are infinitely divisible, or the degrees of freedom in the fields that constitute the basic building blocks of physics, which have been mathematically proven to be uncountable.</p>', '1620651446549644.png', '0px -32px', 0, '2015-11-03 11:21:09', 22, 10002),
(1029, 'The illusion of duality a rant about life, death, heaven and hell.', '<p>I don’t believe in God and I’m not Atheist. I’m not agnostic either because I don’t believe God is unknowable. Perhaps it’s better to clarify: <b>It’s not that I don’t believe in God; it’s that I don’t believe in the myth that God has become.</b></p><p>Surely, I can’t be the only person who sees a problem arising when a well-intended individual tries to shove their idea of God in a box and wrap it up tight with a bow so it stays together and looks pretty.</p><p>I believe “God” and the “Devil” are a myth—an idea—something to explain “good” and “bad.” Religion aims to reach a state of transcendence, to help an individual feel connected to and part of God—all which is good; all that comes from within. The idea of the Devil, Satan or the Adversary is a belief that explains that which is bad, and it pacifies and helps us distance ourselves from It—as if It were something external to ourselves.</p><p>The truth is that both God and the Devil are natives of our soul. For it is we who create our reality, develop reason for the unexplainable, and give purpose to an otherwise meaningless existence. But to believe that God and Devil are separate from us is to do ourselves an injustice—a cancer-causing complacency and ignorant passivity. To become open to the possibility of this truth is to emancipate our consciousness and become active agents of life [and death].</p><h5>It has been argued that life, without death loses all meaning.</h5><p>I agree that the mystery of death does create a sense of urgency and a sense of duty to humankind. Yet I further comprehend that life and death are not contradictory, but rather complementary parts of a singular concept. There is no night without day, joy without sadness, triumph without regret, pain without pleasure, success without failure. A transcendental understanding occurs when two corresponding halves are appreciated as one whole.</p><p>Everything has its opposite that complements and defines the other—it is the balance of mathematics, the harmony of music. It’s heaven and hell, and it’s all here…right now. As we become observers of our personal experience, we come to realize that we will find purpose and satisfaction, not in seeking the meaning of life, but rather in seeking the answer to each question that life asks.</p><p>That all being said…</p><blockquote>I understand why people believe in god. It is of comfort to know that, when no one else does, someone sees you, “gets” you, knows you are trying with all the vigor of your soul…you are trying. I understand why people believe in god.</blockquote>', '4563111446549795.jpg', '0px -145px', 0, '2015-11-03 11:24:21', 23, 10002),
(1030, 'Multiplication of any two numbers, lies between 11 and 19', '<p>Let me explain this rule by taking examples,</p><p>13*19 = (13+9)*10 + (3*9) = 220 + 27 = 247</p><p>Means add first number and last digit of the second number take zero in the third place of this number then add product of last digit of the two numbers in it. <br><br>Read more at: <a href="http://www.m4maths.com/maths-trick.php#5BmpFZwTBbccgqZ6.99">Maths Tricks</a></p>', '', '', 0, '2015-11-03 11:26:03', 13, 10001),
(1031, 'House of Cards Season 3', '<p>The third season starts out with a motorcade going to the graveyard where Frank''s father was buried. Frank goes alone to the grave and talks, telling his father his unhappiness. Finally, he pees on the grave. Pretty risky, considering there are reporters over the hill a few feet away. Now we cut to Doug, who despite being pummeled by Rachel with a rock, is still alive, barely. He is damaged. He must go through extensive therapy and, of course, deal with horrible pain (which will test his resistance to his chemical dependency). Frank still considers him a friend but knows that he isn''t going o be much help now. Doug is determined to manage and pushes others away (including his estranged brother) and starts off his time alone by slipping in the bathtub and breaking his arm (a compound fracture). He is determined to find Rachel because she is a threat to the President. Meanwhile, Frank is getting nowhere, blocked everywhere by the Republicans who are sniffing blood. He is trying to get his entitlement bill to have legs. Claire is proving to be a problem because she want to become the ambassador to the UN. Frank doesn''t say it, but he feels he has enough bad press without showing nepotism to his own wife. Doug is in crisis and meets with the FBI guy who is both a threat and a possibility for finding Rachel. The table is set.</p>', '7930181446549962.jpg', '0px 0px', 0, '2015-11-03 11:27:06', 27, 10000),
(1033, 'mind unleashed', '<p>1. The scientists of today think deeply instead of clearly. One must be sane to think clearly, but one can think deeply and be quite insane. Radio Power Will Revolutionize the World in Modern Mechanics and Inventions (July 1934)</p><p>2. I do not think there is any thrill that can go through the human heart like that felt by the inventor as he sees some creation of the brain unfolding to success… such emotions make a man forget food, sleep, friends, love, everything.In Cleveland Moffitt, “A Talk With Tesla”, Atlanta Constitution (7 Jun 1896)</p><p>3. The day science begins to study non-physical phenomena, it will make more progress in one decade than in all the previous centuries of its existence.Unknown source</p><p>4. Today’s scientists have substituted mathematics for experiments, and they wander off through equation after equation, and eventually build a structure which has no relation to reality. Radio Power Will Revolutionize the World in Modern Mechanics and Inventions (July 1934)</p><p>5. The scientific man does not aim at an immediate result. He does not expect that his advanced ideas will be readily taken up. His work is like that of the planter — for the future. His duty is to lay the foundation for those who are to come, and point the way. He lives and labors and hopes. The Problem of Increasing Human Energy (The Century Magazine, June, 1900)</p><p>6. Throughout space there is energy. Is this energy static or kinetic! If static our hopes are in vain; if kinetic — and this we know it is, for certain — then it is a mere question of time when men will succeed in attaching their machinery to the very wheelwork of nature. Experiments With Alternate Currents Of High Potential And High Frequency (February 1892)</p><p>7. Every living being is an engine geared to the wheelwork of the universe. Though seemingly affected only by its immediate surrounding, the sphere of external influence extends to infinite distance. (Did the War Cause the Italian Earthquake) New York American, February 7, 1915</p><p>8. This planet, with all its appalling immensity, is to electric currents virtually no more than a small metal ball.The Transmission of Electrical Energy Without Wires (Electrical World &amp; Engineer, March 5, 1904)</p><p>9. Though free to think and act, we are held together, like the stars in the firmament, with ties inseparable. These ties cannot be seen, but we can feel them. The Problem of Increasing Human Energy in Century Illustrated Magazine (June 1900)</p><p>10. In the twenty-first century, the robot will take the place which slave labor occupied in ancient civilization. A Machine to End War, Liberty, February, 1937</p><p>11. The spread of civilization may be likened to a fire; first, a feeble spark, next a flickering flame, then a mighty blaze, ever increasing in speed and power. What Science May Achieve This Year, Denver Rocky Mountain News, January 16th, 1910</p><p>12. Our senses enable us to perceive only a minute portion of the outside world. The Transmission of Electrical Energy Without Wires as a Means for Furthering Peace in Electrical World and Engineer (January 7, 1905)</p><p>13. Our virtues and our failings are inseparable, like force and matter. When they separate, man is no more. The Problem of Increasing Human Energy, in Century Illustrated Magazine (June 1900)</p><p>14. I don’t care that they stole my idea… I care that they don’t have any of their own.Unknown source</p><p>15. Money does not represent such a value as men have placed upon it. All my money has been invested into experiments with which I have made new discoveries enabling mankind to have a little easier life.A Visit to Nikola Tesla, by Dragislav L. Petkoviæ in Politika (April 1927)</p><p>16. Of all the frictional resistances, the one that most retards human movement is ignorance, what Buddha called ‘the greatest evil in the world’. The Problem of Increasing Human Energy, in Century Illustrated Magazine (June 1900)</p><p>17. Instinct is something which transcends knowledge. We have, undoubtedly, certain finer fibers that enable us to perceive truths when logical deduction, or any other willful effort of the brain, is futile. My Inventions, in Electrical Experimenter magazine (1919)</p><p>18. It is paradoxical, yet true, to say, that the more we know, the more ignorant we become in the absolute sense, for it is only through enlightenment that we become conscious of our limitations. Precisely one of the most gratifying results of intellectual evolution is the continuous opening up of new and greater prospects. The Wonder World To Be Created By Electricity, Manufacturer’s Record, September 9, 1915</p><p>19. The individual is ephemeral, races and nations come and pass away, but man remains. Therein lies the profound difference between the individual and the whole. The Problem of Increasing Human Energy, in Century Illustrated Magazine (June 1900)</p><p>20. Invention is the most important product of man’s creative brain. The ultimate purpose is the complete mastery of mind over the material world, the harnessing of human nature to human needs. My Inventions, in Electrical Experimenter magazine (1919)</p><p>21. The progressive development of man is vitally dependent on invention. My Inventions, in Electrical Experimenter magazine (1919)</p><p>22. Be alone, that is the secret of invention; be alone, that is when ideas are born.American Genesis: A Century of Invention and Technological Enthusiasm, 1870-1970 by Thomas P. Hughes (2004)</p><p>23. Life is and will ever remain an equation incapable of solution, but it contains certain known factors. A Machine to End War, Liberty, February, 1937</p><p>24. The desire that guides me in all I do is the desire to harness the forces of nature to the service of mankind. Radio Power Will Revolutionize the World (Modern Mechanix &amp; Inventions, July, 1934)</p><p>25. Peace can only come as a natural consequence of universal enlightenment. My Inventions, in Electrical Experimenter magazine (1919)</p><p>26. Fights between individuals, as well as governments and nations, invariably result from misunderstandings in the broadest interpretation of this term. Misunderstandings are always caused by the inability of appreciating one another’s point of view. The Transmission of Electrical Energy Without Wires as a Means for Furthering Peace, in Electrical World and Engineer (January 7, 1905)</p><p>27. Three possible solutions of the great problem of increasing human energy are answered by the three words: food, peace, work. The Problem of Increasing Human Energy, in Century Illustrated Magazine (June 1900)</p><p>28. What one man calls God, another calls the laws of physics. Unknown source</p><p>29. The last 29 days of the month are the toughest! My Inventions, in Electrical Experimenter magazine (1919)</p><p>30. We crave for new sensations but soon become indifferent to them. The wonders of yesterday are today common occurrences.My Inventions, in Electrical Experimenter magazine (1919)</p>', '1275691446551356.png', '0px -70px', 0, '2015-11-03 11:50:54', 12, 10001);
INSERT INTO `thread` (`srno`, `title`, `description`, `imagepath`, `coordinates`, `edit`, `timestamp`, `cid`, `uid`) VALUES
(1034, 'Benefits of prototyping for UX design with Pixate', '<p>The process of user experience design for any mobile application is a very responsible stage on the way to the final product, which will satisfy the user. In our previous articles we have already mentioned that UX process is the basis for successful UI as it develops the whole logic of the application, makes possible to think over the efficient transitions and layout as well as consider all the ways to make user experience as positive as possible.</p><p>The important way to check out and test all the solutions made on the stage of UX design is prototyping. Here in Tubik Studio we are keen to try different tools of prototyping to test the efficiency of UX. Earlier we promised to share our experience of work on prototypes and discuss the benefits of different tools in more detail. So, this post is going to be the first in the set and this time we would like to consider main benefits of prototyping and tell you about the tool for this aim called Pixate</p><h5>The essence and role of prototyping</h5><p>The original concept behind the term ‘prototype’ is the sample model of the product that gives the ability to test it and see if the solutions and decisions made about the product are efficient. Prototypes should not be seen as the analogue of the final product as they aren’t those. Their main aim is to enable a designer, a customer and a user to check the correctness and appropriateness of the design solutions.</p><p>The value of prototypes in the sphere of app and webdesign has rocketed for the last few years. Actually, it is easy to explain as even the low-fidelity prototype gets the designer, customer and tester much closer to the looks and functions of the future product than the most elaborate schemes, drawings and wireframes. Certainly, that doesn’t mean that schemes and wireframes could be eliminated from the process as they are essential in the process of creating design solutions. However, when you want to feel their efficiency and check if nothing has been missed in the design process, prototype will be the great help.</p><p>Ciao!</p>', '2137571446569627.jpeg', '0px -82px', 1, '2015-11-03 16:55:35', 4, 10000),
(1035, 'Short story', '<p>Once a little girl asked me</p><p>while I was pondering the graves,</p><p>Why there are so many little</p><p>graves?</p><p>Wondered her blue misty eyes</p><p>deep like a galaxy, I fell into the void</p><p>Revolving around the stars, seeking</p><p>the answers for her question</p><p>A moment around the horizon, I had </p><p>the same question </p><p>Why there are so many little</p><p>graves?</p><p>I replied, “these graves are my poems, </p><p>I wrote for loved ones”</p><p>Words are the should which have</p><p>escaped the reality</p><p>A moment passed by when I realized,</p><p>this girl herself is a poem</p><p>Which was narrating my life to me. . .</p><p>-- anonymous&nbsp;</p>', '9450901446622203.jpg', '0px -107px', 0, '2015-11-04 07:30:49', 28, 10002),
(1036, 'What is the best way to conditionally apply a class?', '<p>Lets say you have an array that is rendered in a ul with an li for each element and a property on the controller called selectedIndex. What would be the best way to add a class to the li with the index selectedIndex in AngularJS?</p><p>I am currently duplicating (by hand) the li code and adding the class to one of the li tags and using ng-show and ng-hide to show only one li per index.</p>', '', '', 0, '2015-11-04 07:31:11', 20, 10000);

--
-- Triggers `thread`
--
DROP TRIGGER IF EXISTS `ac_dThread`;
DELIMITER //
CREATE TRIGGER `ac_dThread` AFTER DELETE ON `thread`
 FOR EACH ROW begin set @tid=old.srno; set @uid=old.uid;delete from activitylog where ref=@tid and uid=@uid and type=3; end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_eThread`;
DELIMITER //
CREATE TRIGGER `ac_eThread` AFTER UPDATE ON `thread`
 FOR EACH ROW begin 
insert into threadhistory(title, description, imagepath, coordinates,cid, uid, tid) values(old.title, old.description, old.imagepath, old.coordinates,old.cid, old.uid, old.srno); 
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_iThread`;
DELIMITER //
CREATE TRIGGER `ac_iThread` AFTER INSERT ON `thread`
 FOR EACH ROW begin 
set @tid=new.srno; 
set @title=new.title; 
set @uid=new.uid; 
set @descr=concat('Created a new thread "', @title, '"'); 
insert into activitylog(description, type, ref, uid) values(@descr, 3, @tid, @uid); 
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `threadhistory`
--

DROP TABLE IF EXISTS `threadhistory`;
CREATE TABLE IF NOT EXISTS `threadhistory` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `imagepath` text,
  `coordinates` varchar(30) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`srno`),
  KEY `cid_th_fk` (`cid`),
  KEY `uid_th_fk` (`uid`),
  KEY `tid_th_fk` (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `threadhistory`
--

INSERT INTO `threadhistory` (`srno`, `title`, `description`, `imagepath`, `coordinates`, `timestamp`, `cid`, `uid`, `tid`) VALUES
(1, 'Benefits of prototyping for UX design with Pixate', '<p>The process of user experience design for any mobile application is a very responsible stage on the way to the final product, which will satisfy the user. In our previous articles we have already mentioned that UX process is the basis for successful UI as it develops the whole logic of the application, makes possible to think over the efficient transitions and layout as well as consider all the ways to make user experience as positive as possible.</p><p>The important way to check out and test all the solutions made on the stage of UX design is prototyping. Here in Tubik Studio we are keen to try different tools of prototyping to test the efficiency of UX. Earlier we promised to share our experience of work on prototypes and discuss the benefits of different tools in more detail. So, this post is going to be the first in the set and this time we would like to consider main benefits of prototyping and tell you about the tool for this aim called Pixate</p><h5>The essence and role of prototyping</h5><p>The original concept behind the term ‘prototype’ is the sample model of the product that gives the ability to test it and see if the solutions and decisions made about the product are efficient. Prototypes should not be seen as the analogue of the final product as they aren’t those. Their main aim is to enable a designer, a customer and a user to check the correctness and appropriateness of the design solutions.</p><p>The value of prototypes in the sphere of app and webdesign has rocketed for the last few years. Actually, it is easy to explain as even the low-fidelity prototype gets the designer, customer and tester much closer to the looks and functions of the future product than the most elaborate schemes, drawings and wireframes. Certainly, that doesn’t mean that schemes and wireframes could be eliminated from the process as they are essential in the process of creating design solutions. However, when you want to feel their efficiency and check if nothing has been missed in the design process, prototype will be the great help.</p>', '2137571446569627.jpeg', '0px -82px', '2015-11-04 04:33:56', 4, 10000, 1034);

-- --------------------------------------------------------

--
-- Table structure for table `thread_activity`
--

DROP TABLE IF EXISTS `thread_activity`;
CREATE TABLE IF NOT EXISTS `thread_activity` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  PRIMARY KEY (`srno`),
  KEY `tid_ta_fk` (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `thread_activity`
--

INSERT INTO `thread_activity` (`srno`, `tid`, `timestamp`, `type`, `ref`) VALUES
(1, 1016, '2015-11-03 11:11:16', 3, 1),
(2, 1031, '2015-11-03 11:27:57', 3, 2),
(4, 1030, '2015-11-03 11:28:44', 3, 4),
(5, 1029, '2015-11-03 11:28:49', 3, 5),
(6, 1029, '2015-11-03 11:28:53', 1, 100),
(7, 1028, '2015-11-03 11:29:10', 3, 6),
(8, 1030, '2015-11-03 11:29:12', 1, 101),
(9, 1028, '2015-11-03 11:29:23', 1, 102),
(10, 1031, '2015-11-03 11:29:24', 1, 103),
(11, 1027, '2015-11-03 11:29:30', 3, 7),
(12, 1029, '2015-11-03 11:29:40', 4, 1),
(13, 1029, '2015-11-03 11:29:41', 3, 8),
(14, 1027, '2015-11-03 11:30:17', 1, 104),
(15, 1025, '2015-11-03 11:30:18', 3, 9),
(16, 1026, '2015-11-03 11:30:25', 3, 10),
(17, 1024, '2015-11-03 11:30:29', 3, 11),
(18, 1028, '2015-11-03 11:30:43', 1, 105),
(19, 1028, '2015-11-03 11:30:45', 3, 12),
(20, 1028, '2015-11-03 11:30:47', 4, 2),
(21, 1023, '2015-11-03 11:30:50', 3, 13),
(22, 1023, '2015-11-03 11:31:06', 1, 106),
(23, 1028, '2015-11-03 11:31:07', 2, 1),
(24, 1028, '2015-11-03 11:31:22', 4, 3),
(25, 1028, '2015-11-03 11:31:58', 2, 2),
(26, 1028, '2015-11-03 11:32:09', 2, 3),
(27, 1022, '2015-11-03 11:32:09', 3, 14),
(28, 1025, '2015-11-03 11:33:20', 3, 15),
(29, 1024, '2015-11-03 11:33:27', 3, 16),
(30, 1021, '2015-11-03 11:33:28', 3, 17),
(31, 1018, '2015-11-03 11:33:33', 3, 18),
(32, 1021, '2015-11-03 11:33:44', 1, 107),
(33, 1018, '2015-11-03 11:33:54', 1, 108),
(34, 1024, '2015-11-03 11:33:56', 1, 109),
(35, 1015, '2015-11-03 11:34:08', 3, 19),
(36, 1023, '2015-11-03 11:34:24', 4, 4),
(37, 1023, '2015-11-03 11:34:37', 2, 4),
(38, 1013, '2015-11-03 11:34:43', 3, 20),
(39, 1009, '2015-11-03 11:34:47', 3, 21),
(40, 1008, '2015-11-03 11:34:50', 3, 22),
(41, 1006, '2015-11-03 11:34:54', 3, 23),
(42, 1005, '2015-11-03 11:34:57', 3, 24),
(44, 1003, '2015-11-03 11:35:18', 3, 25),
(47, 1020, '2015-11-03 11:36:09', 3, 27),
(49, 1031, '2015-11-03 11:38:50', 4, 6),
(50, 1031, '2015-11-03 11:39:01', 1, 112),
(51, 1031, '2015-11-03 11:39:07', 4, 7),
(52, 1031, '2015-11-03 11:39:22', 2, 5),
(53, 1031, '2015-11-03 11:39:34', 3, 28),
(54, 1030, '2015-11-03 11:41:18', 2, 6),
(55, 1030, '2015-11-03 11:41:40', 2, 7),
(56, 1024, '2015-11-03 11:41:47', 4, 8),
(57, 1033, '2015-11-03 11:51:23', 3, 29),
(58, 1031, '2015-11-03 16:34:51', 2, 8),
(59, 1031, '2015-11-04 07:23:11', 2, 9),
(60, 1031, '2015-11-04 07:24:39', 2, 10),
(61, 1036, '2015-11-04 07:32:42', 1, 113),
(62, 1036, '2015-11-04 07:32:53', 2, 11),
(63, 1036, '2015-11-04 07:33:24', 2, 12),
(64, 1036, '2015-11-04 07:33:35', 2, 13),
(65, 1036, '2015-11-04 07:33:43', 4, 9),
(66, 1036, '2015-11-04 07:33:51', 2, 14),
(67, 1036, '2015-11-04 07:35:06', 2, 15),
(68, 1036, '2015-11-04 07:35:12', 2, 16),
(69, 1036, '2015-11-04 07:37:38', 3, 30),
(70, 1036, '2015-11-04 07:42:47', 1, 114),
(71, 1036, '2015-11-04 07:43:07', 2, 17),
(72, 1036, '2015-11-04 07:43:16', 2, 18),
(73, 1036, '2015-11-04 07:43:18', 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `thread_tags`
--

DROP TABLE IF EXISTS `thread_tags`;
CREATE TABLE IF NOT EXISTS `thread_tags` (
  `name` varchar(30) DEFAULT NULL,
  `tid` int(11) NOT NULL,
  KEY `tid_fk` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread_tags`
--

INSERT INTO `thread_tags` (`name`, `tid`) VALUES
('Life', 1000),
('Freedom', 1000),
('Liberation', 1000),
('World', 1000),
('dota2', 1001),
('gaming', 1001),
('steam', 1001),
('cooking', 1002),
('cake', 1002),
('Writers', 1003),
('Dream', 1003),
('Hobby', 1003),
('Life', 1003),
('business', 1004),
('artofbusiness', 1004),
('selling', 1004),
('music', 1004),
('UI', 1005),
('UX', 1005),
('Design', 1005),
('WebDev', 1005),
('Programming', 1005),
('stevejobs', 1006),
('visionary', 1006),
('genius', 1006),
('apple', 1006),
('experiment', 1007),
('life', 1007),
('lifelessons', 1007),
('kitten', 1007),
('cats', 1007),
('Hackathon', 1008),
('Design', 1008),
('Startup', 1008),
('Tech', 1008),
('searchenginemarkeing', 1009),
('android', 1009),
('ios', 1009),
('selfimprovement', 1010),
('startups', 1010),
('ideas', 1010),
('lifecoaching', 1010),
('apps', 1011),
('google', 1011),
('apple', 1011),
('ios', 1011),
('android', 1011),
('Design', 1012),
('UI', 1012),
('UX', 1012),
('UI', 1013),
('UX', 1013),
('Design', 1013),
('productivity', 1013),
('intelligence', 1014),
('education', 1014),
('life', 1014),
('learning', 1014),
('apple', 1015),
('ios', 1015),
('iphone6s', 1015),
('force3dtouch', 1015),
('NYC', 1016),
('NewYorkCity', 1016),
('USA', 1016),
('ILoveNYC', 1016),
('stockpics', 1017),
('wallpapers', 1017),
('stockitems', 1017),
('photos', 1017),
('selfies', 1018),
('girls', 1018),
('addiction', 1018),
('PT', 1019),
('PorcupineTree', 1019),
('ProgRock', 1019),
('ProgressiveRock', 1019),
('Rock', 1019),
('programming', 1020),
('cplusplus', 1020),
('functions', 1020),
('starbucks', 1021),
('coffee', 1021),
('story', 1021),
('books', 1022),
('oldbooks', 1022),
('nostalgia', 1022),
('TheBeatles', 1023),
('Beatles', 1023),
('Music', 1023),
('Rock', 1023),
('Pop', 1023),
('tabla', 1024),
('showman', 1024),
('music', 1024),
('DrHouse', 1025),
('houseMD', 1025),
('house', 1025),
('sacasm', 1025),
('season8', 1025),
('psychology', 1026),
('numbertheory', 1026),
('Design', 1026),
('DragNDrop', 1027),
('JQuery', 1027),
('UX', 1027),
('UI', 1027),
('HTML5', 1027),
('quantum', 1028),
('physics', 1028),
('quantumtheory', 1028),
('spacetime', 1028),
('spirituality', 1029),
('duality', 1029),
('consciousness', 1029),
('god', 1029),
('maths', 1030),
('tricks', 1030),
('mathematics', 1030),
('simplemaths', 1030),
('HouseOfCards', 1031),
('Netflix', 1031),
('TV', 1031),
('Shows', 1031),
('HOC', 1031),
('mindunleashed', 1033),
('quotes', 1033),
('lifequotes', 1033),
('Design', 1034),
('UI', 1034),
('UX', 1034),
('UserExperience', 1034),
('Designing', 1034),
('story', 1035),
('shortstories', 1035),
('Writers', 1035),
('AngularJS', 1036),
('JavaScript', 1036),
('css', 1036);

-- --------------------------------------------------------

--
-- Table structure for table `trackthread`
--

DROP TABLE IF EXISTS `trackthread`;
CREATE TABLE IF NOT EXISTS `trackthread` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`tid`,`uid`),
  KEY `uid_tt_fk` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trackthread`
--

INSERT INTO `trackthread` (`tid`, `uid`) VALUES
(1000, 10000),
(1003, 10000),
(1005, 10000),
(1008, 10000),
(1012, 10000),
(1016, 10000),
(1019, 10000),
(1023, 10000),
(1027, 10000),
(1028, 10000),
(1029, 10000),
(1031, 10000),
(1034, 10000),
(1036, 10000),
(1004, 10001),
(1007, 10001),
(1010, 10001),
(1014, 10001),
(1017, 10001),
(1020, 10001),
(1021, 10001),
(1025, 10001),
(1030, 10001),
(1033, 10001),
(1001, 10002),
(1002, 10002),
(1006, 10002),
(1009, 10002),
(1011, 10002),
(1013, 10002),
(1015, 10002),
(1018, 10002),
(1019, 10002),
(1021, 10002),
(1022, 10002),
(1023, 10002),
(1024, 10002),
(1026, 10002),
(1027, 10002),
(1028, 10002),
(1029, 10002),
(1031, 10002),
(1035, 10002);

-- --------------------------------------------------------

--
-- Table structure for table `upvotes_to_replies`
--

DROP TABLE IF EXISTS `upvotes_to_replies`;
CREATE TABLE IF NOT EXISTS `upvotes_to_replies` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`srno`),
  KEY `rid_utr_fk` (`rid`),
  KEY `uid_utr_fk` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `upvotes_to_replies`
--

INSERT INTO `upvotes_to_replies` (`srno`, `rid`, `uid`) VALUES
(1, 100, 10000),
(2, 102, 10000),
(3, 105, 10001),
(4, 106, 10000),
(6, 103, 10001),
(7, 112, 10000),
(8, 109, 10001),
(9, 113, 10000),
(10, 114, 10000);

--
-- Triggers `upvotes_to_replies`
--
DROP TRIGGER IF EXISTS `ac_dUpvoteToReply`;
DELIMITER //
CREATE TRIGGER `ac_dUpvoteToReply` AFTER DELETE ON `upvotes_to_replies`
 FOR EACH ROW begin 
set @srno=old.srno;
set @uid=old.uid; 
set @rid=old.rid;
set @rowner=(select uid from reply where srno=@rid);
delete from notifications where ref=@srno and uid=@rowner and type=4;
delete from activitylog where ref=@srno and uid=@uid and type=4; 
set @threadid = (select tid from reply where srno=@rid);
delete from thread_activity where tid=@threadid and type=4 and ref=@srno;
set @last_ts = (select timestamp from thread_activity where tid=@threadid order by timestamp desc limit 1);
if(@last_ts IS NULL) then
set @last_ts=(select timestamp from thread where srno=@threadid);
end if;
update weightage set weight=weight-0.01, timestamp=@last_ts where tid=@threadid;

end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_iUpvoteToReply`;
DELIMITER //
CREATE TRIGGER `ac_iUpvoteToReply` AFTER INSERT ON `upvotes_to_replies`
 FOR EACH ROW begin
set @srno=new.srno;
set @uid=new.uid;
set @rid=new.rid;
set @tid=(select tid from reply where srno=@rid);
set @title=(select title from thread where srno=@tid);
set @descr=concat('Upvoted a reply to ', @title);
set @rowner=(select uid from reply where srno=@rid);
if @uid != @rowner then
set @name=(select concat(fname, ' ', lname) from extendedinfo where uid=@uid);
set @desc=concat(@name, ' upvoted your reply on ', @title);
insert into notifications(description, type, ref, uid) values(@desc, 4, @srno, @rowner);
end if;
insert into activitylog(description, type, ref, uid) values(@descr, 4, @srno, @uid);
set @ts = now();
insert into thread_activity(tid, timestamp, type, ref) values(@tid, @ts, 4, @srno);
update weightage set weight=weight+0.01, timestamp=@ts where tid=@tid;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `upvotes_to_thread`
--

DROP TABLE IF EXISTS `upvotes_to_thread`;
CREATE TABLE IF NOT EXISTS `upvotes_to_thread` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`srno`),
  KEY `tid_uvtt_fk` (`tid`),
  KEY `uid_uvtt_fk` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `upvotes_to_thread`
--

INSERT INTO `upvotes_to_thread` (`srno`, `tid`, `uid`) VALUES
(1, 1016, 10001),
(2, 1031, 10002),
(4, 1030, 10000),
(5, 1029, 10001),
(6, 1028, 10001),
(7, 1027, 10001),
(8, 1029, 10000),
(9, 1025, 10002),
(10, 1026, 10001),
(11, 1024, 10001),
(12, 1028, 10000),
(13, 1023, 10002),
(14, 1022, 10001),
(15, 1025, 10000),
(16, 1024, 10000),
(17, 1021, 10002),
(18, 1018, 10001),
(19, 1015, 10001),
(20, 1013, 10001),
(21, 1009, 10001),
(22, 1008, 10001),
(23, 1006, 10001),
(24, 1005, 10001),
(25, 1003, 10001),
(27, 1020, 10000),
(28, 1031, 10000),
(29, 1033, 10000),
(30, 1036, 10002);

--
-- Triggers `upvotes_to_thread`
--
DROP TRIGGER IF EXISTS `ac_dUpvote`;
DELIMITER //
CREATE TRIGGER `ac_dUpvote` AFTER DELETE ON `upvotes_to_thread`
 FOR EACH ROW begin 
set @srno = old.srno;
set @userid = old.uid;
set @threadid = old.tid;
set @towner=(select uid from thread where srno=@threadid);
delete from notifications where ref=@srno and type=3 and uid=@towner;
delete from activitylog where ref=@srno and uid=@userid and type=0; 
delete from thread_activity where tid=@threadid and type=3 and ref=@srno;
set @last_ts = (select timestamp from thread_activity where tid=@threadid order by timestamp desc limit 1);
if(@last_ts IS NULL) then
set @last_ts=(select timestamp from thread where srno=@threadid);
end if;
update weightage set weight=weight-0.05, timestamp=@last_ts where tid=@threadid;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_iUpvote`;
DELIMITER //
CREATE TRIGGER `ac_iUpvote` AFTER INSERT ON `upvotes_to_thread`
 FOR EACH ROW begin 
set @srno=new.srno;
set @name=(select concat(fname, ' ', lname) from extendedinfo where uid=new.uid);
set @towner=(select uid from thread where srno=new.tid);
if @towner != new.uid then
insert into notifications(description, type, ref, uid) values(concat(@name, ' upvoted your thread'), 3, @srno, @towner);
end if;

set @userid = new.uid; 
set @threadid = new.tid; 
set @title = (select title from thread where srno=@threadid); 
set @desc = concat('Upvoted ', @title); 
insert into activitylog(description, type, ref, uid) values(@desc, 0, @srno, @userid);
set @ts=now();
insert into thread_activity(tid, timestamp, type, ref) values(@threadid, @ts, 3, @srno);
update weightage set weight=weight+0.05, timestamp=@ts where tid=@threadid;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

DROP TABLE IF EXISTS `useraccounts`;
CREATE TABLE IF NOT EXISTS `useraccounts` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`srno`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10003 ;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`srno`, `username`, `password`, `timestamp`) VALUES
(10000, 'boom_shankar', '2dd948da0b7fc3df9ee4cb7d09b582e7', '2015-11-03 10:38:36'),
(10001, 'chinmayjoshi', '2dd948da0b7fc3df9ee4cb7d09b582e7', '2015-11-03 10:39:03'),
(10002, 'sipps7', '4280a1f43bdcb20dff373c79a8390df2', '2015-11-03 10:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

DROP TABLE IF EXISTS `views`;
CREATE TABLE IF NOT EXISTS `views` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`tid`,`uid`),
  KEY `tid_v_fk` (`tid`),
  KEY `uid_v_fk` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`tid`, `uid`) VALUES
(1000, 10001),
(1000, 10002),
(1001, 10001),
(1002, 10001),
(1003, 10000),
(1003, 10001),
(1005, 10000),
(1005, 10001),
(1006, 10001),
(1006, 10002),
(1008, 10000),
(1008, 10001),
(1009, 10001),
(1012, 10000),
(1013, 10001),
(1013, 10002),
(1015, 10001),
(1016, 10000),
(1016, 10001),
(1016, 10002),
(1018, 10000),
(1018, 10001),
(1019, 10000),
(1020, 10000),
(1020, 10001),
(1021, 10001),
(1021, 10002),
(1022, 10001),
(1023, 10000),
(1023, 10001),
(1023, 10002),
(1024, 10000),
(1024, 10001),
(1024, 10002),
(1025, 10000),
(1025, 10001),
(1025, 10002),
(1026, 10001),
(1026, 10002),
(1027, 10000),
(1027, 10001),
(1027, 10002),
(1028, 10000),
(1028, 10001),
(1028, 10002),
(1029, 10000),
(1029, 10001),
(1029, 10002),
(1030, 10000),
(1030, 10001),
(1030, 10002),
(1031, 10000),
(1031, 10001),
(1031, 10002),
(1033, 10000),
(1034, 10000),
(1034, 10001),
(1035, 10002),
(1036, 10000),
(1036, 10001),
(1036, 10002);

-- --------------------------------------------------------

--
-- Table structure for table `weightage`
--

DROP TABLE IF EXISTS `weightage`;
CREATE TABLE IF NOT EXISTS `weightage` (
  `tid` int(11) NOT NULL,
  `weight` float(4,2) DEFAULT '0.00',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `tid` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weightage`
--

INSERT INTO `weightage` (`tid`, `weight`, `timestamp`) VALUES
(1000, 0.00, '2015-11-03 10:43:03'),
(1001, 0.00, '2015-11-03 10:43:10'),
(1002, 0.00, '2015-11-03 10:45:46'),
(1003, 0.05, '2015-11-03 11:35:18'),
(1004, 0.00, '2015-11-03 10:46:52'),
(1005, 0.05, '2015-11-03 11:34:57'),
(1006, 0.05, '2015-11-03 11:34:54'),
(1007, 0.00, '2015-11-03 10:50:05'),
(1008, 0.05, '2015-11-03 11:34:50'),
(1009, 0.05, '2015-11-03 11:34:47'),
(1010, 0.00, '2015-11-03 10:52:27'),
(1011, 0.00, '2015-11-03 10:52:33'),
(1012, 0.00, '2015-11-03 10:52:42'),
(1013, 0.05, '2015-11-03 11:34:43'),
(1014, 0.00, '2015-11-03 10:55:44'),
(1015, 0.05, '2015-11-03 11:34:08'),
(1016, 0.05, '2015-11-03 11:11:16'),
(1017, 0.00, '2015-11-03 11:03:16'),
(1018, 0.13, '2015-11-03 11:33:54'),
(1019, 0.00, '2015-11-03 11:06:48'),
(1020, 0.05, '2015-11-03 11:36:09'),
(1021, 0.13, '2015-11-03 11:33:44'),
(1022, 0.05, '2015-11-03 11:32:09'),
(1023, 0.16, '2015-11-03 11:34:37'),
(1024, 0.19, '2015-11-03 11:41:47'),
(1025, 0.10, '2015-11-03 11:33:20'),
(1026, 0.05, '2015-11-03 11:30:25'),
(1027, 0.13, '2015-11-03 11:30:17'),
(1028, 0.34, '2015-11-03 11:32:09'),
(1029, 0.19, '2015-11-03 11:29:41'),
(1030, 0.17, '2015-11-03 11:41:40'),
(1031, 0.36, '2015-11-04 07:24:39'),
(1033, 0.05, '2015-11-03 11:51:23'),
(1034, 0.00, '2015-11-03 16:55:35'),
(1035, 0.00, '2015-11-04 07:30:49'),
(1036, 0.39, '2015-11-04 07:43:18');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD CONSTRAINT `uid_al_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `category_user`
--
ALTER TABLE `category_user`
  ADD CONSTRAINT `cid_fk` FOREIGN KEY (`cid`) REFERENCES `category` (`srno`) ON DELETE CASCADE,
  ADD CONSTRAINT `uid_fk_cu` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `extendedinfo`
--
ALTER TABLE `extendedinfo`
  ADD CONSTRAINT `uid_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `hidethread`
--
ALTER TABLE `hidethread`
  ADD CONSTRAINT `tid_ht_fk` FOREIGN KEY (`tid`) REFERENCES `thread` (`srno`) ON DELETE CASCADE,
  ADD CONSTRAINT `uid_ht_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `uid_n_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `readinglist`
--
ALTER TABLE `readinglist`
  ADD CONSTRAINT `tid_rl_fk` FOREIGN KEY (`tid`) REFERENCES `thread` (`srno`) ON DELETE CASCADE,
  ADD CONSTRAINT `uid_rl_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `replies_to_reply`
--
ALTER TABLE `replies_to_reply`
  ADD CONSTRAINT `rid_rr_fk` FOREIGN KEY (`rid`) REFERENCES `reply` (`srno`) ON DELETE CASCADE,
  ADD CONSTRAINT `uid_rr_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `tid_reply_fk` FOREIGN KEY (`tid`) REFERENCES `thread` (`srno`) ON DELETE CASCADE,
  ADD CONSTRAINT `uid_reply_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `uid_thread_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `threadhistory`
--
ALTER TABLE `threadhistory`
  ADD CONSTRAINT `cid_th_fk` FOREIGN KEY (`cid`) REFERENCES `category` (`srno`) ON DELETE CASCADE,
  ADD CONSTRAINT `tid_th_fk` FOREIGN KEY (`tid`) REFERENCES `thread` (`srno`) ON DELETE CASCADE,
  ADD CONSTRAINT `uid_th_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `thread_activity`
--
ALTER TABLE `thread_activity`
  ADD CONSTRAINT `tid_ta_fk` FOREIGN KEY (`tid`) REFERENCES `thread` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `thread_tags`
--
ALTER TABLE `thread_tags`
  ADD CONSTRAINT `tid_fk` FOREIGN KEY (`tid`) REFERENCES `thread` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `trackthread`
--
ALTER TABLE `trackthread`
  ADD CONSTRAINT `tid_tt_fk` FOREIGN KEY (`tid`) REFERENCES `thread` (`srno`) ON DELETE CASCADE,
  ADD CONSTRAINT `uid_tt_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `upvotes_to_replies`
--
ALTER TABLE `upvotes_to_replies`
  ADD CONSTRAINT `rid_utr_fk` FOREIGN KEY (`rid`) REFERENCES `reply` (`srno`) ON DELETE CASCADE,
  ADD CONSTRAINT `uid_utr_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `upvotes_to_thread`
--
ALTER TABLE `upvotes_to_thread`
  ADD CONSTRAINT `tid_uvtt_fk` FOREIGN KEY (`tid`) REFERENCES `thread` (`srno`) ON DELETE CASCADE,
  ADD CONSTRAINT `uid_uvtt_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `tid_v_fk` FOREIGN KEY (`tid`) REFERENCES `thread` (`srno`) ON DELETE CASCADE,
  ADD CONSTRAINT `uid_v_fk` FOREIGN KEY (`uid`) REFERENCES `useraccounts` (`srno`) ON DELETE CASCADE;

--
-- Constraints for table `weightage`
--
ALTER TABLE `weightage`
  ADD CONSTRAINT `tid_wt_fk` FOREIGN KEY (`tid`) REFERENCES `thread` (`srno`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
