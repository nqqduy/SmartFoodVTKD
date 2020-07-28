-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 28, 2020 lúc 07:06 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `list_order`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bk12`
--

CREATE TABLE `bk12` (
  `stt` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Product_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bk12`
--

INSERT INTO `bk12` (`stt`, `Product_id`, `Product_title`, `Quantity`) VALUES
(1, 5, 'Cơm thập cẩm', 2),
(2, 6, 'Gà chiên', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bk22`
--

CREATE TABLE `bk22` (
  `stt` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Product_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bk54`
--

CREATE TABLE `bk54` (
  `stt` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Product_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bk76`
--

CREATE TABLE `bk76` (
  `stt` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Product_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bk76`
--

INSERT INTO `bk76` (`stt`, `Product_id`, `Product_title`, `Quantity`) VALUES
(1, 12, 'Chè đậu đen', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bk88`
--

CREATE TABLE `bk88` (
  `stt` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Product_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bk88`
--

INSERT INTO `bk88` (`stt`, `Product_id`, `Product_title`, `Quantity`) VALUES
(1, 14, 'Trà sữa đường đen', 6),
(2, 11, 'Bánh quy', 2),
(3, 3, 'Cà phê', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bk93`
--

CREATE TABLE `bk93` (
  `stt` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Product_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bk93`
--

INSERT INTO `bk93` (`stt`, `Product_id`, `Product_title`, `Quantity`) VALUES
(1, 3, 'Sinh tố bơ', 12);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bk12`
--
ALTER TABLE `bk12`
  ADD PRIMARY KEY (`stt`);

--
-- Chỉ mục cho bảng `bk76`
--
ALTER TABLE `bk76`
  ADD PRIMARY KEY (`stt`);

--
-- Chỉ mục cho bảng `bk88`
--
ALTER TABLE `bk88`
  ADD PRIMARY KEY (`stt`);

--
-- Chỉ mục cho bảng `bk93`
--
ALTER TABLE `bk93`
  ADD PRIMARY KEY (`stt`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bk12`
--
ALTER TABLE `bk12`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bk76`
--
ALTER TABLE `bk76`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bk88`
--
ALTER TABLE `bk88`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bk93`
--
ALTER TABLE `bk93`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
