<?php

include "config.php";
$sql = "SELECT * FROM Users WHERE email = '" . $_SESSION['email'] . "'";
$result = $conn->query($sql);
?>
 <?php
            if ($result->num_rows > 0) {
                // Lấy tên khách hàng
                $row = $result->fetch_assoc();
                echo "<h1>Xin chào, " . $row['email'] . "</h1>";
            } else {
                echo "<h1>Xin chào, Khách hàng</h1>";
            }
            ?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sinh Tố</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="SinhTo.css">
</head>

<body>
    <div class="app">
        <header>

        <nav>

            <ul>

                <li>
                    <a href="home.php">
                        Home
                    </a>
                </li>

                <div class="drowdown">

                    <li class="dropbtn">

                        <a href="GiayThoiTrang.php">
                            Giày thời trang
                        </a>

                    </li>

                    <div class="dropdown-content">

                        <a href="GiayThoiTrang.php">
                            Xem tất cả
                        </a>

                    </div>

                </div>

                <div class="drowdown">

                    <li class="dropbtn">

                        <a href="GiayTheThao.php">
                            Giày thể thao
                        </a>

                    </li>

                    <div class="dropdown-content">

                        <a href="GiayTheThao.php">
                            Xem tất cả
                        </a>

                    </div>

                </div>

                <li>

                    <a href="DonHang.php">
                        Đơn hàng
                    </a>

                </li>

                <li>

                    <a href="cart.php">
                        Giỏ hàng
                    </a>

                </li>

                <div class="drowdown">

                    <li class="dropbtn">

                        <a href="#">
                            Tài khoản
                        </a>

                    </li>

                    <div class="dropdown-content">

                        <a href="#">
                            Thông tin tài khoản
                        </a>

                        <a href="login.php">
                            Đăng xuất
                        </a>

                    </div>

                </div>

            </ul>

        </nav>

    </header>
        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['MaSP']) && isset($_POST['price']) && isset($_POST['SoLuong'])) {

                $MaSP = $_POST['MaSP'];
                $Gia = $_POST['price'];
                $SL = $_POST['SoLuong'];
                $email = $_POST['email'];

                $ThanhTien = $Gia * $SL;
                $id = "GO" . time();

                $sqlInsert = "INSERT INTO cart (id,email, MaSP, soluong, ThanhTien)
                      VALUES ('$id', '$email', '$MaSP','$SL', '$ThanhTien')";

                if ($conn->query($sqlInsert) === TRUE) {
                    echo "<script>alert('Đã thêm vào giỏ hàng!'); </script>";
                    $MaSP = "";
                    $MaGoi = "";
                    $SL = 0;
                    $ThanhTien = 0;
                } else {
                    echo "Lỗi SQL: " . $conn->error;
                }
            }
        }



        $sql = "SELECT * FROM Products WHERE loai = 'ThoiTrang'";
        $result = $conn->query($sql);
        $sqlUser = "SELECT * FROM Users WHERE email = '" . $_SESSION['email'] . "'";
        $resultUser = $conn->query($sqlUser);
        ?>
        <main>
            <div class="row">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="column">
                            <h2><?php echo $row['TenSP']; ?></h2>

                            <img src="img/<?php echo $row['image']; ?>" class="drink-image">

                            <p><?php echo $row['price']; ?></p>
                            <p>Số lượng hiện tại: <?php echo $row['soluong']; ?></p>

                            <!-- ✅ FORM RIÊNG CHO TỪNG SẢN PHẨM -->
                            <form action="" method="post">
                                <input type="hidden" name="MaSP" value="<?php echo $row['MaSP']; ?>">
                                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                                <label for="">Size</label>
                                 <input type="number" class="number" name="size" value="37" min="37" max="45">
                                 <label for="">Số lượng</label>
                                <input type="number" class="number" name="SoLuong" value="1" min="1">

                                <input type="submit" class="button" value="Thêm vào giỏ hàng">
                            </form>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </main>
        <footer>
            <p>&copy; 2025 Drink Ordering Service</p>
        </footer>
    </div>
</body>

</html>