<?php
if(!defined('_INCODE')) die('Access deniced....');

require_once 'modules/users/headerlog.php';
require_once 'modules/users/footerlog.php';



?>
<div class="login">
    <form class="form">
     <div class="form-title"><span>Đăng Nhập Hệ Thống</span></div>
      <div class="title-2"><span>AN DEV</span></div>
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
        <a href="?module=auth&action=forgot" class="up">Forgot Password?</a>
      </p>
       
   </form>
</div>

