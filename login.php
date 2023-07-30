<?php
// memanggil file config.php
require_once "config.php";

// proses login dengan memeriksa apakah input NamaPengguna dan Password sesuai dengan data yang ada di tabel pengguna
if (isset($_POST["NamaPengguna"]) && isset($_POST["Password"])) {
  // mengambil input NamaPengguna dan Password
  $NamaPengguna = anti_injection($_POST["NamaPengguna"]);
  $Password = anti_injection($_POST["Password"]);

  // membuat query untuk mencari data pengguna yang sesuai
  $sql = "SELECT * FROM pengguna WHERE NamaPengguna = '$NamaPengguna' AND Password = '$Password' limit 1";
  $result = mysqli_query($conn, $sql);

  // mengecek apakah query berhasil dan menghasilkan data
  if ($result && mysqli_num_rows($result) > 0) {
    // jika ya, maka ambil data pengguna dan simpan ke dalam variabel sesi
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION["IdPengguna"] = $row["IdPengguna"];
    $_SESSION["NamaDepan"] = $row["NamaDepan"];
    $_SESSION["NamaBelakang"] = $row["NamaBelakang"];
    $_SESSION["IdAkses"] = $row["IdAkses"];

    // arahkan pengguna ke halaman utama aplikasi
    header("Location: home.php");
    exit;
  } else {
    // jika tidak, maka arahkan pengguna kembali ke halaman index.php dengan pesan error
    header("Location: index.php?error=Nama Pengguna atau Password salah");
    exit;
  }
} else {
  // jika input NamaPengguna atau Password tidak ada, maka arahkan pengguna kembali ke halaman index.php dengan pesan error
  header("Location: index.php?error=Input tidak valid");
  exit;
}
?>
