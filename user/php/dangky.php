<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <style>
        .register-container {
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
        .register-container form {
            width: 80%;
            display: flex;
            flex-direction: column;
        }
        .register-container h1{
            text-align: center;
            color: #D61EAD;
        }
        .register-container form p {
            font-weight: bold; /* Làm cho chữ trong thẻ p đậm */
            color: #333; /* Chọn màu sắc khác */
            font-size: 20px;
            text-align: left;
        }

        .register-container form input[type="text"],
        .register-container form input[type="password"] {
            width: 80%; /* Đặt chiều rộng của các trường nhập */
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .register-container form .register-button {
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
        .register-container form .register-button:hover {
            background-color: #A70087;
        }
        .register-container form .login{
            text-align: right;
            text-decoration: none;
            font-size: 15px;
        }
        .register-container form .login-link{
            color: #D61EAD;
            text-decoration: none;
        }
        .wn{
            display: none;
            font-size: 18px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="register-container">
    <form action="xulyDK.php" method="post" onsubmit="return warning()" >
            <h1>Đăng ký</h1>
            <p>Họ và tên:</p>
            <input type="text" name="name" placeholder="Họ và tên" required>
            <div id="wnten" class="wn">Tên đăng nhập phải đủ 7 ký tự</div>

            <p>Số điện thoại:</p>
            <input type="text" name="phone" placeholder="số điện thoại" required>
            <div id="wnphone" class="wn">Số điện thoại phải đủ 10 số </div>

            <p>Địa chỉ:</p>
            <input type="text" name="address" placeholder="địa chỉ" required>
            <div id="wnaddress" class="wn">Địa chỉ phải tồn tại </div>

            <p>Tên đăng nhập:</p>
            <input type="text" name="id" placeholder="Tên đăng nhập" required>

            <p>Email:</p>
            <input type="text" name="email" placeholder="email" required>
            <div id="wnemail" class="wn">email phải đúng định dạng </div>

            <p>Mật khẩu:</p>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <div id="wnpassword" class="wn">Mật khẩu phải bao gồm ít nhất 8 ký tự, bao gồm ít nhất một chữ hoa, một chữ thường, một số và một ký tự đặc biệt  </div>

            <p>Xác nhận mật khẩu:</p>
            <input type="password" name="check-password" placeholder="Mật khẩu" required>
            <div id="wncheckpass" class="wn">xác nhận mật khẩu phải trùng với mật khẩu </div>

            <p class="login">Bạn đã có tài khoản, <a class="login-link" href="dangnhap.php">đăng nhập</a></p>
            <input type="submit" class="register-button" onclick="warning()" value="Đăng ký">
        </form>
    </div>


<script>
    function warning() {
        var ten = document.getElementsByName("name")[0].value;
        var email = document.getElementsByName("email")[0].value;
        var phone = document.getElementsByName("phone")[0].value;
        var address = document.getElementsByName("address")[0].value;
        var password = document.getElementsByName("password")[0].value;
        var check_password = document.getElementsByName("check-password")[0].value;

        var wnten = document.getElementById('wnten');
        var wnphone = document.getElementById('wnphone');
        var wnemail = document.getElementById('wnemail');
        var wnpassword = document.getElementById('wnpassword');
        var wncheckpass = document.getElementById('wncheckpass');

        var regexten = /^.{10,}$/;
        var regexemail = /^[\w\.-]+@[\w\.-]+\.\w+$/;
        var regexphone = /^0\d{9}$/;
        var regexpassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/;

        if (!regexten.test(ten)) {
            wnten.style.display = "block";
            return false;
        } else {
            wnten.style.display = "none";
        }

        if (!regexphone.test(phone)) {
            wnphone.style.display = "block";
            return false;
        } else {
            wnphone.style.display = "none";
        }

        if (!regexemail.test(email)) {
            wnemail.style.display = "block";
            return false;
        } else {
            wnemail.style.display = "none";
        }

        if (!regexpassword.test(password)) {
            wnpassword.style.display = "block";
            return false;
        } else {
            wnpassword.style.display = "none";
        }

        if (password != check_password) {
            wncheckpass.style.display = "block";
            return false;
        } else {
            wncheckpass.style.display = "none";
        }

        return true;
    }
</script>
</body>
</html>
