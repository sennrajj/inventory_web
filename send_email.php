<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $pesan = htmlspecialchars($_POST['pesan']);

    $mail = new PHPMailer(true);

    try {
        // Aktifkan debug output
        $mail->SMTPDebug = 2; // Ubah ke 0 untuk menonaktifkan debug output
        $mail->Debugoutput = 'html';

        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'raj.boygeneration21@gmail.com'; // Ganti dengan email Anda
        $mail->Password = 'zabc gvax flnp zqkg'; // Ganti dengan password aplikasi yang baru Anda buat
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('raj.boygeneration21@gmail.com', $nama);
        $mail->addAddress('rajpresent09@gmail.com'); // Ganti dengan email tujuan

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'New Contact Us Message From Stocksavvy';
        $mail->Body = "Name : $nama\nEmail : $email\nMessage : $pesan";

        $mail->send();
        header("Location: contact.php");
        exit();
    } catch (Exception $e) {
        echo "Error: Message not sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header("Location: contact.php");
    exit();
}
