<?php
require '../config.php';

$id = $_GET['id'] ?? '';
if($id == '') {
    die("Thiếu tham số id");
}

$sql = "DELETE FROM news WHERE id = $id";
$ok = mysqli_query($conn, $sql);

if(!$ok) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
} else {
    header("Location: list_news.php");
    exit();
}
?>