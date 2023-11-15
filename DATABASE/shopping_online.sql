-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2023 lúc 05:54 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopping_online`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `country` varchar(50) DEFAULT '',
  `province` varchar(50) DEFAULT '',
  `district` varchar(50) DEFAULT '',
  `commune` varchar(50) DEFAULT '',
  `street` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `addresses`
--

INSERT INTO `addresses` (`id`, `username`, `country`, `province`, `district`, `commune`, `street`, `number`, `role`) VALUES
(1, 'ducooms', 'Việt Nam', 'Ho Chi Minh', 'Ba Dinh', 'TP Hồ Chí Minh', 'Lê Lợi - Quận 7 -  TP HCM - Việt Nam', '125', 'user'),
(2, 'user2', 'USA', 'California', 'Los Angeles', 'Downtown', 'Main Street', '456', 'user'),
(3, 'user3', 'UK', 'England', 'London', 'Westminster', 'Abbey Road', '789', 'user'),
(4, 'user4', 'France', 'Île-de-France', 'Paris', '1st Arrondissement', 'Champs-Élysées', '101', 'user'),
(5, 'user5', 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'user'),
(6, 'user6', 'Japan', 'Tokyo', 'Minato', 'Roppongi', 'Tokyo Tower Street', '303', 'user'),
(7, 'user7', 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'user'),
(8, 'user8', 'Australia', 'New South Wales', 'Sydney', 'Central Business District', 'George Street', '505', 'user'),
(9, 'user9', 'Brazil', 'Sao Paulo', 'Sao Paulo', 'Jardim Paulista', 'Paulista Avenue', '606', 'user'),
(10, 'user10', 'South Korea', 'Seoul', 'Jung', 'Myeongdong', 'Myeongdong Street', '707', 'user'),
(11, 'admin1', 'India', 'Maharashtra', 'Mumbai', 'Colaba', 'Gateway of India Road', '808', 'admin'),
(12, 'admin2', 'China', 'Beijing', 'Chaoyang', 'Guomao', 'Beijing CBD Street', '909', 'admin'),
(13, 'admin3', 'Italy', 'Lazio', 'Rome', 'Historic Center', 'Via del Corso', '1010', 'admin'),
(14, 'admin4', 'Mexico', 'Mexico City', 'Cuauhtémoc', 'Zona Rosa', 'Paseo de la Reforma', '1111', 'admin'),
(15, 'admin5', 'Spain', 'Madrid', 'Community of Madrid', 'Centro', 'Gran Vía', '1212', 'admin'),
(16, 'admin6', 'Russia', 'Moscow', 'Central Administrative Okrug', 'Tverskoy', 'Tverskaya Street', '1313', 'admin'),
(17, 'admin7', 'South Africa', 'Gauteng', 'Johannesburg', 'Sandton', 'Sandton Drive', '1414', 'admin'),
(18, 'admin8', 'Argentina', 'Buenos Aires', 'Buenos Aires', 'Recoleta', 'Avenida Alvear', '1515', 'admin'),
(19, 'admin9', 'Turkey', 'Istanbul', 'Istanbul', 'Beyoğlu', 'Istiklal Avenue', '1616', 'admin'),
(20, 'admin10', 'Thailand', 'Bangkok', 'Bangkok', 'Pathum Wan', 'Siam Square', '1717', 'admin'),
(21, 'admin11', 'Singapore', 'Singapore', 'Central Region', 'Orchard', 'Orchard Road', '1818', 'admin'),
(22, 'admin12', 'Netherlands', 'North Holland', 'Amsterdam', 'Centrum', 'Dam Square', '1919', 'admin'),
(23, 'admin13', 'Switzerland', 'Zurich', 'Zurich', 'Old Town', 'Bahnhofstrasse', '2020', 'admin'),
(24, 'admin14', 'Sweden', 'Stockholm', 'Stockholm County', 'Norrmalm', 'Drottninggatan', '2121', 'admin'),
(25, 'admin15', 'Norway', 'Oslo', 'Oslo', 'Sentrum', 'Karl Johans gate', '2222', 'admin'),
(26, 'admin16', 'Denmark', 'Copenhagen', 'Capital Region', 'Indre By', 'Strøget', '2323', 'admin'),
(27, 'admin17', 'Finland', 'Helsinki', 'Uusimaa', 'Kluuvi', 'Aleksanterinkatu', '2424', 'admin'),
(28, 'admin18', 'Portugal', 'Lisbon', 'Lisbon', 'Baixa', 'Rua Augusta', '2525', 'admin'),
(29, 'admin19', 'Ireland', 'Dublin', 'Leinster', 'City Centre', 'Grafton Street', '2626', 'admin'),
(30, 'admin20', 'Belgium', 'Brussels', 'Brussels-Capital Region', 'City of Brussels', 'Rue Neuve', '2727', 'admin'),
(280, 'kaka1', 'Vietnam', 'okok', 'nmnnvrer', 'higyui', '909 qrrrr', '123', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address_cart`
--

CREATE TABLE `address_cart` (
  `id_cart` int(11) DEFAULT NULL,
  `username` int(11) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `commune` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `address_cart`
--

INSERT INTO `address_cart` (`id_cart`, `username`, `country`, `province`, `district`, `commune`, `street`, `number`, `email`, `phone`) VALUES
(1, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'sophia.lee@example.com', '+123987654'),
(2, 1, 'Vietnam', 'Hanoi', 'Ba Dinh', 'Quan Thanh', 'Phan Dinh Phung', '123', 'sophia.lee@example.com', '+123987654'),
(4, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'sophia.lee@example.com', '+123987654'),
(5, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'sophia.lee@example.com', '+123987654'),
(6, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'sophia.lee@example.com', '+123987654'),
(7, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(8, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(9, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(10, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(11, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123456789'),
(12, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(13, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(14, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(15, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(16, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(17, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(18, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(19, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(20, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(21, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(22, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(23, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(24, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(25, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(26, 7, 'Canada', 'Ontario', 'Toronto', 'Downtown', 'Yonge Street', '404', 'sophia.lee@example.com', '+123987654'),
(27, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(28, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(29, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(30, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(31, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(32, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(33, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(34, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(35, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(36, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(37, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(38, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(39, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(40, 5, 'Germany', 'Bavaria', 'Munich', 'Altstadt', 'Marienplatz', '202', 'eva.williams@example.com', '+999888777'),
(41, 1, 'Việt Nam', 'Ho Chi Minh', 'Ba Dinh', 'TP Hồ Chí Minh', 'Lê Lợi - Quận 7 -  TP HCM - Việt Nam', '125', 'dung5715@gmail.com', '+123456789'),
(42, 1, 'Việt Nam', 'Ho Chi Minh', 'Ba Dinh', 'TP Hồ Chí Minh', 'Lê Lợi - Quận 7 -  TP HCM - Việt Nam', '125', 'dung5715@gmail.com', '+123456789'),
(43, 1, 'Việt Nam', 'Ho Chi Minh', 'Ba Dinh', 'TP Hồ Chí Minh', 'Lê Lợi - Quận 7 -  TP HCM - Việt Nam', '125', 'dung5715@gmail.com', '+123456789'),
(44, 1, 'Việt Nam', 'Ho Chi Minh', 'Ba Dinh', 'TP Hồ Chí Minh', 'Lê Lợi - Quận 7 -  TP HCM - Việt Nam', '125', 'dung5715@gmail.com', '+123456789'),
(45, 1, 'Việt Nam', 'Ho Chi Minh', 'Ba Dinh', 'TP Hồ Chí Minh', 'Lê Lợi - Quận 7 -  TP HCM - Việt Nam', '125', 'dung5715@gmail.com', '+123456789'),
(46, 2, 'USA', 'California', 'Los Angeles', 'Downtown', 'Main Street', '456', 'jane.doe@example.com', '+987654321'),
(47, 2, 'USA', 'California', 'Los Angeles', 'Downtown', 'Main Street', '456', 'jane.doe@example.com', '+987654321'),
(48, 1, 'China', 'Ho Chi Minh', 'Ba Dinh', 'TP Hồ Chí Minh', 'Lê Lợi - Quận 7 -  TP HCM - Việt Nam', '125', 'dung5715@gmail.com', '+123456789'),
(49, 1, 'China', 'Ho Chi Minh', 'Ba Dinh', 'TP Hồ Chí Minh', 'Lê Lợi - Quận 7 -  TP HCM - Việt Nam', '125', 'dung5715@gmail.com', '+123456789'),
(50, 1, 'Laos', 'Ho Chi Minh', 'Ba Dinh', 'TP Hồ Chí Minh', 'Lê Lợi - Quận 7 -  TP HCM - Việt Nam', '125', 'dung5715@gmail.com', '+123456789'),
(51, 8, 'Australia', 'New South Wales', 'Sydney', 'Central Business District', 'George Street', '505', 'daniel.taylor@example.com', '+987123654'),
(52, 8, 'Australia', 'New South Wales', 'Sydney', 'Central Business District', 'George Street', '505', 'daniel.taylor@example.com', '+987123654'),
(53, 8, 'Australia', 'New South Wales', 'Sydney', 'Central Business District', 'George Street', '505', 'daniel.taylor@example.com', '+987123654'),
(54, 8, 'Australia', 'New South Wales', 'Sydney', 'Central Business District', 'George Street', '505', 'daniel.taylor@example.com', '+987123654'),
(55, 8, 'Australia', 'New South Wales', 'Sydney', 'Central Business District', 'George Street', '505', 'daniel.taylor@example.com', '+987123654'),
(56, 1, 'Việt Nam', 'Ho Chi Minh', 'Ba Dinh', 'TP Hồ Chí Minh', 'Lê Lợi - Quận 7 -  TP HCM - Việt Nam', '125', 'dung5715@gmail.com', '+123456789'),
(57, 1, 'Việt Nam', 'Ho Chi Minh', 'Ba Dinh', 'TP Hồ Chí Minh', 'Lê Lợi - Quận 7 -  TP HCM - Việt Nam', '125', 'dung5715@gmail.com', '+123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `description`, `logo`) VALUES
(1, 'IKEA', 'Furniture Retailer', 'ikea-logo.png'),
(2, 'Ashley Furniture', 'Furniture Manufacturer', 'ashley-logo.png'),
(3, 'Wayfair', 'Online Furniture Retailer', 'wayfair-logo.png'),
(4, 'Rooms To Go', 'Furniture Retail Chain', 'roomstogo-logo.png'),
(5, 'La-Z-Boy', 'Furniture Manufacturer', 'lazboy-logo.png'),
(6, 'Herman Miller', 'Modern Furniture Design', 'hermanmiller-logo.png'),
(7, 'Crate & Barrel', 'Home Furnishings Retailer', 'crateandbarrel-logo.png'),
(8, 'Ethan Allen', 'Furniture Manufacturer and Retailer', 'ethanallen-logo.png'),
(9, 'Pottery Barn', 'Home Furnishings Retailer', 'potterybarn-logo.png'),
(10, 'Bob\'s Discount Furniture', 'Discount Furniture Retailer', 'bobsdiscount-logo.png'),
(11, 'Arhaus', 'Home Furnishings Retailer', 'arhaus-logo.png'),
(12, 'West Elm', 'Modern Furniture and Decor', 'westelm-logo.png'),
(13, 'Raymour & Flanigan', 'Furniture and Mattress Retailer', 'raymourflanigan-logo.png'),
(14, 'Havertys', 'Furniture Retailer', 'havertys-logo.png'),
(15, 'Jonathan Adler', 'Modern American Glamour', 'jonathanadler-logo.png'),
(16, 'Bernhardt Furniture', 'Luxury Furniture Manufacturer', 'bernhardt-logo.png'),
(17, 'BoConcept', 'Modern Danish Design', 'boconcept-logo.png'),
(18, 'Stanley Furniture', 'Quality Furniture Since 1924', 'stanleyfurniture-logo.png'),
(19, 'Broyhill Furniture', 'Classic American Furniture', 'broyhill-logo.png'),
(20, 'Sauder Furniture', 'Ready-to-Assemble Furniture', 'sauder-logo.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `price` float(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `user`, `price`) VALUES
(1, 1, 41, 1, 5, 899.99),
(2, 2, 41, 1, 1, 899.99),
(5, 4, 1, 1, 5, 499.99),
(6, 5, 41, 1, 5, 899.99),
(7, 7, 41, 1, 7, 899.99),
(8, 8, 123, 1, 7, 89.99),
(9, 9, 42, 1, 7, 1199.99),
(10, 9, 121, 1, 7, 699.99),
(11, 10, 61, 1, 7, 1599.99),
(12, 11, 61, 1, 7, 1599.99),
(13, 11, 3, 1, 7, 599.99),
(14, 11, 5, 1, 7, 549.99),
(15, 11, 4, 1, 7, 449.99),
(16, 12, 43, 1, 7, 1099.99),
(17, 12, 61, 1, 7, 1599.99),
(18, 12, 143, 1, 7, 79.99),
(19, 13, 1, 1, 7, 499.99),
(20, 13, 6, 1, 7, 799.99),
(21, 14, 121, 1, 7, 699.99),
(22, 14, 222, 1, 7, 59.99),
(23, 14, 201, 1, 7, 899.99),
(24, 14, 41, 1, 7, 899.99),
(25, 15, 43, 1, 7, 1099.99),
(26, 15, 121, 1, 7, 699.99),
(27, 16, 142, 1, 7, 49.99),
(28, 16, 149, 1, 7, 89.99),
(29, 16, 164, 1, 7, 24.99),
(30, 16, 168, 1, 7, 49.99),
(31, 16, 263, 1, 7, 549.99),
(32, 17, 41, 1, 7, 899.99),
(33, 18, 46, 1, 7, 1599.99),
(34, 18, 47, 1, 7, 899.99),
(35, 19, 220, 1, 7, 79.99),
(36, 19, 265, 10, 7, 649.99),
(37, 19, 244, 1, 7, 399.99),
(38, 19, 200, 1, 7, 799.99),
(39, 19, 182, 1, 7, 279.99),
(40, 19, 163, 1, 7, 79.99),
(41, 19, 124, 1, 7, 129.99),
(42, 19, 64, 1, 7, 1799.99),
(43, 19, 41, 1, 7, 899.99),
(44, 19, 23, 1, 7, 249.99),
(45, 20, 121, 1, 7, 699.99),
(46, 20, 129, 1, 7, 19.99),
(47, 21, 160, 1, 7, 34.99),
(48, 22, 203, 1, 7, 349.99),
(49, 22, 208, 1, 7, 899.99),
(50, 22, 224, 1, 7, 49.99),
(51, 23, 63, 1, 7, 1399.99),
(52, 24, 182, 8, 7, 279.99),
(53, 24, 162, 1, 7, 44.99),
(54, 25, 65, 1, 7, 1999.99),
(55, 25, 69, 3, 7, 1599.99),
(56, 26, 140, 1, 7, 24.99),
(57, 26, 139, 5, 7, 29.99),
(58, 27, 41, 2, 5, 899.99),
(59, 28, 123, 5, 5, 89.99),
(60, 28, 134, 1, 5, 59.99),
(61, 29, 63, 1, 5, 1399.99),
(62, 29, 121, 1, 5, 699.99),
(63, 30, 162, 1, 5, 44.99),
(64, 31, 43, 12, 5, 1099.99),
(65, 31, 61, 1, 5, 1599.99),
(66, 31, 123, 1, 5, 89.99),
(67, 31, 240, 1, 5, 299.99),
(68, 32, 141, 1, 5, 129.99),
(69, 32, 182, 1, 5, 279.99),
(70, 32, 241, 1, 5, 349.99),
(71, 32, 3, 1, 5, 599.99),
(72, 33, 221, 1, 5, 89.99),
(73, 33, 43, 1, 5, 1099.99),
(74, 34, 143, 1, 5, 79.99),
(75, 35, 145, 1, 5, 149.99),
(76, 36, 1, 1, 5, 499.99),
(77, 36, 2, 1, 5, 699.99),
(78, 37, 43, 1, 5, 1099.99),
(79, 38, 123, 1, 5, 89.99),
(80, 39, 181, 1, 5, 229.99),
(81, 40, 222, 1, 5, 59.99),
(82, 41, 123, 1, 1, 89.99),
(83, 41, 42, 1, 1, 1199.99),
(84, 42, 61, 1, 1, 1599.99),
(85, 42, 162, 1, 1, 44.99),
(86, 43, 180, 1, 1, 199.99),
(87, 43, 3, 1, 1, 599.99),
(88, 44, 43, 1, 1, 1099.99),
(89, 45, 43, 1, 1, 1099.99),
(90, 46, 123, 1, 2, 89.99),
(91, 47, 182, 1, 2, 279.99),
(92, 47, 202, 1, 2, 549.99),
(93, 48, 43, 1, 1, 1099.99),
(94, 49, 41, 1, 1, 899.99),
(95, 50, 63, 1, 1, 1399.99),
(96, 51, 43, 1, 8, 1099.99),
(97, 51, 61, 1, 8, 1599.99),
(98, 51, 23, 1, 8, 249.99),
(99, 51, 22, 1, 8, 149.99),
(100, 51, 21, 30, 8, 199.99),
(101, 52, 41, 1, 8, 899.99),
(102, 52, 21, 1, 8, 199.99),
(103, 52, 28, 1, 8, 349.99),
(104, 52, 25, 1, 8, 279.99),
(105, 53, 145, 1, 8, 149.99),
(106, 54, 205, 1, 8, 699.99),
(107, 55, 23, 1, 8, 249.99),
(108, 56, 23, 1, 1, 249.99),
(109, 57, 180, 1, 1, 199.99);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `parent_category_id`, `category_name`, `description`) VALUES
(1, 1, 'Table', 'A table, be it for dining or work, is a practical centerpiece in any space. Its design and material contribute to the overall aesthetic, reflecting both function and style. Tables bring people together, facilitating meals, conversations, or work, and serv'),
(2, 3, 'Chair', 'A chair is more than a seat; it\'s a design element and comfort hub. From dining to lounging, chairs merge style with function, inviting moments of relaxation and connection in any space.'),
(3, NULL, 'Bathtub', 'Immerse yourself in maximum comfort with our luxurious bathtubs. Modern design, premium materials, and a convenient bathing experience. Relax in personal space.'),
(4, NULL, 'Bed', 'Discover a wide range of comfortable and stylish beds for a restful night\'s sleep. From classic designs to modern styles, our Beds collection ensures quality and elegance. Transform your bedroom into a cozy haven with our premium Bed selection.'),
(7, NULL, 'Led', 'Illuminate your space with cutting-edge LED lighting solutions. Our LED category offers a diverse range of energy-efficient lighting options suitable for various applications. From stylish LED fixtures for your home to robust industrial-grade lighting sol'),
(8, NULL, 'Mirror', 'Reflect your style with our elegant collection of mirrors. From sleek modern designs to timeless classics, find the perfect mirror to enhance any space.'),
(9, NULL, 'Shelves', 'Organize in style with our diverse range of shelves. Explore functional and decorative shelves for every room, crafted to elevate your storage and display solutions.'),
(10, NULL, 'Sink', 'Elevate your bathroom or kitchen with our premium sinks. Choose from a variety of styles and materials, each designed for durability and aesthetic appeal.'),
(11, NULL, 'Sofa', 'Indulge in comfort with our luxurious sofa collection. From contemporary to classic designs, each sofa is crafted for relaxation and adds a touch of elegance to your living space.'),
(12, NULL, 'Tapestry', 'Transform your walls with our artistic tapestries. Explore a rich array of colors and designs, each tapestry telling a unique story and adding a bohemian touch to your space.'),
(13, NULL, 'Toilet', 'Upgrade your bathroom experience with our modern toilets. Discover efficient and stylish options designed for comfort, cleanliness, and water conservation.'),
(14, NULL, 'Wardrobe', 'Organize your attire with our stylish wardrobes. From spacious modern closets to classic armoires, find the perfect wardrobe to complement your bedroom.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `information`
--

INSERT INTO `information` (`id`, `username`, `full_name`, `date_of_birth`, `email`, `gender`, `phone_number`, `avatar`, `role`) VALUES
(1, 'ducooms', 'Nguyen Tan Dung', '2004-11-29', 'dung5715@gmail.com', 1, '+123456789', 'person_1.jpg', 'user'),
(2, 'user2', 'Jane Doe', '1985-05-22', 'jane.doe@example.com', 2, '+987654321', 'person_2.jpg', 'user'),
(3, 'user3', 'Alice Smith', '1995-08-10', 'alice.smith@example.com', 2, '+111223344', 'person_3.jpg', 'user'),
(4, 'user4', 'Bob Johnson', '1980-03-30', 'bob.johnson@example.com', 1, '+555666777', 'person_4.jpg', 'user'),
(5, 'user5', 'Eva Williams', '1992-11-05', 'eva.williams@example.com', 2, '+999888777', 'person_5.jpg', 'user'),
(6, 'user6', 'Michael Brown', '1993-04-18', 'michael.brown@example.com', 1, '+444333222', 'person_6.jpg', 'user'),
(7, 'user7', 'Phạm Thị Thảo', '2004-11-29', 'sophia.lee@example.com', 1, '+123987654', 'person_7.jpg', 'user'),
(8, 'user8', 'Daniel Taylor', '1998-07-25', 'daniel.taylor@example.com', 1, '+987123654', 'person_8.jpg', 'user'),
(9, 'user9', 'Olivia Davis', '1987-12-08', 'olivia.davis@example.com', 2, '+555111222', 'person_9.jpg', 'user'),
(10, 'user10', 'Matthew Evans', '1994-02-28', 'matthew.evans@example.com', 1, '+111222333', 'person_10.jpg', 'user'),
(11, 'admin1', 'Ava Martinez', '1996-06-15', 'ava.martinez@example.com', 2, '+999555777', 'person_11.jpg', 'admin'),
(12, 'admin2', 'Jacob Wilson', '1986-10-04', 'jacob.wilson@example.com', 1, '+333888999', 'person_12.jpg', 'admin'),
(13, 'admin3', 'Emma Anderson', '1991-03-22', 'emma.anderson@example.com', 2, '+777444555', 'person_13.jpg', 'admin'),
(14, 'admin4', 'Alexander Nguyen', '1989-08-17', 'alexander.nguyen@example.com', 1, '+111999888', 'person_14.jpg', 'admin'),
(15, 'admin5', 'Mia Brown', '1997-01-11', 'mia.brown@example.com', 2, '+777111222', 'person_14.jpg', 'admin'),
(16, 'admin6', 'Liam Garcia', '1985-05-30', 'liam.garcia@example.com', 1, '+555333444', 'person_16.jpg', 'admin'),
(17, 'admin7', 'Amelia Kim', '1990-11-25', 'amelia.kim@example.com', 2, '+123789456', 'person_17.jpg', 'admin'),
(18, 'admin8', 'Ethan Patel', '1999-07-08', 'ethan.patel@example.com', 1, '+555777999', 'person_18.jpg', 'admin'),
(19, 'admin9', 'Olivia White', '1984-12-01', 'olivia.white@example.com', 2, '+999111222', 'person_19.jpg', 'admin'),
(20, 'admin10', 'Noah Lee', '1992-02-14', 'noah.lee@example.com', 1, '+444666777', 'person_20.jpg', 'admin'),
(21, 'admin11', 'Isabella Wilson', '1995-06-10', 'isabella.wilson@example.com', 2, '+123555999', 'person_21.jpg', 'admin'),
(22, 'admin12', 'James Martin', '1983-10-23', 'james.martin@example.com', 1, '+555444333', 'person_22.jpg', 'admin'),
(23, 'admin13', 'Sophia Kim', '1993-04-28', 'sophia.kim@example.com', 2, '+123456987', 'person_23.jpg', 'admin'),
(24, 'admin14', 'Jackson Smith', '1988-09-15', 'jackson.smith@example.com', 1, '+987654321', 'person_24.jpg', 'admin'),
(25, 'admin15', 'Emma Davis', '1998-07-28', 'emma.davis@example.com', 2, '+987123654', 'person_25.jpg', 'admin'),
(26, 'admin16', 'Aiden Taylor', '1987-12-11', 'aiden.taylor@example.com', 1, '+555111222', 'person_26.jpg', 'admin'),
(27, 'admin17', 'Olivia Wilson', '1994-03-01', 'olivia.wilson@example.com', 2, '+111222333', 'person_27.jpg', 'admin'),
(28, 'admin18', 'Lucas Anderson', '1996-06-18', 'lucas.anderson@example.com', 1, '+999555777', 'person_28.jpg', 'admin'),
(29, 'admin19', 'Ava Wilson', '1986-10-07', 'ava.wilson@example.com', 2, '+333888999', 'person_29.jpg', 'admin'),
(30, 'admin20', 'Mason Martinez', '1991-03-25', 'mason.martinez@example.com', 1, '+777444555', 'person_30.jpg', 'admin'),
(280, 'kaka1', 'Mâmmma', '2004-11-29', '', 1, '0338890999', 'download.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `product_name`, `description`, `image`, `price`, `stock_quantity`) VALUES
(1, 1, 1, 'Solid Wood Dining Table', 'A beautiful dining table made from solid wood, suitable for family gatherings and dinner parties.', 'table-1.png', 499.99, 20),
(2, 1, 2, 'Extendable Glass Dining Table', 'Modern and stylish glass dining table with an extendable feature, perfect for contemporary homes.', 'table-2.png', 699.99, 15),
(3, 1, 3, 'Rustic Farmhouse Table', 'A charming farmhouse-style table crafted from reclaimed wood, adding warmth to your dining space.', 'table-3.png', 599.99, 18),
(4, 1, 1, 'Round Pedestal Dining Table', 'Elegant round pedestal dining table, ideal for smaller spaces and intimate dinners.', 'table-4.png', 449.99, 25),
(5, 1, 2, 'Industrial Style Dining Table', 'Dining table with an industrial design, featuring metal accents and a robust construction.', 'table-5.png', 549.99, 22),
(6, 1, 3, 'Mid-Century Modern Dining Table', 'Iconic mid-century modern dining table, combining style and functionality.', 'table-6.png', 799.99, 12),
(7, 1, 4, 'Glass Top Patio Table', 'Outdoor dining table with a glass top, perfect for enjoying meals in your garden or patio.', 'table-7.png', 299.99, 30),
(8, 1, 1, 'Rectangular Oak Dining Table', 'Classic rectangular oak dining table, a timeless addition to your dining room.', 'table-8.png', 649.99, 17),
(9, 1, 2, 'White Marble Top Dining Table', 'Luxurious dining table featuring a white marble top and elegant design.', 'table-9.png', 899.99, 10),
(10, 1, 3, 'Foldable Space-Saving Table', 'Innovative foldable table design, perfect for small apartments or multipurpose rooms.', 'table-10.png', 349.99, 28),
(11, 1, 4, 'Walnut Finish Dining Table', 'Dining table with a rich walnut finish, bringing warmth and sophistication to your space.', 'table-11.png', 579.99, 14),
(12, 1, 1, 'Glass and Chrome Dining Table', 'Contemporary dining table featuring a glass top and chrome accents, creating a sleek look.', 'table-12.png', 749.99, 16),
(13, 1, 2, 'Live Edge Wood Dining Table', 'Unique live edge wood dining table, showcasing the natural beauty of the wood grain.', 'table-13.png', 999.99, 8),
(14, 1, 3, 'Counter Height Dining Table', 'Stylish counter height dining table, perfect for casual meals and entertaining.', 'table-14.png', 479.99, 20),
(15, 1, 4, 'Vintage Drop-Leaf Table', 'Charming vintage drop-leaf dining table, offering versatility and a touch of nostalgia.', 'table-15.png', 399.99, 24),
(16, 1, 1, 'Concrete Top Outdoor Table', 'Modern outdoor dining table with a durable concrete top, ideal for al fresco dining.', 'table-16.png', 699.99, 18),
(17, 1, 2, 'Cherry Wood Dining Table', 'Elegant cherry wood dining table with intricate detailing, a classic choice for any dining room.', 'table-17.png', 829.99, 13),
(18, 1, 3, 'Square Glass Bistro Table', 'Compact square glass bistro table, perfect for creating a cozy dining nook.', 'table-18.png', 299.99, 26),
(19, 1, 4, 'Folding Picnic Table', 'Portable folding picnic table, great for outdoor activities and picnics.', 'table-19.png', 149.99, 40),
(20, 1, 1, 'Espresso Finish Dining Table', 'Dining table with an espresso finish, blending modern style with warmth.', 'table-20.png', 549.99, 15),
(21, 2, 5, 'Leather Upholstered Chair', 'Comfortable leather upholstered chair with a modern design, perfect for your living room or office.', 'chair-1.png', 199.99, 30),
(22, 2, 6, 'Wooden Accent Chair', 'Stylish wooden accent chair featuring a unique design, adding a touch of sophistication to any space.', 'chair-2.png', 149.99, 25),
(23, 2, 7, 'Swivel Lounge Chair', 'Lounge chair with a swivel feature, providing flexibility and comfort for a relaxing experience.', 'chair-3.png', 249.99, 20),
(24, 2, 5, 'Velvet Armchair', 'Elegant velvet armchair with plush upholstery, creating a luxurious and inviting seating area.', 'chair-4.png', 299.99, 18),
(25, 2, 6, 'Mid-Century Modern Armchair', 'Iconic mid-century modern armchair, combining comfort with a timeless design aesthetic.', 'chair-5.png', 279.99, 22),
(26, 2, 7, 'Wingback Accent Chair', 'Classic wingback accent chair, featuring a high back and winged sides for a regal look.', 'chair-6.png', 229.99, 28),
(27, 2, 8, 'Metal Frame Dining Chair', 'Dining chair with a sturdy metal frame, providing durability and a modern industrial look.', 'chair-7.png', 119.99, 35),
(28, 2, 5, 'Leather Recliner Chair', 'Relaxing leather recliner chair with multiple reclining positions for personalized comfort.', 'chair-8.png', 349.99, 15),
(29, 2, 6, 'Tufted Velvet Side Chair', 'Chic tufted velvet side chair, perfect for adding a touch of glamour to your dining area.', 'chair-9.png', 169.99, 30),
(30, 2, 7, 'Sleek Modern Office Chair', 'Sleek and modern office chair with adjustable features, ideal for a stylish and comfortable workspace.', 'chair-10.png', 199.99, 25),
(31, 2, 8, 'Acrylic Ghost Chair', 'Transparent acrylic ghost chair, a contemporary piece that adds a minimalist and airy feel to any room.', 'chair-11.png', 159.99, 20),
(32, 2, 5, 'Rattan Accent Chair', 'Natural rattan accent chair, bringing a bohemian touch to your living space with its organic texture.', 'chair-12.png', 189.99, 22),
(33, 2, 6, 'Plush Lounge Chaise', 'Plush lounge chaise with a curved design, providing a comfortable and stylish spot for relaxation.', 'chair-13.png', 279.99, 18),
(34, 2, 7, 'Eames Style Dining Chair', 'Timeless Eames style dining chair, known for its ergonomic design and versatility.', 'chair-14.png', 129.99, 28),
(35, 2, 8, 'Cotton Upholstered Armchair', 'Cotton upholstered armchair with a casual and cozy design, perfect for reading corners.', 'chair-15.png', 169.99, 24),
(36, 2, 5, 'Modern Rocking Chair', 'Contemporary rocking chair with a modern twist, providing a soothing and stylish rocking experience.', 'chair-16.png', 199.99, 20),
(37, 2, 6, 'Wire Frame Accent Chair', 'Wire frame accent chair with a minimalist design, adding an industrial touch to your space.', 'chair-17.png', 139.99, 30),
(38, 2, 7, 'Convertible Sleeper Chair', 'Versatile convertible sleeper chair, serving as both a comfortable chair and an extra bed when needed.', 'chair-18.png', 249.99, 15),
(39, 2, 8, 'Linen Upholstered Dining Chair', 'Linen upholstered dining chair with a classic look, suitable for both formal and casual dining spaces.', 'chair-19.png', 159.99, 28),
(40, 2, 5, 'Sculptural Lounge Chair', 'Artistic sculptural lounge chair, making a statement in any room with its unique and creative design.', 'chair-20.png', 299.99, 18),
(41, 3, 10, 'Freestanding Bathtub', 'Luxurious freestanding bathtub with modern design, providing a spa-like experience in your bathroom.', 'bathtub-1.png', 899.99, 15),
(42, 3, 11, 'Clawfoot Soaking Tub', 'Elegant clawfoot soaking tub with a vintage-inspired design, creating a focal point in your bathroom.', 'bathtub-2.png', 1199.99, 10),
(43, 3, 12, 'Oval Drop-In Bathtub', 'Sleek oval drop-in bathtub with clean lines, offering a contemporary look for your bathroom space.', 'bathtub-3.png', 1099.99, 12),
(44, 3, 10, 'Corner Whirlpool Tub', 'Space-saving corner whirlpool tub with hydrotherapy features, bringing relaxation to a new level.', 'bathtub-4.png', 1499.99, 8),
(45, 3, 11, 'Modern Square Bathtub', 'Modern square bathtub with a geometric design, blending functionality with a touch of sophistication.', 'bathtub-5.png', 1299.99, 10),
(46, 3, 12, 'Wooden Soaking Tub', 'Unique wooden soaking tub with a natural aesthetic, adding warmth and character to your bathroom.', 'bathtub-6.png', 1599.99, 6),
(47, 3, 13, 'Round Freestanding Tub', 'Round freestanding tub with a minimalistic look, perfect for creating a serene and stylish bathing area.', 'bathtub-7.png', 899.99, 15),
(48, 3, 14, 'Copper Slipper Tub', 'Copper slipper tub with an antique-inspired design, making a bold statement in your bathroom decor.', 'bathtub-8.png', 1799.99, 5),
(49, 3, 10, 'Double Ended Clawfoot Tub', 'Double ended clawfoot tub with a symmetrical design, offering a comfortable and classic bathing experience.', 'bathtub-9.png', 1299.99, 8),
(50, 3, 11, 'Rectangular Drop-In Tub', 'Rectangular drop-in tub with sleek lines, providing a contemporary and versatile option for your bathroom.', 'bathtub-10.png', 1399.99, 10),
(51, 3, 12, 'Stone Soaking Bathtub', 'Stone soaking bathtub with a natural and organic look, creating a spa-like atmosphere in your home.', 'bathtub-11.png', 1699.99, 7),
(52, 3, 13, 'Acrylic Oval Tub', 'Acrylic oval tub with a simple and elegant design, offering durability and easy maintenance.', 'bathtub-12.png', 999.99, 12),
(53, 3, 14, 'Freestanding Slipper Tub', 'Freestanding slipper tub with a timeless slipper shape, enhancing the aesthetic of your bathroom.', 'bathtub-13.png', 1499.99, 8),
(54, 3, 10, 'Built-In Whirlpool Tub', 'Built-in whirlpool tub with advanced hydrotherapy features, providing a spa-like experience at home.', 'bathtub-14.png', 1999.99, 5),
(55, 3, 11, 'Glass-Enclosed Bathtub', 'Innovative glass-enclosed bathtub with a modern design, creating a seamless and stylish bathing space.', 'bathtub-15.png', 1799.99, 6),
(56, 3, 12, 'Square Drop-In Tub', 'Square drop-in tub with a contemporary and geometric design, adding a modern touch to your bathroom.', 'bathtub-16.png', 1199.99, 10),
(57, 3, 13, 'Cast Iron Slipper Tub', 'Cast iron slipper tub with a durable and classic design, offering both style and functionality.', 'bathtub-17.png', 1599.99, 7),
(58, 3, 14, 'Wooden Barrel Soaking Tub', 'Wooden barrel soaking tub with a rustic and charming appearance, creating a unique focal point in your bathroom.', 'bathtub-18.png', 2099.99, 4),
(59, 3, 10, 'Modern Freestanding Tub', 'Modern freestanding tub with clean lines and a sleek silhouette, bringing a contemporary vibe to your bathroom.', 'bathtub-19.png', 1399.99, 9),
(60, 3, 11, 'Round Soaking Tub', 'Round soaking tub with a minimalist design, offering a simple and stylish bathing option for your home.', 'bathtub-20.png', 1099.99, 11),
(61, 4, 15, 'King Size Bed', 'Luxurious king-size bed with a timeless design, providing ultimate comfort for a restful night\'s sleep.', 'bed-1.jpg', 1599.99, 10),
(62, 4, 16, 'Queen Size Platform Bed', 'Elegant queen-size platform bed with a contemporary look, offering both style and functionality.', 'bed-2.jpg', 1199.99, 12),
(63, 4, 17, 'Modern Storage Bed', 'Modern storage bed with built-in drawers, optimizing space and providing a sleek bedroom solution.', 'bed-3.jpg', 1399.99, 8),
(64, 4, 18, 'Upholstered Sleigh Bed', 'Upholstered sleigh bed with a luxurious design, adding a touch of sophistication to your bedroom decor.', 'bed-4.jpg', 1799.99, 6),
(65, 4, 19, 'Canopy Bed Frame', 'Elegant canopy bed frame with a romantic and classic design, creating a focal point in your bedroom.', 'bed-5.jpg', 1999.99, 5),
(66, 4, 20, 'Mid-Century Modern Bed', 'Mid-century modern bed with clean lines and tapered legs, bringing a retro charm to your bedroom space.', 'bed-6.jpg', 1299.99, 12),
(67, 4, 15, 'Platform Storage Bed', 'Platform storage bed with a sleek and functional design, offering ample storage space for your bedroom essentials.', 'bed-7.jpg', 1499.99, 10),
(68, 4, 16, 'Tufted Wingback Bed', 'Tufted wingback bed with a classic and elegant design, creating a luxurious atmosphere in your bedroom.', 'bed-8.jpg', 1699.99, 9),
(69, 4, 17, 'Rustic Wooden Bed', 'Rustic wooden bed with a charming and natural appearance, adding warmth and character to your bedroom decor.', 'bed-9.jpg', 1599.99, 10),
(70, 4, 18, 'Four Poster Bed', 'Four poster bed with a traditional and grand design, making a bold statement in your bedroom space.', 'bed-10.jpg', 2199.99, 4),
(71, 4, 19, 'Leather Upholstered Bed', 'Leather upholstered bed with a modern and luxurious look, offering both comfort and style in your bedroom.', 'bed-11.jpg', 1899.99, 6),
(72, 4, 20, 'Sleigh Bed with Storage', 'Sleigh bed with integrated storage drawers, providing a stylish and practical solution for your bedroom.', 'bed-12.jpg', 1799.99, 7),
(73, 4, 15, 'Floating Platform Bed', 'Floating platform bed with a minimalist design, giving the illusion of weightlessness for a contemporary bedroom look.', 'bed-13.jpg', 1299.99, 12),
(74, 4, 16, 'Industrial Pipe Bed Frame', 'Industrial pipe bed frame with a rugged and urban design, adding an edgy touch to your bedroom decor.', 'bed-14.jpg', 1499.99, 9),
(75, 4, 17, 'Adjustable Bed Base', 'Adjustable bed base with customizable positions, providing personalized comfort and support for a good night\'s sleep.', 'bed-15.jpg', 2499.99, 3),
(76, 4, 18, 'Classic Wooden Bed', 'Classic wooden bed with a timeless design, offering durability and a traditional aesthetic for your bedroom.', 'bed-16.jpg', 1699.99, 8),
(77, 4, 19, 'Metal Canopy Bed', 'Metal canopy bed with a modern twist, combining sleek lines with the romantic touch of a canopy for a stylish bedroom.', 'bed-17.jpg', 1999.99, 5),
(78, 4, 20, 'Velvet Upholstered Bed', 'Velvet upholstered bed with a plush and luxurious look, bringing a touch of opulence to your bedroom space.', 'bed-18.jpg', 2099.99, 4),
(79, 4, 15, 'Round Bed', 'Round bed with a unique and contemporary design, creating a striking focal point in your bedroom.', 'bed-19.jpg', 2599.99, 2),
(80, 4, 16, 'Mission Style Bed', 'Mission style bed with clean lines and a simple yet elegant design, offering a timeless addition to your bedroom decor.', 'bed-20.jpg', 1499.99, 7),
(121, 7, 1, 'Smart LED TV - 55 Inch', 'Smart LED TV with a 55-inch display, featuring high-definition resolution and smart connectivity for streaming your favorite content.', 'led-1.jpg', 699.99, 15),
(122, 7, 2, 'LED Desk Lamp', 'LED desk lamp with adjustable brightness levels and color temperatures, providing optimal lighting for your workspace.', 'led-2.jpg', 49.99, 20),
(123, 7, 3, 'LED Ceiling Light Fixture', 'LED ceiling light fixture with a modern design, illuminating your living space with energy-efficient and long-lasting LED technology.', 'led-3.jpg', 89.99, 18),
(124, 7, 4, 'LED Floor Lamp', 'LED floor lamp with a contemporary design, adding ambient lighting to your room while serving as a stylish decor element.', 'led-4.jpg', 129.99, 12),
(125, 7, 5, 'LED Strip Lights - RGB', 'LED strip lights with customizable RGB colors, allowing you to create dynamic and vibrant lighting effects in any room.', 'led-5.jpg', 39.99, 25),
(126, 7, 6, 'Smart LED Bulbs - Set of 4', 'Set of smart LED bulbs compatible with smart home systems, offering adjustable brightness and color options for personalized lighting.', 'led-6.jpg', 29.99, 30),
(127, 7, 7, 'LED Vanity Mirror', 'LED vanity mirror with built-in lights, providing bright and even illumination for your makeup routine or grooming tasks.', 'led-7.jpg', 69.99, 15),
(128, 7, 8, 'LED Wall Sconces - Set of 2', 'Set of two LED wall sconces with a sleek and minimalist design, adding modern elegance to your living space.', 'led-8.jpg', 59.99, 14),
(129, 7, 9, 'LED Desk Clock', 'LED desk clock with a digital display and adjustable brightness, serving as a functional and stylish addition to your workspace.', 'led-9.jpg', 19.99, 20),
(130, 7, 10, 'Smart LED Light Strips', 'Smart LED light strips with Wi-Fi connectivity, allowing you to control colors and effects through a mobile app or voice commands.', 'led-10.jpg', 49.99, 18),
(131, 7, 11, 'LED Pendant Light', 'LED pendant light with a contemporary design, hanging elegantly from your ceiling and providing focused lighting for specific areas.', 'led-11.jpg', 79.99, 17),
(132, 7, 12, 'LED String Lights - Outdoor', 'LED string lights for outdoor use, creating a magical and festive atmosphere for your garden or patio.', 'led-12.jpg', 34.99, 22),
(133, 7, 13, 'Smart LED Desk Fan', 'Smart LED desk fan with adjustable speed and color-changing LED lights, providing a cool breeze and ambient lighting.', 'led-13.jpg', 44.99, 18),
(134, 7, 14, 'LED Plant Grow Light', 'LED plant grow light with a full spectrum of colors, promoting healthy plant growth indoors.', 'led-14.jpg', 59.99, 15),
(135, 7, 15, 'Floating Shelves with LED Lights', 'Floating shelves with integrated LED lights, showcasing your decor items in a stylish and illuminated way.', 'led-15.jpg', 79.99, 12),
(136, 7, 16, 'LED Gaming Mouse', 'LED gaming mouse with customizable RGB lighting, providing a visually immersive gaming experience.', 'led-16.jpg', 39.99, 25),
(137, 7, 17, 'LED Desk Organizer Lamp', 'LED desk organizer lamp with multiple compartments and adjustable light, keeping your workspace tidy and well-lit.', 'led-17.jpg', 49.99, 20),
(138, 7, 18, 'LED Motion Sensor Night Light', 'LED motion sensor night light for hallways and bedrooms, offering automatic illumination in low-light conditions.', 'led-18.jpg', 19.99, 30),
(139, 7, 19, 'Smart LED Alarm Clock', 'Smart LED alarm clock with sunrise simulation, waking you up gently with gradually increasing light.', 'led-19.jpg', 29.99, 25),
(140, 7, 20, 'Portable LED Camping Lantern', 'Portable LED camping lantern with adjustable brightness, providing reliable illumination during outdoor adventures.', 'led-20.jpg', 24.99, 28),
(141, 8, 1, 'Full-Length Wall Mirror', 'Full-length wall mirror with a sleek frame, providing a functional and stylish accent to your bedroom or dressing area.', 'mirror-1.jpg', 129.99, 15),
(142, 8, 2, 'Round Vanity Mirror', 'Round vanity mirror with a decorative frame, perfect for adding a touch of elegance to your bathroom or makeup vanity.', 'mirror-2.jpg', 49.99, 20),
(143, 8, 3, 'Rectangular Entryway Mirror', 'Rectangular entryway mirror with a modern design, enhancing the visual appeal of your entry or hallway space.', 'mirror-3.jpg', 79.99, 18),
(144, 8, 4, 'Oval Standing Mirror', 'Oval standing mirror with a freestanding design, allowing you to place it anywhere in your home for a quick outfit check.', 'mirror-4.jpg', 69.99, 12),
(145, 8, 5, 'Antique Wall Mirror', 'Antique-style wall mirror with intricate detailing, creating a timeless and sophisticated look in any room.', 'mirror-5.jpg', 149.99, 17),
(146, 8, 6, 'Hexagonal Bathroom Mirror', 'Hexagonal bathroom mirror with a geometric shape, adding a modern and unique touch to your bathroom decor.', 'mirror-6.jpg', 54.99, 25),
(147, 8, 7, 'Frameless Floor Mirror', 'Frameless floor mirror with a minimalist design, providing a clean and contemporary look to your living space.', 'mirror-7.jpg', 99.99, 14),
(148, 8, 8, 'Decorative Wall Mirror Set', 'Set of decorative wall mirrors in various shapes and sizes, allowing you to create a stylish gallery wall in your home.', 'mirror-8.jpg', 79.99, 14),
(149, 8, 9, 'Gold Accent Mirror', 'Gold accent mirror with a gold-finished frame, bringing a touch of glamour and luxury to your bedroom or living room.', 'mirror-9.jpg', 89.99, 15),
(150, 8, 10, 'Wooden Framed Vanity Mirror', 'Wooden framed vanity mirror with a natural wood finish, blending seamlessly with rustic or farmhouse-style decor.', 'mirror-10.jpg', 64.99, 20),
(151, 8, 11, 'Sunburst Wall Mirror', 'Sunburst wall mirror with a sunburst design, serving as a bold and eye-catching focal point in any room.', 'mirror-11.jpg', 109.99, 18),
(152, 8, 12, 'Art Deco Dresser Mirror', 'Art Deco dresser mirror with an Art Deco-inspired design, adding a touch of vintage glamour to your dressing area.', 'mirror-12.jpg', 79.99, 17),
(153, 8, 13, 'Framed Bathroom Vanity Mirror', 'Framed bathroom vanity mirror with a classic frame, complementing traditional bathroom decor with timeless elegance.', 'mirror-13.jpg', 54.99, 22),
(154, 8, 14, 'LED Lighted Makeup Mirror', 'LED lighted makeup mirror with adjustable brightness, providing optimal lighting for your makeup application.', 'mirror-14.jpg', 39.99, 18),
(155, 8, 15, 'Vintage Handheld Mirror', 'Vintage handheld mirror with a decorative handle, perfect for adding a touch of vintage charm to your dressing table.', 'mirror-15.jpg', 24.99, 30),
(156, 8, 16, 'Floating Shelf with Mirror', 'Floating shelf with an integrated mirror, combining functionality and style for a modern and practical storage solution.', 'mirror-16.jpg', 69.99, 12),
(157, 8, 17, 'Distressed Wood Wall Mirror', 'Distressed wood wall mirror with a weathered finish, bringing rustic charm and character to your living space.', 'mirror-17.jpg', 89.99, 18),
(158, 8, 18, 'Round Wooden Framed Mirror', 'Round wooden framed mirror with a simple and versatile design, suitable for various rooms in your home.', 'mirror-18.jpg', 49.99, 20),
(159, 8, 19, 'Black Metal Frame Mirror', 'Black metal frame mirror with a sleek and modern design, adding an industrial touch to your home decor.', 'mirror-19.jpg', 59.99, 25),
(160, 9, 1, 'Floating Wall Shelves', 'Set of floating wall shelves in various sizes, providing a stylish and space-saving storage solution for your books, decor, and more.', 'shelves-1.jpg', 34.99, 25),
(161, 9, 2, 'Corner Shelf Unit', 'Corner shelf unit with a triangular design, maximizing corner space and offering a decorative display for your collectibles and plants.', 'shelves-2.jpg', 29.99, 20),
(162, 9, 3, 'Industrial Pipe Wall Shelf', 'Industrial pipe wall shelf with a rustic design, combining functionality with an edgy and modern industrial aesthetic.', 'shelves-3.jpg', 44.99, 18),
(163, 9, 4, 'Wooden Bookcase with Drawers', 'Wooden bookcase with built-in drawers, providing a versatile storage solution for both books and small items in your living room or office.', 'shelves-4.jpg', 79.99, 15),
(164, 9, 5, 'Floating Corner Shelves', 'Set of floating corner shelves, ideal for displaying small decor items or creating a stylish arrangement in unused corner spaces.', 'shelves-5.jpg', 24.99, 30),
(165, 9, 6, 'Modern Wall-Mounted Shelf', 'Modern wall-mounted shelf with clean lines and a sleek design, adding a contemporary touch to your living room or bedroom decor.', 'shelves-6.jpg', 39.99, 22),
(166, 9, 7, 'Cubby Storage Organizer', 'Cubby storage organizer with cubbies of various sizes, perfect for organizing and displaying items in your entryway or kids\' room.', 'shelves-7.jpg', 54.99, 20),
(167, 9, 8, 'Rustic Floating Shelves', 'Rustic floating shelves with a distressed wood finish, creating a charming and farmhouse-inspired display for your home decor.', 'shelves-8.jpg', 32.99, 25),
(168, 9, 9, 'Glass Shelving Unit', 'Glass shelving unit with tempered glass shelves and a metal frame, offering a sleek and modern storage solution for your bathroom or kitchen.', 'shelves-9.jpg', 49.99, 15),
(169, 9, 10, 'Adjustable Wall-Mounted Shelves', 'Adjustable wall-mounted shelves with a versatile design, allowing you to customize the shelf height and create a personalized storage solution.', 'shelves-10.jpg', 29.99, 30),
(170, 9, 11, 'Bamboo Bathroom Shelves', 'Bamboo bathroom shelves with a natural finish, providing a eco-friendly and stylish storage option for your bathroom essentials.', 'shelves-11.jpg', 39.99, 18),
(171, 9, 12, 'Ladder Bookshelf', 'Ladder bookshelf with a tiered design, offering a unique and eye-catching way to display your book collection and decor items.', 'shelves-12.jpg', 69.99, 15),
(172, 9, 13, 'Wall-Mounted Spice Rack', 'Wall-mounted spice rack with multiple shelves, keeping your spices organized and easily accessible in the kitchen.', 'shelves-13.jpg', 19.99, 25),
(173, 9, 14, 'Hanging Rope Shelf', 'Hanging rope shelf with wooden planks, adding a bohemian touch to your decor while providing a charming display for small items.', 'shelves-14.jpg', 27.99, 20),
(174, 9, 15, 'Metal Wire Cube Shelves', 'Metal wire cube shelves that can be arranged in various configurations, offering a modern and customizable storage solution for any room.', 'shelves-15.jpg', 59.99, 12),
(175, 9, 16, 'Kids\' Book Display Shelf', 'Kids\' book display shelf with colorful bins, encouraging children to keep their books organized and easily accessible.', 'shelves-16.jpg', 34.99, 20),
(176, 9, 17, 'Floating Wine Rack Shelves', 'Floating wine rack shelves with space for wine bottles and wine glasses, combining storage and display for wine enthusiasts.', 'shelves-17.jpg', 49.99, 15),
(177, 9, 18, 'Under-Sink Storage Shelves', 'Under-sink storage shelves with an expandable design, optimizing storage space in your kitchen or bathroom cabinet.', 'shelves-18.jpg', 22.99, 30),
(178, 9, 19, 'Wall-Mounted Display Ledge', 'Wall-mounted display ledge with a slim profile, perfect for showcasing framed photos, artwork, or small decor items.', 'shelves-19.jpg', 17.99, 35),
(179, 9, 20, 'Modern Cube Bookcase', 'Modern cube bookcase with open and closed storage cubes, offering a contemporary and versatile solution for organizing your books and belongings.', 'shelves-20.jpg', 64.99, 18),
(180, 10, 1, 'Stainless Steel Kitchen Sink', 'High-quality stainless steel kitchen sink with a sleek and durable design, ideal for modern kitchens.', 'sink-1.png', 199.99, 15),
(181, 10, 2, 'Double Basin Undermount Sink', 'Double basin undermount sink with a versatile design, providing ample space for washing dishes and food preparation.', 'sink-2.png', 229.99, 12),
(182, 10, 3, 'Farmhouse Apron Front Sink', 'Farmhouse apron front sink with a classic and charming appearance, adding a rustic touch to your kitchen decor.', 'sink-3.png', 279.99, 10),
(183, 10, 4, 'Granite Composite Kitchen Sink', 'Granite composite kitchen sink with a durable and heat-resistant construction, combining style and functionality.', 'sink-4.png', 349.99, 8),
(184, 10, 5, 'Single Bowl Top Mount Sink', 'Single bowl top mount sink with a simple and space-saving design, perfect for smaller kitchens or bar areas.', 'sink-5.png', 149.99, 20),
(185, 10, 6, 'Drop-In Stainless Steel Sink', 'Drop-in stainless steel sink with an easy installation process, offering a practical and modern solution for your kitchen.', 'sink-6.png', 189.99, 18),
(186, 10, 7, 'Deep Undermount Bar Sink', 'Deep undermount bar sink with a compact size, making it ideal for bars, entertainment areas, or secondary kitchen spaces.', 'sink-7.png', 129.99, 25),
(187, 10, 8, 'Ceramic Vanity Sink', 'Ceramic vanity sink with a smooth and easy-to-clean surface, bringing a touch of elegance to your bathroom or powder room.', 'sink-8.png', 99.99, 30),
(188, 10, 9, 'Wall-Mounted Laundry Sink', 'Wall-mounted laundry sink with a space-saving design, perfect for laundry rooms or utility areas with limited space.', 'sink-9.png', 169.99, 15),
(189, 10, 10, 'Corner Kitchen Sink', 'Corner kitchen sink with a unique triangular design, maximizing corner space and adding a modern flair to your kitchen.', 'sink-10.png', 199.99, 12),
(190, 10, 11, 'Black Matte Finish Sink', 'Black matte finish sink with a contemporary and stylish appearance, creating a bold focal point in your kitchen or bar area.', 'sink-11.png', 259.99, 10),
(191, 10, 12, 'Glass Vessel Bathroom Sink', 'Glass vessel bathroom sink with an artistic and translucent design, elevating the aesthetic of your bathroom space.', 'sink-12.png', 149.99, 8),
(192, 10, 13, 'Round Undermount Bar Sink', 'Round undermount bar sink with a versatile and space-efficient design, suitable for various bar and entertainment setups.', 'sink-13.png', 119.99, 15),
(193, 10, 14, 'Modern Square Kitchen Sink', 'Modern square kitchen sink with clean lines and a contemporary look, enhancing the overall style of your kitchen.', 'sink-14.png', 179.99, 20),
(194, 10, 15, 'Pedestal Bathroom Sink', 'Pedestal bathroom sink with a classic and timeless design, perfect for traditional or vintage-inspired bathroom settings.', 'sink-15.png', 189.99, 25),
(195, 10, 16, 'Slim Undermount Bar Sink', 'Slim undermount bar sink with a sleek profile, providing a modern and efficient solution for your bar or entertainment space.', 'sink-16.png', 129.99, 18),
(196, 10, 17, 'Copper Farmhouse Sink', 'Copper farmhouse sink with a warm and rustic appeal, adding character to your kitchen and complementing various design styles.', 'sink-17.png', 299.99, 10),
(197, 10, 18, 'Undercounter Bathroom Sink', 'Undercounter bathroom sink with an unobtrusive and space-saving design, suitable for contemporary and minimalist bathroom layouts.', 'sink-18.png', 109.99, 15),
(198, 10, 19, 'Rectangular Top Mount Sink', 'Rectangular top mount sink with a versatile and easy-to-install design, offering a practical solution for your kitchen or bar area.', 'sink-19.png', 159.99, 20),
(199, 10, 20, 'Marble Vessel Sink', 'Marble vessel sink with a luxurious and sophisticated appearance, becoming a focal point in your bathroom or vanity area.', 'sink-20.png', 249.99, 12),
(200, 11, 1, 'Modern Sofa Set', 'Modern sofa set with a sleek design, providing comfort and style to your living room or entertainment area.', 'sofa-1.png', 799.99, 15),
(201, 11, 2, 'Sectional Sleeper Sofa', 'Sectional sleeper sofa with a pull-out bed, perfect for hosting guests and providing additional sleeping space in your home.', 'sofa-2.png', 899.99, 20),
(202, 11, 3, 'Velvet Loveseat', 'Velvet loveseat with plush cushions, adding a touch of luxury and sophistication to your home decor.', 'sofa-3.png', 549.99, 12),
(203, 11, 4, 'Reclining Armchair', 'Reclining armchair with adjustable positions, offering maximum comfort for relaxation in your living room or home theater.', 'sofa-4.png', 349.99, 25),
(204, 11, 5, 'Tufted Chaise Lounge', 'Tufted chaise lounge with an elegant design, providing a stylish and comfortable spot for lounging and reading in your home.', 'sofa-5.png', 479.99, 18),
(205, 11, 6, 'Mid-Century Modern Sofa', 'Mid-century modern sofa with a timeless design, featuring clean lines and tapered legs for a retro-inspired look.', 'sofa-6.png', 699.99, 15),
(206, 11, 7, 'Convertible Futon Sofa', 'Convertible futon sofa that can be easily transformed into a bed, making it a versatile and space-saving addition to your home.', 'sofa-7.png', 329.99, 10),
(207, 11, 8, 'Power Recliner Set', 'Power recliner set with USB ports, providing convenient charging and relaxation options in a modern and tech-friendly design.', 'sofa-8.png', 799.99, 8),
(208, 11, 9, 'L-Shaped Sectional Sofa', 'L-shaped sectional sofa with ample seating space, perfect for entertaining guests and creating a cozy atmosphere in your living room.', 'sofa-9.png', 899.99, 15),
(209, 11, 10, 'Microfiber Sofa and Loveseat Set', 'Microfiber sofa and loveseat set with soft and durable upholstery, offering a comfortable and inviting seating arrangement for your home.', 'sofa-10.png', 649.99, 20),
(210, 11, 11, 'Modern Leather Recliner', 'Modern leather recliner with a sleek and minimalist design, providing a chic and comfortable seating option for your home or office.', 'sofa-11.png', 449.99, 12),
(211, 11, 12, 'Chic Velvet Sofa', 'Chic velvet sofa with rolled arms and button-tufted details, adding a touch of glamour and sophistication to your living space.', 'sofa-12.png', 569.99, 25),
(212, 11, 13, 'Swivel Glider Chair', 'Swivel glider chair with a contemporary design, offering a stylish and functional seating option for your nursery, living room, or bedroom.', 'sofa-13.png', 389.99, 18),
(213, 11, 14, 'Traditional Sofa and Chair Set', 'Traditional sofa and chair set with classic details, creating an elegant and timeless seating arrangement for your formal living room.', 'sofa-14.png', 749.99, 20),
(214, 11, 15, 'Plaid Upholstered Loveseat', 'Plaid upholstered loveseat with a charming pattern, bringing a cozy and inviting feel to your home decor.', 'sofa-15.png', 519.99, 15),
(215, 11, 16, 'Contemporary Loveseat', 'Contemporary loveseat with clean lines and neutral upholstery, offering a versatile and modern seating option for your home.', 'sofa-16.png', 469.99, 10),
(216, 11, 17, 'Power Lift Recliner', 'Power lift recliner with a lift function, providing assistance to individuals with mobility challenges while maintaining a stylish appearance.', 'sofa-17.png', 699.99, 8),
(217, 11, 18, 'Sleeper Ottoman', 'Sleeper ottoman with a hidden bed, serving as a space-saving and multifunctional furniture piece for your living room or guest room.', 'sofa-18.png', 349.99, 15),
(218, 11, 19, 'Mid-Back Accent Chair', 'Mid-back accent chair with a unique design, adding a pop of color and style to your home decor.', 'sofa-19.png', 259.99, 30),
(219, 11, 20, 'Rustic Wood and Metal Bench', 'Rustic wood and metal bench with a combination of materials, offering a sturdy and industrial-inspired seating option for your entryway or dining area.', 'sofa-20.png', 179.99, 25),
(220, 12, 1, 'Abstract Pattern Tapestry', 'Abstract pattern tapestry with vibrant colors, adding a unique and artistic touch to your living space.', 'Tapestry-1.jpg', 79.99, 15),
(221, 12, 2, 'Nature-Inspired Wall Hanging', 'Nature-inspired wall hanging tapestry featuring scenic landscapes and natural elements, creating a tranquil and soothing atmosphere in your home.', 'Tapestry-2.jpg', 89.99, 20),
(222, 12, 3, 'Bohemian Style Tapestry', 'Bohemian style tapestry with intricate patterns and fringe details, bringing a free-spirited and eclectic vibe to your home decor.', 'Tapestry-3.jpg', 59.99, 12),
(223, 12, 4, 'Mandala Wall Tapestry', 'Mandala wall tapestry with a mesmerizing geometric design, serving as a focal point for meditation and relaxation in your living space.', 'Tapestry-4.jpg', 69.99, 25),
(224, 12, 5, 'Vintage Floral Tapestry', 'Vintage floral tapestry featuring classic flower patterns, adding a touch of nostalgia and elegance to your home.', 'Tapestry-5.jpg', 49.99, 18),
(225, 12, 6, 'Ethnic Print Wall Art', 'Ethnic print wall art tapestry showcasing cultural motifs and symbols, creating a visually stunning and meaningful decoration for your home.', 'Tapestry-6.jpg', 59.99, 15),
(226, 12, 7, 'Galaxy and Stars Tapestry', 'Galaxy and stars tapestry depicting cosmic scenes, bringing a sense of wonder and cosmic beauty to your bedroom or living room.', 'Tapestry-7.jpg', 79.99, 10),
(227, 12, 8, 'Abstract Landscape Wall Tapestry', 'Abstract landscape wall tapestry with bold shapes and colors, making a contemporary statement in your home decor.', 'Tapestry-8.jpg', 69.99, 8),
(228, 12, 9, 'Sun and Moon Celestial Tapestry', 'Sun and moon celestial tapestry with celestial motifs, creating a mystical and celestial ambiance in your living space.', 'Tapestry-9.jpg', 89.99, 15),
(229, 12, 10, 'Ocean Wave Tapestry', 'Ocean wave tapestry capturing the beauty and movement of the sea, bringing a coastal and calming feel to your home.', 'Tapestry-10.jpg', 79.99, 20),
(230, 12, 11, 'Abstract Artistic Tapestry', 'Abstract artistic tapestry showcasing unique and creative patterns, making a bold and imaginative statement in your home decor.', 'Tapestry-11.jpg', 59.99, 12),
(231, 12, 12, 'Colorful Mandala Wall Hanging', 'Colorful mandala wall hanging tapestry with intricate details, adding a burst of color and positive energy to your living space.', 'Tapestry-12.jpg', 69.99, 25),
(232, 12, 13, 'Botanical Print Tapestry', 'Botanical print tapestry featuring lush botanical illustrations, bringing a touch of nature and greenery to your home.', 'Tapestry-13.jpg', 49.99, 18),
(233, 12, 14, 'Retro Geometric Wall Tapestry', 'Retro geometric wall tapestry with a vintage-inspired design, adding a playful and nostalgic element to your home decor.', 'Tapestry-14.jpg', 59.99, 20),
(234, 12, 15, 'Abstract Expressionism Tapestry', 'Abstract expressionism tapestry with bold brushstrokes and vibrant colors, creating a dynamic and artistic focal point in your space.', 'Tapestry-15.jpg', 79.99, 15),
(235, 12, 16, 'Tropical Paradise Wall Art', 'Tropical paradise wall art tapestry featuring exotic flora and fauna, bringing a touch of the tropics to your home.', 'Tapestry-16.jpg', 89.99, 10),
(236, 12, 17, 'Modern Abstract Tapestry', 'Modern abstract tapestry with clean lines and contemporary patterns, adding a sophisticated and artistic touch to your living space.', 'Tapestry-17.jpg', 69.99, 8),
(237, 12, 18, 'Dreamcatcher Wall Tapestry', 'Dreamcatcher wall tapestry with bohemian charm, creating a whimsical and spiritual atmosphere in your bedroom or meditation space.', 'Tapestry-18.jpg', 59.99, 15),
(238, 12, 19, 'Rustic Woven Wall Hanging', 'Rustic woven wall hanging tapestry with textured details, adding a touch of warmth and coziness to your home decor.', 'Tapestry-19.jpg', 69.99, 10),
(239, 12, 20, 'Cityscape Urban Art Tapestry', 'Cityscape urban art tapestry featuring city skyline views, adding an urban and cosmopolitan vibe to your living space.', 'Tapestry-20.jpg', 79.99, 25),
(240, 13, 1, 'Modern Dual Flush Toilet', 'Modern dual flush toilet with water-saving technology, providing efficiency and style to your bathroom.', 'toilet-1.png', 299.99, 15),
(241, 13, 2, 'Elongated Comfort Height Toilet', 'Elongated comfort height toilet with an ergonomic design, offering added comfort and accessibility in your bathroom.', 'toilet-2.png', 349.99, 20),
(242, 13, 3, 'Smart Bidet Toilet Seat', 'Smart bidet toilet seat with customizable features, bringing advanced hygiene and convenience to your daily bathroom routine.', 'toilet-3.png', 499.99, 12),
(243, 13, 4, 'Compact Corner Toilet', 'Compact corner toilet designed for small spaces, offering a space-saving and efficient solution for your bathroom layout.', 'toilet-4.png', 249.99, 25),
(244, 13, 5, 'Wall-Mounted Dual Flush Toilet', 'Wall-mounted dual flush toilet with a sleek and space-saving design, creating a modern and minimalist look in your bathroom.', 'toilet-5.png', 399.99, 18),
(245, 13, 6, 'Round Bowl Toilet', 'Round bowl toilet with a classic design, suitable for smaller bathrooms and powder rooms without compromising on style and functionality.', 'toilet-6.png', 199.99, 15),
(246, 13, 7, 'Comfort Grip Handle Toilet', 'Comfort grip handle toilet with an easy-to-use handle design, providing convenience and accessibility for users of all ages.', 'toilet-7.png', 279.99, 10),
(247, 13, 8, 'Skirted One-Piece Toilet', 'Skirted one-piece toilet with a seamless and easy-to-clean design, offering a contemporary and hygienic addition to your bathroom.', 'toilet-8.png', 449.99, 8),
(248, 13, 9, 'High-Efficiency Dual Flush Toilet', 'High-efficiency dual flush toilet with powerful flushing performance, promoting water conservation without sacrificing performance.', 'toilet-9.png', 329.99, 20),
(249, 13, 10, 'Square Front Toilet', 'Square front toilet with a modern and geometric design, adding a touch of sophistication to your bathroom decor.', 'toilet-10.png', 369.99, 12),
(250, 13, 11, 'Soft Close Toilet Seat', 'Soft close toilet seat with a gentle and quiet closing mechanism, preventing slamming and providing a discreet and peaceful bathroom experience.', 'toilet-11.png', 59.99, 25),
(251, 13, 12, 'Pressure Assist Toilet', 'Pressure assist toilet with a high-powered flush, ensuring effective waste removal and maintaining a clean and hygienic bathroom environment.', 'toilet-12.png', 499.99, 18),
(252, 13, 13, 'Compact Round Front Toilet', 'Compact round front toilet designed for tight spaces, offering a practical and space-efficient solution for small bathrooms.', 'toilet-13.png', 239.99, 15),
(253, 13, 14, 'Touchless Flush Toilet', 'Touchless flush toilet with sensor technology, providing a hygienic and hands-free flushing experience in your bathroom.', 'toilet-14.png', 379.99, 10),
(254, 13, 15, 'Dual Flush Corner Toilet', 'Dual flush corner toilet designed to fit seamlessly into corner spaces, optimizing your bathroom layout without sacrificing performance.', 'toilet-15.png', 299.99, 15),
(255, 13, 16, 'Round Front Comfort Height Toilet', 'Round front comfort height toilet with an elevated seat, offering added comfort and accessibility for users with mobility considerations.', 'toilet-16.png', 319.99, 20),
(256, 13, 17, 'Bidet Attachment for Toilet', 'Bidet attachment for toilet with adjustable settings, providing a cost-effective and eco-friendly alternative to traditional toilet paper.', 'toilet-17.png', 89.99, 18),
(257, 13, 18, 'Vintage Style High Tank Toilet', 'Vintage style high tank toilet with a classic pull chain flush, adding a touch of nostalgia and vintage charm to your bathroom.', 'toilet-18.png', 599.99, 25),
(258, 13, 19, 'Square Front Dual Flush Toilet', 'Square front dual flush toilet with a contemporary design, combining style and water-saving functionality in your bathroom.', 'toilet-19.png', 349.99, 10),
(259, 13, 20, 'Modern Wall-Hung Toilet', 'Modern wall-hung toilet with a suspended design, creating a clean and contemporary look while maximizing floor space in your bathroom.', 'toilet-20.png', 429.99, 8),
(260, 14, 1, 'Sliding Door Wardrobe', 'Sliding door wardrobe with ample storage space, providing a stylish and functional solution for organizing your clothes and accessories.', 'wardrobe-1.jpg', 699.99, 15),
(261, 14, 2, 'Wooden Wardrobe with Drawers', 'Wooden wardrobe with drawers for added storage, featuring a classic design that complements a variety of bedroom styles.', 'wardrobe-2.jpg', 799.99, 20),
(262, 14, 3, 'Mirrored Wardrobe Armoire', 'Mirrored wardrobe armoire with a full-length mirror, offering both storage and a convenient dressing mirror in one elegant piece of furniture.', 'wardrobe-3.jpg', 899.99, 12),
(263, 14, 4, 'Modern Freestanding Closet', 'Modern freestanding closet with open shelving and hanging space, allowing you to showcase and organize your clothing in a contemporary way.', 'wardrobe-4.jpg', 549.99, 25),
(264, 14, 5, 'Corner Wardrobe Unit', 'Corner wardrobe unit designed to maximize space in your bedroom, providing a functional and stylish storage solution for tight corners.', 'wardrobe-5.jpg', 449.99, 18),
(265, 14, 6, 'Built-In Closet Organizer', 'Built-in closet organizer with customizable shelves and drawers, helping you create a personalized and efficient storage system for your belongings.', 'wardrobe-6.jpg', 649.99, 15),
(266, 14, 7, 'Rustic Wardrobe Cabinet', 'Rustic wardrobe cabinet with distressed wood finish, adding a touch of farmhouse charm to your bedroom while offering practical storage.', 'wardrobe-7.jpg', 499.99, 10),
(267, 14, 8, 'Walk-In Closet System', 'Walk-in closet system with modular components, allowing you to design and organize a spacious walk-in closet tailored to your needs and preferences.', 'wardrobe-8.jpg', 1299.99, 8),
(268, 14, 9, 'Children\'s Wardrobe with Fun Design', 'Children\'s wardrobe with a playful and fun design, providing a whimsical and functional storage solution for your child\'s clothes and accessories.', 'wardrobe-9.jpg', 299.99, 20),
(269, 14, 10, 'Traditional Wardrobe with Carved Details', 'Traditional wardrobe with carved details and antique-inspired design, bringing a touch of timeless elegance to your bedroom decor.', 'wardrobe-10.jpg', 899.99, 12),
(270, 14, 11, 'Compact Wardrobe with Sliding Doors', 'Compact wardrobe with sliding doors, ideal for smaller spaces, offering discreet and efficient storage without compromising on style.', 'wardrobe-11.jpg', 399.99, 15),
(271, 14, 12, 'Metal Frame Wardrobe', 'Metal frame wardrobe with an industrial look, featuring sturdy construction and a minimalist design for a modern and urban-inspired bedroom.', 'wardrobe-12.jpg', 549.99, 25),
(272, 14, 13, 'Contemporary Wardrobe Set', 'Contemporary wardrobe set with a matching dresser, providing a coordinated and stylish storage solution for your bedroom.', 'wardrobe-13.jpg', 799.99, 18),
(273, 14, 14, 'Wall-Mounted Wardrobe Shelf', 'Wall-mounted wardrobe shelf with hooks, offering a space-saving and functional storage option for coats, hats, and other accessories.', 'wardrobe-14.jpg', 129.99, 15),
(274, 14, 15, 'Built-In Wardrobe Closet', 'Built-in wardrobe closet with integrated lighting, creating a sophisticated and organized storage space for your clothes and accessories.', 'wardrobe-15.jpg', 999.99, 10),
(275, 14, 16, 'Freestanding Canvas Wardrobe', 'Freestanding canvas wardrobe with fabric cover, providing a portable and flexible storage solution that can be easily moved around your home.', 'wardrobe-16.jpg', 79.99, 18),
(276, 14, 17, 'L-Shaped Wardrobe System', 'L-shaped wardrobe system with multiple compartments and hanging rails, optimizing corner spaces in your bedroom for efficient storage.', 'wardrobe-17.jpg', 699.99, 15),
(277, 14, 18, 'Antique Wardrobe with Mirror', 'Antique wardrobe with a mirrored door, offering a touch of vintage charm and functionality for your bedroom or dressing room.', 'wardrobe-18.jpg', 1199.99, 20),
(278, 14, 19, 'Minimalist Wardrobe Design', 'Minimalist wardrobe design with clean lines and neutral tones, providing a sleek and contemporary storage solution for modern bedrooms.', 'wardrobe-19.jpg', 599.99, 12),
(279, 14, 20, 'Portable Fabric Closet', 'Portable fabric closet with zipper doors, offering a temporary and versatile storage solution for seasonal clothing or as a quick wardrobe supplement.', 'wardrobe-20.jpg', 49.99, 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `discount_percentage` decimal(5,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` int(11) NOT NULL,
  `method_name` varchar(255) DEFAULT NULL,
  `standard_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `method_name`, `standard_price`) VALUES
(1, 'Fast', 22.99),
(2, 'Standard', 19.99),
(3, 'Free ship', 0.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ship_method` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `total_price` float(11,2) DEFAULT NULL,
  `canceled_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shopping_carts`
--

INSERT INTO `shopping_carts` (`id`, `user_id`, `created_at`, `status`, `ship_method`, `note`, `total_price`, `canceled_at`) VALUES
(1, 5, '2023-11-06 11:35:25', 4, 2, 'HIIHIHIH', 1123.91, NULL),
(2, 1, '2023-11-06 16:47:01', 4, 1, '', 999.99, NULL),
(4, 5, '2023-11-08 10:56:58', 4, 1, '0', 999.99, NULL),
(5, 5, '2023-11-04 17:57:24', 4, 1, '0', 922.98, NULL),
(6, 5, '2023-11-04 17:57:50', 4, 2, '0', 6019.87, NULL),
(7, 7, '2022-11-14 18:28:08', 4, 1, '', 922.98, NULL),
(8, 7, '2022-11-14 18:29:14', 4, 1, '', 112.98, NULL),
(9, 7, '2023-11-15 08:33:28', 4, 1, '', 1922.97, NULL),
(10, 7, '2023-11-15 09:14:51', 4, 1, '', 1622.98, NULL),
(11, 7, '2023-11-15 10:39:47', 4, 1, '', 3222.95, NULL),
(12, 7, '2023-11-15 14:24:43', 4, 1, '', 2802.96, NULL),
(13, 7, '2023-11-15 14:25:17', 4, 2, '', 1319.97, NULL),
(14, 7, '2023-11-15 14:26:03', 4, 2, '', 2579.95, NULL),
(15, 7, '2023-11-15 14:44:51', 4, 2, '', 1819.97, NULL),
(16, 7, '2023-11-15 14:46:40', 4, 1, '', 787.94, NULL),
(17, 7, '2023-11-15 14:56:56', 4, 1, '', 922.98, NULL),
(18, 7, '2023-11-15 14:57:08', 4, 1, '', 2522.97, NULL),
(19, 7, '2023-11-15 14:58:29', 4, 1, '', 11242.80, NULL),
(20, 7, '2023-11-15 14:59:26', 4, 1, '', 742.97, NULL),
(21, 7, '2023-11-15 14:59:39', 4, 2, '', 54.98, NULL),
(22, 7, '2023-11-15 15:00:08', 4, 1, '', 1322.96, NULL),
(23, 7, '2023-11-15 15:00:25', 4, 1, '', 1422.98, NULL),
(24, 7, '2023-11-15 15:00:56', 4, 1, '', 2307.90, NULL),
(25, 7, '2022-11-15 15:01:33', 4, 1, '', 6822.95, NULL),
(26, 7, '2022-11-15 15:02:06', 4, 1, '', 197.93, NULL),
(27, 5, '2022-11-15 15:02:43', 4, 2, '', 1819.97, NULL),
(28, 5, '2023-11-15 15:03:10', 4, 1, '', 532.93, NULL),
(29, 5, '2023-11-15 15:03:59', 4, 1, '', 2122.97, NULL),
(30, 5, '2023-11-15 15:04:09', 4, 1, '', 67.98, NULL),
(31, 5, '2023-11-15 15:35:53', 4, 1, '', 15212.84, NULL),
(32, 5, '2023-11-15 15:36:21', 4, 1, '', 1382.95, NULL),
(33, 5, '2023-11-15 15:37:02', 4, 1, '', 1212.97, NULL),
(34, 5, '2023-11-15 15:37:16', 4, 1, '', 102.98, NULL),
(35, 5, '2022-11-15 15:37:28', 4, 1, '', 172.98, NULL),
(36, 5, '2023-11-15 15:38:19', 4, 1, '', 1222.97, NULL),
(37, 5, '2023-11-15 15:38:31', 4, 2, '', 1119.98, NULL),
(38, 5, '2023-11-15 15:38:41', 4, 1, '', 112.98, NULL),
(39, 5, '2023-11-15 15:38:51', 4, 1, '', 252.98, NULL),
(40, 5, '2023-11-15 15:39:05', 4, 1, '', 82.98, NULL),
(41, 1, '2023-11-15 15:39:50', 4, 1, '', 1312.97, NULL),
(42, 1, '2022-11-15 15:40:07', 4, 1, '', 1667.97, NULL),
(43, 1, '2022-10-15 13:41:29', 4, 1, '', 822.97, NULL),
(44, 1, '2023-11-15 15:41:42', 4, 1, '', 1122.98, NULL),
(45, 1, '2023-11-15 15:44:47', 4, 2, '', 1122.98, NULL),
(46, 2, '2022-11-15 15:45:38', 4, 1, '', 112.98, NULL),
(47, 2, '2023-11-15 15:46:30', 4, 1, '', 852.97, NULL),
(48, 1, '2023-11-15 16:06:48', 4, 1, '', 1122.98, NULL),
(49, 1, '2023-11-15 16:07:39', 4, 1, '', 922.98, NULL),
(50, 1, '2023-11-15 16:08:06', 4, 1, '', 1422.98, NULL),
(51, 8, '2022-11-15 16:15:29', 4, 2, '', 9122.65, NULL),
(52, 8, '2023-11-15 16:21:24', 4, 1, '', 1752.95, NULL),
(53, 8, '2023-11-15 16:22:15', 4, 1, '', 172.98, NULL),
(54, 8, '2023-11-15 16:22:36', 4, 1, '', 722.98, NULL),
(55, 8, '2023-11-15 16:26:11', 4, 1, '', 272.98, NULL),
(56, 1, '2023-11-15 16:28:20', 4, 1, '', 272.98, NULL),
(57, 1, '2023-11-15 16:28:32', 4, 1, '', 222.98, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_cart`
--

CREATE TABLE `status_cart` (
  `id` int(11) NOT NULL,
  `name_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `status_cart`
--

INSERT INTO `status_cart` (`id`, `name_status`) VALUES
(1, 'Waiting for confirm'),
(2, 'Confirmed'),
(3, 'Delivering'),
(4, 'Delivered'),
(5, 'Cancelled');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `image`) VALUES
(1, 'ducooms', 'n88vEy5SXEq4@tP', 'user', '2023-11-15 10:27:42', NULL),
(2, 'user2', 'password2', 'user', '2023-10-17 04:13:34', NULL),
(3, 'user3', 'password3', 'user', '2023-10-17 04:13:34', NULL),
(4, 'user4', 'password4', 'user', '2023-10-17 04:13:34', NULL),
(5, 'user5', 'password5', 'user', '2023-10-17 04:13:34', NULL),
(6, 'user6', 'password6', 'user', '2023-10-17 04:13:34', NULL),
(7, 'user7', 'password7', 'user', '2023-11-14 16:07:37', NULL),
(8, 'user8', 'password8', 'user', '2023-10-17 04:13:34', NULL),
(9, 'user9', 'password9', 'user', '2023-10-17 04:13:34', NULL),
(10, 'user10', 'password10', 'user', '2023-10-17 04:13:34', NULL),
(11, 'admin1', 'adminpass1', 'admin', '2023-10-17 04:14:09', NULL),
(12, 'admin2', 'adminpass2', 'admin', '2023-10-17 04:14:09', NULL),
(13, 'admin3', 'adminpass3', 'admin', '2023-10-17 04:14:09', NULL),
(14, 'admin4', 'adminpass4', 'admin', '2023-10-17 04:14:09', NULL),
(15, 'admin5', 'adminpass5', 'admin', '2023-10-17 04:14:09', NULL),
(16, 'admin6', 'adminpass6', 'admin', '2023-10-17 04:14:09', NULL),
(17, 'admin7', 'adminpass7', 'admin', '2023-10-17 04:14:09', NULL),
(18, 'admin8', 'adminpass8', 'admin', '2023-10-17 04:14:09', NULL),
(19, 'admin9', 'adminpass9', 'admin', '2023-10-17 04:14:09', NULL),
(20, 'admin10', 'adminpass10', 'admin', '2023-10-17 04:14:09', NULL),
(21, 'admin11', 'adminpass11', 'admin', '2023-10-17 04:14:09', NULL),
(22, 'admin12', 'adminpass12', 'admin', '2023-10-17 04:14:09', NULL),
(23, 'admin13', 'adminpass13', 'admin', '2023-10-17 04:14:09', NULL),
(24, 'admin14', 'adminpass14', 'admin', '2023-10-17 04:14:09', NULL),
(25, 'admin15', 'adminpass15', 'admin', '2023-10-17 04:14:09', NULL),
(26, 'admin16', 'adminpass16', 'admin', '2023-10-17 04:14:09', NULL),
(27, 'admin17', 'adminpass17', 'admin', '2023-10-17 04:14:09', NULL),
(28, 'admin18', 'adminpass18', 'admin', '2023-10-17 04:14:09', NULL),
(29, 'admin19', 'adminpass19', 'admin', '2023-10-17 04:14:09', NULL),
(30, 'admin20', 'adminpass20', 'admin', '2023-10-17 04:14:09', NULL),
(280, 'kaka1', NULL, NULL, '2023-11-14 07:45:23', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `address_cart`
--
ALTER TABLE `address_cart`
  ADD KEY `FK_address_cart_shopping_carts` (`id_cart`),
  ADD KEY `FK_address_cart_shopping_carts_2` (`username`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `cart_items_ibfk_3` (`user`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_category_id` (`parent_category_id`);

--
-- Chỉ mục cho bảng `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `FK_shopping_carts_shipping_methods_2` (`ship_method`),
  ADD KEY `FK_shopping_carts_status_cart` (`status`);

--
-- Chỉ mục cho bảng `status_cart`
--
ALTER TABLE `status_cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `FK_addresses_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `address_cart`
--
ALTER TABLE `address_cart`
  ADD CONSTRAINT `FK_address_cart_shopping_carts` FOREIGN KEY (`id_cart`) REFERENCES `shopping_carts` (`id`),
  ADD CONSTRAINT `FK_address_cart_shopping_carts_2` FOREIGN KEY (`username`) REFERENCES `shopping_carts` (`id`);

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `shopping_carts` (`id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_items_ibfk_3` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD CONSTRAINT `payment_methods_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Các ràng buộc cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `FK_shopping_carts_shipping_methods` FOREIGN KEY (`ship_method`) REFERENCES `shipping_methods` (`id`),
  ADD CONSTRAINT `FK_shopping_carts_shipping_methods_2` FOREIGN KEY (`ship_method`) REFERENCES `shipping_methods` (`id`),
  ADD CONSTRAINT `FK_shopping_carts_status_cart` FOREIGN KEY (`status`) REFERENCES `status_cart` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
