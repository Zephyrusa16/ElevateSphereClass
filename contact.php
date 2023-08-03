<?php
// Jika menggunakan PHPMailer, pastikan Anda mengatur jalur ke direktori PHPMailer
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Konfigurasi email Anda
$senderEmail = 'contoh@gmail.com'; // Email pengirim
$senderPassword = 'password_pengirim'; // Password email pengirim
$receiverEmail = 'email_anda@gmail.com'; // Email penerima

// Tangkap data dari form kontak
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Buat objek PHPMailer
$mail = new PHPMailer();

// Set penggunaan SMTP
$mail->isSMTP();
$mail->Host = 'elevatesphere16.gmail.com'; // Ganti dengan server SMTP Anda jika tidak menggunakan Gmail
$mail->SMTPAuth = true;
$mail->Username = $senderEmail;
$mail->Password = $senderPassword;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Set penerima email
$mail->setFrom($senderEmail, $name);
$mail->addAddress($receiverEmail);

// Set email pesan
$mail->isHTML(true);
$mail->Subject = 'Pesan dari Form Kontak';
$mail->Body = "<p>Nama: $name</p><p>Email: $email</p><p>Pesan: $message</p>";

// Kirim email
if ($mail->send()) {
    echo 'Pesan telah terkirim! Terima kasih atas pesannya.';
} else {
    echo 'Pesan gagal terkirim. Silakan coba lagi.';
}
?>
