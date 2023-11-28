<?php
    require 'functions.php';

    if (!isset($_GET['id'])) {
        header ('location = transaksi.php');
        exit();
    }

    $id_transaksi = $_GET['id'];

    $conn = koneksi();
    $query = "DELETE FROM transaksi WHERE id_transakasi = $id_transaksi";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: transaksi.php'); 
        exit();
        } else {
        echo "Gagal Menghapus Data.";
    }
?>