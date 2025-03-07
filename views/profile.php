<?php
if (empty($_SESSION['user_id'])) header('Location: index.html');
$msg = '';
$user = new User();
$u = $user->GetUserByID($_SESSION['user_id']);

if (!empty($_POST['update-profile'])) {
    $user->UpdateProfile($_SESSION['user_id'], getPOST('full_name'), getPOST('phone'), getPOST('address'));
    $u = $user->GetUserByID($_SESSION['user_id']);
} else if (!empty($_POST['change-pass'])) {
    if (getPOST('password2') == getPOST('repassword2')) {
        if ($u['password'] == sha1(getPOST('password2')))
            if ($user->UpdatePassword($_SESSION['user_id'], getPOST('password2')))
                $msg = 'Cập nhật mật khẩu thành công!';
            else $msg = 'Không thể cập nhật mật khẩu, vui lòng thử lại!';
        else $msg = 'Mật khẩu cũ không chính xác!';
    } else $msg = 'Mật khẩu nhập lại không trùng khớp!';
}

$booking = new Booking();
?>
<!-- ==========Banner-Section========== -->
<section class="main-page-header speaker-banner bg_img" data-background="./assets/images/banner/banner07.jpg">
    <div class="container">
        <div class="speaker-banner-content">
            <h2 class="title">Trang cá nhân</h2>
        </div>
    </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Contact-Section========== -->
<section class="contact-section padding-top">
    <div class="contact-container">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-7 col-lg-6 col-xl-5">
                    <div class="section-header-3 left-style">
                        <span class="cate">Thông tin của bạn</span>
                    </div>
                    <form class="contact-form" id="form_submit_profile" action="" method="POST" enctype="application/x-www-form-urlencoded;charset=UTF-8" accept-charset="UTF-8">
                        <div class="form-group">
                            <label for="full_name">Họ tên <span>*</span></label>
                            <input type="text" name="full_name" id="full_name" value="<?php echo $u['full_name']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span>*</span></label>
                            <input type="email" name="email" id="email" value="<?php echo $u['email']; ?>" disabled />
                        </div>
                        <div class="form-group">
                            <label for="phone">SDT <span>*</span></label>
                            <input type="text" name="phone" id="phone" value="<?php echo $u['phone']; ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <textarea name="address" id="address"><?php echo $u['address']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update-profile" value="Thay đổi" />
                        </div>
                    </form>
                </div>
                <div class="col-md-5 col-lg-6">
                    <div class="section-header-3 left-style">
                        <span class="cate">Đổi mật khẩu</span>
                    </div>
                    <form class="contact-form" id="form_submit_password" action="" method="POST">
                        <div class="form-group">
                            <label><?php echo $msg; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu cũ <span>*</span></label>
                            <input type="password" name="password" id="password" required />
                        </div>
                        <div class="form-group">
                            <label for="password2">Mật khẩu mới <span>*</span></label>
                            <input type="password" name="password2" id="password2" required />
                        </div>
                        <div class="form-group">
                            <label for="repassword2">Nhập lại mật khẩu mới <span>*</span></label>
                            <input type="password" name="repassword2" id="repassword2" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="change-pass" value="Thay đổi" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Contact-Section========== -->

<!-- ==========Contact-Counter-Section========== -->
<section class="contact-counter padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center mb-30-none">
            <div class="col-sm-6 col-md-3">
                <div class="contact-counter-item">
                    <div class="contact-counter-thumb">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="contact-counter-content">
                        <div class="counter-item">
                            <h5 class="title odometer" data-odometer-final="<?php echo $booking->GetCountBookingsByUserId($_SESSION['user_id']); ?>">0</h5>
                            <!--<h5 class="title">k</h5>-->
                        </div>
                        <p>Số lần đã đặt</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Contact-Counter-Section========== -->