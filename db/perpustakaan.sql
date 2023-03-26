-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 01:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `name`, `level`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 'Suci Sekar', 'Admin'),
(2, 'member', '25d55ad283aa400af464c76d713c07ad', 'Bayu Pramono', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `pengarang`, `deskripsi`, `foto_buku`) VALUES
(8, 'BK0001', 'Membangun Aplikasi Berbasis Data dengan Python', 'Jubilee Enterprise', 'Database dapat dibagi dalam dua arus utama, yaitu SQL dan NoSQL. Di dalam buku ini, Anda akan mempelajari langkah-langkah membuat aplikasi berbasis data menggunakan Python, SQL, dan NoSQL. Untuk men-develop aplikasi berbasis database SQL, akan digunakan MySQL, sedangkan untuk NoSQL akan menggunakan Firebase. Pembahasan di dalam buku ini mulai dari pengenalan konsep database menggunakan MySQL dan juga NoSQL, termasuk di dalamnya istilah-istilah kunci seperti Table, Collection, Document, tipe data, dan lain sebagainya. Kemudian, Anda akan mempelajari berbagai macam package penting, seperti Firestore, auth, dan juga Pyrebase. Ilmu yang ditawarkan sangat penting untuk lingkup analisis data di masa depan. Oleh karena itu, Anda perlu mempelajari berbagai teknik coding untuk bekerja dengan MySQL dan Firebase. Semua tool yang dibahas di dalam buku ini, seperti PyCharm, Visual Studio Code, Python, MySQL, dan layanan Firebase dapat digunakan secara gratis. Setelah membaca buku ini, Anda bisa membuat aplikasi-aplikasi berbasis data dengan menggunakan SQL maupun NoSQL.               ', 'b121.jpg'),
(11, 'BK0002', 'Dasar Pemrograman Dalam Bahasa C', 'Farah Zakiyah', 'Buku ini ditulis berdasarkan keinginan penulis yang mengampu mata kuliah Algoritma dan Pemrograman. Tujuan disusunnya buku ini yaitu untuk memudahkan mahasiswa belajar algoritma dan pemrograman. Tersusunnya buku ini tentu bukan dari usaha penulis saja. Dukungan moral dan material dari berbagai pihak sangatlah membantu tersusunnya buku ini. Penulis mengucapkan terima kasih kepada Institut Teknologi Telkom Surabaya, Fakultas Teknologi Informasi dan Industri, serta Program Studi Teknologi Informasi. Di era serba komputer, tidak dapat dilepaskan dari pemrograman. Bagi sebagian orang, pemrograman masih merupakan hal yang tabu dan asing. Buku ini dibuat untuk membantu pembaca terutama yang masih awam tentang dasar pemrograman khususnya bahasa pemrograman C. Buku ini dilengkapi tutorial dan latihan untuk membantu pembaca mengimplementasikan teori kedalam pemrograman C. Buku ini disampaikan dengan bahasa yang mudah dipahami dan diberikan contoh-contoh kasus sehari-hari.', 'b26.jpg'),
(12, 'BK0003', 'Membangun Aplikasi Berbasis Data dengan Python', 'Solusi Kantor', 'Power Query adalah fitur yang sangat banyak kegunaannya untuk mengolah data dengan Excel. Dengan Power Query, Anda dapat menyambungkan berbagai sumber data dengan Excel. Sumber datanya dapat berupa Table Excel, Workbook, File Text/CSV, data dari web, data dari aplikasi database seperti Access, dan sumber data lainnya. Setelah tersambung, Anda dapat mengolahnya, misalnya mengubah format, mengurutkan, menyaring, memecah, menggabungkan, dan berbagai perlakuan lainnya sesuai dengan keperluan. Hebatnya, ketika sumber data diperbaharui, data hasil olahan Power Query juga akan diperbaharui. Semuanya bisa dilakukan tanpa rumus atau pemrograman dengan VBA Macro. Belajar Sendiri Power Query Excel untuk Pemula membahas cara menggunakan Power Query Excel secara optimal. Pembahasan diberikan secara sederhana, ringan, dan tidak bertele-tele sehingga sangat cocok untuk pengguna pemula yang ingin menguasai Power Query Excel dalam waktu singkat. Materi pembahasan dilengkapi file yang dapat didownload secara gratis agar proses belajar menjadi lebih efektif dan efisien.', 'b31.jpg'),
(13, 'BK0004', 'Belajar Sendiri Membuat Fungsi Excel untuk Pemula', 'Solusi Kantor', ' Fungsi dalam Excel merupakan rumus siap pakai untuk membantu proses perhitungan. Excel menyediakan ratusan fungsi yang dikelompokkan ke dalam berbagai kategori. Namun karena luasnya bidang pengolahan data, tidak semua fungsi yang disediakan Excel dapat memenuhi kebutuhan penggunanya. Setiap pengguna memiliki kasus yang berbeda dengan pengguna lainnya. Untuk mengatasinya, Excel menyediakan fitur VBA Macro untuk membuat fungsi sendiri. Belajar Sendiri Membuat Fungsi Excel untuk Pemula mengungkap cara memanfaatkan fitur VBA Macro untuk membuat fungsi Excel sesuai kebutuhan. Anda akan menemukan banyak pengetahuan baru terkait cara membuat fungsi Excel yang mungkin belum pernah Anda pelajari atau Anda bayangkan sebelumnya. Di sini disajikan banyak contoh kasus sehari-hari yang dapat diselesaikan dengan fungsi Excel buatan sendiri. Pembahasan dalam buku ini dapat diaplikasikan pada semua versi Excel. Pembahasan dibuat simpel dan ringan sehingga sangat cocok untuk pemula. Dengan metode membaca dan mencoba, buku ini merupakan solusi untuk belajar membuat fungsi Excel secara otodidak. Sebagai bonus, Anda dapat mendownload file latihan dan hasil latihan serta Add-In yang memuat lebih dari 90 fungsi Excel siap pakai.', 'b4.jpg'),
(14, 'BK0005', '7 Materi Pemrograman Web untuk Pemula 4: Bootstrap & MariaDB', 'Rohi Abdulloh', ' Teknologi pemrograman web terus berkembang begitu cepat. Para pemula tentu akan semakin tertinggal jika tidak cepat mengejar. Buku ini membahas 7 materi pemrograman web sekaligus yang menjadi materi utama dalam mempelajari pemrograman web. Materi yang diberikan akan sangat membantu para pemula yang ingin menguasai pemrograman web dan menjadi web programmer dalam waktu singkat. Pembahasan dimulai dari pengetahuan dasar tentang pemrograman web, dilanjutkan dengan pembahasan 7 materi pemrograman web, satu demi satu disertai dengan contoh skrip beserta hasilnya. Disertai juga pembuatan aplikasi sederhana yang akan membantu pembaca menguasai pembuatan modul aplikasi. Untuk menunjang latihan, penulis juga menyertakan puluhan bonus skrip aplikatif. Dengan menguasai buku ini, pembaca dapat menjadi web programmer yang siap dan mampu membuat aplikasi web secara mandiri. ', 'b5.jpg'),
(15, 'BK0006', 'Pemrograman Jaring Nirkabel dengan Network Simulator', 'Nurhayati', ' Buku teks ini disusun sebagai referensi pendukung bagi mahasiswa Strata 1 (S-1) di lingkungan perguruan tinggi dan masyarakat umum yang ingin mempelajari Pemrograman Jaring Nirkabel. Pada buku ini, akan dipelajari dan dipraktikkan mengenai dasar-dasar pemrograman pada jaring nirkabel menggunakan program simulasi jaring nirkabel yaitu Network Simulator II (NS2) serta pengenalan mengenai jaring nirkabel dilihat dari definisi, sejarah, standardisasi, komponen, keamanan, dan lain-lain. Susunan buku teks ini terdiri dari tujuan instruksional pokok pembahasan, materi pembelajaran, materi praktikum, kesimpulan, dan soal latihan pada akhir tiap bab. Diharapkan dengan buku ini, para pembaca dapat memahami pelajaran pemrograman jaring nirkabel dengan lebih mendalam dan akhirnya bisa mengimplementasikan pada dunia nyata. Akhir kata materi dalam buku ini diharapkan bermanfaat dan mempermudah pembaca mempelajari tentang Pemrograman Jaring Nirkabel. Terutama mahasiswa Teknik Informatika dan masyarakat umum yang mempelajarinya serta membahas tools simulasi NS2 sebagai tools yang digunakan sebagai simulasinya.', 'b6.jpg'),
(16, 'BK0007', 'Kolaborasi data antar program microsoft office 2019', 'Madcoms', ' Kolaborasi Data antar Program Microsoft Office 2019 merupakan proses berbagi data antara beberapa program Microsoft Office 2019, yaitu: Microsoft Word, Microsoft Excel, Microsoft Access dan Microsoft PowerPoint. Dengan proses kolaborasi data antar program Microsoft Office ini, maka suatu pekerjaan yang sering dihadapi oleh para operator komputer akan lebih mudah dan cepat untuk diselesaikan, karena pekerjaan tersebut tidak harus dikerjakan pada satu program saja tetapi dapat dikerjakan pada beberapa program Microsoft Office.', 'b71.jpg'),
(17, 'BK0008', 'Mengenal Lebih Dekat Dengan Administrasi Jaringan Komputer', 'Ghema Nusa Persada', ' Buku Mengenal Lebih Dekat Dengan Administrasi Jaringan Komputer membahas terkait jaringan komputer yang akan mempelajari TCP/IT, Subnetting, Windows Server, Keamanan Infrasetrukter Jaringan dan internet, Penerapan Keamanan Web server dan mail server, tools dan Teknik Keamanan Komputer, Tools dan Teknik Keamanan Komputer, Teknologi Virtualisasi, Keamanan Sistem Operasi, Tools dan Teknik Keamanan Komputer, Sharing File dan Printer Sharing. Sehingga buku ini cocok digunakan sebagai referensi agi mahasiwa atau masyarakat untuk mengenal dan belajar jaringan komputer yang tentunga menunjang dalam bidang teknologi saat ini yang menggunakan sistem komputerisasi.', 'b8.jpg'),
(18, 'BK0009', 'Interfacing dengan ESP32', 'Scopindo Media Pustaka', 'Platform perangkat open source memungkinkan pembuatan prototipe dengan cepat dan waktu pemasaran aplikasi IoT baru yang lebih cepat. Tujuan dari buku ini adalah untuk memberikan pengantar singkat penggunaan IoT perangkat keras - board ESP32. ESP32, pada kenyataannya, adalah boarddevelopment kecil dengan mikrokontroler yang mendukung ESP32 IoT, merupakan penerus mikrokontroler ESP8266 yang terkenal dari Espressif. ESP32 adalah SoC berkemampuan Wi-Fi dan Bluetooth yang sangat kuat dengan jumlah GPIO yang sangat besar, dan board developmentyang menunjukkan kekuatan dalam desain modul IoT yang sangat mudah diakses.ESP32 adalah satu chip kombo Wi-Fi dan Bluetooth 2,4 GHz yang dirancang dengan daya ultra-rendah TSMC 40 nmteknologi. Ini dirancang untuk mencapai kinerja daya dan RF terbaik, menunjukkan ketahanan, keserbagunaan, dankeandalan dalam berbagai aplikasi dan skenario daya.', 'b9.jpg'),
(19, 'BK0010', '7 Materi Pemrograman Web untuk Pemula 5: Laravel & MariaDB', 'Rohi Abdulloh', ' Teknologi pemrograman web terus berkembang begitu cepat. Para pemula tentu akan semakin tertinggal jika tidak cepat mengejar. Buku ini membahas 7 materi pemrograman web sekaligus yang menjadi materi utama dalam mempelajari pemrograman web. Materi yang diberikan akan sangat membantu para pemula yang ingin menguasai pemrograman web dan menjadi web programmer dalam waktu singkat. Pembahasan dimulai dari pengetahuan dasar tentang pemrograman web, dilanjutkan dengan pembahasan 7 materi pemrograman web, satu demi satu disertai dengan contoh skrip beserta hasilnya. Disertai juga pembuatan aplikasi sederhana yang akan membantu pembaca menguasai pembuatan modul aplikasi. Untuk menunjang latihan, penulis juga menyertakan puluhan bonus skrip aplikatif. Dengan menguasai buku ini, pembaca dapat menjadi web programmer yang siap dan mampu membuat aplikasi web secara mandiri', 'b101.jpg'),
(20, 'BK0011', 'Mengeksplorasi Formula dan Fungsi Logika Exce', 'Solusi Kantor', ' Formula dan fungsi logika Excel merupakan fitur yang sangat membantu dalam pengolahan data. Formula dan fungsi ini bertujuan untuk membandingkan dua kondisi atau lebih pada perhitungan Excel, yang sering digunakan sebagai dasar dalam pengambilan keputusan. Sayangnya, kemampuan formula dan fungsi logika Excel tidak tereksplorasi secara optimal karena dianggap susah dipahami. Mulai saat ini, buang jauh-jauh kesan susah dipahami. Pelajari buku ini dan penulis jamin pembaca akan dengan cepat menguasainya. Buku pertama dan terlengkap tentang formula dan fungsi logika Excel ini dibahas dengan bahasa yang sederhana, sehingga terasa ringan dan sangat mudah dipelajari. Materi pembahasan dilengkapi file yang dapat didownload secara gratis agar proses belajar menjadi lebih efektif dan efisien. Materi dalam buku ini akan membantu Anda memahami secara mendalam cara memanfaatkan formula dan fungsi logika Excel dengan banyak contoh dalam berbagai bidang terapan. Tidak berlebihan jika buku ini harus dimiliki semua kalangan mulai dari pelajar, mahasiswa, pengajar/dosen untuk keperluan proses belajar-mengajar, karyawan, dan mereka yang terbiasa menggunakan Excel.', 'b1110.jpg'),
(21, 'BK0012', 'Panduan Cepat Belajar HTML, PHP, & MYSQL', 'Arista Prasetyo Adi', ' HTML, PHP, & MySQL merupakan tiga komponen pembentuk website kekinian. Jika ingin menguasai pembuatan website, maka dasar-dasar HTML, PHP, dan MySQL harus dipahami dengan baik. HTML untuk membentuk layout dan tampilan website. PHP sebagai penunjang untuk menciptakan website yang dinamis, dan MySQL untuk penyimpanan data website di server. Buku ini memberikan panduan mudah dan cepat untuk menguasai HTML, PHP, dan MySQL. Dengan pembahasan yang mudah dimengerti untuk orang awam, diharapkan setelah membaca dan praktek pembaca menjadi mahir menguasai HTML, PHP, dan MySQL.', 'b122.jpg'),
(22, 'BK0013', 'Algoritma Pemrograman', 'Sigit Susanto Putro', ' Langkah-langkah penyelesaian menggunakan algoritma memiliki aturan khusus, biasanya menggunakan pendekatan bahasa pemrograman yang ada, jika targetnya adalah untuk mempelajari bahasa pemrograman C, maka struktur algoritma juga akan menggunakan pendekatan struktur dalam bahasa pemrograman C, begitu juga untuk algoritma bahasa pemrograman lainnya. Struktur algoritma adalah aturan penulisan algoritma untuk memecahkan suatu kasus. sebenarnya untuk masalah struktur yang serupa dengan algoritma tanpa anda sadari anda juga sering terlibat, seperti misalnya ketika anda diminta oleh guru matematika atau fisika untuk menyelesaikan kasus matematika dalam bentuk soal cerita, misalkan dengan menyediakan 1 gelas kosong kemudian pindahkan isi salah satu gelas misalnya kopi ke gelas yang kosong tersebut, dan gelas berisi susu tuangkan ke gelas kosong yang sebelumnya berisi kopi, kemudian gelas yang kosong yang sudah diisi kopi tuangkan ke gelas kosong yang sebelumnya berisi susu, maka selesai. Dalam matematika dan ilmu komputer, algoritma adalah urutan atau langkah-langkah untuk penghitungan atau untuk menyelesaikan suatu masalah yang ditulis secara berurutan. Sehingga, algoritma pemrograman adalah urutan atau langkah-langkah untuk menyelesaikan masalah pemrograman komputer. Dalam pemrograman, hal yang penting untuk dipahami adalah logika kita dalam berpikir bagaimana cara untuk memecahkan masalah pemrograman yang akan dibuat.', 'b131.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `kode_member` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ttl` date NOT NULL,
  `jk` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto_member` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `kode_member`, `nama`, `ttl`, `jk`, `alamat`, `foto_member`) VALUES
(10119, 'MB0001', 'Member1', '2022-11-10', 'Laki-Laki', 'Depok', '21.jpg'),
(10120, 'MB0002', 'Member2', '2022-11-02', 'Laki-Laki', 'Jakarta', '12.jpg'),
(10121, 'MB0003', 'Member3', '2022-11-03', 'Perempuan', 'Jakarta', '3.jpg'),
(10122, 'MB0004', 'Member4', '2022-11-04', 'Laki-Laki', 'Tangerang', '4.jpg'),
(10123, 'MB0005', 'Member5', '2022-11-05', 'Perempuan', 'Bekasi', '5.jpg'),
(10124, 'MB0006', 'Member6', '2022-11-06', 'Perempuan', 'Yogyakarta', '6.jpg'),
(10125, 'MB0007', 'Member7', '2022-11-07', 'Laki-Laki', 'Tambun', '7.jpg'),
(10127, 'MB0008', 'Member8', '2022-11-08', 'Laki-Laki', 'Beji', '81.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(255) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `kode_member` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `kode_transaksi`, `tgl_pinjam`, `tgl_kembali`, `kode_member`, `status`) VALUES
(62, '20221118001', '2022-11-18', '2022-11-25', 'MB0001', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `kode_transaksi`, `tgl_kembali`) VALUES
(20, '20221118001', '2022-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `kode_buku` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10129;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
