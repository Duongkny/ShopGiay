<?php
include "config.php";

if (!isset($_GET['id'])) {

    echo "Không tìm thấy đơn hàng";

    exit();
}

$order_id = $_GET['id'];

/* ===== LẤY THÔNG TIN ĐƠN HÀNG ===== */

$sqlOrder = "
SELECT *
FROM orders
WHERE id = '$order_id'
";

$resultOrder = $conn->query($sqlOrder);

$order = $resultOrder->fetch_assoc();

/* ===== USER XÁC NHẬN ĐÃ NHẬN ===== */

if(isset($_POST['received'])){

    $sqlUpdate = "
    UPDATE orders
    SET status='Đã nhận hàng'
    WHERE id='$order_id'
    ";

    $conn->query($sqlUpdate);

    header("Location: ChiTietDatHang.php?id=$order_id");

    exit();
}

/* ===== CHI TIẾT ĐƠN HÀNG ===== */

$sql = "
SELECT order_details.*, products.TenSP, products.image
FROM order_details
JOIN products
ON order_details.MaSP = products.MaSP
WHERE order_details.order_id = '$order_id'
";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <title>Chi tiết đơn hàng</title>

    <style>

        body{

            font-family: Arial;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container{

            width: 1000px;
            margin: auto;
            margin-top: 40px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1{

            text-align: center;
            margin-bottom: 30px;
        }

        .status{

            margin-bottom: 20px;
            font-size: 22px;
            font-weight: bold;
            color: red;
        }

        table{

            width: 100%;
            border-collapse: collapse;
        }

        th{

            background: black;
            color: white;
        }

        th, td{

            border-bottom: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        img{

            width: 100px;
            border-radius: 10px;
        }

        .total{

            margin-top: 20px;
            text-align: right;
            font-size: 24px;
            color: red;
            font-weight: bold;
        }

        .received-btn{

            margin-top: 25px;
            padding: 14px 25px;
            background: green;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .received-btn:hover{

            background: darkgreen;
        }

        .back{

            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: black;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back:hover{

            background: red;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>

        📦 Đơn hàng của bạn

    </h1>

    <div class="status">

        Trạng thái:
        <?php echo $order['status']; ?>

    </div>

    <table>

        <tr>

            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Size</th>
            <th>Số lượng</th>
            <th>Giá</th>

        </tr>

        <?php

        $tong = 0;

        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){

                $tong += $row['price'];

        ?>

        <tr>

            <td>

                <img src="img/<?php echo $row['image']; ?>">

            </td>

            <td>

                <?php echo $row['TenSP']; ?>

            </td>

            <td>

                <?php echo $row['size']; ?>

            </td>

            <td>

                <?php echo $row['soluong']; ?>

            </td>

            <td>

                <?php echo number_format($row['price']); ?> VND

            </td>

        </tr>

        <?php
            }

        }else{

            echo "
            <tr>

                <td colspan='5'>

                    Không có sản phẩm

                </td>

            </tr>
            ";
        }

        ?>

    </table>

    <div class="total">

        Tổng tiền:
        <?php echo number_format($tong); ?> VND

    </div>

    <?php

    if($order['status'] == 'Đã giao'){

    ?>

    <form method="post">

        <button type="submit"
                name="received"
                class="received-btn">

            ✅ Xác nhận đã nhận hàng

        </button>

    </form>

    <?php
    }
    ?>

    <a href="DonHang.php"
       class="back">

        ← Quay lại đơn hàng

    </a>

</div>

</body>

</html>