-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 08:41 AM
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
-- Database: `senti-analis`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentars`
--

CREATE TABLE `komentars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idposting` bigint(20) UNSIGNED NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentars`
--

INSERT INTO `komentars` (`id`, `idposting`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dah biasa', '2023-07-19 20:34:20', '2023-07-19 20:34:57'),
(3, 3, 'Weh..ustadz baru ya??', NULL, NULL),
(4, 3, 'Pretty nice', NULL, NULL),
(5, 4, 'Ane dulu disini bg latin nye @dedyhidayah kpn2 main yuk bg hehe', NULL, NULL),
(6, 4, 'boleh boleh @bangda_', NULL, NULL),
(7, 5, 'Yg make sabuk kuning nama nya Ilham.. Org nya agak kurus, tpi kuat bngt, pernah ane sparing sama dia.. Padahal ane udh kuat nendang mukul nya. Tpi dia biasa aja bg.. Wkwk aneh kaya bruslee @dedyhidayah', NULL, NULL),
(8, 5, 'Ustadz @abdulfathirkautsar mantaappp..... ', NULL, NULL),
(9, 6, 'Nih dia Ilham.. kecil tapi rawit', NULL, NULL),
(10, 6, 'Wah mantap nih', NULL, NULL),
(11, 7, 'My Goodness!', NULL, NULL),
(12, 7, 'A lot of appreciation for this!', NULL, NULL),
(13, 8, 'Semoga sukses dapet ke juara an yg lebih jauh lagi buat @silat_daqu dan semoga nambah hebat persilatan daqu', '2017-10-19 06:35:04', NULL),
(14, 8, 'Oh iya Lupa.. ente kurang berat badan ya @ilhamgofidz', NULL, NULL),
(15, 8, 'Tp sayangnya ane ga ikut karna kurang gemuk😂', NULL, NULL),
(16, 8, 'Waktu itu ente ikut kan? @ilhamgofidz', NULL, NULL),
(17, 8, 'Waktu pertama kali DQ ikut posbeda di Banten 7 kesatria turun dengan latihan super mantap.. eh Yg tanding cuma si ai doang 😂😂 kenangan', NULL, NULL),
(18, 8, 'Maen lagi ke Jogja lah... Biar bisa ketemu lagi @silat_daqu', NULL, NULL),
(19, 8, 'Subhanllah Walhamdulillah, Maju terus @silat_daqu semoga bisa menjadi pendekar yang hafal quran menjaga keutuhan agama & NKRI. Mubarok Lakum Jami\'an 👍', NULL, NULL),
(20, 8, 'yg penting nikmat klo dilatih sama kh.wildan fauzie untk persiapan lomba😅', NULL, NULL),
(21, 8, 'latihannya udah jos gandos eh yg tanding cuma ai😂😂', NULL, NULL),
(22, 9, 'Subhanallah Renaldi makin jago main karambitnya', NULL, NULL),
(23, 9, 'Itu yg pertamo oo kan dek? @oscar.orlanda', NULL, NULL),
(24, 9, 'Meleleh ana ngeliat antum penampilan kyai @danfauzinew 😂🤣', NULL, NULL),
(25, 9, 'Terpesona', NULL, NULL),
(26, 10, 'Masya Allah maju terus Tapak Suci Darul Qur\'an', NULL, NULL),
(27, 10, 'Behh ana paling kece', NULL, NULL),
(28, 10, '@heanderrr_gofhiz udh jelas gw yg paling kece', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_20_041640_create_postings_table', 1),
(6, '2023_07_20_042050_create_komentars_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `postings`
--

CREATE TABLE `postings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posting` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postings`
--

INSERT INTO `postings` (`id`, `posting`, `created_at`, `updated_at`) VALUES
(1, 'Testing berita', '2023-07-19 20:30:44', '2023-07-19 20:31:44'),
(3, 'Latihan Wajib Persida\r\n.\r\nIn frame : Al-Ustadz Abdul Fathir Kautsar', '2016-09-18 06:24:41', NULL),
(4, 'Gak cuman ABRI yang bisa seperti ini, tapi kita santri juga bisa.\r\n.\r\n.\r\n.\r\n📌Latihan Wajib Mingguan Persida', '2016-09-18 06:27:01', NULL),
(5, 'Fighting Persida (1/2)', '2016-09-18 06:28:25', NULL),
(6, 'Let\'s Fight ! I\'m Get Ready to Fight\r\n.\r\nIn Frame : Akh Ilham Al-Imran (ketua persida ketapang)', '2016-09-22 06:29:46', NULL),
(7, 'I catch your kick.', '2016-09-22 06:30:59', NULL),
(8, 'Alhamdulillah usaha dengan gigih sebelum pertandingan membuahkan hasil. Latihan, Khataman serta Ibadah2 sunnah lainnya. #latepost .', '2017-10-19 06:33:11', NULL),
(9, 'P E R S I D A\r\n.\r\n.\r\n.\r\n#KHUTBATULIFTITAH #LATEPOST .\r\n.\r\n.\r\nDengan Iman dan Akhlak Kami Menjadi Kuat tanpa Iman dan Akhlak Kami Menjadi Lemah.', '2017-11-09 06:37:56', NULL),
(10, 'Pencaksilat Daarul Qur\'an goes to singapore.. Meraih medali emas, perak, dan perunggu', '2018-05-27 06:40:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_komentar`
--

CREATE TABLE `table_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_posting` int(11) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_komentar`
--

INSERT INTO `table_komentar` (`id_komentar`, `id_posting`, `komentar`) VALUES
(4, 2, 'biasa aja kaliiiii'),
(8, 1, 'heleh'),
(9, 3, 'Wahhh mantap banget kak..😍😘 kuy cek ig kita yuk kak..🤗'),
(10, 3, 'Assalamualaikum kak 😊 mau coba khasiat dari PRODUK herbal kami 🌿dijamin hasil nya terbukti dan ampuh dalam 2-5 hari yuk kepoin IG kami @stokis_ravena_herbal'),
(11, 3, 'Sapa ajah tuh yg di photo @silat_daqu'),
(12, 3, 'Siapa yg ngaplot nih'),
(13, 4, '@almaisah_09 itu bukan ustad kan'),
(14, 4, 'Yoi ada gw :v'),
(15, 4, 'Mantapp 🔥'),
(16, 4, 'Pgn jg eyyy dilantik ehehehe'),
(17, 5, 'Ntapss'),
(18, 5, 'Kok aing ga ada ya 🤔🤔🤔'),
(19, 5, 'Luaaaaar biasaaaaaa...'),
(20, 6, 'bagus, kencengin lagi nyalinya'),
(21, 6, '@ihsansyamil21 siap braderr💪'),
(22, 7, 'Semangat 💪'),
(23, 6, 'Mantap'),
(24, 8, 'Kurang kah'),
(25, 8, 'Aduh ketinggalan info'),
(26, 8, 'Ada sholganku..di slide terakhir walaupun samar 😂'),
(27, 9, 'ooo ni kerja an ust jundi pasti. Wkwkwkqk'),
(28, 9, 'klo seudzhon saya sih si faruq yg uploadnya atau asplat yg lain wkwkwkwk'),
(29, 9, 'Heheheh iya pasti ustad yg ngeupload'),
(30, 9, 'bukan saya'),
(31, 9, 'Mantap'),
(32, 9, 'Kyk nya bukan ust wildan nih yg ngeuplload... Soalnya burem😄'),
(33, 9, 'Mana foto singapura nya ustad'),
(34, 10, 'Masya Allah maju terus Tapak Suci Darul Qur\'an'),
(35, 10, 'Behh ana paling kece'),
(36, 10, 'udh jelas gw yg paling kece'),
(37, 11, 'Kyai Musthofa Adnan, Ustadz Fuad Romli... ❤️'),
(38, 11, '@irfan200125 cek disini mas'),
(39, 11, 'disini Cuma ada ustad Yusuf Mansur nya masa, syehk Ali nya ga ada'),
(40, 11, 'Cek sini lgi, yg punya pondok.... ustadz @yusufmansurnew , mas @adammajid__'),
(41, 12, 'Subhanallah Renaldi makin jago main karambitnya'),
(42, 12, 'Itu yg pertamo oo kan dek?'),
(43, 12, 'Meleleh ana ngeliat antum penampilan kyai'),
(44, 12, 'Terpesona'),
(45, 13, 'Semoga sukses dapet ke juara an yg lebih jauh lagi buat @silat_daqu dan semoga nambah hebat persilatan daqu'),
(46, 13, 'Oh iya Lupa.. ente kurang berat badan ya'),
(47, 13, 'Tapi sayangnya ane ga ikut karna kurang gemuk😂'),
(48, 13, 'Waktu itu ente ikut kan? @ilhamgofidz'),
(49, 13, 'Waktu pertama kali DQ ikut posbeda di Banten 7 kesatria turun dengan latihan super mantap.. eh Yg tanding cuma si ai doang 😂😂 kenangan'),
(50, 13, 'Maen lagi ke Jogja lah... Biar bisa ketemu lagi'),
(51, 13, 'latihannya udah jos gandos eh yg tanding cuma ai😂😂'),
(52, 13, 'yg penting nikmat klo dilatih sama kh.wildan fauzie untk persiapan lomba😅'),
(53, 13, 'Subhanllah Walhamdulillah, Maju terus @silat_daqu semoga bisa menjadi pendekar yang hafal quran menjaga keutuhan agama & NKRI. Mubarok Lakum Jami\'an 👍'),
(54, 14, 'My Goodness!'),
(55, 14, ' lot of appreciation for this!'),
(56, 15, 'Wah mantap nih'),
(57, 15, 'Nih dia Ilham.. kecil tapi rawit');

-- --------------------------------------------------------

--
-- Table structure for table `table_posting`
--

CREATE TABLE `table_posting` (
  `id_posting` int(11) NOT NULL,
  `judul_posting` text NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_posting`
--

INSERT INTO `table_posting` (`id_posting`, `judul_posting`, `tgl_posting`) VALUES
(1, 'coba lagii', '2023-07-17'),
(2, 'Berita hari ini', '2023-07-17'),
(3, 'Tapak Suci Exhibition\n#tapaksucicup5', '2018-12-23'),
(4, 'Prosesi upacara & plantikan kenaikan tingkatan santri persida (persatuan silat daarul qur\'an) 2019-2020.', '2019-12-02'),
(5, 'The inauguration of increasing level persida .\r\n.\r\n.\r\n.\r\n.\r\ndengen iman dan ahklak kita menjadi kuat tanpa iman dan akhlak kita menjadi lemah_\r\n\r\nلَاحَوْلَ وَلَا قُوَّةَ اِلَّا بِا اللهِ الْعَلِيِّ الْعَظِيْمِ', '2019-12-03'),
(6, 'Congratulation Dana Al Adiyat for to the next round in Bandung City\r\n\r\n#memepesilat #santrindonesia #santri_hitz #tapaksucidunia #tapaksuciindonesia .\r\n.\r\nAthlet Blue Side @danaaladiyat_\r\nStudent in @pesantrendaqu', '2019-10-22'),
(7, 'Pertandingan terakhir --full vidio--\r\nPertandingan persahabatan atara\r\nal-akh hafizh al faruq melawan\r\nal-akh dana al adiyat (DAC3).', '2019-05-07'),
(8, '\"JUST FIGHTER NOT KILLER\"', '2019-03-03'),
(9, 'Defence art campionship', '2018-06-19'),
(10, 'Pencaksilat Daarul Qur\'an goes to singapore.. Meraih medali emas, perak, dan perunggu', '2018-05-27'),
(11, '\"Dengan iman dan akhlak kita menjadi kuat, tanpa iman dan akhlak kita menjadi lemah\"\r\n.\r\n.\r\n.\r\n•salam persida!!!', '2018-03-24'),
(12, 'P E R S I D A\r\n.\r\n.\r\n.\r\n#KHUTBATULIFTITAH #LATEPOST .\r\n.\r\n.\r\nDengan Iman dan Akhlak Kami Menjadi Kuat tanpa Iman dan Akhlak Kami Menjadi Lemah.', '2017-11-09'),
(13, 'Alhamdulillah usaha dengan gigih sebelum pertandingan membuahkan hasil. Latihan, Khataman serta Ibadah2 sunnah lainnya. #latepost .\r\n.\r\nPerolehan Medali PERSIDA dalam ajang lomba YKTC 2: 1.\r\n#Medali Emas :\r\n- Haycal Elvin T. / 8H\r\n- Alvin Evan Diaz / 11 IPA A\r\n- Dana Al Adiyat / 10 IPS A\r\n- Aldi Afryan / 10 IPS D\r\n#Medali Perak :\r\n- Reynardi M. Arfin / 8G\r\n- M. Haikal / 8 F\r\n- Paisal / 11 IPA C\r\n- Pardi / 11 IPA B\r\n- Hafizh Al Faruq / 11 IPA A\r\n- Farhan Az Dzaky / 10 IPS B\r\n#Medali Perunggu :\r\n- M. Rafliansyah / 8J\r\n- M. Nawir Aufa / 8C\r\n- Aldi Firdaus / 8G\r\n- Umar Saepul W. / 8F\r\n- Alif Ernaldo / 11 IPA A\r\nRekapitulasi Perolehan Medali:\r\n#Medali Emas (JUARA 1)\r\nSMP : 1\r\nSMA : 3\r\nTotal : 4\r\n#Medali Perak (JUARA 2)\r\nSMP : 2\r\nSMA : 4\r\nTotal : 6\r\n#Medali Perunggu (JUARA 3)\r\nSMP : 4\r\nSMA : 1\r\nTotal : 5', '2017-10-19'),
(14, 'I catch your kick.', '2016-09-22'),
(15, 'Let\'s Fight ! I\'m Get Ready to Fight\n.\nIn Frame : Akh Ilham Al-Imran (ketua persida ketapang)', '2016-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentars_idposting_foreign` (`idposting`);

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
-- Indexes for table `postings`
--
ALTER TABLE `postings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_komentar`
--
ALTER TABLE `table_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `fk_posting` (`id_posting`);

--
-- Indexes for table `table_posting`
--
ALTER TABLE `table_posting`
  ADD PRIMARY KEY (`id_posting`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postings`
--
ALTER TABLE `postings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_komentar`
--
ALTER TABLE `table_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `table_posting`
--
ALTER TABLE `table_posting`
  MODIFY `id_posting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentars`
--
ALTER TABLE `komentars`
  ADD CONSTRAINT `komentars_idposting_foreign` FOREIGN KEY (`idposting`) REFERENCES `postings` (`id`);

--
-- Constraints for table `table_komentar`
--
ALTER TABLE `table_komentar`
  ADD CONSTRAINT `fk_posting` FOREIGN KEY (`id_posting`) REFERENCES `table_posting` (`id_posting`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
