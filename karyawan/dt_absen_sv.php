<?php
	include '../koneksi.php'; //koneksi

	if (isset($_POST['simpan'])) { //ngambil data ketika klik absen /simpan
		$id_karyawan = $_POST['id_karyawan'];
		$nama = $_POST['nama'];
		$waktu = $_POST['waktu'];

	}

	$save = "INSERT INTO tb_absen SET id_karyawan='$id_karyawan', nama='$nama', waktu='$waktu'"; //masukin
	mysqli_query($koneksi, $save); //mauskin dan konekin

	if ($save) {
		echo "<script>alert('Anda sudah absen untuk hari ini') </script>"; //alert
		echo "<script>window.location.href = \"index.php?m=awal\" </script>";	
	}else{
		echo "kryptosssss";
	}

?>