<?php
/* 
Written by: Ryan Armstrong & Viviannie De La Fuente
Tested by: Viviannie De La Fuente
Debugged by: Viviannie De La Fuente 
*/
require_once "config.php";

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
include_once("send-Notification.php");
if(!isset($_GET['email']) && empty(_GET['email']))
{    
            
        header("location: welcome.php");//redirect to welcome page if missing id of diagnosed person
        //NOTE TO SELF ABOUT CALLING FUNCTION EXIT AFTER A REDIRECT!!!!!!!!!!!!!!!!!!!
        exit; //MAKE SURE TO CALL EXIT; OTHERWISE A REDIRECT HEADER WILL NOT STOP AN EXISTING SCRIPT FROM EXECUTING 
        //THE REDIRECT HAPPENS ***AFTER*** THE ENTIRE PAGE HAS EXECUTED.         
    
}

// Escape user inputs for security

$firstName = mysqli_real_escape_string($mysqli, $_REQUEST['firstName']);
$lastName = mysqli_real_escape_string($mysqli, $_REQUEST['lastName']);
$email = mysqli_real_escape_string($mysqli, $_REQUEST['email']);

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

function emailTxt() {
	$text = "Dear \nThe COVID-19 Tracker has detected that you have been in close contact with someone who has tested positive for COVID-19.
    \n Please refrain from going out unless absolutely necessary. Also, ensure to follow quaratine obligations and ensure to get tested.
    \nThank you for your co-operation.\n\n\n -Belize Covid Tracking Team";
	return $text;
}

function subject()
{
    return "Close Contact Alert";
}



try {
	$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'covidtrackersystem2021@gmail.com';                     //SMTP username
    $mail->Password   = 'covid2021';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('no-reply@yourdomain.com', 'Healthcare Professional');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = subject();
    $mail->Body    = emailTxt();

    $mail->send();
  ;
	echo '<script>window.location.href="blank.php";</script>';
} catch (Exception $e) {
    
} 

?>



	




