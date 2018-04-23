<?php
//mulai proses tambah data

//cek dahulu, jika tombol submitdi klik
if(isset($_POST['submit'])){

	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');

	$carikode = mysqli_query($koneksi, "SELECT id FROM user") or die (mysqli_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);
  // jika $datakode
  if ($datakode) {
   // membuat variabel baru untuk mengambil kode barang mulai dari 1
   $nilaikode = substr($jumlah_data[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $jumlah_data + 1;
   // hasil untuk menambahkan kode
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
   // atau angka sebelum $kode
   $kode_otomatis = "US".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "US001";
  }

	//jika tombol submit benar di klik maka lanjut prosesnya
  // membuat vairable dan datanya dari inputan pada file registrasi.php
  $id               = $kode_otomatis;
  $nama             = $_POST['nama'];
  $email            = $_POST['email'];
	$no_telp          = $_POST['no_telp'];
  $password         = md5($_POST['password']);
	$password2        = md5($_POST['password2']);
  $role             = $_POST['role'];


	if ($password==$password2) {
		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
		$input = mysqli_query($koneksi, "INSERT INTO user
			VALUES(
	      '$id',
	      '$nama',
	      '$email',
	      '$no_telp',
				'$password',
	      '$role')");

			//jika query input sukses
			if($input){

				echo "<script>alert('User Berhasil Di Tambah')</script>";
				echo "<meta http-equiv='refresh' content='1 url=data_user.php'>";

			}else{

				echo "<script>alert('User Gagal Di Tambah')</script>";
				echo "<meta http-equiv='refresh' content='1 url=input_user.php'>";
      }
			}

	}else{	//jika tidak terdeteksi tombol tambah di klik

		//redirect atau dikembalikan ke halaman tambah
		echo '<script>window.history.back()</script>';

	}


?>
