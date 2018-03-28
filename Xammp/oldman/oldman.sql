-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 28, 2018 lúc 05:08 PM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `oldman`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_newfeed` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `block` tinyint(3) DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `id_newfeed`, `id_user`, `status`, `block`, `created_at`) VALUES
(1, 1, 2, 'ke me may', 0, '2018-03-28 09:37:31'),
(2, 1, 2, 'Deo ai quan tam dau', 0, '2018-03-28 09:37:31'),
(3, 2, 2, 'suc vat cut', 0, '2018-03-28 09:37:31'),
(4, 4, 2, 'cho tao 1 it', 0, '2018-03-28 09:37:31'),
(5, 4, 1, 'cho tao 1 it', 0, '2018-03-28 09:37:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `game_1`
--

CREATE TABLE `game_1` (
  `id_question` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `A` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `B` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `C` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `D` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `correct` int(11) DEFAULT '0',
  `wrong` int(11) DEFAULT '0',
  `block` tinyint(3) DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `game_2`
--

CREATE TABLE `game_2` (
  `id_question` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `true_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `wrong_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `imag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` tinyint(1) NOT NULL,
  `correct` int(11) DEFAULT '0',
  `wrong` int(11) DEFAULT '0',
  `block` tinyint(3) DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_info`
--

CREATE TABLE `like_info` (
  `id_newfeed` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `like_info`
--

INSERT INTO `like_info` (`id_newfeed`, `id_user`, `created_at`) VALUES
(1, 1, '2018-03-28 09:37:31'),
(1, 2, '2018-03-28 09:37:31'),
(3, 2, '2018-03-28 09:37:31'),
(4, 1, '2018-03-28 09:37:31'),
(4, 2, '2018-03-28 09:37:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1522204544),
('m130524_201442_init', 1522204549),
('m130524_201443_init', 1522204550),
('m180319_150818_new_feed', 1522204552),
('m180319_153055_comment_new_feed', 1522204552),
('m180319_155307_question', 1522204554),
('m180320_153413_like_info', 1522204555),
('m180320_154544_foreignkey', 1522204561);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newfeed`
--

CREATE TABLE `newfeed` (
  `id_newfeed` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `image` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `block` tinyint(3) DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `newfeed`
--

INSERT INTO `newfeed` (`id_newfeed`, `id_user`, `status`, `image`, `block`, `created_at`) VALUES
(1, 1, 'Chan wa dang cam thay buon', 'null', 0, '2018-03-28 09:36:52'),
(2, 1, 'Chan wa dang cam thay buon', 'null', 0, '2018-03-28 09:36:52'),
(3, 2, 'Hom nay nhat duoc tien', 'tien', 0, '2018-03-28 09:36:52'),
(4, 1, 'Chan wa dang cam thay buon', 'null', 0, '2018-03-28 09:37:29'),
(5, 1, 'Chan wa dang cam thay buon', 'null', 0, '2018-03-28 09:37:30'),
(6, 2, 'Hom nay nhat duoc tien', 'tien', 0, '2018-03-28 09:37:30'),
(7, 2, 'dang cam thay co don', 'codon', 0, '2018-03-28 09:37:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag`
--

CREATE TABLE `tag` (
  `suggestions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tag`
--

INSERT INTO `tag` (`suggestions`, `created_at`) VALUES
('an_toàn', 2147483647),
('Cao_t?c', 2147483647),
('D?c', 2147483647),
('Đ?p', 2147483647),
('Đèo', 2147483647),
('Đư?ng_làng', 2147483647),
('H?p', 2147483647),
('ng?_tư', 2147483647),
('Nga_ba', 2147483647),
('nguy_hi?m', 2147483647),
('R?ng', 2147483647),
('t?c_đư?ng', 2147483647),
('thông_thoáng', 2147483647);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_login` int(11) NOT NULL,
  `username_login` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password_login` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'defaut_image',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduce` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `block` tinyint(3) DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_login`, `username_login`, `password_login`, `avatar`, `email`, `date`, `introduce`, `status`, `block`, `created_at`) VALUES
(1, 'daiproxomhoa', '123456', 'dai', 'dai@gmail.com', '1997-01-01', 'Dep zai', 10, 0, '2018-03-28 09:36:52'),
(2, 'luchen97', '123456', 'dinh', 'dih@gmail.com', '1997-09-11', 'Ngu vc', 10, 0, '2018-03-28 09:36:52'),
(3, 'daiproxomhoa', '123456', 'dai', 'dai@gmail.com', '1997-01-01', 'Dep zai', 10, 0, '2018-03-28 09:37:29'),
(4, 'luchen97', '123456', 'dinh', 'dih@gmail.com', '1997-09-11', 'Ngu vc', 10, 0, '2018-03-28 09:37:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user1`
--

CREATE TABLE `user1` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user1`
--

INSERT INTO `user1` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dai', 'NJOyKk-Rfi9PYh2B5tei_dEaraSLebT7', '$2y$13$V2QObAUxPH/DQ9wobBa5zOZpqUOydXbpXzLAPZfNqlQGsPxYcAyBK', NULL, 'da1i@gmail.com', 10, 1522219414, 1522219414);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk-user-comment` (`id_user`),
  ADD KEY `fk-newfeed-comment` (`id_newfeed`);

--
-- Chỉ mục cho bảng `game_1`
--
ALTER TABLE `game_1`
  ADD PRIMARY KEY (`id_question`,`id_user`),
  ADD KEY `fk-user-game1` (`id_user`);

--
-- Chỉ mục cho bảng `game_2`
--
ALTER TABLE `game_2`
  ADD PRIMARY KEY (`id_question`,`id_user`),
  ADD KEY `fk-user-game2` (`id_user`);

--
-- Chỉ mục cho bảng `like_info`
--
ALTER TABLE `like_info`
  ADD PRIMARY KEY (`id_newfeed`,`id_user`),
  ADD KEY `fk-user-like` (`id_user`);

--
-- Chỉ mục cho bảng `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `newfeed`
--
ALTER TABLE `newfeed`
  ADD PRIMARY KEY (`id_newfeed`,`id_user`),
  ADD KEY `fk-user-newfeed` (`id_user`);

--
-- Chỉ mục cho bảng `tag`
--
ALTER TABLE `tag`
  ADD UNIQUE KEY `suggestions` (`suggestions`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_login`);

--
-- Chỉ mục cho bảng `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `newfeed`
--
ALTER TABLE `newfeed`
  MODIFY `id_newfeed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk-newfeed-comment` FOREIGN KEY (`id_newfeed`) REFERENCES `newfeed` (`id_newfeed`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-user-comment` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_login`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `game_1`
--
ALTER TABLE `game_1`
  ADD CONSTRAINT `fk-user-game1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_login`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `game_2`
--
ALTER TABLE `game_2`
  ADD CONSTRAINT `fk-user-game2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_login`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `like_info`
--
ALTER TABLE `like_info`
  ADD CONSTRAINT `fk-newfeed-like` FOREIGN KEY (`id_newfeed`) REFERENCES `newfeed` (`id_newfeed`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-user-like` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_login`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `newfeed`
--
ALTER TABLE `newfeed`
  ADD CONSTRAINT `fk-user-newfeed` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_login`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
