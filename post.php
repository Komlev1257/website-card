<?php
    use PHPMailer\PHPMailer\PHPMailer
    use PHPMailer\PHPMailer\Exception

    require 'phpmailer/src/Exception.php'
    require 'phpmailer/src/PHPMailer.php'

    $mail = new PHPMailer(true);
    $mail->Charset = 'UTF-8';
    $mail->IsHTML(true);


    $mail->setFrom('no-reply@mysite.com', 'Message from my site');
    $mail->addAddress('komlev1257@gmail.com');

    if (trim(!empty($_POST['email']))) {
        $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
    }
    if (trim(!empty($_POST['subject']))) {
        $body.='<p><strong>Subject:</strong> '.$_POST['subject'].'</p>';
    }
    if (trim(!empty($_POST['message']))) {
        $body.='<p><strong>Message:</strong> '.$_POST['message'].'</p>';
    }

    $mail->Body = $body;


    if (!$mail->send()) {
        $message = 'Error';
    } else {
        $message = 'Success!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
    