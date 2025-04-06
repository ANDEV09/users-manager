<?php
if(!defined('_INCODE')) die('Access deniced....');

if(!isLogin()){
    redirect('?module=auth&action=login');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - AN DEV</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE_ROOT; ?>/css/style.css">
</head>
<body>
    <header class="header">
        <div class="container header__content">
            <a href="?module=users" class="header__logo">AN DEV</a>
            <nav>
                <ul class="nav">
                    <li><a href="?module=users" class="nav__item">Trang chủ</a></li>
                    <li><a href="?module=users&action=lists" class="nav__item">Quản lý người dùng</a></li>
                    <li><a href="?module=users&action=profile" class="nav__item">Hồ sơ</a></li>
                </ul>
            </nav>
            <div class="user-menu">
                <div class="user-menu__avatar">
                    <i class="fas fa-user"></i>
                </div>Hi, Admin
                <a href="?module=auth&action=logout" class="user-menu__logout">
                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
                </a>
            </div>
        </div>
    </header>
</body>
</html>
