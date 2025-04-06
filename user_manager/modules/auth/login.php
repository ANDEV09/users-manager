<?php
if(!defined('_INCODE')) die('Access deniced....');

require_once 'modules/users/headerlog.php';
require_once 'modules/users/footerlog.php';



if(isLogin()){
    redirect('?module=users');
}

if(isPost()){
    $body = getBody();
    $errors = [];
    if(empty($body['email']) || empty($body['password'])){
        setFlashData('msg', 'Vui lòng nhập đầy đủ thông tin');
        setFlashData('msg_type', 'danger');
        redirect('?module=auth&action=login');
    }else{
        // kiểm tra đăng nhập
        $email = trim($body['email']);
        $password = $body['password'];

        // truy vấn lấy thông tin user theo email
        $userQuery = firstRaw("SELECT id, password FROM users WHERE email = '$email'");
        
        if(!empty($userQuery)){
            $passwordHash = $userQuery['password'];
            $userId = $userQuery['id'];
            if(password_verify($password, $passwordHash)){

                // tạo token Login
                $tokenLogin = sha1(uniqid().time());

                // insert dữ liệu vào bảng login_token
                $dataToken = [
                    'userId' => $userId,
                    'token' => $tokenLogin,
                    'createAt' => date('Y-m-d H:i:s')
                ];
                $insertStatus = insert('login_token', $dataToken);

                if($insertStatus){
                    // insert token thành công

                    // lưu login token vào session
                    setSession('loginToken', $tokenLogin);

                    // chuyển hướng qua trang quản lí 
                    redirect('?module=users');
                }else{
                    setFlashData('msg', 'Đăng nhập thất bại');
                    setFlashData('msg_type', 'danger');
                    redirect('?module=auth&action=login');
                }
            }else{
                setFlashData('msg', 'Mật khẩu không chính xác');
                setFlashData('msg_type', 'danger');
                redirect('?module=auth&action=login');
            }
        }else{
            setFlashData('msg', 'Email không tồn tại');
            setFlashData('msg_type', 'danger');
            redirect('?module=auth&action=login');
        }

        redirect('?module=auth&action=login');
    }
   
    
    
}

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');


?>
<div class="login">
    <form class="form" method="post" action="">
     <div class="form-title"><span>Đăng Nhập Hệ Thống</span></div>
      <div class="title-2"><span>AN DEV</span></div>
      <?php if(!empty($msg)):  ?>
      <div class="alert alert-<?php echo $msgType; ?>"><?php echo $msg; ?></div>
      <?php endif; ?>
      <div class="input-container">
        <input class="input-mail" type="email" id="email" name="email" placeholder="Enter email">
        <span> </span>
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
        <input class="input-pwd" type="password" id="password" name="password" placeholder="Enter password">
      </div>
      <button type="submit" class="submit">
        <span class="sign-text">Sign in</span>
      </button>

      <p class="signup-link">
        <a href="?module=auth&action=register" class="up">Sign up!</a>
        | 
        <a href="?module=auth&action=forgotpassword" class="up">Forgot Password?</a>
      </p>
       
   </form>
</div>

