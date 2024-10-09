<?php
$servername = "110.40.64.15:3306";
$username = "tester";
$password = "114514UsEr1919810";
$dbname = "testdatabase";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("网络连接失败: " . $conn->connect_error);
}

?>
