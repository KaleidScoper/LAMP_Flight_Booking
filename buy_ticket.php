<?php
session_start();
if (!isset($_SESSION['u_id'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $t_f_uid = $_POST['f_id'];//用户输入飞机航班id
    $sql = "SELECT f_start_time FROM flight_infor WHERE f_id = $t_f_uid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // 将查询结果赋值给变量
        $row = $result->fetch_assoc();
        $t_date = $row['f_start_time'];
    }
    $t_id = uniqid('tickit_', true);
    $t_uid = $_POST['u_id'];
    $t_seatId = uniqid('seat_', true);
    $t_type = $_POST['t_type'];//用户输入舱段
    $t_price = rand(1001, 5999);
    $sqlt = "INSERT INTO ticket_infor (t_id, t_f_uid, t_uid, t_seatId, t_date, t_type, t_price) VALUES ('$t_id', $t_f_uid, '$t_uid', '$t_seatId', '$t_date', '$t_type', '$t_price')";
    if ($conn->query($sqlt) === TRUE) {
        echo "订票中……";
    } else {
        echo "网络错误: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>机票订购中……</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button-container button a {
            color: white;
            text-decoration: none;
        }
        .button-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>订票成功</h1>
    <div class="button-container">
        <button><a href="welcome.php">返回主页</a></button>
    </div>
</body>
</html>
