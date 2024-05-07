<?php
// Khởi đầu session
// session_start();

// Hủy toàn bộ dữ liệu session
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập hoặc trang khác
header("Location: home.php"); // Điều hướng đến trang đăng nhập
exit(); // Dừng kịch bản tiếp tục thực thi sau khi chuyển hướng
?>
