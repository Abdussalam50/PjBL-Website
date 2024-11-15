-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 06:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_comment`
--

CREATE TABLE `table_comment` (
  `ID` int(11) NOT NULL,
  `NAMA` varchar(30) NOT NULL,
  `COMMENT` text NOT NULL,
  `TIME` datetime NOT NULL,
  `KELOMPOK` varchar(30) NOT NULL,
  `CLASS` varchar(8) NOT NULL,
  `LINK` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_comment`
--

INSERT INTO `table_comment` (`ID`, `NAMA`, `COMMENT`, `TIME`, `KELOMPOK`, `CLASS`, `LINK`) VALUES
(41, 'hadist', 'hello', '2024-06-28 14:55:44', 'kelompok1', 'XIIMIPA1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/s8BZZO09HVI?si=62xfhaAbbSoMDRPq\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `table_comment_guru`
--

CREATE TABLE `table_comment_guru` (
  `ID_COMMENT` int(11) NOT NULL,
  `NAMA_GURU` varchar(30) NOT NULL,
  `COMMENT` text NOT NULL,
  `TIME` datetime NOT NULL,
  `KELAS` varchar(10) NOT NULL,
  `LINK` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_comment_guru`
--

INSERT INTO `table_comment_guru` (`ID_COMMENT`, `NAMA_GURU`, `COMMENT`, `TIME`, `KELAS`, `LINK`) VALUES
(23, 'Abdussalam Aswin Hadist', 'video yang bagus', '2024-06-28 14:58:28', 'XIIMIPA1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/s8BZZO09HVI?si=62xfhaAbbSoMDRPq\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `table_forum_diskusi`
--

CREATE TABLE `table_forum_diskusi` (
  `ID_USER` int(5) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `DATE` datetime NOT NULL,
  `CHAT` varchar(10000) NOT NULL,
  `KELAS` varchar(30) NOT NULL,
  `KELOMPOK` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_forum_diskusi`
--

INSERT INTO `table_forum_diskusi` (`ID_USER`, `NAME`, `DATE`, `CHAT`, `KELAS`, `KELOMPOK`) VALUES
(598, 'Hadist', '2024-05-27 09:37:53', 'xgx', '', ''),
(599, 'Abdussalam Aswin Hadist', '2024-05-27 09:39:34', 'jvh', '', ''),
(600, 'Hadist', '2024-05-27 09:41:44', 'hcc', '', ''),
(601, 'Hadist', '2024-05-27 09:44:15', 'fewyvew', '', ''),
(602, 'Abdussalam Aswin Hadist', '2024-05-27 09:45:35', 'greire', '', ''),
(603, 'Hadist', '2024-05-27 09:45:59', 'bur', '', ''),
(604, 'Abdussalam Aswin Hadist', '2024-05-27 09:46:11', 'febe', '', ''),
(605, 'Hadist', '2024-05-27 10:09:24', 'evue', '', ''),
(606, 'Hadist', '2024-05-27 10:11:50', 'fburf', '', ''),
(607, 'Abdussalam Aswin Hadist', '2024-05-27 10:12:14', 'feuwe', '', ''),
(608, 'Hadist', '2024-05-27 10:12:30', 'yevwy', '', ''),
(612, 'Abdussalam Aswin Hadist', '2024-05-27 10:27:20', 'Hellow this world... ', '', ''),
(613, 'Hadist', '2024-05-27 10:27:44', 'fbudubvsdvjbdbvbsjb bu fbubfusb ubfubuesbfsbu bfubuibfsubjb ubfuebgfuisvbsbus', '', ''),
(614, 'Hadist', '2024-05-27 10:28:13', 'kvnirgi nin infin iniognrwn nignini iniwn ini nginig ngiirnig ngirnioaon ioniorntigronin inginapopreiongin nginwioangi nignwrignfoisanfw', '', ''),
(615, 'Hadist', '2024-05-31 10:07:12', 'abcdefghijklmn opqrstuvwxyz', '', ''),
(617, 'Hadist', '2024-05-31 10:08:30', 'febu', '', ''),
(618, 'Abdussalam Aswin Hadist', '2024-05-31 10:08:51', 'null', '', ''),
(619, 'Hadist', '2024-05-31 10:09:11', 'undefine?', '', ''),
(620, 'Abdussalam Aswin Hadist', '2024-05-31 10:09:20', 'yes', '', ''),
(621, 'Hadist', '2024-05-31 10:10:15', 'are u sure?', '', ''),
(622, 'Abdussalam Aswin Hadist', '2024-05-31 10:10:26', 'yes', '', ''),
(623, 'Hadist', '2024-05-31 10:11:12', '...', '', ''),
(624, 'Abdussalam Aswin Hadist', '2024-05-31 10:11:22', 'HOAM', '', ''),
(625, 'Hadist', '2024-05-31 10:14:46', 'bosan ', '', ''),
(626, 'Abdussalam Aswin Hadist', '2024-05-31 10:14:56', 'yes', '', ''),
(627, 'Hadist', '2024-05-31 14:19:53', '...', '', ''),
(628, 'Abdussalam Aswin Hadist', '2024-05-31 14:21:14', '..', '', ''),
(629, 'Hadist', '2024-05-31 14:21:50', '...', '', ''),
(633, 'Abdussalam Aswin Hadist', '2024-05-31 14:35:32', 'hai anak2', '', ''),
(636, 'Hadist', '2024-05-31 14:43:58', 'Tes pak', '', ''),
(641, 'Hadist', '2024-05-31 15:06:05', 'Y', '', ''),
(642, 'Hadist', '2024-05-31 22:09:11', 'Y', '', ''),
(643, 'Hadist', '2024-05-31 22:09:43', 'Y', '', ''),
(647, 'Hadist', '2024-05-31 22:16:45', 'x', '', ''),
(704, 'Abdussalam Aswin Hadist', '2024-06-01 09:14:42', 'trgr', '', ''),
(707, 'Hadist', '2024-06-04 13:56:21', 'Halo', '', ''),
(714, 'Hadist', '2024-06-05 09:24:03', 'Jangan lupa makan', '', ''),
(716, 'Abdussalam Aswin Hadist', '2024-06-05 09:30:56', 'BAHAHAH', '', ''),
(719, 'Abdussalam Aswin Hadist', '2024-06-05 14:49:09', 'hari ini kita akan mendiskusikan tentang project pada materi usaha dan energi', '', ''),
(720, 'Abdussalam Aswin Hadist', '2024-06-20 22:12:58', 'aknvriirev', 'XIIMIPA1', ''),
(723, 'Abdussalam Aswin Hadist', '2024-06-23 15:52:21', 'Hello', 'XIIMIPA1', ''),
(724, 'Abdussalam Aswin Hadist', '2024-06-23 15:54:54', 'Tolong', 'XIIMIPA1', ''),
(726, 'Hadist', '2024-06-23 15:58:45', 'Tolong', 'XIIMIPA1', ''),
(727, 'Abdussalam Aswin Hadist', '2024-06-23 16:01:33', 'Tolong', 'XIIMIPA1', ''),
(729, 'Yunita', '2024-06-29 08:04:04', 'hello', 'XIIMIPA1', ''),
(730, 'Abdussalam Aswin Hadist', '2024-07-05 11:53:11', 'Twes', 'XIIMIPA1', ''),
(734, 'Abdussalam Aswin Hadist', '2024-07-05 11:59:38', 'H3llo', 'XIIMIPA1', ''),
(738, 'Yunita', '2024-07-05 12:06:28', 'Hello', 'XIIMIPA1', ''),
(740, 'Hadist', '2024-07-05 12:07:07', 'T', 'XIIMIPA1', ''),
(742, 'Abdussalam Aswin Hadist', '2024-07-05 12:16:25', 'Hai', 'XIIMIPA1', ''),
(743, 'Abdussalam Aswin Hadist', '2024-07-05 12:17:00', 'Hei', 'XIIMIPA1', ''),
(744, 'Abdussalam Aswin Hadist', '2024-07-05 12:17:17', 'Hello', 'XIIMIPA1', ''),
(745, 'Hadist', '2024-07-05 12:18:08', 'Diskusikan? ', 'XIIMIPA1', ''),
(746, 'Hadist', '2024-07-05 12:18:19', 'Ini? ', 'XIIMIPA1', ''),
(747, 'Hadist', '2024-07-07 09:46:35', 'halo', 'XIIMIPA1', ''),
(751, 'Hadist', '2024-07-07 09:50:50', 'pp', 'XIIMIPA1', ''),
(752, 'Hadist', '2024-07-07 09:54:08', 'tes', 'XIIMIPA1', ''),
(753, 'Hadist', '2024-07-07 09:54:26', 'tss', 'XIIMIPA1', ''),
(755, 'Hadist', '2024-07-07 09:56:37', 'fweGWE', 'XIIMIPA1', ''),
(756, 'Abdussalam Aswin Hadist', '2024-08-03 14:01:08', 'tes', 'XIIMIPA1', ''),
(757, 'Abdussalam Aswin Hadist', '2024-08-03 14:35:01', 'tes', 'XIIMIPA1', ''),
(760, 'Abdussalam Aswin Hadist', '2024-08-03 15:07:03', 'halo', 'XIIMIPA1', 'Kelompok3'),
(761, 'Abdussalam Aswin Hadist', '2024-08-03 15:46:13', 'halo', 'XIIMIPA1', 'Kelompok1'),
(762, 'Hadist', '2024-08-03 15:58:55', 'tes', 'XIIMIPA1', 'Kelompok1'),
(763, 'Abdussalam Aswin Hadist', '2024-08-03 16:01:51', 'tes', 'XIIMIPA1', 'Kelompok1'),
(764, 'Abdussalam Aswin Hadist', '2024-08-03 16:02:10', 'hello', 'XIIMIPA1', 'Kelompok1'),
(765, 'Hadist', '2024-08-03 16:02:19', 'wawaa', 'XIIMIPA1', 'Kelompok1'),
(766, 'Abdussalam Aswin Hadist', '2024-08-03 16:03:51', 'hello', 'XIIMIPA1', ''),
(767, 'Hadist', '2024-08-03 16:04:37', 'wew', 'XIIMIPA1', 'Kelompok1'),
(768, 'Hadist', '2024-08-03 16:04:57', 'www', 'XIIMIPA1', 'Kelompok1'),
(769, 'Abdussalam Aswin Hadist', '2024-08-03 22:19:56', 'hei', 'XIIMIPA1', 'Kelompok3'),
(770, 'Abdussalam Aswin Hadist', '2024-08-03 22:21:24', 'halo', 'XIIMIPA1', 'Kelompok3'),
(771, 'Abdussalam Aswin Hadist', '2024-08-03 22:27:58', 'halo', 'XIIMIPA1', 'Kelompok3'),
(772, 'Abdussalam Aswin Hadist', '2024-08-03 22:29:45', 'tes', 'XIIMIPA1', 'Kelompok3'),
(773, 'Abdussalam Aswin Hadist', '2024-08-04 06:36:16', 'finaogineare', 'XIIMIPA1', 'Kelompok1'),
(774, 'Abdussalam Aswin Hadist', '2024-08-04 06:41:59', 'ubwfuibw', 'XIIMIPA1', 'Kelompok1'),
(775, 'Abdussalam Aswin Hadist', '2024-08-04 06:43:35', 'rgege', 'XIIMIPA1', 'Kelompok1'),
(776, 'Abdussalam Aswin Hadist', '2024-08-04 06:44:08', 'fewfbuwe', 'XIIMIPA1', 'Kelompok1'),
(777, 'Abdussalam Aswin Hadist', '2024-08-04 06:45:09', 'hei', 'XIIMIPA1', ''),
(778, 'Abdussalam Aswin Hadist', '2024-08-04 06:56:26', 'p', 'XIIMIPA1', ''),
(779, 'Abdussalam Aswin Hadist', '2024-08-04 06:57:13', 'hello', 'XIIMIPA1', 'Kelompok1'),
(780, 'Hadist', '2024-08-04 06:58:00', 'vycy', 'XIIMIPA1', 'Kelompok1'),
(781, 'Hadist', '2024-08-04 06:59:06', 'evfuevwy', 'XIIMIPA1', 'Kelompok1'),
(782, 'Hadist', '2024-08-04 07:00:59', 'bfuwuf', 'XIIMIPA1', 'Kelompok1');

-- --------------------------------------------------------

--
-- Table structure for table `table_guru`
--

CREATE TABLE `table_guru` (
  `ID_GURU` int(5) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `NIP` varchar(10) NOT NULL,
  `KELAS_AJAR` varchar(8) NOT NULL,
  `PASSWORD` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_guru`
--

INSERT INTO `table_guru` (`ID_GURU`, `NAME`, `NIP`, `KELAS_AJAR`, `PASSWORD`) VALUES
(1, 'Abdussalam Aswin Hadist', '2002066788', 'XIIMIPA1', '$2y$10$NtcVkY/SWY516SUGhK5fk.XFZYkkeHWsnIaw1r0iHTVup5yqnIApu'),
(2, 'aswin', '188234356', 'XIIMIPA2', '$2y$10$kEQGm4QTeF4J3fwgId6Zw.WOuyDgwIPyjKYvdMiX1V2rsqZlrLzB6');

-- --------------------------------------------------------

--
-- Table structure for table `table_kelompok`
--

CREATE TABLE `table_kelompok` (
  `STD_ID` varchar(30) NOT NULL,
  `NAMA_KELOMPOK` varchar(60) NOT NULL,
  `KELAS` varchar(20) NOT NULL,
  `PROJECT_NAME` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_kelompok`
--

INSERT INTO `table_kelompok` (`STD_ID`, `NAMA_KELOMPOK`, `KELAS`, `PROJECT_NAME`) VALUES
('dRwN4KHS', 'Kelompok3', 'XIIMIPA1', 'Proyek 3'),
('JdscuLr8', 'Kelompok1', 'XIIMIPA1', 'Proyek 1'),
('RJqhuHq9', 'Kelompok2', 'XIIMIPA1', 'Proyek 2');

-- --------------------------------------------------------

--
-- Table structure for table `table_kelompok1`
--

CREATE TABLE `table_kelompok1` (
  `ID_STD` int(11) NOT NULL,
  `NAME_USER` varchar(30) NOT NULL,
  `CLASS` varchar(15) NOT NULL,
  `NAME_PROJECT` varchar(30) DEFAULT NULL,
  `TOKEN` varchar(250) DEFAULT NULL,
  `KELOMPOK` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_kelompok1`
--

INSERT INTO `table_kelompok1` (`ID_STD`, `NAME_USER`, `CLASS`, `NAME_PROJECT`, `TOKEN`, `KELOMPOK`) VALUES
(1, 'hadist', 'XIIMIPA1', 'Proyek 1', 'JdscuLr8', 'kelompok1');

-- --------------------------------------------------------

--
-- Table structure for table `table_kelompok2`
--

CREATE TABLE `table_kelompok2` (
  `ID_STD` int(11) NOT NULL,
  `NAME_USER` varchar(30) NOT NULL,
  `CLASS` varchar(15) NOT NULL,
  `NAME_PROJECT` varchar(30) DEFAULT NULL,
  `TOKEN` varchar(250) DEFAULT NULL,
  `KELOMPOK` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_kelompok2`
--

INSERT INTO `table_kelompok2` (`ID_STD`, `NAME_USER`, `CLASS`, `NAME_PROJECT`, `TOKEN`, `KELOMPOK`) VALUES
(1, 'yunita', 'XIIMIPA1', 'Proyek 2', 'RJqhuHq9', 'kelompok2');

-- --------------------------------------------------------

--
-- Table structure for table `table_kelompok3`
--

CREATE TABLE `table_kelompok3` (
  `ID_STD` int(11) NOT NULL,
  `NAME_USER` varchar(30) NOT NULL,
  `CLASS` varchar(15) NOT NULL,
  `NAME_PROJECT` varchar(30) DEFAULT NULL,
  `TOKEN` varchar(250) DEFAULT NULL,
  `KELOMPOK` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_laporan_siswa`
--

CREATE TABLE `table_laporan_siswa` (
  `ID_LAPORAN` int(11) NOT NULL,
  `NAMA_KELOMPOK` varchar(20) NOT NULL,
  `FILE_LAPORAN` varchar(60) NOT NULL,
  `NAMA_PROJECT` varchar(30) NOT NULL,
  `TIME` datetime NOT NULL,
  `KELAS` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_laporan_siswa`
--

INSERT INTO `table_laporan_siswa` (`ID_LAPORAN`, `NAMA_KELOMPOK`, `FILE_LAPORAN`, `NAMA_PROJECT`, `TIME`, `KELAS`) VALUES
(13, 'Kelompok1', 'Controller/FileLaporan/6460-6477.pdf', 'Proyek 1', '2024-06-01 04:08:03', 'XIIMIPA1'),
(14, 'Kelompok2', 'Controller/FileLaporan/The Use of Social Media...pdf', 'Proyek 2', '2024-06-01 04:08:42', 'XIIMIPA1');

-- --------------------------------------------------------

--
-- Table structure for table `table_materi`
--

CREATE TABLE `table_materi` (
  `ID` int(4) NOT NULL,
  `NAME` varchar(250) NOT NULL,
  `KELAS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_materi`
--

INSERT INTO `table_materi` (`ID`, `NAME`, `KELAS`) VALUES
(1, 'https://drive.google.com/file/d/1VR6Phf1J4vbzvMFl8K3KqsdrJ0qtTDKD/preview', 'XIIMIPA1');

-- --------------------------------------------------------

--
-- Table structure for table `table_monitoring`
--

CREATE TABLE `table_monitoring` (
  `ID_KELOMPOK` int(11) NOT NULL,
  `NAMA_KELOMPOK` varchar(30) NOT NULL,
  `NAMA_PROJECT` varchar(30) NOT NULL,
  `FILE_MONITORING` varchar(60) NOT NULL,
  `DATE` datetime NOT NULL,
  `KELAS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_monitoring`
--

INSERT INTO `table_monitoring` (`ID_KELOMPOK`, `NAMA_KELOMPOK`, `NAMA_PROJECT`, `FILE_MONITORING`, `DATE`, `KELAS`) VALUES
(6, 'Kelompok1', 'Proyek 1', 'Controller/FileTimeline/Tahap perencanaan.pdf', '0000-00-00 00:00:00', 'XIIMIPA1'),
(7, 'Kelompok1', 'Proyek 1', 'Controller/FileTimeline/Tahap perencanaan.pdf', '2024-06-18 15:16:57', 'XIIMIPA1');

-- --------------------------------------------------------

--
-- Table structure for table `table_nilai_presentasi`
--

CREATE TABLE `table_nilai_presentasi` (
  `id` int(11) NOT NULL,
  `GROUP` varchar(30) NOT NULL,
  `CLASS` varchar(30) NOT NULL,
  `SCORE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_nilai_presentasi`
--

INSERT INTO `table_nilai_presentasi` (`id`, `GROUP`, `CLASS`, `SCORE`) VALUES
(2, 'Kelompok1', 'XIIMIPA1', 12),
(4, 'Kelompok1', 'XIIMIPA1', 86);

-- --------------------------------------------------------

--
-- Table structure for table `table_notification_message`
--

CREATE TABLE `table_notification_message` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_notification_message`
--

INSERT INTO `table_notification_message` (`id`, `username`, `message`, `date`) VALUES
(66, 'hadist', ' gg', '2024-05-27 09:12:31'),
(67, 'hadist', 'febufew', '2024-05-27 09:27:17'),
(68, 'abdussalam Aswin Hadist', 'frbuwfr', '2024-05-27 09:29:43'),
(69, 'hadist', 'fbeu', '2024-05-27 09:30:39'),
(71, 'hadist', 'frbure', '2024-05-27 09:33:00'),
(72, 'hadist', 'xgx', '2024-05-27 09:37:53'),
(73, 'abdussalam Aswin Hadist', 'jvh', '2024-05-27 09:39:34'),
(74, 'hadist', 'hcc', '2024-05-27 09:41:44'),
(75, 'Hadist', 'fewyvew', '2024-05-27 09:44:15'),
(76, 'Abdussalam Aswin Hadist', 'greire', '2024-05-27 09:45:35'),
(77, 'Hadist', 'bur', '2024-05-27 09:45:59'),
(78, 'Abdussalam Aswin Hadist', 'febe', '2024-05-27 09:46:11'),
(79, 'Hadist', 'evue', '2024-05-27 10:09:24'),
(80, 'Hadist', 'fburf', '2024-05-27 10:11:50'),
(81, 'Abdussalam Aswin Hadist', 'feuwe', '2024-05-27 10:12:14'),
(82, 'Hadist', 'yevwy', '2024-05-27 10:12:30'),
(83, 'Hadist', 'tes', '2024-05-27 10:24:51'),
(84, 'Abdussalam Aswin Hadist', 'Tes', '2024-05-27 10:26:02'),
(85, 'Hadist', 'hello', '2024-05-27 10:26:14'),
(86, 'Abdussalam Aswin Hadist', 'Hellow this world... ', '2024-05-27 10:27:20'),
(87, 'Hadist', 'fbudubvsdvjbdbvbsjb bu fbubfusb ubfubuesbfsbu bfubuibfsubjb ubfuebgfuisvbsbus', '2024-05-27 10:27:44'),
(88, 'Hadist', 'kvnirgi nin infin iniognrwn nignini iniwn ini nginig ngiirnig ngirnioaon ioniorntigronin inginapopreiongin nginwioangi nignwrignfoisanfw', '2024-05-27 10:28:13'),
(89, 'Hadist', 'abcdefghijklmn opqrstuvwxyz', '2024-05-31 10:07:12'),
(90, 'Abdussalam Aswin Hadist', 'halo', '2024-05-31 10:08:18'),
(91, 'Hadist', 'febu', '2024-05-31 10:08:30'),
(92, 'Abdussalam Aswin Hadist', 'null', '2024-05-31 10:08:50'),
(93, 'Hadist', 'undefine?', '2024-05-31 10:09:11'),
(94, 'Abdussalam Aswin Hadist', 'yes', '2024-05-31 10:09:20'),
(95, 'Hadist', 'are u sure?', '2024-05-31 10:10:15'),
(96, 'Abdussalam Aswin Hadist', 'yes', '2024-05-31 10:10:26'),
(97, 'Hadist', '...', '2024-05-31 10:11:12'),
(98, 'Abdussalam Aswin Hadist', 'HOAM', '2024-05-31 10:11:22'),
(99, 'Hadist', 'bosan ', '2024-05-31 10:14:46'),
(100, 'Abdussalam Aswin Hadist', 'yes', '2024-05-31 10:14:56'),
(101, 'Hadist', '...', '2024-05-31 14:19:53'),
(102, 'Abdussalam Aswin Hadist', '..', '2024-05-31 14:21:14'),
(103, 'Hadist', '...', '2024-05-31 14:21:50'),
(104, 'Hadist', 'hello', '2024-05-31 14:33:24'),
(105, 'Hadist', 'hello', '2024-05-31 14:34:05'),
(106, 'Abdussalam Aswin Hadist', 'tes', '2024-05-31 14:34:29'),
(108, 'Abdussalam Aswin Hadist', 'tes', '2024-05-31 14:37:24'),
(109, 'Hadist', 'Tes', '2024-05-31 14:42:39'),
(110, 'Hadist', 'Tes pak', '2024-05-31 14:43:58'),
(111, 'Hadist', 'Tes', '2024-05-31 14:47:40'),
(112, 'Hadist', 'Tes', '2024-05-31 14:49:14'),
(113, 'Hadist', 'hello', '2024-05-31 14:53:16'),
(114, 'Hadist', 'R', '2024-05-31 14:55:56'),
(115, 'Hadist', 'Y', '2024-05-31 15:06:05'),
(116, 'Hadist', 'Y', '2024-05-31 22:09:11'),
(117, 'Hadist', 'Y', '2024-05-31 22:09:43'),
(121, 'Hadist', 'x', '2024-05-31 22:16:45'),
(124, 'Abdussalam Aswin Hadist', 'c', '2024-06-01 05:50:07'),
(125, 'Abdussalam Aswin Hadist', 'random', '2024-06-01 05:50:52'),
(126, 'Abdussalam Aswin Hadist', 'halo', '2024-06-01 05:52:11'),
(127, 'Abdussalam Aswin Hadist', 'halo', '2024-06-01 05:52:32'),
(128, 'Abdussalam Aswin Hadist', 'halo', '2024-06-01 05:53:52'),
(129, 'Abdussalam Aswin Hadist', 'tes', '2024-06-01 05:54:16'),
(130, 'Abdussalam Aswin Hadist', 'tes', '2024-06-01 05:55:21'),
(131, 'Abdussalam Aswin Hadist', 'tes', '2024-06-01 05:55:45'),
(132, 'Abdussalam Aswin Hadist', 'gg', '2024-06-01 05:56:16'),
(149, 'Abdussalam Aswin Hadist', 'r', '2024-06-01 07:17:34'),
(161, 'Abdussalam Aswin Hadist', 'hello', '2024-06-01 08:11:16'),
(163, 'Abdussalam Aswin Hadist', 'hello', '2024-06-01 08:23:53'),
(164, 'Abdussalam Aswin Hadist', 'pp', '2024-06-01 08:27:42'),
(167, 'Abdussalam Aswin Hadist', 'Q', '2024-06-01 08:33:51'),
(174, 'Abdussalam Aswin Hadist', 'halo', '2024-06-01 09:09:41'),
(176, 'Abdussalam Aswin Hadist', 'trgr', '2024-06-01 09:14:42'),
(179, 'Hadist', 'Halo', '2024-06-04 13:56:21'),
(183, 'Hadist', 'Tes', '2024-06-04 14:08:12'),
(185, 'Hadist', 'Bapak kau', '2024-06-05 09:23:33'),
(186, 'Hadist', 'Jangan lupa makan', '2024-06-05 09:24:03'),
(188, 'Abdussalam Aswin Hadist', 'BAHAHAH', '2024-06-05 09:30:56'),
(189, 'Hadist', 'Tes', '2024-06-05 09:38:13'),
(190, 'Abdussalam Aswin Hadist', 'tes', '2024-06-05 14:47:02'),
(191, 'Abdussalam Aswin Hadist', 'hari ini kita akan mendiskusikan tentang project pada materi usaha dan energi', '2024-06-05 14:49:09'),
(192, 'Abdussalam Aswin Hadist', 'aknvriirev', '2024-06-20 22:12:58'),
(193, 'Hadist', 'bfdbj  bigbeoib oe', '2024-06-20 22:15:57'),
(194, 'Abdussalam Aswin Hadist', 'P', '2024-06-23 14:55:18'),
(195, 'Abdussalam Aswin Hadist', 'Hello ', '2024-06-23 15:50:21'),
(196, 'Abdussalam Aswin Hadist', 'Hello', '2024-06-23 15:52:21'),
(197, 'Abdussalam Aswin Hadist', 'Tolong', '2024-06-23 15:54:54'),
(198, 'Hadist', 'P', '2024-06-23 15:56:26'),
(199, 'Hadist', 'Tolong', '2024-06-23 15:58:45'),
(200, 'Abdussalam Aswin Hadist', 'Tolong', '2024-06-23 16:01:33'),
(201, 'Hadist', 'p', '2024-06-23 16:05:25'),
(202, 'Yunita', 'hello', '2024-06-29 08:04:04'),
(203, 'Abdussalam Aswin Hadist', 'Twes', '2024-07-05 11:53:11'),
(204, 'Abdussalam Aswin Hadist', 'Tes', '2024-07-05 11:55:11'),
(205, 'Abdussalam Aswin Hadist', 'Tes', '2024-07-05 11:55:50'),
(206, 'Hadist', 'Tes', '2024-07-05 11:59:09'),
(207, 'Abdussalam Aswin Hadist', 'H3llo', '2024-07-05 11:59:38'),
(208, 'Hadist', 'Tes', '2024-07-05 12:00:29'),
(209, 'Abdussalam Aswin Hadist', 'Tes', '2024-07-05 12:03:37'),
(210, 'Abdussalam Aswin Hadist', 'Tes', '2024-07-05 12:05:16'),
(211, 'Yunita', 'Hello', '2024-07-05 12:06:28'),
(212, 'Abdussalam Aswin Hadist', 'Tes', '2024-07-05 12:06:33'),
(213, 'Hadist', 'T', '2024-07-05 12:07:07'),
(214, 'Hadist', 'Tes', '2024-07-05 12:07:14'),
(215, 'Abdussalam Aswin Hadist', 'Hai', '2024-07-05 12:16:25'),
(216, 'Abdussalam Aswin Hadist', 'Hei', '2024-07-05 12:17:00'),
(217, 'Abdussalam Aswin Hadist', 'Hello', '2024-07-05 12:17:17'),
(218, 'Hadist', 'Diskusikan? ', '2024-07-05 12:18:08'),
(219, 'Hadist', 'Ini? ', '2024-07-05 12:18:19'),
(220, 'Hadist', 'halo', '2024-07-07 09:46:35'),
(221, 'Hadist', 'tes', '2024-07-07 09:48:06'),
(222, 'Hadist', 'tes', '2024-07-07 09:49:56'),
(223, 'Hadist', 'pp', '2024-07-07 09:50:20'),
(224, 'Hadist', 'pp', '2024-07-07 09:50:50'),
(225, 'Hadist', 'tes', '2024-07-07 09:54:08'),
(226, 'Hadist', 'tss', '2024-07-07 09:54:26'),
(229, 'Abdussalam Aswin Hadist', 'tes', '2024-08-03 14:01:08'),
(230, 'Abdussalam Aswin Hadist', 'tes', '2024-08-03 14:35:01'),
(231, 'Abdussalam Aswin Hadist', 'hello', '2024-08-03 16:03:51'),
(232, 'Abdussalam Aswin Hadist', 'hei', '2024-08-04 06:45:09'),
(233, 'Abdussalam Aswin Hadist', 'p', '2024-08-04 06:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `table_notification_reference`
--

CREATE TABLE `table_notification_reference` (
  `id` int(11) NOT NULL,
  `user` varchar(60) NOT NULL,
  `response` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_notification_reference`
--

INSERT INTO `table_notification_reference` (`id`, `user`, `response`, `date`) VALUES
(22, 'abdussalam aswin hadist', 'Referensi ini tolong diganti ', '2024-06-25 13:36:12'),
(23, 'Abdussalam Aswin Hadist', 'Tolong di ganti yang lain ya', '2024-07-05 12:09:43'),
(24, 'Abdussalam Aswin Hadist', 'Tolong diganti ya', '2024-07-05 12:11:08'),
(25, 'Abdussalam Aswin Hadist', 'Diganti', '2024-07-05 12:12:18'),
(26, 'Abdussalam Aswin Hadist', 'Ini juga diganti ', '2024-07-05 12:12:48'),
(27, 'Abdussalam Aswin Hadist', 'Harus diganti', '2024-07-05 12:15:46'),
(28, 'Abdussalam Aswin Hadist', 'tolong diganti ya', '2024-08-04 08:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `table_peerassessment`
--

CREATE TABLE `table_peerassessment` (
  `id` int(11) NOT NULL,
  `Teman` varchar(60) NOT NULL,
  `Score` int(100) NOT NULL,
  `Class` varchar(30) NOT NULL,
  `Date` datetime NOT NULL,
  `Pertemuan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_peerassessment`
--

INSERT INTO `table_peerassessment` (`id`, `Teman`, `Score`, `Class`, `Date`, `Pertemuan`) VALUES
(1, 'hadist', 12, 'XIIMIPA1', '2024-06-16 09:46:56', 'Pertemuan1'),
(2, 'hadist', 12, 'XIIMIPA1', '2024-06-16 09:46:58', 'Pertemuan1'),
(3, 'hadist', 8, 'XIIMIPA1', '2024-06-16 09:47:22', 'Pertemuan1'),
(4, 'yunita', 11, 'XIIMIPA1', '2024-07-06 06:35:51', 'Pertemuan1'),
(5, 'yunita', 13, 'XIIMIPA1', '2024-07-06 06:40:13', 'Pertemuan1'),
(6, 'hadist', 11, 'XIIMIPA1', '2024-08-04 09:23:28', 'Pertemuan3');

-- --------------------------------------------------------

--
-- Table structure for table `table_presentasi`
--

CREATE TABLE `table_presentasi` (
  `ID_VIDEO` int(11) NOT NULL,
  `NAMA_KELOMPOK` varchar(20) NOT NULL,
  `NAMA_PROJECT` varchar(30) NOT NULL,
  `WAKTU_PENGUMPULAN` datetime NOT NULL,
  `KELAS` varchar(10) NOT NULL,
  `LINK` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_presentasi`
--

INSERT INTO `table_presentasi` (`ID_VIDEO`, `NAMA_KELOMPOK`, `NAMA_PROJECT`, `WAKTU_PENGUMPULAN`, `KELAS`, `LINK`) VALUES
(5, 'Kelompok 1', 'Proyek 3', '2024-06-20 07:01:29', 'XIIMIPA1', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/s8BZZO09HVI?si=62xfhaAbbSoMDRPq\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `table_presentasi_zoom`
--

CREATE TABLE `table_presentasi_zoom` (
  `ID` int(255) NOT NULL,
  `PRESENTASI` varchar(60) NOT NULL,
  `LINK` varchar(1000) NOT NULL,
  `KELAS` varchar(20) NOT NULL,
  `WAKTU` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_presentasi_zoom`
--

INSERT INTO `table_presentasi_zoom` (`ID`, `PRESENTASI`, `LINK`, `KELAS`, `WAKTU`) VALUES
(6, 'Presentasi Gerak Lurus Berubah Beraturan(GLBB)', ' https://us05web.zoom.us/j/85185183660?pwd=6lynP20aGpEENv5zicA4kY5iZQN8fb.1 ', 'XIIMIPA1', '2024-06-28 07:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `table_profile_img`
--

CREATE TABLE `table_profile_img` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(60) NOT NULL,
  `PATH` varchar(255) NOT NULL,
  `KELAS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_profile_img`
--

INSERT INTO `table_profile_img` (`ID`, `NAME`, `PATH`, `KELAS`) VALUES
(1, 'Abdussalam Aswin Hadist', 'img_profile/amo.jpg', 'XIIMIPA1'),
(2, 'Hadist', 'img_profile/amo.jpg', 'XIIMIPA1');

-- --------------------------------------------------------

--
-- Table structure for table `table_projectscore`
--

CREATE TABLE `table_projectscore` (
  `id` int(255) NOT NULL,
  `NameGroup` varchar(60) NOT NULL,
  `Score` int(100) NOT NULL,
  `Date` datetime NOT NULL,
  `Kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_projectscore`
--

INSERT INTO `table_projectscore` (`id`, `NameGroup`, `Score`, `Date`, `Kelas`) VALUES
(2, 'Kelompok3', 24, '2024-06-16 08:56:39', 'XIIMIPA1'),
(4, 'Kelompok1', 26, '2024-06-19 14:11:56', 'XIIMIPA1'),
(5, 'Kelompok2', 24, '2024-07-07 15:26:11', 'XIIMIPA1');

-- --------------------------------------------------------

--
-- Table structure for table `table_project_planning`
--

CREATE TABLE `table_project_planning` (
  `ID_KELOMPOK` varchar(30) NOT NULL,
  `NAMA_KELOMPOK` text NOT NULL,
  `NAMA_PROJECT` text NOT NULL,
  `PLANNING_FILE` varchar(60) NOT NULL,
  `TIME` datetime NOT NULL,
  `CLASS` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_project_planning`
--

INSERT INTO `table_project_planning` (`ID_KELOMPOK`, `NAMA_KELOMPOK`, `NAMA_PROJECT`, `PLANNING_FILE`, `TIME`, `CLASS`) VALUES
('JdscuLr8', 'Kelompok1', 'Proyek 1', 'Controller/filePlanning/181-986-2-PB (2).pdf', '2024-06-17 08:17:56', 'XIIMIPA 1');

-- --------------------------------------------------------

--
-- Table structure for table `table_referensi`
--

CREATE TABLE `table_referensi` (
  `ID_REFERENSI` int(255) NOT NULL,
  `NAME_STD` varchar(30) NOT NULL,
  `REFERENSI` varchar(255) NOT NULL,
  `PROJECT_NAME` varchar(30) NOT NULL,
  `KELOMPOK` varchar(20) NOT NULL,
  `KELAS` varchar(10) NOT NULL,
  `DESKRIPSI_REFERENSI` text NOT NULL,
  `STATUS` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_referensi`
--

INSERT INTO `table_referensi` (`ID_REFERENSI`, `NAME_STD`, `REFERENSI`, `PROJECT_NAME`, `KELOMPOK`, `KELAS`, `DESKRIPSI_REFERENSI`, `STATUS`) VALUES
(57, 'hadist', 'Controller/Model/362-1116-2-PB (1).pdf', 'Proyek 1', 'Kelompok 1', 'XIIMIPA1', 'vsdjbjbavj cjkbcskudbuksdbcksckjscjksjkcbksbcusdbcusvsk,', 'true'),
(59, 'yunita', 'Controller/Model/204-325-1-SM.pdf', 'Proyek 3', 'Kelompok 2', 'XIIMIPA1', 'jbcisubibwapisbips i hfioeofwuo iobiweufbewunkcjkasakfbj fewjfiuwe', 'false'),
(60, 'dika', 'Controller/Model/664-Article Text-4139-1-10-20220618.pdf', 'Proyek 3', 'Kelompok 3', 'XIIMIPA1', 'bsrjivisun oisndi anfbifuwo oifowebouwbfu obifweobiu bacbub ibfiubfou o;LCASBIUVBI IIivbisbiuebivbiub ubfuiweiuwbauvfwa', 'true'),
(61, 'dika', 'Controller/Model/362-1116-2-PB.pdf', 'Proyek 3', 'Kelompok 3', 'XIIMIPA1', 'jwfiaejcjbsuibfiebs csdjd csdbfubsubfusbjcbskjmjzdbcjszjcj cshvsdhfhjsf hsfh cds cjyh sdhchsdchjsd fhsd csd  ds cshdj hcdsvvj dsjhchsd hc sdh cshd hcs dh hsd sdbfuibu jvsd jv usdivisddsn cjxk cjkbssd,jbcmzb,szhfcz,dshkfsbjkbdcskv,bsjzbkvsz,s', 'true'),
(65, 'dika', 'Controller/Model/6.+Artikel+Putri.pdf', 'Proyek 3', 'Kelompok 3', 'XIIMIPA1', '', 'true'),
(66, 'dika', 'Controller/Model/10.1515_eng-2020-0069.pdf', 'Proyek 3', 'Kelompok 3', 'XIIMIPA1', 'ingeriobgiowbi biobiowfiw i foebiofbiobf iobi fboaboibEIOBFWIEBFIBWIOB IFBIOEBIOE', 'true'),
(67, 'dika', 'Controller/Model/86-259-1-PB.pdf', 'Proyek 3', 'Kelompok 3', 'XIIMIPA1', 'FIQEIFBUO IOFOIB IOOQHpfbioebofiboib infioweigbp bifboeigbiob iobfio', 'true'),
(68, 'dika', 'Controller/Model/29-40+yuslinda.pdf', 'Proyek 3', 'Kelompok 3', 'XIIMIPA1', 'diqwf u ofo oiiofbiobio iofbwipbgfioboi opjpf pahfpicnififoebfn ifhoiesbgoib ioubofibpibfp pq3hpiqninifnviofbfi iofbiobfoifbiosfbviosbviobwo', 'true'),
(70, 'hadist', 'Controller/Model/99-142-1-PB.pdf', 'Proyek 1', 'Kelompok 1', 'XIIMIPA1', 'fib iiob bofbob oibfoiwboig igiowbgoi oibgiowegbobobviob oib oibfoibgowi', 'true'),
(71, 'yunita', 'Controller/Model/297-200-1-SM.pdf', 'Proyek 2', 'Kelompok 2', 'XIIMIPA1', 'fuhwb o boubo bogbo bobgwo oib oigbwoi ', 'false'),
(72, 'yunita', 'Controller/Model/46-Article Text-112-1-10-20210412.pdf', 'Proyek 2', 'Kelompok 2', 'XIIMIPA1', ' bfiow boibfoib oibfow oibgoiwbo iofoiwb iooi', 'false'),
(73, 'yunita', 'Controller/Model/647-1771-1-PB.pdf', 'Proyek 2', 'Kelompok 2', 'XIIMIPA1', ' ubif oiboi ibgow pnnucbwiuuwtuwtbj bob fio', ''),
(74, 'yunita', 'Controller/Model/3558-1-7064-1-10-20161224.pdf', 'Proyek 2', 'Kelompok 2', 'XIIMIPA1', ' hf bub bgo uubgwub obgubwubg ubugbwuibi ', ''),
(75, 'hadist', 'Controller/Model/1694-4084-1-PB.pdf', 'Proyek 1', 'Kelompok 1', 'XIIMIPA1', 'jfub uu buifwboi ohgiergub ubfubuifbwubfub ubfubwfiubu w', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `table_refleksi`
--

CREATE TABLE `table_refleksi` (
  `id` int(255) NOT NULL,
  `Nama` varchar(60) NOT NULL,
  `Kelompok` varchar(60) NOT NULL,
  `Kelompok_Penilai` varchar(60) NOT NULL,
  `ResponTeman` varchar(100) NOT NULL,
  `LevelRespon` varchar(60) NOT NULL,
  `Komentar` varchar(255) NOT NULL,
  `Kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_refleksi`
--

INSERT INTO `table_refleksi` (`id`, `Nama`, `Kelompok`, `Kelompok_Penilai`, `ResponTeman`, `LevelRespon`, `Komentar`, `Kelas`) VALUES
(1, 'hadist', 'Kelompok3', 'Kelompok 1', 'kvbweib ', '2', 'v if hihf hofwio owfoioe', 'XIIMIPA1'),
(2, 'hadist', 'Kelompok3', 'Kelompok 1', 'fbiew iofewjo oofwefw', '1', 'few noho howe', 'XIIMIPA1'),
(3, 'hadist', 'Kelompok3', 'Kelompok 1', ' jcda jfeqbi ', '2', 'vwwi bbwi fwio ifbweo', 'XIIMIPA1'),
(4, 'hadist', 'Kelompok3', 'Kelompok 1', 'fiewi bfbwei uifbuiwbf', '2', 'feniw igwoi iogw onoigwgoiwi boguwbo w', 'XIIMIPA1'),
(5, 'hadist', 'Kelompok3', 'Kelompok 1', 'ibiuweifuwe', '3', 'rmemea', 'XIIMIPA1'),
(6, 'hadist', 'Kelompok3', 'Kelompok 1', 'frkwbigwq', '2', 'fgkwbwgfieb', 'XIIMIPA1'),
(7, 'hadist', 'Kelompok3', 'Kelompok 1', 'efeibuif', '3', 'grn kr', 'XIIMIPA1');

-- --------------------------------------------------------

--
-- Table structure for table `table_score_laporan`
--

CREATE TABLE `table_score_laporan` (
  `ID` int(11) NOT NULL,
  `SCORE` int(100) NOT NULL,
  `KELOMPOK` varchar(60) NOT NULL,
  `KELAS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_score_laporan`
--

INSERT INTO `table_score_laporan` (`ID`, `SCORE`, `KELOMPOK`, `KELAS`) VALUES
(1, 89, 'Kelompok3', 'XIIMIPA1'),
(2, 67, 'Kelompok1', 'XIIMIPA1');

-- --------------------------------------------------------

--
-- Table structure for table `table_siswa`
--

CREATE TABLE `table_siswa` (
  `ID_STUDENT` int(5) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `NISN` varchar(10) NOT NULL,
  `CLASS` varchar(8) NOT NULL,
  `PASSWORD` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_siswa`
--

INSERT INTO `table_siswa` (`ID_STUDENT`, `NAME`, `NISN`, `CLASS`, `PASSWORD`) VALUES
(2, 'yunita', '00233556', 'XIIMIPA1', '$2y$10$IyH3XDkHteOYBlVf7wlMCuoL8/23KI8dFpdO4be7MJ82MhmbhRLcO'),
(5, 'Hadist', '0023456', 'XIIMIPA1', '$2y$10$ZCrWmOr2LBxgFzC12HPU4.B380vvqSrcEvssuGTaFDZW7tuEccL66'),
(6, 'abdussalam', '0021234', 'XIIMIPA1', '$2y$10$7Ef7pZXxvM1i0RvLT3mFNeSekrF6.M/euiZdDscLJDKDzvP2uXPMS'),
(9, 'dika', '00277663', 'XIIMIPA1', '$2y$10$2HpCmzC1ZKyT0GOYZwTgl.TAvp0QBmxDcwarwJgWx4QWSv9GwjqGW'),
(10, 'adasdasd', '0033456', 'XIIMIPA2', '$2y$10$g4Ee/b8Jj93BDDTbKMzkgOufDCh4f4DM2u2xMgMZuf9m0Fkncpzpu');

-- --------------------------------------------------------

--
-- Table structure for table `table_timeline`
--

CREATE TABLE `table_timeline` (
  `ID_KELOMPOK` int(20) NOT NULL,
  `NAMA_TAHAP` varchar(70) NOT NULL,
  `NAMA_PROJECT` varchar(30) NOT NULL,
  `NAMA_KELOMPOK` varchar(30) NOT NULL,
  `DEADLINE` datetime NOT NULL,
  `KELAS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_timeline`
--

INSERT INTO `table_timeline` (`ID_KELOMPOK`, `NAMA_TAHAP`, `NAMA_PROJECT`, `NAMA_KELOMPOK`, `DEADLINE`, `KELAS`) VALUES
(8, 'Tahap perencanaan', 'Proyek 1', 'Kelompok1', '2024-06-07 14:20:00', 'XIIMIPA1'),
(9, 'Tahap perencanaan', 'Proyek 1', 'Kelompok1', '2024-06-28 15:10:00', 'XIIMIPA1'),
(10, 'Tahap pembuatan', 'Proyek 2', 'Kelompok2', '2024-07-05 10:00:00', 'XIIMIPA1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_comment`
--
ALTER TABLE `table_comment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_comment_guru`
--
ALTER TABLE `table_comment_guru`
  ADD PRIMARY KEY (`ID_COMMENT`);

--
-- Indexes for table `table_forum_diskusi`
--
ALTER TABLE `table_forum_diskusi`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indexes for table `table_guru`
--
ALTER TABLE `table_guru`
  ADD PRIMARY KEY (`ID_GURU`);

--
-- Indexes for table `table_kelompok`
--
ALTER TABLE `table_kelompok`
  ADD PRIMARY KEY (`STD_ID`);

--
-- Indexes for table `table_kelompok1`
--
ALTER TABLE `table_kelompok1`
  ADD PRIMARY KEY (`ID_STD`);

--
-- Indexes for table `table_kelompok2`
--
ALTER TABLE `table_kelompok2`
  ADD PRIMARY KEY (`ID_STD`);

--
-- Indexes for table `table_kelompok3`
--
ALTER TABLE `table_kelompok3`
  ADD PRIMARY KEY (`ID_STD`);

--
-- Indexes for table `table_laporan_siswa`
--
ALTER TABLE `table_laporan_siswa`
  ADD PRIMARY KEY (`ID_LAPORAN`);

--
-- Indexes for table `table_materi`
--
ALTER TABLE `table_materi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_monitoring`
--
ALTER TABLE `table_monitoring`
  ADD PRIMARY KEY (`ID_KELOMPOK`);

--
-- Indexes for table `table_nilai_presentasi`
--
ALTER TABLE `table_nilai_presentasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_notification_message`
--
ALTER TABLE `table_notification_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_notification_reference`
--
ALTER TABLE `table_notification_reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_peerassessment`
--
ALTER TABLE `table_peerassessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_presentasi`
--
ALTER TABLE `table_presentasi`
  ADD PRIMARY KEY (`ID_VIDEO`);

--
-- Indexes for table `table_presentasi_zoom`
--
ALTER TABLE `table_presentasi_zoom`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_profile_img`
--
ALTER TABLE `table_profile_img`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_projectscore`
--
ALTER TABLE `table_projectscore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_project_planning`
--
ALTER TABLE `table_project_planning`
  ADD PRIMARY KEY (`ID_KELOMPOK`);

--
-- Indexes for table `table_referensi`
--
ALTER TABLE `table_referensi`
  ADD PRIMARY KEY (`ID_REFERENSI`);

--
-- Indexes for table `table_refleksi`
--
ALTER TABLE `table_refleksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_score_laporan`
--
ALTER TABLE `table_score_laporan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_siswa`
--
ALTER TABLE `table_siswa`
  ADD PRIMARY KEY (`ID_STUDENT`);

--
-- Indexes for table `table_timeline`
--
ALTER TABLE `table_timeline`
  ADD PRIMARY KEY (`ID_KELOMPOK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_comment`
--
ALTER TABLE `table_comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `table_comment_guru`
--
ALTER TABLE `table_comment_guru`
  MODIFY `ID_COMMENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `table_forum_diskusi`
--
ALTER TABLE `table_forum_diskusi`
  MODIFY `ID_USER` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=783;

--
-- AUTO_INCREMENT for table `table_guru`
--
ALTER TABLE `table_guru`
  MODIFY `ID_GURU` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_kelompok1`
--
ALTER TABLE `table_kelompok1`
  MODIFY `ID_STD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_kelompok2`
--
ALTER TABLE `table_kelompok2`
  MODIFY `ID_STD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_kelompok3`
--
ALTER TABLE `table_kelompok3`
  MODIFY `ID_STD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_laporan_siswa`
--
ALTER TABLE `table_laporan_siswa`
  MODIFY `ID_LAPORAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table_materi`
--
ALTER TABLE `table_materi`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_monitoring`
--
ALTER TABLE `table_monitoring`
  MODIFY `ID_KELOMPOK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_nilai_presentasi`
--
ALTER TABLE `table_nilai_presentasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_notification_message`
--
ALTER TABLE `table_notification_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `table_notification_reference`
--
ALTER TABLE `table_notification_reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `table_peerassessment`
--
ALTER TABLE `table_peerassessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_presentasi`
--
ALTER TABLE `table_presentasi`
  MODIFY `ID_VIDEO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_presentasi_zoom`
--
ALTER TABLE `table_presentasi_zoom`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_profile_img`
--
ALTER TABLE `table_profile_img`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_projectscore`
--
ALTER TABLE `table_projectscore`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_referensi`
--
ALTER TABLE `table_referensi`
  MODIFY `ID_REFERENSI` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `table_refleksi`
--
ALTER TABLE `table_refleksi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_score_laporan`
--
ALTER TABLE `table_score_laporan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_siswa`
--
ALTER TABLE `table_siswa`
  MODIFY `ID_STUDENT` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_timeline`
--
ALTER TABLE `table_timeline`
  MODIFY `ID_KELOMPOK` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
