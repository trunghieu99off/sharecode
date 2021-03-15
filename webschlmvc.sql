-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2020 lúc 03:10 AM
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
-- Cơ sở dữ liệu: `webschlmvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Nắng Say', 'TP TDM', 'ltchuong99@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0333936228', 1, '2020-09-18 23:11:15', '2020-09-27 00:16:20'),
(8, 'Nguyễn Thị Hồng Hơn ', 'TP TDM', 'honguyen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0333936228', 1, '2020-09-25 03:18:44', NULL),
(9, 'ltchuong99ưewwe@gmail.com', 'TP TDM', 'ltchuong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0333936228', 1, '2020-09-27 00:12:04', NULL),
(10, 'adsdsds', 'tdm', 'chuong@gmail.com', 'c26be8aaf53b15054896983b43eb6a65', '112345645', 1, '2020-09-27 00:16:55', '2020-09-27 00:18:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `Images` varchar(100) DEFAULT NULL,
  `Banner` varchar(100) DEFAULT NULL,
  `Home` tinyint(4) DEFAULT 0,
  `Status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `Images`, `Banner`, `Home`, `Status`, `created_at`, `update_at`) VALUES
(40, 'Sữa chua', 'sua-chua', NULL, NULL, 1, 1, '2020-09-12 02:56:39', '2020-09-19 01:08:36'),
(41, 'Topping', 'topping', NULL, NULL, 1, 1, '2020-09-12 02:56:49', '2020-09-19 01:08:36'),
(42, 'Trà sữa', 'tra-sua', NULL, NULL, 0, 1, '2020-09-12 02:57:00', '2020-09-19 01:08:38'),
(43, 'Nước ngọt', 'nuoc-ngot', NULL, NULL, 0, 1, '2020-09-12 02:57:06', '2020-09-19 01:08:33'),
(44, 'Cafe', 'cafe', NULL, NULL, 0, 1, '2020-09-12 02:57:12', '2020-09-19 01:08:32'),
(45, 'Ăn  vặt', 'an-vat', NULL, NULL, 0, 1, '2020-09-12 02:57:17', '2020-09-12 02:57:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `commentproduct`
--

CREATE TABLE `commentproduct` (
  `id` int(11) NOT NULL,
  `productid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `commentproduct`
--

INSERT INTO `commentproduct` (`id`, `productid`, `name`, `content`) VALUES
(18, 6, 'Lê Thế Chương', 'Hello');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `linknew` varchar(255) DEFAULT NULL,
  `linkthunbar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `info`, `linknew`, `linkthunbar`) VALUES
(1, 'SĂN TEM ĐỔI QUÀ KHUNG MÙA HALLOWEEN\r\n', 'Không khí Halloween đã len lỏi khắn nơi với những món đồ ma quỷ bày bán khắp đường phố, tất nhiên Sữa chua trân châu Hạ […]', 'https://suachuatranchauhalong.vn/san-tem-doi-qua-khung-mua-halloween/', 'https://suachuatranchauhalong.vn/wp-content/uploads/2020/10/banner-04.png'),
(2, 'KHAI TRƯƠNG RỘN RÀNG – NGẬP TRÀN ƯU ĐÃI – CƠ SỞ 191', '????KHAI TRƯƠNG RỘN RÀNG – NGẬP TRÀN ƯU ĐÃI – CƠ SỞ 191???? ????SCTCHL tiếp tục càn quét giới trẻ Phan Thiết, ngày 4/10 này, chính […]', 'https://suachuatranchauhalong.vn/khai-truong-ron-rang-ngap-tran-uu-dai-co-so-191/', 'https://suachuatranchauhalong.vn/wp-content/uploads/2020/10/176-1.png'),
(3, 'CHÀO ĐÓN NGÔI NHÀ THỨ 190 CỦA SCTCHL TẠI 38 LÊ DUẨN, PHAN THIẾT', 'Thương hiệu sữa chua trân châu Hạ Long siêu đình đám nay đã có thêm 1 cơ sở tại Phan Thiết rồi nè các fan sữa chua ơi . Với menu siêu nhiều món hay ho mát lạnh, hương vị không lẫn vào đâu được và toping thì tràn trề , mê lắm luôn.', 'https://suachuatranchauhalong.vn/chao-don-ngoi-nha-thu-190-cua-sctchl-tai-38-le-duan-phan-thiet/', 'https://suachuatranchauhalong.vn/wp-content/uploads/2020/10/175-1.png'),
(4, 'RỘN RÀNG KHAI TRƯƠNG – ƯU ĐÃI NGẬP TRÀN TẠI CS195', 'Vũ trụ được tạo ra từ 11 chiều, nhưng chiều thứ 6 mới là ngày chúng mình mong ???? Vì saooo ư? Bởi vì đó là ngày ???????????????? ????????????̛????̛???????? chính thức cửa hàng cơ sở 195 tại 99 Kim Anh, Sóc Sơn, HN – với hàng loạt những điều bất ngờ đang ', 'https://suachuatranchauhalong.vn/ron-rang-khai-truong-uu-dai-ngap-tran-tai-cs195/', 'https://suachuatranchauhalong.vn/wp-content/uploads/2020/10/215-01.png'),
(5, 'DÂN TÌNH RẦN RẦN KÉO NHAU CHECK-IN “CUNG ĐIỆN ĐỎ” CỦA SỮA CHUA TRÂN CHÂU HẠ LONG', 'SẮP ĐẾN TẾT TRUNG THU RỒI, MỌI NGƯỜI CÓ KẾ HOẠCH ĐI ĐÂU CHECK-IN CHƯA? ĐỪNG LO LẮNG KHI SỮA CHUA TRÂN CHÂU HẠ LONG ĐÃ CHUẨN BỊ CHO CÁC BẠN “CUNG ĐIỆN ĐỎ” VÔ CÙNG RỰC RỠ VÀ NGẬP TRÀN KHÔNG KHÍ TRUNG THU.', 'https://suachuatranchauhalong.vn/dan-tinh-ran-ran-keo-nhau-check-in-cung-dien-do-cua-sua-chua-tran-chau-ha-long/', 'https://suachuatranchauhalong.vn/wp-content/uploads/2020/09/photo-1-16010123240111845261616.jpg'),
(6, 'TƯNG BỪNG KHAI TRƯƠNG CƠ SỞ 174 – KHUYẾN MÃI NGẬP TRÀN', 'Cơn bão Sữa chua trân châu Hạ Long tiếp tục càn quét giới trẻ Hà Nội và chính thức đổ bộ tại Vinhomes Ocean Park, Đa Tốn, Gia Lâm vào ngày 26/9. Và tất nhiên không thể thiếu những ữu đãi siêu hời dành cho các bạn rồi!!', 'https://suachuatranchauhalong.vn/tung-bung-khai-truong-co-so-174-khuyen-mai-ngap-tran/', 'https://suachuatranchauhalong.vn/wp-content/uploads/2020/09/164-1.png'),
(7, 'TƯNG BỪNG KHAI TRƯƠNG – RỘN RÀNG ƯU ĐÃI – CS166', 'Tin vui cho các ”fan” của sữa chua trân châu Hạ Long đây – cs 166 sẽ chính thức khai trương vào 25/9 tại Đồng Nai. Các bạn trẻ Đồng Nai lại có thêm 1 điểm chơi mới toanh rùi.', 'https://suachuatranchauhalong.vn/tung-bung-khai-truong-ron-rang-uu-dai-cs166/', 'https://suachuatranchauhalong.vn/wp-content/uploads/2020/09/100-1.png'),
(8, 'TƯNG BỪNG KHAI TRUOWNGG CS118 TẠI 19 Y WANG, EA KAO, BUÔN MÊ THUỘT', 'TỤ ĐIỂM CHÉM GIÓ MỚI CHO TEAM SỮA CHUA TRÂN CHÂU HẠ LONG????\r\n\r\nTưng bình khai trương ????????̛ ????????̛̉ ????18 tại 19 Y Wang, Ea Kao, Buôn Mê Thuột. Cùng chương trình ưu đãi đặc biệt cho màn ra mắt tại địa điểm mới này', 'https://suachuatranchauhalong.vn/tung-bung-khai-truowngg-cs118-tai-19-y-wang-ea-kao-buon-me-thuot/', 'https://suachuatranchauhalong.vn/tung-bung-khai-truowngg-cs118-tai-19-y-wang-ea-kao-buon-me-thuot/'),
(9, 'PHÁ ĐẢO GIỚI TRẺ THANH HÓA – KHAI TRƯƠNG CS137', 'Ngày 12/8, Sữa chua trân châu Hạ Long tưng bừng khai trương cs137 tại 715 đường Lam Sơn, thị trấn Nông Cống, Thanh Hóa và tất nhiên không thể thiếu ưu đãi dành cho những khách hàng thân yêu rồi.', 'https://suachuatranchauhalong.vn/pha-dao-gioi-tre-thanh-hoa-khai-truong-cs137/', 'https://suachuatranchauhalong.vn/wp-content/uploads/2020/08/89-01.png'),
(10, 'CHÍNH THỨC RA MẮT BỘ SƯU TẬP TROPICAL FRUIT YOUGURT GỒM SỮA CHUA BƠ, XOÀI, MÃNG CẦU, NHÃN', 'Chính thức ra mắt Sữa chua hương vị nhiệt đới sảng khoái mát lạnh, thơm ngon trọn vẹn cho ngày hè tươi mát\r\n????️???????????????????????????????? ???????????????????? ???????????????????????? gồm 4 hương vị mới toanh: Giá DÙNG THỬ CHỈ 25K từ ngày 29/7 – 3', 'https://suachuatranchauhalong.vn/chinh-thuc-ra-mat-bo-suu-tap-tropical-fruit-yougurt-gom-sua-chua-bo-xoai-mang-cau-nhan/', 'https://suachuatranchauhalong.vn/chinh-thuc-ra-mat-bo-suu-tap-tropical-fruit-yougurt-gom-sua-chua-bo-xoai-mang-cau-nhan/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `amount`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(29, 15000, 15, 1, '2020-11-16 19:15:12', '2020-11-16 19:23:11'),
(30, 60000, 15, 1, '2020-11-16 19:22:28', '2020-11-16 19:23:10'),
(37, 25000, 15, 1, '2020-11-16 19:44:31', '2020-11-16 19:57:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_info`
--

CREATE TABLE `orders_info` (
  `id` int(11) NOT NULL,
  `transaction_id` int(100) DEFAULT NULL,
  `product_id` int(100) DEFAULT NULL,
  `qty` int(100) DEFAULT NULL,
  `price` int(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders_info`
--

INSERT INTO `orders_info` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `created_at`, `update_at`) VALUES
(18, 17, 6, 1, 35000, NULL, NULL),
(19, 17, 7, 1, 35000, NULL, NULL),
(20, 18, 6, 1, 35000, NULL, NULL),
(21, 18, 7, 1, 35000, NULL, NULL),
(22, 18, 5, 1, 5000, NULL, NULL),
(23, 19, 6, 1, 35000, NULL, NULL),
(24, 20, 6, 1, 35000, NULL, NULL),
(25, 20, 7, 1, 35000, NULL, NULL),
(26, 20, 14, 1, 5000, NULL, NULL),
(27, 20, 15, 1, 10000, NULL, NULL),
(28, 21, 6, 1, 35000, NULL, NULL),
(29, 22, 6, 1, 35000, NULL, NULL),
(30, 24, 6, 1, 35000, NULL, NULL),
(31, 24, 7, 1, 35000, NULL, NULL),
(32, 24, 10, 1, 35000, NULL, NULL),
(33, 25, 6, 1, 35000, NULL, NULL),
(34, 25, 19, 1, 10000, NULL, NULL),
(35, 26, 6, 5, 35000, NULL, NULL),
(36, 27, 7, 1, 35000, NULL, NULL),
(37, 27, 6, 1, 35000, NULL, NULL),
(38, 28, 6, 9, 35000, NULL, NULL),
(39, 28, 10, 1, 35000, NULL, NULL),
(40, 29, 19, 1, 10000, NULL, NULL),
(41, 29, 17, 1, 5000, NULL, NULL),
(42, 30, 19, 6, 10000, NULL, NULL),
(43, 31, 6, 1, 35000, NULL, NULL),
(44, 32, 19, 1, 10000, NULL, NULL),
(45, 33, 5, 1, 5000, NULL, NULL),
(46, 33, 18, 1, 15000, NULL, NULL),
(47, 34, 7, 1, 35000, NULL, NULL),
(48, 35, 5, 1, 5000, NULL, NULL),
(49, 36, 6, 1, 35000, NULL, NULL),
(50, 37, 11, 1, 25000, NULL, NULL),
(51, 38, 12, 1, 35000, NULL, NULL),
(52, 39, 6, 1, 35000, NULL, NULL),
(53, 40, 14, 1, 5000, NULL, NULL),
(54, 41, 10, 1, 35000, NULL, NULL),
(55, 42, 6, 1, 35000, NULL, NULL),
(56, 43, 5, 1, 5000, NULL, NULL),
(57, 44, 5, 1, 5000, NULL, NULL),
(58, 45, 7, 1, 35000, NULL, NULL),
(59, 46, 6, 1, 35000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` int(11) NOT NULL DEFAULT 0,
  `thunbar` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 0,
  `head` int(11) NOT NULL DEFAULT 0,
  `hot` tinyint(4) DEFAULT 0,
  `pay` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thunbar`, `category_id`, `content`, `number`, `head`, `hot`, `pay`, `created_at`, `updated_at`) VALUES
(5, 'Dừa khô', 'dua-kho', 5000, 0, 'cach-lam-dua-kho-8.jpg', 41, 'Good', 99, 0, 0, 0, NULL, NULL),
(6, 'Sữa chua bơ', 'sua-chua-bo', 35000, 0, 'scbo.png', 40, 'Sản xuất từ nguồn bơ tưới chất lương đắc lắc', 77, 0, 0, 9, NULL, NULL),
(7, 'Sữa chua mãng cầu', 'sua-chua-mang-cau', 35000, 0, 'mang-cau.png', 40, 'Sữa chua mãng cầu', 95, 0, 0, 3, NULL, NULL),
(10, 'STTCDD', 'sua-tuoi-tran-chau-duong-den', 35000, 0, 'suatuoitranchau.jfif', 42, 'Đen tuyệt vời', 98, 0, 0, 2, NULL, NULL),
(11, 'Sữa chua Nếp cẩm', 'sua-chua-nep-cam', 25000, 0, 'Nếp-cẩm.png', 40, 'Mềm sánh mịn', 99, 0, 0, 1, NULL, NULL),
(12, 'Sữa chua Ki-Wi', 'sua-chua-ki-wi', 35000, 0, 'Sữa-chua-Kiwi.png', 40, 'Chua lè', 100, 0, 0, 0, NULL, NULL),
(13, 'Sữa chua dâu', 'sua-chua-dau', 25000, 0, 'dâu-tây.png', 40, 'Vẫn chua lè chua lét', 100, 0, 0, 0, NULL, NULL),
(14, 'Nho Khô', 'nho-kho', 5000, 0, 'tpnhokho.PNG', 41, 'Nho khô là món ăn vặt, rất có lợi cho sức khoẻ như thuốc cho người bị cao huyết áp, nhờ tác dụng vừa lợi tiểu vừa bổ sung khoáng tố kalium', 99, 0, 0, 1, NULL, NULL),
(15, 'Hướng Dương', 'huong-duong', 10000, 0, 'tphuongduong.jpg', 41, 'Chỉ cần nhớ rằng loại hạt này là một thực phẩm giàu chất béo. Kiểm soát phần ăn là chìa khóa để gặt hái những lợi ích sức khỏe trong khi tránh lượng calo dư thừa. Và vì hạt hướng dương chứa khá nhiều chất béo, chúng có thể bị ôi, vì vậy hãy bảo quản chúng trong hộp đựng kín.', 99, 0, 0, 1, NULL, NULL),
(16, 'Chuối Khô', 'chuoi-kho', 10000, 0, 'tpchuoikho.png', 41, 'Cách làm mứt chuối với hai dạng là mứt chuối khô và mứt chuối dẻo được thực hiện khá đơn giản và có thể áp dụng tại nhà bất cứ khoảng thời gian nào', 100, 0, 0, 0, NULL, NULL),
(17, 'Trân Châu', 'tran-chau', 5000, 0, 'tptranchau.png', 41, 'Vị ngọt thanh, chua dịu của sữa chua kết hợp với trân châu dai giòn cùng cốt dừa béo ngậy khiến bất cứ ai cũng phải gật gù khi thưởng thức.', 99, 0, 0, 1, NULL, NULL),
(18, 'Coca', 'coca', 15000, 0, 'coca.jpg', 43, 'Co cố là', 100, 0, 0, 0, NULL, NULL),
(19, 'Bánh Chán Nướng', 'banh-chan-nuong', 10000, 0, 'banhtrangnuong.jpg', 45, 'Nướng chán', 92, 0, 0, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `userName` tinytext NOT NULL,
  `userReview` tinytext NOT NULL,
  `userMessage` longtext NOT NULL,
  `dateReviewed` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `rate`
--

INSERT INTO `rate` (`id`, `userName`, `userReview`, `userMessage`, `dateReviewed`) VALUES
(27, 'C', '5', 'Món ngon giá r?', 'Monday, November 16, 2020'),
(28, 'V', '5', 'Ngon', 'Monday, November 16, 2020'),
(29, 'Cvb', '4', 'Ngon', 'Monday, November 16, 2020'),
(30, 'Chuong', '5', 'ngon', 'Monday, November 16, 2020'),
(31, 'SCCC', '5', 'Xong ph?n ?ánh giá', 'Monday, November 16, 2020'),
(32, 'sd', '5', 'gon\\n', 'Monday, November 16, 2020'),
(33, 'hello', '4', 'ww', 'Tuesday, November 17, 2020'),
(34, 'pin', '4', 'hello', 'Monday, November 16, 2020'),
(35, 'sdsd', '1', 'sdsd', 'Monday, November 16, 2020'),
(36, 'g', '4', 'hello', 'Tuesday, November 17, 2020'),
(37, 'sss', '1', 'sss', 'Tuesday, November 17, 2020'),
(38, 'ww', '2', 'w', 'Tuesday, November 17, 2020');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `updated_at`) VALUES
(14, 'Lê Thế Chương', 'ltchuong99@gmail.com', '0333936228', 'TP TDM', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, NULL, NULL, NULL),
(15, 'Nguyễn Thị Hồng Hơn ', 'honguyen@gmail.com', '0975047449', 'TP TDM', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, NULL, NULL, NULL),
(16, 'abc', 'honguyen123@gmail.com', '0333936228', 'TP TDM', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `commentproduct`
--
ALTER TABLE `commentproduct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `commentproduct`
--
ALTER TABLE `commentproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
