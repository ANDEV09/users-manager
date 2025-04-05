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
        $mail->Password   = 'mjja jsde utut mtny';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('lamhoangan612@gmail.com', 'ANORI.VN');
        $mail->addAddress($to);     //Add a recipient      

        //Content
        $mail->isHTML(true);   
        $mail->CharSet = 'UTF-8';                               //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
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
            foreach($_GET as $key => $value){
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
function isPhone($phone) {
    $phone = trim($phone);
    if (!preg_match('/^0[0-9]{9}$/', $phone)) {
        return false;
    }
    return true;
}

// hàm thông báo
function showMsg($msg, $type='success'){
    if(!empty($msg)){
        echo '<div class="alert alert-'.$type.'">'.$msg.'</div>';
    }
}

// hàm chuyển hướng
function redirect($url=''){
    if(!empty($url)){
        header('Location: '.$url);
        exit();
    }
}

    

// hàm thông báo thành công
function showSuccessMsg($url=''){
    if(!empty($url)){
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: "Thành công!",
                text: "Đăng ký tài khoản thành công!",
                icon: "success",
                confirmButtonText: "OK",
                confirmButtonColor: "#3085d6",
                timer: 2000,
                timerProgressBar: true
            }).then((result) => {
                window.location.href = "'.$url.'";
            });
        </script>';
        exit();
    }
}

