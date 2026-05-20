<?php

include "config.php";

$email = $_SESSION['email'];

$sql = "
SELECT *
FROM orders
WHERE email = '$email'
ORDER BY created_at DESC
";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="vi">

<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">

    <title>Đơn hàng của tôi</title>

    <style>

        body{
            font-family: Arial;
            background: #f5f5f5;
        }

        .container{

            width: 1200px;
            margin: auto;
            margin-top: 40px;
        }

        h1{

            text-align: center;
            margin-bottom: 30px;
        }

        table{

            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th{

            background: black;
            color: white;
        }

        th, td{

            padding: 15px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .detail-btn{

            background: black;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
        }

        .detail-btn:hover{

            background: red;
        }

        .status{

            font-weight: bold;
        }

        .green{

            color: green;
        }

        .orange{

            color: orange;
        }

        .blue{

            color: blue;
        }

        .red{

            color: red;
        }

    </style>

</head>

<body>
      <header>

       <nav>
    <ul>

        <li><a href="home.php">Home</a></li>

        <li class="dropdown">
            <a href="GiayThoiTrang.php">Giày thời trang</a>
            <div class="dropdown-content">
                <a href="GiayThoiTrang.php">Xem tất cả</a>
            </div>
        </li>

        <li class="dropdown">
            <a href="GiayTheThao.php">Giày thể thao</a>
            <div class="dropdown-content">
                <a href="GiayTheThao.php">Xem tất cả</a>
            </div>
        </li>

        <li><a href="DonHang.php">Đơn hàng</a></li>
        <li><a href="cart.php">Giỏ hàng</a></li>

        <li class="dropdown">
            <a href="#">Tài khoản</a>
            <div class="dropdown-content">
                <a href="ThongTinCaNhan.php">Thông tin tài khoản</a>
                <a href="login.php">Đăng xuất</a>
            </div>
        </li>

    </ul>
</nav>

    </header>

<div class="container">

    <h1>
        📦 Đơn hàng của tôi
    </h1>

    <table>

        <tr>

            <th>Mã đơn</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Ngày đặt</th>
            <th>Trạng thái</th>
            <th>Chi tiết</th>

        </tr>

        <?php

        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){

                $class = "";

                if($row['status'] == 'Đang xác nhận'){

                    $class = "orange";

                }elseif($row['status'] == 'Đang chuẩn bị'){

                    $class = "blue";

                }elseif($row['status'] == 'Đang giao'){

                    $class = "red";

                }elseif($row['status'] == 'Đã giao'){

                    $class = "green";

                }

        ?>

        <tr>

            <td>
                <?php echo $row['id']; ?>
            </td>

            <td>
                <?php echo $row['address']; ?>
            </td>

            <td>
                <?php echo $row['phone']; ?>
            </td>

            <td>
                <?php echo $row['created_at']; ?>
            </td>

            <td class="status <?php echo $class; ?>">

                <?php echo $row['status']; ?>

            </td>

            <td>

                <a href="ChiTietDatHang.php?id=<?php echo $row['id']; ?>"
                   class="detail-btn">

                    Xem chi tiết

                </a>

            </td>

        </tr>

        <?php
            }

        }else{

            echo "
            <tr>

                <td colspan='6'>
                    Chưa có đơn hàng
                </td>

            </tr>
            ";
        }

        ?>

    </table>

</div>


</body>

</html>