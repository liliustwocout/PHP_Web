<?php
require '../config.php';

$sql = "SELECT * FROM users ORDER BY created_at DESC, id DESC";
$result = mysqli_query($conn, $sql);

if(!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usernameSearch = $_POST['usernameSearch'] ?? '';
        if($usernameSearch != '') {
            $sql = "SELECT * FROM users WHERE username LIKE '%$usernameSearch%' ORDER BY created_at DESC, id DESC";
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
    <title>Danh sách người dùng</title>
</head>
<body>
    <h1>Danh sách người dùng</h1>
    <p>
        <a href="../main.php">Quay lại trang chủ</a>
    </p>

    <form action="" method="post">
        <p>
            <input type="text" placeholder="Tìm kiếm người dùng theo tên..." name="usernameSearch" style="width: 200px"></input>
            <button type="submit">Tìm kiếm</button>
        </p>
    </form>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Giới tính</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Hành động</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['updated_at']; ?></td>
            <td>
                <a href="view_user.php?id=<?php echo $row['id']; ?>&username=<?php echo $row['username']; ?>">Xem chi tiết</a>
                <br>
                <a href="edit_user.php?id=<?php echo $row['id']; ?>">Sửa</a>
                <br>
                <a href="delete_user.php?id=<?php echo $row['id']; ?>" style="color: red;" onclick="return confirm('Bạn có chắc chắn muốn xoá người dùng này không?');">Xoá</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a href="add_users.php">+ Thêm người dùng mới</a>

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
        margin-bottom: 20px;
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