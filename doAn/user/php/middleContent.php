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
       
        <div class='page-segment'>
           
        </div>
    </div>

    <script type="text/javascript">
    function showChiTietSanPham(maSP) {
        showChiTietSanPham(maSP);
    }
</script>
    <!-- <div id="product-details-container"></div> -->