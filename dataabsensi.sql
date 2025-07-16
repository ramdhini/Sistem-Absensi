
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `tb_absen` (
  `id` int(15) NOT NULL,
  `id_karyawan` int(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `tb_daftar` (
  `id` int(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `tb_daftar` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin2');



CREATE TABLE `tb_jabatan` (
  `id` int(15) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `tb_jabatan` (`id`, `jabatan`) VALUES
(1, 'CEO'),
(2, 'CMO'),
(3, 'Manajer'),
(4, 'Akuntan'),
(5, 'Konsultan'),
(6, 'Office Boy');


CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tmp_tgl_lahir` varchar(255) NOT NULL,
  `jenkel` varchar(20) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_tel` varchar(20) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `tbl_karyawan` (`id_karyawan`, `username`, `password`, `nama`, `tmp_tgl_lahir`, `jenkel`, `agama`, `alamat`, `no_tel`, `jabatan`, `foto`) VALUES
(20220338,'dimas','dimas123','Dimas Bagus','Jakarta, 20 Mei 1995','Laki-Laki','Islam','Jl. Nusantara, No.404, Kota Depok, Jawa Barat','081234567890','Konsultan', 'cowo1.png'),
(20201121,'andi','andi123','Andi Wijaya','Bandung, 12 Agustus 1992','Laki-Laki','Katholik','Jl. Raya Bogor, No.1010, Kabupaten Bogor, Jawa Barat','081345678901','CMO', 'cowo2.png'),
(20250239,'zahra','zahra123','Zahra Amalia','Depok, 5 Maret 1998','Perempuan','Islam','Jl. Raya Bekasi, No.789, Kota Jakarta Timur, DKI Jakarta','081456789012','Konsultan','cewe1.png'),
(20070815,'bagas','bagas123','Bagas Aditya','Medan, 28 Desember 1990','Laki-Laki','Kristen','Jl. Otista Raya, No.606, Kota Jakarta Timur, DKI Jakarta','081567890123','CEO','cowo3.png'),
(20221287,'intan','intan123','Intan Permata','Yogyakarta, 17 April 1997','Perempuan','KongHuCu','Jl. Juanda, No. 707, Kota Depok, Jawa Barat','081678901234','Akuntan','cewe2.png'),
(20100521,'dwi','dwi123','Dwi Cahyani','Bekasi, 22 Februari 1993','Perempuan','Kristen','Jl. Tole Iskandar, No.505, Kota Depok, Jawa Barat','081789012345','Manajer','cewe3.png'),
(20170926,'rini','rini123','Rini Agustina','Bogor, 3 Juni 1994','Perempuan','Islam','Jl. Margonda Raya No.303, Kota Depok, Jawa Barat','081890123456','CMO','cewe4.png'),
(20200148,'bayu','bayu123','Bayu Saputra','Palembang, 7 September 1995','Laki-Laki','Hindu','Jl. Sholeh Iskandar, No.808, Kota Bogor, Jawa Barat','081901234567','Office Boy','cowo4.png'),
(20210726,'fajar','fajar123','Fajar Ramadhan','Jakarta, 8 Juli 1998','Laki-Laki','Islam','Jl. Angke Nomor 909, Kota Jakarta Barat, DKI Jakarta','082012345678','Manajer','cowo5.png'),
(20230745,'yeni','yeni123','Yeni Lestari','Bogor 15 Oktober, 1999','Perempuan','Buddha','Jl. Yos Sudarso, No.10, Kota Jakarta Utara, DKI Jakarta','082123456789','Manajer','cewe5.png');

CREATE TABLE `tb_keterangan` (
  `id` int(15) NOT NULL,
  `id_karyawan` INT(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `alasan` text NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tb_daftar`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);


ALTER TABLE `tb_keterangan`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tb_absen`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tb_daftar`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

ALTER TABLE `tb_jabatan`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;


ALTER TABLE `tb_keterangan`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

