<?php
if(!defined('_INCODE')) die('Access deniced....');
require_once 'modules/users/headerlog.php';
require_once 'modules/users/footerlog.php';
?>
<div class="login">
    <h2 class="login__title">Quên Mật Khẩu</h2>
    <p class="login__description">Nhập email của bạn để nhận hướng dẫn đặt lại mật khẩu</p>
    <form class="login__form" action="?module=auth&action=forgot" method="POST">
        <div class="login__field">
            <label class="login__label" for="email">Email</label>
            <input class="login__input" type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
        </div>
        <div class="login__actions">
            <button class="login__button" type="submit">Gửi Yêu Cầu</button>
            <div class="login__links">
                <a href="?module=auth&action=login" class="login__link">Quay lại đăng nhập</a>
            </div>
        </div>
    </form>
</div>