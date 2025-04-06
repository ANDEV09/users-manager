<?php
if(!defined('_INCODE')) die('Access deniced....');
require_once 'modules/users/header.php';
?>

<div class="container">
    <div class="content-header">
        <h1 class="content-header__title">Quản lý người dùng</h1>
        <div class="content-header__actions">
            <form action="" method="get" class="search-form">
                <input type="hidden" name="module" value="users">
                <input type="hidden" name="action" value="lists">
                <input type="text" name="keyword" placeholder="Tìm kiếm người dùng..." class="search-form__input">
                <button type="submit" class="search-form__button"><i class="fas fa-search"></i></button>
            </form>
            <a href="?module=users&action=add" class="btn btn--add">
                <i class="fas fa-plus"></i> Thêm người dùng
            </a>
        </div>
    </div>

    <div class="alert alert--success">Thao tác thành công!</div>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th class="table__cell table__header" width="5%">STT</th>
                    <th class="table__cell table__header">Họ tên</th>
                    <th class="table__cell table__header">Email</th>
                    <th class="table__cell table__header">Điện thoại</th>
                    <th class="table__cell table__header">Trạng thái</th>
                    <th class="table__cell table__header" width="15%">Thời gian</th>
                    <th class="table__cell table__header" width="10%">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="table__cell">1</td>
                    <td class="table__cell">Nguyễn Văn A</td>
                    <td class="table__cell">nguyenvana@gmail.com</td>
                    <td class="table__cell">0123456789</td>
                    <td class="table__cell">
                        <span class="status status--active">Đang hoạt động</span>
                    </td>
                    <td class="table__cell">20/03/2024 10:30:00</td>
                    <td class="table__cell actions">
                        <a href="#" class="btn btn--edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn--delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="table__cell">2</td>
                    <td class="table__cell">Trần Thị B</td>
                    <td class="table__cell">tranthib@gmail.com</td>
                    <td class="table__cell">0987654321</td>
                    <td class="table__cell">
                        <span class="status status--inactive">Đã khóa</span>
                    </td>
                    <td class="table__cell">19/03/2024 15:45:00</td>
                    <td class="table__cell actions">
                        <a href="#" class="btn btn--edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn--delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="table__cell">3</td>
                    <td class="table__cell">Lê Văn C</td>
                    <td class="table__cell">levanc@gmail.com</td>
                    <td class="table__cell">0369852147</td>
                    <td class="table__cell">
                        <span class="status status--active">Đang hoạt động</span>
                    </td>
                    <td class="table__cell">18/03/2024 09:15:00</td>
                    <td class="table__cell actions">
                        <a href="#" class="btn btn--edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn--delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <a href="#" class="pagination__item">
            <i class="fas fa-angle-left"></i>
        </a>
        <a href="#" class="pagination__item pagination__item--active">1</a>
        <a href="#" class="pagination__item">2</a>
        <a href="#" class="pagination__item">3</a>
        <a href="#" class="pagination__item">
            <i class="fas fa-angle-right"></i>
        </a>
    </div>
</div>

<?php
require_once 'modules/users/footer.php';
?>