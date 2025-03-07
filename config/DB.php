<?php
class DB
{
    public $conn;
    function __construct()
    {
        $conn = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB) or die('Không thể kết nối tới database!');
        mysqli_set_charset($conn, "utf8");
        $this->conn = $conn;
    }

    function __destruct()
    {
        mysqli_close($this->conn);
    }

    public function Offset($page = 1, $limit = DATA_PER_PAGE)
    {
        $limit = mysqli_escape_string($this->conn, $limit);
        if ($limit == 0) return '';
        $page = mysqli_escape_string($this->conn, $page);
        if ($page < 1 || !is_numeric($page)) $page = 1;
        $offset = ' LIMIT ' . (($page - 1) *  $limit) . ',' .  $limit;
        return $offset;
    }
}
