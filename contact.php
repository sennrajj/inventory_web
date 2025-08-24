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
    <title>Contact</title>
</head>
<body style="padding-bottom: 80px; overflow-y: hidden;">

    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body sticky-top" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand fw-semibold" href="index.php">Stocksavvy</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="contact.php">Contact</a>
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

    <div class="container mt-3">
        <figure>
            <blockquote class="blockquote text-center">
                <h2 class="fw-semibold">CONTACT US</h2>
            </blockquote>
        </figure>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <form action="send_email.php" method="POST">
                    <div class="form-group mt-3">
                        <label for="nama" class="fw-semibold">Nama</label>
                        <input type="text" class="form-control mt-1" name="nama" id="nama" placeholder="Masukkan Nama Anda">
                    </div>

                    <div class="form-group mt-3">
                        <label for="email" class="fw-semibold">E-mail</label>
                        <input type="email" class="form-control mt-1" name="email" id="email" placeholder="Masukkan Email Anda">
                    </div>

                    <div class="form-group mt-3">
                        <label for="pesan" class="fw-semibold">Pesan Anda:</label>
                        <textarea name="pesan" id="pesan" class="form-control mt-1" cols="30" rows="7"></textarea>
                    </div>

                    <input class="btn btn-primary mt-3" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light text-center py-3 fixed-bottom">
        <div class="container">
            <p class="mb-0">© 2024 Stocksavvy. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>