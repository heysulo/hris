<?php
require 'PHPMailer/PHPMailerAutoload.php';

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
                    $mail->addAddress('sulochana.456@live.com');
                    //$mail->addAddress($email);// Name is optional
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment("img/vendor images/" . $_FILES['desimage']['name']);    // Optional name
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'You apply successfully';
                    $mail->Body = 'We are happy about you intersted Our Courses. We intend to Call you consider your Qualification';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    if (!$mail->send()) {
                         echo "You applied successfully";
                    } else {
                         echo "You applied successfully";
                    }