<?php

include 'koneksi.php';
session_start();
if (!isset($_SESSION['stat_login']) || $_SESSION['stat_login'] !== true) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Link style CSS Bootstrap 5 -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Link style CSS Boxicons -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="shortcut icon" href="img/favicon.png">
	<title>Input Barang Keluar</title>
</head>
<body style="padding-bottom: 80px;">

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

	<form action="proses.php" method="post">
	<input type="hidden" name="action" value="barang_keluar">
	<div class="container mt-5">

		<h2 class="fw-semibold mb-5">INPUT BARANG KELUAR</h2>
		<div class="mb-3 row">
		    <label for="id" class="col-sm-2 col-form-label fw-semibold">ID Barang</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="id" name="id" required>
		      	<?php
		      		$sql = "SELECT id FROM tb_inventory";
		      		$result = $conn->query($sql);
		      		if ($result-> num_rows > 0) {
		      			while ($row = $result->fetch_assoc()) {
		      				echo "<option value='". $row['id'] . "'>" . $row['id'] . "</option>";
		      			}
		      		}
		      	?>
		      </select>
		    </div>
		</div>

		<div class="mb-3 row">
		    <label for="nama_barang" class="col-sm-2 col-form-label fw-semibold">Nama Barang</label>
		    <div class="col-sm-10">
		      <select class="form-control" id="nama_barang" name="nama_barang" required>
		      	<?php
		      		$sql = "SELECT nama_barang FROM tb_inventory";
		      		$result = $conn->query($sql);
		      		if ($result-> num_rows > 0) {
		      			while ($row = $result->fetch_assoc()) {
		      				echo "<option value='". $row['nama_barang'] . "'>" . $row['nama_barang'] . "</option>";
		      			}
		      		}
		      	?>
		      </select>
		    </div>
		</div>

		<div class="mb-3 row">
		    <label for="tanggal" class="col-sm-2 col-form-label fw-semibold">Tanggal</label>
		    <div class="col-sm-10">
		      <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" required>
		    </div>
		</div>

		<div class="mb-3 row">
		    <label for="stock_keluar" class="col-sm-2 col-form-label fw-semibold">Stock Keluar</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="stock_keluar" name="stock_keluar" placeholder="Stock Keluar" required>
		    </div>
		</div>

		<div class="mb-3 row mt-5">
			<div class="col">
				<button type="submit" class="btn btn-primary fw-semibold">
					<i class='bx bxs-save'></i>
					Simpan
				</button>
				<a href="barang_keluar.php" class="btn btn-danger fw-semibold">
					<i class='bx bx-arrow-back'></i>
					Batal
				</a>
			</div>
		</div>	
	</div>
	</form>

    <footer class="bg-dark text-light text-center py-3 fixed-bottom">
        <div class="container">
            <p class="mb-0">© 2024 Stocksavvy. All rights reserved.</p>
        </div>
    </footer>

	<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>