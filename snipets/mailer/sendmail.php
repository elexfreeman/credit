<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.medlan.samara.ru';  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'online';                            // SMTP username
$mail->Password = '12QWaszx';                           // SMTP password
$mail->SMTPSecure = 'tls';  
 // Enable encryption, 'ssl' also accepted

$mail->SMTP_PORT = 587;

$mail->From = 'online@mail.medlan.samara.ru';
$mail->FromName = 'OnLine Master';
#$mail->addAddress('josh@example.net', 'Josh Adams');  // Add a recipient
$mail->addAddress('elex@medlan.samara.ru');               // Name is optional
#$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('elex@medlan.samara.ru');
$mail->addBCC('elex@medlan.samara.ru');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
#$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
#$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';
