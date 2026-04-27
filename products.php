<?php include "config.php"; ?>

<h2>Sản phẩm</h2>

<?php
$result = $conn->query("SELECT * FROM Products");

while ($row = $result->fetch_assoc()) {
?>
    <div>
        <img src="./img/<?php echo $row['image']; ?>" class="drink-image">
        <h3><?= $row['name'] ?></h3>
        <p><?= $row['price'] ?> VND</p>
        <form method="POST" action="cart.php">
            <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
            <input type="number" name="quantity" value="1">
            <button name="add">Thêm vào giỏ</button>
        </form>
    </div>
<?php } ?>