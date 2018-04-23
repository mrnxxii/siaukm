<?php
session_start();

if (isset($_SESSION['last_activity']) && (time()-$_SESSION['last_activity']>1800)) {
  session_unset();
  session_destroy();
}

if(!isset($_SESSION['user_nama'])){
header("location:login.php");
}

if($_SESSION['user_role']!="Admin" && $_SESSION['user_role']!="KA.SUBBAK" && $_SESSION['user_role']!="KA.BAKPK" && $_SESSION['user_role']!="WADIR III") {
header("location:login.php");
}

include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Ubah Profil</title>
  <link rel="stylesheet" href="../siau/css/bootstrap.min.css">
  <link rel="stylesheet" href="../siau/css/font-awesome.min.css">
  <link rel="stylesheet" href="../siau/css/ionicons.min.css">
  <link rel="stylesheet" href="../siau/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../siau/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="../siau/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition skin-red-light sidebar-mini">

<div class="wrapper">

  <header class="main-header">

    <a href="/poltekba/homead.php" class="logo">
      <span class="logo-lg"><b><img width=40 height=40 src='css/poltekba.png'/> Home </b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">

    <section class="sidebar">

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

  </aside>

  <div class="content-wrapper">

    <section class="content">

      <form action="update_akunad-proses.php" method="post">


        <div class="reg">
<div class="page-container">

<div class="main-content">
<h1>Ubah Profil</h1>
  <br />


  <div class="panel panel-primary">
    <div class="panel-body">

      <form action="update_akunad_proes.php" method="post">

        <div class="form-group">
            <input type="hidden" class="form-control" name="id" value="<?php echo $_SESSION['user_id'] ?>">
        </div>

        <div class="form-group">
            <label class="control-label">Nama User:</label>
            <input type="text" class="form-control" name="nama"  value="<?php echo $_SESSION["user_nama"] ?>">
       </div>
        <div class="form-group">
            <label class="control-label">Email:</label>
            <input type="text" class="form-control" name="email"  value="<?php echo $_SESSION['user_email'] ?>">
        </div>
        <div class="form-group">
            <label class="control-label">No Telpon:</label>
            <input type="text" class="form-control" name="no_telp"  value="<?php echo $_SESSION['user_no_telp'] ?>">
        </div>
        <div class="form-group">
                    <label class="control-label">Kategori:</label>
                    <div>
                      <label>
                        <input type="radio" name="role" value="Admin"  <?php if($_SESSION['user_role']== 'Admin') {echo "checked";} ?>> Admin
                      </label>
                    </div>
                    <div>
                         <label>
                         <input type="radio" name="role" value="KA.SUBBAK" <?php if($_SESSION['user_role']== 'KA.SUBBAK') {echo "checked";} ?>> KA.SUBBAK
                         </label>
                    </div>
                    <div>
                         <label>
                         <input type="radio" name="role" value="KA.BAKPK" <?php if($_SESSION['user_role']== 'KA.BAKPK') {echo "checked";} ?>> KA.BAKPK
                         </label>
                    </div>
                    <div>
                         <label>
                         <input type="radio" name="role" value="WADIR III"<?php if($_SESSION['user_role']== 'WADIR III') {echo "checked";} ?>> WADIR III
                         </label>
                    </div>

                    <div>
                      <label>
                        <input type="radio" name="role" value="Member" <?php if($_SESSION['user_role']== 'Member') {echo "checked";} ?>> Member
                      </label>
                    </div>
                </div>
        <br>

        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        </div>

      </form>

    </section>

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
