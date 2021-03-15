-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 26, 2021 lúc 05:30 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sharecode`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bannerqc`
--

CREATE TABLE `bannerqc` (
  `id` int(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bannerqc`
--

INSERT INTO `bannerqc` (`id`, `link`, `trangthai`) VALUES
(1, 'https://mssqlt.000webhostapp.com/HinhAnh/t%E1%BA%A3i%20xu%E1%BB%91ng.jpg', 0),
(2, 'https://mssqlt.000webhostapp.com/HinhAnh/bn2.jpg', 0),
(3, 'https://mssqlt.000webhostapp.com/HinhAnh/thumbnail-1.png', 1),
(4, 'https://mssqlt.000webhostapp.com/HinhAnh/muahosting.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc1`
--

CREATE TABLE `danhmuc1` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `mota` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc1`
--

INSERT INTO `danhmuc1` (`id`, `ten`, `mota`, `thumbnail`) VALUES
(1, 'Shop Bán Acc', 'Source code shop bán nick game online', 'https://accgame24h.vn/anh/1%20(3)%20(1).jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachcode`
--

CREATE TABLE `danhsachcode` (
  `id` bigint(20) NOT NULL,
  `id_danhmuc` bigint(20) NOT NULL,
  `ten` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `mota` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `gia` bigint(20) NOT NULL,
  `demo` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhsachcode`
--

INSERT INTO `danhsachcode` (`id`, `id_danhmuc`, `ten`, `mota`, `thumbnail`, `gia`, `demo`) VALUES
(1, 1, 'Demo 01', 'Source code bán acc game tự động', 'https://shopgaobac.com/tep-tin/GaoBac2.gif', 100000, 'https://demo01.thuecodeweb.net/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachcode1`
--

CREATE TABLE `danhsachcode1` (
  `id` bigint(20) NOT NULL,
  `id_danhmuc` bigint(20) NOT NULL,
  `ten` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `mota` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `gia` bigint(20) NOT NULL,
  `demo` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `download` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhsachcode1`
--

INSERT INTO `danhsachcode1` (`id`, `id_danhmuc`, `ten`, `mota`, `thumbnail`, `gia`, `demo`, `download`) VALUES
(1, 1, 'Demo 01', 'Source code bán acc game tự động', 'https://shopdat09.com/baner1111.gif', 100000, 'https://demo01.thuecodeweb.net/', 'https://demo01.thuecodeweb.net/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giahan_web`
--

CREATE TABLE `giahan_web` (
  `id` bigint(20) NOT NULL,
  `domain` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `giahan` bigint(20) NOT NULL,
  `trangthai` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `giahan_web`
--

INSERT INTO `giahan_web` (`id`, `domain`, `giahan`, `trangthai`) VALUES
(3, 'top1phim.com', 1, 2),
(4, 'top1phim.com', 3, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu_muasourcecode`
--

CREATE TABLE `lichsu_muasourcecode` (
  `id` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `id_code` bigint(20) NOT NULL,
  `time` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsu_muasourcecode`
--

INSERT INTO `lichsu_muasourcecode` (`id`, `uid`, `id_code`, `time`) VALUES
(1, 1, 1, '26/08/20219 - 07:11:49'),
(2, 1, 1, '26/08/2020 - 07:11:55'),
(3, 1, 1, '24/01/2021 - 02:21:14'),
(4, 1, 1, '24/01/2021 - 02:21:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgia`
--

CREATE TABLE `magiamgia` (
  `id` bigint(20) NOT NULL,
  `magiamgia` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `phantram_giamgia` bigint(20) NOT NULL,
  `loai` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `trangthai` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `luotdung` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `magiamgia`
--

INSERT INTO `magiamgia` (`id`, `magiamgia`, `phantram_giamgia`, `loai`, `trangthai`, `luotdung`) VALUES
(1, 'bd2dbbb6330fe80c933c0ce203ac107f', 10, 'muasourcecode', 'true', 2),
(2, '4d319170a67f22580d5541570cabdcd6', 10, 'muasourcecode', 'false', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manguon`
--

CREATE TABLE `manguon` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `thunb` varchar(255) DEFAULT NULL,
  `idngonngu` int(55) NOT NULL,
  `iduserupdate` int(55) NOT NULL,
  `noidung` varchar(550) NOT NULL,
  `price` int(50) NOT NULL,
  `linkdownload` varchar(50) NOT NULL,
  `luotxem` int(55) NOT NULL,
  `luottai` int(55) NOT NULL,
  `idtheloai` int(55) NOT NULL,
  `idnhomcode` int(50) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manguon`
--

INSERT INTO `manguon` (`id`, `name`, `thunb`, `idngonngu`, `iduserupdate`, `noidung`, `price`, `linkdownload`, `luotxem`, `luottai`, `idtheloai`, `idnhomcode`, `trangthai`, `created`, `updated`) VALUES
(5, 'Library Application In C++ base polymorphism and abstraction', 'code-ung-dung-instagram_mau-191133.jpg', 5, 13, '- App phù hợp vời đồ án.  - sự dụng SQLite   - khi đăng nhập với tài khoản admin sẽ có phần quản lý bộ câu hỏi  - khi đăng nhập với tư cách user sẽ tham gia trả lời trắc nghiệm  - có profile của người dùng  - có tích hợp facebook  - tài khoản admin : admin , pass: admin  - tài khoản user bạn có thể đăng ký.   ', 150000, 'https://github.com/huynhhuy100/InstagramApp', 0, 0, 2, 2, 0, '2021-01-25 10:04:53', NULL),
(6, 'Library Application In C++ base polymorphism and abstraction', 'library-application-in-c-base-polymorphism-and-abstraction-16640.jpg', 5, 1, '<ul>\r\n	<li>\r\n		Project include login and logout for admin and user</li>\r\n	<li>\r\n		Project include manager book , user and employee (include teacher and accountant)</li>\r\n	<li>\r\n		Project have rent book and return book</li>\r\n	<li>\r\n		Project have add, edit, delete and show data for each part</li>\r\n	<li>\r\n		In manager employee use polymorphism and abstraction</li>\r\n	<li>\r\n		Project use read and write file binary and text</li>\r\n</ul>\r\n', 5000, 'https://github.com/DauHoangTaii/Project-Library-Ap', 0, 0, 3, 2, 0, '2021-01-25 10:17:59', '2021-01-25 10:26:24'),
(7, 'Full Teamplate HTML + CSS + Bootstrap 4 - Giao Diện Bán Sách Hiệu Ứng UI/UX Cực Đỉnh + Đầy Đủ Các Trang + Demo', 'full-teamplate-html-css-bootstrap-4---giao-dien-ban-sach-hieu-ung-ui.ux-cuc-dinh-day-du-cac-trang-demo-113158.jpg', 12, 1, 'Teamplate có giao diện cực đẹp và UI cực chất cho mọi người thỏa sức phát triển và sáng tạo. Mời mọi người xem demo để có trải nghiệm tốt nhất. ', 0, 'https://www.mediafire.com/file/0b1hrz2g4kq0y99/boo', 0, 0, 1, 3, 0, '2021-01-25 10:21:01', '2021-01-25 10:26:10'),
(8, 'Code anroid ứng dụng demo Camera', '[thanh-vien-vui-long-bo-sung-them-hinh-anh-demo]-code-anroid-ung-dung-demo-camera-9928.jpg', 13, 1, 'App camera đơn giản cho các bạn tham khảo hoặc triển khai mở rộng nếu muốn ', 50000, 'https://drive.google.com/file/d/1s6Fm1I60Nq0FvT9Ou', 0, 0, 3, 2, 0, '2021-01-25 10:22:16', '2021-01-25 10:25:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `napthe`
--

CREATE TABLE `napthe` (
  `id` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `loaithe` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `menhgia` bigint(20) NOT NULL,
  `serial` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `mathe` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `trangthai` bigint(20) NOT NULL,
  `time` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `napthe`
--

INSERT INTO `napthe` (`id`, `uid`, `loaithe`, `menhgia`, `serial`, `mathe`, `trangthai`, `time`) VALUES
(1, 3, 'VIETTEL', 10000, '1000839281233', '1000839281233', 1, '26/08/2020 - 13:50:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ngonngu`
--

CREATE TABLE `ngonngu` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ngonngu`
--

INSERT INTO `ngonngu` (`id`, `name`, `created_at`, `update_at`) VALUES
(5, 'C/C++', '2021-01-18 18:55:38', NULL),
(6, 'Java', '2021-01-18 18:55:38', NULL),
(7, 'PHP & Mysql', '2021-01-18 18:56:14', NULL),
(8, 'Window form', '2021-01-18 18:56:14', NULL),
(9, 'Joomla', '2021-01-18 20:36:29', NULL),
(10, 'Unity', '2021-01-18 20:36:29', NULL),
(11, 'Asp/Asp.net', '2021-01-18 20:38:54', NULL),
(12, 'Html & Template', '2021-01-18 20:38:54', NULL),
(13, 'Android', '2021-01-25 09:30:33', NULL),
(14, 'IOS', '2021-01-25 09:30:51', NULL),
(15, 'WordPress', '2021-01-25 09:32:48', NULL),
(16, 'Visual Basic', '2021-01-25 09:32:48', NULL),
(17, 'Cocos2D', '2021-01-25 09:33:04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomcode`
--

CREATE TABLE `nhomcode` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomcode`
--

INSERT INTO `nhomcode` (`id`, `name`) VALUES
(1, 'Code Chất Lượng'),
(2, 'Code Tham Khảo'),
(3, 'Code Miễn Phí');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taoweb`
--

CREATE TABLE `taoweb` (
  `id` bigint(20) NOT NULL,
  `uid` bigint(20) NOT NULL,
  `domain` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `id_code` bigint(20) NOT NULL,
  `time1` bigint(20) NOT NULL,
  `time2` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `thanhtoan` bigint(20) NOT NULL,
  `taikhoanadmin` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `matkhauadmin` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `trangthai` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taoweb`
--

INSERT INTO `taoweb` (`id`, `uid`, `domain`, `id_code`, `time1`, `time2`, `thanhtoan`, `taikhoanadmin`, `matkhauadmin`, `trangthai`) VALUES
(1, 1, 'top1phim.com', 1, 598401004, '26/08/2019 - 07:16:44', 4, 'admin', '123456', 2),
(2, 1, 'top1phim.com', 1, 1598401017, '26/08/2020 - 07:16:57', 2, 'admin', '123456', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(55) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `name`) VALUES
(1, 'Website'),
(2, 'Game'),
(3, 'App');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `taikhoan` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `matkhau` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `tien` bigint(20) NOT NULL,
  `chucvu` bigint(20) NOT NULL,
  `time` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `band` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `taikhoan`, `matkhau`, `tien`, `chucvu`, `time`, `band`) VALUES
(1, 'admin', 'hello', 200000000, 9, '26/08/2020 - 05:47:33', 0),
(2, 'Caovanhuy', 'Caovanhuy', 0, 1, '26/08/2020 - 07:55:19', 0),
(3, 'thanhvien', 'thanhvien', 0, 1, '26/08/2020 - 08:38:26', 0),
(4, 'zxc', 'zxc', 0, 1, '26/08/2020 - 09:00:36', 0),
(5, 'hihihihi', 'hihihihi', 0, 1, '26/08/2020 - 09:40:55', 0),
(6, '&lt;script&gt;alert(document.cookie)&lt;/script&gt;', '123123', 0, 1, '26/08/2020 - 10:08:12', 0),
(7, 'hahahaaza1', 'hahahaaza1', 0, 9, '26/08/2020 - 10:46:43', 0),
(8, '&lt;script&gt;alert(\'hi\');&lt;/script&gt;', '&lt;script&gt;alert(\'hi\');&lt;/script&gt;', 0, 1, '26/08/2020 - 12:44:53', 0),
(9, 'zeldris', 'zeldris', 0, 1, '26/08/2020 - 13:06:54', 0),
(10, 'chubedo', 'chubedo123', 0, 1, '26/08/2020 - 14:19:57', 0),
(11, 'Quachgiaogiao@gmail.com', '123456', 0, 1, '21/01/2021 - 09:21:05', 0),
(12, 'Quchgiaogiao@gmail.com', '123456', 0, 1, '21/01/2021 - 09:30:16', 0),
(13, 'Quachgiaao@gmail.com', '123456', 0, 1, '21/01/2021 - 10:34:31', 0),
(14, 'Quachgi@gmail.com', '123456', 0, 1, '21/01/2021 - 10:37:03', 0),
(15, 'Quachgiddaao@gmail.com', '123456', 0, 1, '24/01/2021 - 01:21:56', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bannerqc`
--
ALTER TABLE `bannerqc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc1`
--
ALTER TABLE `danhmuc1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhsachcode`
--
ALTER TABLE `danhsachcode`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhsachcode1`
--
ALTER TABLE `danhsachcode1`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giahan_web`
--
ALTER TABLE `giahan_web`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsu_muasourcecode`
--
ALTER TABLE `lichsu_muasourcecode`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `manguon`
--
ALTER TABLE `manguon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `napthe`
--
ALTER TABLE `napthe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ngonngu`
--
ALTER TABLE `ngonngu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhomcode`
--
ALTER TABLE `nhomcode`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taoweb`
--
ALTER TABLE `taoweb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bannerqc`
--
ALTER TABLE `bannerqc`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danhmuc1`
--
ALTER TABLE `danhmuc1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhsachcode`
--
ALTER TABLE `danhsachcode`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danhsachcode1`
--
ALTER TABLE `danhsachcode1`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `giahan_web`
--
ALTER TABLE `giahan_web`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lichsu_muasourcecode`
--
ALTER TABLE `lichsu_muasourcecode`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `manguon`
--
ALTER TABLE `manguon`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `napthe`
--
ALTER TABLE `napthe`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `ngonngu`
--
ALTER TABLE `ngonngu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `nhomcode`
--
ALTER TABLE `nhomcode`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `taoweb`
--
ALTER TABLE `taoweb`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
