-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Waktu pembuatan: 28 Jun 2023 pada 06.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krs_ol2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama_dosen` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama_dosen`, `alamat`) VALUES
(1, '111111', 'Dosen 1', 'Alamat 1'),
(2, '222222', 'Dosen 2', 'tempuran'),
(3, '333333', 'Dosen 3', 'Magelang'),
(4, '444444', 'Dosen 4', 'Temanggung'),
(5, '555555', 'Dosen 5', 'Secang'),
(6, '666666', 'Dosen 6', 'Magelang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `semester` enum('ganjil','genap') DEFAULT NULL,
  `status` enum('approve','reject','waiting') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id_krs`, `id_mahasiswa`, `id_ta`, `semester`, `status`) VALUES
(18, 1, 3, 'ganjil', 'approve'),
(19, 3, 3, 'ganjil', 'approve'),
(20, 2, 3, 'ganjil', 'approve');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_krs`
--

CREATE TABLE `list_krs` (
  `id_list_krs` int(11) NOT NULL,
  `id_krs` int(11) DEFAULT NULL,
  `id_matkul` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `list_krs`
--

INSERT INTO `list_krs` (`id_list_krs`, `id_krs`, `id_matkul`) VALUES
(68, 18, 1),
(69, 18, 2),
(70, 18, 3),
(71, 18, 4),
(72, 19, 4),
(73, 19, 6),
(74, 20, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `npm` varchar(20) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `nama_mahasiswa` varchar(255) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_dosen`, `npm`, `semester`, `id_prodi`, `nama_mahasiswa`, `jk`, `alamat`) VALUES
(1, 1, '17.0504.0078', 1, 1, 'Fajar', 'L', 'Magelang'),
(2, 1, '17.0504.0080', 1, 2, 'Sendy', 'P', 'Purworejo'),
(3, 2, '17.0504.1111', 1, 1, 'Muchamad', 'L', 'Secang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_matkul` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `nama_matkul` varchar(255) DEFAULT NULL,
  `kelas` varchar(5) DEFAULT NULL,
  `kode_mk` varchar(10) DEFAULT NULL,
  `sks` varchar(5) DEFAULT NULL,
  `semester` enum('genap','ganjil') DEFAULT NULL,
  `hari` varchar(15) DEFAULT NULL,
  `dari_jam` varchar(10) DEFAULT NULL,
  `sampai_jam` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_matkul`, `id_dosen`, `id_prodi`, `nama_matkul`, `kelas`, `kode_mk`, `sks`, `semester`, `hari`, `dari_jam`, `sampai_jam`) VALUES
(1, 1, 1, 'Nama Mata kuliah 1', '205', 'KD001', '2', 'ganjil', 'Senin', '07:00', '09:00'),
(2, 2, 1, 'Nama Mata kuliah 2', '205', 'KD002', '3', 'ganjil', 'Senin', '09:00', '00:00'),
(3, 3, 1, 'Nama Mata kuliah 3', '206', 'KD003', '3', 'ganjil', 'Selasa', '08:00', '09:30'),
(4, 4, 1, 'Nama Mata kuliah 4', '206', 'KD004', '2', 'ganjil', 'Selasa', '10:00', '12:00'),
(6, 5, 1, 'Nama Mata kuliah 5', '207', 'KD005', '1', 'ganjil', 'Rabu', '09:00', '10:00'),
(7, 6, 1, 'Nama Mata kuliah 6', '207', 'KD006', '2', 'genap', 'Rabu', '10:00', '12:00'),
(8, 1, 1, 'Nama Mata kuliah 7', '207', 'KD007', '2', 'genap', 'Rabu', '13:00', '15:00'),
(9, 2, 1, 'Nama Mata kuliah 8', '208', 'KD008', '1', 'genap', 'Kamis', '08:00', '09:00'),
(10, 3, 2, 'Nama Mata kuliah 9', '207', 'KD009', '2', 'ganjil', 'Kamis', '09:30', '11:00'),
(11, 5, 1, 'Nama Mata kuliah 10', '207', 'KD010', '3', 'genap', 'Kamis', '13:00', '15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'D3 - Teknik Informatika'),
(2, 'S1 - Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_akademik`
--

CREATE TABLE `set_akademik` (
  `id_akademik` int(11) NOT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `semester` enum('ganjil','genap') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `set_akademik`
--

INSERT INTO `set_akademik` (`id_akademik`, `id_ta`, `semester`) VALUES
(1, 3, 'ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_ta` int(11) NOT NULL,
  `tahun` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_ta`, `tahun`) VALUES
(1, '2021/2022'),
(2, '2022/2023'),
(3, '2023/2024'),
(4, '2024/2025');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('mahasiswa','dosen','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_pengguna`, `username`, `password`, `role`) VALUES
(1, 1, 'admin', '12345678', 'admin'),
(2, 1, '111111', '12345678', 'dosen'),
(3, 1, '17.0504.0078', '12345678', 'mahasiswa'),
(4, 2, '17.0504.0080', '12345678', 'mahasiswa'),
(5, 2, '222222', '12345678', 'dosen'),
(6, 3, '17.0504.1111', '12345678', 'mahasiswa'),
(8, 3, '333333', '12345678', 'dosen'),
(9, 4, '444444', '12345678', 'dosen'),
(10, 5, '555555', '12345678', 'dosen'),
(11, 6, '666666', '12345678', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indeks untuk tabel `list_krs`
--
ALTER TABLE `list_krs`
  ADD PRIMARY KEY (`id_list_krs`),
  ADD KEY `id_krs` (`id_krs`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `set_akademik`
--
ALTER TABLE `set_akademik`
  ADD PRIMARY KEY (`id_akademik`),
  ADD KEY `id_ta` (`id_ta`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `list_krs`
--
ALTER TABLE `list_krs`
  MODIFY `id_list_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `set_akademik`
--
ALTER TABLE `set_akademik`
  MODIFY `id_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`id_ta`) REFERENCES `tahun_ajaran` (`id_ta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `list_krs`
--
ALTER TABLE `list_krs`
  ADD CONSTRAINT `list_krs_ibfk_1` FOREIGN KEY (`id_krs`) REFERENCES `krs` (`id_krs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_krs_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `mata_kuliah` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mata_kuliah_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `set_akademik`
--
ALTER TABLE `set_akademik`
  ADD CONSTRAINT `set_akademik_ibfk_1` FOREIGN KEY (`id_ta`) REFERENCES `tahun_ajaran` (`id_ta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
