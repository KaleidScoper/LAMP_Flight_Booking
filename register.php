<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_id = $_POST['u_id'];
    $u_password = $_POST['u_password'];
    $u_name = $_POST['u_name'];
    $u_telephone = $_POST['u_telephone'];
    $u_address = $_POST['u_address'];
    $u_email = $_POST['u_email'];
    $u_idcard = $_POST['u_idcard'];
    $sql = "INSERT INTO users (u_id, u_password, u_name, u_telephone, u_address, u_email, u_idcard)
    VALUES ('$u_id', '$u_password', '$u_name', '$u_telephone', '$u_address', '$u_email', '$u_idcard')";
    if ($conn->query($sql) === TRUE) {
        echo "注册成功";
    } else {
        echo "网络错误: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>注册</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('background.jpg');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .register-container h2 {
            margin-bottom: 20px;
        }
        .register-container input[type="text"],
        .register-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .register-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .register-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .register-container p {
            margin: 10px 0;
        }
        .register-container a {
            color: #4CAF50;
            text-decoration: none;
        }
        .register-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>注册</h2>
        <form method="post" action="">
            用户ID: <input type="text" name="u_id" required><br>
            密码: <input type="password" name="u_password" required><br>
            姓名: <input type="text" name="u_name" required><br>
            手机号: <input type="text" name="u_telephone" required><br>
            地址: <input type="text" name="u_address" required><br>
            邮箱: <input type="text" name="u_email" required><br>
            身份证: <input type="text" name="u_idcard" required><br>
            <input type="submit" value="注册">
        </form>
        <br>
        <p>已有账户？</p><a href="login.php">点击登录！</a>
    </div>
</body>
</html>

