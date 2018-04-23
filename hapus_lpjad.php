<?php

include('koneksi.php');

//jika tombol submit benar di klik maka lanjut prosesnya
// membuat vairable dan datanya dari inputan pada file registrasi.php
    $no_lpj    = $_GET['no_lpj'];
    $query=mysqli_query($koneksi, "SELECT * FROM lpj WHERE no_lpj='$no_lpj'");
    $data=mysqli_fetch_array($query);
    $file = 'file/'.$data['input_lpj'];
    unlink("$file");

  //melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
  $input = mysqli_query($koneksi, "DELETE FROM lpj WHERE no_lpj='$no_lpj'");

  //jika query input sukses
  if($input){

    header('location: data_lpjad.php');

  }else{

    echo "<script>alert('Gagal Menghapus')</script>";
    echo "<meta http-equiv='refresh' content='1 url=data_lpjad.php'>";

  }
?>
