<?php
namespace App\Database;

class Connect {
    private $host = 'localhost';
    private $dbname = 'news_db';
    private $username = 'root';
    private $password = '';
    protected $conn;

    public function __construct() {
        $this->connect();
    }

    protected function connect() {
        $this->conn = mysqli_connect(
            $this->conn,
            $this->username,
            $this->password,
            $this->dbname
        );

        if(!$this->conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>