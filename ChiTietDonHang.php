<?php

include "config.php";

if(!isset($_GET['MaSP'])){
    echo "Không có sản phẩm";
    exit();
}

$MaSP = $_GET['MaSP'];

$sql = "SELECT * FROM products WHERE MaSP = '$MaSP'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// THÊM GIỎ HÀNG
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $size = $_POST['size'];
    $soluong = $_POST['soluong'];
    $email = $_SESSION['email'];

    $thanhtien = $row['price'] * $soluong;

    $sqlInsert = "INSERT INTO cart (email, MaSP, size, soluong, ThanhTien)
                  VALUES ('$email', '$MaSP', '$size', '$soluong', '$thanhtien')";

    if($conn->query($sqlInsert)){
        echo "<script>alert('Đã thêm vào giỏ hàng');</script>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="chitiet.css">
</head>

<body>

<div class="container">
    <div class="left">
        <img src="img/<?php echo $row['image']; ?>">
    </div>

    <div class="right">
        <h2><?php echo $row['TenSP']; ?></h2>

        <p class="price"><?php echo number_format($row['price']); ?> VND</p>

        <p><?php echo $row['mota']; ?></p>

        <p>Số lượng còn: <?php echo $row['soluong']; ?></p>

        <form method="post">
            <label>Size:</label><br>
            <select name="size">
                <option>37</option>
                <option>38</option>
                <option>39</option>
                <option>40</option>
            </select><br>

            <label>Số lượng:</label><br>
            <input type="number" name="soluong" value="1" min="1"><br><br>

            <button class="btn">Thêm vào giỏ hàng</button>
        </form>

        <br>
        <a href="GiayTheThao.php">← Quay lại</a>
    </div>
</div>

</body>
</html>