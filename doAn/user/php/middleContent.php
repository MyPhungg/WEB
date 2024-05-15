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
       
        <div class='page-segment'>
           
        </div>
    </div>

    <script type="text/javascript">
    function showChiTietSanPham(maSP) {
        showChiTietSanPham(maSP);
    }
</script>
    <!-- <div id="product-details-container"></div> -->