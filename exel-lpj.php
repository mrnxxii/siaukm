<?php

  // Fungsi header dengan mengirimkan raw data excel
  header("Content-type: application/vnd-ms-excel");

  // Mendefinisikan nama file ekspor "hasil-export.xls"
  header("Content-Disposition: attachment; filename=Data_LPJ.xls");

  // Tambahkan table
  include "data_lpjex.php";
?>
