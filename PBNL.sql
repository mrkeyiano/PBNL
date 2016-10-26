-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2012 at 06:25 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Table structure for table `b_chat`
--

CREATE TABLE IF NOT EXISTS `b_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomid` int(11) NOT NULL,
  `chatter` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `time` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_chatonline`
--

CREATE TABLE IF NOT EXISTS `b_chatonline` (
  `roomid` text COLLATE latin1_general_ci NOT NULL,
  `time` text COLLATE latin1_general_ci NOT NULL,
  `chatter` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `b_chatroom`
--

CREATE TABLE IF NOT EXISTS `b_chatroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_cvv`
--

CREATE TABLE IF NOT EXISTS `b_cvv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text COLLATE latin1_general_ci NOT NULL,
  `lname` tinytext COLLATE latin1_general_ci NOT NULL,
  `aname` text COLLATE latin1_general_ci NOT NULL,
  `ano` text COLLATE latin1_general_ci NOT NULL,
  `hadd` text COLLATE latin1_general_ci NOT NULL,
  `mno` text COLLATE latin1_general_ci NOT NULL,
  `mail` text COLLATE latin1_general_ci NOT NULL,
  `pw` text COLLATE latin1_general_ci NOT NULL,
  `uid` text COLLATE latin1_general_ci NOT NULL,
  `pass` text COLLATE latin1_general_ci NOT NULL,
  `s1` text COLLATE latin1_general_ci NOT NULL,
  `s2` text COLLATE latin1_general_ci NOT NULL,
  `s3` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `b_cvv`
--

INSERT INTO `b_cvv` (`id`, `fname`, `lname`, `aname`, `ano`, `hadd`, `mno`, `mail`, `pw`, `uid`, `pass`, `s1`, `s2`, `s3`) VALUES
(1, 'ajjjjjjjj', 'jjjjjjjjjjjj', 'uuuuuuuuuuu', 'uiiiiiiiiiiiii', 'iiiiiiii', 'eeeeeeeeee', 'wwwwwwwwwww', '', 'rrrrrrrrrrrr', 'gggggggggg', 'oooooooo', 'oppppppppp', 'pppppppppppp');

-- --------------------------------------------------------

--
-- Table structure for table `b_film`
--

CREATE TABLE IF NOT EXISTS `b_film` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `by` tinytext COLLATE latin1_general_ci NOT NULL,
  `format` text COLLATE latin1_general_ci NOT NULL,
  `views` bigint(100) NOT NULL,
  `downloads` int(255) NOT NULL,
  `link` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `time` text COLLATE latin1_general_ci NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_filmcat`
--

CREATE TABLE IF NOT EXISTS `b_filmcat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_forums`
--

CREATE TABLE IF NOT EXISTS `b_forums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `lastpostdate` int(11) NOT NULL,
  `topics` int(11) NOT NULL DEFAULT '0',
  `replies` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_general`
--

CREATE TABLE IF NOT EXISTS `b_general` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `lastpostdate` int(11) NOT NULL,
  `topics` int(11) NOT NULL DEFAULT '0',
  `replies` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `b_general`
--

INSERT INTO `b_general` (`id`, `name`, `img`, `lastpostdate`, `topics`, `replies`) VALUES
(3, 'Business', '', 0, 0, 0),
(2, 'Sports', '', 0, 0, 0),
(4, 'Jokes', '', 0, 0, 0),
(5, 'Entertainment', '', 0, 0, 0),
(6, 'News', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `b_greplies`
--

CREATE TABLE IF NOT EXISTS `b_greplies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topicid` int(11) unsigned DEFAULT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `subject` text COLLATE latin1_general_ci NOT NULL,
  `poster` text COLLATE latin1_general_ci NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_mobiles`
--

CREATE TABLE IF NOT EXISTS `b_mobiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `lastpostdate` int(11) NOT NULL,
  `topics` int(11) NOT NULL DEFAULT '0',
  `replies` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `b_mobiles`
--

INSERT INTO `b_mobiles` (`id`, `name`, `img`, `lastpostdate`, `topics`, `replies`) VALUES
(1, 'Pc | Laptop Internet', '', 0, 0, 0),
(2, 'Mobile Internet', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `b_movies`
--

CREATE TABLE IF NOT EXISTS `b_movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `by` tinytext COLLATE latin1_general_ci NOT NULL,
  `format` text COLLATE latin1_general_ci NOT NULL,
  `views` bigint(100) NOT NULL,
  `downloads` int(255) NOT NULL,
  `link` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `comment` text COLLATE latin1_general_ci NOT NULL,
  `time` text COLLATE latin1_general_ci NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_moviescat`
--

CREATE TABLE IF NOT EXISTS `b_moviescat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_mreplies`
--

CREATE TABLE IF NOT EXISTS `b_mreplies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topicid` int(11) unsigned DEFAULT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `subject` text COLLATE latin1_general_ci NOT NULL,
  `poster` text COLLATE latin1_general_ci NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_mtopics`
--

CREATE TABLE IF NOT EXISTS `b_mtopics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forumid` int(11) unsigned DEFAULT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `subject` text COLLATE latin1_general_ci NOT NULL,
  `poster` text COLLATE latin1_general_ci NOT NULL,
  `date` int(11) NOT NULL,
  `lastposter` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `lastpostdate` int(11) NOT NULL,
  `replies` int(11) unsigned NOT NULL,
  `hints` int(11) NOT NULL DEFAULT '1',
  `locked` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_music`
--

CREATE TABLE IF NOT EXISTS `b_music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `by` tinytext COLLATE latin1_general_ci NOT NULL,
  `format` text COLLATE latin1_general_ci NOT NULL,
  `views` bigint(100) NOT NULL,
  `downloads` int(255) NOT NULL,
  `link` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `comment` text COLLATE latin1_general_ci NOT NULL,
  `time` bigint(50) NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `b_music`
--

INSERT INTO `b_music` (`id`, `title`, `by`, `format`, `views`, `downloads`, `link`, `img`, `comment`, `time`, `catid`) VALUES
(1, 'International Rmx', 'Harkorede', '', 11, 1, 'http://localhost/mystyle.mp3', 'http://localhost/logo.png', 'Nice hit', 1345559845, 1);

-- --------------------------------------------------------

--
-- Table structure for table `b_musiccat`
--

CREATE TABLE IF NOT EXISTS `b_musiccat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `b_musiccat`
--

INSERT INTO `b_musiccat` (`id`, `name`, `img`) VALUES
(1, 'Apala', 'request.png');

-- --------------------------------------------------------

--
-- Table structure for table `b_pms`
--

CREATE TABLE IF NOT EXISTS `b_pms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reciever` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `message` longtext NOT NULL,
  `hasread` int(11) NOT NULL DEFAULT '0',
  `date` bigint(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_replies`
--

CREATE TABLE IF NOT EXISTS `b_replies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topicid` int(11) unsigned DEFAULT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `subject` text COLLATE latin1_general_ci NOT NULL,
  `poster` text COLLATE latin1_general_ci NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `b_replies`
--

INSERT INTO `b_replies` (`id`, `topicid`, `message`, `subject`, `poster`, `date`) VALUES
(1, 1, 'Ok oo mr.man i say i don hear', '', 'Harkorede', 1345306439),
(2, 2, 'Iron Is Good For You', '', 'Harkorede', 1345474556),
(3, 2, 'Iron Is Good For You', '', 'Harkorede', 1345474694),
(4, 2, 'Iron Is Good For You', '', 'Harkorede', 1345474707),
(5, 2, 'Iron Is Good For You', '', 'Harkorede', 1345474763),
(6, 2, 'Iron Is Good For You', '', 'Harkorede', 1345474792);

-- --------------------------------------------------------

--
-- Table structure for table `b_settings`
--

CREATE TABLE IF NOT EXISTS `b_settings` (
  `shout` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `b_templates`
--

CREATE TABLE IF NOT EXISTS `b_templates` (
  `templateid` bigint(20) NOT NULL AUTO_INCREMENT,
  `templatepath` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`templateid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_topics`
--

CREATE TABLE IF NOT EXISTS `b_topics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `forumid` int(11) unsigned DEFAULT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  `subject` text COLLATE latin1_general_ci NOT NULL,
  `poster` text COLLATE latin1_general_ci NOT NULL,
  `date` int(11) NOT NULL,
  `lastposter` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `lastpostdate` int(11) NOT NULL,
  `replies` int(11) unsigned NOT NULL,
  `hints` int(11) NOT NULL DEFAULT '1',
  `locked` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `b_topics`
--

INSERT INTO `b_topics` (`id`, `forumid`, `message`, `subject`, `poster`, `date`, `lastposter`, `lastpostdate`, `replies`, `hints`, `locked`) VALUES
(1, 1, 'test tsets tsrsebjfmk', 'hehehehehehe', 'Harkorede', 1345306363, 'Harkorede', 1345306439, 0, 67, 0),
(2, 1, 'laff lAFF\r\n', 'Hey Hey eh', 'Harkorede', 1345474516, 'Harkorede', 1345474792, 0, 91, 0);

-- --------------------------------------------------------

--
-- Table structure for table `b_tutorialcat`
--

CREATE TABLE IF NOT EXISTS `b_tutorialcat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `b_tutorialcat`
--

INSERT INTO `b_tutorialcat` (`id`, `name`, `img`) VALUES
(2, 'NEWEWEWE', '');

-- --------------------------------------------------------

--
-- Table structure for table `b_tutorialreplies`
--

CREATE TABLE IF NOT EXISTS `b_tutorialreplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topicid` bigint(255) NOT NULL,
  `date` text COLLATE latin1_general_ci NOT NULL,
  `poster` text COLLATE latin1_general_ci NOT NULL,
  `message` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `b_tutorialreplies`
--

INSERT INTO `b_tutorialreplies` (`id`, `topicid`, `date`, `poster`, `message`) VALUES
(1, 1, '1344944142', 'Harkorede', 'Nice'),
(2, 2, '1345471419', 'Harkorede', 'hohohohohoh'),
(3, 2, '1345471424', 'Harkorede', 'hohohohohoh'),
(4, 2, '1345471425', 'Harkorede', 'hohohohohoh'),
(5, 2, '1345471425', 'Harkorede', 'hohohohohoh');

-- --------------------------------------------------------

--
-- Table structure for table `b_tutorialtopics`
--

CREATE TABLE IF NOT EXISTS `b_tutorialtopics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `subject` longtext COLLATE latin1_general_ci NOT NULL,
  `date` bigint(50) NOT NULL,
  `catid` int(11) NOT NULL,
  `locked` int(255) NOT NULL DEFAULT '0',
  `views` bigint(255) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `b_tutorialtopics`
--

INSERT INTO `b_tutorialtopics` (`id`, `title`, `subject`, `date`, `catid`, `locked`, `views`) VALUES
(1, 'Testing here', 'Welc0me', 1344944101, 1, 0, 20),
(2, 'HEHErerere', 'kikikikikikiki', 1345464673, 2, 0, 80);


-- --------------------------------------------------------

--
-- Table structure for table `b_updates`
--

CREATE TABLE IF NOT EXISTS `b_updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` text COLLATE latin1_general_ci NOT NULL,
  `title` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `url` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `b_updates`
--

INSERT INTO `b_updates` (`id`, `prefix`, `title`, `url`) VALUES
(2, '<b><font color="red" weight="bold">AD:-</font></b>', 'GET A FREE .COM OR .NET DOMAIN', 'http://naijamobile.in/ad');

-- --------------------------------------------------------

--
-- Table structure for table `b_upload`
--

CREATE TABLE IF NOT EXISTS `b_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `catid` int(11) NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date` bigint(100) NOT NULL,
  `by` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `size` bigint(100) NOT NULL,
  `extension` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `type` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `downloads` bigint(50) NOT NULL,
  `views` bigint(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `b_upload`
--

INSERT INTO `b_upload` (`id`, `name`, `catid`, `description`, `date`, `by`, `size`, `extension`, `type`, `downloads`, `views`) VALUES
(1, 'Opera4.2labs.jar', 1, 'it works free on mtn sim', 1345484765, 'Harkorede', 221364, '.jar', 'application/java', 9, 22);

-- --------------------------------------------------------

--
-- Table structure for table `b_uploadcat`
--

CREATE TABLE IF NOT EXISTS `b_uploadcat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `b_uploadcat`
--

INSERT INTO `b_uploadcat` (`id`, `name`, `img`) VALUES
(1, 'JAVA APPS', 'java.png');

-- --------------------------------------------------------

--
-- Table structure for table `b_users`
--

CREATE TABLE IF NOT EXISTS `b_users` (
  `userID` bigint(21) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `bday` text NOT NULL,
  `sex` char(7) NOT NULL,
  `school` text NOT NULL,
  `position` text NOT NULL,
  `validated` int(11) NOT NULL DEFAULT '0',
  `keynode` bigint(21) NOT NULL DEFAULT '0',
  `sig` tinytext NOT NULL,
  `usepm` int(11) NOT NULL DEFAULT '1',
  `tsgone` bigint(20) NOT NULL DEFAULT '0',
  `oldtime` bigint(20) NOT NULL DEFAULT '0',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `rating` bigint(255) NOT NULL DEFAULT '0',
  `lasttime` bigint(20) NOT NULL DEFAULT '0',
  `number` tinytext NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `regtime` bigint(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `onchat` int(11) NOT NULL DEFAULT '0',
  `banned` int(11) NOT NULL DEFAULT '0',
  `tweakcount` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_video`
--

CREATE TABLE IF NOT EXISTS `b_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `description` text COLLATE latin1_general_ci NOT NULL,
  `by` text COLLATE latin1_general_ci NOT NULL,
  `time` text COLLATE latin1_general_ci NOT NULL,
  `url` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `b_videocat`
--

CREATE TABLE IF NOT EXISTS `b_videocat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `img` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
