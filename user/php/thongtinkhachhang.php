<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
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
        }

        table {
            width: 100%;
            /* border-collapse: collapse; */
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
            /* margin-bottom: 20px; */
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
        }
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
                ?>
            </div>
            <h1>Lịch sử mua hàng</h1>
            <div class="LichSuMuaHang">
                <table>
                    <thead class="table-tieuDe">
                        <tr>
                            <td class="left-align">
                                Ngày mua hàng
                            </td>
                            <td class="right-align">
                                Tổng giá trị đơn hàng
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="left-align">1</td>
                            <td class="right-align">1</td>
                        </tr>
                        <tr>
                            <td class="left-align">2</td>
                            <td class="right-align">2</td>
                        </tr>
                        <tr>
                            <td class="left-align">3</td>
                            <td class="right-align">3</td>
                        </tr>
                        <tr>
                            <td class="left-align">1</td>
                            <td class="right-align">1</td>
                        </tr>
                        <tr>
                            <td class="left-align">2</td>
                            <td class="right-align">2</td>
                        </tr>
                        <tr>
                            <td class="left-align">3</td>
                            <td class="right-align">3</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </form>
    </div>
</body>

</html>