-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2015 at 01:48 PM
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
  `text` text,
  `type` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `title`, `content`, `text`, `type`, `image`) VALUES
(4, 'Blog', 'want blog', '0', 2, 'download_(1)4.jpg'),
(5, 'event1', 'want event1', 'want event plssssssssss1', 1, ''),
(6, 'Galllery', 'want gallery', 'Its gallelry', 1, ''),
(7, 'Banner1', 'want banner1', '0', 2, 'download_(1)5.jpg'),
(8, 'Notification', 'notification content', 'notification tec]xt', 1, '');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(2, 'Articles', '', '', 'site/viewarticles', 1, 0, 1, 2, 'icon-book'),
(3, 'Menu', '', '', 'site/viewfrontmenu', 1, 0, 1, 3, 'icon-laptop'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(5, 'Gallery', '', '', 'site/viewgallery', 1, 0, 1, 4, 'icon-dollar'),
(6, 'Config', '', '', 'site/viewconfig', 1, 0, 1, 18, 'icon-money'),
(7, 'Videos', '', '', 'site/viewvideogallery', 1, 0, 1, 6, 'icon-spinner'),
(9, 'Events', '', '', 'site/viewevents', 1, 0, 1, 8, 'icon-map-marker'),
(12, 'Enquiry', '', '', 'site/viewenquiry', 1, 0, 1, 11, 'icon-coffee'),
(13, 'Notification', '', '', 'site/viewnotification', 1, 0, 1, 12, 'icon-yen'),
(15, 'Blog', '', '', 'site/viewblog', 1, 0, 1, 14, 'icon-bell'),
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `order`, `status`, `alt`) VALUES
(1, 'ArmaanPatraRollsEdit.jpg', 1, 1, 'slider1');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `dob`, `street`, `address`, `city`, `state`, `pincode`, `facebook`, `twitter`, `google`, `country`) VALUES
(1, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, 'ArmaanPatraRollsEdit2.jpg', '', '', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'pratik', '0cb2b62754dfd12b6ed0161d4b447df7', 'pratik@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, 'pratik', '1', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'wohlig123', 'wohlig123', 'wohlig1@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'wohlig1', 'a63526467438df9566c508027d9cb06b', 'wohlig2@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Avinash', '7b0a80efe0d324e937bbfc7716fb15d3', 'avinash@wohlig.com', 1, '2014-10-17 06:22:29', 1, NULL, '', '', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'avinash', 'a208e5837519309129fa466b0c68396b', 'a@email.com', 2, '2014-12-03 11:06:19', 3, '', '', '123', '1', 'demojson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'aaa', 'a208e5837519309129fa466b0c68396b', 'aaa3@email.com', 3, '2014-12-04 06:55:42', 3, NULL, '', '1', '2', 'userjson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Pooja Thakare', '', 'pooja.wohlig@gmail.com', 3, '2015-08-20 07:40:47', 1, 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '', '103402210128529539675', 'Google', '', '0000-00-00', '', ',', '', '', '', '', '', '103402210128529539675', ''),
(19, 'poojathakare55', '', '', 3, '2015-08-20 07:41:04', 1, 'http://abs.twimg.com/sticky/default_profile_images/default_profile_1_normal.png', '', '3104340877', 'Twitter', '', '0000-00-00', '', ',', '', '', '', '', '3104340877', '', ''),
(20, 'Pooja Thakare', '', '', 3, '2015-08-20 07:41:20', 1, 'https://graph.facebook.com/444037772434450/picture?width=150&height=150', '', '444037772434450', 'Facebook', '', '0000-00-00', '', ',', '', '', '', '444037772434450', '', '', '');

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
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_articles`
--

INSERT INTO `webapp_articles` (`id`, `status`, `title`, `json`, `content`) VALUES
(1, 1, 'Kalam Article', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"1"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"1"}]', 'Kalam content'),
(2, 1, '1', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"1"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"1"}]', '1'),
(3, 1, '2', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"2"},{"label":"Meta keyword","type":"text","classes":"","placeholder":"","value":"2"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"2"}]', '2');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_blog`
--

CREATE TABLE IF NOT EXISTS `webapp_blog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `json` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_blog`
--

INSERT INTO `webapp_blog` (`id`, `name`, `title`, `json`, `content`) VALUES
(1, 'blog1', 'blog1 title', 'ghjk', 'ghj'),
(2, 'blog2', 'blog2 title', 'drtfgyhjk', 'drtgyuj'),
(3, 'blog3', 'blog3', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"blog5"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"blog4"}]', 'blog3');

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
(1, 1, 1, 1, 'ArmaanMoondalEdit1.jpg'),
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
(1, 1, 1, 1, ''),
(2, 2, 2, 1, 'one');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_enquiry`
--

INSERT INTO `webapp_enquiry` (`id`, `user`, `name`, `email`, `title`, `timestamp`, `content`) VALUES
(1, 4, 'Job purpose', 'erre@dy.djhfa', 'Job', '0000-00-00 00:00:00', 'drtgyhui');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_eventimages`
--

INSERT INTO `webapp_eventimages` (`id`, `event`, `status`, `order`, `image`) VALUES
(1, 1, 1, 1, 'download1.jpg'),
(2, 2, 1, 1, ''),
(3, 2, 1, 2, 'download_(1)1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_events`
--

CREATE TABLE IF NOT EXISTS `webapp_events` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_events`
--

INSERT INTO `webapp_events` (`id`, `status`, `title`, `timestamp`, `content`) VALUES
(1, 1, 'Game', '0000-00-00 00:00:00', 'cvghbjnkm'),
(2, 1, 'Play', '2015-08-19 08:32:41', 'cgvhbjk'),
(3, 0, 'Want to create blog', '2015-08-22 07:13:30', '0');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_eventvideo`
--

CREATE TABLE IF NOT EXISTS `webapp_eventvideo` (
  `id` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `videogallery` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_eventvideo`
--

INSERT INTO `webapp_eventvideo` (`id`, `event`, `videogallery`, `status`, `order`) VALUES
(1, 1, 1, 2, 1),
(2, 1, 1, 1, 2);

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
(3, 3, 2, 1, 'Area', 'kjnb'),
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
  `json` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_gallery`
--

INSERT INTO `webapp_gallery` (`id`, `order`, `status`, `name`, `json`) VALUES
(1, 1, 1, 'Phone Gallery', 'cjk'),
(3, 3, 1, 'Car gallery', 'xdcvgb'),
(4, 3, 1, 'abcd', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"abcd1"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"abcd1"}]');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_galleryimage`
--

INSERT INTO `webapp_galleryimage` (`id`, `gallery`, `order`, `status`, `image`, `alt`) VALUES
(1, 1, 1, 1, 'ArmaanMoondalEdit.jpg', 'wwer'),
(2, 1, 1, 1, 'download.jpg', ''),
(4, 3, 1, 1, 'download_(2).jpg', 'srtgyhuj'),
(5, 3, 2, 1, 'download3.jpg', 'wrextury'),
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_notification`
--

INSERT INTO `webapp_notification` (`id`, `videogallery`, `event`, `videogalleryvideo`, `galleryimage`, `article`, `status`, `link`, `image`, `timestamp`, `content`) VALUES
(1, 1, 1, 0, 0, 1, 1, 'http://bannerslides.com', 'ArmaanPatraRollsEdit3.jpg', '0000-00-00 00:00:00', 'Offer notification'),
(2, 1, 1, 0, 0, 1, 1, 'http://ddsfdf.com', 'download2.jpg', '2015-08-20 05:45:23', 'Transaction notification');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_notificationuser`
--

INSERT INTO `webapp_notificationuser` (`id`, `notification`, `user`, `timestamp`, `timestamp_receive`) VALUES
(1, 1, 18, '2015-08-21 12:29:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `webapp_videogallery`
--

CREATE TABLE IF NOT EXISTS `webapp_videogallery` (
  `id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `json` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_videogallery`
--

INSERT INTO `webapp_videogallery` (`id`, `order`, `status`, `name`, `json`) VALUES
(1, 1, 1, 'Video gallery name', 'cvgbhjn'),
(3, 2, 1, '2', '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"3"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"3"}]');

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
  `alt` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webapp_videogalleryvideo`
--

INSERT INTO `webapp_videogalleryvideo` (`id`, `order`, `status`, `videogallery`, `url`, `alt`) VALUES
(1, 1, 1, 1, 'http://sfa.com', 'waesrdt');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `logintype`
--
ALTER TABLE `logintype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `webapp_articles`
--
ALTER TABLE `webapp_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webapp_eventimages`
--
ALTER TABLE `webapp_eventimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `webapp_events`
--
ALTER TABLE `webapp_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `webapp_eventvideo`
--
ALTER TABLE `webapp_eventvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `webapp_notification`
--
ALTER TABLE `webapp_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webapp_notificationuser`
--
ALTER TABLE `webapp_notificationuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `webapp_videogallery`
--
ALTER TABLE `webapp_videogallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `webapp_videogalleryvideo`
--
ALTER TABLE `webapp_videogalleryvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
