<?php
    require 'functions.php';
    $transaksi = query("SELECT * FROM transaksi");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="data_barang.php">Data Barang</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="pembayaran.php">Pembayaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pembeli.php">Pembeli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="supplier.php">Supplier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.php">Transaksi</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1><center>Riwayat Transaksi</center></h1>
    <div class="container mt-5">
    <div class="col-md-6 text-align: left"><a href="transaksi_t.php" class="btn btn-success mb-3">Tambahkan Transaksi</a></div>
    <table class="table">
        <tr>
            <th>No</th>
            <th>ID Barang</th>
            <th>ID Pembeli</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Stock</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $i = 1;
        foreach ($transaksi as $ts) { ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $ts['id_barang']; ?></td>
            <td><?= $ts['id_pembeli']; ?></td>
            <td><?= $ts['tanggal']; ?></td>
            <td><?= $ts['keterangan']; ?></td>
            <td><?= $ts['stock']; ?></td>
            <td>
            <a href="transaksi_e.php?id=<?= $ts['id_transakasi']; ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="transaksi_d.php?id=<?= $ts['id_transakasi']; ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>

        <?php 
        $i++;
    }?>
    </table>
</body>
</html>