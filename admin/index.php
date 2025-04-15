<?php
include '../config/config.php';

if (empty($_SESSION['admin'])) header('Location: login.html');

// include models
foreach (glob('../models/*.php') as $filename) include $filename;

// controller & views
$page = getREQUEST('page');
if (empty($page)) header('Location: index.html');

include_once('views/header.php');
$viewPath = getViewPage('views/' . $page . '.php');
if (!empty($viewPath)) {
  include $viewPath;
} else {
  echo '<div class="alert alert-danger">Không tìm thấy trang yêu cầu.</div>';
}
include_once('views/footer.php');
