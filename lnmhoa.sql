-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 02:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lnmhoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idcart` int(255) NOT NULL,
  `idtk` int(255) NOT NULL,
  `madh` varchar(255) NOT NULL,
  `namedh` varchar(255) NOT NULL,
  `addressdh` varchar(255) NOT NULL,
  `teldh` varchar(255) NOT NULL,
  `ghichu` varchar(255) NOT NULL,
  `totalprice` bigint(255) NOT NULL,
  `timedh` varchar(255) NOT NULL,
  `trangthai` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `iddg` int(255) NOT NULL,
  `idtk` int(255) NOT NULL,
  `idsp` int(255) NOT NULL,
  `noidung` varchar(255) DEFAULT NULL,
  `starrate` int(255) NOT NULL,
  `timedg` varchar(255) NOT NULL,
  `chinhsua` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `iddm` int(255) NOT NULL,
  `namedm` varchar(255) NOT NULL,
  `imgdm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`iddm`, `namedm`, `imgdm`) VALUES
(76, 'danh muc 3', 'bdb43f33ee57d63f22baa5143ac39227.png'),
(77, 'danh muc 2', 'afc5b601b4b4e5bc6850baeeb2502801.png'),
(78, 'danh muc 1', 'ee0b3ae06789d20a88aecab34881d65e.png');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `iddh` int(255) NOT NULL,
  `idtk` int(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `idcart` int(255) NOT NULL,
  `idsp` int(255) NOT NULL,
  `namesp` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `totalprice` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imgctsp`
--

CREATE TABLE `imgctsp` (
  `id` int(255) NOT NULL,
  `nameimg` varchar(255) NOT NULL,
  `idsp` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infoweb`
--

CREATE TABLE `infoweb` (
  `view` int(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `urlyoutube` varchar(255) NOT NULL,
  `urlfacebook` varchar(255) NOT NULL,
  `urltwitter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infoweb`
--

INSERT INTO `infoweb` (`view`, `tel`, `email`, `urlyoutube`, `urlfacebook`, `urltwitter`) VALUES
(571, '0836752979', 'lnmhoa2101251@student.ctuet.edu.vn', 'https://www.youtube.com/', 'https://www.facebook.com/', 'https://twitter.com/');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int(255) NOT NULL,
  `namesp` varchar(255) NOT NULL,
  `price` int(255) NOT NULL DEFAULT 0,
  `pricesale` int(255) NOT NULL DEFAULT 0,
  `quantity` int(255) NOT NULL DEFAULT 1,
  `imgsp` varchar(255) DEFAULT NULL,
  `motasp` varchar(9999) DEFAULT NULL,
  `view` int(255) NOT NULL DEFAULT 0,
  `iddm` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `namesp`, `price`, `pricesale`, `quantity`, `imgsp`, `motasp`, `view`, `iddm`) VALUES
(839, 'f12112121', 1000, 0, 1, '6dd146a6cac93724a662330063c6cd1b.jpg', '', 4, 77),
(840, 'gngngnvg', 1000111, 0, 1, 'cddda9e3420867b5337432ff70e55042.jpg', '', 1, 77);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `idtk` int(255) NOT NULL,
  `hoten` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `timedk` varchar(255) NOT NULL,
  `role` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`idtk`, `hoten`, `password`, `avatar`, `tel`, `email`, `address`, `timedk`, `role`) VALUES
(19, '1hoa', '111111', 'c421e7a298a289d540929acd645cb1da.PNG', '0836752979', 'lnmhoa@gmail.com', 'adadad', '2023/08/08', 2),
(35, NULL, '111111', NULL, '0836752911', NULL, NULL, '2023/08/31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`iddg`),
  ADD KEY `lk_danhgia_taikhoan` (`idtk`),
  ADD KEY `lk_danhgia_sanpham` (`idsp`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`iddm`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`iddh`),
  ADD KEY `lk_donhang_cart` (`idcart`),
  ADD KEY `lk_donhang_sanpham` (`idsp`);

--
-- Indexes for table `imgctsp`
--
ALTER TABLE `imgctsp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_imgctsp` (`idsp`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `iddm` (`iddm`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`idtk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `iddg` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `iddm` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `iddh` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `imgctsp`
--
ALTER TABLE `imgctsp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=841;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `idtk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `lk_danhgia_sanpham` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`),
  ADD CONSTRAINT `lk_danhgia_taikhoan` FOREIGN KEY (`idtk`) REFERENCES `taikhoan` (`idtk`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `lk_donhang_cart` FOREIGN KEY (`idcart`) REFERENCES `cart` (`idcart`),
  ADD CONSTRAINT `lk_donhang_sanpham` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`);

--
-- Constraints for table `imgctsp`
--
ALTER TABLE `imgctsp`
  ADD CONSTRAINT `lk_imgctsp` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`iddm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
