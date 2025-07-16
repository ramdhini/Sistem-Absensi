<?php 
require_once("koneksi.php");
error_reporting(0);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-data user/admin</title>
    <link rel="stylesheet" href="datauser.css">
</head>

<body class="main">
      <?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }else {
        $username = $_SESSION['username'];  //simpen hasil sessionnya
    }

 ?>
    <div class="page-wrapper"> <!--KESELURUHAN ISI TAMPILAN(SIDEBAR + KONTEN TABEL KANAN)-->
        <!-- MENU SIDEBAR-->
        <div class="menu-sidebar">
            <div class="judul-sidebar"> <!--HEADER SIDEBAR-->
                <h2>Admin</h2>
            </div>            
                <nav class="navbar-sidebar"> <!--BAGIAN LIST SIDEBAR DIBAWAHNYA HEADER-->
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
                <div class="section-header"> 
                    <h3> Data User/Admin </h3> <!--JUDUL HEADER CONTENT UTAMANYA-->
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

            <div class="main-content"> <!--ISIAN UTAMA KONTEN KANAN-->
                
                        <div class="row">

                            <div class="table-main"> <!--BAGIAN TABLE ATAS : INPUTAN-->
                            <form action="admin_save.php" method="post"> <!--KALAU INPUTAN AKAN DIPROSES SAMA FILE PHP INI-->
                                
                                <div class="form-group">
                                    <table class="table-content" > <!--TABLE DIMULAI-->
                                        <tbody>
                                            <tr>
                                                <td>username</td>
                                                <td>
                                                <input type="text" class="form-control" name="username" autocomplete="off">     
                                            </td>
                                            </tr>

                                            <tr>
                                                <td>password</td>
                                                <td>
                                                <input type="text" class="form-control" name="password" autocomplete="off">    
                                            </td>
                                            </tr>
                                           
                                            <tr>
                                                <td><button type="submit" name="simpan" class="btn-simpan">Simpan</button></td>
                                                <td><input type="reset" name="" value="Batal" class="btn-batal"></td>
                                            </tr>
                                      </tbody>
                                    </table> <!--TABLE SLESAI-->
                                </div>

                            </form>
                            </div>  

                        </div>

                        
                        <div class="table-main"> <!--BAGIAN TABLE BAWAH : HASIL-->
                            <table class="table-content">
                                <thead>
                                    <tr>
                                            
                                        <th>id</th>
                                        <th>username</th>
                                        <th>password</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                    <?php 
                                            include 'koneksi.php';
                                            $sql = "SELECT * FROM tb_daftar";
                                            $query = mysqli_query($koneksi, $sql);

                                           
                                            while ($row = mysqli_fetch_array($query)) { //ngambil semua baris dari database (looping)
                                                
                                            
                                    ?>
                                <tbody>
                                    <tr>
                                    
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td> <a href="admin_hapus.php?id=<?php echo $row['id']; ?>"><button class="btn-hapus" onclick="return confirm('yakin ingin dihapus?');">Hapus</button></a></td>
                                    </tr>
                                           <?php 
                                           
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
