<?php
    require '../config.php';

    $sql = "SELECT * FROM news ORDER BY created_at DESC, id DESC";
    $result = mysqli_query($conn, $sql);

    if(!$result) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titleSearch = $_POST['titleSearch'] ?? '';
        if($titleSearch != '') {
            $sql = "SELECT * FROM news WHERE title LIKE '%$titleSearch%' ORDER BY created_at DESC, id DESC";
            $result = mysqli_query($conn, $sql);

            if(!$result) {
                die("Lỗi truy vấn: " . mysqli_error($conn));
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài viết</title>
</head>
<body>
    <h1>Danh sách bài viết</h1>

    <p>
        <a href="../main.php">Quay lại trang chủ</a>
    </p>
    <form action="" method="post">
        <p>
            <input type="text" placeholder="Tìm kiếm bài viết theo tiêu đề..." name="titleSearch" style="width: 200px"></input>
            <button type="submit">Tìm kiếm</button>
        </p>
    </form>
    

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Ngày tạo</th>
            <th>Cập nhật</th>
            <th>Hành động</th>
        </tr>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?> 
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo htmlspecialchars($row['title']) ?></td>
                    <td><?php echo $row['created_at'] ?></td>
                    <td><?php echo $row['updated_at'] ?></td>
                    <td>
                        <a href="view_news.php?id=<?php echo $row['id']; ?>">
                            Xem chi tiết
                        </a>
                        <br>
                        <a href="edit_news.php?id=<?php echo $row['id']; ?>">
                            Sửa
                        </a>
                        <br>
                        <a href="delete_news.php?id=<?php echo $row['id']; ?>" style="color: red;" onclick="return confirm('Bạn có chắc chắn muốn xoá bài viết này không?');">
                            Xoá
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Chưa có bài viết nào</td>
            </tr>
        <?php endif; ?>
    </table>

    <p>
        <a href="add_news.php">+ Thêm bài viết mới</a>
    </p>
</body>
</html> 

<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    body {
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    a {
        text-decoration: none;
        color: #0066cc;
    }

    a:hover {
        text-decoration: underline;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
</style>