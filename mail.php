<?php
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'mail.smtp2go.com';
$mail->SMTPAuth = true;
$mail->Username = '';
$mail->Password = '';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom("$email", "$name");
$mail->addReplyTo("$email", "$name");
// Menambahkan penerima
$mail->addAddress('nay@mineversal.com');
// Subjek email
$mail->Subject = "$subject";
// Mengatur format email ke HTML
$mail->isHTML(true);
// Konten/isi email
$mailContent = "$message";
$mail->Body = $mailContent;
// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Pesan telah terkirim';
}
