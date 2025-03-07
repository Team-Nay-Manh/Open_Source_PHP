<?php
$id = 0;
$name = $poster = $trailer = $director = $actor = $opening_day = $description = $duration = $country_id = $rated_id = $main_title = '';
$film = new Film;

if (getGET('delete_id')) $film->DeleteFilm(getGET('delete_id'));

if (getGET('id')) {
  $f = $film->GetFilm(getGET('id'));
  ['id' => $id, 'name' => $name, 'poster' => $poster, 'trailer' => $trailer, 'director' => $director, 'actor' => $actor, 'opening_day' => $opening_day, 'description' => $description, 'duration' => $duration, 'country_id' => $country_id, 'rated_id' => $rated_id] = $f;
  $main_title = 'Chỉnh sửa Phim #' . $f['id'];
} else $main_title = 'Thêm mới Phim';

if ($_POST) {
  if (getGET('id')) {
    if ($film->UpdateFilm(getGET('id'), getPOST('name'), getPOST('poster'), getPOST('trailer'), getPOST('director'), getPOST('actor'), getPOST('opening_day'), getPOST('description'), getPOST('duration'), getPOST('country_id'), getPOST('rated_id'))) {
      $film->UpdateFilmCategories(getGET('id'), $_POST['categories_s']);
      ['id' => $id, 'name' => $name, 'poster' => $poster, 'trailer' => $trailer, 'director' => $director, 'actor' => $actor, 'opening_day' => $opening_day, 'description' => $description, 'duration' => $duration, 'country_id' => $country_id, 'rated_id' => $rated_id] = $film->GetFilm(getGET('id'));
    }
  } else {
    if ($film->InsertFilm(getPOST('name'), getPOST('poster'), getPOST('trailer'), getPOST('director'), getPOST('actor'), getPOST('opening_day'), getPOST('description'), getPOST('duration'), getPOST('country_id'), getPOST('rated_id'), $_POST['categories_s'])) echo '<script>window.location.replace("films.html");</script>';
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
            <div class="col-12 col-md-5 form__cover">
              <div class="row">
                <div class="col-12 col-sm-6 col-md-12">
                  <div class="form__img">
                    <label for="form__img-upload">Upload cover (270 x 400)</label>
                    <!--<input id="form__img-upload" name="form__img-upload" type="file" accept=".png, .jpg, .jpeg">-->
                    <img id="form__img" src="<?php echo $poster; ?>" alt=" ">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-7 form__content">
              <div class="row">
                <div class="col-12">
                  <input type="text" class="form__input" placeholder="Title" value="<?php echo $name; ?>" name="name" required />
                </div>
                <div class="col-12">
                  <textarea id="text" name="description" class="form__textarea" placeholder="Mô tả" required><?php echo $description; ?></textarea>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <input type="date" class="form__input" placeholder="Ngày phát hành" title="Ngày phát hành" value="<?php echo $opening_day; ?>" name="opening_day" required />
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <input type="number" class="form__input" placeholder="Thời lượng (phút)" title="Thời lượng (phút)" value="<?php echo $duration; ?>" name="duration" required />
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <select class="js-example-basic-single" id="country" name="country_id" required>
                    <?php
                    $country = new Country;
                    foreach ($country->GetCountries() as $k => $v) {
                    ?>
                      <option value="<?php echo $v['id']; ?>" <?php echo $v['id'] == $country_id ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                  <select class="js-example-basic-single" id="rated" name="rated_id" required>
                    <?php
                    $other = new Other;
                    foreach ($other->GetListRated() as $k => $v) {
                    ?>
                      <option value="<?php echo $v['id']; ?>" <?php echo $v['id'] == $rated_id ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="col-12 col-lg-6">
                  <select class="js-example-basic-multiple" id="category" multiple="multiple" name="categories_s[]" required>
                    <?php
                    $category = new Category;
                    $listCategoriesSelected = getGET('id') ? $category->GetCategoriesByFilmId(getGET('id')) : [];
                    foreach ($category->GetCategories() as $k => $v) {
                      $selected = false;
                      foreach ($listCategoriesSelected as $k2 => $v2) {
                        if ($v['id'] == $v2['id']) {
                          $selected = true;
                          unset($listCategoriesSelected[$k2]);
                          break;
                        }
                      }
                    ?>
                      <option value="<?php echo $v['id']; ?>" <?php echo $selected ? 'selected' : ''; ?>><?php echo $v['name']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-12  col-lg-6">
                  <input type="text" class="form__input" placeholder="Trailer" title="Trailer" value="<?php echo $trailer; ?>" name="trailer" required />
                </div>
                <div class="col-12  col-lg-6">
                  <input type="text" class="form__input" placeholder="Đạo diễn" title="Đạo diễn" value="<?php echo $director; ?>" name="director" required />
                </div>
                <div class="col-12  col-lg-6">
                  <input type="text" class="form__input" placeholder="Diễn viên" title="Diễn viên" value="<?php echo $actor; ?>" name="actor" required />
                </div>
                <div class="col-12">
                  <input type="text" class="form__input" placeholder="Link poster" title="Link poster" value="<?php echo $poster; ?>" name="poster" required />
                </div>
              </div>
            </div>
            <!--                        <div class="col-12">
                                                    <ul class="form__radio">
                                                        <li>
                                                            <span>Item type:</span>
                                                        </li>
                                                        <li>
                                                            <input id="type1" type="radio" name="type" data-toggle="collapse" data-target=".multi-collapse" checked="">
                                                            <label for="type1">Movie</label>
                                                        </li>
                                                        <li>
                                                            <input id="type2" type="radio" name="type" data-toggle="collapse" data-target=".multi-collapse">
                                                            <label for="type2">TV Series</label>
                                                        </li>
                                                    </ul>
                                                </div>-->
            <div class="col-12">
              <button type="submit" class="form__btn">Thực hiện</button>
            </div>
          </div>
        </form>
      </div>
      <!-- end form -->
    </div>
  </div>
</main>
<!-- end main content -->