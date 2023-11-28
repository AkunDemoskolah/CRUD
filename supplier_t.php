<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_supplier = $_POST['id_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $conn = koneksi();

    $query = "INSERT INTO supplier (id_supplier, nama_supplier, no_telp, alamat) VALUES ('$id_supplier', '$nama_supplier', '$no_telp', '$alamat')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location: supplier.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Supplier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1><center>Tambah Barang</center></h1>
    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label for="id_supplier">ID Supplier:</label>
                <input type="text" class="form-control" id="id_supplier" name="id_supplier" required>
            </div>
            <div class="form-group">
                <label for="nama_supplier">Nama Supplier:</label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
            </div>
            <div class="form-group">
                <label for="no_telp">No Telepon:</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="supplier.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>