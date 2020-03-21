-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2020 pada 09.48
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `username`, `alamat`, `gender`, `no_telepon`, `no_ktp`, `password`, `role_id`) VALUES
(2, 'Kamila', 'Kamila', 'benhil', 'perempun', '089765492492', '74297479784618', 'aa9c50c13256d0231d17eb21bc071d0e', 0),
(3, 'Nabila', 'nabila', 'bintaro', 'Laki-laki', '08965432109', '682648174816846', 'nabila123', 0),
(6, 'Vera', 'Vera', 'jl hj juhri', 'Perempuan', '08654807528', '87186389871837891', '79b013932a9a7efa4f9e7ee201b96aa7', 1),
(7, 'normaita', 'normaita', 'Jalan Perintis V Komplek Pepabri Kunciran Tangerang', 'perempun', '085899989260', '5689642317078', '99dce283f43913d06db82d8e8110d628', 2),
(8, 'bona', 'bona123', 'benhil', 'laki-laki', '081294485205', '123456789', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_driver`
--

CREATE TABLE `data_driver` (
  `id_supir` int(20) NOT NULL,
  `nama_supir` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` varchar(255) DEFAULT NULL,
  `no_ktp` int(50) DEFAULT NULL,
  `no_hp` int(13) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status_supir` int(1) DEFAULT NULL,
  `status_job` varchar(10) DEFAULT NULL,
  `jk` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_driver`
--

INSERT INTO `data_driver` (`id_supir`, `nama_supir`, `alamat`, `tempat_lahir`, `tgl_lahir`, `no_ktp`, `no_hp`, `email`, `status_supir`, `status_job`, `jk`) VALUES
(0, 'juni', 'benhil', 'jakarta', '2020-03-20', 0, 0, 'dafdaf', NULL, 'ready', 0),
(616136863, 'juni', 'benhil', 'jakarta', '2020-03-20', 0, 0, 'dafdaf', NULL, NULL, 0),
(1300554928, 'juni', 'benhil', 'jakarta', '2020-03-20', 0, 0, 'dafdaf', NULL, NULL, 0),
(1721257153, 'juni', 'benhil', 'jakarta', '2020-03-20', 0, 0, 'dafdaf', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `kode_type` varchar(120) NOT NULL,
  `merk` varchar(120) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `status` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `kode_type`, `merk`, `no_plat`, `warna`, `tahun`, `status`, `gambar`) VALUES
(1, 'ABC', 'Xenia', 'B 1356 NOH', 'Hitam', '2015', '1', 'xenia1.jpeg'),
(3, 'ABC', 'Avanza', 'B 6759 UHP', 'Silver', '2014', '1', 'avanza1.jpg'),
(6, 'GHI', 'APV', 'B 678 XCT', 'hitam', '2014', '1', 'apv.jpg'),
(7, 'DEF', 'Alphard', 'B 790 TYI', 'Silver', '2016', '0', 'alphardbiasa1.jpg'),
(9, 'JKL', 'Brio', 'B 654 UIK', 'Merah', '2018', '1', 'brio.jpg'),
(10, 'DEF', 'Calya', 'B 678 OPH', 'Putih', '2018', '1', 'calya.jpg'),
(11, 'GHI', 'Ertiga', 'B 670 YUO', 'Hitam', '2016', '1', 'ertiga.jpg'),
(12, 'DEF', 'Innova Reborn', 'B 436 LAR', 'Abu-abu', '2019', '1', 'innovareborn.jpg'),
(13, 'MNO', 'X-Pander', 'B 653 BYR', 'Abu-abu', '2018', '1', 'xpander1.jpg'),
(14, 'DEF', 'Yaris', 'B 106 WVO ', 'Putih', '2018', '1', 'yaris.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rental`
--

CREATE TABLE `rental` (
  `id_rental` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal_rental` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_rental` varchar(50) NOT NULL,
  `status_pengembalian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_rental` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tanggal_rental` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_pengembalian` varchar(50) NOT NULL,
  `status_rental` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `kode_type` varchar(10) NOT NULL,
  `nama_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `type`
--

INSERT INTO `type` (`id_type`, `kode_type`, `nama_type`) VALUES
(3, 'DEF', 'Toyota'),
(4, 'GHI', 'Suzuki'),
(5, 'JKL', 'Honda'),
(6, 'MNO', 'Mitsubishi'),
(7, 'ABC', 'Daihatsu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `data_driver`
--
ALTER TABLE `data_driver`
  ADD PRIMARY KEY (`id_supir`),
  ADD KEY `id_supir` (`id_supir`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indeks untuk tabel `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `rental`
--
ALTER TABLE `rental`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
