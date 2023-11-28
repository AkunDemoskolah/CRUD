<?php
    require 'functions.php';
    $pembeli = query("SELECT * FROM pembeli");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pembeli</title>
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
    <h1><center>Daftar Pembeli</center></h1>
    <div class="container mt-5">
    <div class="col-md-6 text-align: left"><a href="pembeli_t.php" class="btn btn-success mb-3">Tambahkan</a></div>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Kelamin</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $i = 1;
        foreach ($pembeli as $pbl) { ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $pbl['nama_pembeli']; ?></td>
            <td><?= $pbl['jk']; ?></td>
            <td><?= $pbl['no_telp']; ?></td>
            <td><?= $pbl['alamat']; ?></td>
            <td>
            <a href="pembeli_e.php?id=<?= $pbl['id_pembeli']; ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="pembeli_d.php?id=<?= $pbl['id_pembeli']; ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>

        <?php 
        $i++;
    }?>
    </table>
</body>
</html>