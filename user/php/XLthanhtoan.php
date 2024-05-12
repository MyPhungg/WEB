<?php
include('./connect.php');
$conn = connectDB();

// Lấy tên nhà vận chuyển từ yêu cầu
if (!isset($_POST['tonggiatri']) || !isset($_POST['maGG']) || !isset($_POST['maVC']) || !isset($_POST['maKH']) || !isset($_POST['ngay'])) {
    echo "aaaa";
}
$tongGiaTri = $_POST['tonggiatri'];
$maGG = $_POST['maGG'];
$maVC = $_POST['maVC'];
$maKH = $_POST['maKH'];
$ngay = $_POST['ngay'];
$trangthai = 0;
$stmt = mysqli_prepare($conn, "INSERT INTO donhang(Trangthai, Ngay, Tonggiatri, Magiamgia, Mavc, maKhachhang) VALUE (?,?,?,?,?,?)");
mysqli_stmt_bind_param($stmt, 'isssss', $trangthai, $ngay, $tongGiaTri, $maGG, $maVC, $maKH);
$rs = mysqli_stmt_execute($stmt);
if ($rs === false) {
    die("Lỗi trong quá trình thực hiện câu lệnh: " . mysqli_error($conn));
} else {
    // Nếu không có lỗi, in ra thông báo cho biết INSERT đã thành công
    $maDH = mysqli_insert_id($conn);
    $sqlGioHang = "SELECT * FROM giohang WHERE Manguoidung='$maKH'";
    $rsGioHang = mysqli_query($conn, $sqlGioHang);
    while ($row = mysqli_fetch_array($rsGioHang)) {
        $maSP = $row['Masp'];
        $soLuong = $row['Soluong'];
        $sqlCTDH = "INSERT INTO chitietdonhang(Masp, Madonhang, Soluong) VALUE ($maSP, $maDH, $soLuong)";
        $rsCTDH = mysqli_query($conn, $sqlCTDH);
        if ($rsCTDH === false) {
            die("Lỗi trong quá trình thực hiện câu lệnh: " . mysqli_error($conn));
        } else {
            echo "Insert thành công CTDH!";
        }
    }
    $delete = "DELETE FROM giohang WHERE Manguoidung='$maKH'";
    $rsDelete = mysqli_query($conn, $delete);
    if ($rsDelete) {
        echo 'Xóa thành công giỏ hàng của ng dùng hiện tại';
    } else {
        die("Lỗi trong quá trình thực hiện câu lệnh: " . mysqli_error($conn));
    }

    echo "Insert thành công!";
}
