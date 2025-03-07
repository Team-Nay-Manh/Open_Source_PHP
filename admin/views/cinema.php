<?php
$id = 0;
$name = $address = $main_title = '';
$country = new Cinema;

if (getGET('delete_id')) $country->DeleteCinema(getGET('delete_id'));

if (getGET('id')) {
  $c = $country->GetCinema(getGET('id'));
  ['id' => $id, 'name' => $name, 'address' => $address] = $c;
  $main_title = 'Chỉnh sửa Rạp phim #' . $c['id'];
} else $main_title = 'Thêm mới Rạp phim';

if ($_POST) {
  if (getGET('id')) {
    if ($country->UpdateCinema(getGET('id'), getPOST('name'), getPOST('address')))
      ['id' => $id, 'name' => $name, 'address' => $address] = $country->GetCinema(getGET('id'));
  } else {
    if ($country->InsertCinema(getPOST('name'), getPOST('address'))) echo '<script>window.location.replace("cinemas.html");</script>';
  }
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
        <form action="" method="POST" class="form">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-6">
                  <input type="hidden" value="<?php echo $id; ?>" name="id" />
                  <input type="text" class="form__input" placeholder="Title" value="<?php echo $name; ?>" name="name" required />
                </div>
                <div class="col-6">
                  <input type="text" class="form__input" placeholder="Address" value="<?php echo $address; ?>" name="address" required />
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="form__btn">thực hiện</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- end form -->
    </div>
  </div>
</main>
<!-- end main content -->