<?php
class Cinema extends DB
{
  function GetCinemas()
  {
    $a = mysqli_query($this->conn, 'SELECT * FROM cinema');
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }

  function GetCinema($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $a = mysqli_query($this->conn, 'SELECT * FROM cinema WHERE id = ' . $id);
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a))
        $b = $row;
    else $b = false;
    mysqli_free_result($a);
    return $b;
  }

  function InsertCinema($name, $address)
  {
    $name = mysqli_escape_string($this->conn, $name);
    $address = mysqli_escape_string($this->conn, $address);
    $query = mysqli_query($this->conn, 'INSERT INTO cinema(name, address) VALUES("' . $name . '", "' . $address . '")');
    if ($query) return true;
    return false;
  }

  function UpdateCinema($id, $name, $address)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $name = mysqli_escape_string($this->conn, $name);
    $address = mysqli_escape_string($this->conn, $address);
    $query = mysqli_query($this->conn, 'UPDATE cinema SET name = "' . $name . '", address = "' . $address . '" WHERE id = ' . $id);
    if ($query) return true;
    return false;
  }

  function DeleteCinema($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $query = mysqli_query($this->conn, 'DELETE FROM cinema WHERE id = ' . $id);
    if ($query) return true;
    return false;
  }
}
