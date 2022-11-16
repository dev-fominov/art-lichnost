<?php

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//Дебаг
//0 = off (for production use)
//1 = клиентские сообщения
//2 = серверные и клиентские сообщения
//$mail->SMTPDebug = 2;

$mail->isSMTP();
$mail->Host = 'smtp.yandex.ru'; //gmail: smtp.gmail.com
$mail->SMTPAuth = true;
$mail->Username = 'robot@devreadwrite.com';
$mail->Password = '*******';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setLanguage('ru');
$mail->setFrom('robot@devreadwrite.com', 'Robot');
$mail->addAddress('alexvolkov72305@yandex.com', 'My Friend');    //Получатель
//$mail->addAddress('my.friend2@gmail.com');              //Еще получатель
//$mail->addReplyTo('my.friend3@gmail.com', 'My Friend 3');
//$mail->addCC('my.friend.cc@example.com');               //Копия
//$mail->addBCC('my.friend.bcc@example.com');             //Скрытая копия

//$mail->addAttachment('/path/to/file.zip');              //Прикрепить файл
//$mail->addAttachment('/path/to/image.jpg', 'new.jpg');  //Прикрепить файл + задать имя
$mail->isHTML(true);

$mail->Subject = 'Тема письма';
$mail->Body    = '<b>HTML</b> версия письма';
$mail->AltBody = 'Текстовая версия письма, без HTML тегов (для клиентов не поддерживающих HTML)';

//Отправка сообщения
if (!$mail->send()) {
    echo 'Ошибка при отправке. Ошибка: ' . $mail->ErrorInfo;
} else {
    echo 'Сообщение успешно отправлено';
}


// ====================

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->isHTML(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Включить подробный вывод отладки
    $mail->isSMTP();                                            //Отправка с помощью SMTP
    $mail->Host       = 'smtp.yandex.ru';                       //Установите SMTP-сервер для отправки через
    $mail->SMTPAuth   = true;                                   //Включить аутентификацию SMTP
    $mail->Username   = 'mail@alex-volkov.ru';                     //SMTP username
    $mail->Password   = 'QazWsxEdc72305';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Включить неявное шифрование TLS
    $mail->Port       = 465;                                    //TCP-порт для подключения; используйте 587, если вы установили `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`.

    //Получатели
    // От кого
    $mail->setFrom('mail@alex-volkov.ru', 'Александр Волков');
    // $mail->addAddress('joe@example.net', 'Joe User');     //Добавить получателя
    $mail->addAddress('dev-fominov@yandex.by');               //Имя необязательно
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Вложения
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Добавить вложения
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    $body = '<h1>Начало письма:</h1>';
    if (!empty($_POST['text_name'])) {
        $body .= '<p><strong>ИМЯ: </strong>' . $_POST['text_name'] . '</p>';
    }
    $body .= '<p>Контент</p>';
    $body .= '<p>Конец письма</p>';

    //Контент
    $mail->isHTML(true);                                  //Установите формат электронной почты на HTML
    $mail->Subject = 'Тема Тест Сообщение!!';
    $mail->Body    = $body;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // $mail->send();
    // echo 'Message has been sent';

    if (!$mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены!';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');

    echo json_encode($response);
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
