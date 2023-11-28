<?php
    require 'functions.php';

    // Pastikan ada parameter id yang dikirimkan
    if (!isset($_GET['id'])) {
        header('Location: data_barang.php'); // Redirect jika tidak ada id
        exit();
    }

    $id_barang = $_GET['id'];
    $barang = query("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

    // Proses form edit jika ada data yang dikirimkan
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $id_supplier = $_POST['id_supplier'];

        // Lakukan query untuk update data
        $query = "UPDATE barang SET 
                    nama_barang = '$nama_barang', 
                    harga = '$harga', 
                    stok = '$stok', 
                    id_supplier = '$id_supplier' 
                  WHERE id_barang = $id_barang";
        $conn   = koneksi();
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('Location: data_barang.php'); // Redirect setelah berhasil edit
            exit();
        } else {
            echo "Gagal mengedit data.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1><center>Edit Barang</center></h1>
    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang['nama_barang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?= $barang['harga']; ?>" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="text" class="form-control" id="stok" name="stok" value="<?= $barang['stok']; ?>" required>
            </div>
            <div class="form-group">
                <label for="id_supplier">ID Supplier:</label>
                <input type="text" class="form-control" id="id_supplier" name="id_supplier" value="<?= $barang['id_supplier']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
