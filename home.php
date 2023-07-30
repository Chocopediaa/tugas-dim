<?php
// memanggil file config.php
require_once "config.php";
session_start();

// ambil data pengguna dari database berdasarkan id pengguna
// $id_pengguna = $_SESSION["idpengguna"]; // contoh id pengguna
$data_pengguna = $_SESSION;
$sql = "SELECT NamaAkses FROM hakakses WHERE IdAkses = " . $data_pengguna['IdAkses'];
$result = $conn->query($sql);
$nama_akses = $result->fetch_assoc();
// $sql = "SELECT * FROM pengguna WHERE IdPengguna = $id_pengguna";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//   $data_pengguna = $result->fetch_assoc();
// } else {
//   echo "Data pengguna tidak ditemukan";
// }

// ambil data menu dari array asosiatif
$menu = array(
  "barang" => "Barang",
  "pembelian" => "Pembelian",
  "penjualan" => "Penjualan",
  "supplier" => "Supplier",
  "pelanggan" => "Pelanggan",
  "pengaturan" => "Pengaturan",
  "logout"  => "Keluar"
);

// ambil data halaman dari parameter GET
$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : "";

// fungsi untuk menampilkan halaman barang
function tampil_barang($conn) {
  // ambil data barang dari database
  $sql = "SELECT * FROM barang";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // buat tabel barang
    echo "<div class='container'>";
    echo "<nav aria-label='breadcrumb'>";
    echo "<ol class='breadcrumb'>";
    echo "<li class='breadcrumb-item'><a href='home.php'>Home</a></li>";
    echo "<li class='breadcrumb-item active' aria-current='page'>Barang</li>";
    echo "</ol>";
    echo "</nav>";
    echo "<a href='tambah_barang.php' class='btn btn-primary'>Tambah Data Barang</a>";
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>ID Barang</th>";
    echo "<th scope='col'>Nama Barang</th>";
    echo "<th scope='col'>Keterangan</th>";
    echo "<th scope='col'>Satuan</th>";
    echo "<th scope='col'>Id Pengguna</th>";
    echo "<th scope='col'>Id Supplier</th>";
    echo "<th scope='col'>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    // tampilkan data barang per baris
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['IdBarang'] . "</td>";
      echo "<td>" . $row['NamaBarang'] . "</td>";
      echo "<td>" . $row['Keterangan'] . "</td>";
      echo "<td>" . $row['Satuan'] . "</td>";
      echo "<td>" . $row['IdPengguna'] . "</td>";
      echo "<td>" . $row['IdSupplier'] . "</td>";
      echo "<td><a href='edit_barang.php?id=" . $row['IdBarang'] . "' class='btn btn-warning'>Edit</a><a href='hapus_barang.php?id=" . $row['IdBarang'] . "' class='btn btn-danger'>Hapus</a></td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
  } else {
    // tampilkan pesan jika tidak ada data barang
    echo "<p>Tidak ada data barang.</p>";
  }
}

function tampil_pembelian($conn) {
  // ambil data Pembelian dari database
  $sql = "select IdPembelian, JumlahPembelian, HargaBeli, NamaDepan, NamaSupplier from pembelian join pengguna on pembelian.IdPengguna = pengguna.IdPengguna join supplier on pembelian.IdSupplier = Supplier.IdSupplier";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // buat tabel Pembelian
    echo "<div class='container'>";
    echo "<nav aria-label='breadcrumb'>";
    echo "<ol class='breadcrumb'>";
    echo "<li class='breadcrumb-item'><a href='home.php'>Home</a></li>";
    echo "<li class='breadcrumb-item active' aria-current='page'>Pembelian</li>";
    echo "</ol>";
    echo "</nav>";
    echo "<a href='tambah_barang.php' class='btn btn-primary'>Tambah Data Pembelian</a>";
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>ID Pembelian</th>";
    echo "<th scope='col'>Jumlah Pembelian</th>";
    echo "<th scope='col'>Harga Beli</th>";
    echo "<th scope='col'>Nama Depan Pengguna</th>";
    echo "<th scope='col'>Supplier</th>";
    echo "<th scope='col'>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    // tampilkan data Pembelian per baris
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['IdPembelian'] . "</td>";
      echo "<td>" . $row['JumlahPembelian'] . "</td>";
      echo "<td>" . $row['HargaBeli'] . "</td>";
      echo "<td>" . $row['NamaDepan'] . "</td>";
      echo "<td>" . $row['NamaSupplier'] . "</td>";
      echo "<td><a href='edit_Pembelian.php?id=" . $row['IdPembelian'] . "' class='btn btn-warning'>Edit</a><a href='hapus_Pembelian.php?id=" . $row['IdPembelian'] . "' class='btn btn-danger'>Hapus</a></td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
  } else {
    // tampilkan pesan jika tidak ada data barang
    echo "<p>Tidak ada data barang.</p>";
  }
}

function tampil_penjualan($conn) {
  // ambil data Penjualan dari database
  $sql = "select IdPenjualan, JumlahPenjualan, HargaJual, pengguna.NamaDepan, pelanggan.NamaPelanggan from penjualan join pengguna on penjualan.idpengguna = pengguna.idpengguna join pelanggan on penjualan.idpelanggan = pelanggan.idpelanggan";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // buat tabel Penjualan
    echo "<div class='container'>";
    echo "<nav aria-label='breadcrumb'>";
    echo "<ol class='breadcrumb'>";
    echo "<li class='breadcrumb-item'><a href='home.php'>Home</a></li>";
    echo "<li class='breadcrumb-item active' aria-current='page'>Penjualan</li>";
    echo "</ol>";
    echo "</nav>";
    echo "<a href='tambah_barang.php' class='btn btn-primary'>Tambah Data Penjualan</a>";
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>ID Penjualan</th>";
    echo "<th scope='col'>Jumlah Penjualan</th>";
    echo "<th scope='col'>Harga Beli</th>";
    echo "<th scope='col'>Nama Depan Pengguna</th>";
    echo "<th scope='col'>Supplier</th>";
    echo "<th scope='col'>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    // tampilkan data Penjualan per baris
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['IdPenjualan'] . "</td>";
      echo "<td>" . $row['JumlahPenjualan'] . "</td>";
      echo "<td>" . $row['HargaJual'] . "</td>";
      echo "<td>" . $row['NamaDepan'] . "</td>";
      echo "<td>" . $row['NamaPelanggan'] . "</td>";
      echo "<td><a href='edit_Penjualan.php?id=" . $row['IdPenjualan'] . "' class='btn btn-warning'>Edit</a><a href='hapus_Penjualan.php?id=" . $row['IdPenjualan'] . "' class='btn btn-danger'>Hapus</a></td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
  } else {
    // tampilkan pesan jika tidak ada data barang
    echo "<p>Tidak ada data barang.</p>";
  }
}

function tampil_supplier($conn) {
  // ambil data supplier dari database
  $sql = "SELECT * FROM supplier";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // buat tabel supplier
    echo "<div class='container'>";
    echo "<nav aria-label='breadcrumb'>";
    echo "<ol class='breadcrumb'>";
    echo "<li class='breadcrumb-item'><a href='home.php'>Home</a></li>";
    echo "<li class='breadcrumb-item active' aria-current='page'>Supplier</li>";
    echo "</ol>";
    echo "</nav>";
    echo "<a href='tambah_barang.php' class='btn btn-primary'>Tambah Data Barang</a>";
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>ID Supplier</th>";
    echo "<th scope='col'>Nama Supplier</th>";
    echo "<th scope='col'>Nomor Telepon</th>";
    echo "<th scope='col'>Alamat</th>";
    echo "<th scope='col'>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    // tampilkan data supplier per baris
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['IdSupplier'] . "</td>";
      echo "<td>" . $row['NamaSupplier'] . "</td>";
      echo "<td>" . $row['NoTelp'] . "</td>";
      echo "<td>" . $row['Alamat'] . "</td>";
      echo "<td><a href='edit_supplier.php?id=" . $row['IdSupplier'] . "' class='btn btn-warning'>Edit</a><a href='hapus_supplier.php?id=" . $row['IdSupplier'] . "' class='btn btn-danger'>Hapus</a></td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
  } else {
    // tampilkan pesan jika tidak ada data barang
    echo "<p>Tidak ada data barang.</p>";
  }
}

function tampil_pelanggan($conn) {
  // ambil data pelanggan dari database
  $sql = "SELECT * FROM pelanggan";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // buat tabel pelanggan
    echo "<div class='container'>";
    echo "<nav aria-label='breadcrumb'>";
    echo "<ol class='breadcrumb'>";
    echo "<li class='breadcrumb-item'><a href='home.php'>Home</a></li>";
    echo "<li class='breadcrumb-item active' aria-current='page'>Pelanggan</li>";
    echo "</ol>";
    echo "</nav>";
    echo "<a href='tambah_barang.php' class='btn btn-primary'>Tambah Data Barang</a>";
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>ID pelanggan</th>";
    echo "<th scope='col'>Nama pelanggan</th>";
    echo "<th scope='col'>Nomor Telepon</th>";
    echo "<th scope='col'>Alamat</th>";
    echo "<th scope='col'>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    // tampilkan data Pelanggan per baris
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['IdPelanggan'] . "</td>";
      echo "<td>" . $row['NamaPelanggan'] . "</td>";
      echo "<td>" . $row['NoTelepon'] . "</td>";
      echo "<td>" . $row['Alamat'] . "</td>";
      echo "<td><a href='edit_Pelanggan.php?id=" . $row['IdPelanggan'] . "' class='btn btn-warning'>Edit</a><a href='hapus_Pelanggan.php?id=" . $row['IdPelanggan'] . "' class='btn btn-danger'>Hapus</a></td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
  } else {
    // tampilkan pesan jika tidak ada data barang
    echo "<p>Tidak ada data barang.</p>";
  }
}

function tampil_logout($conn) {
  // proses logout dengan menghapus semua variabel sesi dan mengakhiri sesi
  // session_start();
  session_unset();
  session_destroy();

  // arahkan pengguna kembali ke halaman index.php
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Aplikasi Toko Sederhana</title>
  <!-- link ke bootstrap css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <!-- navbar dengan menu -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Aplikasi Toko Sederhana</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php
          // loop untuk menampilkan menu
          foreach ($menu as $key => $value) {
            // cek apakah menu aktif atau tidak
            if ($halaman == $key) {
              // jika aktif, tambahkan class active
              echo "<li class='nav-item active'>";
            } else {
              // jika tidak aktif, tidak perlu tambah class
              echo "<li class='nav-item'>";
            }
            // tampilkan link menu dengan parameter halaman
            echo "<a class='nav-link' href='home.php?halaman=$key'>$value</a>";
            echo "</li>";
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- jumbotron dengan informasi data pengguna -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Selamat datang, <?php echo $data_pengguna['NamaDepan']; echo " "; echo $data_pengguna['NamaBelakang'] ?></h1>
      <p class="lead">Anda login sebagai <?php echo $nama_akses['NamaAkses']; ?>.</p>
    </div>
  </div>

  <!-- konten halaman yang berubah-ubah sesuai menu yang dipilih -->
  <div class="container">
    <?php
    // cek apakah halaman ada atau tidak
    if ($halaman == "") {
      // jika tidak ada, tampilkan pesan selamat datang
      echo "<p>Selamat datang di aplikasi toko sederhana. Silakan pilih menu di atas untuk melihat data-data yang ada.</p>";
    } else {
      // jika ada, cek apakah halaman sesuai dengan menu yang ada
      if (array_key_exists($halaman, $menu)) {
        // jika sesuai, panggil fungsi untuk menampilkan halaman tersebut
        $fungsi = "tampil_" . $halaman;
        $fungsi($conn);
      } else {
        // jika tidak sesuai, tampilkan pesan error
        echo "<p>Halaman yang Anda minta tidak ditemukan.</p>";
      }
    }
    ?>
  </div>

  <!-- link ke bootstrap js dan jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
