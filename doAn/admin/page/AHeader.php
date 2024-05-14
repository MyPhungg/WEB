<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/home.css?version=1.0" />
    <link rel="stylesheet" href="../css/menuadmin.css?version=1.0" />

</head>

<body>
    <div id="body-home">
        <div class="topmenu-wrap">
            <div id="topmenu-admin">
                <div class="logo-bola">
                    <b> BOLA</b>
                </div>

                <div class="menu-toggle">
                    <button onclick="toggleMenu()">Menu</button>
                </div>

                <div class="menu">
                    <div class="option" id="thongke"><a href="AHome.php?chon=t&id=thongke" onclick="selectOption(this)">Thống kê</a></div>
                    <div class="option" id="sanpham"><a href="AHome.php?chon=t&id=sanpham" onclick="selectOption(this)">Sản phẩm</a></div>
                    <div class="option" id="phieunhap"><a href="AHome.php?chon=t&id=phieunhap">Phiếu nhập</a></div>
                    <div class="option" id="donhang"><a href="AHome.php?chon=t&id=donhang">Đơn hàng</a></div>
                    <div class="option" id="nhacungcap"><a href="AHome.php?chon=t&id=nhacungcap">Nhà cung cấp</a></div>
                    <div class="option" id="nguoidung"><a href="AHome.php?chon=t&id=nguoidung">Người dùng</a></div>
                    <div class="option" id="cart">Khác
                        <div class="sub-menu">
                            <ul>
                                <li><a href="AHome.php?chon=t&id=quyen">Quyền</a></li>
                                <li><a href="AHome.php?chon=t&id=khuyenmai">Khuyến mãi</a></li>
                                <li><a href="AHome.php?chon=t&id=vanchuyen">Vận chuyển</a></li>
                                <li><a href="AHome.php?chon=t&id=thuonghieu">Thương hiệu</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['user_id'])) {
                        $maND = $_SESSION['user_id'];

                        $conn = mysqli_connect("localhost", "root", "", "bolashop");

                        if (!$conn) {
                            die("Kết nối thất bại: " . mysqli_connect_error());
                        }

                        $sql = "SELECT img FROM nguoidung WHERE Manguoidung='$maND'";

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $imgSrc = $row["img"];
                        } else {
                            // Nếu không có dữ liệu ảnh, bạn có thể sử dụng ảnh mặc định hoặc hiển thị một tin nhắn cho người dùng
                            $imgSrc = "path_to_default_image.jpg";
                        }

                        // Đóng kết nối CSDL
                        mysqli_close($conn);
                    }
                    ?>
                    <div class="user-icon">
                        <img src="../../img/<?php echo $imgSrc; ?>" alt="Avatar" class="avt">

                        <div class="sub-menu">
                            <ul>
                                <?php
                                // session_start();
                                if (isset($_SESSION['user_id'])) {
                                    // Nếu đã đăng nhập
                                    echo '<li><a href="AHome.php?chon=tttk">Thông tin tài khoản</a></li>';
                                    echo '<li><a href="../../user/php/logout.php">Đăng xuất</a></li>';
                                } else {
                                    // Nếu chưa đăng nhập
                                    echo '<li><a href="../../user/php/dangnhap.php">Đăng nhập</a></li>';
                                    // echo '<li><a href="./dangky.php">Đăng ký</a></li>';
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- <div class="sub-menu">
                            <ul>
                                <li><a href="../../user/php/dangnhap.php">Đăng nhập</a></li>
                                <li><a href="../../user/php/logout.php">Đăng xuất</a></li>

                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>


    </script>
</body>

</html>