<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];

    switch ($action) {
        case 'tambah_barang':
            $nama_barang = $_POST['nama_barang'];
            $stock = $_POST['stock'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];

            $sql = "INSERT INTO tb_inventory (nama_barang, stock, harga, deskripsi) VALUES ('$nama_barang', '$stock', '$harga', '$deskripsi')";

            if ($conn->query($sql) === TRUE) {
                echo "Data berhasil ditambahkan";
                header("Location: index.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            break;

        case 'barang_masuk':
            $id = $_POST['id'];
            $nama_barang = $_POST['nama_barang'];
            $tanggal = $_POST['tanggal'];
            $stock_masuk = $_POST['stock_masuk'];

            $sql_update = "UPDATE tb_inventory SET stock = stock + '$stock_masuk' WHERE id = '$id'";

            if ($conn->query($sql_update) === TRUE) {
                // Catat barang masuk di tabel barang_masuk
                $sql_insert = "INSERT INTO tb_masuk (id, nama_barang, tanggal, stock_masuk) VALUES ('$id', '$nama_barang', '$tanggal', '$stock_masuk')";

                if ($conn->query($sql_insert) === TRUE) {
                    echo "Data barang masuk berhasil disimpan";
                    header("Location: barang_masuk.php");
                } else {
                    echo "Error: " . $sql_insert . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $sql_update . "<br>" . $conn->error;
            }
            break;

        case 'barang_keluar':
            $id = $_POST['id'];
            $nama_barang = $_POST['nama_barang'];
            $tanggal = $_POST['tanggal'];
            $stock_keluar = $_POST['stock_keluar'];

            $sql_update = "UPDATE tb_inventory SET stock = stock - '$stock_keluar' WHERE id = '$id'";
            if ($conn->query($sql_update) === TRUE) {
                // Insert data kedalam Table Barang Keluar
                $sql_insert = "INSERT INTO tb_keluar (id, nama_barang, tanggal, stock_keluar) VALUES ('$id', '$nama_barang', '$tanggal', '$stock_keluar')";

                if ($conn->query($sql_insert) === TRUE) {
                    echo "Data barang keluar berhasil disimpan";
                    header("Location: barang_keluar.php");
                } else {
                    echo "Error: " . $sql_insert . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $sql_update . "<br>" . $conn->error;
            }
            break;

        default:
            echo "Aksi tidak dikenali";
            break;
    }
    $conn->close();
}
?>