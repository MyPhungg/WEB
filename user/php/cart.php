<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $maKH = $_SESSION['user_id'];
    if (!isset($_SESSION['giohang'][$maKH])) {
        //xoa san pham
        if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
            array_splice($_SESSION['giohang'], $_GET['delid'], 1);
        }
        //lay du lieu tu form
        if (isset($_POST['addcart']) && ($_POST['addcart'])) {
            $hinh = $_POST['hinh'];
            $tensp = $_POST['tensp'];
            $gia = $_POST['gia'];
            $soluong = $_POST['soluong'];

            $fl = 0;

            //kiem tra san pham co trong gio hang hay khong?
            for ($i = 0; $i < sizeof($_SESSION['giohang'][$maKH]); $i++) {
                if ($_SESSION['giohang'][$i][1] == $tensp) {
                    $fl = 1;
                    $soluongmoi = $soluong + $_SESSION['giohang'][$i][3];
                    $_SESSION['giohang'][$i][3] = $soluongmoi;
                    break;
                }
            }
            //kiem tra trung va them moi san pham vao gio hang 
            if ($fl == 0) {
                $sp = [$hinh, $tensp, $gia, $soluong];
                $_SESSION['giohang'][] = $sp;
            }
        }
    }
}





function showgiohang()
{
    if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
        $tong = 0;
        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
            $tt = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
            $tong += $tt;
            echo '<tr>
                    <td>' . ($i + 1) . '</td>
                    <td><img src="images/' . $_SESSION['giohang'][$i][0] . '" alt=""></td>
                    <td>' . $_SESSION['giohang'][$i][1] . '</td>
                    <td>' . $_SESSION['giohang'][$i][2] . '</td>
                    <td>' . $_SESSION['giohang'][$i][3] . '</td>
                    <td>
                        <div>' . $tt . '</div>
                    </td>
                    <td>
                        <a href="cart.php?delid=' . $i . '">Xóa</a>
                    </td>
                </tr>';
        }
    } else {
        echo "Giỏ hàng rỗng!";
    }
}
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