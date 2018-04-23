<?php
session_start();
//memanggil file koneksi.php
include "koneksi.php";

 //mengambil variabel id pada url dengan metode GET

// jika tombol simpan ditekan
if(isset($_POST['submit'])){

    // membuat variabel untuk menampung variabel $_POST
    $id        = $_POST['id'];
    $password       = $_SESSION['user_password'];
    $passlama       = md5($_POST['passlama']);
    $passbaru       = md5($_POST['passbaru']);
  	$passkonf       = md5($_POST['passkonf']);
    if ($passbaru==$passkonf) {
      if($password== $passlama) {
        mysqli_query ($koneksi, "UPDATE user SET password = '$passbaru' WHERE id = '$id'");
        $_SESSION['user_password'] = $passbaru;

        echo "<script>alert('Password Terubah, Silahkan Login Kembali')</script>";
        echo "<meta http-equiv='refresh' content='1 url=logout.php'>";
      }else {
        echo "<script>alert('Password Lama salah')</script>";
        echo "<meta http-equiv='refresh' content='1 url=_ubah_pass.php'>";
      }
    }else {echo "<script>alert('Password yang Anda Masukan Tidak Sama');history.go(-1)</script>";}

}

?>
