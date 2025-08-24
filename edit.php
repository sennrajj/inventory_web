<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['stat_login']) || $_SESSION['stat_login'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['type']) && isset($_GET['redirect'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    $redirect = $_GET['redirect'];

    switch ($type) {
        case 'inventory':
            $sql = "SELECT * FROM tb_inventory WHERE id = $id";
            break;
        case 'masuk':
            $sql = "SELECT * FROM tb_masuk WHERE id = $id";
            break;
        case 'keluar':
            $sql = "SELECT * FROM tb_keluar WHERE id = $id";
            break;
        default:
            echo "Tipe tidak dikenali";
            exit();
    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $redirect = $_POST['redirect'];
    $nama_barang = $_POST['nama_barang'];
    $tanggal = $_POST['tanggal'] ?? null;
    $stock = $_POST['stock'] ?? null;
    $harga = $_POST['harga'] ?? null;
    $deskripsi = $_POST['deskripsi'] ?? null;
    $stock_masuk = $_POST['stock_masuk'] ?? null;
    $stock_keluar = $_POST['stock_keluar'] ?? null;

    switch ($type) {
        case 'inventory':
            $sql = "UPDATE tb_inventory SET nama_barang='$nama_barang', stock='$stock', harga='$harga', deskripsi='$deskripsi' WHERE id='$id'";
            break;
        case 'masuk':
            $sql_old_stock = "SELECT stock_masuk FROM tb_masuk WHERE id='$id'";
            $result_old_stock = $conn->query($sql_old_stock);
            if ($result_old_stock->num_rows > 0) {
                $row_old_stock = $result_old_stock->fetch_assoc();
                $old_stock_masuk = $row_old_stock['stock_masuk'];
                $stock_diff = $stock_masuk - $old_stock_masuk;
                $sql_update_inventory = "UPDATE tb_inventory SET stock = stock + $stock_diff WHERE nama_barang = '$nama_barang'";
                if ($conn->query($sql_update_inventory) !== TRUE) {
                    echo "Error: " . $sql_update_inventory . "<br>" . $conn->error;
                    exit();
                }
                $sql = "UPDATE tb_masuk SET tanggal='$tanggal', stock_masuk='$stock_masuk' WHERE id='$id'";
            } else {
                echo "Data tidak ditemukan";
                exit();
            }
            break;
        case 'keluar':
            $sql_old_stock = "SELECT stock_keluar FROM tb_keluar WHERE id='$id'";
            $result_old_stock = $conn->query($sql_old_stock);
            if ($result_old_stock->num_rows > 0) {
                $row_old_stock = $result_old_stock->fetch_assoc();
                $old_stock_keluar = $row_old_stock['stock_keluar'];
                $stock_diff = $stock_keluar - $old_stock_keluar;
                $sql_update_inventory = "UPDATE tb_inventory SET stock = stock - $stock_diff WHERE nama_barang = '$nama_barang'";
                if ($conn->query($sql_update_inventory) !== TRUE) {
                    echo "Error: " . $sql_update_inventory . "<br>" . $conn->error;
                    exit();
                }
                $sql = "UPDATE tb_keluar SET tanggal='$tanggal', stock_keluar='$stock_keluar' WHERE id='$id'";
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
        header("Location: $redirect");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Edit Data</title>
</head>
<body style="padding-bottom: 80px; overflow-x: hidden;">

    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body sticky-top" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand fw-semibold" href="index.php">Stocksavvy</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pages
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="barang_masuk.php">Barang Masuk</a></li>
                <li><a class="dropdown-item" href="barang_keluar.php">Barang Keluar</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
          
          <form class="d-flex" role="search" action="index.php" method="GET">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
              <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mt-5 fw-semibold">EDIT DATA</h2>
        <form method="POST" action="edit.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="type" value="<?php echo $type; ?>">
            <input type="hidden" name="redirect" value="<?php echo $redirect; ?>">
            <div class="mb-3 row mt-5">
                <label for="nama_barang" class="col-sm-2 col-form-label fw-semibold">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
                </div>
            </div>
            <?php if ($type == 'masuk' || $type == 'keluar'): ?>
            <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label fw-semibold">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($type == 'inventory'): ?>
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label fw-semibold">Stock</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $row['stock']; ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label fw-semibold">Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deskripsi" class="col-sm-2 col-form-label fw-semibold">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea>
                </div>
            </div>
            <?php elseif ($type == 'masuk'): ?>
            <div class="mb-3 row">
                <label for="stock_masuk" class="col-sm-2 col-form-label fw-semibold">Stock Masuk</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="stock_masuk" name="stock_masuk" value="<?php echo $row['stock_masuk']; ?>" required>
                </div>
            </div>
            <?php elseif ($type == 'keluar'): ?>
            <div class="mb-3 row">
                <label for="stock_keluar" class="col-sm-2 col-form-label fw-semibold">Stock Keluar</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="stock_keluar" name="stock_keluar" value="<?php echo $row['stock_keluar']; ?>" required>
                </div>
            </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary fw-semibold mt-3">
                <i class='bx bxs-save'></i>
                Update
            </button>
            <a href="<?php echo $redirect; ?>" class="btn btn-danger fw-semibold mt-3">
                <i class='bx bx-arrow-back'></i>
                Batal
            </a>
        </form>
    </div>

    <footer class="bg-dark text-light text-center py-3 fixed-bottom">
        <div class="container">
            <p class="mb-0">© 2024 Stocksavvy. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>