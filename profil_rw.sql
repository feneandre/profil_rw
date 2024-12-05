-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2024 pada 12.52
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profil_rw`
--

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
-- Struktur dari tabel `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `nama`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Kecamatan', 'kecamatan@gmail.com', '$2y$10$sscKURBJR.Cwzt2TfmW1xOK8zUnFATiUCoW9ESDSkZmCYccXtwvrq', NULL, '2024-12-02 06:16:24', '2024-12-02 06:16:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_rt`
--

CREATE TABLE `kontak_rt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ketua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_rw`
--

CREATE TABLE `kontak_rw` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ketua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kontak_rw`
--

INSERT INTO `kontak_rw` (`id`, `nama_kelurahan`, `nama_rw`, `nama_ketua`, `nomor_telepon`, `rw_id`, `created_at`, `updated_at`) VALUES
(1, 'KELURAHAN KESAMBI', 'RW.01 KARANGANYAR', 'bbb', '081997893975', 1, '2024-12-02 21:27:31', '2024-12-02 21:27:31');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_01_034533_create_kecamatans_table', 1),
(6, '2024_12_01_034609_create_rws_table', 1),
(7, '2024_12_01_034645_create_rts_table', 1),
(8, '2024_12_01_043413_create_kontak_rw_table', 1),
(9, '2024_12_01_054205_create_kontak_rt_table', 1),
(10, '2024_12_02_064635_create_pendidikan_rw_table', 1),
(11, '2024_12_02_113509_add_tanggal_waktu_to_pendidikan_rw_table', 1),
(12, '2024_12_02_122550_create_add_no_surat_to_pendidikan_rw_table', 1),
(13, '2024_12_03_113121_add_tabel_abcd_to_pendidikan_rt_table', 2),
(14, '2024_12_04_030010_add_total_usia_fields_to_pendidikan_rt', 3),
(15, '2024_12_04_032217_add_pekerjaan_agama_kewarganegaraan_to_pendidikan_rt', 4),
(16, '2024_12_04_073938_create_add_fields_to_pendidikan_rt_table', 5),
(17, '2024_12_04_083714_add_gender_fields_to_pendidikan_rt_table', 6),
(18, '2024_12_04_122043_update_paud_colomns_type', 7),
(19, '2024_12_05_021104_add_klm_field_to_pendidikan_rt', 8),
(20, '2024_12_05_065305_create_add_nopq_fields_to_pendidikan_rt', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_rt`
--

CREATE TABLE `pendidikan_rt` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `nama_pengisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_input` date NOT NULL,
  `waktu_input` time NOT NULL,
  `rt_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `batas_utara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batas_selatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batas_timur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batas_barat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luas_wilayah` decimal(8,2) DEFAULT NULL,
  `sarana_pendidikan` decimal(5,2) DEFAULT NULL,
  `sarana_olahraga` decimal(5,2) DEFAULT NULL,
  `sarana_pariwisata` decimal(5,2) DEFAULT NULL,
  `tanah_lapang` decimal(5,2) DEFAULT NULL,
  `jumlah_penduduk` int(11) DEFAULT NULL,
  `jumlah_laki` int(11) DEFAULT NULL,
  `jumlah_perempuan` int(11) DEFAULT NULL,
  `jumlah_kk` int(11) DEFAULT NULL,
  `jumlah_total` int(11) DEFAULT NULL,
  `kepadatan_penduduk` decimal(8,2) DEFAULT NULL,
  `usia_0_4_l` int(11) DEFAULT NULL,
  `usia_0_4_p` int(11) DEFAULT NULL,
  `usia_5_9_l` int(11) DEFAULT NULL,
  `usia_5_9_p` int(11) DEFAULT NULL,
  `usia_10_14_l` int(11) DEFAULT NULL,
  `usia_10_14_p` int(11) DEFAULT NULL,
  `usia_15_19_l` int(11) DEFAULT NULL,
  `usia_15_19_p` int(11) DEFAULT NULL,
  `usia_20_24_l` int(11) DEFAULT NULL,
  `usia_20_24_p` int(11) DEFAULT NULL,
  `usia_25_29_l` int(11) DEFAULT NULL,
  `usia_25_29_p` int(11) DEFAULT NULL,
  `usia_30_34_l` int(11) DEFAULT NULL,
  `usia_30_34_p` int(11) DEFAULT NULL,
  `usia_35_39_l` int(11) DEFAULT NULL,
  `usia_35_39_p` int(11) DEFAULT NULL,
  `usia_40_44_l` int(11) DEFAULT NULL,
  `usia_40_44_p` int(11) DEFAULT NULL,
  `usia_45_49_l` int(11) DEFAULT NULL,
  `usia_45_49_p` int(11) DEFAULT NULL,
  `usia_50_54_l` int(11) DEFAULT NULL,
  `usia_50_54_p` int(11) DEFAULT NULL,
  `usia_55_59_l` int(11) DEFAULT NULL,
  `usia_55_59_p` int(11) DEFAULT NULL,
  `usia_60_64_l` int(11) DEFAULT NULL,
  `usia_60_64_p` int(11) DEFAULT NULL,
  `usia_65_69_l` int(11) DEFAULT NULL,
  `usia_65_69_p` int(11) DEFAULT NULL,
  `usia_70_74_l` int(11) DEFAULT NULL,
  `usia_70_74_p` int(11) DEFAULT NULL,
  `usia_75_plus_l` int(11) DEFAULT NULL,
  `usia_75_plus_p` int(11) DEFAULT NULL,
  `jumlah_laki_usia` int(11) NOT NULL DEFAULT 0,
  `jumlah_perempuan_usia` int(11) NOT NULL DEFAULT 0,
  `jumlah_penduduk_usia` int(11) NOT NULL DEFAULT 0,
  `petani_l` int(11) NOT NULL DEFAULT 0,
  `petani_p` int(11) NOT NULL DEFAULT 0,
  `buruh_tani_l` int(11) NOT NULL DEFAULT 0,
  `buruh_tani_p` int(11) NOT NULL DEFAULT 0,
  `pns_l` int(11) NOT NULL DEFAULT 0,
  `pns_p` int(11) NOT NULL DEFAULT 0,
  `pengrajin_l` int(11) NOT NULL DEFAULT 0,
  `pengrajin_p` int(11) NOT NULL DEFAULT 0,
  `pedagang_l` int(11) NOT NULL DEFAULT 0,
  `pedagang_p` int(11) NOT NULL DEFAULT 0,
  `peternak_l` int(11) NOT NULL DEFAULT 0,
  `peternak_p` int(11) NOT NULL DEFAULT 0,
  `dokter_swasta_l` int(11) NOT NULL DEFAULT 0,
  `dokter_swasta_p` int(11) NOT NULL DEFAULT 0,
  `bidan_swasta_l` int(11) NOT NULL DEFAULT 0,
  `bidan_swasta_p` int(11) NOT NULL DEFAULT 0,
  `tni_polri_l` int(11) NOT NULL DEFAULT 0,
  `tni_polri_p` int(11) NOT NULL DEFAULT 0,
  `pensiunan_tni_polri_l` int(11) NOT NULL DEFAULT 0,
  `pensiunan_tni_polri_p` int(11) NOT NULL DEFAULT 0,
  `pensiunan_pns_l` int(11) NOT NULL DEFAULT 0,
  `pensiunan_pns_p` int(11) NOT NULL DEFAULT 0,
  `islam_l` int(11) NOT NULL DEFAULT 0,
  `islam_p` int(11) NOT NULL DEFAULT 0,
  `kristen_l` int(11) NOT NULL DEFAULT 0,
  `kristen_p` int(11) NOT NULL DEFAULT 0,
  `katholik_l` int(11) NOT NULL DEFAULT 0,
  `katholik_p` int(11) NOT NULL DEFAULT 0,
  `hindu_l` int(11) NOT NULL DEFAULT 0,
  `hindu_p` int(11) NOT NULL DEFAULT 0,
  `budha_l` int(11) NOT NULL DEFAULT 0,
  `budha_p` int(11) NOT NULL DEFAULT 0,
  `khonghucu_l` int(11) NOT NULL DEFAULT 0,
  `khonghucu_p` int(11) NOT NULL DEFAULT 0,
  `wni_l` int(11) NOT NULL DEFAULT 0,
  `wni_p` int(11) NOT NULL DEFAULT 0,
  `wna_l` int(11) NOT NULL DEFAULT 0,
  `wna_p` int(11) NOT NULL DEFAULT 0,
  `tuna_rungu_l` int(11) NOT NULL DEFAULT 0,
  `tuna_rungu_p` int(11) NOT NULL DEFAULT 0,
  `tuna_wicara_l` int(11) NOT NULL DEFAULT 0,
  `tuna_wicara_p` int(11) NOT NULL DEFAULT 0,
  `tuna_netra_l` int(11) NOT NULL DEFAULT 0,
  `tuna_netra_p` int(11) NOT NULL DEFAULT 0,
  `lumpuh_l` int(11) NOT NULL DEFAULT 0,
  `lumpuh_p` int(11) NOT NULL DEFAULT 0,
  `sumbing_l` int(11) NOT NULL DEFAULT 0,
  `sumbing_p` int(11) NOT NULL DEFAULT 0,
  `idiot_l` int(11) NOT NULL DEFAULT 0,
  `idiot_p` int(11) NOT NULL DEFAULT 0,
  `gila_l` int(11) NOT NULL DEFAULT 0,
  `gila_p` int(11) NOT NULL DEFAULT 0,
  `stress_l` int(11) NOT NULL DEFAULT 0,
  `stress_p` int(11) NOT NULL DEFAULT 0,
  `autis_l` int(11) NOT NULL DEFAULT 0,
  `autis_p` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_18_56` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_18_58_bekerja` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_18_58_tidak_bekerja` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_58_keatas` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_58_keatas_bekerja` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_58_keatas_tidak_bekerja` int(11) NOT NULL DEFAULT 0,
  `nama_paud` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_paud` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_pengajar_paud` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_siswa_paud` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penduduk_usia_18_56_l` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_18_56_p` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_18_58_bekerja_l` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_18_58_bekerja_p` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_18_58_tidak_bekerja_l` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_18_58_tidak_bekerja_p` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_58_keatas_l` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_58_keatas_p` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_58_keatas_bekerja_l` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_58_keatas_bekerja_p` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_58_keatas_tidak_bekerja_l` int(11) NOT NULL DEFAULT 0,
  `penduduk_usia_58_keatas_tidak_bekerja_p` int(11) NOT NULL DEFAULT 0,
  `data_tk` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Data TK dalam format JSON dengan struktur: nama, alamat, jumlah_siswa, jumlah_guru' CHECK (json_valid(`data_tk`)),
  `data_sd` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Data SD dalam format JSON dengan struktur: nama, alamat, jumlah_siswa, jumlah_guru' CHECK (json_valid(`data_sd`)),
  `data_smp` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'Data SMP/MTS dalam format JSON dengan struktur: nama, alamat, jumlah_siswa, jumlah_guru' CHECK (json_valid(`data_smp`)),
  `data_sma` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data_sma`)),
  `data_pt` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data_pt`)),
  `data_pendidikan_khusus` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data_pendidikan_khusus`)),
  `data_pendidikan_non_formal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data_pendidikan_non_formal`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendidikan_rt`
--

INSERT INTO `pendidikan_rt` (`id`, `no_surat`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `periode`, `tahun`, `nama_pengisi`, `pekerjaan`, `jabatan`, `tanggal_input`, `waktu_input`, `rt_id`, `created_at`, `updated_at`, `batas_utara`, `batas_selatan`, `batas_timur`, `batas_barat`, `luas_wilayah`, `sarana_pendidikan`, `sarana_olahraga`, `sarana_pariwisata`, `tanah_lapang`, `jumlah_penduduk`, `jumlah_laki`, `jumlah_perempuan`, `jumlah_kk`, `jumlah_total`, `kepadatan_penduduk`, `usia_0_4_l`, `usia_0_4_p`, `usia_5_9_l`, `usia_5_9_p`, `usia_10_14_l`, `usia_10_14_p`, `usia_15_19_l`, `usia_15_19_p`, `usia_20_24_l`, `usia_20_24_p`, `usia_25_29_l`, `usia_25_29_p`, `usia_30_34_l`, `usia_30_34_p`, `usia_35_39_l`, `usia_35_39_p`, `usia_40_44_l`, `usia_40_44_p`, `usia_45_49_l`, `usia_45_49_p`, `usia_50_54_l`, `usia_50_54_p`, `usia_55_59_l`, `usia_55_59_p`, `usia_60_64_l`, `usia_60_64_p`, `usia_65_69_l`, `usia_65_69_p`, `usia_70_74_l`, `usia_70_74_p`, `usia_75_plus_l`, `usia_75_plus_p`, `jumlah_laki_usia`, `jumlah_perempuan_usia`, `jumlah_penduduk_usia`, `petani_l`, `petani_p`, `buruh_tani_l`, `buruh_tani_p`, `pns_l`, `pns_p`, `pengrajin_l`, `pengrajin_p`, `pedagang_l`, `pedagang_p`, `peternak_l`, `peternak_p`, `dokter_swasta_l`, `dokter_swasta_p`, `bidan_swasta_l`, `bidan_swasta_p`, `tni_polri_l`, `tni_polri_p`, `pensiunan_tni_polri_l`, `pensiunan_tni_polri_p`, `pensiunan_pns_l`, `pensiunan_pns_p`, `islam_l`, `islam_p`, `kristen_l`, `kristen_p`, `katholik_l`, `katholik_p`, `hindu_l`, `hindu_p`, `budha_l`, `budha_p`, `khonghucu_l`, `khonghucu_p`, `wni_l`, `wni_p`, `wna_l`, `wna_p`, `tuna_rungu_l`, `tuna_rungu_p`, `tuna_wicara_l`, `tuna_wicara_p`, `tuna_netra_l`, `tuna_netra_p`, `lumpuh_l`, `lumpuh_p`, `sumbing_l`, `sumbing_p`, `idiot_l`, `idiot_p`, `gila_l`, `gila_p`, `stress_l`, `stress_p`, `autis_l`, `autis_p`, `penduduk_usia_18_56`, `penduduk_usia_18_58_bekerja`, `penduduk_usia_18_58_tidak_bekerja`, `penduduk_usia_58_keatas`, `penduduk_usia_58_keatas_bekerja`, `penduduk_usia_58_keatas_tidak_bekerja`, `nama_paud`, `alamat_paud`, `jumlah_pengajar_paud`, `jumlah_siswa_paud`, `penduduk_usia_18_56_l`, `penduduk_usia_18_56_p`, `penduduk_usia_18_58_bekerja_l`, `penduduk_usia_18_58_bekerja_p`, `penduduk_usia_18_58_tidak_bekerja_l`, `penduduk_usia_18_58_tidak_bekerja_p`, `penduduk_usia_58_keatas_l`, `penduduk_usia_58_keatas_p`, `penduduk_usia_58_keatas_bekerja_l`, `penduduk_usia_58_keatas_bekerja_p`, `penduduk_usia_58_keatas_tidak_bekerja_l`, `penduduk_usia_58_keatas_tidak_bekerja_p`, `data_tk`, `data_sd`, `data_smp`, `data_sma`, `data_pt`, `data_pendidikan_khusus`, `data_pendidikan_non_formal`) VALUES
(29, '12244', 'Kesambi', 'Kesambi', 'Cirebon', 'Jawa Barat', 'Triwulan 1', 2024, 'Tatang Suryadi', 'Karyawan Swasta', 'sdsdsd', '2024-12-05', '08:37:00', 1, '2024-12-05 01:38:08', '2024-12-05 01:38:08', 'laut jawa', 'laut jawa', 'laut kalimantan', 'laut jawa', '100.00', '100.00', '0.00', '0.00', '0.00', 200, 100, 100, 100, 200, '2.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '\"[{\\\"nama\\\":\\\"-\\\",\\\"alamat\\\":\\\"-\\\",\\\"jumlah_siswa\\\":0,\\\"jumlah_pengajar\\\":0}]\"', '[\"-\"]', '[\"0\"]', '[\"0\"]', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '\"[{\\\"nama\\\":\\\"-\\\",\\\"alamat\\\":\\\"-\\\",\\\"jumlah_siswa\\\":0,\\\"jumlah_guru\\\":0}]\"', '\"[{\\\"nama\\\":\\\"-\\\",\\\"alamat\\\":\\\"-\\\",\\\"jumlah_siswa\\\":0,\\\"jumlah_guru\\\":0}]\"', '\"[{\\\"nama\\\":\\\"-\\\",\\\"alamat\\\":\\\"-\\\",\\\"jumlah_siswa\\\":0,\\\"jumlah_guru\\\":0}]\"', '\"[{\\\"nama\\\":\\\"bsdhbsd\\\",\\\"alamat\\\":\\\"hfhdhf\\\",\\\"jumlah_siswa\\\":100,\\\"jumlah_guru\\\":100}]\"', '\"[{\\\"nama\\\":\\\"bsds\\\",\\\"alamat\\\":\\\"jdjd\\\",\\\"jumlah_mahasiswa\\\":123,\\\"jumlah_dosen\\\":123}]\"', '\"[{\\\"nama\\\":\\\"sdnsbfb\\\",\\\"alamat\\\":\\\"sbdhdhf\\\",\\\"jumlah_siswa\\\":120,\\\"jumlah_guru\\\":102}]\"', '\"[{\\\"nama\\\":\\\"gfdhdf\\\",\\\"alamat\\\":\\\"bshffb\\\",\\\"jumlah_peserta\\\":100,\\\"jumlah_pengajar\\\":100}]\"');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan_rw`
--

CREATE TABLE `pendidikan_rw` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `nama_pengisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal_input` date DEFAULT NULL,
  `waktu_input` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendidikan_rw`
--

INSERT INTO `pendidikan_rw` (`id`, `no_surat`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `periode`, `tahun`, `nama_pengisi`, `pekerjaan`, `jabatan`, `rw_id`, `created_at`, `updated_at`, `tanggal_input`, `waktu_input`) VALUES
(2, '12345678', 'Kelurahan Kesambi', 'Kesambi', 'Cirebon', 'Jawa Barat', 'Triwulan 1', 2024, 'AAAAA', 'Pedagang', 'sdsdsd', 1, '2024-12-02 19:24:59', '2024-12-02 20:40:18', '2024-12-03', '09:24:00');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rts`
--

CREATE TABLE `rts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rts`
--

INSERT INTO `rts` (`id`, `nama`, `email`, `password`, `nomor_rt`, `rw_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'RT 01 RW 01', 'rt01rw01@gmail.com', '$2y$10$P6yBq7j4j40O74Aj0zN3.ux0kjO7a1WCJLJfAPGTTmtMT/VwcU6nm', '001', 1, NULL, '2024-12-02 06:16:24', '2024-12-02 06:16:24'),
(2, 'RT 02 RW 01', 'rt02rw01@gmail.com', '$2y$10$3eDeVjA6K2073EW9gRtue.79Co1TXduif74y71ADaWxebzfAPrc6C', '002', 1, NULL, '2024-12-02 06:16:24', '2024-12-02 06:16:24'),
(3, 'RT 01 RW 02', 'rt01rw02@gmail.com', '$2y$10$QO83wMISS6qR1IW5/K3QiOjzagcRp/5ljldc/VYnyK2SVoptiXlgi', '001', 2, NULL, '2024-12-02 06:16:25', '2024-12-02 06:16:25'),
(4, 'RT 02 RW 02', 'rt02rw02@gmail.com', '$2y$10$fHCU8zhYbHuTFdGg7UAHNusqK94UPJ62lfF7YHRaZjU0abEtnSp1q', '002', 2, NULL, '2024-12-02 06:16:25', '2024-12-02 06:16:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rws`
--

CREATE TABLE `rws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rws`
--

INSERT INTO `rws` (`id`, `nama`, `email`, `password`, `nomor_rw`, `kecamatan_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'RW 01', 'rw01@gmail.com', '$2y$10$U9XdD4mPZHHh2bkMXToEwu28/il/vdsehRjf.Tla1Cs038unEb7aq', '001', 1, NULL, '2024-12-02 06:16:24', '2024-12-02 06:16:24'),
(2, 'RW 02', 'rw02@gmail.com', '$2y$10$wHjYBkozpcCq6WEUhd/M2.VcacXU1mMBC3Xj8EDiTLbsGDOq2aWbC', '002', 1, NULL, '2024-12-02 06:16:24', '2024-12-02 06:16:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kecamatans_email_unique` (`email`);

--
-- Indeks untuk tabel `kontak_rt`
--
ALTER TABLE `kontak_rt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kontak_rt_rt_id_foreign` (`rt_id`);

--
-- Indeks untuk tabel `kontak_rw`
--
ALTER TABLE `kontak_rw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kontak_rw_rw_id_foreign` (`rw_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pendidikan_rt`
--
ALTER TABLE `pendidikan_rt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikan_rw`
--
ALTER TABLE `pendidikan_rw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendidikan_rw_rw_id_foreign` (`rw_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rts`
--
ALTER TABLE `rts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rts_email_unique` (`email`),
  ADD KEY `rts_rw_id_foreign` (`rw_id`);

--
-- Indeks untuk tabel `rws`
--
ALTER TABLE `rws`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rws_email_unique` (`email`),
  ADD KEY `rws_kecamatan_id_foreign` (`kecamatan_id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kontak_rt`
--
ALTER TABLE `kontak_rt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kontak_rw`
--
ALTER TABLE `kontak_rw`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pendidikan_rt`
--
ALTER TABLE `pendidikan_rt`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pendidikan_rw`
--
ALTER TABLE `pendidikan_rw`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rts`
--
ALTER TABLE `rts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rws`
--
ALTER TABLE `rws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kontak_rt`
--
ALTER TABLE `kontak_rt`
  ADD CONSTRAINT `kontak_rt_rt_id_foreign` FOREIGN KEY (`rt_id`) REFERENCES `rts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kontak_rw`
--
ALTER TABLE `kontak_rw`
  ADD CONSTRAINT `kontak_rw_rw_id_foreign` FOREIGN KEY (`rw_id`) REFERENCES `rws` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendidikan_rw`
--
ALTER TABLE `pendidikan_rw`
  ADD CONSTRAINT `pendidikan_rw_rw_id_foreign` FOREIGN KEY (`rw_id`) REFERENCES `rws` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rts`
--
ALTER TABLE `rts`
  ADD CONSTRAINT `rts_rw_id_foreign` FOREIGN KEY (`rw_id`) REFERENCES `rws` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rws`
--
ALTER TABLE `rws`
  ADD CONSTRAINT `rws_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
