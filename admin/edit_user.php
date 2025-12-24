<?php
require '../config.php';

$id = $_GET['id'] ?? '';

if($id == '') {
    die("Thiếu tham số id");
}

$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

if(!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}

if(mysqli_num_rows($result) == 0) {
    die("Không tìm thấy người dùng với id = $id");
}
$user = mysqli_fetch_assoc($result);
$message = "";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $gender = $_POST['gender'] ?? '';
    if($username == '' || $email == '' || $gender == '') {
        $message = "Vui lòng điền đầy đủ thông tin";
    } else {
        $now = date('Y-m-d H:i:s');

        $sqlUpdate = "UPDATE users SET username = '$username',
                email = '$email',
                gender = '$gender',
                updated_at = '$now'
                WHERE id = $id";
        $ok = mysqli_query($conn, $sqlUpdate);
        if(!$ok) {
            die("Lỗi truy vấn: " . mysqli_error($conn));
        } else {
            header("Location: list_users.php");
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
    <title>Sửa tài khoản</title>
</head>
<body>
    <h1>Sửa tài khoản</h1>
    <p>Tên đăng nhập: <?php echo htmlspecialchars($user['username']); ?></p>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <p>Giới tính: <?php echo htmlspecialchars($user['gender']); ?></p>
    <p>
        <a href="list_users.php">← Quay lại danh sách</a>
    </p>

    <?php if($message !== ""): ?> 
        <p style="color: red;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <p>
            <label>Username: </label>
            <input type="text" name="username" required>
        </p>
        <p>
            <label>Email: </label>
            <input type="text" name="email" required>
        </p>
        <p>
            <label>Password: </label>
            <input type="password" name="password" required>
        </p>
        <p>
            <label>Gender: </label>
            <select name="gender" required>
                <option value="">Chọn giới tính</option>
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
                <option value="other">Khác</option>
            </select>
        </p>
        <p>
            <button type="submit">Cập nhật</button>
        </p>
    </form> 
</body>
</html>