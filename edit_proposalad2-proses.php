<?php
//mulai proses tambah data

//cek dahulu, jika tombol submitdi klik
if(isset($_POST['submit'])){

	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');

	//jika tombol submit benar di klik maka lanjut prosesnya
  // membuat vairable dan datanya dari inputan pada file registrasi.php
      $no_proposal         = $_POST['no_proposal'];
      $nama_ukm            = $_POST['nama_ukm'];
      $nama_kegiatan       = $_POST['nama_kegiatan'];
      $ketua_panitia       = $_POST['ketua_panitia'];
      $no_telp             = $_POST['no_telp'];
      $tgl_kegiatan        = $_POST['tgl_kegiatan'];
      $status_proposal2     = $_POST['status_proposal2'];


		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
		$input = mysqli_query($koneksi, "UPDATE proposal SET
        no_proposal='$no_proposal',
        nama_ukm='$nama_ukm',
        nama_kegiatan='$nama_kegiatan',
	      ketua_panitia='$ketua_panitia',
	      no_telp='$no_telp',
	      tgl_kegiatan='$tgl_kegiatan',
        status_proposal2='$status_proposal2'
        WHERE no_proposal='$no_proposal'");

		//jika query input sukses
    if($input){

      echo "<script>alert('Data Sudah Terganti')</script>";
      echo "<meta http-equiv='refresh' content='1 url=data_proposalad.php'>";

    }else{

      echo "<script>alert('Data Gagal Terganti')</script>";
      echo "<meta http-equiv='refresh' content='1 url=edit_proposalad2.php'>";

    }

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>
