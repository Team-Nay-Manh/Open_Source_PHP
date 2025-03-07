<?php
include 'config/config.php';
// include models
foreach (glob('models/*.php') as $filename) {
  // if (strpos($filename, 'header.php') !== false && strpos($filename, 'footer.php') !== false)
  include $filename;
}

// controller & views
$page = getREQUEST('page');
if (empty($page)) header('Location: index.html');

include_once('views/header.php');
include getViewPage('views/' . $page . '.php');
include_once('views/footer.php');
