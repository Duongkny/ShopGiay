<?php
include "config.php";

$sql = "SELECT * FROM Users WHERE email = '" . $_SESSION['email'] . "'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shop Giày</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="app">

    <!-- HEADER -->

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

    <!-- MAIN -->

    <main>

        <h1>

            Chào mừng

            <span>

                <?php

                if ($result->num_rows > 0) {

                    $row = $result->fetch_assoc();

                    echo $row['email'];

                } else {

                    echo "Khách hàng";
                }

                ?>

            </span>

            đến với Shop Giày 👟

        </h1>

        <p>
            Chọn mẫu giày yêu thích của bạn 🔥
        </p>

        <!-- SLIDESHOW -->

        <div class="slideshow-container">

            <div class="slide fade">

                <img src="./img/GiayAdidas.jpg">

            </div>

            <div class="slide fade">

                <img src="./img/GiayNike.jpg">

            </div>

            <div class="slide fade">

                <img src="./img/GiayThoiTrang.jpg">

            </div>

        </div>

        <!-- DANH MỤC -->

        

    </main>

    <!-- FOOTER -->

    <footer>

        <p>

            © 2025 Shop Giày

        </p>

    </footer>

</div>

<!-- SCRIPT SLIDESHOW -->

<script>

let slideIndex = 0;

showSlides();

function showSlides() {

    let slides = document.getElementsByClassName("slide");

    for (let i = 0; i < slides.length; i++) {

        slides[i].style.display = "none";
    }

    slideIndex++;

    if (slideIndex > slides.length) {

        slideIndex = 1;
    }

    slides[slideIndex - 1].style.display = "block";

    setTimeout(showSlides, 3000);
}

</script>

</body>
</html>