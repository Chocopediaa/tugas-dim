<?php
// proses logout dengan menghapus semua variabel sesi dan mengakhiri sesi
session_start();
session_unset();
session_destroy();

// arahkan pengguna kembali ke halaman index.php
header("Location: index.php");
exit;
?>
