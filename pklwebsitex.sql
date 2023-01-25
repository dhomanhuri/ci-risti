-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 01:54 PM
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
-- Database: `pklwebsitex`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  `nomortelpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `user_id`, `nip`, `nama`, `nomortelpon`) VALUES
(4, 17, '198902102019031020', 'Agung Nugroho Pramudhita, S.T., M.T.', '081334699967'),
(5, 18, '198107052005011002', 'Ahmadi Yuli Ananta, S.T., M.M.', '08113037077'),
(6, 19, '198901232019032016', 'Annisa Puspa Kirana, S.Kom, M.Kom.', '082142919990'),
(7, 20, '199412172019032020', 'Candra Bella Vista, S.Kom, M.T', '085655823859'),
(8, 21, '198311092014042001', 'Dhebys Suryani Hormansyah, S.Kom., M.T.', '085815330955'),
(9, 22, '198108102005012002', 'Ariadi Retno Tri Hayati Ririd, S.Kom., M.Kom.', '081615274203'),
(10, 23, '195912081985031004', 'Ekojono, S.T., M.Kom.', '0816786553'),
(11, 24, '198807112015042005', 'Eka Larasati Amalia, S.ST., M.T.', '081259668854'),
(12, 25, '198406102008121004', 'Imam Fahrur Rozi, S.T., M.T.', '085233139738'),
(13, 26, '199111282019031013', 'Muhammad Afif Hendrawan, S.Kom., M.T.', '081333501063'),
(14, 37, '197111101999031002', 'Rudy Ariyanto, S.T., M.Cs.', '08123399764');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nim` int(20) NOT NULL,
  `nama` text NOT NULL,
  `nomormhs` varchar(15) NOT NULL,
  `nomorortu` varchar(15) NOT NULL,
  `kodeprodi` varchar(20) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `user_id`, `nim`, `nama`, `nomormhs`, `nomorortu`, `kodeprodi`, `kelas`) VALUES
(15, 34, 1941720064, 'Claudyo Panambean', '0890667892', '0890667893', 'TI', 'TI4H'),
(16, 35, 1841720015, 'Adristi Iftitah', '081233490872', '08233490873', 'TI', 'TI4H'),
(17, 36, 1841720086, 'Marissa Nur', '081233490872', '08263647774', 'TI', 'TI4H'),
(18, 38, 1841720016, 'Adristi Yuniar', '081233490873', '081334766726', 'TI', 'TI4H'),
(19, 39, 1841720079, 'farradila', '081233457689', '081233457680', 'D4TI', 'TI4A'),
(20, 40, 1841710555, 'Andini Novidayanti', '08145689760', '08145689761', 'TI', 'TI4H');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_admin`
--

CREATE TABLE `pengajuan_admin` (
  `id_pengajuan` int(11) NOT NULL,
  `nim_pengaju` varchar(100) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `file_pengajuan` text NOT NULL,
  `file_mou` text NOT NULL,
  `file_spk` text NOT NULL,
  `file_balasan_admin` text NOT NULL,
  `tanggal_balasan_admin` date DEFAULT NULL,
  `file_balasan_perusahaan` text NOT NULL,
  `id_perusahaan` int(20) NOT NULL,
  `id_pembimbing` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status_penerimaan` varchar(255) NOT NULL,
  `file_pengesahan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_admin`
--

INSERT INTO `pengajuan_admin` (`id_pengajuan`, `nim_pengaju`, `tanggal_mulai`, `tanggal_akhir`, `file_pengajuan`, `file_mou`, `file_spk`, `file_balasan_admin`, `tanggal_balasan_admin`, `file_balasan_perusahaan`, `id_perusahaan`, `id_pembimbing`, `created_at`, `status_penerimaan`, `file_pengesahan`) VALUES
(25, '1941720064', '2022-08-01', '2023-06-01', 'e9ec23a68906ee72c75cf8b6d4bf42b2.pdf', '21b05d7133a72f119d72430e1fd6f522.pdf', '5cc93f96cde42da59e9aae31f3e3f933.pdf', 'SURAT_PENGANTAR_PKL_1941720064_20220726150742.pdf', NULL, '42ef324895577375c8623e5ad7e9a1ae.pdf', 30, 8, '2022-07-18 09:07:35', 'upload_pengesahan', 'LEMBAR_PENGESAHAN_PKL_1941720064_20220726150717.pdf'),
(26, '1841720015', '2022-07-19', '2022-10-31', '1416f95c68b5d92550afc840db25f8dd.pdf', 'e273e473c3c642bbdd025f8211bc6b51.pdf', 'b5d677fc4da2528d07308f0a0038b1d2.pdf', '611a914c4498e4e6250086ea95427de9.pdf', NULL, '2699cd5f1514224b110e31cf62db563e.pdf', 6, 12, '2022-07-18 19:07:41', 'upload_balasan_perusahaan', 'b317c42e56f42e805b44594981d880a7.pdf'),
(27, '1841720016', '2022-08-01', '2023-02-01', '07aa64bf3b872571afe5007bb1b7d186.pdf', 'c6383387b189e57cfceaecd49f78adaf.pdf', 'f48a222adbf4be6bd2f23fda537e308a.pdf', '0adf49163583c265ad46643892bec0fc.pdf', NULL, '3008cb1ddc2e55a391bc4e6c3401696c.pdf', 31, NULL, '2022-07-20 07:07:32', 'tidak_diterima_perusahaan', '8dfa8b2e08549943960e095d72cb5491.pdf'),
(28, '1841720016', '2022-07-21', '2022-12-31', 'e65912aa1aa2b864b49d7d84cf85b4bb.pdf', '656705e9ad8ab6a776f2ce69cdf8ad6f.pdf', '9d3c91f8c8edbbc6eff6daabe5961269.pdf', 'SURAT_PENGANTAR_PKL__20220723080735.pdf', NULL, '1841720016_BALASAN_PERUSAHAAN_MHS_20220723080741.pdf', 4, 9, '2022-07-21 06:07:45', 'upload_laporan_pkl', 'LEMBAR_PENGESAHAN_PKL_1841720016_20220723080755.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_admin_anggota`
--

CREATE TABLE `pengajuan_admin_anggota` (
  `id_pengajuan_admin_anggota` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `nim_anggota` varchar(100) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `prodi_anggota` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_admin_anggota`
--

INSERT INTO `pengajuan_admin_anggota` (`id_pengajuan_admin_anggota`, `id_pengajuan`, `nim_anggota`, `nama_anggota`, `prodi_anggota`, `created_at`) VALUES
(28, 25, '1941720064', 'Claudyo Panambean', 'TI', '2022-07-18 09:07:35'),
(29, 26, '1841720086', 'Marissa Nur', 'TI', '2022-07-18 19:07:41'),
(30, 26, '1841720015', 'Adristi Iftitah', 'TI', '2022-07-18 19:07:41'),
(31, 27, '1841720016', 'Adristi Yuniar', 'TI', '2022-07-20 07:07:32'),
(32, 28, '1841720016', 'Adristi Yuniar', 'TI', '2022-07-21 06:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pembimbing`
--

CREATE TABLE `pengajuan_pembimbing` (
  `id_pengajuan_pembimbing` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `status_laporan_pkl` varchar(50) NOT NULL,
  `tanggal_acc_laporan_pkl` date NOT NULL,
  `file_laporan_pkl` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_pembimbing`
--

INSERT INTO `pengajuan_pembimbing` (`id_pengajuan_pembimbing`, `id_pengajuan`, `id_dosen`, `status_laporan_pkl`, `tanggal_acc_laporan_pkl`, `file_laporan_pkl`) VALUES
(2, 25, 8, '1', '2022-07-18', 'd8bd3b49e7f5098c6ae16363f111edf8.pdf'),
(3, 26, 12, '1', '2022-07-19', '24703463eef82777da35ce588438bf04.pdf'),
(4, 28, 9, '0', '2022-07-23', '1841720016_LAPORAN_PKL_20220723080702.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `penanggung_jawab` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama`, `alamat`, `telpon`, `qty`, `penanggung_jawab`) VALUES
(3, 'PT Bank Negara Indonesia (Persero) Tbk (BNI)', 'Gedung Grha BNI, Jl. Jend. Sudirman No.10, RT.10/RW.11, Karet Tengsin, Tanah Abang, Central Jakarta City, Jakarta 10220', '0897162538', 10, 'Bapak Wahyudi'),
(4, 'PT Zona Edukasi Nusantara (Zenius)', 'Graha Aktiva, Ground Floor\r\nJalan HR Rasuna Said Kav. 03\r\nEast Kuningan, Setiabudi\r\nSouth Jakarta, 12950\r\nIndonesia', '0812-8762-9578', 200, 'Pihak Zenius'),
(5, 'PT Traveloka Indonesia (Traveloka)', 'Traveloka Campus (d/h Green Office Park 1) North Tower, Jl Grand Boulevard, BSD Green Office Park, Kel. Sampora, Kec. Cisauk,  Kab.Tangerang, Prov. Banten', '0812-8360-8515', 1001, 'Pihak Traveloka tertunjuk'),
(6, 'PT Cloud Hosting Indonesia (IDCloudHost)', 'Sentral Senayan II, Jl. Asia Afrika No.8, RT.1/RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', '(021) 40000995   ', 50, 'Pihak IDCloudHost Tertunjuk'),
(30, 'PT. Aplikanusa Lintasarta', '005, Jl. Raya Darmo No.161, RW.04, Darmo, Kec. Wonokromo, Kota SBY, Jawa Timur 60241', '0897162538', 3, 'bapak panambean'),
(31, 'PT Telkom Indonesia (Persero) Tbk', 'Jl. Japati No.1, Sadang Serang, Coblong', '(022) 4521108', 10, 'Pihak Telkom Indonesia Tertunj');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL COMMENT '''admin'',''mahasiswa'',''dosen'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`, `level`) VALUES
(2, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(17, 'agung.pramudhita@polinema.ac.id', '21232f297a57a5a743894a0e4a801fc3', 'dosen'),
(18, 'ahmadi@polinema.ac.id', 'a5b503a17701e93c3abe8087d58d6129', 'dosen'),
(19, 'puspakirana@polinema.ac.id', '12c2ae1a24ae1d7eeeb71f6bd6251d41', 'dosen'),
(20, 'bellavista@polinema.ac.id', 'e5029deefb16bb4588a6c3c773d3c68e', 'dosen'),
(21, 'dhebys.suryani@polinema.ac.id', 'b971eb0261a713b1a028374f8dcb092f', 'dosen'),
(22, 'ariadi.retno@polinema.ac.id', 'b08d94f317b9500d6be0d1f2c76a9538', 'dosen'),
(23, 'ekojono@polinema.ac.id', 'ed7857bd0e586b993a72a1e5750fc2b7', 'dosen'),
(24, 'eka.larasati@polinema.ac.id', '79ee82b17dfb837b1be94a6827fa395a', 'dosen'),
(25, 'imam.rozi@polinema.ac.id', 'eaccb8ea6090a40a98aa28c071810371', 'dosen'),
(26, 'afif@polinema.ac.id', 'b56776aa98086825550ff0c3fe260907', 'dosen'),
(34, 'claudyo@gamail.com', 'da74a7ae60c5e14b8148fc83f2cbd8ae', 'mahasiswa'),
(35, 'adristi@gmail.com', '202cb962ac59075b964b07152d234b70', 'mahasiswa'),
(36, 'marissa@gmail.com', '202cb962ac59075b964b07152d234b70', 'mahasiswa'),
(37, 'rudy@polinema.ac.id', 'cfce9735de7c3873a55331a4e74b70fc', 'dosen'),
(38, 'adristiy@gmail.com', '63ebab5bb02a8b28c9e900d56655468b', 'mahasiswa'),
(39, 'farradila@gmail.com', 'dd000a7b3d388e5cfa4f1d54da838cf6', 'mahasiswa'),
(40, 'andini@gmail.com', 'b3e0d57ba78cbdc6fcba9c7a467e8fad', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pengajuan_admin`
--
ALTER TABLE `pengajuan_admin`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `pengajuan_admin_anggota`
--
ALTER TABLE `pengajuan_admin_anggota`
  ADD PRIMARY KEY (`id_pengajuan_admin_anggota`);

--
-- Indexes for table `pengajuan_pembimbing`
--
ALTER TABLE `pengajuan_pembimbing`
  ADD PRIMARY KEY (`id_pengajuan_pembimbing`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengajuan_admin`
--
ALTER TABLE `pengajuan_admin`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pengajuan_admin_anggota`
--
ALTER TABLE `pengajuan_admin_anggota`
  MODIFY `id_pengajuan_admin_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pengajuan_pembimbing`
--
ALTER TABLE `pengajuan_pembimbing`
  MODIFY `id_pengajuan_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
