<?php
    require 'functions.php';

    // Pastikan ada parameter id yang dikirimkan
    if (!isset($_GET['id'])) {
        header('Location: pembayaran.php'); // Redirect jika tidak ada id
        exit();
    }

    $id_pembayaran = $_GET['id'];
    $pembayaran = query("SELECT * FROM pembayaran WHERE id_pembayaran = $id_pembayaran")[0];

    // Proses form edit jika ada data yang dikirimkan
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tgl_bayar = $_POST['tgl_bayar'];
        $total = $_POST['total_bayar'];
        $id_transaksi = $_POST['id_transaksi'];

        // Lakukan query untuk update data
        $query = "UPDATE pembayaran SET 
            tgl_bayar = '$tgl_bayar', 
            total_bayar = '$total', 
            id_transaksi = '$id_transaksi' 
          WHERE id_pembayaran = $id_pembayaran";
        $conn   = koneksi();
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('Location: pembayaran.php'); // Redirect setelah berhasil edit
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
                <label for="tgl_bayar">Tanggal Pembayaran:</label>
                <input type="text" class="form-control" id="tgl_bayar" name="tgl_bayar" value="<?= $pembayaran['tgl_bayar']; ?>" required>
            </div>
            <div class="form-group">
                <label for="total_bayar">Total Bayar:</label>
                <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="<?= $pembayaran['total_bayar']; ?>" required>
            </div>
            <div class="form-group">
                <label for="id_transaksi">ID Transaksi:</label>
                <input type="text" class="form-control" id="id_transaksi" name="id_transaksi" value="<?= $pembayaran['id_transaksi']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
