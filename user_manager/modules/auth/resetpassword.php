<?php
if(!defined('_INCODE')) die('Access deniced....');
require_once 'modules/users/headerlog.php';
require_once 'modules/users/footerlog.php';

$activeToken = getBody()['token'];

if(!empty($activeToken)){
    $queryUser = firstRaw("SELECT * FROM users WHERE forgotToken = '$activeToken'");
    if(!empty($queryUser)){
        $userId = $queryUser['id'];
        if(isPost()){
            $body = getBody();
            $errors = [];
            if(empty(trim($body['password']))){
                $errors['password']['required'] = 'Mật khẩu không được để trống';
            }else{
                if(strlen(trim($body['password'])) < 6){
                    $errors['password']['min'] = 'Mật khẩu phải có ít nhất 6 ký tự';
                }
            }
            if(empty(trim($body['confirm_password']))){
                $errors['confirm_password']['required'] = 'Mật khẩu xác nhận không được để trống';
            }else{
                if(trim($body['password']) !== trim($body['confirm_password'])){
                    $errors['confirm_password']['match'] = 'Mật khẩu không khớp';
                }
            }
            if(empty($errors)){
                // xử lí update mật khẩu
                $dataUpdate = [
                    'password' => password_hash($body['password'], PASSWORD_DEFAULT),
                    'forgotToken' => null,
                    'updateAt' => date('Y-m-d H:i:s')
                ];
                $condition = ['id' => $userId];
                $updateStatus = update('users', $dataUpdate, $condition);
                if($updateStatus){
                    setFlashData('msg', 'Đặt lại mật khẩu thành công');
                    setFlashData('msg_type', 'success');
                    redirect('?module=auth&action=login');
                }else{
                    setFlashData('msg', 'Đặt lại mật khẩu thất bại');
                    setFlashData('msg_type', 'danger');

                    // gửi mail thông báo đặt lại mật khẩu thành công
                    $subject = 'Thông báo đặt lại mật khẩu thành công';
                    $content = 'Chúc mừng bạn đã đặt lại mật khẩu thành công';
                    $sendMailStatus = sendMail($queryUser['email'], $subject, $content);

                    redirect('?module=auth&action=resetpassword&token='.$activeToken);
                }
            }else{
                //redirect('?module=auth&action=resetpassword&token='.$activeToken);
            }
            
        }

        $msg = getFlashData('msg');
        $msg_type = getFlashData('msg_type');

        ?>
        
        <div class="login">
            <form class="form" method="post" action="">
                <div class="form-title"><span>Đặt Lại Mật Khẩu</span></div>
                <div class="title-2"><span>AN DEV</span></div>
                
                <?php 
                    echo (!empty($errors['password'])) ? '<div class="alert alert-danger">'.reset($errors['password']).'</div>' : false;
                    echo (!empty($errors['confirm_password'])) ? '<div class="alert alert-danger">'.reset($errors['confirm_password']).'</div>' : false;
                ?>
                    <?php if(!empty($msg)): ?>
                        <div class="alert alert-<?php echo $msg_type; ?>"><?php echo $msg; ?></div>
                    <?php endif; ?>
                
                
                <div class="input-container">
                    <input class="input-pwd" type="password" name="password" placeholder="Nhập mật khẩu mới">
                </div>

                <div class="input-container">
                    <input class="input-pwd" type="password" name="confirm_password" placeholder="Xác nhận mật khẩu mới">
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
                    <span class="sign-text">Đặt Lại Mật Khẩu</span>
                </button>

                <p class="signup-link">
                    <a href="?module=auth&action=login" class="up">Quay lại đăng nhập</a>
                <input type="hidden" name="token" value="<?php echo $activeToken; ?>">
                </p>
            </form>
        </div>
        <?php
    }else{
        showMsg('Token không tồn tại hoặc đã hết hạn', 'danger');
    }
    
}else{
    showMsg('Token không tồn tại hoặc đã hết hạn', 'danger');
}

?>