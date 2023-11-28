<?php
    require 'functions.php';

    if (!isset($_GET['id'])) {
        header ('location = pembeli.php');
        exit();
    }

    $id_pembeli = $_GET['id'];

    $conn = koneksi();
    $query = "DELETE FROM pembeli WHERE id_pembeli = $id_pembeli";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: pembeli.php'); 
        exit();
        } else {
        echo "Gagal Menghapus Data.";
    }
?>