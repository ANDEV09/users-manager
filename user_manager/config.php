<?php
// file này chứa hằng số cấu hình
const _MODULE_DEFAULT = 'home';
const _ACTION_DEFAULT = 'lists'; 

const _INCODE = true; // ngăn chặn hành vi truy cập trực tiếp vào các file http://localhost:8080/PHP%20LEARNING/Project01/user_manager/?module=auth&action=login

// thiết lập host
define('_WEB_HOST_ROOT', 'http://'.$_SERVER['HTTP_HOST'].'/PHP%20LEARNING/Project01/user_manager'); // Địa chỉ trang chủ

define('_WEB_HOST_TEMPLATE', _WEB_HOST_ROOT.'/assets');
define('_WEB_HOST_TEMPLATE_ROOT', _WEB_HOST_ROOT.'/templates');