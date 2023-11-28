<?php
require 'functions.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_pembeli = $_POST['nama_pembeli'];
        $jk = $_POST['jk'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];

        $conn   = koneksi();
        $query = "INSERT INTO pembeli (nama_pembeli, jk, no_telp, alamat) VALUES ('$nama_pembeli', '$jk', '$no_telp', '$alamat')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('Location: pembeli.php'); // Redirect setelah berhasil edit
            exit();
            } else {
            echo "Gagal menambah data.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Customer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1><center>Customer</center></h1>
    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label for="nama_pembeli">Nama Customer:</label>
                <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" required>
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin:</label>
                <input type="text" class="form-control" id="jk" name="jk" required>
            </div>
            <div class="form-group">
                <label for="no_telp">No Telpon:</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="pembeli.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>