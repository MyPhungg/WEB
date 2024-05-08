<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/thongke.css">
    <link rel="stylesheet" href="../css/chitiethoadon.css">
    <link rel="stylesheet" href="../css/phieuxuat.css">
    <link rel="stylesheet" href="../css/dsnv.css">
    <style>
        #bodi {
            margin: 10%;
        }

        #khung {
            /* margin: 10%; */
            border: 1px solid black;

        }

        .khung {
            margin-top: 5%;
            margin-left: 5%;
            margin-right: 5%;
        }

        .progress-container {
            top: 10px;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }

        .progress-bar {
            height: 10px;
            background-color: green;
            border: darkgreen solid 1px;
            transition: width 0.5s ease;
        }

        .step-container {
            display: flex;
            justify-content: space-between;
            width: 80%;
            margin-bottom: 10px;
            margin-top: 10px;
            margin-left: 10%;
            /* margin-right: 5%; */
        }

        .step {
            width: 25%;
            text-align: left;
            /* font-weight: bold; */
        }

        .step-text {
            font-size: 14px;
            color: black;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .progress-wrapper {
            position: relative;
            border: darkgreen solid 1px;
        }

        .progress-markers {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 10px;
            /* Cùng chiều cao với progress-bar */
            display: flex;
            justify-content: space-between;

        }


        .marker {
            position: absolute;
            top: 0;
            height: 100%;
            width: 2px;
            /* Độ rộng của điểm đánh dấu */
            background-color: white;
            /* Màu sắc của điểm đánh dấu */
        }

        .order-info-complete {
            display: block;
            background-color: black;
            border: solid 2px #ccc;
            border-radius: 20px;
            padding: 20px;
            /* margin-top: 20px; */
        }

        .order-details p {
            margin: 5px 0;
        }

        .order-details {
            position: relative;
        }

        .total-row {
            font-size: 20px;
        }

        .total-row::before {
            content: "";
            position: absolute;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #ccc;
        }

        .total-price {
            padding-top: 15px;
            font-size: larger;
        }

        .line-info-checkout {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div id="bodi">
        <div id="khung">
            <div class="khung">
                <div class="progress-wrapper" id="progress-wrapper">
                    <!-- <img src="https://example.com/image.jpg"> -->
                    <div class="progress-bar" id="progress-bar" style="width: 0;"></div>
                    <div class="progress-markers">
                        <div class="marker" style="left: 25%;"></div>
                        <div class="marker" style="left: 50%;"></div>
                        <div class="marker" style="left: 75%;"></div>
                        <div class="marker" style="left: 100%;"></div>
                    </div>
                </div>

            </div>
            <?php

            if (isset($_GET['maDH'])) {
                // echo 'abc';
                $maDH = $_GET['maDH'];
                include('./connect.php');
                $conn = connectDB();
                $sql = "SELECT Trangthai FROM donhang WHERE Madonhang=$maDH";
                $rs = mysqli_query($conn, $sql);
                if (mysqli_num_rows($rs) > 0) {
                    $row = mysqli_fetch_assoc($rs);
                    $trangthai = $row["Trangthai"];
                    // var_dump($trangthai);
                    switch ($trangthai) {
                        case 0:
                            $tt = 25;
                            break;
                        case 1:
                            $tt = 50;
                            break;
                        case 2:
                            $tt = 75;
                            break;
                        case 3:
                            $tt = 100;
                            break;
                        case 4:
                            $tt = 0;
                            break;
                        default:
                            // echo '0';
                    }
                } else {
                    echo "Lỗi ";
                }
                // mysqli_close($conn);

            }


            ?>
            <div class="progress-container" id="progress-container">
                <div class="step-container">
                    <div class="step">
                        <div class="step-text">Chờ xác nhận</div>
                    </div>
                    <div class="step">
                        <div class="step-text">Đã xử lý</div>
                    </div>
                    <div class="step">
                        <div class="step-text">Đang giao hàng</div>
                    </div>
                    <div class="step">
                        <div class="step-text">Đã giao hàng</div>
                    </div>


                </div>
            </div>
            <script>
                // Giả sử bạn có một biến PHP là $progress (đại diện cho phần trăm tiến trình)
                var progress = <?php echo $tt ?>; //mở thẻ php echo trạng thái ra

                if (progress > 0) {
                    // Lấy phần tử thanh màu xanh theo id
                    var progressBar = document.getElementById('progress-bar');

                    // Thay đổi chiều dài của thanh màu xanh
                    progressBar.style.width = progress + '%';
                } else {
                    document.getElementById('progress-wrapper').style.display = "none";
                    document.getElementById('progress-container').style.display = "none";

                }
            </script>

            <!-- <div id="huy"></div> -->
            <div id="wrapper">
                <div class="table">
                    <div class="table-title">
                        <!-- <div style="width: 20%; font-weight: bold;">Khách hàng</div> -->
                        <div style="width: 25%; font-weight: bold;">Số hóa đơn</div>
                        <div style="width: 25%; font-weight: bold;">Ngày mua</div>
                        <div style="width: 25%; font-weight: bold;">Tổng tiền</div>
                        <div style="width: 25%; font-weight: bold;">Trạng thái</div>
                    </div>
                    <div><br></div>
                    <div><br></div>
                    <div style="overflow-y: scroll;">
                        <?php
                        $conn = connectDB();
                        if (isset($_SESSION['user_id'])) {
                            $maKH = $_SESSION['user_id'];
                            $sql = mysqli_query($conn, "SELECT * FROM donhang WHERE maKhachhang = '$maKH'");
                            while ($row = mysqli_fetch_array($sql)) {
                                // Truy vấn SQL để tính tổng giá trị của mỗi đơn hàng
                                // $sql_total = mysqli_query($con, "SELECT SUM(s.Giaban * c.Soluong) AS TongTien FROM chitietdonhang c JOIN sanpham s ON c.Masp = s.Masp WHERE c.Madonhang = " . $row["Madonhang"]);

                                // $row_total = mysqli_fetch_assoc($sql_total);
                                // $total_price = $row_total["TongTien"];
                                // $ma = $row["Madonhang"];

                                // // Cập nhật giá trị tổng tiền vào cột Tonggiatri trong bảng donhang
                                // $update_query = "UPDATE donhang SET Tonggiatri = $total_price WHERE Madonhang = " . $row["Madonhang"];
                                // mysqli_query($con, $update_query);
                                echo '<div class="table-items">';

                                // echo '<div class="customer">';
                                echo '<div style="width: 25%;">' . $row["Madonhang"] . '</div>';
                                echo '<div style="width: 25%;">' . $row["Ngay"] . '</div>';
                                echo '<div style="width: 25%;">' . $row["Tonggiatri"] . '</div>';
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
                                if ($row["Trangthai"] == 4) {
                                    echo '<div class="status-orders">Đã hủy hàng</div>';
                                }

                                echo '</div>';
                                echo '<button type="button" class="order-detail"><a href="chitiethoadon.php?iddh=' . $ma . '">Chi tiết</a></button>';
                                echo '</div>';
                            }
                        }


                        mysqli_close($conn);


                        ?>

                    </div>

                </div>

            </div>
            <div><br></div>


        </div>
    </div>
</body>

</html>