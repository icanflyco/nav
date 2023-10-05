<?php
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/POP3.php';
require 'PHPMailer/src/SMTP.php';
include '../app/config/config.php';
date_default_timezone_set('Asia/Jakarta');

$namab = htmlspecialchars($_POST['namab']);
$nama = $namab;
$email = htmlspecialchars($_POST['surel']);
$tokenkey = md5(date("Hisdmy")."".$namab);
$namad = htmlspecialchars($_POST['namad']);
$namap = substr($nama, 0, 5)."_".substr(md5($tokenkey), 0, 8);
$negara = htmlspecialchars($_POST['negara']);
$tgllahir = htmlspecialchars($_POST['tgllahir']);
$fotop = "default-jpg.jpg";
$fotos = "sampul.jpg";
$passw = md5(htmlspecialchars($_POST['akses']));
$dates = date('H:i:s d M Y');
$verifycodes = md5(base64_encode($dates."Verification".rand(1, 999999)))."_emails_".base64_encode($email);

$query = "SELECT * FROM users_yu WHERE surel = '$email'";
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_array($sql);
if (strlen($_POST['namad']) > 0 && strlen($_POST['namab']) > 0 && strlen($_POST['surel']) > 0 && strlen($_POST['tgllahir']) > 0 && strlen($_POST['negara']) > 0 && strlen($_POST['akses']) > 0) {
    if ($email == $row['surel']) {
        session_start();
        $_SESSION['alert'] = "<div class='p-2 bg-danger text-white fw-bold text-center'>Your Email Address Has Been Created!</div>";
        header("Location: ".BASEURL."daftar");
        die();
    } else {
        $ins = "INSERT INTO users_yu VALUES('','$tokenkey','$namad','$namab','$namap','$email','','','','$negara','','','$tgllahir','$dates','$dates','$verifycodes','1','2','$fotop','$fotos','$passw')";
        $sq2l = mysqli_query($conn, $ins);
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;
        $mail->Username = 'businesscodeshelping@gmail.com';
        $mail->Password = 'rkvfxtggnwgdrwdk';
        $mail->setFrom('businesscodeshelping@gmail.com', 'Yunme');
        $mail->addAddress($email, $nama);
        $mail->Subject = 'Verification Account - Yunme';
        $body = "Hi, ".$nama."<br>Please Verify your Email before Access our website : <br> ".BASEURL."verify/p/".$verifycodes;
        $mail->Body = $body;
        $mail->AltBody = 'Verification Account';
        if (!$mail->send()) {
            echo 'Mailer Error: '. $mail->ErrorInfo;
        } else {
            header("Location: ".BASEURL."verify");
            die();
        }
    }
} else {
    session_start();
    $_SESSION['alert'] = "<div class='p-2 bg-danger text-white fw-bold text-center'>Sign Up Failed!</div>";
    header("Location: ".BASEURL."daftar");
    die();
}