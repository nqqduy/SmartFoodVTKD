-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 04, 2020 lúc 03:42 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bk-food`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cac_thuc_pham`
--

CREATE TABLE `cac_thuc_pham` (
  `cac_thuc_pham_id` int(10) NOT NULL,
  `cac_thuc_pham_title` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cac_thuc_pham`
--

INSERT INTO `cac_thuc_pham` (`cac_thuc_pham_id`, `cac_thuc_pham_title`) VALUES
(1, 'Mì'),
(2, 'Bánh'),
(3, 'Nước'),
(4, 'Cơm'),
(5, 'Ăn vặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quality` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(3, 18, 38000, 1733157148, 3, '2020-08-03 04:36:48', 'Pending'),
(4, 18, 35000, 410321533, 2, '2020-08-03 04:57:10', 'Pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pending_order`
--

CREATE TABLE `pending_order` (
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_loai` int(100) NOT NULL,
  `product_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `product_gia` int(100) NOT NULL,
  `product_mota` text COLLATE utf8_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8_unicode_ci NOT NULL,
  `product_keywords` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_cat`, `product_loai`, `product_title`, `product_gia`, `product_mota`, `product_image`, `product_keywords`) VALUES
(5, 1, 4, 'Cơm thập cẩm', 25000, 'Cơm thập cẩm ngon bổ rẻ', '5.jpg', ''),
(6, 1, 5, 'Gà chiên', 15000, 'Hộp gà chiên gồm 1 đùi gà', 'gachien.jpg', ''),
(7, 2, 3, 'Cà phê', 7000, 'Cà phê thưởng thức vào buổi trưa của sinh viên', 'cafe.png', ''),
(8, 2, 3, 'Trà sửa', 15000, 'Trà sửa nhà làm, ngon như mẹ nấu', 'trasua.jpg', ''),
(9, 2, 3, 'Nước ngọt', 8000, 'Nước ngọt các loại', 'ngot.webp', ''),
(11, 1, 2, 'Bánh quy', 15000, 'Bánh quy chất lượng', 'banhquy.jpg', ''),
(14, 2, 3, 'Trà sữa đường đen', 20000, 'Trà sữa mẹ làm', 'trasua.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`cat_id`, `cat_title`) VALUES
(1, 'Thực phẩm'),
(2, 'Nước uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ip_address`, `name`, `email`, `password`, `image`, `role`) VALUES
(1, '', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 'admin'),
(18, '::1', 'Nguyễn Quốc Duy A', 'duy.nguyen1332000@hcmut.edu.vn', 'e5e18a16d77837a56a5fbbc08cedc699', 'maxresdefault.jpg', 'guest');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cac_thuc_pham`
--
ALTER TABLE `cac_thuc_pham`
  ADD PRIMARY KEY (`cac_thuc_pham_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cac_thuc_pham`
--
ALTER TABLE `cac_thuc_pham`
  MODIFY `cac_thuc_pham_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
