<?php

$name = htmlspecialchars(trim(isset($_POST['user-name']);
$tel = htmlspecialchars(trim(isset($_POST['user-phone']);
$email = htmlspecialchars(trim(isset($_POST['user-email']);
$msg= htmlspecialchars(trim(isset($_POST['user-message']);


$to = "frontend-ninja@yandex.ru";
$subject = "Новая заявка с сайта Ребцентр";
$message = 
"
<strong>Имя:</strong> $name;<br>
<strong>Телефон:</strong> $tel;<br>   
<strong>E-mail:</strong> $email;<br>
<strong>E-mail:</strong> $msg.
";


$headers =
           'From: Новая заявка с сайта Ребцентр' . "\r\n" . 
           'Reply-To: frontend-ninja@yandex.ru' . "\r\n" .
           'Content-Type: text/html; charset=utf-8' . "\r\n" . 
           'Content-Transfer-Encoding: 8bit' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers); 

?>