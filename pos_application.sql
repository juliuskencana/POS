-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Feb 2015 pada 06.36
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos_application`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`, `is_active`) VALUES
(1, 'admin', '$2y$10$5KLuL0hD6a8U4rlaIfEBou0e.0POk4blpjNkur.AgPJfrhLat1iJC', 'admin@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`customer_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `address`, `phone`, `hp`, `email`) VALUES
(1, 'julius', 'jalan kemerdekaan tengah nomor 1099', '0217775240', '085681662849', 'julius@wamplo.com'),
(4, 'ferddy', 'citayam raya nomor 25', '0217775249', '085445662896', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `debt_transactions`
--

CREATE TABLE IF NOT EXISTS `debt_transactions` (
`debt_transaction_id` int(11) NOT NULL,
  `total_debt` int(11) DEFAULT NULL,
  `total_installment` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0: hutang, 1: lunas',
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `debt_transaction_details`
--

CREATE TABLE IF NOT EXISTS `debt_transaction_details` (
`debt_transaction_detail_id` int(11) NOT NULL,
  `debt_transaction_id` int(11) DEFAULT NULL,
  `installment_to` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`item_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`item_id`, `name`) VALUES
(1, 'BAJU KAOS'),
(2, 'Kaos buntung'),
(3, 'Singlet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
`stock_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `capital_price` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `stocks`
--

INSERT INTO `stocks` (`stock_id`, `admin_id`, `unit_id`, `item_id`, `capital_price`, `profit`, `stock`, `timestamp`) VALUES
(2, 1, 2, 1, 138889, 20, 34, '2015-02-02 20:54:37'),
(3, 1, 1, 1, 100000, 10, 100, '2015-02-07 22:05:10'),
(4, 1, 1, 2, 500000, 15, 0, '2015-02-10 19:58:57'),
(5, 1, 2, 3, 100000, 12, 0, '2015-02-10 19:58:57'),
(6, 1, 3, 3, 1200000, 75, 5, '2015-02-13 19:03:28'),
(7, 1, 4, 3, 120000, 10, 200, '2015-02-13 19:32:03'),
(8, 1, 1, 3, 105000, 10, 20, '2015-02-16 18:44:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
`supplier_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`, `address`, `phone`, `hp`, `email`) VALUES
(1, 'Gildan', 'jalan kemerdekaan tengah nomor 1099', '0217775286', '085465455541', 'gildan@gmail.com'),
(2, 'Polo', 'jalan agung lima nomor 4', '0217775286', '087886617464', ''),
(3, 'H & M', 'jalan kemerdekaan tengah nomor 1099', '0215565415', '085741102321', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
`transaction_id` int(11) NOT NULL,
  `debt_transaction_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `transaction_type` int(11) DEFAULT NULL COMMENT '1: sales, 2:receivings, 3: cancel',
  `is_cancel` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `debt_transaction_id`, `admin_id`, `supplier_id`, `customer_id`, `transaction_type`, `is_cancel`, `timestamp`) VALUES
(7, NULL, 1, 1, NULL, 2, NULL, '2015-01-28 20:54:37'),
(10, NULL, 1, 3, NULL, 2, NULL, '2015-01-29 20:56:55'),
(11, NULL, 1, 1, NULL, 2, NULL, '2015-02-02 21:01:21'),
(12, NULL, 1, 2, NULL, 2, NULL, '2015-02-02 21:02:50'),
(13, NULL, 1, 1, NULL, 2, NULL, '2015-02-07 22:05:09'),
(14, NULL, 1, 1, NULL, 2, 1, '2015-02-10 19:58:57'),
(16, NULL, 1, NULL, 1, 1, 1, '2015-02-13 18:11:04'),
(18, NULL, 1, NULL, 4, 1, NULL, '2015-02-13 18:30:57'),
(19, NULL, 1, NULL, 1, 1, 1, '2015-02-13 18:42:18'),
(20, NULL, 1, 2, NULL, 2, NULL, '2015-02-13 19:03:28'),
(21, NULL, 1, 2, NULL, 2, NULL, '2015-02-13 19:32:03'),
(22, NULL, 1, 1, NULL, 2, NULL, '2015-02-13 19:32:55'),
(23, NULL, 1, NULL, 4, 1, NULL, '2015-02-16 18:39:39'),
(24, NULL, 1, 2, NULL, 2, NULL, '2015-02-16 18:44:07'),
(25, NULL, 1, 2, NULL, 2, NULL, '2015-02-16 18:46:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
`transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `capital_price` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_detail_id`, `transaction_id`, `item_id`, `unit_id`, `capital_price`, `sell_price`, `quantity`) VALUES
(12, 7, 1, 2, 100000, NULL, 10),
(15, 10, 1, 2, 80000, NULL, 10),
(16, 11, 1, 2, 90000, NULL, 5),
(17, 12, 1, 2, 200000, NULL, 20),
(18, 13, 1, 1, 49000, NULL, 10),
(19, 14, 2, 1, 500000, NULL, 12),
(20, 14, 3, 2, 100000, NULL, 20),
(22, 16, 1, 2, 138889, 152778, 1),
(23, 18, 1, 1, 49000, 53900, 10),
(24, 18, 1, 2, 138889, 152778, 10),
(25, 19, 1, 2, 138889, 152778, 1),
(26, 20, 3, 3, 1200000, NULL, 100),
(27, 21, 3, 4, 120000, NULL, 200),
(28, 22, 1, 1, 100000, NULL, 100),
(29, 23, 3, 3, 1200000, 1320000, 95),
(30, 24, 3, 1, 100000, NULL, 10),
(31, 25, 3, 1, 110000, NULL, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE IF NOT EXISTS `units` (
`unit_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`unit_id`, `name`) VALUES
(1, 'XL'),
(2, 'L'),
(3, 'M'),
(4, 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `debt_transactions`
--
ALTER TABLE `debt_transactions`
 ADD PRIMARY KEY (`debt_transaction_id`);

--
-- Indexes for table `debt_transaction_details`
--
ALTER TABLE `debt_transaction_details`
 ADD PRIMARY KEY (`debt_transaction_detail_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
 ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
 ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
 ADD PRIMARY KEY (`transaction_detail_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
 ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `debt_transactions`
--
ALTER TABLE `debt_transactions`
MODIFY `debt_transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `debt_transaction_details`
--
ALTER TABLE `debt_transaction_details`
MODIFY `debt_transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
