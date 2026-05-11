<?php
include "config.php";

// check đăng nhập
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

// lấy dữ liệu user
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thông tin cá nhân</title>
    <style>
        body{
            font-family: Arial;
            background: #f5f5f5;
        }
        .box{
            width: 400px;
            margin: 100px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h2{
            text-align: center;
        }
        p{
            font-size: 16px;
            margin: 10px 0;
        }
        .btn{
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="box">
    <h2>Thông tin cá nhân</h2>

    <p><b>Email:</b> <?php echo $user['email']; ?></p>

    <p><b>Mật khẩu:</b> ******</p>

    <p><b>Địa chỉ:</b> <?php echo isset($user['address']) ? $user['address'] : 'Chưa có'; ?></p>

    <p><b>SĐT:</b> <?php echo isset($user['phone']) ? $user['phone'] : 'Chưa có'; ?></p>

    <a href="edit_profile.php" class="btn">Sửa thông tin</a>
</div>

</body>
</html>