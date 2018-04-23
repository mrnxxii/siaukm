<?php

include('koneksi.php');

//jika tombol submit benar di klik maka lanjut prosesnya
// membuat vairable dan datanya dari inputan pada file registrasi.php
    $id    = $_GET['id'];

  //melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
  $input = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");

  //jika query input sukses
  if($input){

    header('location: data_user.php');

  }else{

    echo "<script>alert('Gagal Menghapus')</script>";
    echo "<meta http-equiv='refresh' content='1 url=data_user.php'>";

  }
?>
