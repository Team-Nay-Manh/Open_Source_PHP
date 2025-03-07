<?php
class Schedule extends DB
{
  function GetSchedules()
  {
    $a = mysqli_query($this->conn, 'SELECT S.*, F.name AS film_name, F.poster AS film_poster, C.name AS cinema_name, C.address AS cinema_address, R.name AS room_name FROM schedule S LEFT JOIN cinema C ON S.cinema_id = C.id LEFT JOIN room R ON S.room_id = R.id LEFT JOIN film F ON S.film_id = F.id ORDER BY S.id DESC');
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }

  function GetSchedule($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $a = mysqli_query($this->conn, 'SELECT S.*, C.name AS cinema_name, C.address AS cinema_address, R.name AS room_name FROM schedule S LEFT JOIN cinema C ON S.cinema_id = C.id LEFT JOIN room R ON S.room_id = R.id WHERE S.id = ' . $id);
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a))
        $b = $row;
    else $b = false;
    mysqli_free_result($a);
    return $b;
  }

  function GetSchedulesByFilmIdByDate($film_id, $date)
  {
    $film_id = mysqli_escape_string($this->conn, $film_id);
    $date = mysqli_escape_string($this->conn, $date);
    $a = mysqli_query($this->conn, 'SELECT S.*, C.name AS cinema_name, C.address AS cinema_address, R.name AS room_name FROM schedule S LEFT JOIN cinema C ON S.cinema_id = C.id LEFT JOIN room R ON S.room_id = R.id WHERE S.film_id = ' . $film_id . '  AND DATE(S.start_time) = "' . $date . '" ORDER BY TIME(S.start_time) ASC');
    $b = array();
    if (mysqli_num_rows($a))
      while ($row = mysqli_fetch_assoc($a)) {
        $b = array_merge($b, array($row));
      }
    mysqli_free_result($a);
    return $b;
  }

  function InsertSchedule($film_id, $cinema_id, $room_id, $start_time)
  {
    $stmt = mysqli_prepare($this->conn, 'INSERT INTO schedule (film_id, cinema_id, room_id, start_time) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('iiis', $film_id, $cinema_id, $room_id, $start_time);
    $a = $stmt->execute();
    $stmt->close();
    return $a;
  }

  function UpdateSchedule($id, $film_id, $cinema_id, $room_id, $start_time)
  {
    $stmt = mysqli_prepare($this->conn, 'UPDATE schedule SET film_id = ?, cinema_id = ?, room_id = ?, start_time = ? WHERE id = ?');
    $stmt->bind_param('iiisi', $film_id, $cinema_id, $room_id, $start_time, $id);
    $a = $stmt->execute();
    $stmt->close();
    return $a;
  }

  function DeleteSchedule($id)
  {
    $id = mysqli_escape_string($this->conn, $id);
    $query = mysqli_query($this->conn, 'DELETE FROM schedule WHERE id = ' . $id);
    if ($query) return true;
    return false;
  }
}
