<?php
require '../vendor/autoload.php';
use App\Models\Users;
use Carbon\Carbon;

$message = "";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $gender = $_POST['gender'] ?? '';

    if($username == '' || $email == '' || $password == '' || $gender == '') {
        $message = "Vui lòng điền đầy đủ thông tin";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $usersModel = new Users();
        $result = $usersModel->insert($username, $email, $hashed_password, $gender, $now, $now);

        if(!$result) {
            $message = "Lỗi khi thêm người dùng: " . mysqli_error($conn);
        } else {
            $message = "Người dùng đã được thêm thành công!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng mới</title>
</head>
<body>
    <h1>Thêm người dùng mới</h1>

    <p>
        <a href="list_users.php">Xem danh sách người dùng</a>
    </p>

    <?php if($message !== ""): ?> 
        <p><?php echo $message; ?></p>
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
            <button type="submit">Lưu</button>
        </p>
    </form> 
</body>
</html>