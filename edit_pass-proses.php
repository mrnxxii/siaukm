<?php
//memanggil file koneksi.php
include "koneksi.php";
 //mengambil variabel id pada url dengan metode GET

// jika tombol simpan ditekan
if(isset($_POST['submit'])){

    // membuat variabel untuk menampung variabel $_POST
    $id               = $_POST['id'];
    $password         = md5($_POST['password']);
  	$password2        = md5($_POST['password2']);
    if ($password==$password2) {

      $input = mysqli_query($koneksi, "UPDATE user SET
        password='$password'
        WHERE id = '$id'") or die(mysqli_error());

        if($input){
          echo "<script>alert('Password Sudah Terganti')</script>";
          header('location: data_user.php');

      	}else{
          echo "<script>alert('Password Gagal Terganti')</script>";
          header('location: data_user.php');

      	}

    }
   else {
     echo "<script>alert('Password yang Anda Masukan Tidak Sama');history.go(-1)</script>";}

    //membuat query untuk update data

}

?>
