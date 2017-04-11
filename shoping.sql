-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 11 Avril 2017 à 19:30
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `shoping`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` tinyint(2) DEFAULT NULL,
  `phone` varchar(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`, `email`, `gender`, `phone`, `status`, `created_date`, `update_date`, `avatar`, `address`) VALUES
(1, 'admin', '12345678', '1234', 'vanlong121996@gmail.com', 2, '1234', 0, '2017-04-08 10:03:28', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `status_cate` tinyint(2) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent`, `status_cate`, `created_date`, `update_date`) VALUES
(1, 'Máy tính', NULL, 0, 2, NULL, NULL),
(2, 'Điện thoại', NULL, 0, 2, NULL, NULL),
(3, 'Laptop', NULL, 0, 2, NULL, NULL),
(5, 'Điện thoai', NULL, 0, 2, NULL, NULL),
(6, 'Điều hòa', NULL, 0, 2, NULL, NULL),
(8, 'Apple', NULL, 2, 2, NULL, NULL),
(11, 'Sam sung', NULL, 2, 2, NULL, NULL),
(12, 'Nokia', NULL, 2, 3, NULL, NULL),
(13, 'Dell', NULL, 1, 2, NULL, NULL),
(14, 'HP', NULL, 1, 2, NULL, NULL),
(15, 'galaxy s7', NULL, 11, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(35) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `email`, `phone`, `address`, `note`, `created_date`) VALUES
(34, 'Lê Văn Long', 'vanlong121996@gmail.com', '0969651118', 'Thanh oai', 'Giao hàng lúc 8 giờ tại Minh khai', '2017-04-09 18:12:40'),
(35, 'Long Văn', 'vanlong121996@gmail.com', '0987654321', 'Thanh oai', 'Giao hàng lúc 9h', '2017-04-11 23:22:38'),
(36, 'Trần Thao', 'thao@gmail.com', '0987654321', 'Hà Nội', 'Giao hàng tại Hà Nội', '2017-04-11 23:51:57');

-- --------------------------------------------------------

--
-- Structure de la table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `order_prod`
--

CREATE TABLE `order_prod` (
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `status_order` tinyint(2) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `order_prod`
--

INSERT INTO `order_prod` (`id_order`, `id_customer`, `money`, `qty`, `id_product`, `status_order`, `created_date`, `update_date`) VALUES
(10, 34, 53000000, 53, 2, 2, '2017-04-09 18:12:40', '0000-00-00 00:00:00'),
(11, 34, 56000000, 56, 1, 2, '2017-04-09 18:12:40', '0000-00-00 00:00:00'),
(12, 34, 19800000, 99, 4, 2, '2017-04-09 18:12:40', '0000-00-00 00:00:00'),
(13, 34, 2000000, 10, 3, 2, '2017-04-09 18:12:40', '0000-00-00 00:00:00'),
(14, 35, 1400000, 2, 11, 2, '2017-04-11 23:22:38', '0000-00-00 00:00:00'),
(15, 35, 1000000, 1, 9, 2, '2017-04-11 23:22:38', '0000-00-00 00:00:00'),
(16, 35, 1000000, 1, 1, 2, '2017-04-11 23:22:38', '0000-00-00 00:00:00'),
(17, 36, 200000, 1, 4, 2, '2017-04-11 23:51:58', '0000-00-00 00:00:00'),
(18, 36, 20000000, 1, 6, 2, '2017-04-11 23:51:58', '0000-00-00 00:00:00'),
(19, 36, 700000, 1, 11, 2, '2017-04-11 23:51:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id_prod` int(10) UNSIGNED NOT NULL,
  `name_prod` varchar(100) NOT NULL,
  `status_prod` tinyint(2) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_typeprod` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `content` text,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id_prod`, `name_prod`, `status_prod`, `id_category`, `id_typeprod`, `id_admin`, `image`, `price`, `view`, `description`, `content`, `create_date`, `update_date`) VALUES
(1, 'nokia 630', 1, 12, 5, 0, '11464(1).jpg', 1000000, 0, 'ádsa', '', '2017-04-08 23:24:05', '0000-00-00 00:00:00'),
(2, 'Macbook', 3, 8, 4, 0, '13510776_603586493148745_3124049685442071706_n.png', 1000000, 0, '54', '', '2017-04-08 23:59:34', '2017-04-09 15:39:14'),
(3, 'Dell  vostro', 3, 13, 5, 0, '13335733_589040611272032_2055868807379568364_n.jpg', 200000, 0, ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut', '', '2017-04-09 15:08:27', '0000-00-00 00:00:00'),
(4, 's7', 1, 8, 5, 0, '13510776_603586493148745_3124049685442071706_n.png', 200000, 0, 'ádsa', '', '2017-04-09 15:33:34', '0000-00-00 00:00:00'),
(5, 'Máy giặt đứng', 1, 8, 6, 0, 'anh12 (16).jpg', 12345, 0, '<p>234567</p>\r\n', '<p>123243546576</p>\r\n', '2017-04-11 15:09:03', '0000-00-00 00:00:00'),
(6, '06', 3, 13, 4, 0, 'anh12 (1).jpg', 20000000, 0, '<p>M&aacute;y t&iacute;nh</p>\r\n', '', '2017-04-11 15:10:55', '0000-00-00 00:00:00'),
(7, 'ô tô', 3, 2, 7, 0, 'anh12 (25).jpg', 1000000000, 0, '<p>&ocirc; t&ocirc;</p>\r\n', '<p>&ocirc; t&ocirc;</p>\r\n', '2017-04-11 15:13:48', '0000-00-00 00:00:00'),
(8, 'kaka', 3, 13, 3, 0, 'zro1388742197.jpeg', 400000, 0, '<p>m&aacute;y t&iacute;nh kaka</p>\r\n', '<p>m&aacute;y t&iacute;nh</p>\r\n', '2017-04-11 15:15:27', '0000-00-00 00:00:00'),
(9, 'OPPO', 3, 2, 5, 0, 'anh12 (2).jpg', 1000000, 0, '<p>Đi&ecirc;nh thoại</p>\r\n', '<p>Kh&ocirc;ng ứng dụng</p>\r\n', '2017-04-11 15:16:15', '0000-00-00 00:00:00'),
(10, 'doaremon', 1, 6, 7, 0, 'hinhanhquangcaocuamaytinhbangmicrosoftsurface.jpg', 9000000, 0, '<p>Điều h&ograve;a m&aacute;t lạnh</p>\r\n', '<p>Kh&ocirc;ng hỏng kh&ocirc;ng lấy tiền</p>\r\n', '2017-04-11 15:18:16', '0000-00-00 00:00:00'),
(11, 'Máy tính bảng Longga', 3, 1, 3, 0, 'zro1388742197.jpeg', 700000, 0, '<p>Nhập khẩu nguy&ecirc;n chiếc từ M&oacute;ng C&aacute;i.</p>\r\n\r\n<p>H&agrave;ng chất lượng China</p>\r\n', '<p>M&aacute;y t&iacute;nh&nbsp;</p>\r\n', '2017-04-11 15:24:35', '0000-00-00 00:00:00'),
(12, 'Điện thoại Iphone', 3, 8, 5, 0, 'anh12 (2).jpg', 1000000, 0, '<p>Ram 2gb,bộ nhớ 4gb, hỗ trợ thẻ nhớ&nbsp;30gb.</p>\r\n\r\n<p>Bảo h&agrave;nh 2 năm.</p>\r\n\r\n<p>Nhập khẩu nguy&ecirc;n chiếc từ cửa khẩu T&acirc;n Thanh.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Iphone</p>\r\n', '2017-04-11 15:30:31', '2017-04-11 15:31:25');

-- --------------------------------------------------------

--
-- Structure de la table `product_type`
--

CREATE TABLE `product_type` (
  `id_type` int(10) UNSIGNED NOT NULL,
  `name_type` varchar(200) DEFAULT NULL,
  `status_type` tinyint(2) DEFAULT NULL,
  `id_cate` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `product_type`
--

INSERT INTO `product_type` (`id_type`, `name_type`, `status_type`, `id_cate`, `created_date`, `update_date`) VALUES
(3, 'Máy tính', 1, NULL, NULL, NULL),
(4, 'Laptop', 2, NULL, NULL, NULL),
(5, 'Điện thoai', 2, NULL, NULL, NULL),
(6, 'máy giặt đứng', 2, NULL, NULL, NULL),
(7, 'Lambogrini', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `gender` tinyint(2) DEFAULT NULL,
  `status` tinyint(2) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `gender`, `status`, `created_date`, `update_date`, `avatar`, `address`) VALUES
(2, 'member1', '250cf8b51c773f3f8dc8b4be867a9a02', 'member1', 'vanlong121996@gmail.com', '0969651118', 0, 0, '2017-04-09 19:59:26', NULL, NULL, NULL),
(3, 'long12', 'e10adc3949ba59abbe56e057f20f883e', 'Long Lê Văn', 'vanlong121996@gmail.com', '0969651118', 0, 0, '2017-04-09 20:05:55', NULL, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_prod`
--
ALTER TABLE `order_prod`
  ADD PRIMARY KEY (`id_order`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_prod`);

--
-- Index pour la table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `order_prod`
--
ALTER TABLE `order_prod`
  MODIFY `id_order` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id_prod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id_type` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
