<?php
if(!defined('_INCODE')) die('Access deniced....');
require_once 'modules/users/headerlog.php';
require_once 'modules/users/footerlog.php';
?>
<div class="login">
    <h2 class="login__title">Đăng Ký Tài Khoản</h2>
    <form class="login__form" action="?module=auth&action=register" method="POST">
        <div class="login__field">
            <label class="login__label" for="fullname">Họ và Tên</label>
            <input class="login__input" type="text" id="fullname" name="fullname" placeholder="Nhập họ và tên" required>
        </div>
        <div class="login__field">
            <label class="login__label" for="phone">Số Điện Thoại</label>
            <input class="login__input" type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
        </div>
        <div class="login__field">
            <label class="login__label" for="email">Email</label>
            <input class="login__input" type="email" id="email" name="email" placeholder="Nhập email" required>
        </div>
        <div class="login__field">
            <label class="login__label" for="password">Mật Khẩu</label>
            <input class="login__input" type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
        </div>
        <div class="login__field">
            <label class="login__label" for="confirm_password">Nhập Lại Mật Khẩu</label>
            <input class="login__input" type="password" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
        </div>
        <div class="login__actions">
            <button class="login__button" type="submit">Đăng Ký</button>
            <div class="login__links">
                <span>Đã có tài khoản?</span>
                <a href="?module=auth&action=login" class="login__link">Đăng nhập</a>
            </div>
        </div>
    </form>
</div>