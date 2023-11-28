<?php
require 'functions.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tgl_bayar = $_POST['tgl_bayar'];
        $total = $_POST['total_bayar'];
        $id_transaksi = $_POST['id_transaksi'];

        $conn   = koneksi();
        $query = "INSERT INTO pembayaran (tgl_bayar, total_bayar, id_transaksi) VALUES ('$tgl_bayar', '$total', '$id_transaksi')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('Location: pembayaran.php'); // Redirect setelah berhasil edit
            exit();
            } else {
            echo "Gagal menambah data.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1><center>Tambah Pembayaran</center></h1>
    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label for="tgl_bayar">Tanggal Pembayaran:</label>
                <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" required>
            </div>
            <div class="form-group">
                <label for="total_bayar">Total yang dibayar:</label>
                <input type="text" class="form-control" id="total_bayar" name="total_bayar" required>
            </div>
            <div class="form-group">
                <label for="id_transaksi">ID Transaksi:</label>
                <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="pembayaran.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>