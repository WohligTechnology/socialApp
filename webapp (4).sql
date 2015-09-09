-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2015 at 11:17 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Operator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `text` text NOT NULL,
  `type` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `title`, `content`, `text`, `type`, `image`) VALUES
(4, 'Login122', 'want Login122', '[{"name":"email","value":true},{"name":"Google","value":false,"appid":"","secret":""},{"name":"Facebook","value":true,"appid":"","secret":""},{"name":"twitter","value":false,"appid":"","secret":""},{"name":"instagram","value":true,"appid":"","secret":""}]', 2, ''),
(5, 'Blogs122ttdgd', 'want Blog1222ttgsd', '[{"name":"cms","value":false},{"name":"wordpress","value":true,"appid":"","secret":""},{"name":"tumblr","value":false,"appid":"","secret":""}]', 1, ''),
(6, 'Gallery', 'Gallery Content', 'Drop down yes', 3, ''),
(7, 'Video Gallery', 'want Video Gallery', 'Drop down yes', 3, ''),
(8, 'Events', 'Event content', 'Drop down yes', 3, ''),
(9, 'Logo', 'Add logo here', 'download_(2)3.jpg', 2, 'download_(2)3.jpg'),
(10, 'Background Image', 'Background Image content', 'download_(1)2.jpg', 2, 'download_(1)2.jpg'),
(11, 'Banner', 'want banner', 'Drop down no', 3, ''),
(12, 'Title', 'want title', 'kmujyhbgvc', 1, ''),
(13, 'Description', 'description content', 'dessssssssssss', 1, ''),
(14, 'Colour Of App', 'app color', 'red', 1, ''),
(15, 'Meta Keyword', 'keywords', 'xdcvgh', 1, ''),
(16, 'Meta Description', 'meta Description', 'sxdrcvgbh', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE IF NOT EXISTS `logintype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(2, 'Articles', '', '', 'site/viewarticles', 1, 0, 1, 2, 'icon-book'),
(3, 'Menu', '', '', 'site/viewfrontmenu', 1, 0, 1, 3, 'icon-list'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(5, 'Gallery', '', '', 'site/viewgallery', 1, 0, 1, 4, 'icon-th'),
(6, 'Config', '', '', 'site/viewconfig', 1, 0, 1, 18, 'icon-fire'),
(7, 'Videos', '', '', 'site/viewvideogallery', 1, 0, 1, 6, 'icon-camera'),
(9, 'Events', '', '', 'site/viewevents', 1, 0, 1, 8, 'icon-bell-alt'),
(12, 'Enquiry', '', '', 'site/viewenquiry', 1, 0, 1, 11, 'icon-coffee'),
(13, 'Notification', '', '', 'site/viewnotification', 1, 0, 1, 12, 'icon-bell'),
(15, 'Blog', '', '', 'site/viewblog', 1, 0, 1, 14, 'icon-leaf'),
(18, 'Slider', '', '', 'site/viewslider', 1, 0, 1, 17, 'icon-gittip');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `order`, `status`, `alt`) VALUES
(2, 'Event-management.png', 1, 1, ''),
(3, 'Event-management.png', 2, 1, ''),
(4, 'Event-management.png', 3, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Enable'),
(2, 'Disable');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Text'),
(2, 'File');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `dob` date DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `google` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `instagram` int(11) NOT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `dob`, `street`, `address`, `city`, `state`, `pincode`, `facebook`, `twitter`, `google`, `country`, `instagram`, `contact`) VALUES
(1, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, 'ArmaanPatraRollsEdit2.jpg', '', '', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(4, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'swati@email.com', 1, '2014-05-12 06:52:44', 1, NULL, 'wohlig', '1', '1', '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '9898798889'),
(5, 'wohlig123', 'wohlig123', 'wohlig1@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(6, 'wohlig1', 'a63526467438df9566c508027d9cb06b', 'wohlig2@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, ''),
(21, 'Pooja Thakare', '47439c518d54f8af50246e9b1d4486ae', '', 3, '2015-09-02 07:19:59', 1, 'https://graph.facebook.com/444037772434450/picture?width=150&height=150', '', '444037772434450', 'Facebook', '', '0000-00-00', '', ',', '', '', '', '444037772434450', '', '', '', 0, ''),
(22, 'poojathakare55', '', '', 3, '2015-09-02 08:18:46', 1, 'http://pbs.twimg.com/profile_images/638413672780443648/CSoclRQQ_normal.jpg', '', '3104340877', 'Twitter', '', '0000-00-00', '', ',Navi Mumbai, Maharashtra', '', '', '', '', '3104340877', '', '', 0, ''),
(24, 'Dhaval Gala', '', '', 3, '2015-09-02 08:34:39', 1, 'https://igcdn-photos-b-a.akamaihd.net/hphotos-ak-xfp1/t51.2885-19/11049183_403558949816473_1946831034_a.jpg', '', '999244606', 'Instagram', '', '0000-00-00', '', ',', '', '', '', '', '', '', '', 999244606, ''),
(26, 'Pooja Thakare', '', 'pooja.wohlig@gmail.com', 3, '2015-09-02 08:38:08', 1, 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', '103402210128529539675', 'Google', '', '0000-00-00', '', ',', '', '', '', '', '', '103402210128529539675', '', 0, ''),
(30, 'Dhaval Gala', '', 'dhavalwohlig@gmail.com', 3, '2015-09-03 05:40:25', 1, 'https://lh5.googleusercontent.com/-XpnZx6dcp2M/AAAAAAAAAAI/AAAAAAAAADE/uIq9LgBS4uA/photo.jpg', '', '105578617147285044793', 'Google', '', '0000-00-00', '', ',', '', '', '', '', '', '105578617147285044793', '', 0, ''),
(31, 'pooja', 'a63526467438df9566c508027d9cb06b', 'pooja@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, 'swati', '1', '1', '', '1992-12-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '8979879879');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_articles`
--

CREATE TABLE IF NOT EXISTS `webapp_articles` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_articles`
--

INSERT INTO `webapp_articles` (`id`, `status`, `title`, `json`, `content`, `timestamp`, `image`) VALUES
(1, 1, 'Kalam Article', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"1"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"1"}]', 'Kalam content', '2015-09-01 11:04:02', ''),
(2, 0, '1', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"1"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"1"}]', '1', '2015-09-01 11:04:02', ''),
(3, 1, '2', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"2"},{"label":"Meta keyword","type":"text","classes":"","placeholder":"","value":"2"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"2"}]', '2', '2015-09-01 11:04:02', ''),
(4, 1, 'sdtyguhij', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]', 'wsdfgh', '2015-09-01 11:15:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_blog`
--

CREATE TABLE IF NOT EXISTS `webapp_blog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_blog`
--

INSERT INTO `webapp_blog` (`id`, `name`, `title`, `json`, `content`, `timestamp`) VALUES
(1, 'Nodejs', 'Server side', 'ghjk', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. ', '2015-09-08 08:09:14'),
(2, 'wordpress', 'anne frank', 'drtfgyhjk', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. ', '2015-09-08 07:21:58'),
(3, 'name', 'blog3', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"blog5"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"blog4"}]', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. ', '2015-09-08 07:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_blogimages`
--

CREATE TABLE IF NOT EXISTS `webapp_blogimages` (
  `id` int(11) NOT NULL,
  `blog` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_blogimages`
--

INSERT INTO `webapp_blogimages` (`id`, `blog`, `status`, `order`, `image`) VALUES
(1, 1, 1, 1, 'download_(2)6.jpg'),
(2, 2, 1, 1, 'images_(1)1.jpg'),
(3, 1, 1, 2, 'download_(1)3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_blogvideo`
--

CREATE TABLE IF NOT EXISTS `webapp_blogvideo` (
  `id` int(11) NOT NULL,
  `blog` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_blogvideo`
--

INSERT INTO `webapp_blogvideo` (`id`, `blog`, `status`, `order`, `video`) VALUES
(1, 1, 1, 1, '4q8GwxethQ0'),
(2, 2, 1, 1, 'one');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_enquiry`
--

CREATE TABLE IF NOT EXISTS `webapp_enquiry` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_enquiry`
--

INSERT INTO `webapp_enquiry` (`id`, `user`, `name`, `email`, `title`, `timestamp`, `content`) VALUES
(1, 4, 'Job purpose', 'erre@dy.djhfa', 'Job', '0000-00-00 00:00:00', 'drtgyhui'),
(2, NULL, 'cgvhbjnk', 'sgdfjg@guayh.dhg', 'subjsdsrtgcs', '2015-09-07 11:20:59', 'commmdGhD'),
(3, NULL, 'dfghjk', 'ehjga@jhgdaj.dakj', 'cghjk', '2015-09-07 11:22:05', 'htgr'),
(4, NULL, 'rftghj', 'uae@eadf.dfad', 'dghjk', '2015-09-07 11:22:55', 'rtghj'),
(5, NULL, 'try', 'dfghj@hdb.de', 'sedghjk', '2015-09-07 12:03:20', 'ghjk');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_eventimages`
--

CREATE TABLE IF NOT EXISTS `webapp_eventimages` (
  `id` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_eventimages`
--

INSERT INTO `webapp_eventimages` (`id`, `event`, `status`, `order`, `image`) VALUES
(1, 1, 1, 1, 'delorean2.jpg'),
(2, 2, 1, 1, '2.jpg'),
(3, 3, 1, 1, '3.jpg'),
(4, 4, 1, 1, '4.jpg'),
(5, 5, 1, 1, '5.jpg'),
(6, 6, 1, 1, '6.jpg'),
(7, 1, 1, 2, 'delorean.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_events`
--

CREATE TABLE IF NOT EXISTS `webapp_events` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `starttime` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_events`
--

INSERT INTO `webapp_events` (`id`, `status`, `title`, `timestamp`, `content`, `image`, `startdate`, `starttime`) VALUES
(1, 1, 'Sona Mohaptra', '2015-09-03 07:46:24', 'Live at Twinhouse Cafe', 'Event-management5.png', '2015-12-15', '20:00:00'),
(2, 1, 'Sonu Nigam', '2015-09-03 07:48:06', 'Live at Twinhouse Cafe', '2.jpg', '2015-12-23', '21:00:00'),
(3, 1, 'Music Concert', '2015-09-03 07:49:17', 'Live at Macdee Cafe', '3.jpg', '2015-12-27', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_eventvideo`
--

CREATE TABLE IF NOT EXISTS `webapp_eventvideo` (
  `id` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `videogallery` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_eventvideo`
--

INSERT INTO `webapp_eventvideo` (`id`, `event`, `videogallery`, `status`, `order`, `url`) VALUES
(1, 1, 1, 1, 1, '4q8GwxethQ0'),
(3, 3, 3, 1, 4, 'sdrtyguhj'),
(4, 1, 4, 1, 2, 'cvgbjnm'),
(5, 2, 0, 0, 0, ''),
(6, 2, 0, 0, 0, ''),
(7, 2, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_frontmenu`
--

CREATE TABLE IF NOT EXISTS `webapp_frontmenu` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `json` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_frontmenu`
--

INSERT INTO `webapp_frontmenu` (`id`, `order`, `parent`, `status`, `name`, `json`) VALUES
(1, 1, 2, 1, 'Loginusers', 'gh'),
(2, 2, 3, 1, 'Location', 'cgvhbjn'),
(3, 3, 2, 0, 'Area', 'kjnb'),
(4, 2, 2, 1, 'q1', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"q1"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"q1"}]');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_gallery`
--

CREATE TABLE IF NOT EXISTS `webapp_gallery` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_gallery`
--

INSERT INTO `webapp_gallery` (`id`, `order`, `status`, `name`, `json`, `timestamp`, `image`) VALUES
(1, 1, 1, 'Phone Gallery', 'cjk', '2015-09-03 12:05:57', '41D5vU4I1NL.jpg'),
(3, 3, 1, 'Car gallery', 'xdcvgb', '2015-09-03 12:06:21', '41D5vU4I1NL3.jpg'),
(4, 3, 1, 'photo', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"abcd1"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"abcd1"}]', '2015-09-07 06:00:46', '41D5vU4I1NL2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_galleryimage`
--

CREATE TABLE IF NOT EXISTS `webapp_galleryimage` (
  `id` int(11) NOT NULL,
  `gallery` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_galleryimage`
--

INSERT INTO `webapp_galleryimage` (`id`, `gallery`, `order`, `status`, `image`, `alt`) VALUES
(1, 1, 1, 1, 'download_(2)4.jpg', 'wwer'),
(2, 1, 1, 1, 'download_(2)5.jpg', ''),
(4, 3, 1, 1, 'download_(2).jpg', 'srtgyhuj'),
(5, 3, 2, 1, 'images_(1)1.jpg', 'wrextury'),
(6, 3, 3, 1, 'images_(1).jpg', 'tystryt');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_notification`
--

CREATE TABLE IF NOT EXISTS `webapp_notification` (
  `id` int(11) NOT NULL,
  `videogallery` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `videogalleryvideo` int(11) DEFAULT NULL,
  `galleryimage` int(11) DEFAULT NULL,
  `article` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_notification`
--

INSERT INTO `webapp_notification` (`id`, `videogallery`, `event`, `videogalleryvideo`, `galleryimage`, `article`, `status`, `link`, `image`, `timestamp`, `content`) VALUES
(1, 1, 1, 0, 0, 1, 1, 'http://bannerslides.com', 'ArmaanPatraRollsEdit3.jpg', '0000-00-00 00:00:00', 'Offer notification'),
(2, 1, 1, 0, 0, 1, 1, 'http://ddsfdf.com', 'download2.jpg', '2015-08-20 05:45:23', 'Transaction notification'),
(3, 1, 1, 0, 0, 1, 1, 'http://rrrrrrrrrrr.com', 'download2.jpg', '2015-08-20 05:45:23', 'Transaction notification');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_notificationuser`
--

CREATE TABLE IF NOT EXISTS `webapp_notificationuser` (
  `id` int(11) NOT NULL,
  `notification` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timestamp_receive` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_notificationuser`
--

INSERT INTO `webapp_notificationuser` (`id`, `notification`, `user`, `timestamp`, `timestamp_receive`) VALUES
(1, 1, 18, '2015-08-21 12:29:36', '0000-00-00 00:00:00'),
(2, 2, 0, '2015-08-20 07:18:45', '0000-00-00 00:00:00'),
(3, 3, 18, '2015-08-22 07:18:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_videogallery`
--

CREATE TABLE IF NOT EXISTS `webapp_videogallery` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_videogallery`
--

INSERT INTO `webapp_videogallery` (`id`, `order`, `status`, `name`, `json`, `timestamp`) VALUES
(1, 1, 0, 'Video gallery name', 'cvgbhjn', '2015-09-01 11:24:22'),
(2, 2, 1, 'A R Rahman', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"3"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"3"}]', '2015-09-05 05:59:05'),
(3, 3, 1, 'Music Concert', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"3"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"3"}]', '2015-09-05 05:57:22'),
(4, 4, 1, 'Frozen Foods', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"3"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"3"}]', '2015-09-05 05:57:22'),
(5, 5, 1, 'Akon', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"3"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"3"}]', '2015-09-05 05:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_videogalleryvideo`
--

CREATE TABLE IF NOT EXISTS `webapp_videogalleryvideo` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `videogallery` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `alt` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_videogalleryvideo`
--

INSERT INTO `webapp_videogalleryvideo` (`id`, `order`, `status`, `videogallery`, `url`, `alt`) VALUES
(1, 1, 1, 1, '4q8GwxethQ0', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. '),
(2, 1, 1, 2, 'iZuHBkSD_m8', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. '),
(3, 1, 1, 3, '-JKtWOqARa4', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. '),
(4, 1, 1, 4, '0GWWcwpGosw', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. '),
(5, 1, 1, 5, 'U87NGlHImAU', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. '),
(6, 7, 1, 5, 'iZuHBkSD_m8', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logintype`
--
ALTER TABLE `logintype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_articles`
--
ALTER TABLE `webapp_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_blog`
--
ALTER TABLE `webapp_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_blogimages`
--
ALTER TABLE `webapp_blogimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_blogvideo`
--
ALTER TABLE `webapp_blogvideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_enquiry`
--
ALTER TABLE `webapp_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_eventimages`
--
ALTER TABLE `webapp_eventimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_events`
--
ALTER TABLE `webapp_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_eventvideo`
--
ALTER TABLE `webapp_eventvideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_frontmenu`
--
ALTER TABLE `webapp_frontmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_gallery`
--
ALTER TABLE `webapp_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_galleryimage`
--
ALTER TABLE `webapp_galleryimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_notification`
--
ALTER TABLE `webapp_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_notificationuser`
--
ALTER TABLE `webapp_notificationuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_videogallery`
--
ALTER TABLE `webapp_videogallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webapp_videogalleryvideo`
--
ALTER TABLE `webapp_videogalleryvideo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `logintype`
--
ALTER TABLE `logintype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `webapp_articles`
--
ALTER TABLE `webapp_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `webapp_blog`
--
ALTER TABLE `webapp_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `webapp_blogimages`
--
ALTER TABLE `webapp_blogimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `webapp_blogvideo`
--
ALTER TABLE `webapp_blogvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webapp_enquiry`
--
ALTER TABLE `webapp_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `webapp_eventimages`
--
ALTER TABLE `webapp_eventimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `webapp_events`
--
ALTER TABLE `webapp_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `webapp_eventvideo`
--
ALTER TABLE `webapp_eventvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `webapp_frontmenu`
--
ALTER TABLE `webapp_frontmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `webapp_gallery`
--
ALTER TABLE `webapp_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `webapp_galleryimage`
--
ALTER TABLE `webapp_galleryimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `webapp_notification`
--
ALTER TABLE `webapp_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `webapp_notificationuser`
--
ALTER TABLE `webapp_notificationuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `webapp_videogallery`
--
ALTER TABLE `webapp_videogallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `webapp_videogalleryvideo`
--
ALTER TABLE `webapp_videogalleryvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
