-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2020 at 09:19 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahref`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bulk`
--

CREATE TABLE `bulk` (
  `id` int(11) NOT NULL,
  `name` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(222) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bundles`
--

CREATE TABLE `bundles` (
  `b_id` int(11) NOT NULL,
  `bundle` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `cat` varchar(225) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sub` varchar(22) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bundles`
--

INSERT INTO `bundles` (`b_id`, `bundle`, `cat`, `sub`) VALUES
(46, 'ahrefs.tech', 'domain', '1'),
(47, 'url', 'path', '0'),
(48, '.jpeg', 'extension', '1'),
(49, '.png', 'extension', '1'),
(50, '.gif', 'extension', '1'),
(70, 'invite', 'path', '0'),
(71, 'join', 'path', '0'),
(72, 'profile', 'path', '0'),
(73, 'watch', 'path', '0'),
(74, 'user', 'path', '0'),
(75, 'download', 'path', '0'),
(76, 'img', 'path', '0'),
(77, '.mp3', 'extension', '2'),
(78, '.wav', 'extension', '2'),
(79, '.acc', 'extension', '2'),
(81, '.mkv', 'extension', '3'),
(82, '.avi', 'extension', '3'),
(83, '.mp4', 'extension', '3'),
(84, '.flv', 'extension', '3'),
(85, '.webm', 'extension', '3'),
(86, '.zip', 'extension', '4'),
(87, '.rar', 'extension', '4'),
(88, '.tar', 'extension', '4'),
(90, '.php', 'extension', '5'),
(91, '.html', 'extension', '5'),
(92, '.css', 'extension', '5'),
(93, '.js', 'extension', '5'),
(94, 'codelone.ml', 'domain', '1');

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `m_id` int(11) NOT NULL,
  `m_username` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `m_password` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`m_id`, `m_username`, `m_password`, `c_date`) VALUES
(1, 'codelone', '$2y$10$y5/6x646D80UugD0BW.WeObxyYR9PPgPU0lWLj9htNU3H4kjC6fd.', '2020-08-28 11:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `shotner`
--

CREATE TABLE `shotner` (
  `uid` int(222) NOT NULL,
  `u_id` int(11) NOT NULL DEFAULT '0',
  `memo` text NOT NULL,
  `urlinput` text NOT NULL,
  `title` longtext NOT NULL,
  `description` longtext NOT NULL,
  `shorturl` varchar(222) NOT NULL,
  `track_code` varchar(222) NOT NULL,
  `bitly` varchar(22) NOT NULL,
  `tiny` varchar(22) NOT NULL,
  `shortest` varchar(22) NOT NULL,
  `public` int(11) NOT NULL DEFAULT '0',
  `notify` int(11) NOT NULL DEFAULT '0',
  `date` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shotner`
--

INSERT INTO `shotner` (`uid`, `u_id`, `memo`, `urlinput`, `title`, `description`, `shorturl`, `track_code`, `bitly`, `tiny`, `shortest`, `public`, `notify`, `date`) VALUES
(100163, 0, 'N/A', 'https://music.youtube.com/', 'Jau greitai | YouTube Music', 'Pristatome „YouTube Music“. Netrukus prad?s veikti nauja srautinio muzikos perdavimo paslauga. Prisiregistruokite, kad nepraleistum?te naujini? ir gal?tum?te gauti išankstin? prieig?.', 'F0CE5A', '8663F', '2D853ZQ', 'qa2eg8d', 'wNVXJj', 0, 0, '2019-04-13 17:19:08'),
(100165, 0, 'N/A', 'https://www.youtube.com/', 'YouTube', 'M?gaukit?s patinkan?iais vaizdo ir muzikos ?rašais, ?kelkite originalaus turinio ir bendrinkite visa tai su draugais, šeima ir pasauliu sistemoje „YouTube“.', '6CF671', '775C5', '2DekzU2', '6gvvov', 'wN5IYw', 0, 0, '2019-04-15 11:23:09'),
(100166, 0, 'N/A', 'https://www.w3schools.com/JQuery/jquery_get_started.asp', 'W3Schools Online Web Tutorials', '', 'B626B8', 'CB393', '2CNOwtS', 'y9rd7tyt', 'wNI4JN', 0, 0, '2019-04-16 14:42:53'),
(100167, 0, 'N/A', 'https://www.w3schools.com/JQuery/jquery_get_started.asp', 'W3Schools Online Web Tutorials', '', '5D84FB', 'FA660', '2CNOwtS', 'y9rd7tyt', 'wNI4JN', 0, 0, '2019-04-16 14:56:33'),
(100168, 0, 'N/A', 'https://katmoviehd.pw/aquaman/', 'KatmovieHD | Free Download All Movies & Hollywood TV Series , Korean Drama Series In Hindi + English (Dual Audio) 480p 720p 1080p | Hevc 10bit | x264 300mb | Watch Online', 'KatMovieHD.com : Watch Hollywood Dubbed Movie &amp; TV Series in Hindi Dubbed, Dual Audio | All Movies, Adult 18+ Flim, TV Show , Korean Drama Series In Hindi + English Subtitles | Hevc 10bit | x264 300mb | Genres: Action, Horror, Thriller, Sci- Fi, Bollywood, Free Download', '9557C4', '397F0', '2VfLky2', 'y6ra55yr', 'wNOPoZ', 0, 0, '2019-04-16 15:13:39'),
(100169, 0, 'N/A', 'https://katmoviehd.pw/aquaman/', 'KatmovieHD | Free Download All Movies & Hollywood TV Series , Korean Drama Series In Hindi + English (Dual Audio) 480p 720p 1080p | Hevc 10bit | x264 300mb | Watch Online', 'KatMovieHD.com : Watch Hollywood Dubbed Movie &amp; TV Series in Hindi Dubbed, Dual Audio | All Movies, Adult 18+ Flim, TV Show , Korean Drama Series In Hindi + English Subtitles | Hevc 10bit | x264 300mb | Genres: Action, Horror, Thriller, Sci- Fi, Bollywood, Free Download', '0A80BB', '98F76', '2VfLky2', 'y6ra55yr', 'wNOPoZ', 0, 0, '2019-04-16 17:38:04'),
(100170, 0, 'N/A', 'https://developers.google.com/chart/infographics/docs/qr_codes', 'Google Developers', 'Everything you need to build better apps.', 'F58D7B', 'D8F6F', '2CPWJ0B', '9acy5so', 'wNI42I', 0, 0, '2019-04-17 02:48:08'),
(100171, 0, 'N/A', 'https://printonweb.in/dashboard/full_info.php?order_id=POW190310523345', 'PrintOnWeb™ - Online document printing service, Print documents online in India - 11% Flat Discount', 'PrintOnWeb.in Print Online. We provide online documents printing solutions to Each and Every Indian Pincode. Print Online Documents. We provide online print documents, fast and cheap printouts, best quality online document printing service in India, online document printing and binding. Online Printing', 'CBD54C', '0C62F', '2VR9pLY', 'y5lqeo6h', 'wN9z1K', 0, 0, '2019-04-17 19:04:17'),
(100172, 0, 'N/A', 'https://printonweb.in/dashboard/full_info.php?order_id=POW190310523345', 'PrintOnWeb™ - Online document printing service, Print documents online in India - 11% Flat Discount', 'PrintOnWeb.in Print Online. We provide online documents printing solutions to Each and Every Indian Pincode. Print Online Documents. We provide online print documents, fast and cheap printouts, best quality online document printing service in India, online document printing and binding. Online Printing', 'C92EAE', '47FD4', '2VR9pLY', 'y5lqeo6h', 'wN9z1K', 0, 0, '2019-04-17 19:53:07'),
(100173, 0, 'N/A', 'https://trainings.internshala.com/dashboard', 'Internshala Trainings', 'Learn online and build exciting projects in just 4-6 weeks. Choose from 10+ Certified Online Trainings: Web Development, Digital Marketing, Programming with Python, Android App Development and more.', '90AA6B', 'CE856', '2Vlt4mU', 'yxjx536w', 'wNI4P8', 0, 0, '2019-04-17 23:26:30'),
(100174, 0, 'N/A', 'https://work-79657205.facebook.com/chat/t/1884879544964255', 'Update Your Browser | Workplace', '', 'D2AFBA', 'BF14A', '2VO7fNr', 'y5ebbdsv', 'wN2KLL', 0, 0, '2019-04-19 13:20:30'),
(100175, 0, 'N/A', 'http://google.be', 'Google', '', '041E96', '173E4', '2VVGaaU', 'ad8mt', 'wMtt2I', 0, 0, '2019-04-21 08:19:08'),
(100176, 137, 'N/A', 'https://zxcdwa.com/bericht.html', '', '', '15F5B1', '93796', '2VUq29v', 'yyqb864p', 'wMtyt1', 0, 0, '2019-04-21 08:22:35'),
(100179, 0, 'N/A', 'https://ahref.tech/?fbclid=IwAR371ioLr_NyY8IwBsghQ3HriiAolgXDjt3om8u99ulEzvrDHQAXy4AFciA', 'ahref', 'Ahref IP Logger helps you track who has clicked your links. Track IP addresses, find IPs from Facebook, Twitter, friends on other sites.', '4EF2D2', 'F4ABA', '2Wjp8DO', 'y22wczjs', 'wMb2GA', 0, 0, '2019-05-03 12:53:32'),
(100180, 0, 'N/A', 'https://thenextweb.com/contributors/2018/04/27/12-big-encryption-trends-will-keep-data-secure/', 'TNW', 'Original and proudly opinionated perspectives on remarkable stories for Generation T', '14EA37', 'EBBD5', '2GYEEzG', 'yd4ejtf5', 'wMnIod', 0, 0, '2019-05-03 21:01:25'),
(100181, 0, 'N/A', 'https://thenextweb.com/contributors/2018/04/27/12-big-encryption-trends-will-keep-data-secure/', 'TNW', 'Original and proudly opinionated perspectives on remarkable stories for Generation T', 'AB87C6', 'B3388', '2GYEEzG', 'yd4ejtf5', 'wMnIod', 0, 0, '2019-05-03 21:02:20'),
(100182, 0, 'N/A', 'https://afflnk.microsoft.com/c/1239701/439027/7805?sharedid=EDGE_ENIN_NTP_TOPSITES&amp;u=https://www.microsoft.com/en-in/store/b/home', 'Dead End', '', 'F959A0', '03037', '2GZwYgO', 'y4sfu79k', 'wMnZ44', 0, 0, '2019-05-03 23:26:26'),
(100185, 0, 'N/A', 'http://katmoviehd.pw/aquaman/', 'Stand By Me Doraemon (2014) x264 720p 1080p Dual Audio Hindi + English Eng Subs DREDD Download | KatmovieHD', '', 'AD464E', '732B5', '2H31c2o', 'yx9xj4hx', 'wMQEjG', 0, 0, '2019-05-04 22:47:11'),
(100194, 0, 'N/A', 'http://stackoverflow.com/questions/5943368/dynamically-generating-a-qr-code-with-php/21064288', 'Stack Overflow - Where Developers Learn, Share, & Build Careers', 'Stack Overflow is the largest, most trusted online community for developers to learn, share? ?their programming ?knowledge, and build their careers.', 'F84C31', '7B19D', '2VikMfL', 'y4ncqhyu', 'wNSaDs', 0, 0, '2019-05-05 18:06:23'),
(100195, 0, 'N/A', 'http://The Flash s06 index', '', '', '5621B8', 'D689B', '', 'html>\n', '', 0, 0, '2019-05-08 18:49:50'),
(100198, 0, 'N/A', 'http://bovocation.000webhostapp.com', 'Bvocation', 'Bvocation is a website where we create a loving community of purposeful learning that focuses on the whole child body, mind, and spirit.', 'B321E9', 'C7086', '2WwXWS2', 'ERROR', 'wMIVWW', 0, 0, '2019-05-08 19:12:04'),
(100202, 142, 'N/A', 'http://dl5.upfdl.com/files/Serial/The%20100/S06/', '', '', '27B81D', 'BF3B0', '2H93CMW', 'yyjgp947', 'wMOiLL', 0, 0, '2019-05-08 22:26:21'),
(100203, 0, 'N/A', 'http://www.evoluted.net/thinktank/web-development/paypal-php-integration', 'Web Design Sheffield | Award-Winning Digital Agency | Evoluted', 'Sheffield web design &amp; digital agency specialising in bespoke web design, web development &amp; ROI driven digital marketing for over 12 years. Contact us about your project', 'BEF790', '2C0B1', '2Hawogh', 'y2u3rno4', 'wMPulW', 0, 0, '2019-05-09 10:59:36'),
(100204, 0, 'N/A', 'http://www.evoluted.net/thinktank/web-development/paypal-php-integration', 'Web Design Sheffield | Award-Winning Digital Agency | Evoluted', 'Sheffield web design &amp; digital agency specialising in bespoke web design, web development &amp; ROI driven digital marketing for over 12 years. Contact us about your project', '243D7B', '13802', '2Hawogh', 'y2u3rno4', 'wMPulW', 0, 0, '2019-05-09 10:59:54'),
(100205, 0, 'N/A', 'http://www.flipkart.com/asus-apu-quad-core-e2-4-gb-500-gb-hdd-windows-10-home-x540ya-xo760t-laptop/p/itmf7yz88jzxbpeh?pid=COMF7YZ8HYKHEHSW&amp;lid=LSTCOMF7YZ8HYKHEHSWSJHBQB&amp;marketplace=FLIPKART&amp;cmpid=content_computer_8965229628_gmc_pla&amp;tgi=sem,1,G,11214002,g,search,,346854644548,1o1,,,m,,mobile,,,,,&amp;ef_id=Cj0KCQjwn8_mBRCLARIsAKxi0GLsfJxjYv2fH8Diji1hTpP3rHUmVgOEDlZwynblRoQivzAxcd65j-UaAte1EALw_wcB:G:s&amp;s_kwcid=AL!739!3!346854644548!!!g!537043652809!&amp;gclid=Cj0KCQjwn8_mBRCLARIsAKxi0GLsfJxjYv2fH8Diji1hTpP3rHUmVgOEDlZwynblRoQivzAxcd65j-UaAte1EALw_wcB', 'Online Shopping Site for Mobiles, Electronics, Furniture, Grocery, Lifestyle, Books & More. Best Offers!', 'India&#x27;s biggest online store for Mobiles, Fashion (Clothes/Shoes), Electronics, Home Appliances, Books, Jewelry, Home, Furniture, Sporting goods, Beauty &amp; Personal Care, Grocery and more! Find the largest selection from all brands at the lowest prices in India. Payment options - COD, EMI, Credit card, Debit card &amp; more.', '347BDB', '541F2', '2H8M57u', 'yyt2a8p6', 'wMPZvD', 0, 0, '2019-05-09 18:20:18'),
(100206, 0, 'N/A', 'http://www.flipkart.com/asus-apu-quad-core-e2-4-gb-500-gb-hdd-windows-10-home-x540ya-xo760t-laptop/p/itmf7yz88jzxbpeh?pid=COMF7YZ8HYKHEHSW&amp;lid=LSTCOMF7YZ8HYKHEHSWSJHBQB&amp;marketplace=FLIPKART&amp;cmpid=content_computer_8965229628_gmc_pla&amp;tgi=sem,1,G,11214002,g,search,,346854644548,1o1,,,m,,mobile,,,,,&amp;ef_id=Cj0KCQjwn8_mBRCLARIsAKxi0GLsfJxjYv2fH8Diji1hTpP3rHUmVgOEDlZwynblRoQivzAxcd65j-UaAte1EALw_wcB:G:s&amp;s_kwcid=AL!739!3!346854644548!!!g!537043652809!&amp;gclid=Cj0KCQjwn8_mBRCLARIsAKxi0GLsfJxjYv2fH8Diji1hTpP3rHUmVgOEDlZwynblRoQivzAxcd65j-UaAte1EALw_wcB', 'Online Shopping Site for Mobiles, Electronics, Furniture, Grocery, Lifestyle, Books & More. Best Offers!', 'India&#x27;s biggest online store for Mobiles, Fashion (Clothes/Shoes), Electronics, Home Appliances, Books, Jewelry, Home, Furniture, Sporting goods, Beauty &amp; Personal Care, Grocery and more! Find the largest selection from all brands at the lowest prices in India. Payment options - COD, EMI, Credit card, Debit card &amp; more.', 'F5126C', '2A6DC', '2H8M57u', 'yyt2a8p6', 'wMPZvD', 0, 0, '2019-05-09 18:20:49'),
(100207, 0, 'N/A', 'http://bovocation.000webhostapp.com', 'Bvocation', 'Bvocation is a website where we create a loving community of purposeful learning that focuses on the whole child body, mind, and spirit.', '541277', '6BD2B', '2WwXWS2', 'ERROR', 'wMIVWW', 0, 0, '2019-05-15 18:36:38'),
(100208, 0, 'N/A', 'http://youtu.be/-JWVYalgXkU', 'YouTube', 'M?gaukit?s patinkan?iais vaizdo ir muzikos ?rašais, ?kelkite originalaus turinio ir bendrinkite visa tai su draugais, šeima ir pasauliu sistemoje „YouTube“.', '7ADD96', 'E76BB', '2WJLgHH', 'yyotn23n', 'wMCFJA', 0, 0, '2019-05-15 18:42:36'),
(100209, 145, 'N/A', 'http://youtu.be/pDtWeGp7KdI', 'YouTube', 'M?gaukit?s patinkan?iais vaizdo ir muzikos ?rašais, ?kelkite originalaus turinio ir bendrinkite visa tai su draugais, šeima ir pasauliu sistemoje „YouTube“.', '758BC9', '288FE', '2HmWxss', 'yy6g7olu', 'wMCGBr', 1, 1, '2019-05-15 18:55:33'),
(100210, 146, 'N/A', 'http://x.co/jpman', 'URL Shortener', '', '240387', '531A3', '2WUVQf0', 'ERROR', 'wM5cfg', 0, 0, '2019-05-19 19:48:18'),
(100211, 0, 'N/A', 'http://www.yifysubtitles.com/movie-imdb/tt7605074', 'YIFY Subtitles - subtitles for YIFY movies', 'Subtitles for YIFY movies. Subtitles in any language for your favourite YIFY films.', '7028B5', '81646', '2XgZEHJ', 'y5lmpg2e', 'w1lbgv', 0, 0, '2019-05-30 15:57:54'),
(100212, 0, 'N/A', 'http://pxepeace.com/1221085nC1355269nV0gU0kJ38Gnr49171cx', 'Apache HTTP Server Test Page powered by CentOS', '', '59A5EE', '51155', '2HKXlra', 'yy7cnqzz', 'w1l6DE', 0, 0, '2019-05-30 21:17:08'),
(100213, 0, 'N/A', 'http://nltrunk.online/[random]/SO8N1', 'Apache HTTP Server Test Page powered by CentOS', '', '2DF4BB', 'D5FAB', '2HOLyIx', 'y6etnv2w', 'w1l6Cq', 0, 0, '2019-05-30 21:18:34'),
(100214, 0, 'N/A', 'http://nltrunk.online/[random]/0cBwY', 'Apache HTTP Server Test Page powered by CentOS', '', '8387EA', '92D6C', '2XnflNP', 'yyepueto', 'w1l66h', 0, 0, '2019-05-30 21:20:18'),
(100215, 0, 'N/A', 'http://mymusingpodcast.com', 'SEO Course in Noida | SEO Training Institute in Delhi NCR', 'Digital Edge provide best SEO Training Institute in Noida, Delhi NCR with live projects by industry experts. Book a Demo, Call Now 844-747-0220.', '1F7E2A', 'B8E03', '2HWZG2a', 'yxsaybf8', 'w1UfEd', 0, 0, '2019-06-06 20:50:32'),
(100216, 0, 'N/A', 'http://paypal.com', 'Send Payments or Pay Online - PayPal SG', 'PayPal Singapore is the faster, safer way to send payments, make an online payment, receive money or set up a business account. Sign Up Now!', '8682ED', '680C6', '2MWkF9P', '4mqx5', 'w15SfR', 0, 0, '2019-06-20 13:25:22'),
(100217, 0, 'N/A', 'http://www.youtube.com/watch?v=IFncZA5k_1k', 'YouTube', 'M?gaukit?s patinkan?iais vaizdo ir muzikos ?rašais, ?kelkite originalaus turinio ir bendrinkite visa tai su draugais, šeima ir pasauliu sistemoje „YouTube“.', '39C158', '8CDA1', '2FiA6Di', 'yxfhs832', 'w15DD4', 0, 0, '2019-06-20 13:44:35'),
(100222, 0, 'N/A', 'http://dating-herenow.com/?u=exmkte4&amp;o=7md8knq&amp;t=fran', '', '', 'B635A8', 'FE817', '2JAgTyd', 'y469bcfx', 'w2WMAE', 0, 0, '2019-07-11 00:16:51'),
(100224, 0, 'N/A', 'http://autoresponder.guycohen.com/admin/temp/templates', 'Control Panel', '', 'FEA97D', '4CA36', '2KlLsbo', 'y56fgxsj', 'w3tc8k', 0, 0, '2019-07-31 22:27:19'),
(100225, 0, 'N/A', 'http://www.fap18pgals.eu/', 'FAP18PGALS - Daily updated free Porn galleries.', 'FAP18PGALS - Daily updated free Porn galleries. Get all for free!', '64BA18', '6C759', '2yu4mXO', 'y34easge', 'w3yg52', 0, 0, '2019-08-01 12:37:20'),
(100226, 0, 'N/A', 'http://google.com', 'Google', '', 'A1075A', 'DE975', '2OUgCvN', '2tx', 'w3Qsop', 0, 0, '2019-08-13 09:30:31'),
(100230, 0, 'N/A', 'http://webtrafficstore.com', 'NONSTOP ORGANIC TRAFFIC| Web Traffic Store| Traffic Supplier', 'Order directly from web traffic supplier. 70% cheaper than reseller. Buy Non Stop Organic Web traffic to reach the top of the search engines and appear on google first page', '7D0696', '3D7AE', '33Bo5TT', 'y6ljm3d5', 'w3TmM9', 0, 0, '2019-08-15 21:39:54'),
(100231, 0, 'N/A', 'http://docs.google.com/spreadsheets/d/1jFhTHaEiM5HeCWgX6thNTkC65hkwxhQHXY-8slUvbSI/htmlview#gid=377208304', 'Prisijungti – „Google“ paskyros', '', '7D0749', '2CD58', '2PeaVZY', 'yxlvsnm8', 'w3Z71c', 0, 0, '2019-08-25 16:23:57'),
(100232, 0, 'N/A', 'http://dnschecker.org/#NS/fixbike.tk', 'DNS Checker - DNS Check Propagation Tool', 'Check DNS Propagation worldwide. DNS Checker provides name server propagation check instantly. Changed nameservers so do a DNS lookup and check if DNS and nameservers have propagated.', 'F76426', '3DBF3', '2PeL8AT', 'y3542mzf', 'w3Xg1R', 0, 0, '2019-08-25 19:37:38'),
(100233, 148, 'N/A', 'http://linkfox.io/avinaFILTER1', 'Link Fox', 'The Foxiest URL Shortener on the Internet. Register for Free and start shrinking those links. ', 'C139D2', '9DCEE', '2lIPjX6', 'y679zyvt', 'w3731V', 0, 0, '2019-09-02 12:40:53'),
(100234, 148, 'N/A', 'http://linkfox.io/lucinaFILTER2', 'Link Fox', 'The Foxiest URL Shortener on the Internet. Register for Free and start shrinking those links. ', '38FFFE', '3A922', '2lLkNMg', 'y6zw33lz', 'w38erj', 0, 0, '2019-09-02 14:49:40'),
(100235, 0, 'N/A', 'http://paypertag.tk/account/dashboard?page=home', 'Paypertag', '', '534274', '3495E', '2ZK9034', 'y52j2vaw', 'w39Y3G', 0, 0, '2019-09-03 13:17:28'),
(100236, 0, 'N/A', 'http://www.google.com', 'Google', '', '51A0CE', '73E90', '2NRU7Wb', '1c2', 'w4049L', 0, 0, '2019-09-04 12:21:08'),
(100237, 0, 'N/A', 'http://blogs.sap.com/2017/08/24/current-and-future-dated-data-extraction-using-compoundemployee-api/', 'SAP Blogs | The Best Run Businesses Run SAP', '', '4058FE', 'DAF32', '2NOkOLn', 'y6ju8fwn', 'w4qAHa', 0, 0, '2019-09-04 21:27:58'),
(100238, 0, 'N/A', 'http://www.hostinger.com/', 'The Hosting Platform Made For You - Go Online With Hostinger', 'Choose your web hosting solution and make the perfect website! From shared hosting and domains to VPS - we have all you need for online success.', '05111E', '1C196', '2NYZNh0', 'mao7vdf', 'w4e5la', 0, 0, '2019-09-06 06:57:29'),
(100239, 0, 'N/A', 'http://google.com', 'Google', '', 'B88F27', '7F60F', '2OUgCvN', '2tx', 'w3Qsop', 0, 0, '2019-09-06 20:19:34'),
(100240, 0, 'N/A', 'http://phppot.com/php/column-search-in-datatables-using-server-side-processing/', 'Phppot - Helping You Build Web Applications Using PHP', 'Phppot helps build web applications using PHP, specializes in building eCommerce websites and provides expert PHP freelancer for hire.', 'A37BDD', 'FEF1D', '2ZFAW8v', 'y2l3n9wb', 'w4yz8d', 0, 0, '2019-09-07 18:47:32'),
(100241, 0, 'N/A', 'http://www.phptutorial.info/?intval', 'PHP tutorial for beginners', 'PHP tutorial for beginners', 'A44DCC', '9510C', '2ZQYXcG', 'y24u2oqd', 'w4iQto', 0, 0, '2019-09-08 23:11:21'),
(100242, 148, 'N/A', 'http://linkfox.io/mantdoradoFILTER', 'Link Fox', 'The Foxiest URL Shortener on the Internet. Register for Free and start shrinking those links. ', 'F5E8E3', '83775', '2OQwxLF', 'y5tgemob', 'w3WWGE', 0, 0, '2019-09-09 19:45:51'),
(100244, 0, 'N/A', 'http://hpanel.hostinger.com', 'Dashboard', '', '661D58', '62875', '2NYm7r8', 'y6c8woc7', 'w4h8vs', 0, 0, '2019-09-14 16:44:24'),
(100245, 0, 'N/A', 'http://google.com', 'Google', '', 'D2FDF2', '82103', '2OUgCvN', '2tx', 'w3Qsop', 0, 0, '2019-09-14 16:46:38'),
(100248, 148, 'N/A', 'http://linkfox.io/garockFILTER', 'Link Fox', 'The Foxiest URL Shortener on the Internet. Register for Free and start shrinking those links. ', '0FA865', '0AA99', '2O3p6yM', 'yyxkfz69', 'w4l6ZF', 0, 0, '2019-09-16 17:09:30'),
(100249, 0, 'N/A', 'http://www.youtube.com/watch?v=WU2C4bX8zLo', 'YouTube', 'M?gaukit?s patinkan?iais vaizdo ir muzikos ?rašais, ?kelkite originalaus turinio ir bendrinkite visa tai su draugais, šeima ir pasauliu sistemoje „YouTube“.', 'EE8539', '448A3', '2Ob4HrI', 'y5bupthg', 'w4bTr5', 0, 0, '2019-09-19 15:57:01'),
(100250, 0, 'N/A', 'http://shorturl.ws/global', '', '', '502973', '7A2F3', '2lQtKEE', 'y6s9uqcm', 'w4A7uz', 0, 0, '2019-09-28 06:33:16'),
(100251, 0, 'N/A', 'http://Www.khatrimazafull.ch', 'Khatrimazafull | Khatrimazafull.Net | Download HD Movies 100MB , 300MB , 720p', 'Khatrimazafull.net | Download Khatrimazafull | Khatrimazafull.org Hindi Dubbed Latest 300MB Movies 480p Dual Audio , Hollywood Hindi dubbed movies , South', 'DCAD0A', 'AFA30', '2VtwIMF', 'y35oa3qu', 'w44Ndd', 0, 0, '2019-10-10 17:40:07'),
(100252, 0, 'N/A', 'http://www.youtube.com/watch?v=WU2C4bX8zLo', 'YouTube', 'M?gaukit?s patinkan?iais vaizdo ir muzikos ?rašais, ?kelkite originalaus turinio ir bendrinkite visa tai su draugais, šeima ir pasauliu sistemoje „YouTube“.', 'DE58C7', 'B9503', '2Ob4HrI', 'y5bupthg', 'w4bTr5', 0, 0, '2019-10-10 17:41:48'),
(100253, 0, 'N/A', 'http://getbootstrap.com/docs/4.0/examples/album/', 'Bootstrap · The most popular HTML, CSS, and JS library in the world.', 'The most popular HTML, CSS, and JS library in the world.', '6E4393', 'BB2EA', '2MaajAN', 'yc4sl7sj', 'w477P5', 0, 0, '2019-10-12 18:35:11'),
(100254, 0, 'N/A', 'http://Google.com', 'Google', '', '559111', '09759', '2OUgCvN', '53sf3', 'w5qwA4', 0, 0, '2019-10-14 21:57:44'),
(100255, 0, 'N/A', 'http://www.instagram.com/developer/', '\nInstagram\n', 'Create an account or log in to Instagram - A simple, fun &amp; creative way to capture, edit &amp; share photos, videos &amp; messages with friends &amp; family.', '862180', '2EF0C', '2W7rm9Z', 'y29r62sb', 'w5hmZc', 0, 0, '2019-10-23 22:11:20'),
(100256, 128, 'The file is used for https://youtu.be/Xvep_ZdSXzU and contains htaccess code ', 'http://www.mediafire.com/file/i83ur4brxxbec74/RewriteEngine_on.txt/file', 'File sharing and storage made simple', 'MediaFire is a simple to use free service that lets you put all your photos, documents, music, and video in a single place so you can access them anywhere and share them everywhere.', '0B8912', '6025C', '34Ll6rz', 'yz3zq32f', 'w5KPoA', 0, 0, '2019-11-10 16:34:55'),
(100257, 0, 'N/A', 'http://cos-metro.web.app/', '', '', 'BA70C0', 'ABCE3', '33v12bV', 'rzq92bp', 'w6tjAS', 0, 0, '2019-11-30 03:16:43'),
(100258, 0, 'N/A', 'http://if-seaken.web.app/', '', '', '7EBAA1', 'E8064', '2Y0A9M4', 'wb945ts', 'w6yKNb', 0, 0, '2019-12-01 08:23:57'),
(100259, 0, 'N/A', 'http://done-abote.web.app/', '', '', 'DD4019', '5F376', '3605JfR', 'tjfjeg6', 'w6yZyT', 0, 0, '2019-12-01 08:49:57'),
(100260, 0, 'N/A', 'http://if-seaken.web.app/', '', '', 'DAD500', '1BDC7', '2Y0A9M4', 'wb945ts', 'w6yKNb', 0, 0, '2019-12-01 20:22:33'),
(100261, 0, 'N/A', 'http://done-abote.web.app/', '', '', '92C40A', 'D642D', '3605JfR', 'tjfjeg6', 'w6yZyT', 0, 0, '2019-12-02 19:57:27'),
(100262, 0, 'N/A', 'http://if-seaken.web.app/', '', '', '6296AD', '19D7A', '2Y0A9M4', 'wb945ts', 'w6yKNb', 0, 0, '2019-12-03 00:20:20'),
(100263, 0, 'N/A', 'http://son-matod.web.app/', '', '', '6311AC', '1F817', '2RiiONh', 'tc4say2', 'w6pkJ5', 0, 0, '2019-12-04 17:05:19'),
(100264, 0, 'N/A', 'http://if-seaken.web.app/', '', '', '4353DF', 'BE932', '2Y0A9M4', 'wb945ts', 'w6yKNb', 0, 0, '2019-12-06 00:45:21'),
(100265, 0, 'N/A', 'http://finto.0fees.us/ass/', '', '', '5250CF', '4C866', '34XK9bE', 'rpfalf5', 'w6dOh7', 0, 0, '2019-12-06 23:02:51'),
(100266, 0, 'N/A', 'http://extramovies.pink/', 'ExtraMovies - Download Movies Online, Watch Movies Online', 'ExtraMovies.com: Download And Watch All Kind of Movies in 720p and 1080p BluRay HD For Free At ExtraMovies. Here Quality Matters.', '4C5A98', '5C3E6', '2OVrw2i', 'vb5w37t', 'w6fbrb', 0, 0, '2019-12-07 13:23:05'),
(100267, 0, 'N/A', 'http://cos-metro.web.app/', '', '', '0398FC', '6AED4', '33v12bV', 'rzq92bp', 'w6tjAS', 0, 0, '2019-12-12 20:03:49'),
(100268, 0, 'N/A', 'http://if-seaken.web.app/', '', '', '8F2C31', '457D4', '2Y0A9M4', 'wb945ts', 'w6yKNb', 0, 0, '2019-12-14 01:43:34'),
(100269, 153, 'N/A', 'http://big-hot-men.com/?u=29nweky&amp;o=yg381n0', '', '', 'FB02FD', 'FFB3F', '394X8KT', 'twkqsfx', 'w6UQ1Y', 0, 0, '2019-12-22 02:11:23'),
(100270, 153, 'N/A', 'http://tophotchicks.com/jxrszbycyolsg', '', '', '857D15', '57370', '2MdBrP9', 'qmvz6c3', 'w6UQ4a', 0, 0, '2019-12-22 02:12:01'),
(100271, 0, '', 'http://ahrefs.tech/', 'AhrefLogger', 'Ahref IP Logger helps you track who has clicked your links. Track IP addresses, find IPs from Facebook, Twitter, friends on other sites.', '1AD683', 'BBE78', '3gqKYiz', 'y8r95hhd', 'eqGfPl', 0, 0, '2020-07-03 15:54:23'),
(100273, 0, '', 'http://fontawesome.com/', 'Font Awesome', 'The worldâ€™s most popular and easiest to use icon set just got an upgrade. More icons. More styles. More Options.', '48760D', '269F6', '3itmyXd', 'y7kt6bup', 'eqGg9F', 0, 0, '2020-07-03 16:20:16'),
(100274, 154, '', 'http://stackoverflow.com/', 'Stack Overflow - Where Developers Learn, Share, & Build Careers', 'Stack Overflow is the largest, most trusted online community for developers to learn, share&#x200B; &#x200B;their programming &#x200B;knowledge, and build their careers.', '257B4E', 'A8378', '2C1hM2I', '5cttyz', 'eqGjz2', 0, 1, '2020-07-03 16:24:51'),
(100275, 0, '', 'http://www.google.com/', 'Google', '', '3FA849', '6A715', '2NRU7Wb', '9cwu7xv', 'w4049L', 0, 0, '2020-08-28 17:10:04'),
(100277, 155, '', 'http://app.infinityfree.net/', 'Login to your account - InfinityFree', '', 'DC727D', '59AA4', '2EE5oH8', 'y2sl79yc', 'eewDOG', 1, 1, '2020-08-28 17:55:14'),
(100278, 0, '', 'http://google.com', 'Google', '', '9974C5', '72D1B', '2OUgCvN', 'y6dqpgc7', 'w3Qsop', 0, 0, '2020-09-01 18:37:58'),
(100279, 0, '', 'http://dev.denieuwehoreca.nl/', 'QR Digital Menu System', '', 'D09FB4', 'B0383', '35PHeoK', 'y3qkmkcy', 'eeUXIw', 0, 0, '2020-09-18 20:56:46'),
(100280, 156, '', 'http://www.facebook.com/AhrefLogger', 'Je browser bijwerken | Facebook', '', '626D70', 'A2E12', '2ZQ2oPx', 'y2foav7f', 'eeUVex', 0, 0, '2020-09-18 21:19:41'),
(100281, 156, 'mohit sent ', 'http://stackoverflow.com/questions/5404811/php-get-domain-name', 'Stack Overflow - Where Developers Learn, Share, & Build Careers', 'Stack Overflow is the largest, most trusted online community for developers to learn, share&#x200B; &#x200B;their programming &#x200B;knowledge, and build their careers.', 'E0FD87', '5D293', '3iMwvPp', 'y4pyszp3', 'eeU147', 1, 0, '2020-09-18 22:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `s_id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`s_id`, `name`, `email`, `message`, `date`) VALUES
(10, 'Sonalika', 'sharmasonalika49@gmail.com', 'Hi', '2019-04-16 18:36:20'),
(13, 'Averyelews', 'raphaeautode@gmail.com', 'Hello!  ahref.tech \\r\\n \\r\\nHave you ever heard of sending messages via feedback forms? \\r\\n \\r\\nImagine that your letter will be readseen by hundreds of thousands of your probable buyerscustomers. \\r\\nYour message will not go to the spam folder because people will send the message to themselves. As an example, we have sent you our offer  in the same way. \\r\\n \\r\\nWe have a database of more than 30 million sites to which we can send your message. Sites are sorted by country. Unfortunately, you can only select a country when sending a offer. \\r\\n \\r\\nThe price of one million messages 49 USD. \\r\\nThere is a discount program when you buy  more than two million message packages. \\r\\n \\r\\n \\r\\nFree trial mailing of 50,000 messages to any country of your selection. \\r\\n \\r\\n \\r\\nThis offer is created automatically. Please use the contact details below to contact us. \\r\\n \\r\\n \\r\\n \\r\\nContact us. \\r\\nTelegram - @FeedbackFormEU \\r\\nSkype  FeedbackForm2019 \\r\\nEmail - feedbackform@make-success.com', '2019-09-24 02:44:11'),
(14, 'Averyelews', 'raphaeOr@gmail.com', 'Hi!  ahref.tech \\r\\n \\r\\nHave you ever heard of sending messages via feedback forms? \\r\\n \\r\\nThink of that your offer will be readread by hundreds of thousands of your potential future userscustomers. \\r\\nYour message will not go to the spam folder because people will send the message to themselves. As an example, we have sent you our suggestion  in the same way. \\r\\n \\r\\nWe have a database of more than 35 million sites to which we can send your offer. Sites are sorted by country. Unfortunately, you can only select a country when sending a message. \\r\\n \\r\\nThe price of one million messages 49 USD. \\r\\nThere is a discount program when you buy  more than two million message packages. \\r\\n \\r\\n \\r\\nFree proof mailing of 50,000 messages to any country of your choice. \\r\\n \\r\\n \\r\\nThis letter is created automatically. Please use the contact details below to contact us. \\r\\n \\r\\n \\r\\n \\r\\nContact us. \\r\\nTelegram - @FeedbackFormEU \\r\\nSkype  FeedbackForm2019 \\r\\nEmail - feedbackform@make-success.com', '2019-11-10 19:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_data`
--

CREATE TABLE `tracking_data` (
  `track_id` int(222) NOT NULL,
  `ip` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `browser` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `os` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `complete` text COLLATE utf8_unicode_ci NOT NULL,
  `bot_status` int(11) NOT NULL DEFAULT '0',
  `country` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `isp` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `lat` text COLLATE utf8_unicode_ci NOT NULL,
  `lon` text COLLATE utf8_unicode_ci NOT NULL,
  `shorturl` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` varchar(222) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tracking_data`
--

INSERT INTO `tracking_data` (`track_id`, `ip`, `browser`, `os`, `complete`, `bot_status`, `country`, `region`, `isp`, `lat`, `lon`, `shorturl`, `date_time`) VALUES
(5, '106.204.72.75', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 0, 'India', 'Chandigarh', 'Bharti Airtel', '30.7366', '76.7925', '48760D', '2020-07-03 16:21:27'),
(6, '106.204.72.75', 'Firefox', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0', 0, 'India', 'Chandigarh', 'Bharti Airtel', '30.7366', '76.7925', '257B4E', '2020-07-03 16:25:12'),
(7, '106.204.72.75', 'Firefox', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0', 0, 'India', 'Chandigarh', 'Bharti Airtel', '30.7366', '76.7925', '257B4E', '2020-07-03 16:27:40'),
(8, '106.204.195.44', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36 Edg/84.0.522.63', 0, 'India', 'Chandigarh', 'Bharti Airtel', '30.7324', '76.795', 'DC727D', '2020-08-28 17:55:35'),
(9, '106.204.195.44', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36 Edg/84.0.522.63', 0, 'India', 'Chandigarh', 'Bharti Airtel', '30.7324', '76.795', 'DC727D', '2020-08-28 17:56:12'),
(10, '106.204.195.44', 'Chrome', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.135 Safari/537.36 Edg/84.0.522.63', 0, 'India', 'Chandigarh', 'Bharti Airtel', '30.7324', '76.795', 'DC727D', '2020-08-28 18:06:15'),
(14, '72.143.239.92', 'Handheld Browser', 'iPhone', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15E148 Safari/604.1', 0, 'Canada', 'British Columbia', 'Rogers Communications Canada Inc.', '54.3151', '-130.321', 'E0FD87', '2020-09-18 22:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `token` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `tos` varchar(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `public` varchar(11) NOT NULL DEFAULT '0',
  `date` varchar(222) NOT NULL,
  `upd_d` varchar(222) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `password`, `token`, `email`, `tos`, `status`, `public`, `date`, `upd_d`) VALUES
(128, 'navjot789', '$2y$10$csuHHL7oNRQfpt6izo7dt.LQFR9M5Y2Hah4.CUdrqt7r0iXozWej2', 'ea8e863be8e4f9d357aa364383f0ca32', 'ns949405@gmail.com', '1', 1, '1', '2019-04-09 23:40:22', '2019-07-29 18:49:32'),
(137, 'yfound', '$2y$10$SuHxI.OKd.EQJzDnt8iVfuWoALat/GF2P/Rr0JVvJCEg0dU2UaWZ2', '99fccbb628ca09fbe0812d1242c387d5', 'yesterdayfound@protonmail.com', '1', 1, '0', '2019-04-21 08:20:51', '0'),
(138, 'XenThoth', '$2y$10$B7qWzRqGbsQxT2KETZeleehB8ZGySRP.pdlPGjX6GvLoNy3CAFiiS', 'd7bd3be6f65d4f0f09c3a31a63eae3c2', '4e7dfdg@yandex.com', '1', 0, '0', '2019-05-03 04:33:41', '0'),
(141, 'Ritesh', '$2y$10$AuL3CLD9bqvhFB09WKVk1e1lF8Fxb4JxdYTYmY/lk9sRizr7xup9.', '3ec1d8bb1d9cf764d30cc1b984d877e3', 'riteshking18@gmail.com', '1', 0, '0', '2019-05-08 18:29:26', '0'),
(142, 'Kanu', '$2y$10$bD398hv2ygWT4/qw0Uawi.GwVo54yaL1sYr8tAZ1IlCMFdvdLOKr.', '9c5918d2fc3a53f182fd61fc4b096431', 'dashingraokanu@gmail.com', '1', 1, '0', '2019-05-08 22:21:55', '0'),
(143, 'Parminderkaur', '$2y$10$iE9OeHCFHd/hUEsozFpy0elmz/pYVFBFNTyRBFUECsX7SF3oqsjiS', 'b9284563893b7f994ace42d57174b204', 'pkaur241996@gmail.com', '1', 0, '0', '2019-05-09 00:50:10', '0'),
(144, 'navjot7890', '$2y$10$PHHlYMpqCzKdsnmwNpms0OSJyccG8uvxzNRq4aNukyAlDAh9FpBwS', 'c2ebf91296f136804c67d472f070381b', 'urlshotner000@gmail.com', '1', 1, '0', '2019-05-09 11:05:11', '0'),
(145, 'sonythaper', '$2y$10$ozHIlCvE2QH8oMnZ4DjUBe.k/vz1Nv3Hss77WAo35R.VJgB8lWFma', '35b71f3f6b99b4112b6d8eda8a2939c4', 'sonythaper20@gmail.com', '1', 1, '0', '2019-05-15 18:48:03', '0'),
(146, 'tintonz', '$2y$10$H5En4qF2or1jlDiyz6LHn.31GoeDaK3o6TTttqr9WIOQ5X0uLuBkS', 'c354d021b955718d94dd1eec16b86357', 'toyatoysweets@yahoo.com', '1', 1, '0', '2019-05-19 19:46:29', '0'),
(147, 'curvascie', '$2y$10$twaN9xUI2qXfljo7hwbWi.dx7YVLgV31aExURfqeaqYf97OjM.4wW', '49dc90d9949755d9129a2f1e0a293bf3', 'curvascie@gmail.com', '1', 0, '0', '2019-05-30 18:43:52', '0'),
(148, 'davep2', '$2y$10$Y6MZCJ6GFSp084qS1tzX1.7Ih6OqgBNavPTOCMsyg25pZ1bKbLATO', 'a47e5f3ce8210af656b08eaf76aa4e41', 'dave.p2@sapo.pt', '1', 1, '0', '2019-06-30 15:46:24', '0'),
(149, 'messa30', '$2y$10$y6vV1ISBk/GoOFdxl9FbN.DmXB3NsrguxL2VZ6aTmktGzqDsubAjS', '59ebb5fc976bb0efde9f56c4c4289e88', 'messahariyanto@gmail.com', '1', 1, '0', '2019-07-11 23:45:37', '0'),
(151, 'riteshweb.online', '$2y$10$tHJAe678Bwi9mJ95TWv7huKpBCw/Dwh9j4egpV0oym6fuphc6b5.m', '2df642b2d55ab3b820076764788e2433', 'riteshwebcompany@gmail.com', '1', 1, '0', '2019-09-04 20:58:07', '0'),
(152, 'laurence.offre@live.fr', '$2y$10$cu0pzWJiQTeC1MNLX.q1ZuS1UjiN8N0LHHe/EvlTdNp2kkmXXto5m', '22d56ba53de687b04376908ec170083e', 'laurence.offre@live.fr', '1', 1, '0', '2019-12-05 13:15:20', '0'),
(153, 'Annievae', '$2y$10$3jaCmFwQtVeo9lPsnoVTOOtnhHiuk0fni5o0GIgM4ozR71DugOQVa', 'a5fa4f39d3ae2f33fc824a37aaf493f8', 'desvariab@k12hw.net', '1', 1, '0', '2019-12-22 02:10:14', '0'),
(154, 'web.dev', '$2y$10$q5.mIew3HVy8loMtku/nIuZgKeZg3V6.3YIozCzToAg.FVouIBV7.', '47ac8cf2de230f4553477f4ee2223b28', 'web.dev.nav@gmail.com', '1', 1, '1', '2020-07-03 16:02:22', '0'),
(155, 'user', '$2y$10$F93o7Vh4Ur4gMkr6AgJzR.xoAhyBWxnV5r2Sc8lrGc1ezWCl9oHRS', 'c8c52a09d6fdac935ebf157c387aa54a', 'weneb55722@armcams.com', '1', 1, '0', '2020-08-28 17:33:11', '2020-08-28 18:30:28'),
(156, 'abc123', '$2y$10$vTOppVwYhehVIPh136fZ0OtyO6IJAj/lod/0VVlKR7zVt6NQV5oKm', '521371c8d42eb6cfb4f13e047af52f64', 'dixofe4446@tinkmail.net', '1', 1, '1', '2020-09-18 21:18:03', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `ac_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `activity_ip` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `login_at` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `logout_at` varchar(222) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`ac_id`, `u_id`, `activity_ip`, `login_at`, `logout_at`) VALUES
(8, 128, '157.39.212.212', '2019-09-14 18:05:27', '2019-09-16 14:01:03'),
(10, 137, '134.19.189.156', '2019-06-06 17:22:59', '2019-04-21 08:21:58'),
(12, 142, '106.78.87.237', '2019-05-08 22:24:47', ''),
(13, 145, '2405:205:4123:a4c7:5d26:1096:df22:e97', '2019-05-16 01:08:54', ''),
(14, 146, '36.81.5.232', '2019-05-19 19:47:23', ''),
(15, 148, '109.50.228.172', '2019-09-10 19:44:55', ''),
(17, 151, '210.56.127.241', '2019-09-04 20:59:02', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulk`
--
ALTER TABLE `bulk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bundles`
--
ALTER TABLE `bundles`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `shotner`
--
ALTER TABLE `shotner`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `shorturl` (`shorturl`,`track_code`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tracking_data`
--
ALTER TABLE `tracking_data`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `shorturl` (`shorturl`),
  ADD KEY `date_time` (`date_time`),
  ADD KEY `isp` (`isp`),
  ADD KEY `region` (`region`),
  ADD KEY `country` (`country`),
  ADD KEY `bot_status` (`bot_status`),
  ADD KEY `os` (`os`),
  ADD KEY `browser` (`browser`),
  ADD KEY `ip` (`ip`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`ac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bundles`
--
ALTER TABLE `bundles`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `manage`
--
ALTER TABLE `manage`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shotner`
--
ALTER TABLE `shotner`
  MODIFY `uid` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100282;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tracking_data`
--
ALTER TABLE `tracking_data`
  MODIFY `track_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
