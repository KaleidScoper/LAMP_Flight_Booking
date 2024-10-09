<?php 
session_start();
if (!isset($_SESSION['u_id'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $t_id = $_POST['t_id'];//用户输入机票id
    // SQL删除语句
    $sql = "DELETE FROM ticket_infor WHERE t_id = '$t_id'";
    if ($conn->query($sql) === TRUE) {
        echo "机票退订中……";
    } else {
        echo "退订机票时出错: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>机票退订中……</title>
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
    <h1>退票成功</h1>
    <div class="button-container">
        <button><a href="welcome.php">返回主页</a></button>
    </div>
</body>
</html>