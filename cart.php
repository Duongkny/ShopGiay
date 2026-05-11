<?php
include "config.php";

$email = $_SESSION['email'];

// Lấy dữ liệu giỏ hàng
$sql = "SELECT cart.*, products.TenSP, products.image
        FROM cart
        JOIN products ON cart.MaSP = products.MaSP
        WHERE cart.email = '$email'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>

    <style>

        body{
            font-family: Arial;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container{
            width: 1100px;
            margin: auto;
            margin-top: 40px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1{
            margin-bottom: 25px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        th{
            background: #222;
            color: white;
        }

        th, td{
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        img{
            width: 100px;
            border-radius: 10px;
        }

        .checkbox{
            transform: scale(1.3);
            cursor: pointer;
        }

        .total-price{
            margin-top: 20px;
            text-align: right;
            font-size: 28px;
            font-weight: bold;
            color: red;
        }

        .order-box{
            margin-top: 30px;
        }

        input[type="text"]{
            width: 350px;
            padding: 12px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        .order-btn{
            margin-top: 20px;
            padding: 15px 30px;
            border: none;
            background: #ff4d4d;
            color: white;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .order-btn:hover{
            background: #e60000;
            transform: scale(1.05);
        }

        .empty{
            color: red;
            font-size: 18px;
        }

    </style>
</head>
<body>

<div class="container">

    <h1>🛒 Giỏ hàng của bạn</h1>

    <form action="order.php" method="post">

        <table>

            <tr>
                <th>Chọn</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>

            <?php

            if($result->num_rows > 0){

                while($row = $result->fetch_assoc()){

            ?>

            <tr>

                <td>
                    <input type="checkbox"
                           class="checkbox product-check"
                           name="selected[]"
                           value="<?php echo $row['id']; ?>"
                           data-price="<?php echo $row['ThanhTien']; ?>">
                </td>

                <td>
                    <img src="img/<?php echo $row['image']; ?>">
                </td>

                <td>
                    <?php echo $row['TenSP']; ?>
                </td>

                <td>
                    <?php echo $row['soluong']; ?>
                </td>

                <td>
                    <?php echo number_format($row['ThanhTien']); ?> VND
                </td>

            </tr>

            <?php
                }

            }else{

                echo "
                <tr>
                    <td colspan='5' class='empty'>
                        Không có sản phẩm trong giỏ hàng
                    </td>
                </tr>
                ";
            }

            ?>

        </table>

        <!-- Tổng tiền -->
        <div class="total-price">
            Tổng tiền:
            <span id="tongTien">0</span> VND
        </div>

        <div class="order-box">

            <h2>📦 Thông tin đặt hàng</h2>

            <input type="text"
                   name="address"
                   placeholder="Nhập địa chỉ"
                   required>

            <br>

            <input type="text"
                   name="phone"
                   placeholder="Nhập số điện thoại"
                   required>

            <br>

            <button type="submit" class="order-btn">
                🛒 Đặt hàng ngay
            </button>

        </div>

    </form>

</div>

<script>

    const checkboxes = document.querySelectorAll('.product-check');
    const tongTien = document.getElementById('tongTien');

    function tinhTongTien(){

        let tong = 0;

        checkboxes.forEach(function(item){

            if(item.checked){

                tong += parseFloat(item.dataset.price);
            }

        });

        tongTien.innerText = tong.toLocaleString();

    }

    checkboxes.forEach(function(item){

        item.addEventListener('change', tinhTongTien);

    });

</script>

</body>
</html>