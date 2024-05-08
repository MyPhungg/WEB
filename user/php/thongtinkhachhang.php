<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
    <link rel="stylesheet" href="../css/thongke.css">
    <link rel="stylesheet" href="../css/chitiethoadon.css">
    <link rel="stylesheet" href="../css/phieuxuat.css">
    <link rel="stylesheet" href="../css/dsnv.css">
    <style>
        a {
            text-decoration: none;
            color: black;
        }

        .form_TTKhachHang {
            border: 2px solid black;
            padding: 20px;
        }

        .chuXam {
            color: #1f010193;
        }

        .ThongTinKhachHang {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
        }

        .ThongTinKhachHang-data1,
        .ThongTinKhachHang-data2 {
            width: 30%;
        }

        .photo {
            width: 250px;
            height: 250px;
            background-color: #ddd;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
            margin: auto;
        }

        .ThongTinKhachHang input[type="text"],
        .ThongTinKhachHang input[type="password"] {
            width: 80%;
            /* Đặt chiều rộng của các trường nhập */
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .check-ThongTin {
            color: #D61EAD;
            text-decoration: none;
            color: white;
        }

        /* table {
            width: 100%;
            /* border-collapse: collapse; 
            border-collapse: separate;
            border-spacing: 0 40px;
        }

        tbody td {
            width: 50%;
            padding: 10px;
            border: 1px solid black;
        }

        tbody tr {
            /* border: 1px solid black; */
            /* margin-bottom: 20px; 
        }

        .LichSuMuaHang {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .LichSuMuaHang .left-align {
            text-align: left;
            border-right: none;
        }

        .LichSuMuaHang .right-align {
            text-align: right;
            border-left: none;
        } */
    </style>
</head>

<body>
    <div class="form_TTKhachHang">
        <form action="" method="post">
            <h1>Thông tin của tôi</h1>
            <p><a href="./home.php">Trang chủ >> </a><span class="chuXam">Thông tin của tôi</span></p>
            <div class="ThongTinKhachHang">
                <?php
                function loadData()
                {
                    include('./connect.php');
                    $conn = connectDB();
                    if (isset($_SESSION['user_id'])) {
                        $maKH = $_SESSION['user_id'];
                        $sql = "SELECT * FROM nguoidung WHERE Manguoidung='$maKH'";
                        $rs = mysqli_query($conn, $sql);
                        if ($row = mysqli_fetch_array($rs)) {
                            echo '<div class="photo">
                            <img src="../img/' . $row["img"] . '" alt="ảnh">
                        </div>
                        <div class="ThongTinKhachHang-data1">
                            <p>Họ tên:</p>
                            <input type="text" name="name" value="' . $row["Ten"] . '">
                            <p>Địa chỉ:</p>
                            <input type="text" name="address" value="' . $row["Diachi"] . '">
                            <p>Mật khẩu:</p>
                            <input type="password" name="password" value="' . $row["Matkhau"] . '">
                        </div>
                        <div class="ThongTinKhachHang-data2">
                            <p>Số điện thoại:</p>
                            <input type="text" name="phone" value="' . $row["Sodienthoai"] . '">
                            <p>Email:</p>
                            <input type="text" name="email" value="' . $row["Email"] . '">
                            <p>Xác nhận mật khẩu:</p>
                            <input type="password" name="check-password" value="' . $row['Matkhau'] . '">
                            <p class="">Bạn muốn thay đổi thông tin, <button class="check-ThongTin" id="check-ThongTin" name="thaydoi">Thay đổi</button></p>
                        </div>';
                        }
                        mysqli_close($conn);
                    } else {
                        echo "<script>alert('Lỗi');</script>";
                    }
                }
                loadData();

                ?>
                <!-- <script>
                    $(document).ready(function(){
                        loadData();
                    
                    $('#check-ThongTin').on('click', function(){
                        var ten = $('.name').val();
                        var diachi = $('.address').val();
                        var matkhau = $('.password').val();
                        var sdt = $('.phone').val();
                        var email = $('.email').val();
                        var rpw = $('.check-password').val();
                        if(!ten||!diachi||!matkhau||!sdt||!email||!rpw){
                            alert('Không đủ dữ liệu!');

                        }else{
                            $.ajax({
                                url: "XLsuathongtin.php",
                                method: "POST",
                                data: {ten:ten, diachi:diachi,matkhau:matkhau,sdt:sdt,email:email,rpw:rpw},
                                success:function(data){
                                    alert('Thành công');
                                    loadData();
                                }
                            });
                        }
                    });
                });
                </script> -->

                <?php
                $pattern_ten = "/^[a-zA-ZàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậẬèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆđĐìÌỉỈĩĨíÍịỊòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢùÙủỦũŨúÚụỤưỪừỬữỮứỨựỰỳỲỷỶỹỸýÝỵỴ\\s]+$/"; // chỉ chấp nhận các ký tự chữ và khoảng trắng
                $pattern_mk_rmk = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/"; // Mật khẩu phải đủ 8 ký tự, có kí tự in hoa,in thường,ký tự đặc biệt và số 
                $pattern_email = "/^[\w\.-]+@[\w\.-]+\.\w+$/";
                $pattern_sdt = "/^0\d{9}$/";
                // $
                // include('./connect.php');
                $conn = connectDB();
                if (isset($_SESSION['user_id'])) {
                    $maKH = $_SESSION['user_id'];
                    if (isset($_POST['thaydoi'])) {
                        if (isset($_POST["name"]) && isset($_POST['address']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['check-password'])) {
                            $ten = $_POST["name"];
                            $diaChi = $_POST['address'];
                            $mk = $_POST['password'];
                            $sdt = $_POST['phone'];
                            $email = $_POST['email'];
                            $rmk = $_POST['check-password'];

                            $sql = "UPDATE nguoidung SET Ten='$ten',
                                                    Diachi='$diaChi',
                                                    Matkhau='$mk',
                                                    Sodienthoai='$sdt',
                                                    Email='$email'
                                               WHERE Manguoidung='$maKH'     ";
                            $rs = mysqli_query($conn, $sql);
                            if ($rs == true) {
                                echo "<script>alert('Cập nhật thông tin thành công');</script>";
                                echo "<script>window.location = 'home.php?chon=tttk';</script>";
                                exit();
                            } else {
                                echo "<script>alert('Cập nhật thông tin thất bại');</script>";
                            }
                        }
                    }
                }
                mysqli_close($conn);
                ?>
            </div>
            <h1>Lịch sử mua hàng</h1>

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
                            if ($row["Trangthai"] == 4){
                                echo '<div class="status-orders">Đã hủy hàng</div>';
                            }
                           
                            echo '</div>';
                            echo '<button type="button" class="order-detail"><a href="home.php?chon=ctdh&maDH=' . $row['Madonhang'] . '">Chi tiết</a></button>';
                            echo '</div>';
                            
                        }
                    }
                    
                    
                    mysqli_close($conn);
                    
                    
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
        
        <!-- <div class="return"><a href="#">
                << Quay lại</a>
        </div> -->
    </div>

        </form>
    </div>
</body>

</html>