<?php
include "config.php";

if(!isset($_POST['selected'])){
    echo "Bạn chưa chọn sản phẩm";
    exit();
}

$email = $_SESSION['email'];

$address = $_POST['address'];
$phone = $_POST['phone'];

$order_id = "OD" . time();

// tạo đơn hàng
$sqlOrder = "INSERT INTO orders(id,email,address,phone)
VALUES('$order_id','$email','$address','$phone')";

$conn->query($sqlOrder);

// duyệt sản phẩm được chọn
foreach($_POST['selected'] as $cart_id){

    $sqlCart = "SELECT * FROM cart WHERE id = '$cart_id'";
    $result = $conn->query($sqlCart);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        $MaSP = $row['MaSP'];
        $soluong = $row['soluong'];
        $price = $row['ThanhTien'];

        // thêm chi tiết đơn hàng
        $sqlDetail = "INSERT INTO order_details
        (order_id, MaSP, soluong, price)
        VALUES
        ('$order_id','$MaSP','$soluong','$price')";

        $conn->query($sqlDetail);

        // xóa khỏi giỏ hàng
        $conn->query("DELETE FROM cart WHERE id='$cart_id'");
    }
}

header("Location: ChiTietDatHang.php?id=$order_id");
exit();
?>