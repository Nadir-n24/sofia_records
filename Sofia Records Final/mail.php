<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$phone = $_POST['tell'];
$email = $_POST['email'];
$order = $_POST['text'];
$topic = $_POST['topic'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'client.web@bk.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'Nesk@zhu'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('client.web@bk.ru'); // от кого будет уходить письмо?
$mail->addAddress('akshaayan@gmail.com');    
$mail->addAddress('akpayev.nadir@gmail.com');  
// $mail->addReplyTo('$email', 'Information');
// Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional

//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Тема:' .$topic;
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email. '<br><br>Заказ:<br>' .$order;

$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    echo '<script language="javascript">';
    echo'alert("Ваше сообщение отправлено. Спасибо! Ihre Nachricht wurde versendet. Vielen Dank! Your message has been sent. Thanks!")';
    echo '</script>';
    header('location: thank-you.html');
}
?>

