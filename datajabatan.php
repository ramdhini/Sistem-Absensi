<?php 
require_once("koneksi.php");
error_reporting(0);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-data jabatan</title>
    <link rel="stylesheet" href="dataJAB.css">
</head>

<body class="main"> <!--BAGIAN BODY (ALL)-->
      <?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }else {
        $username = $_SESSION['username'];  //ambil dan simpan username
    }

 ?>
    <div class="page-wrapper"> <!--BAGIAN SELURUH KONTEN (SIDEBAR + KOLOM KANNA)-->
         <!-- MENU SIDEBAR-->
         <div class="menu-sidebar">
            <div class="judul-sidebar">
                <h2>Admin</h2>
            </div>            
                <nav class="navbar-sidebar"> <!--BAGIAN LIST SIDE BAR DIBAWAH NYA HEADER-->
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
            <header class="header-desktop"> <!-- BAGIAN JUDUL KONTEN KANAN-->
                    <h3>Data Jabatan</h3>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

            <div class="main-content"> <!--KONTEN UTAMA (KANAN) DIBAWAH HEADER-->
               
                        <div class="row">
                            <div class="table-main"> <!-- BAGIAN TABLE KANAN ATAS (INPUTAN)-->
                            <form action="jabatan_sv.php" method="post"> <!--KALAU NAMBAH JABATAN, DI PROSES DI FILE PHP INI-->

                                <div class="form-group">
                                <table class="table-content" > <!--TABEL ATAS DIMULAI-->
                                        
                                        <tbody>
                                            <tr>
                                                <td>Jabatan</td>
                                                <td>
                                                <input type="text" class="form-control" name="jabatan" autocomplete="off">    
                                                
                                            </td>
                                            </tr>
                                           
                                            <tr>
                                                <td><button type="submit" name="simpan" class="btn-simpan">Simpan</button></td>
                                                <td><input type="reset" name="batal" value="Batal" class="btn-batal"></td>
                                            </tr>
                                            
                                        </tbody>
                                </table> <!--TABLE ATAS SELESAI-->
                                </div>
                            </form>
                                    
                            </div>    
                        </div>

                      

                        <div class="table-main"> <!--BAGIAN TABLE BAWAH : HASIL-->
                            <table class="table-content">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                        <?php 
                                            include 'koneksi.php';
                                            $sql = "SELECT * FROM tb_jabatan";
                                            $query = mysqli_query($koneksi, $sql);

                                            $no = 1; //NO DIMULAI DARI 1
                                            while ($row = mysqli_fetch_array($query)) { //ambil semua data (looping)
                                                
                                            
                                         ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row['jabatan']; ?></td>

                                        <td> <a href="hapus_jabatan.php?id=<?php echo $row['id']; ?>"><button class="btn-hapus" onclick="return confirm('yakin ingin dihapus?');">Hapus</button></a></td>
                                    </tr>
                                           <?php 
                                           $no++;
                                       }

                                            ?>
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>

</body>

</html>
<!-- end document-->
