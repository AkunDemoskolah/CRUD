<?php
    require 'functions.php';

    if (!isset($_GET['id'])) {
        header ('location = data_barang.php');
        exit();
    }

    $id_barang = $_GET['id'];

    $conn = koneksi();
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: data_barang.php'); 
        exit();
        } else {
        echo "Gagal Menghapus Data.";
    }
?>