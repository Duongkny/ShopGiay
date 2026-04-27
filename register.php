<?php include "config.php"; ?>

<!-- <form method="POST">
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <button name="register">Đăng ký</button>
</form> -->

<?php
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO Users(email, password) VALUES('$email', '$password')";
    $conn->query($sql);

    echo "<script>alert('Đăng ký thành công!'); window.location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="267_Python-512.webp" type="image/x-icon" title="RSS">
    <title>Form Login</title>
    <link rel="stylesheet" href="boo.css">  
    <script src="boo.js" defer></script>
</head>
<body>
    <div class="container">
        <form  class="form" method="POST">
            <h1>User logout</h1>
            <div class="form-row">
                <input type="text" name="email" id="tk" class="form-input"  placeholder="Tên đăng nhập" >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="lock">
                    <path fill-rule="evenodd" d="M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0Zm-5-2a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM8 9c-1.825 0-3.422.977-4.295 2.437A5.49 5.49 0 0 0 8 13.5a5.49 5.49 0 0 0 4.294-2.063A4.997 4.997 0 0 0 8 9Z" clip-rule="evenodd" />
                  </svg>   
            </div>
            <div class="form-row">
                <input type="password" name="password" id="pass" class="form-input" placeholder="Mật khẩu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="lock">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                  </svg>
                  
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye eye-close">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                  </svg>                  
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye eye-open hidden">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                  </svg>
                  
            </div>
            <div class="form-check">
                <input type="checkbox" name="" id="check">
                <label id="form-label"for="">Remember me</label>
            </div>
            <div class="form-a">
                <a href="login.php" style="color: #0962c7;">Đăng nhập</a>
            </div>
            <div class="form-btn">
                <button name="register" >Đăng ký</button>
            </div>
        </form>
    </div>
</body>
</html>