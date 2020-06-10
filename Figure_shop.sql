-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 10, 2020 lúc 08:07 AM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecommerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CateID` int(11) NOT NULL,
  `CategoryName` varchar(150) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CateID`, `CategoryName`, `Description`) VALUES
(1, 'Figure', 'Mô hình cứng'),
(2, 'Figma', 'Mô hình cử động'),
(3, 'Phụ kiện', 'Phụ kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderproduct`
--

CREATE TABLE `orderproduct` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `ShipDate` datetime NOT NULL,
  `ShipName` varchar(150) NOT NULL,
  `ShipAddress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(150) DEFAULT NULL,
  `CateID` int(11) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Picture` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `CateID`, `Price`, `Quantity`, `Description`, `Picture`) VALUES
(4, 'Mô hình figure: Madara Uchiha', 1, 675000, 5, 'Nhân vật: Madara Uchiha\r\n✔ Anime/Manga: Naruto Shippuden\r\n✔ Cao khoảng 32cm\r\n✔ Nhựa PVC\r\n✔ Nặng khoảng 1kg\r\n✔ Kích thước hộp: 26x22x36cm\r\n✔ Mô hình tĩnh, không cử động khớp', 'fig508-madara-uchiha-gk-1.jpg'),
(5, 'Mô hình figure: Asuna Tóc Xanh Biển Alo Ver', 1, 520000, 3, '✔ Nhân vật: Asuna Yuuki\r\n✔ Anime/Manga: Sword Art Online\r\n✔ Cao khoảng 23cm\r\n✔ Nhựa PVC\r\n✔ Nặng 0.8kg\r\n✔ Kích thước hộp: 25x20x32cm', 'fig465-asuna-alo-ver-1.jpg'),
(6, 'Mô hình action figure: Super Saiyan Blue Son Goku Áo Cam', 2, 520000, 12, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 16cm. Nhựa PVC\r\n✔ Nặng khoảng 0.2kg. Kích thước hộp: 15×4.5x18cm\r\n✔ Mô hình cử động khớp và thay đổi phụ kiện.\r\n✔ Có thể tạo nhiều kiểu dáng/tư thế cho mô hình.', 'figm032-super-saiyan-blue-son-goku-ao-cam-shf-1.jpg'),
(8, 'Mô hình figure: Son Goku 1 Tay Che Mặt', 1, 170000, 2, '✔ Nhân vật: Son Goku\r\n✔ Anime/Manga: 7 Viên Ngọc Rồng – Dragon Ball\r\n✔ Cao khoảng 20cm\r\n✔ Nhựa PVC\r\n✔ Nặng khoảng 0.3kg\r\n✔ Kích thước hộp: 15x10x20cm\r\n✔ Mô hình tĩnh, không cử động khớp\r\n✔ Độ tuổi phù hợp: 15+. Dưới độ tuổi này phụ huynh cân nhắc khi mua cho con chơi vì có thể bé chưa đủ tư duy để chơi.', 'fig457-son-goku-1-tay-che-mat-1.jpg'),
(9, 'Móc Khóa Kiếm Kirito Đen', 3, 90000, 2, 'Anime/Manga: Sword Art Online\r\nChất liệu kim loại\r\nVỏ kiếm dài khoảng 14cm, từ cán đến lưỡi khoảng 17cm.\r\nNặng khoảng 0.06kg\r\nĐộ tuổi phù hợp 15+', 'mk044-moc-khoa-kiem-kirito-den-1.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CateID`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`OrderID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CateID` (`CateID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orderproduct` (`OrderID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CateID`) REFERENCES `category` (`CateID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
