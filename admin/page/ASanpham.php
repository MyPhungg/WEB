<?php
include("../page/connectDB.php")
?>

<form action="" name="quanli_sp" method="get" class="ql_sp">
    <h1>Sản phẩm</h1>
    <div class="header-form-qlsp">
        <div class="text-thuonghieu">

        </div>
        <label for="">Tìm kiếm</label>
        <input type="text" id="searchInput" class="ip_timkiemsp" placeholder="Tìm kiếm">

    </div>
    <div class="content_form-qlsp">
        <div class="header-content-qlsp">
            <label for="">Sản phẩm</label>
            <label for="">Đơn giá</label>
            <label for="">Số lượng</label>
            <label for="">***</label>
        </div>

        <div class="content-item">
            <?php
            $sql_sanpham = mysqli_query($conn, "SELECT * FROM sanpham ORDER BY Masp ASC");
            while ($row_sanpham = mysqli_fetch_array($sql_sanpham)) {

            ?>
                <div class="item">
                    <img src="../img/<?php echo $row_sanpham["Img"] ?>" alt="">
                    <label for="" class="item-tensp"><?php echo $row_sanpham["Tensp"] ?></label>
                    <label for="" class="item-dongia"><?php echo $row_sanpham["Giaban"] ?>VND</label>
                    <label for="" class="item-soluong"><?php echo $row_sanpham["Soluongconlai"] ?></label>
                    <!-- <button class="btn_sua" value="<?php echo $row_sanpham["Masp"] ?>">Sửa</button> -->
                    <input type="submit" value="X" name="sub_xoa" class="ip_xoa_sp">
                </div>
            <?php } ?>

        </div>
        <div class="page"> </div>
    </div>
</form>