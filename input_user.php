<?php
session_start();

if (isset($_SESSION['last_activity']) && (time()-$_SESSION['last_activity']>1800)) {
  session_unset();
  session_destroy();
}

//cek apakah user sudah login
if(!isset($_SESSION['user_nama'])){
header("location:login.php");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['user_role']!="Admin" && $_SESSION['user_role']!="KA.SUBBAK" && $_SESSION['user_role']!="KA.BAKPK" && $_SESSION['user_role']!="WADIR III") {
header("location:login.php");
}

include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Input User</title>
  <link rel="stylesheet" href="../siau/css/bootstrap.min.css">
  <link rel="stylesheet" href="../siau/css/font-awesome.min.css">
  <link rel="stylesheet" href="../siau/css/ionicons.min.css">
  <link rel="stylesheet" href="../siau/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../siau/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="../siau/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition skin-red-light sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../poltekba/homead.php" class="logo">
      <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b><img width=40 height=40 src='css/poltekba.png'/> Home </b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account: style can be found in dropdown.less -->

          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <span>Akun</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
          <li><a href="update_akunad.php"><i class="fa fa-circle-o"></i> Ubah Profile</a></li>
            <li><a href="ubah_passad.php"><i class="fa fa-circle-o"></i> Ubah Password</a></li>
            <li><a href="data_user.php"><i class="fa fa-circle-o"></i> Data Akun</a></li>
            <li><a href="input_user.php"><i class="fa fa-circle-o"></i> Registrasi Akun</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>Berita</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="input_berita.php"><i class="fa fa-circle-o"></i> Input Berita <e/a></li>
            <li><a href="data_berita.php"><i class="fa fa-circle-o"></i> Data Berita</a></li>
            <li><a href="homead.php"><i class="fa fa-circle-o"></i> View Berita</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>Proposal</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_proposalad.php"><i class="fa fa-circle-o"></i> Data Proposal</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>LPJ</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_lpjad.php"><i class="fa fa-circle-o"></i> Data LPJ</a></li>
          </ul>
        </li>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <li class="treeview">
          <a href="logout.php">
            <span>Logout</span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">


  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Registrasi Akun</div>
        <div class="panel-body">
          <div class="col-md-12">
            <form action="input_user_proses.php" enctype="multipart/form-data" role="form" method="POST">

              <div class="form-group">
                  <label class="control-label">Nama:</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama" required>
              </div>
              <div class="form-group">
                  <label class="control-label">Email:</label>
                  <input type="text" class="form-control" name="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                  <label class="control-label">No. Telpon:</label>
                  <input type="text" class="form-control" name="no_telp" placeholder="ex: 08xxxxxxx" required>
              </div>
              <div class="form-group">
                   <label class="control-label">Password:</label>
                   <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <div class="form-group">
                   <label class="control-label">Konfirm Password:</label>
                   <input type="password" class="form-control" name="password2" placeholder="Konfirm Password" maxlength="16">
              </div>
              <div class="form-group">
                  <label class="control-label">Kategori:</label>
              <div>
                   <label>
                   <input type="radio" name="role" value="Admin"> Admin
                   </label>
              </div>
              <div>
                   <label>
                   <input type="radio" name="role" value="KA.SUBBAK"> KA.SUBBAK
                   </label>
              </div>
              <div>
                   <label>
                   <input type="radio" name="role" value="KA.BAKPK"> KA.BAKPK
                   </label>
              </div>
              <div>
                   <label>
                   <input type="radio" name="role" value="WADIR III"> WADIR III
                   </label>
              </div>
              <div>
                   <label>
                   <input type="radio" name="role" value="Member"> Member
                   </label>
              </div>
              <br>

              					<div class="form-group">
              							<input type="submit" name="submit" class="btn btn-primary" value="Submit">
              					</div>
          </form>
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- /.row -->

</section>
    <!-- /.content -->
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1.1
    </div>
    <strong>2017 | @Politeknik Negeri Balikpapan</a>.</strong>
  </footer>
</div>
<script src="../siau/js/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<script src="../siau/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="../siau/plugins/iCheck/icheck.min.js"></script>
<script src="../siau/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../siau/plugins/fastclick/fastclick.js"></script>
<script src="../siau/js/app.min.js"></script>
<script src="../siau/js/demo.js"></script>
<script src="../siau/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../siau/plugins/datatables/dataTables.bootstrap.min.js"></script>
</body>
</html>
