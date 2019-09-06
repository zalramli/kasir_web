-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2019 at 07:40 PM
-- Server version: 10.1.38-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lcc`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `api_barang`
-- (See below for the actual view)
--
CREATE TABLE `api_barang` (
`id_merk` varchar(8)
,`id_kategori` varchar(8)
,`id_barang` varchar(8)
,`nama_barang` varchar(70)
,`foto` text
,`stok_real` int(11)
,`stok_sementara` int(11)
,`harga` int(11)
,`deskripsi` text
,`nama_kategori` varchar(50)
,`nama_merk` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` varchar(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` varchar(50) NOT NULL,
  `id_user` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `username`, `password`, `akses`, `id_user`) VALUES
('AKN001', 'fahri', 'fahri', 'Admin', 'PGW003'),
('AKN002', 'dani', 'dani', 'Kasir', 'PGW004');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(70) NOT NULL,
  `foto` text NOT NULL,
  `stok_real` int(11) NOT NULL,
  `stok_sementara` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` varchar(8) NOT NULL,
  `id_merk` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `foto`, `stok_real`, `stok_sementara`, `harga`, `deskripsi`, `id_kategori`, `id_merk`) VALUES
('BRG001', 'Lenovo Ideapad 330', 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Vivo_mobile_logo.png', -3, 0, 3500000, 'Ram : 4GBasdasdsdasdasdasdakjsgdkgaskdkgaksdggaskgdkjagsjk\r\nHardisk : 100GB\r\nProcessor : Inter Core i3\r\nasdkashd asdasd asdasdsa asdasd\r\nkasdhlasd \r\nnlashddls\r\nasbdk \r\nasldhlsad \r\nlsdhklahsd \r\nsdakasdh \r\nsakdh as\r\n', 'KTG001', 'MRK001'),
('BRG002', 'Acer Aspire e15', 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Vivo_mobile_logo.png', -3, 0, 5200000, 'Awet', 'KTG001', 'MRK001'),
('BRG003', 'Redmi Note 7', 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Vivo_mobile_logo.png', -1, 0, 2000000, 'asd', 'KTG002', 'MRK004'),
('BRG004', 'V15 Pro', 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Vivo_mobile_logo.png', 1, 0, 3400000, 'asd', 'KTG002', 'MRK005'),
('BRG005', 'Headset', 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Vivo_mobile_logo.png', 14, 0, 29000, 'baru', 'KTG003', 'MRK004'),
('BRG006', 'lenovo', 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Vivo_mobile_logo.png', 10, 0, 10000000, 'pc', 'KTG001', 'MRK003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chatting`
--

CREATE TABLE `tbl_chatting` (
  `id_pesan` int(11) NOT NULL,
  `isi_pesan` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_pegawai` varchar(8) NOT NULL,
  `id_pelanggan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` varchar(8) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('JBT001', 'Owner'),
('JBT002', 'Kasir'),
('JBT003', 'Admin'),
('JBT004', 'Marketing'),
('JBT005', 'dd'),
('JBT006', 'ddd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` varchar(8) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
('KTG001', 'Laptop'),
('KTG002', 'Smartphone'),
('KTG003', 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merk`
--

CREATE TABLE `tbl_merk` (
  `id_merk` varchar(8) NOT NULL,
  `nama_merk` varchar(50) NOT NULL,
  `foto_merk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_merk`
--

INSERT INTO `tbl_merk` (`id_merk`, `nama_merk`, `foto_merk`) VALUES
('MRK001', 'Asus', 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Vivo_mobile_logo.png'),
('MRK002', 'Acer', 'https://upload.wikimedia.org/wikipedia/commons/d/d7/Acer-Logo_2011.png'),
('MRK003', 'Lenovo', 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Vivo_mobile_logo.png'),
('MRK004', 'Xiaomi', 'https://upload.wikimedia.org/wikipedia/commons/d/d7/Acer-Logo_2011.png'),
('MRK005', 'Vivo', 'https://upload.wikimedia.org/wikipedia/commons/e/e5/Vivo_mobile_logo.png'),
('MRK006', 'Oppo', 'https://upload.wikimedia.org/wikipedia/commons/d/d7/Acer-Logo_2011.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` varchar(8) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_jabatan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `alamat`, `no_hp`, `id_jabatan`) VALUES
('PGW001', 'Ali Rahmatullah', 'Randu Agung', '0852334123214', 'JBT003'),
('PGW002', 'Rizkika Zakka', 'Kunir Lumajang', '0888123234122', 'JBT004'),
('PGW003', 'Fahriansyah', 'Probolinggo', '0871273517352', 'JBT003'),
('PGW004', 'Dani Ardiansyah', 'Jember', '087125757125', 'JBT002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` varchar(8) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `alamat`, `no_hp`) VALUES
('PLG001', 'Prayitno', 'prayit@gmail.com', 'politeknik jember', '0836276372812'),
('PLG002', 'Supardi', 'zaldolphin@gmail.com', 'Lumajang', '08362763728'),
('PLG003', 'Hariono', 'github.little@gmail.com', 'politeknik jember', '08362763728'),
('PLG004', 'Alfan', 'alfan@gmail.com', 'Jember', '082234641698'),
('PLG005', 'github', 'github@gmail.com', 'klakah', '9000'),
('PLG006', 'asd', 'alfan@gmail.com', 'klakah', '08871293'),
('PLG007', '', '', '', ''),
('PLG008', 'winda', 'rizky@gmail.com', 'lala', '09787989'),
('PLG009', '', '', '', ''),
('PLG010', 'das', 'asd@gmail.com', 'asdasd', '089721361293'),
('PLG011', 'sapri', 'sapri@gmail.com', 'jatigobo', '089216386213'),
('PLG012', 'asd', 'asd@gmail.com', 'asdasd', '2321344412'),
('PLG013', 'ibukkk', 'ibuk@gmail.com', 'asd', '089216386213'),
('PLG014', 'asd', 'alfan@gmail.com', 'asdasd', '2321344412');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id_pemesanan` varchar(8) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_tenggang` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_pelanggan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `tanggal_pesan`, `tanggal_tenggang`, `status`, `id_pelanggan`) VALUES
('PMS001', '2019-05-27', '2019-05-28', 'sudah', 'PLG001'),
('PMS002', '2019-05-27', '2019-05-28', 'sudah', 'PLG002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanandetail`
--

CREATE TABLE `tbl_pemesanandetail` (
  `id_detail` int(11) NOT NULL,
  `id_pemesanan` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemesanandetail`
--

INSERT INTO `tbl_pemesanandetail` (`id_detail`, `id_pemesanan`, `id_barang`, `jumlah`) VALUES
(1, 'PMS001', 'BRG001', 1),
(2, 'PMS001', 'BRG002', 1),
(3, 'PMS002', 'BRG003', 1),
(4, 'PMS002', 'BRG004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `total_kembalian` int(11) NOT NULL,
  `id_pegawai` varchar(8) NOT NULL,
  `id_pelanggan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `tanggal`, `total_harga`, `total_bayar`, `total_kembalian`, `id_pegawai`, `id_pelanggan`) VALUES
('TRS001', '2019-05-29', 5500000, 5000, 500, 'PGW001', 'PLG005'),
('TRS002', '2019-05-29', 8600000, 5000, 500, 'PGW001', 'PLG006'),
('TRS003', '2019-05-29', 2000000, 5000, 500, 'PGW001', 'PLG004'),
('TRS004', '2019-05-29', 3500000, 5000, 500, 'PGW001', 'PLG008'),
('TRS005', '2019-05-29', 8700000, 5000, 500, 'PGW001', 'PLG009'),
('TRS006', '2019-06-13', 29000, 5000, 500, 'PGW001', 'PLG010'),
('TRS007', '2019-06-13', 5400000, 5000, 500, 'PGW004', 'PLG002'),
('TRS008', '2019-06-13', 8700000, 5000, 500, 'PGW004', 'PLG001'),
('TRS009', '2019-06-13', 8700000, 5000, 500, 'PGW004', 'PLG011'),
('TRS010', '2019-06-13', 8700000, 5000, 500, 'PGW004', 'PLG012'),
('TRS011', '2019-06-16', 58000, 20000, 2000, 'PGW004', 'PLG013'),
('TRS012', '2019-06-16', 29000, 9999, 2000, 'PGW004', 'PLG014'),
('TRS013', '2019-06-16', 5400000, 88888, 2000, 'PGW004', 'PLG002'),
('TRS014', '2019-06-28', 5400000, 900000, 2000, 'PGW003', 'PLG002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksidetail`
--

CREATE TABLE `tbl_transaksidetail` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(8) NOT NULL,
  `id_barang` varchar(8) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_hrg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksidetail`
--

INSERT INTO `tbl_transaksidetail` (`id_detail`, `id_transaksi`, `id_barang`, `qty`, `total_hrg`) VALUES
(1, 'TRS001', 'BRG001', 1, 3500000),
(2, 'TRS001', 'BRG003', 1, 2000000),
(3, 'TRS002', 'BRG002', 1, 5200000),
(4, 'TRS002', 'BRG004', 1, 3400000),
(5, 'TRS003', 'BRG003', 1, 2000000),
(6, 'TRS004', 'BRG001', 1, 3500000),
(7, 'TRS005', 'BRG001', 1, 3500000),
(8, 'TRS005', 'BRG002', 1, 5200000),
(9, 'TRS006', 'BRG005', 1, 29000),
(10, 'TRS007', 'BRG003', 1, 2000000),
(11, 'TRS007', 'BRG004', 1, 3400000),
(12, 'TRS008', 'BRG001', 1, 3500000),
(13, 'TRS008', 'BRG002', 1, 5200000),
(14, 'TRS009', 'BRG001', 1, 3500000),
(15, 'TRS009', 'BRG002', 1, 5200000),
(16, 'TRS010', 'BRG001', 1, 3500000),
(17, 'TRS010', 'BRG002', 1, 5200000),
(18, 'TRS011', 'BRG005', 2, 58000),
(19, 'TRS012', 'BRG005', 1, 29000),
(20, 'TRS013', 'BRG003', 1, 2000000),
(21, 'TRS013', 'BRG004', 1, 3400000),
(22, 'TRS014', 'BRG003', 1, 2000000),
(23, 'TRS014', 'BRG004', 1, 3400000);

-- --------------------------------------------------------

--
-- Structure for view `api_barang`
--
DROP TABLE IF EXISTS `api_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `api_barang`  AS  select `tbl_barang`.`id_merk` AS `id_merk`,`tbl_barang`.`id_kategori` AS `id_kategori`,`tbl_barang`.`id_barang` AS `id_barang`,`tbl_barang`.`nama_barang` AS `nama_barang`,`tbl_barang`.`foto` AS `foto`,`tbl_barang`.`stok_real` AS `stok_real`,`tbl_barang`.`stok_sementara` AS `stok_sementara`,`tbl_barang`.`harga` AS `harga`,`tbl_barang`.`deskripsi` AS `deskripsi`,`tbl_kategori`.`nama_kategori` AS `nama_kategori`,`tbl_merk`.`nama_merk` AS `nama_merk` from ((`tbl_barang` join `tbl_kategori` on((`tbl_barang`.`id_kategori` = `tbl_kategori`.`id_kategori`))) join `tbl_merk` on((`tbl_barang`.`id_merk` = `tbl_merk`.`id_merk`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`,`id_merk`);

--
-- Indexes for table `tbl_chatting`
--
ALTER TABLE `tbl_chatting`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_pegawai` (`id_pegawai`,`id_pelanggan`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_merk`
--
ALTER TABLE `tbl_merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_barang` (`id_pelanggan`);

--
-- Indexes for table `tbl_pemesanandetail`
--
ALTER TABLE `tbl_pemesanandetail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`,`id_pelanggan`),
  ADD KEY `id_pegawai_2` (`id_pegawai`,`id_pelanggan`);

--
-- Indexes for table `tbl_transaksidetail`
--
ALTER TABLE `tbl_transaksidetail`
  ADD PRIMARY KEY (`id_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_chatting`
--
ALTER TABLE `tbl_chatting`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pemesanandetail`
--
ALTER TABLE `tbl_pemesanandetail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_transaksidetail`
--
ALTER TABLE `tbl_transaksidetail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
