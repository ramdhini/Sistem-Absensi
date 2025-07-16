<?php

include_once "sesi_karyawan.php";//cek udh login belum	

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'title': default: include "modul/karyawan/title.php"; break; //diarahin dari awal.php
	case 'profil': include 'modul/karyawan/profil.php'; break;
	case 'index': include 'awal.php';
}
?>
