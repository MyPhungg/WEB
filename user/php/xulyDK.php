<?php
    
    $server ='localhost';
    $user ='root';
    $pass = '';
    $database = 'bolashop';

    $db = new mysqli($server, $user, $pass,$database);

    if($db)
    {
        mysqli_query($db,"SET NAMES 'utf8' ");
        echo 'Da ket noi database thanh cong';
        echo '<br>';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            $phone = trim($_POST["phone"]);
            $address = trim($_POST["address"]);
            $id = trim($_POST["id"]);
            $password = trim($_POST["password"]);
            
    
            // check tt đầu vào
            if(empty($errors)) {
                $sql = "SELECT * FROM nguoidung WHERE Manguoidung='$id' OR Sodienthoai='$phone' OR Email='$email'";
                $result = mysqli_query($db, $sql);
    
                if(mysqli_num_rows($result) > 0) {
                    echo '<script>alert("Tên đăng nhập, số điện thoại hoặc Email đã tồn tại"); window.location="dangky.php";</script>';
                } else {
                    $sql = "INSERT INTO nguoidung (Manguoidung, Matkhau,Ten, Email, Sodienthoai, Diachi, Loainguoidung) VALUES ('$id', '$password','$name', '$email', '$phone', '$address','KH')";
                    if(mysqli_query($db, $sql)) {
                        echo '<script>alert("Đăng ký thành công!"); window.location="dangnhap.php";</script>';
                    } else {
                        echo '<script>alert("Có lỗi trong quá trình xử lý"); window.location="dangnhap.php";</script>';
                    }
                }
            } else {
                foreach($errors as $error) {
                    echo '<script>alert("' . $error . '"); window.location="dangky.php";</script>';
                }
            }
            
        }

    }
    else
    {
        echo 'ket noi that bai';
    }

    
    ?>