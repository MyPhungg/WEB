<?php
$con = mysqli_connect("localhost", "root", "", "bolashop");
mysqli_query($con, "set names 'utf8'");

$sql= "SELECT thuonghieu.* FROM sanpham, thuonghieu WHERE sanpham.Mathuonghieu = thuonghieu.Mathuonghieu GROUP BY thuonghieu.Mathuonghieu";
$result_query = mysqli_query($con, $sql);

$sqll = "SELECT Gioitinh FROM sanpham GROUP BY Gioitinh";
$rs_gt = mysqli_query($con,$sqll);
mysqli_close($con);
?>
<div class="banner" id="banner">   
</div>
<div class="content-title">
    <div class="page-noti">
        <h1>Trang chủ</h1>
    </div>
</div>
<div class="container">
    <form class="filter-tool" id="filter-tool" name="formFilter" method="POST">
        <h1>Bộ lọc</h1>
        <hr />
        
        <input type="search" class="search-bar" placeholder="Search..." name="txtSearch" />
        <h4>Thương hiệu</h4>
        <?php foreach($result_query as $key => $value) { ?>
        <input type="checkbox" id="brand" name="brand[]" value="<?php echo $value["Mathuonghieu"]; ?>" />
        <label for="<?php echo $value["Mathuonghieu"]; ?>"><?php echo $value["tenThuonghieu"]; ?></label>
        <br />
        <?php } ?>
        <h4>Giới tính</h4>
        <?php foreach($rs_gt as $key => $value) { ?>
        <input type="checkbox" id="gender" name="gender[]" value="<?php echo $value["Gioitinh"]; ?>" />
        <label for="<?php echo $value["Gioitinh"]; ?>"><?php echo $value["Gioitinh"]; ?></label><br />
        <?php } ?>
        
       
        <br />
        <br />
        <br />

    </form>
    <div class="content-container">
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
            $ma=$row["Masp"];
            echo "<div class='content-item'><a href='home.php?chon=ctsp&id=$ma'>";

            echo "<div class='product-image'><img src='../../img/" . $row['Img'] . "' alt=''></div>";
            echo "<h3>" . $row["Tensp"] . "</h3>";
            echo "<p>Giá: " . $row['Giaban'] . " VND</p>";
            echo "</a></div>";
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
        ?>
        
    </div>
    <!-- <div id="product-details-container"></div> -->