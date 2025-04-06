<?php
if(!defined('_INCODE')) die('Access deniced....');
require_once 'modules/users/headerlog.php';
require_once 'modules/users/footerlog.php';

if(isPost()){
    $body = getBody();
    if(!empty($body['email'])){
        $email = trim($body['email']);  
        $queryUser = firstRaw("SELECT id FROM users WHERE email = '$email'");
        if(!empty($queryUser)){
            $userId = $queryUser['id'];
            $tokenReset = sha1(uniqid().time());
            $dataUpdate = [
                'forgotToken' => $tokenReset
            ];
            $updateStatus = update('users', $dataUpdate, ['id' => $userId]);
            $linkReset = _WEB_HOST_ROOT.'?module=auth&action=resetpassword&token='.$tokenReset;
            if($updateStatus){
                // thiết lập gửi mail
            $subject = 'Yêu cầu khôi phục mật khẩu';
            $content = 'chào bạn
            </br>vui lòng click vào link dưới đây để khôi phục mật khẩu
            <a href="'.$linkReset.'">Khôi phục mật khẩu</a><br>';
            $content .= 'Trân Trọng! ';

                
            // tiến hành gửi mail
            $mailStatus = sendMail($email, $subject, $content);
            if($mailStatus){
                setFlashData('msg', 'Hướng dẫn đặt lại mật khẩu đã được gửi đến email của bạn!');
                setFlashData('msg_type', 'success');
            }else{
                setFlashData('msg', 'Lỗi gửi mail, vui lòng thử lại sau');
                setFlashData('msg_type', 'danger');
            }
            }else{
                setFlashData('msg', 'Lỗi hệ thống, vui lòng thử lại sau');
                setFlashData('msg_type', 'danger');
            }
            

        }else{
            setFlashData('msg', 'Địa chỉ email không tồn tại');
            setFlashData('msg_type', 'danger');
        }
    }else{
        setFlashData('msg', 'Vui lòng nhập địa chỉ email');
        setFlashData('msg_type', 'success');
    }
    redirect('?module=auth&action=forgotpassword');
}

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
?>
<div class="login">
    <form class="form" method="post" action="">
        <div class="form-title"><span>Quên Mật Khẩu</span></div>
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

        <button type="submit" class="submit">
            <span class="sign-text">Gửi Yêu Cầu</span>
        </button>

        <p class="signup-link">
            <a href="?module=auth&action=login" class="up">Quay lại đăng nhập</a>
        </p>
    </form>
</div>