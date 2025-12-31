<?php

require '../vendor/autoload.php';
use App\Models\News;

$id = $_GET['id'] ?? '';

if($id == '') {
    die("Thiếu tham số id");
}

$newsModel = new News();
$result = $newsModel->getById($id);

if(!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}

if(mysqli_num_rows($result) == 0) {
    die("Không tìm thấy bài viết với id = $id");
}

$news = mysqli_fetch_assoc($result);
$message = "";
// Xử lý khi người dùng submit form

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if($title == '' || $content == '') {
        $message = "Vui lòng điền đầy đủ tiêu đề và nội dung";
    } else {
        $ok = $newsModel->update($id, $title, $content);
        if(!$ok) {
            die("Lỗi truy vấn: " . mysqli_error($conn));
        } else {
            header("Location: list_news.php");
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài viết</title>
</head>
<body>
    <h1>Sửa bài viết</h1>
    <p>Tiêu đề: <?php echo htmlspecialchars($news['title']); ?></p>
    <p>Nội dung: <?php echo htmlspecialchars($news['content']); ?></p>
    <p>
        <a href="list_news.php">← Quay lại danh sách</a>
    </p>

    <?php if($message !== ""): ?> 
        <p style="color: red;"><?php echo $message; ?></p>
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
            <button type="submit">Cập nhật</button>
        </p>
    </form>
</body>
</html>