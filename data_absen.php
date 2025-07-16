<?php 
require_once("koneksi.php");
error_reporting(0);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-data absen</title>
    <link rel="stylesheet" href="dataabsen.css" media="all">
</head>


<body class="main"> <!--BAGIAN UTAMA DASAR-->
      <?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }else {
        $username = $_SESSION['username'];  //username keynya
    }

 ?>
    <div class="page-wrapper"> <!--SELURUH KONTEN (SIDEBAR + KONTEN KANAN)-->
        <!-- MENU SIDEBAR-->
        <div class="menu-sidebar">
            <div class="judul-sidebar"> <!--JUDUL SIDEBAR-->
                <h2>Admin</h2>
            </div>    

                <nav class="navbar-sidebar"> <!--BAGIAN SIDEBAR LIST NYA-->
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
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                
                       
                            <form class="form-header" action="prospenab.php" method="POST"> <!--ADA FITUR CARI KARYAWAN DIALIHIN KE PHP INI-->
                                <input autocomplete="off" class="input-section" type="text" name="cari" placeholder="Cari ID atau Nama Karyawan" />
                                <button class="btn-search" type="submit"><img src="https://img.icons8.com/?size=100&id=7695&format=png&color=000000">
                                </button>
                            </form>
                               
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

            <div class="main-content"> <!--KONTEN UTAMA DIBAWAH HEADER SEARCHING-->
                

                                <div class="table-main"> <!--TABLE KANAN DIMULAI-->
                                    <table class="table-content"> <!--TABEL KONTEN UTANA KANAN-->
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nip</th>
                                                <th>Nama</th>
                                                <th>Waktu</th>
                                                <th>aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <?php 
                                            include 'koneksi.php';
                                            $sql = "SELECT * FROM tb_absen";
                                            $query = mysqli_query($koneksi, $sql);

                                            $no = 1; //KOLOM NO DIMULAI DARI 1
                                            while ($row = mysqli_fetch_array($query)) { //looping ngambil semua data 
                                                
                                            
                                         ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $row['id_karyawan']; ?></td>
                                                <td><?php echo $row ['nama']; ?></td>
                                                <td><?php echo $row['waktu']; ?></td>
                                                
                                                    

                                                </td>
                                                <td> <a href="absen/hapus_absen.php?id=<?php echo $row['id']; ?>"><button class="btn-hapus" onclick="return confirm('yakin ingin dihapus?');">Hapus</button></a></td>
                                            <!--AKSI DI ALIHIN KE FOLDER ABSEN FILE HAPUS_ABSEN-->

                                                
                                            </tr>
                                           <?php 
                                           $no++;
                                       }

                                            ?>
                                        </tbody>
                                    </table> <!--TABLE KANAN SLESAI-->
                                </div>
                           
                          
            

            
                
            </div>
        </div>

    </div>


</body>

</html>
<!-- end document-->
