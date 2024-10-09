<?php
$servername = "数据库服务器ip地址:3306";
$username = "MySQL用户名";
$password = "MySQL用户密码";
$dbname = "数据库名";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("网络连接失败: " . $conn->connect_error);
}

?>
