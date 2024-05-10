<?php
<<<<<<< HEAD

=======
>>>>>>> cbdee85130313472514fab56c07cb1c013254a6e
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
    if (isset($_SESSION['user_id'])) {
        $manguoidung = $_SESSION['user_id']; // mã của người dùng
        $masp = $_POST['Masp'];
        $soluong = $_POST['soluong'];

        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng của người dùng chưa
        $check_query = "SELECT * FROM giohang WHERE Manguoidung = '$manguoidung' AND Masp = '$masp'";
        $check_result = $conn->query($check_query);

        // Kiểm tra số lượng sản phẩm trong giỏ hàng của người dùng
        if ($check_result->num_rows > 0) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $existing_item = $check_result->fetch_assoc();
            $new_quantity = $existing_item['soluong'] + $soluong; // Tính toán số lượng mới
            $update_query = "UPDATE giohang SET soluong = '$new_quantity' WHERE Manguoidung = '$manguoidung' AND Masp = '$masp'";
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
    if (isset($_SESSION['user_id'])) {
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

    $sql = "SELECT giohang.*, sanpham.Tensp, sanpham.Giaban, sanpham.Img 
    FROM giohang 
    INNER JOIN sanpham ON giohang.Masp = sanpham.Masp 
    WHERE giohang.Manguoidung = '$maKH'";
    $result = mysqli_query($conn, $sql);

    // Hiển thị thông tin sản phẩm trong giao diện
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="table-items-Q">';
        echo '<img src="' . $row['Img'] . '" alt="' . $row['Tensp'] . '" style="width: 40%;">';
        echo '<div style="width: 15%;">' . $row['Giaban'] . ' VND</div>';
        echo '<div class="btn_tang_giam_soluong">';
        echo '<button class="quantity-btn decrease" data-masp="' . $row['Masp'] . '" data-action="decrease">-</button>';
        echo '<div class="soluongsp" data-masp="' . $row['Masp'] . '" contenteditable="true">' . $row['soluong'] . '</div>';
        echo '<button class="quantity-btn increase" data-masp="' . $row['Masp'] . '" data-action="increase">+</button>';
        echo '</div>';
        $tongtiensanpham = $row['Giaban'] * $row['soluong'];
        echo '<div style="width: 15%;">' . $tongtiensanpham . ' VND</div>';
        echo '<form method="post" action="xulyxoaspgiohang.php">';
        echo '<input type="hidden" name="masp" value="' . $row['Masp'] . '">';
        echo '<button type="submit" name="delete_btn" class="delete-btn">X</button>';
        echo '</form>';
        echo '</div>';
    }

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
    <style>
        .table-items-Q {
            margin: 10px 0 10px 0;
            width: 100%;
            height: 100px;
            border: rgb(162, 161, 161) solid 0.5px;
            align-items: center;
            display: flex;
            flex-direction: row;
            /* justify-content: center; */
            text-align: center;
            word-break: break-all;
            border-radius: 10px;
        }

        .edit-btn,
        .delete-btn {
            padding: 5px;
            background-color: #D61EAD;
            color: white;
            border: none;
            align-items: center;
            margin-left: 70px;
        }

        .btn_tang_giam_soluong {
            align-items: center;
            justify-content: center;
            width: 20%;
            display: flex;

        }
    </style>
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
                <div class="row">
                    <div class="breadcrumb col-12">
                        <div class="breadcrumb__links horizontal">
                            <div class="breadcrumb__link body2">Trang chủ</div>
                            <div class="breadcrumb__link body2">Giỏ hàng</div>
                        </div>
                    </div>
                </div>
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
                    <div style="overflow-y: scroll;">
                        <?php showgiohang(); ?>
                    </div>
                    <div>
                        <button id="backButton" class="type-back">&lt; Trở lại mua sắm</button>
                        <button id="cart-checkout-btn" class="custom-button">Thanh toán</button>
                    </div>
                </div>
            </div>


            <script src="javascript.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.btn_tang_giam_soluong').click(function() {
                        var masp = $(this).data('masp');
                        var action = $(this).hasClass('increase') ? 'increase' : 'decrease';
                        var quantityElement = $('#soluongsp' + masp);
                        var currentQuantity = parseInt(quantityElement.html());

                        if (action === 'increase') {
                            currentQuantity++;
                        } else if (action === 'decrease' && currentQuantity > 1) {
                            currentQuantity--;
                        }

                        quantityElement.html(currentQuantity);

                        $.ajax({
                            url: 'xulycapnhatgiohang.php',
                            type: 'POST',
                            data: {
                                masp: masp,
                                soluong: currentQuantity
                            },
                            success: function(response) {
                                // Xử lý phản hồi từ server nếu cần
                                console.log(response);
                            }
                        });
                    });
                });
            </script>


</body>


</html>