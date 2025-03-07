<?php
class Booking extends DB
{
  function GetBookings()
  {
    $a = mysqli_query($this->conn, 'SELECT B.*, U.full_name AS user_full_name, S.start_time AS schedule_start_time, F.id AS film_id, F.name AS film_name, F.poster AS film_poster FROM booking B LEFT JOIN schedule S ON B.schedule_id = S.id LEFT JOIN film F ON S.film_id = F.id LEFT JOIN user U ON B.user_id = U.id ORDER BY B.id DESC');
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }

  function GetBookingById($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $a = mysqli_query($this->conn, 'SELECT B.*, F.id AS film_id, F.name AS film_name, F.poster AS film_poster FROM booking B LEFT JOIN schedule S ON B.schedule_id = S.id LEFT JOIN film F ON S.film_id = F.id WHERE B.id = ' . $id);
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a))
        $b = $row;
    else $b = false;
    mysqli_free_result($a);
    return $b;
  }

  function GetBookingsByUserId($user_id)
  {
    $user_id = mysqli_escape_string($this->conn, $user_id);
    $a = mysqli_query($this->conn, 'SELECT B.*, F.id AS film_id, F.name AS film_name, F.poster AS film_poster FROM booking B LEFT JOIN schedule S ON B.schedule_id = S.id LEFT JOIN film F ON S.film_id = F.id WHERE B.user_id = ' . $user_id . ' ORDER BY B.id DESC');
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }

  function GetBookingDetailsByScheduleId($sid)
  {
    $sid = mysqli_escape_string($this->conn, $sid);
    $a = mysqli_query($this->conn, 'SELECT BD.* FROM booking_detail BD LEFT JOIN booking B ON BD.booking_id = B.id WHERE B.schedule_id = ' . $sid);
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }

  function GetBookingDetailsByBookingId($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $a = mysqli_query($this->conn, 'SELECT * FROM booking_detail WHERE booking_id = ' . $id);
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }

  function Purchase($user_id, $schedule_id, $seats)
  {
    $ticket = new Ticket();
    $t = $ticket->GetTickets();

    mysqli_begin_transaction($this->conn);
    try {
      $listBookingDetails = [];
      foreach ($this->GetBookingDetailsByScheduleId($schedule_id) as $k => $v) {
        $listBookingDetails[$v['seat']] = $v['seat'];
      }
      $user_id = mysqli_escape_string($this->conn, $user_id);
      $schedule_id = mysqli_escape_string($this->conn, $schedule_id);
      $date = date('Y-m-d');
      $query = mysqli_query($this->conn, 'INSERT INTO booking(user_id, schedule_id, total_price, created_at) VALUES(' . $user_id . ', ' . $schedule_id . ', 0, "' . $date . '")');
      $booking_id = 0;
      if ($query) $booking_id = mysqli_insert_id($this->conn);
      if ($booking_id == 0) throw new Exception('Không thể đặt vé, vui lòng thử lại!');

      $total_price = 0;
      $seats = explode(',', $seats);
      foreach ($seats as $k => $v) {
        $row = $col = '';
        $bin = decbin((int)trim($v));
        for ($i = 0; $i < strlen($bin); $i++) {
          if ($i < 7) $row .= $bin[$i];
          else $col .= $bin[$i];
        }
        $ticket_id = 0;
        $seat = '';
        $price = 0;
        $row = chr(bindec($row));
        $col = bindec($col);
        if ('A' <= $row && $row <= 'D') {
          $ticket_id = 1;
          $price = $t[0]['price'];
          $seat = $row . $col;
        } else if ('E' <= $row && $row <= 'H') {
          $ticket_id = 2;
          $price = $t[1]['price'];
          $seat = $row . $col;
        } else if ($row == 'J') {
          $ticket_id = 3;
          $price = $t[2]['price'];
          $seat = $row . $col . ' ' . $row . ($col + 1);
        }
        if ($price > 0) {
          if (empty($listBookingDetails[$seat])) {
            $total_price += $price;
            $query2 = mysqli_query($this->conn, 'INSERT INTO booking_detail(booking_id, ticket_id, seat, price) VALUES(' . $booking_id . ', ' . $ticket_id . ', "' . $seat . '", ' . $price . ')');
            if ($query2 === false) throw new Exception('Không thể tạo chi tiết đặt vé, vui lòng thử lại!');
          } else throw new Exception('Có chỗ ngồi đã đặt.');
        }
      }

      if ($total_price > 0) {
        mysqli_query($this->conn, 'UPDATE booking SET total_price = ' . $total_price . ' WHERE id = ' . $booking_id);
        mysqli_commit($this->conn);
        return $booking_id;
      } else {
        mysqli_rollback($this->conn);
        return 'Có lỗi xảy ra, vui lòng thử lại!';
      }
    } catch (Exception $e) {
      mysqli_rollback($this->conn);
      return $e->getMessage();
    }
  }

  function GetCountBookings()
  {
    $total = mysqli_query($this->conn, 'SELECT COUNT(id) AS total FROM booking');
    $total = mysqli_fetch_assoc($total)['total'];
    return $total;
  }

  function GetCountBookingsByUserId($user_id)
  {
    $user_id = mysqli_escape_string($this->conn, $user_id);
    $total = mysqli_query($this->conn, 'SELECT COUNT(id) AS total FROM booking WHERE user_id = ' . $user_id);
    $total = mysqli_fetch_assoc($total)['total'];
    return $total;
  }
}
