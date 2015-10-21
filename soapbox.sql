-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2015 at 06:56 AM
-- Server version: 5.5.38
-- PHP Version: 5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soapbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

DROP TABLE IF EXISTS `activitylog`;
CREATE TABLE `activitylog` (
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`description`, `timestamp`, `type`, `ref`, `uid`) VALUES
('Created a new thread "Crazy ones"', '2015-09-10 05:49:32', 3, 196, 10010),
('Created a new thread "hueheuhuehue"', '2015-09-10 05:54:08', 3, 197, 10010),
('Created a new thread "iPhone 6s "', '2015-09-10 05:58:13', 3, 198, 10010),
('Created a new thread "The Gardener"', '2015-09-10 07:21:08', 3, 199, 10010),
('Created a new thread "Dreaming Touch"', '2015-09-10 16:45:48', 3, 200, 10010),
('Created a new thread "TestIndent"', '2015-09-11 06:18:35', 3, 201, 10010),
('Created a new thread "TestIndent2"', '2015-09-11 06:28:24', 3, 202, 10010),
('Created a new thread "dsadsdsad"', '2015-09-11 06:28:52', 3, 203, 10010),
('Created a new thread "Dream"', '2015-09-11 06:29:52', 3, 204, 10010),
('Created a new thread "dsad"', '2015-09-11 06:31:19', 3, 205, 10010),
('Created a new thread "Lucid Touch"', '2015-09-11 07:19:19', 3, 206, 10010),
('Created a new thread "Jobs on creativity"', '2015-09-12 04:33:20', 3, 207, 10010),
('Created a new thread ""', '2015-09-16 12:36:50', 3, 208, 10010),
('Created a new thread "Designing "', '2015-09-17 13:36:57', 3, 209, 10010),
('Created a new thread "Who am I ?"', '2015-09-18 17:24:49', 3, 210, 10010),
('Created a new thread "Sole Poet"', '2015-09-18 17:25:25', 3, 211, 10010),
('Created a new thread "dasdasdsadsa"', '2015-09-18 18:39:23', 3, 212, 10010),
('Created a new thread "dasdad"', '2015-09-18 18:39:38', 3, 213, 10010),
('Created a new thread "Death"', '2015-09-20 08:11:50', 3, 214, 10010),
('Created a new thread "Hello World"', '2015-09-20 16:29:57', 3, 217, 10010),
('Created a new thread "Hello C"', '2015-09-20 16:37:59', 3, 220, 10010),
('Created a new thread "Silico Valley"', '2015-09-21 15:29:41', 3, 221, 10010),
('Created a new thread "Coming back to life"', '2015-09-22 07:10:41', 3, 222, 10011),
('Upvoted Coming back to life', '2015-09-23 15:18:59', 0, 1, 10010),
('Created a new thread "Here comes the sun when i say its alright little darling"', '2015-09-23 18:11:24', 3, 227, 10010),
('Upvoted Here comes the sun when i say its alright little darling', '2015-09-23 18:11:44', 0, 2, 10010),
('Created a new thread "Fucking errors"', '2015-09-26 16:51:14', 3, 245, 10010),
('Left a reply on Coming back to life', '2015-09-30 18:27:40', 1, 1, 10010),
('Created a new thread "To Thine Own Self Be True"', '2015-10-02 08:23:35', 3, 246, 10010),
('Created a new thread "Fondness of Blue"', '2015-10-02 11:22:26', 3, 248, 10012),
('Created a new thread "Refining the UX for a Continuous Video Experience"', '2015-10-03 03:06:23', 3, 249, 10010),
('Created a new thread "Skyline"', '2015-10-03 03:17:50', 3, 250, 10010),
('Created a new thread "Matrix"', '2015-10-03 07:24:54', 3, 251, 10010),
('Upvoted Refining the UX for a Continuous Video Experience', '2015-10-04 09:30:59', 0, 3, 10010),
('Upvoted a reply to Coming back to life', '2015-10-04 09:50:58', 4, 1, 10011),
('Upvoted iPhone 6s ', '2015-10-04 10:15:39', 0, 4, 10010),
('Upvoted Refining the UX for a Continuous Video Experience', '2015-10-04 10:16:41', 0, 5, 10011),
('Left a reply on Matrix', '2015-10-05 08:12:45', 1, 3, 10011),
('Upvoted a reply to Matrix', '2015-10-07 08:26:18', 4, 2, 10010),
('Upvoted Matrix', '2015-10-07 12:33:38', 0, 6, 10010),
('Upvoted Skyline', '2015-10-07 19:59:56', 0, 7, 10010),
('Created a new thread "Nothing Is Solid"', '2015-10-08 16:40:05', 3, 252, 10010),
('Created a new thread "Mobile post"', '2015-10-09 09:04:21', 3, 255, 10010),
('Upvoted Fondness of Blue', '2015-10-10 11:50:06', 0, 8, 10010),
('Left a reply on Fondness of Blue', '2015-10-10 11:51:53', 1, 4, 10010),
('Upvoted Nothing Is Solid', '2015-10-10 11:58:12', 0, 9, 10010),
('Upvoted Nothing Is Solid', '2015-10-11 12:47:04', 0, 10, 10011),
('Upvoted Matrix', '2015-10-11 12:48:44', 0, 11, 10011),
('Created a new thread "Notifications"', '2015-10-11 18:42:11', 3, 256, 10011),
('Left a reply on Notifications', '2015-10-12 04:53:52', 1, 5, 10010),
('Upvoted Notifications', '2015-10-12 11:13:47', 0, 16, 10010),
('Upvoted Mobile post', '2015-10-12 12:12:58', 0, 17, 10011),
('Left a reply on Refining the UX for a Continuous Video Experience', '2015-10-12 16:21:42', 1, 6, 10011),
('Left a comment on a reply to Matrix', '2015-10-12 16:22:55', 2, 1, 10010),
('Left a comment on a reply to Notifications', '2015-10-12 17:40:52', 2, 2, 10011),
('Left a comment on a reply to Notifications', '2015-10-12 17:41:18', 2, 3, 10010),
('Left a reply on Notifications', '2015-10-12 17:43:06', 1, 7, 10010),
('Created a new thread "code"', '2015-10-12 17:45:12', 3, 257, 10011),
('Upvoted code', '2015-10-12 17:45:42', 0, 18, 10010);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `srno` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `imagepath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
CREATE TABLE `category_user` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_user`
--

INSERT INTO `category_user` (`cid`, `uid`) VALUES
(1, 10011),
(7, 10011),
(8, 10011),
(9, 10011),
(12, 10011),
(15, 10011),
(20, 10011),
(19, 10011),
(14, 10011),
(21, 10011),
(22, 10011),
(27, 10011),
(28, 10011),
(25, 10011),
(23, 10011),
(24, 10011),
(4, 10010),
(8, 10010),
(9, 10010),
(14, 10010),
(15, 10010),
(20, 10010),
(21, 10010),
(22, 10010),
(23, 10010),
(24, 10010),
(25, 10010),
(27, 10010),
(28, 10010),
(1, 10012),
(3, 10012),
(7, 10012),
(8, 10012),
(15, 10012),
(14, 10012),
(16, 10012),
(17, 10012),
(21, 10012),
(23, 10012),
(27, 10012),
(28, 10012),
(26, 10012),
(24, 10012),
(1, 10010);

-- --------------------------------------------------------

--
-- Table structure for table `extendedinfo`
--

DROP TABLE IF EXISTS `extendedinfo`;
CREATE TABLE `extendedinfo` (
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
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extendedinfo`
--

INSERT INTO `extendedinfo` (`fname`, `lname`, `avatarpath`, `coverpath`, `covercoordinates`, `email`, `gender`, `about`, `question`, `answer`, `hometown`, `city`, `profession`, `education`, `college`, `school`, `uid`) VALUES
('Atharva', 'Dandekar', 'IMG_3620.jpg', '8473991444924315.jpg', '50% 100%', 'dandekar.atharva@gmail.com', 'm', 'Altruistic Punk', 1, 'mumbai', 'Mumbai', 'Pune', 'Web Developer', 'MSc Computer science', 'MIT', 'St Teresa High School', 10010),
('Gaargi', 'Pethe', 'IMG_4945.JPG', '8203501444929304.jpg', '0px -375px', 'gaargipethe@gmail.com', 'f', '', 1, 'pune', '', '', '', '', '', '', 10012),
('Mihir', 'Karandikar', 'shadow_fiend_by_zedega-d813pdn.png', NULL, NULL, 'karandikar.mihir@gmail.com', 'm', '', 1, 'pune', '', '', '', '', '', '', 10011);

-- --------------------------------------------------------

--
-- Table structure for table `hidethread`
--

DROP TABLE IF EXISTS `hidethread`;
CREATE TABLE `hidethread` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hidethread`
--

INSERT INTO `hidethread` (`tid`, `uid`) VALUES
(250, 10010);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `description` text NOT NULL,
  `type` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `readflag` int(11) DEFAULT '0',
  `sent` int(11) DEFAULT '0',
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`description`, `type`, `ref`, `timestamp`, `readflag`, `sent`, `uid`) VALUES
('Atharva Dandekar upvoted your thread', 3, 1, '2015-09-23 15:18:59', 1, 1, 10011),
('Atharva Dandekar left a reply on a thread you are tracking', 1, 1, '2015-09-30 18:27:40', 1, 1, 10011),
('Mihir Karandikar upvoted your reply on Coming back to life', 4, 1, '2015-10-04 09:50:58', 1, 1, 10010),
('Mihir Karandikar upvoted your thread', 3, 5, '2015-10-04 10:16:41', 1, 1, 10010),
('Mihir Karandikar left a reply on a thread you are tracking', 1, 3, '2015-10-05 08:12:45', 1, 1, 10010),
('Atharva Dandekar upvoted your reply on Matrix', 4, 2, '2015-10-07 08:26:18', 1, 1, 10011),
('Atharva Dandekar upvoted your thread', 3, 8, '2015-10-10 11:50:06', 1, 1, 10012),
('Atharva Dandekar left a reply on a thread you are tracking', 1, 4, '2015-10-10 11:51:53', 1, 1, 10012),
('Mihir Karandikar upvoted your thread', 3, 10, '2015-10-11 12:47:04', 1, 1, 10010),
('Mihir Karandikar upvoted your thread', 3, 11, '2015-10-11 12:48:44', 1, 1, 10010),
('Atharva Dandekar left a reply on a thread you are tracking', 1, 5, '2015-10-12 04:53:52', 1, 1, 10011),
('Atharva Dandekar upvoted your thread', 3, 16, '2015-10-12 11:13:47', 1, 1, 10011),
('Mihir Karandikar upvoted your thread', 3, 17, '2015-10-12 12:12:58', 1, 1, 10010),
('Mihir Karandikar left a reply on a thread you are tracking', 1, 6, '2015-10-12 16:21:42', 1, 1, 10010),
('Atharva Dandekar left a comment on your reply.', 2, 1, '2015-10-12 16:22:55', 1, 1, 10011),
('Mihir Karandikar left a comment on your reply.', 2, 2, '2015-10-12 17:40:52', 1, 1, 10010),
('Atharva Dandekar left a reply on a thread you are tracking', 1, 7, '2015-10-12 17:43:06', 0, 1, 10011),
('Atharva Dandekar upvoted your thread', 3, 18, '2015-10-12 17:45:42', 0, 1, 10011);

-- --------------------------------------------------------

--
-- Table structure for table `readinglist`
--

DROP TABLE IF EXISTS `readinglist`;
CREATE TABLE `readinglist` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `readinglist`
--

INSERT INTO `readinglist` (`tid`, `uid`, `timestamp`) VALUES
(222, 10010, '2015-10-01 07:14:10'),
(227, 10010, '2015-09-27 08:12:49'),
(248, 10010, '2015-10-02 11:26:19'),
(250, 10010, '2015-10-07 20:00:03'),
(251, 10010, '2015-10-07 08:49:29'),
(251, 10012, '2015-10-09 14:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `replies_to_reply`
--

DROP TABLE IF EXISTS `replies_to_reply`;
CREATE TABLE `replies_to_reply` (
  `srno` int(11) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies_to_reply`
--

INSERT INTO `replies_to_reply` (`srno`, `description`, `timestamp`, `rid`, `uid`) VALUES
(1, 'There is', '2015-10-12 16:22:55', 3, 10010),
(2, 'hmmmmmmmmmm', '2015-10-12 17:40:52', 5, 10011),
(3, 'Adhommm', '2015-10-12 17:41:18', 5, 10010);

--
-- Triggers `replies_to_reply`
--
DROP TRIGGER IF EXISTS `ac_dRReply`;
DELIMITER $$
CREATE TRIGGER `ac_dRReply` AFTER DELETE ON `replies_to_reply` FOR EACH ROW begin 
set @uid = old.uid; 
set @rrid = old.srno; 
set @rid=old.rid;
set @rowner=(select uid from reply where srno=@rid);
delete from notifications where ref=@rrid and uid=@rowner and type=2;
delete from activitylog where ref=@rrid and uid=@uid and type=2; 
end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_iRReply`;
DELIMITER $$
CREATE TRIGGER `ac_iRReply` AFTER INSERT ON `replies_to_reply` FOR EACH ROW begin 
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
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `srno` int(11) NOT NULL,
  `description` text NOT NULL,
  `imagepath` text,
  `attachment` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `correct` int(11) DEFAULT '0',
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`srno`, `description`, `imagepath`, `attachment`, `timestamp`, `correct`, `tid`, `uid`) VALUES
(1, '<p>Awesome Song &nbsp;_/\\_</p>', NULL, NULL, '2015-09-30 18:27:40', 1, 222, 10010),
(3, '<p>There is no spooooooooon!</p>', NULL, NULL, '2015-10-05 08:12:45', 0, 251, 10011),
(4, '<p>Its amazing loved it alot</p>', NULL, NULL, '2015-10-10 11:51:53', 0, 248, 10010),
(5, '<p>Hmmmm</p>', NULL, NULL, '2015-10-12 04:53:52', 0, 256, 10010),
(6, '<p>unbelieveable</p>', NULL, NULL, '2015-10-12 16:21:42', 0, 249, 10011),
(7, '<p>Ok</p>', NULL, NULL, '2015-10-12 17:43:06', 0, 256, 10010);

--
-- Triggers `reply`
--
DROP TRIGGER IF EXISTS `ac_dReply`;
DELIMITER $$
CREATE TRIGGER `ac_dReply` AFTER DELETE ON `reply` FOR EACH ROW begin 
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
end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_iCorrect`;
DELIMITER $$
CREATE TRIGGER `ac_iCorrect` AFTER UPDATE ON `reply` FOR EACH ROW begin
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
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_iReply`;
DELIMITER $$
CREATE TRIGGER `ac_iReply` AFTER INSERT ON `reply` FOR EACH ROW begin 
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
insert into activitylog(description, type, ref, uid) values(@descr, 1, new.srno, new.uid); end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`name`) VALUES
('adhu'),
('adhudhu'),
('adhudhuj'),
('afterlife'),
('apple'),
('backtolife'),
('beatles'),
('blue'),
('c'),
('code'),
('coding'),
('cprogram'),
('crazyones'),
('creativity'),
('death'),
('design'),
('energy'),
('errors'),
('existence'),
('eyes'),
('fondness'),
('forcetouch'),
('gag'),
('helloc'),
('helloworld'),
('herecomesthesun'),
('iOS'),
('iPhone6S'),
('javascript'),
('jobs'),
('js'),
('luciddreaming'),
('marathi'),
('matrix'),
('mobile'),
('neo'),
('oracle'),
('ownself'),
('physics'),
('pinkfloyd'),
('poem'),
('poet'),
('poetic'),
('poetry'),
('prose'),
('psychedelic'),
('quantumphysics'),
('quote'),
('reality'),
('sea'),
('sealover'),
('siliconvalley'),
('simplicity'),
('skyline'),
('soapboxmobile'),
('soapboxnotifications'),
('spoon'),
('stevejobs'),
('tagore'),
('testindent'),
('thegarderner'),
('thine'),
('universe'),
('unplug'),
('UX'),
('wanderer'),
('whoami');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

DROP TABLE IF EXISTS `thread`;
CREATE TABLE `thread` (
  `srno` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `imagepath` text,
  `coordinates` varchar(30) DEFAULT NULL,
  `edit` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`srno`, `title`, `description`, `imagepath`, `coordinates`, `edit`, `timestamp`, `cid`, `uid`) VALUES
(196, 'Crazy ones', '<blockquote>Here''s for the crazy ones The misfits. The rebels.The troublemakers. The round pegs in the square holes. The ones who see things differently. They are not fond of rules. And they have no respect for the status quo. You can quote them, disagree with them, glorify or vilify them. About the only thing you cant do is ignore them. Because they change things. They push the human race forward. While some may see them as the crazy ones, we see genius. Because the people who are crazy enough to think they can change the world, are the ones who do.</blockquote>', '', '', 0, '2015-09-10 05:49:32', 1, 10010),
(197, 'hueheuhuehue', '<p>9gag all the way</p>', '', '', 0, '2015-09-10 05:54:08', 1, 10010),
(198, 'iPhone 6s ', '<p>Introducing iPhone6S 3D Force Touch </p>', '9569881441864686.png', '0px -5px', 0, '2015-09-10 05:58:13', 25, 10010),
(199, 'The Gardener', '<p><i>In the morning I cast my net into the sea.</i></p><p><i> I dragged up from the dark abyss things of strange aspect and</i></p><p><i>   strange beauty—some shone like a smile, some glistened like</i></p><p><i>   tears, and some were flushed like the cheeks of a bride.</i></p><p><i> When with the day''s burden I went home, my love was sitting in</i></p><p><i>   the garden idly tearing the leaves of a flower.</i></p><p><i> I hesitated for a moment, and then placed at her feet all that I</i></p><p><i>   had dragged up, and stood silent.</i></p><p><i> She glanced at them and said, "What strange things are these?  I</i></p><p><i>   know not of what use they are!"</i></p><p><i> I bowed my head in shame and thought, "I have not fought for</i></p><p><i>   these, I did not buy them in the market; they are not fit gifts</i></p><p><i>   for her."</i></p><p><i> Then the whole night through I flung them one by one into the</i></p><p><i>   street.</i></p><p><i> In the morning travellers came; they picked them up and carried</i></p><p><i>   them into far countries.</i></p><p><i>- Rabindranath Tagore (The Gardener)</i></p>', '', '', 0, '2015-09-10 07:21:08', 28, 10010),
(200, 'Dreaming Touch', '<p><i>I travel afar where the huge puffy clouds touch the dim skirt of the ocean</i></p><p><i>Waving away the unnatural folds and streaming through the void notion</i></p><p><i>I rafted through the misty fog which gazed upon with an unknown look</i></p><p><i>Becoming mysterious as it came from some fairy tale book<br></i></p><blockquote [removed]="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote [removed]="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote [removed]="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote [removed]="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote [removed]="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote [removed] 0 0 0 40px; border: none; padding: 0px;"><p><i>- Atharva</i></p></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote>', '', '', 0, '2015-09-10 16:45:48', 28, 10010),
(201, 'TestIndent', '<p>I travel afar where the huge puffy clouds touch the dim skirt of the ocean</p><p>Waving away the unnatural folds and streaming through the void notion</p><p>I rafted through the misty fog which gazed upon with an unknown look</p><p>Becoming mysterious as it came from some fairy tale book</p><blockquote [removed] 0 0 0 40px; border: none; padding: 0px;"><p>-Atharva</p></blockquote>', '', '', 0, '2015-09-11 06:18:35', 1, 10010),
(202, 'TestIndent2', '<p>I travel afar where the huge puffy clouds touch the dim skirt of the ocean</p><p>Waving away the unnatural folds and streaming through the void notion</p><p>I rafted through the misty fog which gazed upon with an unknown look</p><p>Becoming mysterious as it came from some fairy tale book</p><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><p>-Atharva</p></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote>', '', '', 0, '2015-09-11 06:28:24', 1, 10010),
(203, 'dsadsdsad', '<blockquote>dasdsadhsakjdsa</blockquote>', '', '', 0, '2015-09-11 06:28:52', 1, 10010),
(204, 'Dream', '<p>I travel afar where the huge puffy clouds touch the dim skirt of the ocean</p><p>Waving away the unnatural folds and streaming through the void notion</p><p>I rafted through the misty fog which gazed upon with an unknown look</p><p>Becoming mysterious as it came from some fairy tale book</p><blockquote [removed]="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote [removed]="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote [removed]="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote [removed]="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote [removed]="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote [removed] 0 0 0 40px; border: none; padding: 0px;"><p>- Atharva</p></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote>', '', '', 0, '2015-09-11 06:29:52', 1, 10010),
(205, 'dsad', '<blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><p>dsadsadsdsdsd</p></blockquote></blockquote></blockquote></blockquote></blockquote>', '', '', 0, '2015-09-11 06:31:19', 1, 10010),
(206, 'Lucid Touch', '<p><i>I travel afar where the huge puffy clouds touch the dim skirt of the ocean</i></p><p><i>Waving away the unnatural folds and streaming through the void notion</i></p><p><i>I rafted through the misty fog which gazed upon with an unknown look</i></p><p><i>Becoming mysterious as it came from some fairy tale book</i></p><p><i>A strong luminance beyond the edge made a rift in the eye of mist</i></p><p><font face="Merriweather Italic"><i>Manifesting the creativity of thy nature which didnt exist</i></font></p><p><font face="Merriweather Italic"><i>Far in the placid stream were logs behind the tree</i></font></p><p><font face="Merriweather Italic"><i>Those were many such dreamers rafting like me<br></i></font></p><p><font face="Merriweather Italic"><i>Unknown of each other they smiled and said,</i></font></p><p><font face="Merriweather Italic"><i>" Reality is, everyone here is in someones head "</i></font></p><p><font face="Merriweather Italic"><i>Aware I became of this place which i created</i></font></p><p><font face="Merriweather Italic"><i>Even these voices were coming from my head</i></font></p><p><font face="Merriweather Italic"><i>Lucid I was wandering through my own creation</i></font></p><p><font face="Merriweather Italic"><i>" What if writing this is also an illusion ? "</i></font></p><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><p><i style="font-size: 11pt; font-variant: inherit; line-height: 1.5; word-spacing: normal;">- Atharva </i></p></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote></blockquote>', '', '', 0, '2015-09-11 07:19:19', 28, 10010),
(207, 'Jobs on creativity', '<p>Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn''t really do it, they just saw something. It seemed obvious to them after a while. That''s because they were able to connect experiences they''ve had and synthesize new things.</p>', '4877041442032350.jpg', '0px -32px', 0, '2015-09-12 04:33:20', 1, 10010),
(208, '', '', NULL, NULL, 0, '2015-09-16 12:36:50', 0, 10010),
(209, 'Designing ', '<p><i>Simple can be harder than complex, you have to work hard to get your thinking clean to make it simple. But its worth it in the end because as you get there you can move mountains. It is vivid realization of hardware and software in one device and you need to be at the intersection of technology and liberal arts. - Steve Jobs </i></p>', '1866101442496798.JPG', '0px -144px', 0, '2015-09-17 13:36:57', 4, 10010),
(210, 'Who am I ?', '<p><i>How can one sole poet unkown of this universe write his verse ?</i></p><p><i>How can he not write when he''s blessed with this curse ?</i></p><p><i>How can he sail his boat into sea when he cannot see its end ?</i></p><p><i>How can he write about it when he''s unknown from where it came ?</i></p>', '', '', 0, '2015-09-18 17:24:49', 0, 10010),
(211, 'Sole Poet', '<p><i>How can one sole poet unkown of this universe write his verse ?</i></p><p><i>How can he not write when he''s blessed with this curse ?</i></p><p><i>How can he sail his boat into sea when he cannot see its end ?</i></p><p><i>How can he write about it when he''s unknown from where it came ?</i></p>', '', '', 0, '2015-09-18 17:25:25', 1, 10010),
(212, 'dasdasdsadsa', '<p>Google ????? ????? ?????? ?????? ???</p>', '', '', 0, '2015-09-18 18:39:23', 0, 10010),
(213, 'dasdad', '<p>Google ????? ????? ?????? ?????? ???</p>', '', '', 0, '2015-09-18 18:39:38', 1, 10010),
(214, 'Death', '<p>I remember sitting in his backyard in his garden, one day, and he started talking about God. He [Jobs] said, “ Sometimes I believe in God, sometimes I don’t. I think it’s 50/50, maybe. But ever since I’ve had cancer, I’ve been thinking about it more, and I find myself believing a bit more, maybe it’s because I want to believe in an afterlife, that when you die, it doesn’t just all disappear. The wisdom you’ve accumulated, somehow it lives on.”</p><p>Then he paused for a second and said, “Yea, but sometimes, I think it’s just like an On-Off switch. Click. And you’re gone.” And then he paused again and said, “ And that’s why I don’t like putting On-Off switches on Apple devices.”</p><p>Joy to the WORLD! There IS an after-life!” </p>', '', '', 0, '2015-09-20 08:11:50', 1, 10010),
(217, 'Hello World', '<pre>#include &lt;stdio.h&gt; \nint main(){ \n    printf("Hello, World !"); \n    return 0;&nbsp;\n}</pre>', '', '0% 0%', 0, '2015-09-20 16:29:57', 1, 10010),
(220, 'Hello C', '<pre>#include <;stdio.h>; <br>int main(){ <br>    printf("Hello, World !"); <br>    return 0; <br>}</pre>', '', '', 0, '2015-09-20 16:37:59', 20, 10010),
(221, 'Silico Valley', '<p>Its a cradle for innovation !! </p>', '7084111442849329.jpeg', '0% 0%', 0, '2015-09-21 15:29:41', 1, 10010),
(222, 'Coming back to life', '<p>Where were you when I was burned and broken</p><p>While the days slipped by from my window watching</p><p>And where were you when I was hurt and I was helpless</p><p>''Cause the things you say and the things you do surround me</p><p>While you were hanging yourself on someone else''s words</p><p>Dying to believe in what you heard</p><p>I was staring straight into the shining sun</p><p>Lost in thought and lost in time</p><p>While the seeds of life and the seeds of change were planted</p><p>Outside the rain fell dark and slow</p><p>While I pondered on this dangerous but irresistible pastime</p><p>I took a heavenly ride through our silence</p><p>I knew the moment had arrived</p><p>For killing the past and coming back to life</p><p>I took a heavenly ride through our silence</p><p>I knew the waiting had begun</p><p>And headed straight ...into the shining sun</p>', '466981442905792.png', '0px -27px', 0, '2015-09-22 07:10:41', 1, 10011),
(227, 'Here comes the sun when i say its alright little darling', '<p>Little darling, it''s been a long cold lonely winter</p><p>Little darling, it feels like years since it''s been here</p><p>Here comes the sun, here comes the sun</p><p>And I say it''s all right</p>', '', '', 0, '2015-09-23 18:11:24', 1, 10010),
(245, 'Fucking errors', '<p><br></p>', '5041971443286218.gif', '0px -107px', 0, '2015-09-26 16:51:14', 20, 10010),
(246, 'To Thine Own Self Be True', '<p>It''s a way of saying that nothing at all matters more to how we should act than our own esteem. It says that we should stick to our principles, not assimilate, and that we should do what we believe. It is certainly beautifully phrased, and invokes ideas with positive connotations: truth, self-ownership, individuality. But, are these virtues really hiding a fundamental vice? ;</p>', '', '', 0, '2015-10-02 08:23:35', 1, 10010),
(248, 'Fondness of Blue', '<p><i>how many colors this sea is hiding.....?</i></p><p><i>''not more than your eyes'' I mutter!</i></p><p><i>whenever I decide to take a deep dive in those</i></p><p><i>why does my mind clutter?</i></p><p><i><br></i></p><p><i>I guess there lies the attachment ,</i></p><p><i>between the sea longing for the skyline....</i></p><p><i>alike our innocence</i></p><p><i>still withered , long way to shine !</i></p><p><i><br></i></p><p><i>Even though , I lean on you </i></p><p><i>for the blue beauty you take me into...</i></p><p><i>coz I believe , not me nor you</i></p><p><i>but this bonding will go long way through.....</i></p>', '', '', 0, '2015-10-02 11:22:26', 28, 10012),
(249, 'Refining the UX for a Continuous Video Experience', '<p>Video is central to the user experience of the World Surf League. The mobile apps launched in March build on the WSL’s promise of the best surfers on the best waves, delivering them to a passionate, global, and increasingly mobile audience. Video presents some interesting UX challenges and since it’s been my focus for a few weeks I thought I’d share the journey. I’ve included quite a few gifs to communicate this motion/animation focussed design, so hang in there as they load/loop.</p>', '6840921443841577.png', '0px -9px', 0, '2015-10-03 03:06:23', 1, 10010),
(250, 'Skyline', '<p>Need i say more ?</p>', '964051443842260.jpg', '0px -172px', 0, '2015-10-03 03:17:50', 1, 10010),
(251, 'Matrix', '<p>There is no spoon . . . . .</p>', '2092691443857065.png', '0px -16px', 0, '2015-10-03 07:24:54', 1, 10010),
(252, 'Nothing Is Solid', '<p><ul><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">Nobel Prize winning physicists have proven beyond doubt that the physical world is one large sea of energy that flashes into and out of being in milliseconds, over and over again.</span><br></li><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">Nothing is solid.</span><br></li><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">This is the world of Quantum Physics.</span><br></li><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">They have proven that thoughts are what put together and hold together this ever-changing energy field into the ‘objects’ that we see.</span><br></li><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">So why do we see a person instead of a flashing cluster of energy?</span><br></li><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">Think of a movie reel.</span><br></li><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">A movie is a collection of about 24 frames a second. Each frame is separated by a gap. However, because of the speed at which one frame replaces another, our eyes get cheated into thinking that we see a continuous and moving picture.</span><br></li><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">Think of television.</span><br></li><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">A TV tube is simply a tube with heaps of electrons hitting the screen in a certain way, creating the illusion of form and motion.</span><br></li><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">This is what all objects are anyway. You have 5 physical senses (sight, sound, touch, smell, and taste).</span><br></li><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">Each of these senses has a specific spectrum (for example, a dog hears a different range of sound than you do; a snake sees a different spectrum of light than you do; and so on).</span><br></li><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">In other words, your set of senses perceives the sea of energy from a certain limited standpoint and makes up an image from that.</span><br></li><li><span style="font-size: 11pt; font-style: normal; line-height: 1.5; word-spacing: normal;">It is not complete, nor is it accurate. It is just an interpretation.</span><br></li></ul></p>', '2055001444322398.jpg', '0px -4px', 0, '2015-10-08 16:40:05', 22, 10010),
(255, 'Mobile post', '<p>post from mobile</p>', '', '', 0, '2015-10-09 09:04:21', 1, 10010),
(256, 'Notifications', '<p>Atlast notifications are over</p>', '', '', 0, '2015-10-11 18:42:11', 1, 10011),
(257, 'code', '<pre style="\n    float: left;\n    margin: 2px;\n">document.getElementByid ;</pre><p>not working in js</p>', '', '', 0, '2015-10-12 17:45:12', 20, 10011);

--
-- Triggers `thread`
--
DROP TRIGGER IF EXISTS `ac_dThread`;
DELIMITER $$
CREATE TRIGGER `ac_dThread` AFTER DELETE ON `thread` FOR EACH ROW begin set @tid=old.srno; set @uid=old.uid;delete from activitylog where ref=@tid and uid=@uid and type=3; end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_eThread`;
DELIMITER $$
CREATE TRIGGER `ac_eThread` AFTER UPDATE ON `thread` FOR EACH ROW begin 
insert into threadhistory(title, description, imagepath, coordinates,cid, uid, tid) values(old.title, old.description, old.imagepath, old.coordinates,old.cid, old.uid, old.srno); 
end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_iThread`;
DELIMITER $$
CREATE TRIGGER `ac_iThread` AFTER INSERT ON `thread` FOR EACH ROW begin 
set @tid=new.srno; 
set @title=new.title; 
set @uid=new.uid; 
set @descr=concat('Created a new thread "', @title, '"'); 
insert into activitylog(description, type, ref, uid) values(@descr, 3, @tid, @uid); 
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `threadhistory`
--

DROP TABLE IF EXISTS `threadhistory`;
CREATE TABLE `threadhistory` (
  `srno` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `imagepath` text,
  `coordinates` varchar(30) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threadhistory`
--

INSERT INTO `threadhistory` (`srno`, `title`, `description`, `imagepath`, `coordinates`, `timestamp`, `cid`, `uid`, `tid`) VALUES
(1, 'iPhone 6s ', '<p>Introducing iPhone6S 3D Force Touch </p>', 'userdata/10010/9569881441864686.png', '0px -5px', '2015-09-26 10:59:00', 25, 10010, 198),
(2, 'Jobs on creativity', '<p>Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn''t really do it, they just saw something. It seemed obvious to them after a while. That''s because they were able to connect experiences they''ve had and synthesize new things.</p>', 'userdata/10010/4877041442032350.jpg', '0px -32px', '2015-09-26 10:59:15', 1, 10010, 207),
(3, 'Designing ', '<p><i>Simple can be harder than complex, you have to work hard to get your thinking clean to make it simple. But its worth it in the end because as you get there you can move mountains. It is vivid realization of hardware and software in one device and you need to be at the intersection of technology and liberal arts. - Steve Jobs </i></p>', 'userdata/10010/1866101442496798.JPG', '0px -144px', '2015-09-26 10:59:31', 4, 10010, 209),
(4, 'Silico Valley', '<p>Its a cradle for innovation !! </p>', 'userdata/10010/7084111442849329.jpeg', '0% 0%', '2015-09-26 11:00:04', 1, 10010, 221),
(5, 'Coming back to life', '<p>Where were you when I was burned and broken</p><p>While the days slipped by from my window watching</p><p>And where were you when I was hurt and I was helpless</p><p>''Cause the things you say and the things you do surround me</p><p>While you were hanging yourself on someone else''s words</p><p>Dying to believe in what you heard</p><p>I was staring straight into the shining sun</p><p>Lost in thought and lost in time</p><p>While the seeds of life and the seeds of change were planted</p><p>Outside the rain fell dark and slow</p><p>While I pondered on this dangerous but irresistible pastime</p><p>I took a heavenly ride through our silence</p><p>I knew the moment had arrived</p><p>For killing the past and coming back to life</p><p>I took a heavenly ride through our silence</p><p>I knew the waiting had begun</p><p>And headed straight ...into the shining sun</p>', 'userdata/10011/466981442905792.png', '0px -27px', '2015-09-26 11:00:56', 1, 10011, 222);

-- --------------------------------------------------------

--
-- Table structure for table `thread_tags`
--

DROP TABLE IF EXISTS `thread_tags`;
CREATE TABLE `thread_tags` (
  `name` varchar(30) DEFAULT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread_tags`
--

INSERT INTO `thread_tags` (`name`, `tid`) VALUES
('stevejobs', 196),
('crazyones', 196),
('quote', 196),
('apple', 196),
('gag', 197),
('iPhone6S', 198),
('apple', 198),
('iOS', 198),
('forcetouch', 198),
('thegarderner', 199),
('poem', 199),
('prose', 199),
('tagore', 199),
('poem', 200),
('poetic', 200),
('wanderer', 200),
('testindent', 201),
('luciddreaming', 206),
('creativity', 207),
('stevejobs', 207),
('stevejobs', 209),
('design', 209),
('simplicity', 209),
('whoami', 210),
('universe', 210),
('existence', 210),
('poet', 211),
('poetry', 211),
('marathi', 212),
('marathi', 213),
('jobs', 214),
('death', 214),
('afterlife', 214),
('helloworld', 217),
('stevejobs', 221),
('siliconvalley', 221),
('pinkfloyd', 222),
('backtolife', 222),
('psychedelic', 222),
('beatles', 227),
('herecomesthesun', 227),
('errors', 245),
('coding', 245),
('thine', 246),
('ownself', 246),
('fondness', 248),
('blue', 248),
('sea', 248),
('eyes', 248),
('UX', 249),
('skyline', 250),
('matrix', 251),
('spoon', 251),
('neo', 251),
('oracle', 251),
('physics', 252),
('quantumphysics', 252),
('reality', 252),
('energy', 252),
('mobile', 255),
('soapboxmobile', 255),
('soapboxnotifications', 256),
('js', 257);

-- --------------------------------------------------------

--
-- Table structure for table `trackthread`
--

DROP TABLE IF EXISTS `trackthread`;
CREATE TABLE `trackthread` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trackthread`
--

INSERT INTO `trackthread` (`tid`, `uid`) VALUES
(199, 10010),
(207, 10010),
(208, 10010),
(209, 10010),
(210, 10010),
(211, 10010),
(212, 10010),
(213, 10010),
(214, 10010),
(217, 10010),
(220, 10010),
(221, 10010),
(227, 10010),
(245, 10010),
(246, 10010),
(249, 10010),
(250, 10010),
(251, 10010),
(252, 10010),
(255, 10010),
(256, 10010),
(222, 10011),
(256, 10011),
(257, 10011),
(248, 10012);

-- --------------------------------------------------------

--
-- Table structure for table `upvotes_to_replies`
--

DROP TABLE IF EXISTS `upvotes_to_replies`;
CREATE TABLE `upvotes_to_replies` (
  `srno` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvotes_to_replies`
--

INSERT INTO `upvotes_to_replies` (`srno`, `rid`, `uid`) VALUES
(1, 1, 10011),
(2, 3, 10010);

--
-- Triggers `upvotes_to_replies`
--
DROP TRIGGER IF EXISTS `ac_dUpvoteToReply`;
DELIMITER $$
CREATE TRIGGER `ac_dUpvoteToReply` AFTER DELETE ON `upvotes_to_replies` FOR EACH ROW begin 
set @srno=old.srno;
set @uid=old.uid; 
set @rid=old.rid;
set @rowner=(select uid from reply where srno=@rid);
delete from notifications where ref=@srno and uid=@rowner and type=4;
delete from activitylog where ref=@srno and uid=@uid and type=4; 
end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_iUpvoteToReply`;
DELIMITER $$
CREATE TRIGGER `ac_iUpvoteToReply` AFTER INSERT ON `upvotes_to_replies` FOR EACH ROW begin
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
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `upvotes_to_thread`
--

DROP TABLE IF EXISTS `upvotes_to_thread`;
CREATE TABLE `upvotes_to_thread` (
  `srno` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvotes_to_thread`
--

INSERT INTO `upvotes_to_thread` (`srno`, `tid`, `uid`) VALUES
(1, 222, 10010),
(2, 227, 10010),
(3, 249, 10010),
(4, 198, 10010),
(5, 249, 10011),
(6, 251, 10010),
(7, 250, 10010),
(8, 248, 10010),
(9, 252, 10010),
(10, 252, 10011),
(11, 251, 10011),
(16, 256, 10010),
(17, 255, 10011),
(18, 257, 10010);

--
-- Triggers `upvotes_to_thread`
--
DROP TRIGGER IF EXISTS `ac_dUpvote`;
DELIMITER $$
CREATE TRIGGER `ac_dUpvote` AFTER DELETE ON `upvotes_to_thread` FOR EACH ROW begin 
set @srno = old.srno;
set @userid = old.uid;
set @threadid = old.tid;
set @towner=(select uid from thread where srno=@threadid);
delete from notifications where ref=@srno and type=3 and uid=@towner;
delete from activitylog where ref=@srno and uid=@userid and type=0; 
end
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ac_iUpvote`;
DELIMITER $$
CREATE TRIGGER `ac_iUpvote` AFTER INSERT ON `upvotes_to_thread` FOR EACH ROW begin 
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
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

DROP TABLE IF EXISTS `useraccounts`;
CREATE TABLE `useraccounts` (
  `srno` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`srno`, `username`, `password`, `timestamp`) VALUES
(10010, 'sipps7', '4280a1f43bdcb20dff373c79a8390df2', '2015-09-10 05:35:40'),
(10011, 'boom_shankar', '2dd948da0b7fc3df9ee4cb7d09b582e7', '2015-09-15 16:36:17'),
(10012, 'gaargijo', '2dd948da0b7fc3df9ee4cb7d09b582e7', '2015-10-02 11:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

DROP TABLE IF EXISTS `views`;
CREATE TABLE `views` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`tid`, `uid`) VALUES
(196, 10010),
(198, 10010),
(199, 10010),
(200, 10010),
(206, 10010),
(207, 10010),
(209, 10010),
(214, 10011),
(221, 10010),
(222, 10010),
(222, 10011),
(227, 10010),
(245, 10010),
(246, 10010),
(246, 10012),
(248, 10010),
(248, 10012),
(249, 10010),
(249, 10011),
(250, 10010),
(251, 10010),
(251, 10011),
(252, 10010),
(252, 10011),
(255, 10010),
(255, 10011),
(256, 10010),
(256, 10011),
(257, 10010);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD KEY `uid_al_fk` (`uid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `category_user`
--
ALTER TABLE `category_user`
  ADD KEY `cid_fk` (`cid`),
  ADD KEY `uid_fk_cu` (`uid`);

--
-- Indexes for table `extendedinfo`
--
ALTER TABLE `extendedinfo`
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `uid_fk` (`uid`);

--
-- Indexes for table `hidethread`
--
ALTER TABLE `hidethread`
  ADD PRIMARY KEY (`tid`,`uid`),
  ADD KEY `uid_ht_fk` (`uid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD KEY `uid_n_fk` (`uid`);

--
-- Indexes for table `readinglist`
--
ALTER TABLE `readinglist`
  ADD PRIMARY KEY (`tid`,`uid`),
  ADD KEY `uid_rl_fk` (`uid`);

--
-- Indexes for table `replies_to_reply`
--
ALTER TABLE `replies_to_reply`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `rid_rr_fk` (`rid`),
  ADD KEY `uid_rr_fk` (`uid`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `tid_reply_fk` (`tid`),
  ADD KEY `uid_reply_fk` (`uid`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `uid_thread_fk` (`uid`);

--
-- Indexes for table `threadhistory`
--
ALTER TABLE `threadhistory`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `cid_th_fk` (`cid`),
  ADD KEY `uid_th_fk` (`uid`),
  ADD KEY `tid_th_fk` (`tid`);

--
-- Indexes for table `thread_tags`
--
ALTER TABLE `thread_tags`
  ADD KEY `tid_fk` (`tid`);

--
-- Indexes for table `trackthread`
--
ALTER TABLE `trackthread`
  ADD PRIMARY KEY (`tid`,`uid`),
  ADD KEY `uid_tt_fk` (`uid`);

--
-- Indexes for table `upvotes_to_replies`
--
ALTER TABLE `upvotes_to_replies`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `rid_utr_fk` (`rid`),
  ADD KEY `uid_utr_fk` (`uid`);

--
-- Indexes for table `upvotes_to_thread`
--
ALTER TABLE `upvotes_to_thread`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `tid_uvtt_fk` (`tid`),
  ADD KEY `uid_uvtt_fk` (`uid`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`srno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`tid`,`uid`),
  ADD KEY `tid_v_fk` (`tid`),
  ADD KEY `uid_v_fk` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `replies_to_reply`
--
ALTER TABLE `replies_to_reply`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT for table `threadhistory`
--
ALTER TABLE `threadhistory`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `upvotes_to_replies`
--
ALTER TABLE `upvotes_to_replies`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `upvotes_to_thread`
--
ALTER TABLE `upvotes_to_thread`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10013;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
