-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2022 at 11:42 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tujuan` bigint(20) UNSIGNED NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read` tinyint(1) NOT NULL,
  `sm_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `tujuan`, `catatan`, `sifat`, `tanggapan`, `sebar`, `read`, `sm_id`) VALUES
(1, 2, 'asd', 'Segera', 'Mohon segera ditindaklanjuti', '[\"UPT Perpustakaan\",\"UPT Perjuangan\"]', 1, 1),
(2, 2, 'Tolong', 'Segera', 'Laksanakan', '[\"UPT Perpustakaan\",\"UPT Keuangan\",\"UPT Keyakinan\"]', 1, 2),
(3, 2, 'HORE', 'Segera', 'YA eksekusi', '[\"UPT Perpustakaan\",\"UPT Perjuangan\"]', 1, 3),
(4, 3, 'Tolong', 'Segera', 'YA BOLEH', 'null', 1, 3),
(5, 2, 'sadasd', 'Segera', 'laksanakan', '[\"UPT Perpustakaan\",\"UPT Perjuangan\"]', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_jabatan`
--

CREATE TABLE `jenis_jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodeJabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_jabatan`
--

INSERT INTO `jenis_jabatan` (`id`, `kodeJabatan`) VALUES
(1, 'Admin'),
(2, 'Direktur'),
(3, 'Wadir Umum'),
(4, 'Wadir Keuangan'),
(5, 'Ktu'),
(6, 'Kaur'),
(7, 'Mahasiswa'),
(8, 'Dosen');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodeSurat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id`, `kodeSurat`, `keterangan`) VALUES
(1, 'SM', 'Surat Masuk'),
(2, 'SM', 'Surat Maling'),
(3, 'SP', 'Surat Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_11_15_044001_create_jenis_surats_table', 1),
(5, '2022_11_15_044831_create_surat_masuks_table', 1),
(6, '2022_11_15_044944_create_surat_keluars_table', 1),
(7, '2022_11_26_030644_create_jenis_jabatans_table', 1),
(8, '2022_11_27_000000_create_users_table', 1),
(9, '2022_11_27_080533_create_disposisis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noSkeluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglKeluar` date NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci,
  `file` text COLLATE utf8mb4_unicode_ci,
  `jenisSurat_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `noSkeluar`, `tglKeluar`, `asal`, `tujuan`, `filename`, `file`, `jenisSurat_id`) VALUES
(2, '214x', '2022-11-30', 'Dari Sini', 'Tunjungan', NULL, NULL, 1),
(3, '214x', '2022-11-30', 'Direktur', 'PT PERTAMINA', '4124V_5521_XX.pdf', 'file/1669789872-4124V_5521_XX.pdf', 1),
(4, '214x', '2022-11-30', 'Budi', 'PT sembarang', 'document_3.pdf', 'file/1669791742-document_3.pdf', 3),
(5, '22/67/xx', '2022-12-06', 'Bagian Keuangan', 'Alan Tri Arbani Hidayat', NULL, NULL, 3),
(6, '66/976/XIV', '2022-12-06', 'Administrasi', 'yanuar', 'Agile.pdf', 'file/1670283445-Agile.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noSmasuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglMasuk` date NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci,
  `file` text COLLATE utf8mb4_unicode_ci,
  `ringkasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `done` tinyint(1) DEFAULT NULL,
  `jenisSurat_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `noSmasuk`, `tglMasuk`, `pengirim`, `filename`, `file`, `ringkasan`, `done`, `jenisSurat_id`) VALUES
(1, '4124V/5521/XX', '2022-11-30', 'Ahmad Susanto', 'jurnal_12879.pdf', 'file/1669786480-jurnal_12879.pdf', NULL, 1, 1),
(2, '22/XX/421', '2022-11-30', 'PT PERTAMINA', '5519-4787-1-SM.pdf', 'file/1669789666-5519-4787-1-SM.pdf', NULL, 1, 1),
(3, '22/XX/422', '2022-11-30', 'CV Harum', '1669302261-UAS OOP 2022.pdf', 'file/1669790588-1669302261-UAS OOP 2022.pdf', NULL, 1, 1),
(4, '1223', '2022-11-30', 'PT sembarang', '1669364140-Kelompok 5_Manajemen Surat.pdf', 'file/1669791456-1669364140-Kelompok 5_Manajemen Surat.pdf', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisJabatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `jenisJabatan_id`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@it.admin.pens.ac.id', 1, '$2y$10$dvyAhKLlI1Bx3upUJ5mv.ew3wCs5LpHb6S/zr3Ji/H5WccSHjPFlS', 0, NULL, '2022-11-29 22:12:30', '2022-11-29 22:12:30'),
(2, 'ktu', 'ktu@gmail.com', 5, '$2y$10$u6FZukrlczRgOyWIk1cUPepAZXqVW1I0NUjCgn5Y.t3rryEBkS0jG', 3, NULL, '2022-11-29 22:13:45', '2022-11-29 22:13:45'),
(3, 'kaur', 'kaur@gmail.com', 6, '$2y$10$df/D1P5h/h2k0NrXkRp3L.eYnLS53AjmSKEJAhXpK7AhYzo6c8eBC', 4, NULL, '2022-11-29 22:33:50', '2022-11-29 22:33:50'),
(4, 'direktur', 'direktur@gmail.com', 2, '$2y$10$uZMqBXYHxlUgg092hU5buuqTEZRZTPtHfk/NitRrb.rMMvtbo4Mxe', 1, NULL, '2022-11-29 22:35:40', '2022-11-29 22:35:40'),
(5, 'Supratman', 'wadirk@gmail.com', 4, '$2y$10$LDA.d5M3qdI1RAmECpxYuegKDpQVtMIrgW9BbomqTywpN8JfqSGMm', 2, NULL, '2022-11-29 23:42:00', '2022-11-29 23:42:00'),
(6, 'wadiru', 'wadir@gmail.com', 3, '$2y$10$biUF9eH91JBsnZgK.EbLoOU29cuyXkNMYqo2KXqG84O96BRoedxVu', 2, NULL, '2022-11-29 23:46:08', '2022-11-29 23:46:08'),
(7, 'Hartono', 'direktur1@gmail.com', 2, '$2y$10$NpbAOa95WkLfE32d2Wcdre2vIZ9/s8t4N8KYEpNPwPUJf3LJhFLiK', 1, NULL, '2022-11-29 23:55:41', '2022-11-29 23:55:41'),
(8, 'Alan Tri Arbani Hidayat', 'alan@gmail.com', 7, '$2y$10$ycU326RZ.f6k7c240aiQ4uyEAQGlGCxQ0I.oDc9HPFMn7K8OKd1si', 5, NULL, '2022-12-05 16:23:40', '2022-12-05 16:23:40'),
(9, 'bagus', 'bagus@gmail.com', 7, '$2y$10$08x6DoxUhETCItppq8IBneqgwo3b.G0.vo1kFGR9qjzHhyRwSUwPa', 5, NULL, '2022-12-05 16:24:01', '2022-12-05 16:24:01'),
(11, 'yanuar', 'yanuar@gmail.com', 8, '$2y$10$xnF1.DYQSHwEyAucR0X4QeFPZIMe6a3UADVrPJUit0n9FISPtV.uK', 6, NULL, '2022-12-05 16:36:35', '2022-12-05 16:36:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposisi_tujuan_foreign` (`tujuan`),
  ADD KEY `disposisi_sm_id_foreign` (`sm_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_jabatan`
--
ALTER TABLE `jenis_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_keluar_jenissurat_id_foreign` (`jenisSurat_id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_masuk_jenissurat_id_foreign` (`jenisSurat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_jenisjabatan_id_foreign` (`jenisJabatan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_jabatan`
--
ALTER TABLE `jenis_jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_sm_id_foreign` FOREIGN KEY (`sm_id`) REFERENCES `surat_masuk` (`id`),
  ADD CONSTRAINT `disposisi_tujuan_foreign` FOREIGN KEY (`tujuan`) REFERENCES `jenis_jabatan` (`id`);

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_jenissurat_id_foreign` FOREIGN KEY (`jenisSurat_id`) REFERENCES `jenis_surat` (`id`);

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_jenissurat_id_foreign` FOREIGN KEY (`jenisSurat_id`) REFERENCES `jenis_surat` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_jenisjabatan_id_foreign` FOREIGN KEY (`jenisJabatan_id`) REFERENCES `jenis_jabatan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
