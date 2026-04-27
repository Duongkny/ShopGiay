<?php
include "config.php";

$sql = "SELECT * FROM Users WHERE email = '" . $_SESSION['email'] . "'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop giày</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="app">
        <header>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <div class="drowdown">
                        <li class="dropbtn"><a href="#">Giày thời trang</a></li>
                        <div class="dropdown-content">

                        </div>
                    </div>
                    <div class="drowdown">
                        <li class="dropbtn"><a href="#">Giày thể thao</a></li>
                        <div class="dropdown-content">
                        </div>
                    </div>
                    <li><a href="cart.php">Giỏ hàng</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <h1>Chào mừng 
                <?php
            if ($result->num_rows > 0) {
                // Lấy tên khách hàng
                $row = $result->fetch_assoc();
                echo $row['email'];
            } else {
                echo "Khách hàng";
            }
                ?>
                 đến với trang giày</h1>
            <p>Chọn loại giày bạn muốn.</p>
            <div class="slideshow-container">

    <div class="slide fade">
        <img src="./img/GiayAdidas.jpg">
    </div>

    <div class="slide fade">
        <img src="./img/GiayNike.jpg">
    </div>

    <div class="slide fade">
        <img src="./img/SinhToKiwi.jpeg">
    </div>

</div>
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

    setTimeout(showSlides, 3000); // đổi ảnh sau 3 giây
}
</script>

        </main>
        <footer>
            <p>&copy; 2025 Drink Ordering Service</p>
        </footer>
    </div>
</body>
</html>