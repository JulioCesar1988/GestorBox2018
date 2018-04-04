<?php
$to      = 'jcontreras@millerbi.net';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: jcontreras@millerbi.net' . "\r\n" .
    'Reply-To: jcontreras@millerbi.net' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?> 