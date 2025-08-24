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
    <title>About</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .container {
            flex: 1;
        }

        footer {
            margin-top: auto;
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
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="about.php">About</a>
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

    <figure class="text-center mt-3">
        <h2 class="fw-semibold">Stocksavvy Inventory Web</h2>
        <blockquote class="blockquote">
            <p>Inventory Management System Web.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Stocksavvy Data Management
        </figcaption>
    </figure>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card">
                    <img src="img/asus.png" class="card-img-top mx-auto" alt="Zenbook" style="width: 9rem; height: 8rem;">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Asus Zenbook 14 OLED</h5>
                        <p class="card-text" style="text-align: justify;">Zenbook 14 OLED, laptop tipis dan ringan paling canggih yang membawa kemewahan ke tingkatan lebih tinggi. Manfaatkan setiap momen dengan baterai yang lebih tahan lama.</p>
                        <a href="https://www.asus.com/id/laptops/for-home/zenbook/asus-zenbook-14-oled-ux3405/" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card">
                    <img src="img/acer.jpg" class="card-img-top mx-auto" alt="Predator" style="width: 10rem; height: 8rem;">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Acer Predator Helios Neo 16</h5>
                        <p class="card-text" style="text-align: justify;">Acer Predator Helios Neo 16, Laptop Gaming Acer unggulan. Dirumah atau sambil berpergian menghadirkan performa yang konsisten. Pengalaman terbaik bermain Game.</p>
                        <a href="https://www.acer.com/id-id/predator/laptops/helios/helios-neo-16/pdp/NH.QLUSN.001" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card">
                    <img src="img/msi.jpg" class="card-img-top mx-auto" alt="Modern 14" style="width: 10rem; height: 9.4rem;">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">MSI Modern 14 C7M</h5>
                        <p class="card-text" style="text-align: justify;">MSI Modern 14 C7M, Dilengkapi dengan Prosesor hingga AMD Ryzen™ 7, Modern 14 C7M yang sangat ringan dan tipis sehingga tetap produktif dan terhibur dimana saja.</p>
                        <a href="https://id.msi.com/Business-Productivity/Modern-14-C7X" class="btn btn-primary">View</a>
                    </div>
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