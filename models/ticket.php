<?php
class Ticket extends DB
{
  function GetTickets()
  {
    $a = mysqli_query($this->conn, 'SELECT * FROM ticket');
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }

  function GetTicket($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $a = mysqli_query($this->conn, 'SELECT * FROM ticket WHERE id = ' . $id);
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a))
        $b = $row;
    else $b = false;
    mysqli_free_result($a);
    return $b;
  }

  function UpdateTicket($id, $price)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $price = mysqli_escape_string($this->conn, $price);
    $query = mysqli_query($this->conn, 'UPDATE ticket SET price = "' . $price . '" WHERE id = ' . $id);
    if ($query) return true;
    return false;
  }
}
