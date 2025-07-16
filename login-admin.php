<?php 
  session_start();
  require_once("koneksi.php");

  if(isset($_POST["login"])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = mysqli_query($koneksi, "SELECT * FROM tb_daftar WHERE username = '$username'");
  $hasil = mysqli_fetch_assoc($sql); //data diambil disimpan di variabel hasil

  if (mysqli_num_rows($sql) == 0) { //cek setiap baris buat username
    echo "<script> alert ('username belum terdaftar!'); window.location='login-admin.php'</script>";
  }else{
    if ($password <> $hasil['password']) { //cek password di data yg udh diambil
      echo "<script> alert ('password Anda salah!'); window.location='login-admin.php'</script>";
      
    }else{
      $_SESSION['username'] = $hasil['username']; //kalau nemu, beerhasil
      echo "<script> alert ('username dan password benar, silakkan masuk!'); window.location='admin2.php'</script>";
      
    }
  }
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-admin</title>
    <link rel="stylesheet" href="styleadmin-log.css">

</head>

<body>
<div class="sec-login">

    <div class="seclogin-kiri">
    <h1>Halaman Login </h1>
    <h2> admin </h2>
    <form action="" method="post">
        <ul>
            <li> 
                <label for="username"> Username </label> <br>
                <input type="text" name="username" id="username" placeholder="username">
            </li>

            <li>
                <label for="password"> Password </label> <br>
                <input type="password" name="password" id="password" placeholder="password">
            </li>

            <li>
                <button type="submit" name="login" method="post"> Login </button> <!--key: login-->
            </li>
        </ul>
    </form>
    </div>

    <div class="seclogin-kanan">
    <img src="login-admin.png" style="width: 250px; height: 250px;">
    </div>

</div>
</body>
</html>