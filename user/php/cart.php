<?php


$server = "localhost";
$username = "root"; 
$pass = "";
$database = "bolashop"; 

$conn = new mysqli($server, $username, $pass, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thêm sản phẩm vào giỏ 
if (isset($_POST['addcart']) && ($_POST['addcart'])) {
    if(isset($_SESSION['user_id'])){
        $manguoidung = $_SESSION['user_id']; // mã của người dùng
        $masp = $_POST['Masp'];
        $soluong = $_POST['soluong'];

        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng của người dùng chưa
        $check_query = "SELECT * FROM giohang WHERE Manguoidung = '$manguoidung' AND Masp = '$masp'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $existing_item = $check_result->fetch_assoc();
            $soluong += $existing_item['soluong'];
            $update_query = "UPDATE giohang SET soluong = '$soluong' WHERE Manguoidung = '$manguoidung' AND Masp = '$masp'";
            $conn->query($update_query);
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            $insert_query = "INSERT INTO giohang (Manguoidung, Masp, soluong) VALUES ('$manguoidung', '$masp', '$soluong')";
            $conn->query($insert_query);
        }
    } else {
        echo "Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.";
    }
}

// Xóa sản phẩm khỏi giỏ
if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
    if(isset($_SESSION['user_id'])){
        $manguoidung = $_SESSION['user_id'];
        $masp = $_GET['delid'];

        $delete_query = "DELETE FROM giohang WHERE Manguoidung = '$manguoidung' AND Masp = '$masp'";
        $conn->query($delete_query);
    } else {
        echo "Vui lòng đăng nhập để xóa sản phẩm khỏi giỏ hàng.";
    }
}

function showgiohang()
{
    // Khởi tạo session và kết nối đến cơ sở dữ liệu
    include('connect.php');
    $conn = connectDB();

    // Lấy mã người dùng từ session
    $maKH = $_SESSION['user_id'];

    // Truy vấn thông tin sản phẩm từ bảng sản phẩm và hiển thị trong giỏ hàng
    $sql = "SELECT giohang.*, sanpham.* FROM giohang INNER JOIN sanpham ON giohang.Masp = sanpham.Masp WHERE giohang.Manguoidung = $maKH";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Hiển thị thông tin sản phẩm trong giỏ hàng và tính tổng tiền cho mỗi sản phẩm
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="item">';
            echo '<p>' . $row['TenSP'] . '</p>';
            echo '<p>' . $row['Gia'] . '</p>';
            echo '<p>' . $row['Soluong'] . '</p>';
            
            // Tính tổng tiền cho sản phẩm hiện tại
            $tongTienSanPham = $row['Gia'] * $row['Soluong'];
            echo '<p>' . $tongTienSanPham . '</p>';
            
            // Nút Xóa
            echo '<form method="POST" action="delete_from_cart.php">';
            echo '<input type="hidden" name="product_id" value="' . $row['Masp'] . '">';
            echo '<button type="submit" name="delete">Xóa</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo "Giỏ hàng trống!";
    }

    // Đóng kết nối
    mysqli_close($conn);
}


$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cssdoan.css">
    <title>Document</title>
</head>

<body>
    <div>
        <div>
            <div class="section__container">
                <div class="row">
                    <div class="col-12">
                        <h4>Giỏ hàng</h4>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="breadcrumb col-12">
                        <div class="breadcrumb__links horizontal">
                            <div class="breadcrumb__link body2">Trang chủ</div>
                            <div class="breadcrumb__link body2">Giỏ hàng</div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="section__container">
            <div class="cart-table col-8">
                <div class="cart-table__cont">
                    <div class="table-title">
                        <div style="width: 40%; font-weight: bold;">Sản phẩm</div>
                        <div style="width: 15%; font-weight: bold;">Đơn giá</div>
                        <div style="width: 20%; font-weight: bold;">Số lượng</div>
                        <div style="width: 15%; font-weight: bold;">Tổng tiền</div>
                        <div style="width: 10%; font-weight: bold;"></div>
                    </div>
                    <div><br></div>
                    <div><br></div>
                    <!--DATA-->
                    <?php showgiohang(); ?>

                    <!-- <div class="table-items">
                        <div class="product">
                            <div class="name-product"><img src="image/Home.png" width="65px" height="65px"></div>
                            <div>Áo sơ mi</div>
                        </div>
                        <div class="price">350,000 VNĐ</div>
                        <div class="product-quantity-info" >
                            <div class="product-quantity-border">
                                <button class="quantity-btn decrease" onclick="decreaseQuantity(this)">-</button>
                                <span class="quantity-value">2</span>
                                <button class="quantity-btn increase" onclick="increaseQuantity(this)">+</button>
                            </div>
                        </div>
                        <div class="price-sum">700,000 VNĐ</div>
                        <div class="btn">
                            <button class="remove-button">X</button>
                        </div>
                    </div>

                    <div class="table-items">
                        <div class="product">
                            <div class="name-product"><img src="image/Home.png" width="65px" height="65px"></div>
                            <div>Áo sơ mi</div>
                        </div>
                        <div class="price">350,000 VNĐ</div>
                        <div class="product-quantity-info" >
                            <div class="product-quantity-border">
                                <button class="quantity-btn decrease" onclick="decreaseQuantity(this)">-</button>
                                <span class="quantity-value">2</span>
                                <button class="quantity-btn increase" onclick="increaseQuantity(this)">+</button>
                            </div>
                        </div>
                        <div class="price-sum">700,000 VNĐ</div>
                        <div class="btn">
                            <button class="remove-button">X</button>
                        </div>
                    </div>
                    <div class="table-items">
                        <div class="product">
                            <div class="name-product"><img src="image/Home.png" width="65px" height="65px"></div>
                            <div>Áo sơ mi</div>
                        </div>
                        <div class="price">350,000 VNĐ</div>
                        <div class="product-quantity-info" >
                            <div class="product-quantity-border">
                                <button class="quantity-btn decrease" onclick="decreaseQuantity(this)">-</button>
                                <span class="quantity-value">2</span>
                                <button class="quantity-btn increase" onclick="increaseQuantity(this)">+</button>
                            </div>
                        </div>
                        <div class="price-sum">700,000 VNĐ</div>
                        <div class="btn">
                            <button class="remove-button">X</button>
                        </div>
                    </div>
                </div> -->

                    <button id="backButton" class="type-back">&lt; Trở lại mua sắm</button>
                    <button id="cart-checkout-btn" class="custom-button">Thanh toán</button>
                </div>
            </div>


            <script src="javascript.js"></script>
</body>


</html>