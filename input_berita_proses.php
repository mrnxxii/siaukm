<?php

if(isset($_POST['tambah'])) {

  include('koneksi.php');

  $carikode = mysqli_query($koneksi, "SELECT id_berita FROM berita") or die (mysqli_error());
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
   $kode_otomatis = "BT".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "BT001";
  }

  $id_berita           = $kode_otomatis;
  $judul_berita        = $_POST['judul_berita'];
  $isi_berita = addslashes($_POST['isi_berita']);
  $lokasi_file         = $_FILES['gambar']['tmp_name'];
  $nama_file           = $_FILES['gambar']['name'];
        $folder = "berita/$nama_file";

      		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
      		$input = mysqli_query($koneksi, "INSERT INTO berita
            VALUES(
      	      '$id_berita',
      	      '$judul_berita',
      	      '$isi_berita',
              NULL,
      	      '$nama_file')");

      		//jika query input sukses
      		if($input){

            echo "<script>alert('Kegiatan Berhasil Di Tambah')</script>";
            echo "<meta http-equiv='refresh' content='1 url=homead.php'>";
            move_uploaded_file ($lokasi_file,"$folder");

          }else{

            echo "<script>alert('Kegiatan Gagal Di Tambah')</script>";
            echo "<meta http-equiv='refresh' content='1 url=input_berita.php'>";
            move_uploaded_file ($lokasi_file,"$folder");
          }

      }else{	//jika tidak terdeteksi tombol tambah di klik

      	//redirect atau dikembalikan ke halaman tambah
      	echo '<script>window.history.back()</script>';

      }


?>
