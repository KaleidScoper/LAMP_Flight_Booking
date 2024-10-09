<?php
$servername = "110.40.64.15";
$username = "tester";
$password = "114514UsEr1919810";
$dbname = "testdatabase";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
echo "连接成功<br>";

$user_ip = $_SERVER['REMOTE_ADDR'];

// 插入访问记录
$sql = "INSERT INTO visit_log (user_ip) VALUES ('$user_ip')";

if ($conn->query($sql) === TRUE) {
    echo "IP地址已成功记录";
} else {
    echo "插入记录时出错: " . $conn->error;
}

// 关闭连接
$conn->close();













$o_id = uniqid('order_', true);
$o_uid = $_POST['u_id'];
$o_tid = $t_id;
$o_time = date('Y-m-d H:i:s');

$sqlo = "INSERT INTO orders (o_id, o_uid, o_tid, o_time) values ($o_id, $o_uid, $o_tid, $o_time)";
?>
