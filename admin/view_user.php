<?php
    require '../config.php';

    $id = $_GET['id'] ?? '';
    $username = $_GET['username'] ?? '';

    if($id == '' && $username == '') {
        die("Thiếu tham số id hoặc username");
    }

    $sql = "SELECT * FROM users WHERE id = '$id' OR username = '$username'";
    $result = mysqli_query($conn, $sql);

    if(!$result) {
        die("Lỗi truy vấn: " . mysqli_error($conn));
    }

    if(mysqli_num_rows($result) == 0) {
        die("Không tìm thấy người dùng với id = $id hoặc username = $username");
    }

    $user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($user['username']) ?></title>
</head>
<body>
    <h1>Thông tin người dùng</h1>
    <p>ID: <?php echo htmlspecialchars($user['id']) ?></p>
    <p>Tên đăng nhập: <?php echo htmlspecialchars($user['username']) ?></p>
    <p>Email: <?php echo htmlspecialchars($user['email']) ?></p>
    <p>Giới tính: <?php echo htmlspecialchars($user['gender']) ?></p>
    <p>Ngày tạo: <?php echo htmlspecialchars($user['created_at']) ?></p>

    <p>
        <a href="list_users.php">← Quay lại danh sách</a>
    </p>
</body>
</html>