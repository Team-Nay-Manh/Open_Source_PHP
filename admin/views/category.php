<?php
$id = 0;
$name = $main_title = '';
$country = new Category;

if (getGET('delete_id')) $country->DeleteCategory(getGET('delete_id'));

if (getGET('id')) {
  $c = $country->GetCategory(getGET('id'));
  ['id' => $id, 'name' => $name] = $c;
  $main_title = 'Chỉnh sửa Thể loại #' . $c['id'];
} else $main_title = 'Thêm mới Thể loại';

if ($_POST) {
  if (getGET('id')) {
    if ($country->UpdateCategory(getGET('id'), getPOST('name')))
      ['id' => $id, 'name' => $name] = $country->GetCategory(getGET('id'));
  } else {
    if ($country->InsertCategory(getPOST('name'))) echo '<script>window.location.replace("categories.html");</script>';
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