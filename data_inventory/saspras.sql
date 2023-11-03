-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 04:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saspras`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` varchar(191) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `jenis_barang` varchar(191) NOT NULL,
  `status_barang` varchar(191) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `nama_barang`, `jenis_barang`, `status_barang`, `jumlah_barang`, `harga_beli`, `tanggal_beli`, `created_at`, `updated_at`) VALUES
(1, 'l123', 'laptop', 'sarana', 'bagus', 5, 5000000, '2023-10-01', NULL, NULL),
(2, 'pc012', 'Komputer desktop ', 'sarana', 'servis', 36, 4500000, '2023-08-01', NULL, NULL),
(3, 'k111', 'kipas angin stand', 'sarana', 'rusak', 25, 1500000, '2022-10-04', NULL, NULL),
(4, 'tv012', 'televisi', 'sarana', 'bagus', 3, 2300000, '2023-09-20', NULL, NULL),
(5, 'lcd01', 'lcd proyektor', 'sarana', 'bagus', 5, 7000000, '2023-08-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan1`
--

CREATE TABLE `karyawan1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_karyawan` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `jns_kelamin` varchar(191) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `no_hp` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan1`
--

INSERT INTO `karyawan1` (`id`, `id_karyawan`, `nama`, `jns_kelamin`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, '1234', 'juli mohamad', 'laki-laki', 'depok timur', '081219523949', NULL, NULL),
(2, '1235', 'ircham ali', 'laki-laki', 'kebon kosong jakarta pusat', '08569999222', NULL, NULL),
(3, '1236', 'zulfahrizal', 'laki-laki', 'citayam - bogor', '085677778888', NULL, NULL),
(4, '1237', 'yanti', 'perempuan', 'kramat jati - jakarta ', '081233338888', NULL, NULL),
(5, '1238', 'rimay', 'perempuan', 'kemayoran -jakpus', '085966661111', NULL, NULL),
(6, 'g12', 'gunadi', 'L', 'bogor', '089765', '2023-10-24 05:31:01', '2023-10-24 05:31:01'),
(7, 'D78', 'Dani', 'L', 'jkt', '08888989', '2023-10-24 05:32:44', '2023-10-24 05:32:44'),
(8, 'R56', 'riki', 'L', 'lenteng', '089876543', '2023-10-24 05:40:16', '2023-10-24 05:40:16'),
(9, 'd231', 'dewi sri', 'P', 'jakpus', '085643212', '2023-10-24 06:27:06', '2023-10-24 06:27:06'),
(10, 's1', 'supriyanti', 'P', 'jakarta', '0876778888', '2023-10-24 19:13:29', '2023-10-24 19:13:29'),
(11, 'g12', 'gina', 'P', 'depok', '089765', '2023-10-24 19:18:41', '2023-10-24 19:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_23_043149_karyawan1', 1),
(6, '2023_10_23_043427_create_karyawan_table', 1),
(7, '2023_10_23_053046_create_karyawan1_table', 1),
(8, '2023_10_23_054214_create_karyawan2_table', 1),
(9, '2023_10_23_054420_create_barang_table', 2),
(10, '2023_10_23_054648_create_transaksi_table', 2),
(11, '2023_10_23_055822_create_karyawan1_table', 3),
(12, '2023_10_24_043732_create_statusbarang_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statusbarang`
--

CREATE TABLE `statusbarang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_status` varchar(191) NOT NULL,
  `id_barang` varchar(191) NOT NULL,
  `jml_bagus` int(191) NOT NULL,
  `jml_rusak_ringan` int(11) NOT NULL,
  `jml_rusak_berat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statusbarang`
--

INSERT INTO `statusbarang` (`id`, `id_status`, `id_barang`, `jml_bagus`, `jml_rusak_ringan`, `jml_rusak_berat`, `created_at`, `updated_at`) VALUES
(1, 's123', 'l123', 3, 1, 1, NULL, NULL),
(2, 's13', 'pc012', 34, 1, 1, NULL, NULL),
(3, 's14', 'k111', 20, 2, 3, NULL, NULL),
(4, 's15', 'tv012', 3, 0, 0, NULL, NULL),
(5, 's16', 'lcd01', 4, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` varchar(191) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jenis_transaksi` varchar(191) NOT NULL,
  `id_barang` varchar(191) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_karyawan` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_transaksi`, `tanggal_transaksi`, `jenis_transaksi`, `id_barang`, `jumlah`, `id_karyawan`, `created_at`, `updated_at`) VALUES
(1, 'tr101', '2023-10-01', 'beli baru', 'lcd12', 2, '1234', NULL, NULL),
(2, 'tr112', '2023-10-02', 'pinjam', 'l1234', 3, '1235', NULL, NULL),
(3, 'tr113', '2023-10-05', 'Beli baru', 'k111', 5, '1237', NULL, NULL),
(4, 'tr115', '2023-10-10', 'seervis', 'pc12', 4, '1238', NULL, NULL),
(5, 'tr14', '2023-10-15', 'beli baru', 'tv012', 1, '1236', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `karyawan1`
--
ALTER TABLE `karyawan1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `statusbarang`
--
ALTER TABLE `statusbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan1`
--
ALTER TABLE `karyawan1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statusbarang`
--
ALTER TABLE `statusbarang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
