<?php
include('./connect.php');
$conn = connectDB();

// Lấy tên nhà vận chuyển từ yêu cầu
$tongGiaTri = $_POST['tonggiatri'];
$maGG = $_POST['maGG'];
$maVC = $_POST['maVC'];
$maKH = $_POST['maKH'];
$ngay = $_POST['ngay'];
$trangthai = 0;

// Truy vấn cơ sở dữ liệu để lấy phí vận chuyển
// if (!$maGG) {
//     $stmt = mysqli_prepare($conn, "INSERT INTO donhang(Trangthai, Ngay, Tonggiatri, Magiamgia, Mavc, maKhachhang) VALUE (?,?,?,?,?)");
//     mysqli_stmt_bind_param($stmt, 'iiiii', $trangthai, $ngay, $tongGiaTri, $maVC, $maKH);
//     $rs = mysqli_stmt_execute($stmt);
//     if($rs===false){
//         die("Lỗi trong quá trình thực hiện câu lệnh: " . mysqli_error($conn));
//     } else {
//         // Nếu không có lỗi, in ra thông báo cho biết INSERT đã thành công
//         echo "Insert thành công!";
//     }
// } else {
    $stmt = mysqli_prepare($conn, "INSERT INTO donhang(Trangthai, Ngay, Tonggiatri, Magiamgia, Mavc, maKhachhang) VALUE (?,?,?,?,?,?)");
    mysqli_stmt_bind_param($stmt, 'iiiiii', $trangthai, $ngay, $tongGiaTri, $maGG, $maVC, $maKH);
    $rs = mysqli_stmt_execute($stmt);
    if($rs===false){
        die("Lỗi trong quá trình thực hiện câu lệnh: " . mysqli_error($conn));
    } else {
        // Nếu không có lỗi, in ra thông báo cho biết INSERT đã thành công
        echo "Insert thành công!";
    }
// }


?>
