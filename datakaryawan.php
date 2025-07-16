<?php
error_reporting(0); 
require_once("koneksi.php"); //koneksi ke database 
session_start(); //session dimulai
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-data pegawai</title>
    <link rel="stylesheet" href="karyawandata.css"> <!--HUBUNGIN KE FILE CSS-->
</head>

<body class="main"> <!--BAGAN UTAMA-->
      <?php 
    session_start(); 
    if (!isset($_SESSION['username'])) {
        header("location: index.php");
    }else {
        $username = $_SESSION['username'];  //username admin disimpan
    }

 ?>
    <div class="page-wrapper"> <!--KESELURUHAN ISI KONTEN (SIDEBAR + TABEL KONTEN)-->
        <!-- MENU SIDEBAR-->
        <div class="menu-sidebar">
            <div class="judul-sidebar"> <!--JUDUL SIDEBAR "ADMIN"-->
                <h2>Admin</h2>
            </div>
                <nav class="navbar-sidebar">
                    <ul class="list-navbar"> <!--LIST SIDEBARNYA-->
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
                    <div class="header-wrap">
                       <form class="form-header" action="prospenkar.php" method="POST">   <!--BUAT SEARCH DATA DI ALIHIN PAKE FUNGSI PHP-->                             
                        <input class="search-button" autocomplete="off" type="text" name="cari" placeholder="Cari ID atau nama pegawai" />
                            <button class="search-submit" type="submit"><img src="https://img.icons8.com/?size=100&id=7695&format=png&color=000000"></button>  <!-- BAGIAN ICON SEARCHING-->
                        </form>
                    </div>
                </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

            <div class="main-content">
                

                        <div class="mainrow">
                           <div class="maintable">

                            <!--BAGAN FORM PERTAMA (ATAS) : INPUTAN USER-->
                            <form action="dt_karyawan_sv.php" enctype="multipart/form-data" method="post"> <!--FUNGSI NYA NANTI AKAN DISIMPAN DALAM FILE INI, DI PROSES PHP-->
                                <div class="form-group">
                                    <table class="table-content"> <!--PEMBENTUKAN TABEL (YANG ATAS)-->
                                        
                                        <tbody>
                                            <tr>
                                                <td>NIP</td>
                                                <td><input type="text" class="form-control" maxlength="9" required="" name="id_karyawan" autocomplete="off" size="25px" maxlength="25px"></td>
                                            </tr>
                                            <tr>
                                                <td>Username</td>
                                                <td><input type="text" class="form-control" required="" name="username" autocomplete="off"></td>
                                            </tr>
                                            <tr>
                                                <td>Password</td>
                                                <td><input type="text" class="form-control" required="" name="password" autocomplete="off"></td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td><input type="text" class="form-control" required="" name="nama" autocomplete="off"></td>
                                            </tr>
                                            <tr>
                                                <td>Tempat dan Tanggal Lahir</td>
                                                <td><input type="text" class="form-control" required="" name="tmp_tgl_lahir" autocomplete="off"></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>
                                                <select class="form-control" required="" name="jenkel">
                                                    <option>--</option>
                                                    <option>Laki-laki</option>
                                                    <option>Perempuan</option>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td>
                                                    <div class="form-group">
                                                        <select class="form-control" required="" name="agama">
                                                            <option>--</option>
                                                            <option>Islam</option>
                                                            <option>Kristen</option>
                                                            <option>Katholik</option>
                                                            <option>Hindu</option>
                                                            <option>Buddha</option>
                                                            <option>KongHuCu</option>
                                                        </select>    
                                                    </div> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td> 
                                                <td><textarea class="form-control" required="" name="alamat" autocomplete="off"></textarea> </td>
                                            </tr>
                                            <tr>
                                                <td>No Telepon</td>
                                                <td><input type="text" autocomplete="off" maxlength="18" required="" class="form-control" name="no_tel"></td>
                                            </tr>
                                            <tr>
                                                <td>Jabatan</td>
                                                <td>
                                                <select class="form-control" name="jabatan" required=""> <!--data yg ada di databse -->
                                                <?php 
                                                include 'koneksi.php';
                                                $sql = "SELECT * FROM tb_jabatan";
                                                $hasil = mysqli_query($koneksi, $sql);
                                                while ($data = mysqli_fetch_array($hasil)) {  //ngambildata, lengkap semua di ambil
                                                 ?>
                                                <option value="<?php echo $data['jabatan'];?>"><?php echo $data['jabatan']; ?></option>
                                                <?php } ?>
                                                   
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Foto</td>
                                                <td><input type="file" name="foto" required=""></td>
                                            </tr>
                                            <tr>
                                                <td><button type="submit" name="simpan" class="btn-simpan">Simpan</button></td>
                                                <td><input type="reset" name="" value="Batal" class="btn-batal"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                            <!--BAGAN FORM PERTAMA (ATAS) : INPUTAN USER-->
                                    
                         </div>    
                        </div>
                        
                        
                        
                        <!--BAGAN BAWAH (TABEL OUTPUTAN)-->
                        <div class="row">
                                <div class="table-data"> <!--DATA DIBAWAHNYA -->
                                    <table class="table-data-main">
                                        <thead>
                                            <tr>
                                            <th>NIP</th>
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
                                            include 'paging.php'; 
                                            ?> <!--PAKE PHP BUAT TAMPILIN DATA NYA SESUAI DENGAN FUNGSI KODE DI FILE PAGING.PHP-->
                                        </tbody>
                                    </table>  
                                </div>
                        </div>
                        <!--BAGAN BAWAH (TABEL OUTPUTAN)-->
                        
                    <!--TAMPILAN PREVIOUS DAN NEXT DIBAWAH-->
                        <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
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
                     <!--TAMPILAN PREVIOUS DAN NEXT DIBAWAH-->

                    
            </div>
        </div>   
    
    </div>                 

</body>

</html>
<!-- end document-->
