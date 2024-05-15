<?php
$con = mysqli_connect("localhost", "root", "", "bolashop");
mysqli_query($con, "set names 'utf8'");

if (isset($_POST['brand']) && isset($_POST['gender'])) {
    $brands = $_POST['brand'];
    $genders = $_POST['gender'];

    // Bắt đầu câu truy vấn
    $sql = "SELECT * FROM sanpham WHERE 1=1";

    // Thêm điều kiện vào câu truy vấn cho từng checkbox đã chọn
    if (!empty($brands)) {
        $sql .= " AND Mathuonghieu IN ('" . implode("','", $brands) . "')";
    }
    if (!empty($genders)) {
        $sql .= " AND Gioitinh IN ('" . implode("','", $genders) . "')";
    }

    // Thực thi câu truy vấn
    $query = mysqli_query($con, $sql);
    $num = mysqli_num_rows($query);

    // Hiển thị kết quả
    if ($num > 0) {
        while ($row = mysqli_fetch_array($query)) {
            echo "<div class='content-item' onclick='showChiTietSanPham(\"" . $row['Masp'] . "\")'>";
            echo "<div class='product-image'><img src='../../img/" . $row['Img'] . "' alt=''></div>";
            echo "<h3>" . $row["Tensp"] . "</h3>";
            echo "<p>Giá: " . $row['Giaban'] . " VND</p>";
            echo "</div>";
        }
    } else {
        echo "Không có sản phẩm nào phù hợp.";
    }
} else {
    echo "Dữ liệu không hợp lệ.";
}

mysqli_close($con);
?>
