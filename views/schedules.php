<?php
$film = new Film();
$f = $film->GetFilm(getGET('film_id'));

$schedule = new Schedule();
$s = $schedule->GetSchedulesByFilmIdByDate($f['id'], getGET('date'));
?>
<!-- ==========Window-Warning-Section========== -->
<section class="window-warning inActive">
  <div class="lay"></div>
  <div class="warning-item">
    <h6 class="subtitle">Tiếp theo</h6>
    <h4 class="title">Bạn sẽ chọn vị trí ngồi</h4>
    <div class="thumb">
      <img src="./assets/images/movie/seat-plan.png" alt="movie">
    </div>
    <a href="javascript:" onclick="redirectScheduleId()" class="custom-button seatPlanButton">Xem vị trí<i class="fas fa-angle-right"></i></a>
  </div>
</section>
<!-- ==========Window-Warning-Section========== -->

<!-- ==========Banner-Section========== -->
<section class="details-banner hero-area bg_img" data-background="<?php echo $f['poster']; ?>">
  <div class="container">
    <div class="details-banner-wrapper">
      <div class="details-banner-content">
        <h3 class="title"><?php echo $f['name']; ?></h3>
        <div class="tags">
          <?php
          foreach ($category->GetCategoriesByFilmId(getGET('film_id')) as $k => $v) {
          ?>
            <a href="#0"><?php echo $v['name']; ?></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Book-Section========== -->
<section class="book-section bg-one">
  <div class="container">
    <form class="ticket-search-form two">
      <div class="form-group">
        <div class="thumb">
          <img src="./assets/images/ticket/date.png" alt="ticket">
        </div>
        <span class="type">date</span>
        <select class="select-bar">
          <option value="<?php echo date("Y-m-d"); ?>"><?php echo date("Y-m-d"); ?></option>
          <?php
          $date_ = date_create();
          for ($i = 0; $i < 14; $i++) {
            date_add($date_, date_interval_create_from_date_string('1 days'));
          ?>
            <option value="<?php echo date_format($date_, "Y-m-d"); ?>" <?php echo date_format($date_, "Y-m-d") == getGET('date') ? 'selected' : ''; ?>><?php echo date_format($date_, "Y-m-d"); ?></option>
          <?php } ?>
        </select>
      </div>
    </form>
  </div>
</section>
<!-- ==========Book-Section========== -->

<!-- ==========Movie-Section========== -->
<div class="ticket-plan-section padding-bottom padding-top">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9 mb-5 mb-lg-0">
        <ul class="seat-plan-wrapper bg-five">
          <?php
          $ss = array();
          foreach ($s as $k => $v) {
            $a = array(
              'id' => $v['id'], 'film_id' => $v['film_id'],
              'cinema_id' => $v['cinema_id'], 'cinema_name' => $v['cinema_name'], 'cinema_address' => $v['cinema_address']
            );
            $b = array('room_id' => $v['room_id'], 'room_name' => $v['room_name'], 'start_time' => $v['start_time']);
            $a['rooms'][] = $b;

            $isNew = true;
            foreach ($ss as $k2 => $v2) {
              if ($v['cinema_id'] == $v2['cinema_id']) {
                $isNew = false;
                $ss[$k2]['rooms'][] = $b;
                break;
              }
            }
            if ($isNew) $ss[] = $a;
          }
          foreach ($ss as $k => $v) {
          ?>
            <li>
              <div class="movie-name" title="<?php echo $v['cinema_address']; ?>">
                <div class="icons">
                  <i class="far fa-heart"></i>
                  <i class="fas fa-heart"></i>
                </div>
                <a href="#0" class="name"><?php echo $v['cinema_name']; ?></a>
                <div class="location-icon">
                  <i class="fas fa-map-marker-alt"></i>
                </div>
              </div>
              <div class="movie-schedule">
                <?php
                foreach ($v['rooms'] as $k2 => $v2) {
                  $time = explode(':', explode(' ', $v2['start_time'])[1]);
                ?>
                  <div class="item" onclick="setScheduleId(<?php echo $v['id']; ?>)"><?php echo $time[0] . ':' . $time[1]; ?></div>
                <?php } ?>
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-10">
        <div class="widget-1 widget-banner">
          <div class="widget-1-body">
            <a href="#0">
              <img src="./assets/images/sidebar/banner/banner03.jpg" alt="banner">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ==========Movie-Section========== -->