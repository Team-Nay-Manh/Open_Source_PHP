<?php
include 'config/config.php';
include 'models/user.php';
$msg = '';
if ($_POST) {
    $user = new User();
    $result = $user->login($_POST['email'], $_POST['password']);
    if ($result) {
        $_SESSION['user_id'] = $result['id'];
        if (getGET('url'))
            header('Location: ' . getGET('url'));
        else
            header('Location: index.html');
    } else {
        $msg = 'Đăng nhập thất bại, vui lòng thử lại!';
    }
}
?>

<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/odometer.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <title>Boleto - Đăng ký</title>


</head>

<body>
    <!-- ==========Preloader========== -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ==========Preloader========== -->

    <!-- ==========Sign-In-Section========== -->
    <section class="account-section bg_img" data-background="./assets/images/account/account-bg.jpg">
        <div class="container">
            <div class="padding-top padding-bottom">
                <div class="account-area">
                    <div class="section-header-3">
                        <span class="cate">hello</span>
                        <h2 class="title">welcome back</h2>
                    </div>
                    <form class="account-form" action="" method="POST">
                        <div class="form-group">
                            <p><?php echo $msg; ?></p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span>*</span></label>
                            <input type="email" placeholder="Email" id="email" name="email" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu <span>*</span></label>
                            <input type="password" placeholder="Password" id="password" name="password" required />
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Đăng Nhập">
                        </div>
                    </form>
                    <div class="option">Chưa có tài khoản? <a href="sign-up.html">Đăng ký</a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Sign-In-Section========== -->


    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/countdown.min.js"></script>
    <script src="assets/js/odometer.min.js"></script>
    <script src="assets/js/viewport.jquery.js"></script>
    <script src="assets/js/nice-select.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>