-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2022 pada 05.38
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

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
-- Struktur dari tabel `datacon`
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
-- Dumping data untuk tabel `datacon`
--

INSERT INTO `datacon` (`id`, `datein`, `dateout`, `dateout2`, `nama`, `forwarder_id`, `tglout`, `tglout2`, `tglout3`, `nocon`, `invoice`, `size`, `poo`, `loca`, `section`, `isempty`, `shipment`) VALUES
(263, '2022-09-10', '2022-09-21', '2022-09-22', 'nama', 2, '2022-09-17', '2022-09-20', NULL, 'TCLU7669130', '', '20', 'Philipin', 'Lot 242', 'Import', 0, ''),
(264, '2022-09-03', '2022-09-14', '2022-09-24', 'nama', 2, '2022-09-19', '2022-09-14', NULL, 'TCNU7832754', '', '40', 'Philipin', 'Lot 242', 'Import', 0, ''),
(265, '2022-09-19', '2022-09-30', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-24', NULL, 'BEAU5262248', '', '40', 'Philipin', 'Lot 242', 'Import', 0, ''),
(266, '2022-09-03', '2022-09-14', '2022-09-24', 'nama', 2, '2022-09-19', '2022-09-14', NULL, 'KKTU8237645', '', '20', 'Philipin', 'Lot 242', 'Import', 0, ''),
(267, '2022-09-19', '2022-09-30', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-27', NULL, 'TCKU3841542', '', '20', 'Philipin', 'Lot 242', 'Import', 0, ''),
(268, '2022-09-03', '2022-09-14', '2022-09-15', 'nama', 2, '2022-09-10', '2022-09-14', NULL, 'TLLU5652800', '', '40', 'Philipin', 'Lot 242', 'Import', 0, ''),
(269, '2022-09-19', '2022-09-30', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-27', NULL, 'TCLU4688693', '', '40', 'Philipin', 'Lot 242', 'Import', 0, ''),
(270, '2022-09-19', '2022-09-30', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-27', NULL, 'TCLU4688693', '', '40', 'Philipin', 'Lot 242', 'Import', 0, ''),
(271, '2022-09-03', '2022-09-14', '2022-09-15', 'nama', 2, '2022-09-10', '2022-09-14', NULL, 'TLLU60600092', '', '40', 'Philipin', 'Lot 242', 'Import', 0, ''),
(272, '2022-09-10', '2022-09-21', '2022-09-22', 'nama', 2, '2022-09-17', '2022-09-20', NULL, 'MOFU0677959', '', '40', 'Philipin', 'Lot 242', 'Import', 0, ''),
(273, '2022-09-16', '2022-09-27', '2022-09-22', 'nama', 1, '2022-09-17', '2022-09-21', NULL, 'DFSU6060844', '', '40', 'Singapore', 'Lot 206', 'Import', 0, ''),
(274, '2022-09-20', '2022-10-01', '2022-09-26', 'nama', 2, '2022-09-21', '2022-09-23', NULL, 'FFAU1407694', '', '40', 'Surabaya', 'Lot 242', 'Import', 0, ''),
(275, '2022-09-20', '2022-10-01', '2022-09-26', 'nama', 2, '2022-09-21', '2022-09-22', NULL, 'BEAU4625415', '', '40', 'Surabaya', 'Lot 242', 'Import', 0, ''),
(276, '2022-09-10', '2022-09-21', '2022-09-19', 'nama', 2, '2022-09-14', '2022-09-15', NULL, 'FCIU9568202', '', '40', 'Surabaya', 'Lot 242', 'Import', 0, ''),
(277, '2022-09-10', '2022-09-21', '2022-09-19', 'nama', 2, '2022-09-14', '2022-09-15', NULL, 'OOLU1080184', '', '20', 'Surabaya', 'Lot 242', 'Import', 0, ''),
(278, '2022-09-24', '2022-10-05', '2022-10-03', 'nama', 2, '2022-09-28', '2022-09-30', NULL, 'OOCU8153476', '', '40', 'Surabaya', 'Lot 242', 'Import', 0, ''),
(279, '2022-09-24', '2022-10-05', '2022-10-03', 'nama', 2, '2022-09-28', '2022-09-29', NULL, 'OOCU6852010', '', '40', 'Surabaya', 'Lot 242', 'Import', 0, ''),
(282, '2022-09-20', '2022-10-01', '2022-09-26', 'nama', 2, '2022-09-21', '2022-09-22', NULL, 'FFAU2905500', '', '40', 'Surabaya', 'Lot 242', 'Import', 0, ''),
(283, '2022-09-24', '2022-10-05', '2022-10-03', 'nama', 2, '2022-09-28', '2022-09-30', NULL, 'CSNU7460672', '', '40', 'Surabaya', 'Lot 242', 'Import', 0, ''),
(284, '2022-09-06', '2022-09-17', '2022-09-24', 'nama', 2, '2022-09-19', '2022-09-14', NULL, 'DRYU6041185', '', '40', 'Thailand', 'Lot 242', 'Import', 0, ''),
(285, '2022-09-20', '2022-10-01', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-27', NULL, 'TCLUU5262526', '', '40', 'Thailand', 'Lot 242', 'Import', 0, ''),
(286, '2022-09-20', '2022-10-01', '2022-10-02', 'nama', 2, '2022-09-27', '2022-09-26', NULL, 'NYKU0837059', '', '40', 'Thailand', 'Lot 206', 'Import', 0, ''),
(287, '2022-09-13', '2022-09-24', '2022-09-22', 'nama', 2, '2022-09-17', '2022-09-20', NULL, 'DFSU6478618', '', '40', 'Thailand', 'Lot 242', 'Import', 0, ''),
(288, '2022-09-20', '2022-10-01', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-24', NULL, 'TCNU9498667', '', '40', 'Thailand', 'Lot 242', 'Import', 0, ''),
(289, '2022-09-20', '2022-10-01', '2022-09-29', 'nama', 2, '2022-09-24', '2022-09-27', NULL, 'TCLU6694680', '', '40', 'Thailand', 'Lot 206', 'Import', 0, ''),
(290, '2022-09-13', '2022-09-24', '2022-09-22', 'nama', 2, '2022-09-17', '2022-09-20', NULL, 'GAOU6638950', '', '40', 'Thailand', 'Lot 206', 'Import', 0, ''),
(291, '2022-09-16', '2022-09-27', '2022-09-29', 'nama', 1, '2022-09-24', '2022-09-27', NULL, 'CSNU1221650', '', '20', 'Vietnam', 'Lot 206', 'Import', 0, ''),
(292, '2022-09-14', '2022-09-25', '2022-09-22', 'nama', 1, '2022-09-17', '2022-09-20', NULL, 'SEKU4578979', '', '40', 'Vietnam', 'Lot 206', 'Import', 0, ''),
(293, '2022-09-14', '2022-09-25', '2022-09-22', 'nama', 1, '2022-09-17', '2022-09-20', NULL, 'OOCU8514136', '', '40', 'Vietnam', 'Lot 242', 'Import', 0, ''),
(294, '2022-09-16', '2022-09-27', '2022-09-29', 'nama', 1, '2022-09-24', '2022-09-27', NULL, 'TCKU7796950', '', '40', 'Vietnam', 'Lot 206', 'Import', 0, ''),
(295, '2022-09-14', '2022-09-25', '2022-09-22', 'nama', 1, '2022-09-17', '2022-09-20', NULL, 'TRHU4309609', '', '40', 'Vietnam', 'Lot 206', 'Import', 0, ''),
(297, '2022-09-12', '2022-09-23', '2022-09-19', 'nama', 3, '2022-09-15', '2022-09-16', NULL, 'ONEU0303960', '', '40', 'Japan', 'Lot 206', 'Import', 7, ''),
(298, '2022-10-01', '2022-10-12', '2022-10-05', 'nama', 3, '2022-10-03', '0000-00-00', NULL, 'MRKU2679044', 'IBSD25048', '40', 'Japan', 'Lot 8', 'Export', 0, 'Nagoya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `forwarder`
--

CREATE TABLE `forwarder` (
  `id` int(11) NOT NULL,
  `nama` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `forwarder`
--

INSERT INTO `forwarder` (`id`, `nama`) VALUES
(1, 'Yusen'),
(2, 'Trancy-Glorious'),
(3, 'MGL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nokar` int(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nokar`, `email`, `nama`, `password`) VALUES
(122, 'andrian@andrian.com', 'MUHAMAD ANDRIAN YUDHISTIRA', '123'),
(12345, 'admin@admin.com', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datacon`
--
ALTER TABLE `datacon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `forwarder`
--
ALTER TABLE `forwarder`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nokar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datacon`
--
ALTER TABLE `datacon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT untuk tabel `forwarder`
--
ALTER TABLE `forwarder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
