<?php
    require 'functions.php';

    // Pastikan ada parameter id yang dikirimkan
    if (!isset($_GET['id'])) {
        header('Location: supplier.php'); // Redirect jika tidak ada id
        exit();
    }

    $id_supplier = $_GET['id'];
    $supplier = query("SELECT * FROM supplier WHERE id_supplier = $id_supplier")[0];

    // Proses form edit jika ada data yang dikirimkan
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_supplier = $_POST['nama_supplier'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];

        // Lakukan query untuk update data
        $query = "UPDATE supplier SET 
            nama_supplier = '$nama_supplier',
            no_telp = '$no_telp', 
            alamat = '$alamat'

          WHERE id_supplier = $id_supplier";
        $conn   = koneksi();
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('Location: supplier.php'); // Redirect setelah berhasil edit
            exit();
        } else {
            echo "Gagal mengedit data.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Pembayaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1><center>Edit Pembayaran</center></h1>
    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label for="nama_supplier">Nama Supplier:</label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?= $supplier['nama_supplier']; ?>" required>
            </div>
            <div class="form-group">
                <label for="no_telp">No Telpon:</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $supplier['no_telp']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $supplier['alamat']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
