<!--KONEKSI DENGAN DATABASE-->
<?php 
//"host", "username", "password", "namadatabase"

$koneksi = mysqli_connect("localhost", "root", "", "dataabsensi");

if (!$koneksi) {
	echo "koneksi database gagal"; 
} 

?>


