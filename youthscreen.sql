-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2019 at 04:06 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youthscreen`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Talented Skills'),
(2, 'News'),
(3, 'Funny'),
(4, 'Song');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `postId` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL,
  `commentText` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `userId`, `postId`, `parent`, `commentText`, `website`, `createdAt`) VALUES
(1, 7, 1, 0, 'I\'m not able to upload video.', NULL, '2019-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `generalId` int(10) UNSIGNED NOT NULL,
  `webTitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footerArea` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `footerTextColor` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `googleAnalytics` longtext COLLATE utf8mb4_unicode_ci,
  `googleAnalyticsAdditional` longtext COLLATE utf8mb4_unicode_ci,
  `fbAnalytics` longtext COLLATE utf8mb4_unicode_ci,
  `otherSeo` longtext COLLATE utf8mb4_unicode_ci,
  `otherAnalyticsHead` longtext COLLATE utf8mb4_unicode_ci,
  `otherAnalyticsBody` longtext COLLATE utf8mb4_unicode_ci,
  `aboutUs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactAddress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactPhoneOne` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactPhoneTwo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactEmail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`generalId`, `webTitle`, `footerArea`, `footerTextColor`, `googleAnalytics`, `googleAnalyticsAdditional`, `fbAnalytics`, `otherSeo`, `otherAnalyticsHead`, `otherAnalyticsBody`, `aboutUs`, `contactAddress`, `contactPhoneOne`, `contactPhoneTwo`, `contactEmail`, `created_at`, `updated_at`) VALUES
(147, 'Youth Media', '', '', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager -->', '<!-- Google Tag Manager (noscript) -->\r\n<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-W9BVCM\"\r\nheight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\r\n<!-- End Google Tag Manager (noscript) -->', '<!-- Facebook Pixel Code -->\r\n<script>\r\n!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\nn.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;\r\nn.push=n;n.loaded=!0;n.version=\'2.0\';n.queue=[];t=b.createElement(e);t.async=!0;\r\nt.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,\r\ndocument,\'script\',\'https://connect.facebook.net/en_US/fbevents.js\');\r\nfbq(\'init\', \'1502663706627568\');\r\nfbq(\'track\', \'PageView\');\r\n</script>\r\n<noscript><img height=\"1\" width=\"1\" style=\"display:none\"\r\nsrc=\"https://www.facebook.com/tr?id=1502663706627568&ev=PageView&noscript=1\"\r\n/></noscript>\r\n<!-- DO NOT MODIFY -->\r\n<!-- End Facebook Pixel Code -->', '<!-- Google Code for Registered For Race Conversion Page -->\r\n<script type=\"text/javascript\">\r\n/* <![CDATA[ */\r\nvar google_conversion_id = 1003299823;\r\nvar google_conversion_language = \"en\";\r\nvar google_conversion_format = \"3\";\r\nvar google_conversion_color = \"ffffff\";\r\nvar google_conversion_label = \"NGV7CI2t92EQ78e03gM\";\r\nvar google_remarketing_only = false;\r\n/* ]]> */\r\n</script>\r\n<script type=\"text/javascript\" src=\"//www.googleadservices.com/pagead/conversion.js\">\r\n</script>\r\n<noscript>\r\n<div style=\"display:inline;\">\r\n<img height=\"1\" width=\"1\" style=\"border-style:none;\" alt=\"\" src=\"//www.googleadservices.com/pagead/conversion/1003299823/?label=NGV7CI2t92EQ78e03gM&guid=ON&script=0\"/>\r\n</div>\r\n</noscript>', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager --', '<script type=\"text/javascript\">\r\n(function() {\r\n  var didInit = false;\r\n  function initMunchkin() {\r\n    if(didInit === false) {\r\n      didInit = true;\r\n      Munchkin.init(\'705-NYP-170\');\r\n    }\r\n  }\r\n  var s = document.createElement(\'script\');\r\n  s.type = \'text/javascript\';\r\n  s.async = true;\r\n  s.src = \'//munchkin.marketo.net/munchkin.js\';\r\n  s.onreadystatechange = function() {\r\n    if (this.readyState == \'complete\' || this.readyState == \'loaded\') {\r\n      initMunchkin();\r\n    }\r\n  };\r\n  s.onload = initMunchkin;\r\n  document.getElementsByTagName(\'head\')[0].appendChild(s);\r\n})();\r\n</script>', 'YouthMedia is a popular video-sharing platform, whose popularity prevails not only in Pakistan but globally as well. We are serving video content to million of users on a daily basis.', 'Gulber III, Lahore', '+92 323 620 7389', '+92 323 620 6789', 'youthscreen786@gmail.com', NULL, NULL),
(148, 'Youth Media', '', '', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager -->', '<!-- Google Tag Manager (noscript) -->\r\n<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-W9BVCM\"\r\nheight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\r\n<!-- End Google Tag Manager (noscript) -->', '<!-- Facebook Pixel Code -->\r\n<script>\r\n!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\nn.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;\r\nn.push=n;n.loaded=!0;n.version=\'2.0\';n.queue=[];t=b.createElement(e);t.async=!0;\r\nt.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,\r\ndocument,\'script\',\'https://connect.facebook.net/en_US/fbevents.js\');\r\nfbq(\'init\', \'1502663706627568\');\r\nfbq(\'track\', \'PageView\');\r\n</script>\r\n<noscript><img height=\"1\" width=\"1\" style=\"display:none\"\r\nsrc=\"https://www.facebook.com/tr?id=1502663706627568&ev=PageView&noscript=1\"\r\n/></noscript>\r\n<!-- DO NOT MODIFY -->\r\n<!-- End Facebook Pixel Code -->', '<!-- Google Code for Registered For Race Conversion Page -->\r\n<script type=\"text/javascript\">\r\n/* <![CDATA[ */\r\nvar google_conversion_id = 1003299823;\r\nvar google_conversion_language = \"en\";\r\nvar google_conversion_format = \"3\";\r\nvar google_conversion_color = \"ffffff\";\r\nvar google_conversion_label = \"NGV7CI2t92EQ78e03gM\";\r\nvar google_remarketing_only = false;\r\n/* ]]> */\r\n</script>\r\n<script type=\"text/javascript\" src=\"//www.googleadservices.com/pagead/conversion.js\">\r\n</script>\r\n<noscript>\r\n<div style=\"display:inline;\">\r\n<img height=\"1\" width=\"1\" style=\"border-style:none;\" alt=\"\" src=\"//www.googleadservices.com/pagead/conversion/1003299823/?label=NGV7CI2t92EQ78e03gM&guid=ON&script=0\"/>\r\n</div>\r\n</noscript>', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager --', '<script type=\"text/javascript\">\r\n(function() {\r\n  var didInit = false;\r\n  function initMunchkin() {\r\n    if(didInit === false) {\r\n      didInit = true;\r\n      Munchkin.init(\'705-NYP-170\');\r\n    }\r\n  }\r\n  var s = document.createElement(\'script\');\r\n  s.type = \'text/javascript\';\r\n  s.async = true;\r\n  s.src = \'//munchkin.marketo.net/munchkin.js\';\r\n  s.onreadystatechange = function() {\r\n    if (this.readyState == \'complete\' || this.readyState == \'loaded\') {\r\n      initMunchkin();\r\n    }\r\n  };\r\n  s.onload = initMunchkin;\r\n  document.getElementsByTagName(\'head\')[0].appendChild(s);\r\n})();\r\n</script>', 'YouthMedia is a popular video-sharing platform, whose popularity prevails not only in Pakistan but globally as well. We are serving video content to million of users on a daily basis.', 'Gulber III, Lahore', '+92 323 620 7389', '+92 323 620 6789', 'youthscreen786@gmail.com', NULL, NULL),
(149, 'Tube Screen', '', '', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager -->', '<!-- Google Tag Manager (noscript) -->\r\n<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-W9BVCM\"\r\nheight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\r\n<!-- End Google Tag Manager (noscript) -->', '<!-- Facebook Pixel Code -->\r\n<script>\r\n!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\nn.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;\r\nn.push=n;n.loaded=!0;n.version=\'2.0\';n.queue=[];t=b.createElement(e);t.async=!0;\r\nt.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,\r\ndocument,\'script\',\'https://connect.facebook.net/en_US/fbevents.js\');\r\nfbq(\'init\', \'1502663706627568\');\r\nfbq(\'track\', \'PageView\');\r\n</script>\r\n<noscript><img height=\"1\" width=\"1\" style=\"display:none\"\r\nsrc=\"https://www.facebook.com/tr?id=1502663706627568&ev=PageView&noscript=1\"\r\n/></noscript>\r\n<!-- DO NOT MODIFY -->\r\n<!-- End Facebook Pixel Code -->', '<!-- Google Code for Registered For Race Conversion Page -->\r\n<script type=\"text/javascript\">\r\n/* <![CDATA[ */\r\nvar google_conversion_id = 1003299823;\r\nvar google_conversion_language = \"en\";\r\nvar google_conversion_format = \"3\";\r\nvar google_conversion_color = \"ffffff\";\r\nvar google_conversion_label = \"NGV7CI2t92EQ78e03gM\";\r\nvar google_remarketing_only = false;\r\n/* ]]> */\r\n</script>\r\n<script type=\"text/javascript\" src=\"//www.googleadservices.com/pagead/conversion.js\">\r\n</script>\r\n<noscript>\r\n<div style=\"display:inline;\">\r\n<img height=\"1\" width=\"1\" style=\"border-style:none;\" alt=\"\" src=\"//www.googleadservices.com/pagead/conversion/1003299823/?label=NGV7CI2t92EQ78e03gM&guid=ON&script=0\"/>\r\n</div>\r\n</noscript>', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager --', '<script type=\"text/javascript\">\r\n(function() {\r\n  var didInit = false;\r\n  function initMunchkin() {\r\n    if(didInit === false) {\r\n      didInit = true;\r\n      Munchkin.init(\'705-NYP-170\');\r\n    }\r\n  }\r\n  var s = document.createElement(\'script\');\r\n  s.type = \'text/javascript\';\r\n  s.async = true;\r\n  s.src = \'//munchkin.marketo.net/munchkin.js\';\r\n  s.onreadystatechange = function() {\r\n    if (this.readyState == \'complete\' || this.readyState == \'loaded\') {\r\n      initMunchkin();\r\n    }\r\n  };\r\n  s.onload = initMunchkin;\r\n  document.getElementsByTagName(\'head\')[0].appendChild(s);\r\n})();\r\n</script>', 'Tube-screen is a popular video-sharing platform, whose popularity prevails not only in Pakistan but globally as well. We are serving video content to million of users on a daily basis.', 'Gulber III, Lahore', '+92 323 620 7389', '+92 323 620 6789', 'youthscreen786@gmail.com', NULL, NULL),
(150, 'Youth Screen', '', '', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager -->', '<!-- Google Tag Manager (noscript) -->\r\n<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-W9BVCM\"\r\nheight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\r\n<!-- End Google Tag Manager (noscript) -->', '<!-- Facebook Pixel Code -->\r\n<script>\r\n!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\nn.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;\r\nn.push=n;n.loaded=!0;n.version=\'2.0\';n.queue=[];t=b.createElement(e);t.async=!0;\r\nt.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,\r\ndocument,\'script\',\'https://connect.facebook.net/en_US/fbevents.js\');\r\nfbq(\'init\', \'1502663706627568\');\r\nfbq(\'track\', \'PageView\');\r\n</script>\r\n<noscript><img height=\"1\" width=\"1\" style=\"display:none\"\r\nsrc=\"https://www.facebook.com/tr?id=1502663706627568&ev=PageView&noscript=1\"\r\n/></noscript>\r\n<!-- DO NOT MODIFY -->\r\n<!-- End Facebook Pixel Code -->', '<!-- Google Code for Registered For Race Conversion Page -->\r\n<script type=\"text/javascript\">\r\n/* <![CDATA[ */\r\nvar google_conversion_id = 1003299823;\r\nvar google_conversion_language = \"en\";\r\nvar google_conversion_format = \"3\";\r\nvar google_conversion_color = \"ffffff\";\r\nvar google_conversion_label = \"NGV7CI2t92EQ78e03gM\";\r\nvar google_remarketing_only = false;\r\n/* ]]> */\r\n</script>\r\n<script type=\"text/javascript\" src=\"//www.googleadservices.com/pagead/conversion.js\">\r\n</script>\r\n<noscript>\r\n<div style=\"display:inline;\">\r\n<img height=\"1\" width=\"1\" style=\"border-style:none;\" alt=\"\" src=\"//www.googleadservices.com/pagead/conversion/1003299823/?label=NGV7CI2t92EQ78e03gM&guid=ON&script=0\"/>\r\n</div>\r\n</noscript>', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager --', '<script type=\"text/javascript\">\r\n(function() {\r\n  var didInit = false;\r\n  function initMunchkin() {\r\n    if(didInit === false) {\r\n      didInit = true;\r\n      Munchkin.init(\'705-NYP-170\');\r\n    }\r\n  }\r\n  var s = document.createElement(\'script\');\r\n  s.type = \'text/javascript\';\r\n  s.async = true;\r\n  s.src = \'//munchkin.marketo.net/munchkin.js\';\r\n  s.onreadystatechange = function() {\r\n    if (this.readyState == \'complete\' || this.readyState == \'loaded\') {\r\n      initMunchkin();\r\n    }\r\n  };\r\n  s.onload = initMunchkin;\r\n  document.getElementsByTagName(\'head\')[0].appendChild(s);\r\n})();\r\n</script>', 'Youth-Screen is a popular video-sharing platform, whose popularity prevails not only in Pakistan but globally as well. We are serving video content to million of users on a daily basis.', 'Gulber III, Lahore', '+92 323 620 7389', '+92 323 620 6789', 'youthscreen786@gmail.com', NULL, NULL),
(151, 'Youth Screen', '', '', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager -->', '<!-- Google Tag Manager (noscript) -->\r\n<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-W9BVCM\"\r\nheight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\r\n<!-- End Google Tag Manager (noscript) -->', '<!-- Facebook Pixel Code -->\r\n<script>\r\n!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\nn.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;\r\nn.push=n;n.loaded=!0;n.version=\'2.0\';n.queue=[];t=b.createElement(e);t.async=!0;\r\nt.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,\r\ndocument,\'script\',\'https://connect.facebook.net/en_US/fbevents.js\');\r\nfbq(\'init\', \'1502663706627568\');\r\nfbq(\'track\', \'PageView\');\r\n</script>\r\n<noscript><img height=\"1\" width=\"1\" style=\"display:none\"\r\nsrc=\"https://www.facebook.com/tr?id=1502663706627568&ev=PageView&noscript=1\"\r\n/></noscript>\r\n<!-- DO NOT MODIFY -->\r\n<!-- End Facebook Pixel Code -->', '<!-- Google Code for Registered For Race Conversion Page -->\r\n<script type=\"text/javascript\">\r\n/* <![CDATA[ */\r\nvar google_conversion_id = 1003299823;\r\nvar google_conversion_language = \"en\";\r\nvar google_conversion_format = \"3\";\r\nvar google_conversion_color = \"ffffff\";\r\nvar google_conversion_label = \"NGV7CI2t92EQ78e03gM\";\r\nvar google_remarketing_only = false;\r\n/* ]]> */\r\n</script>\r\n<script type=\"text/javascript\" src=\"//www.googleadservices.com/pagead/conversion.js\">\r\n</script>\r\n<noscript>\r\n<div style=\"display:inline;\">\r\n<img height=\"1\" width=\"1\" style=\"border-style:none;\" alt=\"\" src=\"//www.googleadservices.com/pagead/conversion/1003299823/?label=NGV7CI2t92EQ78e03gM&guid=ON&script=0\"/>\r\n</div>\r\n</noscript>', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager -->', '<script type=\"text/javascript\">\r\n(function() {\r\n  var didInit = false;\r\n  function initMunchkin() {\r\n    if(didInit === false) {\r\n      didInit = true;\r\n      Munchkin.init(\'705-NYP-170\');\r\n    }\r\n  }\r\n  var s = document.createElement(\'script\');\r\n  s.type = \'text/javascript\';\r\n  s.async = true;\r\n  s.src = \'//munchkin.marketo.net/munchkin.js\';\r\n  s.onreadystatechange = function() {\r\n    if (this.readyState == \'complete\' || this.readyState == \'loaded\') {\r\n      initMunchkin();\r\n    }\r\n  };\r\n  s.onload = initMunchkin;\r\n  document.getElementsByTagName(\'head\')[0].appendChild(s);\r\n})();\r\n</script>', 'Youth-Screen is a popular video-sharing platform, whose popularity prevails not only in Pakistan but globally as well. We are serving video content to million of users on a daily basis.', 'Gulber III, Lahore', '+92 323 620 7389', '+92 323 620 6789', 'youthscreen786@gmail.com', NULL, NULL),
(152, 'Youth Screen', '', '', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager -->', '<!-- Google Tag Manager (noscript) -->\r\n<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-W9BVCM\"\r\nheight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\r\n<!-- End Google Tag Manager (noscript) -->', '<!-- Facebook Pixel Code -->\r\n<script>\r\n!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\nn.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;\r\nn.push=n;n.loaded=!0;n.version=\'2.0\';n.queue=[];t=b.createElement(e);t.async=!0;\r\nt.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,\r\ndocument,\'script\',\'https://connect.facebook.net/en_US/fbevents.js\');\r\nfbq(\'init\', \'1502663706627568\');\r\nfbq(\'track\', \'PageView\');\r\n</script>\r\n<noscript><img height=\"1\" width=\"1\" style=\"display:none\"\r\nsrc=\"https://www.facebook.com/tr?id=1502663706627568&ev=PageView&noscript=1\"\r\n/></noscript>\r\n<!-- DO NOT MODIFY -->\r\n<!-- End Facebook Pixel Code -->', '<!-- Google Code for Registered For Race Conversion Page -->\r\n<script type=\"text/javascript\">\r\n/* <![CDATA[ */\r\nvar google_conversion_id = 1003299823;\r\nvar google_conversion_language = \"en\";\r\nvar google_conversion_format = \"3\";\r\nvar google_conversion_color = \"ffffff\";\r\nvar google_conversion_label = \"NGV7CI2t92EQ78e03gM\";\r\nvar google_remarketing_only = false;\r\n/* ]]> */\r\n</script>\r\n<script type=\"text/javascript\" src=\"//www.googleadservices.com/pagead/conversion.js\">\r\n</script>\r\n<noscript>\r\n<div style=\"display:inline;\">\r\n<img height=\"1\" width=\"1\" style=\"border-style:none;\" alt=\"\" src=\"//www.googleadservices.com/pagead/conversion/1003299823/?label=NGV7CI2t92EQ78e03gM&guid=ON&script=0\"/>\r\n</div>\r\n</noscript>', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager -->', '<script type=\"text/javascript\">\r\n(function() {\r\n  var didInit = false;\r\n  function initMunchkin() {\r\n    if(didInit === false) {\r\n      didInit = true;\r\n      Munchkin.init(\'705-NYP-170\');\r\n    }\r\n  }\r\n  var s = document.createElement(\'script\');\r\n  s.type = \'text/javascript\';\r\n  s.async = true;\r\n  s.src = \'//munchkin.marketo.net/munchkin.js\';\r\n  s.onreadystatechange = function() {\r\n    if (this.readyState == \'complete\' || this.readyState == \'loaded\') {\r\n      initMunchkin();\r\n    }\r\n  };\r\n  s.onload = initMunchkin;\r\n  document.getElementsByTagName(\'head\')[0].appendChild(s);\r\n})();\r\n</script>', 'Youth-Screen is a popular video-sharing platform, whose popularity prevails not only in Pakistan but globally as well. We are serving video content to million of users on a daily basis.', 'Gulber III, Lahore', '+92 323 620 7389', '+92 323 620 6789', 'youthscreen786@gmail.com', NULL, NULL),
(153, 'Youth Screen', '', '', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager -->', '<!-- Google Tag Manager (noscript) -->\r\n<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-W9BVCM\"\r\nheight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>\r\n<!-- End Google Tag Manager (noscript) -->', NULL, '<!-- Google Code for Registered For Race Conversion Page -->\r\n<script type=\"text/javascript\">\r\n/* <![CDATA[ */\r\nvar google_conversion_id = 1003299823;\r\nvar google_conversion_language = \"en\";\r\nvar google_conversion_format = \"3\";\r\nvar google_conversion_color = \"ffffff\";\r\nvar google_conversion_label = \"NGV7CI2t92EQ78e03gM\";\r\nvar google_remarketing_only = false;\r\n/* ]]> */\r\n</script>\r\n<script type=\"text/javascript\" src=\"//www.googleadservices.com/pagead/conversion.js\">\r\n</script>\r\n<noscript>\r\n<div style=\"display:inline;\">\r\n<img height=\"1\" width=\"1\" style=\"border-style:none;\" alt=\"\" src=\"//www.googleadservices.com/pagead/conversion/1003299823/?label=NGV7CI2t92EQ78e03gM&guid=ON&script=0\"/>\r\n</div>\r\n</noscript>', '<!-- Google Tag Manager -->\r\n<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':\r\nnew Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],\r\nj=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\r\n\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);\r\n})(window,document,\'script\',\'dataLayer\',\'GTM-W9BVCM\');</script>\r\n<!-- End Google Tag Manager -->', '<script type=\"text/javascript\">\r\n(function() {\r\n  var didInit = false;\r\n  function initMunchkin() {\r\n    if(didInit === false) {\r\n      didInit = true;\r\n      Munchkin.init(\'705-NYP-170\');\r\n    }\r\n  }\r\n  var s = document.createElement(\'script\');\r\n  s.type = \'text/javascript\';\r\n  s.async = true;\r\n  s.src = \'//munchkin.marketo.net/munchkin.js\';\r\n  s.onreadystatechange = function() {\r\n    if (this.readyState == \'complete\' || this.readyState == \'loaded\') {\r\n      initMunchkin();\r\n    }\r\n  };\r\n  s.onload = initMunchkin;\r\n  document.getElementsByTagName(\'head\')[0].appendChild(s);\r\n})();\r\n</script>', 'Youth-Screen is a popular video-sharing platform, whose popularity prevails not only in Pakistan but globally as well. We are serving video content to million of users on a daily basis.', 'Gulber III, Lahore', '+92 323 620 7389', '+92 323 620 6789', 'youthscreen786@gmail.com', NULL, NULL),
(154, 'Youth Screen', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Youth-Screen is a popular video-sharing platform, whose popularity prevails not only in Pakistan but globally as well. We are serving video content to million of users on a daily basis.', 'Gulber III, Lahore', '+92 323 620 7389', '+92 323 620 6789', 'youthscreen786@gmail.com', NULL, NULL),
(155, 'Youth Screen', '', '', '<!--Google Analytics Site Tag -->\r\n        <script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-133492831-1\"></script>\r\n        <script>\r\n          window.dataLayer = window.dataLayer || [];\r\n          function gtag(){dataLayer.push(arguments);}\r\n          gtag(\'js\', new Date());\r\n        \r\n          gtag(\'config\', \'UA-133492831-1\');\r\n        </script>', NULL, NULL, NULL, NULL, NULL, 'Youth-Screen is a popular video-sharing platform, whose popularity prevails not only in Pakistan but globally as well. We are serving video content to million of users on a daily basis.', 'Gulber III, Lahore', '+92 323 620 7389', '+92 323 620 6789', 'youthscreen786@gmail.com', NULL, NULL),
(156, 'Youth Screen', '', '', '<!--Google Analytics Site Tag -->\r\n        <script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-133492831-1\"></script>\r\n        <script>\r\n          window.dataLayer = window.dataLayer || [];\r\n          function gtag(){dataLayer.push(arguments);}\r\n          gtag(\'js\', new Date());\r\n        \r\n          gtag(\'config\', \'UA-133492831-1\');\r\n        </script>', NULL, NULL, NULL, NULL, NULL, 'Youth-Screen is a popular video-sharing platform, whose popularity prevails not only in Pakistan but globally as well. We are serving video content to million of users on a daily basis.', 'Gulber III, Lahore', '+92 323 620 7389', '+92 323 620 6789', 'youthscreen786@gmail.com', NULL, NULL),
(157, 'Youth Screen', '', '', '<!--Google Analytics Site Tag -->\r\n        <script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-133492831-1\"></script>\r\n        <script>\r\n          window.dataLayer = window.dataLayer || [];\r\n          function gtag(){dataLayer.push(arguments);}\r\n          gtag(\'js\', new Date());\r\n        \r\n          gtag(\'config\', \'UA-133492831-1\');\r\n        </script>\r\n<!-- Google AdSense Code -->\r\n<script async src=\"//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>\r\n<script>\r\n  (adsbygoogle = window.adsbygoogle || []).push({\r\n    google_ad_client: \"ca-pub-6753025667913611\",\r\n    enable_page_level_ads: true\r\n  });\r\n</script>', NULL, NULL, NULL, NULL, NULL, 'Youth-Screen is a popular video-sharing platform, whose popularity prevails not only in Pakistan but globally as well. We are serving video content to million of users on a daily basis.', 'Gulber III, Lahore', '+92 323 620 7389', '+92 323 620 6789', 'youthscreen786@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes_shares`
--

CREATE TABLE `likes_shares` (
  `postId` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `liked` tinyint(4) NOT NULL,
  `unliked` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes_shares`
--

INSERT INTO `likes_shares` (`postId`, `userId`, `liked`, `unliked`) VALUES
(0, 1, 2, 0),
(1, 1, 5, 2),
(2, 1, 10, 2),
(1, 1, 1, 1),
(22, 5, 1, 0),
(32, 5, 1, 0),
(1, 7, 1, 0),
(1, 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_05_06_194030_create_youtube_access_tokens_table', 1),
(4, '2018_12_22_120057_create_categories_table', 1),
(5, '2018_12_22_120516_create_comments_table', 1),
(6, '2018_12_22_131824_create_general_setting_table', 1),
(7, '2018_12_22_133120_create_likes_shares_table', 1),
(8, '2018_12_22_134326_create_navigation_table', 1),
(9, '2018_12_22_135418_create_posts_table', 1),
(10, '2018_12_22_141015_create_roles_table', 1),
(11, '2018_12_22_141739_create_social_settings_table', 1),
(12, '2018_12_22_142246_create_subscription_table', 1),
(13, '2018_12_22_142517_create_websites_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `navId` int(10) UNSIGNED NOT NULL,
  `pageCode` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageName` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageTitle` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageDescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageKeywords` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `isEnable` tinyint(4) NOT NULL,
  `navLocation` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pageSettings` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`navId`, `pageCode`, `pageName`, `pageTitle`, `pageDescription`, `pageKeywords`, `isEnable`, `navLocation`, `pageSettings`) VALUES
(10, 'privacypolicy', 'Privacy Policy', 'Privacy Policy', '', '', 0, 'header', '{\"privacyText\":\"<p>By using and visiting our website, you agree to the terms and conditions and Privacy policy of YOUTHSCREEN. These terms and conditions apply to all users, and if you don\'t agree to these terms then please don\'t use the website. YOUTHSCREEN has created this Privacy policy in order to demonstrate our determination to your online privacy.<\\/p>\\r\\n<h3>What information do we collect:<\\/h3>\\r\\n<p>We collect information when you register to our website. You may be asked to enter your name, your email address, your country name, your address and your telephone number<\\/p>\\r\\n<h3>What do we use your information for?<\\/h3>\\r\\n<p>We use your information just to enhance your experience and to improve our website.<\\/p>\\r\\n<h3>Approved Videos:<\\/h3>\\r\\n<p>Videos uploaded by user should meet following criteria for getting approved:<\\/p>\\r\\n<ul>\\r\\n<li>Videos should not be against any religion.<\\/li>\\r\\n<li>Videos should not contain any any sexually explicit content.<\\/li>\\r\\n<li>Videos should not contain illegal acts (including but not limited to incitement to violence, animal abuse or drug abuse).<\\/li>\\r\\n<\\/ul>\\r\\n<p><strong>If you think any content is explicit in nature and should not be allowed on the website than you can report it and we will make sure that it is taken down immediately and appropriate action is taken against the offender.<\\/strong><\\/p>\\r\\n<h3>Changes to our Privacy Policy:<\\/h3>\\r\\n<p>If we want to change our privacy policy, we&rsquo;ll post it here or we will notify you via email.<\\/p>\",\"navId\":\"10\",\"pageCode\":\"privacypolicy\",\"pageTitle\":\"Privacy Policy\",\"pageDescription\":null,\"pageKeywords\":null}'),
(30, 'termsandconditions', 'Terms And Conditions', 'Terms And Conditions', '', 'TOC', 0, 'header', '{\"toc\":\"<h3>Terms of Service<\\/h3>\\r\\n<p><strong>KINDLY CONFER TO THESE TERMS OF USE CAREFULLY. They show that the nature of the website and the rules and regulations associated with are greatly important. Along with that we respect the rights of all organizations and individuals. In case of any questions or confusions, please do not hesitate in reaching out to us.<\\/strong><\\/p>\\r\\n<p><strong>WITH THE USE OF YOUTHSCREEN, YOU REPRESENT TO US THAT YOU HAVE ALL NECESSARY AUTHORITY AND POWER TO AGREE TO THE TERMS WHICH YOU AGREE SHALL BE BINDING ON THE CORPORATION, PARTNERSHIP, ASSOCIATION OR OTHER ENTITY IN WHOSE NAME YOU ARE REGISTERING AS A USER AND ESTABLISHING AN ACCOUNT. IF YOU DO NOT AGREE TO ANY OF THESE TERMS, YOU MAY NOT USE THE WEBSITE.<\\/strong><\\/p>\\r\\n<h3>Description of the Website:<\\/h3>\\r\\n<p>If you have registered on YOUTHSCREEN and own an account then the files you upload\\/create, the activity on your account (comments, likes, shares), and your avatar is not owned by YOUTHSCREEN. By keeping your account privacy open to other users (as a body, or by individual group), you agree to allow any users of the Website free of charge and for personal use only, to view and transmit Your Content on or through the Website, on other electronic communication media or technology (e.g. smartphones, tablets, connected TV, game consoles), for the entire period in which Your Content is hosted on the Website. The amount your time your content will be hosted on site, you authorize YOUTHSCREEN to reproduce\\/feature Your Content and, as necessary, adjust its format for that purpose. Please note that due to the inherent nature of the Internet, data transmitted &ndash; including Your Content - are not protected against the risks of misuse and\\/or piracy, for which we shall not be liable. You are responsible for taking all appropriate steps to protect such data, where applicable.<\\/p>\\r\\n<p>If you have any complaints or suggestions, regarding YOUTHSCREEN contact us from out contact page<\\/p>\\r\\n<h3>Prize eligibility and criteria:<\\/h3>\\r\\n<ul class=\\\"toc-ul\\\">\\r\\n<li><span style=\\\"font-size: 14pt;\\\">All prizes are for registered users only.<\\/span><\\/li>\\r\\n<li><span style=\\\"font-size: 14pt;\\\">You also have like our <a href=\\\"https:\\/\\/facebook.com\\\" target=\\\"_blank\\\">FaceBook<\\/a> page for getting eligible for prize.<\\/span><\\/li>\\r\\n<li><span style=\\\"font-size: 14pt;\\\">Your videos should have to approved by YOUTHSCREEN else it will not be considered in total videos count. Visit our Policy page to check our Approved videos criteria.<\\/span><\\/li>\\r\\n<li><span style=\\\"font-size: 14pt;\\\">All cash prizes or mobile top ups will be transferred on 1st week of each month.<\\/span><\\/li>\\r\\n<li><span style=\\\"font-size: 14pt;\\\">Once your total uploaded videos reach 100 you will receive an email by YOUTHSCREEN having your details and other important information for prize transfer. You have to provide us that email\'s information in order for your account\'s verification. If you somehow didn\'t receive our email you can contact us and will solve your issue.<\\/span><\\/li>\\r\\n<\\/ul>\",\"navId\":\"30\",\"pageCode\":\"termsandconditions\",\"pageTitle\":\"Terms And Conditions\",\"pageDescription\":null,\"pageKeywords\":\"TOC\"}'),
(49, 'contact', 'Contact', 'Contact Us', '', 'contactus', 1, 'header', '{\"sendTo\":\"youthscreen786@gmail.com\",\"locLong\":\"74.354321\",\"locLat\":\"31.558952\",\"navId\":\"49\",\"pageCode\":\"contact\",\"pageTitle\":\"Contact Us\",\"pageDescription\":null,\"pageKeywords\":\"contactus\"}'),
(50, 'home', 'Home', 'Home', 'Home Page', '', 1, 'header', '{\"pageImage\":null,\"navId\":\"50\",\"pageCode\":\"home\",\"pageTitle\":\"Home\",\"pageDescription\":null,\"pageKeywords\":null}'),
(51, 'prize', 'Prize', 'Prize', '', 'prize', 1, 'header', '{\"prizeText\":\"<p>By using and registering at our website, you can win prizes including mobile top ups and cash prizes.<strong>These prizes are for all registered users excluding YOUTHSCREEN team.<\\/strong><\\/p>\\r\\n<h3>Win By Uploading Videos:<\\/h3>\\r\\n<p>You can win up to 500rs mobile balance by uploading 100 videos at our website. Those videos should have to be approved by YOUTHSCREEN.<\\/p>\\r\\n<h3>Top Liked Video<\\/h3>\\r\\n<p>If your video get 100+ likes you can win 1000rs mobile balance or cash.<\\/p>\\r\\n<h3>More exciting prizes still to come<\\/h3>\\r\\n<p>As we are promoting our website we are continuously arranging more prizes and gifts for our users and those will be posted here and on our Facebook page. So keep looking at it occasionally to stay up to date.<\\/p>\\r\\n<h3>Visit Terms and Conditions page for further details regarding prize eligibility criteria<\\/h3>\",\"navId\":\"51\",\"pageCode\":\"prize\",\"pageTitle\":\"Prize\",\"pageDescription\":null,\"pageKeywords\":\"prize\"}');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(10) UNSIGNED NOT NULL,
  `postTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `postThumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uniqueCustomKey` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdOn` int(11) NOT NULL,
  `websiteId` int(11) UNSIGNED NOT NULL,
  `categoryId` int(11) NOT NULL,
  `post` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `postTags` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `postStatus` tinyint(4) NOT NULL,
  `isScrapped` tinyint(4) NOT NULL,
  `postViewed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postTitle`, `postDescription`, `postThumbnail`, `uniqueCustomKey`, `createdOn`, `websiteId`, `categoryId`, `post`, `postTags`, `userId`, `postStatus`, `isScrapped`, `postViewed`) VALUES
(1, 'Fayaz Ul Hassan Chohan media talk &#8211; 2nd December 2019', '', '11546429811.jpg', 'https://www.youtube.com/embed/OMNWboHeuDk', 1546429811, 2, 2, 'https://www.youtube.com/embed/OMNWboHeuDk', 'news,politics,media,pakistan', 1, 1, 1, 210),
(2, 'Prime Time With Neelum Nawab &#8211; 1st January 2019', '', '11546429812.jpg', 'https://www.youtube.com/embed/E8Is97D_zss', 1546429812, 2, 2, 'https://www.youtube.com/embed/E8Is97D_zss', 'news,politics,media,pakistan', 1, 1, 1, 21),
(3, 'Syasi Theater â€“ 1st January 2019', '', '11546429814.jpg', 'https://www.youtube.com/embed/lYstUU6lMXc', 1546429814, 2, 2, 'https://www.youtube.com/embed/lYstUU6lMXc', 'news,politics,media,pakistan', 1, 1, 1, 35),
(4, 'Gar Tu Bura Na Mane â€“ 1st January 2019', '', '11546429816.jpg', 'https://www.youtube.com/embed/aRIymHMf7mk', 1546429816, 2, 2, 'https://www.youtube.com/embed/aRIymHMf7mk', 'news,politics,media,pakistan', 1, 1, 1, 43),
(5, '2 Tok â€“ 1st January 2019', '', '11546429817.jpg', 'https://www.youtube.com/embed/CfRht2iAm04', 1546429817, 2, 2, 'https://www.youtube.com/embed/CfRht2iAm04', 'news,politics,media,pakistan', 1, 1, 1, 45),
(6, 'DNA â€“ 1st January 2019', '', '11546429819.jpg', 'https://www.youtube.com/embed/MWaPvsx3N1k', 1546429819, 2, 2, 'https://www.youtube.com/embed/MWaPvsx3N1k', 'news,politics,media,pakistan', 1, 1, 1, 85),
(7, 'News Point â€“ 1st January 2019', '', '11546429821.jpg', 'https://www.youtube.com/embed/iWQRT9VER7M', 1546429821, 2, 2, 'https://www.youtube.com/embed/iWQRT9VER7M', 'news,politics,media,pakistan', 1, 1, 1, 42),
(9, 'Taaro Se Karen Batain â€“ 1st January 2019', '', '11546429824.jpg', 'http://www.dailymotion.com/embed/video/x6zudiy', 1546429824, 2, 2, 'http://www.dailymotion.com/embed/video/x6zudiy', 'news,politics,media,pakistan', 1, 1, 1, 40),
(10, 'The Last Hour &#8211; 1st January 2019', '', '11546429826.jpg', 'http://www.dailymotion.com/embed/video/x6zudhq', 1546429826, 2, 2, 'http://www.dailymotion.com/embed/video/x6zudhq', 'news,politics,media,pakistan', 1, 1, 1, 19),
(11, 'Zara Hut Kay &#8211; 1st January 2019', '', '11546429827.jpg', 'http://www.dailymotion.com/embed/video/x6zudew', 1546429827, 2, 2, 'http://www.dailymotion.com/embed/video/x6zudew', 'news,politics,media,pakistan', 1, 1, 1, 80),
(12, 'Khabar Kay Peechay &#8211; 1st January 2019', '', '11546429829.jpg', 'https://www.youtube.com/embed/Keok6cRQ-W8', 1546429829, 2, 2, 'https://www.youtube.com/embed/Keok6cRQ-W8', 'news,politics,media,pakistan', 1, 1, 1, 30),
(13, 'Kal Tak With Javed Chaudhry â€“ 1st January 2019', '', '11546429830.jpg', 'https://www.youtube.com/embed/RuJ9DCYKQdA', 1546429830, 2, 2, 'https://www.youtube.com/embed/RuJ9DCYKQdA', 'news,politics,media,pakistan', 1, 1, 1, 38),
(14, 'Ikhtilaf Rai â€“ 1st January 2019', '', '11546429832.jpg', 'https://www.youtube.com/embed/wULi_bCxx9Y', 1546429832, 2, 2, 'https://www.youtube.com/embed/wULi_bCxx9Y', 'news,politics,media,pakistan', 1, 1, 1, 79),
(15, 'Jurm Benaqab â€“ 1st January 2019', '', '11546429834.jpg', 'https://www.youtube.com/embed/BTV0PxBWSTc', 1546429834, 2, 2, 'https://www.youtube.com/embed/BTV0PxBWSTc', 'news,politics,media,pakistan', 1, 1, 1, 63),
(16, 'Cross Check With OT â€“ 1st January 2019', '', '11546429835.jpg', 'https://www.youtube.com/embed/AgTaOAdYxE4', 1546429835, 2, 2, 'https://www.youtube.com/embed/AgTaOAdYxE4', 'news,politics,media,pakistan', 1, 1, 1, 60),
(17, 'Hazraat  â€“ 1st January 2019 Repeat', '', '11546429837.jpg', 'http://www.dailymotion.com/embed/video/x6h1ss0', 1546429837, 2, 2, 'http://www.dailymotion.com/embed/video/x6h1ss0', 'news,politics,media,pakistan', 1, 1, 1, 29),
(18, 'Fawad Chaudhary Press Conference &#8211; 2nd December 2018', '', '11546433095.jpg', 'http://www.dailymotion.com/embed/video/x6zvmdo', 1546433095, 2, 2, 'http://www.dailymotion.com/embed/video/x6zvmdo', 'news,politics,media,pakistan', 1, 1, 1, 16),
(19, 'Faisal Vada Press Conference &#8211; 2nd December 2018', '', '11546433096.jpg', 'http://www.dailymotion.com/embed/video/x6zvm7k', 1546433096, 2, 2, 'http://www.dailymotion.com/embed/video/x6zvm7k', 'news,politics,media,pakistan', 1, 1, 1, 38),
(20, 'FIR no 7  â€“ 1st January 2019 Repeat', '', '11546433118.jpg', 'http://www.dailymotion.com/embed/video/x6wv9qq', 1546433118, 2, 2, 'http://www.dailymotion.com/embed/video/x6wv9qq', 'news,politics,media,pakistan', 1, 1, 1, 63),
(21, 'FIR no 7  â€“ 1st January 2019 Repeat', '', '11546433118.jpg', 'http://www.dailymotion.com/embed/video/x6wv9qq', 1546433118, 2, 2, 'http://www.dailymotion.com/embed/video/x6wv9qq', 'news,politics,media,pakistan', 1, 1, 1, 56),
(22, 'Live With Moeed Pirzada â€“ 1st January 2019', '', '11546433119.jpg', 'http://www.dailymotion.com/embed/video/x6zubh4', 1546433119, 2, 2, 'http://www.dailymotion.com/embed/video/x6zubh4', 'news,politics,media,pakistan', 1, 1, 1, 140),
(23, 'Live With Moeed Pirzada â€“ 1st January 2019', '', '11546433119.jpg', 'http://www.dailymotion.com/embed/video/x6zubh4', 1546433119, 2, 2, 'http://www.dailymotion.com/embed/video/x6zubh4', 'news,politics,media,pakistan', 1, 1, 1, 75),
(24, 'Sach Ya Siyasat  â€“ 1st January 2019', '', '11546433121.jpg', 'http://www.dailymotion.com/embed/video/x6zubfi', 1546433121, 2, 2, 'http://www.dailymotion.com/embed/video/x6zubfi', 'news,politics,media,pakistan', 1, 1, 1, 45),
(25, 'Muqabil &#8211; 1st January 2019', '', '11546433123.jpg', 'http://www.dailymotion.com/embed/video/x6zuba2', 1546433123, 2, 2, 'http://www.dailymotion.com/embed/video/x6zuba2', 'news,politics,media,pakistan', 1, 1, 1, 44),
(26, 'Aamne Saamne  â€“ 1st January 2019', '', '11546433124.jpg', 'http://www.dailymotion.com/embed/video/x6zub90', 1546433124, 2, 2, 'http://www.dailymotion.com/embed/video/x6zub90', 'news,politics,media,pakistan', 1, 1, 1, 76),
(27, 'Sheikh Rasheed&#8217;s Press Conference  â€“ 30th January 2019', '', '11548929449.jpg', 'http://www.dailymotion.com/embed/video/x71m470', 1548929449, 2, 2, 'http://www.dailymotion.com/embed/video/x71m470', 'news,politics,media,pakistan', 1, 1, 1, 53),
(28, 'Ikhtilaf-e-Raye With Iftikhar Kazmi &#8211; 30th January 2019', '', '11548929450.jpg', 'https://www.youtube.com/embed/uHA3RN0ddAg', 1548929450, 2, 2, 'https://www.youtube.com/embed/uHA3RN0ddAg', 'news,politics,media,pakistan', 1, 1, 1, 57),
(29, 'Syasi Theater â€“ 30th January 2019', '', '11548929450.jpg', 'https://www.youtube.com/embed/11KunwYtlMg', 1548929450, 2, 2, 'https://www.youtube.com/embed/11KunwYtlMg', 'news,politics,media,pakistan', 1, 1, 1, 66),
(30, 'Aisay Nahi Chalay Ga â€“ 30th January 2019', '', '11548929451.jpg', 'https://www.youtube.com/embed/nIVowV5ZuYU', 1548929451, 2, 2, 'https://www.youtube.com/embed/nIVowV5ZuYU', 'news,politics,media,pakistan', 1, 1, 1, 67),
(31, 'Gar Tu Bura Na Mane â€“ 30th January 2019', '', '11548929451.jpg', 'https://www.youtube.com/embed/iSYZIFqoPzM', 1548929451, 2, 2, 'https://www.youtube.com/embed/iSYZIFqoPzM', 'news,politics,media,pakistan', 1, 1, 1, 62),
(32, 'News Point â€“ 30th January 2019', '', '11548929452.jpg', 'https://www.youtube.com/embed/RsYaSr85Bko', 1548929452, 2, 2, 'https://www.youtube.com/embed/RsYaSr85Bko', 'news,politics,media,pakistan', 1, 1, 1, 120),
(34, 'Power Play â€“ 30th January 2019', '', '11548929452.jpg', 'http://www.dailymotion.com/embed/video/x71kwmt', 1548929452, 2, 2, 'http://www.dailymotion.com/embed/video/x71kwmt', 'news,politics,media,pakistan', 1, 1, 1, 54),
(35, 'Harf e Raz with Orya Maqbol Jan &#8211; 30th January 2019', '', '11548929453.jpg', 'https://www.youtube.com/embed/mNxanOb_npM', 1548929453, 2, 2, 'https://www.youtube.com/embed/mNxanOb_npM', 'news,politics,media,pakistan', 1, 1, 1, 81),
(36, 'The Last Hour &#8211; 30th January 2019', '', '11548929453.jpg', 'http://www.dailymotion.com/embed/video/x71kzw2', 1548929453, 2, 2, 'http://www.dailymotion.com/embed/video/x71kzw2', 'news,politics,media,pakistan', 1, 1, 1, 18),
(37, 'Taaro Se Karen Batain â€“ 30th January 2019', '', '11548929453.jpg', 'http://www.dailymotion.com/embed/video/x71kzvd', 1548929453, 2, 2, 'http://www.dailymotion.com/embed/video/x71kzvd', 'news,politics,media,pakistan', 1, 1, 1, 30),
(38, 'Khabarzar  â€“ 30th January 2019', '', '11548929454.jpg', 'http://www.dailymotion.com/embed/video/x71kzsa', 1548929454, 2, 2, 'http://www.dailymotion.com/embed/video/x71kzsa', 'news,politics,media,pakistan', 1, 1, 1, 119),
(39, 'Zara Hut Kay &#8211; 30th January 2019', '', '11548929454.jpg', 'http://www.dailymotion.com/embed/video/x71kzhm', 1548929454, 2, 2, 'http://www.dailymotion.com/embed/video/x71kzhm', 'news,politics,media,pakistan', 1, 1, 1, 43),
(40, 'Khufia â€“ 30th January 2019', '', '11548929455.jpg', 'http://www.dailymotion.com/embed/video/x71kz95', 1548929455, 2, 2, 'http://www.dailymotion.com/embed/video/x71kz95', 'news,politics,media,pakistan', 1, 1, 1, 96),
(41, '2 Tok â€“ 30th January 2019', '', '11548929455.jpg', 'https://www.youtube.com/embed/KyOh5_HwppI', 1548929455, 2, 2, 'https://www.youtube.com/embed/KyOh5_HwppI', 'news,politics,media,pakistan', 1, 1, 1, 61),
(42, 'DNA â€“ 30th January 2019', '', '11548929455.jpg', 'https://www.youtube.com/embed/kuqtOeSwge8', 1548929455, 2, 2, 'https://www.youtube.com/embed/kuqtOeSwge8', 'news,politics,media,pakistan', 1, 1, 1, 21),
(43, 'Kal Tak With Javed Chaudhary â€“ 30th January 2019', '', '11548929456.jpg', 'https://www.youtube.com/embed/Q0H0747cv_8', 1548929456, 2, 2, 'https://www.youtube.com/embed/Q0H0747cv_8', 'news,politics,media,pakistan', 1, 1, 1, 43),
(44, 'City Buzz â€“ 30th January 2018 (Repeat)', '', '11548929456.jpg', 'http://www.dailymotion.com/embed/video/x70zkj8', 1548929456, 2, 2, 'http://www.dailymotion.com/embed/video/x70zkj8', 'news,politics,media,pakistan', 1, 1, 1, 52),
(45, 'Khabar Kay Peechay &#8211; 30th January 2019', '', '11548929456.jpg', 'https://www.youtube.com/embed/L-V6MSwmARo', 1548929456, 2, 2, 'https://www.youtube.com/embed/L-V6MSwmARo', 'news,politics,media,pakistan', 1, 1, 1, 29),
(46, 'FIR no 7 â€“ 30th January 2019 Repeat', '', '11548929457.jpg', 'http://www.dailymotion.com/embed/video/x6vmoce', 1548929457, 2, 2, 'http://www.dailymotion.com/embed/video/x6vmoce', 'news,politics,media,pakistan', 1, 1, 1, 99),
(48, 'Live With Moeed Pirzada â€“ 30th January 2019', '', '11548929458.jpg', 'http://www.dailymotion.com/embed/video/x71kw3d', 1548929458, 2, 2, 'http://www.dailymotion.com/embed/video/x71kw3d', 'news,politics,media,pakistan', 1, 1, 1, 19),
(49, 'Neo News Bulletin &#8211; 30th January 2019', '', '11548929458.jpg', 'https://www.youtube.com/embed/hJxrAXJChUc', 1548929458, 2, 2, 'https://www.youtube.com/embed/hJxrAXJChUc', 'news,politics,media,pakistan', 1, 1, 1, 129),
(50, 'Muqabil &#8211; 30th January 2019', '', '11548929459.jpg', 'http://www.dailymotion.com/embed/video/x71kvs7', 1548929459, 2, 2, 'http://www.dailymotion.com/embed/video/x71kvs7', 'news,politics,media,pakistan', 1, 1, 1, 114),
(51, 'Insight Pakistan With Ammara â€“ 30th January 2019', '', '11548929459.jpg', 'http://www.dailymotion.com/embed/video/x71kvlf', 1548929459, 2, 2, 'http://www.dailymotion.com/embed/video/x71kvlf', 'news,politics,media,pakistan', 1, 1, 1, 46),
(52, 'News Plus â€“ 30th January 2019', '', '11548929460.jpg', 'http://www.dailymotion.com/embed/video/x71kvga', 1548929460, 2, 2, 'http://www.dailymotion.com/embed/video/x71kvga', 'news,politics,media,pakistan', 1, 1, 1, 28),
(53, 'Spot Light â€“ 30th January 2019', '', '11548929460.jpg', 'http://www.dailymotion.com/embed/video/x71kvfd', 1548929460, 2, 2, 'http://www.dailymotion.com/embed/video/x71kvfd', 'news,politics,media,pakistan', 1, 1, 1, 121),
(54, 'NewsEye &#8211; 30th January 2019', '', '11548929460.jpg', 'http://www.dailymotion.com/embed/video/x71kvez', 1548929460, 2, 2, 'http://www.dailymotion.com/embed/video/x71kvez', 'news,politics,media,pakistan', 1, 1, 1, 59),
(55, 'Aamne Saamne â€“ 30th January 2019', '', '11548929461.jpg', 'http://www.dailymotion.com/embed/video/x71kvca', 1548929461, 2, 2, 'http://www.dailymotion.com/embed/video/x71kvca', 'news,politics,media,pakistan', 1, 1, 1, 85),
(56, 'Tabdeeli Ameer Abbas Ke Sath â€“ 30th January 2019', '', '11548929461.jpg', 'https://www.youtube.com/embed/tCLcY2vqIrI', 1548929461, 2, 2, 'https://www.youtube.com/embed/tCLcY2vqIrI', 'news,politics,media,pakistan', 1, 1, 1, 58),
(57, 'Cross Check With OT â€“ 30th January 2019', '', '11548929461.jpg', 'https://www.youtube.com/embed/CUcrvxd9Vcc', 1548929461, 2, 2, 'https://www.youtube.com/embed/CUcrvxd9Vcc', 'news,politics,media,pakistan', 1, 1, 1, 41),
(58, 'News Talk &#8211; 30th January 2019', '', '11548929462.jpg', 'https://www.youtube.com/embed/O1XzCsD-IN8', 1548929462, 2, 2, 'https://www.youtube.com/embed/O1XzCsD-IN8', 'news,politics,media,pakistan', 1, 1, 1, 29),
(59, 'Ikhtilaf Rai â€“ 30th January 2019', '', '11548929462.jpg', 'https://www.youtube.com/embed/QC7oECyal7I', 1548929462, 2, 2, 'https://www.youtube.com/embed/QC7oECyal7I', 'news,politics,media,pakistan', 1, 1, 1, 101),
(60, 'Pakistan Saudia Arab Relation Photography Exhibition â€“ 12th February 2019', '', '11549968274.jpg', 'http://www.dailymotion.com/embed/video/x72a8ng', 1549968274, 2, 2, 'http://www.dailymotion.com/embed/video/x72a8ng', 'news,politics,media,pakistan', 1, 1, 1, 81),
(61, 'Chairman Senate Sadiq Sinjrani&#8217;s Press Conference â€“ 12th February 2019', '', '11549968275.jpg', 'http://www.dailymotion.com/embed/video/x72a8d7', 1549968275, 2, 2, 'http://www.dailymotion.com/embed/video/x72a8d7', 'news,politics,media,pakistan', 1, 1, 1, 28),
(62, 'Aaj Ki Taaza Khabar -11th February 2019', '', '11549968275.jpg', 'https://www.youtube.com/embed/k8Isqq_0SIg', 1549968275, 2, 2, 'https://www.youtube.com/embed/k8Isqq_0SIg', 'news,politics,media,pakistan', 1, 1, 1, 19),
(63, 'The Special Report With Mudasser Iqbal &#8211; 11th Feb 2019', '', '11549968276.jpg', 'https://www.youtube.com/embed/eGtBUA8qrsA', 1549968276, 2, 2, 'https://www.youtube.com/embed/eGtBUA8qrsA', 'news,politics,media,pakistan', 1, 1, 1, 66),
(64, 'Ikhtilaf-e-Raye With Iftikhar Kazmi &#8211; 11th February 2019', '', '11549968276.jpg', 'https://www.youtube.com/embed/keBUYJS00kE', 1549968276, 2, 2, 'https://www.youtube.com/embed/keBUYJS00kE', 'news,politics,media,pakistan', 1, 1, 1, 59),
(65, 'Taaro Se Karen Batain â€“ 11th February 2019', '', '11549968276.jpg', 'https://www.youtube.com/embed/dn_q7Uhggu4', 1549968276, 2, 2, 'https://www.youtube.com/embed/dn_q7Uhggu4', 'news,politics,media,pakistan', 1, 1, 1, 35),
(66, 'Live With Moeed Pirzada â€“ 11th February 2019', '', '11549968276.jpg', 'https://www.youtube.com/embed/-gFaN2nRhrU', 1549968276, 2, 2, 'https://www.youtube.com/embed/-gFaN2nRhrU', 'news,politics,media,pakistan', 1, 1, 1, 100),
(67, 'Ab Pata Chala â€“ 11th February 2019', '', '11549968277.jpg', 'https://www.youtube.com/embed/VyvPO_ScgTQ', 1549968277, 2, 2, 'https://www.youtube.com/embed/VyvPO_ScgTQ', 'news,politics,media,pakistan', 1, 1, 1, 77),
(68, 'Tabdeeli Ameer Abbas Ke Sath â€“ 11th February 2019', '', '11549968277.jpg', 'https://www.youtube.com/embed/RYdbl0dQTb0', 1549968277, 2, 2, 'https://www.youtube.com/embed/RYdbl0dQTb0', 'news,politics,media,pakistan', 1, 1, 1, 33),
(69, 'Gar Tu Bura Na Mane â€“ 11th February 2019', '', '11549968277.jpg', 'https://www.youtube.com/embed/NAms_HGwXzU', 1549968277, 2, 2, 'https://www.youtube.com/embed/NAms_HGwXzU', 'news,politics,media,pakistan', 1, 1, 1, 35),
(70, 'Syasi Theater  â€“ 11th February 2019', '', '11549968278.jpg', 'https://www.youtube.com/embed/EqPYMTE8pHs', 1549968278, 2, 2, 'https://www.youtube.com/embed/EqPYMTE8pHs', 'news,politics,media,pakistan', 1, 1, 1, 66),
(71, 'News Point â€“ 11th February 2019', '', '11549968278.jpg', 'https://www.youtube.com/embed/KuiDSMiUQ2M', 1549968278, 2, 2, 'https://www.youtube.com/embed/KuiDSMiUQ2M', 'news,politics,media,pakistan', 1, 1, 1, 104),
(72, 'DNA â€“ 11th February 2019', '', '11549968279.jpg', 'https://www.youtube.com/embed/E5TUxveqBX8', 1549968279, 2, 2, 'https://www.youtube.com/embed/E5TUxveqBX8', 'news,politics,media,pakistan', 1, 1, 1, 70),
(74, 'Power Play â€“ 11th February 2019', '', '11549968279.jpg', 'http://www.dailymotion.com/embed/video/x728ron', 1549968279, 2, 2, 'http://www.dailymotion.com/embed/video/x728ron', 'news,politics,media,pakistan', 1, 1, 1, 95),
(75, 'CM Murad Ali Shah Speech In Sindh Assembly &#8211; 11th February 2019', '', '11549968280.jpg', 'https://www.youtube.com/embed/DIHwWdCIT6I', 1549968280, 2, 2, 'https://www.youtube.com/embed/DIHwWdCIT6I', 'news,politics,media,pakistan', 1, 1, 1, 62),
(76, 'The Last Hour &#8211; 11th February 2019', '', '11549968280.jpg', 'http://www.dailymotion.com/embed/video/x728t7a', 1549968280, 2, 2, 'http://www.dailymotion.com/embed/video/x728t7a', 'news,politics,media,pakistan', 1, 1, 1, 69),
(77, 'Zara Hut Kay &#8211; 11th February 2019', '', '11549968280.jpg', 'http://www.dailymotion.com/embed/video/x728sum', 1549968280, 2, 2, 'http://www.dailymotion.com/embed/video/x728sum', 'news,politics,media,pakistan', 1, 1, 1, 43),
(78, 'Bhai Jaan â€“ 10th February 2019', '', '11549968281.jpg', 'https://www.youtube.com/embed/xo0HPIZHgiA', 1549968281, 2, 2, 'https://www.youtube.com/embed/xo0HPIZHgiA', 'news,politics,media,pakistan', 1, 1, 1, 61),
(79, 'kal tak with Javed Chaudhry  â€“ 11th February 2019', '', '11549968281.jpg', 'https://www.youtube.com/embed/LpdC2KKxUOY', 1549968281, 2, 2, 'https://www.youtube.com/embed/LpdC2KKxUOY', 'news,politics,media,pakistan', 1, 1, 1, 29),
(80, '2 Tok â€“ 11th February 2019', '', '11549968281.jpg', 'https://www.youtube.com/embed/dy-KEALjWC8', 1549968281, 2, 2, 'https://www.youtube.com/embed/dy-KEALjWC8', 'news,politics,media,pakistan', 1, 1, 1, 81),
(81, 'Neo News Bulletin &#8211; 11th February 2019', '', '11549968281.jpg', 'https://www.youtube.com/embed/OzrJ2k3DeKw', 1549968281, 2, 2, 'https://www.youtube.com/embed/OzrJ2k3DeKw', 'news,politics,media,pakistan', 1, 1, 1, 23),
(82, 'Aaj Ayesha Ehtesham Ke Saath &#8211; 11th February 2019', '', '11549968281.jpg', 'https://www.youtube.com/embed/knjZqTsHGlE', 1549968281, 2, 2, 'https://www.youtube.com/embed/knjZqTsHGlE', 'news,politics,media,pakistan', 1, 1, 1, 79),
(83, 'The Debate â€“ 11th February 2019', '', '11549968282.jpg', 'http://www.dailymotion.com/embed/video/x728pn7', 1549968282, 2, 2, 'http://www.dailymotion.com/embed/video/x728pn7', 'news,politics,media,pakistan', 1, 1, 1, 76),
(84, 'News Plus â€“ 11th February 2019', '', '11549968282.jpg', 'http://www.dailymotion.com/embed/video/x728pk0', 1549968282, 2, 2, 'http://www.dailymotion.com/embed/video/x728pk0', 'news,politics,media,pakistan', 1, 1, 1, 99),
(85, 'Muqabil &#8211; 11th February 2019', '', '11549968282.jpg', 'http://www.dailymotion.com/embed/video/x728pcb', 1549968282, 2, 2, 'http://www.dailymotion.com/embed/video/x728pcb', 'news,politics,media,pakistan', 1, 1, 1, 97),
(86, 'Aamne Saamne â€“ 11th February 2019', '', '11549968282.jpg', 'http://www.dailymotion.com/embed/video/x728pca', 1549968282, 2, 2, 'http://www.dailymotion.com/embed/video/x728pca', 'news,politics,media,pakistan', 1, 1, 1, 48),
(87, 'NewsEye &#8211; 11th February 2019', '', '11549968283.jpg', 'http://www.dailymotion.com/embed/video/x728p3h', 1549968283, 2, 2, 'http://www.dailymotion.com/embed/video/x728p3h', 'news,politics,media,pakistan', 1, 1, 1, 64),
(88, 'Spot Light â€“ 11th February 2019', '', '11549968283.jpg', 'http://www.dailymotion.com/embed/video/x728ouj', 1549968283, 2, 2, 'http://www.dailymotion.com/embed/video/x728ouj', 'news,politics,media,pakistan', 1, 1, 1, 52),
(89, 'Ikhtilaf Rai â€“ 11th February 2019', '', '11549968283.jpg', 'https://www.youtube.com/embed/pbFuI_Ae65g', 1549968283, 2, 2, 'https://www.youtube.com/embed/pbFuI_Ae65g', 'news,politics,media,pakistan', 1, 1, 1, 96),
(90, 'Hisaab â€“ 11th February 2019 Repeat', '', '11549968284.jpg', 'http://www.dailymotion.com/embed/video/x6zso9x', 1549968284, 2, 2, 'http://www.dailymotion.com/embed/video/x6zso9x', 'news,politics,media,pakistan', 1, 1, 1, 82),
(91, 'test', 'test', '-Xn0ZmUZhnY.jpg', 'https://www.youtube.com/embed/-Xn0ZmUZhnY', 1550249362, 3, 4, 'https://www.youtube.com/embed/-Xn0ZmUZhnY', 'youthmedia', 7, 1, 0, 10),
(92, 'News', 'latest news', '', 'https://www.youtube.com/embed/XJ8F2wk7hV0', 1550828663, 3, 1, 'https://www.youtube.com/embed/XJ8F2wk7hV0', 'youthmedia', 4, 0, 0, 0),
(93, 'PM Imran Khan Addresses Ceremony &#8211; 22nd February 2019', '', '11550843603.jpg', 'http://www.dailymotion.com/embed/video/x72uhyd', 1550843603, 2, 2, 'http://www.dailymotion.com/embed/video/x72uhyd', 'news,politics,media,pakistan', 1, 1, 1, 79),
(94, 'DG ISPR Maj Gen Asif Ghafoor Press Conference &#8211; 22nd February 2019', '', '11550843603.jpg', 'http://www.dailymotion.com/embed/video/x72ug5s', 1550843603, 2, 2, 'http://www.dailymotion.com/embed/video/x72ug5s', 'news,politics,media,pakistan', 1, 1, 1, 55),
(95, 'Murad Saeed Blasting Speech in National Assembly &#8211; 22nd February 2019', '', '11550843604.jpg', 'https://www.youtube.com/embed/r8aLvrzQ2MI', 1550843604, 2, 2, 'https://www.youtube.com/embed/r8aLvrzQ2MI', 'news,politics,media,pakistan', 1, 1, 1, 42),
(96, 'Fehmida Mirza Angry Speech in National Assembly &#8211; 22nd February 2019', '', '11550843604.jpg', 'https://www.youtube.com/embed/g-PWoOYLjWg', 1550843604, 2, 2, 'https://www.youtube.com/embed/g-PWoOYLjWg', 'news,politics,media,pakistan', 1, 1, 1, 92),
(97, 'Neo Special &#8211; 21st February 2019', '', '11550843605.jpg', 'https://www.youtube.com/embed/D65YRhSlukY', 1550843605, 2, 2, 'https://www.youtube.com/embed/D65YRhSlukY', 'news,politics,media,pakistan', 1, 1, 1, 64),
(98, 'Gar Tu Bura Na Mane â€“ 21st February 2019', '', '11550843605.jpg', 'https://www.youtube.com/embed/sPqMWsCbMoI', 1550843605, 2, 2, 'https://www.youtube.com/embed/sPqMWsCbMoI', 'news,politics,media,pakistan', 1, 1, 1, 30),
(99, 'Syasi Theater â€“ 21st February 2019', '', '11550843606.jpg', 'https://www.youtube.com/embed/TRxyaMEnb9I', 1550843606, 2, 2, 'https://www.youtube.com/embed/TRxyaMEnb9I', 'news,politics,media,pakistan', 1, 1, 1, 86),
(100, 'News Point â€“ 21st February 2019', '', '11550843606.jpg', 'https://www.youtube.com/embed/TtkD-w2tCRw', 1550843606, 2, 2, 'https://www.youtube.com/embed/TtkD-w2tCRw', 'news,politics,media,pakistan', 1, 1, 1, 86),
(101, 'Power Play â€“ 21st February 2019', '', '11550843606.jpg', 'http://www.dailymotion.com/embed/video/x72svx3', 1550843606, 2, 2, 'http://www.dailymotion.com/embed/video/x72svx3', 'news,politics,media,pakistan', 1, 1, 1, 78),
(102, 'Har Lamha Purjosh â€“ 21st February 2019', '', '11550843607.jpg', 'http://www.dailymotion.com/embed/video/x72synp', 1550843607, 2, 2, 'http://www.dailymotion.com/embed/video/x72synp', 'news,politics,media,pakistan', 1, 1, 1, 84),
(103, 'Khabarzar  â€“ 21st February 2019', '', '11550843608.jpg', 'http://www.dailymotion.com/embed/video/x72sye0', 1550843608, 2, 2, 'http://www.dailymotion.com/embed/video/x72sye0', 'news,politics,media,pakistan', 1, 1, 1, 70),
(104, 'Tabdeeli Ameer Abbas Ke Sath â€“ 21st February 2019', '', '11550843608.jpg', 'https://www.youtube.com/embed/dec3Ja_mWeY', 1550843608, 2, 2, 'https://www.youtube.com/embed/dec3Ja_mWeY', 'news,politics,media,pakistan', 1, 1, 1, 70),
(105, 'The Last Hour &#8211; 21st February 2019', '', '11550843608.jpg', 'http://www.dailymotion.com/embed/video/x72sxyh', 1550843608, 2, 2, 'http://www.dailymotion.com/embed/video/x72sxyh', 'news,politics,media,pakistan', 1, 1, 1, 94),
(106, 'Kalam Aur Kalaam â€“ 21st February 2019', '', '11550843609.jpg', 'http://www.dailymotion.com/embed/video/x72sxxj', 1550843609, 2, 2, 'http://www.dailymotion.com/embed/video/x72sxxj', 'news,politics,media,pakistan', 1, 1, 1, 75),
(107, 'Aaj Ayesha Ehtesham Ke Saath &#8211; 21st February 2019', '', '11550843609.jpg', 'https://www.youtube.com/embed/DXIU_oSuGwE', 1550843609, 2, 2, 'https://www.youtube.com/embed/DXIU_oSuGwE', 'news,politics,media,pakistan', 1, 1, 1, 30),
(108, 'Zara Hut Kay &#8211; 21st February 2019', '', '11550843610.jpg', 'http://www.dailymotion.com/embed/video/x72sxwh', 1550843610, 2, 2, 'http://www.dailymotion.com/embed/video/x72sxwh', 'news,politics,media,pakistan', 1, 1, 1, 86),
(109, 'Joke Dar Joke â€“ 21st February 2019', '', '11550843610.jpg', 'http://www.dailymotion.com/embed/video/x72sxw1', 1550843610, 2, 2, 'http://www.dailymotion.com/embed/video/x72sxw1', 'news,politics,media,pakistan', 1, 1, 1, 76),
(110, 'DNA â€“ 21st February 2019', '', '11550843611.jpg', 'https://www.youtube.com/embed/T291dhPBmOE', 1550843611, 2, 2, 'https://www.youtube.com/embed/T291dhPBmOE', 'news,politics,media,pakistan', 1, 1, 1, 77),
(111, '2 Tok â€“ 21st February 2019', '', '11550843611.jpg', 'https://www.youtube.com/embed/NHbooOhmrGo', 1550843611, 2, 2, 'https://www.youtube.com/embed/NHbooOhmrGo', 'news,politics,media,pakistan', 1, 1, 1, 16),
(112, 'Cross Check With OT â€“ 21st February 2019', '', '11550843611.jpg', 'https://www.youtube.com/embed/x6h1uXMUuCA', 1550843611, 2, 2, 'https://www.youtube.com/embed/x6h1uXMUuCA', 'news,politics,media,pakistan', 1, 1, 1, 95),
(113, 'Kal Tak With Javed Chaudhary â€“ 21st February 2019', '', '11550843612.jpg', 'https://www.youtube.com/embed/rEhAC-mipV0', 1550843612, 2, 2, 'https://www.youtube.com/embed/rEhAC-mipV0', 'news,politics,media,pakistan', 1, 1, 1, 52),
(114, 'Koi Dekhe Na Dekhe Shabbir To Dekhe Ga â€“ 21st January 2019', '', '11550843612.jpg', 'https://www.youtube.com/embed/ckCVfSAAf4I', 1550843612, 2, 2, 'https://www.youtube.com/embed/ckCVfSAAf4I', 'news,politics,media,pakistan', 1, 1, 1, 23),
(115, 'Aap Janab  â€“ 21th February 2019', '', '11550843613.jpg', 'http://www.dailymotion.com/embed/video/x72sw40', 1550843613, 2, 2, 'http://www.dailymotion.com/embed/video/x72sw40', 'news,politics,media,pakistan', 1, 1, 1, 101),
(116, 'Aamne Saamne â€“ 21th February 2019', '', '11550843613.jpg', 'http://www.dailymotion.com/embed/video/x72svy6', 1550843613, 2, 2, 'http://www.dailymotion.com/embed/video/x72svy6', 'news,politics,media,pakistan', 1, 1, 1, 93),
(117, 'Live With Moeed Pirzada â€“ 21st February 2019', '', '11550843614.jpg', 'http://www.dailymotion.com/embed/video/x72svhs', 1550843614, 2, 2, 'http://www.dailymotion.com/embed/video/x72svhs', 'news,politics,media,pakistan', 1, 1, 1, 21),
(118, 'Insight Pakistan With Ammara â€“ 21st February 2019', '', '11550843614.jpg', 'http://www.dailymotion.com/embed/video/x72svhh', 1550843614, 2, 2, 'http://www.dailymotion.com/embed/video/x72svhh', 'news,politics,media,pakistan', 1, 1, 1, 26),
(119, 'News Plus â€“ 21st February 2019', '', '11550843615.jpg', 'http://www.dailymotion.com/embed/video/x72svgc', 1550843615, 2, 2, 'http://www.dailymotion.com/embed/video/x72svgc', 'news,politics,media,pakistan', 1, 1, 1, 41),
(120, 'Muqabil &#8211; 21st February 2019', '', '11550843615.jpg', 'http://www.dailymotion.com/embed/video/x72svc8', 1550843615, 2, 2, 'http://www.dailymotion.com/embed/video/x72svc8', 'news,politics,media,pakistan', 1, 1, 1, 94),
(121, 'NewsEye &#8211; 21st February 2019', '', '11550843616.jpg', 'http://www.dailymotion.com/embed/video/x72sv5m', 1550843616, 2, 2, 'http://www.dailymotion.com/embed/video/x72sv5m', 'news,politics,media,pakistan', 1, 1, 1, 38),
(122, 'Pulwama Ka Drama On Aaj News â€“ 21st February 2019', '', '11550843616.jpg', 'http://www.dailymotion.com/embed/video/x72sv39', 1550843616, 2, 2, 'http://www.dailymotion.com/embed/video/x72sv39', 'news,politics,media,pakistan', 1, 1, 1, 66),
(123, 'Ikhtilaf Rai â€“ 21st February 2019', '', '11550843617.jpg', 'https://www.youtube.com/embed/W5p9D9Mm428', 1550843617, 2, 2, 'https://www.youtube.com/embed/W5p9D9Mm428', 'news,politics,media,pakistan', 1, 1, 1, 68),
(124, 'Nadeem Malik Live â€“ 21th February 2019', '', '11550843617.jpg', 'https://www.youtube.com/embed/9d7R0ZU5Ubs', 1550843617, 2, 2, 'https://www.youtube.com/embed/9d7R0ZU5Ubs', 'news,politics,media,pakistan', 1, 1, 1, 104),
(125, 'Off The Record â€“ 21st February 2019', '', '11550843617.jpg', 'http://www.dailymotion.com/embed/video/x72srlk', 1550843617, 2, 2, 'http://www.dailymotion.com/embed/video/x72srlk', 'news,politics,media,pakistan', 1, 1, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(10) UNSIGNED NOT NULL,
  `name` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dashboard` tinyint(4) NOT NULL,
  `users` tinyint(4) NOT NULL,
  `pages` tinyint(4) NOT NULL,
  `websites` tinyint(4) NOT NULL,
  `categories` tinyint(4) NOT NULL,
  `posts` tinyint(4) NOT NULL,
  `pending` tinyint(4) NOT NULL,
  `subscription` tinyint(4) NOT NULL,
  `permissions` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `name`, `dashboard`, `users`, `pages`, `websites`, `categories`, `posts`, `pending`, `subscription`, `permissions`) VALUES
(1, 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'Editor', 1, 0, 1, 1, 1, 0, 0, 0, 0),
(4, 'Public Users', 0, 0, 0, 0, 0, 0, 0, 0, 1),
(5, 'admin', 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_settings`
--

CREATE TABLE `social_settings` (
  `socialId` int(10) UNSIGNED NOT NULL,
  `socialName` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `socialLink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `socialIcon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_settings`
--

INSERT INTO `social_settings` (`socialId`, `socialName`, `socialLink`, `socialIcon`) VALUES
(2, 'Pinterest', 'https://www.pinterest.com/youthscreen/', '14799849402.png'),
(6, 'Twitter', 'https://twitter.com/youthscreen', '15474686990.png'),
(8, 'Facebook', 'https://www.facebook.com/youthscreen786/', '15474682580.png'),
(9, 'Youtube', 'https://www.youtube.com/channel/UClHGCxE6NkF98U4IYR2Er8g', '15494446380.png');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscriptionId` int(10) UNSIGNED NOT NULL,
  `subscriptionUserId` int(11) NOT NULL,
  `subscriptionEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscriptionId`, `subscriptionUserId`, `subscriptionEmail`) VALUES
(8, 6, 'rashid.bukhari143@gmail.com'),
(12, 6, 'rashid.bukhari78600@gmail.com'),
(13, 4, 'rashid.bukhari490@gmail.com'),
(14, 4, 'muhammadsadiq037@gmail.com'),
(15, 4, 'rashid.bukhari444@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileImg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userRole` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profileImg`, `userRole`, `remember_token`, `userPhone`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'youthscreen786@gmail.com', '$2y$10$WOZiXJOlsOP9EaPkLXR9Oe3zs4jMPOQttYnsvQ9BsDSQRE8JMSuW2', '1550303402.png', 1, 'LEr6sNR7BRp3TvUbsL0x0EIxUzxp4mkEcSuIKssTgvXPYNvYPtb80C3wslpa', 'youthscreen786@gmail.com', '2019-01-10 04:46:02', '2019-01-10 04:46:02'),
(7, 'Umair Malik', 'umairm638@gmail.com', '$2y$10$J2EApynC8dd2UgQE/J596.q1DdGUiBz85/4htIHToEoAcXMjwBxRG', '1550249702.jpg', 4, NULL, '3236207389', '2019-02-11 16:04:52', '2019-02-11 16:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `websiteId` int(10) UNSIGNED NOT NULL,
  `websiteName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `websiteUrl` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`websiteId`, `websiteName`, `websiteUrl`) VALUES
(1, 'PeopleAreAwesome', 'https://www.peopleareawesome.com/'),
(2, 'ZemTV', 'http://www.zemtv.com/category/pakistani/'),
(3, 'Youth Media', 'http://localhost/youthmedia/public/');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_access_tokens`
--

CREATE TABLE `youtube_access_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `youtube_access_tokens`
--

INSERT INTO `youtube_access_tokens` (`id`, `access_token`, `created_at`) VALUES
(1, '{\"access_token\":\"ya29.GluuBtz2eXiU_eEyaLARPsxtdKZYrJ5kOeYao8rtYmQrVE4YcQzr2osMFMJ88OxfzEtQpGpOSqTa7xnkWyEUrFzL5IuMlF4axEadL_r5FRYznhd41MskHgHTl0pR\",\"expires_in\":3600,\"refresh_token\":\"1\\/I0nOz7EDjLe52QwrlN38LFEXtX2A7ejeq4qClgK-EDF7vzD99vll3rxCGJdqEs69\",\"scope\":\"https:\\/\\/www.googleapis.com\\/auth\\/youtube https:\\/\\/www.googleapis.com\\/auth\\/youtube.readonly https:\\/\\/www.googleapis.com\\/auth\\/youtube.upload\",\"token_type\":\"Bearer\",\"created\":1550080544}', '2019-02-14 00:55:44'),
(2, '{\"access_token\":\"ya29.GlyxBgL-CGrJ8FG4rGfJb8TSbq2AyH01dMX7TrRxPS9YDDqoEc2bhLTVyihJpvr_aRBPRz3BolP9CeaonSXYfMp34ewV01bf4W26wS_vprNyp4UyyfpItr8eivtuAQ\",\"expires_in\":3600,\"refresh_token\":\"1\\/I0nOz7EDjLe52QwrlN38LFEXtX2A7ejeq4qClgK-EDF7vzD99vll3rxCGJdqEs69\",\"scope\":\"https:\\/\\/www.googleapis.com\\/auth\\/youtube https:\\/\\/www.googleapis.com\\/auth\\/youtube.readonly https:\\/\\/www.googleapis.com\\/auth\\/youtube.upload\",\"token_type\":\"Bearer\",\"created\":1550249364}', '2019-02-15 23:49:24'),
(3, '{\"access_token\":\"ya29.GlyyBs1of9G4BK7A20N5KHekZYKi13SwxILf0NPrSv6zRrm3LaYRWZDWhJPAEnru4iZXtNDDMsUDef419tToINdxQI7DB8TX9dlFgdVz7xv9wWWUwU8Ch2oJ_vlHnw\",\"expires_in\":3600,\"refresh_token\":\"1\\/I0nOz7EDjLe52QwrlN38LFEXtX2A7ejeq4qClgK-EDF7vzD99vll3rxCGJdqEs69\",\"scope\":\"https:\\/\\/www.googleapis.com\\/auth\\/youtube https:\\/\\/www.googleapis.com\\/auth\\/youtube.readonly https:\\/\\/www.googleapis.com\\/auth\\/youtube.upload\",\"token_type\":\"Bearer\",\"created\":1550303639}', '2019-02-16 14:53:59'),
(4, '{\"access_token\":\"ya29.GlyyBo3Yun2nf5PKY05M7CMSWcixicO3fC2ThUS4gPcDUzcipq2LnyIqptd5tb9cDawn-_p1bPAXXC9P2JNh3vE-UYL_5P8dBSVNFbd7TNK0Sqh4ZNu35IuVrcM5NQ\",\"expires_in\":3600,\"refresh_token\":\"1\\/I0nOz7EDjLe52QwrlN38LFEXtX2A7ejeq4qClgK-EDF7vzD99vll3rxCGJdqEs69\",\"scope\":\"https:\\/\\/www.googleapis.com\\/auth\\/youtube https:\\/\\/www.googleapis.com\\/auth\\/youtube.readonly https:\\/\\/www.googleapis.com\\/auth\\/youtube.upload\",\"token_type\":\"Bearer\",\"created\":1550313040}', '2019-02-16 17:30:40'),
(5, '{\"access_token\":\"ya29.GlyyBpyyZI9ZgpuEZ1q9JWgZsMO7RU5zscTMWFdrE97Fq3ht5cx98BzxUd8dP-Q_EMAcxt-GCqpY69oPI6-dL-ZI7JowN0mOkEHjznepAlvlX_rDcZEb3RQm8TlVFg\",\"expires_in\":3600,\"refresh_token\":\"1\\/I0nOz7EDjLe52QwrlN38LFEXtX2A7ejeq4qClgK-EDF7vzD99vll3rxCGJdqEs69\",\"scope\":\"https:\\/\\/www.googleapis.com\\/auth\\/youtube https:\\/\\/www.googleapis.com\\/auth\\/youtube.readonly https:\\/\\/www.googleapis.com\\/auth\\/youtube.upload\",\"token_type\":\"Bearer\",\"created\":1550330976}', '2019-02-16 22:29:36'),
(6, '{\"access_token\":\"ya29.Gly4BlKEaQlC09zn2RMSErX29-dXlO_vvshQhswmyl2aguJyPKMmQG39SV_733OB_5mIFdHAhJGkVLs_qApKezrQ-1xXFHBmzIJ1HtbND2BNVL_LNdp3FAsVpN-EFg\",\"expires_in\":3600,\"refresh_token\":\"1\\/I0nOz7EDjLe52QwrlN38LFEXtX2A7ejeq4qClgK-EDF7vzD99vll3rxCGJdqEs69\",\"scope\":\"https:\\/\\/www.googleapis.com\\/auth\\/youtube https:\\/\\/www.googleapis.com\\/auth\\/youtube.readonly https:\\/\\/www.googleapis.com\\/auth\\/youtube.upload\",\"token_type\":\"Bearer\",\"created\":1550828682}', '2019-02-22 16:44:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `when user updated, same effect apply here` (`userId`),
  ADD KEY `when post updated, same effect apply here` (`postId`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`generalId`);

--
-- Indexes for table `likes_shares`
--
ALTER TABLE `likes_shares`
  ADD KEY `userId` (`userId`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`navId`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `posts_ibfk_2` (`websiteId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `social_settings`
--
ALTER TABLE `social_settings`
  ADD PRIMARY KEY (`socialId`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscriptionId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`websiteId`);

--
-- Indexes for table `youtube_access_tokens`
--
ALTER TABLE `youtube_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `generalId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `navId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_settings`
--
ALTER TABLE `social_settings`
  MODIFY `socialId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscriptionId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `websiteId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `youtube_access_tokens`
--
ALTER TABLE `youtube_access_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `when post updated, same effect apply here` FOREIGN KEY (`postId`) REFERENCES `posts` (`postId`),
  ADD CONSTRAINT `when user updated, same effect apply here` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
