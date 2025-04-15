<?php
include '../config/config.php';
$msg = '';
if ($_POST) {
  if (getPOST('email') == 'admin' && getPOST('password') == 'teamnaymanh') {
    $_SESSION['admin'] = '1';
    header('Location: index.html');
  } else {
    $msg = 'Đăng nhập thất bại, vui lòng thử lại!';
  }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css" />
  <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css" />
  <link rel="stylesheet" href="assets/css/magnific-popup.css" />
  <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css" />
  <link rel="stylesheet" href="assets/css/select2.min.css" />
  <link rel="stylesheet" href="assets/css/admin.css" />

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="assets/icon/favicon-32x32.png" sizes="32x32" />
  <link rel="apple-touch-icon" href="assets/icon/favicon-32x32.png" />

  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <title>Admin - Đăng nhập</title>

</head>

<body>
  <style>
    /* Form chính */
    .sign__form {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
      width: 100%;
      max-width: 360px;
      padding: 2rem;
      background: #1d1515f5;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
      margin: 0 auto;
    }

    /* Logo */
    .sign__logo {
      display: block;
      text-align: center;
    }

    .sign__logo img {
      max-width: 120px;
      height: auto;
      transition: transform 0.2s ease-in-out;
    }

    .sign__logo:hover img {
      transform: scale(1.03);
    }

    /* Input group */
    .sign__group {
      position: relative;
    }

    .sign__input {
      width: 100%;
      padding: 12px 16px;
      border: 1px solid #e5e7eb;
      border-radius: 6px;
      font-size: 1rem;
      background: #332b36;
      transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .sign__input:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .sign__input::placeholder {
      color: #6b7280;
      font-style: italic;
    }

    /* Button */
    .sign__btn {
      padding: 12px;
      background: linear-gradient(90deg, #3b82f6, #1d4ed8);
      border: none;
      border-radius: 6px;
      color: white;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .sign__btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .sign__btn:active {
      transform: translateY(0);
      box-shadow: 0 2px 6px rgba(59, 130, 246, 0.2);
    }

    /* Responsive */
    @media (max-width: 480px) {
      .sign__form {
        padding: 1.5rem;
        max-width: 100%;
        margin: 1rem;
      }

      .sign__input {
        padding: 10px 14px;
      }

      .sign__btn {
        padding: 10px;
      }

      .sign__logo img {
        max-width: 100px;
      }
    }

    /* Animation */
    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(15px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .sign__form {
      animation: slideUp 0.4s ease-out;
    }
  </style>

  <div class="sign section--bg" data-bg="assets/img/section/bg-image.png">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="sign__content">
            <!-- authorization form -->
            <form action="" method="POST" class="sign__form">
              <a href="index.html" class="sign__logo">
                <img src="assets/img/logo-.png" alt="" />
              </a>
              <div class="sign__group">
                <input type="text" class="sign__input" placeholder="tên đăng nhập" name="email" />
              </div>
              <div class="sign__group">
                <input type="password" class="sign__input" placeholder="mật khẩu" name="password" />
              </div>
              <button class="sign__btn" type="submit">Đăng nhập</button>
              <!--                                <span class="sign__text">Don't have an account? <a href="signup.html">Sign up!</a></span>
                                                                <span class="sign__text"><a href="forgot.html">Forgot password?</a></span>-->
            </form>
            <!-- end authorization form -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/jquery.mousewheel.min.js"></script>
  <script src="assets/js/jquery.mCustomScrollbar.min.js"></script>
  <script src="assets/js/select2.min.js"></script>
  <script src="assets/js/admin.js"></script>
</body>

</html>