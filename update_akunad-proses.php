<?php
//memanggil file koneksi.php
include "koneksi.php";
 //mengambil variabel id pada url dengan metode GET

// jika tombol simpan ditekan
if(isset($_POST['submit'])){

    // membuat variabel untuk menampung variabel $_POST
    $id              = $_POST['id'];
    $nama            = $_POST['nama'];
    $email           = $_POST['email'];
    $no_telp         = $_POST['no_telp'];


    //membuat query untuk update data
    $input = mysqli_query($koneksi, "UPDATE user SET
      nama='$nama',
      email='$email',
      no_telp='$no_telp'
      WHERE id = '$id'") or die(mysqli_error());

      if($input){

        echo "<script>alert('Data sudah Terganti, Silahkan Login Kembali')</script>";
        echo "<meta http-equiv='refresh' content='1 url=login.php'>";

    	}else{

        echo "<script>alert('Data gagal Terganti)</script>";
        echo "<meta http-equiv='refresh' content='1 url=update_akunad.php'>";

    	}
}

?>
