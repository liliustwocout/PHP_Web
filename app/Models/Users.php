<?php
namespace App\Models;

use App\Database\Connect;

class Users extends Connect {
    public function getAll() {
        $sql = "SELECT * FROM users ORDER BY id DESC";

        return mysqli_query($this->conn, $sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM users WHERE id = $id";
        return mysqli_query($this->conn, $sql);
    }

    public function insert($username, $email) {
        $created_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO users (username, email, created_at)
                VALUES ('$username', '$email', '$created_at')";
        return mysqli_query($this->conn, $sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id = $id";
        return mysqli_query($this->conn, $sql);
    }
}

?>