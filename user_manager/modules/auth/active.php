<?php
if(!defined('_INCODE')) die('Access deniced....');
require_once 'modules/users/headerlog.php';

$activeToken = getBody()['token'];

if(!empty($activeToken)){
    // truy vấn kiểm tra token với db
    $tokenQuery = firstRaw("SELECT * FROM users WHERE activeToken = '$activeToken'");
    if(!empty($tokenQuery)){
        // cập nhật trạng thái tài khoản
        $dataUpdate = [
            'status' => 1,
            'activeToken' => null
        ];
        $condition = ['id' => $tokenQuery['id']];
        $updateStatus = update('users', $dataUpdate, $condition);

        if($updateStatus){
            setFlashData('msg', 'Kích hoạt tài khoản thành công');
            setFlashData('msg_type', 'success');
            
            // gửi mail khi kích hoạt thành công
            $loginLink = _WEB_HOST_ROOT.'/?module=auth&action=login';
            $subject = 'Kích hoạt tài khoản thành công';
            $content = 'Chúc mừng '.$tokenQuery['fullname'].', tài khoản của bạn đã được kích hoạt thành công.</br> Bạn có thể đăng nhập ngay bây giờ!</br>
            <a href="'.$loginLink.'">Đăng nhập ngay</a></br> Trân Trọng!';

            sendMail($tokenQuery['email'], $subject, $content);

        }else{
            setFlashData('msg', 'Kích hoạt tài khoản thất bại, Vui lòng liên hệ quản trị viên');
            setFlashData('msg_type', 'danger');
        }
        redirect(_WEB_HOST_ROOT.'/?module=auth&action=login');
    }else{
        showMsg('Kích hoạt tài khoản thất bại, Liên kết không tồn tại hoặc đã hết hạn', 'danger');
    }
}else{
    showMsg('Token không tồn tại', 'danger');
}
require_once 'modules/users/footerlog.php';