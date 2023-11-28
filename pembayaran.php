<?php
    require 'functions.php';
    $pembayaran = query("SELECT * FROM pembayaran");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Pembayaran</title>
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
    <h1><center>Daftar Pembayaran</center></h1>
    <div class="container mt-5">
    <div class="col-md-6 text-align: left"><a href="tambah_p.php" class="btn btn-success mb-3">Tambah Pembayaran</a></div>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Tanggal Bayar</th>
            <th>Total Bayar</th>
            <th>ID Transaksi</th>
        </tr>
        <?php 
        $i = 1;
        foreach ($pembayaran as $p) { ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $p['tgl_bayar']; ?></td>
            <td><?= $p['total_bayar']; ?></td>
            <td><?= $p['id_transaksi']; ?></td>
            <td>
            <a href="edit_p.php?id=<?= $p['id_pembayaran']; ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete_P.php?id=<?= $p['id_pembayaran']; ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>

        <?php 
        $i++;
    }?>
    </table>
</body>
</html>