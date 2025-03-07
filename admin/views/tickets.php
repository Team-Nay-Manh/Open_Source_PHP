<?php
$ticket = new Ticket;
?>
<!-- main content -->
<main class="main">
  <div class="container-fluid">
    <div class="row">
      <!-- main title -->
      <div class="col-12">
        <div class="main__title">
          <h2>Danh sách giá vé</h2>
          <!--<span class="main__title-stat">14,452 Total</span>-->
        </div>
      </div>
      <!-- end main title -->
      <!-- users -->
      <div class="col-12">
        <div class="main__table-wrap">
          <table class="main__table">
            <thead>
              <tr>
                <th>ID</th>
                <th>LOẠI VÉ</th>
                <th>GIÁ</th>
                <th>ACTIONS</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($ticket->GetTickets() as $k => $v) { ?>
                <tr>
                  <td>
                    <div class="main__table-text"><?php echo $v['id']; ?></div>
                  </td>
                  <td>
                    <div class="main__table-text"><?php echo $v['type']; ?></div>
                  </td>
                  <td>
                    <div class="main__table-text"><?php echo formatPrice($v['price']); ?></div>
                  </td>
                  <td>
                    <div class="main__table-btns">
                      <a href="ticket.html?id=<?php echo $v['id']; ?>" class="main__table-btn main__table-btn--edit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <path d="M5,18H9.24a1,1,0,0,0,.71-.29l6.92-6.93h0L19.71,8a1,1,0,0,0,0-1.42L15.47,2.29a1,1,0,0,0-1.42,0L11.23,5.12h0L4.29,12.05a1,1,0,0,0-.29.71V17A1,1,0,0,0,5,18ZM14.76,4.41l2.83,2.83L16.17,8.66,13.34,5.83ZM6,13.17l5.93-5.93,2.83,2.83L8.83,16H6ZM21,20H3a1,1,0,0,0,0,2H21a1,1,0,0,0,0-2Z" />
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
      <!--                                    <div class="col-12">
                                                    <div class="paginator-wrap">
                                                        <span>10 from 14 452</span>
            
                                                        <ul class="paginator">
                                                            <li class="paginator__item paginator__item--prev">
                                                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M8.5,12.8l5.7,5.6c0.4,0.4,1,0.4,1.4,0c0,0,0,0,0,0c0.4-0.4,0.4-1,0-1.4l-4.9-5l4.9-5c0.4-0.4,0.4-1,0-1.4c-0.2-0.2-0.4-0.3-0.7-0.3c-0.3,0-0.5,0.1-0.7,0.3l-5.7,5.6C8.1,11.7,8.1,12.3,8.5,12.8C8.5,12.7,8.5,12.7,8.5,12.8z"></path></svg></a>
                                                            </li>
                                                            <li class="paginator__item"><a href="#">1</a></li>
                                                            <li class="paginator__item paginator__item--active"><a href="#">2</a></li>
                                                            <li class="paginator__item"><a href="#">3</a></li>
                                                            <li class="paginator__item"><a href="#">4</a></li>
                                                            <li class="paginator__item paginator__item--next">
                                                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.54,11.29,9.88,5.64a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.95,5L8.46,17a1,1,0,0,0,0,1.41,1,1,0,0,0,.71.3,1,1,0,0,0,.71-.3l5.66-5.65A1,1,0,0,0,15.54,11.29Z"></path></svg></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>-->
      <!-- end paginator -->
    </div>
  </div>
</main>
<!-- end main content -->