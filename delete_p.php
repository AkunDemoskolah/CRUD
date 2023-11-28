<?php
    require 'functions.php';

    if (!isset($_GET['id'])) {
        header ('location = pembayaran.php');
        exit();
    }

    $id_pembayaran = $_GET['id'];

    $conn = koneksi();
    $query = "DELETE FROM pembayaran WHERE id_pembayaran = $id_pembayaran";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: pembayaran.php'); 
        exit();
        } else {
        echo "Gagal Menghapus Data.";
    }
?>