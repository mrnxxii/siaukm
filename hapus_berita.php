<?php

include('koneksi.php');

//jika tombol submit benar di klik maka lanjut prosesnya
// membuat vairable dan datanya dari inputan pada file registrasi.php
    $id_berita    = $_GET['id_berita'];
    $query=mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita='$id_berita'");
    $data=mysqli_fetch_array($query);
    $file = 'berita/'.$data['gambar'];
    unlink("$file");

  //melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
  $input = mysqli_query($koneksi, "DELETE FROM berita WHERE id_berita='$id_berita'");

  //jika query input sukses
  if($input){

    header('location: data_berita.php');

  }else{

    echo "<script>alert('Gagal Menghapus')</script>";
    echo "<meta http-equiv='refresh' content='1 url=data_berita.php'>";

  }
?>
