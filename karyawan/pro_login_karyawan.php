<?php 

  include_once "../koneksi.php";

  $username = $_POST['username']; //username nya itu dari name di inputan username(key)
  $pass = $_POST['password'];

  $sql = "SELECT * FROM tbl_karyawan WHERE username='$username' AND password='$pass'";

  $login=mysqli_query($koneksi,$sql); //melakukan aksi

  $ketemu=mysqli_num_rows($login); //cek jumlah baris yang sesuai, kalau ketemu nilai nya > 0

  $b=mysqli_fetch_array($login); //ngambildata, lengkap semua di ambil

  if($ketemu>0){
    session_start(); //mulai session selama didalam aplikasi, sebelum logout
    $_SESSION['idsi']   = $b['id_karyawan'];
    $_SESSION['usersi'] = $b['username'];
    $_SESSION['namasi'] = $b['nama'];
    $_SESSION['ttlsi']  = $b['tmp_tgl_lahir'];
    $_SESSION['jenkelsi'] = $b['jenkel'];
    $_SESSION['agamasi'] = $b['agama'];
    $_SESSION['alamatsi'] = $b['alamat'];
    $_SESSION['teleponsi'] = $b['no_tel'];
    $_SESSION['jabatansi'] = $b['jabatan'];
    $_SESSION['fotosi'] = $b['foto'];
    echo "<script> alert ('username dan password sesuai, silakan masuk!'); window.location='index.php?m=awal'</script>";
}else{
    
    echo "<script> alert ('username dan password belum sesuai, silakkan coba lagi!'); window.location='login-peserta.php'</script>";
}
  

 ?>

