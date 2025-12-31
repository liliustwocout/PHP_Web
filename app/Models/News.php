<?php
namespace App\Models;

use App\Database\Connect;

class News extends Connect {
    public function getAll() {
        $sql = "SELECT * FROM news ORDER BY id DESC";

        return mysqli_query($this->conn, $sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM news WHERE id = $id";
        return mysqli_query($this->conn, $sql);
    }

    public function insert($title, $content) {
        $created_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO news (title, content, created_at)
                VALUES ('$title', '$content', '$created_at')";
        return mysqli_query($this->conn, $sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM news WHERE id = $id";
        return mysqli_query($this->conn, $sql);
    }
}
?>
