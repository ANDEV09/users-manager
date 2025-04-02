<?php
if(!defined('_INCODE')) die('Access deniced....');
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Không Tìm Thấy Trang</title>
    <style>
        /* CSS để tạo giao diện đẹp */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
        }
        h1 {
            font-size: 100px;
            margin: 0;
            color: #e74c3c;
        }
        h2 {
            font-size: 24px;
            margin: 10px 0 20px;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #2980b9;
        }
        .icon {
            font-size: 50px;
            color: #e74c3c;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">⚠️</div>
        <h1>404</h1>
        <h2>Oops! Trang không tìm thấy</h2>
        <p>Rất tiếc, trang bạn đang tìm kiếm không tồn tại hoặc đã bị di chuyển. Hãy kiểm tra lại URL hoặc quay về trang chủ nhé!</p>
        <a href="<?php echo defined('BASE_URL') ? BASE_URL : 'http://localhost:8080/PHP%20LEARNING/Project01/user_manager/'; ?>">Quay về Trang Chủ</a>
    </div>
</body>
</html>