<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>absensi-dashboard</title>

    <!-- FILE CSS -->
    <link href="styledashboard.css" rel="stylesheet" media="all"> 
    <?php date_default_timezone_set('Asia/Jakarta'); ?> <!--atur waktu saat ini-->
</head>

<body>
    <div class="page-wrapper"> <!--BAGIAN KESELURUHAN (SIDEBAR + KONTEN KANAN)-->
        <!-- MENU SIDEBAR -->
        <aside class="sidebar">
            <h1>AttendenceAntics</h1> <!--JUDUL SIDEBAR-->
            <nav class="menu-sidebar"> <!--LIST MENU SIDEBAR-->
                <ul>
                    <li><a href="">Dashboard</a></li>
                    <li><a href="?m=karyawan&s=profil"> Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>

        </aside>
        <!-- END MENU SIDEBAR -->

        <!-- PAGE CONTAINER -->
        <div class="page-container"> <!---KONTEN BAGIAN KANAN-->
            <!-- HEADER DESKTOP -->
            
            <header class="header-desktop">
               
                    <h3> Absensi Pegawai </h3> 
                
            
                <div class="header-profile"> <!--BAGIAN PROFILE SEBELAH KANAN-->
                    
                    <?php
                    $id = $_SESSION['idsi']; //pake data session tadi

                    include '../koneksi.php';
                    
                    $sql = "SELECT * FROM tbl_karyawan WHERE id_karyawan = '$id'"; //proses
                    $query = mysqli_query($koneksi, $sql); //koneksiin buat ambil
                    $r = mysqli_fetch_array($query); //disimpan seluruh data nya sesuai kunci id tadi
                    ?>
                    
                        <div class="account-item"> <!--BAGIAN INFORMASI PROFILE KANAN ATAS, FOTO DAN NAMA-->
                            <div class="image"> <!--BAGIAN FOTO-->
                                <img src="../images/<?php echo $r['foto']; ?>" class="img-circle" alt="<?php echo $r['nama']; ?>" /> <!--ambil foto dri database--> 
                            </div>

                            <div class="nama"> <!--BAGIAN NAMA-->
                                <?php echo $r['nama']; ?> <!--ambil nama dri database--> 
                            </div>

                            
                        </div>
                  
                </div>
                
            </header>
            
            <!-- MAIN CONTENT -->
            <main class="main-content"> <!--KONTEN UTAMA KANAN BAWAH SETELAH HEADER-->
                
                    <div class="judulatas"> <!--JUDUL TENGAH-->
                        <h2>Selamat Datang <?php echo $_SESSION['namasi']; ?>, Silahkan Absen</h2> <!--pake session tadi-->
                        
                    </div>

                    <form action="dt_absen_sv.php" method="post"> <!-- FUNGSI BUAT NGARAH KE DATABASE PAS KLIK ABSENSI -->
                        <table class="tabel-absen"> <!--TABLE BAWAH KANAN BUAT ABSENSI -->
                            <tr>
                                <td>NIP</td>
                                <td> <!-- BAGIAN NIP YANG KOTAK -->
                                    <input type="text" readonly class="form-control" name="id_karyawan" value="<?php echo $_SESSION['idsi']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Nama</td> <!-- BAGIAN NAMA YANG KOTAK -->
                                <td><input type="text" class="form-control" name="nama" readonly value="<?php echo $_SESSION['namasi']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Waktu</td> <!-- BAGIAN WAKTU YANG KOTAK -->
                                <td><input type="text" class="form-control" value="<?php echo date('l, d-m-Y h:i:s a'); ?>" name="waktu" readonly></td> <!--hari, day,month,year hour-->
                            </tr> 
                            <tr> <!-- BAGIAN TOMBOL ABSEN -->
                                <td><button type="submit" name="simpan" class="btnhadir">Absen</button></td>
                            </tr>
                        </table>
                    </form>

                    <div class="tidakhadir">
                        <a href="?m=karyawan&s=title"><button class="btntidakhadir">Klik Tombol ini jika tidak hadir / absen</button></a>
                    </div>
                
            </main>
        </div>
    </div>
</body>
</html>
