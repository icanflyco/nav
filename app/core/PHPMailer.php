<?php
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
date_default_timezone_set('Asia/Jakarta');
class DaftarMailer {
    public static function mailer($data) {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/OAuth.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/POP3.php';
        require 'PHPMailer/src/SMTP.php';
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;
        $mail->Username = 'businesscodeshelping@gmail.com';
        $mail->Password = 'rkvfxtggnwgdrwdk';
        $mail->setFrom('businesscodeshelping@gmail.com', 'Yunme');
        $mail->addAddress($data['surel'], $data['namab']);
        $mail->Subject = 'Verification Account - Yunme';
        $body = "Hi, ".$nama."<br>Please Verify your Email before Access our website : <br> ".BASEURL."verify/".$data['surel'];
        $mail->Body = $body;
        $mail->AltBody = 'Verification Account';
        header("Location: ".BASEURL."verify/".base64_encode($data['surel']));
        exit();
        if (!$mail->send()) {
            echo 'Mailer Error: '. $mail->ErrorInfo;
        }
    }
}