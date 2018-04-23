<?php

if(isset($_POST['tambah'])) {

  include('koneksi.php');

  $carikode = mysqli_query($koneksi, "SELECT no_proposal FROM proposal") or die (mysqli_error());
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
   $kode_otomatis = "PR".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "PR001";
  }

  //jika tombol submit benar di klik maka lanjut prosesnya
  // membuat vairable dan datanya dari inputan pada file input_proposal.php
  $no_proposal              = $kode_otomatis;
  $nama_ukm            = $_POST['nama_ukm'];
  $nama_kegiatan       = $_POST['nama_kegiatan'];
  $ketua_panitia       = $_POST['ketua_panitia'];
  $no_telp             = $_POST['no_telp'];
  $tgl_kegiatan        = $_POST['tgl_kegiatan'];
  $lokasi_file         = $_FILES['input_proposal']['tmp_name'];
  $nama_file           = $_FILES['input_proposal']['name'];
  $status_proposal     = $_POST['status_proposal'];
  $status_proposal2     = $_POST['status_proposal2'];
  $status_proposal3     = $_POST['status_proposal3'];
  $status_proposal4     = $_POST['status_proposal4'];
  $komentar            = $_POST['komentar'];
        $folder = "file/$nama_file";

      		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
      		$input = mysqli_query($koneksi, "INSERT INTO proposal
            VALUES(
      	      '$no_proposal',
              NULL,
      	      '$nama_ukm',
      	      '$nama_kegiatan',
      	      '$ketua_panitia',
      	      '$no_telp',
      	      '$tgl_kegiatan',
      	      '$nama_file',
             '$status_proposal',
             '$status_proposal2',
             '$status_proposal3',
             '$status_proposal4',
            '$komentar')");

      		//jika query input sukses
      		if($input){

            echo "<script>alert('Kegiatan Berhasil Di Tambah')</script>";
            echo "<meta http-equiv='refresh' content='1 url=data_proposal.php'>";
            move_uploaded_file ($lokasi_file,"$folder");

          }else{

            echo "<script>alert('Kegiatan Gagal Di Tambah')</script>";
            echo "<meta http-equiv='refresh' content='1 url=input_proposal.php'>";
            move_uploaded_file ($lokasi_file,"$folder");
          }

      }else{	//jika tidak terdeteksi tombol tambah di klik

      	//redirect atau dikembalikan ke halaman tambah
      	echo '<script>window.history.back()</script>';

      }


?>
