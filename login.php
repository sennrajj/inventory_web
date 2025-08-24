<?php 
session_start();
include 'koneksi.php';

if(isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pass']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $a = $result->fetch_object();
        $_SESSION['stat_login'] = true;
        $_SESSION['id'] = $a->id;
        $_SESSION['username'] = $a->username;

        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Username atau Password Salah!";
        header("Location: login.php");
        exit();
    }
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
    <title>Login Administrator</title>

    <style>
        .form-login {
            max-width: 500px;
            margin: 100px auto;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            padding: 30px;
            border-radius: 10px;
        }

    </style>
</head>
<body style="padding-bottom: 80px; overflow-y: hidden;">

    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body sticky-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-semibold" href="login.php">Stocksavvy</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="form-login">
            <h3 class="text-center fw-semibold">ADMIN LOGIN</h3>

            <?php
            if(isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="user" class="fw-semibold mt-4">Username</label>
                    <input type="text" id="user" name="user" class="form-control mt-2" placeholder="Masukkan Username" required>

                    <label for="pass" class="fw-semibold mt-4">Password</label>
                    <input type="password" id="pass" name="pass" class="form-control mt-2" placeholder="Masukkan Password" required>

                    <button type="submit" name="login" value="login" class="btn btn-primary fw-semibold mt-4 w-100">Submit</button>
                </div>
            </form>
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