// xuly_xoa_sanpham.php
<?php
if(isset($_POST['delete_btn']) && isset($_POST['masp'])) {
    // Khởi tạo session và kết nối đến cơ sở dữ liệu
    include('connect.php');
    $conn = connectDB();

    // Lấy mã sản phẩm cần xóa
    $masp = $_POST['masp'];

    // Lấy mã người dùng từ session
    $maKH = $_SESSION['user_id'];

    // Thực hiện truy vấn xóa sản phẩm khỏi giỏ hàng
    $sql = "DELETE FROM giohang WHERE Masp = '$masp' AND Manguoidung = '$maKH'";
    $result = mysqli_query($conn, $sql);

    // Đóng kết nối
    mysqli_close($conn);

    // Chuyển hướng trở lại trang giỏ hàng hoặc trang cần hiển thị sau khi xóa
    header("Location: cart.php");
    exit();
} else {
    // Xử lý trường hợp không có dữ liệu hoặc yêu cầu không hợp lệ
    // Redirect hoặc xử lý theo logic của bạn
}
?>