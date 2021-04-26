<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language');
    $mail->isHTML(true);

    // Отправитель
    $mail->setFrom('info@genesis.ru', 'Центр наркологии и психотерапии в Тольятти');

    // Получатель
    $mail->addAddress('frontend-ninja@yandex.ru');

    // Тема письма
    $mail->Subject = 'Новая заявка с сайта genesis';

    // Тело письма
    $body = '<h1>Pаявка с сайта genesis</h1>';

    if(trim(!empty($_POST['user-name']))) {
        $body.='<p><strong>Имя:</strong> '.$_POST['user-name'].'</p>';
    }
    if(trim(!empty($_POST['user-email']))) {
        $body.='<p><strong>Email:</strong> '.$_POST['user-email'].'</p>';
    }

    $mail->$body = $body;

    // Отправка
    if(!$mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>