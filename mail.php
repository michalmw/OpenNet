<?php
require_once 'phpmailer/PHPMailerAutoload.php';

    $name = $_POST[name];
    $topic = $_POST[topic];
    $email = $_POST[email];
    $tresc =$_POST[tresc];
    $file = $_POST[file];
   
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;       
    $mail->Host = 'mail.surprise.design';
    $mail->Username = '';                 
    $mail->Password = '';
    $mail->From = 'michal@surprise.design';
    $mail->FromName = 'Od Strony www';
    $mail->AddAddress('dh.lama@gmail.com'); 
    // $mail->AddAddress('biuro@opennet.pl'); 
    $mail->AddAddress('joanna.kawecka@projectmanager24.pl');
    $mail->Subject = 'Z strony wwww';
    // $mail->AddAttachment($file,$file);
    $mail->AddAttachment($_FILES['file']['tmp_name'],$_FILES['file']['name']); 

    $mail->CharSet = 'utf-8';
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

