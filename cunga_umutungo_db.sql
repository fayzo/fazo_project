-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2015 at 04:15 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cunga_umutungo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonagurije`
--

CREATE TABLE IF NOT EXISTS `abonagurije` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `uwonagurije` varchar(50) NOT NULL,
  `namugurije` decimal(50,2) NOT NULL DEFAULT '0.00',
  `namugurije_tariki` date NOT NULL,
  `hishyuwe` decimal(50,2) NOT NULL DEFAULT '0.00',
  `asigaye` decimal(50,2) NOT NULL,
  `ntakurenza` date NOT NULL,
  `employee_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `abonagurije`
--


-- --------------------------------------------------------

--
-- Table structure for table `akazi_kaburimunsi`
--

CREATE TABLE IF NOT EXISTS `akazi_kaburimunsi` (
  `akazi_id` int(30) NOT NULL AUTO_INCREMENT,
  `tariki_yakazi` date NOT NULL,
  `umunsiwakazi` varchar(255) DEFAULT NULL,
  `kanditswe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `employee_id` int(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`akazi_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `akazi_kaburimunsi`
--


-- --------------------------------------------------------

--
-- Table structure for table `akazi_kose`
--

CREATE TABLE IF NOT EXISTS `akazi_kose` (
  `akazi_kose_id` int(30) NOT NULL AUTO_INCREMENT,
  `akazi_id` int(30) NOT NULL DEFAULT '0',
  `izinaryakazi` varchar(100) NOT NULL,
  `karatangira` time NOT NULL,
  `kararangira` time NOT NULL,
  `ahokageze` varchar(15) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `kanditswe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`akazi_kose_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `akazi_kose`
--


-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_name` varchar(255) NOT NULL DEFAULT '',
  `tag_line` varchar(255) NOT NULL DEFAULT '',
  `work_number` varchar(255) NOT NULL DEFAULT '',
  `fax_number` varchar(255) NOT NULL DEFAULT '',
  `email_address` varchar(255) NOT NULL DEFAULT '',
  `markup_percent` int(11) NOT NULL DEFAULT '0',
  `currency_symbol` varchar(255) NOT NULL DEFAULT '',
  `business_number` varchar(255) NOT NULL DEFAULT '',
  `tax1_name` varchar(255) NOT NULL DEFAULT '',
  `tax1_percent` int(11) NOT NULL DEFAULT '0',
  `session_timeout` int(11) NOT NULL,
  `off1_address` varchar(255) NOT NULL DEFAULT '',
  `off1_city` varchar(255) NOT NULL DEFAULT '',
  `off1_tel` varchar(255) NOT NULL DEFAULT '',
  `off1_postal` varchar(255) NOT NULL DEFAULT '',
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_name`, `tag_line`, `work_number`, `fax_number`, `email_address`, `markup_percent`, `currency_symbol`, `business_number`, `tax1_name`, `tax1_percent`, `session_timeout`, `off1_address`, `off1_city`, `off1_tel`, `off1_postal`, `updated`) VALUES
('HOUSE OF TECHNOLOGY LTD', '', '(250) 788-802332', '265', 'info@code.rw', 10, 'Rwf', '11', 'VAT', 18, 6000, 'Kigali - Rwanda', 'KIGALI', '', '3769 Kigali - Rwanda', '2015-01-08 22:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(30) NOT NULL AUTO_INCREMENT,
  `amazinayose` varchar(50) NOT NULL DEFAULT '',
  `telefone` varchar(50) DEFAULT NULL,
  `email_yawe` varchar(50) NOT NULL DEFAULT '',
  `ijambo_ryibanga` varchar(50) NOT NULL DEFAULT '',
  `uburenganzira_bwawe` int(11) NOT NULL DEFAULT '1',
  `uremewe` int(11) NOT NULL DEFAULT '1',
  `records_per_page` int(11) NOT NULL DEFAULT '30',
  `yanditswe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `email_yawe` (`email_yawe`),
  UNIQUE KEY `email_yawe_2` (`email_yawe`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `amazinayose`, `telefone`, `email_yawe`, `ijambo_ryibanga`, `uburenganzira_bwawe`, `uremewe`, `records_per_page`, `yanditswe`) VALUES
(6, 'Code.rw', '(250) 728-802332', 'support@code.rw', '446aa4800ac33c0a957ac5e79d23dc84', 1, 1, 40, '2012-03-19 11:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(50) NOT NULL DEFAULT '0',
  `reason` varchar(100) NOT NULL,
  `amount` decimal(50,2) NOT NULL DEFAULT '0.00',
  `date_received` date NOT NULL DEFAULT '0000-00-00',
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`expense_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `expenses`
--


-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE IF NOT EXISTS `expense_categories` (
  `category_id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `employee_id` int(30) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `expense_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `ibikorwa_bitandukanye`
--

CREATE TABLE IF NOT EXISTS `ibikorwa_bitandukanye` (
  `act_id` int(15) NOT NULL AUTO_INCREMENT,
  `izina_rygikorwa` varchar(100) NOT NULL,
  `uwogikorewe` varchar(50) NOT NULL,
  `itariki_cyatangiye` date NOT NULL,
  `ahokigeze` varchar(15) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`act_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `ibikorwa_bitandukanye`
--


-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE IF NOT EXISTS `incomes` (
  `income_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(50) NOT NULL DEFAULT '0',
  `reason` varchar(100) NOT NULL,
  `amount` decimal(50,2) NOT NULL DEFAULT '0.00',
  `date_received` date NOT NULL DEFAULT '0000-00-00',
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`income_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `incomes`
--


-- --------------------------------------------------------

--
-- Table structure for table `incomes_categories`
--

CREATE TABLE IF NOT EXISTS `incomes_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `employee_id` int(30) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `incomes_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `inguzanyo`
--

CREATE TABLE IF NOT EXISTS `inguzanyo` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `uwangurije` varchar(50) NOT NULL,
  `yangurije` int(30) NOT NULL,
  `yangurije_tariki` date NOT NULL,
  `hishyuwe` decimal(50,2) NOT NULL DEFAULT '0.00',
  `asigaye` decimal(50,2) NOT NULL,
  `ntakurenza` date NOT NULL,
  `employee_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `inguzanyo`
--


-- --------------------------------------------------------

--
-- Table structure for table `kubikuza_amafaranga`
--

CREATE TABLE IF NOT EXISTS `kubikuza_amafaranga` (
  `out_id` int(30) NOT NULL AUTO_INCREMENT,
  `item_id` int(30) NOT NULL,
  `nabikuje` decimal(50,2) NOT NULL DEFAULT '0.00',
  `agiyegukoreshwa` varchar(100) NOT NULL,
  `tariki_abikujwe` date NOT NULL,
  `employee_id` int(30) NOT NULL,
  PRIMARY KEY (`out_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `kubikuza_amafaranga`
--


-- --------------------------------------------------------

--
-- Table structure for table `kuzigama_amafaranga`
--

CREATE TABLE IF NOT EXISTS `kuzigama_amafaranga` (
  `in_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(30) NOT NULL,
  `nazigamye` decimal(50,2) NOT NULL DEFAULT '0.00',
  `ahoyeraturutse` varchar(100) NOT NULL,
  `itariki_nyazigamye` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`in_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `kuzigama_amafaranga`
--


-- --------------------------------------------------------

--
-- Table structure for table `kwishyura_ideni`
--

CREATE TABLE IF NOT EXISTS `kwishyura_ideni` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `ide_id` int(30) NOT NULL,
  `hishyuwe` decimal(50,2) NOT NULL DEFAULT '0.00',
  `itariki_yishyuwe` date NOT NULL,
  `employee_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `kwishyura_ideni`
--


-- --------------------------------------------------------

--
-- Table structure for table `kwishyura_inguzanyo`
--

CREATE TABLE IF NOT EXISTS `kwishyura_inguzanyo` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `ing_id` int(30) NOT NULL,
  `hishyuwe` decimal(50,2) NOT NULL DEFAULT '0.00',
  `itariki_yishyuwe` date NOT NULL,
  `employee_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `kwishyura_inguzanyo`
--


-- --------------------------------------------------------

--
-- Table structure for table `kwizigamira`
--

CREATE TABLE IF NOT EXISTS `kwizigamira` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `izina_bank` varchar(50) NOT NULL,
  `nimero_konti` varchar(50) NOT NULL,
  `amafaranga_ariho` int(30) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `kwizigamira`
--


-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE IF NOT EXISTS `purchase_details` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `products` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `cost` decimal(50,2) NOT NULL DEFAULT '0.00',
  `act_id` int(11) NOT NULL DEFAULT '0',
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `purchase_details`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
