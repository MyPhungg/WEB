<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>chitietsanpham</title>
    <style>
        .content-sp {
            margin: 10%;
            /* border: 0.5 solid black; border-radius: 8%; */
        }

        .ten-san-pham {
            color: #1f010193;
        }

        .hienthisanpham {
            display: flex;
            width: 80%;
            margin: auto;
            justify-content: space-between;
            align-items: center;
        }

        .photo-sp {
            width: 50%;
        }

        .thongtinsanpham {
            width: 50%;
        }

        .kichThuoc {
            display: flex;
            margin: auto;
            align-items: center;
        }

        .kichThuoc-container {
            margin-left: 20px;
        }

        .soLuong {
            display: flex;
            margin: auto;
            align-items: center;
        }

        .soLuong-container {
            margin-left: 30px;
        }

        .conLai {
            display: flex;
            margin: auto;
            align-items: center;
        }

        .conLai p {
            color: #1f010193;
        }

        .conLai-container {
            margin-left: 30px;
        }

        .conLai-input {
            border: none;
            /* outline: none; */
            color: #1f010193;
        }

        .conLai-input:focus {
            outline: none;
        }

        .line_sp {
            width: 80%;
            margin: 10px;
            /* float: right; */
        }

        .button_muahang {
            display: flex;
        }

        .button_muahang .button_muahang_them {
            background-color: yellow;
            color: black;
            /* border: none; */
            cursor: pointer;
            border-radius: 20px;
            width: 250px;
            padding: 15px 0;
            margin-top: 10px;
            margin-right: 50px;
            font-size: 16px;
            align-self: center;
        }

        .button_muahang_them:hover {
            background-color: rgb(209, 209, 20)
        }

        .button_muahang .button_muahang_muangay {
            background-color: #D61EAD;
            color: #fff;
            /* border: none; */
            cursor: pointer;
            border-radius: 20px;
            width: 250px;
            padding: 15px 0;
            margin-top: 10px;
            font-size: 16px;
            align-self: center;
        }

        .button_muahang_muangay:hover {
            background-color: #A70087;
        }

        .chitietsanpham {
            display: flex;
            justify-content: center;
            /* Căn giữa theo chiều ngang */
            align-items: center;
            /* Căn giữa theo chiều dọc */
            margin-top: 50px;
        }

        .chitietsanpham table {
            width: 80%;
            border-collapse: collapse;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            /* Hiệu ứng box-shadow */
            border-radius: 10px;
        }

        .chitietsanpham th {
            background-color: #FF8FC5;
            /* Màu nền của thẻ th */
            padding: 10px;
            text-align: left;
        }

        .chitietsanpham th p {
            margin: 0;
            /* Loại bỏ margin của đoạn văn bản bên trong thẻ th */
        }

        .chitietsanpham td {
            padding: 10px;
            border: 1px solid #ddd;
            /* Viền của ô td */
        }
    </style>
</head>
<!-- Đẩy dữ liệu vào bảng khi bấm thêm vào giỏ hàng -->

<?php
include('./connect.php');
$conn = connectDB();
$maKH = $_SESSION['user_id'];
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST["them"]) && ($_POST["them"])) {
    if (isset($_POST['id']) && isset($_POST['soLuong'])) {
        $id = $_POST['id'];
        $soLuong = $_POST['soLuong'];

        // Thực hiện cập nhật CSDL ở đây, ví dụ:
        $sql = "INSERT INTO giohang(Manguoidung, Masp, Soluong) VALUES($maKH, $id, $soLuong)";
        if (mysqli_query($conn, $sql)) {
            echo "alert('Thêm vào giỏ hàng thành công!')";
        } else {
            echo "alert('Thêm vào giỏ hàng thất bại!')";
            echo "Lỗi: " . mysqli_error($conn);
        }
    } else {
        echo "Dữ liệu không hợp lệ!";
    }
} else {
    echo "alert('lỗi!')";
}
?>

<body style="background-color: white;">
    <form id="formThemVaoGioHang" method="POST" action="xuliThemgiohang.php"> <!-- Thay thế "trang_xu_ly.php" bằng tên trang xử lý của bạn -->
        <div class="content-sp">
            <div class="hienthisanpham">
                <?php
                // include('./connect.php');
                // $conn = connectDB();
                if (isset($_GET['id'])) {
                    $maSP = $_GET['id'];
                    $sql = "SELECT * FROM sanpham WHERE Masp=$maSP";
                    $rs = mysqli_query($conn, $sql);
                    if ($row = mysqli_fetch_array($rs)) {
                        echo '<div class="photo-sp">
                            <img src="../img/' . $row["Img"] . '" style="width: 80%; height: fit-content;">
                        </div>
                        <div class="thongtinsanpham">
                            <h1>' . $row["Tensp"] . '</h1>
                            <p> Giá bán: ' . $row["Giaban"] . ' VND</p>
                            <div class="soLuong">
                                <P>Số lượng:</P>
                                <input type="hidden" name="masp" value="' . $maSP . '"> <!-- Trường ẩn chứa mã sản phẩm -->
                                <div class="soLuong-container">
                                    <button id="truButton" class="soLuong-button">-</button>
                                    <input id="soLuongInput" class="soLuong-input" type="number" min="1" value="1" name="soLuong" readonly>
                                    <button id="congButton" class="soLuong-button">+</button>
                                </div>
                            </div>
                            <div class="conLai">
                                <p>Còn lại:</p>
                                <div class="conLai-container">
                                    <input id="conLaiInput" class="conLai-input" type="number" value="' . $row["Soluongconlai"] . '" readonly>
                                </div>
                            </div>
                            <hr class="line_sp">
                            <div class="button_muahang">
                                <div class="themGioHang">
                                    <input type="submit" class="button_muahang_them" name="them" value="Thêm vào giỏ hàng"> 
                                </div>
                                <div class="muaNgay">
                                    <input type="button" class="button_muahang_muangay" name="mua" value="Mua ngay">
                                </div>
                            </div>
                        </div>';
                    }
                }

                ?>
            </div>
        </div>
    </form>






    <script>
        const truButton = document.getElementById('truButton');
        const congButton = document.getElementById('congButton');
        const soLuongInput = document.getElementById('soLuongInput');
        const conLaiInput = document.getElementById('conLaiInput');

        truButton.addEventListener('click', () => {
            let quantity = parseInt(soLuongInput.value);
            if (quantity > 1) {
                quantity--;
                soLuongInput.value = quantity;
            }
        });

        congButton.addEventListener('click', () => {
            let quantity = parseInt(soLuongInput.value);
            if (quantity < conLaiInput.value) {
                quantity++;
                soLuongInput.value = quantity;
            }


        });

        soLuongInput.addEventListener('change', () => {
            let quantity = parseInt(soLuongInput.value);
            if (quantity < 1) {
                quantity = 1;
            }
            soLuongInput.value = quantity;
        });
    </script>
</body>

</html>
<!-- // <form id="formThemVaoGioHang" method="POST" action="">

    //     <div class="content-sp">
    //         <p>Trang chủ >> Balo >> <span class="ten-san-pham">Chi tiết sản phẩm</span></p> -->
// <div class="hienthisanpham">
    // <?php
        //             // include('./connect.php');
        //             // echo $_GET['id'];
        //             // $conn = connectDB();
        //             if (isset($_GET['id'])) {
        //                 $maSP = $_GET['id'];
        //                 $sql = "SELECT * FROM sanpham WHERE Masp=$maSP";
        //                 $rs = mysqli_query($conn, $sql);
        //                 if ($row = mysqli_fetch_array($rs)) {
        //                     echo '<div class="photo-sp">
        //             <img src="../img/' . $row["Img"] . '" style="width: 80%; height: fit-content;">
        //         </div>
        // <div class="thongtinsanpham">
        //     <h1>' . $row["Tensp"] . '</h1>
        //     <p> Giá bán: ' . $row["Giaban"] . ' VND</p>

        //     <div class="soLuong">
        //         <P>Số lượng:</P>
        //             <input type="hidden" name="id" value="<?php echo $maSP ; 
        ?>">
    <!--  //             <div class="soLuong-container">
    //                 <button id="truButton" class="soLuong-button">-</button>
    //                 <input id="soLuongInput" class="soLuong-input" type="number" min="1" value="1" name="soLuong" readonly>
    //                 <button id="congButton" class="soLuong-button">+</button>
    //             </div>
    //     </div>
    //     <div class="conLai">
    //         <p>Còn lại:</p>
    //         <div class="conLai-container">
    //             <input id="conLaiInput" class="conLai-input" type="number" value="' . $row["Soluongconlai"] . '" readonly>
    //         </div>
    //     </div>
    //     <hr class="line_sp">
    //     <div class="button_muahang">
    //         <div class="themGioHang">
    //             <input type="button" class="button_muahang_them" name="them" value="Thêm vào giỏ hàng">
    //             </div>
    //         <div class="muaNgay">
    //             <input type="button" class="button_muahang_muangay" name="mua" value="Mua ngay">
    //         </div>
            
    //     </div>
    // </div>';-->