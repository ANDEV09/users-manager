<?php
if(!defined('_INCODE')) die('Access deniced....');
?>
<script type="text/javascript" src="<?php echo _WEB_HOST_TEMPLATE; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo _WEB_HOST_TEMPLATE; ?>/js/custom.js"></script>

    <footer class="footer">
        <div class="container">
            <div class="footer__content">
                <div class="footer__section">
                    <h3 class="footer__title">AN DEV</h3>
                    <p class="footer__text">Hệ thống quản lý người dùng chuyên nghiệp</p>
                </div>
                <div class="footer__section">
                    <h3 class="footer__title">Liên kết</h3>
                    <ul class="footer__list">
                        <li class="footer__list-item"><a href="?module=users" class="footer__link">Trang chủ</a></li>
                        <li class="footer__list-item"><a href="?module=users&action=lists" class="footer__link">Quản lý người dùng</a></li>
                        <li class="footer__list-item"><a href="?module=users&action=profile" class="footer__link">Hồ sơ</a></li>
                    </ul>
                </div>
                <div class="footer__section">
                    <h3 class="footer__title">Liên hệ</h3>
                    <p class="footer__text"><i class="fas fa-envelope footer__icon"></i> Email: support@andev.com</p>
                    <p class="footer__text"><i class="fas fa-phone footer__icon"></i> Phone: (84) 123-456-789</p>
                </div>
            </div>
            <div class="footer__bottom">
                <p>&copy; <?php echo date('Y'); ?> AN DEV. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
