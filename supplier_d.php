<?php
    require 'functions.php';

    if (!isset($_GET['id'])) {
        header ('location = supplier.php');
        exit();
    }

    $id_supplier = $_GET['id'];

    $conn = koneksi();
    $query = "DELETE FROM supplier WHERE id_supplier = $id_supplier";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: supplier.php'); 
        exit();
        } else {
        echo "Gagal Menghapus Data.";
    }
?>