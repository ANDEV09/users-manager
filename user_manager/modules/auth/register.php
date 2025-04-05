<?php
if(!defined('_INCODE')) die('Access deniced....');
require_once 'modules/users/headerlog.php';
require_once 'modules/users/footerlog.php';


if(isPost()){

    // Validate form
    $body = getBody(); // lấy tất cả dữ liệu của form

    $errors = []; // mảng lưu lỗi

    if(empty(trim($body['fullname']))){
        $errors['fullname']['required'] = 'Họ và tên không được để trống';
    }else{
        if(strlen(trim($body['fullname'])) < 5){
            $errors['fullname']['min'] = 'Họ và tên phải có ít nhất 5 ký tự';
        }
    }
    if(empty(trim(trim($body['phone'])))){
        $errors['phone']['required'] = 'Số điện thoại không được để trống';
    }else{
        if(!isPhone(trim($body['phone']))){
            $errors['phone']['isPhone'] = 'Số điện thoại không hợp lệ';
        }
    }
    if(empty(trim($body['email']))){
        $errors['email']['required'] = 'Email không được để trống';
    }else{
        if(!isMail(trim($body['email']))){
            $errors['email']['isMail'] = 'Email không hợp lệ';
        }
    }
    if(empty(trim($body['password']))){
        $errors['password']['required'] = 'Mật khẩu không được để trống';
    }else{
        if(strlen(trim($body['password'])) < 6){
            $errors['password']['min'] = 'Mật khẩu phải có ít nhất 6 ký tự';
        }
    }
    if(empty(trim($body['confirm_password']))){
        $errors['confirm_password']['required'] = 'Mật khẩu không được để trống';
    }else{
        if(trim($body['password']) !== trim($body['confirm_password'])){
            $errors['confirm_password']['match'] = 'Mật khẩu không khớp';
        }
    }
    if(empty($errors)){
        $activeToken = sha1(uniqid().time());
        $dataInsert = [
            'fullname' => $body['fullname'],
            'phone' => $body['phone'],
            'email' => $body['email'],
            'password' => password_hash($body['password'], PASSWORD_DEFAULT),
            'activeToken' => $activeToken,
            'createAt' => date('Y-m-d H:i:s')
        ];
        $insertStatus = insert('users', $dataInsert);

        if($insertStatus){
            // tạo link kích hoạt tài khoản
            $activeLink = _WEB_HOST_ROOT.'/?module=auth&action=active&token='.$activeToken;

            $subject = $body['fullname'].' - Vui lòng kích hoạt tài khoản';

            $content = 'chào bạn '.$body['fullname'].'
            </br>vui lòng click vào link dưới đây để kích hoạt tài khoản
            <a href="'.$activeLink.'">Kích hoạt tài khoản</a><br>';
            $content .= 'Trân Trọng! ';

            $sendMailStatus = sendMail($body['email'], $subject, $content);

            if($sendMailStatus){
                setFlashData('msg', 'Đăng ký tài khoản thành công, vui lòng kiểm tra email để kích hoạt tài khoản');
                setFlashData('msg_type', 'success');
            }else{
                setFlashData('msg', 'Hệ thống đang gặp sự cố, vui lòng thử lại sau');
                setFlashData('msg_type', 'danger');
            }
        }else{
            setFlashData('msg', 'Đăng ký tài khoản thất bại, vui lòng thử lại');
            setFlashData('msg_type', 'danger');
        }
    }

    $msg = getFlashData('msg');
    $msg_type = getFlashData('msg_type');
}



?>
<div class="login">
    <form class="form" action="?module=auth&action=register" method="POST">
     <div class="form-title"><span>Đăng Ký Tài Khoản</span></div>
      <div class="title-2"><span>AN DEV</span></div>

      <?php 
           echo (!empty($errors['fullname'])) ? '<div class="alert alert-danger">'.reset($errors['fullname']).'</div>' : false;
           echo (!empty($errors['phone'])) ? '<div class="alert alert-danger">'.reset($errors['phone']).'</div>' : false;
           echo (!empty($errors['email'])) ? '<div class="alert alert-danger">'.reset($errors['email']).'</div>' : false;
           echo (!empty($errors['password'])) ? '<div class="alert alert-danger">'.reset($errors['password']).'</div>' : false;
           echo (!empty($errors['confirm_password'])) ? '<div class="alert alert-danger">'.reset($errors['confirm_password']).'</div>' : false;
           echo (!empty($msg)) ? '<div class="alert alert-'.$msg_type.'">'.$msg.'</div>' : false;
      ?>
      
      <div class="input-container">
        <input class="input-mail" type="text" id="fullname" name="fullname" placeholder="Nhập họ và tên" required><br>
      </div>

      <div class="input-container">
        <input class="input-mail" type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required><br>
      </div>

      <div class="input-container">
        <input class="input-mail" type="email" id="email" name="email" placeholder="Nhập email" required><br>
      </div>

      <section class="bg-stars">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
      </section>

      <div class="input-container">
        <input class="input-pwd" type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
      </div>

      <div class="input-container">
        <input class="input-pwd" type="password" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
      </div>

      <button type="submit" class="submit">
        <span class="sign-text">Sign up</span>
      </button>

      <p class="signup-link">
        Already have an account?
        <a href="?module=auth&action=login" class="up">Sign in!</a>
      </p>
       
   </form>
</div>