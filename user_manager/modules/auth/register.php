<?php
if(!defined('_INCODE')) die('Access deniced....');
require_once 'modules/users/headerlog.php';
require_once 'modules/users/footerlog.php';




?>
<div class="login">
    <form class="form" action="?module=auth&action=register" method="POST">
     <div class="form-title"><span>Đăng Ký Tài Khoản</span></div>
      <div class="title-2"><span>AN DEV</span></div>
      
      <div class="input-container">
        <input class="input-mail" type="text" id="fullname" name="fullname" placeholder="Nhập họ và tên" required>
      </div>

      <div class="input-container">
        <input class="input-mail" type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
      </div>

      <div class="input-container">
        <input class="input-mail" type="email" id="email" name="email" placeholder="Nhập email" required>
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