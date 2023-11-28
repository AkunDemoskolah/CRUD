<?php
//fungsi koneksi
function koneksi(){
    $conn = mysqli_connect("localhost","root","","penjualan");
    return $conn;
}

function query($sql){
    $conn   = koneksi();
    $result = mysqli_query($conn,$sql);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// functions.php

function tambah_barang($data) {
    $conn = koneksi(); // Fungsi koneksi() harus ada

    // Ambil nilai dari $data sesuai dengan kebutuhan
    $nama_barang = $data['nama_barang'];
    $harga = $data['harga'];
    $stok = $data['stok'];
    $id_supplier = $data['id_supplier'];

    // Query untuk menambahkan barang ke database
    $query = "INSERT INTO barang (nama_barang, harga, stok, id_supplier) VALUES ('$nama_barang', '$harga', '$stok', '$id_supplier')";

    // Jalankan query
    $result = mysqli_query($conn, $query);

    // Check apakah query berhasil dijalankan
    if ($result) {
        return mysqli_affected_rows($conn);
    } else {
        return -1; // Mengembalikan nilai negatif untuk menunjukkan kesalahan
    }
}

function tambah_transaksi($data) {
    $conn = koneksi(); // Fungsi koneksi() harus ada

    // Ambil nilai dari $data sesuai dengan kebutuhan
    $id_transakasi = $data['id_transakasi'];
    $id_barang = $data['id_barang'];
    $id_pembeli = $data['id_pembeli'];
    $tanggal = $data['tanggal'];
    $keterangan = $data['keterangan'];
    $stock = $data['stock'];

    // Query untuk menambahkan transaksi ke database
    $query = "INSERT INTO transaksi (id_transakasi, id_barang, id_pembeli, tanggal, keterangan, stock) VALUES ('$id_transakasi', '$id_barang', '$id_pembeli', '$tanggal', '$keterangan', '$stock')";

    // Jalankan query
    $result = mysqli_query($conn, $query);

    // Check apakah query berhasil dijalankan
    if ($result) {
        return mysqli_affected_rows($conn);
    } else {
        return -1; // Mengembalikan nilai negatif untuk menunjukkan kesalahan
    }
}
    function ubah_transaksi($data) {
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $transaksi = mysqli_fetch_assoc($result);

        if (!$transaksi) {
            die("No data found for the given id_transaksi");
        }
    }

/*function tambah_barang($da) {
    $conn = koneksi(); // Fungsi koneksi() harus ada

    // Ambil nilai dari $data sesuai dengan kebutuhan
    $id_pembeli = $da['id_pembeli'];
    $nama_pembeli = $da['nama_pembeli'];
    $jk = $da['jk'];
    $no_telp = $da['no_telp'];
    $alamat = $da['alamat'];
    

    // Query untuk menambahkan barang ke database
    $query = "INSERT INTO pembeli (id_pembeli, nama_pembeli, jk, no_telp, alamat) VALUES ('$id_pembeli', '$nama_pembeli', '$jk', '$no_telp', '$alamat')";

    // Jalankan query
    $result = mysqli_query($conn, $query);

    // Check apakah query berhasil dijalankan
    if ($result) {
        return mysqli_affected_rows($conn);
    } else {
        return -1; // Mengembalikan nilai negatif untuk menunjukkan kesalahan
    }
}*/

?>