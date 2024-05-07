<!DOCTYPE html>
<html>

<head>
    <title>Chi tiết hóa đơn</title>
    <link rel="stylesheet" href="../css/thongke.css">
    <link rel="stylesheet" href="../css/chitiethoadon.css">
    <link rel="stylesheet" href="../css/phieuxuat.css">
    <link rel="stylesheet" href="../css/dsnv.css">
    <link rel="stylesheet" href="style.css?version=1.0">
    <script>
        function changeStatus(){
            var selectedStatus = document.getElementById('status').value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "chitietdonhang.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
            }
        };
        xhr.send("selectedStatus=" + selectedStatus);
        }
    </script>

</head>

<body>
    <div>
        <?php include('./AHeader.php'); ?>
        <div class="title">Chi tiết đơn hàng</div>
        <!-- <div class="title">Thống kê >> Chi tiết đơn hàng</div> -->
        <div id="flex-container">
            <div class="left">
                <div class="left-element">
                    <div class="status">
                        <div class="status-info">Tình trạng đơn hàng
                        <div class="btn">
                            <select id="status">
                                <option  value="1" selected>Đã thanh toán</option>
                                <option  value="2">Đang giao hàng</option>
                                <option  value="3">Đã chuyển hàng</option>
                                <option  value="4">Đã giao hàng</option>
                                <option  value="5">Đã hủy hàng<option>
                            </select>
                        </div>
                        <button type="submit" class="submit-btn" onclick="changeStatus()">Lưu thay đổi</button>
                        <?php
// Kiểm tra nếu có dữ liệu được gửi từ phía client
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị được gửi từ client
    $selectedStatus = $_POST['selectedStatus'];

    // Kết nối đến cơ sở dữ liệu (điều này cần phải được thay đổi để phản ánh thông tin kết nối của bạn)
    $con = mysqli_connect("localhost", "username", "password", "database");

    // Kiểm tra kết nối
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $maDH = $_GET["iddh"];
    // Tiến hành cập nhật cột "Trangthai" trong cơ sở dữ liệu
    $updateQuery = "UPDATE donhang SET Trangthai = '$selectedStatus' WHERE Madonhang='$maDH' "; // Thêm điều kiện cần thiết

    // Thực thi truy vấn cập nhật
    if (mysqli_query($con, $updateQuery)) {
        echo "Cập nhật thành công!";
    } else {
        echo "Lỗi khi cập nhật dữ liệu: " . mysqli_error($con);
    }

    // Đóng kết nối
    mysqli_close($con);
}
?>

                    </div>
                    <div><br></div>
                    <div class="table">
                        <div class="table-title">
                            <div style="width: 30%; font-weight: bold;">Sản phẩm</div>
                            <div style="width: 20%; font-weight: bold;">Đơn giá</div>
                            <div style="width: 20%; font-weight: bold;">Số lượng</div>
                            <div style="width: 30%; font-weight: bold;">Thành tiền</div>
                        </div>
                        <!-- <div style="height: 40px;"> <br></div> -->
                        <div><br></div>
                        <div><br></div>
                        <?php
                        $con=mysqli_connect("localhost","root",null,"bolashop");
                       
                       
                        if (isset($_GET['iddh'])) {
                            $maDH = $_GET['iddh'];
                            $sql = "SELECT chitietdonhang.*, sanpham.*, SUM(sanpham.Giaban*chitietdonhang.Soluong) AS thanhtien
                            FROM chitietdonhang
                            JOIN sanpham ON chitietdonhang.Masp = sanpham.Masp
                            WHERE chitietdonhang.Madonhang = '" . $maDH . "'
                            GROUP BY chitietdonhang.Masp";
                            $result = mysqli_query($con,$sql);
                            if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<div class="table-items">
                                <div class="staff">
                                    <div class="avt-sp"><img src="../img/'.$row["Img"].'"></div>
                                    <div>'.$row["Tensp"].'</div>
                                </div>
                                <div style="width: 20%;">'.$row["Giaban"].'</div>
                                <div style="width: 20%;">'.$row["Soluong"].'</div>
                                <div style="width: 30%;">'.$row["thanhtien"].'</div>
                            </div>';
                            
                            }
                            # code...
                        }}
                        mysqli_close($con);
                        ?>
    
                    </div>
                </div>
            </div>
            </div>
                    
            <div class="right">
                <div class="right-element">
                    <?php
                    $con=mysqli_connect("localhost","root",null,"bolashop");

                    if (isset($_GET['iddh'])) {
                        $maDH = $_GET['iddh'];
                        $sql = "SELECT nguoidung.*
                        FROM donhang
                        JOIN nguoidung ON donhang.maKhachhang = nguoidung.Manguoidung
                        WHERE donhang.Madonhang = '$maDH'";
                        $rs = mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($rs)){
                            echo '<div class="cus-info">
                            <div class="avata"></div>
                            <div class="cus-info-name">
                                <div>'.$row["Ten"].'</div>
                                <div style="font-weight: 400;">'.$row["Diachi"].'</div>
                            </div>
                    
                            
                        </div>
                        <div class="address">
                            <div class="address-title">Địa chỉ giao hàng</div>
                            <div class="address-content">'.$row["Diachi"].'</div>
                            <div class="address-sdt">'.$row["Sodienthoai"].'</div>
                        </div>';
                        }
                    }
                        mysqli_close($con);
                        ;
                        # code...
                    
                    ?>
                    <!-- <div class="cus-info">
                        <div class="avata"></div>
                        <div class="cus-info-name">
                            <div>Võ Lê Hoàng Tân</div>
                            <div style="font-weight: 400;">Thành phố Hồ Chí Minh</div>
                        </div>
                
                         <div class="btn-chitiet">Chi tiết</div>
                    </div>
                    <div class="address">
                        <div class="address-title">Địa chỉ giao hàng</div>
                        <div class="address-content">273 An Dương Vương, Phường 3, Quận 5, Thành phố Hồ Chí Minh</div>
                        <div class="address-sdt">0336-528-761</div>
                    </div> -->
                    <!-- <div class="order-info">
                        <div class="order-title">Thông tin đơn hàng</div>
                        <div class="order-content">
                            <div class="align-left">Tạm tính: </div>
                            <div class="align-right">800,000 VNĐ</div>
                        </div>
                        <div class="order-content">
                            <div class="align-left">Phí vận chuyển: </div>
                            <div class="align-right">20,000 VNĐ</div>
                        </div>
                        <div class="horizontal-line"></div>
                        <div class="order-content">
                            <div class="align-left">Tổng cộng: </div>
                            <div class="order-price">820,000 VNĐ</div>
                        </div>
                    </div> -->
                    <?php
                    $con=mysqli_connect("localhost","root",null,"bolashop");
                    if (isset($_GET['iddh'])) {
                        $maDH = $_GET['iddh'];
                        $sql = "SELECT vanchuyen.*, donhang.Tonggiatri, SUM(vanchuyen.gia + donhang.Tonggiatri) AS total
                        FROM donhang
                        JOIN vanchuyen ON donhang.Mavc = vanchuyen.Mavc
                        WHERE donhang.Madonhang = '$maDH'";
                        $rs = mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($rs)){
                            echo '<div class="order-info">
                            <div class="order-title">Thông tin đơn hàng</div>
                            <div class="order-content">
                                <div class="align-left">Tạm tính: </div>
                                <div class="align-right">'.$row["Tonggiatri"].' VNĐ</div>
                            </div>
                            <div class="order-content">
                                <div class="align-left">Phí vận chuyển: </div>
                                <div class="align-right">'.$row["Gia"].' VNĐ</div>
                            </div>
                            <div class="horizontal-line"></div>
                            <div class="order-content">
                                <div class="align-left">Tổng cộng: </div>
                                <div class="order-price">'.$row["total"].' VNĐ</div>
                            </div>
                        </div>';
                        }
                    }
                    mysqli_close($con);
                    ?>
                </div>
            </div>

        </div>
    </div>
    <?php include('./footer.php'); ?>
</body>

</html>




