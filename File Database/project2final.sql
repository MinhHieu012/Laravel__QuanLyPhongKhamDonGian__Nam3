-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2022 lúc 08:26 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project2final`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `isDoctor` tinyint(1) DEFAULT NULL,
  `isCustomer` tinyint(1) DEFAULT NULL,
  `phones` varchar(13) DEFAULT NULL,
  `date_of_births` date DEFAULT NULL,
  `genders` varchar(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `username`, `password`, `isAdmin`, `isDoctor`, `isCustomer`, `phones`, `date_of_births`, `genders`, `address`, `created_at`, `updated_at`, `email_verified_at`, `remember_token`) VALUES
(67, 'Lê Minh Hiếu', 'Admin', '$2y$10$lyY7/nAcddzyQB8fv471iOp07MpEEicWUR8gx0nsxH3IzT3jvn7re', 1, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-22 03:59:16', '2022-12-22 03:59:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `appointment_schedules`
--

CREATE TABLE `appointment_schedules` (
  `id` int(11) NOT NULL,
  `names` varchar(45) NOT NULL,
  `phones` varchar(13) NOT NULL,
  `dates` date NOT NULL,
  `times` varchar(50) NOT NULL,
  `prices` varchar(40) NOT NULL,
  `payment_status` tinyint(1) DEFAULT NULL,
  `appointment_status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `accounts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `appointment_schedules`
--
ALTER TABLE `appointment_schedules`
  ADD PRIMARY KEY (`id`,`accounts_id`),
  ADD KEY `fk_appointment_schedules_accounts_idx` (`accounts_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `appointment_schedules`
--
ALTER TABLE `appointment_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `appointment_schedules`
--
ALTER TABLE `appointment_schedules`
  ADD CONSTRAINT `fk_appointment_schedules_accounts` FOREIGN KEY (`accounts_id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
