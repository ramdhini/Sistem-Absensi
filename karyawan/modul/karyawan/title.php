<?php 
error_reporting(0);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>absensI-keterangan</title>
    <link href="modul/karyawan/titlestyle2.css" rel="stylesheet" media="all"> 
</head>

<body>
    <div class="page-wrapper">
        
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
        <div class="page-container">  <!---KONTEN BAGIAN KANAN-->
            <!-- HEADER DESKTOP-->
            <header class="header-desktop"> <!--BAGIAN HEADER JUDUL + PROFILE-->
                           
                                <h3>Keterangan</h3> <!--HEADER AJA-->
                           
                            <div class="header-profile">
                                
                                 <?php
                                    $id = $_SESSION['idsi']; //ngambil kuncinya adalah id karyawan
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
                            </div>

                    
                    
                
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
             
            <div class="main-content">
                        
                        <div class="judulatas"> <!--JUDUL TENGAH-->
                        <h2>Silahkan masukkan keterangan anda, <?php echo $_SESSION['namasi']; ?></h2>
                        
                        </div>
                        
                        <!-- FORM -->
                        
                            <form action="modul/karyawan/keterangan_sv.php" method="post" enctype="multipart/form-data"> <!--PROSES SIMPAN KE DATABASE LEWAT PHP-->
                                <div class="form-group">

                                    <table class="table-content" > <!--TABEL DIMULAI-->
                                        <tbody>
                                            <tr>
                                                <td>NIP</td>
                                                <td><input type="text" readonly="" class="form-control" name="id_karyawan" autocomplete="off" size="25px" maxlength="25px" value="<?php echo $_SESSION
                                                ['idsi'];?>">    
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <td>Nama</td>
                                                <td><input type="text" class="form-control" name="nama" autocomplete="off" readonly="" value="<?php echo $_SESSION['namasi']; ?>"></td>
                                            </tr>

                                            <tr>
                                            	<td>Keterangan</td>
                                            	<td><select name="keterangan" required="">
                                            		<option></option>
                                            		<option>Sakit</option>
                                            		<option>Izin</option>
                                            	</select></td>
                                            </tr>

                                            <tr>
                                            	<td>Alasan</td>
                                            	<td><textarea name="alasan" class="form-control" required=""></textarea></td>
                                            </tr>

                                             <tr>
                                                <td>Waktu</td>
                                                <td><input readonly="" type="text" class="form-control" value="<?php echo date('l, d-m-Y h:i:s a' ); ?>" name="waktu"></td> <!--realtime-->
                                            </tr>

                                           <tr>
                                              <td>Foto surat keterangan sakit / izin</td>
                                              <td><input type="file" required="" name="bukti"></td>
                                           </tr>

                                            <tr>
                                                <td><button type="submit" name="simpan" class="btnketerangan">Beri Keterangan</button></td>
                                                <td><input type="reset" name="" value="Batal" class="btnreset"></td>
                                            </tr>
                                        </tbody>
                                    </table> <!--TABLE SELESAI-->

                                </div>
                            </form>
                         
            </div>

            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
</body>
</html>
<!-- end document-->
