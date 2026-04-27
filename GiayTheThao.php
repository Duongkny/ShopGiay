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