<?php
    require 'functions.php';

    // Pastikan ada parameter id yang dikirimkan
    if (!isset($_GET['id'])) {
        header('Location: pembeli.php'); // Redirect jika tidak ada id
        exit();
    }

    $id_pembeli = $_GET['id'];
    $pembeli = query("SELECT * FROM pembeli WHERE id_pembeli = $id_pembeli")[0];

    // Proses form edit jika ada data yang dikirimkan
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_pembeli = $_POST['nama_pembeli'];
        $jk = $_POST['jk'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];

        // Lakukan query untuk update data
        $query = "UPDATE pembeli SET 
            nama_pembeli = '$nama_pembeli', 
            jk = '$jk', 
            no_telp = '$no_telp' ,
            alamat = '$alamat'
          WHERE id_pembeli = $id_pembeli";
        $conn   = koneksi();
        $result = mysqli_query($conn, $query);

        if ($result) {
            header('Location: pembeli.php'); // Redirect setelah berhasil edit
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
                <label for="nama_pembeli">Nama Customer:</label>
                <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" value="<?= $pembeli['nama_pembeli']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jk">Gender:</label>
                <input type="text" class="form-control" id="jk" name="jk" value="<?= $pembeli['jk']; ?>" required>
            </div>
            <div class="form-group">
                <label for="no_telp">No Telpon:</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $pembeli['no_telp']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $pembeli['alamat']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>
