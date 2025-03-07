<?php
$user = new User;
$booking = new Booking;
$other = new Other;
?>
<!-- main content -->
<main class="main">
  <div class="container-fluid">
    <div class="row">
      <!-- main title -->
      <div class="col-12">
        <div class="main__title">
          <h2>Dashboard</h2>
          <!--<a href="add-item.html" class="main__title-link">add item</a>-->
        </div>
      </div>
      <!-- end main title -->
    </div>
    <div class="row row--grid">
      <!-- stats -->
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="stats">
          <span>Tổng người dùng</span>
          <p><?php echo $user->GetCountUsers(); ?></p>
          <img src="assets/img/graph-bar.svg" alt="">
        </div>
      </div>
      <!-- end stats -->
      <!-- stats -->
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="stats">
          <span>Tổng lần đặt (booking)</span>
          <p><?php echo $booking->GetCountBookings(); ?></p>
          <img src="assets/img/film.svg" alt="">
        </div>
      </div>
      <!-- end stats -->
      <!-- stats -->
      <div class="col-12 col-sm-6 col-xl-3">
        <div class="stats">
          <span>Tổng lợi nhuận tạm tính</span>
          <p><?php echo formatPrice($other->GetProfit()); ?></p>
          <img src="assets/img/star-half-alt.svg" alt="">
        </div>
      </div>
      <!-- end stats -->
    </div>
  </div>
</main>
<!-- end main content -->