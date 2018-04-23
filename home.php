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

  <title>HOME</title>
  <link rel="stylesheet" href="../siau/css/bootstrap.min.css">
  <link rel="stylesheet" href="../siau/css/font-awesome.min.css">
  <link rel="stylesheet" href="../siau/css/ionicons.min.css">
  <link rel="stylesheet" href="../siau/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../siau/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="../siau/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
            <li><a href="home.php"><i class="fa fa-circle-o"></i>View Berita </a></li>

          </ul>
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome to Member
      </h1>
    </section>
    <section class="content-header">

      <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table datatable">
              <theadss
              <tr>
                <th>Semua Berita</th>
              </tr>
              </thead>
              <tbody>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tgl_berita DESC") or die (mysqli_error());
                while($data = mysqli_fetch_array($query)): ?>
                      <tr>
                          <th><a href="berita.php?berita=<?php echo $data['judul_berita'];?>"><?php echo $data['judul_berita'];?></a></th>
                      </tr>
                      <tr>
                          <td><?php echo $data['tgl_berita'];?><td>
                      </tr>

                      <tr><td></td></tr>

                  <?php
                  endwhile;
                  ?>
              </tbody>
            </table>
          </div>
          </from>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
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
</body>
</html>
