<div class="banner" id="banner"></div>
<div class="content-title">
    <div class="page-noti">
        <h1>Trang chủ</h1>
    </div>
    <div class="filter-btn">Lọc
        <div class="angle-down" onclick="filterTool()"><img src="../../img/angle-down-solid.svg"></div>
    </div>
    <div class="arrange-btn">Sắp xếp
        <div class="angle-down"><img src="../../img/angle-down-solid.svg"></div>
        <ul class="dropdown-menu">
            <li><a href="#">A - Z</a></li>
            <li><a href="#">Z - A</a></li>
            <li><a href="#">Giá từ cao đến thấp</a></li>
            <li><a href="#">Giá từ thấp đến cao</a></li>
        </ul>
    </div>
</div>
<div class="container">
    <form class="filter-tool" id="filter-tool" name="formFilter" method="get">
        <h1>Bộ lọc</h1>
        <hr />
        <h4>Thương hiệu</h4>
        <input type="checkbox" id="brand1" name="brand1" value="Brand1" />
        <label for="brand1">Balenciaga</label>
        <br />
        <input type="checkbox" id="brand2" name="brand2" value="Brand2" />
        <label for="brand2">Dolce & Gabana</label>
        <br />
        <input type="checkbox" id="brand3" name="brand3" value="Brand3" />
        <label for="brand3">Chanel</label>
        <br />
        <h4>Loại balo</h4>
        <input type="checkbox" id="type1" name="type1" value="Type1" />
        <label for="type1">Balo du lịch</label><br />
        <input type="checkbox" id="type2" name="type2" value="Type2" />
        <label for="type2">Balo thể thao</label><br />
        <input type="checkbox" id="type3" name="type3" value="Type3" />
        <label for="type3">Túi, ví</label><br />
        <br />
        <br />
        <br />
        <input type="submit" value="Lọc">
        <input type="button" value="Xóa">

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