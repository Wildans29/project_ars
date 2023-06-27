-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2023 pada 06.32
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-ars`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` int(11) NOT NULL,
  `motor` varchar(255) NOT NULL,
  `gejala` text DEFAULT NULL,
  `tgl_konsultasi` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `motor`, `gejala`, `tgl_konsultasi`, `user_id`) VALUES
(35, 'mio', '1,6,7,15,16,17', '2023-06-17', 4),
(132, 'bb', 'G001,132', '2023-06-24', 4),
(133, 'lkdf', 'G001', '2023-06-24', 4),
(134, 'qwwq', NULL, '2023-06-24', 4),
(135, 'qwwq', NULL, '2023-06-24', 4),
(136, 'wqwq', '2', '2023-06-24', 4),
(137, 'sdqs', '137,1,2,3,4,5,6,7,8,9,10,11,12,14,15,16,17,18,19,20,21,22,23', '2023-06-24', 4),
(138, 'elfk', '1,2,3,4,5,6,7,8,9,10,11,12,14,15,16,17,18,19,20,21,22,23', '2023-06-24', 4),
(139, 'lk', '2', '2023-06-24', 4),
(140, ';jjjj', '1', '2023-06-24', 4),
(141, 'ojj', '141', '2023-06-25', 4),
(142, 'oj\'j\'', 'G001', '2023-06-25', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `kode_gejala` text NOT NULL,
  `pertanyaan` text NOT NULL,
  `is_first` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id`, `kode_gejala`, `pertanyaan`, `is_first`, `created_at`, `updated_at`) VALUES
(1, 'G001', 'Apakah lampu-lampu mati/redup?', 1, '2023-06-25 17:58:30', '2023-06-25 10:58:30'),
(2, 'G002', 'Apakah starter elektrik mati?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(3, 'G003', 'Apakah performa motor berkurang?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(4, 'G004', 'Apakah mesin motor terasa brebet/tidak langsam?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(5, 'G005', 'Apakah bensin terasa boros?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(6, 'G006', 'Apakah terjadi ledakan di mesin setelah tarikan rpm tinggi?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(7, 'G007', 'Apakah motor susah dihidupkan ketika kondisi mesin...', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(8, 'G008', 'Apakah keluar asap putih dari knalpot?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(9, 'G009', 'Apakah motor kurang bertenaga?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(10, 'G010', 'Apakah oli cepat habis/berkurang?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(11, 'G012', 'Apakah mesin cepat panas?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(12, 'G013', 'Apakah suara mesin berisik?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(14, 'G014', 'Apakah kompresi motor rendah/hilang?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(15, 'G015', 'Apakah oli mesin bocor/rembes?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(16, 'G016', 'Apakah keluar air radiator?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(17, 'G017', 'Apakah stang motor terasa berat?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(18, 'G018', 'Apakah stang tidak stabil?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(19, 'G019', 'Apakah shockbreaker terasa keras?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(20, 'G020', 'Apakah motor berjalan tidak stabil?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(21, 'G021', 'Apakah posisi rantai tidak sejajar?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(22, 'G022', 'Apakah bunyi aneh pada bagian roda?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07'),
(23, 'G023', 'Apakah keluar asap hitam dari knalpot?', 0, '2023-06-25 17:24:07', '2023-06-25 17:24:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'SPAREPART MOTOR MATIC', '2023-05-19 20:41:22', '2023-06-19 01:10:32'),
(2, 'SPAREPART MOTOR BEBEK', '2023-05-19 20:41:44', '2023-06-19 01:10:28'),
(3, 'SPAREPART MOTOR SPORT', '2023-05-19 20:41:55', '2023-05-19 20:41:55'),
(29, 'AKSESORIS', '2023-06-19 01:10:45', '2023-06-19 01:10:45'),
(30, 'PART UMUM', '2023-06-19 01:11:12', '2023-06-25 09:28:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerusakan`
--

CREATE TABLE `kerusakan` (
  `id` int(11) NOT NULL,
  `kode_kerusakan` text NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `kerusakan`
--

INSERT INTO `kerusakan` (`id`, `kode_kerusakan`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'K001', 'Aki mati/drop', '2023-06-25 18:01:01', '2023-06-25 18:01:01'),
(2, 'k002', 'Busi kotor/rusak', '2023-06-25 18:01:01', '2023-06-25 18:01:01'),
(3, 'k003', 'Karburator/injektor bermasalah', '2023-06-25 18:01:01', '2023-06-25 18:01:01'),
(4, 'k004', 'Ring piston bermasalah', '2023-06-25 18:01:01', '2023-06-25 18:01:01'),
(5, 'K005', 'Piston bermasalah', '2023-06-25 18:01:01', '2023-06-25 18:01:01'),
(6, 'K006', 'takaran oli rendah', '2023-06-25 18:01:01', '2023-06-25 18:01:01'),
(7, 'K007', 'klep bocor', '2023-06-25 18:01:01', '2023-06-25 18:01:01'),
(8, 'K008', 'packing mesin bocor', '2023-06-25 18:01:01', '2023-06-25 18:01:01'),
(9, 'K009', 'komstir bermasalah', '2023-06-25 18:01:01', '2023-06-25 18:01:01'),
(10, 'K010', 'seal shock bocor', '2023-06-25 18:01:01', '2023-06-25 18:01:01'),
(11, 'K011', 'seal shock bermasalah dan takaran oli shock tidak pas', '2023-06-25 18:01:01', '2023-06-25 18:01:01'),
(12, 'K012', 'bearing roda rusak', '2023-06-25 18:01:01', '2023-06-25 18:01:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_03_05_194740_tambah_kolom_baru_to_users_table', 1),
(7, '2021_03_05_195441_buat_kategori_table', 1),
(8, '2021_03_05_195949_buat_produk_table', 1),
(9, '2021_03_05_200515_buat_member_table', 1),
(10, '2021_03_05_200706_buat_supplier_table', 1),
(11, '2021_03_05_200841_buat_pembelian_table', 1),
(12, '2021_03_05_200845_buat_pembelian_detail_table', 1),
(13, '2021_03_05_200853_buat_penjualan_table', 1),
(14, '2021_03_05_200858_buat_penjualan_detail_table', 1),
(15, '2021_03_05_200904_buat_setting_table', 1),
(16, '2021_03_05_201756_buat_pengeluaran_table', 1),
(17, '2021_03_11_225128_create_sessions_table', 1),
(18, '2021_03_24_115009_tambah_foreign_key_to_produk_table', 1),
(26, '2023_05_25_160937_add_kode_booking_to_booking_table', 4),
(27, '2023_05_25_171523_create_booking_table', 5),
(29, '2021_03_24_131829_tambah_kode_produk_to_produk_table', 6),
(30, '2021_05_08_220315_tambah_diskon_to_setting_table', 6),
(31, '2021_05_09_124745_edit_id_member_to_penjualan_table', 6),
(35, '2023_05_28_141841_create_rules_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(10) UNSIGNED NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` tinyint(4) NOT NULL DEFAULT 0,
  `bayar` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_supplier`, `total_item`, `total_harga`, `diskon`, `bayar`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, '2023-06-13 10:11:20', '2023-06-13 10:11:20'),
(2, 1, 1, 60000, 0, 60000, '2023-06-13 10:29:33', '2023-06-13 10:29:45'),
(3, 1, 0, 0, 0, 0, '2023-06-19 19:56:05', '2023-06-19 19:56:05'),
(4, 3, 0, 0, 0, 0, '2023-06-20 07:23:02', '2023-06-20 07:23:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id_pembelian_detail` int(10) UNSIGNED NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id_pembelian_detail`, `id_pembelian`, `id_produk`, `harga_beli`, `jumlah`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 2, 8, 60000, 1, 60000, '2023-06-13 10:29:39', '2023-06-13 10:29:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(10) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `deskripsi`, `nominal`, `created_at`, `updated_at`) VALUES
(1, 'pembelian ban', 100000, '2023-06-12 06:23:01', '2023-06-12 06:23:01'),
(2, 'pembelian oli', 1200000, '2023-06-13 09:04:13', '2023-06-13 09:04:13'),
(3, 'pembelian', 1000000, '2023-06-13 09:28:50', '2023-06-20 00:45:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(10) UNSIGNED NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` tinyint(4) NOT NULL DEFAULT 0,
  `bayar` int(11) NOT NULL DEFAULT 0,
  `diterima` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `total_item`, `total_harga`, `diskon`, `bayar`, `diterima`, `id_user`, `created_at`, `updated_at`) VALUES
(4, 1, 75000, 0, 75000, 100000, 1, '2023-05-19 20:47:06', '2023-05-19 20:47:33'),
(6, 1, 40000, 0, 40000, 0, 1, '2023-06-04 11:32:41', '2023-06-04 11:34:47'),
(7, 1, 40000, 0, 40000, 100000, 1, '2023-06-04 11:35:00', '2023-06-04 11:35:37'),
(9, 1, 40000, 0, 40000, 50000, 1, '2023-06-06 00:39:02', '2023-06-06 00:45:02'),
(10, 1, 40000, 0, 40000, 100000, 1, '2023-06-09 08:33:12', '2023-06-09 08:40:41'),
(15, 1, 75000, 0, 75000, 100000, 1, '2023-06-16 20:18:02', '2023-06-16 20:19:13'),
(19, 3, 190000, 0, 190000, 200000, 1, '2023-06-19 10:00:20', '2023-06-19 10:09:36'),
(21, 1, 75000, 0, 75000, 0, 1, '2023-06-19 10:13:32', '2023-06-19 10:13:44'),
(23, 0, 0, 0, 0, 0, 1, '2023-06-20 07:27:49', '2023-06-20 07:27:49'),
(24, 1, 40000, 0, 40000, 100000, 1, '2023-06-20 21:11:33', '2023-06-20 21:11:51'),
(25, 0, 0, 0, 0, 0, 1, '2023-06-24 11:27:57', '2023-06-24 11:27:57'),
(26, 0, 0, 0, 0, 0, 1, '2023-06-24 11:30:39', '2023-06-24 11:30:39'),
(27, 0, 0, 0, 0, 0, 1, '2023-06-25 11:54:06', '2023-06-25 11:54:06'),
(28, 0, 0, 0, 0, 0, 1, '2023-06-25 20:57:01', '2023-06-25 20:57:01'),
(29, 0, 0, 0, 0, 0, 1, '2023-06-25 21:15:00', '2023-06-25 21:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_penjualan_detail` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` tinyint(4) NOT NULL DEFAULT 0,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan_detail`, `id_penjualan`, `id_produk`, `harga_jual`, `jumlah`, `diskon`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 4, 8, 75000, 1, 0, 75000, '2023-05-19 20:47:15', '2023-05-19 20:47:15'),
(2, 6, 9, 40000, 1, 0, 40000, '2023-06-04 11:34:41', '2023-06-04 11:34:41'),
(3, 7, 9, 40000, 1, 0, 40000, '2023-06-04 11:35:17', '2023-06-04 11:35:17'),
(4, 9, 9, 40000, 1, 0, 40000, '2023-06-06 00:43:04', '2023-06-06 00:43:04'),
(5, 10, 9, 40000, 1, 0, 40000, '2023-06-09 08:33:26', '2023-06-09 08:33:26'),
(6, 15, 8, 75000, 1, 0, 75000, '2023-06-16 20:18:47', '2023-06-16 20:18:47'),
(8, 19, 8, 75000, 1, 0, 75000, '2023-06-19 10:04:01', '2023-06-19 10:04:01'),
(9, 19, 8, 75000, 1, 0, 75000, '2023-06-19 10:09:11', '2023-06-19 10:09:11'),
(10, 19, 10, 40000, 1, 0, 40000, '2023-06-19 10:09:23', '2023-06-19 10:09:23'),
(11, 21, 8, 75000, 1, 0, 75000, '2023-06-19 10:13:38', '2023-06-19 10:13:38'),
(12, 24, 10, 40000, 1, 0, 40000, '2023-06-20 21:11:39', '2023-06-20 21:11:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `id_kategori` int(10) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` int(11) NOT NULL,
  `diskon` tinyint(4) NOT NULL DEFAULT 0,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `kode_produk`, `nama_produk`, `merk`, `harga_beli`, `diskon`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(10, 29, 'P000010', 'Lampu Sein LED1', 'local', 35000, 0, 40000, 18, '2023-06-19 09:16:51', '2023-06-25 09:05:18'),
(11, 30, 'P000011', 'OLI', 'SPX', 70000, 0, 75000, 30, '2023-06-20 01:05:42', '2023-06-20 01:05:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wVyHamPPNcz4jzJoF3JqYh8C1lNczkNKLVMRCb5W', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoia3RzakVQVEo5QXdUbzFXOXJOMWtzVWNNRU4xTGhyMmJ0M0pweWtlWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXN0ZXIva2VydXNha2FuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJEd6TC90dVRhUnpoUzc1M1lydDFnNk9lWkV5Vzg1L1hUZ0ZMcWVTbVRxdE1Gd3B0MWhRMC5HIjtzOjEyOiJpZF9wZW5qdWFsYW4iO2k6Mjk7fQ==', 1687753196);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(10) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_nota` tinyint(4) NOT NULL,
  `diskon` smallint(6) NOT NULL DEFAULT 0,
  `path_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_perusahaan`, `alamat`, `telepon`, `tipe_nota`, `diskon`, `path_logo`, `created_at`, `updated_at`) VALUES
(1, 'ASS Racing Speed', 'jl.raya bogor km. 47', '082328010288', 1, 0, '/img/logo-20230612141809.png', NULL, '2023-06-12 07:18:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(3, 'KJM', 'BOGOR', '083829828182', '2023-06-20 00:46:16', '2023-06-20 00:46:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `email_verified_at`, `password`, `foto`, `level`, `remember_token`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', NULL, NULL, '$2y$10$GzL/tuTaRzhS753Yrt1g6OeZEyW85/XTgFLqeSmTqtMFwpt1hQ0.G', '/img/user.jpg', 1, NULL, NULL, '2023-05-19 20:02:38', '2023-05-19 20:02:38'),
(2, 'Kasir 1', 'kasir1@gmail.com', NULL, NULL, '$2y$10$xl4cA5nE9C5/CYUsULEDU.UtF/r3iapLYlh8f7bYPat.qVvZZuH1y', '/img/user.jpg', 2, NULL, NULL, '2023-05-19 20:02:38', '2023-05-19 20:02:38'),
(3, 'wildan', 'wildans29.ws@gmail.com', '+6282328010288', NULL, '$2y$10$Y7l59qHEEfJ7kP08DBeE3uhqfUvhSpoB8irR9BQmptTM/uIoyph5i', '/img/user.jpg', 2, NULL, NULL, '2023-05-20 10:45:07', '2023-05-20 10:45:07'),
(4, 'AJI', 'Aji@gmail.com', '082328010299', NULL, '$2y$10$g3Lc9z9provDQa.Yo1MpkuWKzlNQIY3oqowHXAMIhaKq1puH3CMkW', '/img/logo-20230621041700.png', 2, NULL, NULL, '2023-05-26 20:07:39', '2023-06-20 21:17:00'),
(5, 'FAJAR MASRUKHIN', 'fajarmasrukhin993@gmail.com', '083829828182', NULL, '$2y$10$T82pDw3EsXvJoPA8e4ljOuyOoi8jL7lge79pT39SkKQ3Ar0pNqY6C', '/img/user.jpg', 2, NULL, NULL, '2023-05-28 04:19:41', '2023-05-28 04:19:41'),
(6, 'Ipan', 'Ipan@gmail.com', '0823280124587', NULL, '$2y$10$8gq4F4/DPSHNPc6jj8jHTOTHLPfqzGK23e.zOzB0NeQdKkrvSu9wm', '/img/user.jpg', 2, NULL, NULL, '2023-06-04 10:37:27', '2023-06-04 10:37:27'),
(7, 'alfian', 'Alfian@gmail.com', NULL, NULL, '$2y$10$jH.Da7eX5qoFaIcw.uauxuXHI388o6ZrNDxc9Q7Hsgrl83ZuLWkz.', '/img/user.jpg', 2, NULL, NULL, '2023-06-09 19:43:35', '2023-06-09 20:27:56'),
(8, 'Bayu Anggara', 'bayu@gmail.com', '17253812538716', NULL, '$2y$10$YMQqsdKtA.mrxGl6a1YFDusPE2HE3IqCaIjmb7n32pZS8PD02mh8q', '/img/user.jpg', 2, NULL, NULL, '2023-06-09 20:30:49', '2023-06-09 20:32:51'),
(9, 'bayu', 'bayu123@gmail.com', '098098098878', NULL, '$2y$10$ZIOTn7qb8tF/ulwLZFfpreLliAxrKsn8MpuJzUWoq3I1QAfJzM3vq', '/img/user.jpg', 2, NULL, NULL, '2023-06-21 11:31:25', '2023-06-21 11:31:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `kategori_nama_kategori_unique` (`nama_kategori`);

--
-- Indeks untuk tabel `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `produk_nama_produk_unique` (`nama_produk`),
  ADD UNIQUE KEY `produk_kode_produk_unique` (`kode_produk`),
  ADD KEY `produk_id_kategori_foreign` (`id_kategori`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id_pembelian_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_penjualan_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
