<?php
class Film extends DB
{
  function GetFilms($page = 1, $keyword = '')
  {
    if ($keyword != '') $keyword = 'WHERE MATCH(F.name) AGAINST("' . mysqli_escape_string($this->conn, $keyword) . '")';
    else $keyword = '';

    $a = mysqli_query($this->conn, 'SELECT F.*, C.name AS country_name, R.name AS rated_name FROM film F LEFT JOIN country C ON F.country_id = C.id LEFT JOIN rated R ON F.rated_id = R.id ' . $keyword . ' ORDER BY F.id DESC ' . $this->Offset($page));
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }

  function GetFilmsByCategoryId($page = 1, $category_id)
  {
    $a = mysqli_query($this->conn, 'SELECT F.*, C.name AS country_name, R.name AS rated_name FROM category_film CF LEFT JOIN film F ON CF.film_id = F.id LEFT JOIN country C ON F.country_id = C.id LEFT JOIN rated R ON F.rated_id = R.id WHERE CF.category_id = ' . $category_id . ' ORDER BY F.id DESC ' . $this->Offset($page));
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }

  function GetFilm($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $a = mysqli_query($this->conn, 'SELECT F.*, C.name AS country_name, R.name AS rated_name FROM film F LEFT JOIN country C ON F.country_id = C.id LEFT JOIN rated R ON F.rated_id = R.id WHERE F.id = ' . $id);
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a))
        $b = $row;
    else $b = false;
    mysqli_free_result($a);
    return $b;
  }

  function InsertFilm($name, $poster, $trailer, $director, $actor, $opening_day, $description, $duration, $country_id, $rated_id, $list)
  {
    $created_at = date('Y-m-d H:i:s');
    $stmt = mysqli_prepare($this->conn, 'INSERT INTO film(name, poster, trailer, director, actor, opening_day, description, duration, country_id, rated_id, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssssssiis', $name, $poster, $trailer, $director, $actor, $opening_day, $description, $duration, $country_id, $rated_id, $created_at);
    $a = $stmt->execute();
    $stmt->close();
    mysqli_begin_transaction($this->conn);
    try {
      $film_id = mysqli_insert_id($this->conn);
      mysqli_query($this->conn, 'DELETE FROM category_film WHERE film_id = ' . $film_id);
      foreach ($list as $k => $v) {
        $category_id = mysqli_escape_string($this->conn, $v);
        if (mysqli_query($this->conn, 'INSERT INTO category_film(category_id, film_id) VALUES(' . $category_id . ', ' . $film_id . ')') == false) {
          mysqli_rollback($this->conn);
          throw new Exception('Co loi xay ra!');
        }
      }
      mysqli_commit($this->conn);
    } catch (Exception $e) {
      mysqli_rollback($this->conn);
    }

    return $a;
  }

  function UpdateFilm($id, $name, $poster, $trailer, $director, $actor, $opening_day, $description, $duration, $country_id, $rated_id)
  {
    $updated_at = date('Y-m-d H:i:s');
    $stmt = mysqli_prepare($this->conn, 'UPDATE film SET name = ?, poster = ?, trailer = ?, director = ?, actor = ?, opening_day = ?, description = ?, duration = ?, country_id = ?, rated_id = ?, updated_at = ? WHERE id = ?');
    $stmt->bind_param('ssssssssiisi', $name, $poster, $trailer, $director, $actor, $opening_day, $description, $duration, $country_id, $rated_id, $updated_at, $id);
    $a = $stmt->execute();
    $stmt->close();
    return $a;
  }

  function UpdateFilmCategories($film_id, $list)
  {
    mysqli_begin_transaction($this->conn);
    try {
      $film_id = mysqli_escape_string($this->conn, $film_id);
      mysqli_query($this->conn, 'DELETE FROM category_film WHERE film_id = ' . $film_id);
      foreach ($list as $k => $v) {
        $category_id = mysqli_escape_string($this->conn, $v);
        if (mysqli_query($this->conn, 'INSERT INTO category_film(category_id, film_id) VALUES(' . $category_id . ', ' . $film_id . ')') == false) {
          mysqli_rollback($this->conn);
          return false;
        }
      }
      mysqli_commit($this->conn);
      return true;
    } catch (Exception $e) {
      mysqli_rollback($this->conn);
      return false;
    }
  }

  function DeleteFilm($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    mysqli_begin_transaction($this->conn);
    try {
      mysqli_query($this->conn, 'DELETE FROM category_film WHERE film_id = ' . $id);
      if (mysqli_query($this->conn, 'DELETE FROM film WHERE id = ' . $id) == false) throw new Exception('Khong the xoa phim!');
      mysqli_commit($this->conn);
      return true;
    } catch (Exception $e) {
      mysqli_rollback($this->conn);
      return false;
    }
  }

  public function GetCount()
  {
    $total = mysqli_query($this->conn, "SELECT COUNT(id) AS total FROM film");
    $total = mysqli_fetch_assoc($total)['total'];
    return $total;
  }
}
