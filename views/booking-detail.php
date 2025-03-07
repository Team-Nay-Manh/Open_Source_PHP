<?php
$booking = new Booking();
$b = $booking->GetBookingById(getGET('id'));
if ($b) {
  $b_detail = $booking->GetBookingDetailsByBookingId(getGET('id'));
  $schedule = new Schedule();
  $s = $schedule->GetSchedule($b['schedule_id']);

  $seats1 = $seats2 = $seats3 = array();
  $total_price = 0;
  $t1 = $t2 = $t3 = 0;
  foreach ($b_detail as $k => $v) {
    $row = substr($v['seat'], 0, 1);
    if ('A' <= $row && $row <= 'D') {
      $t1 = $v['price'];
      $seats1[] = $v['seat'];
    } else if ('E' <= $row && $row <= 'H') {
      $t2 = $v['price'];
      $seats2[] = $v['seat'];
    } else if ($row == 'J') {
      $t3 = $v['price'];
      $seats3[] = $v['seat'];
    }
    $total_price += $v['price'];
  }
?>
  <!-- ==========Banner-Section========== -->
  <section class="details-banner hero-area bg_img seat-plan-banner" data-background="./assets/images/banner/banner04.jpg">
    <div class="container">
      <div class="details-banner-wrapper">
        <div class="details-banner-content style-two">
          <h3 class="title"><?php echo $b['film_name']; ?></h3>
          <div class="tags">
            <a href="#0">Cinema 2D</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ==========Banner-Section========== -->

  <!-- ==========Movie-Section========== -->
  <div class="movie-facility padding-bottom padding-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="checkout-widget checkout-card mb-0">
            <h5 class="title">Phương thức thanh toán</h5>
            <ul class="payment-option">
              <li>
                <a>
                  <img src="./assets/images/payment/card.png" alt="payment" />
                  <span>Debit Card</span>
                </a>
              </li>
              <li class="active">
                <a>
                  <img src="./assets/images/payment/momo.png" alt="payment" />
                  <span>MOMO</span>
                </a>
              </li>
              <li>
                <a>
                  <img src="./assets/images/payment/paypal.png" alt="payment" />
                  <span>paypal</span>
                </a>
              </li>
            </ul>
            <form class="payment-card-form">
              <div class="form-group check-group">
                <input id="card5" type="checkbox" checked>
                <label for="card5">
                  <span class="title">QuickPay</span>
                  <span class="info">Lưu thông tin lại để thanh toán cho lần sau.</span>
                </label>
              </div>
            </form>
          </div>
          <div class="checkout-widget checkout-card mb-0">
            <h5 class="title">Mã QR soát vé</h5>
            <br />
            <img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $b['id']; ?>&choe=UTF-8' />
          </div>
        </div>
        <div class="col-lg-4">
          <div class="booking-summery bg-one">
            <h4 class="title">chi tiết</h4>
            <ul>
              <li>
                <h6 class="subtitle"><?php echo $b['film_name']; ?></h6>
                <span class="info">Cinema-2d</span>
              </li>
              <li>
                <h6 class="subtitle"><span><?php echo $s['cinema_name']; ?></span><span><?php echo $s['room_name']; ?></span></h6>
                <div class="info"><span><?php echo $s['start_time']; ?></span> <span>Rạp</span></div>
              </li>
              <li>
                <h6 class="subtitle">Ngày đặt vé</h6>
                <div class="info"><span><?php echo explode(' ', $b['created_at'])[0]; ?></span></div>
              </li>
            </ul>
            <ul class="side-shape">
              <?php if (count($seats1)) { ?>
                <li>
                  <h6 class="subtitle"><span>Thường</span><span>x<?php echo count($seats1); ?></span></h6>
                  <span class="info"><span><?php echo implode(', ', $seats1); ?></span></span>
                </li>
              <?php } ?>
              <?php if (count($seats2)) { ?>
                <li>
                  <h6 class="subtitle"><span>VIP (Prime)</span><span>x<?php echo count($seats2); ?></span></h6>
                  <span class="info"><span><?php echo implode(', ', $seats2); ?></span></span>
                </li>
              <?php } ?>
              <?php if (count($seats3)) { ?>
                <li>
                  <h6 class="subtitle"><span>Sweetbox</span><span>x<?php echo count($seats3); ?></span></h6>
                  <span class="info"><span><?php echo implode(', ', $seats3); ?></span></span>
                </li>
              <?php } ?>
            </ul>
            <ul>
              <?php if (count($seats1)) { ?>
                <li>
                  <span class="info"><span>Thường</span><span><?php echo formatPrice($t1); ?></span></span>
                </li>
              <?php } ?>
              <?php if (count($seats2)) { ?>
                <li>
                  <span class="info"><span>VIP (Prime)</span><span><?php echo formatPrice($t2); ?></span></span>
                </li>
              <?php } ?>
              <?php if (count($seats3)) { ?>
                <li>
                  <span class="info"><span>Sweetbox</span><span><?php echo formatPrice($t3); ?></span></span>
                </li>
              <?php } ?>
              <li>
                <span class="info"><span>vat 5%</span><span>(đã bao gồm)</span></span>
              </li>
            </ul>
          </div>
          <div class="proceed-area  text-center">
            <h6 class="subtitle"><span>Tổng cộng</span><span><?php echo formatPrice($total_price); ?> Đ</span></h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ==========Movie-Section========== -->
<?php
} else header('Location: index.html');
?>