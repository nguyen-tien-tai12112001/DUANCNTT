-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 05:15 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pointmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `maadmin` varchar(6) NOT NULL,
  `hovaten` varchar(200) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `cmnd` varchar(12) NOT NULL,
  `ngaysinh` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 4,
  `gioitinh` varchar(500) NOT NULL DEFAULT 'nam',
  `password` varchar(50) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `maadmin`, `hovaten`, `diachi`, `email`, `dienthoai`, `cmnd`, `ngaysinh`, `image`, `role_id`, `gioitinh`, `password`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'AD1000', 'Nguyễn Hải Đăng', 'Hà nội', ' AD1000@thanglong.edu.vn', '09880000', '123', '2022-02-07', 'https://laptopworld.vn/media/product/9005_asus_vivobook_x413ja__4.jpg', 4, 'Nam', '123456', 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `chuyennganh`
--

CREATE TABLE `chuyennganh` (
  `id` int(11) NOT NULL,
  `machuyennganh` varchar(10) NOT NULL,
  `tenchuyennganh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chuyennganh`
--

INSERT INTO `chuyennganh` (`id`, `machuyennganh`, `tenchuyennganh`) VALUES
(9, '7480201', 'Công nghệ thông tinn'),
(10, '7480102', 'Mạng máy tính và truyền thông dữ liệu'),
(11, '7480104', 'Hệ thống thông tin'),
(12, '7340201', 'Khoa học máy tính'),
(13, '7480207', 'Trí tuệ nhân tạo'),
(14, '784802012', 'gfgfdggfg');

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `id` int(11) NOT NULL,
  `magiangvien` varchar(6) NOT NULL,
  `hovaten` varchar(200) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `cmnd` varchar(12) NOT NULL,
  `ngaysinh` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `gioitinh` varchar(500) NOT NULL DEFAULT 'nam',
  `password` varchar(50) NOT NULL,
  `chuyennganh` varchar(10) NOT NULL,
  `ChuNhiem` varchar(10) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`id`, `magiangvien`, `hovaten`, `diachi`, `email`, `dienthoai`, `cmnd`, `ngaysinh`, `image`, `role_id`, `gioitinh`, `password`, `chuyennganh`, `ChuNhiem`, `trangthai`, `created_at`, `updated_at`) VALUES
(34, 'GV1000', 'Nguyễn Văn A', 'Hà Nội', 'GV1000@thanglong.edu.vn', '0359312185', '123456789123', '2022-02-10', '', 3, 'nam', 'GV1000', '', '', 1, '0000-00-00', '0000-00-00'),
(35, 'GV1001', 'Đậu Hải Phong', 'Hà Nội', ' GV1001@thanglong.edu.vn', '0359312185', '123456789123', '2022-02-10', '', 2, 'Nam', 'GV1001', '7480201', '', 1, '0000-00-00', '0000-00-00'),
(36, 'GV1002', 'Nguyễn Văn B', 'Sơn dươngggg', 'GV1002@thanglong.edu.vn', '0359321556', '245525725411', '2022-03-23', 'https://picsum.photos/536/354', 3, 'Nam', '123456', '', '', 1, '0000-00-00', '0000-00-00'),
(37, 'GV1003', 'Nguyễn Hà Thanh', 'Hà Nội', 'GV1003@thanglong.edu.vn', '0359321856', '123456789123', '1993-07-08', '', 2, 'Nam', 'GV1003', '7480201', '', 1, '0000-00-00', '0000-00-00'),
(38, 'GV1004', 'Nguyễn Đức Thắng', 'Hà Nội', 'GV1004@thanglong.edu.vn', '0359321856', '123456789123', '2022-03-07', '', 2, 'Nam', 'GV1004', '7480102', '', 1, '0000-00-00', '0000-00-00'),
(39, 'GV1005', 'Trần Quang Duy', 'Hà Nội', 'GV1005@thanglong.edu.vn', '0359321856', '123456789123', '2022-03-09', '', 2, 'Nam', 'GV1005', '7480201', '', 1, '0000-00-00', '0000-00-00'),
(40, 'GV1006', 'Nguyễn Mạnh Hùng', 'Hà Nội', 'GV1006@thanglong.edu.vn', '0359321856', '123456789123', '2022-03-06', '', 2, 'Nam', 'GV1006', '7480201', '', 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `giangvienmonhoc`
--

CREATE TABLE `giangvienmonhoc` (
  `id` int(11) NOT NULL,
  `magiangvien` varchar(6) NOT NULL,
  `mamon` varchar(6) NOT NULL,
  `lop` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `giangvienmonhoc`
--

INSERT INTO `giangvienmonhoc` (`id`, `magiangvien`, `mamon`, `lop`) VALUES
(24, 'GV1005', 'IS322', 'A202'),
(25, 'GV1006', 'IT380', 'A203'),
(26, 'GV1003', 'CS311', 'A202'),
(27, 'GV1001', 'IT320', 'A202');

-- --------------------------------------------------------

--
-- Table structure for table `gv-sv-lop`
--

CREATE TABLE `gv-sv-lop` (
  `id` int(11) NOT NULL,
  `magiangvien` varchar(6) NOT NULL,
  `mamon` varchar(6) NOT NULL,
  `malop` varchar(6) NOT NULL,
  `masinhvien` varchar(6) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gv-sv-lop`
--

INSERT INTO `gv-sv-lop` (`id`, `magiangvien`, `mamon`, `malop`, `masinhvien`, `trangthai`) VALUES
(44, 'GV1003', 'CS311', 'A203', 'A36643', 1),
(46, 'GV1005', 'IS322', 'A202', 'A36643', 1),
(48, 'GV1001', 'IT320', 'A202', 'A36643', 1),
(49, 'GV1005', 'IS322', 'A202', 'A36644', 1),
(50, 'GV1006', 'IT380', 'A203', 'A36644', 1),
(54, 'GV1005', 'IS322', 'A202', 'A36645', 1),
(55, 'GV1006', 'IT380', 'A203', 'A36645', 1),
(56, 'GV1001', 'IT320', 'A202', 'A36645', 1),
(57, 'GV1003', 'CS311', 'A202', 'A36645', 1),
(58, 'GV1005', 'IS322', 'A202', 'A36647', 1),
(59, 'GV1006', 'IT380', 'A203', 'A36647', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lickdkhoc`
--

CREATE TABLE `lickdkhoc` (
  `id` int(11) NOT NULL,
  `mamon` varchar(6) NOT NULL,
  `ngaybatdau` datetime NOT NULL,
  `ngayketthuc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lickdkhoc`
--

INSERT INTO `lickdkhoc` (`id`, `mamon`, `ngaybatdau`, `ngayketthuc`) VALUES
(77, 'IS322', '2022-03-11 09:41:00', '2022-03-11 09:45:00'),
(78, 'IT380', '2022-03-11 09:41:00', '2022-03-11 09:45:00'),
(79, 'IT320', '2022-03-11 09:41:00', '2022-03-11 09:45:00'),
(80, 'CS311', '2022-03-11 09:41:00', '2022-03-11 09:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `id` int(11) NOT NULL,
  `malop` varchar(11) NOT NULL,
  `tenlop` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`id`, `malop`, `tenlop`) VALUES
(1, 'A201', 'A201'),
(2, 'A202', 'A202'),
(3, 'A203', 'A203'),
(4, 'A303', 'A303'),
(5, 'A305', 'A305');

-- --------------------------------------------------------

--
-- Table structure for table `lopcn`
--

CREATE TABLE `lopcn` (
  `id` int(11) NOT NULL,
  `malop` varchar(10) NOT NULL,
  `tenlop` varchar(10) NOT NULL,
  `chuyennganh` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lopcn`
--

INSERT INTO `lopcn` (`id`, `malop`, `tenlop`, `chuyennganh`) VALUES
(14, 'TT32G1', 'TT32G1', '7480201'),
(15, 'TT32H1', 'TT32H1', '7480201'),
(16, 'TT32H4', 'TT32H4', '7480201'),
(17, 'TE32H1', 'TE32H1', '7480104');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `id` int(11) NOT NULL,
  `mamon` varchar(10) NOT NULL,
  `tenmon` varchar(100) NOT NULL,
  `sotinchi` int(11) NOT NULL,
  `chuyennganh` varchar(10) NOT NULL,
  `ca` varchar(20) NOT NULL,
  `thu` varchar(20) NOT NULL,
  `ngaythi` date NOT NULL,
  `cathi` varchar(20) DEFAULT NULL,
  `giatien` int(11) NOT NULL DEFAULT 1200000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`id`, `mamon`, `tenmon`, `sotinchi`, `chuyennganh`, `ca`, `thu`, `ngaythi`, `cathi`, `giatien`) VALUES
(52, 'IS322', 'Hệ quản trị cơ sở dữ liệu', 3, '7480201', '1-2', 'Thứ 2', '0000-00-00', NULL, 1200000),
(54, 'IT380', 'Dự án công nghệ thông tin', 4, '7480201', '1-2', 'Thứ 2', '2022-03-11', '6-9', 1600000),
(56, 'IT320', 'Python', 3, '7480201', '1-2', 'Thứ 2', '2022-03-11', '1-2', 1200000),
(57, 'CS311', 'Lập trình ứng dụng di động', 3, '7480201', '1-2', 'Thứ 2', '0000-00-00', NULL, 1200000),
(58, 'CF231', 'Lý thuyết thông tin và mã hóa', 3, '7480102', '1-5', 'Thứ 4', '2022-03-07', '1-5', 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id` int(11) NOT NULL,
  `masinhvien` varchar(6) NOT NULL,
  `hovaten` varchar(200) NOT NULL,
  `gioitinh` varchar(50) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dienthoai` varchar(10) NOT NULL,
  `cmnd` varchar(12) NOT NULL,
  `ngaysinh` date NOT NULL,
  `image` varchar(2000) NOT NULL,
  `GVCN` varchar(6) NOT NULL,
  `lop` varchar(10) NOT NULL,
  `chuyennganh` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `trangthai_sv` varchar(200) NOT NULL DEFAULT 'Đang học',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`id`, `masinhvien`, `hovaten`, `gioitinh`, `diachi`, `email`, `dienthoai`, `cmnd`, `ngaysinh`, `image`, `GVCN`, `lop`, `chuyennganh`, `password`, `role_id`, `trangthai_sv`, `created_at`, `updated_at`) VALUES
(19, 'A36643', 'Nguyễn Tiến Tài', 'Nam', 'Bắc Ninh', 'A36643@gmail.com', '0396577225', '001201008477', '2022-03-02', 'https://picsum.photos/536/354', 'GV1002', 'TT32H1', '7480201', '123456', 1, 'Đang học', '0000-00-00', '0000-00-00'),
(22, 'A36644', 'Nguyễn Văn Minh', 'Nam', 'Hà Nội', 'A36644@thanglong.edu.vn', '0359321856', '123456789123', '2022-03-14', '', 'GV1001', 'TT32H4', '7480201', 'A36644', 1, 'Đang học', '0000-00-00', '0000-00-00'),
(23, 'A36645', 'Nguyễn Thái Dương', 'Nam', 'Hà Nội', 'A36645@thanglong.edu.vn', '0359321856', '123456789123', '2022-03-23', '', 'GV1005', 'TT32G1', '7480201', 'A36645', 1, 'Đang học', '0000-00-00', '0000-00-00'),
(24, 'A36646', 'Đặng Tuấn Anh', 'Nam', 'Hà Giang', 'A36646@thanglong.edu.vn', '0359321856', '123456789123', '2022-03-15', '', 'GV1005', 'TT32G1', '7480201', 'A36646', 1, 'Đang học', '0000-00-00', '0000-00-00'),
(25, 'A36647', 'Nguyễn Hải Đăng', 'Nam', 'Hà Nội', 'A36647@thanglong.edu.vn', '0359321856', '123456789123', '2022-03-15', '', 'GV1001', 'TT32G1', '7480201', 'A36647', 1, 'Đang học', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien-diemmon`
--

CREATE TABLE `sinhvien-diemmon` (
  `id` int(11) NOT NULL,
  `masinhvien` varchar(6) NOT NULL,
  `mamon` varchar(10) NOT NULL,
  `diemquatrinh` float DEFAULT NULL,
  `diemcuoiky` float DEFAULT NULL,
  `diemtongket` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sinhvien-diemmon`
--

INSERT INTO `sinhvien-diemmon` (`id`, `masinhvien`, `mamon`, `diemquatrinh`, `diemcuoiky`, `diemtongket`) VALUES
(30, 'A36643', 'CS311', 8, 7, 7.4),
(32, 'A36643', 'IS322', 5, 10, 7.5),
(34, 'A36643', 'IT320', 7, 6, 6.4),
(35, 'A36644', 'IS322', 6, 7, 6.6),
(36, 'A36644', 'IT380', 7, 10, 10),
(40, 'A36645', 'IS322', 8, 4, 5.6),
(41, 'A36645', 'IT380', 7, 7, 7),
(42, 'A36645', 'IT320', 8, 9, 9),
(43, 'A36645', 'CS311', 9, 10, 10),
(44, 'A36647', 'IS322', NULL, NULL, NULL),
(45, 'A36647', 'IT380', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuyennganh`
--
ALTER TABLE `chuyennganh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giangvienmonhoc`
--
ALTER TABLE `giangvienmonhoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gv-sv-lop`
--
ALTER TABLE `gv-sv-lop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lickdkhoc`
--
ALTER TABLE `lickdkhoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lopcn`
--
ALTER TABLE `lopcn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sinhvien-diemmon`
--
ALTER TABLE `sinhvien-diemmon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chuyennganh`
--
ALTER TABLE `chuyennganh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `giangvienmonhoc`
--
ALTER TABLE `giangvienmonhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `gv-sv-lop`
--
ALTER TABLE `gv-sv-lop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `lickdkhoc`
--
ALTER TABLE `lickdkhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lopcn`
--
ALTER TABLE `lopcn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sinhvien-diemmon`
--
ALTER TABLE `sinhvien-diemmon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
