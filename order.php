<?php include "config.php"; ?>

<?php
if (isset($_POST['order'])) {
    $user_id = $_SESSION['user_id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // tính tổng tiền
    $result = $conn->query("
        SELECT Cart.*, Products.price 
        FROM Cart 
        JOIN Products ON Cart.product_id = Products.id
        WHERE user_id = $user_id
    ");

    $total = 0;
    while ($row = $result->fetch_assoc()) {
        $total += $row['price'] * $row['quantity'];
    }

    // lưu order
    $conn->query("INSERT INTO Orders(user_id, address, phone, total_price)
                  VALUES($user_id, '$address', '$phone', $total)");

    // xoá giỏ hàng
    $conn->query("DELETE FROM Cart WHERE user_id = $user_id");

    echo "Đặt hàng thành công!";
}
?>