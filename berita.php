<?php
session_start();

if (isset($_SESSION['last_activity']) && (time()-$_SESSION['last_activity']>1800)) {
  session_unset();
  session_destroy();
}


if(!isset($_SESSION['user_nama'])){
header("location:../siau/login.php");
}


if($_SESSION['user_role']!="Member"){
header("location:../siau/login.php");
}

include "../siau/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="../siau/css/bootstrap.min.css">
  <link rel="stylesheet" href="../siau/css/font-awesome.min.css">
  <link rel="stylesheet" href="../siau/css/ionicons.min.css">
  <link rel="stylesheet" href="../siau/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../siau/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="../siau/css/skins/_all-skins.min.css">

  <title>HOME</title>

</head>
<body class="hold-transition skin-red-light sidebar-mini">

<div class="wrapper">

  <header class="main-header">

    <a href="../siau/home.php" class="logo">

      <span class="logo-lg"><b><img width=40 height=40 src='../siau/css/poltekba.png'/> Home </b></span>
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
          <li><a href="../siau/update_akun.php"><i class="fa fa-circle-o"></i> Ubah Profile</a></li>
          <li><a href="../siau/ubah_pass.php"><i class="fa fa-circle-o"></i> Ubah Password</a></li>
          </ul>
        </li>
           <li class="treeview">
          <a href="#">
            <span>Berita</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../siau/home.php"><i class="fa fa-circle-o"></i>View Berita </a></li>

          </ul>
        <li class="treeview">
          <a href="#">
            <span>Proposal</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../siau/input_proposal.php"><i class="fa fa-circle-o"></i>Input Proposal <e/a></li>
            <li><a href="../siau/data_proposal.php"><i class="fa fa-circle-o"></i> Data Proposal</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>LPJ</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../siau/input_lpj.php"><i class="fa fa-circle-o"></i> Input LPJ <e/a></li>
            <li><a href="../siau/data_lpj.php"><i class="fa fa-circle-o"></i> Data LPJ</a></li>
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
          <a href="../siau/logout.php">
            <span>Logout</span>
          </a>
        </li>
    </section>

  </aside>

  <div class="content-wrapper">
    <section class="content">

      <?php
      $berita = $_GET['berita'];
      $query = mysqli_query($koneksi, "SELECT * FROM berita WHERE judul_berita='$berita'") or die (mysqli_error());
      $data = mysqli_fetch_array($query); ?>

      <div class="box">
        <div class="box-body">
          <div class="paragraphs">
          <img class="img-polaroid" src="berita/<?=$data['gambar'];?>" style="width:450px; height: 400px; float:left; margin-right:10px;"/>
          <div class="row">
          <p><a href="#" class="btn btn-inverse">Diposkan pada <?php echo $data['tgl_berita'];?></td></a> </p>
          <div class="content-heading"><h3><?php echo $data['judul_berita'];?></td></h3></div>
          <p style="text-align:justify;"><?php echo $data['isi_berita'];?></p>

          <div style="clear:both;"></div>
          </div>
          </div>
        </div>
      </div>




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
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
