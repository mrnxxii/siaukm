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
if($_SESSION['user_role']!="Member"){
header("location:login.php");//jika bukan admin jangan lanjut
}

include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>

  <title>Data proposal</title>
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
    <a href="/poltekba/home.php" class="logo">
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
          <li><a href="update_akun.php"><i class="fa fa-circle-o"></i> Ubah Profile</a></li>
          <li><a href="ubah_pass.php"><i class="fa fa-circle-o"></i> Ubah Password</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>Berita</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="home.php"><i class="fa fa-circle-o"></i>View Berita</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>Proposal</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="input_proposal.php"><i class="fa fa-circle-o"></i>Input Proposal <e/a></li>
            <li><a href="data_proposal.php"><i class="fa fa-circle-o"></i> Data Proposal</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>LPJ</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="input_lpj.php"><i class="fa fa-circle-o"></i> Input LPJ <e/a></li>
            <li><a href="data_lpj.php"><i class="fa fa-circle-o"></i> Data LPJ</a></li>
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

    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">

	  <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">Form Tambah File</div>
              <div class="panel-body">
                <div class="col-md-12">

        <?php
                  $no_proposal = $_GET['no_proposal'];
                  $query = mysqli_query($koneksi, "SELECT * FROM proposal WHERE no_proposal ='$no_proposal'");
                  $data = mysqli_fetch_array($query); ?>

                  <div class="panel-body">

                    <form action="edit_proposal-proses.php" method="post">

                      <div class="form-group">
                          <label class="control-label">No Proposal:</label>
                          <input type="text" class="form-control" name="no_proposal" value="<?php echo $data['no_proposal'] ?>" disabled>
                          <input type="hidden" class="form-control" name="no_proposal" value="<?php echo $data['no_proposal'] ?>">
                      </div>
                      <div class="form-group">
                          <label class="control-label">Nama UKM:</label>
                          <input type="text" class="form-control" name="nama_ukm" value="<?php echo $data['nama_ukm'] ?>" required>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Nama Kegiatan:</label>
                          <input type="text" class="form-control" name="nama_kegiatan" value="<?php echo $data['nama_kegiatan'] ?>" required>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Ketua Panitia:</label>
                          <input type="text" class="form-control" name="ketua_panitia" value="<?php echo $data['ketua_panitia'] ?>" required>
                      </div>
                      <div class="form-group">
                          <label class="control-label">No. Telpon:</label>
                          <input type="text" class="form-control" name="no_telp" value="<?php echo $data['no_telp'] ?>" required>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Tanggal Kegiatan:</label>
                          <input type="date" class="form-control" name="tgl_kegiatan" value="<?php echo $data['tgl_kegiatan'] ?>" required>
                      </div>
                      <div class="form-group">
                          <label class="control-label">Status Proposal:</label><br/>
                          <div>
                            <label>
                              <input type="radio" name="status_proposal" value="ACC" <?php if($data['status_proposal'] == 'ACC') {echo "checked";} ?> disabled> ACC
							  <input type="hidden" name="status_proposal" value="ACC" <?php if($data['status_proposal'] == 'ACC') {echo "checked";} ?>>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="radio" name="status_proposal" value="Not ACC" <?php if($data['status_proposal'] == 'Not ACC') {echo "checked";} ?> disabled> Not ACC
							  <input type="hidden" name="status_proposal" value="Not ACC" <?php if($data['status_proposal'] == 'Not ACC') {echo "checked";} ?>>
                            </label>
                          </div>
                          <div>
                            <label>
                              <input type="radio" name="status_proposal" value="Not Verified" <?php if($data['status_proposal'] == 'Not Verified') {echo "checked";} ?> disabled> Not Verified
							  <input type="hidden" name="status_proposal" value="Not Verified" <?php if($data['status_proposal'] == 'Not Verified') {echo "checked";} ?>>
                            </label>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label">Komentar:</label>
						  <input type="text" class="form-control" name="komentar" value="<?php echo $data['komentar'] ?>" disabled>
                          <input type="hidden" class="form-control" name="komentar" value="<?php echo $data['komentar'] ?>">
                      </div>

                      <br>

                      <div class="form-group">
                          <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                      </div>

                    </form>
					</div>
					</div>
					</div>

                  </div>
      <!-- /.row -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- /.content -->
  <!-- /.content-wrapper -->

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
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
</body>
</html>
