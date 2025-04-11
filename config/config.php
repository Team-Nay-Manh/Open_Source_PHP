<?php
// error_reporting(0);
// error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

define('MYSQL_HOST', 'localhost');  // Đổi từ 'localhost' thành 'mysql'
define('MYSQL_USER', 'root');   // Tên user trong docker-compose.yml
define('MYSQL_PASS', ''); // Mật khẩu đã đặt trong docker-compose.yml
define('MYSQL_DB', 'da_php');
define('DATA_PER_PAGE', '6');
define('DIALOGFLOW_AGENT_ID', '6e08a620-4272-4ba0-be06-c4f3b7366ddf');
define('DIALOGFLOW_LANGUAGE_CODE', 'vi');
define('DIALOGFLOW_CHAT_TITLE', 'Vì Tinh Tú - Chatbot');
define('DIALOGFLOW_CHAT_ICON', 'https://cdn-icons-png.flaticon.com/512/4954/4954813.png');

include_once("function.php");
include_once("DB.php");
