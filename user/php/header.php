<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="../js/home.js"></script>
<div class="logo-bola">
    <b><a href="home.php?idtl"> BOLA</a></b>
</div>
<form name="search" method="get">

    <input type="search" class="search-bar" placeholder="Search..." name="txtSearch" />
</form>
<div class="menu-toggle">
    <button onclick="toggleMenu()">Menu</button>
</div>

<div class="menu">

    <div class="option" id="product" onclick="bannerHide()" href='home.php?idtl=""'><a href='home.php?idtl'>
            <li>Sản phẩm</li>
        </a></div>
    <?php
    $con = mysqli_connect("localhost", "root", "", "bolashop");
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
    <?php if(isset($_SESSION['user_id'])) {
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

<!-- Hiển thị hình ảnh trong thẻ <img> -->
<div class="user-icon">
    <img src="../img/<?php echo $imgSrc; ?>" alt="Avatar" class="avt">

        <div class="sub-menu">
            <ul>
                <?php
                // session_start();
                if (isset($_SESSION['user_id'])) {
                    // Nếu đã đăng nhập
                    echo '<li><a href="home.php?chon=tttk">Thông tin tài khoản</a></li>';
                    echo '<li><a href="./logout.php">Đăng xuất</a></li>';
                } else {
                    // Nếu chưa đăng nhập
                    echo '<li><a href="./dangnhap.php">Đăng nhập</a></li>';
                    echo '<li><a href="./dangky.php">Đăng ký</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
    </div>
</div>
<script type="text/javascript">
    // Kiểm tra trạng thái của session và tải lại trang nếu session không tồn tại
    if (!<?php echo json_encode(session_id()); ?>) {
        window.location.reload(true); // Tải lại trang một cách đầy đủ
    }
    $(document).ready(function() {
        $('.search-bar').keyup(function() {
            var textsearch = $('.search-bar').val();

            $.ajax({
                url: 'xulytimkiem.php',
                type: 'POST',
                data: {
                    data: textsearch
                },
                dataType: 'html',
                success: function(data) {
                    $('.content-container').html(data);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Hiển thị thông báo lỗi trong console

                    // Nếu cần, bạn có thể thực hiện xử lý lỗi khác ở đây
                }
            });
        });
    });
</script>