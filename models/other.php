<?php
class Other extends DB
{
  function GetProfit()
  {
    $total = mysqli_query($this->conn, 'SELECT SUM(total_price) AS total FROM booking');
    $total = mysqli_fetch_assoc($total)['total'];
    return $total;
  }

  function GetListRated()
  {
    $a = mysqli_query($this->conn, 'SELECT * FROM rated');
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }
}
