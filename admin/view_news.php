<?php
require '../vendor/autoload.php';
use App\Models\News;

$id = $_GET['id'] ?? '';

if($id == '') {
    die("Thiếu tham số id");
}

$id = $_GET['id'];
$newsModel = new News();
$result = $newsModel->getById($id);

$news = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($news['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($news['title']); ?></h1>

    <p><em>Ngày tạo: <?php echo $news['created_at']; ?></em></p>
    <hr>
    <div>
        <?php echo nl2br(htmlspecialchars($news['content'])); ?>
    </div>
    <hr>

    <p>
        <a href="list_news.php">← Quay lại danh sách</a>
    </p>
</body>
</html>