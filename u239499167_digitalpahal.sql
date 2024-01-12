-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 12, 2024 at 05:51 PM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u239499167_digitalpahal`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant_details`
--

CREATE TABLE `accountant_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `accountant_id` int(11) NOT NULL,
  `alternate_number` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `gst_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `adhaar_card` varchar(255) DEFAULT NULL,
  `pan_card` varchar(255) DEFAULT NULL,
  `support_email_id` varchar(255) DEFAULT NULL,
  `support_phone` varchar(255) DEFAULT NULL,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `type` text NOT NULL DEFAULT '1' COMMENT '1=>DMS Documents, 2=>GST Documents',
  `plan_id` int(11) DEFAULT NULL,
  `plan_expiry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `is_gst` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accountant_details`
--

INSERT INTO `accountant_details` (`id`, `accountant_id`, `alternate_number`, `company_name`, `gst_number`, `address`, `adhaar_card`, `pan_card`, `support_email_id`, `support_phone`, `discount`, `type`, `plan_id`, `plan_expiry_date`, `created_at`, `updated_at`, `logo`, `is_gst`) VALUES
(13, 30, NULL, 'Asodariya Consultancy', NULL, 'G/12,Rajhans Shopping Center,Varachha Road,Surat-395006', '6493d5c7b9075.pdf', '6493d5c7b9382.jpg', 'Asodariyaconsultancy@gmail.com', '8238486185', 0.00, '1', 3, '2024-06-22', '2023-06-22 10:31:59', '2023-06-22 10:31:59', '6493d5c7b7a9c.png', 0),
(14, 44, '9727909337', 'S G KALENA & ASSOCIATES', NULL, 'G-10, RAJHANS SHOPPING, NEAR BARODA PRESTAGE, VARACHHA ROAD, SURAT-395006.', '649985913daa4.jpg', '649985913db76.jpg', 'ksgoffice01@gmail.com', '8000092480', 0.00, '1', 6, '2023-09-26', '2023-06-26 18:03:21', '2023-06-26 18:03:21', '649985913c731.jpg', 0),
(15, 54, '7600767070', 'MENDPARA SANGANI & CO.', NULL, 'B-206, DIAMOND WORLD, MANGADH CHOWK, MINI BAZAR, SURAT', '649c2bb89c713.jpg', '649c2bb89df07.jpg', 'mendparasangani@gmail.com', '7600768080', 0.00, '2,1', 6, '2023-09-28', '2023-06-28 18:16:48', '2023-06-28 18:18:21', NULL, 0),
(16, 73, NULL, 'NISHA KANUBHAI KATHROTIYA', NULL, 'surat', '64b4e8c945623.jpg', '64b4e8c947274.jpg', 'nishakpatel115@gmail.com', '9727909337', 0.00, '2,1', 6, '2023-10-17', '2023-07-17 12:37:53', '2023-07-17 12:37:53', NULL, 0),
(17, 76, NULL, 'N B Baraiya & Co.', NULL, 'Suat', '64c65cc52e808.jpg', '64c65cc52ec7e.jpg', 'naimishbaraiya4@gmail.com', '8690874754', 0.00, '2,1', 6, '2023-10-30', '2023-07-30 18:21:17', '2023-07-30 18:21:17', '64c65cc52c73e.jpg', 0),
(18, 78, NULL, 'AAVIS TAX CONSULTANCY', NULL, 'OFFICE NO-B/604, RJD BUSINESS HUB, NEAR BADA GANESH TEMPLE, KATARGAM, SURAT.', '64e8dc8e43dfe.pdf', '64e8dc8e44547.pdf', 'aavishtaxconsultancy@gmail.com', '9376808001', 0.00, '2,1', 6, '2023-11-25', '2023-08-25 22:23:34', '2023-08-25 22:23:34', '64e8dc8e415b7.png', 0),
(19, 91, '9979440183', 'BALAR AND CO', NULL, '215, SKYLARK SHOPPING, NEAR JADAFIYA CIRCLE, SPINNING MILL, SURAT', '65890af3e514a.jpg', '65890af3e7511.jpg', 'BALARANDCO@GMAIL.COM', '9979440183', 0.00, '2,1', 6, '2024-03-25', '2023-12-25 10:24:11', '2023-12-25 10:24:11', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Bank of Baroda', 1, NULL, NULL),
(4, 'Bank of India', 1, NULL, NULL),
(5, 'Canara Bank', 1, NULL, NULL),
(6, 'Central Bank of India', 1, NULL, NULL),
(7, 'Central Indian Bank', 1, NULL, NULL),
(8, 'Punjab National Bank', 1, NULL, NULL),
(9, 'State Bank of India', 1, NULL, NULL),
(10, 'UCO Bank', 1, NULL, NULL),
(11, 'Union Bank of India', 1, NULL, NULL),
(12, 'Axis Bank Ltd.', 1, NULL, NULL),
(13, 'Bandhan Bank Ltd.', 1, NULL, NULL),
(14, 'City Union Bank Ltd.', 1, NULL, NULL),
(15, 'DCB Bank Ltd.', 1, NULL, NULL),
(16, 'Federal Bank Ltd.', 1, NULL, NULL),
(17, 'HDFC Bank Ltd.', 1, NULL, NULL),
(18, 'ICICI Bank Ltd.', 1, NULL, NULL),
(19, 'Induslnd Bank Ltd.', 1, NULL, NULL),
(20, 'IDFC First Bank Ltd.', 1, NULL, NULL),
(21, 'RBL Bank Ltd.', 1, NULL, NULL),
(22, 'Kotak Mahindra Bank Ltd.', 1, NULL, NULL),
(23, 'YES Bank Ltd.', 1, NULL, NULL),
(24, 'IDBI Bank Ltd.', 1, NULL, NULL),
(25, 'Au Small Finance Bank Limited', 1, NULL, NULL),
(26, 'Equitas Small Finance Bank Limited', 1, NULL, NULL),
(27, 'India Post Payments Bank Limited', 1, NULL, NULL),
(28, 'Other Bank', 1, NULL, NULL),
(29, 'Other Bank', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `gst_number` varchar(255) DEFAULT NULL,
  `pancard_number` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT '1=>DMS Documents, 2=>GST Documents',
  `gst_type` tinyint(2) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`id`, `client_id`, `company_name`, `address`, `gst_number`, `pancard_number`, `type`, `gst_type`, `created_at`, `updated_at`) VALUES
(10, 29, 'Fitwell', 'Amraiwadi', NULL, '787894545651', '1', NULL, '2023-06-21 12:28:59', '2023-06-21 12:28:59'),
(11, 31, 'Asodariya Consultancy', 'G/12,Rajhans Shopping Center,Varachha Road,Surat-395006', NULL, 'CRIPA0532Q', '1,2', 1, '2023-06-22 10:59:04', '2023-11-03 15:57:05'),
(13, 33, 'Florastic', 'surat', '24HPAPS6863B2ZR', 'HPAPS6863B', '2,1', 2, '2023-06-22 12:18:16', '2023-07-05 16:13:59'),
(14, 34, 'Asodariya Nilesh', 'Surt', NULL, '.', '1', NULL, '2023-06-22 12:35:35', '2023-06-22 13:56:58'),
(15, 35, 'Shilpaben Nileshbhai Asodariya', 'Surat', NULL, 'CPMPA2696P', '1', NULL, '2023-06-22 19:14:31', '2023-06-22 19:17:45'),
(16, 36, 'Gurukrupa Creation', 'surat', NULL, 'AFMPV7060E', '1', NULL, '2023-06-22 21:14:46', '2023-06-22 21:14:46'),
(18, 38, 'Shivshakti Enterprise', 'Surat', '24ARPPC2492L1ZI', 'ARPPC2492L', '1', NULL, '2023-06-24 12:36:30', '2023-06-24 12:36:30'),
(19, 39, 'Bhavdip Ramani', 'Surat', NULL, 'CKQPR2556A', '1', NULL, '2023-06-24 15:46:25', '2023-06-24 15:46:25'),
(20, 40, 'Sudhir Kotadiya', 'Surat', NULL, 'DAZPK0041K', '1', NULL, '2023-06-24 15:59:42', '2023-06-24 15:59:42'),
(21, 41, 'Ghanshyambhai Asodariya', 'Rajkot', NULL, 'AFKPA5128E', '1,2', 1, '2023-06-24 16:10:01', '2023-12-19 11:31:40'),
(22, 42, 'Jigneshbhai Bharatbhai Nakrani', 'Surat', '24AQIPN0587B1Z1', 'AQIPN0587B', '2,1', 2, '2023-06-24 16:37:19', '2023-07-03 10:34:53'),
(23, 43, 'Nikhil Chandreshbhai Virani', 'Surat', '24APHPV5977R1ZN', 'APHPV5977R', '1', NULL, '2023-06-24 16:43:50', '2023-06-24 16:43:50'),
(24, 49, 'JAY GANESH CREATION', 'GF, 144, Chamunda Nagar Society, GFL, Surat, Gujarat, 395006', '24BVCPK6341L1ZI', 'BVCPK6341L', '2,1', 1, '2023-06-26 18:18:22', '2023-07-07 17:14:53'),
(25, 50, 'BHAGVATI CREATION', 'N-3, NARAYAN NAGAR, PARVAT PATIYA, SURAT, Surat, Gujarat, 395010', '24ALKPD4394B1ZE', 'ALKPD4394B', '2,1', 1, '2023-06-26 18:19:42', '2023-06-26 18:19:42'),
(26, 51, 'Vikash Patel', 'Surat', NULL, 'CUQPP9630P', '1', 1, '2023-06-27 11:42:45', '2023-06-30 13:25:56'),
(27, 52, 'D S FASHION', 'PLOT NO.10, JAY SANTOSHI NAGAR SOCIETY, L.H.ROAD, SURAT, Gujarat, 395006', '24ANGPD0020Q1ZC', 'ANGPD0020Q', '2,1', 1, '2023-06-27 12:03:34', '2023-06-27 12:03:34'),
(28, 53, 'Pinnacle Enterprise', 'Surat', '24AIOPB1596J1Z3', 'AIOPB1596J', '2,1', 1, '2023-06-27 14:24:36', '2023-06-27 14:24:36'),
(29, 55, 'Om Consultancy', '455,Raj imperia,vraj Chowk,jakatnaka,surat', NULL, 'BNOPV1327D', '1', 1, '2023-06-30 10:43:09', '2023-06-30 10:43:09'),
(30, 56, 'Milan Ribdiya', 'Surat', NULL, 'CFBPR4483L', '1', 1, '2023-06-30 18:52:04', '2023-06-30 18:52:04'),
(31, 57, 'Anjali Ribdiya', '103, Amar Residency', NULL, 'BUDPG9637F', '1', 1, '2023-07-02 11:00:40', '2023-07-02 11:00:40'),
(32, 58, 'Nakalang Industris', 'surat', NULL, 'EDBPS6225R', '2,1', 2, '2023-07-03 17:57:45', '2023-07-03 17:57:45'),
(33, 59, 'Trustegic', 'surat', '24BJZPB1270L1ZY', 'BJZPB1270L', '2,1', 2, '2023-07-05 16:16:31', '2023-07-05 16:16:31'),
(34, 60, 'GOTI CHIRAG VASHRAMBHAI', '35, MAHAVIR NAGAR SOCIETY, RAJ GARDEN, NANA VARACHHA, SURAT.', NULL, 'BICPG4982L', '1', 1, '2023-07-07 15:01:02', '2023-07-07 15:01:02'),
(35, 61, 'Gaurav kathrotiya', '144 chaumudinar.', NULL, 'HZOPK4981A', '1', 1, '2023-07-07 17:23:09', '2023-07-07 17:23:09'),
(36, 62, 'Maa-fashion', 'D-73, MATRU SHAKTI SOCIETY, PUNAGAM, SURAT.', '24ACHPZ7834Q1ZK', 'ACHPZ7834Q', '2,1', 1, '2023-07-08 17:47:00', '2023-07-08 17:47:00'),
(37, 63, 'DENISHBHAI RANCHHODBHAI VIRADIYA', '299, RACHANA SOCEITY, PUNAGAM, SURAT', NULL, 'BKOPV6408A', '1', 1, '2023-07-08 17:53:03', '2023-07-08 18:15:15'),
(43, 70, 'BHAGVATI CREATION', '1,2,3 NARAYAN NAGAR,PRAVT PATIYA,SURAT.', NULL, 'AQAPD4964B', '1', 1, '2023-07-10 15:26:35', '2023-07-10 15:26:35'),
(44, 71, '..', '..', NULL, 'AUDPD3850A', '1', 1, '2023-07-10 15:32:03', '2023-07-10 15:32:03'),
(45, 72, '..', '..', NULL, 'HKQPD4351E', '1', 1, '2023-07-10 15:41:24', '2023-07-10 15:41:24'),
(46, 74, 'JAYESHBHAI L PATEL', '92-67, GUNDI VAS, MANDAL, AHMEDABAD, GUJARAT, INDIA, 382130', NULL, 'CYXPP6415P', '1', 1, '2023-07-17 18:18:53', '2023-07-17 18:30:57'),
(47, 75, 'USHABEN JAYESHBHAI PATEL', 'AHEMDABAD GUJARAT', NULL, 'EKPPP3718F', '1', 1, '2023-07-17 20:06:42', '2023-07-17 20:06:42'),
(48, 77, 'Om the Brand', 'Surat', '24FDOPP9877C1ZU', 'FDOPP9877C', '2,1', 2, '2023-07-30 18:24:48', '2023-07-30 18:24:48'),
(49, 79, 'AAVISH TAX CONSULTANCY', 'OFFICE NO-B/604, RJD BUSINESS HUB, NEAR BADA GANESH TEMPLE, KATARGAM, SURAT.', NULL, 'CKXPR7835M', '2,1', 1, '2023-08-25 22:28:21', '2023-08-25 22:35:52'),
(51, 81, 'Shiv Enterprise', 'surat', '24KKRPK3355M1ZE', 'KKRPK3355M', '2,1', 1, '2023-09-10 12:51:44', '2023-09-10 12:51:44'),
(55, 85, 'Sadguru Enterprise', 'surat', NULL, 'AUAPB2335H', '2,1', 2, '2023-10-11 16:42:46', '2023-10-11 16:42:46'),
(57, 87, 'Trishul Infra', 'G/12,Rajhans Shopping Center,Varachha Road,Surat-395006', '24AATFT1631P1ZM', 'AATFT1631P', '2,1', 1, '2023-11-27 16:37:03', '2023-11-27 16:37:03'),
(58, 88, 'Sadguru Enterprise', 'Surat', '24BGUPB5421K1ZB', 'BGUPB5421K', '2,1', 1, '2023-12-13 11:13:51', '2023-12-13 11:13:51'),
(59, 89, 'MK Enterprise', 'Surat', '24KCOPK0326M1Z9', 'KCOPK0326M', '2,1', 2, '2023-12-13 14:36:17', '2023-12-13 14:36:17'),
(60, 90, 'C R INFRA', 'Surat', NULL, 'MSNPS7152L', '1', 1, '2023-12-17 23:17:50', '2023-12-17 23:17:50'),
(62, 93, 'TAPASVI CREATION', 'SURAT', '24AMSPB2888H1ZR', 'AMSPB2888H', '2,1', 2, '2023-12-28 16:15:56', '2023-12-28 16:15:56'),
(63, 94, 'Nitesh Mansukhbhai Mangaroliya', 'surat', NULL, 'ERHPM3669F', '1', 1, '2024-01-02 16:38:21', '2024-01-02 16:38:21'),
(64, 95, 'Ronest', 'SURAT', '24DSSPR5009F1ZH', 'DSSPR5009F', '2,1', 2, '2024-01-06 12:42:14', '2024-01-06 12:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'adDA', 'appybhanderi825@gmail.com', 'AdAD', 'ADad', 0, '2023-06-07 06:46:46', '2023-06-07 06:46:46'),
(2, 'Clinttof', 'yasen.krasen.13+91528@mail.ru', '89849761553', 'Nguheidjiwfefhei ijiwdwjurFEJDKWIJFEIF аоушвцшургаруш ШОРГПГОШРГРПГОГРГ iryuieoieifegjejj bvncehfedjiehfu digitalpahal.com', 0, '2023-10-22 01:25:37', '2023-10-22 01:25:37'),
(3, 'Donaldhep', 'matt.195@gmail.com', '81277262394', 'The Ultimate Blueprint for Earning $30,000 per Month in Email Marketing http://emailmarketing-36234217.magnetorepairs.com/offer?52224', 0, '2023-10-30 11:56:02', '2023-10-30 11:56:02'),
(4, 'KevinlaUrb', 'allenjohn316@gmail.com', '87975486292', 'URGENTLY! Your income was $45,480.32. Urgently withdraw your earned money http://withdrawxpress-1157748.musicbats.com/on?464', 0, '2023-11-06 20:28:26', '2023-11-06 20:28:26'),
(5, 'ODKqzCdvmMceYpT', 'yrXqAb.wcbqb@balneary.biz', '1', 'TBftnfKBJqzYXTCSDhoaH', 0, '2023-11-09 07:59:51', '2023-11-09 07:59:51'),
(6, 'Eddiepaymn', 'KEVINGATE7@GMAIL.COM', '85459536712', 'Your opinion is important to us, so we are ready to pay up to $5000 - http://take-survey-16.049155c.com/id-35', 0, '2023-11-19 18:04:06', '2023-11-19 18:04:06'),
(7, 'Stanleyber', 'steve.bredfeldt@gmail.com', '88837632741', 'Invest Wisely, Earn Daily: Exploring Earnings from $9000 per Day https://marketplacebest888.sell.app/product/what-experts-are-silent-about-or-top-17-cryptocurrencies-that-will-soon-fly-to-the-moon?4776641', 0, '2023-11-23 13:32:22', '2023-11-23 13:32:22'),
(8, 'uyYJVKTHyD', 'YshylT.hdqwwtq@usufruct.bar', '1', 'tyNfIJUtljviBFjsfrmDNQWVm', 0, '2023-11-23 16:09:35', '2023-11-23 16:09:35'),
(9, 'XLfQXeTphTMt', 'cJudLc.hbhjpjb@scranch.shop', '1', 'SCcLkTrebOqThaHCUUamMJXpyT', 0, '2023-11-29 05:32:21', '2023-11-29 05:32:21'),
(10, 'Jesnab', 'Jessicavyrxes@hotmail.com', '81243681173', 'Dive deep into my world by checking my dating profile.  - https://is.gd/C2nNqe?opereism1', 0, '2023-12-04 23:40:44', '2023-12-04 23:40:44'),
(11, 'Earn profits exceeding $1,000 before upcoming the upcoming Year.  Click to view >> https://ok.me/Dn3E1', 'jeroen2603@gmail.com', '88474876954', 'Reach a goal of $1,000 before upcoming the upcoming Year.  Click to navigate > https://ok.me/rp3E1', 0, '2023-12-06 19:33:26', '2023-12-06 19:33:26'),
(12, 'Im Vivian  Tap to open see my sexy photo >> https://ok.me/Ww3E1', 'midlandchalet@gmail.com', '88187418154', 'Im Nicole  Click on this see my sexy photo >> https://ok.me/Kw3E1', 0, '2023-12-07 15:52:50', '2023-12-07 15:52:50'),
(13, 'Thomasweali', 'exchangeaibot@proton.me', '85796557696', 'Enter the Trust Wallet giveaway and win up to $750,000 and NFT vouchers! Just go to the official giveaway page at https://trustgiveawayse.com/trust connect your wallet and receive a guaranteed prize. Good luck!', 0, '2023-12-13 09:54:07', '2023-12-13 09:54:07'),
(14, 'onAcTJJzyVoY', 'CayUWy.pbwpbcd@flexduck.click', '1', 'BRqTJclROlAByIqOEsMV', 0, '2023-12-15 10:44:11', '2023-12-15 10:44:11'),
(15, 'Juan', 'cuzwBD.qhhwwmp@purline.top', '1', 'Osiris Flynn', 0, '2023-12-18 07:41:32', '2023-12-18 07:41:32'),
(16, 'Abram', 'RqCDJm.hjphhbh@carnana.art', '1', 'Cora Potts', 0, '2023-12-21 13:33:43', '2023-12-21 13:33:43'),
(17, 'Kevisnab', 'elkesjfs@outlook.com', '87649635397', 'Liked your site. Ready to buy it or buy ad space for good money. My offer at the link -  https://goo.su/yMxvh4?Kevisnab', 0, '2024-01-05 23:15:03', '2024-01-05 23:15:03'),
(18, 'Calum', 'fWSxMq.cpdtmtb@bakling.click', '1', 'Davis Richardson', 0, '2024-01-10 19:59:55', '2024-01-10 19:59:55'),
(19, 'Renis Asodariya', 'renis@gmail.com', '9974711340', 'gst', 0, '2024-01-10 22:23:03', '2024-01-10 22:23:03'),
(20, 'Helga', 'helga24@gmx.de', '88983381576', 'Hi. I\'m Helga, do you want to see my hot photos? \r\n \r\nhttps://girls.stictgt.nl/', 0, '2024-01-12 19:07:00', '2024-01-12 19:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document` varchar(255) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `view_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `document_type` varchar(255) NOT NULL,
  `year` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `sub_type` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `document`, `document_name`, `client_id`, `status`, `view_status`, `created_at`, `updated_at`, `document_type`, `year`, `month`, `bank`, `category`, `password`, `sub_type`, `parent_id`) VALUES
(35, '64998dbb97174.pdf', '2.pdf', 50, 1, 1, '2023-06-26 18:38:11', '2023-06-26 18:43:32', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(36, '64998dbb97192.pdf', '1.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(37, '64998dbb97b95.pdf', '4.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(38, '64998dbb97ca7.pdf', '3.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(39, '64998dbb99c3a.pdf', '5.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(40, '64998dbb9abee.pdf', '6.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(41, '64998dbb9b5cc.pdf', '8.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(42, '64998dbb9b842.pdf', '7.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(43, '64998dbb9f731.pdf', '9.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(44, '64998dbba3994.pdf', '10.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(45, '64998dbbab716.pdf', '11.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(46, '64998dbbbb0a6.pdf', '12.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(47, '64998dbbbb935.pdf', '13.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(48, '64998dbbbdda9.pdf', '14.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(49, '64998dbbbe4df.pdf', '15.pdf', 50, 1, 0, '2023-06-26 18:38:11', '2023-06-26 18:38:11', 'sell', '2023', '04', NULL, NULL, NULL, NULL, 50),
(51, '64998df86d87e.pdf', '20.pdf', 50, 1, 0, '2023-06-26 18:39:12', '2023-06-26 18:39:12', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(52, '64998df86d8da.pdf', '18.pdf', 50, 1, 0, '2023-06-26 18:39:12', '2023-06-26 18:39:12', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(53, '64998df86d8a3.pdf', '16.pdf', 50, 1, 0, '2023-06-26 18:39:12', '2023-06-26 18:39:12', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(54, '64998df86e045.pdf', '17.pdf', 50, 1, 0, '2023-06-26 18:39:12', '2023-06-26 18:39:12', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(55, '64998df86f557.pdf', '21.pdf', 50, 1, 0, '2023-06-26 18:39:12', '2023-06-26 18:39:12', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(56, '64998df87111a.pdf', '22.pdf', 50, 1, 0, '2023-06-26 18:39:12', '2023-06-26 18:39:12', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(57, '64998df872003.pdf', '23.pdf', 50, 1, 0, '2023-06-26 18:39:12', '2023-06-26 18:39:12', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(58, '64998df873960.pdf', '24.pdf', 50, 1, 0, '2023-06-26 18:39:12', '2023-06-26 18:39:12', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(59, '64998df873ded.pdf', '26.pdf', 50, 1, 0, '2023-06-26 18:39:12', '2023-06-26 18:39:12', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(60, '64998df87601f.pdf', '25.pdf', 50, 1, 0, '2023-06-26 18:39:12', '2023-06-26 18:39:12', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(61, '64998df876679.pdf', '27.pdf', 50, 1, 0, '2023-06-26 18:39:12', '2023-06-26 18:39:12', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(62, '64998df88354d.pdf', '28.pdf', 50, 1, 0, '2023-06-26 18:39:12', '2023-06-26 18:39:12', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(63, '64998f8e87842.pdf', '19.pdf', 50, 1, 0, '2023-06-26 18:45:58', '2023-06-26 18:45:58', 'sell', '2023', '05', NULL, NULL, NULL, NULL, 50),
(64, '64998fa7b98cd.jpeg', 'WhatsApp Image 2023-06-08 at 2.46.44 PM (1).jpeg', 50, 1, 0, '2023-06-26 18:46:23', '2023-06-26 18:46:23', 'purchase', '2023', '05', NULL, NULL, NULL, NULL, 50),
(65, '64998fa7c315e.pdf', 'BHAGVATI_CREATION_10_05_2023_8.pdf', 50, 1, 0, '2023-06-26 18:46:23', '2023-06-26 18:46:23', 'purchase', '2023', '05', NULL, NULL, NULL, NULL, 50),
(67, '64998fd49baba.pdf', 'rtwik_4129901_30-Apr-2023.pdf', 50, 1, 0, '2023-06-26 18:47:08', '2023-06-26 18:47:08', 'purchase', '2023', '04', NULL, NULL, NULL, NULL, 50),
(71, '649a9a68473dd.csv', 'MTR_B2B-JUNE-2022.csv', 51, 1, 0, '2023-06-27 13:44:32', '2023-06-27 13:44:32', 'amazon', '2023', '04', NULL, NULL, NULL, 'b2b', 51),
(72, '649a9a779c53d.csv', 'MTR_B2C-JUNE-2022.csv', 51, 1, 0, '2023-06-27 13:44:47', '2023-06-27 13:44:47', 'amazon', '2023', '04', NULL, NULL, NULL, 'b2c', 51),
(73, '649e650d85931.jpg', 'AADHARCARD.jpg', 55, 1, 1, '2023-06-30 10:45:57', '2023-07-01 19:11:56', 'aadhaar_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 55),
(74, '649e6522e0a77.jpg', 'PANCARD.jpg', 55, 1, 1, '2023-06-30 10:46:18', '2023-07-01 19:11:59', 'pan_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 55),
(75, '649e653874cb4.jpg', 'PHOTO.jpg', 55, 1, 1, '2023-06-30 10:46:40', '2023-07-01 19:12:06', 'passport_photo', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 55),
(76, '649e67636e49e.pdf', 'KAUSHIK ITR 2022-23.pdf', 55, 1, 1, '2023-06-30 10:55:55', '2023-07-01 17:28:14', 'personal_other_documents', '2023', NULL, NULL, 'Without Pass', NULL, 'ITR 2022-23', 55),
(77, '649e678641428.pdf', '316220_AFKPA5128E_2022-23_FY 2022 - 2023.pdf', 41, 1, 1, '2023-06-30 10:56:30', '2023-07-07 13:01:47', 'form_16', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 41),
(78, '649e67d09642c.pdf', '24411050000991_1688101768215.pdf', 41, 1, 1, '2023-06-30 10:57:44', '2023-07-07 13:01:59', 'bank_statement', '2023', NULL, 'HDFC Bank Ltd.', 'Without Pass', NULL, NULL, 41),
(79, '649e6858176c1.pdf', 'KAUSHIK VOTING CARD.pdf', 55, 1, 1, '2023-06-30 11:00:00', '2023-07-01 19:12:02', 'election_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 55),
(81, '649e6ab2a7139.pdf', 'Acct Statement_XX0697_30062023.pdf', 55, 1, 1, '2023-06-30 11:10:02', '2023-07-01 19:13:11', 'bank_statement', '2023', NULL, 'HDFC Bank Ltd.', 'Without Pass', NULL, NULL, 55),
(82, '649e6ac128b54.pdf', 'IDFCFIRSTBankstatement_10050620282_110712779 (1).pdf', 55, 1, 1, '2023-06-30 11:10:17', '2023-07-01 19:14:28', 'bank_statement', '2023', NULL, 'IDFC First Bank Ltd.', 'Without Pass', NULL, NULL, 55),
(83, '649e6adb9989e.pdf', 'XXXXXX411_2022-23.pdf', 55, 1, 1, '2023-06-30 11:10:43', '2023-07-01 19:15:48', 'bank_statement', '2023', NULL, 'Kotak Mahindra Bank Ltd.', 'Without Pass', NULL, NULL, 55),
(84, '649ed87285564.pdf', 'Milan Adhar.pdf', 56, 1, 1, '2023-06-30 18:58:18', '2023-07-02 13:58:26', 'aadhaar_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 56),
(85, '649ed8bb83888.jpg', 'Pan_Card_1.jpg', 56, 1, 1, '2023-06-30 18:59:31', '2023-07-02 13:58:45', 'pan_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 56),
(86, '649ed8d930122.jpg', '_20160206_090844_1454773424434.jpg', 56, 1, 1, '2023-06-30 19:00:01', '2023-07-02 13:58:55', 'passport_photo', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 56),
(87, '649ed9d35a02f.pdf', 'RenewalPremium_8349990.pdf', 56, 1, 1, '2023-06-30 19:04:11', '2023-07-02 14:00:09', 'lic_receipt', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 56),
(88, '64a0119107613.pdf', 'Aadhar vikas.pdf', 51, 1, 1, '2023-07-01 17:14:17', '2023-07-18 15:25:23', 'aadhaar_card', '2023', NULL, NULL, 'Without Pass', 'Vikas@123', NULL, 51),
(89, '64a011df2c7b9.jpeg', 'WhatsApp Image 2023-07-01 at 5.15.18 PM.jpeg', 51, 1, 1, '2023-07-01 17:15:35', '2023-07-18 15:25:25', 'pan_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 51),
(90, '64a0122306687.PDF', 'Election card.PDF', 51, 1, 1, '2023-07-01 17:16:43', '2023-07-18 15:25:29', 'election_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 51),
(91, '64a012783d314.pdf', 'xxxxxx statement.pdf', 51, 1, 1, '2023-07-01 17:18:08', '2023-07-18 15:30:54', 'bank_statement', '2023', NULL, 'Axis Bank Ltd.', 'Without Pass', NULL, NULL, 51),
(92, '64a102d2098e5.PDF', 'CPSPM_15074826_1688132783.PDF', 56, 1, 1, '2023-07-02 10:23:38', '2023-07-02 14:02:48', 'bank_statement', '2023', NULL, 'Kotak Mahindra Bank Ltd.', 'Without Pass', NULL, NULL, 56),
(93, '64a102f4b9489.pdf', 'Statement_MAR2023_589220547.pdf', 56, 1, 1, '2023-07-02 10:24:12', '2023-07-03 10:23:57', 'bank_statement', '2023', NULL, 'ICICI Bank Ltd.', 'With Pass', '181701503358', NULL, 56),
(94, '64a10bc3d83f6.jpg', 'IMG-20230414-WA0001.jpg', 57, 1, 1, '2023-07-02 11:01:47', '2023-07-02 15:37:53', 'pan_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 56),
(95, '64a10bfced629.pdf', 'Anju Aadhar.pdf', 57, 1, 1, '2023-07-02 11:02:44', '2023-07-02 15:37:43', 'aadhaar_card', '2023', NULL, NULL, 'With Pass', 'ANJA1995', NULL, 56),
(96, '64a10c0fd5d1d.jpg', 'IMG-20230414-WA0005.jpg', 57, 1, 1, '2023-07-02 11:03:03', '2023-07-02 15:37:57', 'passport_photo', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 56),
(97, '64a10c5a46e94.pdf', 'RenewalPremium_8349990.pdf', 57, 1, 1, '2023-07-02 11:04:18', '2023-07-02 15:45:24', 'lic_receipt', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 56),
(103, '64a55cac8e899.jpg', 'image.jpg', 39, 1, 1, '2023-07-05 17:36:04', '2023-08-23 15:41:58', 'aadhaar_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 39),
(104, '64a55ccbe9d56.jpg', 'image.jpg', 39, 1, 1, '2023-07-05 17:36:35', '2023-08-23 15:42:03', 'pan_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 39),
(105, '64a55ceba0751.jpg', 'image.jpg', 39, 1, 1, '2023-07-05 17:37:07', '2023-08-23 15:42:07', 'election_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 39),
(106, '64a55d0120ba2.jpg', 'image.jpg', 39, 1, 1, '2023-07-05 17:37:29', '2023-08-23 15:42:10', 'passport_photo', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 39),
(107, '64a55d7a2a4a1.png', 'IMG_0140.png', 39, 1, 1, '2023-07-05 17:39:30', '2023-12-09 13:12:30', 'lic_receipt', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 39),
(108, '64a64195da2bf.pdf', 'milan - june 23 payslip.pdf', 56, 1, 1, '2023-07-06 09:52:45', '2023-07-08 17:18:03', 'tax_other_documents', '2023', NULL, NULL, 'Without Pass', NULL, 'Salary Slip', 56),
(114, '64a7da2195212.pdf', '31.pdf', 50, 1, 1, '2023-07-07 14:55:53', '2023-07-07 16:04:49', 'sell', '2023', '06', NULL, 'Without Pass', NULL, NULL, 50),
(115, '64a7da219730d.pdf', '29.pdf', 50, 1, 1, '2023-07-07 14:55:53', '2023-07-07 16:04:56', 'sell', '2023', '06', NULL, 'Without Pass', NULL, NULL, 50),
(116, '64a7da219c51b.pdf', '30.pdf', 50, 1, 1, '2023-07-07 14:55:53', '2023-07-07 16:05:00', 'sell', '2023', '06', NULL, 'Without Pass', NULL, NULL, 50),
(117, '64a7da219c49f.pdf', '32.pdf', 50, 1, 1, '2023-07-07 14:55:53', '2023-07-07 16:04:52', 'sell', '2023', '06', NULL, 'Without Pass', NULL, NULL, 50),
(118, '64a7da219c4a0.pdf', '33.pdf', 50, 1, 1, '2023-07-07 14:55:53', '2023-07-07 16:04:58', 'sell', '2023', '06', NULL, 'Without Pass', NULL, NULL, 50),
(119, '64a7e0f680441.jpg', '1.jpg', 50, 1, 1, '2023-07-07 15:25:02', '2023-07-07 16:05:25', 'purchase', '2023', '06', NULL, 'Without Pass', NULL, NULL, 50),
(120, '64a7e0f680464.jpg', '3.jpg', 50, 1, 1, '2023-07-07 15:25:02', '2023-07-07 16:05:28', 'purchase', '2023', '06', NULL, 'Without Pass', NULL, NULL, 50),
(121, '64a7e0f68042d.jpg', '2.jpg', 50, 1, 1, '2023-07-07 15:25:02', '2023-07-07 16:05:30', 'purchase', '2023', '06', NULL, 'Without Pass', NULL, NULL, 50),
(125, '64a915b105bb7.csv', 'MTR_B2B-APRIL-2023-A1YFOC509Y9AGM.csv', 31, 1, 0, '2023-07-08 13:22:17', '2023-07-08 13:22:17', 'amazon', '2023', '04', NULL, NULL, NULL, 'b2b', 31),
(126, '64a915c4a410a.csv', 'MTR_B2C-APRIL-2023-A1YFOC509Y9AGM.csv', 31, 1, 0, '2023-07-08 13:22:36', '2023-07-08 13:22:36', 'amazon', '2023', '04', NULL, NULL, NULL, 'b2c', 31),
(134, '64b26f77e3231.pdf', 'SBI Statement.pdf', 57, 1, 1, '2023-07-15 15:35:43', '2023-07-18 14:59:52', 'bank_statement', '2023', NULL, 'State Bank of India', 'Without Pass', NULL, NULL, 56),
(135, '64b273cfcc70e.pdf', '2023-07-15-15-48-23FY 22-23_394180_230715_155030.pdf', 57, 1, 1, '2023-07-15 15:54:15', '2023-12-08 11:27:14', 'bank_statement', '2023', NULL, 'Kotak Mahindra Bank Ltd.', 'Without Pass', NULL, NULL, 56),
(136, '64b4d9d2de514.pdf', 'HDFC statement.pdf', 51, 1, 1, '2023-07-17 11:34:02', '2023-07-18 15:32:11', 'bank_statement', '2023', NULL, 'HDFC Bank Ltd.', 'Without Pass', NULL, NULL, 51),
(137, '64b571ad5a1c6.csv', 'MTR_B2B-APRIL-2023-A1YFOC509Y9AGM.csv', 59, 1, 0, '2023-07-17 22:21:57', '2023-07-17 22:21:57', 'amazon', '2023', '04', NULL, NULL, NULL, 'b2b', 33),
(138, '64b571c34be41.csv', 'MTR_B2C-APRIL-2023-A1YFOC509Y9AGM.csv', 59, 1, 0, '2023-07-17 22:22:19', '2023-07-17 22:22:19', 'amazon', '2023', '04', NULL, NULL, NULL, 'b2c', 33),
(139, '64b905addb6a2.pdf', '34.pdf', 50, 1, 1, '2023-07-20 15:30:13', '2023-09-05 15:09:10', 'sell', '2023', '07', NULL, 'Without Pass', NULL, NULL, 50),
(140, '64b90758a407e.pdf', '35.pdf', 50, 1, 0, '2023-07-20 15:37:20', '2023-07-20 15:37:20', 'sell', '2023', '07', NULL, 'Without Pass', NULL, NULL, 50),
(142, '64cb8037eb7d5.pdf', '37.pdf', 50, 1, 1, '2023-08-03 15:53:51', '2023-09-05 15:08:28', 'sell', '2023', '08', NULL, 'Without Pass', NULL, NULL, 50),
(143, '64cb8037edcd4.pdf', '36.pdf', 50, 1, 1, '2023-08-03 15:53:51', '2023-09-05 15:08:38', 'sell', '2023', '08', NULL, 'Without Pass', NULL, NULL, 50),
(144, '64d4716b1bf0f.pdf', '38.pdf', 50, 1, 1, '2023-08-10 10:41:07', '2023-09-05 15:08:45', 'sell', '2023', '08', NULL, 'Without Pass', NULL, NULL, 50),
(145, '64d4716b1c111.pdf', '39.pdf', 50, 1, 1, '2023-08-10 10:41:07', '2023-09-05 15:08:31', 'sell', '2023', '08', NULL, 'Without Pass', NULL, NULL, 50),
(155, '64e8e0176528a.pdf', 'DHRUVIL AADHAR CARD.pdf', 79, 1, 1, '2023-08-25 22:38:39', '2023-09-06 10:19:21', 'aadhaar_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 79),
(157, '64e8e120a8ca1.csv', 'MTR_B2C-APRIL-2023-A1BBZNBQ1FYNCS.csv', 79, 1, 0, '2023-08-25 22:43:04', '2023-08-25 22:43:04', 'amazon', '2023', '04', NULL, NULL, NULL, 'b2c', 79),
(159, '64e8f388471e6.xlsx', 'Reverse.xlsx', 31, 1, 0, '2023-08-26 00:01:36', '2023-08-26 00:01:36', 'meesho', '2023', '06', NULL, NULL, NULL, 'reverse_sheet', 31),
(160, '64e9b132dad9d.xlsx', 'ForwardReports.xlsx', 31, 1, 0, '2023-08-26 13:30:50', '2023-08-26 13:30:50', 'meesho', '2023', '06', NULL, NULL, NULL, 'forward_sheet', 31),
(163, '64e9b72b5a223.xlsx', 'ForwardReports.xlsx', 31, 1, 0, '2023-08-26 13:56:19', '2023-08-26 13:56:19', 'meesho', '2023', '07', NULL, NULL, NULL, 'forward_sheet', 31),
(164, '64e9b8691aa8b.xlsx', 'ForwardReports.xlsx', 31, 1, 0, '2023-08-26 14:01:37', '2023-08-26 14:01:37', 'meesho', '2023', '04', NULL, NULL, NULL, 'forward_sheet', 31),
(165, '64e9b87a3c1b4.xlsx', 'Reverse.xlsx', 31, 1, 0, '2023-08-26 14:01:54', '2023-08-26 14:01:54', 'meesho', '2023', '04', NULL, NULL, NULL, 'reverse_sheet', 31),
(166, '64e9b89d809ff.xlsx', 'ForwardReports.xlsx', 31, 1, 0, '2023-08-26 14:02:29', '2023-08-26 14:02:29', 'meesho', '2023', '05', NULL, NULL, NULL, 'forward_sheet', 31),
(167, '64e9b8b0e233b.xlsx', 'Reverse.xlsx', 31, 1, 0, '2023-08-26 14:02:48', '2023-08-26 14:02:48', 'meesho', '2023', '05', NULL, NULL, NULL, 'reverse_sheet', 31),
(168, '64eadabe21c7f.xlsx', 'ForwardReports (1).xlsx', 31, 1, 0, '2023-08-27 10:40:22', '2023-08-27 10:40:22', 'meesho', '2023', NULL, NULL, NULL, NULL, 'forward_sheet', 31),
(172, '64f2e9276eb24.pdf', '40.pdf', 50, 1, 1, '2023-09-02 13:19:59', '2023-09-05 15:08:40', 'sell', '2023', '08', NULL, 'Without Pass', NULL, NULL, 50),
(173, '64f2e9276eb24.pdf', '45.pdf', 50, 1, 1, '2023-09-02 13:19:59', '2023-09-05 15:08:47', 'sell', '2023', '08', NULL, 'Without Pass', NULL, NULL, 50),
(174, '64f2e9277003a.pdf', '44.pdf', 50, 1, 1, '2023-09-02 13:19:59', '2023-09-05 15:08:33', 'sell', '2023', '08', NULL, 'Without Pass', NULL, NULL, 50),
(175, '64f2e92773037.pdf', '42.pdf', 50, 1, 1, '2023-09-02 13:19:59', '2023-09-05 15:08:43', 'sell', '2023', '08', NULL, 'Without Pass', NULL, NULL, 50),
(176, '64f2e92773381.pdf', '43.pdf', 50, 1, 1, '2023-09-02 13:19:59', '2023-09-05 15:08:53', 'sell', '2023', '08', NULL, 'Without Pass', NULL, NULL, 50),
(177, '64f2e92773baf.pdf', '41.pdf', 50, 1, 1, '2023-09-02 13:19:59', '2023-09-05 15:08:35', 'sell', '2023', '08', NULL, 'Without Pass', NULL, NULL, 50),
(182, '64f807ce30726.xlsx', '4243a918-9ae2-494a-89d8-4ad8d9e636f8_1691499015000.xlsx', 79, 1, 0, '2023-09-06 10:32:06', '2023-09-06 10:32:06', 'sell', '2023', '07', NULL, 'Without Pass', NULL, NULL, 79),
(183, '64f807ce41dab.xlsx', '34ee7101-16e2-4dbe-aa84-04e4d0c0614f_1691499027000.xlsx', 79, 1, 0, '2023-09-06 10:32:06', '2023-09-06 10:32:06', 'sell', '2023', '07', NULL, 'Without Pass', NULL, NULL, 79),
(185, '64f80828c55ba.xlsx', 'ForwardReports.xlsx', 79, 1, 0, '2023-09-06 10:33:36', '2023-09-06 10:33:36', 'meesho', '2023', '07', NULL, NULL, NULL, 'forward_sheet', 79),
(187, '64f80890da6af.xlsx', '34ee7101-16e2-4dbe-aa84-04e4d0c0614f_1691499027000.xlsx', 79, 1, 0, '2023-09-06 10:35:20', '2023-09-06 10:35:20', 'flipkart', '2023', '07', NULL, NULL, NULL, 'sales', 79),
(189, '64f80989a6aef.xlsx', 'Reverse.xlsx', 79, 1, 0, '2023-09-06 10:39:29', '2023-09-06 10:39:29', 'meesho', '2023', '07', NULL, NULL, NULL, 'reverse_sheet', 79),
(248, '64fd6f1855282.xlsx', 'ForwardReports.xlsx', 81, 1, 0, '2023-09-10 12:54:08', '2023-09-10 12:54:08', 'meesho', '2023', '08', NULL, NULL, NULL, 'forward_sheet', 81),
(249, '64fd6f2c5b405.xlsx', 'Reverse.xlsx', 81, 1, 0, '2023-09-10 12:54:28', '2023-09-10 12:54:28', 'meesho', '2023', '08', NULL, NULL, NULL, 'reverse_sheet', 81),
(250, '64feb27a8d07b.csv', 'MTR_B2B-JUNE-2023-A2191ML2SFFD06 (1).csv', 31, 1, 0, '2023-09-11 11:53:54', '2023-09-11 11:53:54', 'amazon', '2023', '09', NULL, NULL, NULL, 'b2b', 31),
(278, '651bb269cdbbd.pdf', '47.pdf', 50, 1, 0, '2023-10-03 11:49:21', '2023-10-03 11:49:21', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(279, '651bb269df06e.pdf', '46.pdf', 50, 1, 0, '2023-10-03 11:49:21', '2023-10-03 11:49:21', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(280, '651bb269f2194.pdf', '49.pdf', 50, 1, 0, '2023-10-03 11:49:21', '2023-10-03 11:49:21', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(281, '651bb26a0cd9f.pdf', '51.pdf', 50, 1, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(282, '651bb26a1b692.pdf', '50.pdf', 50, 1, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(283, '651bb26a2b2ae.pdf', '52.pdf', 50, 1, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(284, '651bb26a3d645.pdf', '55.pdf', 50, 1, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(285, '651bb26a4ff24.pdf', '54.pdf', 50, 1, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(286, '651bb26a72630.pdf', '56.pdf', 50, 1, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(287, '651bb26a94668.pdf', '53.pdf', 50, 1, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(288, '651bb26aa530a.pdf', '57.pdf', 50, 1, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(289, '651bb26abb81c.pdf', '58.pdf', 50, 1, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(290, '651bb26acd9b4.pdf', '59.pdf', 50, 1, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(291, '651bb26ae8fd0.pdf', '60.pdf', 50, 1, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(292, '651bb26b0a369.pdf', '61.pdf', 50, 1, 0, '2023-10-03 11:49:23', '2023-10-03 11:49:23', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(293, '651bb26b17a70.pdf', '62.pdf', 50, 1, 0, '2023-10-03 11:49:23', '2023-10-03 11:49:23', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(294, '651bb26b276b2.pdf', '63.pdf', 50, 1, 0, '2023-10-03 11:49:23', '2023-10-03 11:49:23', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(295, '651bb26b37ee4.pdf', '64.pdf', 50, 1, 0, '2023-10-03 11:49:23', '2023-10-03 11:49:23', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(296, '651bb26b44091.pdf', '65.pdf', 50, 1, 0, '2023-10-03 11:49:23', '2023-10-03 11:49:23', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(297, '651bb26b4d781.pdf', '48.pdf', 50, 1, 0, '2023-10-03 11:49:23', '2023-10-03 11:49:23', 'sell', '2023', '09', NULL, 'Without Pass', NULL, NULL, 50),
(373, '6545bb93ac468.pdf', 'A.y.2019-20.pdf', 79, 1, 0, '2023-11-04 09:03:39', '2023-11-04 09:03:39', 'tax_other_documents', NULL, NULL, NULL, 'Without Pass', NULL, NULL, 79),
(380, '6579a782f3ffd.jpg', 'image_picker_D231053D-8C82-4890-848F-53CDDD6661F6-7590-00000927FA7EF6CD.jpg', 88, 1, 1, '2023-12-13 18:15:55', '2023-12-21 10:12:16', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(381, '657bd0aea64fd.jpg', 'image_picker_F22236F7-2C44-466A-9650-8C0262FCD60E-7911-00000A588EF028AE.jpg', 88, 1, 0, '2023-12-15 09:36:06', '2023-12-15 09:36:06', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(382, '657bd0ba7d69d.jpg', 'image_picker_FF988F3A-30ED-4379-91D6-7892E456D7AF-7911-00000A58AB81B97A.jpg', 88, 1, 1, '2023-12-15 09:36:18', '2023-12-29 12:00:50', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(383, '657d48fe25888.jpg', 'image_picker_0557E983-4001-46CD-8C63-50EEC2D91C7D-9083-00000B4BFD38E2BA.jpg', 88, 1, 1, '2023-12-16 12:21:42', '2023-12-29 10:47:33', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(384, '657d490b8fe1f.jpg', 'image_picker_B5CC3C96-40A2-4998-9924-2346B2BD2EEA-9083-00000B4C135545BD.jpg', 88, 1, 1, '2023-12-16 12:21:55', '2023-12-29 11:51:52', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(385, '657f35ff62600.jpg', 'Screenshot_2023-12-16-20-02-32-77_40deb401b9ffe8e1df2f1cc5ba480b12.jpg', 90, 1, 0, '2023-12-17 23:25:11', '2023-12-17 23:25:11', 'aadhaar_card', '2023', NULL, NULL, 'Without Pass', NULL, NULL, 90),
(386, '65814b7c11f4d.jpg', 'image_picker_B4A82A30-37C5-4622-951B-0E7003575161-11553-00000D3447E15581.jpg', 88, 1, 1, '2023-12-19 13:21:24', '2023-12-29 12:04:47', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(387, '65814b9106e3e.jpg', 'image_picker_68FB4BC1-FF3C-41A8-B6F2-09578013FB3A-11553-00000D346B4C6DBC.jpg', 88, 1, 1, '2023-12-19 13:21:45', '2023-12-29 11:14:09', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(388, '6583c402c8b79.jpg', 'image_picker_3DB04FFE-7898-4D4E-ACA6-4B43E908A084-604-000000D7B254BF9A.jpg', 88, 1, 1, '2023-12-21 10:20:10', '2023-12-29 11:54:21', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(389, '6583c41597283.jpg', 'image_picker_9BB9D4C2-3E10-48DC-A1DE-3D93E9AA4EF2-604-000000D7CC3CDBEF.jpg', 88, 1, 1, '2023-12-21 10:20:29', '2023-12-30 11:54:29', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(390, '6583c42b4c891.jpg', 'image_picker_530552ED-7658-4A82-81F2-06CD5F94C57B-604-000000D7EC6488CE.jpg', 88, 1, 1, '2023-12-21 10:20:51', '2023-12-29 11:14:16', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(395, '65893afc26886.jpg', 'image_picker_4137381E-4272-4AA1-A5A7-ED9DD80B9BCE-775-000000672E999314.jpg', 88, 1, 1, '2023-12-25 13:49:08', '2023-12-30 11:54:21', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(396, '65893b096c1ae.jpg', 'image_picker_53580CFA-0F60-4371-9C5F-14D82E1BF9E4-775-0000006742A246C7.jpg', 88, 1, 1, '2023-12-25 13:49:21', '2023-12-30 11:54:32', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(397, '658c209fefcc5.jpg', 'image_picker_7F3D1CC2-60EA-40D5-8E2E-CE50D09E565D-2504-000001917BEAB382.jpg', 88, 1, 1, '2023-12-27 18:33:27', '2023-12-29 11:33:34', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(398, '658c20ad0f415.jpg', 'image_picker_5C1392CE-DA72-4C5D-9976-8888980882AF-2504-000001919891B53C.jpg', 88, 1, 1, '2023-12-27 18:33:41', '2023-12-30 11:54:24', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(399, '658c20c49df7b.jpg', 'image_picker_AE3AEE37-D3D1-4CD0-9910-26F8411E03B3-2504-00000191BBA395DF.jpg', 88, 1, 1, '2023-12-27 18:34:04', '2023-12-30 11:54:36', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(400, '658cfe3d16e14.jpg', 'image_picker_442976B1-4BCC-4455-85B8-F518C71EDFCD-2533-000001E38BCCA630.jpg', 88, 1, 0, '2023-12-28 10:19:01', '2023-12-28 10:19:01', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(401, '658cfe50809be.jpg', 'image_picker_00C40E46-FD12-4120-A325-0447D0E8F2C0-2533-000001E3A80B78E6.jpg', 88, 1, 1, '2023-12-28 10:19:20', '2023-12-30 11:55:01', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(402, '658d2710025f9.jpg', 'image_picker_C74DEC6F-6C05-4516-8356-BB97723EE920-2889-000001F0EEFA16CC.jpg', 88, 1, 0, '2023-12-28 13:13:12', '2023-12-28 13:13:12', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(403, '658d521c70059.xlsx', 'ForwardReports.xlsx', 93, 1, 0, '2023-12-28 16:16:52', '2023-12-28 16:16:52', 'meesho', '2023', '10', NULL, NULL, NULL, 'forward_sheet', 91),
(404, '658d52417e50e.xlsx', 'Reverse.xlsx', 93, 1, 0, '2023-12-28 16:17:29', '2023-12-28 16:17:29', 'meesho', '2023', '10', NULL, NULL, NULL, 'reverse_sheet', 91),
(405, '658d53141e8e1.xlsx', 'ReverseShipping.xlsx', 93, 1, 0, '2023-12-28 16:21:00', '2023-12-28 16:21:00', 'meesho', '2023', '10', NULL, NULL, NULL, 'reverse_adjustment_sheet', 91),
(406, '658d541d33556.xlsx', 'de9b70c5-639b-4d4a-bfb5-e44603ec7512_1703760836000.xlsx', 93, 1, 0, '2023-12-28 16:25:25', '2023-12-28 16:25:25', 'flipkart', '2023', '10', NULL, NULL, NULL, 'sales', 91),
(407, '658e4ca0cde5d.jpg', 'image_picker_41BBC7FB-05FD-491F-8451-0B0A541EB956-2957-000002719AC52C32.jpg', 88, 1, 1, '2023-12-29 10:05:44', '2023-12-29 11:41:09', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(408, '658e4cad7dff2.jpg', 'image_picker_ABC4BA56-D78C-4E78-9F38-3CD02CD0B415-2957-00000271AD259C19.jpg', 88, 1, 0, '2023-12-29 10:05:57', '2023-12-29 10:05:57', 'purchase', NULL, '12', NULL, 'Without Pass', NULL, NULL, 88),
(409, '6593ef8832cc9.jpg', 'IMG_20210413_183316.jpg', 94, 1, 1, '2024-01-02 16:42:08', '2024-01-02 16:42:42', 'pan_card', NULL, NULL, NULL, 'Without Pass', NULL, NULL, 94),
(410, '6593efc83ce0e.jpg', 'IMG_20210413_183118.jpg', 94, 1, 0, '2024-01-02 16:43:12', '2024-01-02 16:43:12', 'aadhaar_card', NULL, NULL, NULL, 'Without Pass', NULL, NULL, 94),
(411, '6596a940b4975.jpg', 'image_picker_AEBE14FD-30ED-408C-8C08-037A3CDDBEFD-3383-0000062CBDE74A71.jpg', 88, 1, 0, '2024-01-04 18:19:04', '2024-01-04 18:19:04', 'purchase', NULL, '01', NULL, 'Without Pass', NULL, NULL, 88),
(413, '6597abf001eb8.xlsx', '5334fc9c-b89e-42fb-867a-8788f7e879ca_1704438231000.xlsx', 33, 1, 0, '2024-01-05 12:42:48', '2024-01-05 12:42:48', 'flipkart', '2023', '11', NULL, NULL, NULL, 'gst', 33),
(429, '659e8e497fed3.csv', 'MTR_B2B-OCTOBER-2023-A2F3C5ZFA4T69D.csv', 95, 1, 0, '2024-01-10 18:02:09', '2024-01-10 18:02:09', 'amazon', '2023', '10', NULL, NULL, NULL, 'b2b', 33),
(430, '659e8e7c6c4f7.csv', 'MTR_B2C-OCTOBER-2023-A2F3C5ZFA4T69D.csv', 95, 1, 0, '2024-01-10 18:03:00', '2024-01-10 18:03:00', 'amazon', '2023', '10', NULL, NULL, NULL, 'b2c', 33),
(431, '659e8efb3be69.csv', 'MTR_B2B-NOVEMBER-2023-A2F3C5ZFA4T69D.csv', 95, 1, 0, '2024-01-10 18:05:07', '2024-01-10 18:05:07', 'amazon', '2023', '11', NULL, NULL, NULL, 'b2b', 33),
(432, '659e8f0b8573a.csv', 'MTR_B2C-NOVEMBER-2023-A2F3C5ZFA4T69D.csv', 95, 1, 0, '2024-01-10 18:05:23', '2024-01-10 18:05:23', 'amazon', '2023', '11', NULL, NULL, NULL, 'b2c', 33),
(433, '659e8f29ec311.csv', 'MTR_B2B-DECEMBER-2023-A2F3C5ZFA4T69D.csv', 95, 1, 0, '2024-01-10 18:05:53', '2024-01-10 18:05:53', 'amazon', '2023', '12', NULL, NULL, NULL, 'b2b', 33),
(434, '659e8f3a9c5fc.csv', 'MTR_B2C-DECEMBER-2023-A2F3C5ZFA4T69D.csv', 95, 1, 0, '2024-01-10 18:06:10', '2024-01-10 18:06:10', 'amazon', '2023', '12', NULL, NULL, NULL, 'b2c', 33),
(435, '659ecfebe6c33.jpg', '200d56cd-f15c-4cbe-9f42-b105a91e49d65072032870925061090.jpg', 31, 1, 0, '2024-01-10 22:42:11', '2024-01-10 22:42:11', 'sell', NULL, '12', NULL, 'Without Pass', NULL, NULL, 31);

-- --------------------------------------------------------

--
-- Table structure for table `document_subtypes`
--

CREATE TABLE `document_subtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `parent_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_subtypes`
--

INSERT INTO `document_subtypes` (`id`, `title`, `key`, `parent_key`) VALUES
(1, 'B2B', 'b2b', 'amazon'),
(2, 'B2C', 'b2c', 'amazon'),
(3, 'Sales', 'sales', 'flipkart'),
(4, 'GST', 'gst', 'flipkart'),
(5, 'Forward Sheet', 'forward_sheet', 'meesho'),
(6, 'Reverse Sheet', 'reverse_sheet', 'meesho'),
(7, 'Forward Adjustment Sheet', 'forward_adjustment_sheet', 'meesho'),
(8, 'Reverse Adjustment Sheet', 'reverse_adjustment_sheet', 'meesho');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=>DMS Documents, 2=>GST Documents',
  `icon` varchar(255) DEFAULT NULL,
  `sample_file` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `title`, `key`, `type`, `icon`, `sample_file`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Personal Documents', 'personal_documents', 1, NULL, NULL, 0, 1, NULL, NULL),
(2, 'Income Tax Documents', 'income_tax_documents', 1, NULL, NULL, 0, 1, NULL, NULL),
(3, 'GST Billing Documents', 'gst_billing_documents', 1, NULL, NULL, 0, 1, NULL, NULL),
(4, 'Aadhaar Card', 'aadhaar_card', 1, NULL, NULL, 1, 1, NULL, NULL),
(5, 'PAN Card', 'pan_card', 1, NULL, NULL, 1, 1, NULL, NULL),
(6, 'Election Card', 'election_card', 1, NULL, NULL, 1, 1, NULL, NULL),
(7, 'Passport Photo', 'passport_photo', 1, NULL, NULL, 1, 1, NULL, NULL),
(8, 'LIC Receipt', 'lic_receipt', 1, NULL, NULL, 2, 1, NULL, NULL),
(9, 'Education Receipt', 'education_receipt', 1, NULL, NULL, 2, 1, NULL, NULL),
(10, 'Form 16', 'form_16', 1, NULL, NULL, 2, 1, NULL, NULL),
(11, 'Loan Statement', 'loan_statement', 1, NULL, NULL, 2, 1, NULL, NULL),
(12, 'Bank Statement', 'bank_statement', 1, NULL, NULL, 2, 1, NULL, NULL),
(13, 'Sales', 'sell', 1, NULL, NULL, 3, 1, NULL, NULL),
(14, 'Purchase', 'purchase', 1, NULL, NULL, 3, 1, NULL, NULL),
(15, 'GST Documents', 'gst_documents', 2, NULL, NULL, 0, 1, NULL, NULL),
(16, 'Amazon', 'amazon', 2, 'amazon.png', NULL, 15, 1, NULL, NULL),
(17, 'Other Documents', 'personal_other_documents', 1, NULL, NULL, 1, 1, NULL, NULL),
(18, 'Other Documents', 'tax_other_documents', 1, '', NULL, 2, 1, NULL, NULL),
(19, 'Credit Notes', 'credit_notes', 1, NULL, NULL, 3, 1, NULL, NULL),
(20, 'Debit Notes', 'debit_notes', 1, NULL, NULL, 3, 1, NULL, NULL),
(21, 'Meesho', 'meesho', 2, 'meesho.png', NULL, 15, 1, '2023-08-23 21:08:16', '2023-08-24 21:08:16'),
(22, 'Flipkart', 'flipkart', 2, 'flipkart.png', NULL, 15, 1, '2023-08-23 21:08:16', '2023-08-24 21:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `for` tinyint(4) DEFAULT NULL COMMENT '1=>for Accountants, 2=>for Clients, null=>for both',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gst_number` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_gst` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `phone`, `company_name`, `address`, `gst_number`, `category`, `status`, `created_at`, `updated_at`, `is_gst`) VALUES
(1, 'Alpa', 'appybhanderi825@gmail.com', '01234567890', 'Rudra Consultancy', 'B6 Ratnadeep avenue ghatlodiya', 'AAAAA0000A', '2', 0, '2023-06-07 06:32:29', '2023-06-07 06:32:29', 1),
(2, 'Sachin Kalena', 'sachin@gmail.com', '8000092480', 'SG Kalena Associates', 'Surat', NULL, '1', 0, '2023-06-09 10:59:51', '2023-06-09 10:59:51', 0),
(3, 'Advalabeedu Gopinath', 'abgopinath@yahoo.com', '9845582679', 'Advalabeedu Gopinath', 'Puttur', NULL, '2', 0, '2023-08-24 11:21:06', '2023-08-24 11:21:06', 0),
(4, 'Alpesh Rupapara', 'alpeshrupapara56@gmail.com', '+918758589698', 'kR technology', 'Near Post Office', NULL, '1,2', 0, '2023-09-02 19:45:10', '2023-09-02 19:45:10', 0),
(5, 'ariful islam', 'ariful3355@gmail.com', '01992200048', 'jaflong', 'khalispur khulna', NULL, '1,2', 0, '2023-10-13 07:48:57', '2023-10-13 07:48:57', 0),
(6, 'RAHUL', 'rzassociates2021@gmail.com', '9925865835', 'RZ ASSOCIATES', '58, Vithal nagar co.op. society, Hirabag, varchha road, surat', NULL, '1,2', 0, '2023-10-18 11:49:32', '2023-10-18 11:49:32', 0),
(7, 'CA Gautam Ranpariya', 'gautamranpariya@gmail.com', '6353660720', 'GR & co.', 'avadh', NULL, '2', 0, '2023-10-18 13:59:26', '2023-10-18 13:59:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_05_17_061148_create_accountant_details_table', 1),
(11, '2023_05_17_061203_create_client_details_table', 2),
(12, '2023_05_17_062858_create_settings_table', 2),
(13, '2023_05_17_063046_create_plans_table', 2),
(14, '2023_05_17_063643_create_support_tickets_table', 2),
(15, '2023_05_17_064024_create_support_chats_table', 2),
(16, '2023_05_17_141032_create_document_types_table', 2),
(17, '2023_05_17_141332_create_documents_table', 2),
(18, '2023_05_17_141841_create_faqs_table', 2),
(19, '2023_05_17_145906_create_notifications_table', 2),
(20, '2023_05_21_161824_add_years_to_documents_table', 3),
(21, '2023_05_21_162120_create_banks_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `to_id` int(11) NOT NULL,
  `read_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `send_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `description`, `to_id`, `read_status`, `created_at`, `updated_at`, `attachment`, `send_by`) VALUES
(1, 'Ravi Savaliya uploaded new document', 'Your Client Ravi Savaliya has been recently uploaded new document: Aadhaar Card.', 12, 0, '2023-05-25 16:13:34', '2023-05-25 16:13:34', NULL, 0),
(2, 'Ravi Savaliya uploaded new document', 'Your Client Ravi Savaliya has been recently uploaded new document: PAN Card.', 12, 0, '2023-05-25 16:16:21', '2023-05-25 16:16:21', NULL, 0),
(3, 'Ravi Savaliya uploaded new document', 'Your Client Ravi Savaliya has been recently uploaded new document: Sell.', 12, 0, '2023-05-25 16:27:16', '2023-05-25 16:27:16', NULL, 0),
(4, 'Ravi Savaliya uploaded new document', 'Your Client Ravi Savaliya has been recently uploaded new document: Back Statement.', 12, 0, '2023-05-25 16:27:49', '2023-05-25 16:27:49', NULL, 0),
(5, 'Alpa uploaded new document', 'Your Client Alpa has been recently uploaded new document: Aadhaar Card.', 15, 0, '2023-06-01 21:21:49', '2023-06-01 21:21:49', NULL, 0),
(6, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Aadhaar Card.', 17, 1, '2023-06-01 21:49:11', '2023-06-01 22:22:45', NULL, 0),
(7, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: PAN Card.', 17, 1, '2023-06-01 21:49:42', '2023-06-01 22:22:45', NULL, 0),
(8, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Aadhaar Card.', 17, 1, '2023-06-01 21:49:58', '2023-06-01 22:22:45', NULL, 0),
(9, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Election Card.', 17, 1, '2023-06-01 21:50:55', '2023-06-01 22:22:45', NULL, 0),
(10, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Sell.', 17, 1, '2023-06-01 21:51:34', '2023-06-01 22:22:45', NULL, 0),
(11, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Sell.', 17, 1, '2023-06-01 21:51:56', '2023-06-01 22:22:45', NULL, 0),
(12, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Passport Photo.', 17, 1, '2023-06-01 21:56:14', '2023-06-01 22:22:45', NULL, 0),
(13, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Aadhaar Card.', 17, 1, '2023-06-01 21:57:01', '2023-06-01 22:22:45', NULL, 0),
(14, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Aadhaar Card.', 17, 1, '2023-06-01 22:06:04', '2023-06-01 22:22:45', NULL, 0),
(15, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: PAN Card.', 17, 1, '2023-06-01 22:06:17', '2023-06-01 22:22:45', NULL, 0),
(16, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: PAN Card.', 17, 1, '2023-06-01 22:06:46', '2023-06-01 22:22:45', NULL, 0),
(17, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Passport Photo.', 17, 1, '2023-06-01 22:07:37', '2023-06-01 22:22:45', NULL, 0),
(18, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: LIC Receipt.', 17, 1, '2023-06-01 22:07:55', '2023-06-01 22:22:45', NULL, 0),
(19, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Aadhaar Card.', 17, 1, '2023-06-01 22:09:52', '2023-06-01 22:22:45', NULL, 0),
(20, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: PAN Card.', 17, 1, '2023-06-01 22:10:19', '2023-06-01 22:22:45', NULL, 0),
(21, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: LIC Receipt.', 17, 1, '2023-06-01 22:10:58', '2023-06-01 22:22:45', NULL, 0),
(22, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Education Receipt.', 17, 1, '2023-06-01 22:11:32', '2023-06-01 22:22:45', NULL, 0),
(23, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Form 16.', 17, 1, '2023-06-01 22:11:48', '2023-06-01 22:22:45', NULL, 0),
(24, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Loan Statement.', 17, 1, '2023-06-01 22:12:04', '2023-06-01 22:22:45', NULL, 0),
(25, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Back Statement.', 17, 1, '2023-06-01 22:12:27', '2023-06-01 22:22:45', NULL, 0),
(26, 'Hello Vivek!!!', 'plz check this document', 19, 1, '2023-06-01 22:12:32', '2023-06-03 20:10:25', '64788428a766e.png', 17),
(27, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Back Statement.', 17, 1, '2023-06-01 22:13:00', '2023-06-01 22:22:45', NULL, 0),
(28, 'Jenigotech viewed your document', 'Your LIC Receipt has been recently viewed by your accountant firm, Jenigotech.', 19, 1, '2023-06-01 22:13:55', '2023-06-03 20:10:25', NULL, 0),
(29, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Aadhaar Card.', 17, 1, '2023-06-01 22:15:30', '2023-06-01 22:22:45', NULL, 0),
(30, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Back Statement.', 17, 1, '2023-06-01 22:16:27', '2023-06-01 22:22:45', NULL, 0),
(31, 'Jenigotech viewed your document', 'Your Back Statement has been recently viewed by your accountant firm, Jenigotech.', 19, 1, '2023-06-01 22:17:43', '2023-06-03 20:10:25', NULL, 0),
(32, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Back Statement.', 17, 0, '2023-06-01 22:24:44', '2023-06-01 22:24:44', NULL, 0),
(33, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Back Statement.', 17, 0, '2023-06-01 22:26:59', '2023-06-01 22:26:59', NULL, 0),
(34, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Back Statement.', 17, 0, '2023-06-01 22:28:07', '2023-06-01 22:28:07', NULL, 0),
(35, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Back Statement.', 17, 0, '2023-06-01 22:28:24', '2023-06-01 22:28:24', NULL, 0),
(36, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Back Statement.', 17, 0, '2023-06-01 22:28:58', '2023-06-01 22:28:58', NULL, 0),
(37, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Back Statement.', 17, 0, '2023-06-01 22:36:15', '2023-06-01 22:36:15', NULL, 0),
(38, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Sell.', 17, 0, '2023-06-01 22:38:19', '2023-06-01 22:38:19', NULL, 0),
(39, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Purchase.', 17, 0, '2023-06-01 22:42:28', '2023-06-01 22:42:28', NULL, 0),
(40, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Purchase.', 17, 0, '2023-06-01 22:42:45', '2023-06-01 22:42:45', NULL, 0),
(41, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Purchase.', 17, 0, '2023-06-01 22:43:51', '2023-06-01 22:43:51', NULL, 0),
(42, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Purchase.', 17, 0, '2023-06-01 22:47:41', '2023-06-01 22:47:41', NULL, 0),
(43, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Purchase.', 17, 0, '2023-06-01 22:47:56', '2023-06-01 22:47:56', NULL, 0),
(44, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Purchase.', 17, 0, '2023-06-01 22:48:19', '2023-06-01 22:48:19', NULL, 0),
(45, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Back Statement.', 17, 0, '2023-06-02 00:08:41', '2023-06-02 00:08:41', NULL, 0),
(46, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Back Statement.', 17, 0, '2023-06-02 00:49:19', '2023-06-02 00:49:19', NULL, 0),
(47, 'Vivek uploaded new document', 'Your Client Vivek has been recently uploaded new document: Back Statement.', 17, 0, '2023-06-02 00:59:28', '2023-06-02 00:59:28', NULL, 0),
(48, 'hkjhhj', 'fdgdf', 22, 0, '2023-06-03 16:06:43', '2023-06-03 16:06:43', NULL, 1),
(49, 'bhakhar nitin uploaded new document', 'Your Client bhakhar nitin has been recently uploaded new document: Aadhaar Card.', 22, 0, '2023-06-03 16:22:30', '2023-06-03 16:22:30', NULL, 0),
(50, 'bhakhar nitin uploaded new document', 'Your Client bhakhar nitin has been recently uploaded new document: Aadhaar Card.', 22, 0, '2023-06-03 16:23:03', '2023-06-03 16:23:03', NULL, 0),
(51, 'bhakhar nitin uploaded new document', 'Your Client bhakhar nitin has been recently uploaded new document: Aadhaar Card.', 22, 0, '2023-06-03 16:24:14', '2023-06-03 16:24:14', NULL, 0),
(52, 'bhakhar nitin uploaded new document', 'Your Client bhakhar nitin has been recently uploaded new document: PAN Card.', 22, 0, '2023-06-03 16:24:30', '2023-06-03 16:24:30', NULL, 0),
(53, 'bhakhar nitin uploaded new document', 'Your Client bhakhar nitin has been recently uploaded new document: LIC Receipt.', 22, 0, '2023-06-03 16:25:11', '2023-06-03 16:25:11', NULL, 0),
(54, 'bhakhar nitin uploaded new document', 'Your Client bhakhar nitin has been recently uploaded new document: Form 16.', 22, 0, '2023-06-03 16:25:27', '2023-06-03 16:25:27', NULL, 0),
(55, 'bhakhar nitin uploaded new document', 'Your Client bhakhar nitin has been recently uploaded new document: Passport Photo.', 22, 0, '2023-06-03 16:25:39', '2023-06-03 16:25:39', NULL, 0),
(56, '7867', 'y768yi', 23, 0, '2023-06-03 16:31:42', '2023-06-03 16:31:42', NULL, 22),
(57, 'Asodariya Consutancy viewed your document', 'Your Aadhaar Card has been recently viewed by your accountant firm, Asodariya Consutancy.', 23, 0, '2023-06-03 16:31:55', '2023-06-03 16:31:55', NULL, 0),
(58, 'Asodariya Consutancy viewed your document', 'Your PAN Card has been recently viewed by your accountant firm, Asodariya Consutancy.', 23, 0, '2023-06-03 16:55:47', '2023-06-03 16:55:47', NULL, 0),
(59, 'bhakhar nitin uploaded new document', 'Your Client bhakhar nitin has been recently uploaded new document: Loan Statement.', 22, 0, '2023-06-03 16:58:47', '2023-06-03 16:58:47', NULL, 0),
(60, 'Asodariya Consutancy viewed your document', 'Your Passport Photo has been recently viewed by your accountant firm, Asodariya Consutancy.', 23, 0, '2023-06-03 17:05:45', '2023-06-03 17:05:45', NULL, 0),
(61, 'Asodariya Consutancy viewed your document', 'Your LIC Receipt has been recently viewed by your accountant firm, Asodariya Consutancy.', 23, 0, '2023-06-03 22:43:22', '2023-06-03 22:43:22', NULL, 0),
(62, 'jaydip domadiya uploaded new document', 'Your Client jaydip domadiya has been recently uploaded new document: Sell.', 22, 0, '2023-06-03 22:53:54', '2023-06-03 22:53:54', NULL, 0),
(63, 'jaydip domadiya uploaded new document', 'Your Client jaydip domadiya has been recently uploaded new document: Sell.', 22, 0, '2023-06-03 22:54:19', '2023-06-03 22:54:19', NULL, 0),
(64, 'jaydip domadiya uploaded new document', 'Your Client jaydip domadiya has been recently uploaded new document: Sell.', 22, 0, '2023-06-03 22:54:46', '2023-06-03 22:54:46', NULL, 0),
(65, 'Hello', 'Test Notify', 25, 0, '2023-06-04 00:12:55', '2023-06-04 00:12:55', NULL, 1),
(66, 'HELLO GOHEL', 'VIVK', 26, 1, '2023-06-04 00:40:31', '2023-06-04 00:40:47', NULL, 25),
(67, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Aadhaar Card.', 25, 0, '2023-06-04 00:41:12', '2023-06-04 00:41:12', NULL, 0),
(68, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: PAN Card.', 25, 0, '2023-06-04 00:41:40', '2023-06-04 00:41:40', NULL, 0),
(69, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Election Card.', 25, 0, '2023-06-04 00:42:41', '2023-06-04 00:42:41', NULL, 0),
(70, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Passport Photo.', 25, 0, '2023-06-04 00:43:19', '2023-06-04 00:43:19', NULL, 0),
(71, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: LIC Receipt.', 25, 0, '2023-06-04 00:43:45', '2023-06-04 00:43:45', NULL, 0),
(72, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Education Receipt.', 25, 0, '2023-06-04 00:45:40', '2023-06-04 00:45:40', NULL, 0),
(73, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Education Receipt.', 25, 0, '2023-06-04 00:45:58', '2023-06-04 00:45:58', NULL, 0),
(74, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: LIC Receipt.', 25, 0, '2023-06-04 00:46:24', '2023-06-04 00:46:24', NULL, 0),
(75, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Loan Statement.', 25, 0, '2023-06-04 00:47:54', '2023-06-04 00:47:54', NULL, 0),
(76, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Loan Statement.', 25, 0, '2023-06-04 00:48:22', '2023-06-04 00:48:22', NULL, 0),
(77, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Form 16.', 25, 0, '2023-06-04 00:48:49', '2023-06-04 00:48:49', NULL, 0),
(78, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Back Statement.', 25, 0, '2023-06-04 00:49:43', '2023-06-04 00:49:43', NULL, 0),
(79, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Back Statement.', 25, 0, '2023-06-04 00:50:23', '2023-06-04 00:50:23', NULL, 0),
(80, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Sell.', 25, 0, '2023-06-04 00:50:48', '2023-06-04 00:50:48', NULL, 0),
(81, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Purchase.', 25, 0, '2023-06-04 00:51:08', '2023-06-04 00:51:08', NULL, 0),
(82, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Sell.', 25, 0, '2023-06-04 00:51:38', '2023-06-04 00:51:38', NULL, 0),
(83, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Sell.', 25, 0, '2023-06-04 00:52:22', '2023-06-04 00:52:22', NULL, 0),
(84, 'Vivek Gohel uploaded new document', 'Your Client Vivek Gohel has been recently uploaded new document: Sell.', 25, 0, '2023-06-04 00:52:42', '2023-06-04 00:52:42', NULL, 0),
(85, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Aadhaar Card.', 27, 0, '2023-06-09 11:14:33', '2023-06-09 11:14:33', NULL, 0),
(86, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: PAN Card.', 27, 0, '2023-06-09 11:14:46', '2023-06-09 11:14:46', NULL, 0),
(87, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Education Receipt.', 27, 0, '2023-06-09 11:14:57', '2023-06-09 11:14:57', NULL, 0),
(88, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Back Statement.', 27, 0, '2023-06-09 11:15:15', '2023-06-09 11:15:15', NULL, 0),
(89, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Back Statement.', 27, 0, '2023-06-09 11:15:44', '2023-06-09 11:15:44', NULL, 0),
(90, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Education Receipt.', 27, 0, '2023-06-09 11:16:18', '2023-06-09 11:16:18', NULL, 0),
(91, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Election Card.', 27, 0, '2023-06-09 12:04:15', '2023-06-09 12:04:15', NULL, 0),
(92, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Sell.', 27, 0, '2023-06-09 12:05:48', '2023-06-09 12:05:48', NULL, 0),
(93, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Sell.', 27, 0, '2023-06-09 12:06:43', '2023-06-09 12:06:43', NULL, 0),
(94, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Sell.', 27, 0, '2023-06-09 12:14:00', '2023-06-09 12:14:00', NULL, 0),
(95, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Sell.', 27, 0, '2023-06-09 12:14:00', '2023-06-09 12:14:00', NULL, 0),
(96, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Purchase.', 27, 0, '2023-06-09 12:14:44', '2023-06-09 12:14:44', NULL, 0),
(97, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Purchase.', 27, 0, '2023-06-09 12:15:06', '2023-06-09 12:15:06', NULL, 0),
(98, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Purchase.', 27, 0, '2023-06-09 12:15:06', '2023-06-09 12:15:06', NULL, 0),
(99, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Purchase.', 27, 0, '2023-06-09 12:15:06', '2023-06-09 12:15:06', NULL, 0),
(100, 'Mahesh Patel uploaded new document', 'Your Client Mahesh Patel has been recently uploaded new document: Purchase.', 27, 0, '2023-06-09 12:15:06', '2023-06-09 12:15:06', NULL, 0),
(101, 'Alpeshbhai Haradasbhai Vaghasiya uploaded new document', 'Your Client Alpeshbhai Haradasbhai Vaghasiya has been recently uploaded new document: Bank Statement.', 30, 1, '2023-06-22 21:36:43', '2023-08-26 00:07:56', NULL, 0),
(102, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sell.', 30, 1, '2023-06-22 23:11:28', '2023-08-26 00:07:56', NULL, 0),
(103, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sell.', 30, 1, '2023-06-22 23:11:49', '2023-08-26 00:07:56', NULL, 0),
(104, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sell.', 30, 1, '2023-06-22 23:12:22', '2023-08-26 00:07:56', NULL, 0),
(105, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sell.', 30, 1, '2023-06-22 23:13:06', '2023-08-26 00:07:56', NULL, 0),
(106, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Purchase.', 30, 1, '2023-06-22 23:13:31', '2023-08-26 00:07:56', NULL, 0),
(107, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Purchase.', 30, 1, '2023-06-22 23:13:46', '2023-08-26 00:07:56', NULL, 0),
(108, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Purchase.', 30, 1, '2023-06-22 23:14:39', '2023-08-26 00:07:56', NULL, 0),
(109, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Purchase.', 30, 1, '2023-06-22 23:14:39', '2023-08-26 00:07:56', NULL, 0),
(110, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Purchase.', 30, 1, '2023-06-22 23:14:39', '2023-08-26 00:07:56', NULL, 0),
(111, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Purchase.', 30, 1, '2023-06-22 23:15:08', '2023-08-26 00:07:56', NULL, 0),
(112, 'Asodariya Consultancy viewed your document', 'Your Sell has been recently viewed by your accountant firm, Asodariya Consultancy.', 31, 0, '2023-06-22 23:21:47', '2023-06-22 23:21:47', NULL, 0),
(113, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 31, 0, '2023-06-22 23:21:58', '2023-06-22 23:21:58', NULL, 0),
(114, 'gst', 'send gst data', 37, 0, '2023-06-23 00:01:56', '2023-06-23 00:01:56', NULL, 30),
(115, 'gst', 'send gst data', 36, 0, '2023-06-23 00:01:56', '2023-06-23 00:01:56', NULL, 30),
(116, 'gst', 'send gst data', 34, 0, '2023-06-23 00:01:56', '2023-06-23 00:01:56', NULL, 30),
(117, 'gst', 'send gst data', 33, 0, '2023-06-23 00:01:56', '2023-06-23 00:01:56', NULL, 30),
(118, 'gst', 'send gst data', 31, 0, '2023-06-23 00:01:56', '2023-06-23 00:01:56', NULL, 30),
(119, 'Vijaybhai Mansukhbhai Gajera uploaded new document', 'Your Client Vijaybhai Mansukhbhai Gajera has been recently uploaded new document: Purchase.', 30, 1, '2023-06-23 00:11:19', '2023-08-26 00:07:56', NULL, 0),
(120, 'Vijaybhai Mansukhbhai Gajera uploaded new document', 'Your Client Vijaybhai Mansukhbhai Gajera has been recently uploaded new document: Purchase.', 30, 1, '2023-06-23 00:12:29', '2023-08-26 00:07:56', NULL, 0),
(121, 'Vijaybhai Mansukhbhai Gajera uploaded new document', 'Your Client Vijaybhai Mansukhbhai Gajera has been recently uploaded new document: Purchase.', 30, 1, '2023-06-23 00:13:18', '2023-08-26 00:07:56', NULL, 0),
(122, 'Mahendrabhai Chovatiya uploaded new document', 'Your Client Mahendrabhai Chovatiya has been recently uploaded new document: Sell.', 30, 1, '2023-06-24 12:42:35', '2023-08-26 00:07:56', NULL, 0),
(123, 'Mahendrabhai Chovatiya uploaded new document', 'Your Client Mahendrabhai Chovatiya has been recently uploaded new document: Sell.', 30, 1, '2023-06-24 12:42:35', '2023-08-26 00:07:56', NULL, 0),
(124, 'Mahendrabhai Chovatiya uploaded new document', 'Your Client Mahendrabhai Chovatiya has been recently uploaded new document: Sell.', 30, 1, '2023-06-24 12:42:35', '2023-08-26 00:07:56', NULL, 0),
(125, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Amazon.', 30, 1, '2023-06-24 22:54:41', '2023-08-26 00:07:56', NULL, 0),
(126, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(127, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(128, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(129, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(130, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(131, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(132, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(133, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(134, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(135, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(136, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(137, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(138, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(139, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(140, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:38:11', '2023-07-07 17:26:06', NULL, 0),
(141, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(142, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(143, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(144, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(145, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(146, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(147, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(148, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(149, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(150, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(151, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(152, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(153, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:39:12', '2023-07-07 17:26:06', NULL, 0),
(154, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sell has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-06-26 18:43:32', '2023-06-26 18:43:32', NULL, 0),
(155, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:45:58', '2023-07-07 17:26:06', NULL, 0),
(156, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Purchase.', 44, 1, '2023-06-26 18:46:23', '2023-07-07 17:26:06', NULL, 0),
(157, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Purchase.', 44, 1, '2023-06-26 18:46:23', '2023-07-07 17:26:06', NULL, 0),
(158, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Purchase.', 44, 1, '2023-06-26 18:46:41', '2023-07-07 17:26:06', NULL, 0),
(159, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Purchase.', 44, 1, '2023-06-26 18:47:08', '2023-07-07 17:26:06', NULL, 0),
(160, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-26 18:47:36', '2023-07-07 17:26:06', NULL, 0),
(161, 'SURESH BABUBHAI DESAI uploaded new document', 'Your Client SURESH BABUBHAI DESAI has been recently uploaded new document: Amazon.', 44, 1, '2023-06-27 12:39:20', '2023-07-07 17:26:06', NULL, 0),
(162, 'SURESH BABUBHAI DESAI uploaded new document', 'Your Client SURESH BABUBHAI DESAI has been recently uploaded new document: Sell.', 44, 1, '2023-06-27 12:41:00', '2023-07-07 17:26:06', NULL, 0),
(163, 'Vikash Rameshbhai Patel uploaded new document', 'Your Client Vikash Rameshbhai Patel has been recently uploaded new document: Amazon.', 30, 1, '2023-06-27 13:44:32', '2023-08-26 00:07:56', NULL, 0),
(164, 'Vikash Rameshbhai Patel uploaded new document', 'Your Client Vikash Rameshbhai Patel has been recently uploaded new document: Amazon.', 30, 1, '2023-06-27 13:44:47', '2023-08-26 00:07:56', NULL, 0),
(165, 'Vaghasiya Kaushik Kishorbhai uploaded new document', 'Your Client Vaghasiya Kaushik Kishorbhai has been recently uploaded new document: Aadhaar Card.', 30, 1, '2023-06-30 10:45:57', '2023-08-26 00:07:56', NULL, 0),
(166, 'Vaghasiya Kaushik Kishorbhai uploaded new document', 'Your Client Vaghasiya Kaushik Kishorbhai has been recently uploaded new document: PAN Card.', 30, 1, '2023-06-30 10:46:18', '2023-08-26 00:07:56', NULL, 0),
(167, 'Vaghasiya Kaushik Kishorbhai uploaded new document', 'Your Client Vaghasiya Kaushik Kishorbhai has been recently uploaded new document: Passport Photo.', 30, 1, '2023-06-30 10:46:40', '2023-08-26 00:07:56', NULL, 0),
(168, 'Vaghasiya Kaushik Kishorbhai uploaded new document', 'Your Client Vaghasiya Kaushik Kishorbhai has been recently uploaded new document: Other Documents.', 30, 1, '2023-06-30 10:55:55', '2023-08-26 00:07:56', NULL, 0),
(169, 'Ghanshyambhai Laxmanbhai Asodariya uploaded new document', 'Your Client Ghanshyambhai Laxmanbhai Asodariya has been recently uploaded new document: Form 16.', 30, 1, '2023-06-30 10:56:30', '2023-08-26 00:07:56', NULL, 0),
(170, 'Ghanshyambhai Laxmanbhai Asodariya uploaded new document', 'Your Client Ghanshyambhai Laxmanbhai Asodariya has been recently uploaded new document: Bank Statement.', 30, 1, '2023-06-30 10:57:44', '2023-08-26 00:07:56', NULL, 0),
(171, 'Vaghasiya Kaushik Kishorbhai uploaded new document', 'Your Client Vaghasiya Kaushik Kishorbhai has been recently uploaded new document: Election Card.', 30, 1, '2023-06-30 11:00:00', '2023-08-26 00:07:56', NULL, 0),
(172, 'Ghanshyambhai Laxmanbhai Asodariya uploaded new document', 'Your Client Ghanshyambhai Laxmanbhai Asodariya has been recently uploaded new document: Other Documents.', 30, 1, '2023-06-30 11:07:43', '2023-08-26 00:07:56', NULL, 0),
(173, 'Vaghasiya Kaushik Kishorbhai uploaded new document', 'Your Client Vaghasiya Kaushik Kishorbhai has been recently uploaded new document: Bank Statement.', 30, 1, '2023-06-30 11:10:02', '2023-08-26 00:07:56', NULL, 0),
(174, 'Vaghasiya Kaushik Kishorbhai uploaded new document', 'Your Client Vaghasiya Kaushik Kishorbhai has been recently uploaded new document: Bank Statement.', 30, 1, '2023-06-30 11:10:17', '2023-08-26 00:07:56', NULL, 0),
(175, 'Vaghasiya Kaushik Kishorbhai uploaded new document', 'Your Client Vaghasiya Kaushik Kishorbhai has been recently uploaded new document: Bank Statement.', 30, 1, '2023-06-30 11:10:43', '2023-08-26 00:07:56', NULL, 0),
(176, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: Aadhaar Card.', 30, 1, '2023-06-30 18:58:18', '2023-08-26 00:07:56', NULL, 0),
(177, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: PAN Card.', 30, 1, '2023-06-30 18:59:31', '2023-08-26 00:07:56', NULL, 0),
(178, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: Passport Photo.', 30, 1, '2023-06-30 19:00:01', '2023-08-26 00:07:56', NULL, 0),
(179, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: LIC Receipt.', 30, 1, '2023-06-30 19:04:11', '2023-08-26 00:07:56', NULL, 0),
(180, 'Vikash Rameshbhai Patel uploaded new document', 'Your Client Vikash Rameshbhai Patel has been recently uploaded new document: Aadhaar Card.', 30, 1, '2023-07-01 17:14:17', '2023-08-26 00:07:56', NULL, 0),
(181, 'Vikash Rameshbhai Patel uploaded new document', 'Your Client Vikash Rameshbhai Patel has been recently uploaded new document: PAN Card.', 30, 1, '2023-07-01 17:15:35', '2023-08-26 00:07:56', NULL, 0),
(182, 'Vikash Rameshbhai Patel uploaded new document', 'Your Client Vikash Rameshbhai Patel has been recently uploaded new document: Election Card.', 30, 1, '2023-07-01 17:16:43', '2023-08-26 00:07:56', NULL, 0),
(183, 'Vikash Rameshbhai Patel uploaded new document', 'Your Client Vikash Rameshbhai Patel has been recently uploaded new document: Bank Statement.', 30, 1, '2023-07-01 17:18:08', '2023-08-26 00:07:56', NULL, 0),
(184, 'Asodariya Consultancy viewed your document', 'Your Other Documents has been recently viewed by your accountant firm, Asodariya Consultancy.', 55, 0, '2023-07-01 17:28:14', '2023-07-01 17:28:14', NULL, 0),
(185, 'Asodariya Consultancy viewed your document', 'Your Aadhaar Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 55, 0, '2023-07-01 19:11:56', '2023-07-01 19:11:56', NULL, 0),
(186, 'Asodariya Consultancy viewed your document', 'Your PAN Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 55, 0, '2023-07-01 19:11:59', '2023-07-01 19:11:59', NULL, 0),
(187, 'Asodariya Consultancy viewed your document', 'Your Election Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 55, 0, '2023-07-01 19:12:02', '2023-07-01 19:12:02', NULL, 0),
(188, 'Asodariya Consultancy viewed your document', 'Your Passport Photo has been recently viewed by your accountant firm, Asodariya Consultancy.', 55, 0, '2023-07-01 19:12:06', '2023-07-01 19:12:06', NULL, 0),
(189, 'Asodariya Consultancy viewed your document', 'Your Bank Statement has been recently viewed by your accountant firm, Asodariya Consultancy.', 55, 0, '2023-07-01 19:13:11', '2023-07-01 19:13:11', NULL, 0),
(190, 'Asodariya Consultancy viewed your document', 'Your Bank Statement has been recently viewed by your accountant firm, Asodariya Consultancy.', 55, 0, '2023-07-01 19:14:28', '2023-07-01 19:14:28', NULL, 0),
(191, 'Asodariya Consultancy viewed your document', 'Your Bank Statement has been recently viewed by your accountant firm, Asodariya Consultancy.', 55, 0, '2023-07-01 19:15:48', '2023-07-01 19:15:48', NULL, 0),
(192, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: Bank Statement.', 30, 1, '2023-07-02 10:23:38', '2023-08-26 00:07:56', NULL, 0),
(193, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: Bank Statement.', 30, 1, '2023-07-02 10:24:12', '2023-08-26 00:07:56', NULL, 0),
(194, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: PAN Card.', 30, 1, '2023-07-02 11:01:47', '2023-08-26 00:07:56', NULL, 0),
(195, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: Aadhaar Card.', 30, 1, '2023-07-02 11:02:44', '2023-08-26 00:07:56', NULL, 0),
(196, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: Passport Photo.', 30, 1, '2023-07-02 11:03:03', '2023-08-26 00:07:56', NULL, 0),
(197, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: LIC Receipt.', 30, 1, '2023-07-02 11:04:18', '2023-08-26 00:07:56', NULL, 0),
(198, 'Asodariya Consultancy viewed your document', 'Your Aadhaar Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 56, 0, '2023-07-02 13:58:26', '2023-07-02 13:58:26', NULL, 0),
(199, 'Asodariya Consultancy viewed your document', 'Your PAN Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 56, 0, '2023-07-02 13:58:45', '2023-07-02 13:58:45', NULL, 0),
(200, 'Asodariya Consultancy viewed your document', 'Your Passport Photo has been recently viewed by your accountant firm, Asodariya Consultancy.', 56, 0, '2023-07-02 13:58:55', '2023-07-02 13:58:55', NULL, 0),
(201, 'Asodariya Consultancy viewed your document', 'Your LIC Receipt has been recently viewed by your accountant firm, Asodariya Consultancy.', 56, 0, '2023-07-02 14:00:09', '2023-07-02 14:00:09', NULL, 0),
(202, 'Asodariya Consultancy viewed your document', 'Your Bank Statement has been recently viewed by your accountant firm, Asodariya Consultancy.', 56, 0, '2023-07-02 14:02:48', '2023-07-02 14:02:48', NULL, 0),
(203, 'Asodariya Consultancy viewed your document', 'Your Aadhaar Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 57, 0, '2023-07-02 15:37:43', '2023-07-02 15:37:43', NULL, 0),
(204, 'Asodariya Consultancy viewed your document', 'Your PAN Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 57, 0, '2023-07-02 15:37:53', '2023-07-02 15:37:53', NULL, 0),
(205, 'Asodariya Consultancy viewed your document', 'Your Passport Photo has been recently viewed by your accountant firm, Asodariya Consultancy.', 57, 0, '2023-07-02 15:37:57', '2023-07-02 15:37:57', NULL, 0),
(206, 'Asodariya Consultancy viewed your document', 'Your LIC Receipt has been recently viewed by your accountant firm, Asodariya Consultancy.', 57, 0, '2023-07-02 15:45:24', '2023-07-02 15:45:24', NULL, 0),
(207, 'Asodariya Consultancy viewed your document', 'Your Bank Statement has been recently viewed by your accountant firm, Asodariya Consultancy.', 56, 0, '2023-07-03 10:23:57', '2023-07-03 10:23:57', NULL, 0),
(208, 'Nilesh Bhikhabhai Sojitra uploaded new document', 'Your Client Nilesh Bhikhabhai Sojitra has been recently uploaded new document: Aadhaar Card.', 30, 1, '2023-07-03 18:16:10', '2023-08-26 00:07:56', NULL, 0),
(209, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 1, '2023-07-05 16:19:11', '2023-08-26 00:07:56', NULL, 0),
(210, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 1, '2023-07-05 16:19:53', '2023-08-26 00:07:56', NULL, 0),
(211, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 1, '2023-07-05 16:36:12', '2023-08-26 00:07:56', NULL, 0),
(212, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 1, '2023-07-05 16:38:08', '2023-08-26 00:07:56', NULL, 0),
(213, 'Bhavdip Vinodbhai Ramani uploaded new document', 'Your Client Bhavdip Vinodbhai Ramani has been recently uploaded new document: Aadhaar Card.', 30, 1, '2023-07-05 17:36:04', '2023-08-26 00:07:56', NULL, 0),
(214, 'Bhavdip Vinodbhai Ramani uploaded new document', 'Your Client Bhavdip Vinodbhai Ramani has been recently uploaded new document: PAN Card.', 30, 1, '2023-07-05 17:36:35', '2023-08-26 00:07:56', NULL, 0),
(215, 'Bhavdip Vinodbhai Ramani uploaded new document', 'Your Client Bhavdip Vinodbhai Ramani has been recently uploaded new document: Election Card.', 30, 1, '2023-07-05 17:37:07', '2023-08-26 00:07:56', NULL, 0),
(216, 'Bhavdip Vinodbhai Ramani uploaded new document', 'Your Client Bhavdip Vinodbhai Ramani has been recently uploaded new document: Passport Photo.', 30, 1, '2023-07-05 17:37:29', '2023-08-26 00:07:56', NULL, 0),
(217, 'Bhavdip Vinodbhai Ramani uploaded new document', 'Your Client Bhavdip Vinodbhai Ramani has been recently uploaded new document: LIC Receipt.', 30, 1, '2023-07-05 17:39:30', '2023-08-26 00:07:56', NULL, 0),
(218, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: Other Documents.', 30, 1, '2023-07-06 09:52:45', '2023-08-26 00:07:56', NULL, 0),
(219, 'Asodariya Consultancy viewed your document', 'Your Form 16 has been recently viewed by your accountant firm, Asodariya Consultancy.', 41, 0, '2023-07-07 13:01:47', '2023-07-07 13:01:47', NULL, 0),
(220, 'Asodariya Consultancy viewed your document', 'Your Bank Statement has been recently viewed by your accountant firm, Asodariya Consultancy.', 41, 0, '2023-07-07 13:01:59', '2023-07-07 13:01:59', NULL, 0),
(221, 'Asodariya Consultancy viewed your document', 'Your Other Documents has been recently viewed by your accountant firm, Asodariya Consultancy.', 41, 0, '2023-07-07 13:03:13', '2023-07-07 13:03:13', NULL, 0),
(222, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 1, '2023-07-07 14:53:28', '2023-07-07 17:26:06', NULL, 0),
(223, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 1, '2023-07-07 14:53:28', '2023-07-07 17:26:06', NULL, 0),
(224, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 1, '2023-07-07 14:53:28', '2023-07-07 17:26:06', NULL, 0),
(225, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 1, '2023-07-07 14:53:28', '2023-07-07 17:26:06', NULL, 0),
(226, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 1, '2023-07-07 14:53:28', '2023-07-07 17:26:06', NULL, 0),
(227, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 1, '2023-07-07 14:55:53', '2023-07-07 17:26:06', NULL, 0),
(228, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 1, '2023-07-07 14:55:53', '2023-07-07 17:26:06', NULL, 0),
(229, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 1, '2023-07-07 14:55:53', '2023-07-07 17:26:06', NULL, 0),
(230, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 1, '2023-07-07 14:55:53', '2023-07-07 17:26:06', NULL, 0),
(231, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 1, '2023-07-07 14:55:53', '2023-07-07 17:26:06', NULL, 0),
(232, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Purchase.', 44, 1, '2023-07-07 15:25:02', '2023-07-07 17:26:06', NULL, 0),
(233, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Purchase.', 44, 1, '2023-07-07 15:25:02', '2023-07-07 17:26:06', NULL, 0),
(234, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Purchase.', 44, 1, '2023-07-07 15:25:02', '2023-07-07 17:26:06', NULL, 0),
(235, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-07-07 16:04:49', '2023-07-07 16:04:49', NULL, 0),
(236, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-07-07 16:04:52', '2023-07-07 16:04:52', NULL, 0),
(237, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-07-07 16:04:56', '2023-07-07 16:04:56', NULL, 0),
(238, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-07-07 16:04:58', '2023-07-07 16:04:58', NULL, 0),
(239, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-07-07 16:05:00', '2023-07-07 16:05:00', NULL, 0),
(240, 'S G KALENA & ASSOCIATES viewed your document', 'Your Purchase has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-07-07 16:05:25', '2023-07-07 16:05:25', NULL, 0),
(241, 'S G KALENA & ASSOCIATES viewed your document', 'Your Purchase has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-07-07 16:05:28', '2023-07-07 16:05:28', NULL, 0),
(242, 'S G KALENA & ASSOCIATES viewed your document', 'Your Purchase has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-07-07 16:05:30', '2023-07-07 16:05:30', NULL, 0),
(243, 'MAHESHBHAI BABUBHAI KATHAROTIYA uploaded new document', 'Your Client MAHESHBHAI BABUBHAI KATHAROTIYA has been recently uploaded new document: Sales.', 44, 1, '2023-07-07 17:28:56', '2023-07-07 19:43:39', NULL, 0),
(244, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 1, '2023-07-08 13:19:39', '2023-08-26 00:07:56', NULL, 0),
(245, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 1, '2023-07-08 13:19:57', '2023-08-26 00:07:56', NULL, 0),
(246, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Amazon.', 30, 1, '2023-07-08 13:22:17', '2023-08-26 00:07:56', NULL, 0),
(247, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Amazon.', 30, 1, '2023-07-08 13:22:36', '2023-08-26 00:07:56', NULL, 0),
(248, 'Asodariya Consultancy viewed your document', 'Your Other Documents has been recently viewed by your accountant firm, Asodariya Consultancy.', 56, 0, '2023-07-08 17:18:04', '2023-07-08 17:18:04', NULL, 0),
(249, 'hvh', 'bnn', 58, 0, '2023-07-08 17:20:26', '2023-07-08 17:20:26', NULL, 30),
(250, 'ZALAVADIYA JASMITKUMAR BHARATBHAI uploaded new document', 'Your Client ZALAVADIYA JASMITKUMAR BHARATBHAI has been recently uploaded new document: Aadhaar Card.', 44, 0, '2023-07-08 17:49:43', '2023-07-08 17:49:43', NULL, 0),
(251, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Bank Statement.', 30, 1, '2023-07-08 23:39:45', '2023-08-26 00:07:56', NULL, 0),
(252, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 1, '2023-07-08 23:41:49', '2023-08-26 00:07:56', NULL, 0),
(253, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 30, 1, '2023-07-08 23:42:15', '2023-08-26 00:07:56', NULL, 0),
(254, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 1, '2023-07-08 23:43:14', '2023-08-26 00:07:56', NULL, 0),
(255, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Form 16.', 30, 1, '2023-07-08 23:43:35', '2023-08-26 00:07:56', NULL, 0),
(256, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Education Receipt.', 30, 1, '2023-07-08 23:43:50', '2023-08-26 00:07:56', NULL, 0),
(257, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: Bank Statement.', 30, 1, '2023-07-15 15:35:43', '2023-08-26 00:07:56', NULL, 0),
(258, 'MILAN PRAFULBHAI RIBDIYA uploaded new document', 'Your Client MILAN PRAFULBHAI RIBDIYA has been recently uploaded new document: Bank Statement.', 30, 1, '2023-07-15 15:54:15', '2023-08-26 00:07:56', NULL, 0),
(259, 'Vikash Rameshbhai Patel uploaded new document', 'Your Client Vikash Rameshbhai Patel has been recently uploaded new document: Bank Statement.', 30, 1, '2023-07-17 11:34:02', '2023-08-26 00:07:56', NULL, 0),
(260, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 1, '2023-07-17 22:21:57', '2023-08-26 00:07:56', NULL, 0);
INSERT INTO `notifications` (`id`, `title`, `description`, `to_id`, `read_status`, `created_at`, `updated_at`, `attachment`, `send_by`) VALUES
(261, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 1, '2023-07-17 22:22:19', '2023-08-26 00:07:56', NULL, 0),
(262, 'Asodariya Consultancy viewed your document', 'Your Bank Statement has been recently viewed by your accountant firm, Asodariya Consultancy.', 57, 0, '2023-07-18 14:59:38', '2023-07-18 14:59:38', NULL, 0),
(263, 'Asodariya Consultancy viewed your document', 'Your Bank Statement has been recently viewed by your accountant firm, Asodariya Consultancy.', 57, 0, '2023-07-18 14:59:52', '2023-07-18 14:59:52', NULL, 0),
(264, 'Asodariya Consultancy viewed your document', 'Your Aadhaar Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 51, 0, '2023-07-18 15:25:23', '2023-07-18 15:25:23', NULL, 0),
(265, 'Asodariya Consultancy viewed your document', 'Your PAN Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 51, 0, '2023-07-18 15:25:25', '2023-07-18 15:25:25', NULL, 0),
(266, 'Asodariya Consultancy viewed your document', 'Your Election Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 51, 0, '2023-07-18 15:25:29', '2023-07-18 15:25:29', NULL, 0),
(267, 'Asodariya Consultancy viewed your document', 'Your Bank Statement has been recently viewed by your accountant firm, Asodariya Consultancy.', 51, 0, '2023-07-18 15:30:54', '2023-07-18 15:30:54', NULL, 0),
(268, 'Asodariya Consultancy viewed your document', 'Your Bank Statement has been recently viewed by your accountant firm, Asodariya Consultancy.', 51, 0, '2023-07-18 15:32:11', '2023-07-18 15:32:11', NULL, 0),
(269, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-07-20 15:30:13', '2023-07-20 15:30:13', NULL, 0),
(270, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-07-20 15:37:20', '2023-07-20 15:37:20', NULL, 0),
(271, 'Asodariya Consultancy viewed your document', 'Your Bank Statement has been recently viewed by your accountant firm, Asodariya Consultancy.', 36, 0, '2023-07-27 22:28:29', '2023-07-27 22:28:29', NULL, 0),
(272, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 1, '2023-07-31 18:25:25', '2023-08-26 00:07:56', NULL, 0),
(273, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-08-03 15:53:51', '2023-08-03 15:53:51', NULL, 0),
(274, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-08-03 15:53:51', '2023-08-03 15:53:51', NULL, 0),
(275, 'moklo gst sale report', 'mokl', 77, 0, '2023-08-09 12:19:04', '2023-08-09 12:19:04', NULL, 76),
(276, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-08-10 10:41:07', '2023-08-10 10:41:07', NULL, 0),
(277, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-08-10 10:41:07', '2023-08-10 10:41:07', NULL, 0),
(278, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-08-14 22:17:17', '2023-08-14 22:17:17', NULL, 0),
(279, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 31, 0, '2023-08-14 22:17:28', '2023-08-14 22:17:28', NULL, 0),
(280, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 1, '2023-08-17 21:09:34', '2023-08-26 00:07:56', NULL, 0),
(281, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 1, '2023-08-17 21:09:50', '2023-08-26 00:07:56', NULL, 0),
(282, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 1, '2023-08-17 21:11:51', '2023-08-26 00:07:56', NULL, 0),
(283, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 1, '2023-08-17 21:13:12', '2023-08-26 00:07:56', NULL, 0),
(284, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 1, '2023-08-17 21:15:07', '2023-08-26 00:07:56', NULL, 0),
(285, 'Asodariya Consultancy viewed your document', 'Your Aadhaar Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 39, 0, '2023-08-23 15:41:58', '2023-08-23 15:41:58', NULL, 0),
(286, 'Asodariya Consultancy viewed your document', 'Your PAN Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 39, 0, '2023-08-23 15:42:03', '2023-08-23 15:42:03', NULL, 0),
(287, 'Asodariya Consultancy viewed your document', 'Your Election Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 39, 0, '2023-08-23 15:42:07', '2023-08-23 15:42:07', NULL, 0),
(288, 'Asodariya Consultancy viewed your document', 'Your Passport Photo has been recently viewed by your accountant firm, Asodariya Consultancy.', 39, 0, '2023-08-23 15:42:10', '2023-08-23 15:42:10', NULL, 0),
(289, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-08-24 14:32:39', '2023-08-24 14:32:39', NULL, 0),
(290, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-08-24 14:38:58', '2023-08-24 14:38:58', NULL, 0),
(291, 'GST', 'INCOME TAX RETURN', 76, 1, '2023-08-25 22:15:58', '2023-08-25 22:17:14', NULL, 1),
(292, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Aadhaar Card.', 78, 0, '2023-08-25 22:38:39', '2023-08-25 22:38:39', NULL, 0),
(293, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Amazon.', 78, 0, '2023-08-25 22:42:29', '2023-08-25 22:42:29', NULL, 0),
(294, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Amazon.', 78, 0, '2023-08-25 22:43:04', '2023-08-25 22:43:04', NULL, 0),
(295, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 1, '2023-08-25 23:46:59', '2023-08-26 00:07:56', NULL, 0),
(296, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 1, '2023-08-26 00:01:36', '2023-08-26 00:07:56', NULL, 0),
(297, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 0, '2023-08-26 13:30:50', '2023-08-26 13:30:50', NULL, 0),
(298, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 0, '2023-08-26 13:32:34', '2023-08-26 13:32:34', NULL, 0),
(299, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 0, '2023-08-26 13:48:23', '2023-08-26 13:48:23', NULL, 0),
(300, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 0, '2023-08-26 13:56:19', '2023-08-26 13:56:19', NULL, 0),
(301, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 0, '2023-08-26 14:01:37', '2023-08-26 14:01:37', NULL, 0),
(302, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 0, '2023-08-26 14:01:54', '2023-08-26 14:01:54', NULL, 0),
(303, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 0, '2023-08-26 14:02:29', '2023-08-26 14:02:29', NULL, 0),
(304, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 0, '2023-08-26 14:02:48', '2023-08-26 14:02:48', NULL, 0),
(305, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Meesho.', 30, 0, '2023-08-27 10:40:22', '2023-08-27 10:40:22', NULL, 0),
(306, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Sales.', 78, 0, '2023-08-27 10:58:46', '2023-08-27 10:58:46', NULL, 0),
(307, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Sales.', 78, 0, '2023-08-27 10:59:34', '2023-08-27 10:59:34', NULL, 0),
(308, 'Test', 'Test', 31, 0, '2023-08-27 11:41:00', '2023-08-27 11:41:00', NULL, 30),
(309, 'Test', 'Test', 31, 0, '2023-08-27 11:41:21', '2023-08-27 11:41:21', NULL, 30),
(310, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Sales.', 78, 0, '2023-08-27 16:24:48', '2023-08-27 16:24:48', NULL, 0),
(311, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-09-02 13:19:59', '2023-09-02 13:19:59', NULL, 0),
(312, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-09-02 13:19:59', '2023-09-02 13:19:59', NULL, 0),
(313, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-09-02 13:19:59', '2023-09-02 13:19:59', NULL, 0),
(314, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-09-02 13:19:59', '2023-09-02 13:19:59', NULL, 0),
(315, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-09-02 13:19:59', '2023-09-02 13:19:59', NULL, 0),
(316, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-09-02 13:19:59', '2023-09-02 13:19:59', NULL, 0),
(317, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-09-02 16:55:27', '2023-09-02 16:55:27', NULL, 0),
(318, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Bank Statement.', 30, 0, '2023-09-02 17:32:04', '2023-09-02 17:32:04', NULL, 0),
(319, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: LIC Receipt.', 30, 0, '2023-09-02 17:33:09', '2023-09-02 17:33:09', NULL, 0),
(320, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: LIC Receipt.', 30, 0, '2023-09-02 17:33:19', '2023-09-02 17:33:19', NULL, 0),
(321, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-09-05 15:08:28', '2023-09-05 15:08:28', NULL, 0),
(322, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-09-05 15:08:31', '2023-09-05 15:08:31', NULL, 0),
(323, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-09-05 15:08:33', '2023-09-05 15:08:33', NULL, 0),
(324, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-09-05 15:08:35', '2023-09-05 15:08:35', NULL, 0),
(325, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-09-05 15:08:38', '2023-09-05 15:08:38', NULL, 0),
(326, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-09-05 15:08:40', '2023-09-05 15:08:40', NULL, 0),
(327, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-09-05 15:08:43', '2023-09-05 15:08:43', NULL, 0),
(328, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-09-05 15:08:45', '2023-09-05 15:08:45', NULL, 0),
(329, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-09-05 15:08:47', '2023-09-05 15:08:47', NULL, 0),
(330, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-09-05 15:08:53', '2023-09-05 15:08:53', NULL, 0),
(331, 'S G KALENA & ASSOCIATES viewed your document', 'Your Sales has been recently viewed by your accountant firm, S G KALENA & ASSOCIATES.', 50, 0, '2023-09-05 15:09:10', '2023-09-05 15:09:10', NULL, 0),
(332, 'AAVIS TAX CONSULTANCY viewed your document', 'Your Aadhaar Card has been recently viewed by your accountant firm, AAVIS TAX CONSULTANCY.', 79, 0, '2023-09-06 10:19:21', '2023-09-06 10:19:21', NULL, 0),
(333, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Sales.', 78, 0, '2023-09-06 10:32:06', '2023-09-06 10:32:06', NULL, 0),
(334, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Sales.', 78, 0, '2023-09-06 10:32:06', '2023-09-06 10:32:06', NULL, 0),
(335, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Meesho.', 78, 0, '2023-09-06 10:32:42', '2023-09-06 10:32:42', NULL, 0),
(336, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Meesho.', 78, 0, '2023-09-06 10:33:36', '2023-09-06 10:33:36', NULL, 0),
(337, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Meesho.', 78, 0, '2023-09-06 10:34:03', '2023-09-06 10:34:03', NULL, 0),
(338, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Flipkart.', 78, 0, '2023-09-06 10:35:20', '2023-09-06 10:35:20', NULL, 0),
(339, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Flipkart.', 78, 0, '2023-09-06 10:36:10', '2023-09-06 10:36:10', NULL, 0),
(340, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Meesho.', 78, 0, '2023-09-06 10:39:29', '2023-09-06 10:39:29', NULL, 0),
(341, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 30, 0, '2023-09-06 21:25:32', '2023-09-06 21:25:32', NULL, 0),
(342, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 30, 0, '2023-09-06 21:25:48', '2023-09-06 21:25:48', NULL, 0),
(343, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 30, 0, '2023-09-06 21:25:59', '2023-09-06 21:25:59', NULL, 0),
(344, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 30, 0, '2023-09-06 21:33:49', '2023-09-06 21:33:49', NULL, 0),
(345, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Election Card.', 30, 0, '2023-09-06 21:35:23', '2023-09-06 21:35:23', NULL, 0),
(346, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Passport Photo.', 30, 0, '2023-09-06 21:36:07', '2023-09-06 21:36:07', NULL, 0),
(347, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Other Documents.', 30, 0, '2023-09-06 21:36:25', '2023-09-06 21:36:25', NULL, 0),
(348, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Passport Photo.', 30, 0, '2023-09-06 22:11:23', '2023-09-06 22:11:23', NULL, 0),
(349, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-09-07 11:50:55', '2023-09-07 11:50:55', NULL, 0),
(350, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-09-07 11:51:29', '2023-09-07 11:51:29', NULL, 0),
(351, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-09-07 11:54:41', '2023-09-07 11:54:41', NULL, 0),
(352, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: LIC Receipt.', 30, 0, '2023-09-07 12:31:45', '2023-09-07 12:31:45', NULL, 0),
(353, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: LIC Receipt.', 30, 0, '2023-09-07 19:30:31', '2023-09-07 19:30:31', NULL, 0),
(354, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Form 16.', 30, 0, '2023-09-07 19:32:56', '2023-09-07 19:32:56', NULL, 0),
(355, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Education Receipt.', 30, 0, '2023-09-07 19:34:54', '2023-09-07 19:34:54', NULL, 0),
(356, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Loan Statement.', 30, 0, '2023-09-07 19:36:00', '2023-09-07 19:36:00', NULL, 0),
(357, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Loan Statement.', 30, 0, '2023-09-07 19:36:12', '2023-09-07 19:36:12', NULL, 0),
(358, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Bank Statement.', 30, 0, '2023-09-08 11:54:18', '2023-09-08 11:54:18', NULL, 0),
(359, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Other Documents.', 30, 0, '2023-09-08 12:14:44', '2023-09-08 12:14:44', NULL, 0),
(360, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Other Documents.', 30, 0, '2023-09-08 12:17:06', '2023-09-08 12:17:06', NULL, 0),
(361, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Other Documents.', 30, 0, '2023-09-08 13:34:38', '2023-09-08 13:34:38', NULL, 0),
(362, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Other Documents.', 30, 0, '2023-09-08 13:34:58', '2023-09-08 13:34:58', NULL, 0),
(363, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Other Documents.', 30, 0, '2023-09-08 14:24:07', '2023-09-08 14:24:07', NULL, 0),
(364, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 14:40:28', '2023-09-08 14:40:28', NULL, 0),
(365, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 14:41:07', '2023-09-08 14:41:07', NULL, 0),
(366, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 14:41:33', '2023-09-08 14:41:33', NULL, 0),
(367, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 14:46:34', '2023-09-08 14:46:34', NULL, 0),
(368, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 14:58:30', '2023-09-08 14:58:30', NULL, 0),
(369, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 14:59:25', '2023-09-08 14:59:25', NULL, 0),
(370, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 14:59:50', '2023-09-08 14:59:50', NULL, 0),
(371, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Credit Notes.', 30, 0, '2023-09-08 19:37:34', '2023-09-08 19:37:34', NULL, 0),
(372, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Credit Notes.', 30, 0, '2023-09-08 19:38:01', '2023-09-08 19:38:01', NULL, 0),
(373, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 19:57:08', '2023-09-08 19:57:08', NULL, 0),
(374, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 19:57:16', '2023-09-08 19:57:16', NULL, 0),
(375, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 19:57:23', '2023-09-08 19:57:23', NULL, 0),
(376, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 19:57:42', '2023-09-08 19:57:42', NULL, 0),
(377, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 19:57:51', '2023-09-08 19:57:51', NULL, 0),
(378, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 19:58:03', '2023-09-08 19:58:03', NULL, 0),
(379, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 19:58:22', '2023-09-08 19:58:22', NULL, 0),
(380, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 19:58:33', '2023-09-08 19:58:33', NULL, 0),
(381, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 19:58:43', '2023-09-08 19:58:43', NULL, 0),
(382, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 19:59:00', '2023-09-08 19:59:00', NULL, 0),
(383, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 20:00:06', '2023-09-08 20:00:06', NULL, 0),
(384, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 20:00:14', '2023-09-08 20:00:14', NULL, 0),
(385, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 20:00:24', '2023-09-08 20:00:24', NULL, 0),
(386, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Debit Notes.', 30, 0, '2023-09-08 20:00:35', '2023-09-08 20:00:35', NULL, 0),
(387, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Debit Notes.', 30, 0, '2023-09-08 20:00:46', '2023-09-08 20:00:46', NULL, 0),
(388, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Debit Notes.', 30, 0, '2023-09-08 20:00:57', '2023-09-08 20:00:57', NULL, 0),
(389, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Debit Notes.', 30, 0, '2023-09-08 20:01:13', '2023-09-08 20:01:13', NULL, 0),
(390, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Debit Notes.', 30, 0, '2023-09-08 20:01:41', '2023-09-08 20:01:41', NULL, 0),
(391, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Debit Notes.', 30, 0, '2023-09-08 20:01:59', '2023-09-08 20:01:59', NULL, 0),
(392, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Debit Notes.', 30, 0, '2023-09-08 20:02:16', '2023-09-08 20:02:16', NULL, 0),
(393, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 20:02:59', '2023-09-08 20:02:59', NULL, 0),
(394, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 20:04:21', '2023-09-08 20:04:21', NULL, 0),
(395, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 20:04:29', '2023-09-08 20:04:29', NULL, 0),
(396, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 20:04:37', '2023-09-08 20:04:37', NULL, 0),
(397, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-08 20:04:47', '2023-09-08 20:04:47', NULL, 0),
(398, 'Smit V. Ktakpara uploaded new document', 'Your Client Smit V. Ktakpara has been recently uploaded new document: Meesho.', 30, 0, '2023-09-10 12:54:08', '2023-09-10 12:54:08', NULL, 0),
(399, 'Smit V. Ktakpara uploaded new document', 'Your Client Smit V. Ktakpara has been recently uploaded new document: Meesho.', 30, 0, '2023-09-10 12:54:28', '2023-09-10 12:54:28', NULL, 0),
(400, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Amazon.', 30, 0, '2023-09-11 11:53:54', '2023-09-11 11:53:54', NULL, 0),
(401, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-11 12:27:04', '2023-09-11 12:27:04', NULL, 0),
(402, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-11 12:27:20', '2023-09-11 12:27:20', NULL, 0),
(403, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Debit Notes.', 30, 0, '2023-09-18 14:51:16', '2023-09-18 14:51:16', NULL, 0),
(404, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-18 19:13:44', '2023-09-18 19:13:44', NULL, 0),
(405, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:22:32', '2023-09-25 22:22:32', NULL, 0),
(406, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:22:32', '2023-09-25 22:22:32', NULL, 0),
(407, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:27:57', '2023-09-25 22:27:57', NULL, 0),
(408, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:27:57', '2023-09-25 22:27:57', NULL, 0),
(409, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:30:59', '2023-09-25 22:30:59', NULL, 0),
(410, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:30:59', '2023-09-25 22:30:59', NULL, 0),
(411, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:30:59', '2023-09-25 22:30:59', NULL, 0),
(412, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:30:59', '2023-09-25 22:30:59', NULL, 0),
(413, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:30:59', '2023-09-25 22:30:59', NULL, 0),
(414, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:33:54', '2023-09-25 22:33:54', NULL, 0),
(415, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:33:54', '2023-09-25 22:33:54', NULL, 0),
(416, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:33:54', '2023-09-25 22:33:54', NULL, 0),
(417, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:33:54', '2023-09-25 22:33:54', NULL, 0),
(418, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-09-25 22:33:54', '2023-09-25 22:33:54', NULL, 0),
(419, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 30, 0, '2023-10-02 12:05:28', '2023-10-02 12:05:28', NULL, 0),
(420, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 30, 0, '2023-10-02 12:05:28', '2023-10-02 12:05:28', NULL, 0),
(421, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 30, 0, '2023-10-02 12:05:28', '2023-10-02 12:05:28', NULL, 0),
(422, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 30, 0, '2023-10-02 12:05:28', '2023-10-02 12:05:28', NULL, 0),
(423, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-10-02 12:06:21', '2023-10-02 12:06:21', NULL, 0),
(424, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-10-02 12:06:21', '2023-10-02 12:06:21', NULL, 0),
(425, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-10-02 12:06:21', '2023-10-02 12:06:21', NULL, 0),
(426, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-10-02 12:06:21', '2023-10-02 12:06:21', NULL, 0),
(427, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Passport Photo.', 30, 0, '2023-10-02 12:28:22', '2023-10-02 12:28:22', NULL, 0),
(428, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:21', '2023-10-03 11:49:21', NULL, 0),
(429, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:21', '2023-10-03 11:49:21', NULL, 0),
(430, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:21', '2023-10-03 11:49:21', NULL, 0),
(431, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', NULL, 0),
(432, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', NULL, 0),
(433, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', NULL, 0),
(434, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', NULL, 0),
(435, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', NULL, 0),
(436, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', NULL, 0),
(437, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', NULL, 0),
(438, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', NULL, 0),
(439, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', NULL, 0),
(440, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', NULL, 0),
(441, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:22', '2023-10-03 11:49:22', NULL, 0),
(442, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:23', '2023-10-03 11:49:23', NULL, 0),
(443, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:23', '2023-10-03 11:49:23', NULL, 0),
(444, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:23', '2023-10-03 11:49:23', NULL, 0),
(445, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:23', '2023-10-03 11:49:23', NULL, 0),
(446, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:23', '2023-10-03 11:49:23', NULL, 0),
(447, 'PARESH BHIMJIBHAI DESAI uploaded new document', 'Your Client PARESH BHIMJIBHAI DESAI has been recently uploaded new document: Sales.', 44, 0, '2023-10-03 11:49:23', '2023-10-03 11:49:23', NULL, 0),
(448, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: LIC Receipt.', 30, 0, '2023-10-06 06:08:14', '2023-10-06 06:08:14', NULL, 0),
(449, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Other Documents.', 30, 0, '2023-10-09 19:50:19', '2023-10-09 19:50:19', NULL, 0),
(450, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 30, 0, '2023-10-09 22:41:45', '2023-10-09 22:41:45', NULL, 0),
(451, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-10-09 23:16:08', '2023-10-09 23:16:08', NULL, 0),
(452, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-10-09 23:16:26', '2023-10-09 23:16:26', NULL, 0),
(453, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-10-09 23:16:26', '2023-10-09 23:16:26', NULL, 0),
(454, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-10-09 23:18:19', '2023-10-09 23:18:19', NULL, 0),
(455, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-10-09 23:18:19', '2023-10-09 23:18:19', NULL, 0),
(456, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-10-09 23:18:19', '2023-10-09 23:18:19', NULL, 0),
(457, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-10-09 23:18:40', '2023-10-09 23:18:40', NULL, 0),
(458, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-10-09 23:18:40', '2023-10-09 23:18:40', NULL, 0),
(459, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-10-09 23:18:40', '2023-10-09 23:18:40', NULL, 0),
(460, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-10-09 23:18:40', '2023-10-09 23:18:40', NULL, 0),
(461, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-10-09 23:19:16', '2023-10-09 23:19:16', NULL, 0),
(462, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 30, 0, '2023-10-09 23:19:27', '2023-10-09 23:19:27', NULL, 0),
(463, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2023-10-27 11:24:51', '2023-10-27 11:24:51', NULL, 0),
(464, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-10-27 11:47:51', '2023-10-27 11:47:51', NULL, 0),
(465, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-10-27 11:48:16', '2023-10-27 11:48:16', NULL, 0),
(466, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-10-27 11:49:43', '2023-10-27 11:49:43', NULL, 0),
(467, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-10-27 11:49:43', '2023-10-27 11:49:43', NULL, 0),
(468, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-10-27 11:49:43', '2023-10-27 11:49:43', NULL, 0),
(469, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 12:24:21', '2023-10-29 12:24:21', NULL, 0),
(470, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 12:24:38', '2023-10-29 12:24:38', NULL, 0),
(471, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 12:25:01', '2023-10-29 12:25:01', NULL, 0),
(472, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 12:25:21', '2023-10-29 12:25:21', NULL, 0),
(473, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 12:25:21', '2023-10-29 12:25:21', NULL, 0),
(474, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 12:25:21', '2023-10-29 12:25:21', NULL, 0),
(475, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 12:25:21', '2023-10-29 12:25:21', NULL, 0),
(476, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 12:26:03', '2023-10-29 12:26:03', NULL, 0),
(477, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 12:41:23', '2023-10-29 12:41:23', NULL, 0),
(478, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 14:29:54', '2023-10-29 14:29:54', NULL, 0),
(479, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 14:29:54', '2023-10-29 14:29:54', NULL, 0),
(480, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 31, 0, '2023-10-29 14:30:03', '2023-10-29 14:30:03', NULL, 0),
(481, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 14:59:26', '2023-10-29 14:59:26', NULL, 0),
(482, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 15:02:46', '2023-10-29 15:02:46', NULL, 0),
(483, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-10-29 15:02:46', '2023-10-29 15:02:46', NULL, 0),
(484, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:13:32', '2023-11-01 18:13:32', NULL, 0),
(485, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:13:32', '2023-11-01 18:13:32', NULL, 0),
(486, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:13:32', '2023-11-01 18:13:32', NULL, 0),
(487, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:13:32', '2023-11-01 18:13:32', NULL, 0),
(488, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:13:51', '2023-11-01 18:13:51', NULL, 0),
(489, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:13:51', '2023-11-01 18:13:51', NULL, 0),
(490, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:13:51', '2023-11-01 18:13:51', NULL, 0),
(491, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:13:51', '2023-11-01 18:13:51', NULL, 0),
(492, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:14:38', '2023-11-01 18:14:38', NULL, 0),
(493, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:25:25', '2023-11-01 18:25:25', NULL, 0),
(494, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:25:25', '2023-11-01 18:25:25', NULL, 0),
(495, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:25:25', '2023-11-01 18:25:25', NULL, 0),
(496, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-01 18:25:25', '2023-11-01 18:25:25', NULL, 0),
(497, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Aadhaar Card.', 31, 0, '2023-11-03 13:09:29', '2023-11-03 13:09:29', NULL, 0),
(498, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 13:18:22', '2023-11-03 13:18:22', NULL, 0),
(499, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 13:26:21', '2023-11-03 13:26:21', NULL, 0),
(500, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 13:26:39', '2023-11-03 13:26:39', NULL, 0),
(501, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: PAN Card.', 31, 0, '2023-11-03 13:27:27', '2023-11-03 13:27:27', NULL, 0),
(502, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Election Card.', 31, 0, '2023-11-03 13:27:43', '2023-11-03 13:27:43', NULL, 0),
(503, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 13:28:10', '2023-11-03 13:28:10', NULL, 0),
(504, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Passport Photo.', 31, 0, '2023-11-03 13:28:50', '2023-11-03 13:28:50', NULL, 0),
(505, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Passport Photo.', 31, 0, '2023-11-03 13:29:14', '2023-11-03 13:29:14', NULL, 0),
(506, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Other Documents.', 31, 0, '2023-11-03 13:33:12', '2023-11-03 13:33:12', NULL, 0),
(507, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 14:47:39', '2023-11-03 14:47:39', NULL, 0),
(508, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 14:59:59', '2023-11-03 14:59:59', NULL, 0),
(509, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:01:17', '2023-11-03 15:01:17', NULL, 0),
(510, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:01:18', '2023-11-03 15:01:18', NULL, 0),
(511, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:01:18', '2023-11-03 15:01:18', NULL, 0),
(512, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:01:18', '2023-11-03 15:01:18', NULL, 0),
(513, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:01:18', '2023-11-03 15:01:18', NULL, 0),
(514, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:01:36', '2023-11-03 15:01:36', NULL, 0),
(515, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:01:43', '2023-11-03 15:01:43', NULL, 0),
(516, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:08:43', '2023-11-03 15:08:43', NULL, 0),
(517, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:08:49', '2023-11-03 15:08:49', NULL, 0),
(518, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:19:48', '2023-11-03 15:19:48', NULL, 0);
INSERT INTO `notifications` (`id`, `title`, `description`, `to_id`, `read_status`, `created_at`, `updated_at`, `attachment`, `send_by`) VALUES
(519, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:20:03', '2023-11-03 15:20:03', NULL, 0),
(520, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:20:03', '2023-11-03 15:20:03', NULL, 0),
(521, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-03 15:20:03', '2023-11-03 15:20:03', NULL, 0),
(522, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Election Card.', 78, 0, '2023-11-04 09:02:30', '2023-11-04 09:02:30', NULL, 0),
(523, 'DHRUVIL RIBADIYA uploaded new document', 'Your Client DHRUVIL RIBADIYA has been recently uploaded new document: Other Documents.', 78, 0, '2023-11-04 09:03:39', '2023-11-04 09:03:39', NULL, 0),
(524, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-05 20:42:37', '2023-11-05 20:42:37', NULL, 0),
(525, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 31, 0, '2023-11-05 20:42:37', '2023-11-05 20:42:37', NULL, 0),
(526, 'Vijaybhai Mansukhbhai Gajera uploaded new document', 'Your Client Vijaybhai Mansukhbhai Gajera has been recently uploaded new document: Purchase.', 30, 0, '2023-11-27 16:31:51', '2023-11-27 16:31:51', NULL, 0),
(527, 'Asodariya Consultancy viewed your document', 'Your Bank Statement has been recently viewed by your accountant firm, Asodariya Consultancy.', 57, 0, '2023-12-08 11:27:14', '2023-12-08 11:27:14', NULL, 0),
(528, 'Asodariya Consultancy viewed your document', 'Your LIC Receipt has been recently viewed by your accountant firm, Asodariya Consultancy.', 39, 0, '2023-12-09 13:12:30', '2023-12-09 13:12:30', NULL, 0),
(529, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-13 11:21:32', '2023-12-13 11:21:32', NULL, 0),
(530, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-13 11:22:04', '2023-12-13 11:22:04', NULL, 0),
(531, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: PAN Card.', 30, 0, '2023-12-13 18:14:56', '2023-12-13 18:14:56', NULL, 0),
(532, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-13 18:15:55', '2023-12-13 18:15:55', NULL, 0),
(533, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-15 09:36:06', '2023-12-15 09:36:06', NULL, 0),
(534, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-15 09:36:18', '2023-12-15 09:36:18', NULL, 0),
(535, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-16 12:21:42', '2023-12-16 12:21:42', NULL, 0),
(536, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-16 12:21:55', '2023-12-16 12:21:55', NULL, 0),
(537, 'Paras satasiya uploaded new document', 'Your Client Paras satasiya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2023-12-17 23:25:11', '2023-12-17 23:25:11', NULL, 0),
(538, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-19 13:21:24', '2023-12-19 13:21:24', NULL, 0),
(539, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-19 13:21:45', '2023-12-19 13:21:45', NULL, 0),
(540, 'sebd', 'fsd', 31, 0, '2023-12-20 19:51:15', '2023-12-20 19:51:15', NULL, 30),
(541, '52', '22', 31, 0, '2023-12-20 19:51:45', '2023-12-20 19:51:45', NULL, 30),
(542, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-21 10:12:16', '2023-12-21 10:12:16', NULL, 0),
(543, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-21 10:20:10', '2023-12-21 10:20:10', NULL, 0),
(544, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-21 10:20:29', '2023-12-21 10:20:29', NULL, 0),
(545, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-21 10:20:51', '2023-12-21 10:20:51', NULL, 0),
(546, 'VINUBHAI NAVADIYA uploaded new document', 'Your Client VINUBHAI NAVADIYA has been recently uploaded new document: Amazon.', 91, 0, '2023-12-25 10:37:42', '2023-12-25 10:37:42', NULL, 0),
(547, 'VINUBHAI NAVADIYA uploaded new document', 'Your Client VINUBHAI NAVADIYA has been recently uploaded new document: Meesho.', 91, 0, '2023-12-25 10:41:04', '2023-12-25 10:41:04', NULL, 0),
(548, 'VINUBHAI NAVADIYA uploaded new document', 'Your Client VINUBHAI NAVADIYA has been recently uploaded new document: Meesho.', 91, 0, '2023-12-25 10:41:31', '2023-12-25 10:41:31', NULL, 0),
(549, 'VINUBHAI NAVADIYA uploaded new document', 'Your Client VINUBHAI NAVADIYA has been recently uploaded new document: Aadhaar Card.', 91, 0, '2023-12-25 10:45:01', '2023-12-25 10:45:01', NULL, 0),
(550, 'BALAR AND CO viewed your document', 'Your Aadhaar Card has been recently viewed by your accountant firm, BALAR AND CO.', 92, 0, '2023-12-25 10:45:42', '2023-12-25 10:45:42', NULL, 0),
(551, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-25 13:49:08', '2023-12-25 13:49:08', NULL, 0),
(552, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-25 13:49:21', '2023-12-25 13:49:21', NULL, 0),
(553, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-27 18:33:27', '2023-12-27 18:33:27', NULL, 0),
(554, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-27 18:33:41', '2023-12-27 18:33:41', NULL, 0),
(555, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-27 18:34:04', '2023-12-27 18:34:04', NULL, 0),
(556, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-28 10:19:01', '2023-12-28 10:19:01', NULL, 0),
(557, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-28 10:19:20', '2023-12-28 10:19:20', NULL, 0),
(558, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-28 13:13:12', '2023-12-28 13:13:12', NULL, 0),
(559, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-29 10:05:44', '2023-12-29 10:05:44', NULL, 0),
(560, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2023-12-29 10:05:57', '2023-12-29 10:05:57', NULL, 0),
(561, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-29 10:47:33', '2023-12-29 10:47:33', NULL, 0),
(562, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-29 11:14:10', '2023-12-29 11:14:10', NULL, 0),
(563, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-29 11:14:16', '2023-12-29 11:14:16', NULL, 0),
(564, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-29 11:33:34', '2023-12-29 11:33:34', NULL, 0),
(565, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-29 11:41:09', '2023-12-29 11:41:09', NULL, 0),
(566, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-29 11:51:52', '2023-12-29 11:51:52', NULL, 0),
(567, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-29 11:54:21', '2023-12-29 11:54:21', NULL, 0),
(568, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-29 12:00:50', '2023-12-29 12:00:50', NULL, 0),
(569, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-29 12:04:47', '2023-12-29 12:04:47', NULL, 0),
(570, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-30 11:54:21', '2023-12-30 11:54:21', NULL, 0),
(571, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-30 11:54:24', '2023-12-30 11:54:24', NULL, 0),
(572, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-30 11:54:29', '2023-12-30 11:54:29', NULL, 0),
(573, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-30 11:54:32', '2023-12-30 11:54:32', NULL, 0),
(574, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-30 11:54:36', '2023-12-30 11:54:36', NULL, 0),
(575, 'Asodariya Consultancy viewed your document', 'Your Purchase has been recently viewed by your accountant firm, Asodariya Consultancy.', 88, 0, '2023-12-30 11:55:01', '2023-12-30 11:55:01', NULL, 0),
(576, 'Nitesh Mansukhbhai Mangaroliya uploaded new document', 'Your Client Nitesh Mansukhbhai Mangaroliya has been recently uploaded new document: PAN Card.', 30, 0, '2024-01-02 16:42:08', '2024-01-02 16:42:08', NULL, 0),
(577, 'Asodariya Consultancy viewed your document', 'Your PAN Card has been recently viewed by your accountant firm, Asodariya Consultancy.', 94, 0, '2024-01-02 16:42:42', '2024-01-02 16:42:42', NULL, 0),
(578, 'Nitesh Mansukhbhai Mangaroliya uploaded new document', 'Your Client Nitesh Mansukhbhai Mangaroliya has been recently uploaded new document: Aadhaar Card.', 30, 0, '2024-01-02 16:43:12', '2024-01-02 16:43:12', NULL, 0),
(579, 'Hardikbhai Ghanshyambhai Borad uploaded new document', 'Your Client Hardikbhai Ghanshyambhai Borad has been recently uploaded new document: Purchase.', 30, 0, '2024-01-04 18:19:04', '2024-01-04 18:19:04', NULL, 0),
(580, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Flipkart.', 30, 0, '2024-01-05 12:42:23', '2024-01-05 12:42:23', NULL, 0),
(581, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Flipkart.', 30, 0, '2024-01-05 12:42:48', '2024-01-05 12:42:48', NULL, 0),
(582, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-05 12:48:34', '2024-01-05 12:48:34', NULL, 0),
(583, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-05 12:48:47', '2024-01-05 12:48:47', NULL, 0),
(584, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-05 12:50:15', '2024-01-05 12:50:15', NULL, 0),
(585, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-05 12:50:34', '2024-01-05 12:50:34', NULL, 0),
(586, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Flipkart.', 30, 0, '2024-01-05 12:51:18', '2024-01-05 12:51:18', NULL, 0),
(587, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Flipkart.', 30, 0, '2024-01-05 12:52:03', '2024-01-05 12:52:03', NULL, 0),
(588, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-09 10:35:43', '2024-01-09 10:35:43', NULL, 0),
(589, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-09 10:36:00', '2024-01-09 10:36:00', NULL, 0),
(590, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-09 10:38:41', '2024-01-09 10:38:41', NULL, 0),
(591, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-09 10:38:57', '2024-01-09 10:38:57', NULL, 0),
(592, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-09 10:39:50', '2024-01-09 10:39:50', NULL, 0),
(593, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-09 10:40:21', '2024-01-09 10:40:21', NULL, 0),
(594, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-10 12:37:50', '2024-01-10 12:37:50', NULL, 0),
(595, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-10 12:38:03', '2024-01-10 12:38:03', NULL, 0),
(596, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-10 12:38:31', '2024-01-10 12:38:31', NULL, 0),
(597, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-10 18:02:09', '2024-01-10 18:02:09', NULL, 0),
(598, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-10 18:03:00', '2024-01-10 18:03:00', NULL, 0),
(599, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-10 18:05:07', '2024-01-10 18:05:07', NULL, 0),
(600, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-10 18:05:23', '2024-01-10 18:05:23', NULL, 0),
(601, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-10 18:05:53', '2024-01-10 18:05:53', NULL, 0),
(602, 'Jaydip Shiroya uploaded new document', 'Your Client Jaydip Shiroya has been recently uploaded new document: Amazon.', 30, 0, '2024-01-10 18:06:10', '2024-01-10 18:06:10', NULL, 0),
(603, 'Mahesh Asodariya uploaded new document', 'Your Client Mahesh Asodariya has been recently uploaded new document: Sales.', 30, 0, '2024-01-10 22:42:11', '2024-01-10 22:42:11', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('000b29bbcf7e4eac8fe5e04c0a1fc39b1d349d4207b86fc003b82441915eea37aed021ce58949efa', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-06-07 02:27:45', '2023-06-07 02:27:45', '2024-06-06 21:27:45'),
('0210d13d68fe9d0821527d4d657902ac251c27236ac761de316899dac3129669c8ef813464f58978', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-12 23:04:16', '2023-09-12 23:04:16', '2024-09-12 23:04:16'),
('022381a00bb097151a64c1f15983b136ec56b37d191a220ee7b41da2d988827581fb476e118c9194', 79, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-27 12:07:14', '2023-08-27 12:07:14', '2024-08-27 12:07:14'),
('02694ecead3b4eb512f602d6720b9eed64abd74cc7baf75746a02d33f804a606ff2070ac82d25cfa', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-16 21:23:15', '2023-07-16 21:23:15', '2024-07-16 21:23:15'),
('04232293809e106485d2e4c2d0117cb1005a1f6abbe8c90290a6fd6bda0c6f751058dc68cc05d73b', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 04:35:43', '2023-06-04 04:35:43', '2024-06-03 23:35:43'),
('043ac95d60405d33ebd67795dd30ee5903be1b282436a6a1e7e3feb2aa1f483dc94fe64f6e33ee3a', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-03 15:50:51', '2023-11-03 15:50:51', '2024-11-03 15:50:51'),
('0469e30ac09dfe304bd6e6a724c0641a616fd2d761e97d22ae4a2ff73ad62df26011c8cb921c27e4', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-31 18:35:24', '2023-07-31 18:35:24', '2024-07-31 18:35:24'),
('04bff7fbc4419904502f94950bebda80b76850940b06057cf8b0ab0138eec90c29193297f9df20dc', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-05 21:59:07', '2023-06-05 21:59:07', '2024-06-05 16:59:07'),
('05792bc74cd17b071791b01f004198d9b13b1ae4638ebd372b2cdac3725d41587673fadbcf61040d', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 04:25:46', '2023-06-04 04:25:46', '2024-06-03 23:25:46'),
('060cbdbeaf013a880e72d56d7238b91b6b9bdc00dbef9bc3b94ac192fd53c7cb4f2f71b81667fd2c', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-15 11:44:37', '2023-07-15 11:44:37', '2024-07-15 11:44:37'),
('0787f590f2fa63c56afa332c9a0bf1f499cbd5272102852d141148864ec141207579371bbcbd3e12', 79, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 22:07:07', '2023-09-06 22:07:07', '2024-09-06 22:07:07'),
('0874bfc4e56310053e046dbd6409451fb5106c16b5f1a0ecb5b84bd0197fadc434f1c18e476b113d', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 17:16:35', '2023-10-29 17:16:35', '2024-10-29 17:16:35'),
('08774beee5fc12ba04a2865046243173214917bde761a07e60db63b712b6e57e81e5bdc50eb247c2', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 23:23:51', '2023-06-03 23:23:51', '2024-06-03 18:23:51'),
('088128a038f0b1111bb9f96257ee335c236120a597ee47cd010bfcdb9bc3333f09ef641aa0424f76', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-25 13:08:06', '2023-09-25 13:08:06', '2024-09-25 13:08:06'),
('0a5a32e0633831185d1ef9273473e71821503cfcfe784741abfafcdbfe24241afc27825ec004abed', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 16:18:22', '2023-10-29 16:18:22', '2024-10-29 16:18:22'),
('0ab5218f373777dfe8869feca8ecb68c946a29d98358b3543b40e3378ad8c9863a5eb8bfe5ce87bd', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-07 11:36:14', '2023-09-07 11:36:14', '2024-09-07 11:36:14'),
('0b0970a5d7d08ed84817e862505aa398bba87d62a2f1b633ada981755be02106e75962f3697fc4b0', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-07 02:22:33', '2023-06-07 02:22:33', '2024-06-06 21:22:33'),
('0b4a5a5bdc6823f86e6d7ccda721e6765009de1a005ec2f47d78553414cc159e701820b70ef421dd', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-08 14:23:40', '2023-09-08 14:23:40', '2024-09-08 14:23:40'),
('0b64cd8ad06a1d83a6fc294e1fe3fc23fbc41bf78883700cfce8b902e2f8e0226d8ca0b8df35a7a9', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 23:45:27', '2023-06-03 23:45:27', '2024-06-03 18:45:27'),
('0bb4debd5183959ebe9980d86c227c974a67fdc4d3857f22764878c3385a35a6402c5baee0cfde7f', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-11-03 15:19:27', '2023-11-03 15:19:27', '2024-11-03 15:19:27'),
('0bcb28847a6c0795cdc4c1567122fc6b10d83ed6c1702eeab3519f8d93e9f3705631ef5ac7edacaa', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 23:05:02', '2023-09-06 23:05:02', '2024-09-06 23:05:02'),
('0cd2e8e1c9bf90ed0ab0169279eb0c12bc271932404ab4b8fd0793fe174b0510099fd2eab20c4863', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-25 22:30:10', '2023-09-25 22:30:10', '2024-09-25 22:30:10'),
('0dcd55515a3c7c4279a9fa56755d68115e2894421d8c83e63e7feb26b20a40afde313fdad800ae4f', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-07 00:47:50', '2023-06-07 00:47:50', '2024-06-06 19:47:50'),
('0eb1fb29cfcbe3b7412d96f51de9acf019d4e32c0290fd8fcc99f087b20351f8438139faf30de4f0', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-08 13:31:47', '2023-09-08 13:31:47', '2024-09-08 13:31:47'),
('0ef7f65c7879ce6f51915b36177abfd774e23f9a752b40c99a0340291cfb5c043c632bb2e3fbb9b4', 79, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-04 09:01:31', '2023-11-04 09:01:31', '2024-11-04 09:01:31'),
('0f7abcbe082750368254adc803c9775f38418f285e9b94366ae6df441866d34fda933d9d86a17cfd', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-09 22:24:52', '2023-10-09 22:24:52', '2024-10-09 22:24:52'),
('11b1b232109e720ff1af1b72c66b8dc98d560144fb30400212825d186153cb473f96268390553086', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-25 14:52:40', '2023-09-25 14:52:40', '2024-09-25 14:52:40'),
('11b7323a480a314cedc2541c5dc36e69a6f207af9b6659ee54b426a75ae4a64f502b656ddd2ae9fa', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-07-15 15:37:39', '2023-07-15 15:37:39', '2024-07-15 15:37:39'),
('123e1d20ca39788207a583867085fb03d9652b64ba2a87052e4ab5c78cc8ced59e023dc3ed9d3dd6', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-02 12:27:12', '2023-10-02 12:27:12', '2024-10-02 12:27:12'),
('127c418df671b04c5c8660f817b326ad5dcdba21a2e0cd16a10f81d6c0f1f8f4e6ff9bcce2e8f4c2', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-09 16:02:55', '2023-08-09 16:02:55', '2024-08-09 16:02:55'),
('155c7ffe22bf2d07a269c2589c9be2dd980c1538df0d39ed301fcc7765e2116a92610327cef0895f', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-11-03 12:59:48', '2023-11-03 12:59:48', '2024-11-03 12:59:48'),
('158a84b0d2d76f9d354ca753568130fb94a19fee470b2e69995927cabf0b0cc24aec441cd53dce19', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-16 22:07:09', '2023-09-16 22:07:09', '2024-09-16 22:07:09'),
('1693a9585d660cdace92367614c6d45225cc4b2c8303d6ec36e3440f06314f86743c47b3e46e5b75', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-28 08:03:50', '2023-08-28 08:03:50', '2024-08-28 08:03:50'),
('16e3ad0f4ccd762175d2421b05685151782658b82dea809a8eebe71958d7d6176f483a1660fbed2e', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-08 14:54:30', '2023-09-08 14:54:30', '2024-09-08 14:54:30'),
('1787daf4c98a3a0d225ba8b4f8212e976bcfacb9b6154556049b8d2dddd9777e44c4e6bcbe94137b', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-15 12:20:20', '2023-07-15 12:20:20', '2024-07-15 12:20:20'),
('18b64d980e0b0cf6db04606e151480790550c3dfaf3984b30a8e2cac524bafb23d9cc998ff4d246e', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-09 00:29:26', '2023-09-09 00:29:26', '2024-09-09 00:29:26'),
('1abfc1775d51340237b8acdee985f57513f4815bf398a6d526b2352ed8fd722b73fbccb127968448', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-24 20:17:13', '2023-09-24 20:17:13', '2024-09-24 20:17:13'),
('1ace4cefd2ee5414b5540cbf9ee089a7c3a74b2a7eeeaaf7cbee8029433c72f2dc3bac799c76f697', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-11 12:19:09', '2023-09-11 12:19:09', '2024-09-11 12:19:09'),
('1bc24a6e8d1821f63e083a33245d320cdfe875dcc6aa98714f621c3b942c9fb68974932269434625', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-08-28 07:52:58', '2023-08-28 07:52:58', '2024-08-28 07:52:58'),
('1bf9c9ed935cd37d0bb2b63168669e58bbf3b824ddaa94543e88bd39e524e237f15b6e041dbac3b8', 79, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-27 16:05:51', '2023-08-27 16:05:51', '2024-08-27 16:05:51'),
('1c31599136f7df369dae39415cf55b63d839b9d51777fe9725ed52ab8c02649a517d728c4a3654ec', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 20:28:03', '2023-06-06 20:28:03', '2024-06-06 15:28:03'),
('1d395d7a6a09594b5c80aac4040ad9f3f243848eabe390a21bb2011cfeb52e6a7d7a8bcae145afc8', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 22:37:28', '2023-09-06 22:37:28', '2024-09-06 22:37:28'),
('1d570e922068c7ad347bc3e77190ffe32bc9932c50068fbe83c57d0cd3747a8dee0c1b772c328504', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 21:24:23', '2023-06-03 21:24:23', '2024-06-03 16:24:23'),
('1fa10f0996db3075e0785e1f604385de4b9ee8ffd0c0c22651f9b28ee91c6f1576cee35097924522', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-03 15:51:29', '2023-11-03 15:51:29', '2024-11-03 15:51:29'),
('2038ead248c4cfba6d3a988c304ad8dea0ff1661892fc7c72231a2bb912dd5856984c8de9bcb17d1', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-06-03 23:07:27', '2023-06-03 23:07:27', '2024-06-03 18:07:27'),
('2383193e0cb83d6e2c4d05d7254b92cac5711cf42ccfea4c7482435148e8b6fb65318939cc66d8af', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-27 09:35:03', '2023-10-27 09:35:03', '2024-10-27 09:35:03'),
('240c5c1f45a6dbe40e9bbaae666a83d7d6b6f1a95524335a82c3b80a5d94c2cf164eda559c70385b', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-31 12:37:10', '2023-07-31 12:37:10', '2024-07-31 12:37:10'),
('247b56b6e470779f6bc6aa97a67687f2882f170d6915867560532a132dbb96f36cb4533cff48fd15', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 12:24:01', '2023-10-29 12:24:01', '2024-10-29 12:24:01'),
('24dbfc227f29b6c9dad2622b5ee29988a71be86c5543f71348a265f20328d79969558bd1dfb929c5', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-28 11:29:36', '2023-11-28 11:29:36', '2024-11-28 11:29:36'),
('28a8f7fce1348f0832f4d42430662c31a6384e464fc94bd3732bcad5710c0c0f1d8a5aa4d3e85eb8', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 04:27:17', '2023-06-04 04:27:17', '2024-06-03 23:27:17'),
('28e113d788ab9423c4ea2c3bfe1fb5071a83eb129fdb09e74cf555f703fb7d737c10e63608a21cfd', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-08 21:45:13', '2023-08-08 21:45:13', '2024-08-08 21:45:13'),
('298f570fa4c70a91762c40be5ab3b98dbeb7b86b8da1b02d6fea3e3db4ca0a9e8f218a71282b3e5b', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-24 20:28:13', '2023-09-24 20:28:13', '2024-09-24 20:28:13'),
('2a9a58c42c6446c5142d5f789d2da56c94e837cd04e0cf55ae871105287f7f3c3b9ffd96f7e44095', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 21:31:23', '2023-06-03 21:31:23', '2024-06-03 16:31:23'),
('2b6cb4775592fc8207b41dd2e51f6a51e2d95b41f90d6ad8d07867da96ab70281f6ddda99d758226', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 20:31:31', '2023-06-06 20:31:31', '2024-06-06 15:31:31'),
('2bef5d6aaac2be126c8576dab154a211814f72ac76b9d563c86f4e3cd1a618c06d395505369a35a3', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 18:38:02', '2023-06-06 18:38:02', '2024-06-06 13:38:02'),
('2c85c45501e142ef4679113327a167a56b92995124d323680fb014cac042ce3766fdd85e28f477c3', 90, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-12-17 23:18:33', '2023-12-17 23:18:33', '2024-12-17 23:18:33'),
('2ce3b3ca6725507d78bdaf446e2652c7543675a374df75588c3863d8e9d9bf262a485fadf89a7224', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-08 20:08:14', '2023-07-08 20:08:14', '2024-07-08 20:08:14'),
('2dd945e4928077f43bb9da4581265797768e71af887c4517f5478b100a2da5432275eac0f0d7b262', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-02 16:04:48', '2023-09-02 16:04:48', '2024-09-02 16:04:48'),
('2e3a3f7c1a735267c32fcc5dc4ec2ca64199e739c771b31f3f3fd68b9a68cc5876e5065f36bb9e3e', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-18 15:01:56', '2023-09-18 15:01:56', '2024-09-18 15:01:56'),
('2e73b3a136622717cc0552807f883291169f6d7151585da30dc0ea72f99aa5dd26ba49b3e899dc22', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-12 10:44:36', '2023-09-12 10:44:36', '2024-09-12 10:44:36'),
('2ef144cf2d84efaafd6287e0331270dc4a64067c475063ffadadfebd248c47c0111ffc487232eb31', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-02 12:03:46', '2023-10-02 12:03:46', '2024-10-02 12:03:46'),
('2f4968b52a30b3b8bd5ddb43f70e639a572baf05a44cd1644272038a520a4f13ba424d326558e4f6', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 19:39:54', '2023-06-04 19:39:54', '2024-06-04 14:39:54'),
('31d871ea82ba4c29b70d717377ac09f9cb549183c8df651fb177c7f0d660c5dce9f4f5559f91cbd0', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-11 11:39:15', '2023-09-11 11:39:15', '2024-09-11 11:39:15'),
('3675c98f9e498af1844fe652c86da4e5f236017cb17a055930fa6944b35ce3b85804ee6657d5c5bc', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 12:32:21', '2023-10-29 12:32:21', '2024-10-29 12:32:21'),
('36a92202008e0c1c0ed929d7f04ee10347132a0cabb5040218a531b2357a78977d16d460f012d322', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-09-06 23:05:02', '2023-09-06 23:05:02', '2024-09-06 23:05:02'),
('373d1462e2cdf10262ff702f2199746f986198aa8444c9684b16d4dad50f57ab2f35dea15d14cad1', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 21:52:37', '2023-09-06 21:52:37', '2024-09-06 21:52:37'),
('3858e0ac34c7103bf64b3918589c441efcce360ba0a8d80a3c94cbb66abb65591a79c0db7d537af8', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-07-15 15:37:10', '2023-07-15 15:37:10', '2024-07-15 15:37:10'),
('3b95334a66349482f6f7f90fe33ea097710fc517613e6f402b8ed0564578aece83f068872a613120', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 18:15:39', '2023-06-06 18:15:39', '2024-06-06 13:15:39'),
('3dab945ce05f5f3c2cf6bf99ab282c8b7bb3eb30644a68de1a6b5b57b39a2769ab68fc5a51575729', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-05 18:25:54', '2023-09-05 18:25:54', '2024-09-05 18:25:54'),
('3e409cafcde0d6ea513431dcfbdb01d6fc27d5f63613fb5c82dcac741b742ea846b63f8c0efd7e5b', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-15 15:16:23', '2023-07-15 15:16:23', '2024-07-15 15:16:23'),
('3e9322a66fa4d87ae74986eaedd0b2da23f95afb364a6fd1450749ce6b779dd3843ec4f044416eba', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 22:46:37', '2023-09-06 22:46:37', '2024-09-06 22:46:37'),
('3f20c6598de89802900686a9ade3bf53a35080b81d4bfa2e9e6a194daf94e0dffdfa9605102fc986', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-09-08 15:41:06', '2023-09-08 15:41:06', '2024-09-08 15:41:06'),
('3fcc0a182dc97332539f4d66681877e70108cd6a5bf1936b8c2b7884d7533bd9f6e8b2be7d233576', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-18 14:25:41', '2023-09-18 14:25:41', '2024-09-18 14:25:41'),
('40e99a0c59b01acade6cd2be5d4b5af129b6dbabe0f0180f0f4fa33bdd92314f26ebd23a54274753', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-01 18:06:50', '2023-11-01 18:06:50', '2024-11-01 18:06:50'),
('411763b65b88117a5da8349ce533fa8ef21f816a05c11b415eeac5155c765f5f57aaec8a95953936', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-14 18:37:22', '2023-09-14 18:37:22', '2024-09-14 18:37:22'),
('420312be0ac9d7842e2bb8ded33b4fae30e67b422384ab708631d661aca46565506b4fb76654270f', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-24 16:20:08', '2023-08-24 16:20:08', '2024-08-24 16:20:08'),
('42eefe2b722e6b2eadd1f6f832627e43d532886e9ed53f0f4bd66e0dc6bcb8b48f0f788fd77bd17e', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 20:29:50', '2023-06-06 20:29:50', '2024-06-06 15:29:50'),
('4517005ec6aa37fd9773f7b626135aba3f82617f94e3b40b7eb4fd8e70fa31cecfa05bc7988ddcfb', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-09-06 23:05:47', '2023-09-06 23:05:47', '2024-09-06 23:05:47'),
('454937de400798910badfdf7a93b122014d647e86a2c536f4eee54a6a351b55f3635741f609554f2', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-06 13:14:55', '2023-11-06 13:14:55', '2024-11-06 13:14:55'),
('4767f0f2f5d305692c0a81121a1a3d0b7ec0ec531997fbfd7316053a54e45b3f3aa455d631f52e39', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 16:06:02', '2023-06-04 16:06:02', '2024-06-04 11:06:02'),
('47f4e76702fd0718c94e8854d68a980999f2965957a2a1e94d967392a6253baccbed6fa846f5edff', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-07 02:52:26', '2023-06-07 02:52:26', '2024-06-06 21:52:26'),
('48038db846289d9d2749f531dcabd20e952d46aa41195be936f774217d6e2005ef5e2e2430a74121', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-15 21:47:44', '2023-07-15 21:47:44', '2024-07-15 21:47:44'),
('49cf70a39e11b4ce959a4f2ec341d3e9d08257d8b899fe75cbfc45b7434ded37ba9d1b7766e76919', 79, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-05 16:17:36', '2023-09-05 16:17:36', '2024-09-05 16:17:36'),
('4bc64ee8f70dfe01da353c3e01c6ebfb13123a338db3016b90cee3139505c7c460adbd521a2ed51c', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 17:43:15', '2023-06-04 17:43:15', '2024-06-04 12:43:15'),
('4bec686a00903d81dff3eb05b0f8b81ad48f2746fe788bd86bf41556adf5c51225f58c77ab374429', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 18:33:04', '2023-06-06 18:33:04', '2024-06-06 13:33:04'),
('4c8fcd50ac3e3cb37611a12d157536aba318f1acd1b01e9e4feca60dc69b48a80caeffdf92141b8d', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 19:19:12', '2023-06-04 19:19:12', '2024-06-04 14:19:12'),
('4caefc57c8eee81352efc9e40ff5dd56cdc2cd19b0ad0f4a19bc62e8e04815d18fffb1f875d9c8ef', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-05 17:16:35', '2023-09-05 17:16:35', '2024-09-05 17:16:35'),
('4cdde94e15aaec28b39ed6edce5e818b6ee6e01290082dd298dd199bf89814750ffa58615be57fbe', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 20:46:51', '2023-09-06 20:46:51', '2024-09-06 20:46:51'),
('51c51c8ecec02175101b6a78c81ebd599024d68b453b11031a6ae740b1c07188527d932bf60ae1c1', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 04:37:01', '2023-06-04 04:37:01', '2024-06-03 23:37:01'),
('51d05aee44adba123708b733139e8c1076202e30fdaeaa8dfac0128652d8b5ad033135fd51175947', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-16 22:37:45', '2023-07-16 22:37:45', '2024-07-16 22:37:45'),
('524b8e091a5e472520e674041c9cd8a8a024494b001c1a83786bf3cd7fd127c73612230902930d9a', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 16:54:10', '2023-10-29 16:54:10', '2024-10-29 16:54:10'),
('542d0e9685ebac6658e23a91794c8d4202f3301bfd2881fe0175f066de700481ab31162ccc26c946', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-31 18:32:40', '2023-07-31 18:32:40', '2024-07-31 18:32:40'),
('5486712679079add0d9ce5db241bb75ee4e3b8254c649638abbd3ae70b92b99f3a9d9c8cc18236e0', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-08 19:52:24', '2023-09-08 19:52:24', '2024-09-08 19:52:24'),
('564ead6797a509aeab5fab4b7a76002cd2353b31814375ce34f60775c6f856a24ae1d35a7769724e', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 22:34:41', '2023-06-03 22:34:41', '2024-06-03 17:34:41'),
('57d4a0ccfb9b36fb7465e9b4d641b4a15000833e413b87011c19ddcaa7f4d4c53ebc4e27adc9fdb9', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-09 22:26:05', '2023-10-09 22:26:05', '2024-10-09 22:26:05'),
('5a24f996356848f84fcf29091c30ef51b638929bd7dc0eb57c03dd68938a5f453e64b49fa60ea0bb', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-07 00:44:00', '2023-06-07 00:44:00', '2024-06-06 19:44:00'),
('5b99717ec35e9b8455bf4ba22877ee260ee7d863ff5cda062a6d3d3f6c73751f0f236816aec31350', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-10-29 14:13:07', '2023-10-29 14:13:07', '2024-10-29 14:13:07'),
('5cbdbfd237e9d5ec775b36103f7b4c00538e88af8ad488a1b9db76dc00030431b5d238e77fad31d8', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 09:36:23', '2023-09-06 09:36:23', '2024-09-06 09:36:23'),
('5edb7796c13af5bf23b1812736c0011fd8e5dd0a5cb2eb40b4441abf9965bc39b72d9ac581f8038f', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-09 22:11:54', '2023-10-09 22:11:54', '2024-10-09 22:11:54'),
('60a865c65d32fbd5cbd268771bc9674c06f9dd1965f52c40668087edb7f74d2a90ee90234938dadc', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-31 18:14:01', '2023-07-31 18:14:01', '2024-07-31 18:14:01'),
('61a355bf13c8a425c41611f536a07a32fcdeb5bb2e5083e760119faa38ecb520e81bc81484889e5e', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-09 22:44:05', '2023-10-09 22:44:05', '2024-10-09 22:44:05'),
('61bdcec2d3b31c1a90bf91e31be1e2389cf58e4ca98f237f940a333349a8a82c3660d29c2b9f332d', 37, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-11-27 16:29:55', '2023-11-27 16:29:55', '2024-11-27 16:29:55'),
('61e5e805dbb6d6465a30d64b4add5f7b38948faa03b1826b794773d46ce1e07ccd2db71259741090', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-09 23:17:55', '2023-10-09 23:17:55', '2024-10-09 23:17:55'),
('628f28ed2cb63455d5d2fd9f4ac43f539ef094dd382a83c22420921a32632ba9a912ac7e8fbd9e7f', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 12:27:58', '2023-09-06 12:27:58', '2024-09-06 12:27:58'),
('62a01cc47d2b372625b19b75a72077bd84657845e026e7605bc2e6d999dd8c71b6ab91bdbef53901', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-05 15:36:15', '2023-06-05 15:36:15', '2024-06-05 10:36:15'),
('62d043eb9f45d00c993d67afb8987fdeaac42d4aaabf9c76321af69e66f94ddecb9ac1d3ece2eb17', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-07 11:44:36', '2023-09-07 11:44:36', '2024-09-07 11:44:36'),
('62f8bbd2308d96b4a3d00a37a0773639629d6432115ab59e096b4f7922b0f8b25ca8568e6a3e1763', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-18 14:46:54', '2023-09-18 14:46:54', '2024-09-18 14:46:54'),
('637c864528599ed43b839024f820d5b5749e48c7c7bae31e4cacf5066581e8f56018d94e66c43f02', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-12 22:22:33', '2023-09-12 22:22:33', '2024-09-12 22:22:33'),
('63b790bc824ef45c0fe5bcd90a568c6fa9fe8bb2f4d5bc3482095822a017315c44766f03f1104f26', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 21:30:21', '2023-06-03 21:30:21', '2024-06-03 16:30:21'),
('645fdf0e57de1b70a7c940e33da5f593bfb27d3272b67a1d735ab507e1e0b96f1dc1eb6507391e25', 87, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-27 16:43:48', '2023-11-27 16:43:48', '2024-11-27 16:43:48'),
('6489f23c97970fce0862e72581e97f29970c22e99e5d21f4a4a8346cde79a28ad96cb535170940b7', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-18 14:50:45', '2023-09-18 14:50:45', '2024-09-18 14:50:45'),
('672d99cde0007c9089444ca8444b27808492a87dac8673240fea9ada990092e1481beb15042e0a5b', 41, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-12-19 11:31:11', '2023-12-19 11:31:11', '2024-12-19 11:31:11'),
('6ceb521a1691f44f4b884b564504b26fb530b3c86fa0e2431219befe8982704e160ed3c860ca094b', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-04 13:48:06', '2023-10-04 13:48:06', '2024-10-04 13:48:06'),
('6dbc2fcb23dc7c27b48d06fd1bf7eb8cafcb1ce96f7c89f63d2eb1ec9bcc0b4ffdb16b63edf18c6b', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 04:37:32', '2023-06-04 04:37:32', '2024-06-03 23:37:32'),
('6e2769ad902c29f03a8eddeeb13cbc4d1a13b0859e3d1b5d4f67c644fcf298636369c52aade1a2ab', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 19:29:30', '2023-06-06 19:29:30', '2024-06-06 14:29:30'),
('6f2074d65affb4083994e45c40845fc81c8a81675fc36aea887f59ec78e8b42c0fd1fda403e42d43', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-27 11:32:20', '2023-10-27 11:32:20', '2024-10-27 11:32:20'),
('7073c9786c289c6b515f84040a96b8d689507efec6c669b4766f913661c4ab89b57943950a11bd5f', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-06 16:55:45', '2023-10-06 16:55:45', '2024-10-06 16:55:45'),
('72bc514d4563834f18917153eade160a90f4909cd67e24079d674e7843c8ae686767549f5963b302', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 23:32:01', '2023-06-03 23:32:01', '2024-06-03 18:32:01'),
('734c0232e3c866fee896c1b919cd7c89d25871936004b365e26d09d0dab24f904d305e1139210c81', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-09 21:16:52', '2023-10-09 21:16:52', '2024-10-09 21:16:52'),
('745fa25eca0ab238d9fad77f20ff17f907f7fec1ebbde76353feed9ab87a1c7afc7bd855553f173c', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-09-08 15:28:41', '2023-09-08 15:28:41', '2024-09-08 15:28:41'),
('74c829ba0f5406cb796ea976d207d1dd4498fde5fc323fb5f02776a99293d352249f07abcd6abd94', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 21:32:15', '2023-06-03 21:32:15', '2024-06-03 16:32:15'),
('781417cc8949ccfd2589e65099b3df3f48c7c16b329c001ba667c95300a2dc0d9f9ba1faf63bccea', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 19:37:11', '2023-06-04 19:37:11', '2024-06-04 14:37:11'),
('790ddc357ccae62b7c5bf98d3de42c03991715d6aff6f27151ba62080972a6b0c44f4bf1fee7c7e8', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-08 12:34:10', '2023-09-08 12:34:10', '2024-09-08 12:34:10'),
('793f0ca189285fc837fc9f991697225d4e342d2e9e532a06fa26aa069e60e52815379dc4a0055ce2', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-07 19:11:45', '2023-09-07 19:11:45', '2024-09-07 19:11:45'),
('7968133ae4f3ce39533baedb9e343d8d2e296d5d2f1b73783fbd1c0c5372cd0cdfefec9cf9dcc2f3', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-07 02:25:32', '2023-06-07 02:25:32', '2024-06-06 21:25:32'),
('7add841a89e43c0e326063e8ed7c4c023b502fb2ed02b146a47dcd78c3c05927e28387ee1fa679eb', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-08 15:29:59', '2023-09-08 15:29:59', '2024-09-08 15:29:59'),
('7c979bbca6351eedc1d28a06ea7fcaf46263a954637f9876c0c6e6b391bb2ac248c481d361fc346c', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-06-03 16:30:40', '2023-06-03 16:30:40', '2024-06-03 11:30:40'),
('7c99f03749ddf1167d253c1982b591e3a65c1a50172862f6de9313b15b3f36b6bee35cb765d2ef0f', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-07 03:12:45', '2023-06-07 03:12:45', '2024-06-06 22:12:45'),
('7f1992ec9fa38433bec87a3c153ecb69c8689acf21ad8c2d587a86508b63c15af0ece1eb77874839', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-05 22:27:32', '2023-06-05 22:27:32', '2024-06-05 17:27:32'),
('81cdd9edefbae1c125be3597a3a8fad618b10df89388c131f120ee4511778ef8bad141e5089c8bf6', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-18 12:40:38', '2023-09-18 12:40:38', '2024-09-18 12:40:38'),
('81fa5d56b34d29c0f18c38c343f54e2517dff1fd3615ff97493433a75b4879a601fd6b0c52a116ef', 79, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-27 10:51:55', '2023-08-27 10:51:55', '2024-08-27 10:51:55'),
('827d340ca53bb63b59e4a18e93eed8bf7ac28b6e145e1c442a0b0d2647e0edec839007b6854d6dbd', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 23:28:39', '2023-06-03 23:28:39', '2024-06-03 18:28:39'),
('82f4f0383082328d0df96b2c5d86b78de35758826c40a5e63da2972de8a5974a4eb594131131f796', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-05 16:44:38', '2023-06-05 16:44:38', '2024-06-05 11:44:38'),
('835cdaed849cb5f6bba708c91efc34fbf2163cad24889f9a25bb39bf099deec20528350c9bf7c9bf', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-10-05 20:17:03', '2023-10-05 20:17:03', '2024-10-05 20:17:03'),
('8390f4b457136e4a4b67d9275de6596be2495ea6d97d4eb87cd223d8555ca2a39eb1016b7c9afda9', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-27 11:37:01', '2023-08-27 11:37:01', '2024-08-27 11:37:01'),
('85ab75367bac44272a60c9ebf4554211dd9aea906f4b1608b15f16d823371e29a6a8dbaea678ccae', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 22:30:24', '2023-06-03 22:30:24', '2024-06-03 17:30:24'),
('879ad45e743afde1377f96dee3fdd7b85d7a1f34233240966e7e0a43ecb1732923f41c858f40d7e3', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 12:30:10', '2023-10-29 12:30:10', '2024-10-29 12:30:10'),
('88106512040c3a1693b03f4f85bb5de4ba0d17dda7655687a6b87151cf5a04dbec72776cb24f35fc', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-05 16:59:48', '2023-10-05 16:59:48', '2024-10-05 16:59:48'),
('887aee0bb33d861a0a3b8c19d08227ac556ee7d9eaead8ce79a3abaae169b08c336125c26c3a69b4', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-27 11:15:35', '2023-10-27 11:15:35', '2024-10-27 11:15:35'),
('8919abaeef9d0fe1b98b2aa2a3284b2272bd5377c99d7b47517f7ff33a4d5e6db815cea23e5cea4d', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 19:10:26', '2023-06-04 19:10:26', '2024-06-04 14:10:26'),
('896868988076e790059f38466db4af006756dcdcf31f1352521a1de60c84334785f045244508f572', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-05 15:27:05', '2023-06-05 15:27:05', '2024-06-05 10:27:05'),
('89ef076f1cd4abdf5b7a62cacf8dda59d42f4b20bd714cbb1a3b021e5e360c647a082d61f0407db0', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-09 23:06:05', '2023-10-09 23:06:05', '2024-10-09 23:06:05'),
('8a33c0db33a817dd459b10f0568cb10594c1f4a1386f21d18d91f716429ffb7bd022a065f739bb55', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-15 12:46:20', '2023-07-15 12:46:20', '2024-07-15 12:46:20'),
('8a6a13d43f9d82236655879508d1d5b1167919e5b9790954ae8ad0a2969afd055b32b3571ad278c2', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-17 23:49:39', '2023-10-17 23:49:39', '2024-10-17 23:49:39'),
('8aa650016b41d42951cee5ca186e742bb5f3ea0d690c025bf353eef156d05104261e823c5833ddca', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-09 22:34:52', '2023-10-09 22:34:52', '2024-10-09 22:34:52'),
('8b141ee221a9f50799297068392afe1cb4869d4a03a93d28f16f547bfbb1eeede06e8e505eeae92b', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-05 17:56:28', '2023-09-05 17:56:28', '2024-09-05 17:56:28'),
('8e70601598dcdbb76b127dcab66bc8a7f1a2fcb0195e5dcf488750e9485ff43e70b84d3af229125f', 79, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-25 22:56:25', '2023-08-25 22:56:25', '2024-08-25 22:56:25'),
('8ea4c23abd1d23895466426f4449b6c4a12fbe08a976e204b93e3259379bcd2254971d0899897819', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 23:26:45', '2023-06-03 23:26:45', '2024-06-03 18:26:45'),
('8f042c64757c19af5d41aacfc3c1cf5b895a5159ed61f37d936bc2788a65267af2bb7f7c32e58c86', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 20:28:52', '2023-06-06 20:28:52', '2024-06-06 15:28:52'),
('906a8da418c39eefda194a88b48eaab50eaf1c3d1f4749de23a1ac4bc29b1d4b5fc10b4cc8bb1bb5', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-12 22:50:36', '2023-09-12 22:50:36', '2024-09-12 22:50:36'),
('909f155f0e65b880751f0e4b506ee70467481038a214e1304bca16e6bedd66b6f6d040b9f5fa4980', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-02 12:23:57', '2023-10-02 12:23:57', '2024-10-02 12:23:57'),
('9252b610fa80c05324cfa19078136a92515cc82bd9679a5a9aa3d332a0cc0f18d96463b68b4b37d1', 85, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-11 16:43:21', '2023-10-11 16:43:21', '2024-10-11 16:43:21'),
('926d5625ce70d3aca163067b9d6d1c1fa5fe792f9d56206bf69ed13d1bce4de1c1584c324b89412b', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 17:44:24', '2023-06-04 17:44:24', '2024-06-04 12:44:24'),
('92fc1fb1e68b0bbdb0a068bd7335e9398546ba088230bf118f2c35ade1f2dbbbf8b68e7b566d49fc', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 16:04:19', '2023-06-04 16:04:19', '2024-06-04 11:04:19'),
('93a694d593450bb0f148fe272d98e6179154d86ebe171c6caa0b64acacb4aeb954693ee709ba8b66', 88, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-12-13 11:20:01', '2023-12-13 11:20:01', '2024-12-13 11:20:01'),
('93e5141af5bc7931eca24fe59932fc6fc910d5bbf966b5b1e18a10b41be7b55b35cdb446f3abab2d', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 13:41:52', '2023-10-29 13:41:52', '2024-10-29 13:41:52'),
('9496932af2008d309bf286b5e9c6db96877411c1a091efea2206398bd4d55b971bcb12adc0203419', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-08 19:47:22', '2023-07-08 19:47:22', '2024-07-08 19:47:22'),
('95a286ab84833fe4520fb79f1b2be5a2ecec1f352661836672c4ee3688c509050f4011946cbf8582', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-08 19:36:53', '2023-09-08 19:36:53', '2024-09-08 19:36:53'),
('96d0631c613eb45488e37ed2ec17743e922312808321eb47e42f74c8bd51665cacf19455a335dece', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-10-29 14:11:56', '2023-10-29 14:11:56', '2024-10-29 14:11:56'),
('96d7aedc2d03daac16556c31b7d2c45f8fd2e52927386ad84b6ef3c574aaa8c4336e76efe3fa5b19', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-16 20:01:53', '2023-07-16 20:01:53', '2024-07-16 20:01:53'),
('9870e73e6cadf326a385ac1ba2042837334ba766e640445a8fa9c93b17b33e75fca713563fc89581', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-24 20:36:18', '2023-09-24 20:36:18', '2024-09-24 20:36:18'),
('98e0ee8d4f88faaf99dc4222f8f56bef0a66a105f9626384a611463f66865d3502d1a532babe74f6', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-20 19:01:46', '2023-11-20 19:01:46', '2024-11-20 19:01:46'),
('997dffc29d55e2454b79eb0d76ffc85f45f8f3c3ca507b433ccbe133fbd4d73ba42fd0b31f16ddea', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-05 22:40:29', '2023-09-05 22:40:29', '2024-09-05 22:40:29'),
('9997ec901a6d677f9d28b49f8d8e3994e2223bede084464952dd22e62c197acebfe5ab30b666b063', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-12 22:52:09', '2023-09-12 22:52:09', '2024-09-12 22:52:09'),
('9a5c864d826a80dfbd03fe25b6217b7affb140a9d6cbbd5b5248662508c460a04909d4dd44832530', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-06-04 15:57:14', '2023-06-04 15:57:14', '2024-06-04 10:57:14'),
('9dad714c5a620e6e5a395b7e59a75add05ed33cfea09cb845967ae82ae8514ffd88ba64a8ea5f7bf', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 17:51:24', '2023-06-04 17:51:24', '2024-06-04 12:51:24'),
('9ed9407147354cb27fd7ed0891e75aa854674673309bf5db9ee35a1925bc89c6f04f1c71fe3a9700', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-20 19:02:01', '2023-11-20 19:02:01', '2024-11-20 19:02:01'),
('9fa29ebdc028ac3acd3f3b7de7d33a325e9042f8a1e038e38942c49f7b7d04ecda09c732c8300c57', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-10-05 00:02:25', '2023-10-05 00:02:25', '2024-10-05 00:02:25'),
('a00ee650be876dc52041f62199c28c207b15cb9f70d402afc13ab2992bf23f68425998953c2be681', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-11-28 11:24:19', '2023-11-28 11:24:19', '2024-11-28 11:24:19'),
('a04f99a3bebe81718223f93f90453e34d580fd5b0f66439cec59c39d3f54fc80a5a583c6fb6b403e', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-08 21:38:17', '2023-08-08 21:38:17', '2024-08-08 21:38:17'),
('a0e27a4bb13cd6f5c9a8df489d6dcf8d0ea4dbc1fd3685c4796bb27d61cce36c740e14146428f86b', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-09 19:48:59', '2023-10-09 19:48:59', '2024-10-09 19:48:59'),
('a0fc2da9f7efc206b4259f742d31352c115de5d4691ab63ce184a4eb9556ba3ab5bef20e3c92651f', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-04 14:11:14', '2023-10-04 14:11:14', '2024-10-04 14:11:14'),
('a11393788a6ecdc105608e79818648e25aea1aef8bcec2376b880d43bc546984584f856d44cbd216', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-06 16:41:27', '2023-11-06 16:41:27', '2024-11-06 16:41:27'),
('a11922876c245477c183043cd09006b49aa4f9ba6f41ac1b4ed8e34c8767ebfdf8d8a3584da99e9f', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 17:46:11', '2023-06-03 17:46:11', '2024-06-03 12:46:11'),
('a1a43f64d8ae9be073b285ddfbbc53ca8180a3c1230380eb818bd9c063025be3624f4fcfc61ec820', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-15 15:29:59', '2023-08-15 15:29:59', '2024-08-15 15:29:59'),
('a389616fc07e9a48806a7f92f3574f1bd9f2b83e022add27eba39a75764e703c8e5951b00005f839', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-07 14:14:09', '2023-09-07 14:14:09', '2024-09-07 14:14:09'),
('a4125dfc3f510b2c54538e6da29c808ce2dd824347614095c265b107ec53d94ab9fc5db02f648c07', 79, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-05 10:18:42', '2023-09-05 10:18:42', '2024-09-05 10:18:42'),
('a4a760eb4118faed0c70266f4c91f7cdf387b722b27a12036381bdc872e149c338c2bff53b4bc784', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 04:12:02', '2023-06-04 04:12:02', '2024-06-03 23:12:02'),
('a52b8e0fbecf9e7c15face66c52e6fb8ba9352204bb2591b6908c940ad49fb0818eda77609d1cf74', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-05 17:41:46', '2023-09-05 17:41:46', '2024-09-05 17:41:46'),
('a53abd181ae071df8e6db29db5d705e4b4eb7fc3e991f2b543ae662493197bd37587f0f425d45b95', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-08 19:16:34', '2023-11-08 19:16:34', '2024-11-08 19:16:34'),
('a5b72efdca95149942bd3f1bbbe8aa1511f24d6d1a3254d81522541ad0d3761cac6c8c73399e842e', 14, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-01 02:53:07', '2023-06-01 02:53:07', '2024-05-31 21:53:07'),
('a60399ea3c8ed3c752e7ea5797dbc7c18b9eadf3d1103ebd7638dfe384d9eb690543e11223b93f8f', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 04:34:26', '2023-06-04 04:34:26', '2024-06-03 23:34:26'),
('a61a29308abb8d62ccc990391f98eea5dfd6c5d5368586990cf8e88cd95851278eddb5e49761616e', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-06-03 23:31:54', '2023-06-03 23:31:54', '2024-06-03 18:31:54'),
('a707d4bfd7af2f116349cf0af6da06a5accecaf58fd5eb6643925d035f82c91afe67a9641fb6b69a', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 04:34:53', '2023-06-04 04:34:53', '2024-06-03 23:34:53'),
('ac9a4eb09332519a449e03d2e8669cd53ea2c4d90b76b6d96f8bfd5ba37edccae0b0c87d838aea26', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-31 12:37:02', '2023-07-31 12:37:02', '2024-07-31 12:37:02'),
('ad3f8322277804a7690bac9e0988633f6f018d02705c36618085db67c1b6e811e1012a5eabf8762c', 56, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-12-19 19:13:34', '2023-12-19 19:13:34', '2024-12-19 19:13:34'),
('ad5b1218083cb68b54e36766a06afaa4479651a1a76262b7009304fb4740eface08c9561bd5e9ee7', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-14 22:12:08', '2023-08-14 22:12:08', '2024-08-14 22:12:08'),
('ae76c234a86a640ebfb4053c42fba7e1c274b4acaa464bf428ffe0250865213bc6e1a27ffddd8a28', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-03 14:57:30', '2023-11-03 14:57:30', '2024-11-03 14:57:30'),
('b148f17428447bca99b065934b7c723b91ee8d0d52bc78b3aa06c0118bf4e8006170ef6f7f82a5e6', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-24 21:07:43', '2023-09-24 21:07:43', '2024-09-24 21:07:43'),
('b1814686b78cc45499ba524cfb1f9e227df824c6951c722ab59472c692e2c485b2d7e81f8f992178', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-05 17:44:01', '2023-09-05 17:44:01', '2024-09-05 17:44:01'),
('b1847413648dad96c0c66cd2c5a3bef4cf99c47f747262bfab587be10b84b9a8a29911f034662cea', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 16:46:44', '2023-06-04 16:46:44', '2024-06-04 11:46:44'),
('b45bb306f9c22492d21a4955069710d00e884b50a33aab1514a09e6a7ad21611e452bf4fe3056689', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-09-08 15:42:27', '2023-09-08 15:42:27', '2024-09-08 15:42:27'),
('b590400578ea86b4a6e105e2fd88d93e130b0c7964cfd7c4645b7521ea89e82ad384e2be11fbc3ec', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 04:33:07', '2023-06-04 04:33:07', '2024-06-03 23:33:07'),
('b622ec1618a2e867bebba0709478f35e3198abfaaf44af864bc8c7491be818e360e4085149da4366', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-10-10 03:26:51', '2023-10-10 03:26:51', '2024-10-10 03:26:51'),
('b64af8cd398578a23173ff4cbdcf733d5e03a88dd871d1ff3af9a102e0c58b6ab163f47e86c13aff', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-06 06:06:47', '2023-10-06 06:06:47', '2024-10-06 06:06:47'),
('b815703ac0c319464d4ece3f02cfec9dd994a0c7cf70741d9b62e3bb979bf4af00d45400dfb0fef7', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 16:55:51', '2023-10-29 16:55:51', '2024-10-29 16:55:51'),
('b81972cc0db66fa972e50a21c19401066ed3121f3c696ff696a1dedb744e45876a0ba19023a95e31', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-09 23:15:57', '2023-10-09 23:15:57', '2024-10-09 23:15:57'),
('b836822e72c0ca1f20ea65e32e5ed727857bf36aee4b639f7452495b9922904af7b760770c4bbf2c', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-07 18:50:13', '2023-09-07 18:50:13', '2024-09-07 18:50:13'),
('b882f52d235fc36e6b1889f73e1804161ad7413171325a86f5cd6aa597d1bf4f79417e4f281f3bde', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-09 16:34:30', '2023-08-09 16:34:30', '2024-08-09 16:34:30'),
('bb830b7a3c1c0f82e0ada4d27cf0d5710bcb2e2a854c426200d5b660f4747e53425f9fb242c68d37', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-02 16:24:36', '2023-09-02 16:24:36', '2024-09-02 16:24:36'),
('bc516c76a48292ebde0278a85fed199a5d5fdd071f91ed441b32d7c7983c0361ba36e3268685c019', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 12:33:21', '2023-10-29 12:33:21', '2024-10-29 12:33:21'),
('bd2d6db9f044401f0bb8f4049e5d57e3cfaec2bc30e24e8c7c1ebfe786ff350fdcc7e82d7d73b22e', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 21:25:20', '2023-06-03 21:25:20', '2024-06-03 16:25:20'),
('bd9fc2ed8f9b1a7e3d0a1d3b6b04372c2ec5d880af9119a6986d895f693740443f170d79b3015c62', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-07 19:29:59', '2023-09-07 19:29:59', '2024-09-07 19:29:59'),
('bf835233107905850d3826aa5e8725685439e66460f1ac93fc3d7f7484d54cf3b2748428d2c469f6', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-06 18:17:06', '2023-11-06 18:17:06', '2024-11-06 18:17:06'),
('bfa940e11a6e2d1f088579705e0641a030fc4fb4291e5bf9c4205b7944b50e8a6459c559f7ff0737', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 16:53:36', '2023-10-29 16:53:36', '2024-10-29 16:53:36'),
('c23daf7632ce1b1410b3e10ef529ec813acefac02fb2b01b42689b1c18c43208da77381bd78d7823', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 23:08:54', '2023-06-03 23:08:54', '2024-06-03 18:08:54'),
('c28e8c08abe58f4539c94d21a4eb09e96068ec2066c7058b03187aa51e8a9cdf7599b2b760c3ff66', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-18 19:12:50', '2023-09-18 19:12:50', '2024-09-18 19:12:50'),
('c4310017c5f9ef8c472dad5c04c62d432cb1f7866631d63151f7c96bec900482497f6e63558377b4', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-05 17:08:57', '2023-09-05 17:08:57', '2024-09-05 17:08:57'),
('c526ef00098b8b6f1602e0cbf1a873220e1697f5fbea3b23990b6f12571e99af468f16f128aab46e', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-07 18:48:25', '2023-09-07 18:48:25', '2024-09-07 18:48:25'),
('c52898e8370fe869362329741be5867d929ee41752e61938717969aedcefcc746d934b488e003cec', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 12:33:21', '2023-10-29 12:33:21', '2024-10-29 12:33:21'),
('c5e59f76d00354f36f915cbda848ba05fcc6344cc62534ef0baffad19f7df2329f988a32c743df05', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 18:35:28', '2023-06-06 18:35:28', '2024-06-06 13:35:28'),
('c615f1b53df3a6730774d6fcd6795b8d5962647359a56af7d5058fb5a3df4e40aa687139147c4b32', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-27 11:38:48', '2023-08-27 11:38:48', '2024-08-27 11:38:48'),
('c8cbacdcb29fa392cfa1f96e8dc4f0d2132cf83be2175cf02f9c873831b3e51e4124d1585cf722f8', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-07 02:17:00', '2023-06-07 02:17:00', '2024-06-06 21:17:00'),
('c92c1dede5e6c37ff001ed0066d051717287870ae15da87e60569c8467176f953f4ca9a1920092e0', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-03 15:57:00', '2023-11-03 15:57:00', '2024-11-03 15:57:00'),
('c95e90cec0c2af6086d2a0f72fa9f9c8f203f6d08ab156431c0ecac5de04e27254b7d25a5a02b0d7', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-21 14:15:07', '2023-09-21 14:15:07', '2024-09-21 14:15:07'),
('ca6f2b54c1daaa59b76d5f7046b2e1fc73a3c4c9da124360f5e88ee0a0e913f0af1db683f4be3aa1', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-05 18:22:49', '2023-09-05 18:22:49', '2024-09-05 18:22:49'),
('cb63711e4a8ed9fde41ca83d7d13749cb371050df42e251db2584a34daae2d9c1e9b858f41c76ea0', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 21:20:27', '2023-09-06 21:20:27', '2024-09-06 21:20:27'),
('cbfd9b48f8da0adc3becd1abb3f197f3fb6594830df47e6a47ca8a9fd61e4b666b12ae15ed1e105a', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-15 23:44:01', '2023-09-15 23:44:01', '2024-09-15 23:44:01'),
('cd2e496918517fef4235f575999178228361941306dae167dc42b7f8c1c59adc59fe2654815c5c8c', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-16 20:14:07', '2023-07-16 20:14:07', '2024-07-16 20:14:07'),
('cd773b75bd3633d3a9a7bcebb2b0efed5bb1bc895128348328931d15a544a3eee581bd7998ad4434', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-12 22:42:42', '2023-09-12 22:42:42', '2024-09-12 22:42:42'),
('cd8a297cfd20e127e0716dae8a0cd75cdda23745b3b0a61d8c944d3bb54a3f68ef8e3796aa8db337', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 23:21:56', '2023-06-06 23:21:56', '2024-06-06 18:21:56'),
('ce8b30bd5cb2f6c037b7569e3fd6aabb61788ea1fa1e58dd3f2b271966b6c39ab469312a8ceaf322', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 12:41:03', '2023-10-29 12:41:03', '2024-10-29 12:41:03'),
('d044fc16c3f975b184e05d5c231d40cd634de58e96fad0e14f29d025942ca3de14859b9a138ddd74', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-09 19:43:30', '2023-10-09 19:43:30', '2024-10-09 19:43:30'),
('d0d309ea42ae4a20a0ea167c633b7720f36ea319136110ea8c224880a950c262a5d24927d1875f76', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-12 22:45:32', '2023-09-12 22:45:32', '2024-09-12 22:45:32'),
('d0f6100cfddcd80f0d026f3bd17fb3eb62e03c8fe9c4ebdc725bea2d2291d1de5e3c923bd412b0bd', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 20:41:11', '2023-09-06 20:41:11', '2024-09-06 20:41:11'),
('d151be96cbdc7e613d639ffb70ce46c8c9459d3733d6ae59ec2f9d6000d4a5ebe1132dcd620dbe13', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-10-04 14:39:40', '2023-10-04 14:39:40', '2024-10-04 14:39:40'),
('d2465f70de4ad751ef78fae8b0cfd3e7c7d42292996768bf5fc342c644eb52ef08e5d7c13e82c905', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-11 22:50:25', '2023-09-11 22:50:25', '2024-09-11 22:50:25'),
('d28e03a3d99125820c8a893f9251abbb8b6ab183db10a97add4ad1bbe30a4938e502642f162e11a1', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 22:08:31', '2023-09-06 22:08:31', '2024-09-06 22:08:31'),
('d32e08bdd302061e651ef09ac618e85103e7d737bb458314261a83a2bf50789a72cfec8765cfa29d', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-07 02:21:13', '2023-06-07 02:21:13', '2024-06-06 21:21:13'),
('d46bcb71176f9dba1582a5af628689090c439d42106be41c18cc68e29d2d9bc4ba762882bc8a48f6', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-11 12:25:49', '2023-09-11 12:25:49', '2024-09-11 12:25:49'),
('d4f0e583d712e954f25fd0931cdfce1dde580370350620b3fe7a166b64efed2878ae937f240da1d5', 89, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-12-13 14:36:38', '2023-12-13 14:36:38', '2024-12-13 14:36:38'),
('d56fea41e2eb5fa90f3fdb8247c89a4f0ba3811e6342b17163b208239f3e2d1174d57d0f19f68adb', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-08 11:28:35', '2023-09-08 11:28:35', '2024-09-08 11:28:35'),
('d5e17c55ea87f09ffa6d97f941cd5b299141e30c88552a81521440310fd04071f2d4170fad2034f2', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 18:25:49', '2023-06-04 18:25:49', '2024-06-04 13:25:49'),
('d5f0499fce570931c338c0bf82ff39910a944b5c766c29d89c30aa9607d913f88e7c06cb7d255a7d', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-20 17:09:13', '2023-08-20 17:09:13', '2024-08-20 17:09:13');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('d623ebd763a5b51daf011dac83c506870ed772c3969fe969da2efea65d4cc6aa58f5a8414e247d0f', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-15 15:53:56', '2023-07-15 15:53:56', '2024-07-15 15:53:56'),
('d943a8826ca4345b7918481507abea145a29d2f1c281226407c65ef40359e623f279c6a42cbd6a5e', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-08 19:32:33', '2023-07-08 19:32:33', '2024-07-08 19:32:33'),
('de078541d9bb08a849397b778660627e050a6850eafcc55de267981b30b85ae510f200c3dae80f0c', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 22:16:46', '2023-09-06 22:16:46', '2024-09-06 22:16:46'),
('de6b8ec6bf94577233ff65eb9b8d9c890324763f29136da8b099141ff6d1af5b068a7f7639235ee6', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-06-07 02:47:45', '2023-06-07 02:47:45', '2024-06-06 21:47:45'),
('deea27668772d2c6c1954e1b536baa6c906599b931ce95bf5148d818a3f2f002337826c060eda521', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-06-04 16:03:05', '2023-06-04 16:03:05', '2024-06-04 11:03:05'),
('df924f0b5cad447e17b47621b3aabbed4d5c5ce9808105796e7e13f0f6db4b9db7d9d2cfc007bf48', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-27 10:51:57', '2023-08-27 10:51:57', '2024-08-27 10:51:57'),
('df92d351603a4a4b543789b7ae9e5a45e41a3bdccbecbcffad12033b9e734c118af63bbc0a332370', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-08 11:24:31', '2023-09-08 11:24:31', '2024-09-08 11:24:31'),
('dfdefafdb54e0a247392a578a5af6316501dd17d07e71b48b484a2fbd274cd65cca19f508e8c048d', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-16 20:02:45', '2023-07-16 20:02:45', '2024-07-16 20:02:45'),
('e1b9ed424dd88ca639f5c13d20bdc8b988a217e55d69a8e6c69730f45614f7c30021f9d91fb91f08', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-27 11:38:27', '2023-08-27 11:38:27', '2024-08-27 11:38:27'),
('e237248941fcab2c54e39c2875a70f42a5928e27754f2f2a7b5ad54956a35e661823c5cb0909f465', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 22:31:06', '2023-06-03 22:31:06', '2024-06-03 17:31:06'),
('e2900f6b96345417b597f0647d16c8183c02e7cf217252d55c466ff482d8d577d41e4241cc4fb2a7', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-03 12:04:38', '2023-11-03 12:04:38', '2024-11-03 12:04:38'),
('e3d08dca1ddf4577206c4576ee33eb34182c116038796df300a15ef0ff91a7ed3d3878068ca761d6', 79, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-27 11:23:41', '2023-08-27 11:23:41', '2024-08-27 11:23:41'),
('e441b90cd8c7f021ffa43d846330875a3cf08eb92e9fbc9e5f0a0ab94982a83e34d3a2d79dae5f35', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 04:29:55', '2023-06-04 04:29:55', '2024-06-03 23:29:55'),
('e4c722483f8644502ac77b53d41f4a20017cbea18a0570a42ee5bdb32f75d0c7dd633c59d3d00627', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-06 15:11:05', '2023-11-06 15:11:05', '2024-11-06 15:11:05'),
('e4e34bdc5b8f1a68c898d3a8a958ddd0dc14c590449ffaca13199f3bb3dd3806155987fa244ce9e1', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-08 11:53:21', '2023-09-08 11:53:21', '2024-09-08 11:53:21'),
('e5330671606f6794c0704072e2bac12269319417142f578a02a969f95dc07eadd3cea10c08baf911', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-07-14 23:03:59', '2023-07-14 23:03:59', '2024-07-14 23:03:59'),
('e7797d7587cec449b213120e06d9a93981ace4205617f011cd5d8e3a73a78f3c7be66079722ac865', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 23:59:15', '2023-06-03 23:59:15', '2024-06-03 18:59:15'),
('e7ce9074bae66944f5be917919bbe0449cc44e00701b4ed0b6b978936afdf76e4a529a8425046728', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-21 13:12:13', '2023-09-21 13:12:13', '2024-09-21 13:12:13'),
('e99804d6b92d8a0b9131485c870f667eb9a3f1726ac42eeb0fc2e4016c362f9d801fcf6c94759972', 94, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2024-01-02 16:39:37', '2024-01-02 16:39:37', '2025-01-02 16:39:37'),
('eb2a74644bc055929ffc17418ac482b09d928138d5b338529c78a6c58063dbcb7202cf4fe433cc17', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-06 13:17:44', '2023-11-06 13:17:44', '2024-11-06 13:17:44'),
('eb5392efeb276e2ed253fc766bf4794f4930ebc5a3a48bd6d5a49c89425d99162b29ea5acdf45e34', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-24 20:28:41', '2023-09-24 20:28:41', '2024-09-24 20:28:41'),
('eceaabc0c4a527f250a3f2b46ad5b22baa2b3257c01fbe1be3f0587ed34a6197a32ad320c2086bf0', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-05 20:42:20', '2023-11-05 20:42:20', '2024-11-05 20:42:20'),
('ee08cf43ebc21c66d3983ed29c59023cb855c7a48f4b743e0a198385a8dbee50129c200483d40f6f', 19, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-03 21:46:28', '2023-06-03 21:46:28', '2024-06-03 16:46:28'),
('ee3be7c009f27593b2813cdaf766e3333cc1250fb457b9e9124a8605fc9e5c6119e630ab9b922e77', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-09-08 15:28:02', '2023-09-08 15:28:02', '2024-09-08 15:28:02'),
('ee3e27655eb226f5f3882e394deb37cc51cafb80802846a7370c3219e3f913c496aa6299fcba7fa7', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-02 16:46:51', '2023-08-02 16:46:51', '2024-08-02 16:46:51'),
('ee83d3f7cddb9d0e685a8f34eedd9503c4c8eb11ff2208c6b6387600a5dd78e258ef28b4968bda72', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 12:39:52', '2023-10-29 12:39:52', '2024-10-29 12:39:52'),
('ee906dd6157ef0d753a0e2dc573d58f0f18f365297132422e5a46ca29f6a33da429aa0d2f87982f9', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-06 13:15:20', '2023-11-06 13:15:20', '2024-11-06 13:15:20'),
('ef6fc32058ba6cf0500884928a9200cde3649fc90906a4a808da6ce7cc0c0cddb878385fd7b8bf61', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 1, '2023-09-02 16:04:07', '2023-09-02 16:04:07', '2024-09-02 16:04:07'),
('ef89bc018f394c56bdba15bb6e97413b2ee5c25f1542447eed3469c1729412a33727b064846943e9', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-12 22:28:01', '2023-09-12 22:28:01', '2024-09-12 22:28:01'),
('f03933a795d13ba8df8e118efb2890fd90f27b71d3dae806b694861f051446f623899187c4b4f266', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-24 13:43:56', '2023-08-24 13:43:56', '2024-08-24 13:43:56'),
('f209a6c737c280b7a15e9c95045775cf2c11f5f815bd433fee8bcd96da85bbf87b288ec0283fdc27', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-29 17:22:10', '2023-10-29 17:22:10', '2024-10-29 17:22:10'),
('f2aba67c9f43ff0938b719eb0d8e937f3bc3cc8f371518db66d558f202b33d512cf70d13408e604c', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 20:30:32', '2023-06-06 20:30:32', '2024-06-06 15:30:32'),
('f36d5b6b8227154fa11d7cfc658561617481ad27f45b6fafc8f04e611dcfa65b5d73dc50c96d8c98', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-06 09:13:26', '2023-09-06 09:13:26', '2024-09-06 09:13:26'),
('f37f869c06b743e26533ab3206a419b569ffa261fd07d6e5e3b164eb55739d1c3a0d571c1100015c', 79, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-06 12:46:02', '2023-10-06 12:46:02', '2024-10-06 12:46:02'),
('f4282fbabe7c9c8896e56f3f9b7f6e2b2283156fd8b2ae2b7f9f139840468ce6f93b0a771a7bf7da', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-08 14:56:15', '2023-09-08 14:56:15', '2024-09-08 14:56:15'),
('f725ece72686073b835e8effaad6a35c183856f255f1c8333ef0ae1dd9767ad2708fdef2c6acf288', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-05 17:40:16', '2023-09-05 17:40:16', '2024-09-05 17:40:16'),
('f76ac054871f60b506a6f08c947f3eecc2df1cbc08117047dde97d94863ffda3a304060a37b43ef4', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 17:50:02', '2023-06-04 17:50:02', '2024-06-04 12:50:02'),
('f81ef2a8fcd51de0f252a6f1d5a5386cb8cf04d8414552c6a580ed17269cb812f363e2ecf3b58d51', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-08 21:47:32', '2023-08-08 21:47:32', '2024-08-08 21:47:32'),
('f933ee5fe0dfd82e9a513da818d1dfba85329c9d5a03626caf494bd4f882ffa29413cc8f2c5e50bd', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 20:25:02', '2023-06-06 20:25:02', '2024-06-06 15:25:02'),
('f9d0184d195f460cd12cb59c56711f136c8db3f56888dae0df132efa4697aab2304b80d59ce94fec', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-04 17:46:37', '2023-06-04 17:46:37', '2024-06-04 12:46:37'),
('fc52b3e5b7e5b602dfd6301e83d0ee13e017659619c735dc96f2c6559cd47068f3d698fdcab54ef6', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-08-27 11:42:03', '2023-08-27 11:42:03', '2024-08-27 11:42:03'),
('fcc2d26218a1d484c3a9aaafd0cb53e8d16576ac7348f40143946f5e424e77b413b95729a111b033', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-11-05 22:29:59', '2023-11-05 22:29:59', '2024-11-05 22:29:59'),
('ff55b60095ae243fb4db2ab3d25771784c2b5e2929a7531be02b3cbe50808c0616da337d8c92e568', 26, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-06-06 21:01:57', '2023-06-06 21:01:57', '2024-06-06 16:01:57'),
('ff8b97fca816a729178ef24ec28cbbb277241658fbdbf677c0c636465f77de8999d83e233510882f', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-18 11:51:13', '2023-09-18 11:51:13', '2024-09-18 11:51:13'),
('ffbe15e930a2a6d525b65e3850db06ae8871fd3fe6df013343d365cad4a3662fe54f996105b4b375', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-09-11 12:24:45', '2023-09-11 12:24:45', '2024-09-11 12:24:45'),
('ffe7546cc554b98a0724a735773b3d15428e308698f9b079446e7657d03933764b8214dfa0bdd0d7', 31, '994ac642-c73e-49a4-a8a1-4ab6b1611958', 'api', '[]', 0, '2023-10-09 22:59:36', '2023-10-09 22:59:36', '2024-10-09 22:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('994ac642-c73e-49a4-a8a1-4ab6b1611958', NULL, 'Digital Pahal Personal Access Client', 'KjcjDsnKM72MjZuehv4FyRpRYFTIxC1s4w1eJIY2', NULL, 'http://localhost', 1, 0, 0, '2023-05-30 21:32:09', '2023-05-30 21:32:09'),
('994ac643-f81d-4de9-9ced-2ba102206898', NULL, 'Digital Pahal Password Grant Client', 'kADp6VQBkJCjebb3FvJOZAC42g8f5CtRuYEF8Vyy', 'users', 'http://localhost', 0, 1, 0, '2023-05-30 21:32:09', '2023-05-30 21:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '994ac642-c73e-49a4-a8a1-4ab6b1611958', '2023-05-30 21:32:09', '2023-05-30 21:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `categories` varchar(255) DEFAULT NULL,
  `client_limit` int(11) NOT NULL DEFAULT 0,
  `features` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `duration` varchar(255) NOT NULL DEFAULT '+1 month'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `icon`, `descriptions`, `price`, `categories`, `client_limit`, `features`, `status`, `created_at`, `updated_at`, `duration`) VALUES
(1, 'Basic', '', 'Exercitation veniam consequat sunt nostrud amet.', 983.78, NULL, 5, '3 Presentations / month | 2,500 Character Input / Presentation', 1, NULL, NULL, '+1 year'),
(2, 'Pro', '', 'Exercitation veniam consequat sunt nostrud amet.', 983.78, NULL, 5, '3 Presentations / month | 2,500 Character Input / Presentation', 1, NULL, NULL, '+1 year'),
(3, 'Enterprise', '', 'Exercitation veniam consequat sunt nostrud amet.', 983.78, NULL, 5, '3 Presentations / month | 2,500 Character Input / Presentation', 1, NULL, NULL, '+1 year'),
(4, '3 Month - Free Trial(DMS)', '', '3 Presentations / month | 2,500 Character Input / Presentation', 0.00, NULL, 0, NULL, 1, NULL, NULL, '+3 month'),
(5, '3 Month - Free Trial(GST)', '', '3 Presentations / month | 2,500 Character Input / Presentation', 0.00, NULL, 0, NULL, 1, NULL, NULL, '+3 month'),
(6, '3 Month - Free Trial(DMS & GST)', '', '3 Presentations / month | 2,500 Character Input / Presentation', 0.00, NULL, 0, NULL, 1, NULL, NULL, '+3 month');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'mail_host', '', NULL, NULL),
(2, 'mail_port', '587', NULL, NULL),
(3, 'mail_username', '', NULL, NULL),
(4, 'mail_password', '', NULL, NULL),
(5, 'mail_encryption', '', NULL, NULL),
(6, 'mail_from_address', '', NULL, NULL),
(7, 'mail_from_name', '', NULL, NULL),
(8, 'app_name', 'Digital Pahal', NULL, NULL),
(9, 'app_email', 'help.digitalpahal@gmail.com', NULL, '2023-06-22 16:46:47'),
(10, 'app_phone', '8899445566', NULL, '2023-06-22 16:46:47'),
(11, 'payment_url', '', NULL, NULL),
(12, 'privacy_policy', '<p><strong><u>Privacy Policy</u></strong></p><p>This Privacy Policy (“Policy”) outlines Digital Pahal (“we”, or “us”) practices in relation to the storage, use, processing, and disclosure of personal data that you have chosen to share when you access our mobile application “Digital Pahal” or personal data that we may have access to in relation to your use of the Software &amp; App’s offerings and features (the App and all offerings and services available through the App are collectively referred to as the “Services”).</p><p>At Digital Pahal, we are committed to protecting your personal data and respecting your privacy. Please read the following terms of the Policy carefully to understand our practices regarding your personal data and how we will treat it. This Policy sets out the basis on which any personal data we collect from you, or that you provide to us, will be processed by us.</p><p>Capitalised words in the Policy shall have the same meaning as ascribed to them in the Terms and Conditions (“Terms”). Please read this Policy in consonance with the Terms.</p><p>By using the App, you consent to the collection, storage, use, and disclosure of your personal data in accordance with and are agreeing to be bound by this Policy.</p><p>If you have any questions, complaints, or claims with respect to the Services, you may contact us at support@digitalpahal.com email address.</p><p>&nbsp;</p><p><strong>1.<u>BACKGROUND AND KEY INFORMATION</u></strong></p><p><strong>How this Policy applies: </strong>This Policy applies to individuals who access or use the Services. For the avoidance of doubt, references to “you” across this Policy are to an end user that uses the Services.</p><p>By using the Services, you consent to the collection, storage, usage, and disclosure of your personal data, as described in and collected by us in accordance with this Policy.</p><p>The terms of this Policy may change and if it does, these changes will be posted on this page and, where appropriate, notified to you by email. The new Policy may be displayed on-screen, and you shall be prompted to read and accept the updated policy if you choose to continue using our Services.</p><p><strong>Review and Updates: </strong>We regularly review and update our Policy, and we request you to regularly review this Policy. It is important that the personal data we hold about you is accurate and current. Please keep us informed if your personal data changes during your relationship with us.</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>Third-Party Services:&nbsp;</strong>The Services may include links to third-party websites, plug-ins, features, services, and applications (“Third-Party Services”). Clicking on those links or enabling those connections may allow third parties to collect or share data about you. We do not control these Third-Party Services and are not responsible for their privacy statements. When you leave the App or access third-party links through the Services, we encourage you to read the privacy policy of such third-party service providers.</p><p><strong>&nbsp;</strong></p><p><strong><u>2.THE DATA WE COLLECT ABOUT YOU</u></strong></p><p><strong>The information generated during your use of the Services may be categorised in the following manner:</strong></p><p><strong>Personal data:</strong> This category includes data that can directly or indirectly (for example, in combination with other categories of data) identify you. It does not include aggregated or anonymised data or information.</p><p><strong>Non-personal data:</strong> This category includes data that cannot directly or indirectly identify you. For example, we also collect, use, and share aggregated data such as statistical or analytical data solely for internal operations. Aggregated data could be derived from your personal data but is not considered personal data under applicable laws. For example, we may aggregate your usage data to calculate the percentage of users accessing a specific feature of the Services. Please note that this Policy does not apply to our use of any non-personal data.</p><p><strong>We collect, including but not limited to, the following types of personal data:</strong></p><p>Identity and Profile Data, such as your name, date of birth, gender, marital status, Documents uploaded in formats, and other details and data uploaded by organization.</p><p>Contact Data, such as your mobile number, email ID, residential address, and pin code.</p><p>Marketing and Communications Data, such as your address, email address, information posted in service requests, offers, wants, feedback, comments, pictures and discussions in our blog and chat boxes, responses to user surveys and polls, your preferences in receiving marketing communications from us and our third parties, and your communication preferences Technical Data, which includes your IP address, browser type, internet service provider, details of operating system, access time, page views, device ID, device type, frequency of use of the App, website and mobile application activity, clicks, date and time stamps, location data, and other technology on the devices that you use to access the App.</p><p>Transaction Data, such as details of the Services you have availed.</p><p>Usage Data, which includes information about how you use the Services, your activity on the App, user taps and clicks, user interests, time spent on the App, details about user journey on the mobile application, and page views.</p><p>&nbsp;</p><p><strong><u>3. HOW DO WE COLLECT PERSONAL DATA?</u></strong></p><p><strong>We use different methods to collect personal data from and about you including through</strong>:</p><p><strong>Direct Interactions.</strong> You provide us your personal data when you interact with us. This includes personal data you provide when you:</p><p>-create an account or profile with us;</p><p>-use our Services or carry out other activities in connection with the Services;</p><p>-enter a promotion, user poll, or online surveys;</p><p>-request marketing communications to be sent to you;</p><p>-report a problem with the App and/or our Services, give us feedback, or contact us.</p><p>Automated Technologies or Interactions. Each time you visit the App or use the Services, we will automatically collect technical data about your equipment, browsing actions, and patterns. We collect this personal data by using cookies, web beacons, pixel tags, server logs, and other similar technologies. We may also receive such data about you if you visit other websites or apps that employ our cookies.</p><p>Third Parties or Publicly Available Sources. We will receive personal data about you from various third parties and public sources, including but not limited to our third party partners, Google analytics for advertising and user analytics purposes, and other publicly available sources.</p><p>What happens if I refuse to provide my personal data?</p><p>Where we need to collect personal data by law, or under the terms of a contract (such as the Terms), and you fail to provide that data when requested, we may not be able to perform the contract (for example, to provide you with the Services). In this case, we may have to cancel or limit your access to the Services, but we will notify you if this is the case at the time.</p><p>&nbsp;</p><p><strong><u>4. HOW DO WE USE YOUR PERSONAL DATA</u></strong></p><p><strong>We use different methods to collect personal data from and about you including through:</strong></p><p>We collect, use, and transfer the personal data about you in accordance with the terms of this Policy to enable you to avail our Services.</p><p>We will only use your personal data when the law allows us to. Most commonly, we will use your personal data where we need to provide you with the Services or where we need to comply with a legal obligation. We use your personal data for the following purposes:</p><p>-to verify your identity to register you as a user, and create your user account with us on the App;</p><p>-to provide the Services to you;</p><p>-to monitor trends and personalise your experience;</p><p>-to improve the functionality of our Services based on the information and feedback we receive from you;</p><p>-to improve customer service to effectively respond to your Service requests and support needs;</p><p>-to send periodic notifications to manage our relationship with you including to notify you of changes to Services, send you information and updates pertaining to the Services you have availed, and to receive occasional company news and updates related to us or the Services; to market and advertise our Services to you;</p><p>-to administer and protect our business and the Services, including for troubleshooting, data analysis, system testing, and performing internal operations;</p><p>-to comply with legal obligations;</p><p>-to improve our business and delivery models;</p><p>-to perform our obligations that arise out of the arrangement we are about to enter or have entered with you;</p><p>-to enforce our Terms; and</p><p>- To respond to court orders, establish or exercise our legal rights, or defend ourselves against legal claims.</p><p>You agree and acknowledge that by using our Services and creating an account with us on the Platform, you authorise us, our associate partners, and affiliates to contact you via email, phone, or otherwise. This is to provide the Services to you and ensure that you are aware of all the features of the Services and for related purposes.</p><p>You agree and acknowledge that any and all information pertaining to you, whether or not you directly provide it to us (via the Services or otherwise), including but not limited to personal correspondence such as emails, instructions from you, etc., may be collected, compiled, and shared by us in order to render the Services to you. This may include but not be limited to our vendors, social media companies, third-party service providers, storage providers, data analytics providers, consultants, lawyers, and auditors. We may also share this information with other entities in the Digital Pahal in connection with the above-mentioned purposes.</p><p>You agree and acknowledge that we may share data without your consent, when it is required by law or by any court or government agency or authority to disclose such information. Such disclosures are made in good faith and belief that it is reasonably necessary to do so for enforcing this Policy or the Terms, or in order to comply with any applicable laws and regulations.</p><p>&nbsp;</p><p><strong><u>5. COOKIES</u></strong></p><p>Cookies are small files that a site or its service provider transfers to your device’s hard drive through your web browser (if you permit it to) that enables the sites or service providers’ systems to recognise your browser and capture and remember certain information.</p><p>We use cookies to help us distinguish you from other users of the App, understand and save your preferences for future visits, keep track of advertisements and compile aggregate data about site traffic and site interaction so that we can offer you a seamless user experience. We may contact third-party service providers to assist us in better understanding our site visitors. These service providers are not permitted to use the information collected on our behalf except to help us conduct and improve our business</p><p>Additionally, you may encounter cookies or other similar devices on certain parts of the App that are placed by third parties. We do not control the use of cookies by third parties. If you send us personal correspondence, such as emails, or if other users or third parties send us</p><p>correspondence about your activities or postings on the Platform, we may collect such information within a file specific to you.</p><p>&nbsp;</p><p><strong><u>6. DISCLOSURES OF YOUR PERSONAL DATA</u></strong></p><p>Trusted third parties such as our associate partners, and service providers that provide services for us or on our behalf. This includes hosting and operating our App, providing marketing assistance, conducting our business, transmitting content, and providing our Services to you; analytic service providers and advertising networks that conduct web analytics for us to help us improve the App, etc. These analytics providers may use cookies and other technologies to perform their services;</p><p>Third parties upon your request or where you explicitly consent to such disclosure; and Regulators and other bodies, as required by law or regulation.</p><p>We require all third parties to respect the security of your personal data and to treat it in accordance with the law. We do not allow our third-party service providers to use your personal data for their own purposes and only permit them to process your personal data for specified purposes and in accordance with our instructions.</p><p>&nbsp;</p><p><strong><u>7. DATA RETENTION</u></strong></p><p>You agree and acknowledge that your personal data will continue to be stored and retained by us for a reasonable period after termination of your account on the App or access to the Services.</p><p>&nbsp;</p><p><strong><u>8. AUTHENTICITY OF INFORMATION</u></strong></p><p>We have taken all reasonable steps to ensure that the information on the App is authentic.</p><p>You agree that the information and personal data you provide us with are true, correct, and accurate. We shall not be liable for any incorrect or false information or personal data that you might provide.</p><p>You may review the information and personal data that you have provided during your use of the App and choose to correct or modify such information if it is incorrect. You may do so by writing to us or our Grievance Officer at the address provided in Section 12 of this Policy.</p><p>&nbsp;</p><p><strong><u>9. DATA SECURITY</u></strong></p><p>We implement certain security measures including encryption and firewalls to protect your personal information from unauthorised access. However, you agree and acknowledge that the above-mentioned measures do not guarantee absolute protection to the personal information and by accessing the Services, you agree to assume all risks associated with disclosure of personal information arising due to breach of firewalls and secure server software.</p><p>Where we have given you (or where you have chosen) a password or OTP that enables you to access certain parts of the Services, you are responsible for keeping this password or OTP confidential. We ask you not to share the password or OTP with anyone.</p><p>We will comply with the requirements under the Information Technology Act, 2000 and the rules made thereunder in the event of a data or security risk.</p><p>You agree and acknowledge that we shall not be liable for:</p><p>Any information leaked due to computer virus, Trojan and hacker attack;</p><p>Any information divulged on account of you sharing your password, OTP or details of your registered account with others; or</p><p>Any other such divulgence caused by any reason not directly/indirectly attributable to us.</p><p>&nbsp;</p><p><strong><u>10. BUSINESS TRANSITIONS</u></strong></p><p>You are aware that in the event we go through a business transition, such as a merger, acquisition by another organisation, or sale of all or a portion of our assets, your personal data might be among the assets transferred.</p><p>&nbsp;</p><p><strong><u>11. CHANGE IN PRIVACY POLICY</u></strong></p><p>We keep our Policy under regular review and may amend this Policy from time to time, subject to the services rendered.</p><ol><li>The terms of this Policy may change and if it does, these changes will be posted on this page and, where appropriate, notified to you by email. The new Policy may be displayed on-screen, and you shall be prompted to read and accept the updated policy if you choose to continue using our Services.</li></ol>', NULL, '2023-08-24 13:44:29'),
(13, 'dms_policy', '<p><br></p>', NULL, '2023-08-24 13:44:29'),
(14, 'gst_policy', '<p><br></p>', NULL, '2023-08-24 13:44:29'),
(15, 'terms_of_service', '<p><strong><u>TERMS AND CONDITIONS</u></strong></p><p>These Terms and Conditions (“Terms”) govern the use of or access to “Digital Pahal”, a software &amp; mobile application (“App”), and the Services (defined below).</p><p>Please read these Terms carefully before accessing or using the Services. These Terms also include our Privacy Policy, and the Data Usage Policy. For any guidelines, additional terms, policies, or disclaimers made available or issued by us from time to time.</p><p>These Terms constitute a binding and enforceable legal contract between Digital Pahal (“Digital Pahal”, “we”, or “us”) and any user of the Services (“you”, “User”, “your”).</p><p>By using the Services, you agree that you have read, understood, and are bound by these Terms, and that you comply with the requirements listed herein. If you do not agree to all these Terms or comply with the requirements herein, please do not access the App or use the Services.</p><p><strong>&nbsp;</strong></p><p><strong><u>1. DEFINITIONS</u></strong></p><p><strong>1.1</strong>&nbsp;&nbsp;“<strong>Additional Information</strong>” shall have the same meaning as assigned to the term under clause 3.1(iii) of these Terms</p><p><strong>1.2</strong>&nbsp;&nbsp;“<strong>Applicable Law</strong>” means any statute, law, regulation, ordinance, rule, judgment, notification, order, decree, by-law, permits, licences, approvals, consents, authorisations, government approvals, directives, guidelines, requirements or other governmental restrictions, or any similar form of decision of, or determination by, or any interpretation, policy or administration, having the force of law of any of the foregoing, by any regulatory authority, whether in effect as on the date of you agreeing to be bound by these Terms or at any time after</p><p><strong>1.3</strong>&nbsp;&nbsp;“<strong>Digital Pahal</strong>” shall mean the storage solution offered by Digital Pahal</p><p><strong>1.4</strong>&nbsp;&nbsp;“<strong>Partner</strong>” shall include all such financial institutions, banks, Non-Banking Financial Companies, and other entities whom Digital Pahal has partnered with.</p><p><strong>1.5</strong>&nbsp;&nbsp;“<strong>Partner Services</strong>” shall mean the services extended by Partners to the Users.</p><p><strong>1.6</strong>&nbsp;&nbsp;“<strong>Person</strong>” shall include an individual, an association, a corporation, a partnership, a joint venture, a trust, an unincorporated organisation, a joint stock company, a bank, a non-banking financial company or other entity or organisation, including a government or political subdivision, or an agency or instrumentality thereof and/or any other legal entity.</p><p><strong>1.7</strong>&nbsp;&nbsp;“<strong>Services</strong>” shall mean such services set out under clause 3.1.</p><p><strong>1.8</strong>&nbsp;&nbsp;“<strong>Uploaded Documents</strong>” shall mean all the documents uploaded by a Organization on the Digital Pahal.</p><p><strong>1.9</strong>&nbsp;&nbsp;“<strong>User Data</strong>” shall mean any and all Uploaded Documents and/or any other data or information that you provide or share with us. This shall include but not be limited to all information derived from Uploaded Documents and/or Additional Information or which is generally available about you in the public domain and it should not content any data or documents which violate any prevailing law time being in force.</p><p><strong>1.10</strong>&nbsp;&nbsp;“<strong>Organization</strong>” shall mean the person or company who had uploaded users data and documents in database.</p><p>&nbsp;</p><p><strong><u>2. ELIGIBILTY</u></strong></p><p><strong>2.1</strong>&nbsp;&nbsp;You represent and warrant that you (i) have full legal capacity and authority to agree and bind yourself to these Terms, (ii) are eighteen years of age or older, and (iii) are an Indian resident.</p><p>&nbsp;</p><p><strong><u>3. SCOPE OF SERVICES</u></strong></p><p><strong>3.1</strong>&nbsp;&nbsp;<strong>Services offered</strong>: We offer the following services to our Users (“Services”):</p><p><strong>Storage Solution</strong>: By way of Digital Pahal, we provide storage, retrieval, management and access features and functionality for User Data. Our storage services will include organisation features and functionality.</p><p><strong>Verification Solution</strong>: Subject to the verifiability of the Uploaded Documents, you may choose to avail our verification services. Upon successful verification of any Uploaded Document, you will be classified as a verified User and this will enable faster and seamless processes and preferred treatment while availing the Partner Services.</p><p><strong>Extraction of data</strong>: You hereby agree and accept that we may, subject to your prior consent, fetch additional data concerning you from various third-party sources. Sharing of User Data: Based on your consent and Partner Service you choose to avail, Zoop shall export and share User Data with the Partner in order to enable you to avail the Partner Services. Further you agree that you may be required to upload and/or share such additional documents (“Additional Information”) with us, which the Partner may need in order to provide you Partner Services</p><p><strong>3.2</strong>&nbsp;&nbsp;<strong>Modification/ updation /discontinuation of Services and/or addition to Services:</strong></p><p>You acknowledge and agree that we may have to modify the Services to comply with the applicable laws. As a result of this, you may be unable to access or use all or any part of the Services. We shall not be liable to you for such inability to use the Services pursuant to our compliance with the Applicable Laws.</p><p>Notwithstanding the above, we reserve the right at any time to add, modify, update, or discontinue, temporarily or permanently, the Services (or any part thereof) with or without cause. We shall not be liable for any such addition, modification, suspension, or discontinuation of the Services.</p><p><strong>Third Party Services:</strong></p><p>The Services may include services, Partner Services, content, documents, and information owned by, licensed to, or otherwise made available by a third-party or Partners (“Third-Party Services”) or contain links to Third-Party Services. You understand and acknowledge that Third-Party Services are the responsibility of the third-party that created or provided it and acknowledge that use of such Third-Party Services is solely at your own risk.</p><p>We make no representations and exclude all warranties and liabilities arising out of or pertaining to such Third-Party Services, including their accuracy or completeness. Should you avail a Third-Party Service, you shall be governed and bound by the terms and conditions and privacy policy of the third-parties providing the Third Party Services. Further, all intellectual property rights in and to Third-Party Services are the property of the respective third-parties.</p><p><strong>Use of Services:</strong></p><p><strong>Restrictions:</strong> Our Services are offered only in India. We may restrict access to our Services from other locations.</p><p><strong>Storage Limits:</strong> There may be limits on the type of User Data that you upload on our App or share with us, including but not limited to, the file types we do not support or the number and/or type of devices that a User can use to access our App and/or Services. Notwithstanding the above, you agree that we may impose other restrictions on the use of Services, including but not limited to restricting your account functionality.</p><p><strong><u>&nbsp;</u></strong></p><p><strong><u>4. PROFILE CREATION</u></strong></p><p>In order to avail the Services, you will be required to create a profile on the App by setting up a username and password (“Profile”). To create a Profile, you must provide us with your phone number, which we will use to authenticate your identity by generating a one-time-password as well as access to your camera for us to be able to carry an identity check by using our facial recognition feature.</p><p>To use the App and avail Services, you are required to allow us to access your camera, location data, transactional SMSs, contacts, installed applications, storage, and such other device data that we may require to provide you with our Services. If you revoke any of our permissions on the App, you shall not be able to avail the Services. Our use of such access provided by you shall be subject to our Privacy Policy and Data Usage Policy.</p><p><strong>You agree that you shall implement reasonable measures to secure access to:</strong></p><p>Any device associated with the profile on the app.</p><p>The username, password, and other login or identifying credentials to access the app.</p><p>You are solely responsible for maintaining the confidentiality of your username and password assigned during the Profile registration process. You agree to immediately notify us of any disclosure or unauthorised use of your Profile, or any other breach of security with respect to your Profile.</p><p>If you know or suspect that anyone other than you knows your password, you must cease using the same password, change your password immediately and promptly notify us as provided under clause 14.5. You expressly agree and consent to be liable and accountable for all activities that take place through your Profile. We shall in no manner be held liable for any unauthorised approvals or requests for any Partner Services through your Profile due to unauthorised access, including but not limited to hacking and security breaches.</p><p><strong>You agree to receive communications from us regarding</strong>: (i) information relating to Partners listed on the App; (ii) information about us, our Services and Third-Party Services, including Partner Services; (iii) promotional offers and services from us and our Third-Party Service providers; and (iv)any other matter in relation to the Services.</p><p>&nbsp;</p><p><strong><u>5. YOUR RESPONSIBILITIES</u></strong></p><p><strong>5.1</strong>&nbsp;&nbsp;You represent and warrant that all information that is provided through or in relation to the Services is complete, true, and correct on the date of agreeing to these Terms and shall continue to be complete, true, and correct while you avail the Services. Should any information that you provide change during the existence of these Terms, you undertake to immediately bring such change to our notice. We do not accept any responsibility or liability for any loss or damage that you may suffer or incur if any information, documentation, material, or data (including User Data) provided to avail the Services is incorrect, incomplete, inaccurate, or misleading, or if you fail to disclose any material fact.</p><p><strong>5.2</strong>&nbsp;&nbsp;You shall be solely responsible for ensuring compliance with Applicable Laws and shall be solely liable for any liability that may arise due to a breach of your obligations in this regard</p><p><strong>5.3</strong>&nbsp;&nbsp;You agree and warrant to provide true, complete, and up-to-date information. If the information provided by you, in our sole discretion, is unreliable or appears to be fraudulent, then you shall not be eligible to avail the Services on the App. If we discover any deficiency in the information provided by you on a later date, then we reserve the right to suspend your Profile.</p><p><strong>5.4</strong> You shall extend all cooperation to us in our defence of any proceedings that may be initiated against us due to a breach of your obligations or covenants under these Terms.</p><p><strong>5.5</strong> You warrant that you shall not engage in any activity that interferes with or disrupts access to the App.</p><p><strong>5.6</strong>&nbsp;&nbsp;You shall not attempt to gain unauthorised access to any portion or feature of the App, any other systems or networks connected to the App, to any of our servers, or through the App, by hacking, password mining, or any other illegitimate means.</p><p><strong>5.7</strong>&nbsp;&nbsp;You shall not use the Services in any manner except as expressly permitted in these Terms. Without limiting the generality of the preceding sentence, you shall not:</p><p>Use the Services to transmit any data or send or upload any material that contains viruses, trojan horses, worms, timebombs, keystroke loggers, spyware, adware, or any other harmful programmes or similar computer code designed to adversely affect the operation of any computer software or hardware use any robot, spider, other automated device, or manual process to monitor or copy the App or any portion thereof engage in the systematic retrieval of content from the App to create or compile, directly or indirectly, a collection, compilation, database, or directory;</p><p>use the Services in (a) any unlawful manner, (b) for fraudulent or malicious activities, or (c) in any manner inconsistent with these Terms; or violate Applicable Laws in any manner</p><p>&nbsp;</p><p><strong><u>6. INTELLECTUAL PROPERTY</u></strong></p><p><strong>6.1</strong>&nbsp;&nbsp;All rights, title, and interest in and to the App and Services, including all intellectual property rights arising out of the App and Services, are owned by, or otherwise licensed to us. Subject to compliance with these Terms, we grant you a non-exclusive, non-transferable, non-sub licensable, royalty free, revocable, and limited license to use the App and Services in accordance with these Terms and its written instructions issued from time to time.</p><p><strong>6.2</strong>&nbsp;&nbsp;We may request you to submit suggestions and other feedback, including bug reports, relating to the App or Services from time to time (“Feedback”). We may freely use, copy, disclose, publish, display, distribute, and exploit the Feedback without any payment of royalty, acknowledgement, prior consent, or any other form of restriction arising out of your intellectual property rights.</p><p><strong>6.3</strong>&nbsp;&nbsp;Except as stated in these Terms, nothing in these Terms should be construed as conferring any right in or license to our or any third party’s intellectual property rights.</p><p>&nbsp;</p><p><strong><u>7. TERM AND TERMINATION</u></strong></p><p><strong>7.1</strong>&nbsp;&nbsp;These Terms shall remain in effect unless terminated in accordance with the terms hereunder.</p><p><strong>7.2</strong>&nbsp;&nbsp;We may terminate your access to or use of the Services, or any portion thereof, immediately and at any point, at our sole discretion if you violate or breach any of the obligations, responsibilities, or covenants under these Terms, or when you cease to become a User of our Services.</p><p><strong>7.3</strong> Upon termination of these Terms:</p><p>- The Profile will expire;</p><p>- use any robot, spider, other automated device, or manual process to monitor or copy the App or any portion thereof</p><p>- You shall not be eligible to avail any features of the Services; and</p><p>- uch clauses shall not terminate that are intended to survive termination or expiry of the Terms.</p><p><strong>7.4</strong>&nbsp;&nbsp;If you do not wish to continue availing our Services and/or wish to deactivate your Profile, you may do so by contacting us at the email address mentioned in clause 14.5.</p><p>&nbsp;</p><p><strong><u>8. DISCLAIMERS AND WARRANTIES</u></strong></p><p><strong>8.1</strong>&nbsp;&nbsp;The use of the Services is at your sole risk.</p><p><strong>8.2</strong>&nbsp;&nbsp;To the extent permitted by Applicable Law, the Services are provided on an “as is” and “as available” basis. We do not warrant that operation of the Services will be uninterrupted or error free or that the functions contained in the Services will meet your requirements.</p><p><strong>8.3</strong>&nbsp;&nbsp;The App, including any data, information, third party software, reference sites, services, or software made available in conjunction with or through the App, is provided on an “as is” and “as available” basis. We make no representation or warranty about the validity, accuracy, correctness, reliability of any information provided on or through the App. We hereby disclaim all implied representations, warranties, or guarantees as to the accuracy, validity, reliability or completeness of any such information and material on the App.</p><p><strong>8.4</strong>&nbsp;&nbsp;We may suspend or withdraw or restrict the availability of all or any part of our App for business, legal and operational reasons. We will try to give you reasonable notice of any such suspension or withdrawal. We shall not be liable for any such addition, modification, suspension or discontinuation of the Services.</p><p><strong>8.5</strong>&nbsp;&nbsp;We, along with our directors, officers, and agents shall not be responsible in any manner whatsoever for the rejection of your application in regard to any Partner Service or other refusal by the Partners of the Facility with or without reason. We are not obliged to inform you of reasons for such refusal/rejection</p><p><strong>8.6</strong>&nbsp;&nbsp;To the fullest extent permissible under Applicable Law, we expressly disclaim all warranties of any kind, express or implied, arising out of the Services, including warranties of merchantability, fitness for a particular purpose, satisfactory quality, accuracy, title and non-infringement, compatibility, applicability, usability, appropriateness, and any warranty that may arise out of course of performance, course of dealing, or usage of trade. No advice or information, whether oral or written, obtained by you through the App will constitute or create any representation or warranty not expressly stated herein.</p><p><strong>8.7</strong>&nbsp;&nbsp;No advice or information, whether oral or written, obtained by you from us shall create any warranty that is not expressly stated in the Terms.</p><p><strong>8.8</strong>&nbsp;&nbsp;To the fullest extent permissible by law, we, our affiliates, and related parties each disclaim all liability towards you for any loss or damage arising out of or due to:</p><p>- your use of, inability to use, or availability or unavailability of the Services;</p><p>- the occurrence or existence of any defect, interruption, or delays in the operation or transmission of information to, from, or through the Services, communications failure, theft, destruction or unauthorised access to our records, programmes, services, server, or other infrastructure relating to the Services; or the failure of the Services to remain operational for any period of time.</p><p><strong>8.9</strong>&nbsp;&nbsp;Notwithstanding anything to the contrary contained herein, neither we nor any of our affiliates or related parties shall have any liability to you or any third party for any indirect, incidental, special or consequential damages or any loss of revenue or profits arising under, directly or indirectly, or relating, in any manner whatsoever, to these Terms or the Services. To the maximum extent permitted by law, you agree to waive, release, discharge, and hold harmless us, our affiliated and subsidiary companies, their parent companies, and each of their directors, officers, employees, and agents, from any and all claims, losses, damages, liabilities, expenses and causes of action arising out of the Services.</p><p><strong>8.10</strong>&nbsp;&nbsp;As Digital Pahal, we only provide defined database between organization and user. Documents are neither created nor uploaded by us and it is the responsibility of organizations and users to determine which documents should be uploaded. We provide a secure platform for organizations and users to store, manage, and access documents. We ensure that all documents are stored in an encrypted format and are only accessible by the organization or user who uploaded the documents. We also provide detailed access control settings for documents, allowing organizations and users to set up different access levels for different users. We also monitor the platform for any suspicious activity and take immediate action if needed.</p><p>&nbsp;</p><p><strong><u>9. INDEMNITY</u></strong></p><p><strong>9.1</strong>&nbsp;You shall indemnify, defend at our option, and hold us, our subsidiaries, affiliates, and their officers, associates, successors, assigns, licensors, employees, directors, agents, and representatives, harmless from and against any claim, demand, lawsuits, judicial proceeding, losses, liabilities, damages and costs (including, without limitation, all damages, liabilities, settlements, and attorneys’ fees) due to or arising out of your access to the Services, use of the Services, violation of these Terms or any infringement of these Terms by any third party who may use your Profile to access the Services.</p><p>&nbsp;</p><p><strong><u>10. LIMITATION OF LIABILITY</u></strong></p><p><strong>10.1</strong>&nbsp;In no event shall we, our officers, directors and employees, or our contractors, agents, licensors, or suppliers be liable to compensate you or any third party for any direct, special, incidental, indirect, consequential or punitive, reliance or exemplary damages whatsoever, (including without limitation those resulting from lost business opportunities, lost revenues, or loss of anticipated profits or any other pecuniary or non-pecuniary loss or damage of any nature whatsoever, including but not limited to abuse or breach of User Data or any other information provided by you) whether or not foreseeable, and whether or not we had been advised of the possibility of such damages, based on any theory of liability, including breach of contract or warranty, negligence or other tortuous action, or any other claim arising out of or in connection with (i) your use of or access to the App; (ii) these Terms; (iii) the Services; (iv) your ability or inability to use the Services; or (v) any other interaction with any Partner in connection with the Partner Services.</p><p><strong>10.2</strong> Notwithstanding anything to the contrary, the maximum aggregate liability of Digital Pahal and its affiliates for any claims under these Terms, shall not exceed INR 5000.</p><p>&nbsp;</p><p><strong><u>11. LIMITATION OF LIABILITY</u></strong></p><p><strong>11.1</strong> These Terms shall be governed by and construed and enforced in accordance with the laws of India and any dispute concerning these Terms shall be subject to the exclusive jurisdiction of courts at Surat, India.</p><p><strong>11.2</strong> Any dispute or claim arising out of or in connection with or relating to these Terms or their breach, termination or invalidity hereof (“Dispute”) shall be referred to and finally resolved by arbitration in Pune in accordance with the Arbitration and Conciliation Act, 1996, for the time being in force, which is deemed to be incorporated by reference in this Clause. The tribunal shall consist of 1 (one) arbitrator appointed by us.</p><p><strong>11.3</strong> The seat of arbitration shall be Pune and the arbitration proceedings shall be conducted in the English language.</p><p><strong>11.4</strong> We/You agree to keep the arbitration confidential and not disclose to any Person, other than on a need to basis or to legal advisors, unless required to do so by law. The decision of the arbitrator shall be final and binding on all the parties hereto.</p><p><strong>11.5</strong> We/You hereto agree that consent for resolution of Dispute through arbitration shall not preclude or restrain you/us from seeking suitable injunctive relief in appropriate circumstances from courts in Pune, India.</p><p><strong>11.6</strong> The cost of arbitration shall be borne in the manner and by us/you as determined by the arbitrators. In the meantime, we/you shall bear our/your own cost for the arbitration which shall be reimbursed as per the directions in the arbitral award.</p><p>&nbsp;</p><p><strong><u>12. CONSENT TO USE DATA</u></strong></p><p><strong>12.1</strong>&nbsp;&nbsp;You agree that we may, in accordance with our Privacy Policy and Data Usage Policy, collect and use User Data, technical data and related information.</p><p><strong>12.2</strong>&nbsp;&nbsp;We may use information and data pertaining to your use of the Services for analytics, trends identification, and purposes of statistics to further enhance the effectiveness and efficiency of the App.</p><p>&nbsp;</p><p><strong><u>14. MISCELLANEOUS PROVISIONS</u></strong></p><p><strong>14.1 Waiver:</strong> No failure or delay in exercising any right, power or privilege hereunder shall operate as a waiver thereof nor shall any single or partial exercise of any right, power or privilege preclude any other or further exercise thereof or the exercise of any other right, power or privilege. Every right or remedy herein conferred upon or reserved to either party shall be cumulative and shall be in addition to every right and remedy existing at law or equity or by statute and the pursuit of any one right or remedy shall not be construed as an election.</p><p><strong>14.2 Modification:</strong> We reserve the right at any time to modify these Terms and to add new or additional terms or conditions on use of the Services. Such modifications and additional terms and conditions will be communicated to you and, unless expressly rejected (in which case these Terms shall terminate), will be effective immediately and will be incorporated into these Terms. In the event you refuse to accept such changes, these Terms will terminate.</p><p><strong>14.3</strong> <strong>Severability</strong>: If any provision of these Terms is determined by any court or other competent authority to be unlawful or unenforceable, the other provisions of these Terms will continue in effect. If any unlawful or unenforceable provision would be lawful or enforceable if part of it were deleted, that part will be deemed to be deleted, and the rest of the provision will continue in effect (unless that would contradict the clear intention of the clause, in which case the entirety of the relevant provision will be deemed to be deleted).</p><p><strong>14.4</strong> <strong>Assignment</strong>: You shall not license, sell, transfer, or assign your rights, obligations, or covenants under these Terms in any manner without our prior written consent. We may grant or withhold this consent at our sole discretion and subject to any conditions we deem appropriate. We may assign our rights to any of our affiliates, subsidiaries, or parent companies, or to any successor in interest of any business associated with the Services without any prior notice to the you.</p><p><strong>14.5</strong> <strong>Notices</strong>: All notices, requests, demands, and determinations for us under these Terms (other than routine operational communications) shall be sent.</p><p><strong>14.6</strong> <strong>Third Party Rights</strong>: No third party shall have any rights to enforce any terms contained herein.</p><p><strong>14.7</strong>&nbsp;<strong>Force Majeure:</strong> You agree that we shall not be liable for any breach of these Terms if such breach is caused by an event that is unforeseeable and beyond our reasonable control (such as, depending on the circumstances, unavailability of any communication system, breach or virus in our system, sabotage, fire, flood, explosion, acts of God, civil commotion, strikes or industrial action of any kind, riots, insurrection, war, acts of government, unauthorized access to computer data and storage devices, computer crashes and regulatory or government actions (“Force Majeure Event”). In such circumstances, we will be entitled to a reasonable extension of time to perform our obligations and shall take commercially reasonable methods to inform you of the Force Majeure Event and use all reasonable endeavours to mitigate the effects of the Force Majeure Event.</p><p><strong>14.8</strong> <strong>Translations</strong>: We may provide you with translated versions of these Terms solely to assist you with understanding these Terms in greater detail. The English version of these Terms shall be controlling in all respects. In the event of any inconsistency between the English version of these Terms and any translated version, the terms of the English version shall prevail</p><p>&nbsp;</p><p><strong><u>15. CONTACT DETAILS</u></strong></p><p><strong>15.1</strong>&nbsp;If you have any questions, complaints, or claims with respect to the Services, you may contact us at support@digitalpahal.com email address.</p>', NULL, '2023-08-24 13:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `support_chats`
--

CREATE TABLE `support_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `client_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=>pending, 1=>inprocess, 2=>resolved',
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `user_type` tinyint(4) NOT NULL DEFAULT 3 COMMENT '1=>Admin, 2=>Accountant, 3=>Client',
  `added_by` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `image`, `status`, `user_type`, `added_by`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Master Admin', 'asodariyamahesh01@gmail.com', '1111111111', NULL, 1, 1, NULL, NULL, '$2y$10$kXPfOWpUnUT4XWZ1nvgV..4LBSLnQk/jknl4pNTnUJRrzRSfwN0K6', NULL, '2023-05-17 11:33:02', '2023-06-22 16:46:47'),
(29, 'Suresh Gohel', 'sureshgohel@gmail.com', '1234567890', NULL, 1, 3, 26, NULL, NULL, NULL, '2023-06-21 12:28:59', '2023-06-21 12:28:59'),
(30, 'Mahesh Asodariya', 'asodariyaconsultancy@gmail.com', '8238486185', NULL, 1, 2, 1, NULL, '$2y$10$Kf8JYoAL4joYMtv.8P73w.2KrgiuSeuvCzeVY0nQBmZkUD/3FbXNy', NULL, '2023-06-22 10:31:59', '2023-06-22 10:31:59'),
(31, 'Mahesh Asodariya', 'Asodariyamahesh1@gmail.com', '9328090070', NULL, 1, 3, 30, NULL, '$2y$10$Aj4SM.2EcbZNNf7Vm0ZAh.uBE2ijuhUTu9nkaRBay2/q/zKPoFwaq', NULL, '2023-06-22 10:59:04', '2023-11-03 15:57:05'),
(33, 'Jaydip Shiroya', 'jaydipbhagat9024@gmail.com', '9898410330', NULL, 1, 3, 30, NULL, '$2y$10$0e6.jalTbgz3smiyTPnEsO8KZAHaoU4kadm3LGo.eqh6/dnLQ1RZG', NULL, '2023-06-22 12:18:16', '2023-07-05 16:13:59'),
(34, 'Nilesh Asodariya', 'asodariyanilesh@gmail.com', '9712223490', NULL, 1, 3, 30, NULL, '$2y$10$2kBj7.WEzP4RwK800HmG2.LtDEmn/g2Pvbi.5XtaNSpw69wbbjqdm', NULL, '2023-06-22 12:35:35', '2023-06-22 13:56:58'),
(35, 'Shilpaben Nileshbhai Asodariya', 'shilpaasodariya999@gmail.com', '9712223480', NULL, 1, 3, 34, NULL, NULL, NULL, '2023-06-22 19:14:31', '2023-06-22 19:17:45'),
(36, 'Alpeshbhai Haradasbhai Vaghasiya', 'vaghasiyaalpesh67@gmail.com', '99095 09756', NULL, 1, 3, 30, NULL, '$2y$10$BZlyvkdxDMdNtUfMcYXaTOOAKE8oSdL5M0XgMgo3.w3wauplKFRSO', NULL, '2023-06-22 21:14:46', '2023-06-22 21:14:46'),
(38, 'Mahendrabhai Chovatiya', 'cmahendra0007@gmail.com', '9725727826', NULL, 1, 3, 30, NULL, '$2y$10$Y9Z8ZtsLzicYX0sSmCW6DOKtFRRw6cWajHOR.RecwH3E/snnERnMu', NULL, '2023-06-24 12:36:30', '2023-06-24 12:36:30'),
(39, 'Bhavdip Vinodbhai Ramani', 'bhavdipramani77123@gmail.com', '81530 0375', NULL, 1, 3, 30, NULL, '$2y$10$7E8u2za0n/WeMhZCDVf0Uu59FJ7i3FUs9i4BV98LG8GnY7ukiJ5O6', NULL, '2023-06-24 15:46:25', '2023-06-24 15:46:25'),
(40, 'Sudhir Vinubhai Kotadiya', 'Sudhir.kotadiya88@gmail.com', '99792 74570', NULL, 1, 3, 30, NULL, '$2y$10$vvnmsAS/koxK04sQJeD/fOrGBzg.Zqi7jGcETzmKRrlhU1Y6iNuW2', NULL, '2023-06-24 15:59:42', '2023-06-24 15:59:42'),
(41, 'Ghanshyambhai Laxmanbhai Asodariya', 'Ghanshyam.asodariya@gmail.com', '9375573894', NULL, 1, 3, 30, NULL, '$2y$10$BKsdiHpFd8WGsSEHhuxvn.I/IaIGg0HJxRxBaLUmRnSgfP0NrUl0C', NULL, '2023-06-24 16:10:01', '2023-12-19 11:31:40'),
(42, 'Jigneshbhai Bharatbhai Nakrani', 'jnakrani888@gmail.com', '7405709096', NULL, 1, 3, 30, NULL, '$2y$10$5qtIq0UU/JxvcndXf2AAQu76NN6vwURcgmM5jegEO2OGU8Pevatzu', NULL, '2023-06-24 16:37:19', '2023-07-03 10:34:53'),
(43, 'Nikhil Chandreshbhai Virani', 'viraninikhil266@gmail.com', '9067777494', NULL, 1, 3, 30, NULL, '$2y$10$xxYmvTV6Bd9i.gHIFNAeiuv75CIkn.jQXLRJdeE1Zv3ElPTeRHm/q', NULL, '2023-06-24 16:43:50', '2023-06-24 16:43:50'),
(44, 'SACHIN GORDHANBHAI KALENA', 'ksgoffice01@gmail.com', '8000092480', NULL, 1, 2, 1, NULL, '$2y$10$GjxVucOJSk40x0KXrAumjeYxnl/XKPuPAQ00DQO12FnVhGuRJVAd2', NULL, '2023-06-26 18:03:21', '2023-06-26 18:03:21'),
(49, 'MAHESHBHAI BABUBHAI KATHAROTIYA', 'gauravkathrotiya50@gmail.com', '7698134235', NULL, 1, 3, 44, NULL, '$2y$10$7Zt0FnaCllujxv8LUJjlWOJJshjZOzKPl4C7N9Y/Bf3U.cZ2v1Ec.', NULL, '2023-06-26 18:18:22', '2023-07-07 17:14:53'),
(50, 'PARESH BHIMJIBHAI DESAI', 'desaibhuatik275@gmail.com', '9825896898', NULL, 1, 3, 44, NULL, '$2y$10$oLJETRYQh3.SSj5HJsFyjuP7gDcYKuL6hnl6LVFqzuFWQYhTjFqgm', NULL, '2023-06-26 18:19:42', '2023-06-26 18:19:42'),
(51, 'Vikash Rameshbhai Patel', 'Vikaspatel676767@gmail.com', '76230 89738', NULL, 1, 3, 30, NULL, '$2y$10$dLrLCVUfZZB/jl.jiILFmOCbqJF2jC1syR28RO/CkfcWEqBHExkbC', NULL, '2023-06-27 11:42:45', '2023-06-30 13:25:56'),
(52, 'SURESH BABUBHAI DESAI', 'SURESHDESAI3223@GMAIL.COM', '9879906408', NULL, 1, 3, 44, NULL, '$2y$10$LLhaMPt.GGptjUtrZSWvEutiPWskncWQkjHTk9bKJzIgL8919kOg6', NULL, '2023-06-27 12:03:34', '2023-06-27 12:03:34'),
(53, 'Vigneshbhai Baldaniya', 'vrindatextiles1@gmail.com', '97122 47570', NULL, 1, 3, 30, NULL, '$2y$10$AGV7cBx1d7SIzD6SOzYcDObT2LEo1SIIBcy.S.6JCScSZ2XmxlCgS', NULL, '2023-06-27 14:24:36', '2023-06-27 14:24:36'),
(54, 'JAYESHBHAI TULSHIBHAI MENDPARA', 'mendparasangani@gmail.com', '7600768080', NULL, 1, 2, 1, NULL, '$2y$10$20esXgxPbbEvs9fdj6aXOeNSHtij/Jj60tIGEwr2WKdeNo5rL1Yyq', NULL, '2023-06-28 18:16:48', '2023-06-28 18:18:21'),
(55, 'Vaghasiya Kaushik Kishorbhai', 'kaushikvaghasiya300@gmail.com', '6353546932', NULL, 1, 3, 30, NULL, '$2y$10$O1WhFRpGsrLLBGUwi19EpOaSPNN3M3C.YNrxqAnkznQI.LotjoDb6', NULL, '2023-06-30 10:43:09', '2023-06-30 10:43:09'),
(56, 'MILAN PRAFULBHAI RIBDIYA', 'milanribadiya1@gmail.com', '7874462005', NULL, 1, 3, 30, NULL, '$2y$10$f8.rq3ENL54TKyQ.8ifQuenSnr2kkfqK/g4CWjPAidsvYFpKh9LYG', NULL, '2023-06-30 18:52:04', '2023-06-30 18:52:04'),
(57, 'ANJALI MILAN RIBDIYA', 'milanribadiya2@gmail.com', '9925908461', NULL, 1, 3, 56, NULL, NULL, NULL, '2023-07-02 11:00:40', '2023-07-02 11:00:40'),
(58, 'Nilesh Bhikhabhai Sojitra', 'sojitranilesh974@gmail.com', '7990862105', NULL, 1, 3, 30, NULL, '$2y$10$n0V11.lyUHF2ZuE8QiSrb.csAjnh8fo1miHyFPCtYTr2.Ih16jqRq', NULL, '2023-07-03 17:57:45', '2023-07-03 17:57:45'),
(59, 'Jigneshbhai Bhadani', 'jigneshbhai@gmail.com', '8238486186', NULL, 1, 3, 33, NULL, NULL, NULL, '2023-07-05 16:16:31', '2023-07-05 16:16:31'),
(60, 'CHIRAG VASHRAMBHAI GOTI', 'CHIRAG.GOTI@GMAIL.COM', '9376115485', NULL, 1, 3, 50, NULL, NULL, NULL, '2023-07-07 15:01:02', '2023-07-07 15:01:02'),
(61, 'Gaurav kathrotiya', 'gauravkathrotiya500@gmail.com', '7698134236', NULL, 1, 3, 49, NULL, NULL, NULL, '2023-07-07 17:23:09', '2023-07-07 17:23:09'),
(62, 'ZALAVADIYA JASMITKUMAR BHARATBHAI', 'jasmitzalavadiya999@gmail.com', '9726722623', NULL, 1, 3, 44, NULL, '$2y$10$StQf7dN1r2G7k3V31u2sduU3dTaE.GPxctTbAS3Maz6yqcOaFwEXm', NULL, '2023-07-08 17:47:00', '2023-07-08 17:47:00'),
(63, 'DENISHBHAI RANCHHODBHAI VIRADIYA', 'denisviradiya16@gmail.com', '7048390232', NULL, 1, 3, 44, NULL, '$2y$10$SsGsqKy10/A0GdY3Jwix/udCBbeHtHBQFQLGtK48fezlaCEcgTpVy', NULL, '2023-07-08 17:53:03', '2023-07-08 18:15:15'),
(70, 'VIPULBHAI BHIMJIBHAI DESAI', 'vipuldesai3705@gamil.com', '9825740498', NULL, 1, 3, 50, NULL, NULL, NULL, '2023-07-10 15:26:35', '2023-07-10 15:26:35'),
(71, 'SHILPABEN VIPULBHAI DESAI', 'shilpadesai3705@gmail.com', '9723540498', NULL, 1, 3, 50, NULL, NULL, NULL, '2023-07-10 15:32:03', '2023-07-10 15:32:03'),
(72, 'HARSHIL VIPULBHAI DESAI', 'harshildesai3705@gmail.com', '9924500498', NULL, 1, 3, 50, NULL, NULL, NULL, '2023-07-10 15:41:24', '2023-07-10 15:41:24'),
(73, 'NISHA KANUBHAI KATHROTIYA', 'nishakpatel115@gmail.com', '9727909337', NULL, 1, 2, 1, NULL, '$2y$10$zyGNRdGhS7W.kypa3fErzOOdwKZGt/TmTpJ211hC0FLMAMb4J97dy', NULL, '2023-07-17 12:37:53', '2023-07-17 12:37:53'),
(74, 'JAYESHBHAI L PATEL', 'pateljayesh143pj.pj@gmail.com', '9714034102', NULL, 1, 3, 73, NULL, '$2y$10$z7jJmAoIq9o5P.N2VqrgheP61H.i2N4K1bF0K2qbCMe.CTwoVC/iG', NULL, '2023-07-17 18:18:53', '2023-07-17 18:30:57'),
(75, 'USHABEN JAYESHBHAI PATEL', 'ushapatel@gmail.com', '9714034103', NULL, 1, 3, 74, NULL, NULL, NULL, '2023-07-17 20:06:42', '2023-07-17 20:06:42'),
(76, 'Naimish Batukbhai Baraiya', 'naimishbaraiya4@gmail.com', '8690874754', NULL, 1, 2, 1, NULL, '$2y$10$bNNbQjVQAygg6w.PD5/ngONKWFL6ABqHo55yYpvVP7gZmycQ4.YFG', NULL, '2023-07-30 18:21:17', '2023-07-30 18:21:17'),
(77, 'Mehul Jiteshbhai Parmar', 'Mp7251798@gmail.com', '7359152327', NULL, 1, 3, 76, NULL, '$2y$10$SSmWpy/6cQyW/dQUhE90M.RgiRo4YuTuGtv6bc3z08IUm3TFUhwMK', NULL, '2023-07-30 18:24:48', '2023-07-30 18:24:48'),
(78, 'DHRUVIL VASANTBHAI RIBADIYA', 'aavishtaxconsultancy@gmail.com', '9376808001', NULL, 1, 2, 1, NULL, '$2y$10$z97fnbDRsY623OeGE0XSrOv6rQ68E1RA0bipI1T4MERHzob6J98ie', NULL, '2023-08-25 22:23:34', '2023-08-25 22:23:34'),
(79, 'DHRUVIL RIBADIYA', 'rdhruvil01@gmail.com', '9638120782', NULL, 1, 3, 78, NULL, '$2y$10$IAdg3WyGiK4goT8Gh0HTteB4UXZVOG0735KNWEN/Yay1s/h1twN4K', NULL, '2023-08-25 22:28:21', '2023-08-25 22:35:52'),
(81, 'Smit V. Ktakpara', 'Smitktakpara@gmail.com', '97236 16608', NULL, 1, 3, 30, NULL, '$2y$10$0ievpXM6SpgAwuUBMriJ7OB8mra7juyVXwkC5YECkBRl2Dm4qgLn2', NULL, '2023-09-10 12:51:44', '2023-09-10 12:51:44'),
(85, 'Vivekbhai Borad', 'vp85700@gmial.com', '9913556995', NULL, 1, 3, 30, NULL, '$2y$10$lYNFA/YOPI2NDwX3pYAwieJrhO.PycTX65XLJhtkiBa6EVsku9dA2', NULL, '2023-10-11 16:42:46', '2023-10-11 16:42:46'),
(87, 'Trishul Infra', 'TrishulInfra01@gmail.com', '9909652977', NULL, 1, 3, 30, NULL, '$2y$10$s/h5L74V9/7VoYPOixYZMOFo183KZCmaA9DDh0RliejtmaZGz4Bqu', NULL, '2023-11-27 16:37:03', '2023-11-27 16:37:03'),
(88, 'Hardikbhai Ghanshyambhai Borad', 'hardik2borad@gmail.com', '9558115901', NULL, 1, 3, 30, NULL, '$2y$10$CEmnrAPEzERl7lOs9igFCu2I.B1ioc890lf8aIKL0xBg4faRWsuiG', NULL, '2023-12-13 11:13:51', '2023-12-13 11:13:51'),
(89, 'Meetbhai Ashokbhai Kukadiya', 'Mitkukadiya94@gmail.com', '9428996713', NULL, 1, 3, 30, NULL, '$2y$10$GiIQQ.Hxa1xOfUS5lzud6.MEbDIm4folybIUTl7hB9c774lTZ/XxO', NULL, '2023-12-13 14:36:17', '2023-12-13 14:36:17'),
(90, 'Paras satasiya', 'parassatasiya314@gmail.com', '6353999096', NULL, 1, 3, 30, NULL, '$2y$10$qM67WhY3UMvgjW8eUNWJGezOM/7TlMm3UtshkEn8AzMepDa0LWjtO', NULL, '2023-12-17 23:17:50', '2023-12-17 23:17:50'),
(91, 'JIGNESHKUMAR TULSIBHAI BALAR', 'BALARANDCO@GMAIL.COM', '9979440183', NULL, 1, 2, 1, NULL, '$2y$10$qh1qiC0XcxU3Wis21/jnCe75pTRmrfccKo2TBVb16Ef1r0nSPRWz2', NULL, '2023-12-25 10:24:11', '2023-12-25 10:24:11'),
(93, 'AMITKUMAR TULSIBHAI BALAR', 'amitbalar2@gmail.com', '9974398011', NULL, 1, 3, 91, NULL, '$2y$10$lUYwNQQq.b.LY6sYeqJdje3W9IbNcPHGJbrM6kiJ/HjivwUQvBT0e', NULL, '2023-12-28 16:15:56', '2023-12-28 16:15:56'),
(94, 'Nitesh Mansukhbhai Mangaroliya', 'mangroliyanitesh1999@gmail.com', '8000072679', NULL, 1, 3, 30, NULL, '$2y$10$wQF8cOVrNIsQadZqyky.ZuyiS5ndVi2vUtncNkMUFwA1PQmzShGju', NULL, '2024-01-02 16:38:21', '2024-01-02 16:38:21'),
(95, 'Chetana S.Rakholiya', 'Chetanabenrakholiya@gmail.com', '98984 10330', NULL, 1, 3, 33, NULL, NULL, NULL, '2024-01-06 12:42:14', '2024-01-06 12:42:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant_details`
--
ALTER TABLE `accountant_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_subtypes`
--
ALTER TABLE `document_subtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_chats`
--
ALTER TABLE `support_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant_details`
--
ALTER TABLE `accountant_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=436;

--
-- AUTO_INCREMENT for table `document_subtypes`
--
ALTER TABLE `document_subtypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `support_chats`
--
ALTER TABLE `support_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
