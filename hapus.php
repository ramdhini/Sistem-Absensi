<?php 
include 'koneksi.php';
session_start();

$id = $_GET['id_karyawan'];
$sql = "SELECT *  FROM tbl_karyawan WHERE id_karyawan = '$id'";
$query = mysqli_query($koneksi, $sql);
$hapus_f = mysqli_fetch_array($query); //ambil semua data

//proses hapus gambar
$file = "images/".$hapus_f['foto'];
unlink($file); //menghapus file dri server

//proses hapus seluruh data dengan kunci nya id karyawan
$sql_h = "DELETE FROM tbl_karyawan WHERE id_karyawan = '$id' ";
$hapus = mysqli_query($koneksi, $sql_h);

if ($hapus) {
         header("location: datakaryawan.php"); //kalau berhasil
} else {
  echo "Gagal Dihapus"; //kalau gagal
}

 ?>

