<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
</head>
<body>
    <header>
       <h1>Main Page</h1>
    </header>

    <main>
        <div class="links">
            <div>
                <a href="admin/list_users.php">Danh sách người dùng</a>
                <a href="admin/add_users.php">Thêm người dùng mới</a>
            </div>
            <div>
                <a href="admin/list_news.php">Danh sách bài viết</a>
                <a href="admin/add_news.php">Thêm bài viết mới</a> 
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
    a:hover {
        text-decoration: underline;
    }

    header {
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #f4f4f4;
        padding: 10px 20px;
    }

    .links {
        display: flex;
        justify-content: space-around;
        margin-top: 50px;
    }
</style>