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
  <title>Trang quản trị Admin</title>

  <style>
    /* Reset cơ bản */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: #26313c;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 260px;
      height: 100vh;
      background: linear-gradient(180deg, #2c3e50 0%, #1a252f 100%);
      color: #fff;
      padding: 20px 15px;
      display: flex;
      flex-direction: column;
      transition: width 0.3s ease;
      overflow-y: auto;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Logo */
    .sidebar__logo {
      display: block;
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar__logo img {
      max-width: 120px;
      transition: transform 0.2s ease;
    }

    .sidebar__logo:hover img {
      transform: scale(1.05);
    }

    /* User section */
    .sidebar__user {
      display: flex;
      align-items: center;
      padding: 15px;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 10px;
      margin-bottom: 25px;
    }

    .sidebar__user-img {
      width: 40px;
      height: 40px;
      margin-right: 12px;
    }

    .sidebar__user-img img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
    }

    .sidebar__user-title {
      flex-grow: 1;
    }

    .sidebar__user-title span {
      display: block;
      font-size: 14px;
      font-weight: 600;
    }

    .sidebar__user-title p {
      font-size: 12px;
      opacity: 0.7;
    }

    .sidebar__user-btn {
      background: none;
      border: none;
      padding: 5px;
      cursor: pointer;
    }

    .sidebar__user-btn svg {
      width: 20px;
      height: 20px;
      fill: #e74c3c;
      transition: transform 0.2s ease;
    }

    .sidebar__user-btn:hover svg {
      transform: scale(1.1);
    }

    /* Navigation */
    .sidebar__nav {
      list-style: none;
      flex-grow: 1;
    }

    .sidebar__nav-item {
      margin-bottom: 5px;
    }

    .sidebar__nav-link {
      display: flex;
      align-items: center;
      padding: 12px 15px;
      color: rgba(255, 255, 255, 0.9);
      text-decoration: none;
      border-radius: 8px;
      transition: all 0.2s ease;
      font-size: 14px;
      font-weight: 500;
    }

    .sidebar__nav-link svg {
      width: 20px;
      height: 20px;
      margin-right: 12px;
      fill: rgba(255, 255, 255, 0.7);
      transition: fill 0.2s ease;
    }

    .sidebar__nav-link:hover {
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
    }

    .sidebar__nav-link:hover svg {
      fill: #fff;
    }

    /* Copyright */
    .sidebar__copyright {
      text-align: center;
      font-size: 12px;
      opacity: 0.6;
      padding-top: 20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .sidebar {
        width: 80px;
        padding: 15px 10px;
      }

      .sidebar__logo img {
        max-width: 50px;
      }

      .sidebar__user-title,
      .sidebar__copyright,
      .sidebar__nav-link span {
        display: none;
      }

      .sidebar__user {
        padding: 10px;
        justify-content: center;
      }

      .sidebar__user-img {
        margin-right: 0;
      }

      .sidebar__nav-link {
        justify-content: center;
        padding: 12px;
      }

      .sidebar__nav-link svg {
        margin-right: 0;
      }
    }

    @media (min-width: 769px) {
      .sidebar__nav-link span {
        display: inline;
      }
    }
  </style>

</head>

<body>

  <!-- header -->
  <header class="header">
    <div class="header__content">
      <!-- header logo -->
      <a href="index.html" class="header__logo">
        <img src="assets/img/logo-.png" alt="" />
      </a>
      <!-- end header logo -->

      <!-- header menu btn -->
      <button class="header__btn" type="button">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <!-- end header menu btn -->
    </div>
  </header>
  <!-- end header -->

  <!-- sidebar -->
  <div class="sidebar">
    <!-- sidebar logo -->
    <!-- <a href="index.html" class="sidebar__logo">
      <img src="assets/img/logo-.png" alt="" />
    </a> -->
    <!-- end sidebar logo -->

    <!-- sidebar user -->
    <div class="sidebar__user">
      <div class="sidebar__user-img">
        <img src="assets/img/user2.png" alt="" />
      </div>

      <div class="sidebar__user-title">
        <span>Administrator</span>
        <p>Admin</p>
      </div>

      <a href="logout.html" class="sidebar__user-btn" type="button" title="Đăng xuất">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z">
          </path>
        </svg>
      </a>
    </div>
    <!-- end sidebar user -->

    <!-- sidebar nav -->
    <ul class="sidebar__nav">
      <li class="sidebar__nav-item">
        <a href="index.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z" />
          </svg>Trang chủ</a>
      </li>
      <li class="sidebar__nav-item">
        <a href="countries.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z" />
          </svg>Quốc gia</a>
      </li>
      <li class="sidebar__nav-item">
        <a href="categories.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z" />
          </svg>Thể loại</a>
      </li>
      <li class="sidebar__nav-item">
        <a href="cinemas.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z" />
          </svg>Rạp</a>
      </li>
      <li class="sidebar__nav-item">
        <a href="films.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M20.61,19.19A7,7,0,0,0,17.87,8.62,8,8,0,1,0,3.68,14.91L2.29,16.29a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,18H8.69A7,7,0,0,0,15,22h6a1,1,0,0,0,.92-.62,1,1,0,0,0-.21-1.09ZM8,15a6.63,6.63,0,0,0,.08,1H5.41l.35-.34a1,1,0,0,0,0-1.42A5.93,5.93,0,0,1,4,10a6,6,0,0,1,6-6,5.94,5.94,0,0,1,5.65,4c-.22,0-.43,0-.65,0A7,7,0,0,0,8,15ZM18.54,20l.05.05H15a5,5,0,1,1,3.54-1.46,1,1,0,0,0-.3.7A1,1,0,0,0,18.54,20Z" />
          </svg>Phim</a>
      </li>
      <li class="sidebar__nav-item">
        <a href="schedules.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
            <path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z" />
          </svg>Lịch chiếu</a>
      </li>
      <li class="sidebar__nav-item">
        <a href="tickets.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
            <path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z" />
          </svg>Giá vé</a>
      </li>
      <li class="sidebar__nav-item">
        <a href="users.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
            <path d="M12,2A10,10,0,0,0,4.65,18.76h0a10,10,0,0,0,14.7,0h0A10,10,0,0,0,12,2Zm0,18a8,8,0,0,1-5.55-2.25,6,6,0,0,1,11.1,0A8,8,0,0,1,12,20ZM10,10a2,2,0,1,1,2,2A2,2,0,0,1,10,10Zm8.91,6A8,8,0,0,0,15,12.62a4,4,0,1,0-6,0A8,8,0,0,0,5.09,16,7.92,7.92,0,0,1,4,12a8,8,0,0,1,16,0A7.92,7.92,0,0,1,18.91,16Z" />
          </svg>Người dùng</a>
      </li>
      <li class="sidebar__nav-item">
        <a href="bookings.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
            <path d="M10,13H3a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,10,13ZM9,20H4V15H9ZM21,2H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM20,9H15V4h5Zm1,4H14a1,1,0,0,0-1,1v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V14A1,1,0,0,0,21,13Zm-1,7H15V15h5ZM10,2H3A1,1,0,0,0,2,3v7a1,1,0,0,0,1,1h7a1,1,0,0,0,1-1V3A1,1,0,0,0,10,2ZM9,9H4V4H9Z" />
          </svg>Đơn hàng</a>
      </li>
      <!-- dropdowFn -->
      <!--                <li class="dropdown sidebar__nav-item">
                                    <a class="dropdown-toggle sidebar__nav-link" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M21,8.94a1.31,1.31,0,0,0-.06-.27l0-.09a1.07,1.07,0,0,0-.19-.28h0l-6-6h0a1.07,1.07,0,0,0-.28-.19.32.32,0,0,0-.09,0A.88.88,0,0,0,14.05,2H10A3,3,0,0,0,7,5V6H6A3,3,0,0,0,3,9V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V18h1a3,3,0,0,0,3-3V9S21,9,21,8.94ZM15,5.41,17.59,8H16a1,1,0,0,1-1-1ZM15,19a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V9A1,1,0,0,1,6,8H7v7a3,3,0,0,0,3,3h5Zm4-4a1,1,0,0,1-1,1H10a1,1,0,0,1-1-1V5a1,1,0,0,1,1-1h3V7a3,3,0,0,0,3,3h3Z" />
                                        </svg> Pages</a>
                
                                    <ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
                                        <li><a href="add-item.html">Add item</a></li>
                                        <li><a href="edit-user.html">Edit user</a></li>
                                        <li><a href="signin.html">Sign In</a></li>
                                        <li><a href="signup.html">Sign Up</a></li>
                                        <li><a href="forgot.html">Forgot password</a></li>
                                        <li><a href="404.html">404 Page</a></li>
                                    </ul>
                                </li>-->
      <!-- end dropdown -->
    </ul>
    <!-- end sidebar nav -->

    <!-- sidebar copyright -->
    <div class="sidebar__copyright">© Teamnaymanh, 2025.</div>
    <!-- end sidebar copyright -->
  </div>
  <!-- end sidebar -->