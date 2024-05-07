<?php
// include('./connect.php');
// $conn = connectDB();
echo 'alert("aaaaaaaaaaaa")';
$maKH = $_SESSION['user_id'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['id']) && isset($_POST['soLuong'])) {
            $id = $_POST['id'];
            $soLuong = $_POST['soLuong'];
    
            // Thực hiện cập nhật CSDL ở đây, ví dụ:
            $sql = "INSERT INTO giohang(Manguoidung, Masp, Soluong) VALUES($maKH, $id, $soLuong)";
            if (mysqli_query($conn, $sql)) {
                echo "alert('Thêm vào giỏ hàng thành công!')";
            } else {
                echo "alert('Thêm vào giỏ hàng thất bại!')";
                echo "Lỗi: " . mysqli_error($conn);
            }
        } else {
            echo "Dữ liệu không hợp lệ!";
        }
    }?>