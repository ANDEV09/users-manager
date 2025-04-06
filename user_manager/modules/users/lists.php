<?php
if(!defined('_INCODE')) die('Access deniced....');

$checkLogin = false;
// kiểm tra trạng thái đăng nhập

if(!isLogin()){
    redirect('?module=auth&action=login');
}
?>