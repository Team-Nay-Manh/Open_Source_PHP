<?php
$id = 0;
$full_name = $email = $phone = $address = $created_at = '';
$user = new User;

if (getGET('id')) {
  $u = $user->GetUserByID(getGET('id'));
  ['id' => $id, 'full_name' => $full_name, 'email' => $email, 'phone' => $phone, 'address' => $address, 'created_at' => $created_at] = $u;
}
if (!$id) echo '<script>window.location.replace("users.html");</script>';
?>
<!-- main content -->
<main class="main">
  <div class="container-fluid">
    <div class="row">
      <!-- main title -->
      <div class="col-12">
        <div class="main__title">
          <h2>Chi tiết người dùng</h2>
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
              <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                <div class="profile__group">
                  <label class="profile__label" for="id">ID người dùng</label>
                  <input id="id" type="text" class="profile__input" value="<?php echo $id; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                <div class="profile__group">
                  <label class="profile__label" for="full_name">Họ tên</label>
                  <input id="full_name" type="text" class="profile__input" value="<?php echo $full_name; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                <div class="profile__group">
                  <label class="profile__label" for="email">Email</label>
                  <input id="email" type="email" class="profile__input" value="<?php echo $email; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                <div class="profile__group">
                  <label class="profile__label" for="address">Địa chỉ</label>
                  <input id="address" type="text" name="address" class="profile__input" value="<?php echo $address; ?>" disabled />
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                <div class="profile__group">
                  <label class="profile__label" for="created_at">Ngày tham gia</label>
                  <input id="created_at" type="text" name="created_at" class="profile__input" value="<?php echo $created_at; ?>" disabled />
                </div>
              </div>
              <!--                            <div class="col-12">
                                                            <button class="profile__btn" type="submit">Thực hiện</button>
                                                        </div>-->
            </div>
          </form>
        </div>
      </div>
      <!-- end form -->
    </div>
  </div>
</main>
<!-- end main content -->