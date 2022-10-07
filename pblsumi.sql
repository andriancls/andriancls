-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 04:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pblsumi`
--

-- --------------------------------------------------------

--
-- Table structure for table `datacon`
--

CREATE TABLE `datacon` (
  `id` int(11) NOT NULL,
  `datein` date NOT NULL,
  `dateout` date NOT NULL,
  `dateout2` date DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `forwarder_id` int(11) NOT NULL,
  `tglout` date DEFAULT NULL,
  `tglout2` date DEFAULT NULL,
  `tglout3` date DEFAULT NULL,
  `nocon` varchar(30) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `size` varchar(30) NOT NULL,
  `poo` varchar(25) NOT NULL,
  `loca` varchar(25) NOT NULL,
  `section` varchar(30) NOT NULL,
  `isempty` smallint(1) DEFAULT NULL,
  `shipment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datacon`
--

INSERT INTO `datacon` (`id`, `datein`, `dateout`, `dateout2`, `nama`, `forwarder_id`, `tglout`, `tglout2`, `tglout3`, `nocon`, `invoice`, `size`, `poo`, `loca`, `section`, `isempty`, `shipment`) VALUES
(300, '2022-09-12', '2022-09-23', '2022-09-19', 'nama', 3, '2022-09-15', '2022-09-16', NULL, 'ONEU0303960', '', '40', 'Japan', 'Lot 206', 'Import', 7, ''),
(301, '2022-09-12', '2022-09-23', '2022-09-19', 'nama', 3, '2022-09-15', '2022-09-16', NULL, 'NYKU0715451', '', '40', 'Japan', 'Lot 206', 'Import', 7, ''),
(302, '2022-09-12', '2022-09-23', '2022-09-19', 'nama', 3, '2022-09-15', '2022-09-16', NULL, 'TCLU8826152', '', '40', 'Japan', 'Lot 206', 'Import', 7, ''),
(303, '2022-09-12', '2022-09-23', '2022-09-19', 'nama', 3, '2022-09-15', '2022-09-16', NULL, 'TCLU9426470', '', '40', 'Japan', 'Lot 242', 'Import', 7, ''),
(304, '2022-09-12', '2022-09-23', '2022-09-19', 'nama', 3, '2022-09-15', '2022-09-16', NULL, 'TRHU5328162', '', '40', 'Japan', 'Lot 242', 'Import', 7, ''),
(305, '2022-09-16', '2022-09-27', '2022-09-24', 'nama', 3, '2022-09-20', '2022-09-20', NULL, 'TRHU6820768', '', '40', 'Japan', 'Lot 206', 'Import', 7, ''),
(306, '2022-09-16', '2022-09-27', '2022-09-24', 'nama', 3, '2022-09-20', '2022-09-20', NULL, 'NYKU5679676', '', '40', 'Japan', 'Lot 206', 'Import', 7, ''),
(307, '2022-09-16', '2022-09-27', '2022-09-24', 'nama', 3, '2022-09-20', '2022-09-20', NULL, 'CXDU1664432', '', '40', 'Japan', 'Lot 206', 'Import', 7, ''),
(308, '2022-09-16', '2022-09-27', '2022-09-24', 'nama', 3, '2022-09-20', '2022-09-20', NULL, 'TGBU4576279', '', '40', 'Japan', 'Lot 242', 'Import', 7, ''),
(309, '2022-09-16', '2022-09-27', '2022-09-24', 'nama', 3, '2022-09-20', '2022-09-20', NULL, 'TLLU5454980', '', '40', 'Japan', 'Lot 242', 'Import', 7, ''),
(310, '2022-09-16', '2022-09-27', '2022-09-24', 'nama', 3, '2022-09-20', '2022-09-20', NULL, 'TEMU5256393', '', '20', 'Japan', 'Lot 7', 'Import', 0, ''),
(311, '2022-09-21', '2022-10-02', '2022-09-29', 'nama', 3, '2022-09-25', '2022-09-25', NULL, 'NYKU3427546', '', '20', 'Japan', 'Lot 7', 'Import', 0, ''),
(312, '2022-09-21', '2022-10-02', '2022-09-29', 'nama', 3, '2022-09-25', '2022-09-25', NULL, 'KKFU7900867', '', '40', 'Japan', 'Lot 206', 'Import', 7, ''),
(313, '2022-09-21', '2022-10-02', '2022-09-29', 'nama', 3, '2022-09-25', '2022-09-25', NULL, 'ONEU0017191', '', '40', 'Japan', 'Lot 206', 'Import', 7, ''),
(314, '2022-09-21', '2022-10-02', '2022-09-29', 'nama', 3, '2022-09-25', '2022-09-25', NULL, 'BEAU5315435', '', '40', 'Japan', 'Lot 206', 'Import', 7, ''),
(315, '2022-09-21', '2022-10-02', '2022-10-01', 'nama', 3, '2022-09-27', '2022-09-25', NULL, 'GCXU5411389', '', '40', 'Japan', 'Lot 242', 'Import', 7, ''),
(316, '2022-09-21', '2022-10-02', '2022-09-29', 'nama', 3, '2022-09-25', '2022-09-25', NULL, 'TCNU6670432', '', '40', 'Japan', 'Lot 242', 'Import', 7, ''),
(317, '2022-09-10', '2022-09-21', '2022-09-22', 'nama', 2, '2022-09-17', '2022-09-17', NULL, 'TCLU7669130', '', '20', 'MNL', 'Lot 242', 'Import', 0, ''),
(318, '2022-09-03', '2022-09-14', '2022-09-24', 'nama', 2, '2022-09-19', '2022-09-14', NULL, 'TCNU7832754', '', '40', 'MNL', 'Lot 242', 'Import', 0, ''),
(319, '2022-09-19', '2022-09-30', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-27', NULL, 'BEAU5262248', '', '40', 'MNL', 'Lot 242', 'Import', 0, ''),
(320, '2022-09-24', '2022-10-05', '2022-10-06', 'nama', 2, '2022-10-01', '2022-10-04', NULL, 'TRHU2589706', '', '20', 'MNL', 'Lot 242', 'Import', 0, ''),
(321, '2022-09-03', '2022-09-14', '2022-09-24', 'nama', 2, '2022-09-19', '2022-09-14', NULL, 'KKTU8237645', '', '20', 'MNL', 'Lot 242', 'Import', 0, ''),
(322, '2022-09-19', '2022-09-30', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-27', NULL, 'TCKU3841542', '', '20', 'MNL', 'Lot 242', 'Import', 0, ''),
(323, '2022-09-03', '2022-09-14', '2022-09-15', 'nama', 2, '2022-09-10', '2022-09-14', NULL, 'TLLU5652800', '', '40', 'MNL', 'Lot 242', 'Import', 0, ''),
(324, '2022-09-19', '2022-09-30', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-27', NULL, 'TCLU4688693', '', '40', 'MNL', 'Lot 242', 'Import', 0, ''),
(326, '2022-09-03', '2022-09-14', '2022-09-15', 'nama', 2, '2022-09-10', '2022-09-14', NULL, 'TLLU6060092', '', '40', 'MNL', 'Lot 242', 'Import', 0, ''),
(327, '2022-09-24', '2022-10-05', '2022-10-06', 'nama', 2, '2022-10-01', '2022-10-04', NULL, 'TCLU9691262', '', '40', 'MNL', 'Lot 242', 'Import', 0, ''),
(328, '2022-09-10', '2022-09-21', '2022-09-22', 'nama', 2, '2022-09-17', '2022-09-20', NULL, 'MOFU0677959', '', '40', 'MNL', 'Lot 242', 'Import', 0, ''),
(329, '2022-09-16', '2022-09-27', '2022-09-22', 'nama', 1, '2022-09-17', '2022-09-21', NULL, 'DFSU6060844', '', '40', 'Singapore', 'Lot 206', 'Import', 0, ''),
(330, '2022-09-26', '2022-10-07', '2022-10-06', 'nama', 1, '2022-10-01', '2022-10-04', NULL, 'FCIU3555044', '', '20', 'Singapore', 'Lot 206', 'Import', 0, ''),
(331, '2022-09-20', '2022-10-01', '2022-09-26', 'nama', 2, '2022-09-21', '2022-09-23', NULL, 'FFAU1407694', '', '40', 'SUB', 'Lot 242', 'Import', 0, ''),
(332, '2022-09-20', '2022-10-01', '2022-09-26', 'nama', 2, '2022-09-21', '2022-09-22', NULL, 'BEAU4625415', '', '40', 'SUB', 'Lot 242', 'Import', 0, ''),
(333, '2022-09-10', '2022-09-21', '2022-09-19', 'nama', 2, '2022-09-14', '2022-09-15', NULL, 'FCIU9568202', '', '40', 'SUB', 'Lot 242', 'Import', 0, ''),
(334, '2022-09-10', '2022-09-21', '2022-09-19', 'nama', 2, '2022-09-14', '2022-09-15', NULL, 'OOLU1080184', '', '20', 'SUB', 'Lot 242', 'Import', 0, ''),
(335, '2022-09-24', '2022-10-05', '2022-10-03', 'nama', 2, '2022-09-28', '2022-09-30', NULL, 'OOCU8153476', '', '40', 'SUB', 'Lot 242', 'Import', 0, ''),
(336, '2022-09-24', '2022-10-05', '2022-10-03', 'nama', 2, '2022-09-28', '2022-09-29', NULL, 'OOCU6852010', '', '40', 'SUB', 'Lot 242', 'Import', 0, ''),
(337, '2022-09-20', '2022-10-01', '2022-09-26', 'nama', 2, '2022-09-21', '2022-09-22', NULL, 'FFAU2905500', '', '40', 'SUB', 'Lot 242', 'Import', 0, ''),
(338, '2022-09-24', '2022-10-05', '2022-10-03', 'nama', 2, '2022-09-28', '2022-09-30', NULL, 'CSNU7460672', '', '40', 'SUB', 'Lot 242', 'Import', 0, ''),
(339, '2022-09-26', '2022-10-07', '2022-10-05', 'nama', 2, '2022-09-30', '2022-10-03', NULL, 'KKFU7625003', '', '40', 'LCB', 'Lot 242', 'Import', 0, ''),
(340, '2022-09-06', '2022-09-17', '2022-09-24', 'nama', 2, '2022-09-19', '2022-09-14', NULL, 'DRYU6041186', '', '40', 'LCB', 'Lot 242', 'Import', 0, ''),
(341, '2022-09-26', '2022-10-07', '2022-09-29', 'nama', 2, '2022-09-30', '2022-10-03', NULL, 'KKFU8034793', '', '40', 'LCB', 'Lot 206', 'Import', 0, ''),
(342, '2022-09-20', '2022-10-01', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-27', NULL, 'TCLU5262526', '', '40', 'LCB', 'Lot 242', 'Import', 0, ''),
(343, '2022-09-20', '2022-10-01', '2022-10-02', 'nama', 2, '2022-09-27', '2022-09-26', NULL, 'NYKU0837059', '', '40', 'LCB', 'Lot 206', 'Import', 0, ''),
(344, '2022-09-13', '2022-09-24', '2022-09-22', 'nama', 2, '2022-09-17', '2022-09-18', NULL, 'DFSU6478618', '', '40', 'LCB', 'Lot 242', 'Import', 0, ''),
(345, '2022-09-26', '2022-10-07', '2022-10-05', 'nama', 2, '2022-09-30', '2022-10-04', NULL, 'BEAU4443730', '', '40', 'LCB', 'Lot 206', 'Import', 0, ''),
(346, '2022-09-20', '2022-10-01', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-27', NULL, 'TCNU9498667', '', '40', 'LCB', 'Lot 242', 'Import', 0, ''),
(347, '2022-09-20', '2022-10-01', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-27', NULL, 'TCLU6694680', '', '40', 'LCB', 'Lot 206', 'Import', 0, ''),
(348, '2022-09-13', '2022-09-24', '2022-09-22', 'nama', 2, '2022-09-17', '2022-09-20', NULL, 'GAOU6638950', '', '40', 'LCB', 'Lot 206', 'Import', 0, ''),
(349, '2022-09-26', '2022-10-07', '2022-10-06', 'nama', 1, '2022-10-01', '2022-10-03', NULL, 'TCLU3516508', '', '40', 'Haipong', 'Lot 206', 'Import', 0, ''),
(350, '2022-09-26', '2022-10-07', '2022-10-06', 'nama', 1, '2022-10-01', '2022-10-04', NULL, 'NYKU4945792', '', '40', 'Haipong', 'Lot 242', 'Import', 0, ''),
(351, '2022-09-16', '2022-09-27', '2022-09-29', 'nama', 1, '2022-09-24', '2022-09-27', NULL, 'CSNU1221650', '', '20', 'Haipong', 'Lot 206', 'Import', 0, ''),
(352, '2022-09-14', '2022-09-25', '2022-09-22', 'nama', 1, '2022-09-17', '2022-09-20', NULL, 'SEKU4578979', '', '40', 'Haipong', 'Lot 206', 'Import', 0, ''),
(353, '2022-09-14', '2022-09-25', '2022-09-22', 'nama', 1, '2022-09-17', '2022-09-20', NULL, 'OOCU8514136', '', '40', 'Haipong', 'Lot 242', 'Import', 0, ''),
(354, '2022-09-26', '2022-10-07', '2022-10-06', 'nama', 1, '2022-10-01', '2022-10-04', NULL, 'FFAU1830875', '', '40', 'Haipong', 'Lot 206', 'Import', 0, ''),
(355, '2022-09-26', '2022-10-07', '2022-10-06', 'nama', 1, '2022-10-01', '2022-10-04', NULL, 'BEAU5473805', '', '40', 'Haipong', 'Lot 242', 'Import', 0, ''),
(356, '2022-09-16', '2022-09-27', '2022-09-29', 'nama', 1, '2022-09-24', '2022-09-27', NULL, 'TCKU7796950', '', '40', 'Haipong', 'Lot 206', 'Import', 0, ''),
(357, '2022-09-14', '2022-09-25', '2022-09-22', 'nama', 1, '2022-09-17', '2022-09-20', NULL, 'TRHU4309609', '', '40', 'Haipong', 'Lot 206', 'Import', 0, ''),
(358, '2022-10-01', '2022-10-12', '2022-10-10', 'nama', 2, '2022-10-05', NULL, NULL, 'TGCU5193350', '', '40', 'SUB', 'Lot 242', 'Import', 0, ''),
(359, '2022-10-01', '2022-10-12', '2022-10-10', 'nama', 2, '2022-10-05', '2022-10-06', NULL, 'TRHU6528904', '', '40', 'SUB', 'Lot 242', 'Import', 0, ''),
(360, '2022-10-01', '2022-10-12', '2022-10-10', 'nama', 2, '2022-10-05', '2022-10-06', NULL, 'TRHU4543962', '', '40', 'SUB', 'Lot 242', 'Import', 0, ''),
(362, '2022-10-04', '2022-10-15', '2022-10-08', 'nama', 2, NULL, NULL, NULL, 'TCKU2293969', '', '20', 'LCB', 'Lot 242', 'Import', 0, ''),
(363, '2022-10-04', '2022-10-15', '2022-10-08', 'nama', 2, NULL, NULL, NULL, 'FFAU1439011', '', '40', 'LCB', 'Lot 242', 'Import', 0, ''),
(364, '2022-10-04', '2022-10-15', '2022-10-08', 'nama', 2, NULL, NULL, NULL, 'TCKU9478861', '', '40', 'LCB', 'Lot 206', 'Import', 0, ''),
(365, '2022-10-04', '2022-10-15', '2022-10-08', 'nama', 2, NULL, NULL, NULL, 'TRLU7134570', '', '40', 'LCB', 'Lot 206', 'Import', 0, ''),
(366, '2022-10-04', '2022-10-15', '2022-10-08', 'nama', 2, NULL, NULL, NULL, 'KKFU8112896', '', '40', 'MNL', 'Lot 242', 'Import', 0, ''),
(367, '2022-10-04', '2022-10-15', '2022-10-08', 'nama', 2, NULL, NULL, NULL, 'TCNU7775192', '', '40', 'MNL', 'Lot 242', 'Import', 0, ''),
(368, '2022-10-04', '2022-10-15', '2022-10-08', 'nama', 2, NULL, NULL, NULL, 'TRHU5995062', '', '40', 'MNL', 'Lot 242', 'Import', 0, ''),
(369, '2022-10-04', '2022-10-15', '2022-10-08', 'nama', 1, NULL, NULL, NULL, 'CBHU7057397', '', '40', 'Haipong', 'Lot 206', 'Import', 0, ''),
(370, '2022-10-04', '2022-10-15', '2022-10-08', 'nama', 1, NULL, NULL, NULL, 'OOLU9925930', '', '40', 'Haipong', 'Lot 206', 'Import', 0, ''),
(371, '2022-10-04', '2022-10-15', '2022-10-08', 'nama', 1, NULL, NULL, NULL, 'TCKU6684880', '', '40', 'Haipong', 'Lot 242', 'Import', 0, ''),
(372, '2022-10-04', '2022-10-15', '2022-10-08', 'nama', 1, NULL, NULL, NULL, 'CSLU2236024', '', '20', 'Haipong', 'Lot 206', 'Import', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `forwarder`
--

CREATE TABLE `forwarder` (
  `id` int(11) NOT NULL,
  `nama` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forwarder`
--

INSERT INTO `forwarder` (`id`, `nama`) VALUES
(1, 'Yusen'),
(2, 'Trancy-Glorious'),
(3, 'MGL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nokar` int(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nokar`, `email`, `nama`, `password`) VALUES
(122, 'andrian@andrian.com', 'MUHAMAD ANDRIAN YUDHISTIRA', '123'),
(12345, 'admin@admin.com', 'admin', 'admin'),
(199303, 'tommy@sws.com', 'Tommy Subandri', '199303'),
(213585, 'safei-sws@sbi.com', 'Muhammad Safei', '213585');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datacon`
--
ALTER TABLE `datacon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forwarder`
--
ALTER TABLE `forwarder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nokar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datacon`
--
ALTER TABLE `datacon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT for table `forwarder`
--
ALTER TABLE `forwarder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
