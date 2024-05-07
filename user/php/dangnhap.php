<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        .login-container {
            width: 500px; /* Chiều rộng */
            /* height: 400px; Chiều cao */
            margin: auto; /* Canh giữa trên trình duyệt */
            padding: 20px;
            /* background-color: #f4f4f4; */
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        .login-container form {
            width: 80%;
            display: flex;
            flex-direction: column;
        }
        .login-container h1{
            text-align: center;
            color: #D61EAD;
        }
        .login-container form p {
            font-weight: bold; /* Làm cho chữ trong thẻ p đậm */
            color: #333; /* Chọn màu sắc khác */
            font-size: 20px;
            text-align: left;
        }

        .login-container form input[type="text"],
        .login-container form input[type="password"] {
            width: 80%; /* Đặt chiều rộng của các trường nhập */
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-container form .login-button {
            background-color: #D61EAD;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 20px;
            width: 40%;
            padding: 15px 0;
            font-size: 16px;
            text-transform: uppercase;
            align-self: center;
        }

        /* CSS khi nút được hover */
        .login-container form .login-button:hover {
            background-color: #A70087;
        }
        .login-container form .register{
            text-align: right;
            text-decoration: none;
            font-size: 15px;
        }
        .login-container form .register-link{
            color: #D61EAD;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action="xulyDN.php" method="post">
            <h1>Đăng nhập</h1>
            <p>Tên đăng nhập:</p>
            <input type="text" name="id" placeholder="Tên đăng nhập" required>
            <p>Mật khẩu:</p>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <p class="register">Nếu bạn chưa có tài khoản, <a class="register-link" href="dangky.php">đăng ký</a></p>
            <input type="submit" class="login-button" value="Đăng nhập">
        </form>
    </div>
</body>
</html>