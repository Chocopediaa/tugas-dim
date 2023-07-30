<?php
// konfigurasi koneksi database
$host = "localhost";
$user = "root";
$pass = "ramadhan";
$db = "toko";

// membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// fungsi untuk menghindari SQL injection
function anti_injection($data){
  global $conn;
  $filter = mysqli_real_escape_string($conn, stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

// mengecek koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>
