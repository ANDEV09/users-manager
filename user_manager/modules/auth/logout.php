<?php
if(!defined('_INCODE')) die('Access deniced....');

if(isLogin()){
   $token = getSession('loginToken');
   delete('login_token', $token);
   removeSession('loginToken');
   redirect('?module=auth&action=login');
}

