<?php
$id = 0;
$film_id = $cinema_id = $cinema_name = $room_id = $room_name = $start_time = $date = $time = $main_title = '';
$schedule = new Schedule;

if (getGET('delete_id')) $schedule->DeleteSchedule(getGET('delete_id'));

if (getGET('id')) {
  $s = $schedule->GetSchedule(getGET('id'));
  ['id' => $id, 'film_id' => $film_id, 'cinema_id' => $cinema_id, 'cinema_name' => $cinema_name, 'room_id' => $room_id, 'room_name' => $room_name, 'start_time' => $start_time] = $s;
  $main_title = 'Chỉnh sửa Lịch chiếu #' . $s['id'];
} else {
  $film = new Film;
  $f = $film->GetFilm(getGET('film_id'));
  $film_id = $f['id'];
  $main_title = 'Thêm mới Lịch chiếu phim #' . $f['name'];
}

if ($_POST) {
  if (getGET('id')) {
    if ($schedule->UpdateSchedule(getGET('id'), getPOST('film_id'), getPOST('cinema_id'), getPOST('room_id'), getPOST('date') . ' ' . getPOST('time') . ':00'))
      ['id' => $id, 'film_id' => $film_id, 'cinema_id' => $cinema_id, 'cinema_name' => $cinema_name, 'room_id' => $room_id, 'room_name' => $room_name, 'start_time' => $start_time] = $schedule->GetSchedule(getGET('id'));
  } else {
    if ($schedule->InsertSchedule(getPOST('film_id'), getPOST('cinema_id'), getPOST('room_id'), getPOST('date') . ' ' . getPOST('time') . ':00')) echo '<script>window.location.replace("schedules.html");</script>';
  }
}
if (strlen($start_time)) {
  $start_time = explode(' ', $start_time);
  $date = $start_time[0];
  $time = $start_time[1];
}
?>
<!-- main content -->
<main class="main">
  <div class="container-fluid">
    <div class="row">
      <!-- main title -->
      <div class="col-12">
        <div class="main__title">
          <h2><?php echo $main_title; ?></h2>
        </div>
      </div>
      <!-- end main title -->

      <!-- form -->
      <div class="col-12">
        <div class="row">
          <form action="" method="POST" class="profile__form">
            <div class="row">
              <div class="col-12">
                <h4 class="profile__title">Thông tin</h4>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                <div class="profile__group">
                  <label class="profile__label" for="film_id">ID phim</label>
                  <input type="hidden" name="film_id" value="<?php echo $film_id; ?>" />
                  <input id="film_id" type="text" class="profile__input" value="<?php echo $film_id; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                <div class="profile__group">
                  <label class="profile__label" for="cinema">Rạp</label>
                  <select class="js-example-basic-single" id="cinema" name="cinema_id">
                    <?php
                    $cinema = new Cinema;
                    foreach ($cinema->GetCinemas() as $k => $v) {
                    ?>
                      <option value="<?php echo $v['id']; ?>" <?php echo $v['id'] == $cinema_id ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                <div class="profile__group">
                  <label class="profile__label" for="room">Phòng</label>
                  <select class="js-example-basic-single" id="room" name="room_id">
                    <?php
                    $room = new Room;
                    foreach ($room->GetRooms() as $k => $v) {
                    ?>
                      <option value="<?php echo $v['id']; ?>" <?php echo $v['id'] == $room_id ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-3">
                <div class="profile__group">
                  <label class="profile__label" for="date">Ngày</label>
                  <input id="date" type="date" name="date" class="profile__input" value="<?php echo $date; ?>" />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-3">
                <div class="profile__group">
                  <label class="profile__label" for="time">Giờ</label>
                  <input id="time" type="time" name="time" class="profile__input" value="<?php echo $time; ?>" />
                </div>
              </div>
              <div class="col-12">
                <button class="profile__btn" type="submit">Thực hiện</button>
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