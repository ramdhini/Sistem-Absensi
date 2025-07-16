<?php
error_reporting(0); 
require_once("koneksi.php");
session_start();
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>absen-data pegawai</title>
    <link rel="stylesheet" href="prospenkar.css">
</head>

<body>
      <?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }else {
        $username = $_SESSION['username'];  
    }

 ?>
    <div class="page-wrapper">

           <!-- MENU SIDEBAR-->
        <div class="menu-sidebar">
            <div class="judul-sidebar"> <!--JUDUL SIDEBAR-->
                <h2>Admin</h2>
            </div>    

                <nav class="navbar-sidebar"> <!--BAGIAN SIDEBAR LIST NYA-->
                    <ul class="list-navbar">
                        <li class="judul-navbar">
                            <a href="admin2.php"> Dashboard </a>
                        </li>
                        <li>
                            <a href="datakaryawan.php"> Data Pegawai</a>
                        </li>
                        <li>
                            <a href="datauser.php"> Data User</a>
                        </li>
                        <li>
                            <a href="datajabatan.php"> Data Jabatan</a>
                        </li>
                        <li>
                            <a href="data_absen.php"> Data Absen</a>
                        </li>
                        <li>
                            <a href="data_keterangan.php"> Data Keterangan</a>
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </nav>
        </div>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop"> <!--BAGIAN HEADER ATAS KOLOM KANAN-->
                            <form class="form-header" action="prospenkar.php" method="POST"> <!--ADA FITUR CARI KARYAWAN DIALIHIN KE PHP INI-->
                                <input autocomplete="off" class="input-section" type="text" name="cari" placeholder="Cari ID atau Nama Karyawan" />
                                <button class="btn-search" type="submit"><img src="https://img.icons8.com/?size=100&id=7695&format=png&color=000000">
                                </button>
                            </form>
                               
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

            <div class="main-content"> <!--BAGIAN KONTEN KANAN BAWAH-->
                
                                <div class="table-main">
                                    <table class="table-content"> <!--TABEL DIMULAI-->
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nip</th>
                                                <th>Nama</th>
                                                <th>Tempat & tanggal lahir</th>
                                                <th class="text-right">Jenis Kelamin</th>
                                                <th class="text-right">Agama</th>
                                                <th>Alamat</th>
                                                <th>Nomor Telepon</th>
                                                <th>Jabatan</th>
                                                <th>Foto</th>
                                                <th>Aksi</th> 
                                            </tr>
                                        </thead>

                                           
                                        <tbody>
                                            <?php 
                                            $cari = $_POST['cari'];
                                            $sql = "SELECT * FROM tbl_karyawan WHERE id_karyawan LIKE '%$cari%' OR nama LIKE '%$cari%'";
                                            $query = mysqli_query($koneksi, $sql);

                                            $no = 1;

                                            while ($row = mysqli_fetch_array($query)) {
                                                
                                            
                                             ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row['id_karyawan']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['tmp_tgl_lahir']; ?></td>
                                                <td><?php echo $row['jenkel']; ?></td>
                                                <td><?php echo $row['agama']; ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td><?php echo $row['no_tel']; ?></td>
                                                <td><?php echo $row['jabatan']; ?></td>
                                                <td>
                                                    <?php 

                                                    if ($row['foto']!='') {
                                                        echo "<img src=\" images/$row[foto]\"  />";
                                                    }else{
                                                        echo "images"; //kalau kosong tampilnya images doang
                                                    }

                                                     ?>
                                                    

                                                </td>
                                                <td><a href="hapus.php?id_karyawan=<?php echo $row['id_karyawan']; ?>"><button class="btn-hapus" onclick="return confirm('yakin ingin dihapus?');">Hapus</button></a></td>
                                                
                                            </tr>
                                           <?php 
                                           $no++;
                                       }

                                            ?>
                                        </tbody>
                                    </table> <!--TABEL-->
                                </div>
                            
            </div>
        </div>

    </div>

   

</body>

</html>
<!-- end document-->
