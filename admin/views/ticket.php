<?php
$id = 0;
$type = $price = $main_title = '';
$ticket = new Ticket;

if (getGET('id')) {
  $t = $ticket->GetTicket(getGET('id'));
  ['id' => $id, 'type' => $type, 'price' => $price] = $t;
  $main_title = 'Chỉnh sửa Giá vé #' . $t['type'];
}
if (!$id) echo '<script>window.location.replace("tickets.html");</script>';

if ($_POST) {
  if ($ticket->UpdateTicket(getGET('id'), getPOST('price')))
    ['id' => $id, 'type' => $type, 'price' => $price] = $ticket->GetTicket(getGET('id'));
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
                  <input type="text" class="form__input" placeholder="Price" value="<?php echo $price; ?>" name="price" required />
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