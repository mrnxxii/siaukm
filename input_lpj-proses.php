<?php

if(isset($_POST['tambah'])) {

  include('koneksi.php');

  $carikode = mysqli_query($koneksi, "SELECT no_lpj FROM lpj") or die (mysqli_error());
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
   $kode_otomatis = "LP".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "LP001";
  }

  //jika tombol submit benar di klik maka lanjut prosesnya
  // membuat vairable dan datanya dari inputan pada file input_lpj.php
  $no_lpj              = $kode_otomatis;
  $nama_ukm            = $_POST['nama_ukm'];
  $nama_kegiatan       = $_POST['nama_kegiatan'];
  $ketua_panitia       = $_POST['ketua_panitia'];
  $no_telp             = $_POST['no_telp'];
  $tgl_kegiatan        = $_POST['tgl_kegiatan'];
  $lokasi_file         = $_FILES['input_lpj']['tmp_name'];
  $nama_file           = $_FILES['input_lpj']['name'];
  $status_lpj            = $_POST['status_lpj'];
  $status_lpj2            = $_POST['status_lpj2'];
  $status_lpj3            = $_POST['status_lpj3'];
  $status_lpj4            = $_POST['status_lpj4'];
  $komentar              = $_POST['komentar'];
        $folder = "file/$nama_file";

      		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
      		$input = mysqli_query($koneksi, "INSERT INTO lpj
            VALUES(
      	      '$no_lpj',
              NULL,
      	      '$nama_ukm',
      	      '$nama_kegiatan',
      	      '$ketua_panitia',
      	      '$no_telp',
      	      '$tgl_kegiatan',
      	      '$nama_file',
              '$status_lpj',
              '$status_lpj2',
              '$status_lpj3',
              '$status_lpj4',
            '$komentar')");

      		//jika query input sukses
      		if($input){

            echo "<script>alert('Kegiatan Berhasil Di Tambah')</script>";
            echo "<meta http-equiv='refresh' content='1 url=data_lpj.php'>";
            move_uploaded_file ($lokasi_file,"$folder");

          }else{

            echo "<script>alert('Kegiatan Gagal Di Tambah')</script>";
            echo "<meta http-equiv='refresh' content='1 url=input_lpj.php'>";
            move_uploaded_file ($lokasi_file,"$folder");
          }

      }else{	//jika tidak terdeteksi tombol tambah di klik

      	//redirect atau dikembalikan ke halaman tambah
      	echo '<script>window.history.back()</script>';

      }


?>
