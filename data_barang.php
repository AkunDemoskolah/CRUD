<?php
    require 'functions.php';
    $barang = query("SELECT * FROM barang");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="data_barang">Data Barang</a>
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
    <h1><center>Daftar Barang</center></h1>
    <div class="container mt-5">
    <div class="col-md-6 text-align: left"><a href="tambah.php" class="btn btn-success mb-3">Tambah Barang</a></div>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>ID Supplier</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $i = 1;
        foreach ($barang as $brg) { ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $brg['nama_barang']; ?></td>
            <td><?= $brg['harga']; ?></td>
            <td><?= $brg['stok']; ?></td>
            <td><?= $brg['id_supplier']; ?></td>
            <td>
            <a href="edit.php?id=<?= $brg['id_barang']; ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="delete.php?id=<?= $brg['id_barang']; ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>

        <?php 
        $i++;
    }?>
    </table>
</body>
</html>