<?php 
$koneksi = mysqli_connect("localhost", "root", "", "dataabsensi");

if (mysqli_connect_errno()) {
	echo "koneksi gagal " . mysql_connect_error();
}
 ?>