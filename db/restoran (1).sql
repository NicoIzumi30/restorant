-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2023 pada 08.49
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakan`
--

CREATE TABLE `masakan` (
  `id` int(11) NOT NULL,
  `nama_masakan` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(128) NOT NULL,
  `status_masakan` varchar(32) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masakan`
--

INSERT INTO `masakan` (`id`, `nama_masakan`, `image`, `type`, `status_masakan`, `harga`) VALUES
(1, 'Coffee', 'coffee_shop_di_tebet.jpg', 'minuman', 'tersedia', 12000),
(2, 'Mie Korean', 'file_1674027250.jpg', 'makanan', 'tersedia', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `image` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `telp`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Nico Izumi', 'izumi@mail.com', '62859126462972', 'default.png', '$2y$10$eZ1zsN22l6Epwl.umfdGQO0.zx0CK1R2Zh5BQPonX11Irmclk/tfW', 1, 1, 1664092535),
(20, 'admin', 'admin@palm.site', '6285703073753', 'default.png', '$2y$10$v3Fc235al.o1.OFGZR7pHOMrHreIvrH/vXMRxx.CtH1eHpXYLJ5Wy', 1, 1, 1673990775),
(21, 'Heru Kristanto', 'herukristanto@palm.site', '2321342910348012', 'default.png', '$2y$10$yXI6zrsbQIXOczI9sAeB1eyeAidxRayPUx6REVVQI3UfBJkSNaVdW', 1, 1, 1673990901),
(22, 'cobain', 'cobain@palm.site', '324234', 'default.png', '$2y$10$wqUeY3v3rR2QVIYkzVvlKe9t7MxG6flfBQ3GeDXfElUnXGdSAl03O', 1, 0, 1673990944),
(24, 'ayokdwii', 'ayokdwii@palm.site', '3453534453', 'default.png', '$2y$10$pqxK9LiO4lFXQKtglgZT6uXJToNYkLpvACQs.5jO9cgKk.QO.tEE2', 1, 1, 1673992183),
(25, 'Heru Kristanto', 'herukristanto@palm.site', '43543534', 'default.png', '$2y$10$/LvIKZfy/ToMVFjxAaMkt.82vQpBcP5OyOsXVSfM5Jp7cZrfojkyG', 1, 1, 1673992430),
(26, 'adminn', 'adminn@palm.site', '3453534523', 'default.png', '$2y$10$2Nvcsb/R7QFXLtNhhzfMIeQPQp1kEY8wF5hjAllYmfVf9g.sRoX0S', 2, 1, 1673992891),
(27, 'Palm Tree Coffee', 'palmtreecoffee@palm.site', '82381298381221', 'default.png', '$2y$10$WGgyWunFcuIb5dlouUzD4.vWy2EkQHEwpf3hSTsvtjFB5pnTuaLdO', 1, 1, 1673996496),
(28, 'Palm Tree Coffeed', 'palmtreecoffeed@palm.site', '3242342', 'default.png', '$2y$10$vyXDT.jBPH/25b9TpQF9TegEsFlyf/YMeovsefgPg9xRCtba1ifRy', 1, 1, 1673997081),
(29, 'Palm Tree Coffeeas', 'palmtreecoffeeas@palm.site', '342342', 'default.png', '$2y$10$B5sjQc9634ryKGF5zIUUTuJGMP0IT1C8kGVOmriaqwERihaAijLkm', 1, 1, 1673997188);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 5),
(3, 1, 6),
(4, 1, 1),
(5, 1, 7),
(6, 1, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`) VALUES
(1, 'Dashboard', 'home'),
(6, 'Menu', 'list'),
(7, 'Users', 'users'),
(9, 'Restoran', 'layers'),
(10, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admina'),
(2, 'Own');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `submenu` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_submenu`
--

INSERT INTO `user_submenu` (`id`, `menu_id`, `submenu`, `url`, `is_active`) VALUES
(1, 1, 'Dashboard', 'dashboard', 1),
(3, 3, 'Sub Menu', 'menu/submenu', 0),
(6, 6, 'Menu Management', 'menu', 1),
(7, 6, 'Sub Menu Management', 'menu/submenu', 1),
(8, 6, 'Role Management', 'menu/role', 1),
(9, 7, 'Users Management', 'users', 1),
(10, 9, 'Makanan', 'restoran/masakan', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
