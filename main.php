<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
</head>
<body>
    <header>
       <h1>Trang chủ</h1>
    </header>

    <main>
        <div class="links">
            <div>
                <h2>Người dùng</h2>
                <a href="admin/list_users.php" >Danh sách người dùng</a>
                <a href="admin/add_users.php" >Thêm người dùng mới</a>
            </div>
            <div>
                <h2>Bài viết</h2>
                <a href="admin/list_news.php" >Danh sách bài viết</a>
                <a href="admin/add_news.php" >Thêm bài viết mới</a> 
            </div>
        </div>
        
    </main>
    
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
    }
    h1 {
        color: #333;
    }
    a {
        display: block;
        margin: 10px 0;
        text-decoration: none;
        color: #0066cc;
    }

    header {
        margin-bottom: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f4f4f4;
        padding: 10px 20px;
    }

    .links {
        display: flex;
        justify-content: space-around;
        margin-top: 50px;
    }

    .links div {
        padding: 50px;
        border-radius: 5px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        background-color: #ffffff;
    }

    .links div h2 {
        margin-bottom: 20px;
        color: #555;
    }

    .links div a {
        padding: 20px 30px;
        background-color: #f8f8f8ff;
        border-radius: 3px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .links div a:hover {
        background-color: #e0e0e0ff;
        transition: background-color 0.5s;
    }
</style>