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
    <title>admin-data keterangan</title>
    <link href="keterangandata.css" rel="stylesheet" media="all"> <!--KONEKSI KE FILE CSS--> 
</head>

<body class="main"> <!--BAGIAN BADAN SELURUHNYA-->
      <?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }else {
        $username = $_SESSION['username'];  //pastiin session
    }

 ?>
    <div class="page-wrapper"> <!--BAGIAN SELURUH KONTEN (SIDEBAR + KONTEN KOLOM KANAN -->
        <!-- MENU SIDEBAR-->
        <div class="menu-sidebar">
            <div class="judul-sidebar">
                <h2>Admin</h2>
            </div>            
                <nav class="navbar-sidebar">  <!--SIDE BAR BAGIAN LIST (DIBAWAH HEADER "ADMIN"-->
                    <ul class="list-navbar">
                        <li class="judul-navbar">
                            <a href="admin2.php">Dashboard</a>
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
        <div class="page-container"> <!--ISI KONTEN BAGIAN KANAN--->
            <!-- HEADER DESKTOP-->
            <header class="header-desktop"> <!--JUDUL BAGIAN KANAN KONTEN UTAMA-->
                
                    <h3>Data Keterangan Absensi</h3>
             
            </header>

            <!-- MAIN CONTENT-->

            <div class="main-content"> <!--KONTEN UTAMA DIBAWAH HEADER-->
                

                                <div class="table-main">
                                    <table class="table-content">
                                        <thead>
                                            <tr>
                                <th>no</th>   
                                 <th>id pegawai</th>
                                 <th>Nama</th>
                                 <th>keterangan</th>
                                 <th class="text-right">alasan</th>
                                 <th class="text-right">waktu</th>
                                 <th>bukti</th>
                               
                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php 
                                            

                                            $no = 1;
                                        
                                                
                                            
                                         ?>
                                        <tbody>
                                           
                                           <?php 
                                           $no++;
                                            include 'paging_ket.php'; // MANGGIL FILE PHP BUAT TAMPILI ISI DATA NYA-->

                                            ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            
                            <ul class="pagination"> <!--BAGIAN PAGINATION-->
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>              
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>

            
        </div>
    </div>

</body>

</html>
<!-- end document-->
