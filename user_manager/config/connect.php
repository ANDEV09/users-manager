<?php
if(!defined('_INCODE')) die('Access deniced....');

// Thông tin kết nối 
const _HOST = 'localhost';
const _USER = 'root';
const _PASS = '';
const _DB = 'an_dev';
const _DRIVER = 'mysql';

try{
    // Kiểm tra web sever có hỗ trợ PDO không
    if(class_exists('PDO')){
        // Tạo kết nối PDO
        $dns = _DRIVER.':dbname='._DB.';host='._HOST;

        $options = [
            // set names utf8 để hỗ trợ tiếng việt
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // đẩy lỗi vào ngoại lệ khi truy vấn
        ];
        $conn = new PDO($dns, _USER, _PASS, $options); // Tạo đối tượng PDO kết nối DB
    }
}catch (Exception $e){
    echo $e->getMessage().'</br>'; // in ra lỗi nếu có
    die('Kết nối thất bại'); // dừng chương trình nếu có lỗi
}