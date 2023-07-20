<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.beget.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'admin@rortool.com';                     //SMTP username
    $mail->Password = '';                               //SMTP password
    $mail->SMTPSecure = 'ssl'; //PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('admin@rortool.com');
    $mail->addAddress('alexeykozhakin@gmail.com');

    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'MessageFromHosting';

    $message = "Name : " . $_POST['name'] . "<br>" . " Email : " . $_POST['email'] . "<br>" . " Message : " . $_POST['message'];
    $mail->Body = $message;

//    $mail->Body    = $_POST["message"];
//    $mail->Username= $_POST["name"];
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo
    "
    <script>
    alert('Sent succesfully');
    document.location.href = 'index.min.html';
    </script>
    ";
}


//echo $_POST["name"];
//echo $_POST["email"];
//echo $_POST["message"];
?>
