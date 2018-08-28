-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2018 at 11:55 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt_world_trans`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `brg_id` int(11) NOT NULL,
  `ktg_id` int(11) NOT NULL,
  `brg_nama` varchar(25) NOT NULL,
  `brg_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`brg_id`, `ktg_id`, `brg_nama`, `brg_stok`) VALUES
(8, 1, 'Ban Aeoluos', 4),
(11, 6, 'Oli Mesin', 57),
(12, 1, 'Ban Dunlop', 4),
(13, 5, 'Velg Umum', 5),
(14, 7, 'Baut Bossing', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_detail`
--

CREATE TABLE `tbl_barang_detail` (
  `dt_id` int(11) NOT NULL,
  `brg_id` int(11) NOT NULL,
  `dt_serial` varchar(15) NOT NULL,
  `dt_status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang_detail`
--

INSERT INTO `tbl_barang_detail` (`dt_id`, `brg_id`, `dt_serial`, `dt_status`) VALUES
(2, 8, 'ser1212', 'false'),
(3, 8, '111', 'false'),
(5, 12, '1121', 'false'),
(6, 12, '12asa', ''),
(7, 8, 'ASAS', 'false'),
(9, 8, '5432', ''),
(10, 8, '3444', ''),
(11, 8, 'SA32', 'false'),
(12, 12, 'SER332', ''),
(13, 12, 'SER111', ''),
(19, 8, 'SAE111', ''),
(20, 12, 'SD11', ''),
(25, 8, 'SS21', ''),
(26, 12, '007', 'false'),
(27, 8, 'AE123', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `ktg_id` int(11) NOT NULL,
  `stn_id` int(11) NOT NULL,
  `ktg_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`ktg_id`, `stn_id`, `ktg_nama`) VALUES
(1, 3, 'Ban'),
(5, 3, 'Velg'),
(6, 4, 'Oli'),
(7, 3, 'Baut');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keterangan_posisi`
--

CREATE TABLE `tbl_keterangan_posisi` (
  `ket_id` int(11) NOT NULL,
  `ket_nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keterangan_posisi`
--

INSERT INTO `tbl_keterangan_posisi` (`ket_id`, `ket_nama`) VALUES
(1, 'Ban Depan Kanan'),
(2, 'Ban Depan Kiri'),
(3, 'Ban Tengah Kanan Dalam'),
(4, 'Ban Tengah Kanan Luar'),
(5, 'Ban Tengah Kiri Dalam'),
(6, 'Ban Tengah Kiri luar'),
(7, 'Ban Belakang Kanan Dalam'),
(8, 'Ban Belakang Kanan Luar'),
(9, 'Ban Belakang Kiri Dalam\r\n\r\n'),
(10, 'Ban Belakang Kiri Luar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_klaim`
--

CREATE TABLE `tbl_klaim` (
  `klm_id` varchar(20) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `klm_tgl` date DEFAULT NULL,
  `klm_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_klaim`
--

INSERT INTO `tbl_klaim` (`klm_id`, `usr_id`, `klm_tgl`, `klm_total`) VALUES
('KLM20180524001', 1, '2018-05-24', 20000),
('KLM20180524002', 1, '2018-05-24', 140000),
('KLM20180525001', 2, '2018-05-25', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_klaim_detail`
--

CREATE TABLE `tbl_klaim_detail` (
  `klm_id` varchar(20) NOT NULL,
  `mbl_id` int(11) NOT NULL,
  `klm_dt_tgl` date DEFAULT NULL,
  `klm_dt_harga` double DEFAULT NULL,
  `klm_dt_ket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_klaim_detail`
--

INSERT INTO `tbl_klaim_detail` (`klm_id`, `mbl_id`, `klm_dt_tgl`, `klm_dt_harga`, `klm_dt_ket`) VALUES
('KLM20180524001', 4, '2018-05-15', 10000, 'asasa'),
('KLM20180524001', 3, '2018-05-16', 10000, 'hahah'),
('KLM20180524002', 3, '2018-05-23', 120000, 'ganti palt'),
('KLM20180524002', 3, '2018-05-14', 20000, 'parkir'),
('KLM20180525001', 4, '2018-05-24', 70000, 'ganti baut boss 7 pcs'),
('KLM20180527001', 3, '2018-05-27', 120000, 'ganti filter udara');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mekanik`
--

CREATE TABLE `tbl_mekanik` (
  `mk_id` int(11) NOT NULL,
  `mk_nama` varchar(20) DEFAULT NULL,
  `mk_jk` varchar(10) DEFAULT NULL,
  `mk_tempat_lahir` varchar(20) DEFAULT NULL,
  `mk_tgl_lahir` date DEFAULT NULL,
  `mk_alamat` varchar(50) DEFAULT NULL,
  `mk_email` varchar(30) DEFAULT NULL,
  `mk_tlp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mekanik`
--

INSERT INTO `tbl_mekanik` (`mk_id`, `mk_nama`, `mk_jk`, `mk_tempat_lahir`, `mk_tgl_lahir`, `mk_alamat`, `mk_email`, `mk_tlp`) VALUES
(1, 'wari', 'Laki-Laki', 'karawang', '1996-01-20', 'kp.rawasari ds.jomin timur rt 11/02 kec.kotabaru k', 'afrianwari89@gmail.com', '08999385257'),
(2, 'dadan', 'Laki-Laki', 'karawang', '1993-01-10', 'cikampek baru', 'dadan@gmail.com', '0120000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `mbl_id` int(11) NOT NULL,
  `spr_id` int(11) DEFAULT NULL,
  `mbl_nopol` varchar(15) NOT NULL,
  `mbl_km_showroom` int(11) NOT NULL,
  `mbl_km_awal` int(11) NOT NULL,
  `mbl_tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`mbl_id`, `spr_id`, `mbl_nopol`, `mbl_km_showroom`, `mbl_km_awal`, `mbl_tanggal`) VALUES
(3, 1, 'T 123 TY', 1111, 1111, '2017-05-12'),
(4, 2, 'B 111 TAY', 1212, 2222, '2018-05-17'),
(5, 2, 'B 9655 TYV', 97875, 97985, '2017-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `pbl_id` varchar(20) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `spl_id` int(11) NOT NULL,
  `pbl_tanggal` date NOT NULL,
  `pbl_po` varchar(25) NOT NULL,
  `pbl_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`pbl_id`, `usr_id`, `spl_id`, `pbl_tanggal`, `pbl_po`, `pbl_total`) VALUES
('PBL20180513001', 1, 4, '2018-05-13', 'po111', 1440000),
('PBL20180513002', 1, 4, '2018-05-13', 'po111', 500000),
('PBL20180513003', 1, 4, '2018-05-13', '', 250000),
('PBL20180513004', 1, 4, '2018-05-13', '', 120000),
('PBL20180513005', 1, 4, '2018-05-14', 'po111', 50000),
('PBL20180513006', 1, 4, '2018-05-14', 'P11', 290000),
('PBL20180522001', 1, 3, '2018-05-22', '', 4850000),
('PBL20180522002', 1, 3, '2018-05-22', 'as1212', 250000),
('PBL20180524001', 1, 4, '2018-05-24', 'po321', 850000),
('PBL20180525001', 1, 4, '2018-05-25', 'POSS', 370000),
('PBL20180525002', 1, 3, '2018-05-25', 'p111', 250000),
('PBL20180525003', 1, 3, '2018-05-25', 'po12345', 2750000),
('PBL20180525004', 1, 4, '2018-05-25', 'po12222', 240000),
('PBL20180525005', 2, 3, '2018-05-25', '123', 70000),
('PBL20180526001', 1, 4, '2018-05-26', 'po11', 250000),
('PBL20180526002', 1, 4, '2018-05-26', '', 360000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian_detail`
--

CREATE TABLE `tbl_pembelian_detail` (
  `pbl_id` varchar(20) NOT NULL,
  `brg_id` int(11) NOT NULL,
  `pbl_serial` varchar(20) NOT NULL,
  `pbl_jumlah` int(11) NOT NULL,
  `pbl_harga` float NOT NULL,
  `pbl_subtot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian_detail`
--

INSERT INTO `tbl_pembelian_detail` (`pbl_id`, `brg_id`, `pbl_serial`, `pbl_jumlah`, `pbl_harga`, `pbl_subtot`) VALUES
('PBL20180513001', 11, '', 12, 120000, 1440000),
('PBL20180513002', 8, 'ser1212', 1, 250000, 250000),
('PBL20180513002', 8, '111', 1, 250000, 250000),
('PBL20180513003', 12, '1121', 1, 250000, 250000),
('PBL20180513004', 12, '12asa', 1, 120000, 120000),
('PBL20180522001', 11, '', 17, 250000, 4250000),
('PBL20180522001', 8, '5432', 1, 300000, 300000),
('PBL20180522001', 8, '3444', 1, 300000, 300000),
('PBL20180522002', 8, 'SA32', 1, 250000, 250000),
('PBL20180524001', 12, 'SER332', 1, 250000, 250000),
('PBL20180524001', 12, 'SER111', 1, 250000, 250000),
('PBL20180524001', 11, '', 14, 25000, 350000),
('PBL20180525001', 11, '', 6, 20000, 120000),
('PBL20180525001', 8, 'SAE111', 1, 250000, 250000),
('PBL20180525002', 12, 'SD11', 1, 250000, 250000),
('PBL20180525003', 13, '', 5, 500000, 2500000),
('PBL20180525003', 8, 'SS21', 1, 250000, 250000),
('PBL20180525004', 14, '', 20, 2000, 40000),
('PBL20180525004', 12, '007', 1, 200000, 200000),
('PBL20180525005', 14, '', 7, 10000, 70000),
('PBL20180526001', 8, 'AE123', 1, 250000, 250000),
('PBL20180526002', 11, '', 12, 30000, 360000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `stn_id` int(11) NOT NULL,
  `stn_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`stn_id`, `stn_nama`) VALUES
(3, 'Pcs'),
(4, 'Liter');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servis`
--

CREATE TABLE `tbl_servis` (
  `svs_id` varchar(20) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `mbl_id` int(11) NOT NULL,
  `mk_id` int(11) NOT NULL,
  `svs_km` varchar(10) NOT NULL,
  `svs_tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_servis`
--

INSERT INTO `tbl_servis` (`svs_id`, `usr_id`, `mbl_id`, `mk_id`, `svs_km`, `svs_tanggal`) VALUES
('SVS20180522001', 1, 3, 1, '123', '2018-05-19'),
('SVS20180522002', 1, 4, 2, '1111', '2018-05-22'),
('SVS20180522003', 1, 3, 1, '111', '2018-05-22'),
('SVS20180522004', 1, 4, 2, '3321', '2018-05-22'),
('SVS20180522005', 1, 4, 1, '321', '2018-05-22'),
('SVS20180522006', 1, 4, 1, '3321', '2018-05-22'),
('SVS20180525001', 2, 3, 1, '3311', '2018-05-25'),
('SVS20180525002', 2, 4, 1, '111', '2018-05-25'),
('SVS20180526001', 1, 3, 1, '1111', '2018-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servis_detail`
--

CREATE TABLE `tbl_servis_detail` (
  `svs_id` varchar(20) NOT NULL,
  `brg_id` int(11) NOT NULL,
  `ket_id` int(11) NOT NULL,
  `svs_serial` varchar(20) NOT NULL,
  `svs_jumlah` int(11) NOT NULL,
  `svs_ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_servis_detail`
--

INSERT INTO `tbl_servis_detail` (`svs_id`, `brg_id`, `ket_id`, `svs_serial`, `svs_jumlah`, `svs_ket`) VALUES
('SVS20180522001', 11, 0, '', 1, 'asas'),
('SVS20180522001', 8, 1, '111', 1, 'aaaa'),
('SVS20180522002', 8, 5, 'asas', 1, 'aaaa'),
('SVS20180522002', 11, 0, '', 4, 'ffff'),
('SVS20180522003', 12, 1, '1121', 1, 'ban pecah'),
('SVS20180522003', 11, 0, '', 2, 'servis rutin'),
('SVS20180522004', 11, 0, '', 1, 'lagi nyoba'),
('SVS20180522005', 8, 1, 'ser1212', 1, 'asasa'),
('SVS20180522005', 11, 0, '', 2, 'aaa'),
('SVS20180522006', 8, 1, 'SA32', 1, 'balala'),
('SVS20180525001', 14, 0, '', 2, 'baut bossing patah'),
('SVS20180525002', 14, 0, '', 5, 'baut boss karat'),
('SVS20180526001', 8, 1, 'AE123', 1, 'asasas'),
('SVS20180527001', 12, 2, '007', 1, 'ban pecah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supir`
--

CREATE TABLE `tbl_supir` (
  `spr_id` int(11) NOT NULL,
  `spr_nama` varchar(20) DEFAULT NULL,
  `spr_jk` varchar(10) DEFAULT NULL,
  `spr_tempat_lahir` varchar(20) DEFAULT NULL,
  `spr_tgl_lahir` date DEFAULT NULL,
  `spr_alamat` varchar(50) DEFAULT NULL,
  `spr_email` varchar(30) DEFAULT NULL,
  `spr_tlp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supir`
--

INSERT INTO `tbl_supir` (`spr_id`, `spr_nama`, `spr_jk`, `spr_tempat_lahir`, `spr_tgl_lahir`, `spr_alamat`, `spr_email`, `spr_tlp`) VALUES
(1, 'dani', 'Laki-Laki', 'karawang', '1111-11-11', 'cikampek', 'cikampek@gmail.com', '123'),
(2, 'indra', 'Laki-Laki', 'karawang', '1111-11-11', 'jomin timur', 'asas', '121212'),
(5, 'nani', 'Perempuan', 'jakarta', '1996-01-20', 'cikampek', 'nani2@gmail.com', '08999385251');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `spl_id` int(11) NOT NULL,
  `spl_nama` varchar(20) NOT NULL DEFAULT '0',
  `spl_alamat` varchar(50) DEFAULT '0',
  `spl_tlp` varchar(13) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`spl_id`, `spl_nama`, `spl_alamat`, `spl_tlp`) VALUES
(3, 'Toko Sparepart', 'karwang', '081234775421'),
(4, 'A&A', 'Purwakarta', '089654339853'),
(6, 'Toko Cahaya Part', 'Purwakarta Jl.singadilaga no 4', '0211546321');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `usr_id` int(11) NOT NULL,
  `usr_status` varchar(5) NOT NULL,
  `usr_nama` varchar(20) NOT NULL,
  `usr_jk` varchar(10) NOT NULL,
  `usr_tempat_lahir` varchar(20) NOT NULL,
  `usr_tgl_lahir` date NOT NULL,
  `usr_alamat` varchar(50) NOT NULL,
  `usr_email` varchar(30) NOT NULL,
  `usr_tlp` varchar(13) NOT NULL,
  `usr_pass` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`usr_id`, `usr_status`, `usr_nama`, `usr_jk`, `usr_tempat_lahir`, `usr_tgl_lahir`, `usr_alamat`, `usr_email`, `usr_tlp`, `usr_pass`) VALUES
(1, 'SBU', 'wari', 'Laki-Laki', 'cikampek', '1996-01-11', 'cikampek baru', 'afrianwari89@gmail.com', '08999385259', '123456'),
(2, 'Staff', 'dadan', 'Laki-Laki', 'karawang', '2017-01-01', 'karawang', 'dadan@gmail.com', '08999385259', '123456'),
(3, 'SBU', 'Wawan Saefulloh', 'Laki-Laki', 'Purwakarta', '1989-01-30', 'Purwakarta-Babakan Cikao', 'wawansaefulloh@gmail.com', '081219229412', '123456'),
(4, 'Staff', 'Mia Rohmiati', 'Perempuan', 'Purwakarta', '1994-01-08', 'Purwakarta', 'miarohmiati@gmail.com', '081233456455', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`brg_id`),
  ADD KEY `fk_tbl_barang_tbl_kategori1_idx` (`ktg_id`);

--
-- Indexes for table `tbl_barang_detail`
--
ALTER TABLE `tbl_barang_detail`
  ADD PRIMARY KEY (`dt_id`),
  ADD KEY `Index 1` (`brg_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`ktg_id`),
  ADD KEY `key_satuan` (`stn_id`);

--
-- Indexes for table `tbl_keterangan_posisi`
--
ALTER TABLE `tbl_keterangan_posisi`
  ADD PRIMARY KEY (`ket_id`);

--
-- Indexes for table `tbl_klaim`
--
ALTER TABLE `tbl_klaim`
  ADD PRIMARY KEY (`klm_id`),
  ADD KEY `fk_tbl_klem_tbl_user1_idx` (`usr_id`);

--
-- Indexes for table `tbl_klaim_detail`
--
ALTER TABLE `tbl_klaim_detail`
  ADD KEY `fk_tbl_klem_detail_tbl_klem1_idx` (`klm_id`),
  ADD KEY `fk_tbl_klem_detail_tbl_mobil1_idx` (`mbl_id`);

--
-- Indexes for table `tbl_mekanik`
--
ALTER TABLE `tbl_mekanik`
  ADD PRIMARY KEY (`mk_id`);

--
-- Indexes for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`mbl_id`),
  ADD KEY `spr_id` (`spr_id`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`pbl_id`),
  ADD KEY `fk_tbl_pembelian_tbl_user1_idx` (`usr_id`),
  ADD KEY `Index 3` (`spl_id`);

--
-- Indexes for table `tbl_pembelian_detail`
--
ALTER TABLE `tbl_pembelian_detail`
  ADD KEY `pbl_id` (`pbl_id`),
  ADD KEY `fk_tbl_pembelian_detail_tbl_barang1_idx` (`brg_id`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`stn_id`);

--
-- Indexes for table `tbl_servis`
--
ALTER TABLE `tbl_servis`
  ADD PRIMARY KEY (`svs_id`),
  ADD KEY `fk_tbl_service_tbl_user1_idx` (`usr_id`),
  ADD KEY `Index 3` (`mk_id`),
  ADD KEY `Index 5` (`mbl_id`);

--
-- Indexes for table `tbl_servis_detail`
--
ALTER TABLE `tbl_servis_detail`
  ADD KEY `fk_tbl_service_detail_tbl_barang1` (`brg_id`),
  ADD KEY `fk_tbl_service_detail_tbl_keterangan_posisi1` (`ket_id`),
  ADD KEY `fk_tbl_service_detail_tbl_service1_idx` (`svs_id`);

--
-- Indexes for table `tbl_supir`
--
ALTER TABLE `tbl_supir`
  ADD PRIMARY KEY (`spr_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`spl_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `brg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_barang_detail`
--
ALTER TABLE `tbl_barang_detail`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `ktg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_keterangan_posisi`
--
ALTER TABLE `tbl_keterangan_posisi`
  MODIFY `ket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_mekanik`
--
ALTER TABLE `tbl_mekanik`
  MODIFY `mk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  MODIFY `mbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `stn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_supir`
--
ALTER TABLE `tbl_supir`
  MODIFY `spr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `spl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
