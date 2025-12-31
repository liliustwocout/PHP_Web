<?php

require '..\vendor\autoload.php';
use App\Models\News;

$id = $_GET['id'] ?? '';
if($id == '') {
    die("Thiếu tham số id");
}

$newsModel = new News();
if($newsModel->delete($_GET['id'])) {
    header("Location: list_news.php");
    exit();
} else {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}
?>