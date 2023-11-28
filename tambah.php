<?php
require 'functions.php';

$supplier = query("SELECT * FROM supplier");

if (isset($_POST['tambah'])) {
    if (tambah_barang($_POST) > 0) {
        echo "<script>
        alert('data berhasil ditambahkan');
        document.location.href = 'data_barang.php';
        </script>";
    } else {
        echo "<script>
        alert('data tidak dapat ditambahkan');
        document.location.href = 'tambah.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1><center>Tambah Barang</center></h1>
    <div class="container mt-5">
        <form method="POST">
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            </div>
            <!-- Form input ... -->
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div>
            <div class="form-group">
                <label for="id_supplier">ID Supplier:</label>
                <select class="form-control" id="id_supplier" name="id_supplier" required>
                    <?php foreach ($supplier as $s) : ?>
                        <option value="<?php echo $s['id_supplier']; ?>">
                            <?php echo $s['nama_supplier']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
            <a href="data_barang.php" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</body>
</html>
