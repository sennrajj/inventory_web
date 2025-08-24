<?php
include 'koneksi.php';

if (isset($_GET['id']) && isset($_GET['type']) && isset($_GET['redirect'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    $redirect = $_GET['redirect'];

    switch ($type) {
        case 'inventory':
            $sql = "DELETE FROM tb_inventory WHERE id = $id";
            break;
        case 'masuk':
            $sql_old_stock = "SELECT stock_masuk, nama_barang FROM tb_masuk WHERE id='$id'";
            $result_old_stock = $conn->query($sql_old_stock);
            if ($result_old_stock->num_rows > 0) {
                $row_old_stock = $result_old_stock->fetch_assoc();
                $stock_masuk = $row_old_stock['stock_masuk'];
                $nama_barang = $row_old_stock['nama_barang'];
                
                $sql_update_inventory = "UPDATE tb_inventory SET stock = stock - $stock_masuk WHERE nama_barang = '$nama_barang'";
                if ($conn->query($sql_update_inventory) !== TRUE) {
                    echo "Error: " . $sql_update_inventory . "<br>" . $conn->error;
                    exit();
                }

                $sql = "DELETE FROM tb_masuk WHERE id = $id";
            } else {
                echo "Data tidak ditemukan";
                exit();
            }
            break;
        case 'keluar':
            $sql_old_stock = "SELECT stock_keluar, nama_barang FROM tb_keluar WHERE id='$id'";
            $result_old_stock = $conn->query($sql_old_stock);
            if ($result_old_stock->num_rows > 0) {
                $row_old_stock = $result_old_stock->fetch_assoc();
                $stock_keluar = $row_old_stock['stock_keluar'];
                $nama_barang = $row_old_stock['nama_barang'];
                
                $sql_update_inventory = "UPDATE tb_inventory SET stock = stock - $stock_keluar WHERE nama_barang = '$nama_barang'";
                if ($conn->query($sql_update_inventory) !== TRUE) {
                    echo "Error: " . $sql_update_inventory . "<br>" . $conn->error;
                    exit();
                }

                $sql = "DELETE FROM tb_keluar WHERE id = $id";
            } else {
                echo "Data tidak ditemukan";
                exit();
            }
            break;
        default:
            echo "Tipe tidak dikenali";
            exit();
    }

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
        header("Location: $redirect");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>