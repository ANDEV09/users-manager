<?php 
session_start();

// require file PHPMailer
require 'config/phpmailer/Exception.php';
require 'config/phpmailer/PHPMailer.php';
require 'config/phpmailer/SMTP.php';

require_once 'config.php';
require_once 'config/connect.php';
require_once 'config/functions.php';
require_once 'config/database.php';
require_once 'config/session.php';

$module = _MODULE_DEFAULT;
$action = _ACTION_DEFAULT;

if(!empty($_GET['module'])){
    if(is_string($_GET['module'])){
        $module = trim($_GET['module']);
    }   
}

if(!empty($_GET['action'])){
    if(is_string($_GET['action'])){
        $action = trim($_GET['action']);
    }   
}

$path = 'modules/' . $module . '/' . $action . '.php';

if(file_exists($path)){
    require_once $path;
}else{
    require_once 'modules/errors/404.php';
}