<?php include "config.php"; ?>

<?php
if (isset($_POST['add'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $conn->query("INSERT INTO Cart(user_id, product_id, quantity)
                  VALUES($user_id, $product_id, $quantity)");
}
?>

<h2>Giỏ hàng</h2>

<?php
$result = $conn->query("
    SELECT Cart.*, Products.name, Products.price 
    FROM Cart 
    JOIN Products ON Cart.product_id = Products.id
    WHERE user_id = ".$_SESSION['user_id']
);

$total = 0;

while ($row = $result->fetch_assoc()) {
    $subtotal = $row['price'] * $row['quantity'];
    $total += $subtotal;
?>
    <p><?= $row['name'] ?> - <?= $row['quantity'] ?> - <?= $subtotal ?></p>
<?php } ?>

<h3>Tổng: <?= $total ?> VND</h3>

<form action="order.php" method="POST">
    Địa chỉ: <input type="text" name="address"><br>
    SĐT: <input type="text" name="phone"><br>
    <button name="order">Đặt hàng</button>
</form>