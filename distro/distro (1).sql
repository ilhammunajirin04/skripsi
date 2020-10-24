-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 05:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$KKkBGwn5HN36JO7idVtneOOlugumXV56OmSyc5SnoP5O/JdAYJWuu');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(12) NOT NULL,
  `kode_barang` varchar(128) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `kode_barang`, `nama_barang`, `harga`, `stok`, `gambar`, `aktif`) VALUES
(214, 5, 'Baju-01', 'Baju 1', 50000, 12, 'WhatsApp Image 2020-07-22 at 14.39.44.jpeg', 1),
(215, 5, 'Baju-02', 'Baju 2', 30000, 10, 'WhatsApp Image 2020-07-22 at 14.39.43 (1).jpeg', 1),
(216, 5, 'Baju-03', 'Baju 3', 25000, 10, 'WhatsApp Image 2020-07-22 at 14.39.43.jpeg', 1),
(217, 5, 'Baju-04', 'Baju 4', 50000, 6, 'WhatsApp Image 2020-07-22 at 14.39.42 (2).jpeg', 1),
(224, 5, 'Baju-05', 'Baju 5', 55000, 12, 'WhatsApp Image 2020-07-22 at 14.39.42 (1).jpeg', 1),
(225, 5, 'Baju-06', 'Baju 6', 45000, 10, 'WhatsApp Image 2020-07-22 at 14.39.42.jpeg', 1),
(226, 5, 'Baju-07', 'Baju 7', 60000, 12, 'WhatsApp Image 2020-07-22 at 14.39.41 (1).jpeg', 1),
(228, 5, 'Baju-08', 'Baju 8', 67000, 21, 'WhatsApp Image 2020-07-22 at 14.39.41.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_pesanan`, `id_barang`, `jumlah`, `harga`) VALUES
(3, 228, 1, 1212),
(3, 225, 1, 16000),
(4, 226, 1, 121),
(4, 228, 1, 1212),
(5, 225, 1, 16000),
(5, 229, 1, 2424),
(6, 213, 1, 12000),
(7, 216, 1, 2000),
(7, 217, 1, 5000),
(8, 214, 1, 5000),
(8, 229, 1, 2424),
(9, 214, 1, 5000),
(9, 216, 5, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `kategori` varchar(150) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `aktif`) VALUES
(5, 'Baju', 1);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfimasi` int(11) NOT NULL,
  `id_penjualan` int(12) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `rekening` varchar(50) NOT NULL,
  `jumlah_uang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfimasi`, `id_penjualan`, `nama`, `rekening`, `jumlah_uang`) VALUES
(1, 303, 'Ilham Bahari', '0808-0909-8989', '31000'),
(2, 304, 'fitri', '1212121212', '60000'),
(3, 304, 'Mahmud', '8989898989', '60000'),
(4, 304, 'bagus', '090909090', '60000'),
(5, 306, 'ilham', '123123123', '104242'),
(6, 307, 'dika', '111111111', '200000'),
(7, 308, 'asasas', '1111', '122121'),
(8, 310, 'Ilham', '123123123', '13212'),
(9, 311, 'iham', '9999999', '28454');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `tanggal_jual` varchar(128) NOT NULL,
  `jam` varchar(128) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `email`, `tanggal_jual`, `jam`, `status`) VALUES
(303, 'ilham@gmail.com', '2020-05-10', '17:30:06', 3),
(304, 'ilham@gmail.com', '2020-05-10', '22:47:12', 3),
(306, 'ilham@gmail.com', '2020-05-16', '20:23:00', 3),
(307, 'ilham@gmail.com', '2020-06-13', '00:50:43', 2),
(308, 'rivan@gmail.com', '2020-06-15', '18:26:17', 3),
(310, 'ilham@gmail.com', '2020-07-01', '00:07:24', 3),
(311, 'ilham@gmail.com', '2020-07-01', '15:27:43', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `no_wa` int(15) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama`, `no_wa`, `alamat`, `tanggal`, `status`) VALUES
(3, 'ilham', 2147483647, 'asasas', '2020-07-19 12:28:03', 1),
(4, 'ilham', 897878787, 'asasasdsd', '2020-07-19 13:02:24', 0),
(5, 'qwqwq', 12121, 'sddff', '2020-07-19 13:15:20', 0),
(7, 'Bahari', 2147483647, 'asasa', '2020-07-20 20:22:29', 0),
(8, 'ilham', 2147483647, 'baleendah', '2020-07-21 10:02:44', 1),
(9, 'Roy', 898989898, 'jhjhjh', '2020-07-21 15:10:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama`, `password`) VALUES
(1, 'ilham@gmail.com', 'Ilham', '$2y$10$929FrqD4aMkYfrT1A8YW7.wdBS7aSTHGEoW./ST2TqFvAPQOuN2Ia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfimasi`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfimasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
