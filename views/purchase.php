<?php
$schedule = new Schedule();
$s = $schedule->GetSchedule(getGET('schedule_id'));
$film = new Film();
$f = $film->GetFilm($s['film_id']);

// echo getUrl();
if ($_POST) {
    $booking = new Booking();
    if (empty($_SESSION['user_id'])) header('Location: sign-in.html?url=' . getUrl());
    else {
        $res = $booking->Purchase($_SESSION['user_id'], $s['id'], getGET('seats'));
        if (is_numeric($res)) {
            // header('Location: history.html');
            echo '<script>window.location.replace("history.html?id=' . $res . '");</script>';
        } else {
            // header('Location: msg.php?msg=' . urlencode($res));
            echo '<script>window.location.href = "msg.php?msg=' . urlencode($res) . '";</script>';
        }
    }
}

$ticket = new Ticket();
$t = $ticket->GetTickets();

$seats = explode(',', getGET('seats'));
$seats1 = $seats2 = $seats3 = array();
$total_price = 0;
foreach ($seats as $k => $v) {
    $row = $col = '';
    $bin = decbin((int)trim($v));
    for ($i = 0; $i < strlen($bin); $i++) {
        if ($i < 7) $row .= $bin[$i];
        else $col .= $bin[$i];
    }
    // var_dump($bin, $row, $col);
    // echo chr(bindec($row)) . bindec($col) . ',';
    $row = chr(bindec($row));
    $col = bindec($col);
    if ('A' <= $row && $row <= 'D') {
        $total_price += $t[0]['price'];
        $seats1[] = $row . $col;
    } else if ('E' <= $row && $row <= 'H') {
        $total_price += $t[1]['price'];
        $seats2[] = $row . $col;
    } else if ($row == 'J') {
        $total_price += $t[2]['price'];
        $seats3[] = $row . $col . ' ' . $row . ($col + 1);
    }
}
?>
<!-- ==========Banner-Section========== -->
<section class="details-banner hero-area bg_img seat-plan-banner" data-background="./assets/images/banner/banner04.jpg">
    <div class="container">
        <div class="details-banner-wrapper">
            <div class="details-banner-content style-two">
                <h3 class="title"><?php echo $f['name']; ?></h3>
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
                    <!--<h6 class="subtitle">Enter Your Card Details </h6>-->
                    <form class="payment-card-form">
                        <!--                        <div class="form-group w-100">
                                                    <label for="card1">Card Details</label>
                                                    <input type="text" id="card1">
                                                    <div class="right-icon">
                                                        <i class="flaticon-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group w-100">
                                                    <label for="card2"> Name on the Card</label>
                                                    <input type="text" id="card2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="card3">Expiration</label>
                                                    <input type="text" id="card3" placeholder="MM/YY">
                                                </div>
                                                <div class="form-group">
                                                    <label for="card4">CVV</label>
                                                    <input type="text" id="card4" placeholder="CVV">
                                                </div>-->
                        <div class="form-group check-group">
                            <input id="card5" type="checkbox" checked>
                            <label for="card5">
                                <span class="title">QuickPay</span>
                                <span class="info">Lưu thông tin lại để thanh toán cho lần sau.</span>
                            </label>
                        </div>
                        <!--                        <div class="form-group">
                                                    <input type="submit" class="custom-button" value="make payment">
                                                </div>-->
                    </form>
                    <!--                    <p class="notice">
                                            By Clicking "Make Payment" you agree to the <a href="#0">terms and conditions</a>
                                        </p>-->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="booking-summery bg-one">
                    <h4 class="title">chi tiết</h4>
                    <ul>
                        <li>
                            <h6 class="subtitle"><?php echo $f['name']; ?></h6>
                            <span class="info">Cinema-2d</span>
                        </li>
                        <li>
                            <h6 class="subtitle"><span><?php echo $s['cinema_name']; ?></span><span><?php echo $s['room_name']; ?></span></h6>
                            <div class="info"><span><?php echo $s['start_time']; ?></span> <span>Rạp</span></div>
                        </li>
                        <!--                        <li>
                                                    <h6 class="subtitle mb-0"><span>Tickets  Price</span><span>$150</span></h6>
                                                </li>-->
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
                                <span class="info"><span>Thường</span><span><?php echo formatPrice($t[0]['price']); ?></span></span>
                            </li>
                        <?php } ?>
                        <?php if (count($seats2)) { ?>
                            <li>
                                <span class="info"><span>VIP (Prime)</span><span><?php echo formatPrice($t[1]['price']); ?></span></span>
                            </li>
                        <?php } ?>
                        <?php if (count($seats3)) { ?>
                            <li>
                                <span class="info"><span>Sweetbox</span><span><?php echo formatPrice($t[2]['price']); ?></span></span>
                            </li>
                        <?php } ?>
                        <li>
                            <span class="info"><span>vat 5%</span><span>(đã bao gồm)</span></span>
                        </li>
                    </ul>
                </div>
                <div class="proceed-area  text-center">
                    <h6 class="subtitle"><span>Tổng cộng</span><span><?php echo formatPrice($total_price); ?> Đ</span></h6>
                    <form action="" method="POST">
                        <button type="submit" class="custom-button back-button" name="submit">Thanh toán</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==========Movie-Section========== -->