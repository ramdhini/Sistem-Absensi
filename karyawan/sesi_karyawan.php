<?php 
if(empty($_SESSION['idsi']) AND empty($_SESSION['idsi'])){
	header('location:login-peserta.php');
}
 ?>


<!--buat mereka kalau belum login gabisa kemana mana, gabisa buka yang lain, 
walau lewat url di atas tetep gabisa karena harue melewati login dan kesimpan di session--->

