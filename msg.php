<?php
include 'config/config.php';
$msg = '';
if (getGET('msg')) $msg = htmlentities(getGET('msg'));
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="refresh" content="3;url=./" />
  <title>MSG Page</title>
</head>

<body>
  <h1>Thông báo!</h1>
  <p><?php echo $msg; ?></p>
</body>

</html>