<?php

require '../vendor/autoload.php'; 
use Carbon\Carbon;
use App\Models\News;

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if ($title === '' || $content === '') {
        $message = ("Vui lòng nhập đầy đủ tiêu đề và nội dung.");
    } else {
        $newsModel = new News();
        if($newsModel->insert($title, $content)) {
            $message = "Thêm bài viết thành công.";
        } else {
            $message = "Lỗi khi thêm bài viết: " . mysqli_error($conn);
        }
    }
        header('Location: list_news.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài viết mới</title>
</head>
<body>
    <h1>Thêm bài viết mới</h1>

    <p>
        <a href="list_news.php">Xem danh sách bài viết</a>
    </p>

    <?php if($message !== ""): ?> 
        <p><?php echo $message; ?></p>
    <?php endif; ?>    
    
    <form action="" method="post">
        <p>
            <label>Tiêu đề: </label>
            <input type="text" name="title" style="width: 450px;" required>
        </p>
        <p>
            <label>Nội dung: </label>
            <textarea name="content" rows="8" cols="60" required></textarea>
        </p>
        <p>
            <button type="submit">Lưu</button>
        </p>
    </form>

</body>
</html>