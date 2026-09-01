<?php
date_default_timezone_set("Asia/Dubai");

//include ("phpMailer/class.phpmailer.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer-master/src/Exception.php';
require 'includes/PHPMailer-master/src/PHPMailer.php';
require 'includes/PHPMailer-master/src/SMTP.php';

$i = 0;
$sub_status = 1;


function sendmail($to, $subject, $message, $name, $from, $tmp_name = null, $filename = null)
{
  $mail             = new PHPMailer();
  $body             = $message;
  $mail->IsSMTP();
  $mail->SMTPAuth   = true;
  $mail             = new PHPMailer();
  $body             = $message;
  $mail->IsSMTP();
  $mail->SMTPAuth   = true;
  $mail->Host       = "smtp.gmail.com";
  $mail->Port       = 587;
  $mail->Username   = "nomiimran911@gmail.com";
  $mail->Password   = "Qwerty@$987";
  $mail->Timeout = 60;
  $mail->SMTPSecure = 'tls';
  // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->setfrom('nomiimran911@gmail.com', 'Noman Imran');
  $mail->Subject    = $subject;
  $mail->AltBody    = "";
  if ($tmp_name != '' && $filename != '') {
    $mail->addAttachment($tmp_name, $filename);
  }
  $mail->MsgHTML($message);
  $address = $to;
  try {
    for ($x = 0; $x < count($to); $x++) {
      $mail->AddAddress($to[$x], $name[$x]);
    }
    $mail->Send();
    $return = 1;
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    $return = 0;
  }
  return $return;
}
