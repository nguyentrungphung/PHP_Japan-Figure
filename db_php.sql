-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 16, 2020 lúc 05:25 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaChiTietDonHang` int(10) UNSIGNED NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `GiaBan` int(10) NOT NULL,
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `MaSanPham` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaChiTietDonHang`, `SoLuong`, `GiaBan`, `MaDonDatHang`, `MaSanPham`) VALUES
(72, 1, 2617500, 'DDH00001', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

CREATE TABLE `dondathang` (
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `NgayLap` datetime NOT NULL,
  `TongThanhTien` int(11) NOT NULL,
  `MaTaiKhoan` int(10) UNSIGNED NOT NULL,
  `MaTinhTrang` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dondathang`
--

INSERT INTO `dondathang` (`MaDonDatHang`, `NgayLap`, `TongThanhTien`, `MaTaiKhoan`, `MaTinhTrang`) VALUES
('DDH00001', '2020-06-15 15:21:26', 2617500, 16, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHangSanXuat` int(10) UNSIGNED NOT NULL,
  `TenHangSanXuat` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `LogoURL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHangSanXuat`, `TenHangSanXuat`, `LogoURL`, `BiXoa`) VALUES
(1, 'Japan', '.', 0),
(2, 'China', '', 0),
(3, 'VietNam', '', 0),
(4, 'Thailand', '', 0),
(5, 'Đài Loan', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoaiSanPham` int(10) UNSIGNED NOT NULL,
  `TenLoaiSanPham` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSanPham`, `TenLoaiSanPham`, `BiXoa`) VALUES
(61, 'ActionFigure', 0),
(62, 'Artbook', 0),
(63, 'ChibiFigure', 0),
(64, 'ScaleFigure', 0),
(65, 'Tamagotchi', 0),
(66, 'Các loại khác', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `MaLoaiTaiKhoan` int(10) UNSIGNED NOT NULL,
  `TenLoaiTaiKhoan` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaLoaiTaiKhoan`, `TenLoaiTaiKhoan`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(10) UNSIGNED NOT NULL,
  `TenSanPham` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `HinhURL` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `GiaSanPham` int(11) NOT NULL,
  `PhanTramGiamGia` int(11) NOT NULL,
  `NgayNhap` datetime NOT NULL,
  `SoLuongTon` int(11) NOT NULL,
  `SoLuongBan` int(11) NOT NULL,
  `SoLuocXem` int(11) NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) NOT NULL DEFAULT 0,
  `MaLoaiSanPham` int(10) UNSIGNED NOT NULL,
  `MaHangSanXuat` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `HinhURL`, `GiaSanPham`, `PhanTramGiamGia`, `NgayNhap`, `SoLuongTon`, `SoLuongBan`, `SoLuocXem`, `MoTa`, `BiXoa`, `MaLoaiSanPham`, `MaHangSanXuat`) VALUES
(2, 'FIGMA HEAVILY ARMED HIGH SCHOOL GIRLS ICHI', './images/ActionFigure/1.jpg', 2190000, 10, '2018-11-20 23:42:24', 6, 0, 1, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 61, 1),
(3, 'Mô hình figma: Asuna #178', './images/ActionFigure/2.jpg', 1650000, 10, '2018-11-20 20:42:24', 19, 11, 147, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 61, 2),
(4, '\r\nFigma: Roronoa Zoro – Variable Action Heroe', './images/ActionFigure/3.jpg', 2190000, 20, '2018-11-20 20:42:24', 10, 2, 5, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 61, 1),
(5, '\r\nFigma: Roronoa Zoro – VariableAction Heroes', './images/ActionFigure/4.jpg', 1850000, 15, '2018-11-20 20:42:24', 25, 5, 9, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 61, 1),
(6, '\r\nMô hình mini figure: NezukoKamado ngồi 10cm', './images/ChibiFigure/1.jpg', 2890000, 10, '2018-11-20 20:42:24', 20, 6, 10, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 63, 2),
(7, '\r\nMini Figure: Spider-Man Ngồi Híp Mắt', './images/ChibiFigure/2.jpg', 3490000, 25, '2018-12-20 08:42:24', 8, 7, 13, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 63, 2),
(8, 'Mô hình Figure set: Iron Man bay ngang', './images/ChibiFigure/3.jpg', 1450000, 10, '2018-12-20 08:42:24', 1, 14, 7, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 63, 2),
(9, '\r\nMô hình Mini Figure: Armored Batman', './images/ChibiFigure/4.jpg', 350000, 5, '2018-12-20 08:42:24', 8, 10, 80, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 63, 2),
(10, '\r\nBộ 5 Món: 3 Phi Tiêu Nhựa Kunai Naruto', './images/Tamagotchi/1.jpg', 329000, 5, '2018-12-20 08:42:24', 5, 9, 5, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 65, 2),
(11, '\r\nShuriken Phi Tiêu Nhựa Hoa Thị Spinner', './images/Tamagotchi/2.jpg', 2690000, 10, '2018-11-21 08:42:24', 17, 13, 13, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 65, 1),
(12, '\r\nFigure: Uzumaki Naruto – Rikudou Sennin', './images/Tamagotchi/3.jpg', 2350000, 15, '2018-11-21 08:42:24', 24, 11, 9, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 65, 1),
(13, '\r\nShuriken Phi Tiêu Nhựa 3 Cạnh Spinner', './images/Tamagotchi/4.jpg', 2190000, 15, '2018-11-21 08:42:00', 14, 6, 9, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 65, 1),
(14, 'Mô hình 1', './images/scaleFigure/1.jpg', 1690000, 10, '2018-11-21 08:42:24', 24, 11, 14, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 64, 2),
(15, 'Mô hình 2', './images/scaleFigure/2.jpg', 2050000, 15, '2018-11-20 20:42:24', 0, 35, 25, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 64, 3),
(16, 'Mô hình 3', './images/scaleFigure/3.jpg', 2000000, 10, '2018-11-20 16:00:00', 19, 7, 15, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 64, 2),
(17, 'Mô hình 4', './images/scaleFigure/4.jpg', 1850000, 5, '2018-11-20 16:00:00', 20, 6, 7, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 64, 1),
(18, 'Mô hình 5', './images/scaleFigure/5.jpg', 2000000, 20, '2018-11-20 16:00:00', 20, 17, 7, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 64, 2),
(19, 'Mô hình 6', './images/scaleFigure/6.jpg', 2200000, 20, '2018-11-20 16:00:00', 24, 14, 10, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 64, 2),
(20, '\r\nBộ móc khóa JoJo 15 Món', './images/cacloaikhac/1.jpg', 1200000, 5, '2018-11-20 20:00:00', 30, 15, 13, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 66, 2),
(21, 'Bộ móc khóa Game of Thrones 8 Món – Vàng', './images/cacloaikhac/2.jpg', 1200000, 20, '2018-11-20 20:00:00', 0, 15, 11, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 66, 2),
(22, 'Móc Khóa Mũi Tên Night Hunter LOL Vàng Đồng', './images/cacloaikhac/3.jpg', 3000000, 15, '2018-11-20 20:00:00', 0, 6, 11, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 66, 2),
(23, '\r\nBộ Móc Khóa Fairy Tail 29 Món', './images/cacloaikhac/4.jpg', 1750000, 5, '2018-11-20 20:00:00', 15, 10, 10, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 66, 1),
(24, 'Bộ móc khóa 12 cây đũa phép Harry Potter', './images/cacloaikhac/5.jpg', 1950000, 10, '2018-11-20 07:00:00', 10, 3, 10, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 66, 1),
(25, 'Móc Khóa Kiếm Trắng Hashibira Inosuke', './images/cacloaikhac/6.jpg', 3200000, 5, '2018-11-20 07:00:00', 12, 4, 18, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.\r\n✔ Quan sát kỹ chiều khớp nối để chỉnh, dùng lực vừa phải, bẻ sai chiều sẽ gãy.\r\n✔ Độ tuổi phù hợp: 15+. Không phù hợp trẻ nhỏ dưới 3 tuổi vì có chi tiết nhỏ, góc cạnh nhọn.', 0, 66, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(10) UNSIGNED NOT NULL,
  `TenDangNhap` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenHienThi` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT 1,
  `MaLoaiTaiKhoan` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `TenDangNhap`, `MatKhau`, `TenHienThi`, `DiaChi`, `DienThoai`, `Email`, `BiXoa`, `MaLoaiTaiKhoan`) VALUES
(1, 'phung', '12345', 'Nguyễn Trung Phụng', 'Dĩ An, Bình Dương', '0345655350', 'phung070374@gmail.com', 0, 2),
(2, 'mao', '827ccb0eea8a706c4c34a16891f84e7b', 'Cầm Bá Mão', 'Quận 9', '123456', 'mao@gmail.com', 0, 2),
(3, 'admin', '12345', 'ADMIN', 'Admin', '12345', 'admin@gmail.com', 0, 1),
(7, 'thong', '12345', 'Kiều Nhất Thống', 'Quận 10', '0123456789', 'thong@gmail.com', 1, 2),
(16, 'phung1', '6cf82ee1020caef069e753c67a97a70d', 'Nguyễn Trung Phụng', 'Dĩ An', '0345655350', 'phung12345@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `MaTinhTrang` int(10) UNSIGNED NOT NULL,
  `TenTinhTrang` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrang`
--

INSERT INTO `tinhtrang` (`MaTinhTrang`, `TenTinhTrang`) VALUES
(1, 'Đang xử lý'),
(2, 'Đã giao'),
(3, 'Đã hủy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaChiTietDonHang`),
  ADD KEY `MaDonDatHang` (`MaDonDatHang`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`MaDonDatHang`),
  ADD KEY `MaTaiKhoan` (`MaTaiKhoan`),
  ADD KEY `MaTinhTrang` (`MaTinhTrang`);

--
-- Chỉ mục cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`MaHangSanXuat`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoaiSanPham`);

--
-- Chỉ mục cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`MaLoaiTaiKhoan`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaLoaiSanPham` (`MaLoaiSanPham`),
  ADD KEY `MaHangSanXuat` (`MaHangSanXuat`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`),
  ADD KEY `MaLoaiTaiKhoan` (`MaLoaiTaiKhoan`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`MaTinhTrang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaChiTietDonHang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MaHangSanXuat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLoaiSanPham` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  MODIFY `MaLoaiTaiKhoan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `MaTinhTrang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MaDonDatHang`) REFERENCES `dondathang` (`MaDonDatHang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `dondathang_ibfk_1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`),
  ADD CONSTRAINT `dondathang_ibfk_2` FOREIGN KEY (`MaTinhTrang`) REFERENCES `tinhtrang` (`MaTinhTrang`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaLoaiSanPham`) REFERENCES `loaisanpham` (`MaLoaiSanPham`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`MaHangSanXuat`) REFERENCES `hangsanxuat` (`MaHangSanXuat`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaLoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`MaLoaiTaiKhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
