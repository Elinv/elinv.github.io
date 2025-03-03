<?php
$to = 'elinv.elinv@gmail.com';
$subject = 'Test Email';
$message = 'This is a test email.';
$headers = 'From: you@example.com' . "\r\n" .
           'Reply-To: you@example.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully.';
} else {
    echo 'Email sending failed.';
}
?>