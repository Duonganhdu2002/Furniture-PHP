-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 14, 2023 lúc 03:14 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web-noi-that`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `BrandID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `WebsiteURL` varchar(255) DEFAULT NULL,
  `LogoURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`BrandID`, `Name`, `Description`, `WebsiteURL`, `LogoURL`) VALUES
(1, 'IKEA', 'IKEA is a Swedish multinational company that designs and sells ready-to-assemble furniture, kitchen appliances, and home accessories. It is known for its modern, affordable furniture.', 'https://www.ikea.com', 'https://www.ikea.com/logo.png'),
(2, 'Ashley Furniture', 'Ashley Furniture Industries, Inc. is one of the largest manufacturers of furniture in the world. They offer a wide range of furniture styles for all types of living spaces.', 'https://www.ashleyfurniture.com', 'https://www.ashleyfurniture.com/logo.png'),
(3, 'Ethan Allen', 'Ethan Allen is a high-end furniture manufacturer and retailer. They are known for their classic and traditional furniture designs.', 'https://www.ethanallen.com', 'https://www.ethanallen.com/logo.png'),
(4, 'West Elm', 'West Elm is a modern furniture and home decor brand. They focus on contemporary and stylish designs for urban living.', 'https://www.westelm.com', 'https://www.westelm.com/logo.png'),
(5, 'Crate & Barrel', 'Crate & Barrel is a popular home furnishings retailer offering a variety of furniture, decor, and kitchenware.', 'https://www.crateandbarrel.com', 'https://www.crateandbarrel.com/logo.png'),
(6, 'Room & Board', 'Room & Board is a modern furniture and home decor company with a focus on American craftsmanship and sustainability.', 'https://www.roomandboard.com', 'https://www.roomandboard.com/logo.png'),
(7, 'Herman Miller', 'Herman Miller is a leading American manufacturer of office furniture and equipment. They are known for their ergonomic and innovative designs.', 'https://www.hermanmiller.com', 'https://www.hermanmiller.com/logo.png'),
(8, 'La-Z-Boy', 'La-Z-Boy is a well-known brand for recliners and comfortable seating. They offer a range of upholstery and motion furniture.', 'https://www.la-z-boy.com', 'https://www.la-z-boy.com/logo.png'),
(9, 'Bob\'s Discount Furniture', 'Bob’s Discount Furniture is a budget-friendly furniture retailer known for its affordability and diverse product range.', 'https://www.mybobs.com', 'https://www.mybobs.com/logo.png'),
(10, 'Havertys', 'Havertys is a furniture retailer specializing in traditional and transitional styles. They offer a range of home furnishings.', 'https://www.havertys.com', 'https://www.havertys.com/logo.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `ParentCategoryID` int(11) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `UpdatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`CategoryID`, `ParentCategoryID`, `Name`, `Description`, `CreatedAt`, `UpdatedAt`) VALUES
(1, NULL, 'Living Room', 'Furniture and accessories for the living room.', '2023-09-14 18:15:01', '2023-09-14 18:15:01'),
(2, NULL, 'Dining Room', 'Furniture and accessories for the dining room.', '2023-09-14 18:15:01', '2023-09-14 18:15:01'),
(3, NULL, 'Bedroom', 'Furniture and accessories for the bedroom.', '2023-09-14 18:15:01', '2023-09-14 18:15:01'),
(4, NULL, 'Outdoor', 'Outdoor furniture and accessories for your outdoor spaces.', '2023-09-14 18:15:01', '2023-09-14 18:15:01'),
(5, NULL, 'Reclining Furniture', 'Furniture with reclining features, such as recliners and reclining sofas.', '2023-09-14 18:15:01', '2023-09-14 18:15:01'),
(6, NULL, 'Sectional Sofas', 'Sectional sofas for flexible seating arrangements.', '2023-09-14 18:15:01', '2023-09-14 18:15:01'),
(7, NULL, 'Mattresses', 'Various types and sizes of mattresses for a good night\'s sleep.', '2023-09-14 18:15:01', '2023-09-14 18:15:01'),
(8, NULL, 'Home Office', 'Furniture and equipment for your home office.', '2023-09-14 18:15:01', '2023-09-14 18:15:01'),
(9, NULL, 'Kids Room', 'Furniture and decor for children\'s rooms.', '2023-09-14 18:15:01', '2023-09-14 18:15:01'),
(10, NULL, 'Area Rugs', 'Decorative area rugs for your home.', '2023-09-14 18:15:01', '2023-09-14 18:15:01'),
(11, NULL, 'Home Decor', 'Decorative items for your home, including wall art, vases, and decorative cushions.', '2023-09-14 18:15:01', '2023-09-14 18:15:01'),
(12, NULL, 'Outlet', 'Discounted and clearance items.', '2023-09-14 18:15:01', '2023-09-14 18:15:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `PostalCode` varchar(20) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`CustomerID`, `FirstName`, `LastName`, `Email`, `Phone`, `Address`, `City`, `State`, `PostalCode`, `Country`) VALUES
(1, 'John', 'Doe', 'johndoe@example.com', '123-456-7890', '123 Main St', 'Los Angeles', 'CA', '90001', 'USA'),
(2, 'Jane', 'Smith', 'janesmith@example.com', '987-654-3210', '456 Elm St', 'New York', 'NY', '10001', 'USA'),
(3, 'Michael', 'Johnson', 'michaeljohnson@example.com', '555-123-4567', '789 Oak Ave', 'Chicago', 'IL', '60601', 'USA'),
(4, 'Sarah', 'Williams', 'sarahwilliams@example.com', '333-999-8888', '101 Pine Rd', 'San Francisco', 'CA', '94101', 'USA'),
(5, 'David', 'Brown', 'davidbrown@example.com', '777-888-9999', '222 Maple Ln', 'Miami', 'FL', '33101', 'USA'),
(6, 'Susan', 'Lee', 'susanlee@example.com', '111-222-3333', '555 Birch St', 'Boston', 'MA', '02201', 'USA'),
(7, 'James', 'Anderson', 'jamesanderson@example.com', '999-555-4444', '444 Cedar Rd', 'Houston', 'TX', '77001', 'USA'),
(8, 'Emily', 'Garcia', 'emilygarcia@example.com', '333-777-6666', '777 Pine Ave', 'Phoenix', 'AZ', '85001', 'USA'),
(9, 'Daniel', 'Martinez', 'danielmartinez@example.com', '888-777-5555', '999 Oak Rd', 'Philadelphia', 'PA', '19101', 'USA'),
(10, 'Linda', 'Lopez', 'lindalopez@example.com', '222-444-7777', '111 Elm St', 'Denver', 'CO', '80201', 'USA'),
(11, 'Robert', 'Gonzalez', 'robertgonzalez@example.com', '555-666-2222', '333 Maple Ave', 'Seattle', 'WA', '98101', 'USA'),
(12, 'Karen', 'Harris', 'karenharris@example.com', '111-555-6666', '555 Cedar Rd', 'Atlanta', 'GA', '30301', 'USA'),
(13, 'William', 'Jackson', 'williamjackson@example.com', '888-444-6666', '777 Birch St', 'Dallas', 'TX', '75201', 'USA'),
(14, 'Patricia', 'Young', 'patriciayoung@example.com', '555-777-3333', '444 Oak Ave', 'San Diego', 'CA', '92101', 'USA'),
(15, 'Richard', 'Moore', 'richardmoore@example.com', '222-111-5555', '666 Pine Rd', 'Minneapolis', 'MN', '55401', 'USA'),
(16, 'Jennifer', 'Taylor', 'jennifertaylor@example.com', '111-666-8888', '777 Elm St', 'Portland', 'OR', '97201', 'USA'),
(17, 'Joseph', 'Walker', 'josephwalker@example.com', '666-777-1111', '222 Cedar Ln', 'Detroit', 'MI', '48201', 'USA'),
(18, 'Maria', 'King', 'mariaking@example.com', '777-555-3333', '333 Birch Rd', 'Charlotte', 'NC', '28201', 'USA'),
(19, 'Charles', 'Clark', 'charlesclark@example.com', '333-666-7777', '888 Maple St', 'San Antonio', 'TX', '78201', 'USA'),
(20, 'Nancy', 'Lewis', 'nancylewis@example.com', '555-666-4444', '999 Pine Ave', 'Las Vegas', 'NV', '89101', 'USA');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `InventoryID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `QuantityInStock` int(11) NOT NULL,
  `QuantityReserved` int(11) NOT NULL,
  `WarehouseLocation` varchar(255) DEFAULT NULL,
  `LastUpdated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `inventory`
--

INSERT INTO `inventory` (`InventoryID`, `ProductID`, `QuantityInStock`, `QuantityReserved`, `WarehouseLocation`, `LastUpdated`) VALUES
(21, 1, 100, 10, 'Warehouse A', '2023-09-14 18:22:55'),
(22, 2, 75, 5, 'Warehouse B', '2023-09-14 18:22:55'),
(23, 3, 50, 0, 'Warehouse C', '2023-09-14 18:22:55'),
(24, 4, 120, 15, 'Warehouse A', '2023-09-14 18:22:55'),
(25, 5, 60, 8, 'Warehouse B', '2023-09-14 18:22:55'),
(26, 6, 30, 3, 'Warehouse C', '2023-09-14 18:22:55'),
(27, 7, 90, 7, 'Warehouse A', '2023-09-14 18:22:55'),
(28, 8, 110, 10, 'Warehouse B', '2023-09-14 18:22:55'),
(29, 9, 40, 2, 'Warehouse C', '2023-09-14 18:22:55'),
(30, 10, 70, 6, 'Warehouse A', '2023-09-14 18:22:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderDetailID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`, `UnitPrice`) VALUES
(21, 1, 1, 2, 349.99),
(22, 1, 3, 1, 899.99),
(23, 2, 2, 4, 99.99),
(24, 3, 4, 1, 599.99),
(25, 4, 5, 3, 199.99),
(26, 4, 6, 2, 249.99),
(27, 5, 7, 1, 749.99),
(28, 6, 8, 2, 399.99),
(29, 7, 9, 1, 999.99);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `OrderDate` datetime NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `OrderStatus` varchar(255) NOT NULL,
  `PaymentMethod` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `OrderDate`, `TotalAmount`, `OrderStatus`, `PaymentMethod`) VALUES
(1, 1, '2023-09-10 12:30:00', 699.99, 'Processing', 'Credit Card'),
(2, 2, '2023-09-11 14:15:00', 399.99, 'Shipped', 'PayPal'),
(3, 3, '2023-09-12 16:45:00', 899.99, 'Delivered', 'Credit Card'),
(4, 4, '2023-09-13 09:00:00', 299.99, 'Processing', 'Credit Card'),
(5, 5, '2023-09-13 11:30:00', 599.99, 'Processing', 'PayPal'),
(6, 6, '2023-09-14 13:45:00', 499.99, 'Shipped', 'Credit Card'),
(7, 7, '2023-09-15 15:30:00', 1299.99, 'Delivered', 'Credit Card'),
(8, 8, '2023-09-16 17:00:00', 799.99, 'Processing', 'PayPal'),
(9, 9, '2023-09-17 10:15:00', 349.99, 'Shipped', 'Credit Card'),
(10, 10, '2023-09-17 12:45:00', 199.99, 'Processing', 'Credit Card'),
(11, 11, '2023-09-18 14:30:00', 899.99, 'Processing', 'PayPal'),
(12, 12, '2023-09-19 16:00:00', 499.99, 'Delivered', 'Credit Card'),
(13, 13, '2023-09-20 09:45:00', 599.99, 'Processing', 'Credit Card'),
(14, 14, '2023-09-20 11:15:00', 399.99, 'Shipped', 'PayPal'),
(15, 15, '2023-09-21 13:30:00', 299.99, 'Processing', 'Credit Card'),
(16, 16, '2023-09-22 15:00:00', 699.99, 'Delivered', 'Credit Card'),
(17, 17, '2023-09-23 17:15:00', 499.99, 'Processing', 'PayPal'),
(18, 18, '2023-09-24 10:30:00', 349.99, 'Shipped', 'Credit Card'),
(19, 19, '2023-09-25 12:00:00', 799.99, 'Processing', 'Credit Card'),
(20, 20, '2023-09-25 14:45:00', 599.99, 'Delivered', 'PayPal');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `BrandID` int(110) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `StockQuantity` int(11) NOT NULL,
  `ImageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ProductID`, `CategoryID`, `BrandID`, `Name`, `Description`, `Price`, `StockQuantity`, `ImageURL`) VALUES
(1, 1, 1, 'Sofa', 'A comfortable and stylish sofa for your living room.', 599.99, 50, 'sofa_image.jpg'),
(2, 2, 2, 'Dining Table', 'A modern dining table for family gatherings.', 299.99, 30, 'dining_table_image.jpg'),
(3, 3, 3, 'Bed', 'A cozy and durable bed for a good night\'s sleep.', 499.99, 40, 'bed_image.jpg'),
(4, 4, 4, 'Outdoor Patio Set', 'Outdoor furniture set for your patio.', 799.99, 20, 'patio_set_image.jpg'),
(5, 5, 5, 'Recliner Chair', 'A comfortable recliner chair for relaxation.', 349.99, 25, 'recliner_chair_image.jpg'),
(6, 6, 6, 'Sectional Sofa', 'A spacious sectional sofa for flexible seating.', 799.99, 15, 'sectional_sofa_image.jpg'),
(7, 7, 7, 'Queen Mattress', 'A high-quality queen mattress for a comfortable sleep.', 699.99, 35, 'queen_mattress_image.jpg'),
(8, 8, 8, 'Office Desk', 'A functional and stylish office desk for your workspace.', 249.99, 45, 'office_desk_image.jpg'),
(9, 9, 9, 'Kids Bunk Bed', 'A playful bunk bed for children\'s rooms.', 399.99, 10, 'bunk_bed_image.jpg'),
(10, 10, 10, 'Area Rug', 'A decorative area rug to enhance your home decor.', 79.99, 60, 'area_rug_image.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `PromotionID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `DiscountType` varchar(255) NOT NULL,
  `DiscountValue` decimal(10,2) NOT NULL,
  `MinimumPurchaseAmount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `promotions`
--

INSERT INTO `promotions` (`PromotionID`, `Name`, `Description`, `StartDate`, `EndDate`, `DiscountType`, `DiscountValue`, `MinimumPurchaseAmount`) VALUES
(1, 'Summer Sale', 'Get discounts on various products this summer.', '2023-06-01 00:00:00', '2023-08-31 23:59:59', 'Percentage', 10.00, 50.00),
(2, 'Back to School', 'Special offers for back-to-school shopping.', '2023-08-15 00:00:00', '2023-09-15 23:59:59', 'Fixed Amount', 25.00, 100.00),
(3, 'Holiday Season', 'Celebrate the holidays with our exclusive discounts.', '2023-11-15 00:00:00', '2023-12-31 23:59:59', 'Percentage', 15.00, 75.00),
(4, 'Black Friday', 'Don\'t miss out on our Black Friday deals.', '2023-11-24 00:00:00', '2023-11-27 23:59:59', 'Percentage', 20.00, 100.00),
(5, 'Cyber Monday', 'Shop online and save on Cyber Monday.', '2023-11-27 00:00:00', '2023-11-27 23:59:59', 'Fixed Amount', 30.00, 150.00),
(6, 'Spring Clearance', 'Clearance discounts on select items this spring.', '2023-04-01 00:00:00', '2023-04-30 23:59:59', 'Percentage', 15.00, 50.00),
(7, 'New Year Sale', 'Start the year with savings on home essentials.', '2023-01-01 00:00:00', '2023-01-15 23:59:59', 'Fixed Amount', 40.00, 200.00),
(8, 'Valentine\'s Day', 'Special discounts for a romantic Valentine\'s Day.', '2023-02-01 00:00:00', '2023-02-14 23:59:59', 'Percentage', 10.00, 50.00),
(9, 'Easter Promotion', 'Egg-citing discounts for the Easter season.', '2023-03-15 00:00:00', '2023-03-31 23:59:59', 'Fixed Amount', 20.00, 75.00),
(10, 'Labor Day', 'Celebrate Labor Day with our exclusive offers.', '2023-09-01 00:00:00', '2023-09-04 23:59:59', 'Percentage', 10.00, 50.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `useraccounts`
--

CREATE TABLE `useraccounts` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `UserRole` varchar(255) NOT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `UpdatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `useraccounts`
--

INSERT INTO `useraccounts` (`UserID`, `Username`, `Password`, `FirstName`, `LastName`, `Email`, `UserRole`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'john_doe', 'password123', 'John', 'Doe', 'johndoe@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(2, 'jane_smith', 'securepass', 'Jane', 'Smith', 'janesmith@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(3, 'admin_user', 'adminpass', 'Admin', 'User', 'admin@example.com', 'Admin', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(4, 'michael_johnson', 'michaelpass', 'Michael', 'Johnson', 'michaeljohnson@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(5, 'sarah_williams', 'sarahpass', 'Sarah', 'Williams', 'sarahwilliams@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(6, 'david_brown', 'davidpass', 'David', 'Brown', 'davidbrown@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(7, 'susan_lee', 'susanpass', 'Susan', 'Lee', 'susanlee@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(8, 'james_anderson', 'jamespass', 'James', 'Anderson', 'jamesanderson@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(9, 'emily_garcia', 'emilypass', 'Emily', 'Garcia', 'emilygarcia@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(10, 'daniel_martinez', 'danielpass', 'Daniel', 'Martinez', 'danielmartinez@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(11, 'linda_lopez', 'lindapass', 'Linda', 'Lopez', 'lindalopez@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(12, 'robert_gonzalez', 'robertpass', 'Robert', 'Gonzalez', 'robertgonzalez@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(13, 'karen_harris', 'karenpass', 'Karen', 'Harris', 'karenharris@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(14, 'william_jackson', 'williampass', 'William', 'Jackson', 'williamjackson@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(15, 'patricia_young', 'patriciapass', 'Patricia', 'Young', 'patriciayoung@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(16, 'richard_moore', 'richardpass', 'Richard', 'Moore', 'richardmoore@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(17, 'jennifer_taylor', 'jenniferpass', 'Jennifer', 'Taylor', 'jennifertaylor@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(18, 'joseph_walker', 'josephpass', 'Joseph', 'Walker', 'josephwalker@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(19, 'maria_king', 'mariapass', 'Maria', 'King', 'mariaking@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(20, 'charles_clark', 'charlespass', 'Charles', 'Clark', 'charlesclark@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16'),
(21, 'nancy_lewis', 'nancypass', 'Nancy', 'Lewis', 'nancylewis@example.com', 'User', '2023-09-14 18:24:16', '2023-09-14 18:24:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warranties`
--

CREATE TABLE `warranties` (
  `WarrantyID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `WarrantyLength` int(11) NOT NULL,
  `WarrantyDescription` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `warranties`
--

INSERT INTO `warranties` (`WarrantyID`, `ProductID`, `WarrantyLength`, `WarrantyDescription`) VALUES
(21, 1, 24, '2-year warranty for the sofa.'),
(22, 2, 12, '1-year warranty for the dining table.'),
(23, 3, 36, '3-year warranty for the bed.'),
(24, 4, 24, '2-year warranty for the outdoor patio set.'),
(25, 5, 12, '1-year warranty for the recliner chair.'),
(26, 6, 24, '2-year warranty for the sectional sofa.'),
(27, 7, 36, '3-year warranty for the queen mattress.'),
(28, 8, 12, '1-year warranty for the office desk.'),
(29, 9, 24, '2-year warranty for the kids bunk bed.'),
(30, 10, 12, '1-year warranty for the area rug.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BrandID`) USING BTREE;

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`) USING BTREE,
  ADD KEY `ParentCategoryID` (`ParentCategoryID`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`InventoryID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`) USING BTREE,
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`) USING BTREE,
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `BrandID` (`BrandID`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`PromotionID`);

--
-- Chỉ mục cho bảng `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`UserID`);

--
-- Chỉ mục cho bảng `warranties`
--
ALTER TABLE `warranties`
  ADD PRIMARY KEY (`WarrantyID`) USING BTREE,
  ADD KEY `ProductID` (`ProductID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `inventory`
--
ALTER TABLE `inventory`
  MODIFY `InventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `PromotionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `warranties`
--
ALTER TABLE `warranties`
  MODIFY `WarrantyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`ParentCategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Các ràng buộc cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`BrandID`) REFERENCES `brands` (`BrandID`);

--
-- Các ràng buộc cho bảng `warranties`
--
ALTER TABLE `warranties`
  ADD CONSTRAINT `warranties_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
