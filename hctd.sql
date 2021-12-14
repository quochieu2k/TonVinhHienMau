-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2021 lúc 11:14 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hctd`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvi`
--

CREATE TABLE `donvi` (
  `Id` int(10) UNSIGNED NOT NULL,
  `TenDonVi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donvi`
--

INSERT INTO `donvi` (`Id`, `TenDonVi`, `created_at`, `updated_at`) VALUES
(1, 'Thành phố Quy Nhơn', NULL, NULL),
(2, 'Thị xã An Nhơn', NULL, NULL),
(3, 'Huyện Tuy Phước', NULL, NULL),
(4, 'Huyện Phù Cát', NULL, NULL),
(5, 'Huyện Phù Mỹ', NULL, NULL),
(6, 'Thị xã Hoài Nhơn', NULL, NULL),
(7, 'Huyện Hoài Ân', NULL, NULL),
(8, 'Huyện Tây Sơn', NULL, NULL),
(9, 'Huyện Vân Canh', NULL, NULL),
(10, 'Huyện Vĩnh Thạnh', NULL, NULL),
(11, 'Huyện An Lão', NULL, NULL),
(12, 'Liên đoàn Lao động tỉnh', NULL, NULL),
(13, 'Đoàn khối Các cơ quan tỉnh', NULL, NULL),
(14, 'Đoàn khối Doanh nghiệp tỉnh', NULL, NULL),
(15, 'Trường Đại học Quy Nhơn', NULL, NULL),
(16, 'Trường Đại học Quang Trung', NULL, NULL),
(17, 'Trường CĐ Kỹ thuật Công nghệ Quy Nhơn', NULL, NULL),
(18, 'Trường CĐ Y tế Bình Định', NULL, NULL),
(19, 'Trường Cao đẳng Bình Định', NULL, NULL),
(20, 'Trường CĐ Nghề CĐ-XĐ &Nông Lâm Trung bộ', NULL, NULL),
(21, 'Câu lạc bộ 25 - Hội CTĐ tỉnh', NULL, NULL),
(22, 'Trung đoàn KQ 925', NULL, NULL),
(23, 'Công an tỉnh Bình Định', NULL, NULL),
(24, 'BVĐK tỉnh, bệnh viện chuyên khoa & các BV TW trên địa bàn Quy Nhơn', NULL, NULL),
(25, 'Trung đoàn Cảnh sát cơ động Nam Trung bộ  E23', NULL, NULL),
(26, 'Hành trình đỏ', NULL, NULL),
(27, 'Các ĐV ngoài kế hoạch và HMTN đột xuất', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `excelbenhvien`
--

CREATE TABLE `excelbenhvien` (
  `Id` int(10) UNSIGNED NOT NULL,
  `HoTen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `NgheNghiep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiLamViec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLanHien` int(11) NOT NULL,
  `Nhom_ABO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nhom_Rh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `Xoa` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exceltonvinh`
--

CREATE TABLE `exceltonvinh` (
  `Id` int(10) UNSIGNED NOT NULL,
  `HoTen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `NgheNghiep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nhom_ABO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MucTonVinh` int(11) NOT NULL,
  `SoLanHien` int(11) NOT NULL,
  `MaDonVi` int(11) NOT NULL,
  `MaDotTonVinh` int(11) NOT NULL,
  `TenFile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoihienmau`
--

CREATE TABLE `nguoihienmau` (
  `Id` int(10) UNSIGNED NOT NULL,
  `HoTen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `NgheNghiep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NoiLamViec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLanHien` int(11) NOT NULL,
  `Nhom_ABO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nhom_Rh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nguon_Goc_Import` int(11) NOT NULL DEFAULT 0,
  `Muc_5` date DEFAULT NULL,
  `Muc_10` date DEFAULT NULL,
  `Muc_15` date DEFAULT NULL,
  `Muc_20` date DEFAULT NULL,
  `Muc_30` date DEFAULT NULL,
  `Muc_40` date DEFAULT NULL,
  `Muc_50` date DEFAULT NULL,
  `Muc_60` date DEFAULT NULL,
  `Muc_70` date DEFAULT NULL,
  `Muc_80` date DEFAULT NULL,
  `Muc_90` date DEFAULT NULL,
  `Muc_100` date DEFAULT NULL,
  `Muc_5_donvi` int(11) DEFAULT NULL,
  `Muc_10_donvi` int(11) DEFAULT NULL,
  `Muc_15_donvi` int(11) DEFAULT NULL,
  `Muc_20_donvi` int(11) DEFAULT NULL,
  `Muc_30_donvi` int(11) DEFAULT NULL,
  `Muc_40_donvi` int(11) DEFAULT NULL,
  `Muc_50_donvi` int(11) DEFAULT NULL,
  `Muc_60_donvi` int(11) DEFAULT NULL,
  `Muc_70_donvi` int(11) DEFAULT NULL,
  `Muc_80_donvi` int(11) DEFAULT NULL,
  `Muc_90_donvi` int(11) DEFAULT NULL,
  `Muc_100_donvi` int(11) DEFAULT NULL,
  `Xoa` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tonvinh`
--

CREATE TABLE `tonvinh` (
  `Id` int(11) NOT NULL,
  `ThoiGian` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `Id` int(10) UNSIGNED NOT NULL,
  `UserName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`Id`, `UserName`, `Pass`, `Name`, `Email`, `Phone`, `created_at`, `updated_at`) VALUES
(5, 'admin', '$2y$10$I3xaVJHtiYfqRk2NLd13D.qEa5SHol3miLdoTYfTHJjKoLMIXmfh.', 'Admin', 'admin@gmail.com', '0768433784', '2021-10-23 02:48:54', '2021-10-23 02:48:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `excelbenhvien`
--
ALTER TABLE `excelbenhvien`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `exceltonvinh`
--
ALTER TABLE `exceltonvinh`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `nguoihienmau`
--
ALTER TABLE `nguoihienmau`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tonvinh`
--
ALTER TABLE `tonvinh`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donvi`
--
ALTER TABLE `donvi`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `excelbenhvien`
--
ALTER TABLE `excelbenhvien`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4701;

--
-- AUTO_INCREMENT cho bảng `exceltonvinh`
--
ALTER TABLE `exceltonvinh`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1618;

--
-- AUTO_INCREMENT cho bảng `nguoihienmau`
--
ALTER TABLE `nguoihienmau`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1073;

--
-- AUTO_INCREMENT cho bảng `tonvinh`
--
ALTER TABLE `tonvinh`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
