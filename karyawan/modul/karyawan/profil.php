<?php 
error_reporting(0);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>absensi-profile</title>
    <link href="modul/karyawan/profilesec.css" rel="stylesheet" media="all">  <!--LINK ARAHAN CSS-->
</head>

<?php date_default_timezone_set('Asia/Jakarta'); ?>
<body>
<div class="page-wrapper"> <!--BAGIAN KESELURUHAN (SIDEBAR + KONTEN KANAN)-->
        <!-- MENU SIDEBAR -->
        <aside class="sidebar">
            <h1>AttendenceAntics</h1> <!--JUDUL SIDEBAR-->
            <nav class="menu-sidebar"> <!--LIST MENU SIDEBAR-->
                <ul>
                    <li><a href="/absensipro/karyawan/index.php?m=awal">Dashboard</a></li>
                    <li><a href="?m=karyawan&s=profil"> Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>

        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                
                    <h2> Profil </h2>

                        <div class="header-profile"> <!--BAGIAN PROFILE SEBELAH KANAN-->
                                 <?php
                                    $id = $_SESSION['idsi']; //kunci id karyawan
                                    include '../koneksi.php';
                                    $sql = "SELECT * FROM tbl_karyawan WHERE id_karyawan = '$id'";
                                    $query = mysqli_query($koneksi, $sql);
                                    $r = mysqli_fetch_array($query);

                                     ?>

                            <div class="account-item"> <!--BAGIAN INFORMASI PROFILE KANAN ATAS, FOTO DAN NAMA-->
                                <div class="image"> <!--BAGIAN FOTO-->
                                    <img src="../images/<?php echo $r['foto']; ?>" class="img-circle" alt="<?php echo $r['nama']; ?>" />
                                </div>

                            <div class="nama"> <!--BAGIAN NAMA-->
                                <?php echo $r['nama']; ?>
                            </div>
                            
                        </div>    
                  
            </header>
        

            <!-- MAIN CONTENT-->
            <div class="main-content">
                
                    <div class="judulatas"> <!--JUDUL TENGAH-->
                        <h2>Profil anda : <?php echo $_SESSION['namasi']; ?></h2>  
                    </div>

                        <!-- FORM -->
                        
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group"> <!--BAGIAN KOTAK KANAN BAWAH ISIAN-->
                                	<?php
                                	$id = $_SESSION['idsi'];
                                	include 'koneksi.php';
                                	$sql = "SELECT * FROM tbl_karyawan WHERE id_karyawan = '$id'";
                                	$query = mysqli_query($koneksi, $sql);
                                	$r = mysqli_fetch_array($query);

                                	 ?>

                                    <table class="table-content" > <!--TABEL DIMULAI-->
                                        <tbody>  
                                            <tr>
                                                <td>NIP</td>
                                                <td><?php echo $r['id_karyawan'];?></td>
                                            </tr>
                                           
                                            <tr>
                                                <td>Nama</td>
                                                <td><?php echo $r['nama'];?></td>
                                            </tr>

                                            <tr>
                                            	<td>Tempat & tanggal lahir</td>
                                            	<td><?php echo $r['tmp_tgl_lahir'];?></td>
                                            </tr>

                                            <tr>
                                            	<td>Jenis Kelamin</td>
                                            	<td><?php echo $r['jenkel'];?></td>
                                            </tr>

                                             <tr>
                                                <td>Agama</td>
                                                <td><?php echo $r['agama'];?></td>
                                            </tr>

                                           <tr>
                                              <td>Alamat</td>
                                              <td><?php echo $r['alamat'];?></td>
                                           </tr>

                                           <tr>
                                           	<td>Nomor telepon</td>
                                           	<td><?php echo $r['no_tel'];?></td>
                                           </tr>

                                           <tr>
                                           	<td>Jabatan</td>
                                           	<td><?php echo $r['jabatan'];?> </td>
                                           </tr>

                                           <tr>
                                           	<td>Foto</td>
                                           	<td><img src="../images/<?php echo $r['foto'];?>" style="width: 180px;height: 180px; object-fit:cover; "></td>
                                           </tr>

                                            
                                        </tbody>
                                    </table> <!--TABEL SELESAI-->

                                </div>
                            </form> 
                      
            </div>
            <!-- END MAIN CONTENT-->
            
        </div>
    </div>
</body>

</html>
<!-- end document-->
