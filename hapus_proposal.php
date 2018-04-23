<?php

include('koneksi.php');

//jika tombol submit benar di klik maka lanjut prosesnya
// membuat vairable dan datanya dari inputan pada file registrasi.php
    $no_proposal    = $_GET['no_proposal'];
    $query=mysqli_query($koneksi, "SELECT * FROM proposal WHERE no_proposal='$no_proposal'");
    $data=mysqli_fetch_array($query);
    $file = 'file/'.$data['input_proposal'];
    unlink("$file");

  //melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
  $input = mysqli_query($koneksi, "DELETE FROM proposal WHERE no_proposal='$no_proposal'");

  //jika query input sukses
  if($input){

    header('location: data_proposal.php');

  }else{

    echo "<script>alert('Gagal Menghapus')</script>";
    echo "<meta http-equiv='refresh' content='1 url=data_proposal.php'>";

  }
?>
