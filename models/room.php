<?php
class Room extends DB
{
  function GetRooms()
  {
    $a = mysqli_query($this->conn, 'SELECT * FROM room');
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }
}
