<?php
session_start();

include_once "sesi_karyawan.php";

$modul=(isset($_GET['m']))?$_GET['m']:"awal"; //m itu dari arahan prologin, di kaish modul kalau berhasil login
$jawal="Login Karyawan || SI Karyawan";
switch($modul){
    case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break; //kenapa mausk? karena di prologin udah dikasih kunci "awal"
    case 'karyawan': $aktif="Karyawan"; $judul="Modul Karyawan $jawal"; include "modul/karyawan/index.php"; break;
    
   
}

?>
