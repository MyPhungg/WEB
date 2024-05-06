<?php
if (isset($_GET['Masp'])) {
    $id = $_GET['Masp'];

    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'bolashop';

    $db = new mysqli($server, $user, $pass, $database);

    if ($db) {
        mysqli_query($db, "SET NAMES 'utf8' ");
    } else {
        echo 'Kết nối database thất bại';
        exit;
    }

    $sql = "SELECT * FROM sanpham WHERE Masp = '$id'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tensp = $row['Tensp'];
            $motasp = $row['Mota'];
            $hinhanh = $row["Img"];
            $gioitinhsp = $row["Gioitinh"];
            $thuonghieu = $row["MaThuonghieu"];
            $danhmuc = $row["MaDanhmuc"];
            $soluong = $row["Soluongconlai"];
            $gianhap = $row["Gianhap"];
            $giaban = $row["Giaban"];
?>
            <!DOCTYPE html>
            <html>

            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Sửa sản phẩm</title>
                <link rel="stylesheet" href="../css/style.css?v= <?php echo time(); ?>">
            </head>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <body>
                <form id="editProductForm" action="xulysuasanpham.php" method="post">
                    <h1>Sửa thông tin sản phẩm</h1>
                    <div class="product-info">
                        <div class="addleft">
                            <label for="">Tên sản phẩm</label><br>
                            <input type="text" class="form-addsp ip_nameSp" name="txtTensp" placeholder="Vui lòng nhập tên sản phẩm." value="<?php echo $tensp; ?>"> <br>
                            <label for="">Mô tả</label><br>
                            <input type="text" class="form-addsp ip_mota" name="txtMotasp" placeholder="Vui lòng mô tả cho sản phẩm." value="<?php echo $motasp; ?>"> <br>
                            <label for="">Hình ảnh</label><br>
                            <input type="file" class="form-addsp ip_hinhanh" id="ip_hinhanh" name="txtHinhanh" value="Thêm hình ảnh" placeholder="Chọn sản phẩm"> <br>
                            <div id="image_sp">

                            </div>
                        </div>
                        <div class="addright1">
                            <label for="">Giới tính</label><br>
                            <input type="radio" value="nu" class="form-addsp ip_gioitinh" name="txtGioitinh" <?php if ($gioitinhsp == 'nu') echo 'checked'; ?>>
                            <label for="nu" class="lbnu">Nữ</label>
                            <input type="radio" value="nam" class="form-addsp ip_gioitinh" name="txtGioitinh" <?php if ($gioitinhsp == 'nam') echo 'checked'; ?>>
                            <label for="nam" class="lbnam">Nam</label>
                            <input type="radio" value="unisex" class="form-addsp ip_gioitinh" name="txtGioitinh" <?php if ($gioitinhsp == 'unisex') echo 'checked'; ?>>
                            <label for="unisex" class="lbunisex">Unisex</label>
                            <br>
                            <label for="">Thương hiệu</label><br>
                            <?php
                            $sql_thuonghieu = mysqli_query($conn, "SELECT * FROM thuonghieu ORDER BY Mathuonghieu DESC");
                            ?>
                            <select name="txtThuonghieu">
                                <option value="0">--Chọn thương hiệu--</option>
                                <?php
                                while ($row_thuonghieu = mysqli_fetch_array($sql_thuonghieu)) {
                                ?>
                                    <option value="<?php echo $row_thuonghieu["Mathuonghieu"] ?>" <?php if ($thuonghieu == $row_thuonghieu["Mathuonghieu"]) echo 'selected'; ?>> <?php echo $row_thuonghieu["tenThuonghieu"] ?></option>
                                <?php
                                }
                                ?>
                            </select><br>
                            <label for="">Danh mục</label><br>
                            <?php
                            $sql_danhmuc = mysqli_query($conn, "SELECT * FROM danhmuc ORDER BY Madanhmuc DESC");
                            ?>
                            <select name="txtDanhmuc">
                                <option value="0">--Chọn danh mục--</option>
                                <?php
                                while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                                ?>
                                    <option value="<?php echo $row_danhmuc["Madanhmuc"] ?>" <?php if ($danhmuc == $row_danhmuc["Madanhmuc"]) echo 'selected'; ?>> <?php echo $row_danhmuc["Tendanhmuc"] ?></option>
                                <?php
                                }
                                ?>
                            </select><br>
                            <label for="">Số lượng nhập </label><br>
                            <input type="text" name="txtSoluongnhap" class="form-addsp" placeholder="Nhập số lượng." value="<?php echo $soluong; ?>">

                        </div>
                        <div class="addright2">
                            <label for="">Giá nhập</label><br>
                            <input type="text" name="txtGianhap" value="<?php echo $gianhap; ?>"><br>

                            <label for="">Giá bán</label><br>
                            <input type="text" name="txtGiaban" value="<?php echo $giaban; ?>"><br>
                        </div>

                        <input type="submit" value="Sửa sản phẩm" name="txtSuasanpham" class="addsp_submit">
                    </div>
                </form>
            </body>

            </html>
<?php
        }
    } else {
        echo "Không tìm thấy sản phẩm.";
    }
} else {
    echo "Không có id sản phẩm được cung cấp.";
}
?>