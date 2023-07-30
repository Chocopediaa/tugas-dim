<?php
// include the Barang.php file
include "home.php";

// check if the form is submitted
if (isset($_POST['submit'])) {
  // get the input values from the form
  $id_barang = $_POST['id_barang'];
  $nama_barang = $_POST['nama_barang'];
  $keterangan = $_POST['keterangan'];
  $satuan = $_POST['satuan'];
  $id_pengguna = $_POST['id_pengguna'];
  $id_supplier = $_POST['id_supplier'];

  // create a new Barang object with the input values
  $barang = new Barang($id_barang, $nama_barang, $keterangan, $satuan, $id_pengguna, $id_supplier);

  // insert the data into the database using the insert_data method
  if ($barang->insert_data($conn)) {
    // set a success message for the modal
    $message = "Data berhasil ditambahkan.";
  } else {
    // set an error message for the modal
    $message = "Data gagal ditambahkan.";
  }
}
?>

<html>
<head>
  <!-- include Bootstrap CSS and JS files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h1>Tambah Data Barang</h1>
  <!-- create a form for adding new data -->
  <form action="tambah_barang.php" method="post">
    <div class="form-group">
      <label for="id_barang">ID Barang</label>
      <input type="text" class="form-control" id="id_barang" name="id_barang" required>
    </div>
    <div class="form-group">
      <label for="nama_barang">Nama Barang</label>
      <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
    </div>
    <div class="form-group">
      <label for="keterangan">Keterangan</label>
      <input type="text" class="form-control" id="keterangan" name="keterangan" required>
    </div>
    <div class="form-group">
      <label for="satuan">Satuan</label>
      <input type="text" class="form-control" id="satuan" name="satuan" required>
    </div>
    <div class="form-group">
      <label for="id_pengguna">ID Pengguna</label>
      <input type="text" class="form-control" id="id_pengguna" name="id_pengguna" required>
    </div>
    <div class="form-group">
      <label for="id_supplier">ID Supplier</label>
      <input type="text" class="form-control" id="id_supplier" name="id_supplier" required>
    </div>
    <!-- create a button for submitting the data -->
    <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
  </form>

  <!-- create a modal for showing the result -->
  <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- create a title for the modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="resultModalLabel">Hasil Penambahan Data</h5>
          <!-- create a close button for the modal -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <!-- create a body for the modal -->
        <div class="modal-body">
          <?php
          // display the message from the insertion result
          if (isset($message)) {
            echo $message;
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- add a script to show the modal when the form is submitted -->
  <?php
  if (isset($_POST['submit'])) {
    echo "<script>$('#resultModal').modal('show');</script>";
  }
  ?>
</div>
</body>
</html>
