<?php 
session_start();
if (!isset($_SESSION['u_id'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';
$t_uid = $_SESSION['u_id'];
$sql = "SELECT * FROM ticket_infor WHERE t_uid = $t_uid";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>我的机票</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        #flight-table {
            margin: 20px auto;
            width: 80%;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        .button-container {
            margin: 20px 0;
        }
        .button-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
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
    <h1>机票预订系统</h1>
    <h3>您的机票信息一览：</h3>
    <div id="flight-table">
        <?php
        if ($result->num_rows > 0) {
            echo "<table><tr><th>机票ID</th><th>航班ID</th><th>用户ID</th><th>座位号</th><th>出发日期</th><th>舱段</th><th>票价</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["t_id"]. "</td><td>" . $row["t_f_id"]. "</td><td>" . $row["t_uid"]. "</td><td>" . $row["t_seatId"]. "</td><td>" . $row["t_date"]. "</td><td>" . $row["t_type"]. "</td><td>" . $row["t_price"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 结果";
        }
        ?>
    </div>
    <!-- 添加退票按钮 -->
    <h3>行程有变？在此退票：</h3>
    <form method="post" action="delete_tickit.php">
        输入机票ID：<input type="text" name="t_id" placeholder="在上表中选择" required>
        <div class="button-container">
            <button type="submit">点击退票</button>
        </div>
    </form>
    <div class="button-container">
        <button><a href="welcome.php">返回主页</a></button>
    </div>
</body>
</html>
