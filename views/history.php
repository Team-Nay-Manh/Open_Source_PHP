<!-- ==========Banner-Section========== -->
<section class="banner-section">
  <div class="banner-bg bg_img" data-background="./assets/images/banner/banner05.jpg"></div>
  <div class="container">
    <div class="banner-content event-content">
      <h1 class="title bold">Lịch sử <span class="color-theme">mua</span> vé</h1>
    </div>
  </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Event-Section========== -->
<section class="event-section padding-top padding-bottom">
  <div class="container">
    <div class="row flex-wrap-reverse justify-content-center">
      <div class="col-sm-10 col-md-8 col-lg-3">
        <div class="widget-1 widget-banner">
          <div class="widget-1-body">
            <a href="#0">
              <img src="./assets/images/sidebar/banner/banner01.jpg" alt="banner" />
            </a>
          </div>
        </div>
        <div class="widget-1 widget-banner">
          <div class="widget-1-body">
            <a href="#0">
              <img src="./assets/images/sidebar/banner/banner01.jpg" alt="banner" />
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-9 mb-50 mb-lg-0">
        <div class="filter-tab">
          <div class="row mb-10 justify-content-center">
            <?php
            $booking = new Booking();
            foreach ($booking->GetBookingsByUserId($_SESSION['user_id']) as $k => $v) {
            ?>
              <div class="col-sm-6 col-lg-4">
                <div class="event-grid">
                  <div class="movie-thumb c-thumb">
                    <a href="booking-detail.html?id=<?php echo $v['id']; ?>">
                      <img src="<?php echo $v['film_poster']; ?>" alt="event" />
                    </a>
                    <div class="event-date">
                      <!--                                            <h6 class="date-title">28</h6>
                                                                                        <span>Dec</span>-->
                    </div>
                  </div>
                  <div class="movie-content bg-one">
                    <h5 class="title m-0">
                      <a href="booking-detail.html?id=<?php echo $v['id']; ?>"><?php echo $v['film_name']; ?></a>
                    </h5>
                    <div class="movie-rating-percent">
                      <span><?php echo explode(' ', $v['created_at'])[0]; ?></span>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <!--                    <div class="pagination-area text-center">
                                            <a href="#0"><i class="fas fa-angle-double-left"></i><span>Prev</span></a>
                                            <a href="#0">1</a>
                                            <a href="#0">2</a>
                                            <a href="#0" class="active">3</a>
                                            <a href="#0">4</a>
                                            <a href="#0">5</a>
                                            <a href="#0"><span>Next</span><i class="fas fa-angle-double-right"></i></a>
                                        </div>-->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ==========Event-Section========== -->