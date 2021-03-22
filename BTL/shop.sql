-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 04:48 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
`id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`) VALUES
(2, 'uploads/banner2-20210117-111849.jpg'),
(4, 'uploads/banner3-20210117-112255.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_donhang`
--

CREATE TABLE IF NOT EXISTS `chitiet_donhang` (
`id` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `sl` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiet_donhang`
--

INSERT INTO `chitiet_donhang` (`id`, `id_donhang`, `id_sp`, `sl`, `size`, `color`) VALUES
(5, 5, 4, 1, 'L', 'Tím'),
(6, 5, 2, 17, 'X', 'Xanh');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE IF NOT EXISTS `danhmuc` (
`id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten`, `parent`, `image`) VALUES
(1, 'Quần nam', 0, 'uploads/quan-20210115-083307.webp'),
(7, 'Quần joger', 1, 'uploads/jogger-20210115-083354.webp'),
(8, 'Quần jean', 1, 'uploads/quan-20210115-083741.webp'),
(9, 'Quần Tây', 1, 'uploads/tay-20210115-083811.webp'),
(10, 'Quần kaki', 1, 'uploads/kaki-20210115-083850.webp'),
(11, 'Áo Nam', 0, 'uploads/ao-20210115-083917.webp'),
(16, 'Áo Bò', 11, 'uploads/bo-20210115-090426.webp');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `name`, `mail`, `phone`, `address`, `note`, `thanhtien`, `trangthai`) VALUES
(5, 'Phùng Văn Công', 'Cong@gmail.com', '0973643772', '', '', 2579998, 'Mới tạo');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
`id` int(11) NOT NULL,
  `ma_sp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `gia_bandau` int(11) NOT NULL,
  `gia_ban` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `noibat` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `ma_sp`, `ten_sp`, `mota`, `gia_bandau`, `gia_ban`, `id_danhmuc`, `noibat`, `image`, `image1`, `image2`, `image3`, `size`, `color`) VALUES
(1, 'A1', 'Áo ', '12321321321', 0, 111111, 11, 1, 'uploads/1-20210115-042728.webp', '', '', '', 'L,S', 'Đỏ,Vàng'),
(2, 'Q1', 'Áo 2', '12321321321', 0, 111111, 11, 1, 'uploads/1-20210115-042818.webp', '', '', '', 'X,L,S', 'Xanh,Đỏ'),
(4, 'QJ0D1328Xc28', 'Quần Jeans S.W blue ripped 1328', 'Quần jeans SIMWOOD mặc vào là thích luôn. Mẫu mới S.W blue ripped pant// Dòng jeans rách siêu bụi và ngầu. Thiết kế khá trendy, phần rách phối đắp thời trang. Màu light- blue wash rất dễ mix đồ.Form skinny fit, chất jeans co giãn mặc êm & thoải mái.', 680000, 580000, 1, 1, 'uploads/1-20210117-121603.webp', 'uploads/2-20210117-121603.webp', 'uploads/3-20210117-121603.webp', 'uploads/4-20210117-121603.jpg', 'X,L,S', 'Xanh,Đỏ,Tím,Vàng'),
(5, 'QJ0D1327Bc28', 'Quần Jean MUSLAND Denim 1327', 'Black skinny jeans MusL // dòng quần jeans trơn màu full đen siêu đẹp đã lên kệ rồi ae nhé. Chất vải jeans có độ co giãn, mặc thoải mái & giữ màu cực tốt. Form skinny rất đẹp, ôm và tôn dáng.', 600000, 580000, 1, 0, 'uploads/q1-20210118-010034.webp', 'uploads/q2-20210118-010034.webp', 'uploads/q3-20210118-010034.webp', 'uploads/q4-20210118-010034.webp', '28,29,30,31,32', 'Xanh,Đỏ'),
(6, ' QJ0S1326Bc28', 'Quần Jeans Simwood Denim black', 'Thêm 1 màu jean mới quá đẹp từ H2T nha ae. Màu đen xám wash nhẹ mix đồ đảm bảo bao chất luôn. Chất vải jeans mềm mịn, bền màu, co giãn. Form skinny fit ôm dáng gọn đẹp.', 680000, 580000, 1, 0, 'uploads/q11-20210118-011354.webp', 'uploads/q12-20210118-011354.webp', 'uploads/q13-20210118-011354.webp', 'uploads/q14-20210118-011354.webp', '28,29,30', 'Xanh,Đỏ'),
(7, 'QJ0S1315Xc28', 'Quần Jeans S.W.D blue ripped 1315', 'Skinny Jeans SIMWOOD DENIM// Siêu phẩm quần jeans rách gối vừa lên kệ. Chất vải jeans co giãn, mềm mịn, giữ màu tốt. Màu light blue kết hợp với hiệu ứng wash rách thời trang & độc đáo. Form skinny ôm gọn dáng, trẻ trung.', 680000, 500000, 1, 0, 'uploads/q31-20210118-012814.webp', 'uploads/q32-20210118-012814.webp', 'uploads/q33-20210118-012814.webp', 'uploads/q34-20210118-012814.webp', '28,29,30', 'Xanh'),
(8, 'QJ9J0978Xc29', 'Quần jeans nam Q - 0978', '    ', 680000, 580000, 8, 0, 'uploads/a1-20210118-035635.webp', 'uploads/a2-20210118-035635.webp', 'uploads/a3-20210118-035635.jpg', 'uploads/a4-20210118-035635.jpg', '28,29,30,31,32', 'Xanh'),
(9, 'QO0Y1056BcS', 'Quần âu cạp chun QOY0 - 1056', '   ', 420000, 294000, 7, 0, 'uploads/a11-20210118-035918.webp', 'uploads/a12-20210118-035918.webp', 'uploads/a13-20210118-035918.webp', 'uploads/a14-20210118-035918.jpg', '28,29,30', 'Tím'),
(10, 'QR80274Vc34', 'Quần Jogger Nam QR18 - 0274', '       ', 495000, 123750, 7, 1, 'uploads/a21-20210118-040756.webp', 'uploads/a22-20210118-040756.webp', 'uploads/a23-20210118-040756.webp', 'uploads/a24-20210118-040756.webp', '28,30,31', 'Đỏ,Tím'),
(11, 'QC80556Bc28', 'Quần vải cạp trun Q - 0556', '      ', 580000, 145000, 9, 1, 'uploads/t1-20210118-042118.webp', 'uploads/t2-20210118-042118.webp', 'uploads/t3-20210118-042118.webp', 'uploads/t4-20210118-042118.jpg', '28,30', 'Tím'),
(12, 'QA9H0788Gc28', 'Quần Âu MIIX slim fit 0788', '    ', 495000, 420000, 9, 1, 'uploads/t21-20210118-042836.jpg', 'uploads/t22-20210118-042836.jpg', '', '', '28,30', 'Tím');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `taikhoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `taikhoan`, `matkhau`, `quyen`) VALUES
(1, 'cong', '123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
