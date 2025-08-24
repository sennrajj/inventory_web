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
    <title>Dashboard</title>

    <style>
        @media screen and (max-width: 800px) {
            body {
                width: 100%;
                padding: 0;
            }
        }
        
        @media screen and (max-width: 400px) {
            body {
                float: none;
                width: 100%;
            }
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .container {
            flex: 1;
        }
    </style>
</head>
<body>

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

    <div class="container">
    <figure>
      <blockquote class="blockquote">
        <h2 class="mt-4 fw-semibold">INVENTORY</h2>
        <p>Data saved in Database</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        Stocksavvy Data Management
      </figcaption>
    </figure>

    <a href="tambah.php" type="button" class="btn btn-primary fw-semibold">
        <i class='bx bx-plus-medical'></i>
        Tambah Data
    </a>

    <div class="card mt-3 mb-3">
        <div class="card-header text-white bg-dark fw-semibold">
            Data Barang
        </div>
        <div class="card-body">
            <div class="table-responsive mt-2">
                <table class="table align-middle table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Stock</th>
                    <th>Harga Barang</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include 'koneksi.php';
                  $sql = "SELECT * FROM tb_inventory";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                      $no = 1;
                      while($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . $no++ . "</td>";
                          echo "<td>" . $row['id'] . "</td>";
                          echo "<td>" . $row['nama_barang'] . "</td>";
                          echo "<td>" . $row['stock'] . "</td>";
                          echo "<td>" . $row['harga'] . "</td>";
                          echo "<td>" . $row['deskripsi'] . "</td>";
                          echo "<td>
                                  <a href='edit.php?id=" . $row['id'] . "&type=inventory&redirect=index.php' class='btn btn-warning btn-sm fw-semibold'>
                                      <i class='bx bxs-edit-alt'></i>
                                      Edit
                                  </a>
                                  <a href='delete.php?id=" . $row['id'] . "&type=inventory&redirect=index.php' class='btn btn-danger btn-sm fw-semibold' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>
                                      <i class='bx bxs-x-square'></i>
                                      Hapus
                                  </a>
                                </td>";
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                  }
                  $conn->close();
                  ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <footer class="bg-dark text-light text-center py-3">
        <div class="container">
            <p class="mb-0">© 2024 Stocksavvy. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>