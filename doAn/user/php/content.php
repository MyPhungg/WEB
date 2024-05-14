<?php
$conn = mysqli_connect('localhost', 'root', '', 'bolashop');

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}

// Số lượng sản phẩm mỗi trang
$soSanPhamTrenTrang = 12;

// Xác định trang hiện tại
if (isset($_GET['trang'])) {
    $trangHienTai = $_GET['trang'];
} else {
    $trangHienTai = 1;
}

// Tính chỉ số bắt đầu của sản phẩm trên trang hiện tại
$batDau = ($trangHienTai - 1) * $soSanPhamTrenTrang;

// Lấy danh mục sản phẩm từ tham số truyền vào, ví dụ: balo
$danhMuc = isset($_GET['idtl']) ? $_GET['idtl'] : '';

// Xây dựng câu truy vấn dựa trên danh mục
$sql = "SELECT * FROM sanpham";

if (!empty($danhMuc)) {
    $sql .= " WHERE Madanhmuc = '$danhMuc'";
}

$sql .= " LIMIT $batDau, $soSanPhamTrenTrang";

// Truy vấn lấy danh sách sản phẩm
$result = mysqli_query($conn, $sql);

// Hiển thị danh sách sản phẩm
while ($row = mysqli_fetch_array($result)) {
    echo "<div class='content-item' onclick='showChiTietSanPham(\"" . $row['Masp'] . "\")'>";
    echo "<div class='product-image'><img src='../../img/" . $row['Img'] . "' alt=''></div>";
    echo "<h3>" . $row["Tensp"] . "</h3>";
    echo "<p>Giá: " . $row['Giaban'] . " VND</p>";
    echo "</div>";
}

// Truy vấn để đếm tổng số sản phẩm
$sqlCount = "SELECT COUNT(*) AS total FROM sanpham";

if (!empty($danhMuc)) {
    $sqlCount .= " WHERE Madanhmuc = '$danhMuc'";
}

$resultCount = mysqli_query($conn, $sqlCount);
$rowCount = mysqli_fetch_assoc($resultCount);
$totalRecords = $rowCount['total'];
$totalPages = ceil($totalRecords / $soSanPhamTrenTrang);

// Hiển thị phân trang
echo "<div class='page-segment'>";
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<li> <a href='?trang=$i&danhmuc=$danhMuc'>$i</a> </li>";
}
echo "</div>";


// Đóng kết nối
mysqli_close($conn);
?><script>
    function showChiTietSanPham(maSP) {
        showChiTietSanPham(maSP);
}
</script>