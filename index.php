<?php
// memanggil file config.php
require_once "config.php";

// mengecek apakah ada sesi yang sudah aktif
session_start();
if (isset($_SESSION["idpengguna"])) {
  // jika ada, maka arahkan ke halaman utama aplikasi
  header("Location: home.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Aplikasi Toko</title>
  <!-- menggunakan template bootstrap yang style nya langsung diambil dari internet -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center">Login Aplikasi Toko</h1>
        <!-- form login dengan input NamaPengguna dan Password -->
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="NamaPengguna">Nama Pengguna</label>
            <input type="text" class="form-control" id="NamaPengguna" name="NamaPengguna" required>
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" required>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <!-- menampilkan pesan error jika ada -->
        <?php if (isset($_GET["error"])) { ?>
          <div class="alert alert-danger mt-3" role="alert">
            <?php echo $_GET["error"]; ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</body>
</html>
