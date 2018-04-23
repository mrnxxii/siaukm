<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <link href="../siau/css/bootstrap.min.css" rel="stylesheet">
    <link href="../siau/css/stylesheet.css" rel="stylesheet">
    <link href="../siau/css/style.css" rel="stylesheet">
  </head>

  <body class="bg">
 <div class="login-container">
   <div align="center"><img width=150 height=150 src='css/poltekba.png' /></div>
        <div class="login-header bordered">
            <h8>USER LOGIN</h8>
        </div>
        <hr>
        <form action="../siau/login-proses.php" method="post">
            <div class="login-field">
                <label>Nama User</label>
                <input type="text" name="nama" id="nama" placeholder="Nama User">
                <i class="icon-user"></i>
            </div>
            <div class="login-field">
                <label>Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
                <i class="icon-lock"></i>
            </div>
            <div class="login-button clearfix">
              <div class="row">
                <button type="submit" class="btn btn-block btn-flat btn-custom-red" name="login">Login</button>
            </div>
        </form>
    </div>

    <script src="../siau/js/jquery.min.js"></script>
    <script src="../siau/js/bootstrap.min.js"></script>
  </body>
</html>
