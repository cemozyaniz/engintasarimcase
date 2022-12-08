-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 08 Ara 2022, 02:00:26
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cozypanel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `t_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_url` varchar(255) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `articles`
--

INSERT INTO `articles` (`id`, `url`, `t_id`, `w_id`, `title`, `description`, `file_url`, `rank`, `isActive`, `createdAt`) VALUES
(5, 'asdasss2', 1, 1, 'asdasss2', '<p>asdas2</p>', 'aab.pdf', 0, 1, '2022-12-08 00:15:19'),
(6, 'asdas', 1, 1, 'asdas', '<p>asdasd</p>', 'aaa.pdf', 0, 1, '2022-12-08 00:22:34'),
(7, 'asdas', 1, 1, 'asdas', '<p>asdasd</p>', 'aaa.pdf', 0, 1, '2022-12-08 00:23:37'),
(8, 'sadsaq', 1, 1, 'sadsaq', '<p>asdas</p>', 'aaa.pdf', 0, 1, '2022-12-08 00:23:57'),
(9, 'sadasdsa', 1, 1, 'sadasdsa', '<p>asdsa</p>', 'aaa.pdf', 0, 1, '2022-12-08 00:25:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `article_images`
--

CREATE TABLE `article_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(11) DEFAULT NULL,
  `isCover` tinyint(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `article_images`
--

INSERT INTO `article_images` (`id`, `article_id`, `img_url`, `rank`, `isActive`, `isCover`, `createdAt`) VALUES
(1, 5, '6cae40c4-26c5-4364-b168-ff615a76fd48.jpg', 0, 1, 0, '2022-12-08 01:18:01'),
(2, 5, 'e2a0e730-679a-4b2c-9e00-0db3c1d7d0c6.jpg', 0, 1, 0, '2022-12-08 01:18:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(11) NOT NULL,
  `protocol` varchar(10) DEFAULT NULL,
  `host` varchar(100) DEFAULT NULL,
  `port` varchar(10) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `from` varchar(100) DEFAULT NULL,
  `to` varchar(100) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `email_settings`
--

INSERT INTO `email_settings` (`id`, `protocol`, `host`, `port`, `user`, `password`, `from`, `to`, `isActive`, `user_name`, `createdAt`) VALUES
(2, 'smtp', 'ssl://mail.cosasoftworks.com', '465', 'customer.service@cosasoftworks.com', 'Customer.021!', 'noreply@cosasoftworks.com', 'customer.service@cosasoftworks.com', 1, 'İletişim', '2020-12-28 07:09:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `files`
--

CREATE TABLE `files` (
  `id` int(11) UNSIGNED NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `isActive` tinyint(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `about_us` longtext DEFAULT NULL,
  `mission` longtext DEFAULT NULL,
  `vision` longtext DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `phone_1` varchar(15) DEFAULT NULL,
  `phone_2` varchar(15) DEFAULT NULL,
  `fax_1` varchar(15) DEFAULT NULL,
  `fax_2` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `address`, `about_us`, `mission`, `vision`, `logo`, `phone_1`, `phone_2`, `fax_1`, `fax_2`, `email`, `facebook`, `twitter`, `instagram`, `linkedin`, `createdAt`, `updatedAt`) VALUES
(1, 'c0zy', '                                                                                                                                                                                                                                                                                                                                                                                            ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                        <span style=\"color: rgb(220, 221, 222); font-family: Whitney, \"Helvetica Neue\", Helvetica, Arial, sans-serif; font-size: 16px; white-space: break-spaces; background-color: rgba(4, 4, 5, 0.07);\">Merhaba, biz yirmili yaşlarının ortasında iki web geliştiricisiyiz.\r\nBilgisayar mühendisliği lisans eğitimi almanın yanında lisans eğitiminin dışında da kendimizi geliştirip yıllarca bilişim sektöründe farklı alanlarda çalışma/üretme imkanı bulduk.\r\nYaptığımız işleri kaliteli ve ihtiyaca yönelik yapmayı kendimize ilke edindik. Çoğu zaman müşterilerimizin bile aklına gelmeyen pratik ve şık çözüm önerileri sunup partnerliğimizden memnun kalmalarını sağladık, sağlıyoruz. \r\n\r\nKendinize özel, tam olarak aklınızdaki gibi bir web sitesine sahip olmak istiyorsanız sunduğumuz hizmetlere göz atabilir, bizimle iletişime geçebilirsiniz.</span>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ', 'cosa-softworks2.png', '5375126640', '', '', '', 'customer.service@cosasoftworks.com', '', '', 'https://www.instagram.com/cosasoftworks/', 'https://www.linkedin.com/in/cosa-softworks/', '2020-12-27 19:37:27', '2022-12-08 01:30:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `topics`
--

INSERT INTO `topics` (`id`, `title`, `isActive`, `createdAt`) VALUES
(1, 'Bir numaralı konu başlığı', 1, '2022-12-07 17:00:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `email`, `password`, `isActive`, `createdAt`) VALUES
(1, 'cemozyaniz', 'Cem Özyanız', 'cem@cosasoftworks.com', '22273887d6483d786f172a3e56f1a21f', 1, NULL),
(2, 'serkanaksoy', 'Serkan Aksoy', 'serkan@cosasoftworks.com', '035496014699ffbf8c33e48c505b2526', 1, '2020-12-28 00:20:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `writers`
--

CREATE TABLE `writers` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `writers`
--

INSERT INTO `writers` (`id`, `url`, `title`, `description`, `img_url`, `rank`, `isActive`, `createdAt`) VALUES
(1, 'deneme-yazar', 'Deneme Yazar', '<p>Deneme Yazar<br></p>', '6cae40c4-26c5-4364-b168-ff615a76fd48.jpg', 0, 1, '2022-12-07 17:15:49');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `article_images`
--
ALTER TABLE `article_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `article_images`
--
ALTER TABLE `article_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
