<?php
if(!defined('_INCODE')) die('Access deniced....');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($to, $subject, $content){
    //Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'lamhoangan612@gmail.com';                     //SMTP username
        $mail->Password   = 'dqeh pfnk epai emdw';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('lamhoangan612@gmail.com', 'ANORI.VN');
        $mail->addAddress($to);     //Add a recipient      

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function isPost(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        return true;
    }
    return false;
}

function isGet(){
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        return true;
    }
    return false;
}

function getBody(){
    $bodyArr = [];
   if(isGet()){
        if(!empty($_GET)){
            foreach($_POST as $key => $value){
                $key = trim(strip_tags($key));
                if(is_array($value)){
                    $bodyArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                }else{
                    $bodyArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }  
   }

   if(isPost()){
        if(!empty($_POST)){
            foreach($_POST as $key => $value){
                if(is_array($value)){
                    $bodyArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                }else{
                    $bodyArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        } 
   }    
   return $bodyArr;
    
}

// hàm kiểm tra định dạng email
function isMail($email){
    $check = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $check;
}
function isNumberInt($int){
    $check = filter_var($int, FILTER_VALIDATE_INT);
    return $check;
}



