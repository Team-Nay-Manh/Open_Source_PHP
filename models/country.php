<?php
class Country extends DB
{
  function GetCountries()
  {
    $a = mysqli_query($this->conn, 'SELECT * FROM country');
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }

  function GetCountry($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $a = mysqli_query($this->conn, 'SELECT * FROM country WHERE id = ' . $id);
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a))
        $b = $row;
    else $b = false;
    mysqli_free_result($a);
    return $b;
  }

  function InsertCountry($name)
  {
    $name = mysqli_escape_string($this->conn, $name);
    $query = mysqli_query($this->conn, 'INSERT INTO country(name) VALUES("' . $name . '")');
    if ($query) return true;
    return false;
  }

  function UpdateCountry($id, $name)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $name = mysqli_escape_string($this->conn, $name);
    $query = mysqli_query($this->conn, 'UPDATE country SET name = "' . $name . '" WHERE id = ' . $id);
    if ($query) return true;
    return false;
  }

  function DeleteCountry($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $query = mysqli_query($this->conn, 'DELETE FROM country WHERE id = ' . $id);
    if ($query) return true;
    return false;
  }
}
