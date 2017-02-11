<?php
require 'PHPMailer/PHPMailerAutoload.php';
/*
 $target
 $subject
 $body
 */
function sendemail($target,$subject,$body)
{

    $mail = new PHPMailer;
    //$mail->SMTPDebug = 3;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ir.debug@gmail.com';                 // SMTP username
    $mail->Password = 'DCA5FBF35C8727AC';                           // SMTP password
    $mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->From = 'ir.debug@gmail.com';
    $mail->FromName = 'HIRS UCSC';
    //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress($target);
    //$mail->addAddress($email);// Name is optional
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment("img/vendor images/" . $_FILES['desimage']['name']);    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = $body;
    $mail->send();
}