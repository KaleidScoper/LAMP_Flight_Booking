<?php

# 登陆成功后的欢迎页面，即个人主页

session_start();
if (!isset($_SESSION['u_id'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

# 用于查询所有机票，以备在主页展示
$sql = "SELECT * FROM flight_infor";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>个人页面</title>
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
        h1, h2, h3 {
            text-align: center;
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
        form {
            margin: 20px 0;
            text-align: center;
        }
        form input[type="number"],
        form input[type="text"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: calc(100% - 22px);
        }
        form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>机票预订系统</h1>
    <h2>欢迎您的使用，用户<?php echo $_SESSION['u_id']; ?>！</h2>
    <div class="button-container">
        <button><a href="logout.php">点击登出！</a></button>
        <button><a href="show_ticket.php">我的机票</a></button>
    </div>
    <h3>近期航班信息一览：</h3>

    <div id="flight-table">
        <?php
        if ($result->num_rows > 0) {
            echo "<table><tr><th>航班ID</th><th>航班号</th><th>出发时间</th><th>到达时间</th><th>始发地</th><th>目的地</th><th>航空公司</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["f_id"]. "</td><td>" . $row["f_number"]. "</td><td>" . $row["f_start_time"]. "</td><td>" . $row["f_end_time"]. "</td><td>" . $row["f_departure"]. "</td><td>" . $row["f_destination"]. "</td><td>" . $row["f_company"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 结果";
        }
        ?>
    </div>

    <!-- 添加订票按钮 -->
    <form method="post" action="buy_ticket.php">
        <input type="hidden" name="u_id" value="<?php echo $_SESSION['u_id']; ?>"><br>
        选择航班ID：<input type="number" name="f_id" placeholder="在上表中选择" required><br>
        选择舱段：<input type="text" name="t_type" placeholder="头等/商务/经济" required><br>
        <button type="submit">点击订票</button>
    </form>
</body>
</html>

