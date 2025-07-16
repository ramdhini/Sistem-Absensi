<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>absensi-admin-home</title>
    <link href="adminstyle.css" rel="stylesheet" media="all"> <!--BUAT HUBUNGIN KE FILE CSS-->
</head>

<body class="page-main"> <!--BODY KESELURUHAN-->
    <?php 
    session_start();
    if (!isset($_SESSION['username'])) {        //kalau tidak ada dialihin
        header("location: index.php");
    }else {
        $username = $_SESSION['username'];   //kalau ada disimpan
    }

 ?>
    <div class="page-wrapper"> <!--KESELURUHAN ISI KONTEN-->
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar">  <!--ISIAN SIDE BAR + BAGIAN SIDE BAR-->
            <div class="judul-sidebar">  <!--JUDUL SIDE BAR "ADMIN"-->
                <h2>Admin</h2>
            </div>

            <div class="menu-sidebar">
                <nav class="navbar-sidebar">   <!--BAGIAN SIDEBAR TANPA HEADER "ADMIN"-->
                    <ul class="list-navbar">  <!--LIST SECTION BAGIAN SIDE BAR-->
                        <li class="judul-navbar">
                            <a class="js-arrow" href="">Dashboard</a>
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
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP (BAGIAN -->
                <div class="header-desktop">
                    <h1>AttendanceAntics</h1>
                </div>
           
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                 <div class="content">
                    <center><img src="dashboard-admin.png" width="500" class="img-responsive" height="500"></center><br>   
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
</body>

</html>
<!-- end document-->
