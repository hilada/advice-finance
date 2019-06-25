<?php

$recepient = "nyura.axmatova@list.ru";
$siteName = "Advice Finance";

$name = trim($_POST["name"]);
$phone = trim($_POST["phone"]);
$userFeedback = trim($_POST["user_feedback"]);
$message = "Имя: $name \nТелефон: $phone";
$pagetitle = "Заявка с сайта \"$siteName\"";


require_once('mailer/phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';


$mail->isSMTP();              
$mail->Host = 'smtp.mail.ru'; 
$mail->SMTPAuth = true;                 
$mail->Username = $recepient;       
$mail->Password = 'Atafro5ng';                         
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;                                   
 
$mail->setFrom('nyura.axmatova@list.ru', 'Анна');   
$mail->addAddress('hiladochka@gmail.com');    
$mail->isHTML(true);                                 

$mail->Subject = "Заявка с сайта \"$siteName\"";
$mail->Body    = "Имя: $name \nТелефон: $phone \nОтзыв: $userFeedback";
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
	echo json_encode(array(
			"status" => "error"
	));	
} else {
	echo json_encode(array(
			"status" => "success"
	));	
}
?>