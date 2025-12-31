<?php

require '..\vendor\autoload.php';
use App\Models\Users;

$id = $_GET['id'] ?? '';
if($id == '') {
    die("Thiếu tham số id");
}

$usersModel = new Users();
if($usersModel->delete($_GET['id'])) {
    header("Location: list_users.php");
    exit();
} else {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}
?>