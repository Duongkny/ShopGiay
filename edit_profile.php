<?php
include "config.php";

// check login
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

// lấy user
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

// ================= XỬ LÝ UPDATE =================
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // đổi mật khẩu
    if(!empty($_POST['old_password']) && !empty($_POST['new_password'])){

        $old = $_POST['old_password'];
        $new = $_POST['new_password'];

        if($old != $user['password']){
            echo "<script>alert('Sai mật khẩu cũ');</script>";
        } else {
            $conn->query("UPDATE users SET password='$new' WHERE email='$email'");
            echo "<script>alert('Đổi mật khẩu thành công');</script>";
        }
    }

    // update info
    $sqlUpdate = "UPDATE users SET address='$address', phone='$phone' WHERE email='$email'";

    if($conn->query($sqlUpdate)){
        echo "<script>alert('Cập nhật thành công'); window.location='ThongTinCaNhan.php';</script>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style>
        body{
            font-family: Arial;
            background: #f5f5f5;
        }
        .box{
            width: 400px;
            margin: 80px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h2{
            text-align:center;
        }
        input{
            width:100%;
            padding:8px;
            margin:8px 0;
        }
        button{
            width:100%;
            padding:10px;
            background: green;
            color:white;
            border:none;
            cursor:pointer;
        }
        .info{
            background:#eee;
            padding:10px;
            margin-bottom:10px;
            border-radius:5px;
        }
    </style>
</head>

<body>

<div class="box">
    <h2>Thông tin cá nhân</h2>

    <!-- HIỂN THỊ -->
    <div class="info">
        <p><b>Email:</b> <?php echo $user['email']; ?></p>
        <p><b>Địa chỉ:</b> <?php echo $user['address'] ?? 'Chưa có'; ?></p>
        <p><b>SĐT:</b> <?php echo $user['phone'] ?? 'Chưa có'; ?></p>
    </div>

    <!-- FORM SỬA -->
    <form method="post">

        <label>Địa chỉ</label>
        <input type="text" name="address" value="<?php echo $user['address']; ?>">

        <label>SĐT</label>
        <input type="text" name="phone" value="<?php echo $user['phone']; ?>">

        <h3>Đổi mật khẩu</h3>

        <input type="password" name="old_password" placeholder="Mật khẩu cũ">
        <input type="password" name="new_password" placeholder="Mật khẩu mới">

        <button type="submit">Lưu thay đổi</button>
    </form>
</div>

</body>
</html>