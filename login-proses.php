<?php
session_start();

include "koneksi.php";

if(isset($_POST["login"])){
  $nama    = $_POST['nama'];
  $password = md5($_POST['password']);
  $login    = $_POST['login'];
  $query = mysqli_query($koneksi,"SELECT * FROM user WHERE nama = '$nama' AND password = '$password'");

  if(mysqli_num_rows($query)>0) {
           $data = mysqli_fetch_array($query);
           $_SESSION["user_id"]       = $data["id"];
           $_SESSION["user_nama"]     = $data["nama"];
           $_SESSION["user_email"]    = $data["email"];
           $_SESSION["user_no_telp"]    = $data["no_telp"];
           $_SESSION["user_password"] = $data["password"];
           $_SESSION["user_role"]     = $data["role"];
           $_SESSION['last_activity'] = time();
           if($data["role"]=="WADIR III"){
           header("location:homead.php");
           }
           if($data["role"]=="KA.BAKPK"){
           header("location:homead.php");
           }
           if($data["role"]=="KA.SUBBAK"){
           header("location:homead.php");
           }
           if($data["role"]=="Admin"){
           header("location:homead.php");
           }
           if($data["role"]=="Member"){
           header("location:home.php");
           }
         }else{
          echo "<script>alert('Data anda Tidak Benar')</script>";
          echo "<meta http-equiv='refresh' content='1 url=login.php'>";
         }
      }
?>
