<?php
// error_reporting(0);
// error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '');
define('MYSQL_DB', 'da_php');
define('DATA_PER_PAGE', '9');
define('DIALOGFLOW_AGENT_ID','6e08a620-4272-4ba0-be06-c4f3b7366ddf');
define('DIALOGFLOW_LANGUAGE_CODE','vi');
define('DIALOGFLOW_CHAT_TITLE','Vì Tinh Tú - Chatbot');
define('DIALOGFLOW_CHAT_ICON','https://cdn-icons-png.flaticon.com/512/4954/4954813.png');
include_once("function.php");
include_once("DB.php");
