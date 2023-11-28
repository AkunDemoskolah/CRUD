<?php
require 'functions.php';

$barang = query("SELECT * FROM barang");
$pembeli = query("SELECT * FROM pembeli");

if (isset($_POST['tambah'])) {
    // Lakukan validasi input sesuai kebutuhan...

    $data = [
        'id_transakasi' => $_POST['id_transakasi'],
        'id_barang' => $_POST['id_barang'],
        'id_pembeli' => $_POST['id_pembeli'],
        'tanggal' => $_POST['tanggal'],
        'keterangan' => $_POST['keterangan'],
        'stock' => $_POST['stock'],
    ];

    if (tambah_transaksi($data) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'transaksi.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menambahkan data. Silakan cek kembali input Anda.');
        document.location.href = 'transaksi_t.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1><center>Tambah Transaksi</center></h1>
    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label for="id_transakasi">ID Transaksi:</label>
                <input type="text" class="form-control" id="id_transakasi" name="id_transakasi" required>
            </div>
            <div class="form-group">
                <label for="id_barang">ID Barang:</label>
                <select class="form-control" id="id_barang" name="id_barang" required>
                    <?php foreach ($barang as $b) : ?>
                        <option value="<?php echo $b['id_barang']; ?>">
                            <?php echo $b['nama_barang']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_pembeli">ID Pembeli:</label>
                <select class="form-control" id="id_pembeli" name="id_pembeli" required>
                    <?php foreach ($pembeli as $p) : ?>
                        <option value="<?php echo $p['id_pembeli']; ?>">
                            <?php echo $p['nama_pembeli']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
            <a href="transaksi.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>
