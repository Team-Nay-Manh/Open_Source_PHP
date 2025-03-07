<?php
$id = 0;
$full_name = $email = $phone = $address = $created_at = '';
$booking = new Booking;

if (getGET('id')) {
  $b = $booking->GetBookingById(getGET('id'));
  ['id' => $id] = $b;
}
if (!$id) echo '<script>window.location.replace("bookings.html");</script>';

$user = new User;
$u = $user->GetUserByID($b['user_id']);
$schedule = new Schedule;
$s = $schedule->GetSchedule($b['schedule_id']);
$film = new Film;
$f = $film->GetFilm($s['film_id']);
?>
<!-- main content -->
<main class="main">
  <div class="container-fluid">
    <div class="row">
      <!-- main title -->
      <div class="col-12">
        <div class="main__title">
          <h2>Thông tin chi tiết đặt vé</h2>
        </div>
      </div>
      <!-- end main title -->

      <!-- form -->
      <div class="col-12">
        <div class="row">
          <form action="#" class="profile__form">
            <div class="row">
              <div class="col-12">
                <h4 class="profile__title">Thông tin</h4>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-4">
                <div class="profile__group">
                  <label class="profile__label" for="user_id">ID người dùng</label>
                  <input id="user_id" type="text" class="profile__input" value="<?php echo $u['id']; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-4">
                <div class="profile__group">
                  <label class="profile__label" for="full_name">Họ tên</label>
                  <input id="full_name" type="text" class="profile__input" value="<?php echo $u['full_name']; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-4">
                <div class="profile__group">
                  <label class="profile__label" for="email">Email</label>
                  <input id="email" type="email" class="profile__input" value="<?php echo $u['email']; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                <div class="profile__group">
                  <label class="profile__label" for="film_id">ID phim</label>
                  <input id="film_id" type="text" name="film_id" class="profile__input" value="<?php echo $f['id']; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                <div class="profile__group">
                  <label class="profile__label" for="film_name">Tên phim</label>
                  <input id="film_name" type="text" name="film_name" class="profile__input" value="<?php echo $f['name']; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-3">
                <div class="profile__group">
                  <label class="profile__label" for="schedule_id">ID lịch chiếu</label>
                  <input id="schedule_id" type="text" name="schedule_id" class="profile__input" value="<?php echo $s['id']; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-3">
                <div class="profile__group">
                  <label class="profile__label" for="schedule_start_time">Suất chiếu</label>
                  <input id="schedule_start_time" type="text" name="schedule_start_time" class="profile__input" value="<?php echo $s['start_time']; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-3">
                <div class="profile__group">
                  <label class="profile__label" for="cinema_name">Rạp</label>
                  <input id="cinema_name" type="text" name="cinema_name" class="profile__input" value="<?php echo $s['cinema_name']; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-3">
                <div class="profile__group">
                  <label class="profile__label" for="room_name">Phòng</label>
                  <input id="room_name" type="text" name="room_name" class="profile__input" value="<?php echo $s['room_name']; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                <div class="profile__group">
                  <label class="profile__label" for="booking_detail">Chi tiết vé</label>
                  <?php
                  $booking_detail = [];
                  foreach ($booking->GetBookingDetailsByBookingId($b['id']) as $k => $v) {
                    $booking_detail[] = $v['seat'];
                  }
                  $booking_detail = implode(', ', $booking_detail);
                  ?>
                  <input id="booking_detail" type="text" name="booking_detail" class="profile__input" value="<?php echo $booking_detail; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                <div class="profile__group">
                  <label class="profile__label" for="booking_total_price">Tổng tiền</label>
                  <input id="booking_total_price" type="text" name="booking_total_price" class="profile__input" value="<?php echo formatPrice($b['total_price']); ?> đ" disabled />
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- end form -->
    </div>
  </div>
</main>
<!-- end main content -->