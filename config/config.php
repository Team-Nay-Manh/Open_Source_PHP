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


include_once("function.php");
include_once("DB.php");
?>