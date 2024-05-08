<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Phiếu xuất</title>
    <link rel="stylesheet" href="../css/thongke.css">
    <link rel="stylesheet" href="../css/chitiethoadon.css">
    <link rel="stylesheet" href="../css/phieuxuat.css">
    <link rel="stylesheet" href="../css/dsnv.css">
    <link rel="stylesheet" href="style.css?version=1.0">


</head>

<body>
    <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">        <div id="title">Thống kê</div>
        <div id="grid-container">
            <div class="grid-items">
                <div class="text-top-left">Số sản phẩm đã bán</div>
                <div class="number-center-left">
                <?php
                    $con = mysqli_connect('localhost', 'root', '', 'bolashop');
                    $sql = "SELECT COUNT(Soluong) AS tongsoluong FROM chitietdonhang";
                    $result_sql = mysqli_query($con, $sql);
                    $row_soluong = mysqli_fetch_assoc($result_sql);
                    echo $row_soluong["tongsoluong"]; 
                    mysqli_close($con);
                    
                    
                ?>
                </div>
                <div class="text-center-right">Sản phẩm</div>
            </div>
            <div class="grid-items">
                <div class="text-top-left">Tổng doanh thu</div>
                <div class="number-center-left"><?php
                    $con = mysqli_connect('localhost', 'root', '', 'bolashop');
                    $sql = "SELECT SUM(Tonggiatri) AS tonggiatri FROM donhang";
                    $result_sql = mysqli_query($con, $sql);
                    $row_doanhthu = mysqli_fetch_assoc($result_sql);
                    echo $row_doanhthu["tonggiatri"]; 
                    mysqli_close($con);
                    
                    
                ?></div>
                <div class="text-center-right">VNĐ</div>
            </div>
            <div class="grid-items">
                Ngày bắt đầu:
                <input type="date" id="start-date" />
                Ngày kết thúc:
                <input type="date" id="end-date" />
                <button type="button" class="filter-btn">Lọc</button>
            </div>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'bolashop');
            if (!$con) {
                die("Kết nối không thành công: " . mysqli_connect_error());
            }

            if (isset($_POST['filter-btn'])) {
                $start_date = $_POST['start-date'];
                $end_date =$_POST['end-date'];

                $sql="SELECT * FROM donhang WHERE Ngay BETWEEN '$start_date' AND '$end_date'";
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="table-items">
                            <div class="customer">
                                <div class="avt"></div>
                                <div>' . $row["maKhachhang"] . '</div>
                            </div>
                            <div style="width: 20%;">' . $row["Ngay"] . '</div>
                            <div style="width: 20%;">' . $row["Madonhang"] . '</div>
                            <div style="width: 20%;">' . $row["Tonggiatri"] . '</div>
                            <div class="btn">
                                <select>
                                    <option id="status" value="1">' . $row["Trangthai"] . '</option>
                                    <option id="status" value="2">Đang giao hàng</option>
                                    <option id="status" value="3">Đã chuyển hàng</option>
                                </select>
                                <button type="button">Sửa</button>
                            </div>
                        </div>';
                }
            }


            mysqli_close($con);
            ?>

        </div>
        <div id="title">Danh sách hóa đơn</div>

        <div id="wrapper">
            <div class="table">
                <div class="table-title">
                    <div style="width: 20%; font-weight: bold;">Khách hàng</div>
                    <div style="width: 20%; font-weight: bold;">Ngày mua</div>
                    <div style="width: 20%; font-weight: bold;">Số hóa đơn</div>
                    <div style="width: 20%; font-weight: bold;">Tổng tiền</div>
                    <div style="width: 20%; font-weight: bold;">Trạng thái</div>
                </div>
                <div><br></div>
                <div><br></div>
                <div style="overflow-y: scroll;">
                <?php
                    $con = mysqli_connect('localhost', 'root', '', 'bolashop');
                    if (!$con) {
                        die("Kết nối không thành công: " . mysqli_connect_error());
                    }
                    
                    $sql = mysqli_query($con, "SELECT *, nguoidung.Ten FROM donhang JOIN nguoidung WHERE donhang.maKhachhang = nguoidung.Manguoidung");
                    while ($row = mysqli_fetch_array($sql)) {
                        // Truy vấn SQL để tính tổng giá trị của mỗi đơn hàng
                        $sql_total = mysqli_query($con, "SELECT SUM(s.Giaban * c.Soluong) AS TongTien FROM chitietdonhang c JOIN sanpham s ON c.Masp = s.Masp WHERE c.Madonhang = " . $row["Madonhang"]);

                        $row_total = mysqli_fetch_assoc($sql_total);
                        $total_price = $row_total["TongTien"];
                        $ma = $row["Madonhang"];
                    
                        // Cập nhật giá trị tổng tiền vào cột Tonggiatri trong bảng donhang
                        $update_query = "UPDATE donhang SET Tonggiatri = $total_price WHERE Madonhang = " . $row["Madonhang"];
                        mysqli_query($con, $update_query);
                        echo '<div class="table-items">';
                        
                        echo '<div class="customer">';
                        echo '<div class="avt"></div>';
                        echo '<div>' . $row["Ten"] . '</div>';
                        echo '</div>';
                        echo '<div style="width: 20%;">' . $row["Ngay"] . '</div>';
                        echo '<div style="width: 20%;">' . $row["Madonhang"] . '</div>';
                        echo '<div style="width: 20%;">' . $total_price . '</div>';
                        echo '<div class="btn">';
                        if ($row["Trangthai"] == 0) {
                            echo '<div class="status-orders">Chưa xác nhận</div>';
                        }
                        if ($row["Trangthai"] == 1) {
                            echo '<div class="status-orders">Đã xử lý</div>';
                        }
                        if ($row["Trangthai"] == 2) {
                            echo '<div class="status-orders">Đang giao hàng</div>';
                        }
                        if ($row["Trangthai"] == 3) {
                            echo '<div class="status-orders">Đã giao hàng</div>';
                        }
                        if ($row["Trangthai"] == 4){
                            echo '<div class="status-orders">Đã hủy hàng</div>';
                        }
                       
                        echo '</div>';
                        echo '<button type="button" class="order-detail"><a href="chitiethoadon.php?iddh=' . $ma . '">Chi tiết</a></button>';
                        echo '</div>';
                        
                    }
                    
                    mysqli_close($con);
                    
                    
                    ?>
                    <!-- <div class="table-items">
                        <div class="customer">
                            <div class="avt"></div>
                            <div>KH001</div>
                        </div>
                        <div style="width: 20%;">29/03/2004</div>
                        <div style="width: 20%;">12011252_donhang</div>
                        <div style="width: 20%;">120210</div>
                        <div class="btn">
                            <select>
                                <option id="status" value="1">Hoàn thành</option>
                                <option id="status" value="1">Đang giao hàng</option>
                                <option id="status" value="1">Đã chuyển hàng</option>
                            </select>
                            <button type="button">Sửa</button>
                        </div>
                    </div>
                    <div class="table-items">
                        <div class="customer">
                            <div class="avt"></div>
                            <div>KH001</div>
                        </div>
                        <div style="width: 20%;">29/03/2004</div>
                        <div style="width: 20%;">12011252_donhang</div>
                        <div style="width: 20%;">120210</div>
                        <div class="btn">
                            <select>
                                <option id="status" value="1">Hoàn thành</option>
                                <option id="status" value="1">Đang giao hàng</option>
                                <option id="status" value="1">Đã chuyển hàng</option>
                            </select>
                            <button type="button">Sửa</button>
                        </div>
                    </div>
                    <div class="table-items">
                        <div class="customer">
                            <div class="avt"></div>
                            <div>KH001</div>
                        </div>
                        <div style="width: 20%;">29/03/2004</div>
                        <div style="width: 20%;">12011252_donhang</div>
                        <div style="width: 20%;">120210</div>
                        <div class="btn">
                            <select>
                                <option id="status" value="1">Hoàn thành</option>
                                <option id="status" value="1">Đang giao hàng</option>
                                <option id="status" value="1">Đã chuyển hàng</option>
                            </select>
                            <button type="button">Sửa</button>
                        </div>
                    </div>
                    <div class="table-items">
                        <div class="customer">
                            <div class="avt"></div>
                            <div>KH001</div>
                        </div>
                        <div style="width: 20%;">29/03/2004</div>
                        <div style="width: 20%;">12011252_donhang</div>
                        <div style="width: 20%;">120210</div>
                        <div class="btn">
                            <select>
                                <option id="status" value="1">Hoàn thành</option>
                                <option id="status" value="1">Đang giao hàng</option>
                                <option id="status" value="1">Đã chuyển hàng</option>
                            </select>
                            <button type="button">Sửa</button>
                        </div>
                    </div> -->

                </div>

            </div>
        </div>
        <div class="return"><a href="#">
                << Quay lại</a>
        </div>
    </div>


</body>

</html>
