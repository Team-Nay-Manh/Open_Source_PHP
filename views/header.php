<?php
$category = new Category();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/flaticon.css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="assets/css/odometer.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="assets/css/nice-select.css" />
    <link rel="stylesheet" href="assets/css/jquery.animatedheadline.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

    <!-- <c:choose>
        <c:when test="${not empty title}">
            <title>Boleto - ${title}</title>
        </c:when>
        <c:otherwise> -->
    <title>Boleto - Đặt vé phim trực tuyến</title>
    <!-- </c:otherwise>
    </c:choose> -->

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
    <!-- ==========Overlay========== -->
    <div class="overlay"></div>
    <a href="#0" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="./">
                        <img src="assets/images/logo/logo.png" alt="logo">
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        <a href="./">Home</a>
                    </li>
                    <li>
                        <a href="films.html">Phim</a>
                    </li>
                    <li>
                        <a href="#">Thể loại</a>
                        <ul class="submenu">
                            <?php
                            foreach ($category->GetCategories() as $k => $v) {
                            ?>
                                <li><a href="films.html?category_id=<?php echo $v['id']; ?>"><?php echo $v['name']; ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li>
                        <?php if (empty($_SESSION['user_id'])) { ?>
                            <a href="sign-in.html">Đăng nhập</a>
                        <?php
                        } else {
                        ?>
                            <a href="#">Xin chào bạn!</a>
                            <ul class="submenu">
                                <li>
                                    <a href="profile.html">Trang cá nhân</a>
                                </li>
                                <li>
                                    <a href="history.html">Lịch sử mua vé</a>
                                </li>
                                <li>
                                    <a href="logout.html">Đăng xuất</a>
                                </li>
                            </ul>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
    <!-- ==========Header-Section========== -->