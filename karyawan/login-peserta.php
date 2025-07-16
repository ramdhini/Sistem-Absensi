<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-peserta</title>
    <link rel="stylesheet" href="stylepeserta-log.css">

</head>

<body>
<div class="sec-login">

    <div class="seclogin-kiri">
    <h1>Halaman Login </h1>
    <h2> pegawai </h2>
    <form action="pro_login_karyawan.php" method="post">
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
                <button type="submit" name="login" method="post"> Login </button>
            </li>
        </ul>
    </form>
    </div>

    <div class="seclogin-kanan">
    <img src="../login-admin.png" style="width: 250px; height: 250px;">
    </div>

</div>
</body>
</html>