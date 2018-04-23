<?php

$host = "localhost";
$user = "root";
$pass = "";

$dbname = "siau";

$koneksi=new mysqli($host,$user,$pass,$dbname);
if (mysqli_connect_error()) {
   trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR);
 }

?>
