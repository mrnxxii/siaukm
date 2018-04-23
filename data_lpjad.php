<?php
session_start();

if (isset($_SESSION['last_activity']) && (time()-$_SESSION['last_activity']>1800)) {
  session_unset();
  session_destroy();
}

//cek apakah user sudah login
if(!isset($_SESSION['user_nama'])){
header("location:../siau/login.php");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['user_role']!="Admin" && $_SESSION['user_role']!="KA.SUBBAK" && $_SESSION['user_role']!="KA.BAKPK" && $_SESSION['user_role']!="WADIR III") {
header("location:../siau/login.php");
}

include "../siau/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>

  <title>Data LPJ Admin</title>
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

    <a href="../siau/homead.php" class="logo">

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
          <li><a href="../siau/update_akunad.php"><i class="fa fa-circle-o"></i> Ubah Profile</a></li>
          <li><a href="../siau/ubah_passad.php"><i class="fa fa-circle-o"></i> Ubah Password</a></li>
          <li><a href="../siau/data_user.php"><i class="fa fa-circle-o"></i> Data Akun</a></li>
          <li><a href="../siau/input_user.php"><i class="fa fa-circle-o"></i> Registrasi Akun</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>Berita</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../siau/input_berita.php"><i class="fa fa-circle-o"></i> Input Berita <e/a></li>
            <li><a href="../siau/data_berita.php"><i class="fa fa-circle-o"></i> Data Berita</a></li>
            <li><a href="../siau/homead.php"><i class="fa fa-circle-o"></i> View Berita</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>Proposal</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../siau/data_proposalad.php"><i class="fa fa-circle-o"></i> Data Proposal</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <span>LPJ</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="../siau/data_lpjad.php"><i class="fa fa-circle-o"></i> Data LPJ</a></li>
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

      <section class="content-header">
        <h1>
          Halaman Data LPJ
        </h1>
      </section>

      <section class="content">

        <div class="row">
        <div class="col-xs-12">

          <div class="box">

            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped datatable">
                <thead>
                <tr>
                  <th>NO LPJ</th>
                  <th>Tanggal Upload</th>
                  <th>Nama UKM</th>
                  <th>Nama Kegiatan</th>
                  <th>Ketua Panitia</th>
                  <th>No Telpon</th>
                  <th>Tanggal Kegiatan</th>
                  <th>Admin kemahasiswaan</th>
                  <th>KA. SUB BAK</th>
                  <th>KA. BAKPK</th>
                  <th>Wadir III</th>
                  <th>Komentar</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM lpj") or die (mysqli_error());
                  while($data = mysqli_fetch_array($query)): ?>
                        <tr>
                            <td><?php echo $data['no_lpj'];?></td>
                            <td><?php echo $data['tgl_upload'];?></td>
                            <td><?php echo $data['nama_ukm'];?></td>
                            <td><?php echo $data['nama_kegiatan'];?></td>
                            <td><?php echo $data['ketua_panitia'];?></td>
                            <td><?php echo $data['no_telp'];?></td>
                            <td><?php echo $data['tgl_kegiatan'];?></td>
                            <td><?php echo $data['status_lpj'];?></td>
                            <td><?php echo $data['status_lpj2'];?></td>
                            <td><?php echo $data['status_lpj3'];?></td>
                            <td><?php echo $data['status_lpj4'];?></td>
                            <td><?php echo $data['komentar'];?></td>

                            <td>
                              <a class="btn btn-xs btn-success" href="../siau/edit_lpjad.php?no_lpj=<?php echo $data['no_lpj']; ?>">ADMIN</a>
                              <a class="btn btn-xs btn-success" href="../siau/edit_lpjad2.php?no_lpj=<?php echo $data['no_lpj']; ?>">KA.SUBBAK</a>
                              <a class="btn btn-xs btn-success" href="../siau/edit_lpjad3.php?no_lpj=<?php echo $data['no_lpj']; ?>">KA.BAKPK</a>
                              <a class="btn btn-xs btn-success" href="../siau/edit_lpjad4.php?no_lpj=<?php echo $data['no_lpj']; ?>">WADIR III</a>
          										<a href="../siau/hapus_lpjad.php?no_lpj=<?php echo $data['no_lpj'];?>" onClick='return confirm("Apakah Ada yakin menghapus?")'><button class="btn btn-xs btn-danger">Hapus</button></a>
                              <a class="btn btn-xs btn-info" href="file/<?php echo $data['input_lpj']; ?>">Download</a>
                        </tr>
                    <?php
                    endwhile;
                    ?>
                </tbody>
              </table>
              <div class="form-group">
                 <a href="../siau/exel-lpj.php"><button class="btn btn-primary">Export Data ke Excel</button></a>
             </div>
            </div>
            </from>

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
    $("#example1").DataTable();
  });
</script>
</body>
</html>
