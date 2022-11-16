<?php

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

//Server settings
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Включить подробный вывод отладки
$mail->isSMTP();                                            //Отправка с помощью SMTP
$mail->Host       = 'smtp.yandex.ru';                       //Установите SMTP-сервер для отправки через
$mail->SMTPAuth   = true;                                   //Включить аутентификацию SMTP
$mail->Username   = 'alexvolkov72305@yandex.ru';                     //SMTP username
$mail->Password   = 'jbffztbuhbcbrhym';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Включить неявное шифрование TLS
$mail->Port       = 465;                                    //TCP-порт для подключения; используйте 587, если вы установили `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`.

//Получатели
// От кого
$mail->setFrom('mail@art-lichnost.ru', 'art-lichnost');
// $mail->addAddress('joe@example.net', 'Joe User');     //Добавить получателя
$mail->addAddress('mail@alex-volkov.ru');               //Имя необязательно
$mail->addReplyTo('info@art-lichnost.ru', 'art-lichnost');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

//Вложения
// $mail->addAttachment('/var/tmp/file.tar.gz');         //Добавить вложения
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

// parentsName 	Фамилия и имя родителя
// childName 		Фамилия и имя ребенка
// birthdate		Дата рождения ребенка
// userEmail		
// userPhone
// hiddenText

$body = '<h1>Информация о пользователе</h1>';
if (trim(!empty($_POST['parentsName']))) {
	$body .= '<p><strong>Фамилия и имя родителя: </strong>' . $_POST['parentsName'] . '</p>';
}
if (trim(!empty($_POST['childName']))) {
	$body .= '<p><strong>Фамилия и имя ребенка: </strong>' . $_POST['childName'] . '</p>';
}
if (trim(!empty($_POST['birthdate']))) {
	$body .= '<p><strong>Дата рождения ребенка: </strong>' . $_POST['birthdate'] . '</p>';
}
if (trim(!empty($_POST['userEmail']))) {
	$body .= '<p><strong>E-mail: </strong>' . $_POST['userEmail'] . '</p>';
}
if (trim(!empty($_POST['userPhone']))) {
	$body .= '<p><strong>Телефон: </strong>' . $_POST['userPhone'] . '</p>';
}
if (trim(!empty($_POST['hiddenText']))) {
	$body .= '<p><strong>Какая форма: </strong>' . $_POST['hiddenText'] . '</p>';
}
if (trim(!empty($_POST['themeMessage']))) {
	$subject = $_POST['themeMessage'];
} else {
	$subject = 'Тема письма';
}

//Контент
$mail->isHTML(true);                                  //Установите формат электронной почты на HTML
$mail->Subject = $subject;
$mail->Body    = $body;
$mail->AltBody = 'Ваш почтовый клиент не поддерживает HTML';

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
