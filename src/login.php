<?php
include 'config.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_id = $_POST['u_id'];
    $u_password = $_POST['u_password'];
    $sql = "SELECT * FROM users WHERE u_id='$u_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($u_password === $row['u_password']) {
            $_SESSION['u_id'] = $u_id;
            header("Location: welcome.php");
        } else {
            echo "密码错误";
        }
    } else {
        echo "用户不存在";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>登录页面</title>
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
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .login-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .login-container p {
            margin: 10px 0;
        }
        .login-container a {
            color: #4CAF50;
            text-decoration: none;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>登录</h2>
        <form method="post" action="">
            用户ID: <input type="text" name="u_id" required><br>
            密码: <input type="password" name="u_password" required><br>
            <input type="submit" value="登录">
        </form>
        <br>
        <p>没有账户？</p><a href="register.php">点击注册！</a>
    </div>
</body>
</html>

