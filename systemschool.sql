-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 01:19 AM
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
-- Database: `systemschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama_guru`, `mata_pelajaran`, `jenis_kelamin`, `alamat`, `no_telepon`, `created_at`) VALUES
(1, '198501152010012001', 'Sri Wahyuni, S.Pd', 'Matematika', 'Laki-laki', 'Jl. Mawar No. 15, Jakarta', '081234567890', '2025-01-28 23:19:46'),
(2, '198607232011011002', 'Ahmad Fauzi, M.Pd', 'Bahasa Inggris', 'Laki-laki', 'Jl. Melati No. 7, Bandung', '082345678901', '2025-01-28 23:19:46'),
(3, '199003142012012003', 'Dewi Sartika, S.Pd', 'Biologi', 'Perempuan', 'Jl. Anggrek No. 23, Surabaya', '083456789012', '2025-01-28 23:19:46'),
(4, '198909122011011004', 'Budi Santoso, S.Pd', 'Fisika', 'Laki-laki', 'Jl. Dahlia No. 45, Semarang', '084567890123', '2025-01-28 23:19:46'),
(5, '199105262013012005', 'Rina Fitriani, S.Pd', 'Kimia', 'Perempuan', 'Jl. Kenanga No. 32, Yogyakarta', '085678901234', '2025-01-28 23:19:46'),
(8, '5456456346436', 'gdsg', 'gfgs', 'Laki-laki', 'gsdgsd', '082124864545645', '2025-01-29 23:03:29'),
(9, '5456456346436', 'gdsg', 'gfgs', 'Laki-laki', 'gsdgsd', '082124864545645', '2025-01-29 23:03:32'),
(10, '5456456346436', 'gdsg', 'MTK', 'Laki-laki', 'hfdh', '082124864545645', '2025-01-29 23:03:53'),
(11, '5456456346436', 'gdsg', 'MTK', 'Perempuan', 'uyrtu', '082124864545645', '2025-01-29 23:04:40'),
(12, '5456456346436', 'gdsg', 'MTK', 'Perempuan', 'uyrtu', '082124864545645', '2025-01-29 23:06:24'),
(13, '5456456346436', 'gdsg', 'MTK', 'Laki-laki', 'yrty', '082124864545645', '2025-01-29 23:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `ruangan` varchar(20) DEFAULT NULL,
  `mata_pelajaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_guru`, `hari`, `jam_mulai`, `jam_selesai`, `kelas`, `ruangan`, `mata_pelajaran`) VALUES
(1, 2, 'Selasa', '07:36:00', '08:35:00', '8A', 'A30', 'MTK');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `wali_kelas` varchar(100) NOT NULL,
  `tingkat` varchar(10) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `nama_kelas`, `wali_kelas`, `tingkat`, `kapasitas`, `tahun_ajaran`, `status`) VALUES
(2, 'K7B', 'Kelas 7B', 'Siti Aminah', '7', 32, '2023/2024', 'Aktif'),
(3, 'K8A', 'Kelas 8A', 'Ahmad Hidayat', '8', 30, '2023/2024', 'Aktif'),
(4, 'K8B', 'Kelas 8B', 'Dewi Kusuma', '8', 30, '2023/2024', 'Aktif'),
(5, 'K9A', 'Kelas 9A', 'Rudi Hermawan', '9', 35, '2023/2024', 'Aktif'),
(6, '46', 'Za', 'sad', '10', 646, '665', 'Aktif'),
(7, '46', 'Za', 'sad', '10', 646, '665', 'Aktif'),
(8, '46', 'Za', 'y', '12', 754, '665', 'Aktif'),
(9, '46', 'ryr', 'yry', '12', 74, '547', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id` int(11) NOT NULL,
  `kode_pelajaran` varchar(10) NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `jam_pelajaran` varchar(50) NOT NULL,
  `guru_pengajar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id`, `kode_pelajaran`, `nama_pelajaran`, `kelas`, `semester`, `jam_pelajaran`, `guru_pengajar`) VALUES
(1, 'MTK001', 'Matematika', 'X', 'Ganjil', '2x45 menit', 'Budi Santoso'),
(2, 'BIO001', 'Biologi', 'X', 'Ganjil', '2x45 menit', 'Siti Aminah'),
(3, 'FIS001', 'Fisika', 'X', 'Ganjil', '2x45 menit', 'Ahmad Dahlan'),
(4, 'KIM001', 'Kimia', 'X', 'Ganjil', '2x45 menit', 'Dewi Sartika');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_siswa`, `kelas`, `jenis_kelamin`, `alamat`) VALUES
(1, '2023001', 'Ahmad Rizki', 'XI IPA 1', 'Perempuan', 'Jl. Merdeka No. 123'),
(2, '2023002', 'Siti Nurhaliza', 'X IPS 2', 'Perempuan', 'Jl. Sudirman No. 45'),
(3, '2023003', 'Budi Santoso', 'XII IPA 3', 'Laki-laki', 'Jl. Gatot Subroto No. 67'),
(4, '2023004', 'Dewi Kartika', 'XI IPS 1', 'Perempuan', 'Jl. Ahmad Yani No. 89'),
(5, '2023005', 'Rudi Hermawan', 'X IPA 2', 'Laki-laki', 'Jl. Diponegoro No. 12'),
(7, '32423144', 'hanif', '8A', 'Perempuan', 'ytyt');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `last_active` datetime DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `subject`, `status`, `last_active`, `created_at`) VALUES
(1, 'John Doe', 'Mathematics', 'Active', '2025-01-28 15:16:29', '2025-01-28 08:16:29'),
(2, 'Jane Smith', 'Science', 'Active', '2025-01-28 15:16:29', '2025-01-28 08:16:29'),
(3, 'Robert Johnson', 'English', 'Inactive', '2025-01-27 15:16:29', '2025-01-28 08:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', 'admin123', '2025-01-28 08:16:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
