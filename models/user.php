<?php
class User extends DB
{
    function GetUsers()
    {
        $a = mysqli_query($this->conn, 'SELECT * FROM user ORDER BY id DESC');
        $b = array();
        if (mysqli_num_rows($a))
            while ($row = mysqli_fetch_assoc($a)) {
                $b = array_merge($b, array($row));
            }
        mysqli_free_result($a);
        return $b;
    }

    function GetUserByID($user_id)
    {
        $user_id = mysqli_escape_string($this->conn, $user_id);
        $query = mysqli_query($this->conn, 'SELECT * FROM user WHERE id = ' . $user_id);
        $row = mysqli_fetch_assoc($query);
        if ($row) {
            return $row;
        }
        return null;
    }

    function GetUserByEmail($email)
    {
        $email = mysqli_escape_string($this->conn, $email);
        $query = mysqli_query($this->conn, 'SELECT * FROM user WHERE email = "' . $email . '"');
        $row = mysqli_fetch_assoc($query);
        if ($row) {
            return $row;
        }
        return null;
    }

    function login($email, $password)
    {
        $email = mysqli_escape_string($this->conn, $email);
        $password = sha1($password);
        $query = mysqli_query($this->conn, 'SELECT * FROM user WHERE email = "' . $email . '" AND password = "' . $password . '"');
        $row = mysqli_fetch_assoc($query);
        if ($row) {
            return $row;
        }
        return null;
    }


    function register($full_name, $email, $password, $phone, $address)
    {
        $full_name = mysqli_escape_string($this->conn, $full_name);
        $email = mysqli_escape_string($this->conn, $email);
        $password = sha1($password);
        $phone = mysqli_escape_string($this->conn, $phone);
        $address = mysqli_escape_string($this->conn, $address);
        if ($this->getUserByEmail($email)) return false;

        $query = mysqli_query($this->conn, 'INSERT INTO user(full_name, email, password, phone, address) VALUES("' . $full_name . '", "' . $email . '", "' . $password . '", "' . $phone . '", "' . $address . '")');
        if ($query) return mysqli_insert_id($this->conn);
        return false;
    }

    function UpdateProfile($user_id, $full_name, $phone, $address)
    {
        $user_id = mysqli_escape_string($this->conn, $user_id);
        $full_name = mysqli_escape_string($this->conn, $full_name);
        $phone = mysqli_escape_string($this->conn, $phone);
        $address = mysqli_escape_string($this->conn, $address);
        return mysqli_query($this->conn, 'UPDATE user SET full_name = "' . $full_name . '", phone = "' . $phone . '", address = "' . $address . '" WHERE id = ' . $user_id);
    }

    function UpdatePassword($user_id, $password)
    {
        $user_id = mysqli_escape_string($this->conn, $user_id);
        $password = sha1($password);
        return mysqli_query($this->conn, 'UPDATE user SET password = "' . $password . '" WHERE id = ' . $user_id);
    }

    function GetCountUsers()
    {
        $total = mysqli_query($this->conn, 'SELECT COUNT(id) AS total FROM user');
        $total = mysqli_fetch_assoc($total)['total'];
        return $total;
    }
}
