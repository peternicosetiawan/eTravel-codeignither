-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Jul 2020 pada 09.05
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_travel_524535`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `destination_524535`
--

CREATE TABLE `destination_524535` (
  `id` int(11) NOT NULL,
  `destination` varchar(128) NOT NULL,
  `price` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destination_524535`
--

INSERT INTO `destination_524535` (`id`, `destination`, `price`) VALUES
(3, 'Bandung', '120000'),
(4, 'Surabaya', '300000'),
(5, 'Yogyakarta', '250000'),
(6, 'Semarang', '220000'),
(7, 'Malang', '330000'),
(8, 'Palembang', '250000'),
(9, 'Medan', '400000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation_524535`
--

CREATE TABLE `reservation_524535` (
  `id` int(11) NOT NULL,
  `id_user` varchar(128) NOT NULL,
  `id_reservation` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `sex` varchar(128) NOT NULL,
  `birth_date` date NOT NULL,
  `no_tlp` varchar(128) NOT NULL,
  `reservation_date` date NOT NULL,
  `destination` varchar(128) NOT NULL,
  `price` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservation_524535`
--

INSERT INTO `reservation_524535` (`id`, `id_user`, `id_reservation`, `name`, `address`, `sex`, `birth_date`, `no_tlp`, `reservation_date`, `destination`, `price`) VALUES
(15, 'ADM001', 'RSV-080720001', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-07-11', '087886208606', '2020-07-08', 'Surabaya', '300000'),
(16, 'USR001', 'RSV-080720002', 'Peter Nico', 'Kodamar', 'Male', '2020-07-23', '087886208606', '2020-07-08', 'Palembang', '250000'),
(17, 'USR005', 'RSV-090720003', 'Indra Nugraha', 'Pupar', 'Male', '2020-07-11', '087886208606', '2020-07-09', 'Malang', '330000'),
(18, 'USR005', 'RSV-090720004', 'Indra Nugraha', 'Kp. Pulo Jahe', 'Female', '2020-07-15', '087867676565', '2020-07-09', 'Bandung', '120000'),
(19, 'USR004', 'RSV-090720005', 'Suparta', 'Cikarang', 'Male', '2020-07-19', '087886208606', '2020-07-09', 'Palembang', '250000'),
(20, 'USR004', 'RSV-090720006', 'Suparta', 'Cikarang', 'Female', '2020-07-27', '087867676565', '2020-07-09', 'Bandung', '120000'),
(21, 'USR001', 'RSV-090720007', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-07-30', '087888668686', '2020-07-09', 'Semarang', '220000'),
(22, 'USR006', 'RSV-090720008', 'yusron', 'Kodamar', 'Male', '2020-07-11', '087867676565', '2020-07-09', 'Yogyakarta', '250000'),
(23, 'USR006', 'RSV-090720009', 'Yusron', 'Kodamar', 'Male', '2020-07-13', '087886208606', '2020-07-09', 'Medan', '400000'),
(24, 'USR007', 'RSV-090720010', 'Achmad', 'Cikarang', 'Male', '2020-07-21', '087888668686', '2020-07-09', 'Malang', '330000'),
(25, 'USR007', 'RSV-090720011', 'Achmad', 'Cikarang', 'Male', '2020-07-17', '087867676565', '2020-07-09', 'Palembang', '250000'),
(26, 'ADM001', 'RSV-090720012', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-07-30', '087867676565', '2020-07-09', 'Bandung', '120000'),
(27, 'ADM001', 'RSV-090720013', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-07-26', '087867676565', '2020-07-09', 'Palembang', '250000'),
(28, 'ADM001', 'RSV-090720014', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-07-23', '087886208606', '2020-07-09', 'Palembang', '250000'),
(29, 'ADM001', 'RSV-090720015', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-07-26', '087888668686', '2020-07-09', 'Palembang', '250000'),
(30, 'ADM001', 'RSV-090720016', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-08-01', '087867676565', '2020-07-09', 'Palembang', '250000'),
(31, 'ADM001', 'RSV-090720017', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-07-23', '087867676565', '2020-07-09', 'Palembang', '250000'),
(32, 'ADM001', 'RSV-090720018', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-07-23', '087867676565', '2020-07-09', 'Palembang', '250000'),
(33, 'ADM001', 'RSV-090720019', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-07-21', '087886208606', '2020-07-09', 'Palembang', '250000'),
(34, 'ADM001', 'RSV-090720020', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-08-07', '087886208606', '2020-07-09', 'Palembang', '250000'),
(35, 'ADM001', 'RSV-090720021', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-07-17', '087867676565', '2020-07-09', 'Palembang', '250000'),
(36, 'ADM001', 'RSV-090720022', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-07-25', '087867676565', '2020-07-09', 'Palembang', '250000'),
(37, 'ADM001', 'RSV-090720023', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-07-22', '087867676565', '2020-07-09', 'Palembang', '250000'),
(38, 'ADM001', 'RSV-090720024', 'Peter Nico', 'Kp. Pulo Jahe', 'Male', '2020-08-21', '087886208606', '2020-07-09', 'Palembang', '250000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role_524535`
--

CREATE TABLE `tb_role_524535` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_role_524535`
--

INSERT INTO `tb_role_524535` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user_524535`
--

CREATE TABLE `tb_user_524535` (
  `id` int(11) NOT NULL,
  `id_user` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_active` varchar(128) NOT NULL,
  `role_id` varchar(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user_524535`
--

INSERT INTO `tb_user_524535` (`id`, `id_user`, `name`, `email`, `image`, `password`, `is_active`, `role_id`, `date_created`) VALUES
(1, 'ADM001', 'Administrator', 'admin@mail.com', 'default.jpg', '$2y$10$62bT9MfjMNeOO.hcjWvRi.b0m.1CNf2UVnBRE9cxbd8Il42u1lY.e', 'active', '1', 1593587658),
(2, 'USR001', 'Peter', 'peter@mail.com', 'default.jpg', '$2y$10$n5TuWyAGtTAwu8q3BJ6s.exNPyBbcnUA5o.kxZJCuA1XmkhctA73K', 'active', '2', 1593587682),
(3, 'USR002', 'Soleh', 'soleh@mail.com', 'default.jpg', '$2y$10$G6s7iGysJl1muOdYc.v7nuOwi2YWnxYaj1.WYZPkhHoc9ZRVQ6mqi', 'active', '2', 1594087007),
(8, 'USR004', 'Suparta', 'parta@mail.com', 'default.jpg', '$2y$10$JBPbA98McDhrvdzSRljM1Ot1mutEhRecljV5kdm9lmJKN7TyLlgzy', 'active', '2', 1594266061),
(9, 'USR005', 'Indra', 'indra@mail.com', 'default.jpg', '$2y$10$MiVLpKfZ5vD460sKfyrpX.aH6nOnKuhg0tdsG7/ripp.bF9W97vW6', 'active', '2', 1594267573),
(10, 'USR006', 'Yusron', 'yusron@mail.com', 'default.jpg', '$2y$10$l8vWGIUOMr35i2pH9LL.8e7VMxYJsPYHuuMkKoTVc04DKzyVGfdHu', 'active', '2', 1594267955),
(11, 'USR007', 'Achmad', 'achmad@mail.com', 'default.jpg', '$2y$10$48zB.IG3MKnlPVpT69Fz1.fPJ.O8EzDy.kfCPNSGn2hJ1bB/ol1VS', 'active', '2', 1594268085);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu_524535`
--

CREATE TABLE `user_access_menu_524535` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu_524535`
--

INSERT INTO `user_access_menu_524535` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu_524535`
--

CREATE TABLE `user_menu_524535` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu_524535`
--

INSERT INTO `user_menu_524535` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu_524535`
--

CREATE TABLE `user_sub_menu_524535` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu_524535`
--

INSERT INTO `user_sub_menu_524535` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin_524535', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user_524535', 'fas fa-fw fa-user', 1),
(3, 3, 'Menu Management', 'menu_524535', 'fas fa-fw fa-minus-square', 1),
(4, 3, 'SubMenu Management', 'menu_524535/submenu', 'far fa-fw fa-minus-square', 1),
(11, 1, 'Role', 'admin_524535/role', 'fas fa-fw fa-check-circle', 1),
(12, 2, 'Reservation', 'user_524535/reservation', 'fas fa-fw fa-ticket-alt', 1),
(13, 1, 'Travel Fee', 'admin_524535/fee', 'fas fa-fw fa-comment-dollar', 1),
(14, 1, 'Reservation Data', 'admin_524535/reservationData', 'fas fa-fw fa-chart-line', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destination_524535`
--
ALTER TABLE `destination_524535`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_524535`
--
ALTER TABLE `reservation_524535`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role_524535`
--
ALTER TABLE `tb_role_524535`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_524535`
--
ALTER TABLE `tb_user_524535`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu_524535`
--
ALTER TABLE `user_access_menu_524535`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu_524535`
--
ALTER TABLE `user_menu_524535`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu_524535`
--
ALTER TABLE `user_sub_menu_524535`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destination_524535`
--
ALTER TABLE `destination_524535`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `reservation_524535`
--
ALTER TABLE `reservation_524535`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tb_role_524535`
--
ALTER TABLE `tb_role_524535`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user_524535`
--
ALTER TABLE `tb_user_524535`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_access_menu_524535`
--
ALTER TABLE `user_access_menu_524535`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_menu_524535`
--
ALTER TABLE `user_menu_524535`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_sub_menu_524535`
--
ALTER TABLE `user_sub_menu_524535`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
