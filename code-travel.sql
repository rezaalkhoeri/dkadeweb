-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2020 at 06:25 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code-travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `level` varchar(3) DEFAULT NULL,
  `photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `username`, `password`, `level`, `photo`) VALUES
(2, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '3795a34d6d06820e71f75d5603eabfc9.png'),
(3, 'Anom Suandi', 'anom', '389cc3c4bb39efd647372db40e31c5e6', '1', 'f474e07f935f8c0a4793dc6c46607a65.png');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `idalbum` int(11) NOT NULL,
  `jdl_album` varchar(200) DEFAULT NULL,
  `cover` varchar(40) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`idalbum`, `jdl_album`, `cover`, `jml`) VALUES
(10, 'Pura Ulun Danu', 'd35c9b6447b2d24c3bec1358610bc26f.jpg', 5),
(11, 'Garuda Wisnu Kencana', '940d0d40a3e7ac602ca9fd9d7fb82d1a.jpg', 1),
(12, 'Tirta Empul', '995aa70ccad2008cd9f17bbd9a2e40c0.jpg', 3),
(13, 'GWK', 'd4103747ccb6a95c249b935bf3830807.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `idberita` int(11) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `isi` text,
  `tglpost` datetime DEFAULT NULL,
  `gambar` varchar(40) DEFAULT NULL,
  `tgl_last_update` datetime DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `views` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `jdl_galeri` varchar(200) DEFAULT NULL,
  `gbr_galeri` varchar(40) DEFAULT NULL,
  `albumid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `jdl_galeri`, `gbr_galeri`, `albumid`) VALUES
(5, 'Pura Ulun Danu', 'a9cff9c17f9d0731fe7db47bddf8bced.jpg', 10),
(6, 'Pura Ulun Danu 1', '6b7dcccb6feb60267ff8cd2ce6c9b08c.jpg', 10),
(7, 'Pura Ulun Danu Sunset', 'ea8a703f9f4adcfe42fecf54bd515af5.jpg', 10),
(8, 'Pura Ulun Danu Full Color', '56a22ec98f4594bb2c989e55980bd068.jpg', 10),
(9, 'Garuda Wisnu Kencana', '6ad370deaebd5aafd7f4a082da0a5e12.jpg', 11),
(10, 'Garuda Wisnu Kencana Sunset', 'b49a31e367fd91946c59106e8cf19d99.jpg', 11),
(11, 'Tirta Empul 1', '062162594451975c4299285c3cfbb9b8.jpg', 12),
(12, 'Tirta Empul 2', 'ecbe501b750f1595fc328dbb10eaac8d.jpg', 12),
(13, 'Tirta Empul 3', '789e8641ac60fe5d95f873e189844a0a.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_paket`
--

CREATE TABLE `kategori_paket` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_paket`
--

INSERT INTO `kategori_paket` (`id_kategori`, `kategori`) VALUES
(1, 'Reguler'),
(2, 'Paket Khusus');

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id_metode` int(11) NOT NULL,
  `metode` varchar(80) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `norek` varchar(50) DEFAULT NULL,
  `atasnama` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode_bayar`
--

INSERT INTO `metode_bayar` (`id_metode`, `metode`, `bank`, `norek`, `atasnama`) VALUES
(2, 'Transfer Bank', 'Mandiri', '5485-01-007458-53-6', 'Code Travel'),
(3, 'Transfer Bank', 'BNI', '5485-01-007458-53-6', 'Code Travel'),
(4, 'Transfer Bank', 'BCA', '5485-01-007458-53-6', 'Code Travel');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` varchar(15) NOT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `jenkel` varchar(2) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `berangkat` date DEFAULT NULL,
  `kembali` date DEFAULT NULL,
  `adult` int(11) DEFAULT NULL,
  `kids` int(11) DEFAULT NULL,
  `metode_id` int(11) DEFAULT NULL,
  `paket_id_order` int(11) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status_bayar` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `nama`, `jenkel`, `alamat`, `notelp`, `email`, `berangkat`, `kembali`, `adult`, `kids`, `metode_id`, `paket_id_order`, `keterangan`, `tanggal`, `status_bayar`) VALUES
('INV300120000002', 'I Made Suardika', 'L', 'JL Cempaka', '081558422956', 'imade.suardika99@yahoo.com', '2020-01-31', '2020-02-04', 3, 2, 2, 6, 'Hotel sudah saya pesan ok...', '2020-01-31', 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `idpaket` int(11) NOT NULL,
  `nama_paket` varchar(100) DEFAULT NULL,
  `hrg_dewasa` double DEFAULT NULL,
  `hrg_anak` double DEFAULT NULL,
  `deskripsi` longtext,
  `kategori_id` int(11) DEFAULT NULL,
  `gambar` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`idpaket`, `nama_paket`, `hrg_dewasa`, `hrg_anak`, `deskripsi`, `kategori_id`, `gambar`) VALUES
(6, 'Paket Bali Tour 3 Hari Tanpa Hotel', 300000, 150000, '<p>Paket Bali Tour 3 Hari Tanpa Hotel kami susun untuk anda yang sudah booking hotel untuk liburan. disini kami berikan pilihan <em>Paket Bali Tour 3 Hari Tanpa Hotel, </em>tapi paket ini tidak begitu lengkap.</p>\r\n\r\n<p>Berikut Rencana Perjalanan <strong>Paket Bali Wisata 3 Hari Tanpa Hotel</strong></p>\r\n\r\n<p><strong>PROGRAM / ACARA :</strong></p>\r\n\r\n<p><strong>HARI KE &ndash; 1 Penjemput di Airpor</strong>t</p>\r\n\r\n<ol>\r\n	<li>Dijemput di Airport</li>\r\n	<li>Diantar menuju hotel untuk melakukan check in.</li>\r\n	<li>Acara bebas dan istirahat.</li>\r\n</ol>\r\n\r\n<p><strong>HARI KE &ndash; 2 Silahkan pilih 2 opsi di bwah ini</strong></p>\r\n\r\n<p><strong>Opsi A (Kintamani Tour)</strong></p>\r\n\r\n<ol>\r\n	<li>Makan pagi di Hotel tempat menginap</li>\r\n	<li>Menonton Pementasan Tari Barong(not include)</li>\r\n	<li>Mengunjungi Desa Tohpati yang&nbsp; merupakan Pusat Kerajinan Batik Bali,nanti akan di urakan cara pembuatan nya di lokasi</li>\r\n	<li>Mengunjungi Desa Celuk&nbsp; yang merupakan Pusat Kerajinan Perak, Nanti akan di uraikan proses pembuatan kerajinan perak di lokasi</li>\r\n	<li>Mengunjungi Pura Tirta Empul adalah Sebuah pura yang ada mata air alami yang menyembur dari bawah tanah ( sangat indah)</li>\r\n	<li>Mengunjungi Objek Wisata Kintamani yang merupakan pemandangan yang sangat indah kombinasi dari danau ,gunung brapi dataran tinggi yang sangat sejuk pemandangan nya sangat indah jika cuaca lagi bersahabat</li>\r\n	<li>Makan siang di&nbsp; Restoran Tepi Danau sambil menikmati view Gunung Batur dan Danau Batur dengan udara yang sangat sejuk.</li>\r\n	<li>Mengunjungi Agrowisata Kebun Kopi Luwak</li>\r\n	<li>Makan Malam di Local Resto</li>\r\n	<li>Balik Ke Hotel</li>\r\n</ol>\r\n\r\n<p><strong>Opsi B (Bedugul Tour)</strong></p>\r\n\r\n<ol>\r\n	<li>Makan pagi di hotel tempat menginap</li>\r\n	<li>Mengunjungi Pura Taman Ayun Mengwi</li>\r\n	<li>Mengunjungi Pura Ulundanu Bedugul</li>\r\n	<li>Makan siang di labaga pacung restourant</li>\r\n	<li>Mengunjungi Pura Tanah Lot untuk melihat matahari terbenam (sunset).</li>\r\n	<li>Makan Malam di local Resto</li>\r\n	<li>Balik Ke Hotel</li>\r\n</ol>\r\n\r\n<p><strong>HARI KE &ndash; 3 ( krisna + air port )</strong></p>\r\n\r\n<ol>\r\n	<li>Di Jemput di hotel menuju Khrisna Oleh-oleh Khas Bali</li>\r\n	<li>Agung Bali Oleh oleh bali</li>\r\n	<li>Cek Out menuju Bandara</li>\r\n</ol>\r\n\r\n<p><strong>Paket Tour Ini Sudah Termasuk</strong>:</p>\r\n\r\n<ol>\r\n	<li>Private car AC( Tidak di gabung dengan peserta lain) Mobil di sesuaikan dgn jumlah Peserta + Driver + BBM</li>\r\n	<li>1 x Makan Siang</li>\r\n	<li>1 x Makan Malam</li>\r\n	<li>Tiket masuk objek wisata sesuai rute</li>\r\n	<li>Biaya Parkir</li>\r\n	<li>Retribusi</li>\r\n</ol>\r\n\r\n<p>NOTE :</p>\r\n\r\n<ol>\r\n	<li>Harga Tour belum termasuk belanja keperluan pribadi</li>\r\n</ol>\r\n', 2, 'ee2fd18c0a73311c44eb48627128be7c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `metode_id_bayar` int(11) DEFAULT NULL,
  `order_id` varchar(15) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `pengirim` varchar(70) DEFAULT NULL,
  `bukti_transfer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `tgl_bayar`, `metode_id_bayar`, `order_id`, `jumlah`, `pengirim`, `bukti_transfer`) VALUES
(4, '2020-01-31', 2, 'INV300120000002', 1200000, 'I Made Suardika', 'file_1580406677.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_nama` varchar(40) DEFAULT NULL,
  `inbox_email` varchar(60) DEFAULT NULL,
  `inbox_kontak` varchar(20) DEFAULT NULL,
  `inbox_pesan` text,
  `inbox_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `inbox_status` int(11) DEFAULT '1' COMMENT '1=Belum dilihat, 0=Telah dilihat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `pengunjung_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengunjung_ip` varchar(40) DEFAULT NULL,
  `pengunjung_perangkat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`pengunjung_id`, `pengunjung_tanggal`, `pengunjung_ip`, `pengunjung_perangkat`) VALUES
(918, '2020-01-31 05:15:35', '::1', 'Firefox');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `idtestimoni` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `pesan` text,
  `status` varchar(2) DEFAULT NULL,
  `tgl_post` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `idwisata` int(11) NOT NULL,
  `nama_wisata` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`idwisata`, `nama_wisata`, `deskripsi`, `gambar`) VALUES
(2, 'Tirta Empul', '<p>Tirta Empul adalah nama sebuah pura yang terletak di kecamatan&nbsp;Tampak Siring. Pura Tirta Empul banyak dikunjungi para wisatawan, baik dari mancanegara maupun wisatawan domestik. Objek wisata Tirta Empul, merupakan salah satu, tempat liburan di Bali yang wajib dikunjungi. Di pura&nbsp;Tirta Empul, terdapat mata air dan juga digunakan oleh masyarakat pemeluk agama Hindu, untuk permandian dan memohon tirta suci.</p>\r\n', '2e15620e66215936b6dd1ea64b574d4b.jpg'),
(3, 'Garuda Wisnu Kencana', '<p><strong>Taman Budaya Garuda Wisnu Kencana</strong> (bahasa Inggris: <em><strong>Garuda Wisnu Kencana Cultural Park</strong></em>), disingkat <strong>GWK</strong>, adalah sebuah taman wisata di bagian selatan pulau Bali. Taman wisata ini terletak di Desa Ungasan, Kecamatan Kuta Selatan, Kabupaten Badung, kira-kira 40 kilometer di sebelah selatan Denpasar, ibu kota provinsi Bali.Di areal taman budaya ini, direncanakan akan didirikan sebuah <em>landmark</em> atau maskot Bali, yakni patung berukuran raksasa Dewa Wisnu yang sedang menunggangi tunggangannya, Garuda, setinggi 120 meter.</p>\r\n\r\n<p>Area Taman Budaya Garuda Wisnu Kencana berada di ketinggian 146 meter di atas permukaan tanah atau 263 meter di atas permukaan laut.</p>\r\n\r\n<p>Di kawasan itu terdapat juga Patung Garuda yang tepat di belakang Plaza Wisnu adalah Garuda Plaza di mana patung setinggi 18 meter Garuda ditempatkan sementara. Pada saat ini, Garuda Plaza menjadi titik fokus dari sebuah lorong besar pilar berukir batu kapur yang mencakup lebih dari 4000 meter persegi luas ruang terbuka yaitu <em>Lotus Pond</em>. Pilar-pilar batu kapur kolosal dan monumental patung Lotus Pond Garuda membuat ruang yang sangat eksotis. Dengan kapasitas ruangan yang mampu menampung hingga 7000 orang, <em>Lotus Pond</em> telah mendapatkan reputasi yang baik sebagai tempat sempurna untuk mengadakan acara besar dan internasional.</p>\r\n\r\n<p>Terdapat juga patung tangan Wisnu yang merupakan bagian dari patung Dewa Wisnu. Ini merupakan salah satu langkah lebih dekat untuk menyelesaikan patung Garuda Wisnu Kencana lengkap. Karya ini ditempatkan sementara di daerah Tirta Agung.</p>\r\n\r\n<p>Pada tanggal 22 September 2018 Presiden Joko Widodo beserta Ibu Negara Iriana Joko Widodo menghadiri peresmian patung Garuda Wisnu Kencana (GWK).</p>\r\n\r\n<p>&nbsp;</p>\r\n', '7f225925446733f3ac1bd38bee5aac5c.jpg'),
(4, 'Pura Ulun Danu Beratan', '<p><strong>Pura Ulun Danu Batur</strong> (juga dikenal sebagai &quot;Pura Batur&quot; atau &quot;Pura Ulun Danu&quot;) adalah Pura yang terletak di pulau Bali, Indonesia . Sebagai salah satu Pura Kahyangan Jagat, Pura Ulun Danu Batur adalah salah satu dari pura terpenting di Bali yang bertindak sebagai pemelihara harmoni dan stabilitas seluruh pulau. Pura Ulun Danu Batur mewakili arah Utara dan didedikasikan untuk dewa Wisnu dan dewi lokal Dewi Danu, dewi Danau Batur, danau terbesar di Bali. Setelah hancurnya kompleks pura yang asli, pura tersebut dipindahkan dan dibangun kembali pada tahun 1926.</p>\r\n', 'b4f0dc3fae821229f40873014f99c176.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`idalbum`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`idberita`),
  ADD KEY `adminid` (`user`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `albumid` (`albumid`);

--
-- Indexes for table `kategori_paket`
--
ALTER TABLE `kategori_paket`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `paket_id_order` (`paket_id_order`),
  ADD KEY `metode_id` (`metode_id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`idpaket`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `metode_id_bayar` (`metode_id_bayar`);

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`idtestimoni`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`idwisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `idalbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `idberita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori_paket`
--
ALTER TABLE `kategori_paket`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `idpaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=919;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `idtestimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `idwisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`albumid`) REFERENCES `album` (`idalbum`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`paket_id_order`) REFERENCES `paket` (`idpaket`) ON UPDATE CASCADE;

--
-- Constraints for table `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_paket` (`id_kategori`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
