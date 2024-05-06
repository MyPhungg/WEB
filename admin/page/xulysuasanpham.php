<?php

function validateProductInput($soluong, $gianhap, $giaban)
{
    if (!is_numeric($soluong)) {
        return "Số lượng sản phẩm phải là sóo nguyên dương.";
    }

    if (!is_numeric($gianhap)) {
        return "Giá nhập sản phẩm phải là số nguyên dương.";
    }

    if (!is_numeric($giaban)) {
        return "Giá bán sản phẩm phải là số nguyên dương.";
    }

    return null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tensp = $_POST["txtTensp"];
    $motasp = $_POST["txtMotasp"];
    $hinhanh = $_FILES["txtHinhanh"]["name"];
    $hinhanh_temp = $_FILES["txtHinhanh"]["tmp_name"];
    $gioitinhsp = $_POST["txtGioitinh"];
    $thuonghieu = $_POST["txtThuonghieu"];
    $danhmuc = $_POST["txtDanhmuc"];
    $soluong = $_POST["txtSoluongnhap"];
    $gianhap = $_POST["txtGianhap"];
    $giaban = $_POST["txtGiaban"];
    $path = "../img/";

    $error = validateProductInput($soluong, $gianhap, $giaban);

    if ($error) {
        echo $error;
    } else {
    }

    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'bolashop';

    $db = new mysqli($server, $user, $pass, $database);

    if ($db) {
        mysqli_query($db, "SET NAMES 'utf8' ");
        $check_query = "SELECT * FROM sanpham WHERE OR Tensp='$tensp'";
        $check_result = mysqli_query($db, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            $sql = "UPDATE sanpham SET Tensp='$tensp', Mota='$motasp', Img='$hinhanh, GioiTinh='$gioitinhsp'  Mathuonghieu='$thuonghieu'  Madanhmuc='$danhmuc' Soluongconlai='$soluong' Gianhap='$gianhap' Giaban='$giaban'WHERE Tensp='$tensp'";
            if (mysqli_query($db, $sql)) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Đã sửa thông tin sản phẩm'
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'Có lỗi trong quá trình xử lý: ' . mysqli_error($db)
                );
            }
        } else {
        }

        echo json_encode($response);
        $db->close();
    } else {
        echo 'Kết nối đến cơ sở dữ liệu thất bại';
    }
}
