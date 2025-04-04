<?php
$booking = new Booking;

// Xử lý bộ lọc
$filters = [];
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
if ($page < 1) $page = 1;

// Xử lý các tham số lọc từ URL
if (isset($_GET['date_from']) && !empty($_GET['date_from'])) {
  $filters['date_from'] = $_GET['date_from'];
}

if (isset($_GET['date_to']) && !empty($_GET['date_to'])) {
  $filters['date_to'] = $_GET['date_to'];
}

// Nếu có user_id trong URL (có thể dùng cho phần filter theo người dùng)
if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
  $filters['user_id'] = intval($_GET['user_id']);
}

// Nếu có film_id trong URL (có thể dùng cho phần filter theo phim)
if (isset($_GET['film_id']) && !empty($_GET['film_id'])) {
  $filters['film_id'] = intval($_GET['film_id']);
}

$limit = 5; // Số bản ghi trên mỗi trang
$total = $booking->GetCountBookings($filters);
$totalPages = ceil($total / $limit);

// Lấy danh sách đặt vé với phân trang
$bookings = $booking->GetBookings($page, $limit, $filters);
?>
<!-- main content -->
<main class="main">
  <div class="container-fluid">
    <div class="row">
      <!-- main title -->
      <div class="col-12">
        <div class="main__title">
          <h2>Danh sách đặt vé</h2>
          <span class="main__title-stat"><?php echo $total; ?> Tổng số</span>
        </div>
      </div>
      <!-- end main title -->
      
      <!-- filter -->
      <div class="col-12">
        <div class="main__filter">
          <form action="" method="GET" class="main__filter-search">
            <input type="hidden" name="p" value="1">
            <input type="hidden" name="page" value="<?php echo isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'bookings'; ?>">
            
            <div class="row">
              <div class="col-12 col-md-5">
                <div class="filter__group">
                  <label for="date_from" class="filter__label">Từ ngày:</label>
                  <div class="filter__input-wrap">
                    <span class="filter__icon">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,4H17V3a1,1,0,0,0-2,0V4H9V3A1,1,0,0,0,7,3V4H5A3,3,0,0,0,2,7V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4Zm1,15a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V12H20Zm0-9H4V7A1,1,0,0,1,5,6H7V7A1,1,0,0,0,9,7V6h6V7a1,1,0,0,0,2,0V6h2a1,1,0,0,1,1,1Z"/></svg>
                    </span>
                    <input type="date" name="date_from" id="date_from" class="filter__input" value="<?php echo isset($_GET['date_from']) ? htmlspecialchars($_GET['date_from']) : ''; ?>">
                  </div>
                </div>
              </div>
              
              <div class="col-12 col-md-5">
                <div class="filter__group">
                  <label for="date_to" class="filter__label">Đến ngày:</label>
                  <div class="filter__input-wrap">
                    <span class="filter__icon">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,4H17V3a1,1,0,0,0-2,0V4H9V3A1,1,0,0,0,7,3V4H5A3,3,0,0,0,2,7V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V7A3,3,0,0,0,19,4Zm1,15a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V12H20Zm0-9H4V7A1,1,0,0,1,5,6H7V7A1,1,0,0,0,9,7V6h6V7a1,1,0,0,0,2,0V6h2a1,1,0,0,1,1,1Z"/></svg>
                    </span>
                    <input type="date" name="date_to" id="date_to" class="filter__input" value="<?php echo isset($_GET['date_to']) ? htmlspecialchars($_GET['date_to']) : ''; ?>">
                  </div>
                </div>
              </div>
              
              <div class="col-12 col-md-2">
                <button type="submit" class="filter__btn filter__btn--submit">
                  <span>Lọc</span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11,20a1,1,0,0,1-.707-1.707L13.586,15H11a1,1,0,0,1,0-2h5a1,1,0,0,1,1,1v5a1,1,0,0,1-2,0V16.414l-3.293,3.293A1,1,0,0,1,11,20Z"/><path d="M13,22a1,1,0,0,1-.707-.293l-2-2A1,1,0,0,1,10,19V15a1,1,0,0,1,1-1h2.586l-3.293-3.293a1,1,0,0,1,1.414-1.414l5,5A1,1,0,0,1,17,15v2a1,1,0,0,1-.293.707l-3,3A1,1,0,0,1,13,22Z" opacity="0.5"/><path d="M13,12a1,1,0,0,1-.707-.293L9,8.414V10a1,1,0,0,1-2,0V5a1,1,0,0,1,1-1h5a1,1,0,0,1,0,2H10.414l3.293,3.293a1,1,0,0,1,0,1.414A1,1,0,0,1,13,12Z"/><path d="M5,14a1,1,0,0,1-.707-1.707l5-5A1,1,0,0,1,10,7h2a1,1,0,0,1,.707.293l3,3a1,1,0,0,1-1.414,1.414L12,9.414,7.707,13.707A1,1,0,0,1,7,14Z" opacity="0.5"/></svg>
                </button>
              </div>
            </div>
            
            <div class="row mt-4">
              <div class="col-12">
                <?php if (!empty($_GET['date_from']) || !empty($_GET['date_to'])): ?>
                <div class="filter__tags">
                  <span class="filter__tags-title">Đang lọc:</span>
                  
                  <?php if (!empty($_GET['date_from'])): ?>
                  <span class="filter__tag">
                    Từ ngày: <?php echo htmlspecialchars($_GET['date_from']); ?>
                    <a href="?page=<?php echo htmlspecialchars($_GET['page'] ?? 'bookings'); ?>&p=1<?php echo !empty($_GET['date_to']) ? '&date_to='.htmlspecialchars($_GET['date_to']) : ''; ?>" class="filter__tag-close">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/></svg>
                    </a>
                  </span>
                  <?php endif; ?>
                  
                  <?php if (!empty($_GET['date_to'])): ?>
                  <span class="filter__tag">
                    Đến ngày: <?php echo htmlspecialchars($_GET['date_to']); ?>
                    <a href="?page=<?php echo htmlspecialchars($_GET['page'] ?? 'bookings'); ?>&p=1<?php echo !empty($_GET['date_from']) ? '&date_from='.htmlspecialchars($_GET['date_from']) : ''; ?>" class="filter__tag-close">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/></svg>
                    </a>
                  </span>
                  <?php endif; ?>
                  
                  <?php if (!empty($_GET['date_from']) || !empty($_GET['date_to'])): ?>
                  <a href="?page=<?php echo htmlspecialchars($_GET['page'] ?? 'bookings'); ?>&p=1" class="filter__clear">Xóa tất cả</a>
                  <?php endif; ?>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- end filter -->
      
      <!-- users -->
      <div class="col-12">
        <div class="main__table-wrap">
          <table class="main__table">
            <thead>
              <tr>
                <th>ID</th>
                <th>HỌ TÊN</th>
                <th>PHIM</th>
                <th>LỊCH CHIẾU</th>
                <th>NGÀY ĐẶT</th>
                <th>ACTIONS</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($bookings as $k => $v) { ?>
                <tr>
                  <td>
                    <div class="main__table-text"><?php echo $v['id']; ?></div>
                  </td>
                  <td>
                    <div class="main__table-text"><?php echo $v['user_full_name']; ?></div>
                  </td>
                  <td>
                    <div class="main__table-text"><?php echo $v['film_name']; ?></div>
                  </td>
                  <td>
                    <div class="main__table-text"><?php echo $v['schedule_start_time']; ?></div>
                  </td>
                  <td>
                    <div class="main__table-text"><?php echo $v['created_at']; ?></div>
                  </td>
                  <td>
                    <div class="main__table-btns">
                      <a href="booking.html?id=<?php echo $v['id']; ?>" class="main__table-btn main__table-btn--view">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                        </svg>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- end users -->

      <!-- paginator -->
      <?php if ($totalPages > 1) { ?>
      <div class="col-12">
        <div class="paginator-wrap">
          <span><?php echo ($page-1)*$limit+1; ?> đến <?php echo min($page*$limit, $total); ?> của <?php echo $total; ?></span>

          <ul class="paginator">
            <?php if ($page > 1) { ?>
            <li class="paginator__item paginator__item--prev">
              <a href="?p=<?php echo $page-1; ?><?php echo isset($_GET['date_from']) ? '&date_from='.htmlspecialchars($_GET['date_from']) : ''; ?><?php echo isset($_GET['date_to']) ? '&date_to='.htmlspecialchars($_GET['date_to']) : ''; ?><?php echo isset($_GET['user_id']) ? '&user_id='.intval($_GET['user_id']) : ''; ?><?php echo isset($_GET['film_id']) ? '&film_id='.intval($_GET['film_id']) : ''; ?>"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M8.5,12.8l5.7,5.6c0.4,0.4,1,0.4,1.4,0c0,0,0,0,0,0c0.4-0.4,0.4-1,0-1.4l-4.9-5l4.9-5c0.4-0.4,0.4-1,0-1.4c-0.2-0.2-0.4-0.3-0.7-0.3c-0.3,0-0.5,0.1-0.7,0.3l-5.7,5.6C8.1,11.7,8.1,12.3,8.5,12.8C8.5,12.7,8.5,12.7,8.5,12.8z"></path></svg></a>
            </li>
            <?php } ?>
            
            <?php
            $startPage = max(1, $page - 2);
            $endPage = min($totalPages, $startPage + 4);
            
            // Tạo chuỗi query string cho URL phân trang
            $queryParams = [];
            if (isset($_GET['date_from']) && !empty($_GET['date_from'])) {
              $queryParams[] = 'date_from=' . htmlspecialchars($_GET['date_from']);
            }
            if (isset($_GET['date_to']) && !empty($_GET['date_to'])) {
              $queryParams[] = 'date_to=' . htmlspecialchars($_GET['date_to']);
            }
            if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
              $queryParams[] = 'user_id=' . intval($_GET['user_id']);
            }
            if (isset($_GET['film_id']) && !empty($_GET['film_id'])) {
              $queryParams[] = 'film_id=' . intval($_GET['film_id']);
            }
            // Thêm tham số page để giữ nguyên trang hiện tại
            if (isset($_GET['page']) && !empty($_GET['page'])) {
              $queryParams[] = 'page=' . htmlspecialchars($_GET['page']);
            }
            $queryString = !empty($queryParams) ? '&' . implode('&', $queryParams) : '';
            
            for ($i = $startPage; $i <= $endPage; $i++) {
              $activeClass = ($i == $page) ? 'paginator__item--active' : '';
            ?>
            <li class="paginator__item <?php echo $activeClass; ?>"><a href="?p=<?php echo $i; ?><?php echo $queryString; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            
            <?php if ($page < $totalPages) { ?>
            <li class="paginator__item paginator__item--next">
              <a href="?p=<?php echo $page+1; ?><?php echo $queryString; ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.54,11.29,9.88,5.64a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.95,5L8.46,17a1,1,0,0,0,0,1.41,1,1,0,0,0,.71.3,1,1,0,0,0,.71-.3l5.66-5.65A1,1,0,0,0,15.54,11.29Z"></path></svg></a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <?php } ?>
      <!-- end paginator -->
    </div>
  </div>
</main>
<!-- end main content -->