<?php
$schedule = new Schedule();
$s = $schedule->GetSchedule(getGET('id'));
$film = new Film();
$f = $film->GetFilm($s['film_id']);
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

<!-- ==========Page-Title========== -->
<section class="page-title bg-one">
    <div class="container">
        <div class="page-title-area">
            <div class="item md-order-1">
            </div>
            <div class="item date-item">
                <span class="date">Thời gian chiếu: <?php echo $s['start_time']; ?></span>
            </div>
            <div class="item">
            </div>
        </div>
    </div>
</section>
<!-- ==========Page-Title========== -->

<!-- ==========Movie-Section========== -->
<div class="seat-plan-section padding-bottom padding-top">
    <div class="container">
        <div class="screen-area">
            <h4 class="screen">screen</h4>
            <div class="screen-thumb">
                <img src="./assets/images/movie/screen-thumb.png" alt="movie">
            </div>
            <h5 class="subtitle">Thường</h5>
            <div class="screen-wrapper">
                <ul class="seat-area">
                    <?php
                    $ticket = new Ticket();
                    $t = $ticket->GetTickets();
                    $booking = new Booking();
                    $listBookingDetails = [];
                    foreach ($booking->GetBookingDetailsByScheduleId($s['id']) as $k => $v) {
                        $listBookingDetails[$v['seat']] = $v['seat'];
                    }
                    for ($i = 'A'; $i <= 'D'; $i++) {
                    ?>
                        <li class="seat-line">
                            <span><?php echo $i; ?></span>
                            <ul class="seat--area">
                                <?php
                                $index = 1;
                                for ($j = 1; $j <= 3; $j++) {
                                ?>
                                    <li class="front-seat">
                                        <ul>
                                            <?php
                                            for ($k = 1; $k <= 8; $k++) {
                                                if (($j == 1 || $j == 3) && $k == 3) {
                                                    break;
                                                }
                                                $code_seat = bindec(base_convert(unpack('H*', $i)[1], 16, 2) . dec2bin($index));
                                                $seat_free = empty($listBookingDetails[$i . $index]) ? true : false;
                                            ?>
                                                <li class="single-seat <?php echo $seat_free ? "seat-free" : ""; ?>" data-price="<?php echo $t[0]['price']; ?>" data-code-seat="<?php echo $code_seat; ?>">
                                                    <img src="assets/images/movie/seat01<?php echo $seat_free ? "-free" : "" ?>.png" alt="seat" />
                                                    <span class="sit-num"><?php echo $i; ?><?php echo $index++; ?></span>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <span><?php echo $i; ?></span>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <h5 class="subtitle">VIP (Prime)</h5>
            <div class="screen-wrapper">
                <ul class="seat-area">
                    <?php
                    for ($i = 'E'; $i <= 'H'; $i++) {
                    ?>
                        <li class="seat-line">
                            <span><?php echo $i; ?></span>
                            <ul class="seat--area">
                                <?php
                                $index = 1;
                                for ($j = 1; $j <= 3; $j++) {
                                ?>
                                    <li class="front-seat">
                                        <ul>
                                            <?php
                                            for ($k = 1; $k <= 8; $k++) {
                                                if (($j == 1 || $j == 3) && $k == 3) {
                                                    break;
                                                }
                                                $code_seat = bindec(base_convert(unpack('H*', $i)[1], 16, 2) . dec2bin($index));
                                                $seat_free = empty($listBookingDetails[$i . $index]) ? true : false;
                                            ?>
                                                <li class="single-seat <?php echo $seat_free ? "seat-free" : ""; ?>" data-price="<?php echo $t[1]['price']; ?>" data-code-seat="<?php echo $code_seat; ?>">
                                                    <img src="assets/images/movie/seat01<?php echo $seat_free ? "-free" : "" ?>.png" alt="seat" />
                                                    <span class="sit-num"><?php echo $i; ?><?php echo $index++; ?></span>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <span><?php echo $i; ?></span>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <h5 class="subtitle">Sweetbox</h5>
            <div class="screen-wrapper">
                <ul class="seat-area couple">
                    <li class="seat-line">
                        <span>J</span>
                        <ul class="seat--area">
                            <?php
                            $index = 1;
                            for ($j = 1; $j <= 3; $j++) {
                            ?>
                                <li class="front-seat">
                                    <ul>
                                        <?php
                                        for ($k = 1; $k <= 4; $k++) {
                                            if (($j == 1 || $j == 3) && $k == 2) {
                                                break;
                                            }
                                            $code_seat = bindec(base_convert(unpack('H*', 'J')[1], 16, 2) . dec2bin($index));
                                            $seat_free = empty($listBookingDetails["J" . $index . " J" . ($index + 1)]) ? true : false;
                                        ?>
                                            <li class="single-seat <?php echo $seat_free ? "seat-free-two" : ""; ?>" data-price="<?php echo $t[2]['price']; ?>" data-code-seat="<?php echo $code_seat; ?>">
                                                <img src="./assets/images/movie/seat02<?php echo $seat_free ? "-free" : ""; ?>.png" alt="seat" />
                                                <span class="sit-num">J<?php echo $index++; ?> J<?php echo $index++; ?></span>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <span>J</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="proceed-book bg_img" data-background="./assets/images/movie/movie-bg-proceed.jpg">
            <div class="proceed-to-book">
                <div class="book-item">
                    <span>Ghế đã chọn</span>
                    <h3 class="title"><span id="chose-seat"></span><span id="code-seat" style="display: none;"></span></h3>
                </div>
                <div class="book-item">
                    <span>Tạm tính</span>
                    <h3 class="title" id="price">0 đ</h3>
                </div>
                <div class="book-item">
                    <a href="javascript:" onclick="redirectPurchase(<?php echo $s['id']; ?>)" class="custom-button">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==========Movie-Section========== -->