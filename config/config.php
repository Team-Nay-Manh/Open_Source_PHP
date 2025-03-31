<?php
// error_reporting(0);
// error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

define('MYSQL_HOST', 'mysql');  // Đổi từ 'localhost' thành 'mysql'
define('MYSQL_USER', 'admin');   // Tên user trong docker-compose.yml
define('MYSQL_PASS', 'admin'); // Mật khẩu đã đặt trong docker-compose.yml
define('MYSQL_DB', 'da_php');   // Tên database

define('DATA_PER_PAGE', '9');

include_once("function.php");
include_once("DB.php");
?>
