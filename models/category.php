<?php
class Category extends DB
{
  function GetCategories()
  {
    $a = mysqli_query($this->conn, 'SELECT * FROM category');
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }

  function GetCategory($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $a = mysqli_query($this->conn, 'SELECT * FROM category WHERE id = ' . $id);
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a))
        $b = $row;
    else $b = false;
    mysqli_free_result($a);
    return $b;
  }

  function GetCategoriesByFilmId($film_id)
  {
    $film_id = mysqli_escape_string($this->conn, $film_id);
    $a = mysqli_query($this->conn, 'SELECT C.* FROM category_film CF LEFT JOIN category C ON CF.category_id = C.id LEFT JOIN film F ON CF.film_id = F.id WHERE F.id = ' . $film_id);
    $b = array();
    if (mysqli_num_rows($a)) {
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
      mysqli_free_result($a);
    }
    return $b;
  }

  function InsertCategory($name)
  {
    $name = mysqli_escape_string($this->conn, $name);
    $query = mysqli_query($this->conn, 'INSERT INTO category(name) VALUES("' . $name . '")');
    if ($query) return true;
    return false;
  }

  function UpdateCategory($id, $name)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $name = mysqli_escape_string($this->conn, $name);
    $query = mysqli_query($this->conn, 'UPDATE category SET name = "' . $name . '" WHERE id = ' . $id);
    if ($query) return true;
    return false;
  }

  function DeleteCategory($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $query = mysqli_query($this->conn, 'DELETE FROM category WHERE id = ' . $id);
    if ($query) return true;
    return false;
  }
}
