<?php
//mulai proses tambah data

//cek dahulu, jika tombol submitdi klik
if(isset($_POST['submit'])){

	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');

	//jika tombol submit benar di klik maka lanjut prosesnya
  // membuat vairable dan datanya dari inputan pada file registrasi.php
      $id                  = $_POST['id'];
      $nama                = $_POST['nama'];
      $email               = $_POST['email'];
      $no_telp             = $_POST['no_telp'];
      $role                = $_POST['role'];


		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
		$input = mysqli_query($koneksi, "UPDATE user SET
        id='$id',
        nama='$nama',
        email='$email',
	      no_telp='$no_telp',
        role='$role'
        WHERE id='$id'");

		//jika query input sukses
    if($input){

      echo "<script>alert('Data Sudah Terganti')</script>";
      echo "<meta http-equiv='refresh' content='1 url=data_user.php'>";

    }else{

      echo "<script>alert('Data Gagal Terganti')</script>";
      echo "<meta http-equiv='refresh' content='1 url=edit_user.php'>";

    }

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>
