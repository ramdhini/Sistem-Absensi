<?php
session_start(); 
include 'koneksi.php';
if (isset($_POST['simpan'])) {
	
	$id_karyawan = $_POST['id_karyawan'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$tmp_tgl_lahir = $_POST['tmp_tgl_lahir'];
	$jenkel = $_POST['jenkel'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$no_tel = $_POST['no_tel'];
	$jabatan = $_POST['jabatan'];


	//untuk gambar
	$foto     = $_FILES['foto']['name']; //namafile asli
	$tmp      = $_FILES['foto']['tmp_name']; //disimpan sementara
	$fotobaru = date('dmYHis').$foto; //format nama baru
	$path     = "images/".$fotobaru; //lokasi + nama baru
}

//cek data udh pernah di masukin atau belum(idnya)
if (move_uploaded_file($tmp, $path)) { //pindah jalur lokasi
	$sql = "SELECT * FROM tbl_karyawan WHERE id_karyawan = '".$id_karyawan."'"; //cek biar engga duplikat	
	$tambah = mysqli_query($koneksi, $sql);
}

if ($row = mysqli_fetch_row($tambah)) { //ngambil baris yang mau diambil
echo "<script>alert('Data Dengan NIP = ".$id_karyawan." sudah ada') </script>";
		echo "<script>window.location.href = \"datakaryawan.php\" </script>";
	

}

//masukin data
$query = "INSERT INTO tbl_karyawan set id_karyawan='$id_karyawan', username='$username', password='$password', nama='$nama', tmp_tgl_lahir='$tmp_tgl_lahir', jenkel='$jenkel', agama='$agama', alamat='$alamat', no_tel='$no_tel', jabatan='$jabatan', foto='$fotobaru'";
mysqli_query($koneksi, $query);

if ($query) {
	header("location: datakaryawan.php");
}else{
	echo "gagal";
}

 ?>