<script src="../js/home.js"></script>
<div class="logo-bola">
    <b> BOLA</b>
</div>
<form name="search" method="get">

    <input type="search" id="search-bar" placeholder="Search..." name="txtSearch" />
</form>
<div class="menu-toggle">
    <button onclick="toggleMenu()">Menu</button>
</div>

<div class="menu">

    <div class="option" id="product" onclick="bannerHide()" href='home.php?idtl=""'><a href='home.php?idtl'>
            <li>Sản phẩm</li>
        </a></div>
    <?php
    $con = mysqli_connect("localhost", "root", null, "bolashop");
    mysqli_query($con, "set names 'utf8'");


    $result = mysqli_query($con, "SELECT * FROM danhmuc");
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['Madanhmuc'];
        $name = $row['Tendanhmuc'];
        echo "<div class='option' id='$id' onclick='bannerHide()'><a href='home.php?idtl=$id'><li>$name</li></a> </div>";
    }



    mysqli_close($con)
    //  
    ?>


    <li class="option" id="cart"><a href="home.php?chon=giohang" style="text-decoration: none; font-size: 16px; color: rgba(0, 0, 0,0.7);">Giỏ hàng </a></li>

    <div class="user-icon">
        <div class="sub-menu">
            <ul>
                <li><a href="">Đăng nhập</a></li>
                <li><a href="#">Đăng ký</a></li>
                <li><a href="#">Đăng xuất</a></li>
                <li><a href="#">Thông tin tài khoản</a></li>


            </ul>
        </div>
    </div>
</div>