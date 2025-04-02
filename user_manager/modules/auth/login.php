<?php
if(!defined('_INCODE')) die('Access deniced....');
require_once 'modules/users/headerlog.php';
require_once 'modules/users/footerlog.php';
?>
<div class="login">
    <h2 class="login__title">Đăng Nhập Hệ Thống</h2>
    <form class="login__form" action="/login" method="POST">
        <div class="login__field">
            <label class="login__label" for="email">Email</label>
            <input class="login__input" type="email" id="email" name="email" placeholder="Nhập email" required>
        </div>
        <div class="login__field">
            <label class="login__label" for="password">Mật Khẩu</label>
            <input class="login__input" type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
        </div>
        <div class="login__actions">
            <button class="login__button" type="submit">Đăng Nhập</button>
            <div class="login__links">
                <a href="?module=auth&action=forgotpassword" class="login__link">Quên mật khẩu?</a>
                <span class="login__separator">|</span>
                <a href="?module=auth&action=register" class="login__link">Đăng ký</a>
            </div>
        </div>
    </form>
</div>