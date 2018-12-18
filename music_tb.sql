-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 12:20 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `music_tb`
--

CREATE TABLE `music_tb` (
  `id` int(10) UNSIGNED NOT NULL,
  `artist` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `song` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `music_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- Indexes for table `music_tb`
--

-- Dumping data for table `music_tb`
--

INSERT INTO `music_tb` (`artist`, `song`, `album`, `category`, `year`, `created_at`, `updated_at`, `music_file`) VALUES
(NULL, 'Backstreet Boys - I Want It That Way.mp3', NULL, NULL, NULL, '2018-11-11 08:03:42', '2018-11-11 08:03:42', 'public/storage/myMusic/Backstreet Boys - I Want It That Way.mp3'),
(NULL, 'Alanis Morissette - Ironic.mp3', NULL, NULL, NULL, '2018-11-18 08:38:35', '2018-11-18 08:38:35', 'public/storage/myMusic/Alanis Morissette - Ironic.mp3'),
(NULL, 'Alanise Morisette - Thank You.mp3', NULL, NULL, NULL, '2018-11-18 08:43:55', '2018-11-18 08:43:55', 'public/storage/myMusic/Alanise Morisette - Thank You.mp3'),
(NULL, 'Backstreet Boys - I Want It That Way.mp3', NULL, NULL, NULL, '2018-11-18 08:54:33', '2018-11-18 08:54:33', 'public/storage/myMusic/Backstreet Boys - I Want It That Way.mp3'),
(NULL, 'Calvin Harris & Rihanna - This Is What You Came For.mp3', NULL, NULL, NULL, '2018-12-04 09:44:24', '2018-12-04 09:44:24', 'public/storage/myMusic/Calvin Harris & Rihanna - This Is What You Came For.mp3'),
(NULL, 'Phats and small - Feel good.mp3', NULL, NULL, NULL, '2018-12-04 10:10:08', '2018-12-04 10:10:08', 'public/storage/myMusic/Phats and small - Feel good.mp3'),
(NULL, 'Savage Garden - To The Moon And Back.mp3', NULL, NULL, NULL, '2018-12-05 10:32:56', '2018-12-05 10:32:56', 'public/storage/myMusic/Savage Garden - To The Moon And Back.mp3'),
(NULL, 'Eric Clapton - (1991) Wonderful Tonight.mp3', NULL, NULL, NULL, '2018-12-05 10:36:29', '2018-12-05 10:36:29', 'public/storage/myMusic/Eric Clapton - (1991) Wonderful Tonight.mp3');

--
-- Indexes for dumped tables
--

--

