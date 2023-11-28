<?php
    require 'functions.php';
    $supplier = query("SELECT * FROM supplier");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Supplier</title>
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
    <h1><center>Daftar Supplier</center></h1>
    <div class="container mt-5">
    <div class="col-md-6 text-align: left"><a href="supplier_t.php" class="btn btn-success mb-3">Tambah Barang</a></div>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>No Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $i = 1;
        foreach ($supplier as $sp) { ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $sp['nama_supplier']; ?></td>
            <td><?= $sp['no_telp']; ?></td>
            <td><?= $sp['alamat']; ?></td>
            <td>
            <a href="supplier_e.php?id=<?= $sp['id_supplier']; ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="supplier_d.php?id=<?= $sp['id_supplier']; ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>

        <?php 
        $i++;
    }?>
    </table>
</body>
</html>