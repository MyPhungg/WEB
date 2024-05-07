<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'bolashop';

// Kết nối đến cơ sở dữ liệu
$db = new mysqli($server, $user, $pass, $database);

if ($db) {
    mysqli_query($db, "SET NAMES 'utf8' ");
    echo 'Đã kết nối cơ sở dữ liệu thành công';
    echo '<br>';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = trim($_POST["id"]);
        $password = trim($_POST["password"]);

        // Kiểm tra trong cơ sở dữ liệu
        $query = "SELECT * FROM nguoidung WHERE Manguoidung='$id'";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) > 0) {
            // Tài khoản tồn tại, kiểm tra mật khẩu
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['Matkhau'] === $password) {
                // Mật khẩu đúng, đăng nhập thành công
                echo 'Đăng nhập thành công!';

                
                session_start();
                
                $_SESSION['user_id'] = $id;

                echo $_SESSION['user_id'];
              
                header("Location: home.php");
                exit;



            }
            else {
                // Sai mật khẩu
                echo 'Sai mật khẩu!';
            }
        } else {
            // Không có tài khoản
            echo 'Không tồn tại tài khoản với ID này!';
        }
    }
} else {
    echo 'Kết nối thất bại';
}
?>
