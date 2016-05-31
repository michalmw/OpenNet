<?php
require_once 'phpmailer/PHPMailerAutoload.php';

    $name = $_POST[name];
    $topic = $_POST[topic];
    $email = $_POST[email];
    $tresc =$_POST[tresc];

   
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;       
    $mail->Host = 'mail.projekty.surprise.design';
    $mail->Username = 'mail@projekty.surprise.design';                 
    $mail->Password = '6auxB9he';
    $mail->From = 'mail@projekty.surprise.design';
    $mail->FromName = 'Od Strony www';
    $mail->AddAddress('dh.lama@gmail.com'); 
    $mail->AddAddress('biuro@opennet.pl'); 
    $mail->AddAddress('joanna.kawecka@projectmanager24.pl');
    $mail->Subject = 'Z strony wwww';
    $mail->Body = "Witaj,
    Nazwa: $name 
    Email: $email 
    $topic 
    Tresc: $tresc";


    if(!$mail->send()) {
        $data = array('success' => false, 'message' => 'Wiadomość nie została wysłana. Błąd: ' . $mail->ErrorInfo);
        echo json_encode($data);
        exit;
    } else {
        echo 'eee';
    }

